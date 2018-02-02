<?php

include 'includes/includedFiles.php';

?>

<div id="your-music-wrapper">

    <div class="playlists-container">
        <div class="grid-view-container">
            <h2 class="text-center">PLAYLISTS</h2>
            <div class="button-items">
                <button class="btn btn-green center-block" onclick="createPlaylist();">NEW PLAYLIST</button>
            </div>

            <?php
            $userLoggedIn = $userLoggedIn->getName(); //This was defined in includedFiles.php

            $playlistQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner='$userLoggedIn'");

            if (mysqli_num_rows($playlistQuery) === 0) {
                echo '<div class="no-results text-center">No playlists found. Please create one.</div>';
            }

            while ($row = mysqli_fetch_assoc($playlistQuery)) :
                $name = $row['name'];
                $owner = $row['owner'];
                $dateCreated = $row['dateCreated'];
                ?>

                <div class="gridViewItem">
                    <div class="playlist-image">
                        <img src="assets/images/icons/playlist.png" alt="image">
                    </div>
                    <div class="gridViewInfo">
                        <div class="name"><?php echo $name; ?></div>
                    </div>
                </div>

                <?php
            endwhile;
            ?>

        </div>
    </div>

</div>
