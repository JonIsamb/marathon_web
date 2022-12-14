<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OeuvreController extends Controller
{
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

