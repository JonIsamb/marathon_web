<strong>Bienvenue la salle {{$salle->id}}: {{$salle->nom}}</strong><br>
<p>Le théme de cette salle est {{$salle->theme}}</p>
{{$salle->description}}<br>
<img src="{{asset($path)}}"><br>

@if(!empty($oeuvres))
    @foreach($oeuvres as $oeuvre)
        <div>
            <strong>titre: </strong>{{ $oeuvre->nom }}<br>
            <img src="{{asset("storage/".$oeuvre->media_url)}}">
        </div><br>
    @endforeach
    @if($salle->id!=5)
        <a href="{{ route('salle.show', ($salle->id)+1) }}"> Acceder a la salle suivante</a></br>
    @endif

@else
    <h3>aucune oeuvres</h3>
@endif
