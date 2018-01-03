<?php

	if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
		include("includes/config.php");
		include("includes/classes/User.php");
		include("includes/classes/Artist.php");
		include("includes/classes/Album.php");
		include("includes/classes/Song.php");

		if (isset($_GET['userLoggedIn'])) {
			$userLoggedIn = new User($pdo, $_GET['userLoggedIn']);
		}
		else {
			echo "<strong>Hint:</strong> Please pass the username variable. <br>  Please check the openPage JS function";
			exit();
		}
	}
	else {
		include('includes/page-top.php');	// Header
		include('includes/page-bottom.php');	// Footer
		
		$url = $_SERVER['REQUEST_URI'];
		echo "<script>openPage('$url')</script>";
		exit();
	}

?>