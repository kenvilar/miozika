<?php

if (isset($_POST['loginButton'])) {
    $username = $_POST['loginUsername'];
    $username = strip_tags($username);
    $username = ucfirst(strtolower($username));
    echo $username;
}
