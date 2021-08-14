<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
class messageController extends Controller
{
    public function formulaire(){
        return view('message');
    }
    public function traitement(){
        request()->validate([
            'phrase' =>['required'],
            'a' =>['required'],
        ]);
            $utilisateur =Messages::create([
            'phrase' =>request('phrase'),
            'from' =>auth()->user()->pseudo,
            'a' =>request('a'),
            'oldmessage' =>'non',
        ]);
        return 'formulaire recu';
    }
}
