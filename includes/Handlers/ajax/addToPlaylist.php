<?php 
	include("../../config.php");

		if (isset($_POST['playlistId']) && isset($_POST['songId'])) {
		$playlistId = $_POST['playlistId'];
		$songId = $_POST['songId'];

		// Get the latest playlistOrder ID and add 1 to it
		$orderIdQuery = ("SELECT MAX(playlistOrder) + 1 as playlistOrder FROM playlistSongs WHERE playlistId='$playlistId'");
		$orderId = $pdo->prepare($orderIdQuery);
		$orderId->execute();
		$orderIdResults = $orderId->fetchAll(PDO::FETCH_ASSOC);
		$order = $orderIdResults[0]['playlistOrder'];

		// update database
		$query = ("INSERT INTO playlistSongs VALUES('', '$songId', '$playlistId', '$order')");
		$insertValue = $pdo->prepare($query);
		$insertValue->execute();

		} else {
			echo "PlaylistId or SongId was not passed into addToPlaylist.php";
		}
?>