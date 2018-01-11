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

		public function getEmail() {
			$query = ("SELECT email FROM users WHERE email='$this->username'");
			$name = $this->pdo->prepare($query);
			$name->execute();
			$results = $name->fetchAll(PDO::FETCH_ASSOC);

			return $results[0]['email'];
		}

		public function getFirstAndLastName(){
			$query = ("SELECT CONCAT (firstName, ' ', lastName) AS 'name' FROM users WHERE email='$this->username'");
			$name = $this->pdo->prepare($query);
			$name->execute();
			$results = $name->fetchAll(PDO::FETCH_ASSOC);

			return $results[0]['name'];
		}


	}



?>