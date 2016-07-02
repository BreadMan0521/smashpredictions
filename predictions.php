<?php 

	function generatePrediction($match_id, $user_id, $pred_type, $wager, $returns) {
		include_once("db.php");
		$status = 0;
		$sql="INSERT into predictions (id, match_id, user_id, type, wager, returns, status) VALUES (NULL, '$match_id', '$user_id', '$pred_type', '$wager', '$returns', '$status' )";
		mysqli_query($db, $sql) or die(mysql_error());
	}

	function payout($match_id, $results){
		include_once("db.php");
		$sql="SELECT from predictions WHERE match_id = $match_id";
		$table= mysqli_query($db, $sql);
		
		$x=0;
		$count = count($results);
		while($row = mysqli_fetch_array($table)) {
			for($i = 0; $i < $count; $i++) {
				if( $result[$i] == $row['type']) {
					// PAYOUT SUCCESS
					$lucky_user = $row['user_id'];
					$wager = $row['wager'];
					$multiplier = $row['returns'];
					
					$winnings = round($wager * $multiplier);
					
					$sql = "SELECT from users WHERE user_id = $lucky_user";
					$query = mysqli_query($db, $sql);
					$row = mysqli_fetch_array($query);
					$points_before = $row['points'];
					$new_points = $winnings + $points_before;
					
					$sql = "UPDATE users SET points= $new_points WHERE id = $lucky_user";
					mysqli_query($db, $sql);
					
					$x = 1;
					$prediction_id = $row['id'];
					$sql = "UPDATE predictions SET status = '$x' WHERE id = $prediction_id"
				} // payout success
			} // for loop through results array
			if ($x == 0){
				$x = 2;
				$prediction_id = $row['id'];
				$sql = "UPDATE predictions SET status = '$x' WHERE id = $prediction_id"
			} // payout failure
			$x = 0;
		} // loop through all with this match_id
	} // payout function
?>