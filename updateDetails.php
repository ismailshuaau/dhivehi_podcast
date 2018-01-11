<?php 

	include("includes/includedFiles.php");

 ?>

 <div class="user-details">
 	<div class="container border-bottom">
 		<h2>Email</h2>
 		<input type="text" class="email" name="email" placeholder="Email address..." value="<?php echo $userLoggedIn->getEmail(); ?>">
 		<span class="message"></span>
 		<button class="btn" onclick="updateEmail('email')">SAVE</button>
 	</div>
 	<div class="container">
 		<h2>Password</h2>
 		<input type="password" class="oldPassword" name="oldPassword" placeholder="Current Password">
 		<input type="password" class="newPassword1" name="newPassword1" placeholder="New Password">
 		<input type="password" class="newPassword2" name="newPassword2" placeholder="Confirm Password">
 		<span class="message"></span>
		<button class="btn" onclick="updatePassword('oldPassword','newPassword1','newPassword2')">SAVE</button>
 	</div>
 </div>