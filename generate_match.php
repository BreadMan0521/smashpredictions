<?php
	session_start();
	
	function getOdds($probs) {
			# Find odds in odds.txt
			$file = fopen("odds.txt", "r") or die("UNABLE TO OPEN FILE YA TWAT");
			$odds_float = 0;
			$odds_string = 0;
			$final_odds_string = "undefined";
			while($probs > $odds_float) {
				$final_odds = $odds_string;
				$line = fgets($file);
				$exploded_line = explode(",", $line);
				$odds_float = $exploded_line[0];
				$odds_string = $exploded_line[1];
			}
			fclose($file);
			return $final_odds;
		}
	
	function generateMatch() {
		# Generate Random Matchup
		include_once("db.php");
		# Get two random players
		$x = mt_rand(1,100);
		$y = mt_rand(1,100);
		while ($y == $x) {
			$y = mt_rand(1,100);
		}
		$sql = "SELECT * FROM players WHERE id = $x";
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($query);
		$player1 = $row['name'];
		$player1rank= $row['rank'];
		$sql = "SELECT * FROM players WHERE id = $y";
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($query);
		$player2 = $row['name'];
		$player2rank = $row['rank'];
		
		#Switch them if player2 rank > player1 rank
		if ($player2rank > $player1rank) {
			$tempplayer = $player1;
			$temprank = $player1rank;
			$player1 = $player2;
			$player1rank = $player2rank;
			$player2 = $tempplayer;
			$player2rank = $temprank;
		}
		
		# Do calculations
		$x = $player1rank;
		$y = $player2rank;
		$p_win = ((($x * $x) - ($y * $y)) + 10000000)/10000000;
		if ($p_win == 0) {
			$p_win = 1.001;
		}
		$p1_30 = (( 2 * (($x * $x) - ($y * $y))) + 10000000)/10000000;
		$p2_30 = ($p1_30) * 3;
		$p1_4stock = (1/$p_win) * 4;
		$p2_4stock = ($p_win) * 4;
		$p_game5 = round(2 * ((($x * $x) - ($y * $y)) + 10000000)/10000000);
		
		$p_win = getOdds($p_win);
		$p1_30 = getOdds($p1_30);
		$p2_30 = getOdds($p2_30);
		$p_game5 = getOdds($p_game5);
		$p1_4stock = getOdds($p1_4stock);
		$p2_4stock = getOdds($p2_4stock);
		
		# Put Match into Database
		$x = 0;
		$sql_store = "INSERT into matches (id, player1, player2, odds, status, p1_30, p2_30, p1_4stock, p2_4stock, p_game5) VALUES (NULL, '$player1' , '$player2', '$p_win', '$x' , '$p1_30', '$p2_30', '$p1_4stock', '$p2_4stock', '$p_game5')" ;
		mysqli_query($db, $sql_store) or die(mysql_error());
	}
?>