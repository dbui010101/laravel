<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscriptions;
class UtilisateursController extends Controller
{
    public function liste(){
        $utilisateur=Inscriptions::all();

        return view('utilisateurs',[
            'utilisateur' =>$utilisateur,
        ]);
    }
    public function voir(){
        $email=request('email');
        $utilisateur=Inscriptions::where('email',$email)->first();
        return view('utilisateur',[
            'utilisateur' =>$utilisateur,
        ]);
    }
}
