<?php

include "includes/config.php";
include "includes/classes/Constants.php";
include "includes/classes/Account.php";
$account = new Account($con);
include 'includes/handlers/login-handler.php';

if (isset($_SESSION['is_user_logged_in'])) {
    $loggedInUser = $_SESSION['is_user_logged_in'];
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
</head>
<body>

<div class="miozika-wrapper">
    <h1>Welcome to Miozika</h1>
</div>

</body>
</html>
