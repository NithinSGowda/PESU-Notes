<?php 
 session_start(); 
require_once '/var/www/pesu/libraries/config/config.php';

$upload = 'err'; 
    if(!empty($_FILES['file'])){ 
        $targetDir = "/var/www/pesu/user/uploads/profiles/"; 
        $allowTypes = array( 'jpg', 'png', 'jpeg', 'gif'); 
        $file = $_FILES['file']['name']; 
        if(!empty($file)){ 
                $fileName = uniqid().'-'.substr(basename($_FILES['file']['name']),0,25); 
                $targetFilePath = $targetDir . $fileName; 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){ 
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                        $insertValuesSQL =$fileName; 
                    }
                }
            }
            if(!empty($insertValuesSQL)){ 
                $db = getDbInstance();
                $data_to_db['profile_image'] = $insertValuesSQL;
                $db->where('user_profile_id',$_SESSION['user_profile_id']);
                $stat = $db->update('user_profiles', $data_to_db);
                if($stat){
                    $upload ='uploads/profiles/'.$insertValuesSQL;
                    $_SESSION['profile_image'] = $insertValuesSQL;
                }

            } 
            
            }     
echo $upload;


?>