<?php 

include("../../config.php");


if(isset($_POST['songId'])) {
	$songId = $_POST['songId'];
	$songQuery = "UPDATE songs SET plays = plays + 1 WHERE id='" . $songId . "'";
	$songs = $pdo->prepare($songQuery);
	$songs->execute();
}