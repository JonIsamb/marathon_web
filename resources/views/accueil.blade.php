@extends('layouts.app')

@section('content')

<div class="container">
    <nav>
        <ul>
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li> Bonjour {{ Auth::user()->name }}</li> 
            @if (Auth::user())
                <li><a href="#">Des liens spécifiques pour utilisateurs connectés..</a></li>
                <li>
                    <a class="button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Se déconnecter
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}"
                      method="POST" style="display: none;"> {{ csrf_field() }}
                </form>
            @endif
            @endguest  
        </ul>
        <a href=""> route vers la premiere salle route("Salle.show",1)</a>
        <a href="">route vers la vidéo</a>
    </nav>
    <div class="illustration">
        <img class="oeuvre" src="{{asset('storage/images/oeuvres/oeuvre-5.png')}}" alt="">
    </div>
    <div class="lg:mt-[12rem] grid place-content-center place-items-center w-full">
        <h1 class="text-8xl font-bold font-primary">
            Capitol Gallery Art
        </h1>
        <a href="" class="button bg-accent mt-8 text-stone-50">Commencer la visite</a>
    </div>
    <div class="bg-primary">jar</div>
</div>
@endsection
