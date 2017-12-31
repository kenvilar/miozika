<?php

include "includes/config.php";
include "includes/classes/Constants.php";
include "includes/classes/Account.php";
$account = new Account($con);
include 'includes/handlers/login-handler.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Miozika</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div id="inputContainer">
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="loginForm">
        <h2>Login To Your Account</h2>
        <?php echo $account->getErrors(Constants::$loginFailed); ?>
        <p>
            <label for="loginUsername">Username</label>
            <input type="text" id="loginUsername" name="loginUsername" placeholder="Please input your username here..."
                   required>
        </p>
        <p>
            <label for="loginPassword">Password</label>
            <input type="password" id="loginPassword" name="loginPassword"
                   placeholder="Please input your password here..." required>
        </p>
        <p>
            <button type="submit" name="loginButton">Login</button>
        </p>
    </form>
</div>

</body>
</html>
