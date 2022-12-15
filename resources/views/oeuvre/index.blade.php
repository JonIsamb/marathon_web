@if(!empty($oeuvresNom) or !empty($oeuvresDescription) or !empty($oeuvresAuteur))
    @if(!empty($oeuvresNom))
        @foreach($oeuvresNom as $oeuvre)
            <div>
                <strong>titre: </strong><a href="{{route('salle.show',$oeuvre->salle_id)}}#{{$oeuvre->id}}">{{ $oeuvre->nom }}</a><br>
                <img src="{{asset("storage/".$oeuvre->media_url)}}">
            </div><br>
        @endforeach
   @endif
    @if(!empty($oeuvresDescription))
        @foreach($oeuvresDescription as $oeuvre)
            <div>
                <strong>titre: </strong><a href="{{route('salle.show',$oeuvre->salle_id)}}#{{$oeuvre->id}}">{{ $oeuvre->nom }}</a><br>
                <img src="{{asset("storage/".$oeuvre->media_url)}}">
            </div><br>
        @endforeach
    @endif
    @if(!empty($oeuvresAuteur))
        @foreach($oeuvresAuteur as $oeuvre)
            <div>
                <strong>titre: </strong><a href="{{route('salle.show',$oeuvre->salle_id)}}#{{$oeuvre->id}}">{{ $oeuvre->nom }}</a>}<br>
                <img src="{{asset("storage/".$oeuvre->media_url)}}">
            </div><br>
        @endforeach
    @endif
@else
    <h3>aucune oeuvres</h3>
@endif
