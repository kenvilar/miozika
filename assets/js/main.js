var currentPlaylist = [];
var audioElement;
var mouseDown = false;

function formatTime(timeInSeconds) {
	var seconds = Math.round(timeInSeconds);
	var minutes = Math.floor(seconds / 60);
	seconds = seconds - (minutes * 60);

	var finalminutes;
	var finalSeconds;

	//Add prefix 0 if minutes and seconds are less than 0
	finalminutes = minutes < 10 ? '0' + minutes : minutes;
	finalSeconds = seconds < 10 ? '0' + seconds : seconds;

	return finalminutes + ':' + finalSeconds;
}

function updateTimeProgressBar(audio) {
	$('.progressTime.current').text(formatTime(audio.currentTime));
	$('.progressTime.remaining').text(formatTime(audio.duration - audio.currentTime));

	var progress = audio.currentTime / audio.duration * 100;
	$('.progress').css('width', progress + '%');
}

function Audio() {
	this.currentPlaying = null;
	this.audio = document.createElement('audio');

	this.audio.addEventListener('canplay', function () {
		var songDuration = formatTime(this.duration);
		$('.progressTime.remaining').text(songDuration);
	});

	this.audio.addEventListener('timeupdate', function () {
		if (this.duration) {
			updateTimeProgressBar(this);
		}
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

	this.setTime = function (seconds) {
		this.audio.currentTime = seconds;
	}
}
