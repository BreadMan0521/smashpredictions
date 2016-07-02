<?php
	session_start();
	
	function createList() {
		include_once("db.php");
		$stat = 1;
		$sql = "SELECT * FROM matches WHERE status='$stat'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result);
		$match_id = $row['id'];
		// Current Match
		$player1 = $row['player1'];
		$player2 = $row['player2'];
		$odds = $row['odds'];
		$p1_30 = $row['p1_30'];
		$p2_30 = $row['p2_30'];
		$p1_4stock = $row['p1_4stock'];
		$p2_4stock = $row['p2_4stock'];
		$p_game5 = $row['p_game5'];
		
		if(1==1) { ?>
		
		<div id="current_match_border">
				<div id="current_match">
					<div id="current_match_title"> Next Match: </div>
					<div id="current_match_player1" class="current_match_player">
						<div id="current_match_player1_name" class="current_match_player_name"><?php echo $player1; ?></div>
						<div id="current_match_player1_mains"></div>
						<div id="current_match_player1_input" class="current_match_player_input">
							<form action = "index.php" method = "POST">
								<input class="current_match_input_box" placeholder = "0" type = "text" name = "current_match_wager1" class = "box"/></br>
								<input class="current_match_submit_button" name = "submit" type = "submit" value = " Submit "/>
							</form>
						</div>
					</div>
					<div id="current_match_player2" class="current_match_player">
						<div id="current_match_player2_name" class="current_match_player_name"> <?php echo $player2; ?> </div>
						<div id="current_match_player2_mains"></div>
						<div id="current_match_player2_input" class="current_match_player_input">
							<form action = "index.php" method = "POST">
								<input class="current_match_input_box" placeholder = "0" type = "text" name = "current_match_wager2" class = "box" /></br>
								<input class="current_match_submit_button" name = "submit" type = "submit" value = " Submit "/>
							</form>
						</div>
					</div>
					<div id="current_match_odds">
						<div><?php echo $odds; ?></div>
					</div>
					<div id="current_match_more_options">
						<a href="#" id="more_options" onclick="toggleOptions()"> More options </a>
					</div>
				</div>
				</div>
				<div id="current_match_hidden" style="display:none">
					<div class="hidden_player hidden_player1">
						<div class="thirty">
							<div class="wins_3-0"> <?php echo $player1; ?> wins 3-0 </div>
							<form action = "index.php" method = "POST">
								<input class="hidden_input_box" placeholder = "0" type = "text" name = "player1_3-0" class = "box" /></br>
								<input class="hidden_match_submit_button" name = "submit" type = "submit" value = "Submit"/>
							</form>
							<div class="hidden_player_3-0_odds hidden_odds"><?php echo $p1_30; ?></div>
						</div>
						<div class="poopage">
							<div class="fourstocks"> <?php echo $player1; ?> "4 stocks" <?php echo $player2; ?> </div>
							<form action = "index.php" method = "POST">
								<input class="hidden_input_box" placeholder = "0" type = "text" name = "player1_fourstock" class = "box" /></br>
								<input class="hidden_match_submit_button" name = "submit" type = "submit" value = "Submit"/>
							</form>
							<div class="hidden_player_4stock_odds hidden_odds"><?php echo $p1_4stock; ?></div>
						</div>
					</div>
					<div class="hidden_player hidden_player2">
						<div class="thirty">
							<div class="wins_3-0"> <?php echo $player2; ?> wins 3-0 </div>
							<form action = "index.php" method = "POST">
								<input class="hidden_input_box" placeholder = "0" type = "text" name = "player2_3-0" class = "box" /></br>
								<input class="hidden_match_submit_button" name = "submit" type = "submit" value = "Submit"/>
							</form>
							<div class="hidden_player_3-0_odds hidden_odds"><?php echo $p2_30; ?></div>
						</div>
						<div class="poopage">
							<div class="fourstocks"> <?php echo $player2; ?> "4 stocks" <?php echo $player1; ?> </div>
							<form action = "index.php" method = "POST">
								<input class="hidden_input_box" placeholder = "0" type = "text" name = "player2_fourstock" class = "box" /></br>
								<input class="hidden_match_submit_button" name = "submit" type = "submit" value = "Submit"/>
							</form>
							<div class="hidden_player_4stock_odds hidden_odds"> <?php echo $p2_4stock; ?> </div>
						</div>
					</div>
					<div class="hidden_special_feed">
						<div class="hidden_special_title"> * Extras * </div>
						<div class="hidden_special">
							<div class="hidden_extra"> Match goes until one stock each on Game 5 </div>
							<div class="hidden_special_game5_odds hidden_odds"> <?php echo $p_game5; ?> </div>
							<form action = "index.php" method = "POST">
								<input class="hidden_input_box_special" placeholder = "0" type = "text" name = "first_extra" class = "box" /></br>
								<input class="hidden_match_submit_button_special" name = "submit" type = "submit" value = "Submit"/>
							</form>
						</div>
					</div>
				</div>
				<div id="upcoming_matches_title"> Upcoming Matches: </div>
					<div id="upcoming_matches">
		<?php }
		
		// Upcoming Matches
		
		include_once("db.php");
		$stat=0;
		$sql="SELECT * FROM matches WHERE status='$stat'";
		$result = mysqli_query($db, $sql);
		
		while($row = mysqli_fetch_array($result)) {
			$player1 = $row['player1'];
			$player2 = $row['player2'];
			$odds = $row['odds'];
			$match_id = $row['id'];
			$second_match_id = $match_id * $match_id;
			$p1_30 = $row['p1_30'];
			$p2_30 = $row['p2_30'];
			$p1_4stock = $row['p1_4stock'];
			$p2_4stock = $row['p2_4stock'];
			$p_game5 = $row['p_game5'];
			
			if (1==1) { ?> 
			<div class="upcoming_match">
					<div id="upcoming_match_player1" class="upcoming_match_player">
						<div id="upcoming_match_player1_name" class="upcoming_match_player_name"> <?php echo $player1; ?> </div>
						<div id="upcoming_match_player1_mains"></div>
					</div>
					<div class="upcoming_match_odds">
						<div><?php echo $odds; ?></div>
					</div>
					<div id="upcoming_match_player2" class="upcoming_match_player">
						<div id="upcoming_match_player2_name" class="upcoming_match_player_name"> <?php echo $player2; ?> </div>
						<div id="upcoming_match_player2_mains"></div>
					</div>
					<div class="upcoming_match_more_options">
						<a href="#" class="bring_up_match" param="<?php echo $match_id; ?>"> Click Here </a>
					</div>
			</div>
			<div class="menu_upcoming_match" style="display:none" id="<?php echo $match_id; ?>">
					<div class="upcoming_match_title"> This Match: </div>
					<div class="h_upcoming_match_player1" class="h_upcoming_match_player">
						<div class="h_upcoming_match_player_name"> <?php echo $player1; ?> </div>
						<div class="upcoming_match_player1_mains"></div>
						<div class="upcoming_match_player1_input" class="upcoming_match_player_input">
							<form action = "index.php" method = "POST">
								<input class="upcoming_match_input_box" placeholder = "0" type = "text" name = "upcoming_match_wager1" class = "box"/></br>
								<input class="upcoming_match_submit_button" name = "submit" type = "submit" value = " Submit "/>
							</form>
						</div>
					</div>
					<div class="h_upcoming_match_player2" class="h_upcoming_match_player">
						<div class="h_upcoming_match_player_name"> <?php echo $player2; ?> </div>
						<div class="upcoming_match_player2_mains"></div>
						<div class="upcoming_match_player2_input" class="upcoming_match_player_input">
							<form action = "index.php" method = "POST">
								<input class="upcoming_match_input_box" placeholder = "0" type = "text" name = "upcoming_match_wager2" class = "box" /></br>
								<input class="upcoming_match_submit_button" name = "submit" type = "submit" value = " Submit "/>
							</form>
						</div>
					</div>
					<div class="hidden_upcoming_match_odds">
						<div><?php echo $odds; ?></div>
					</div>
					<div class="h_upcoming_match_more_options">
						<a href="#" class="bring_up_more_options" param="<?php echo $second_match_id; ?>"> More Options </a>
					</div>
				</div>
				<div class="upcoming_match_hidden" id="<?php echo $second_match_id; ?>" style="display:none">
					<div class="hidden_player hidden_player1">
						<div class="thirty">
							<div class="wins_3-0"> <?php echo $player1; ?> wins 3-0 </div>
							<form action = "index.php" method = "POST">
								<input class="hidden_input_box" placeholder = "0" type = "text" name = "player1_3-0" class = "box" /></br>
								<input class="hidden_match_submit_button" name = "submit" type = "submit" value = "Submit"/>
							</form>
							<div class="hidden_player_3-0_odds hidden_odds"><?php echo $p1_30; ?></div>
						</div>
						<div class="poopage">
							<div class="fourstocks"> <?php echo $player1; ?> "4 stocks" <?php echo $player2; ?> </div>
							<form action = "index.php" method = "POST">
								<input class="hidden_input_box" placeholder = "0" type = "text" name = "player1_fourstock" class = "box" /></br>
								<input class="hidden_match_submit_button" name = "submit" type = "submit" value = "Submit"/>
							</form>
							<div class="hidden_player_4stock_odds hidden_odds"> <?php echo $p1_4stock; ?> </div>
						</div>
					</div>
					<div class="hidden_player hidden_player2">
						<div class="thirty">
							<div class="wins_3-0"> <?php echo $player2; ?> wins 3-0 </div>
							<form action = "index.php" method = "POST">
								<input class="hidden_input_box" placeholder = "0" type = "text" name = "player2_3-0" class = "box" /></br>
								<input class="hidden_match_submit_button" name = "submit" type = "submit" value = "Submit"/>
							</form>
							<div class="hidden_player_3-0_odds hidden_odds"> <?php echo $p2_30; ?> </div>
						</div>
						<div class="poopage">
							<div class="fourstocks"> <?php echo $player2; ?> "4 stocks" <?php echo $player1; ?> </div>
							<form action = "index.php" method = "POST">
								<input class="hidden_input_box" placeholder = "0" type = "text" name = "player2_fourstock" class = "box" /></br>
								<input class="hidden_match_submit_button" name = "submit" type = "submit" value = "Submit"/>
							</form>
							<div class="hidden_player_4stock_odds hidden_odds"> <?php echo $p2_4stock; ?> </div>
						</div>
					</div>
					<div class="hidden_special_feed">
						<div class="hidden_special_title"> * Extras * </div>
						<div class="hidden_special">
							<div class="hidden_extra"> Match goes until one stock each on Game 5 </div>
							<div class="hidden_special_game5_odds hidden_odds">  <?php echo $p_game5; ?> </div>
							<form action = "index.php" method = "POST">
								<input class="hidden_input_box_special" placeholder = "0" type = "text" name = "first_extra" class = "box" /></br>
								<input class="hidden_match_submit_button_special" name = "submit" type = "submit" value = "Submit"/>
							</form>
						</div>
					</div>
				</div>

			<?php
			
			
				
			}
		}
	}
?>