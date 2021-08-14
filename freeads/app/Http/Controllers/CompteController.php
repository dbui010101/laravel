<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscriptions;
use App\Models\Annonce;
class CompteController extends Controller
{
    public function accueil(){
        if(auth()->guest()){
            return redirect('/connexion')->withErrors([
                'email' =>"vous devez être connecté pour voir cette page",
                'password' =>"vous devez être connecté pour voir cette page",
            ]);
        }
        return view('mon-compte');
    }
    public function deconnexion(){
        auth()->logout();
        flash("vous etes maintenant deco")->success();
        return redirect('/');
    }
    public function modificationMotDePasse(){
        if(auth()->guest()){
            flash("vous devez etre connecté pour voir cette page.")->error();
            return redirect('/connexion');
        }

        request()->validate([
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required'],
            
        ]);

        //dump(auth()->user());
        auth()->user()->update([
            'password' => bcrypt(request('password')),
            'pseudo' => request('pseudo'),
        ]);
        flash("votre mot de passe a bien été mis a jour et peut etre pseudo.")->success();//
        return redirect('/mon-compte');
    }

    public function supprimercompte(){
        if(auth()->guest()){
            flash("vous devez etre connecté pour voir cette page.")->error();
            return redirect('/connexion');
        }
        Inscriptions::where('pseudo',auth()->user()->pseudo)->delete();
        flash("votre compte a été détruit")->success();
        return redirect('/mon-compte');
    }


    public function profil(){
        $email=(auth()->user()->email);
        $password=(auth()->user()->password);
        $pseudo=auth()->user()->pseudo;
        return view('profil',[
            'email' =>$email,
            'password' =>$password,
            'pseudo' =>$pseudo,
        ]);
    }

    

    

}
