<?php 
	include("includes/includedFiles.php");
 ?>


 <div class="entity-info container">
 	
 	<div class="center-section">
 		<div class="user-info">
 			<h1><?php  echo $userLoggedIn->getFirstAndLastName(); ?></h1>
 		</div>
 	</div>

 	<div class="button-items">
 		<button class="btn" onclick="openPage('updateDetails.php')">User Details</button>
 		<button class="btn" onclick="logout()">Log Out</button>
 	</div>

 </div>