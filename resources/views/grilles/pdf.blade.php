<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport de grille {{ $grille->ecole_id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dddddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
        }
        .header h1 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }
        .header h2 {
            font-size: 20px;
            margin: 5px 0;
        }
        .logo {
            width: 150px;
            height: auto;
        }
        .flag {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0;
        }
        .flag div {
            height: 10px;
        }
        .flag .green {
            background-color: #14a34b;
            width: 100px;
        }
        .flag .yellow {
            background-color: #ffcd00;
            width: 100px;
        }
        .flag .red {
            background-color: #ce1126;
            width: 100px;
        }
        .emblem {
            display: flex;
            align-items: center;
            justify-content: space-around;
            margin: 20px 0;
        }
        .text {
            font-size: 20px;
            font-weight: bold;
        }
        .slogan {
            text-align: center;
            font-size: 18px;
            margin-top: 10px;
        }
        .slogan span {
            display: block;
        }
        .form-section {
            margin: 20px 0;
        }
        .form-section label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        .center {
            text-align: center;
        }
        ol {
            padding-left: 20px;
        }
        input[type="date"] {
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('images/GECAP(4).png') }}" alt="Logo" class="logo">
            <h1>Ministère de l'Éducation Nationale</h1>
            <div class="flag">
                <div class="green"></div>
                <div class="yellow"></div>
                <div class="red"></div>
            </div>
            <div class="emblem">
                <div class="text">REPUBLIQUE DU MALI</div>
            </div>
            <div class="slogan">
                <span>Un Peuple - Un But - Une Foi</span>
            </div>
            <h2>Centre d'Animation Pédagogique de Sébénikoro</h2>
            <h3>Grille de suivi des maîtres 1er Cycle</h3>
        </div>
        <form>
            <?php
            ini_set('max_execution_time', 100); // Augmente la limite de temps d'exécution à 5 minutes
            ?>
            <div class="form-section">
                <label>A. Identification du candidat :</label>
                <table>
                    <tbody>
                        <tr>
                            <th>Nom :</th>
                            <td>{{ $grille->nom }}</td>
                        </tr>
                        <tr>
                            <th>Prénom :</th>
                            <td>{{ $grille->prenom }}</td>
                        </tr>
                        <tr>
                            <th>Statut :</th>
                            <td>{{ $grille->statut }}</td>
                        </tr>
                        <tr>
                            <th>École :</th>
                            <td>{{ $grille->ecole_id }}</td>
                        </tr>
                        <tr>
                            <th>Classe tenue :</th>
                            <td>{{ $grille->classe }}</td>
                        </tr>
                        <tr>
                            <th>Effectif :</th>
                            <td>{{ $grille->effectif }}</td>
                            <td>F {{ $grille->F }}</td>
                            <td>G {{ $grille->G }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="form-section">
                <label>B. Observations sur la leçon :</label>
                <table>
                    <tbody>
                        <tr>
                            <th>Discipline :</th>
                            <td>{{ $grille->discipline }}</td>
                        </tr>
                        <tr>
                            <th>Thème :</th>
                            <td>{{ $grille->theme }}</td>
                        </tr>
                        <tr>
                            <th>Durée :</th>
                            <td>{{ $grille->duree }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ITEM</th>
                        <th class="center">Notes analytiques</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1. La fiche de préparation existe-t-elle ? est-elle exploitable ?</td>
                        <td class="center">{{ $grille->fiche_preparation }}</td>
                    </tr>
                    <tr>
                        <td>2. Le matériel didactique existe-t-il ? est-il suffisant ?</td>
                        <td class="center">{{ $grille->materiel_didactique }}</td>
                    </tr>
                    <tr>
                        <td>3. Le matériel didactique a-t-il bien été utilisé ?</td>
                        <td class="center">{{ $grille->utilisation_materiel }}</td>
                    </tr>
                    <tr>
                        <td>4. Les OPO (objectif pédagogique opérationnel) sont-ils bien annoncés ? ont-ils été atteints ?</td>
                        <td class="center">{{ $grille->opo_annonces }}</td>
                    </tr>
                    <tr>
                        <td>5. La méthodologie utilisée est-elle pertinente ?</td>
                        <td class="center">{{ $grille->methode_pertinente }}</td>
                    </tr>
                    <tr>
                        <td>6. Les élèves ont-ils été mis en activité ?</td>
                        <td class="center">{{ $grille->eleves_activite }}</td>
                    </tr>
                    <tr>
                        <td>7. Le contenu de la leçon est-il conforme au programme officiel ?</td>
                        <td class="center">{{ $grille->contenu_conforme }}</td>
                    </tr>
                    <tr>
                        <td>8. Le contenu de la leçon est-il bien maîtrisé par l’enseignant ?</td>
                        <td class="center">{{ $grille->contenu_maitrise }}</td>
                    </tr>
                    <tr>
                        <td>9. Les techniques d'animation ont-elles été bien appliquées ?</td>
                        <td class="center">{{ $grille->techniques_animation }}</td>
                    </tr>
                    <tr>
                        <td>10. Les exercices d'évaluation ont-ils été effectués ?</td>
                        <td class="center">{{ $grille->exercices_evaluation }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="form-section">
                <label>Total des points :</label>
                <div class="center">{{ $grille->total_points }}</div>
            </div>

            <div class="form-section">
                <label>Les Conseillers Pédagogiques :</label>
                <ol>
                    <li>{{ $grille->conseille1 }}</li>
                    <li>{{ $grille->conseille2 }}</li>
                    <li>{{ $grille->conseille3 }}</li>
                    <li>{{ $grille->conseille4 }}</li>
                    <li>{{ $grille->conseille5 }}</li>
                </ol>
            </div>

            <div class="form-section">
                <label for="date">Bamako le : <span>{{ $grille->date }}</span></label>
                
            </div>
        </form>
    </div>
</body>
</html>
