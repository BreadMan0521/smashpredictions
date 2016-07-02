<?php
	session_start();
	include_once("db.php");
	$id = $_SESSION['id'];
	$addition = 100;
	if(!empty($_GET['act'])) {
		$sql = "SELECT * FROM users WHERE id =$id";
		$query = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($query);
		$db_points = $row['points'];
		$new_points = $db_points + $addition;
		$_SESSION['points'] = $new_points;
		$sql = "UPDATE users SET points= $new_points WHERE id = $id";
		mysqli_query($db, $sql);
	}
?>

<html>
<head>
	<title>Points</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

	<div id="includedContent"></div>

	<center>
		<h2> Click here for more points </h2>
		<form action="points.php" method="GET">
			<input type="submit" name = "act" value="Add 100 points">
		</form>
		
	</center>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script>
		$(function(){
			$("#includedContent").load("navbar.html");
		});
	</script>
</body>
<html>