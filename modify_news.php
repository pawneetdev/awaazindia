<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modify news</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/small-business.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<style>
	table
	{
		width: 75%;
	}
	table, th, td 
	{
    	border: 2px solid black;
    	border-collapse: collapse;
	}
	th, td 
	{
    	padding: 15px;
	}
</style>

<?php
	
	require 'core.php';
	require 'database.php';

	if(loggedin())
	{
		echo "<center><h1>Welcome to the admin panel.</h1>";


		echo '	<a href = "add_news.php">Add News</a> |
				<a href = "modify_news.php">Modify News</a> |
				<a href = "logout.php">Logout</a></center><br>';

		echo   "<center><div class = 'container'><div class = 'jumbotron'>
					<form role = 'form' action = 'modify_news.php' action = 'GET'>
					
					<div class='form-group'>
						<input class='form-control'type = 'date' name = 'date' required>
					</div>
					
					<div class='form-group'>
						<input type = 'submit' class='btn btn-default'>
					</div>
				</div></div>
				</form>";

		if(isset($_GET['date']))
		{
			$query = "SELECT * FROM `news` WHERE `date` = '".$_GET['date']."'";

			if($rs = mysql_query($query))
			{
				$i=0;
				echo "<table style='width:75%'>
						<tr>
							<th>Short headline</th>
							<th>Short news</th>
							<th>Main headline</th>
							<th>Main news</th>
							<th>Newspaper</th>
							<th>Delete</th>
						</tr>";

				while($qr = mysql_fetch_assoc($rs))
				{
					echo "<tr>
						    <td>".$qr['headline_short']."</td>
						    <td>".$qr['story_short']."</td>
						    <td>".$qr['headline_main']."</td>
						    <td>".$qr['headline_main']."</td>
						    <td>".$qr['newspaper']."</td>
							<td><a href = 'delete.php?id=".$qr['news_id']."'>Delete</a></td>
						  </tr>";
				}
				echo "</table><br></center>";
			}
		}
	}
	else
		header("Location: admin.php");
	
?>