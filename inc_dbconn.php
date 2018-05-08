<?php
	$host = "localhost";
	$uname = "root";
	$pword = "";
	$db = "foodstop";

	$connection = new mysqli($host, $uname, $pword, $db);
	
	if ($connection->errno){
		die ("Error in Connection to Database ". $connection->error . PHP_EOL);
	}
?>