<?php 

    include("../../config.php");

	if (isset($_POST['playlistId'])) {
		$playlistId = $_POST['playlistId'];
		$playlistQuery = ("DELETE FROM playlists WHERE id='$playlistId'");
		$playlistSongsQuery = ("DELETE FROM playlistSongs WHERE playlistId='$playlistId'");

		$playlists = $pdo->prepare($playlistQuery);
		$playlistSongs = $pdo->prepare($playlistSongsQuery);
		$playlists->execute();
		$playlistSongs->execute();

	} else {
		echo "Playlist was not passed into deletePlaylist.php";
	}

 ?>