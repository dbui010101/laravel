@extends('layout2')

@section('contenu')
    <form action="/recherche" method="post" class="section">
    {{ csrf_field() }}
    <div class="field">
    <label class="label">nom</label>
        <div class="control">
        <input class="input" type="nom" name="nom" value="{{old('nom')}}">
        </div>
        @if($errors->has('nom'))
            <p class="help is danger">{{$errors->first('nom')}}</p>
        @endif
    </div>

    <div class="field">
    <label class="label">type de produit</label>
        <div class="control">
        <input class="input" type="type_de_produit" name="type_de_produit" value="{{old('type_de_produit')}}">
        </div>
        @if($errors->has('type_de_produit'))
            <p class="help is danger">{{$errors->first('type_de_produit')}}</p>
        @endif
    </div>

    <div class="field">
    <label class="label">titre</label>
        <div class="control">
        <input class="input" type="titre" name="titre" value="{{old('titre')}}">
        </div>
        @if($errors->has('titre'))
            <p class="help is danger">{{$errors->first('titre')}}</p>
        @endif
    </div>

    <div class="field">
    <label class="label">description</label>
        <div class="control">
        <input class="input" type="description" name="description" value="{{old('description')}}">
        </div>
        @if($errors->has('description'))
            <p class="help is danger">{{$errors->first('description')}}</p>
        @endif
    </div>

    <div class="field">
    <label class="label">prix</label>
        <div class="control">
        <input class="input" type="prix" name="prix">
        </div>
        @if($errors->has('prix'))
            <p class="help is danger">{{$errors->first('prix')}}</p>
        @endif
    </div>

    <div class="field">
    <label class="label">from</label>
        <div class="control">
        <input class="input" type="from" name="from">
        </div>
        @if($errors->has('prix'))
            <p class="help is danger">{{$errors->first('from')}}</p>
        @endif
    </div>
    <p>cliquez pour activer le mode recent:</p>

    <div>
    <input type="checkbox"  name="recent">
    <label for="scales">recent</label>
    </div>

    <div class="field">
        <div class="control">
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </form>



    
@endsection