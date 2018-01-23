var currentPlaylist = [];
var audioElement;

function formatTime(timeInSeconds) {
	var seconds = Math.round(timeInSeconds);
	var minutes = Math.floor(seconds / 60);
	seconds = seconds - (minutes * 60);

	var finalminutes;
	var finalSeconds;

	//Add prefix 0 if minutes and seconds are less than 0
	if (minutes < 10) {
		finalminutes = '0' + minutes;
	} else {
		finalminutes = minutes;
	}

	if (seconds < 10) {
		finalSeconds = '0' + seconds;
	} else {
		finalSeconds = seconds;
	}

	return finalminutes + ':' + finalSeconds;
}

function Audio() {
	this.currentPlaying = null;
	this.audio = document.createElement('audio');

	this.audio.addEventListener('canplay', function () {
		var songDuration = formatTime(this.duration);
		$('.progressTime.remaining').text(songDuration);
	});

	this.setTrack = function (track) {
		this.currentPlaying = track;
		this.audio.src = track.path;
	};

	this.play = function () {
		this.audio.play();
	};

	this.pause = function () {
		this.audio.pause();
	};
}
