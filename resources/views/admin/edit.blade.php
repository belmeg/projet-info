<?php
$user = auth()->user();
?>
@include('layouts.header')
@if($user!=null)
@if($user->adminRole==1)
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('admin')}}">Panel administrateur</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('listequestions')}}">Liste questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('editquestions')}}">Modifier/Ajouter questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('editregles')}}">Modifier/Ajouter règles</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <h2>Modifier les types</h2>
    <p>
        <a class="btn btn-success" data-bs-toggle="collapse" href="#ajouterType" role="button" aria-expanded="false" aria-controls="ajouterType">
            Ajouter un type
        </a>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#modifierType" role="button" aria-expanded="false" aria-controls="modifierType">
            Modifier un type
        </a>
        <a class="btn btn-danger" data-bs-toggle="collapse" href="#supprimerType" role="button" aria-expanded="false" aria-controls="supprimerType">
            Supprimer un type
        </a>
    </p>
        <br>
        <div class="collapse" id="ajouterType">
            <form method="POST" action="/admin/ajoutertype">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nomType">Nom du type:</label>
                    <input type="text" class="form-control" id="nomType" name="nomType" required="required">
                </div>
                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
        <div class="collapse" id="modifierType">
            <form method="POST" action="/admin/edittype">
                {{ csrf_field() }}
                <div class="form-group">
                    <select class="form-select" aria-label="nomType" id="nomType" name="nomType" required="required">
                        @foreach(DB::connection('mysql')->table('question_type')->get() as $type)
                            <option value="{{$type->questionType}}">{{$type->questionType}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nomType">Nouveau nom du type:</label>
                    <input type="text" class="form-control" id="nouveauNomType" name="nouveauNomType" required="required">
                </div>
                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
        <div class="collapse" id="supprimerType">
            <form method="POST" action="/admin/supprimertype">
                {{ csrf_field() }}
                <div class="form-group">
                    <select class="form-select" aria-label="nomType" id="nomType" name="nomType" required="required">
                        @foreach(DB::connection('mysql')->table('question_type')->get() as $type)
                            <option value="{{$type->questionType}}">{{$type->questionType}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </form>
        </div>
        <br>
        <h2>Modifier les questions</h2>
    <p>
        <a class="btn btn-success" data-bs-toggle="collapse" href="#ajouterQuestion" role="button" aria-expanded="false" aria-controls="ajouterQuestion">
            Ajouter une question
        </a>
        <a class="btn btn-danger" data-bs-toggle="collapse" href="#supprimerQuestion" role="button" aria-expanded="false" aria-controls="supprimerQuestion">
            Supprimer une question
        </a>
    </p>
        <div class="collapse" id="ajouterQuestion">
            <form method="POST" action="/admin/ajouterquestion" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="image">Image de la question (URL):</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/png, image/jpeg" required="required">
                </div>
                <div class="form-group">
                    <label for="question">Question entière:</label>
                    <input type="text" class="form-control" id="question" name="question" required="required">
                </div>
                <div class="form-group">
                    <label for="reponse">Réponse 1 (bonne réponse):</label>
                    <input type="text" class="form-control" id="reponse" name="reponse" required="required">
                </div>
                <div class="form-group">
                    <label for="reponse2">Réponse 2 (fausse réponse):</label>
                    <input type="text" class="form-control" id="reponse2" name="reponse2" required="required">
                </div>
                <div class="form-group">
                    <label for="reponse3">Réponse 3 (fausse réponse):</label>
                    <input type="text" class="form-control" id="reponse3" name="reponse3" required="required">
                </div>
                <div class="form-group">
                    <label for="reponse4">Réponse 4 (fausse réponse):</label>
                    <input type="text" class="form-control" id="reponse4" name="reponse4" required="required">
                </div>
                <div class="form-group">
                    <label for="indice">Indice:</label>
                    <input type="text" class="form-control" id="indice" name="indice" required="required">
                </div>
                <div class="form-group">
                    <label for="explication">Explication:</label>
                    <input type="text" class="form-control" id="explication" name="explication" required="required">
                </div>
                <div class="form-group">
                    <label for="questionType">Question type:</label>
                    <select class="form-select" aria-label="questionType" id="questionType" name="questionType" required="required">
                        @foreach(DB::connection('mysql')->table('question_type')->get() as $type)
                            <option value="{{$type->questionType}}">{{$type->questionType}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="questionLevel">Difficulté:</label>
                    <select class="form-select" aria-label="questionLevel" id="questionLevel" name="questionLevel" required="required">
                        <option value="Facile">Facile</option>
                        <option value="Moyenne">Moyenne</option>
                        <option value="Difficile">Difficile</option>
                    </select>
                </div>
                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
    <div class="collapse" id="supprimerQuestion">
        <form method="POST" action="/admin/supprimerquestion">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="question">Question:</label>
                <select class="form-select" aria-label="question" id="question" name="question" required="required">
                    @foreach(DB::connection('mysql')->table('question')->get() as $type)
                        <option value="{{$type->id}}">{{$type->question}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button style="cursor:pointer" type="submit" class="btn btn-danger">Supprimer</button>
            </div>
        </form>
    </div>
</div>
@else
@php
header("Location: " . URL::to('/'), true, 302);
exit();
@endphp
@endif
@else
@php
header("Location: " . URL::to('/'), true, 302);
exit();
@endphp
@endif
@include('layouts.footer')
