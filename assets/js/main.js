var currentPlaylist = [];
var shufflePlaylist = [];
var tempPlaylist = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var shuffle = false;
var userLoggedIn;
var timer;

$(document).click(function (e) {
	var target = $(e.target);
	if (!target.hasClass('item') && !target.hasClass('optionsButton')) {
		hideOptionsMenu();
	}
});

$(window).scroll(function () {
	hideOptionsMenu();
});

$(document).on('change', 'select.dom-playlist', function () {
	var playlistId = $(this).val();
	var songId = $(this).prevAll('.songId').val();

	console.log('Playlist ID: ' + playlistId);
	console.log('Song ID: ' + songId);
});

function openPage(url) {
	if (timer !== null) {
		clearTimeout(timer);
	}

	if (url.indexOf('?') === -1) {
		url = url + '?';
	}
	var encodedUrl = encodeURI(url + "&loggedInUser=" + userLoggedIn);
	console.log(encodedUrl);
	$('#mainContent').load(encodedUrl);
	$('body').scrollTop(0);
	history.pushState(null, null, url);
}

function createPlaylist() {
	console.log(userLoggedIn);
	var alertPlaylist = prompt('Please enter the name of your playlist');

	if (alertPlaylist !== null) {
		$.post(
			'includes/handlers/ajax/createPlaylist.php',
			{playlistName: alertPlaylist, userName: userLoggedIn}
		).done(function (error) {
			if (error !== "") {
				alert(error);
				return;
			}

			openPage('yourMusic.php');
		});
	}
}

function deletePlaylist(playlistId) {
	var deletePlaylistPrompt = confirm('Are you sure you want to delete the playlist?');

	if (deletePlaylistPrompt === true) {
		$.post(
			'includes/handlers/ajax/deletePlaylist.php',
			{
				playlistId: playlistId
			}
		).done(function (error) {
			if (error !== "") {
				alert(error);
				return;
			}

			openPage('yourMusic.php');
		});
	}
}

function showOptionsMenu(button) {
	var songId = $(button).prevAll('.songId').val();
	var menu = $('.optionsMenu');
	var menuWidth = menu.width();
	menu.find('.songId').val(songId);
	var scrollTop = $(window).scrollTop();
	var elementOffset = $(button).offset().top;

	var top = elementOffset - scrollTop;
	var left = $(button).position().left;

	menu.css({
		'top': top + 'px',
		'left': left - menuWidth + 'px',
		'display': 'inline'
	});
}

function hideOptionsMenu() {
	var menu = $('.optionsMenu');
	if (menu.css('display') !== 'none') {
		menu.css('display', 'none');
	}
}

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
	$('.playbackBar .progress').css('width', progress + '%');
}

function updateVolumeProgressBar(audio) {
	var volume = audio.volume * 100;
	$('.volumeBar .progress').css('width', volume + '%');
}

//This was implement in artist page play button
function playFirstSong() {
	setTrack(tempPlaylist[0], tempPlaylist, true);
}

function Audio() {
	this.currentPlaying = null;
	this.audio = document.createElement('audio');

	this.audio.addEventListener('ended', function () {
		nextSong();
	});

	this.audio.addEventListener('canplay', function () {
		var songDuration = formatTime(this.duration);
		$('.progressTime.remaining').text(songDuration);
	});

	this.audio.addEventListener('timeupdate', function () {
		if (this.duration) {
			updateTimeProgressBar(this);
		}
	});

	this.audio.addEventListener('volumechange', function () {
		updateVolumeProgressBar(this);
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
	};
}
