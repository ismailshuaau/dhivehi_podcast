<?php 
	class Account{

		private $error;

		public function __construct() {
			$this->error = array();
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
		    	return true;
		    } else {
		    	return false;
		    }	

		}

		// Check if there is any error

		public function getError($errorMessage) {
			if(!in_array($errorMessage, $this->error)){
				$errorMessage = "";
			}
			return "<span class='errorMessage'>$errorMessage</span>";
		}


		/*
		 *  Validation functions
		 *
		 */
		private function validateNickname($nn){
			if(strlen($nn) > 25 || strlen($nn) < 5) {
				array_push($this->error, Constants::$nickNameCharacters);
				return;
			}
			//  Todo: Check if nickname exists
		}	

		private function validateFirstName($fn){
			if(strlen($fn) > 25 || strlen($fn) < 2) {
				array_push($this->error, Constants::$firstNameCharacters);
				return;
			}

		}

		private function validateLastName($ln){
			if(strlen($ln) > 25 || strlen($ln) < 2) {
				array_push($this->error, Constants::$lastNameCharacters);
				return;
			}
		
		}

		private function validateEmails($em, $em2){
			if($em != $em2) {
				array_push($this->error, Constants::$emailsDoNotMatch);
				return;
			}

			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->error, Constants::$emailInvalid);
				return;
			}

			// To-do: Check if user name exists
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
