<?php

include 'includes/config.php';
include "includes/classes/Constants.php";
include 'includes/classes/Account.php';
$account = new Account();
include 'includes/handlers/register-handler.php';
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
    <form method="POST" action="register.php" id="registerForm">
        <p>
            <?php echo $account->getErrors(Constants::$userNameLimitChars); ?>
            <label for="userName">Username</label>
            <input type="text" name="userName" id="userName" placeholder="Please input your username here.."
                   value="<?php $account->getInputValue('userName'); ?>" required>
        </p>
        <p>
            <?php echo $account->getErrors(Constants::$firstNameLimitChars); ?>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" placeholder="Your First Name..."
                   value="<?php $account->getInputValue('firstName'); ?>" required>
        </p>
        <p>
            <?php echo $account->getErrors(Constants::$lastNameLimitChars); ?>
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" placeholder="Your Last Name..."
                   value="<?php $account->getInputValue('lastName'); ?>" required>
        </p>
        <p>
            <?php echo $account->getErrors(Constants::$emailDontMatch); ?>
            <?php echo $account->getErrors(Constants::$emailInvalid); ?>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your email here..."
                   value="<?php $account->getInputValue('email'); ?>" required>
        </p>
        <p>
            <label for="confirmEmail">Confirm Email</label>
            <input type="email" id="confirmEmail" name="confirmEmail" placeholder="Confirm your email"
                   value="<?php $account->getInputValue('confirmEmail'); ?>" required>
        </p>
        <p>
            <?php echo $account->getErrors(Constants::$passwodsDontMatch); ?>
            <?php echo $account->getErrors(Constants::$passwordLimitChars); ?>
            <?php echo $account->getErrors(Constants::$passwordNotAlphanumeric); ?>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Your password here..."
                   value="<?php $account->getInputValue('password'); ?>" required>
        </p>
        <p>
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password..."
                   value="<?php $account->getInputValue('confirmPassword'); ?>" required>
        </p>
        <p>
            <button type="submit" name="registerButton">Sign Up</button>
        </p>
    </form>
</div>

</body>
</html>
