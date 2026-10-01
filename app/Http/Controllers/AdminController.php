<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Bien;
use Auth;
use App\Models\Contact;
use App\Models\Image;
use App\Models\User;
use File;
class AdminController extends Controller
{

   public function login(){
        return view  ('admin.pages.login');

   }


    public function postlogin(Request $request){


        if(Auth::attempt(['email' => $request->email , 'password' => $request->password, 'role' =>'admin']))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }


        return redirect()->back()->withInput($request->only('email'))->with('message','Email ou mot de passe incorrect');

    }

     //fonction perrmet d'afficher dashboard Admin
     public function dashboard() {
        $nb_biens = Bien::count();
        $nb_attente = Bien::where('active',0)->count();
        $nb_clients = User::where('role','Client')->count();
        $nb_professionnels = User::where('role','Professionnel')->count();
        $nb_demandes = Contact::count();

        return view ('admin.pages.dashboard',compact('nb_biens','nb_attente','nb_clients','nb_professionnels','nb_demandes')) ;
    }



    //fonction retourne liste biens
   public function listebiens()
   {
        $biens=DB::table('biens')->orderBy('created_at' , 'desc')->get();
        return view('admin.pages.listebiens',compact('biens'));
   }

   public function active_bien($id){
    $bien=Bien::findOrFail($id);
    $bien->active=1;
    $bien->save();

    return redirect()->back();

   }

   public function desactive_bien($id){
    $bien=Bien::findOrFail($id);
    $bien->active=0;
    $bien->save();

    return redirect()->back();

   }

   public function supprimer_bien($id)
   {
       $bien = Bien::findOrFail($id);
       $bien->supprimer_images();
       $bien->delete();
       return redirect()->back();
   }


   public function deconnecter_admin(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
}


public function demandes()
   {
    $demandes = Contact::with('clients','profs','biens')->get();
    return view('admin.pages.demandes',compact('demandes'));
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




   public function archiver_user($id){
    $user=User::where('role','!=','admin')->findOrFail($id);
    $user->archive=0;
    $user->save();

    return redirect()->back();

   }


   public function activer_user($id){
    $user=User::where('role','!=','admin')->findOrFail($id);
    $user->archive=1;
    $user->save();

    return redirect()->back();

   }


   public function edit_profil()
   {
    $admin = Auth::user();
   return view('admin.pages.edit_profil',compact('admin'));
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
        'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',

        ]
       );

    $u= Auth::user();

       $img=$request->image;
       if($img)
       {
        //supprimer l'ancienne image
        File::delete(public_path('admin/images_admin/'.$u->image));

        $img_nom=uniqid().'.'.$img->extension();
        $img->move(public_path('admin/images_admin'),$img_nom);
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
    $u->update();

    return redirect()->back();

}


public function details_bien($id)
{
    $bien = Bien::findOrFail($id);
    $images = Image::where('bien_id',$id)->get();

    //marquer comme lues les notifications de ce bien
    foreach(Auth::user()->unreadNotifications as $notification)
    {
        if($notification->data['id'] == $id)
        {
            $notification->markAsRead();
        }
    }

    return view('admin.pages.details_bien' , compact('bien','images'));

}

public function details($id)
{
    $demande = Contact::findOrFail($id);

    return view('admin.pages.details_demande',compact('demande'));

}
}
