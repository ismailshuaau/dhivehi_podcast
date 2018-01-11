<?php 

	include("../../config.php");
	 /**************************************
	 * Check if user has entered the values
	 ***************************************/
	if(!isset($_POST['username'])) {
		echo "ERROR: Could not set username";
		exit();
	}

	if (!isset($_POST['oldPassword']) || !isset($_POST['newPassword1']) || !isset($_POST['newPassword2'])) {
		echo "Not all passwords have been set";
		exit();
	}

	if ($_POST['oldPassword'] == "" || $_POST['newPassword1'] == "" || $_POST['newPassword2'] == "") {
	echo "Please fill all the fields";
	exit();
	}

	 /*********************
	 * Update the password
	 **********************/

	// Get entered password
	$username = $_POST['username'];
	$oldPassword = $_POST['oldPassword'];
	$newPassword1 = $_POST['newPassword1'];
	$newPassword2 = $_POST['newPassword2'];

	// Encrpt the oldPassword
	$oldMd5 = md5($oldPassword);
	//  Check  password
	$passwordCheck = $pdo->prepare("SELECT * FROM users WHERE email='$username' AND password='$oldMd5'", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
	$passwordCheck->execute();

	$row = $passwordCheck->rowCount();
	if ($row != 1) {
		echo "Password is incorrect";
		exit();
	}

	if ($newPassword1 != $newPassword2) {
		echo "Your new passwords do not match";
		exit();
	}

	// Check if email is valid
	if(preg_match('/[^A-Za-z0-9]/', $newPassword1)) {
		echo "Your password must contain only letters and numbers";
		exit();
	}

	if (strlen($newPassword1) > 30 || strlen($newPassword1) < 5) {
		echo "Your username must be between 5 and 30 characters";
		exit();
	}

	// Encrypt new password
	$newMd5 = md5($newPassword1);

	$newPasswordQuery = $pdo->prepare("UPDATE users SET password='$newMd5' WHERE email='$username'");
	$newPasswordQuery->execute();
	echo "Update Successful";

 ?>