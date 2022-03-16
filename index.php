<?php

class Movie {
    public $originalTitle;
    public $director;
    public $genres = array();
    public $poster;
    public $year;
    public $runningTime;
    public $language;
    public $country;
    public $ageRating;

    function __construct($_originalTitle, $_director, $_genres) {
        $this->originalTitle = $_originalTitle;
        $this->director = $_director;
        $this->genres = $_genres;
    }

    public function setAgeRating() {
        if(in_array('horror', $this->genres)) {
            $this->ageRating = 'NC-17';
        } else if(in_array('thriller', $this->genres)) {
            $this->ageRating = 'R';
        } else if(in_array('drama', $this->genres)) {
            $this->ageRating = 'PG-13';
        } else {
            $this->ageRating = 'G';
        }
    }

    public function getAgeRating() {
        return $this->ageRating;
    }
}


$kynodontas = new Movie('Kynodontas', 'Yorgos Lanthimos', ['drama']);
$kynodontas->poster = './img/kynodontas.jpg';
$kynodontas->year = 2009;
$kynodontas->runningTime = 97;
$kynodontas->language = 'Greek';
$kynodontas->country = 'Greece';
$kynodontas->setAgeRating();
$kynodontas->ageRating = $kynodontas -> getAgeRating();

$getOut = new Movie('Get Out', 'Jordan Peele', ['horror', 'thriller']);
$getOut->poster = './img/getout.jpg';
$getOut->year = 2017;
$getOut->runningTime = 104;
$getOut->language = 'English';
$getOut->country = 'United States';
$getOut->setAgeRating();
$getOut->ageRating = $getOut -> getAgeRating();

$annieHall = new Movie('Annie Hall', 'Woody Allen', ['comedy', 'romance']);
$annieHall->poster = './img/anniehall.jpg';
$annieHall->year = 1977;
$annieHall->runningTime = 93;
$annieHall->language = 'English';
$annieHall->country = 'United States';
$annieHall->setAgeRating();
$annieHall->ageRating = $annieHall -> getAgeRating();

$goneGirl = new Movie('Gone Girl', 'David Fincher', ['thriller']);
$goneGirl->poster = './img/gonegirl.jpg';
$goneGirl->year = 2014;
$goneGirl->runningTime = 149;
$goneGirl->language = 'English';
$goneGirl->country = 'United States';
$goneGirl->setAgeRating();
$goneGirl->ageRating = $goneGirl -> getAgeRating();

$movies = [$kynodontas, $getOut, $annieHall, $goneGirl];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Movies Archive</title>
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1 class="page-title yellow-txt">movies archive</h1>
        </div>
    </header>
    <!-- fine header -->


    <!-- main -->
    <main>
        <div class="container">

                <?php
                    foreach($movies as $movie) {
                        // movie container
                        echo "<div class='movie-container'>";

                        // poster
                        echo    "<div class='movie-poster'>
                                    <img src='{$movie->poster}' alt='{$movie->originalTitle} poster'>
                                </div>";

                        // info
                        echo    "<div class='movie-info'>
                                    <span>Title: <span class='yellow-txt'>$movie->originalTitle</span></span>

                                    <span>Director: <span class='yellow-txt'>$movie->director</span></span>

                                    <div class='genres'>
                                        <span>Genres: ";
                                        foreach($movie->genres as $genre) {
                                            echo "<span class='yellow-txt genre'>" . ucfirst($genre) . "</span>";
                                        }
                        echo           "</span>
                                    </div>
                                    
                                    <span>Year: <span class='yellow-txt'>$movie->year</span></span>

                                    <span>Runtime: <span class='yellow-txt'>$movie->runningTime min</span></span>

                                    <span>Language: <span class='yellow-txt'>$movie->language</span></span>

                                    <span>Country: <span class='yellow-txt'>$movie->country</span></span>
                                    
                                    <span>Age Rating: <span class='yellow-txt'>$movie->ageRating</span></span>
                                </div>";
                        echo "</div>";
                    }
                ?>
            
        </div>
    </main>
    <!-- fine main -->
    
</body>
</html>