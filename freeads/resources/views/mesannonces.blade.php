@extends('layout2')

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
            
    </div>
  </div>
    </div>
    @endforeach
    </div>

    <form action="/mesannonces" method="post" class="section" enctype='multipart/form-data'>
    {{ csrf_field() }}
    <div class="field">
    <label class="label">choisir la modification des champs selon id(*)</label>
        <div class="control">
        <input class="input" type="id" name="id" value="{{old('id')}}">
        </div>
        @if($errors->has('id'))
            <p class="help is danger">{{$errors->first('id')}}</p>
        @endif
    </div>

    <div class="field">
    <label class="label">nom(*)</label>
        <div class="control">
        <input class="input" type="nom" name="nom" value="{{old('nom')}}">
        </div>
        @if($errors->has('nom'))
            <p class="help is danger">{{$errors->first('nom')}}</p>
        @endif
    </div>

    <div class="field">
    <label class="label">type de produit(*)</label>
        <div class="control">
        <input class="input" type="type_de_produit" name="type_de_produit" value="{{old('type_de_produit')}}">
        </div>
        @if($errors->has('type_de_produit'))
            <p class="help is danger">{{$errors->first('type_de_produit')}}</p>
        @endif
    </div>





    <label class="label">titre(*)</label>
        <div class="control">
        <input class="input" type="titre" name="titre" value="{{old('titre')}}">
        </div>
        @if($errors->has('titre'))
            <p class="help is danger">{{$errors->first('titre')}}</p>
        @endif
    </div>


    <div class="field">
    <label class="label">description(*)</label>
        <div class="control">
        <input class="input" type="description" name="description" value="{{old('description')}}">
        </div>
        @if($errors->has('description'))
            <p class="help is danger">{{$errors->first('description')}}</p>
        @endif
    </div>


    <div class="field">
    <label class="label">photographie0</label>
        <div class="control">
        <input type="file" type="file" name="photographie0" >
        </div>
        @if($errors->has('photographie0'))
            <p class="help is danger">{{$errors->first('photographie0')}}</p>
        @endif
    </div>
    <div class="field">
    <label class="label">photographie1</label>
        <div class="control">
        <input type="file" type="file" name="photographie1" >
        </div>
        @if($errors->has('photographie1'))
            <p class="help is danger">{{$errors->first('photographie1')}}</p>
        @endif
    </div>
    <div class="field">
    <label class="label">photographie2</label>
        <div class="control">
        <input type="file" type="file" name="photographie2" >
        </div>
        @if($errors->has('photographie2'))
            <p class="help is danger">{{$errors->first('photographie2')}}</p>
        @endif
    </div>
    <p>Supprimer les images selon leurs position:</p>

    <div>
    <input type="checkbox"  name="supp0">
    <label for="scales">position0</label>
    </div>

    <div>
    <input type="checkbox"  name="supp1">
    <label for="horns">position1</label>
    </div>

    <div>
    <input type="checkbox" name="supp2">
    <label for="horns">postion2</label>
    </div>

    <div class="field">
    <label class="label">prix(*)</label>
        <div class="control">
        <input class="input" type="prix" name="prix">
        </div>
        @if($errors->has('prix'))
            <p class="help is danger">{{$errors->first('prix')}}</p>
        @endif
    </div>


    <div class="field">
        <div class="control">
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </form>






    <form action="/mesannonces" method="post" class="section">
    {{ csrf_field() }}
    <div class="field">
    <label class="label">choisir l'annonce a suuprimé selon id(*)</label>
        <div class="control">
        <input class="input" type="supprimer" name="supprimer" value="{{old('supprimer')}}">
        </div>
        @if($errors->has('supprimer'))
            <p class="help is danger">{{$errors->first('supprimer')}}</p>
        @endif
    </div>

    <div class="field">
        <div class="control">
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </form>



@endsection