@extends('layouts.app')

@section('content')
    

<div class="container">
    <div class="profileCard">
        <div class="redcCircle"></div>
    <div class="avatarProfile"><img class="avatarProfile-img" src="{{asset('storage/'.$user->avatar)}}" alt=""></div>
    <form id="avatarForm" action="{{ route('user.upload',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label id="avatarLabel" for="avatar" class="form-label" style="cursor: pointer">Changer d'avatar</label>
            <input class="form-control" type="file" id="avatar" name="avatar" style="display: none">
        </div>

        <div class="col-12">
            <button id="avatarConfirm" class="btn btn-primary" type="submit">Confirmer</button>
        </div>
    </form>
    <h1 class="profileName">{{$user->name}}</h1>
    <h1 class="profileEmail">{{$user->email}}</h1>
    <h2 id="nbCommentaires">Nombre de commentaires : {{$nbCommentaires}}</h2>
    <h2 id="nbLikes">Nombre de Likes : {{$nbLikes}}</h2>
    </div>
</div>
@endsection
