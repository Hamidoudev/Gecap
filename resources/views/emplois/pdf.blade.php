<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emploi du Temps</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .detail-info {
            color: rgb(42, 120, 246);
            font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        .footer-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <strong>
            <h3 class="detail-info">Détail Emplois de l'école   {{ $DetailEmploi->ecole->nom }}</h3>
        </strong>
        <p>Classe :  {{ $DetailEmploi->classe->libelle }}</p>
        <p>Cycle :  {{ $DetailEmploi->cycle->libelle }}</p>

        <!-- Affichage de l'enseignant si le cycle est 1 -->
        @if ($DetailEmploi->cycle->id == 1)
        <p>Enseignant : {{ $DetailEmploi->enseignant->prenom }} {{ $DetailEmploi->enseignant->nom }}</p>
    @endif

        <table>
            <thead>
                <tr>
                    <th>Heure Début</th>
                    <th>Heure Fin</th>
                    <th>Jour</th>
                    <th>Matière/Enseignant</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emploismatiereDetail as $item)
                    <tr>
                        <td>{{ $item->heure_debut }}</td>
                        <td>{{ $item->heure_fin }}</td>
                        <td>{{ $item->jour }}</td>
                        <td>{{ $item->matiere->libelle }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            @if ($item->enseignant_id == null)
                                <span>......</span>
                            @else
                            <span>{{$item->enseignant->nom}} {{$item->enseignant->prenom}}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
