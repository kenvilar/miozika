<?php

include 'includes/includedFiles.php';

if (isset($_GET['term'])) {
    $term = urldecode($_GET['term']);
} else {
    $term = "";
}

?>

    <script>
		$('.search-input').focus();

		$(function () {
			$('.search-input').keyup(function () {
				clearTimeout(timer);

				timer = setTimeout(function () {
					var val = $('.search-input').val();
					openPage('search.php?term=' + val);
				}, 1500);
			});
		});
    </script>

    <div id="search-wrapper">
        <div class="search-container">
            <h4>Search for an Artist, Song, Album or Playlist</h4>
            <input type="search" class="search-input" value="<?php echo $term; ?>" placeholder="Start typing..."
                   onfocus="var val=this.value; this.value=''; this.value= val;">
        </div>

        <?php
        if (empty($term) || $term === null) {
            exit();
        }
        ?>

        <div class="trackListContainer border-bottom">
            <h2 class="text-center">SONGS</h2>
            <ul class="track-list">
                <?php

                //Search Songs Query
                $songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '%$term%' LIMIT 10");

                if (mysqli_num_rows($songsQuery) === 0) {
                    echo '<div class="no-results text-center">No songs found matching "' . $term . '".</div>';
                }

                $songIdArr = [];
                $i = 1;
                while ($row = mysqli_fetch_assoc($songsQuery)) {
                    if ($i > 10) {
                        break;
                    }

                    array_push($songIdArr, $row['id']);

                    $albumSong = new Song($con, $row['id']);
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

        <div class="artists-container border-bottom">
            <h2 class="text-center">ARTISTS</h2>
            <?php

            //Search Artists Query
            $artistsQuery = mysqli_query($con, "SELECT id FROM artists WHERE name LIKE '%$term%' LIMIT 10");

            if (mysqli_num_rows($artistsQuery) === 0) {
                echo '<div class="no-results text-center">No artists found matching "' . $term . '".</div>';
            }

            $artistsIdArr = [];
            $i = 1;

            while ($row = mysqli_fetch_assoc($artistsQuery)) {
                if ($i > 10) {
                    break;
                }

                array_push($artistsIdArr, $row['id']);

                $artistFound = new Artist($con, $row['id']);

                ?>

                <div class="search-result-row">
                    <div class="artist-name">
                <span role="link" tabindex="0"
                      onclick="openPage('artist.php?id=<?php echo $artistFound->getId(); ?>');">
                    <?php echo $artistFound->getName(); ?>
                </span>
                    </div>
                </div>

                <?php

                $i++;
            }
            ?>
        </div>

        <div class="gridViewContainer">
            <h2 class="text-center">ALBUMS</h2>
            <?php
            $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '%$term%' LIMIT 10");

            if (mysqli_num_rows($albumQuery) === 0) {
                echo '<div class="no-results text-center">No albums found matching "' . $term . '".</div>';
            }

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
    </div>

<?php

include 'includes/layouts/dropdown-menu.php';
