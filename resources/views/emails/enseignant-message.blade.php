<!DOCTYPE html>
<html lang="fr">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bienvenue à Mr./Mme: {{ $data['nom']}} {{ $data['prenom']}}</title>
<style>
    body {
        background: #f7f7f7;
        padding: 30px;
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    h1 {
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
    }
    p {
        color: #555;
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 20px;
    }
    .info {
        background: #f1f1f1;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
    }
    .info p {
        margin: 0;
        font-weight: bold;
    }
    .footer {
        text-align: center;
        color: #999;
        font-size: 14px;
    }
</style>
</head>
<body>

<div class="container">
    <h1>Bienvenue à {{ $data['nom']}} {{ $data['prenom']}}</h1>
    <p>Votre avez été ajoutée avec succès.</p>
    <p>Vous pouvez vous connecter en utilisant les informations suivantes :</p>
    <div class="info">
        <p>Email: {{$data['email']}}</p>
        <p>Nom: {{$data['nom']}}</p>
        <p>Prenom: {{$data['prenom']}}</p>
        <p>Mot de passe: {{$data['password']}}</p>
    </div>
    <p>Merci !!!</p>
    <div class="footer">
        <p>&copy; {{ date('Y') }} {{ $data['nom'] }} {{ $data['prenom']}} Nous serons ravis de vous voir sur le système GECAP.</p>
    </div>
</div>

</body>
</html>