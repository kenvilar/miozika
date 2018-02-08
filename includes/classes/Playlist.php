<?php

class Playlist {
    private $con;
    private $id;
    private $name;
    private $owner;

    public function __construct($con, $data) {
        if (!is_array($data)) {
            $query = mysqli_query($con, "SELECT * FROM playlists WHERE id='$data'");
            $data = mysqli_fetch_assoc($query);
        }

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
        $query = mysqli_query($this->con, "SELECT songId FROM playlistSongs WHERE playlistId='$this->id'");
        return mysqli_num_rows($query);
    }

    public function getSongIds() {
        $query = mysqli_query($this->con, "SELECT songId FROM playlistSongs WHERE playlistId='$this->id' ORDER BY playlistOrder ASC");
        $arr = [];

        while ($row = mysqli_fetch_assoc($query)) {
            array_push($arr, $row['songId']);
        }

        return $arr;
    }

    public static function getPlaylistDropdown($con, $username) {
        $dropdown = '<select name="" class="item" id="">';
        $dropdown .= '<option value="">Add to playlist</option>';
        $dropdown .= '</select>';

        return $dropdown;
    }
}
