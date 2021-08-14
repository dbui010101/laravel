<?php

namespace App\Http\Controllers;



class IndexController 
{
    public function showIndex(){
        
        
        $f=(implode(DIRECTORY_SEPARATOR, [ '','home','epitech','delivery','W-PHP-502-NCY-2-1-FreeAds-david.bui','freeads','resources', 'views', 'index.blade']) . '.php');
        if(file_exists($f)) {
            include($f);
        }
    }
}