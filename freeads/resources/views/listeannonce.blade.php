@extends('layout')

@section('contenu')
    <div class="section">
    @foreach ($allannonce as $column)
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden max-w-screen-2xl">
    <div class="md:flex">
    
    <div class="p-1">
        <table>
        <thead><tr><th class="text-3xl">id_annonce: {{$column->id_annonce}}</th></thead></tr>
        <thead><tr><th class="text-3xl">nom: {{$column->nom}}</th></thead></tr>
        <thead><tr><th class="text-3xl">type de produit: {{$column->type_de_produit}}</th></thead></tr>
        <thead><tr><th class="text-3xl">titre: {{$column->titre}}</th></thead></tr>
        <thead><tr><th class="text-3xl">description: {{$column->description}}</th></thead></tr>
        <thead><tr><th class="text-3xl">
        <div class="flex flex-row"> 
        @foreach ($photographies as $column2)
            @if($column2->id_annonce==$column->id_annonce)
            <div class="flex flex-row">
            <div>image {{$column2->position}}:
            <img class="w-20 h-20" src="data:image/png;base64, {{$column2->photographies}}"/>
            </div></div>
            @endif
        @endforeach
        </div>
        </th></thead></tr>
        <thead><tr><th class="text-3xl">prix: {{$column->prix}}</th></thead></tr>
        <thead><tr><th class="text-3xl">from: {{$column->from}}</th></thead></tr>
        <table>
    @endforeach
    </div></div></div>
    </div>
@endsection