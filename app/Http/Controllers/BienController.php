<?php

namespace App\Http\Controllers;

use App\Events\NewNotification;
use Illuminate\Http\Request;
use App\Models\Bien;
use App\Models\Image;
use App\Models\User;
use App\Notifications\CreateBienNotification;
use File;
use Auth;
use DB;
use Notification;


class BienController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biens=DB::table('biens')->where('user_id',Auth::user()->id)->get();
        return view('client.pages.listebiens',compact('biens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('client.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate(
        ['titre' => 'required|string|max:255',
        'prix'=>'required|numeric',
        'surface'=>'required|numeric',
        'largeur'=>'required|numeric',
        'longueur'=>'required|numeric',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        'images.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',

        ]
       );

       $img=$request->image;
       $img_nom=uniqid().'.'.$img->extension();
       $img->move(public_path('clients/images_biens'),$img_nom);

       $bien=New Bien();
       $bien->titre=$request->titre;
       $bien->prix=$request->prix;
       $bien->surface=$request->surface;
       $bien->largeur=$request->largeur;
       $bien->longueur=$request->longueur;
       $bien->image=$img_nom;
       $bien->user_id=Auth::user()->id;
       $bien->save();


       if($request->hasFile('images')){
        $files=$request->file('images');
        foreach($files as $file){
            $image_nom=uniqid().'.'.$file->extension();
            $file->move(public_path('clients/images_biens'),$image_nom);
            $images=new Image();
            $images->image=$image_nom;
            $images->bien_id=$bien->id;
            $images->save();
        }
       }


       //Notifier l'admin : notification en base + temps réel (Pusher)
       $prof = Auth::user()->prenom.' '.Auth::user()->nom;

       $admins = User::where('role','admin')->get();
       Notification::send($admins, new CreateBienNotification($bien->id, $bien->titre, $prof));

       $data = [
        'bien_id' => $bien->id,
        'titre' => $bien->titre,
        'prof' => $prof,
       ];

       event(new NewNotification($data));

       return redirect()->route('bien.index')->with('msg','Votre bien est ajouté avec succès, il sera visible après validation par l\'administrateur');
       }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //le professionnel ne peut modifier que ses propres biens
        $bien=Bien::where('user_id',Auth::user()->id)->findOrFail($id);
        return view("client.pages.edit", compact("bien"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            ['titre' => 'required|string|max:255',
            'prix'=>'required|numeric',
            'surface'=>'required|numeric',
            'largeur'=>'required|numeric',
            'longueur'=>'required|numeric',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
            ]
           );

        //le professionnel ne peut modifier que ses propres biens
        $bien=Bien::where('user_id',Auth::user()->id)->findOrFail($id);

        $bien->titre=$request->titre;
       $bien->prix=$request->prix;
       $bien->surface=$request->surface;
       $bien->largeur=$request->largeur;
       $bien->longueur=$request->longueur;

       $img=$request->image;
       if($img)
       {
        //supprimer l'ancienne image
        File::delete(public_path('clients/images_biens/'.$bien->image));

        $newname = uniqid().'.'.$img->extension();
        $img->move(public_path('clients/images_biens'),$newname);
        $bien->image = $newname;
       }

       $bien->update();

       return redirect()->route('bien.index')->with('msg','Votre bien est modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //le professionnel ne peut supprimer que ses propres biens
        $bien = Bien::where('user_id',Auth::user()->id)->findOrFail($id);

        $bien->supprimer_images();
        $bien->delete();

        return redirect()->back()->with('msg','Votre bien est supprimé avec succès');
    }

}
