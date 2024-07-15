<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programme Scolaire</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        
        h1, h2 {
            text-align: center;
            color: #333;
        }
        
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        
        th {
            background-color: #f9f9f9;
            color: #333;
        }
        
        td ul {
            margin: 0;
            padding-left: 20px;
        }
        
        ul li {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Programme Scolaire</h1>
    <h2>{{ $programme->classe->libelle }}</h2>
    <table>
        <thead>
            <tr>
                <th>Matière</th>
                <th>Thème</th>
                <th>Contenu</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $programme->matiere->libelle }}</td>
               
                <td>
                    <ul>
                        @foreach(explode(',', $programme->theme) as $theme)
                            <li>{{ $theme }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach(explode(',', $programme->contenu) as $contenu)
                            <li>{{ $contenu }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
