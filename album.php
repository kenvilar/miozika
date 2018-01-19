<?php

include 'includes/layouts/header.php';

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
    <ul>
        <?php
        $songIdArr = $album->getSongIds();
        $i = 1;
        foreach ($songIdArr as $songId) {
            $albumSong = new Song($con, $songId);
            $albumArtist = $albumSong->getArtist();

            echo '<li class="trackListRow">';
            echo '    <div class="trackCount">';
            echo '        <img class="play" src="assets/images/icons/play-white.png" alt="image">';
            echo "        <span class='trackNumer'>{$i}</span>";
            echo '    </div>';
            echo '</li>';

            $i++;
        }
        ?>
    </ul>
</div>

<?php

include 'includes/layouts/footer.php'; ?>
