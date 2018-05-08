<?php
	
	$reserveNumber = mysqli_real_escape_string($connection, $_POST['reserveNumber']);
	$reserveDate = mysqli_real_escape_string($connection, $_POST['reserveDate']);
	$reserveTime = mysqli_real_escape_string($connection, $_POST['reserveTime']);
	
	$insert_query = "INSERT INTO tbl_reservation (reservation_date, reservation_time, reservation_for, user_id, restaurant_id, date_of_reserve)
					VALUES ('$reserveDate' , '$reserveTime' , '$reserveNumber', '$userid', '$rest_id', now());";
	
	try {
		if($connection->query($insert_query)){
			//send the sql insert query,
			header("Location: reservation_confirmation.php");
			$_POST[] = array();
		} else {
			//die
			throw new Exception("The reservation booking attempt failed. Please try again!". $connection->error);
		}//end if else query check
	} catch (Exception $e){
		die("Error: " . $e->getMessage());//error handling
	}//end try catch block
		
	//close connection
		
	$connection->close();
?>