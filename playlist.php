<?php 

	include('includes/includedFiles.php');

?>

<!-- 
		Delete Playlist Page  ||||||||||||||||||||  PLAYLIST ||||||||||||||||||||
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
	
	 <div class="entity-info playlist-info">
	 	<div class="left-section playlist-icon">
	 		<i class='fa fa-headphones' aria-hidden='true'></i>
	 	</div>
	 	<div class="right-section">
	 		<h2><?php echo $playlist->getName(); ?></h2>
	 		<span>by <?php echo $playlist->getOwner(); ?></span>
	 		<span><?php echo $playlist->getNumberOfSongs(); ?>Songs</span>
	 		<button class="btn" onclick="deletePlaylist('<?php echo $playListId; ?>')">Delete Playlist</button>

	 	</div> <!-- left-section -->
	 </div> <!-- entity-info -->
	<?php echo $playListId; ?>
	 <div class="track-section">
	 	<ul class="track-list">
	 		<?php 
	 			$songArray = $playlist->getSongIds();


	 			$i = 1; // To count track
	 			foreach ($songArray as $songId) {

	 				$playlist = new Song($pdo, $songId["id"]);
	 				$artistList = $playlist->getArtist();

	 				echo "<li class='track-item'>
							<div class='track-count'>
								<i class='fa fa-play-circle-o' aria-hidden='true' onclick='setTrack( {id: " . $playlist->getId() ."}, tempPlayList, true)'></i>
								<span class='track-number'>$i</span>
							</div>
							<div class='track-info'>
								<span id='track-name'>" . $playlist->getTitle() . "</span>
								<span id='artist-name'>" . $artistList->getName() . "</span>
							</div>
							<div class='track-options'>
								<i class='fa fa-caret-down' aria-hidden='true'></i>
							</div>
							<div class='track-duration'>
								<span class='duration'>" . $playlist->getDuration() . "</span>
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

