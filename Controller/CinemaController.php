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

    public function nbFilmGenre() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT Genre.Libelle, COUNT(Film.Id_Film) AS NbFilms
        FROM genre_film
        INNER JOIN Genre ON genre_film.Id_Genre = Genre.Id_Genre
        INNER JOIN Film ON genre_film.Id_Film = Film.Id_Film
        GROUP BY Genre.Libelle
        ");
        $requete->execute();
        require "view/nbFilmGenre.php";
    }

    public function lesPlusLong() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT Film.Titre, SEC_TO_TIME(Film.Duree * 60) AS Duree_formatée
        FROM Film 
        WHERE Film.Duree > 135
        ORDER BY Duree_formatée DESC;
        ");
        $requete->execute();
        require "view/lesPlusLong.php";
    }

    // public function ajoutFilmForm() {
    //     $pdo = Connect::seConnecter();
    //     $requete = $pdo->prepare("
    //     SELECT Personne.Nom, Personne.Prenom
    //     FROM Realisateur
    //     INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne;
    //     ");
    //     $requete->execute();
    //     require "view/ajoutFilmForm.php";
        

    // }


    // public function ajoutFilm(){
    //     // $pdo = Connect::seConnecter();
    //     // $requete = $pdo->prepare("
    //     // ");
    //     if (isset($_POST['submit'])) {
    //         // Verifications des champs de form
    //         $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_SPECIAL_CHARS);
    //         $AnneSortFr = filter_input(INPUT_POST, "AnneSortFr", FILTER_VALIDATE_INT);
    //         $Duree = filter_input(INPUT_POST, "Duree", FILTER_VALIDATE_INT);
    //         $Synopsis = filter_input(INPUT_POST, "Synopsis", FILTER_SANITIZE_SPECIAL_CHARS);
    //         $Note = filter_input(INPUT_POST, "Note", FILTER_VALIDATE_INT);
    //         $Affiche = filter_input(INPUT_POST, "Affiche", FILTER_SANITIZE_SPECIAL_CHARS);
    //     }
    //     if ($titre && $AnneSortFr & $Duree & $Synopsis & $Note & $Affiche) {
    //         $pdo = Connect::seConnecter();
    //         $requete = $pdo->prepare("
    //         INSERT INTO Film(Titre, AnneSortFr, Duree, Synopsis, Note, Affiche)
    //         VALUES ('Max', '2010', '110', 'un film de test', '3', 'Affiche de mont film de test')
    //         ");
    //     $requete->execute([
    //         'titre' => $titre,
    //         'AnneSortFr' => $AnneSortFr,
    //         'Duree' => $Duree,
    //         'Synopsis' => $Synopsis,
    //         'Note' => $Note,
    //         'Affiche' => $Affiche
    //     ]);
    //     } 
    //     var_dump("hello");
    //     die();
    // }

    public function ajoutGenreForm() {
        
        require "view/ajoutGenreForm.php";
        

    }

    public function ajoutGenre() {
        $Libelle = '';
        if (isset($_POST['submit'])) {
                    // Verifications des champs de form
                    $Libelle = filter_input(INPUT_POST, "Libelle", FILTER_SANITIZE_SPECIAL_CHARS);
                }
                if ($Libelle) {
                    $pdo = Connect::seConnecter();
                    $requete = $pdo->prepare("
                    INSERT INTO Genre(Libelle)
                    VALUES (:Libelle)
                    ");
                    $requete->execute([
                        ':Libelle' => $Libelle
                    ]);
                } 
        var_dump("hello");
    }

    public function ajoutRoleForm() {

        require "view/ajoutRoleForm.php";
    }

    public function ajoutRole() {
        $nom = '';
        if(isset($_POST['submit'])) {
            //verif
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS);
        }if($nom){
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("
            INSERT INTO Role(NomPersonnage)
            VALUES (:nom)
            ");
            $requete->execute([
                ':nom' => $nom
            ]);
        }
    }

    public function ajoutPersonneForm() {

        require "view/ajoutPersonneForm.php";
    }
    public function ajoutPersonne() {
        $nom = '';
        $prenom = '';
        $sexe = '';
        $dateNaissance = '';
        if(isset($_POST['submit'])) {
            //Verif
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_SPECIAL_CHARS);
            $dateNaissance = filter_input(INPUT_POST, "dateNaissance", FILTER_SANITIZE_SPECIAL_CHARS);
            // var_dump($dateNaissance);die;
        }if($nom && $prenom && $sexe && $dateNaissance) {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("
            INSERT INTO Personne(Nom, Prenom, Sexe, DateNaissance)
            VALUES(:nom, :prenom, :sexe, :dateNaissance);
            ");
            $requete->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':sexe' => $sexe,
            ':dateNaissance' => $dateNaissance
            ]);
        }
    }

    public function detailsFilm($id) {
        

            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("
            SELECT Titre, AnneSortFr, Duree, Synopsis, Note, Affiche, Personne.Nom, Personne.Prenom, URLimg
            FROM `Film`
            INNER JOIN Realisateur ON Film.Id_Film = Realisateur.Id_Realisateur
            INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne
            WHERE Film.Id_Film = :id;
            ");
            $requete->execute([
                ':id' => $id
            ]);


            require "view/detailsFilm.php";
        

        
    }

    
    

    

}