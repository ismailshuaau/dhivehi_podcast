var currentPlayList = [];
var audioElement;

function formatTime(seconds) {
	var time = Math.round(seconds);
	var minutes = Math.floor(time / 60);
	var seconds = time - (minutes * 60);

	//  add a zero if seconds is less then 10
	var addZero = (seconds < 10) ? "0" : "";

	return minutes + ":" + addZero + seconds;
}

function Audio() {
	 // Property of the class
	this.currentlyPlaying;
	this.audio = document.createElement("audio");

	this.audio.addEventListener("canplay", function() {
		var duration = formatTime(this.duration);
		$(".progress-time.remaining").text(duration);
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

}