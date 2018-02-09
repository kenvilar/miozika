<?php

//include 'includes/layouts/header.php';
include 'includes/includedFiles.php';

if (isset($_GET['id'])) :
    $albumId = $_GET['id'];
else :
    header('Location: index.php');
endif;

$album = new Album($con, $albumId);
$artist = $album->getArtist();

//Get the Album Title
$albumTitle = $album->getTitle();

//Get the Album Artist Name
$artistName = $artist->getName();

//Get the Album Genre
//echo $album->getGenre();

//Get the Album Artwork Image
$albumUrl = $album->getArtWorkPath();

//Get the number of songs
$numOfSongs = $album->getNumberOfSongs();

?>

    <div class="entityInfo">
        <div class="leftSection">
            <img src="<?php echo $albumUrl; ?>" alt="image">
        </div>
        <div class="rightSection">
            <h2><?php echo $albumTitle; ?></h2>
            <p>By <?php echo $artistName; ?></p>
            <p><?php echo $numOfSongs; ?> songs</p>
        </div>
    </div>

    <div class="trackListContainer">
        <ul class="track-list">
            <?php
            $songIdArr = $album->getSongIds();
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
                        <input type="hidden" class="songId" value="<?php echo $albumSong->getId(); ?>">
                        <img class="optionsButton" src="assets/images/icons/more.png" alt="image"
                             onclick="showOptionsMenu(this);">
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

    <nav class="optionsMenu">
        <input type="hidden" class="songId">
        <label for="playlist-item"></label>
        <?php
        echo Playlist::getPlaylistDropdown($con, $userLoggedIn->getName());
        ?>
        <div class="item">Item 2</div>
        <div class="item">Item 3</div>
    </nav>

<?php

//include 'includes/layouts/footer.php';
