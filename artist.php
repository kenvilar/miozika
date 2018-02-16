<?php

include 'includes/includedFiles.php';

$artistId = 0;

if (isset($_GET['id'])) {
    $artistId = $_GET['id'];
} else {
    header('Location: index.php');
}

$_artist = new Artist($con, $artistId);
?>

    <div class="entityInfo artist-section border-bottom">
        <div class="centerSection">
            <div class="artistInfo">
                <h1 class="artistName"><?php echo $_artist->getName(); ?></h1>
                <div class="headerButtons">
                    <button class="btn btn-green" onclick="playFirstSong()">PLAY</button>
                </div>
            </div>
        </div>
    </div>

    <div class="trackListContainer border-bottom">
        <h2 class="text-center">SONGS</h2>
        <ul class="track-list">
            <?php
            $songIdArr = $_artist->getSongIds();
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

    <div class="gridViewContainer">
        <h2 class="text-center">ALBUMS</h2>
        <?php
        $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist='$artistId'");

        while ($row = mysqli_fetch_assoc($albumQuery)) :
            $artWorkPath = $row['artworkPath'];
            $title = $row['title'];
            $id = $row['id'];
            ?>

            <div class="gridViewItem">
                <span role="link" tabindex="0" onclick="openPage('album.php?id=<?php echo $id; ?>');">
                    <img src="<?php echo $artWorkPath; ?>" alt="image">
                    <div class="gridViewInfo">
                        <div class="name"><?php echo $title; ?></div>
                    </div>
                </span>
            </div>

        <?php
        endwhile;
        ?>

    </div>

<?php

include 'includes/layouts/dropdown-menu.php';
