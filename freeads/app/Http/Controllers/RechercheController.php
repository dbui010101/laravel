<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Photographies;
class RechercheController extends Controller
{
    public function recherche(){
        
        return view('recherche');
    }
    public function lancer(){
        $photographies=Photographies::all();
        request()->validate([
            'nom' =>[],
            'type_de_produit' =>[],
            'titre' =>[],
            'description' =>[],
            'prix' =>[],
            'from' =>[],
        ]);
        $colonne=['nom','type_de_produit','titre','description','prix','from'];
        foreach($colonne as $key){
            if(!empty(request($key))){
                if(request('recent')){
                    $allannonce =Annonce::where($key,request($key))->orderBy('id_annonce','DESC')->get();
                }else{
                    $allannonce =Annonce::where($key,request($key))->get();
                }
            //$b=Annonce::select('*')->where($key,request($key))->get();
            //$b=Annonce::where($key,request($key))->pluck('id_annonce');
            return view('resultat',[
                'allannonce' =>$allannonce,
                'photographies' =>$photographies,
            ]);
            }
        }
        

    }
    
}