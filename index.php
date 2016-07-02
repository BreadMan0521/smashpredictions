<?php
	session_start();

	include "generate_match.php";
	
	if(!empty($_GET['gmatch'])) {
		generateMatch();
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	
	<link rel="stylesheet" type="text/css" href="home.css">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
		
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
</head>

<body>
	
	<div id="background">
	<div id="includedContent"></div>	

	<center>
		<h1> Home Page  </h1>  
		<?php if($_SESSION["loggedIn"] != "yes") {echo "<p> You are not logged in. </p>";
			} else { echo "<div> Your Points: " . $_SESSION['points'] . " </div>"; } 	
		?>
	</center>
	
	
	
	<div class="container">
		<div id ="leftside" class="panel panel-default" style="float:left; width:25%">
			<div> Left </div>
			<!-- <button type="button" onclick="addMatch('x','y')">Add Match</button>
			<form action="index.php" method="GET">
				<input type="submit" name = "gmatch" value="Generate Match">
			</form> -->
		</div>
		<div id ="mainfeed">
			<center>
				<?php include("match_list.php"); createList(); ?>
			</center>
		</div>
		<div id ="rightside" class="panel panel-default" style="float:left; width:25%">
			<div> right </div>
			<button type="button" onclick="removeMatch()">Remove Match</button>
		</div>
		</div>
	</div>

		
	<center><footer>Copyright © smashpredictions.com</footer></center>
	<script>
		function removeMatch() {
			document.getElementById("match_list")
			.getElementsByTagName("div")[0]
			.remove();
		}
	</script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script>
		$(function(){
			$("#includedContent").load("navbar.html");
		});
	</script>
	<script>
		$("#more_options").click(function(e) {
			$("#current_match_hidden").slideToggle(400);
			e.preventDefault();
		});
	</script>
	
	<script>
		$(".bring_up_match").click(function(e) {
			var match_id = $(this).attr('param');
			s = "#" + match_id;
			$(s).slideToggle(400);
			e.preventDefault();
			
		});
		$(".bring_up_more_options").click(function(e) {
			var match_id = $(this).attr('param');
			s = "#" + match_id;
			$(s).slideToggle(400);
			e.preventDefault();
			
		});
	</script>
	

</body>
</html>
