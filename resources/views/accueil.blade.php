@extends('layouts.app')

@section('content')

<div class="container">
    <nav>
        <ul>
            @guest

            @else
                <li> Bonjour {{ Auth::user()->name }}</li> @if (Auth::user())

                    <li><a href="#">Des liens spécifiques pour utilisateurs connectés..</a></li>
                @endif
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.
          getElementById('logout-form').submit();">
                        Logout
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}"
                      method="POST" style="display: none;"> {{ csrf_field() }}
                </form>
            @endguest  </ul>
        <a href=""> route vers la premiere salle route("Salle.show",1)</a>
        <a href="">route vers la vidéo</a>
    </nav>
    <div class="illustration">
        <img class="oeuvre" src="{{asset('storage/images/oeuvres/oeuvre-5.png')}}" alt="">
    </div>
    <div class="welcome">Bienvenue au musée virtuel !</div>
</div>

@endsection
