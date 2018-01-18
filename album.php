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

?>

<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php echo $albumUrl; ?>" alt="image">
    </div>
    <div class="rightSection">
        <h2><?php echo $albumTitle; ?></h2>
        <span>By <?php echo $artistName; ?></span>
    </div>
</div>

<?php

include 'includes/layouts/footer.php'; ?>
