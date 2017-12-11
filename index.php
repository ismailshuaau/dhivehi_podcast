<?php 
include("includes/config.php");

	if(isset($_SESSION['userLoggedIn'])) {
		$userLoggedIn = $_SESSION['userLoggedIn'];
	} else {
		header("Location: register.php"); 
	}
?>

<html lang="en">
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
	<body>
		<div class="now-playingbar-container">
			<div class="now-playing-bar">
				<div class="now-playing-left">
					
				</div>
				<div class="now-playing-center">
					<div class="content player-controls">
						<div class="buttons">
							<button class="control-button fa fa-random" aria-hidden="true" title="shuffle" alt="shuffle"></button>
							<button class="control-button fa fa-caret-left" aria-hidden="true" title="previouse" alt="previouse"></button>
							<button class="control-button fa fa-play-circle" aria-hidden="true" title="play" alt="play"></button>
							<button class="control-button fa fa-pause-circle" aria-hidden="true" title="pause" alt="pause"></button>
							<button class="control-button fa fa-caret-right" aria-hidden="true" title="next" alt="next"></button>
							<button class="control-button fa fa fa-repeat" aria-hidden="true" title="repeat" alt="repeat"></button>
						</div> <!-- buttons -->
						<div class="play-back-bar">
							<span class="progress-time current">0.00</span>
							<div class="pogress-bar"></div>
							<span class="progress-time remaining">0.00</span>	
						</div>
					</div>
				</div>
				<div class="now-playing-right">
					
				</div>
			</div> <!-- now-playing-bar -->
		</div>
	</body>

</html>