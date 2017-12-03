<?php 

	class Account{

		public  function __construct() {

		}

		public function register() {
			  // Validate
			  $this->validateNickName($nickname);
			  $this->validateFirstName($firstName);
			  $this->validateLastName($lastName);
			  $this->validateEmails($email);
			  $this->validateEmails($email);
			  $this->validatePassword($password);
			  $this->validatePassword($password2);
		}

		/*
		 *  Validation functions
		 *
		 */
		private function validateNickName($nc){
			echo "nickname function called";
		}

		private function validateFirstName($fn){

		}

		private function validateLastName($lsn){

		}

		private function validateEmails($em, $em2){

		}

		private function validatePasswords($pw, $pw2){

		}
	}
?>