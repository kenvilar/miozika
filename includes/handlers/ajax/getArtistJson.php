<?php

include '../../config.php';

if (isset($_POST['artistId'])) :
    $artistId = $_POST['artistId'];
    $artistQuery = mysqli_query($con, "SELECT * FROM artists WHERE id='$artistId'");
    $resultArr = mysqli_fetch_assoc($artistQuery);
    echo json_encode($resultArr);
endif;
