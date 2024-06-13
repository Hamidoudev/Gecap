<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emploi du Temps</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
        }
        .form-group {
            margin: 20px 0;
        }
        label {
            font-weight: bold;
        }
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Emploi du Temps</h1>
        <div class="form-group">
            <label for="classe_id">Classe:</label>
            {{ isset($selectedClasse) ? $selectedClasse->libelle : 'Aucune classe sélectionné' }}
            
        </div>
        <div class="form-group">
            <label for="classe_id">Cycle:</label>
            {{ isset($selectedCycle) ? $selectedCycle->libelle : 'Aucun cycle sélectionné' }}
            
        </div>
        <div class="form-group">
            <label for="ecole_id">Ecole:</label>
            {{ isset($selectedEcole) ? $selectedEcole->nom :{{ $ecole->nom }} }}
            
        </div>
        <table>
            <thead>
                <tr>
                    <th>Heures/Jours</th>
                    <th>Lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach(['7h:45-10h:00', '7h:45-8h:45', '8h:45-9h:45', '10h:00-12h:00', '12h:00-13h:00', '13h:00-14h:00', '14h:00-15h:00', '15h:00-16h:00', '16h:00-17h:00', '17h:00-18h:00','15h:00-17h:00'] as $heure)
                <tr>
                    <td>{{ $heure }}</td>
                    @foreach(['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi'] as $jour)
                        <td>
                            {{ isset($selectedMatiere) ? $selectedMatiere->libelle : 'Aucune matière sélectionnée' }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
