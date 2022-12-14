<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        Id : {{$user->id}}
        Nom : {{$user->name}}
        Email : {{$user->email}}
        Avatar : <img src="{{asset('storage/'.$user->avatar)}}">
    </h1>
    <form action="{{ route('user.upload',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input class="form-control" type="file" id="avatar" name="avatar">
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Appliquer les modifications</button>
        </div>
    </form>
    <h2>
        Nombre de likes : {{$nbLikes}}
        Nombre de commentaires : {{$nbCommentaires}}
    </h2>
</body>
</html>
