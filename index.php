<?php
    session_start();
    ob_start();
use Controller\CinemaController;

spl_autoload_register(function ($class_name){
    include str_replace("\\",DIRECTORY_SEPARATOR, $class_name) . '.php';
});

$ctrlCinema = new CinemaController();
$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {
        case "listFilms": $ctrlCinema->listFilms(); break;
        case "listActeurs": $ctrlCinema->listActeurs(); break;
        case "listRealisateur": $ctrlCinema->listRealisateur(); break;
        case "castingFilm": $ctrlCinema->castingFilm(); break;
        case "new": $ctrlCinema->new(); break;
        case "acteurPlusAgee": $ctrlCinema->acteurPlusAgee(); break;
        case "nbFilmGenre": $ctrlCinema->nbFilmGenre(); break;
        case "lesPlusLong": $ctrlCinema->lesPlusLong(); break;
        // case "ajoutFilmForm": $ctrlCinema->ajoutFilmForm(); break;
        // case "ajoutFilm": $ctrlCinema->ajoutFilm(); break;
        case "ajoutGenreForm": $ctrlCinema->ajoutGenreForm(); break;
        case "ajoutGenre": $ctrlCinema->ajoutGenre(); break;

        // case "detailFilm": $ctrlCinema->detailFilm($id); break;
        // case "listActeurs": $ctrlCinema->listActeurs(); break;
    }
}

