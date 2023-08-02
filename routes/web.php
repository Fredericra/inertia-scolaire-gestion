<?php

use App\Http\Controllers\My;
use App\Http\Controllers\Registre;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group([
    'middleware'=>"invite"
],function(){
    Route::get('/', function () {
        return inertia('Home');
    })->name("home");
    Route::get("etudiant",[My::class,"etudiant"])->name("etude");
    Route::get("inscrire",[My::class,"inscrire"])->name("inscrire");
    Route::post("inscrire",[My::class,"store_inscrire"])->name("store.inscrire");
    Route::get("connexion",[My::class,"connexion"])->name("connexion");
    Route::get("admin",[My::class,"admin"])->name("admin");
    Route::get("about",[My::class,"about"])->name("about");
    Route::get("etudiant/{email} ",[My::class,"etude"])->name("persone");
    Route::post("connexion",[My::class,"store_connexion"])->name('store.connexion');

});

Route::group(["middleware"=>"admin"],function(){
    Route::get("compte",[My::class,"compte"])->name("compte");
    Route::get("etudiant/{email} ",[My::class,"etude"])->name("persone");
    Route::get("deconnexion/{id}",[My::class,"sortie"])->name("sortie");
    Route::get("post",[My::class,"post"])->name("post");
    Route::post("post",[My::class,"sotre_poste"])->name("store.post");
    Route::get("notif",[My::class,"notif"])->name("notif");
    Route::post("notif",[My::class,"suivre"])->name("suivre");
    Route::get("paging/{id}",[My::class,"pager"])->name("efface");
    Route::get("page",[My::class,"page"])->name("page");
    Route::get("page/{name}",[My::class,"mypage"])->name("mypage");
    Route::post("page",[My::class,"pages"])->name("pages");
    Route::post("abonne",[MY::class,"abonne"])->name("abonne");
    Route::post("creation",[My::class,"creation"])->name("pagepub");
    Route::post("efface",[My::class,"efface"])->name("supprime");
    Route::post('annuler',[My::class,"annuler"])->name("annuler");
    Route::get("tous",[My::class,"tous"])->name("tous");
    Route::post("commente",[My::class,"commente"])->name("commente");
    Route::post("delete",[My::class,"delete"])->name("delete");

});


