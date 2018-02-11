<?php
/*
 * Dropdown Menu
 * */
?>

<nav class="optionsMenu">
    <input type="hidden" class="songId">
    <label for="playlist-item"></label>
    <?php
    echo Playlist::getPlaylistDropdown($con, $userLoggedIn->getName());
    ?>
    <div class="item" onclick="removeSongFromPlaylist(this, <?php echo $playlistId; ?>);">
        Remove from Playlist
    </div>
</nav>
