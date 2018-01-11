<?php 

	include("includes/includedFiles.php");

 ?>

 <div class="user-details">
 	<div class="container border-bottom">
 		<h2>Email</h2>
 		<input type="text" class="email" name="email" placeholder="Email address..." value=" <?php echo $userLoggedIn->getEmail();	?>">
 		<span class="message"></span>
 		<button class="btn" onclick="updateEmail('eamil')">SAVE</button>
 	</div>
 	<div class="container">
 		<h2>Password</h2>
 		<input type="password" class="old-password" name="old-password" placeholder="Current Password">
 		<input type="password" class="new-password-1" name="new-password-1" placeholder="New Password">
 		<input type="password" class="new-password-2" name="new-password-2" placeholder="Confirm Password">
 		<span class="message"></span>
		<button class="btn" onclick="">SAVE</button>
 	</div>
 </div>