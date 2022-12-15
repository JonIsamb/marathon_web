<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalleController extends Controller
{
    public function show(Request $request,$id){
        $salle= Salle::find($id);
        $oeuvres = Oeuvre::where('salle_id','=',$id)->where('valide', '=', '1');
        if (Auth::check()){
            if (Auth::user()->admin == 1){
                $oeuvres=$salle-> oeuvres;
            }
        }

        $path="storage/".$salle->plan_url;
        return view('salle.show',[
            'path'=>$path,
            'salle'=>$salle,
            'oeuvres'=>$oeuvres
        ]);
    }
}
