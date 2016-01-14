<?php
	
	require 'core.php';

	if(loggedin())
	{
		echo "<center><h1>Welcome to the admin panel.</h1>";

?>

<a href = "add_news.php">Add News</a> |
<a href = "modify_news.php">Modify News</a> |
<a href = "logout.php">Logout</a></center>

<?php
	
	}
	else
		header("Location: admin.php");

?>