var currentPlaylist = [];
var audioElement;

function Audio() {
	this.currentPlaying = null;
	this.audio = document.createElement('audio');

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
