<?php 

class Constants {
	// Register error messages
	public static $nickNameCharacters = "<div class='alert alert-danger'>Your nick name must be between 5 and 25 characters</div>";
	public static $firstNameCharacters = "<div class='alert alert-danger'>Your first name must be between 2 and 25 characters</div>";
	public static $lastNameCharacters = "<div class='alert alert-danger'>Please enter a last name between 5 to 25 characters</div>";
	public static $emailsDoNotMatch = "<div class='alert alert-danger'>Does your email match?</div>";
	public static $emailInvalid = "<div class='alert alert-danger'>That's not a valid email</div>";
	public static $passwordsDoNotMatch = "<div class='alert alert-danger'>Your password do not match</div>";
	public static $passwordNotAlphanumeric = "<div class='alert alert-danger'>Your password can only contain numbers and letters</div>";
	public static $passwordCharacters = "<div class='alert alert-danger'>Your password may contain 5 to 30 characters</div>";
	public static $userNameTaken = "<div class='alert alert-danger'>This nickname already exists</div>";
	public static $emailTaken = "<div class='alert alert-danger'>This email is in use</div>";

	// Login error messages
	public static $loginFailed = "<div class='alert alert-danger'>Your username or password was incorrect</div>";
	// public static $emailTaken = "This email is already in use";

}

