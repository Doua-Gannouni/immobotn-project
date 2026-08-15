<?php

namespace App\Http\Controllers;

use App\Events\NewNotification;
use Illuminate\Http\Request;
use App\Models\Bien;
use App\Models\Image;
use App\Models\User;
use App\Notifications\biennotification;
use App\Notifications\CreateBienNotification;
use File;
use Auth;
use DB;
use Illuminate\Console\Scheduling\Event;
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
        ['titre' => 'required|alpha',
        'prix'=>'required|numeric',
        'surface'=>'required|numeric',
        'largeur'=>'required|numeric',
        'longueur'=>'required|numeric',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        

        ]
       );

       $infos=$request->except('image');

       $img=$request->image;
       if($img)
       {
        $img_nom=uniqid().'.'.File::extension($img->getClientOriginalName());
        $img->move('clients/images_biens',$img_nom);
       }

       $bien=New Bien();
       $bien->titre=$request->titre;
       $bien->prix=$request->prix;
       $bien->surface=$request->surface;
       $bien->largeur=$request->largeur;
       $bien->longueur=$request->longueur;
       $bien->image=$img_nom;
       $bien->user_id=Auth::user()->id;
       $bien->save();
    
       $data = [
        'user_id' => Auth::user()->id,
        'bien_id' => $request->titre,
    ];




       if($request->hasFile('images')){
        $files=$request->file('images');
        foreach($files as $file){
            $image_nom=uniqid().'.'.File::extension($file->getClientOriginalName());  /*time().'_'.$file->getClientOriginalName();*/
            $file->move('clients/images_biens',$image_nom);
            $images=new Image();
            $images->image=$image_nom;
            $images->bien_id=$bien->id;
            $images->save();
        }
       }

   
       return redirect()->back(); 
       event(new NewNotification($data));



        /*
       $users = auth()->user()->get();

       $create_bien = auth()->user()->id->get();
       Notification::send($users,new CreateBienNotification($bien->id,$create_bien));
*/
       //$users=DB::table('users')->get();
      // $create_bien=DB::table('users')->where('nom')->get();

       
      
             //Notification::notify(new CreateBienNotification($this->bien));
       
       }
      
       
       
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $biens  = Bien::findOrFail($id);
       //return $biens;
       $getid = DB::table('notifications')->where('data->id',$id)->pluck('id');
      // return $getid;
       DB::table('notifications')->where('id',$getid)->update(['read_at'=>now()]);
       return view('admin.pages.dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bien=Bien::find($id);
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
            ['titre' => 'required|alpha',
            'prix'=>'required|numeric',
            'surface'=>'required|numeric',
            'largeur'=>'required|numeric',
            'longueur'=>'required|numeric',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
            ]
           );

        $bien=Bien::find($id);

        $bien->titre=$request->titre;
       $bien->prix=$request->prix;
       $bien->surface=$request->surface;
       $bien->largeur=$request->largeur;
       $bien->longueur=$request->longueur;
        

       /*$file_path = public_path().'/clients/images_biens/'.$bien->image;
        unlink($file_path);*/
       
        //$infos=$request->except('image');

       $img=$request->image;
       if($img)
       {
        $file_path = public_path().'/clients/images_biens/'.$bien->image;
        unlink($file_path);
        $image = $request->file('image');
        $newname = uniqid().'.'.File::extension($img->getClientOriginalName());
        $image->move('clients/images_biens',$newname);
        $bien->image = $newname;
       }
  
       
      /* if($request->hasFile('image')){
        $image = $request->file('image');
        $newname = uniqid().'.'.File::extension($img->getClientOriginalName());
        $image->move('clients/images_biens',$newname);
        $bien->image = $newname;
       }*/
       $bien->user_id=Auth::user()->id;

       if($bien->update())
       {
        return redirect()->route('bien.index')->with('msg','Votre bien est modifié avec succées');
       }
       else{
        return 'erreur';
       }


       /*
       $bien->update();
       
        return redirect()->back();*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $bien = Bien::find($id);
        $file_path = public_path().'/clients/images_biens/'.$bien->image;
        unlink($file_path);
       

        $bien->delete();

            return redirect()->back()->with('msg','Votre bien est supprimé avec succées');
        
        


        /*$bien->user_id=Auth::user()->id;
        $bien->delete();
        return redirect()->back();*/
    }

        public function deleteimages($id){
            $images=Image::find($id);
            
        

        return back();
        }

        
    }

