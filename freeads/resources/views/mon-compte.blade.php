@extends('layout')

@section('contenu')
    <div class="section">
        <h1 class="titre is-1">Mon compte</h1>

        <p>Vous êtes bien connecté.</p>

        <a href="/deconnexion" class="button">Déconnexion</a>
    </div>

    <form class="section" action="/modification-mot-de-passe" method="post">
        {{csrf_field()       }}


        <a href="/profil" class="button">profil</a>
        <a href="/supprimercompte" class="button">supprimer compte</a>
        <a href="/createannonce" class="button">cree une annonce</a>
        <a href="/mesannonces" class="button">modif or delete annonce</a>

    <div class="field">
    <label class="label"> nouveau password</label>
        <div class="control">
        <input class="input" type="password" name="password">
        </div>
        @if($errors->has('password'))
            <p class="help is danger">{{$errors->first('password')}}</p>
        @endif
    </div>


    <div class="field">
    <label class="label">password_confirmation</label>
        <div class="control">
        <input class="input" type="password_confirmation" name="password_confirmation">
        </div>
        @if($errors->has('password_confirmation'))
            <p class="help is danger">{{$errors->first('password_confirmation')}}</p>
        @endif
    </div>

    <div class="field">
    <label class="label"> nouveau pseudo</label>
        <div class="control">
        <input class="input" type="pseudo" name="pseudo">
        </div>
        @if($errors->has('pseudo'))
            <p class="help is danger">{{$errors->first('pseudo')}}</p>
        @endif
    </div>
    


    <div class="field">
        <div class="control">
            <button class="button is-link" type="submit">modfi mot de passe</button>
        </div>
    </form>
@endsection