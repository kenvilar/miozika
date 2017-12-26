<?php

include $_SERVER['DOCUMENT_ROOT'] . '/includes/classes/Account.php';

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

if (isset($_POST['registerButton'])) {
    $userName = sanitizeFormUsername($_POST['userName']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $confirmEmail = sanitizeFormString($_POST['confirmEmail']);
    $password = sanitizeFormPassword($_POST['password']);
    $confirmPassword = sanitizeFormPassword($_POST['confirmPassword']);

    $account = new Account();
    $successful = $account->register($userName, $firstName, $lastName, $email, $confirmEmail, $password, $confirmPassword);
    if ($successful) {
        header('Location: index.php');
    } else {
        echo 'Error!';
    }
}
