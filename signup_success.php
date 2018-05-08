<?php
	session_start();
	//redirect to the user_home page if user's session is still on
	if (isset($_SESSION['userSession'])!="") {
		header("Location: user_home.php");
	}
	
?>



<!DOCTYPE html>
<!-- GROUP 1 PROJECT -->

<html>

	<head>
		<meta charset = "utf-8"/>
		<title>FoodStop | Login</title>
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
					<li><a href="listings.php">Listings</a></li>
					<li><a href="aboutus.html">About Us</a></li>
				</ul>
			</nav>
		</header>
			<div class="sidenav">
				<p><span>Log in to:<span></p>
				<ul>
					<li>Make Reservations</li>
					<li>View Your Reservations</li>
					<li>Play a Dice Game</li>
				</ul>
			</div>
			<div class="content">
			<div>
			<?php			
				
				include_once 'inc_dbconn.php';
				
				if (isset($_POST['loginBtn'])) {
					
					$username = strip_tags($_POST['username']); //strip off all tags in the entry
					$password = strip_tags($_POST['password']); //strip off all tags in the entry
					
					$username = $connection->real_escape_string($username); //escape all special characters in the entry
					$password = md5($connection->real_escape_string($password)); //escape all typed characters in the entry and encrypt the password
					
			
					$result;
					$sql = "SELECT * FROM tbl_users WHERE username='$username' AND password = '$password'";
					
					try {
						$result = $connection->query($sql);
						$count = $result->num_rows;
						$row = $result->fetch_assoc();
						//if the query returned a record in the database
						if ($count == 1){
							$_SESSION['userSession'] = $row['user_id'];
							header("Location: user_home.php");
						} else {
							echo "Invalid Username or Password";
						} //end if else record exists check
					} catch (Exception $e){
						die("Error in retrieving records. " . $e->getMessage()); //handle query error
					}
					
					$connection->close();
				}			
			?>
			</div>
				<div class="formheader">You are successfully registered</div>
				<h2>Login with your credentials below!</h2>
				<form action="login.php" method="POST">
					<label>Username: </label><input type="text" name="username" id="usernameID" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" required />
					<label>Password: </label><input type="password" name="password" id="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>" required />				
					<button type="submit" class="signupbtn" name="loginBtn"/>Login</button><button type="reset" class="cancelbtn">Reset</button>
				</form>
			</div>
			
		</div>
	</body>

</html>