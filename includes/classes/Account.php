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
    }

    private function validateUsername($un) {
        if (strlen($un) > 20 || strlen($un) < 5) {
            array_push($this->error, 'Your username must be between 5 and 20 characters!');
            return;
        }
    }

    private function validateFirstName($fn) {
        echo 'validateFirstName function was called';
    }

    private function validateLastName($ln) {
        echo 'validateLastName function was called';
    }

    private function validateEmails($email, $confirmEmail) {
        echo 'validateEmails function was called';
    }

    private function validatePasswords($password, $confirmPassword) {
        echo 'validatePasswords function was called';
    }

}
