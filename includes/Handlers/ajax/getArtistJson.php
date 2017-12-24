<?php 

include("../../config.php");

if (isset($_POST['artistId'])) {
	$artistId = $_POST['artistId'];
	$artistQuery = "SELECT * FROM artists WHERE id='" . $artistId . "'";
	$artists = $pdo->prepare($artistQuery);
	$artists->execute();
	$results = $artists->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($results);
}
