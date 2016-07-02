<?php
	session_start();
	
	include_once("db.php");
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if($_POST['username'] != "" && $_POST['password'] != "") {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$sql_store = "INSERT into users (id, username, password) VALUES (NULL, '$username', '$password')";
			$sql = mysqli_query($db, $sql_store) or die(mysql_error());
		} else {
			echo "Fill all fields please";
		} 
	}
?>


<html>
<head>
	<title>Register page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

	<div id="includedContent"></div>

	<h1> Register Here </h1>
	
	<div align = "center">
		<div style = "width:300px; border: solid 1px #333333; " align = "left">
			<div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Register</b></div>
			<div style = "margin:30px">
				<form action = "register.php" method = "POST">
					<label>UserName  :</label><input placeholder = "Username" type = "text" name = "username" class = "box"/><br /><br />
					<label>Password  :</label><input placeholder = "Password" type = "password" name = "password" class = "box" /><br/><br />
					<input name = "submit" type = "submit" value = " Submit "/><br />
				</form>
				
				<div style = "font-size:11px; color:#cc0000; margin-top:10px">
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script>
		$(function(){
			$("#includedContent").load("navbar.html");
		});
	</script>

</body>
</html>
