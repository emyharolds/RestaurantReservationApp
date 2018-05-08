<!-- GROUP 1 PROJECT -->
<?php
	session_start();
	
	include_once 'inc_dbconn.php';
	
	if(!isset($_SESSION['userSession'])){
		header("Location: login.php");
	}
	
	try{
		$sql = $connection->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
		$userRow = $sql->fetch_assoc();
		
		$get_reservation = "SELECT * FROM tbl_reservation WHERE user_id=".$_SESSION['userSession']." ORDER BY reservation_id DESC LIMIT 1";	
		$reservation = $connection->query($get_reservation);
		$reserve_query = $reservation->fetch_assoc();
		
		$get_restaurant = "SELECT restaurant_name FROM tbl_restaurants WHERE restaurant_id=".$reserve_query['restaurant_id'];
		$restaurant = $connection->query($get_restaurant);
		$rest_array = $restaurant->fetch_assoc();
		
	} catch (Exception $e){
		die("Error in Database Query: " . $e->getMessage());
	}
	
	$connection->close();
?>
	
<!DOCTYPE html>
<html>

	<head>
		<meta charset = "utf-8"/>
		<title>FoodStop | Confirm Reservation</title>
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
				<p>Welcome <span><b><?php echo $userRow['surname'].", ". $userRow['other_names'];?></b></span></p>
			</div>
			<nav>
				<ul>
					<li><a href="user_home.php">Home</a></li>
					<li><a href="user_listings.php">View Our Listings</a></li>
					<li><a href="my_reservations.php">View My Reservations</a></li>
					<li><a href="dicegame.php">Play DiceMaster</a></li>
					<li><a href="user_aboutus.php">About Us</a></li>
					<li><a href="logout.php?logout">Log Out</a></li>
				</ul>
			</nav>
			<div></div>
		</header>
		<div class="sidenav">
				<h2> QUICKLINKS </h2>
				<p><ul> 
					<li><a href="user_home.php">Home</a></li>
					<li><a href="user_listings.php">View Listings</a></li>
					<li><a href="dicegame.php">Play DiceMaster</a></li>
					<li><a href="user_aboutus.php">About Us</a></li>
					<li><a href="logout.php?logout">Log Out</a></li>
				</ul></p>			
			</div>
			<div class="content">
			<div class="formheader">Your Reservation is successful!</div>
				<h2>Below are the details of your reservation:</h2>
					<p><label>Reservation for #: <span><?php echo $reserve_query['reservation_for'] ?>  persons</span></label></p>
					<p><label>Date: <span><?php echo $reserve_query['reservation_date'] ?></label></span></p>
					<p><label>Time: <span><?php echo $reserve_query['reservation_time'] ?></label></span></p>
					<p><label>Restaurant: <span><?php echo $rest_array['restaurant_name'] ?></label></span></p>					
					<p><label>You made this reservation on: <span><?php echo $reserve_query['date_of_reserve'] ?></span></label></p>					
				
					<div><button class="signupbtn" onclick="window.location.href='my_reservations.php'">View all my reservations</button></div>
				</form>				
			</div>					
			
			<div id="footer"></div>
			<div></div>
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