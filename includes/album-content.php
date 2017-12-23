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
	 			$i = 1; // To count track
	 			foreach ($songIds as $songId) {
	 				$albumSong = new Song($pdo, $songId['id']);
	 				$albumList = $albumSong->getArtist();

	 				echo "<li class='track-item'>
							<div class='track-count'>
								<i class='fa fa-play-circle-o' aria-hidden='true'></i>
								<span class='track-number'>$i</span>
							</div>
							<div class='track-info'>
								<span class='track-name'>" . $albumSong->getTitle() . "</span>
								<span class='artist-name'>" . $albumList->getName() . "</span>
							</div>
							<div class='track-options'>
								<i class='fa fa-caret-down' aria-hidden='true'></i>
							</div>
							<div class='track-duration'>
								<span class='duration'>" . $albumSong->getDuration() . "</span>
							</div>
						  </li>";

	 				$i++;  // To count track
	 			}

	 		 ?>
	 	</ul>
	 </div>

</div>