<?php 
session_start();
require_once '/var/www/pesu/libraries/config/config.php';

$del_id = filter_input(INPUT_POST, 'del_post_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	
    $del_file = filter_input(INPUT_POST, 'del_post_file');

    $db = getDbInstance();
    $db->where('post_id', $del_id);
    $status = $db->delete('posts');
    
    if ($status) 
    {   
        if (file_exists($del_file)) {
            unlink($del_file);
         
        }
        
        $_SESSION['info'] = "Note deleted successfully!";
        header('location: /user/dashboard.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete the note";
    	header('location: /user/dashboard.php');
        exit;

    }
    
}