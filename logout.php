<?php
	session_start();
	//if there's no current userSession parameter in the SESSION superglobal
	//redirect to Login Page
	if (!isset($_SESSION['userSession'])) {
	header("Location: login.php");
	}
	
	//if the user sends a GET request with a logout parameter,
	//unset the userSession parameter and destroy the session
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['userSession']);
	header("Location: index.html");
}

?>