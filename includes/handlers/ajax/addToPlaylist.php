<?php

include '../../config.php';

if (isset($_POST['playlistId']) && isset($_POST['songId'])) :
    $playlistId = $_POST['playlistId'];
    $songId = $_POST['songId'];

    $query = mysqli_query($con, "SELECT IFNULL(MAX(playlistOrder) + 1, 1) AS playlistOrder FROM playlistSongs WHERE playlistId='$playlistId'");
    $row = mysqli_fetch_assoc($query);
    $order = $row['playlistOrder'];

    $insertSong = mysqli_query($con, "INSERT INTO playlistSongs VALUES(id, '$songId', '$playlistId', '$order' )");
else :
    echo 'Playlist ID or Song ID was not passed into addToPlaylist.php.';
endif;
