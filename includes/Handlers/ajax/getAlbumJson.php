<?php 

include("../../config.php");

if (isset($_POST['albumId'])) {
	$albumId = $_POST['albumId'];
	$albumQuery = "SELECT * FROM albums WHERE id='" . $albumId . "'";
	$albums = $pdo->prepare($albumQuery);
	$albums->execute();
	$results = $albums->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($results);
}