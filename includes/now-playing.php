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

		$(document).mouseup(function() {
			mouseDown = false;
		});

		/*****************************
		 *	Control the playback bar *
		 *						   	 *
		 ****************************/
		$(".play-back-bar .progressbarcontrol").mousedown(function() {
			mouseDown = true;
		});

		$(".play-back-bar .progressbarcontrol").mousemove(function(e) {
			if (mouseDown = true) {
				//  Set the time of song
				timefromOffset(e, this);
			}
		});

		$(".play-back-bar .progressbarcontrol").mouseup(function(e) {
			timefromOffset(e, this);
		});

		/***************************
		 *	Control the volume bar *
		 *						   *
		 **************************/
		$(".volume-bar .progressbarcontrol").mousedown(function() {
			mouseDown =  true;
		});

		$(".volume-bar .progressbarcontrol").mousemove(function(e) {
			if (mouseDown = true) {
				var percentage = e.offsetX / $(this).width();
				audioElement.audio.volume = percentage;
			}
		});

		$(".volume-bar .progressbarcontrol").mouseup(function(e) {
			var percentage = e.offsetX / $(this).width();
			if (percentage >= 0 && percentage <= 1) {
				audioElement.audio.volume = percentage;
			}
		});


	});

	// drag progress bar with mouse click
	
	function timefromOffset(mouse, progressbarcontrol) {
		var percentage =  mouse.offsetX / $(progressbarcontrol).width() * 100;
		var seconds = audioElement.audio.duration * (percentage / 100);
		audioElement.setTime(seconds);
	}
	
	function setTrack(trackId, newPlayList, play) {
		
		$.post("includes/Handlers/ajax/getSongJson.php", { songId: trackId }, function(data) {

			var track = JSON.parse(data);
			//  Title of the song
			$(".track-name").text(track[0].title);
			
			// get artist Id
			var trackArtist = track[0].artist;
			// Find the artist name using artist id retrived from track
			$.post("includes/Handlers/ajax/getArtistJson.php", { artistId: trackArtist }, function(data) {
				var artist = JSON.parse(data);
				$(".artist-name").text(artist[0].name);
			});

			//  Get the album Id
			var trackAlbum = track[0].album;
			// Find the artist name using id retrive from track
			$.post("includes/Handlers/ajax/getAlbumJson.php", { albumId: trackAlbum }, function(data) {
				var album = JSON.parse(data);
				$(".album-link img").attr("src", album[0].artworkPath);
			});

			
			audioElement.setTrack(track);
			playMusic();
		});

		if (play) {
			audioElement.play();
		}
	}

	function playMusic() {

		// update the number of plays in the database
		if(audioElement.audio.currentTime == 0) {
			$.post("includes/Handlers/ajax/updatePlaysJson.php", { songId: audioElement.currentlyPlaying[0].id });
		} 

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
					<img src="" alt="" class="album-art">
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
					<div class="progressbarcontrol">
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
				<div class="volume-bar">
					<div class="buttons">
						<button class="control-button fa fa-volume-up" aria-hidden="true" title="volume" alt="repeat"></button>
					</div>
					<div class="progressbarcontrol">
						<div class="progress-bar-bg">
							<div class="progress-slide"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- now-playing-bar -->
</div>

