<?php

include '../../config.php';

if (!isset($_POST['oldPassword']) || !isset($_POST['newPassword']) || !isset($_POST['confirmPassword'])) {
    echo 'No all passwords have been set!';
    exit();
}

if ($_POST['oldPassword'] === "" || $_POST['newPassword'] === "" || $_POST['confirmPassword'] === "") {
    echo 'Please fill in all the fields!';
    exit();
}

$username = $_POST['userLoggedIn'];
$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

$oldPasswordWithMd5 = md5($oldPassword);

$passwordCheck = mysqli_query($con, "SELECT * FROM users WHERE userName='$username' AND password='$oldPasswordWithMd5'");

if (mysqli_num_rows($passwordCheck) === 0) {
    echo 'Your old password does not match!';
    exit();
}

if ($newPassword !== $confirmPassword) {
    echo 'Your new passwords does not match!';
    exit();
}

if (preg_match('/[^A-Za-z0-9]/', $newPassword)) {
    echo 'Your passwords must contain letters and/or numbers!';
    exit();
}

if (strlen($newPassword) > 30 || strlen($newPassword) < 5) {
    echo 'Your password\'s characters must be between 5 and 30!';
    exit();
}

$newPasswordWithMd5 = md5($newPassword);

$query = mysqli_query($con, "UPDATE users SET password='$newPasswordWithMd5' WHERE userName='$username'");
echo 'Update successful!';
