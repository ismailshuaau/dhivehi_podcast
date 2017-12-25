var currentPlayList = [];
var audioElement;


function Audio() {
	 // Property of the class
	this.currentlyPlaying;
	this.audio = document.createElement("audio");

	this.audio.addEventListener("canplay", function() {
		$(".progress-time.remaining").text(this.duration);
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