<?php

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
</head>
<body>

<div id="inputContainer">
    <form method="POST" action="register.php" id="registerForm">
        <p>
            <?php echo $account->getErrors('Your username must be between 5 and 20 characters!'); ?> <br>
            <label for="userName">Username</label>
            <input type="text" name="userName" id="userName" placeholder="Please input your username here.." required>
        </p>
        <p>
            <?php echo $account->getErrors('Your first name must be between 2 and 20 characters!'); ?> <br>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" placeholder="Your First Name..." required>
        </p>
        <p>
            <?php echo $account->getErrors('Your last name must be between 2 and 20 characters!'); ?> <br>
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" placeholder="Your Last Name..." required>
        </p>
        <p>
            <?php echo $account->getErrors('Your emails don\'t matched.'); ?> <br>
            <?php echo $account->getErrors('Your email is invalid.'); ?> <br>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your email here..." required>
        </p>
        <p>
            <label for="confirmEmail">Confirm Email</label>
            <input type="email" id="confirmEmail" name="confirmEmail" placeholder="Confirm your email" required>
        </p>
        <p>
            <?php echo $account->getErrors('Your passwords don\'t matched.'); ?> <br>
            <?php echo $account->getErrors('Your passwords must be between 5 and 25 characters!'); ?> <br>
            <?php echo $account->getErrors('Your passwords can only container numbers and letter.'); ?> <br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Your password here..." required>
        </p>
        <p>
            <?php echo $account->getErrors(''); ?>
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password..."
                   required>
        </p>
        <p>
            <button type="submit" name="registerButton">Sign Up</button>
        </p>
    </form>
</div>

</body>
</html>
