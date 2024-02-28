-- Information d'un film : titre, année, durée et réalisateur
SELECT Film.Titre, Film.AnneSortFr, Film.Duree, Personne.Nom, Personne.Prenom
FROM Film
INNER JOIN Realisateur ON Film.Id_Realisateur = Realisateur.Id_Realisateur
INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne
