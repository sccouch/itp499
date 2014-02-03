<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 2/2/14
 * Time: 11:14 PM
 */

class ArtistMenu {

    protected $name;
    protected $artists;

    public function __construct($name, $artists) {
        $this->name = $name;
        $this->artists = $artists;
    }

    public function __toString() {
        $artistMenu = "<select name=" . $this->name . ">";

        foreach($this->artists as $artist)
        {
            $artistMenu .= "<option value=" . $artist["id"] . ">" . $artist["artist_name"] ."</option>";
        }

        $artistMenu .= '</select>';

        return $artistMenu;
    }
}