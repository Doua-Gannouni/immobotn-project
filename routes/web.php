<?php

use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\BienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;

//Page index
Route::get('/' , [IndexController::class, 'index'])->name('index') ;

Route::get('/administrateur' , [AdminController::class, 'login'])->name('login');

Route::post('postlogin' , [AdminController::class, 'postlogin'])->name('postlogin')->middleware('throttle:5,1') ;

Route::group( [ 'prefix' => 'admin','middleware'=>'admin'], function()

        {
                //Retourne dashboard Admin
                Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

                //Liste biens dans l'interace admin
                Route::get('/listebiens',[AdminController::class , 'listebiens'])->name('listebiens');

                // Activer bien : admin
                Route::post('active_bien/{id}',[AdminController::class , 'active_bien'])->name('activer_bien');

                // Désactiver bien : admin
                Route::post('desactive_bien/{id}',[AdminController::class , 'desactive_bien'])->name('desactiver_bien');

                //supprimer bien : admin
                Route::delete('supprimer/{id}',[AdminController::class , 'supprimer_bien'])->name('supprimer_bien');

                //Deconnecter admin
                Route::post('/deconnecter_admin' , [AdminController::class, 'deconnecter_admin'])->name('deconnecter_admin') ;

                //Liste demandes dans l'interace admin
                Route::get('/demandes',[AdminController::class , 'demandes'])->name('demandes');

                Route::get('/professionnels',[AdminController::class,'professionnels'])->name('professionnels');

                Route::get('/clients',[AdminController::class,'clients'])->name('clients');

                 // Archiver user
                 Route::post('archiver_user/{id}',[AdminController::class , 'archiver_user'])->name('archiver_user');

                  // Activer user
                  Route::post('activer_user/{id}',[AdminController::class , 'activer_user'])->name('activer_user');

                 Route::get('/edit_profil',[AdminController::class,'edit_profil'])->name('edit_profil');

                 Route::post('/post_infos',[AdminController::class,'postinfos'])->name('edit');

                 //voir details Bien
                  Route::get('bien/details/{id}',[AdminController::class,'details_bien'])->name('details_bien');

                  //voir details Demande
                  Route::get('/demande/details/{id}',[AdminController::class,'details'])->name('details_demande');

        });



//page inscription : Professionnel or Client
Route::get('/inscription' , [AuthentificationController::class, 'inscription'])->name('inscription') ;

//execution de  l'inscription
Route::post('postinscription' , [AuthentificationController::class, 'postinscription'])->name('postinscription') ;

//Retourne page Connexion
Route::get('/connexion' , [ProfilController::class, 'connexion'])->name('connexion') ;

//execution de  Connexion
Route::post('postconnexion' , [AuthentificationController::class, 'postconnexion'])->name('postconnexion')->middleware('throttle:5,1') ;

//voir details produit : interface client
Route::get('bien/details/{id}',[ClientController::class,'detailsbien'])->name('detailsbien');

//rechercher
Route::post('/rechercher', [IndexController::class, 'rechercher'])->name('rechercher');

Route::get('/service',[IndexController::class,'service'])->name('service');



// Pages accessibles par un client ou un professionnel connecté
Route::group( [ 'middleware' => 'auth' ], function()

        {
                //retourne page de profil
                Route::get('/profil' , [ProfilController::class, 'profil'])->name('profil') ;

                //Déconnexion client
                Route::post('/deconnecter_client' , [ProfilController::class, 'deconnecter_client'])->name('deconnecter_client') ;

                Route::get('/monprofil',[ProfilController::class,'monprofil'])->name('monprofil');

                Route::get('/modifier_infos',[ProfilController::class,'modif_infos'])->name('modif_infos');

                Route::post('/post_infos',[ProfilController::class,'postinfos'])->name('postinfos');

                // Contacter Admin
                Route::get('/contact',[ContactController::class,'contact_admin'])->name('contact_admin');
                Route::post('sendmail',[ContactController::class, 'send_mail_admin'])->name('send_mail_admin');
        });



// Pages du professionnel
Route::group( [ 'middleware' => ['auth','professionnel'] ], function()

        {
                //CRUD bien
                Route::resource('bien',BienController::class)->except(['show']);

                Route::get('/demandes_prof',[ClientController::class,'demandes_prof'])->name('demandes_prof');
        });



// Pages du client
Route::group( [ 'middleware' => ['auth','client'] ], function()

        {
                // Contacter : client->professionnel
                Route::get('/contact/{id}' , [ContactController::class, 'contact'])->name('contact');

                Route::post('postmail/{id}',[ContactController::class, 'postmail'])->name('postmail');

                Route::get('/mesdemandes',[ClientController::class,'demande'])->name('demande');
        });
