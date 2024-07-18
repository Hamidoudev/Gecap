<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bon de Sortie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #000;
            background-color: #fff;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #000;
        }
        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
            width: 150px;
            height: auto;
        }
        header h1 {
            margin: 0;
            font-size: 1.5em;
        }
        header p {
            margin: 5px 0;
            font-size: 0.9em;
        }
        main {
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .signature {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            align-items: flex-end;
        }
        .signature p {
            margin: 0;
        }
        .signature .date {
            text-align: left;
        }
        .signature .supplier {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="header-content">
                <img src="{{ public_path('GECAP(4).png') }}" alt="Truck" class="logo">
                <div>
                    <h1>Bon de Sortie N°</h1>
                    <p>Date : <span>{{ date('d/m/Y') }}</span></p>
                </div>
            </div>
        </header>
        <main>
            <table>
                <tr>
                    <th>École</th>
                    <th>Équipement</th>
                    <th>Date de Sortie</th>
                    <th>Quantité</th>
                </tr>
                <tr>
                    <td>{{ $sortieequipement->ecole->nom }}</td>
                    <td>{{ $sortieequipement->equipement->libelle }}</td>
                    <td>{{ $sortieequipement->date_sortie }}</td>
                    <td>{{ $sortieequipement->quantite }}</td>
                </tr>
            </table>
        </main>
        <div class="signature">
            <div class="date">
                <p>Bamako, le __________</p>
            </div>
            <div class="supplier">
                <p>Le Fournisseur</p>
                <p>______________________</p>
            </div>
        </div>
    </div>
</body>
</html>
