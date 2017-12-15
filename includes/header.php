<?php 
include("includes/config.php");
include("includes/classes/Artist.php");

	if(isset($_SESSION['userLoggedIn'])) {
		$userLoggedIn = $_SESSION['userLoggedIn'];
	} else {
		header("Location: register.php"); 
	}
?>

	<!-- Header -->

	<head>
		 	<meta charset="utf-8">
		 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		 	<meta name="description" content="">
		 	<meta name="author" content="">
		 	<link rel="icon" href="../../../../favicon.ico">

		 	<title>Dhivehi Podcast</title>

		 	<!-- Bootstrap core CSS -->
		 	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		 	<!-- Fontawesome -->
		 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		 	<!-- Custom styles for this template -->
		 	<link rel="stylesheet" href="assets/css/style.css">
	</head>