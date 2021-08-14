@extends('layout')

@section('contenu')
    <form action="/createannonce" method="post" class="section" enctype='multipart/form-data'>
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
    <label class="label">type_de_produit</label>
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
        <input class="input" type="description" name="description">
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
        <div class="control">
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </form>
@endsection