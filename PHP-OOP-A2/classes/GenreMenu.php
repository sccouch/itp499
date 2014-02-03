<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 2/2/14
 * Time: 11:14 PM
 */

class GenreMenu {

    protected $name;
    protected $genres;

    public function __construct($name, $genres) {
        $this->name = $name;
        $this->genres = $genres;
    }

    public function __toString() {
        $genreMenu = "<select name=" . $this->name .">";

        foreach($this->genres as $genre)
        {
            $genreMenu .= "<option value=" . $genre["id"] . ">" . $genre["genre"] ."</option>";
        }

        $genreMenu .= '</select>';

        return $genreMenu;
    }
}

?>