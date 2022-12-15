<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @yield("css")
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js'])
</head>
<body>
<nav>
        @guest
            <div class="logo">
                <img src="{{asset('storage/images/logo/Full.png')}}" alt="">
                <h1>Capitol Art Gallery</h1>
            </div>
            <div>
                <input id="searchBar" type="text" placeholder="Rechercher..."><a href=""></a>
                <a id="loginButton" href="{{ route('login') }}">SE CONNECTER</a>
                <a id="registerButton" href="{{ route('register') }}">S'INSCRIRE</a>
            </div>
        @else
            <div class="logo">
                <img src="{{asset('storage/images/logo/Full.png')}}" alt="">
                <h1>Capitol Art Gallery</h1>
            </div>
            <div class="liens">
                <a href="{{ route('home') }}">Accueil</a>
                <a href="{{ route('salle.show', 1) }}">Commencer la visite</a>
            </div>
            <div class="center">
                <input id="searchBar" type="text" placeholder="Rechercher..."><a href=""></a>
            </div>
            <div class="right">
                <a href="{{ route('user.show',Auth::user()->id) }}"><div class="avatar"><img class="avatar-img" src="{{asset('storage/'.Auth::user()->avatar)}}" alt=""></div></a>
                <a id="logoutButton" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Déconnexion</a>
                <form id="logout-form" action="{{route('logout')}}"
                method="POST" style="display: none;"> {{ csrf_field() }}
                </form>
            </div>
        @endguest
</nav>

    @yield('content')

</body>
</html>
