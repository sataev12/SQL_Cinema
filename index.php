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

        // case "detailFilm": $ctrlCinema->detailFilm($id); break;
        // case "listActeurs": $ctrlCinema->listActeurs(); break;
    }
}

