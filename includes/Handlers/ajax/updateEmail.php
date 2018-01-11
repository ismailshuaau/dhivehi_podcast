<?php 

	include("../../config.php");

	if(!isset($_POST['username'])) {
		echo "ERROR: Could not set username";
		exit();
	}

	if (isset($_POST['email']) && $_POST['email'] != "") {
		$username = $_POST['username'];
		$email = $_POST['email'];
		// Validate email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "Email is not valid";
			exit();
		}
		// Check if the username is already use by another user
		$emailCheck = $pdo->prepare("SELECT email FROM users WHERE email='$email' AND email !='$username'", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		$emailCheck->execute();

		$row = $emailCheck->rowCount();
		if ($row > 0) {
			echo "Email is in use";
			exit();
		}

		$updateQuery = $pdo->prepare("UPDATE users SET email = '$email' WHERE email='$username'");
		$updateQuery->execute();
		echo "Update Sucessful";


	} else {
		echo "Email required";
	}
 ?>