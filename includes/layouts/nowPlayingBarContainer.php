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
</script>

<script>
	$(document).ready(function () {
		currentPlaylist = <?php echo $jsonArr; ?>;
		audioElement = new Audio();
		setTrack(currentPlaylist[0], currentPlaylist, false);
	});

	function setTrack(trackId, newPlaylist, play) {
		audioElement.setTrack('assets/music/bensound-clearday.mp3');
		if (play) {
			playSong();
		}
	}

	function playSong() {
		audioElement.play();
	}

	function playPause() {
		audioElement.pause();
	}
</script>

<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">
        <div class="nowPlayingLeft">
            <div class="content">
                <span class="albumLink">
                    <img src="assets/images/maxresdefault.jpg" class="albumArtWork" alt="album">
                </span>
                <div class="trackInfo">
                    <span class="trackName">
                        <span>Song Title</span>
                    </span>
                    <span class="artistName">
                        <span>Song Artist</span>
                    </span>
                </div>
            </div>
        </div>
        <div class="nowPlayingCenter">
            <div class="content player-controls">
                <div class="buttons">
                    <button class="controlButton shuffle" title="Shuffle Button">
                        <img src="assets/images/icons/shuffle.png" alt="shuffle">
                    </button>
                    <button class="controlButton previous" title="Previous Button">
                        <img src="assets/images/icons/previous.png" alt="previous">
                    </button>
                    <button class="controlButton play" title="Play Button">
                        <img src="assets/images/icons/play.png" alt="play">
                    </button>
                    <button class="controlButton pause" title="Pause Button">
                        <img src="assets/images/icons/pause.png" alt="pause">
                    </button>
                    <button class="controlButton next" title="Next Button">
                        <img src="assets/images/icons/next.png" alt="next">
                    </button>
                    <button class="controlButton repeat" title="Repeat Button">
                        <img src="assets/images/icons/repeat.png" alt="repeat">
                    </button>
                </div>
                <div class="playbackBar">
                    <span class="progressTime current">0.00</span>
                    <div class="progressBar">
                        <div class="middle-align progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>
                    <span class="progressTime remaining">0.00</span>
                </div>
            </div>
        </div>
        <div class="nowPlayingRight">
            <div class="volumeBar">
                <button class="controlButton volume" title="Volume Button">
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
