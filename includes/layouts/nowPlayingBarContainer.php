<?php
/*Now Playing Bar Container*/

$songQuery = mysqli_query($con, "SELECT * FROM songs ORDER BY RAND() LIMIT 10");
$songArr = array();

while ($row = mysqli_fetch_assoc($songQuery)) :
    array_push($songArr, $row['id']);
endwhile;

$jsonArr = json_encode($songArr);

?>

<script>
	$(document).ready(function () {
		var newPlaylist = <?php echo $jsonArr; ?>;
		audioElement = new Audio();
		setTrack(newPlaylist[0], newPlaylist, false);
		updateVolumeProgressBar(audioElement.audio);

		$('#nowPlayingBarContainer').on('mousedown touchstart mousemove touchmove', function (e) {
			e.preventDefault();
		});

		//For time duration
		$('.playbackBar .progressBar').mousedown(function () {
			mouseDown = true;
		});

		$('.playbackBar .progressBar').mousemove(function (e) {
			if (mouseDown) {
				timeFromOffset(e, this);
			}
		});

		$('.playbackBar .progressBar').mouseup(function (e) {
			timeFromOffset(e, this);
		});

		//For volume
		$('.volumeBar .progressBar').mousedown(function () {
			mouseDown = true;
		});

		$('.volumeBar .progressBar').mousemove(function (e) {
			if (mouseDown) {
				var percentage;
				percentage = e.offsetX / $(this).width();

				if (percentage > 0 && percentage <= 1) {
					audioElement.audio.volume = percentage;
				}
			}
		});

		$('.volumeBar .progressBar').mouseup(function (e) {
			var percentage;
			percentage = e.offsetX / $(this).width();

			if (percentage >= 0 && percentage <= 1) {
				audioElement.audio.volume = percentage;
			}
		});

		$(document).mouseup(function () {
			mouseDown = false;
		});
	});

	function timeFromOffset(mouse, progressBar) {
		var percentage = mouse.offsetX / $(progressBar).width() * 100;
		var seconds = audioElement.audio.duration * (percentage / 100);
		audioElement.setTime(seconds);
	}

	function prevSong() {
		if (audioElement.audio.currentTime >= 3 || currentIndex === 0) {
			audioElement.setTime(0);
		} else {
			currentIndex = currentIndex - 1;
			setTrack(currentPlaylist[currentIndex], currentPlaylist, true);
		}
	}

	function nextSong() {
		if (repeat === true) {
			audioElement.setTime(0);
			playSong();
			return;
		}

		if (currentIndex === currentPlaylist.length - 1) {
			currentIndex = 0;
		} else {
			currentIndex++;
		}

		var trackToPlay = shuffle ? shufflePlaylist[currentIndex] : currentPlaylist[currentIndex];
		setTrack(trackToPlay, currentPlaylist, true);
	}

	function playSong() {
		if (audioElement.audio.currentTime === 0) {
			$.post(
				'includes/handlers/ajax/updatePlays.php',
				{
					songId: audioElement.currentPlaying.id
				}
			);
		}
		$('.controlButton.play').hide();
		$('.controlButton.pause').show();
		audioElement.play();
	}

	function repeatSong() {
		repeat = !repeat;
		var repeatImageUrl = repeat ? 'assets/images/icons/repeat-active.png' : 'assets/images/icons/repeat.png';
		$('.controlButton.repeat img').attr('src', repeatImageUrl);
	}

	function playPause() {
		$('.controlButton.pause').hide();
		$('.controlButton.play').show();
		audioElement.pause();
	}

	function muteSOng() {
		audioElement.audio.muted = !audioElement.audio.muted;
		var muteImageUrl = audioElement.audio.muted ? 'assets/images/icons/volume-mute.png' : 'assets/images/icons/volume.png';
		$('.controlButton.volume img').attr('src', muteImageUrl);
	}

	function shuffleSongs() {
		shuffle = !shuffle;
		var shuffleImageUrl = shuffle ? 'assets/images/icons/shuffle-active.png' : 'assets/images/icons/shuffle.png';
		$('.controlButton.shuffle img').attr('src', shuffleImageUrl);

		if (shuffle) {
			shuffleArr(shufflePlaylist);
			currentIndex = shufflePlaylist.indexOf(audioElement.currentPlaying.id);
		} else {
			currentIndex = currentPlaylist.indexOf(audioElement.currentPlaying.id);
		}
	}

	//Use to shuffle array og songs. Implemented to shuffleSongs function
	function shuffleArr(a) {
		var j, x, i;
		for (i = a.length - 1; i > 0; i--) {
			j = Math.floor(Math.random() * (i + 1));
			x = a[i];
			a[i] = a[j];
			a[j] = x;
		}
	}

	function setTrack(trackId, newPlaylist, play) {
		if (newPlaylist !== currentPlaylist) {
			currentPlaylist = newPlaylist;
			shufflePlaylist = currentPlaylist.slice();
			shuffleArr(shufflePlaylist);
		}

		if (shuffle) {
			currentIndex = shufflePlaylist.indexOf(trackId);
			playPause();
		} else {
			currentIndex = currentPlaylist.indexOf(trackId);
		}

		playPause();

		$.post(
			'includes/handlers/ajax/getSongJson.php',
			{
				songId: trackId
			},
			function (data) {
				var track = JSON.parse(data); //example result {id: "6", title: "Going Higher", artist: "2", album: "1", genre: "1", …}
				$('.trackName span').text(track.title);

				$.post(
					'includes/handlers/ajax/getArtistJson.php',
					{
						artistId: track.artist
					},
					function (data) {
						var artist = JSON.parse(data); //example result {id: "2", name: "CoCo"}
						$('.artistName span').text(artist.name);
					}
				);

				$.post(
					'includes/handlers/ajax/getAlbumJson.php',
					{
						albumId: track.album
					},
					function (data) {
						var album = JSON.parse(data); //example result {id: "1", title: "Bacon and Eggs", artist: "2", genre: "4", artworkPath: "assets/images/artwork/clearday.jpg"}
						$('.albumLink .albumArtWork').attr('src', album.artworkPath);
					}
				);

				audioElement.setTrack(track); //This is now track path based on the main.js

				if (play) {
					playSong();
				}
			}
		);
	}
