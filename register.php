<?php

include 'includes/handlers/login-handler.php';
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
</head>
<body>

<div id="inputContainer">
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="loginForm">
        <h2>Login To Your Account</h2>
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

    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="registerForm">
        <p>
            <label for="userName">Username</label>
            <input type="text" name="userName" id="userName" placeholder="Please input your username here.." required>
        </p>
        <p>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" placeholder="Your First Name..." required>
        </p>
        <p>
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" placeholder="Your Last Name..." required>
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your email here..." required>
        </p>
        <p>
            <label for="confirmEmail">Confirm Email</label>
            <input type="email" id="confirmEmail" name="confirmEmail" placeholder="Confirm your email" required>
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Your password here..." required>
        </p>
        <p>
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
