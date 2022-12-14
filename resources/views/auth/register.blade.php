@extends('layouts.app')

@section('content')

<div>
    @include("_errors")
    <form action="{{route('register')}}" method="post">
        @csrf
        <div>
            <h1>Création accès musée</h1>
            <div>
                Si vous avez déjà un compte, <a href="{{route('login')}}">connectez-vous</a>.
            </div>
        </div>
        <div>
            <x-form-control-label label="Nom" name="name" />
        </div>

        <!-- Email Address -->
        <div>
            <x-form-control-label label="Adresse mail" name="email" />
        </div>

        <!-- Password -->
        <div>
            <x-form-control-label label="Mot de passe" name="password" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-form-control-label label="Confirmation mot de passe" name="password_confirmation" />
        </div>
        <div>
            <input type="submit" value="Enregistrement">
        </div>
    </form>
    <div>
        <a href="{{route('accueil')}}">Retour à la page principale</a>
    </div>
</div>

@endsection
