<?php
    ini_set('display_startup_errors', 1); ini_set('display_errors', 1); error_reporting(-1);
    require_once '/var/www/pesu/libraries/config/config.php';
    session_start();
    if(!isset($_SESSION['user_logged_in'])){
        header("Location: /signIn.php");
      }
    $download = $_SESSION["post_data"]['mcrypt_encrypt'];
    $id = decrypt(filter_input(INPUT_POST, 'mcrypt_encrypt'));
	if($download ===$id ){
    if ($id && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $db3 = getDbInstance();
        $db3->where('user_id', $_SESSION['user_id']);
        $userId=$db3->getValue('auth_users','user_profile_id');
        $db = getDbInstance();
        $db2 = getDbInstance();
        $fileName=$db->where('post_id',$id)->getValue('posts','file_url');
        $dataDownload = Array (
            'downloads' => $db->inc(1)
        );
        $db->where('post_id',$id);
        if ($db->update ('posts', $dataDownload)){
            $dataDownload = Array (
                'coins' => $db2->dec(10)
            );
            $db2->where('user_profile_id',$userId);
            if ($db2->update ('user_profiles', $dataDownload)){
                $_SESSION['post_data'] = $_POST;
                header('Location: download.php');
            }
        }  
        else
            echo 'Insufficient Balance';
    }}else{
     header('Location: download.php');
    }
?>