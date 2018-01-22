<?php

include '../../config.php';

if (isset($_POST['albumId'])) :
    $albumId = $_POST['albumId'];
    $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumId'");
    $resultArr = mysqli_fetch_assoc($albumQuery);
    echo json_encode($resultArr);
endif;
