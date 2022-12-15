<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use App\Models\Salle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class OeuvreController extends Controller
{
    static $compteurX = 0;

    static $compteurY = 0;

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
    public function create(request $request){
        return view('oeuvre.create');
    }

    public function store(Request $request){
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'media' => 'required',
                'description' => 'required',
                'auteur' => 'required',
            ]
        );



        $oeuvre = new Oeuvre();

        $oeuvre->nom = $request->nom;
        $oeuvre->valide=false;
        $oeuvre->description = $request->description;

        if (self::$compteurX % 2 == 0){
            $oeuvre->coord_x = 300;
        } else {
            $oeuvre->coord_x = -300;
        }
        self::$compteurX++;

        if (self::$compteurY % 4 == 0 or self::$compteurY % 4 == 1){
            $oeuvre->coord_y = 300;
        } else {
            $oeuvre->coord_y = -300;
        }
        self::$compteurY++;

        if ($request->hasFile('media') && $request->file('media')->isValid()) {
            $file = $request->file('media');
        } else {
            $msg = "Aucun fichier téléchargé";
            return redirect()->route('salle.show', [5])
                ->with('type', 'primary')
                ->with('msg', 'Visiteur non modifié ('. $msg . ')');
        }
        $nom = 'oeuvre';
        $now = time();
        $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());

        $file->storeAs('images/oeuvres', $nom);
        $oeuvre->media_url = 'images/oeuvres/'.$nom;
        $oeuvre->thumbnail_url = 'images/oeuvres/'.$nom;

        $file->store('oeuvres');
        $oeuvre->save();

        return redirect()->route('salle.show',[5]);
    }

    public function show($id)
    {
        $oeuvre = Oeuvre::find($id);
        $commentaires_validation = Commentaire::where('oeuvre_id', '=', $id)->where('valide','=','0')->orderBy("created_at", "desc")->get();

        $commentaires = Commentaire::where('oeuvre_id', '=', $id)->where('valide','=','1')->orderBy("created_at", "desc")->get();

        return view('oeuvre.show', [
            'oeuvre' => $oeuvre,
            'commentaires' => $commentaires,
            'commentaires_validation' => $commentaires_validation,
        ]);


    }
}

