<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/small-business.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<?php
	
	require 'core.php';

	if(!loggedin())
	{
		if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
		{
			@$http_referer = $_SERVER['HTTP_REFERER'];
			if(substr(@$http_referer, -9) == "admin.php")
				echo "Incorrect username/password";
		}

?>


<body>
<div class = "container">
<div class = "jumbotron">
	<form class="form-horizontal" role = "form" action = "welcome.php" method = "POST">
	<div class="form-group">
		<label for="user">Username</label>
		<input type = "text" id = "user" placeholder = "Enter Username" name = "user" class="form-control" required>
	</div>
	<div class="form-group">
		<label for="pass">Password</label>
		<input id = "pass" type = "password" placeholder = "Enter Password" name = "pass" class="form-control" required>
	</div>
	<input type = "submit" class="btn btn-default" value = "Login">
	</form>
</div>
</div>
</body>

<?php
	
	}
	else
		header("Location: logged_in.php");
	
?>