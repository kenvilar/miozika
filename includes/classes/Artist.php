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

    public function getSongIds() {
        $query = mysqli_query($this->con, "SELECT id FROM songs WHERE artist='$this->id' ORDER BY plays DESC");
        $arr = array();

        while ($row = mysqli_fetch_assoc($query)) {
            array_push($arr, $row['id']);
        }

        return $arr;
    }

    public function getId() {
        $artistQuery = mysqli_query($this->con, "SELECT * FROM artists WHERE id='$this->id'");
        $artist = mysqli_fetch_assoc($artistQuery);

        return $artist['id'];
    }
}
