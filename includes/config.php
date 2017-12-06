<?php 

ob_start();


$timezone = date_default_timezone_set("Indian/Maldives");

try {

	$pdo = new PDO('mysql:host=localhost:8889;dbname=dhivehi_podcast', 'root', 'root');
	
} catch (PDOException $e) {

	die($e->getMessage());
}


// $statement = $pdo->prepare('select * from users');

// $statement->execute();

// $results = $statement->fetchAll(PDO::FETCH_OBJ);
