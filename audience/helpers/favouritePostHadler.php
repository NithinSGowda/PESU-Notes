<?php 
 session_start(); 
 require_once '/var/www/pesu/libraries/config/config.php';
 $currentUser= $_SESSION['user_profile_id'];
if(isset($_POST['toggleFavourite'])){
    
    $postId=$_POST['postId'];
    $state=$_POST['state'];
    if($state=='fav')
    {
        $db = getDbInstance();
        $data_to_db['post_id']=$postId;
        $data_to_db['user_id']=$currentUser;
        $last_id = $db->insert('favourite_posts', $data_to_db);
        if($last_id){
            echo "success";
        }else{
            echo 'failure';
        }
    
    }else{
        $db = getDbInstance();
        $db->where('post_id', $postId);
        $db->where('user_id', $currentUser);
        $status = $db->delete('favourite_posts');
        if($status){
            echo "success";
        }else{
            echo 'failure';
        }
    }

}
