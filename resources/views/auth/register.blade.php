@extends('layouts.app')

@section('content')

<div class="container">
    <div class="registerCard">
        @include("_errors")
        <form action="{{route('register')}}" method="post">
            @csrf
            <h1>S'inscrire</h1>

    <div class="inputs">
                
                <x-form-control-label class="loginInput" label="Nom :" name="name" />
            <!-- Email Address -->
                <x-form-control-label class="loginInput" label="Adresse mail :" name="email" />

            <!-- Password -->
                <x-form-control-label class="loginInput" label="Mot de passe :" name="password" />
            <!-- Confirm Password -->
                <x-form-control-label class="loginInput" label="Confirmation du mot de passe :" name="password_confirmation" />
            </div>
                <input class="validate" type="submit" value="Enregistrement">
                <h2>Si vous avez déjà un compte, <a href="{{route('login')}}">Connectez-vous</a></h2>
        </form>
    </div>
</div>
@endsection
