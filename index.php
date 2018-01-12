<?php

include "includes/config.php";
include "includes/classes/Constants.php";
include "includes/classes/Account.php";
$account = new Account($con);
include 'includes/handlers/login-handler.php';

if (isset($_SESSION['is_user_logged_in'])) {
    $loggedInUser = $_SESSION['is_user_logged_in'];
} else {
    header('Location: register.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Miozika</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div id="mainContainer">

    <div id="topContainer">
        <div id="navBarContainer">
            <nav class="navBar">
                <a href="/" class="logo">
                    <img src="assets/images/icons/logo.png" alt="Logo">
                </a>
                <div class="group">
                    <div class="navItem">
                        <a href="search.php" class="navItemLink">Search</a>
                    </div>
                </div>
                <div class="group">
                    <div class="navItem">
                        <a href="browse.php" class="navItemLink">Browse</a>
                    </div>
                    <div class="navItem">
                        <a href="yourMusic.php" class="navItemLink">Your Music</a>
                    </div>
                    <div class="navItem">
                        <a href="profile.php" class="navItemLink">Song Artist</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div id="nowPlayingBarContainer">
        <div id="nowPlayingBar">
            <div class="nowPlayingLeft">
                <div class="content">
                <span class="albumLink">
                    <img src="//i.ytimg.com/vi/rb8Y38eilRM/maxresdefault.jpg" class="albumArtWork" alt="album">
                </span>
                    <div class="trackInfo">
                    <span class="trackName">
                        <span>Song Title</span>
                    </span>
                        <span class="artistName">
                        <span>Song Artist</span>
                    </span>
                    </div>
                </div>
            </div>
            <div class="nowPlayingCenter">
                <div class="content player-controls">
                    <div class="buttons">
                        <button class="controlButton shuffle" title="Shuffle Button">
                            <img src="assets/images/icons/shuffle.png" alt="shuffle">
                        </button>
                        <button class="controlButton previous" title="Previous Button">
                            <img src="assets/images/icons/previous.png" alt="previous">
                        </button>
                        <button class="controlButton play" title="Play Button">
                            <img src="assets/images/icons/play.png" alt="play">
                        </button>
                        <button class="controlButton pause" title="Pause Button">
                            <img src="assets/images/icons/pause.png" alt="pause">
                        </button>
                        <button class="controlButton next" title="Next Button">
                            <img src="assets/images/icons/next.png" alt="next">
                        </button>
                        <button class="controlButton repeat" title="Repeat Button">
                            <img src="assets/images/icons/repeat.png" alt="repeat">
                        </button>
                    </div>
                    <div class="playbackBar">
                        <span class="progressTime current">0.00</span>
                        <div class="progressBar">
                            <div class="middle-align progressBarBg">
                                <div class="progress"></div>
                            </div>
                        </div>
                        <span class="progressTime remaining">0.00</span>
                    </div>
                </div>
            </div>
            <div class="nowPlayingRight">
                <div class="volumeBar">
                    <button class="controlButton volume" title="Volume Button">
                        <img src="assets/images/icons/volume.png" alt="Volume Button">
                    </button>
                    <div class="progressBar">
                        <div class="middle-align progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
