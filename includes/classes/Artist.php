<?php

class Artist {
    private $con;
    private $id;

    public function __construct($con, $id) {
        $this->con = $con;
        $this->id = $id;
    }

    public function getName() {
        $artistQuery = mysqli_query($this->con, "SELECT * FROM artists WHERE id='$this->id'");
        $artist = mysqli_fetch_assoc($artistQuery);
        return $artist['name'];
    }
}
