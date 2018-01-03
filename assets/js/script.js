var currentPlayList = [];
var shufflePlayList = [];
var tempPlayList = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var shuffle = false;
var userLoggedIn;
var timer;

function openPage(url) {
	if (timer != null) {
		clearTimeout(timer);
	}

	if(url.indexOf("?") == -1) {
		url = url + "?";
	}

	var encodedUrl = encodeURI(url + "&userLoggedIn=" + userLoggedIn);
	$("#main-content").load(encodedUrl);
	$("body").scrollTop(0);
	history.pushState(null, null, url);
}

function createPlayList() {
	var popup = prompt("Please enter the name of playlist");

	if (popup != null) {
		$.post("includes/Handlers/ajax/playListJson.php", {name: popup, username: userLoggedIn })
		.done(function(error){
			// execute when ajax return
			if (error != "") {
				alert(error);
				return;
			}
			openPage("playlists.php");
		});
	}
}

function formatTime(seconds) {
	var time = Math.round(seconds);
	var minutes = Math.floor(time / 60);
	var seconds = time - (minutes * 60);

	//  add a zero if seconds is less then 10
	var addZero = (seconds < 10) ? "0" : "";

	return minutes + ":" + addZero + seconds;
}


function updateTimeProgressBar(audio) {
	$(".progress-time.current").text(formatTime(audio.currentTime));
	$(".progress-time.remaining").text(formatTime(audio.duration - audio.currentTime));

	var progress = audio.currentTime / audio.duration * 100;
	$(".now-playing-center .progress-slide").css("width", progress + "%");

}

function playFirstSong() {
	setTrack(tempPlayList[0], tempPlayList, true);
}

function updateVolumeProgressBar(audio) {
	var volume = audio.volume * 100;
	$(".now-playing-right .progress-slide").css("width", volume + "%");
}


function Audio() {
	 // Property of the class
	this.currentlyPlaying;
	this.audio = document.createElement("audio");

	this.audio.addEventListener("ended", function() {
		nextSong();
	});
	this.audio.addEventListener("canplay", function() {
		var duration = formatTime(this.duration);
		$(".progress-time.remaining").text(duration);
	});

	this.audio.addEventListener("timeupdate", function() {
		if(this.duration) {
			updateTimeProgressBar(this);
		}
	});

	this.audio.addEventListener("volumechange", function() {
		updateVolumeProgressBar(this);
	});

	this.setTrack = function(track) {
		this.currentlyPlaying = track;
		this.audio.src = track[0].path;
	};

	this.play = function() {
		this.audio.play();
	}
	
	this.pause = function() {
		this.audio.pause();
	}

	this.setTime = function(seconds) {
		this.audio.currentTime = seconds;
	}

}