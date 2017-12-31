<?php

if (isset($_POST['loginButton'])) {
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    $result = $account->login($username, $password);
    if ($result) {
        $_SESSION['is_user_logged_in'] = $username;
        header('Location: index.php');
    }
}
