<?php

function sanitizeFormUsername($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}

function sanitizeFormPassword($inputText) {
    $inputText = strip_tags($inputText);
    return $inputText;
}

function sanitizeFormString($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
}

function sanitizeEmailString($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}

if (isset($_POST['registerButton'])) {
    $userName = sanitizeFormUsername($_POST['userName']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeEmailString($_POST['email']);
    $confirmEmail = sanitizeEmailString($_POST['confirmEmail']);
    $password = sanitizeFormPassword($_POST['password']);
    $confirmPassword = sanitizeFormPassword($_POST['confirmPassword']);

    $account = new Account($con);
    $successful = $account->register($userName, $firstName, $lastName, $email, $confirmEmail, $password, $confirmPassword);
    if ($successful) {
        header('Location: login.php');
    }
}
