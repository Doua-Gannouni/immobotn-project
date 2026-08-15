<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use DB;
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
    public function deconnecter_client(){
        Auth::logout();

        return redirect()->route('connexion');
    }


    //Voir mon Profil
public function monprofil()
{
    $infos=DB::table('users')->where('id',Auth::user()->id)->get();
        return view('client.pages.monprofil',compact('infos'));
}

public function modif_infos()
{
    return view('client.pages.modif_infos');
}

public function postinfos(Request $request)
{
    $request->validate(
        ['nom' => 'required|alpha',
        'prenom'=>'required|alpha',
        'email'=>'required|email',
        'adresse'=>'required|alpha',
        'tel'=>'required|numeric',
        'password' => 'required',
        'role'=>'required',
        'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',

        ]
       );

     
        $infos=$request->except('image');

       $img=$request->image;
       if($img)
       {
        $img_nom=uniqid().'.'.File::extension($img->getClientOriginalName());
        $img->move('clients/images_clients',$img_nom);
       }
    

    $u= Auth::user();
    $u->nom=$request->nom;
    $u->prenom=$request->prenom;
    $u->email=$request->email;
    $u->adresse=$request->adresse;
    $u->tel=$request->tel;
    $u->password=bcrypt($request->password);
    $u->role=$request->role;
    if($request->hasFile('image')){
        $u->image=$img_nom;
    }
    $u->update();

    return redirect()->route('monprofil');

}



}