</script>

<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">
        <div class="nowPlayingLeft">
            <div class="content">
                <span class="albumLink">
                    <img src="assets/images/logo/logo-white.png" class="albumArtWork" alt="album">
                </span>
                <div class="trackInfo">
                    <span class="trackName">
                        <span></span>
                    </span>
                    <span class="artistName">
                        <span></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="nowPlayingCenter">
            <div class="content player-controls">
                <div class="buttons">
                    <button class="controlButton shuffle" title="Shuffle Button" onclick="shuffleSongs();">
                        <img src="assets/images/icons/shuffle.png" alt="shuffle">
                    </button>
                    <button class="controlButton previous" title="Previous Button" onclick="prevSong();">
                        <img src="assets/images/icons/previous.png" alt="previous">
                    </button>
                    <button class="controlButton play" title="Play Button" onclick="playSong();">
                        <img src="assets/images/icons/play.png" alt="play">
                    </button>
                    <button class="controlButton pause" title="Pause Button" onclick="playPause();">
                        <img src="assets/images/icons/pause.png" alt="pause">
                    </button>
                    <button class="controlButton next" title="Next Button" onclick="nextSong();">
                        <img src="assets/images/icons/next.png" alt="next">
                    </button>
                    <button class="controlButton repeat" title="Repeat Button" onclick="repeatSong();">
                        <img src="assets/images/icons/repeat.png" alt="repeat">
                    </button>
                </div>
                <div class="playbackBar">
                    <span class="progressTime current"></span>
                    <div class="progressBar">
                        <div class="middle-align progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>
                    <span class="progressTime remaining"></span>
                </div>
            </div>
        </div>
        <div class="nowPlayingRight">
            <div class="volumeBar">
                <button class="controlButton volume" title="Volume Button" onclick="muteSOng();">
                    <img src="assets/images/icons/volume.png" alt="Volume Button">
                </button>
                <div class="progressBar">
                    <div class="middle-align progressBarBg">
                        <div class="progress"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
