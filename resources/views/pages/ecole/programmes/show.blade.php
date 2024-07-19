@extends('pages.ecole.interfaces.interfaceprogramme')
@section('content')
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
    @php
    function formatContent($contenu) {
$patterns = ['/2\./', '/3\./','/4\./', '/5\./','/6\./', '/7\./'];
$replacements = ['<br>2.', '<br>3.', '<br>4.', '<br>5.', '<br>6.', '<br>7'];
return preg_replace($patterns, $replacements, $contenu);
}
@endphp
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
                        <li>{!! $contenu !!}</li>
                       @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</body>
@endsection
