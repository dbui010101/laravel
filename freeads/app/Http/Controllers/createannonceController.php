<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Photographies;
class createannonceController extends Controller
{
    public function formulaire(){
        if(auth()->guest()){
            flash("vous devez etre connecté pour voir cette page.")->error();
            return redirect('/connexion');
        }
        return view('createannonce');
    }
    public function traitement(){
        
        request()->validate([
            'nom' =>['required'],
            'type_de_produit' =>['required'],
            'titre' =>['required'],
            'description' =>['required'],
            'prix' =>['required'],
            'from' =>[''],
            ]);

        $qui=auth()->user()->pseudo;
        
        $utilisateur =Annonce::create([
            'nom' =>request('nom'),
            'type_de_produit' =>request('type_de_produit'),
            'titre' =>request('titre'),
            'description' =>(request('description')),
            'prix' =>request('prix'),
            'from'=>(auth()->user()->pseudo),
        ]);
              
        request()->validate([
            'photographie0' => ['','image'], 
            'photographie1' => ['','image'], 
            'photographie2' => ['','image'], 
        ]);
        $lastannonce=Annonce::all()->last();
        for($i=0;$i<3;$i++){
            if(request('photographie'.$i)!=NULL){
                $path=request('photographie'.$i)->store('photo');
                $image = base64_encode(file_get_contents(request('photographie'.$i)));
                $photo = Photographies::create([
                    "photographies" => $image,
                    'id_annonce' => $lastannonce->id_annonce,
                    'position' => $i,
                ]);
            }
        }
        return 'formulaire annonce recu';
    }
}