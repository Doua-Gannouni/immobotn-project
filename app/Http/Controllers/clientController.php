<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Bien;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Image;
class clientController extends Controller
{
    public function client() {
        return view ('client') ;
    }



//Voir details produit

public function detailsbien($id)
{
    $bien = Bien::find($id);
    $images = Image::with('biens')->where('bien_id',$id)->get();
    return view('client.pages.detailsbien',compact('bien','images'));

}

public function demande()
{
     $demande = Contact::with('clients')->where('client_id',Auth::user()->id)->get();
     return view('client.pages.demandes',compact('demande'));
}


public function demandes_prof()
{
    $demande = Contact::with('profs')->where('prof_id',Auth::user()->id)->get();
    return view('client.pages.demandes_prof',compact('demande'));
}




}