<?php 
    session_start(); 
    require_once '/var/www/pesu/libraries/config/config.php';
    $db = getDbInstance();

    function isFavourite($post_id)
    {
        global $db;
        $db->where("post_id", $post_id);
        $db->where("user_id", 2);
        if($db->has("favourite_posts")) {
            return true;
        } else {
            return false;
        }
    }

?>