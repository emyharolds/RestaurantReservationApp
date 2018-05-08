<?php
	session_start();
	
	include_once 'inc_dbconn.php';
	
	if(!isset($_SESSION['userSession'])){
		header("Location: login.php");
	}
	$sql = $connection->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
	$userRow = $sql->fetch_assoc();
	
	$connection->close();
?>
<!DOCTYPE html>
<!-- GROUP 1 PROJECT -->
<html>

	<head>
		<meta charset = "utf-8"/>
		<title>FoodStop | Home</title>
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
					<li class="active"><a href="user_home.php">Home</a></li>
					<li><a href="user_listings.php">View Our Listings</a></li>
					<li><a href="my_reservations.php">View My Reservations</a></li>
					<li><a href="dicegame.php">Play DiceMaster</a></li>
					<li><a href="user_aboutus.php">About Us</a></li>
					<li><a href="logout.php?logout">Log Out</a></li>
				</ul>
			</nav>
			<div class="headerimage"></div>
		</header>
			<div class="sidenav">
				<h2> QUICKLINKS </h2>
				<p><ul> 
					<li><a href="user_listings.php">View Listings</a></li>
					<li><a href="my_reservations.php">View Reservations</a></li>
					<li><a href="dicegame.php">Play DiceMaster</a></li>
					<li><a href="user_aboutus.php">About Us</a></li>
				</ul></p>			
			</div>
			<div class="content">
				<h1 class="formheader">Our Mission @ FoodStop.com</h1>
				<p>Foodstop is a fictitious restaurant search and discovery service founded in 2017 by 
				<a href="https://www.facebook.com/emyharolds">Harold Okafor</a>, 
				<a href="https://www.facebook.com/dond.digvijay">Digvijay Dond</a> and 
				<a href="https://www.facebook.com/sudhir.hebbalkar">Sudhir Hebbalkar</a> who are Students of University of Central Missouri.
				It currently operates in Kansas City, Overland Park and Warrensburg city limits. The service allows users to select restaurants and/or their preferred dishes.
				Our mission is to bring people and great places to eat closer together. 
				This website will help you filter Restaurants according to the cost, choice and convenience - Our 3 C's. 
				Hope you enjoy our services and please drop a feedback. 
				</p>
				<p>Happy Fooding Folks</p>			
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