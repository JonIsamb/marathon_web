@extends('layouts.app')

@section('content')

<div class="loginCard" >
    <form action="{{route('login')}}" method="post">
        @csrf
            <h1>Se connecter</h1>
            <x-form-control-label class="loginInput" label="Adresse mail :" name="email" />
            <x-form-control-label  class="loginInput" label="Mot de passe :" name="password" />
            <input class="validate" type="submit" value="Connexion">
            <h2> Si vous n'avez pas de compte, <a href="{{route('register')}}">vous pouvez en créer un</a></h2>
    </form>
</div>
@endsection
