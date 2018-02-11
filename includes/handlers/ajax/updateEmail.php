<?php

include '../../config.php';

if (!isset($_POST['username'])) :
    echo 'ERROR: Could not set username!';
    exit();
endif;

if (isset($_POST['email']) && $_POST['email'] !== "") {
    $email = $_POST['email'];
    $username = $_POST['username'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Email is invalid!';
        exit();
    }

    $queryCheck = mysqli_query($con, "SELECT email FROM users WHERE email='$email' AND userName='$username'");
    if (mysqli_num_rows($queryCheck) > 0) {
        echo 'Email is already in use!';
        exit();
    }

    $updateEmail = mysqli_query($con, "UPDATE users SET email='$email' WHERE userName='$username'");
    echo 'Update email successful!';

} else {
    echo 'You must provide an email!';
}
