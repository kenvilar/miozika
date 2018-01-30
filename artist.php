<?php

include 'includes/includedFiles.php';

if (isset($_GET['id'])) {
    $artistId = $_GET['id'];
} else {
    header('Location: index.php');
}

$artistId = new Artist($con, $artistId);
?>

<div class="entityInfo artist-section border-bottom">
    <div class="centerSection">
        <div class="artistInfo">
            <h1 class="artistName"><?php echo $artistId->getName(); ?></h1>
            <div class="headerButtons">
                <button class="btn btn-green">PLAY</button>
            </div>
        </div>
    </div>
</div>

<div class="trackListContainer border-bottom">
    <ul class="track-list">
        <?php
        $songIdArr = $artistId->getSongIds();
        $i = 1;
        foreach ($songIdArr as $songId) {
            if ($i > 5) {
                break;
            }

            $albumSong = new Song($con, $songId);
            $albumArtist = $albumSong->getArtist();
            $songtitle = $albumSong->getTitle();
            $songArtist = $albumSong->getArtist()->getName();
            $songDuration = $albumSong->getDuration();

            ?>

            <li class="trackListRow">
                <div class="trackCount">
                    <img class="play" src="assets/images/icons/play-white.png" alt="image"
                         onclick="setTrack('<?php echo $albumSong->getId(); ?>', tempPlaylist, true);">
                    <span class='trackNumber'><?php echo $i; ?></span>
                </div>
                <div class="trackInfo">
                    <span class='trackName'><?php echo $songtitle; ?></span>
                    <span class='artistName'><?php echo $songArtist; ?></span>
                </div>
                <div class="trackOptions">
                    <img class="optionsButton" src="assets/images/icons/more.png" alt="image">
                </div>
                <div class="trackDuration">
                    <span class="duration"><?php echo $songDuration; ?></span>
                </div>
            </li>

            <?php

            $i++;
        }
        ?>

        <script>
			var tempSongIds;
			tempSongIds = '<?php echo json_encode($songIdArr); ?>';
			tempPlaylist = JSON.parse(tempSongIds);
        </script>
    </ul>
</div>
