<?php
	session_start();
	
	$select_taj = "SELECT * FROM tbl_restaurants WHERE restaurant_id=1";
	$select_ihop = "SELECT * FROM tbl_restaurants WHERE restaurant_id=2";
	$select_sawas = "SELECT * FROM tbl_restaurants WHERE restaurant_id=3";
	$select_hong = "SELECT * FROM tbl_restaurants WHERE restaurant_id=4";
	$select_main = "SELECT * FROM tbl_restaurants WHERE restaurant_id=5";
	$select_planet = "SELECT * FROM tbl_restaurants WHERE restaurant_id=6";
	
	include_once 'inc_dbconn.php';
	
	try {
		
		$sql_taj = $connection->query($select_taj);
		$taj_query = $sql_taj->fetch_assoc();
	
		$sql_ihop = $connection->query($select_ihop);
		$ihop_query = $sql_ihop->fetch_assoc();
		
		$sql_sawas = $connection->query($select_sawas);
		$sawas_query = $sql_sawas->fetch_assoc();
		
		$sql_hong = $connection->query($select_hong);
		$hong_query = $sql_hong->fetch_assoc();
		
		$sql_main = $connection->query($select_main);
		$main_query = $sql_main->fetch_assoc();
		
		$sql_planet = $connection->query($select_planet);
		$planet_query = $sql_planet->fetch_assoc();
	
	} catch (Exception $e){
		die("Error in Database Query: " . $e->getMessage());
	}


	
	$connection->close();
?>

<!DOCTYPE html>
<!-- GROUP 1 PROJECT -->
<html>

	<head>
		<meta charset = "utf-8"/>
		<title>FoodStop | Listings</title>
		<link rel = "stylesheet" type = "text/css" href = "css/style.css"/> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	
	<body>
		<div class="mainbody">
		<header>
			<div class="mainheader">
			<div class="title">FoodStop.com<span>...Find Food Fast...</span></div>			
			</div>
			<div class="navlogin">
				<p>New? <b><a href="signup.php">Sign Up</a></b>; Returning? <b><a href="login.php">Login</a></b></p>
			</div>
			<nav>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li class="active"><a href="listings.php">Listings</a></li>
					<li><a href="aboutus.html">About Us</a></li>
				</ul>
			</nav>
			<div></div>
		</header>
			<div class="sidenav">
				<h2> QUICKLINKS </h2>
				<p><ul> 
					<li><a href="index.html">Home</a></li>
					<li><a href="aboutus.html">About Us</a></li> 
					<li><a href="signup.php">Sign Up</a> or <a href="login.php">Login</a></li> 
				</ul></p>
			</div>
			
			<div class="content">
				<div class="block">
					<img src="img/Taj.jpg" alt="Taj" width="400">
					<div class="block-text">
						<div class="mainText"><?php echo $taj_query['restaurant_name']; ?></br>
						-------- o --------</div>
						<div class="subText">Address</br>
						<?php echo $taj_query['restaurant_address']; ?> </div>
						<div class="mainText">-------- o --------</div>
						<p><button onclick="window.location.href='reservation.php'">Make a Reservation</button></p>
					</div>
				</div>	
				
				<div class="block">
					<img src="img/ihop.jpg" alt="ihop" width="400">
					<div class="block-text">
						<div class="mainText"><?php echo $ihop_query['restaurant_name']; ?></br>
						-------- o --------</div>
						<div class="subText">Address</br>
						<?php echo $ihop_query['restaurant_address']; ?></div>
						<div class="mainText">-------- o --------</div>
						<p><button onclick="window.location.href='reservation.php'">Make a Reservation</button></p>
					</div>					
				</div>	
				
				<div class="block">
					<img img src="img/sawasdee.jpg" alt="Sawasdee" width="400">
					<div class="block-text">
						<div class="mainText"><?php echo $sawas_query['restaurant_name']; ?></br>
						-------- o --------</div>
						<div class="subText">Address</br>
						<?php echo $sawas_query['restaurant_address']; ?></div>
						<div class="mainText">-------- o --------</div>
						<p><button onclick="window.location.href='reservation.php'">Make a Reservation</button></p>
					</div>					
				</div>	
				
				<div class="block">
					<img src="img/hong.jpg" alt="Hong's Buffet" width="400">
					<div class="block-text">
						<div class="mainText"><?php echo $hong_query['restaurant_name']; ?></br>
						-------- o --------</div>
						<div class="subText">Address</br>
						<?php echo $hong_query['restaurant_address']; ?></div>
						<div class="mainText">-------- o --------</div>
						<p><button onclick="window.location.href='reservation.php'">Make a Reservation</button></p>
					</div>
				</div>	
				
				<div class="block">
					<img src="img/mainland.jpg" alt="mainland" width="400">
					<div class="block-text">
						<div class="mainText"><?php echo $main_query['restaurant_name']; ?></br>
						-------- o --------</div>
						<div class="subText">Address</br>
						<?php echo $main_query['restaurant_address']; ?></div>
						<div class="mainText">-------- o --------</div>
						<p><button onclick="window.location.href='reservation.php'">Make a Reservation</button></p>
					</div>					
				</div>	
				
				<div class="block">
					<img src="img/planet.jpg" alt="planet" width="400">
					<div class="block-text">
						<div class="mainText"><?php echo $planet_query['restaurant_name']; ?></br>
						-------- o --------</div>
						<div class="subText">Address</br>
						<?php echo $planet_query['restaurant_address']; ?></div>
						<div class="mainText">-------- o --------</div>
						<p><button onclick="window.location.href='reservation.php'">Make a Reservation</button></p>
					</div>					
				</div>	
				
			</div>
			<div id="footer"></div>
			<footer>
				<p>CONTACT DETAILS:  </p>
				<p>Office Address: <br/>
					#121 E. Hunt Avenue, Warrensburg, MO, 35120 <br/>
					USA<br/>
					Phone: 660 525 5090 <br/>
					Fax: 660 238 5614</p>
			</footer>
		</div>
	</body>

</html>