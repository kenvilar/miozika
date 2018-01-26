<?php

include 'includes/config.php';
include 'includes/classes/Account.php';
include "includes/classes/Constants.php";
$account = new Account($con);
include 'includes/handlers/register-handler.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Miozika</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div id="background">
    <div class="registerLoginContainer">
        <div class="container">
            <div id="inputContainer">
                <form method="POST" action="register.php" id="registerForm">
                    <p>
                        <?php echo $account->getErrors(Constants::$userNameLimitChars); ?>
                        <?php echo $account->getErrors(Constants::$userNameExists); ?>
                        <label for="userName"></label>
                        <input type="text" name="userName" id="userName" placeholder="Username"
                               value="<?php $account->getInputValue('userName'); ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getErrors(Constants::$firstNameLimitChars); ?>
                        <label for="firstName"></label>
                        <input type="text" name="firstName" id="firstName" placeholder="First Name"
                               value="<?php $account->getInputValue('firstName'); ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getErrors(Constants::$lastNameLimitChars); ?>
                        <label for="lastName"></label>
                        <input type="text" id="lastName" name="lastName" placeholder="Last Name"
                               value="<?php $account->getInputValue('lastName'); ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getErrors(Constants::$emailDontMatch); ?>
                        <?php echo $account->getErrors(Constants::$emailInvalid); ?>
                        <?php echo $account->getErrors(Constants::$emailExists); ?>
                        <label for="email"></label>
                        <input type="email" id="email" name="email" placeholder="Email"
                               value="<?php $account->getInputValue('email'); ?>" required>
                    </p>
                    <p>
                        <label for="confirmEmail"></label>
                        <input type="email" id="confirmEmail" name="confirmEmail" placeholder="Confirm Email"
                               value="<?php $account->getInputValue('confirmEmail'); ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getErrors(Constants::$passwodsDontMatch); ?>
                        <?php echo $account->getErrors(Constants::$passwordLimitChars); ?>
                        <?php echo $account->getErrors(Constants::$passwordNotAlphanumeric); ?>
                        <label for="password"></label>
                        <input type="password" id="password" name="password" placeholder="Password"
                               value="<?php $account->getInputValue('password'); ?>" required>
                    </p>
                    <p>
                        <label for="confirmPassword"></label>
                        <input type="password" id="confirmPassword" name="confirmPassword"
                               placeholder="Confirm Password"
                               value="<?php $account->getInputValue('confirmPassword'); ?>" required>
                    </p>
                    <p>
                        <button class="btn btn-green btn-block" type="submit" name="registerButton">Sign Up</button>
                    </p>
                </form>
                <br>
                <p class="text-white text-center">Already have an account? <a class="text-green-light" href="/login.php">Log in</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
