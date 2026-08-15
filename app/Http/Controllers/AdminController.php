<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Bien;
use Auth;
use App\Models\contact;
use App\Models\Image;
use App\Models\User;
use File;
class AdminController extends Controller
{
    
    public function __construct()
    
    {
      
    }

   public function login(){
        return view  ('admin.pages.login');

   }
    
     
    public function postlogin(Request $request){

        
        if(Auth::attempt(['email' => $request->email , 'password' => $request->password, 'role' =>'admin']))
        {
            return redirect()->route('dashboard');
        }


        return redirect()->back();
       
    }

     //fonction perrmet d'afficher dashboard Admin
     public function dashboard() {
        return view ('admin.pages.dashboard') ;
    }



    //fonction retourne liste biens
   public function listebiens()
   {
        $biens=DB::table('biens')->get();
        return view('admin.pages.listebiens',compact('biens'));
   }

   public function active_bien($id){
    $bien=Bien::find($id);
    $bien->active=1;
    $bien->save();

    return redirect()->back();

   }

   public function desactive_bien($id){
    $bien=Bien::find($id);
    $bien->active=0;
    $bien->save();

    return redirect()->back();

   }

   public function supprimer_bien($id)
   {
       $bien = Bien::find($id);
       $bien->delete();
       return redirect()->back();
   }


   public function deconnecter_admin(){
    Auth::logout();

    return redirect()->route('login');
}


public function demandes()
   {
    $demande=DB::table('contacts')->get();
    $demande_client = Contact::with('clients')->get();
    $demande_prof = contact::with('Profs')->get();
    //$demandes=DB::table('contacts')->get();
    //return view('admin.pages.demandes',compact('demandes'));
    return view('admin.pages.demandes',compact('demande','demande_client','demande_prof'));
   }

   public function professionnels()
   {
    $professionnels=DB::table('users')->where('role','Professionnel')->get();
    return view('admin.pages.professionnels',compact('professionnels'));
   }



   public function clients()
   {
    $clients=DB::table('users')->where('role','Client')->get();
    return view('admin.pages.clients',compact('clients'));
   }




   public function Archiver_user($id){
    $user=User::find($id);
    $user->archive=0;
    $user->save();

    return redirect()->back();

   }

   
   public function Artiver_user($id){
    $user=User::find($id);
    $user->archive=1;
    $user->save();

    return redirect()->back();

   }


   public function edit_profil()
   {
    $infos=DB::table('users')->where('role','Admin')->get();
   return view('admin.pages.edit_profil',compact('infos'));
   }
/*
   public function infos_admin()
   {
   $infos=DB::table('users')->where('role','Admin')->get();
   return view('admin.pages.edit_profil',compact('infos'));
 
}*/


public function postinfos(Request $request)
{
    $request->validate(
        ['nom' => 'required|alpha',
        'prenom'=>'required|alpha',
        'email'=>'required|email',
        'adresse'=>'required|alpha',
        'tel'=>'required|numeric',
        'password' => 'required',
        'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',

        ]
       );

     
        $infos=$request->except('image');

       $img=$request->image;
       if($img)
       {
        $img_nom=uniqid().'.'.File::extension($img->getClientOriginalName());
        $img->move('admin/images_admin',$img_nom);
       }
    

    $u= Auth::user();
    $u->nom=$request->nom;
    $u->prenom=$request->prenom;
    $u->email=$request->email;
    $u->adresse=$request->adresse;
    $u->tel=$request->tel;
    $u->password=bcrypt($request->password);

    if($request->hasFile('image')){
        $u->image=$img_nom;
    }
    $u->update();

    return redirect()->back();

}


public function details_bien($id)
{
    $bien = Bien::find($id);
    $images = Image::with('biens')->where('bien_id',$id)->get();
    // return view('client.pages.demandes',compact('demande'));
    return view('admin.pages.details_bien' , compact('bien','images'));

}

public function details($id)
{
    $demande = contact::find($id);
    //$images = Image::with('biens')->where('bien_id',$id)->get();
    // return view('client.pages.demandes',compact('demande'));
    //return view('admin.pages.details_demande', compact('demande'));

    return view('admin.pages.details_demande',compact('demande'));

}
}
