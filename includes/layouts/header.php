<?php

include "includes/config.php";
include 'includes/classes/Artist.php';
include 'includes/classes/Album.php';
include 'includes/classes/Song.php';

if (isset($_SESSION['userLoggedIn'])) {
    $loggedInUser = $_SESSION['userLoggedIn'];
    echo "<script>loggedInUser = '$loggedInUser';</script>";
} else {
    header('Location: register.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Miozika</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/main.js"></script>
</head>
<body>

<div id="mainContainer">

    <div id="topContainer">

        <?php
        include 'includes/layouts/navbarContainer.php';
        ?>

        <div id="mainViewContainer">
            <div id="mainContent">