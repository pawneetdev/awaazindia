<?php
	
	require 'core.php';
	require 'database.php';

	if(loggedin())
	{
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			$query = "DELETE FROM `news` WHERE `news_id` = '$id'";
			$referer = $_SERVER['HTTP_REFERER'];
			if($rs = mysql_query($query))
				header("Location: $referer");
		}
		else
			header("Location: $referer");
	}