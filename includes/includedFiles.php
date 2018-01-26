<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    echo "I'M FROM AJAX!";
} else {
    include 'includes/layouts/header.php';
    include 'includes/layouts/footer.php';

    $url = $_SERVER['REQUEST_URI'];
    echo "<script>openPage('$url');</script>";
}
