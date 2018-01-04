<?php 

	include('includes/includedFiles.php');

?>

<!-- 
		Delete Playlist Page    				||||||||||||||||||||  PLAYLIST ||||||||||||||||||||
 -->

<div class="row">
	<?php 

		if (isset($_GET['id'])) {
			$playListId = $_GET['id'];
		} else {
			header("Location: index.php");
		}

		$playlist = new Playlist($pdo, $playListId);
		$owner = new User($pdo, $playlist->getOwner());

	 ?>
	
	 <div class="entity-info">
	 	<div class="left-section">
	 		<i class='fa fa-headphones' aria-hidden='true'></i>
	 	</div>
	 	<div class="right-section">
	 		<h2><?php echo $playlist->getName(); ?></h2>
	 		<span>by <?php echo $playlist->getOwner(); ?></span>
	 		<span><?php echo $playlist->getNumberOfSongs(); ?>Songs</span>
	 		<button class="btn">Delete Playlist</button>

	 	</div> <!-- left-section -->
	 </div> <!-- entity-info -->

	 <div class="track-section">
	 	<ul class="track-list">
	 		<?php 

	 			$songArray = array();//$album->getSongIds();

	 			$i = 1; // To count track
	 			foreach ($songArray as $songId) {
	 				$albumSong = new Song($pdo, $songId["id"]);
	 				$albumList = $albumSong->getArtist();

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
								<i class='fa fa-caret-down' aria-hidden='true'></i>
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

