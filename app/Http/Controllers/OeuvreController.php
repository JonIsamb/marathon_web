<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use App\Models\Salle;
use Illuminate\Http\Request;

class OeuvreController extends Controller
{
    public function index(Request $request){
        $param=$request->get('search',null);
        $paramLieu=$request->get('lieu',null);
        $paramSalleId=$request->get('id_salle',null);
        if ($paramLieu==="salle"){
            $oeuvres=Oeuvre::where('salle_id','=',$paramSalleId,'and')->where('nom','like',$param,'or')->where('description','like',$param,'or')->where('auteur','like',$param,);
            $salle=Salle::find($paramSalleId);
            $path="storage/".$salle->plan_url;
            return view('salle.show',[
                'oeuvres'=>$oeuvres ,
                'salle'=>$salle,
                'path'=>$path
            ]);
        }
        $oeuvresNom=Oeuvre::where('nom','like','%'.$param.'%')->get();
        $oeuvresDescription=Oeuvre::where('description','like','%'.$param.'%')->get();
        $oeuvresAuteur=Oeuvre::where('auteur','like','%'.$param.'%')->get();
        return view('oeuvre.index',[
            'oeuvresNom'=>$oeuvresNom,
            'oeuvresDescription'=>$oeuvresDescription,
            'oeuvresAuteur'=>$oeuvresAuteur
        ]);
    }

    public function show($id)
    {
        $oeuvre = Oeuvre::find($id);

        $commentaires = Commentaire::all()->get();
        return view('oeuvre.show', [
            'oeuvre' => $oeuvre,
            'commentaires' => $commentaires
        ]);
    }
}

