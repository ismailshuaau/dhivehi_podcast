<?php 

    include("../../config.php");

	if (isset($_POST['playlistId']) && isset($_POST['songId'])) {
		$playlistId = $_POST['playlistId'];
		$songId = $_POST['songId'];

		$query = ("DELETE FROM playlistSongs WHERE playlistId='$playlistId' AND id='$songId'");
		$playlists = $pdo->prepare($query);
		$playlists->execute();

	} else {
		echo "Playlist was not passed into deletePlaylist.php";
	}

 ?>