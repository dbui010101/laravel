<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    $class= new App\Http\Controllers\IndexController();
    $class->showIndex();
});

Route::get('/inscription', 'App\Http\Controllers\InscriptionsController@formulaire');
Route::post('/inscription', 'App\Http\Controllers\InscriptionsController@traitement');


Route::get('/connexion','App\Http\Controllers\ConnexionController@formulaire');
Route::post('/connexion','App\Http\Controllers\ConnexionController@traitement');

Route::get('/mon-compte', 'App\Http\Controllers\CompteController@accueil');
Route::get('/deconnexion', 'App\Http\Controllers\CompteController@deconnexion');


Route::get('/profil', 'App\Http\Controllers\CompteController@profil');




Route::post('/modification-mot-de-passe', 'App\Http\Controllers\CompteController@modificationMotDePasse');
Route::get('/supprimercompte', 'App\Http\Controllers\CompteController@supprimercompte');

Route::get('/createannonce', 'App\Http\Controllers\createannonceController@formulaire');
Route::post('/createannonce', 'App\Http\Controllers\createannonceController@traitement');

Route::get('/listeannonce', 'App\Http\Controllers\listeannonceController@liste');
Route::get('/listeannonceinverse', 'App\Http\Controllers\listeannonceController@listeinverse');
Route::post('/mesannonces', 'App\Http\Controllers\listeannonceController@voir');
Route::get('/mesannonces', 'App\Http\Controllers\listeannonceController@voir');


Route::post('/recherche', 'App\Http\Controllers\RechercheController@lancer');
Route::get('/recherche', 'App\Http\Controllers\RechercheController@recherche');

Route::post('/message', 'App\Http\Controllers\messageController@traitement');
Route::get('/message', 'App\Http\Controllers\messageController@formulaire');

Route::post('/box', 'App\Http\Controllers\boxController@traitement');
Route::get('/box', 'App\Http\Controllers\boxController@formulaire');

//Route::get('/{email}', 'App\Http\Controllers\UtilisateursController@voir');
