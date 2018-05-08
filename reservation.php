<!-- GROUP 1 PROJECT -->
<?php
	session_start();
	
	include_once 'inc_dbconn.php';
	
	if(!isset($_SESSION['userSession'])){
		header("Location: login.php");
	}
	$sql = $connection->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
	$userRow = $sql->fetch_assoc();
	
	$userid = $userRow['user_id'];

	if(isset($_GET['1'])){
		$rest_query = $connection->query("SELECT * FROM tbl_restaurants WHERE restaurant_id=1");
	} else if (isset($_GET['2'])){
		$rest_query = $connection->query("SELECT * FROM tbl_restaurants WHERE restaurant_id=2");
	} else if (isset($_GET['3'])){
		$rest_query = $connection->query("SELECT * FROM tbl_restaurants WHERE restaurant_id=3");
	} else if (isset($_GET['4'])){
		$rest_query = $connection->query("SELECT * FROM tbl_restaurants WHERE restaurant_id=4");
	} else if (isset($_GET['5'])){
		$rest_query = $connection->query("SELECT * FROM tbl_restaurants WHERE restaurant_id=5");
	} else if (isset($_GET['6'])){
		$rest_query = $connection->query("SELECT * FROM tbl_restaurants WHERE restaurant_id=6");
	} else {header("Location: user_listings.php");}
	
	$restaurant = $rest_query->fetch_assoc();
	$rest_id = $restaurant['restaurant_id'];
	$select_menu = $connection->query("SELECT * FROM tbl_menus WHERE restaurant_id=".$rest_id);
?>
	
<!DOCTYPE html>
<html>

	<head>
		<meta charset = "utf-8"/>
		<title>FoodStop | Make Reservation</title>
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
			<?php
				$menu_option = '';
				
				while ($select_query = $select_menu->fetch_assoc()){
					$menu_option .= '<option value="'.$select_query['menu_id'].'">'.$select_query['menu_name'].'</option>';
				}//end while loop
			?>
			<div class="formheader">Reservation Form</div>
				<form method="POST" action="">
					<p><label>You wish to make a reservation for </label><span><?php echo $restaurant['restaurant_name'] ?></span> restaurant</p>
					<label>How many people are you making this reservation for: : </label><span id="errSurname">*</span><input type="number" name="reserveNumber" id="reserveNoInput" value="<?php if (isset($_POST['reservationBtn'])){echo $_POST['reserveNumber'];} ?>"/>
					<label>Date: </label><span id="errOthernames">*</span><input type="date" name="reserveDate" id="dateInput" value="<?php if (isset($_POST['reservationBtn'])){echo $_POST['reserveDate'];} ?>"/>
					<label>Time: </label><span id="errUsername">*</span><input type="time" name="reserveTime" id="timeInput" value="<?php if (isset($_POST['reservationBtn'])){echo $_POST['reserveTime'];}?>" />
					<label>Available Menus:  <i>Select at least one</i></label><span id="errPassword">*</span>
						<select name="menu_select" multiple="multiple">
							<?php echo $menu_option; ?>
						</select>
					<button type="submit" class="signupbtn" name="reservationBtn">Confirm Reservation</button>
					<button type="reset" class="cancelbtn" >Reset</button>
				</form>
				
			<div><span>
				<?php
				
					function validate($element){
						if (!empty($element) and !ctype_space($element)){							
							return true;
						} else {
							return false;
						}
					}
					
					if(isset($_POST['reservationBtn'])){
						if (validate($_POST['reserveNumber'])){
							$reserveNumber = $_POST['reserveNumber'];
							if (validate($_POST['reserveDate'])){
								$reserveDate = $_POST['reserveDate'];
								if (validate($_POST['reserveTime'])){
									$reserveTime = $_POST['reserveTime'];
									if($_POST['menu_select'] != 0){
										$menu_value = $_POST['menu_select'];
										include_once 'make_reservation.php';
									} else {
										echo "Please select a valid menu";
									}//end if else menu validation
								} else {
									echo "The reservation time is invalid";
								}//end if else time validation
							} else {
								echo "The reservation date is invalid";
							}//end if else date validation
						} else {
							echo "The selection for reservation for number of people is invalid";
						}//end if else number validation
					}													
				?></span>
			</div>
		</div>					
			
		</div>
	</body>

</html>