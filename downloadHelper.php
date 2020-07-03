<?php
    require_once '/var/www/pesu/libraries/config/config.php';
    $id = decrypt(filter_input(INPUT_POST, 'mcrypt_encrypt'));
    if ($id && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $db3->where ('user_id', $_SESSION['user_id']);
        $userId=$db3->getValue('auth_users','user_profile_id');
        $db = getDbInstance();
        $db2 = getDbInstance();
        $fileName=$db->where('post_id',$id)->getValue('posts','file_url');
        $dataDownload = Array (
            'downloads' => $db->inc(1)
        );
        $db->where('post_id',$id);
        if ($db->update ('users', $dataDownload)){
            $dataDownload = Array (
                'coins' => $db2->dec(10)
            );
            $db2->where('user_profile_id',$userId);
            if ($db->update ('users', $dataDownload)){
                echo "Download initiated";
            }
        }  
        else
            echo 'update failed: ' . $db->getLastError();
    }
?>