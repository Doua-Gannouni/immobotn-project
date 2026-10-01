<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;

class ProfilController extends Controller
{
       //function return page de profil
       public function profil() {
        return view ('client.pages.profil') ;
    }

    public function connexion(){
        return view ('client.pages.connexion');
    }


        //Déconnexion client, professionnel
    public function deconnecter_client(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('connexion');
    }


    //Voir mon Profil
public function monprofil()
{
        return view('client.pages.monprofil');
}

public function modif_infos()
{
    return view('client.pages.modif_infos');
}

public function postinfos(Request $request)
{
    $request->validate(
        ['nom' => 'required|string|max:255',
        'prenom'=>'required|string|max:255',
        'email'=>'required|email|unique:users,email,'.Auth::user()->id,
        'adresse'=>'required|string|max:255',
        'tel'=>'required|digits:8',
        'password' => 'nullable|min:8',
        'role'=>'required|in:Client,Professionnel',
        'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',

        ]
       );

    $u= Auth::user();

       $img=$request->image;
       if($img)
       {
        //supprimer l'ancienne image
        File::delete(public_path('clients/images_clients/'.$u->image));

        $img_nom=uniqid().'.'.$img->extension();
        $img->move(public_path('clients/images_clients'),$img_nom);
        $u->image=$img_nom;
       }

    $u->nom=$request->nom;
    $u->prenom=$request->prenom;
    $u->email=$request->email;
    $u->adresse=$request->adresse;
    $u->tel=$request->tel;

    //mot de passe modifié seulement s'il est rempli
    if($request->password){
        $u->password=bcrypt($request->password);
    }
    $u->role=$request->role;
    $u->update();

    return redirect()->route('monprofil');

}



}
