<!-- GROUP 1 PROJECT -->
<?php
	session_start();
	
	include_once 'inc_dbconn.php';
	
	if(!isset($_SESSION['userSession'])){
		header("Location: login.php");
	}
	$sql = $connection->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
	$userRow = $sql->fetch_assoc();
	
	$get_reservation = "SELECT * FROM tbl_reservation WHERE user_id=".$_SESSION['userSession']." ORDER BY reservation_id";	
	$reservation = $connection->query($get_reservation);
	$numRows = $reservation->num_rows;

?>
	
<!DOCTYPE html>
<html>

	<head>
		<meta charset = "utf-8"/>
		<title>FoodStop | View Reservations</title>
		<link rel = "stylesheet" type = "text/css" href = "css/style.css"/> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style type="text/css">
			table, thead {
				background-color: lightgray;
				border-collapse: collapse;
				border: 1px solid #CC0000;
				vertical-align: left;}
			td, th {
				padding: 5px;
				vertical-align: left;
				border: 1px solid #CC0000;}
			tr:nth-child(odd) {
				background-color: white; }
		</style>
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
					<li class="active"><a href="my_reservations.php">View My Reservations</a></li>
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
					<li><a href="user_listings.php">View Listings</a></li>
					<li><a href="dicegame.php">Play DiceMaster</a></li>
					<li><a href="user_aboutus.php">About Us</a></li>
					<li><a href="logout.php?logout">Log Out</a></li
				</ul></p>			
			</div>
			<div class="content">
			<table>
				<thead>
				<tr><th><span>S/N</span></th><th><span>Persons</span></th><th><span>Date</span></th><th><span>Time</span></th><th><span>Restaurant<span></th><th><span>Date/Time Placed<span></th></tr></b>
				</thead>
				<tbody>
				<?php 
					$status='';$i=1;
				if($numRows>0){
					while($reserve_query = $reservation->fetch_assoc()){
						$get_restaurant = $connection->query("SELECT * FROM tbl_restaurants WHERE restaurant_id=".$reserve_query['restaurant_id']);
						$restaurant = $get_restaurant->fetch_assoc();
						echo '<tr><td>'.$i.'</td><td>'.$reserve_query['reservation_for'].'</td><td>'.$reserve_query['reservation_date'].'</td><td>'.$reserve_query['reservation_time'].'</td><td>'.$restaurant['restaurant_name'].'</td><td>'.$reserve_query['date_of_reserve'].'</td></tr>';
							$i++;
						}
				} else {
						echo '<tr><td colspan="6">You have no reservation yet!</td></tr>';
					}
					
				
				?>
				</tbody>
			</table>				
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
<?php $connection->close(); ?>