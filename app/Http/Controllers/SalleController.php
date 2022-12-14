<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function show(Request $request,$id){
        $salle= Salle::find($id);
        $oeuvres=$salle-> oeuvres;
        $path="storage/".$salle->plan_url;
        return view('salle.show',[
            'path'=>$path,
            'salle'=>$salle,
            'oeuvres'=>$oeuvres
        ]);
    }
}
