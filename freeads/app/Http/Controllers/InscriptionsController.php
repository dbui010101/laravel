<?php

namespace App\Http\Controllers;

use App\Models\Inscriptions;

class InscriptionsController extends Controller
{
    public function formulaire(){
        return view('inscription');
    }
    public function traitement(){
        request()->validate([
            'email' =>['required','email'],
            'password' =>['required','Confirmed'],
            'password_confirmation' =>['required'],
            'pseudo' =>[],
        ]);
            $utilisateur =Inscriptions::create([
            'email' =>request('email'),
            'password' =>bcrypt(request('password')),
            'pseudo' =>request('pseudo'),
        ]);
        return 'formulaire recu';
    }
}
