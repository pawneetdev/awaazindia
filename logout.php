<?php

	require 'core.php';

	session_destroy();
	header('Location: admin.php');

?>