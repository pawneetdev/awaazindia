<?php
	
	require 'database.php';

	if(isset($_POST['user']) && isset($_POST['pass']))
	{
		$user = htmlentities($_POST['user']);
		$pass = htmlentities($_POST['pass']);
		$pass_hash = md5($pass);

		$query = "SELECT `id` FROM `login` WHERE `username` = '$user' AND `password` = '$pass_hash'";
		if($query_run = mysql_query($query))
		{
				$query_num_rows = mysql_num_rows($query_run);	
			
				if($query_num_rows == 0)
					header('Location: admin.php');
				else if($query_num_rows == 1)
				{
					$user_id = mysql_result($query_run, 0, 'id');
					@session_start();
					$_SESSION['user_id'] = $user_id;
					header('Location: logged_in.php');
				}
		}
	}
	else
		header('Location: admin.php');

?>