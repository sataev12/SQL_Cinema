-- Information d'un film : titre, année, durée et réalisateur
SELECT Film.Titre, Film.AnneSortFr, SEC_TO_TIME(Film.Duree * 60) AS Duree_formatée, Personne.Nom, Personne.Prenom
FROM Film
INNER JOIN Realisateur ON Film.Id_Realisateur = Realisateur.Id_Realisateur
INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne
-- SELECT FORMAT(temps, 'HH:mm') AS heure_formatée FROM votre_table;
-- Liste des films dont la durée excède 2h15 classés par durée (du + long au + court)
SELECT Film.Titre, SEC_TO_TIME(Film.Duree * 60) AS Duree_formatée
FROM Film 
WHERE Film.Duree > 135;

