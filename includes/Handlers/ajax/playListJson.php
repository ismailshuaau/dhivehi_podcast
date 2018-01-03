<?php 

	include("../../config.php");
	
	if (isset($_POST['name']) && isset($_POST['username'])) {
		$name = $_POST['name'];
		$username = $_POST['username'];
		$date = date("Y-m-d");

		$playListQuery = ("INSERT INTO playlists VALUES('', '$name', '$username', '$date')");
		$playlists = $pdo->prepare($playListQuery);
		$playlists->execute();
		// $results = $playlists->fetchAll(PDO::FETCH_ASSOC);

	} else {
		echo "Name or Username parameter missing";
	}

?>
