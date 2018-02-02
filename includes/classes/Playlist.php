<?php

class Playlist {
    private $con;
    private $id;
    private $name;
    private $owner;

    public function __construct($con, $data) {
        $this->con = $con;
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->owner = $data['owner'];
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getOwner() {
        return $this->owner;
    }

    public function getNumberOfSongs() {
        $query = mysqli_query($con, "SELECT songId FROM playlistSongs WHERE playlistId='$this->id'");
        return mysqli_num_rows($query);
    }
}
