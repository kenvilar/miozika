<?php

class Account {

    private $error;

    public function __construct() {
        $this->error = array();
    }

    public function register($userName, $firstName, $lastName, $email, $confirmEmail, $password, $confirmPassword) {
        $this->validateUsername($userName);
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateEmails($email, $confirmEmail);
        $this->validatePasswords($password, $confirmPassword);

        if (empty($this->error)) {
            return true;
        } else {
            return false;
        }
    }

    private function validateUsername($un) {
        if (strlen($un) > 20 || strlen($un) < 5) {
            array_push($this->error, 'Your username must be between 5 and 20 characters!');
            return;
        }
    }

    private function validateFirstName($fn) {
        if (strlen($fn) > 20 || strlen($fn) < 2) {
            array_push($this->error, 'Your first name must be between 2 and 20 characters!');
            return;
        }
    }

    private function validateLastName($ln) {
        if (strlen($ln) > 20 || strlen($ln) < 2) {
            array_push($this->error, 'Your last name must be between 2 and 20 characters!');
            return;
        }
    }

    private function validateEmails($email, $confirmEmail) {
        if ($email !== $confirmEmail) {
            array_push($this->error, 'Your emails don\'t matched.');
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->error, 'Your email is invalid.');
            return;
        }
    }

    private function validatePasswords($password, $confirmPassword) {
        if ($password !== $confirmPassword) {
            array_push($this->error, 'Your passwords don\'t matched.');
            return;
        }

        if (strlen($password) > 25 || strlen($password) < 5) {
            array_push($this->error, 'Your passwords must be between 5 and 25 characters!');
            return;
        }

        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->error, 'Your passwords can only container numbers and letter.');
            return;
        }
    }

}
