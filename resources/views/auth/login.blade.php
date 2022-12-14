@extends('layouts.app')

@section('content')

    @include("_errors")
<div >
    <form action="{{route('login')}}" method="post">
        @csrf
        <div>
            <h1>Accès musée</h1>
            <div>
                Si vous n'avez pas de compte, <a href="{{route('register')}}">vous pouvez en créer un</a>.
            </div>
        </div>
        <div>
            <x-form-control-label label="Adresse mail" name="email" />
        </div>
        <div>
            <x-form-control-label label="Mot de passe" name="password" />
        </div>
        <div >
            <input type="submit" value="Connexion">
        </div>
    </form>
    <div>
        <a href="{{route('accueil')}}">Retour à la page principale</a>
    </div>
</div>
@endsection
