<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Erreur 404</title>
    @vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js'])
</head>
<body>

<div class="container404">
    <h1 class="message404">404!</h1>
    <a class="button" href="{{route('accueil')}}">Retourner à l'accueil</a>
</div>


    
</body>
</html>