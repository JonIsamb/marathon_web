<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(int $id) {
        $user = User::find($id);

        $nbCommentaires = Commentaire::where('user_id', $id)->count();
        $nbLikes = sizeof($user->likes);

        return view('user.show', ['user' => $user, 'nbCommentaires' => $nbCommentaires, 'nbLikes' => $nbLikes]);
    }

    public function upload(Request $request, $id) {
        $user = User::findOrFail($id);
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $file = $request->file('avatar');
        } else {
            $msg = "Aucun fichier téléchargé";
            return redirect()->route('user.show', [$id])
                ->with('type', 'primary')
                ->with('msg', 'Visiteur non modifié ('. $msg . ')');
        }
        $nom = 'avatar';
        $now = time();
        $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());

        $file->storeAs('images/avatars', $nom);
        if (isset($user->avatar)) {
            Log::info("Image supprimée : ". $user->avatar);
            Storage::delete($user->avatar);
        }
        $user->avatar = 'images/avatars/'.$nom;
        $user->save();
        $file->store('avatars');
        return redirect()->route('user.show', [$id])
            ->with('type', 'primary')
            ->with('msg', 'Visiteur modifié avec succès');
    }

    public function like(Request $request){
        $user = User::find($request->user_id);
        $oeuvres_ids = $user->likes()->pluck('oeuvre_id');

        if($oeuvres_ids->contains($request->oeuvre_id)){
            $user->likes()->detach($request->oeuvre_id);
        } else {
            $user->likes()->attach($request->oeuvre_id);
        }

        return redirect()->route('oeuvre.show', [$request->oeuvre_id]);
    }
}
