<?php

class User {
    private $con;
    private $userName;

    public function __construct($con, $userName) {
        $this->con = $con;
        $this->userName = $userName;
    }
}
