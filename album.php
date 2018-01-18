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

include 'includes/layouts/footer.php'; ?>
