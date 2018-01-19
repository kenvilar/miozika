<?php

class Album {
    private $con;
    private $id;
    private $title;
    private $artistId;
    private $genreId;
    private $artWorPath;

    public function __construct($con, $id) {
        $this->con = $con;
        $this->id = $id;

        $albumQuery = mysqli_query($this->con, "SELECT * FROM albums WHERE id='$this->id'");
        $album = mysqli_fetch_assoc($albumQuery);

        $this->title = $album['title'];
        $this->artistId = $album['artist'];
        $this->genreId = $album['genre'];
        $this->artWorkPath = $album['artworkPath'];
    }

    public function getTitle() {
        return $this->title;
    }

    public function getArtist() {
        return new Artist($this->con, $this->artistId);
    }

    public function getGenre() {
        return $this->genreId;
    }

    public function getArtWorkPath() {
        return $this->artWorkPath;
    }

    public function getNumberOfSongs() {
        $query = mysqli_query($this->con, "SELECT * FROM songs WHERE album='$this->id'");
        return mysqli_num_rows($query);
    }
}
