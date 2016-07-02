<?php
	session_start();
	
	if(isset($_GET['match_id'])) {
		include_once("db.php");
		$match_id = $_GET['match_id'];
		$sql = "SELECT * FROM matches WHERE id = '$match_id'";
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($query);
		$player1 = $row['player1'];
		$player2 = $row['player2'];
		$odds = $row['odds'];
		$status = $row['status'];
	}
?>
<html>
<head>
	<title>Match Page</title>
	
	<link rel="stylesheet" type="text/css" href="match.css">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

	<div id="includedContent"></div>

	<div id="background">
		<div class="player player1">
			<center><h1 id="player1_name"><?php echo $player1; ?></h1>
				<form class="player_win_form" action = "match.php" method = "POST">
					<input class="input_box" placeholder = "0" type = "text" name = "points" class = "box"/></br>
					<input class="submit_button" name = "submit" type = "submit" value = " Submit "/>
				</form>
			</center>
		</div>
		<div class="player player2">
			<center><h1 id="player2_name"><?php echo $player2; ?></h1>
				<form class="player_win_form" action = "match.php" method = "POST">
					<input class="input_box" placeholder = "0" type = "text" name = "points" class = "box"/></br>
					<input class="submit_button" name = "submit" type = "submit" value = " Submit "/>
				</form>
			</center>
		</div>
		<div id="versus_box">
			<h1 id="versus_letters"> VS </h1>
		</div>
		<div id="odds_box">
			<h3 id="odds_letters"> Returns </h3>
			<h2 id="odds_numbers"><?php echo $odds; ?></h2>
		</div>
		
	</div>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script>
		$(function(){
			$("#includedContent").load("navbar.html");
		});
	</script>
</body>
<html>