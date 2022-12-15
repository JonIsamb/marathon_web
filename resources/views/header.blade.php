@php
    $link=\Illuminate\Http\Request::url();
    $list_link=explode("/",$link);
    $salle=false;
    foreach($list_link as $elt){
        if($elt==="salle"){$lieu_salle=true;break;}
    }
@endphp
<form action="{{route('oeuvre.index')}}" method="get">
    @if($lieu_salle)
        <input name="lieu" type="hidden" value="salle">
        <input name="id_salle" type="hidden" value="{{$salle->id}}">
    @endif
    <select name="search">
        <text-area rows="1" cols="10"></text-area>
    </select>
    <input type="submit" value="Recherche">
</form>
