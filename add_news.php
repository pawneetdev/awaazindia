<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add news</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/small-business.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<?php
	
	require 'core.php';
	require 'database.php';

	if(loggedin())
	{
		echo "<center><h1>Welcome to the admin panel.</h1>";


echo '	<a href = "add_news.php">Add News</a> |
		<a href = "modify_news.php">Modify News</a> |
		<a href = "logout.php">Logout</a></center><br>';

	$query = ("SELECT MAX(`news_id`) FROM `news`");

	if ($query_run = mysql_query($query))
	{
		$query_num_rows = mysql_num_rows($query_run);

		if($query_num_rows == 1)
		{
			$image = mysql_result($query_run, 0);
		}
	}
	$image++;

	if(isset($_POST['head_short']) && isset($_POST['stry_short']) && isset($_POST['head_main']) && isset($_POST['stry_main']))
	{
		$head_short = $_POST['head_short'];
		$stry_short = $_POST['stry_short'];
		$head_main = $_POST['head_main'];
		$stry_main = $_POST['stry_main'];
		$newspaper = $_POST['newspaper'];
		$date = date("Y-m-d");

		$target_dir = "uploads/";
		
		$target_file = $target_dir . $image;
		$uploadOk = 1;
		$file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$imageFileType = pathinfo($file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        echo "<script>window.alert('File is not an image.')</script>";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "<script>window.alert('Sorry, file already exists.')</script>";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "<script>window.alert('Sorry, your file is too large.')</script>";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "<script>window.alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "<script>window.alert('Sorry, your file was not uploaded.')</script>";
		    header("Location: add_news.php");
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        
		    } else {
		        echo "<script>window.alert('Sorry, there was an error uploading your file.')</script>";
		        header("Location: add_news.php");
		    }
		}
		$query = "INSERT INTO `news` VALUES('', '$date','".mysql_real_escape_string($head_short)."','".mysql_real_escape_string($stry_short)."','".mysql_real_escape_string($head_main)."','".mysql_real_escape_string($stry_main)."', '$newspaper')";
		
		if (mysql_query($query))
		{

			echo "<script>window.alert('Added successfully.')</script>";
		}
		else
			echo 'We are unable to process your request at this time please try after some time';
		
	}

?>

<body>
<div class = "container">
<div class = "jumbotron">
	<form role = "form" action = "add_news.php" method = "POST" enctype="multipart/form-data">
		<div class="form-group">
		<label for="sel1">Select newspaper</label>
		<select class="form-control" id="sel1" name = "newspaper">
			<option value="Daily">Daily</option>
		  	<option value="Weekly">Weekly</option>
		  	<option value="Awaaz-India">Awaaz India</option>
		  	<option value="The-Trade-Fairs-Of-India">The Trade Fairs Of India</option>
		</select>
		</div>

		<div class="form-group">
			<label for="head_shrt">Short headline</label>
			<textarea id = "head_shrt" class="form-control" name = "head_short" placeholder = "Short headline" rows = "4" required></textarea>
		</div>

		<div class="form-group">
			<label for="stry_shrt">Short story</label>
			<textarea id = "stry_shrt" class="form-control" name = "stry_short" placeholder = "Short story" rows = "10" required></textarea>
		</div>
		
		<div class="form-group">
			<label for="head_main">Main headline</label>
			<textarea id = "head_main" class="form-control" name = "head_main" rows = "4" placeholder = "Main headline" required></textarea>
		</div>
		
		<div class="form-group">
			<label for="main_shrt">Main story</label>
			<textarea id = "main_shrt" class="form-control" name = "stry_main" rows = "10" placeholder = "Main story" required></textarea>
		</div>

		<div class="form-group">
			<label for="fileToUpload">Choose an image</label>
			<input type="file" name="fileToUpload" id="fileToUpload" required>
		</div>
		
		<input type = "submit" class="btn btn-default">
	</form>
</div>
</div>
<?php
	
	}
	else
		header("Location: admin.php");

?>