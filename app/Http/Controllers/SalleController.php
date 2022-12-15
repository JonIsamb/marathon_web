<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function show(Request $request,$id){
        $salle= Salle::find($id);
        $oeuvres=$salle-> oeuvres;
        $path="storage/".$salle->plan_url;
        $commentaires=Commentaire::all();
        return view('salle.show',[
            'path'=>$path,
            'salle'=>$salle,
            'commentaires'=>$commentaires,
            'oeuvres'=>$oeuvres
        ]);
    }
}
