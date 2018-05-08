<?php
	$host = "localhost";
	$uname = "root";
	$pword = "";
	$db = "foodstop";

	$connection = new mysqli($host, $uname, $pword, $db);
	
	$surname = mysqli_real_escape_string($connection, $_POST['surname']);
	$othernames = mysqli_real_escape_string($connection, $_POST['othernames']);
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	
	$password = md5($password);

	
	if ($connection->errno){
		die ("Error in Connection to Database ". $connection->error . PHP_EOL);
	}
	try {
		$check_duplicates = $connection->query("SELECT username, email FROM tbl_users WHERE username = '$username' OR email = '$email' ");
		$count = $check_duplicates->num_rows;
		
		if ($count == 0){
			$signupQuery = "INSERT INTO tbl_users (username, password, email, surname, other_names) VALUES ('$username', '$password', '$email', '$surname', '$othernames')";
			
			if ($connection->query($signupQuery)){
				header("Location: signup_success.php");//redirect to successful login page
				$_POST[] = array();
			} else {
				throw new Exception("There was an error with your registration. Try again? ". $connection->error);
			}
		} else {
			echo "Sorry, the username or email is currently taken";
		}
	} catch (Exception $e){
		die("Error. " . $e->getMessage());
	}
	
	$connection->close();
?>