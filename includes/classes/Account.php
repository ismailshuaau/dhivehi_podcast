<?php 
	class Account{

		private $pdo;
		private $error;

		public function __construct($pdo) {
			$this->pdo = $pdo;
			$this->error = array();
		}

		public function login($un, $pw) {

			$pw = md5($pw);
			$query = "SELECT * from users WHERE email='$un' AND password='$pw'";
			$checkLoginQuery = $this->pdo->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$checkLoginQuery->execute();
			$rowCount = $checkLoginQuery->rowCount();

			if($rowCount == 1) {
				return true;
			} else {
				array_push($this->error, Constants::$loginFailed);
				return false;
			}
		}

		public function register($nn, $fn, $ln, $em, $em2, $pw, $pw2) {
			// Validate
			$this->validateNickname($nn);
			$this->validateFirstname($fn);
			$this->validateLastname($ln);
			$this->validateEmails($em, $em2);
			$this->validatePasswords($pw, $pw2);  

		    if(empty($this->error)) {
		    	//  Insert in to the database
		    	return $this->insertUserDetails($nn, $fn, $ln, $em, $em2, $pw, $pw2);
		    } else {
		    	return false;
		    }	

		}

		// Check if there is any error

		public function getError($errorMessage) {
			if(!in_array($errorMessage, $this->error)){
				$errorMessage = "";
			}
			return "$errorMessage";
		}

		private function insertUserDetails($nn, $fn, $ln, $em, $em2, $pw, $pw2) {
			$encryptedPw = md5($pw);
			$profilePic = "assets/images/profile-pics/user.png";
			$date = date("Y-m-d");

			$result = $this->pdo->prepare("INSERT INTO users VALUES ('', '$nn', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");
			return $result->execute();
		}


		/*
		 *  Validation functions
		 *
		 */
		private function validateNickname($nn) {
			if(strlen($nn) > 25 || strlen($nn) < 5) {
				array_push($this->error, Constants::$nickNameCharacters);
				return;
			}

			$query = "SELECT nickname From users WHERE nickname='$nn'";
			$checkUsernameQuery = $this->pdo->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$checkUsernameQuery->execute();
			$rowCount = $checkUsernameQuery->rowCount();

			if ($rowCount != 0) {
				array_push($this->error, Constants::$userNameTaken);
				return;
			}
		
		}	

		private function validateFirstName($fn) {
			if(strlen($fn) > 25 || strlen($fn) < 2) {
				array_push($this->error, Constants::$firstNameCharacters);
				return;
			}

		}

		private function validateLastName($ln) {
			if(strlen($ln) > 25 || strlen($ln) < 2) {
				array_push($this->error, Constants::$lastNameCharacters);
				return;
			}
		
		}

		private function validateEmails($em, $em2) {
			if($em != $em2) {
				array_push($this->error, Constants::$emailsDoNotMatch);
				return;
			}

			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->error, Constants::$emailInvalid);
				return;
			}

			$query = "SELECT email From users WHERE email='$em'";
			$checkEmailQuery = $this->pdo->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$checkEmailQuery->execute();
			$rowCount = $checkEmailQuery->rowCount();

			if ($rowCount != 0) {
				array_push($this->error, Constants::$emailTaken);
				return;
			}
		}

		private function validatePasswords($pw, $pw2) {
			if($pw != $pw2)	{
				array_push($this->error, Constants::$passwordsDoNotMatch);
				return;
			}

			if (preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->error, Constants::$passwordNotAlphanumeric);
				return;
			}

			if (strlen($pw) > 30 || strlen($pw) < 5) {
				array_push($this->error, Constants::$passwordCharacters);
				return;
			}

		}

	}
