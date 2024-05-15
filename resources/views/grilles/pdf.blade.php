<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport de Grille</title>
    <style>
        /* Style pour le tableau */
        .grille {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .ligne {
            border-bottom: 1px solid #000;
        }

        .cellule {
            border-right: 1px solid #000;
            padding: 10px;
        }

        /* Style pour l'en-tête */
        .entete {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="entete">Rapport de Grille</div>
    <table class="grille">
        <thead>
            <tr>
                <th class="cellule">Nom</th>
                <th class="cellule">Prénom</th>
                <th class="cellule">Statut</th>
                <th class="cellule">École</th>
                <th class="cellule">Classe Tenue</th>
                <th class="cellule">Discipline</th>
                <th class="cellule">Thème</th>
                <th class="cellule">Durée</th>              
                <th class="cellule">Effectif</th>
                <th class="cellule">Fiche de Préparation</th>
                <th class="cellule">Matériel Didactique</th>
                <th class="cellule">Utilisation du Matériel</th>
                <th class="cellule">OPO Annoncés</th>
                <th class="cellule">Méthode Pertinente</th>
                <th class="cellule">Élèves en Activité</th>
                <th class="cellule">Contenu Conforme</th>
                <th class="cellule">Contenu Maîtrisé</th>
                <th class="cellule">Techniques d'Animation</th>
                <th class="cellule">Exercices d'Évaluation</th>
                <th class="cellule">Total Points</th>
            </tr>
        </thead>
        <tbody>
            <!-- Utilisez une boucle pour afficher chaque enregistrement de la grille -->
            @foreach($grilles as $grille)
            <tr class="ligne">
                <td class="cellule">{{ $grille->prenom }}</td>
                <td class="cellule">{{ $grille->statut }}</td>
                <td class="cellule">{{ $grille->ecole }}</td>
                <td class="cellule">{{ $grille->classe_tenue }}</td>
                <td class="cellule">{{ $grille->discipline }}</td>
                <td class="cellule">{{ $grille->theme }}</td>
                <td class="cellule">{{ $grille->duree }}</td>
                <td class="cellule">{{ $grille->nom }}</td>
                <td class="cellule">{{ $grille->effectif }}</td>
                <td class="cellule">{{ $grille->fiche_preparation }}</td>
                <td class="cellule">{{ $grille->materiel_didactique }}</td>
                <td class="cellule">{{ $grille->utilisation_materiel }}</td>
                <td class="cellule">{{ $grille->opo_annonces }}</td>
                <td class="cellule">{{ $grille->methode_pertinente }}</td>
                <td class="cellule">{{ $grille->eleves_activite }}</td>
                <td class="cellule">{{ $grille->contenu_conforme }}</td>
                <td class="cellule">{{ $grille->contenu_maitrise }}</td>
                <td class="cellule">{{ $grille->techniques_animation }}</td>
                <td class="cellule">{{ $grille->exercices_evaluation }}</td>
                <td class="cellule">{{ $grille->total_points }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
