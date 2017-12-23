<?php

class Account {

    public function __construct() {

    }

    public function register() {
        $this->validateUsername($userName);
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateEmails($email, $confirmEmail);
        $this->validatePasswords($password, $confirmPassword);
    }

    private function validateUsername($un) {
        echo 'validateUsername function was called';
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
