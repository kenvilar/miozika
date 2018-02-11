<?php

class User {
    private $con;
    private $userName;

    public function __construct($con, $userName) {
        $this->con = $con;
        $this->userName = $userName;
    }

    public function getName() {
        return $this->userName;
    }

    public function getFirstAndLastName() {
        $query = mysqli_query($this->con, "SELECT CONCAT(firstName, ' ', lastName) AS name FROM users WHERE userName='$this->userName'");
        $loggedInUser = mysqli_fetch_assoc($query);
        return $loggedInUser['name'];
    }
}
