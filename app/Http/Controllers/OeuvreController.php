<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use Illuminate\Http\Request;

class OeuvreController extends Controller
{


    public function show($id)
    {
        $oeuvre = Oeuvre::find($id);

        $commentaires = Commentaire::where('oeuvre_id', '=', $id)->orderBy("created_at", "desc")->get();
        return view('oeuvre.show', [
            'oeuvre' => $oeuvre,
            'commentaires' => $commentaires
        ]);
    }
}

