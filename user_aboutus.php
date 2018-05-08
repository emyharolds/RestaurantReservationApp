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
		<title>FoodStop | About Us</title>
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
					<li class="active"><a href="user_aboutus.php">About Us</a></li>
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
					<li><a href="my_reservations.php">View Reservations</a></li>
					<li><a href="dicegame.php">Play DiceMaster</a></li>
				</ul></p>			
			</div>
			<div class="content">
				<h2 class="formheader">SCHEDULE OF TASKS</h2>
				<h3>Digvijay Rajendra Dond </h3>
				<ul>
					<li>Worked on the Home and Index pages</li>
					<li>Worked on the Listings Page and connecting to the database</li>
					<li>Worked on the Login and SignUp Pages</li>
					<li>Worked on the Reservations Page, and linking it to the database</li>
				</ul>
				<h3>Sudhir Sataba Hebbalkar</h3>
				<ul>
					<li>Provided all images, texts and content used in the project</li>
					<li>Worked on connecting the Sign Up, Login and Logout pages to the database</li>
					<li>Worked on the database connection PHP page</li>
					<li>Worked on the About Us Page</li>
				</ul>
				<h3>Harold Nnaemeka Okafor</h3>
				<ul>
					<li>Worked on the DiceGame</li>
					<li>Worked on the site's CSS styling</li>
					<li>Worked on setting up the database and its tables and queries</li>
					<li>Worked on the Reservation Confirmation and View Reservations pages</li>
				</ul>
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