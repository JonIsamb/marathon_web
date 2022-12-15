<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;
use App\Models\Salle;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalleController extends Controller
{
    public function index(){
        $salles = Salle::all();

        return view('salle.index', ['salles' => $salles]);
    }

    public function show(Request $request,$id){
        $salle= Salle::find($id);
        $oeuvres = Oeuvre::where('salle_id','=',$id)->where('valide', '=', '1');
        if (Auth::check()){
            if (Auth::user()->admin == 1){
                $oeuvres=$salle-> oeuvres;
            }
        }

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
