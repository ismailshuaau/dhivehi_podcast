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

		<div class="main-container">
			<div class="top-container">
				<div class="sub-menu">
					<nav>
						<a class="navbar-brand" href="#">
					    	<img src="https://image.freepik.com/free-vector/red-logo-play_1034-412.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
					    Player
					 	 </a>
						<ul class="nav flex-column">
							<li class="nav-item">
							  	<label for="" class="fa fa-search" aria-hidden="true"></label>
							    <input class="search" type="text" placeholder="Search">
						 	 </li>
							 <li class="nav-item">
							    <a class="nav-link active" href="#">Active</a>
							 </li>
							 <li class="nav-item">
							   	<a class="nav-link" href="#">Link</a>
							 </li>
							 <li class="nav-item">
								<a class="nav-link disabled" href="#">Disabled</a>
							 </li>
						</ul>
					</nav>
				</div>
			</div>
		  	<div class="now-playingbar-container">
				<div class="now-playing-bar">
					<div class="now-playing-left">
						<div class="content">
							<span class="album-link">
								<img src="https://images.pexels.com/photos/555206/pexels-photo-555206.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="" class="album-art">
							</span>
							<div class="track-info">
								<span class="track-name">Name of the song</span>
							</div>
							<div class="track-info">
								<span class="artist-name">Ismail shuaau</span>
							</div>
						</div>
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
								<div class="progress-bar-control">
									<div class="progress-bar-bg">
										<div class="progress-slide"></div>
									</div>
								</div>
								<span class="progress-time remaining">0.00</span>	
							</div> <!-- play-back-bar -->
						</div>
					</div>
					<div class="now-playing-right">
						<div class="player-controls">
							<div class="play-back-bar volume">
								<div class="buttons">
									<button class="control-button fa fa-volume-up" aria-hidden="true" title="volume" alt="repeat"></button>
								</div>
								<div class="progress-bar-control">
									<div class="progress-bar-bg">
										<div class="progress-slide">
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- now-playing-bar -->
		  	</div>
		</div>

	</body>

</html>