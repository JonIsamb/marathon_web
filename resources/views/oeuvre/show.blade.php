
<main>
<div class="text-center" style="margin-top: 7rem">
    <h3>Affichage d'une oeuvre</h3>
    <hr class="mt-2 mb-2">
    <table class="table">
        <thead style="background-color: #ddd; font-weight: bold;" >
        <tr>
            <th scope="col">nom</th>
            <th scope="col">description</th>
            <th scope="col">date d'ajout de l'oeuvre</th>
            <th scope="col">Auteur</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $oeuvre->nom }}</td>
            <td>{{ $oeuvre->description }}</td>
            <td>{{ $oeuvre->date_creation }}</td>
            <td>{{ $oeuvre->auteur }}</td>

        </tr>
        </tbody>
    </table>
    @auth()
        <form method="POST" action="{{route('user.like')}}">
            @csrf
            <input type="hidden" name="oeuvre_id" id="oeuvre_id" value="{{$oeuvre->id}}">
            <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
            <button type="submit" class="btn btn-primary">Liker</button>
        </form>
    @endauth
    <ul>
        @foreach($commentaires as $commentaire)

            <div class="mr-5 pr-5" style="width: 50%">
                <div style="background-color: #fff;	border-top: 2px dashed #8c8b8b;">
                    <div class="list-group">
                        <strong>titre </strong>{{ $commentaire->titre }}
                        <strong>texte</strong>  {{ $commentaire->contenu }}
                    </div>
                </div>
                @auth()
                    @if (Auth::user()->admin == 1 && $commentaire->valide == 0)
                        <form method="POST" action="{{route('commentaire.valide')}}">
                            @csrf
                            <input type="hidden" name="oeuvre_id" id="oeuvre_id" value="{{$oeuvre->id}}">
                            <input type="hidden" name="commentaire_id" id="commentaire_id" value="{{$commentaire->id}}">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </form>
                        <form method="POST" action="{{route('commentaire.supprime')}}">
                            @csrf
                            <input type="hidden" name="oeuvre_id" id="oeuvre_id" value="{{$oeuvre->id}}">
                            <input type="hidden" name="commentaire_id" id="commentaire_id" value="{{$commentaire->id}}">
                            <button type="submit" class="btn btn-primary">Supprimer</button>
                        </form>
                    @endif
                @endauth
            </div>
        @endforeach

    </ul>
    @guest
        <p>Connectez-vous pour commenter .</p>
        <a href="{{ route('login') }}" class="px-1 py-1"> <button type="button" class="btn btn-secondary">Connexion</button></a>
        <a href="{{ route('register') }}" class="px-1 py-1"> <button type="button" class="btn btn-secondary">Inscription</button></a>
    @endguest
    @if(Auth::user())

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Commentez !
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="container px-5 py-5">
                                <div class="row justify-content-center align-items-center">
                                    <div class="card" style="width: 75%">
                                        <div class="card-body">
                                            <h5 class="card-title">Commentaire</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">Commenter l'oeuvre</h6>
                                            <form method="POST" action="{{route('commentaire.store')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="titre">Titre</label>
                                                    <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre">
                                                </div>
                                                <div class="form-group">
                                                    <label for="texte">Commentaire</label>
                                                    <textarea type="text" name="texte" class="form-control" id="texte">Commentez l'oeuvre</textarea>
                                                </div>
                                                <input type="hidden" name="oeuvre_id" id="oeuvre_id" value="{{$oeuvre->id}}">
                                                <input type="hidden" name="oeuvre_id" id="oeuvre_id" value="{{$oeuvre->salle_id}}">

                                                <button type="submit" class="btn btn-primary">Valider</button>
                                            </form>

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif



