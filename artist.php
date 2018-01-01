<?php

include("includes/includedFiles.php");

if (isset($_GET['id'])) {
	$artistId = $_GET['id'];
} else {
	header("Location: index.php");
}

$artist = new Artist($pdo, $artistId);

?>
<div class="row">
	<div class="entity-info border-bottom">
		<div class="center-section">
			<div class="artist-info">
				<h1 class="artist-name"><?php echo $artist->getName(); ?></h1>
				<div class="header-buttons">
					<button class="btn primary">PLAY</button>
				</div>
			</div>
		</div>
	</div> <!-- entity-info -->
	<div class="track-section border-bottom">
		<ul class="track-list">
			<?php 

				$songArray = $artist->getSongIds();
								
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
		</ul> <!-- track-list"-->
	</div> <!-- track-section -->
</div>


