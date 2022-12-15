@extends('layouts.app')

@section('content')
    @foreach($salles as $salle)
        <p>{{$salle->id}}</p>
        <p>{{$salle->nom}}</p>
        <p>{{$salle->theme}}</p>
    @endforeach
@endsection
