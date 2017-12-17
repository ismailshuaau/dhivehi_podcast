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

	 ?>

	 <div class="entity-info">
	 	<div class="left-section">
	 		<img src="<?php echo $album->getartworkPath() ?>" alt="">
	 	</div>
	 	<div class="right-section">
	 		<h2><?php echo $album->getTitle(); ?></h2>
	 		<span>by <?php echo $artist->getName(); ?></span>
	 		<span><?php $album->getNumberOfSongs(); ?> Songs </span>

	 	</div> <!-- left-section -->
	 </div> <!-- entity-info -->

	 <div class="track-section">
	 	<ul class="track-list">
	 		<?php 


	 			$songIds = $album->getSongIds();

	 			foreach ($songIds as $songId) {
	 				$albumSong = new Song($pdo, $songId['id']);
	 				echo $albumSong->getTitle();
	 			}

	 		 ?>
	 	</ul>
	 </div>

</div>