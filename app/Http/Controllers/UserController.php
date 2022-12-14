<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(int $id) {
        $user = User::find($id);

        $nbCommentaires = Commentaire::where('user_id', $id)->count();
        $nbLikes = sizeof($user->likes);

        return view('user.show', ['user' => $user, 'nbCommentaires' => $nbCommentaires, 'nbLikes' => $nbLikes]);
    }


}
