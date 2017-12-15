<div class="row">
	<?php 

		if (isset($_GET['id'])) {
			$albumId = $_GET['id'];
		} else {
			header("Location: index.php");
		}

		// Album Query
		$albumQuery = "SELECT * FROM albums WHERE id='$albumId'";
		$albumQueries = $pdo->prepare($albumQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		$albumQueries->execute();

		foreach ($albumQueries as $album) {
		 	echo $album['title'] . "<br>";
		}

		// Call the artist method
		$artist = new Artist($pdo, $album['artist']);
		echo $artist->getName();

	 ?>

</div>