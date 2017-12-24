<?php 

include("../../config.php");

if (isset($_POST['songId'])) {
	$songId = $_POST['songId'];
	$songQuery = "SELECT * FROM songs WHERE id='" . $songId['id'] . "'";
	$songs = $pdo->prepare($songQuery);
	$songs->execute();
	$results = $songs->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($results);
}
