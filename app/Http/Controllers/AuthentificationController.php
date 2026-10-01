<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthentificationController extends Controller
{
    //function return page Inscription
    public function inscription() {
        return view ('client.pages.inscription') ;
    }


    //function pour sauvgarder user
    public function postinscription(Request $request) {
        $request->validate(
            ['nom' => 'required|string|max:255',
            'prenom'=>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'adresse'=>'required|string|max:255',
            'tel'=>'required|digits:8',
            'password' => 'required|min:8',
            'role'=>'required|in:Client,Professionnel',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',

            ]
           );

       $img=$request->image;
       $img_nom=uniqid().'.'.$img->extension();
       $img->move(public_path('clients/images_clients'),$img_nom);

        $u=new User();
        $u->nom=$request->nom;
        $u->prenom=$request->prenom;
        $u->email=$request->email;
        $u->adresse=$request->adresse;
        $u->tel=$request->tel;
        $u->password=bcrypt($request->password);
        $u->role=$request->role;
        $u->image=$img_nom;

        $u->save();

        Auth::login($u);
        $request->session()->regenerate();

        return redirect()->route('profil')->with('msg','Votre compte est créé avec succès');
    }

    public function postconnexion(Request $request){

        $request->validate(
            ['email' => 'required|email',
            'password' => 'required',
            'role'=>'required|in:Client,Professionnel',
            ]
           );

        if(Auth::attempt(['email' => $request->email , 'password' => $request->password, 'role' => $request->role ]))
        {
            if(Auth::user()->archive =='1'){
                $request->session()->regenerate();
                return redirect()->route('profil');
            }
            else
            {
                //Compte bloqué : on annule la connexion
                Auth::logout();
                return redirect()->back()->with('message1','Votre Compte est bloqué');
            }
        }


        return back()->withInput($request->only('email','role'))->withErrors(['failed'=>"Email ou mot de passe incorrect"]) ;
    }
}
