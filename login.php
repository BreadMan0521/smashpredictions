<?php
	session_start();
	include_once("db.php");
	echo "<style> #success { display: none; } </style>";
	echo "<style> #failure { display: none; } </style>";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$sql = "SELECT * FROM users WHERE username='$username'";
		$query = mysqli_query($db,$sql);
		if(mysqli_num_rows($query) > 0 ){
			$password = mysqli_real_escape_string($db, $_POST['password']);
			$row = mysqli_fetch_array($query);
			$db_password = $row['password'];
			
			if($password == $db_password) {
				echo "<style> #success { color: green; display: inline; } </style>";
				$_SESSION['username'] = $username;
				$_SESSION['id'] = $row['id'];
				$_SESSION['points'] = $row['points'];
				$_SESSION['loggedIn'] = 'yes';
				header("Location: index.php");
			} else {
				echo "<style> #failure { color: red; display: inline; } </style>";
			}
		} else {
			echo "<style> #failure { color: red; display: inline; } </style>";
		}
	}	
?>


<html>
<head>
	<title>login page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

	<div id="includedContent"></div>	

	<h1> Login Here </h1>

	<div align = "center">
		<div style = "width:300px; border: solid 1px #333333; " align = "left">
			<div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				<div style = "margin:30px">
					<form action = "login.php" method = "POST">
						<label>UserName  :</label><input placeholder = "Username" type = "text" name = "username" class = "box"/><br /><br />
						<label>Password  :</label><input placeholder = "Password" type = "password" name = "password" class = "box" /><br/><br />
						<input name = "login" type = "submit" value = " Submit "/><br />
					</form>
				
				<div style = "font-size:11px; color:#cc0000; margin-top:10px">
			</div>
			<div id ="success">Login Successful</div>
			<div id ="failure">Invalid Username or Password</div>
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
