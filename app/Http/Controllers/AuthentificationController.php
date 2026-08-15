<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use File;

class AuthentificationController extends Controller
{
    //function return page Inscription
    public function inscription() {
        return view ('client.pages.inscription') ;
    }


    //function pour sauvgarder user
    public function postinscription(Request $request) {
        $request->validate(
            ['nom' => 'required|alpha',
            'prenom'=>'required|alpha',
            'email'=>'required|email|unique:users',
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

        return redirect()->route('profil')->with('msg','Votre bien est crée avec succées');
    }
    
    public function postconnexion(Request $request){

        
        if(Auth::attempt(['email' => $request->email , 'password' => $request->password, 'role' => $request->role ]))
        {
            if(Auth::user()->archive =='1'){
            return redirect()->route('profil');
            }
            else 
            {
                return redirect()->back()->with('message1','Votre Compte est bloqué');
            }
        }
       

        return back()->withErrors(['failed'=>"Invalid Email/password"]) ;
    }
}
