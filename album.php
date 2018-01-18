<?php

include 'includes/layouts/header.php';

if (isset($_GET['id'])) :
    $albumId = $_GET['id'];
else :
    header('Location: index.php');
endif;

$album = new Album($con, $albumId);
$artist = $album->getArtist();

echo $album->getTitle() . '<br>';
echo $artist->getName() . '<br>';

include 'includes/layouts/footer.php'; ?>
