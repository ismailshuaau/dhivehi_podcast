<?php 
	include("includes/includedFiles.php");

	if (isset($_GET['term'])) {
		$term = urldecode($_GET['term']);
	} else {
		$term = "";
	}
?>

<div class="search-container">
	<h4>Search</h4>
	<input type="text" class="search" value="<?php echo $term; ?>" placeholder="Artist, Album or Song" onfocus="this.value = this.value">
</div>

<script>
	$(".search").focus();

	$(function() {

		$(".search").keyup(function() {
			clearTimeout(timer);

			timer = setTimeout(function() {
				var val = $(".search").val()
				openPage("search.php?term=" + val)
			}, 2000);
		})
	})
</script>

<?php if ($term == "") exit(); ?>


<!-- 
	Song List 
-->
<div class="track-section border-bottom">
	<h2> Songs </h2>
	<ul class="track-list">
		<?php 

			$songQuery = ("SELECT id FROM songs WHERE title LIKE '$term%' LIMIT 10");
			$songs = $pdo->prepare($songQuery);
			$songs->execute();
			$results = $songs->fetchAll(PDO::FETCH_ASSOC);
			$rowCount = $songs->rowCount();

			if($rowCount == 0) {
				echo " <span class='no-results'> No matching songs results for " . $term . "</span>";
			}

			$songArray = array();
							
			$i = 1; // To count track
			foreach ($results as $songId) {
				$albumSong = new Song($pdo, $songId["id"]);
				$albumList = $albumSong->getArtist();

				if ($i > 15) {
					break;
				}

				array_push($songArray, $songId);

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


<!--
	Artist List
-->
<div class="artist-section border-bottom">
	<h2> Artists </h2>

	<?php 
		$artistQuery = ("SELECT id FROM artists WHERE name LIKE '$term%' LIMIT 10");
		$artists = $pdo->prepare($artistQuery);
		$artists->execute();
		$results = $artists->fetchAll(PDO::FETCH_ASSOC);
		$rowCount = $artists->rowCount();

		if ($rowCount == 0) {
			echo "<span class='no-results'> No matching artist results for " . $term . "</span>";
		}

		foreach ($results as $artistId) {
			$artistFound = new Artist($pdo, $artistId['id']);

			echo "<div class='search-result-row'>	
					<div id='artist-name'>
						<span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" . $artistFound->getId() ."\")'>
						"
						. $artistFound->getName() .
						"
						</span>
					</div>
				</div>";
		}
	 ?>
</div>


<!-- 
	Album List
-->
<div class="album-container container">
	<h2>Albums</h2>
	<div class="row">
		<?php
			$albumQuery = ("SELECT * FROM albums WHERE title LIKE '$term%' LIMIT 10");
			$albumQueries = $pdo->prepare($albumQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$albumQueries->execute();
			$rowCount = $albumQueries->rowCount();

			if($rowCount == 0) {
				echo " <span class='no-results'> No matching albums results for " . $term . "</span>";
			}

			foreach ($albumQueries as $album) {
				echo "<div class='card-view'>
						<span onclick='openPage(\"album.php?id=" . $album['id'] . "\")' tabindex='0'>
							<img src='". $album['artworkPath'] . "'>
							<div class='album-caption'>"
								. $album['title'] .
							"</div>
						</span>
					</div>";
			}

		?>
	</div> 
</div> <!-- album-container -->
