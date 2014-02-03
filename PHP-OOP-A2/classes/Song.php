<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 2/2/14
 * Time: 11:14 PM
 */

class Song {

    protected $pdo;
    protected $title;
    protected $artistId;
    protected $genreId;
    protected $price;
    protected $id;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setArtistId($artistId) {
        $this->artistId = $artistId;
    }

    public function setGenreId($genreId) {
        $this->genreId = $genreId;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function save() {
        $sql = "INSERT INTO songs (title, artist_id, genre_id, price)
                VALUES (?, ?, ?, ?)";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam(1, $this->title);
        $statement->bindParam(2, $this->artistId);
        $statement->bindParam(3, $this->genreId);
        $statement->bindParam(4, $this->price);

        $response = $statement->execute();
        $this->id = $this->pdo->lastInsertId();

        return $response;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getId() {
        return $this->id;
    }

}

?>