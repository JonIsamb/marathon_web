<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function create(request $request){
        return view('oeuvre.create');
    }

    public function store(Request $request){

        $this->validate(
            $request,
            [
                'nom'=>'required',
                'media_url'=>'required',
                'thumbnail_url'=> 'required',
                'description'=>'required',
            ]
        );
        $oeuvre = new Oeuvre();

        $com->titre = $request->titre;
        $com->contenu = $request->texte;
        $com->valide=false;
        $com->user_id=Auth::user()->id;
        $com->oeuvre_id = $request->oeuvre_id;

        $com->save();

        return redirect()->route('oeuvre.show',[$request->oeuvre_id]);
    }

>>>>>>> app/Http/Controllers/OeuvreController.php

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

