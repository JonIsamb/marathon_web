@extends('layouts.app')

@section('content')
<div class="containerGrid">
    <div class="oeuvresGrid">
    @if(!empty($oeuvresNom) or !empty($oeuvresDescription) or !empty($oeuvresAuteur))
        @if(!empty($oeuvresNom))
            @foreach($oeuvresNom as $oeuvre)
            <a class="oeuvreCard" href="{{route('salle.show',$oeuvre->salle_id)}}#{{$oeuvre->id}}">
                <div>
                    <div class="oeuvreImage"><img src="{{asset("storage/".$oeuvre->media_url)}}"></div>
                    <h2 class="oeuvreNom">{{ $oeuvre->nom }}</h2>
                </div>
            </a>
            @endforeach
    @endif
        @if(!empty($oeuvresDescription))
            @foreach($oeuvresDescription as $oeuvre)
            <a class="oeuvreCard" href="{{route('salle.show',$oeuvre->salle_id)}}#{{$oeuvre->id}}">
                <div>
                    <div class="oeuvreImage"><img src="{{asset("storage/".$oeuvre->media_url)}}"></div>
                    <h2 class="oeuvreNom">{{ $oeuvre->nom }}</h2>
                </div>
            </a>
            @endforeach
        @endif
        @if(!empty($oeuvresAuteur))
            @foreach($oeuvresAuteur as $oeuvre)
            <a class="oeuvreCard" href="{{route('salle.show',$oeuvre->salle_id)}}#{{$oeuvre->id}}">
                <div>
                    <div class="oeuvreImage"><img src="{{asset("storage/".$oeuvre->media_url)}}"></div>
                    <h2 class="oeuvreNom">{{ $oeuvre->nom }}</h2>
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