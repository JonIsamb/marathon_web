<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        Id : {{$user->id}}
        Nom : {{$user->name}}
        Email : {{$user->email}}
        Avatar : <img src="{{asset('storage/'.$user->avatar)}}">
    </h1>

    <h2>
        Nombre de likes : {{$nbLikes}}
        Nombre de commentaires : {{$nbCommentaires}}
    </h2>
</body>
</html>
