<?php

include '../../config.php';

if (isset($_POST['playlistName']) && isset($_POST['userName'])) :
    $playlistName = $_POST['playlistName'];
    $userName = $_POST['userName'];
    $date = date("Y-m-d");

    $query = mysqli_query($con, "INSERT INTO playlists VALUES (id, '$playlistName', '$userName', '$date')");
else :
    echo 'Name or username parameters not passed into file.';
endif;
