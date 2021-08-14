<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Photographies;
class listeannonceController extends Controller
{
    public function liste(){
        $allannonce=Annonce::all();
        $photographies=Photographies::all();
        return view('listeannonce',[
            'allannonce' =>$allannonce,
            'photographies' =>$photographies,
        ]);
    }
    public function listeinverse(){
        $allannonce=Annonce::orderBy('id_annonce', 'DESC')->get();
        $photographies=Photographies::all();
        return view('listeannonce',[
            'allannonce' =>$allannonce,
            'photographies' =>$photographies,
        ]);
    }
    public function voir(){
        if(auth()->guest()){
            flash("vous devez etre connecté pour voir cette page.")->error();
            return redirect('/connexion');
        }
        

        if(request('id')==true){ 
            request()->validate([
            'id' =>['required'],
            'nom' =>['required'],
            'type_de_produit' =>['required'],
            'titre' =>['required'],
            'description' =>['required'],
            'prix' =>['required'],
            'from' =>[],
            ]);
            
            $qui=auth()->user()->pseudo;
            
            $utilisateur =Annonce::where('id_annonce',request('id'))->update([
            'nom' =>request('nom'),
            'type_de_produit' =>request('type_de_produit'),
            'titre' =>request('titre'),
            'description' =>(request('description')),
            'prix' =>request('prix'),
            'from' =>$qui,
            ]);
            for($i=0;$i<3;$i++){
                if(request('supp'.$i)!=NULL){
                    $photo = Photographies::where([['id_annonce',request('id')],['position',$i]])->delete();
                }
            }
                
            request()->validate([
                'photographie0' => ['','image'], 
                'photographie1' => ['','image'], 
                'photographie2' => ['','image'], 
            ]);
            for($i=0;$i<3;$i++){
                if(request('photographie'.$i)!=NULL){
                    $path=request('photographie'.$i)->store('photo');
                    $image = base64_encode(file_get_contents(request('photographie'.$i)));
                    $a=Photographies::where([['id_annonce',request('id')],['position',$i]])->get();
                    $b=$a->count();
                    
                    if($b!=0){
                        $photo = Photographies::where([['id_annonce',request('id')],['position',$i]])->update([
                            "photographies" => $image,
                            'id_annonce' => request('id'),
                            'position' => $i,
                        ]);
                    }else{
                        $photo = Photographies::create([
                            "photographies" => $image,
                            'id_annonce' => request('id'),
                            'position' => $i,
                        ]);
                    }
                }
            }
            //return 'modification fait';
        };

        if(request('supprimer')==true){ 
            request()->validate([
                'supprimer' =>['required'],
            ]);
            $utilisateur =Annonce::where('id_annonce',request('supprimer'))->delete();
            $utilisateur =Photographies::where('id_annonce',request('supprimer'))->delete();
            return 'supprimer fait';
        };
        $allannonce=Annonce::where('from',auth()->user()->pseudo)->get();
        $photographies=Photographies::all();
        return view('mesannonces',[
            'allannonce' =>$allannonce,
            'photographies' =>$photographies,
        ]);
    }
}