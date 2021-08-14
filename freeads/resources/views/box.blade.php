@extends('layout2')

@section('contenu')
        <div class="section">
    <form action="/box" method="post" class="section">
    {{ csrf_field() }}
    <p>Vous avez {{$nombre}} nouveaux messages</p>
    <div class="field">
        <div class="control">
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </div>
    @foreach ($allmessage as $column)
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden max-w-screen-2xl">
    <div class="md:flex">
    <div class="p-1">
    <table>
        <thead><tr><th class="text-3xl">from: {{$column->from}}</th></thead></tr>
        <thead><tr><th class="text-3xl">message: {{$column->phrase}}</th></thead></tr>    
    <table>
    </div>
  </div>
    </div>
    
    </div>
    <p>Coche pour qu'il passe en vieux message:</p>
    <div>
    <input type="checkbox"  name="{{$column->id}}">
    <label for="scales">lu</label>
    </div>
    @endforeach
    
    </form>





@endsection