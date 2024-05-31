<!DOCTYPE html>
<html>
<head>
    <title>Notifications</title>
</head>
<body>
    <h1>Notifications</h1>

    <ul>
        @foreach ($notifications as $notification)
            <li>
                {{ $notification->data['message'] }} - <a href="{{ $notification->data['url'] }}">Voir</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
