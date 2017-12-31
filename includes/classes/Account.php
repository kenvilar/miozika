<?php

class Account {

    private $error;
    private $con;

    public function __construct($con) {
        $this->con = $con;
        $this->error = array();
    }

    public function login($userName, $password) {
        $password = md5($password);
        $query = mysqli_query($this->con, "SELECT * FROM users WHERE userName='$userName' AND password='$password'");

        if (mysqli_num_rows($query) !== 0) {
            return true;
        } else {
            array_push($this->error, Constants::$loginFailed);
            return false;
        }
    }

    public function register($userName, $firstName, $lastName, $email, $confirmEmail, $password, $confirmPassword) {
        $this->validateUsername($userName);
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateEmails($email, $confirmEmail);
        $this->validatePasswords($password, $confirmPassword);

        if (empty($this->error)) {
            return $this->insertUserDetails($userName, $firstName, $lastName, $email, $password);
        } else {
            return false;
        }
    }

    public function getErrors($error) {
        if (in_array($error, $this->error)) {
            return "<span class='alert alert-warning'>{$error}</span>";
        }
    }

    private function insertUserDetails($userName, $firstName, $lastName, $email, $password) {
        $encryptedPassword = md5($password);
        $date = date('Y-m-d');
        $profPic = 'assets/images/profile-pics/prof-pic.png';
        $result = mysqli_query($this->con, "INSERT INTO users VALUES (id, '$userName', '$firstName', '$lastName', '$email', '$encryptedPassword', '$date', '$profPic')");

        return $result;
    }

    public function getInputValue($name) {
        if (isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }

    private function validateUsername($un) {
        if (strlen($un) > 20 || strlen($un) < 5) {
            array_push($this->error, Constants::$userNameLimitChars);
            return;
        }

        $userNameExists = mysqli_query($this->con, "SELECT userName FROM users WHERE userName='$un'");
        if (mysqli_num_rows($userNameExists) !== 0) {
            array_push($this->error, Constants::$userNameExists);
            return;
        }
    }

    private function validateFirstName($fn) {
        if (strlen($fn) > 20 || strlen($fn) < 2) {
            array_push($this->error, Constants::$firstNameLimitChars);
            return;
        }
    }

    private function validateLastName($ln) {
        if (strlen($ln) > 20 || strlen($ln) < 2) {
            array_push($this->error, Constants::$lastNameLimitChars);
            return;
        }
    }

    private function validateEmails($email, $confirmEmail) {
        if ($email !== $confirmEmail) {
            array_push($this->error, Constants::$emailDontMatch);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->error, Constants::$emailInvalid);
            return;
        }

        $emailExists = mysqli_query($this->con, "SELECT email FROM users WHERE email='$email'");
        if (mysqli_num_rows($emailExists) !== 0) {
            array_push($this->error, Constants::$emailExists);
            return;
        }
    }

    private function validatePasswords($password, $confirmPassword) {
        if ($password !== $confirmPassword) {
            array_push($this->error, Constants::$passwodsDontMatch);
            return;
        }

        if (strlen($password) > 25 || strlen($password) < 5) {
            array_push($this->error, Constants::$passwordLimitChars);
            return;
        }

        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->error, Constants::$passwordNotAlphanumeric);
            return;
        }
    }

}
