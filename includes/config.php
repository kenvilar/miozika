<?php

ob_start();
session_start();
$timezone = date_default_timezone_set('Asia/Hong_Kong');
$con = mysqli_connect('localhost', 'adminuser', 'adminpassword', 'miozika');

if (mysqli_connect_errno()) {
    echo 'Failed to connect: ' . mysqli_connect_errno();
}
