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
        require "view/listRealisateur.php";
    }

    public function castingFilm() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT DISTINCT Personne.Nom, Personne.Prenom, Personne.Sexe, Film.Titre, Film.URLimg
        FROM jouer
        INNER JOIN Acteurs ON jouer.Id_Acteur = Acteurs.Id_Acteur
        INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
        INNER JOIN Film ON jouer.Id_Film = Film.Id_Film
        ");
        $requete->execute();
        require "view/castingFilm.php";
    }

    public function new() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT Titre, AnneSortFr, URLimg 
        FROM Film 
        WHERE AnneSortFr > YEAR(CURRENT_DATE) - 5 
        ORDER BY AnneSortFr DESC;
        ");
        $requete->execute();
        require "view/new.php";
    }

    public function acteurPlusAgee() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT Personne.Nom, Personne.Prenom, ROUND((DATEDIFF('2024-02-29', Personne.DateNaissance) / 365), 0) AS DiffAge
        FROM Acteurs
        INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
        HAVING DiffAge > 50;
        ");
        $requete->execute();
        require "view/acteurPlusAgee.php";
    }

    public function nbFilmGnbFilmGenre

    

}