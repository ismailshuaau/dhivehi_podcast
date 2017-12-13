<?php 
include("includes/config.php");

	if(isset($_SESSION['userLoggedIn'])) {
		$userLoggedIn = $_SESSION['userLoggedIn'];
	} else {
		header("Location: register.php"); 
	}
?>

<html lang="en">
	<!-- Header -->
	<?php include('includes/header.php') ?>
	<!-- END - HEADER -->

	<body class="body-player">

		<div class="main-container">
			<div class="top-container">
				<?php include("includes/submenu.php") ?>
					<div class="main-view-container">
		  				<div class="main-content">
		  					<?php include('includes/content.php') ?>
		  				</div>
		  			</div>
			</div>
		  	<?php include("includes/now-playing.php") ?>
		</div>

	</body>

</html>