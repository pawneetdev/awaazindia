<?php
	
	require 'database.php';
	require 'header.html';

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$query = "SELECT `headline_main`, `story_main` FROM `news` WHERE `news_id` = '$id'";

		if($rs = mysql_query($query))
		{
			while($qr = mysql_fetch_assoc($rs))
			{
				$headline = $qr['headline_main'];
				$story = $qr['story_main'];
			}
		}
?>

<div class = "container">
<div class='col-md-12'>
	<center><img class='img-responsive img-rounded' src='uploads/<?php echo $id ?>' width = "1200" alt='Image not available'></center>
</div>
</div><br><br>

<div class = "container">
	<div class = "jumbotron">
		<h1><?php echo $headline ?></h1><br>
		<p style = "text-align: justify; text-justify: inter-word;"><?php echo $story ?></p>
	</div>
</div>

<?php

	}
	else
		header("Location: index.php");

	include "footer.html";
?>