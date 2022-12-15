<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentaireController extends Controller
{
    public function store(Request $request){
        $this->validate(
            $request,
            [
                'titre'=>'required',
                'texte'=>'required',
                'oeuvre_id'=>'required',
                'salle_id' => 'required',
                'user_id' => 'required'
            ]
        );

        $com = new Commentaire();

        $com->titre = $request->titre;
        $com->contenu = $request->texte;
        $com->valide=0;
        $com->user_id=$request->user_id;
        $com->oeuvre_id = $request->oeuvre_id;
        $com->save();

        return redirect()->route('salle.show',[$request->salle_id]);
    }

    public function valide(Request $request){
        $com = Commentaire::find($request->commentaire_id);
        $com->valide = 1;
        $com->save();
        return redirect()->route('oeuvre.show',$request->oeuvre_id);
    }

    public function supprime(Request $request){
        $com = Commentaire::find($request->commentaire_id);
        $com->delete();
        return redirect()->route('oeuvre.show',$request->oeuvre_id);
    }

}
