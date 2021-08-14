@extends('layout')

@section('contenu')
    <div class="section">
    
        <h1 class="title is-1">email: {{$email}}</h1>
        <h1 class="title is-1">mdp: {{$password}}</h1>
        <h1 class="title is-1">pseudo: {{$pseudo}}</h1>
    </div>
@endsection