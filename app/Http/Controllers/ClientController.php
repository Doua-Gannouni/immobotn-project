<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Bien;
use App\Models\Contact;
use App\Models\Image;

class ClientController extends Controller
{

//Voir details produit

public function detailsbien($id)
{
    $bien = Bien::findOrFail($id);

    //un bien non validé par l'admin n'est visible que par son propriétaire
    if($bien->active != 1 && (Auth::guest() || Auth::user()->id != $bien->user_id))
    {
        abort(404);
    }

    $images = Image::where('bien_id',$id)->get();
    return view('client.pages.detailsbien',compact('bien','images'));

}

public function demande()
{
     $demande = Contact::with('biens','profs')->where('client_id',Auth::user()->id)->get();
     return view('client.pages.demandes',compact('demande'));
}


public function demandes_prof()
{
    $demande = Contact::with('biens','clients')->where('prof_id',Auth::user()->id)->get();
    return view('client.pages.demandes_prof',compact('demande'));
}

}
