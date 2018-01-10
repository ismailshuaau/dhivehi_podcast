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

		public function getFirstAndLastName(){
			$query = ("SELECT CONCAT (firstName, ' ', lastName) as 'name' from users where email='$this->username'");
			$name = $this->pdo->prepare($query);
			$name->execute();
			$results = $name->fetchAll(PDO::FETCH_ASSOC);

			return $results[0]['name'];
		}
	}



?>