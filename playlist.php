<?php

include 'includes/includedFiles.php';

if (isset($_GET['id'])) :
    $playlistId = $_GET['id'];
else :
    header('Location: index.php');
endif;

$playlist = new Playlist($con, $playlistId);
$owner = new User($con, $playlist->getOwner());

?>

    <div class="entityInfo">
        <div class="leftSection">
            <img src="assets/images/icons/playlist.png" alt="image">
        </div>
        <div class="rightSection">
            <h2><?php echo $playlist->getName(); ?></h2>
            <p>By <?php echo $playlist->getOwner(); ?></p>
            <p><?php echo $playlist->getNumberOfSongs(); ?> songs</p>
            <button class="btn">DELETE PLAYLIST</button>
        </div>
    </div>

    <div class="trackListContainer">
        <ul class="track-list">
            <?php
            $songIdArr = [];
            $i = 1;
            foreach ($songIdArr as $songId) {
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

<?php
