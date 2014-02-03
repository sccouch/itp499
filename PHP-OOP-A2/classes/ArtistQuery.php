<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 2/2/14
 * Time: 11:14 PM
 */

class ArtistQuery {

    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $sql = "SELECT artist_name, id
                FROM artists
                ORDER BY artist_name";

        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

}

?>