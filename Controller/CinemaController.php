<?php

namespace Controller;
use Model\Connect;

class CinemaController {
    // Lister les films

    public function listFilms(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT Film.Titre, Film.AnneSortFr, SEC_TO_TIME(Film.Duree * 60) AS Duree_formatée, Personne.Nom, Personne.Prenom
        FROM Film
        INNER JOIN Realisateur ON Film.Id_Realisateur = Realisateur.Id_Realisateur
        INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne
        ");
        
        require "view/listFilms.php";

    }

}