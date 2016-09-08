<?php
    class Cd
    {
        private $artist;
        private $title;
        private $price;
        private $genre;
        function __construct($artist = 'unknown', $title = 'unknown', $price = 15, $genre = 'blues')
        {
            $this->artist = $artist;
            $this->title = $title;
            $this->price = $price;
            $this->genre = $genre;
        }
        function getArtist()
        {
            return $this->artist;
        }
        function setArtist($new_artist)
        {
            $this->artist = $new_artist;
        }
        function getTitle()
        {
            return $this->title;
        }
        function setTitle($new_title)
        {
            $this->title = $new_title;
        }
        function getPrice()
        {
            return $this->price;
        }
        function setPrice($new_price)
        {
            $this->price = $new_price;
        }
        function getGenre()
        {
            return $this->genre;
        }
        function setGenre($new_genre)
        {
            $this->genre = $new_genre;
        }
        static function clear()
        {
            $_SESSION['cds'] = array();
        }
    }
?>
