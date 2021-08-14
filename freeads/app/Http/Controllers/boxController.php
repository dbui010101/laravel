<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
class boxController extends Controller
{
    public function formulaire(){
        $allmessage=Messages::where(function($q) {
            $q->where('from', auth()->user()->pseudo)
              ->orWhere('a', auth()->user()->pseudo);
        })->orderBy('id','DESC')->get();
        $nouveau=Messages::where('oldmessage','non')->where(function($q) {
            $q->where('from', auth()->user()->pseudo)
              ->orWhere('a', auth()->user()->pseudo);
        })->get();
        $nombre=$nouveau->count();
        return view('box',[
            'allmessage' =>$allmessage,
            'nombre' =>$nombre,
        ]);
    }
    public function traitement(){
        $allmessage=Messages::where(function($q) {
            $q->where('from', auth()->user()->pseudo)
              ->orWhere('a', auth()->user()->pseudo);
        })->orderBy('id','DESC')->get();
        $limite=Messages::select('id')->orderBy('id','DESC')->first()->id;
        for($i=1;$i<=$limite;$i++){
            if(request($i)){
                
                Messages::where('id',$i)->update([
                    'oldmessage' => 'oui',
                ]);
            }
        }
        $nouveau=Messages::where('oldmessage','non')->where(function($q) {
            $q->where('from', auth()->user()->pseudo)
              ->orWhere('a', auth()->user()->pseudo);
        })->get();
        $nombre=$nouveau->count();
        return view('box',[
            'allmessage' =>$allmessage,
            'nombre' =>$nombre,
        ]);
    }
}