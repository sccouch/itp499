<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 2/11/14
 * Time: 6:47 PM
 */

namespace ITP\Songs;

class SongQuery {

    protected $pdo;
    protected $artist = false;
    protected $genre = false;
    protected $order = "";

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function __toString() {
        return "";
    }

    public function withArtist() {
        $this->artist = true;
        return $this;
    }

    public function withGenre() {
        $this->genre = true;
        return $this;
    }

    public function orderBy($order) {
        $this->order = $order;
        return $this;
    }

    public function all() {
        $select = "SELECT title, price";
        $query = "\nFROM songs";

        if ($this->artist) {
            $select .= ", artist_name";
            $query .= "
                INNER JOIN artists
                ON songs.artist_id = artists.id";
        }

        if ($this->genre) {
            $select .= ", genre";
            $query.= "
                INNER JOIN genres
                ON songs.genre_id = genres.id";
        }

        if ($this->order == "title") {
            $query .= "\nORDER BY title";
        }
        $query = $select . $query;

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }

}