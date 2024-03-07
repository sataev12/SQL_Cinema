<?php 
    ob_start(); 
    $film = $requete->fetch();
?>

<table class="uk-table uk-table-striped">
    <thead>
       
    </thead>
    <tbody>
        <?php
        ?>    
                    <img src="<?= $film["URLimg"] ?>" alt="Photo de film">
                    <h1><?= $film["Titre"] ?></h1>
       
    </tbody>
</table>

<?php

$titre = "Details des films";
$titre_secondaire = "Details des films";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>