<?php

include 'includes/layouts/header.php';

if (isset($_GET['id'])) :
    $albumId = $_GET['id'];
else :
    header('Location: index.php');
endif;

$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumId'");
$album = mysqli_fetch_assoc($albumQuery);
$artistId = $album['artist'];

/*$artistQuery = mysqli_query($con, "SELECT * FROM artists WHERE id='$artistId'");
$artist = mysqli_fetch_assoc($artistQuery);*/

$artist = new Artist($con, $artistId);
echo $artist->getName() . '<br>';
echo $album['title'] . '<br>';

include 'includes/layouts/footer.php'; ?>
