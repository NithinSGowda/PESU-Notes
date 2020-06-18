<?php
    require_once '/var/www/pesu/libraries/config/config.php';
    ini_set("allow_url_fopen", 1);        

    $json = file_get_contents('test.json');
    $json_data = json_decode($json, true);
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $data_to_db = filter_input_array(INPUT_POST);
        // CHECKING DUBLICACY
        $db = getDbInstance();
        $db->where('user_srn', $data_to_db['user_srn']);
        $db->get('auth_users');
        if ($db->count >= 1)
        {
            header('location: /register-user.php?failure=User already exists');
            exit;
        }
        // GETTING DATA
        foreach($json_data[$data_to_db['user_srn']] as $user):
            $data['full_name'] = $user['Name'];
            $data['user_srn'] = $user['PRN'];
            $data['class'] = $user['Class'];
            $data['section'] = $user['Section'];
            $data['cycle'] = $user['Cycle'];
            $data['branch'] = $user['Branch'];
            $data['campus'] = $user['Campus'];
        endforeach;

        // MAKING PROFILE
        $profile_id = $db->insert('user_profiles', $data);
        if ($profile_id)
        {

        $data_to_db['user_name'] =  $data['full_name'];
        $data_to_db['password'] = password_hash($data_to_db['password'], PASSWORD_DEFAULT);
        $data_to_db['created_at'] = date('Y-m-d H:i:s');
        $data_to_db['user_profile_id'] = $profile_id;

        // MAKING AUTH
        $db = getDbInstance();
        $last_id = $db->insert('auth_users', $data_to_db);
        if ($last_id)
        {
            header('location: /register-user.php?success=User success');

        }else{
            $db->where('user_profile_id',$profile_id)->delete('user_profiles');
            header('location: /register-user.php?failure=', $db->getLastError());
        }
    }else{
            header('location: /register-user.php?failure=', $db->getLastError());
        }
    }

?>
