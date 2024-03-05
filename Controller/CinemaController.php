<?php

namespace Controller;
use Model\Connect;

class CinemaController {
    // Lister les films

    public function listFilms(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT *
        FROM Film
        ");
        $requete->execute();
        $requeteFilm = $pdo->prepare("
        SELECT URLimg
        FROM Film
        WHERE id_film = 1
        ");
        $requeteFilm->execute();
        require "view/listFilms.php";

    }
    public function listActeurs(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT *
        FROM Acteurs INNER JOIN personne ON Acteurs.id_personne = personne.id_personne
        ");
        $requete->execute();
        require "view/listActeurs.php";
    }

    public function listRealisateur() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT Personne.Nom, Personne.Prenom, Film.Titre, Film.AnneSortFr
        FROM Realisateur
        INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne
        INNER JOIN Film ON Realisateur.Id_Realisateur = Film.Id_Realisateur
        ");
        $requete->execute();
        require "view/listRealisateur";
    }

    

}