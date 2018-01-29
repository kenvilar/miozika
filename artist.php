<?php

include 'includes/includedFiles.php';

if (isset($_GET['id'])) {
    $artistId = $_GET['id'];
} else {
    header('Location: index.php');
}

$artistId = new Artist($con, $artistId);
?>

<div class="entityInfo artist-section">
    <div class="centerSection">
        <div class="artistInfo">
            <h1 class="artistName"><?php echo $artistId->getName(); ?></h1>
            <div class="headerButtons">
                <button class="btn btn-green">PLAY</button>
            </div>
        </div>
    </div>
</div>
