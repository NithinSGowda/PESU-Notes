<?php
    require_once '/var/www/pesu/libraries/config/config.php';
    session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$username = filter_input(INPUT_POST, 'user_srn');
	$password = filter_input(INPUT_POST, 'password');

	// Get DB instance.
	$db = getDbInstance();

	$db->where('user_srn', $username);
	$row = $db->getOne('auth_users');

	if ($db->count >= 1)
    {
		$db_password = $row['password'];
		$user_id = $row['user_id'];

		
			header('Location: /index.html');
		
       
		exit;
	}
    else
    {
        header('Location: /signIn.php?failure= Invalid user name or password');
		exit;
	}
}
else
{
	die('Method Not allowed');
}
