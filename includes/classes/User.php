<?php 
	class User{

		private $pdo;
		private $username;

		public function __construct($pdo, $username) {
			$this->pdo = $pdo;
			$this->username = $username;
			
		}

		public function getUserName(){
			return $this->username;
		}
	}



?>