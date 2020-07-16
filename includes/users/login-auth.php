<?php
    $PATH = '/var/www/pesu';
    require_once $PATH.'/libraries/config/config.php';
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

			if (password_verify($password, $db_password))
			{
				$_SESSION['user_logged_in'] = TRUE;
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['user_profile_id'] = $row['user_profile_id'];
				$_SESSION['user_srn'] = $row['user_srn'];
				$user= $db->where('user_profile_id', $row['user_profile_id'])->getOne('user_profiles');
				$_SESSION['profile_image'] ='default.jpg';
				$_SESSION['user_semester'] ='not-available';
				$_SESSION['user_branch'] ='not-available';

				if($user['profile_image']){
					$_SESSION['profile_image'] =$user['profile_image'];
				}
				if($user['class']){
					$_SESSION['user_semester'] =$user['class'];
				}
				if($user['branch']){
					$_SESSION['user_branch'] =$user['branch'];
				}
					
				$_SESSION['user_name'] =$user['full_name'];
				header('Location: /index.php');
			}
			else
			{
				header('Location: /signIn.php?failure= Invalid user name or password');

			}
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
