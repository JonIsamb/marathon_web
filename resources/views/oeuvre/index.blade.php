@extends('layouts.app')

@section('content')
<div class="container">
    <div class="oeuvresGrid">
    @if(!empty($oeuvresNom) or !empty($oeuvresDescription) or !empty($oeuvresAuteur))
        @if(!empty($oeuvresNom))
            @foreach($oeuvresNom as $oeuvre)
            <a href="{{route('salle.show',$oeuvre->salle_id)}}#{{$oeuvre->id}}">
                <div class="oeuvreCard">
                    <img src="{{asset("storage/".$oeuvre->media_url)}}">
                    <h2>{{ $oeuvre->nom }}</h2><br>
                </div>
            </a>
            @endforeach
    @endif
        @if(!empty($oeuvresDescription))
            @foreach($oeuvresDescription as $oeuvre)
            <a href="{{route('salle.show',$oeuvre->salle_id)}}#{{$oeuvre->id}}">
                <div class="oeuvreCard">
                    <img src="{{asset("storage/".$oeuvre->media_url)}}">
                    <h2>{{ $oeuvre->nom }}</h2><br>
                </div>
            </a>
            @endforeach
        @endif
        @if(!empty($oeuvresAuteur))
            @foreach($oeuvresAuteur as $oeuvre)
            <a href="{{route('salle.show',$oeuvre->salle_id)}}#{{$oeuvre->id}}">
                <div class="oeuvreCard">
                    <img src="{{asset("storage/".$oeuvre->media_url)}}">
                    <h2>{{ $oeuvre->nom }}</h2><br>
                </div>
            </a>
            @endforeach
        @endif
    </div>
</div>

@else
    <h3>Aucun résultat correspondant</h3>
@endif

@endsection