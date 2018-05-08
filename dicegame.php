<!DOCTYPE html>
<!-- GROUP 1 PROJECT -->
<?php
	session_start();
	
	include_once 'inc_dbconn.php';
	
	if(!isset($_SESSION['userSession'])){
		header("Location: login.php");
	}
	$sql = $connection->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
	$userRow = $sql->fetch_array();
	
	$connection->close();
?>
<html>

	<head>
		<meta charset = "utf-8"/>
		<title>FoodStop | DiceGame</title>
		<link rel = "stylesheet" type = "text/css" href = "css/style.css"/> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script type = "text/javascript" src = "dicemaster.js"></script>
	</head>
	
	<body>
		<div class="mainbody">
		<header>
			<div class="mainheader">
			<div class="title">FoodStop.com<span>...Find Food Fast...</span></div>			
			</div>
			<div class="navlogin">
				<p>Welcome <span><b><?php echo $userRow['surname'].", ". $userRow['other_names'];?></b></span></p>
			</div>
			<nav>
				<ul>
					<li><a href="user_home.php">Home</a></li>
					<li><a href="user_listings.php">View Our Listings</a></li>
					<li><a href="my_reservations.php">View My Reservations</a></li>
					<li class="active"><a href="dicegame.php">Play DiceMaster</a></li>
					<li><a href="user_aboutus.php">About Us</a></li>
					<li><a href="logout.php?logout">Log Out</a></li>
				</ul>
			</nav>
			<div></div>
		</header>
			<div class="sidenav">
				<div class="formheader">DiceMaster Menu</div>
				<p>Set Min. Value: <input type="number"id="minPlay" min="2" required /><span id="errMsgMin"></span></p>
				<p>Set Max. Value: <input type="number" id="maxPlay" min="2" required /><span id="errMsgMax"></span></p>
				<p>Rounds of Play: <input type="number" id="gameLimit" min="1"required /><span id="errMsgLimit"></span></p>
				<button id="startBtn">Play DiceMaster</button>
				<button id="resetBtn">Reset Game</button>
			</div>
			<div class="content">
				<table>
				<thead>
					<tr><th colspan="2" id="winnerText"></th></tr>
					<tr><th colspan="2">PLAYING A GAME OF <label id="gameLimitLabel"></label> ROUNDS</th></tr>
					<tr>
						<th>YOUR WIN TALLY</th>
						<th>COMPUTER WIN TALLY</th>
					</tr>				
					<tr>
						<th id="yourTally">0</th>
						<th id="computerTally">0</th>
					</tr>
					<tr><th colspan="2">DiceMaster Target Score: <label id="scoreLabel"></label></th></tr>
					<tr>
						<th>Your New Target Score: <label id="yourScoreLabel"></label></th>
						<th>Computer New Target Score: <label id="computerScoreLabel"></label></th>					
					</tr>
				</thead>
				<tbody>
					<tr>
						<td id="youCell"><img src = "img/dice.jpg" height="130px" id="imgYourDice1"/><img src = "img/dice.jpg" height="130px" id="imgYourDice2"/></td>
						<td id="computerCell"><img src = "img/dice.jpg" height="130px" id="imgComputerDice1"/><img src = "img/dice.jpg" height="130px" id="imgComputerDice2"/></td>
					</tr>
					<tr>
						<th>Your Dice Value: <label id="yourDiceLabel"></label></th>
						<th>Computer Dice Value: <label id="computerDiceLabel"></label></th>					
					</tr>
					<tr>
						<th colspan="2">
							<button id="rollBtn">ROLL DICE</button>						
						</th>
					</tr>
					<tr>
						<th colspan="2" id="output"></th>
					</tr>

				</tbody>
			</table>
			</div>
			
		</div>
	</body>

</html>