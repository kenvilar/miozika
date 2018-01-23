<?php

include '../../config.php';

if (isset($_POST['songId'])) :
    $songId = $_POST['songId'];
    $albumQuery = mysqli_query($con, "UPDATE songs SET plays = plays + 1 WHERE id='$songId'");
    $resultArr = mysqli_fetch_assoc($albumQuery);
    echo json_encode($resultArr);
endif;
