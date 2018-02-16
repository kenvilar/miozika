<?php

include "includes/config.php";
include "includes/classes/Account.php";
include "includes/classes/Constants.php";
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
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.min.css">
</head>
<body style="min-width: 100%;">

<div id="background">
    <div class="registerLoginContainer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <img src="assets/images/logo/logo-white.png" alt="logo">
                </div>
            </div>
            <div id="inputContainer">
                <form method="POST" action="login.php" id="loginForm">
                    <?php echo $account->getErrors(Constants::$loginFailed); ?>
                    <p>
                        <label for="loginUsername"></label>
                        <input type="text" id="loginUsername" name="loginUsername"
                               placeholder="Username or email address"
                               value="<?php $account->getInputValue('loginUsername'); ?>" required>
                    </p>
                    <p>
                        <label for="loginPassword"></label>
                        <input type="password" id="loginPassword" name="loginPassword"
                               placeholder="Password" required>
                    </p>
                    <p>
                        <button class="btn btn-green btn-block" type="submit" name="loginButton">Login</button>
                    </p>
                </form>
                <br>
                <p class="text-white text-center">Don't have an account? <a class="text-green-light"
                                                                            href="/register.php">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
