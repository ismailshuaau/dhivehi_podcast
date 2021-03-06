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
		$artistId = $artist->getId();

	 ?>

	 <div class="entity-info">
	 	<div class="left-section">
	 		<img src="<?php echo $album->getartworkPath() ?>" alt="">
	 	</div>
	 	<div class="right-section">
	 		<h2><?php echo $album->getTitle(); ?></h2>
	 		<p role="link" tabindex="0" onclick="openPage('artist.php?id=<?php echo $artistId ?>')">By <?php echo $artist->getName(); ?></p>
	 		<span><?php $album->getNumberOfSongs(); ?> Songs </span>
	 	</div> <!-- left-section -->
	 </div> <!-- entity-info -->

	 <div class="track-section">
	 	<ul class="track-list">
	 		<?php 

	 			$songArray = $album->getSongIds();
	 			$array = [];

	 			$i = 1; // To count track
	 			foreach ($songArray as $songId) {
	 				$albumSong = new Song($pdo, $songId["id"]);
	 				$albumList = $albumSong->getArtist();

	 				array_push($array, $songId['id']);

	 				echo "<li class='track-item'>
							<div class='track-count'>
								<i class='fa fa-play-circle-o' aria-hidden='true' onclick='setTrack( {id: " . $albumSong->getId() ."}, tempPlayList, true)'></i>
								<span class='track-number'>$i</span>
							</div>
							<div class='track-info'>
								<span id='track-name'>" . $albumSong->getTitle() . "</span>
								<span id='artist-name'>" . $albumList->getName() . "</span>
							</div>
							<div class='track-options'>
								<input type='hidden' class='song-id' value='" . $albumSong->getId() . "'>
								<i id='options-button' class='fa fa-caret-down' aria-hidden='true' onclick='showOptionsMenu(this)'></i>
							</div>
							<div class='track-duration'>
								<span class='duration'>" . $albumSong->getDuration() . "</span>
							</div>
						  </li>";

	 				$i++;  // To count track
	 			}

	 		 ?>
	 		 <script>
				var tempSongsIds = '<?php echo json_encode($songArray); ?>';
				tempPlayList = JSON.parse(tempSongsIds);
	 		</script>
	 	</ul> <!-- track-list -->
	 </div> <!-- track-section -->
</div>

<nav class="options-menu">
	<input type="hidden" class="song-id">
	<?php echo Playlist::getPlaylistsDropdown($pdo, $userLoggedIn->getUserName()); ?>
</nav>
