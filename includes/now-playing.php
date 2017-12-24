<?php 

$songQuery = ("SELECT id FROM songs ORDER BY RAND() LIMIT 10");
$songs = $pdo->prepare($songQuery);
$songs->execute();
$results = $songs->fetchAll(PDO::FETCH_ASSOC);

$jsonArray = json_encode($results);

?>

<script>
	
	$(document).ready(function(){
		currentPlayList = <?php echo $jsonArray ?>;
		audioElement = new Audio();
		setTrack(currentPlayList[0], currentPlayList, false);

	});

	function setTrack(trackId, newPlayList, play) {
		
		$.post("includes/Handlers/ajax/getSongJson.php", { songId: trackId }, function(data) {

			var track = JSON.parse(data);

			//  Title of the song
			$(".track-name").text(track[0].title);
			
			// artist Id
			var trackArtist = track[0].artist;

			// Find the artist name ising artist id retrived from track
			$.post("includes/Handlers/ajax/getArtistJson.php", { artistId: trackArtist }, function(data) {

				var artist = JSON.parse(data);

				$(".artist-name").text(artist[0].name);
				console.log(artist[0].name);

			});

			audioElement.setTrack(track[0].path);
			audioElement.play();
		});

		if (play) {
			audioElement.play();
		}
	}

	function playMusic() {
		$("#play").hide();
		$("#pause").show();
		audioElement.play();
	}

	function pauseMusic() {
		$("#play").show();
		$("#pause").hide();
		audioElement.pause();
	}

</script>

<div class="now-playingbar-container">
	<div class="now-playing-bar">
		<div class="now-playing-left">
			<div class="content">
				<span class="album-link">
					<img src="https://images.pexels.com/photos/555206/pexels-photo-555206.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="" class="album-art">
				</span>
				<div class="track-info">
					<span class="track-name"></span>
				</div>
				<div class="track-info">
					<span class="artist-name"></span>
				</div>
			</div>
		</div>
		<div class="now-playing-center">
			<div class="content player-controls">
				<div class="buttons">
					<button class="control-button fa fa-random" aria-hidden="true" title="shuffle" alt="shuffle"></button>
					<button class="control-button fa fa-caret-left" aria-hidden="true" title="previouse" alt="previouse"></button>
					<button id="play" class="control-button fa fa-play-circle" aria-hidden="true" title="play" alt="play" onclick="playMusic()"></button>
					<button id="pause" class="control-button fa fa-pause-circle" aria-hidden="true" title="pause" alt="pause" onclick="pauseMusic()"></button>
					<button class="control-button fa fa-caret-right" aria-hidden="true" title="next" alt="next"></button>
					<button class="control-button fa fa fa-repeat" aria-hidden="true" title="repeat" alt="repeat"></button>
				</div> <!-- buttons -->
				<div class="play-back-bar">
					<span class="progress-time current">0.00</span>
					<div class="progress-bar-control">
						<div class="progress-bar-bg">
							<div class="progress-slide"></div>
						</div>
					</div>
					<span class="progress-time remaining">0.00</span>	
				</div> <!-- play-back-bar -->
			</div>
		</div>
		<div class="now-playing-right">
			<div class="player-controls">
				<div class="play-back-bar volume">
					<div class="buttons">
						<button class="control-button fa fa-volume-up" aria-hidden="true" title="volume" alt="repeat"></button>
					</div>
					<div class="progress-bar-control">
						<div class="progress-bar-bg">
							<div class="progress-slide">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- now-playing-bar -->
</div>

