<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 2/11/14
 * Time: 6:47 PM
 */

class Song {

    protected $title;
    protected $artist;
    protected $genre;
    protected $price;

    public function __construct($title, $artist, $genre, $price) {
        $this->title = $title;
        $this->artist = $artist;
        $this->genre = $genre;
        $this->price = $price;
    }


}