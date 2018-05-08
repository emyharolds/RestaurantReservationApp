<!-- GROUP 1 PROJECT -->
<?php
	session_start();
	
	if (isset($_SESSION['userSession'])!="") {
	header("Location: user_home.php");
	exit;
	}	
	?>
	
<!DOCTYPE html>
<html> 

	<head>
		<meta charset = "utf-8"/>
		<title>FoodStop | Sign Up</title>
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
				<p>New? <em><a href="signup.php">Sign Up</a></em>; Returning? <em><a href="login.php">Login</a></em></p>
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
				<p><span>Sign up to:</span></p>
				<ul>
					<li>Make Reservations</li>
					<li>View Your Reservations</li>
					<li>Play a Dice Game</li>
				</ul>
		</div>
		<div class="content">
			<div class="formheader">Sign Up Form</div>
				<form method="POST" action="signup.php">
					<label>Surname: </label><span id="errSurname">*</span><input type="text" name="surname" id="surnameInput" value="<?php if (isset($_POST['signupBtn'])){echo $_POST['surname'];} ?>"/>
					<label>Other Names: </label><span id="errOthernames">*</span><input type="text" name="othernames" id="othernamesInput" value="<?php if (isset($_POST['signupBtn'])){echo $_POST['othernames'];} ?>"/>
					<label>Preferred Username: </label><span id="errUsername">*</span><input type="text" name="username" id="usernameInput" value="<?php if (isset($_POST['signupBtn'])){echo $_POST['username'];}?>" />
					<label>Preferred Password: </label><span id="errPassword">*</span><input type="password" name="cpassword" id="cpasswordInput" value="<?php if (isset($_POST['signupBtn'])){echo $_POST['cpassword'];} ?>" />
					<label>Confirm Password: </label><span id="errcPassword">*</span><input type="password" name="password" id="passwordInput" value="<?php if (isset($_POST['signupBtn'])){echo $_POST['password'];} ?>" />
					<label>Email Address: </label><span id="errEmail">*</span><input type="email" name="email" id="emailInput" value="<?php if (isset($_POST['signupBtn'])){echo $_POST['email'];}?>"/>
				
					<input type="submit" class="signupbtn" name="signupBtn" value="Sign Up"/>
					<input type="reset"  class="cancelbtn" value="Reset"/>
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
					
					if(isset($_POST['signupBtn'])){
						if (validate($_POST['surname'])){
							$surname = $_POST['surname'];
							if (validate($_POST['othernames'])){
								$othernames = $_POST['othernames'];
								if (validate($_POST['username'])){
									$username = $_POST['username'];
									if (validate($_POST['cpassword'])){
										$cpassword = $_POST['cpassword'];
										if ((validate($_POST['password'])) AND ($_POST['cpassword'] == $cpassword)){
											$password = $_POST['password'];
											if(validate($_POST['email'])){
												$email = $_POST['email'];
												include_once 'dbconnection.php';
											} else {
												echo "Email is invalid";
											}//end if else email validation											
										} else {
											echo "Your retyped passwords do not match";
										}//end if else retype password validation
									} else {
										echo "Password is invalid";
									}//end if else password validation
								} else {
									echo "Username is invalid";
								}//end if else username validation
							} else {
								echo "Other Names is invalid";
							}//end if else othernames validation
						} else {
							echo "Surname is invalid!";
						}//end if else surname validation
					}			
									
				?></span>
			</div>
			</div>
		</div>
	</body>

</html>