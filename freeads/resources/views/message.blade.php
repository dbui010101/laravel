@extends('layout')

@section('contenu')
    <form action="/message" method="post" class="section">
    {{ csrf_field() }}
    <div class="field">
    <label class="label">phrase:</label>
        <div class="control">
        <textarea class="border-4 border-light-blue-500" type="phrase" name="phrase" rows="5" cols="33" value="{{old('phrase')}}">ecrivez votre message</textarea>
        </div>
        @if($errors->has('phrase'))
            <p class="help is danger">{{$errors->first('phrase')}}</p>
        @endif
    </div>
    <div class="field">
    <label class="label">a:</label>
        <div class="control">
        <input class="input" type="a" name="a">
        </div>
        @if($errors->has('a'))
            <p class="help is danger">{{$errors->first('a')}}</p>
        @endif
    </div>

    <div class="field">
        <div class="control">
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </form>
@endsection