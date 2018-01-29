<?php
/* Navbar Container */
?>

<div id="navBarContainer">
    <nav class="navBar">
        <span onclick="openPage('index.php');" role="link" tabindex="0" class="logo">
            <img src="assets/images/logo/logo-white.png" alt="Logo">
        </span>
        <div class="group">
            <div class="navItem">
                <a href="search.php" class="navItemLink">Search
                    <img src="assets/images/icons/search.png" alt="Search" class="icon">
                </a>
            </div>
        </div>
        <div class="group">
            <div class="navItem">
                <span onclick="openPage('browse.php');" role="link" tabindex="0" class="navItemLink">Browse</span>
            </div>
            <div class="navItem">
                <span onclick="openPage('yourMusic.php');" role="link" tabindex="0"
                      class="navItemLink">Your Music</span>
            </div>
            <div class="navItem">
                <span onclick="openPage('profile.php');" role="link" tabindex="0" class="navItemLink">Song Artist</span>
            </div>
        </div>
    </nav>
</div>
