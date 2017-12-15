<div class="row">
	<?php 

		if (isset($_GET['id'])) {
			$albumId = $_GET['id'];
		} else {
			header("Location: index.php");
		}

		// Album Query

		$album = new Album($pdo, $albumId);
		$artist = $album->getArtist();

		echo $album->getTitle() . "<br>";
		// Call the artist method
		echo $artist->getName();

	 ?>

</div>