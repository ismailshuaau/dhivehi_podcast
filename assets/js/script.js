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

// hide the menubar when clicked away
$(document).click(function(click) {
	var target = $(click.target);

	if (!target.hasClass("item") && !target.is("#options-button")) {
		hideOptionsMenu()
	}
});

// hide the menubar while scrolling
$(window).scroll(function() {
	hideOptionsMenu()
});

$(document).on("change", "select.playlist", function() {
	var select = $(this);
	var playlistId = select.val();
	var songId = select.prev(".song-id").val();

	$.post("includes/Handlers/ajax/addToPlaylist.php", { playlistId: playlistId, songId: songId })
	.done(function(error) {

		if (error != "") {
			alert(error);
			return;
		}

		hideOptionsMenu();
		select.val("");

	});
});

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

function removeFromPlaylist(button, playlistId) {
	var songId = $(button).prevAll('.song-id').val();

	$.post("includes/Handlers/ajax/removeFromPlaylist.php", { playlistId: playlistId, songId: songId })
		.done(function(error) {

		if (error != "") {
			alert(error);
			return;
		}
		// after ajax is returned
		openPage("playlist.php?id=" + playlistId);
	});
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

function hideOptionsMenu() {
	var menu = $('.options-menu');
	if (menu.css("display") != "none") {
		menu.css("display", "none");
	}
}
function showOptionsMenu(button) {
	var songId = $(button).prevAll(".song-id").val();
	var menu = $('.options-menu');
	var menuWidth = menu.width();
	menu.find(".song-id").val(songId);

	var scrollTop = $(window).scrollTop();
	var elementOffset = $(button).offset().top;

	var top = elementOffset - scrollTop;
	var left = $(button).position().left;

	menu.css({"top": top + "px", "left": left - menuWidth + "px", "display": "inline"});
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

function deletePlaylist(playlistId) {
	var prompt = confirm("are you sure you want to delete this playlist");

	if (prompt) {
		$.post("includes/Handlers/ajax/deletePlaylist.php", { playlistId: playlistId}).done(function(error) {
			if (error != "") {
				alert(error);
				return;
			}
			openPage("playlists.php");
		});
	}
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

 function logout() {
	 $.post("includes/Handlers/ajax/logout.php", function() {
		 location.reload();
	 });
 }

 function updateEmail(emailClass) {
 	var emailValue = $("." + emailClass).val();

 	$.post("includes/Handlers/ajax/updateEmail.php", { email: emailValue, username: userLoggedIn } )
 	.done(function(response) {
 		$("." + emailClass).nextAll(".message").text(response);
 	})
 }