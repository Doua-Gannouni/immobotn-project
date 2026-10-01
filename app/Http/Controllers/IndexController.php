<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;



class IndexController extends Controller
{
    //function return page d'index
    public function index() {
        $biens=DB::table('biens')->where('active',1)->orderBy('created_at' , 'desc')->get();
        return view ('client.pages.index',compact('biens')) ;
    }

    //function recherche : par titre (contient le mot), prix ou surface
    public function rechercher(Request $request)
    {
        $cherche = $request->cherche;

        $Biens=DB::table('biens')->where('active',1)
            ->where(function($query) use ($cherche){
                $query->where('titre' , 'like' , '%'.$cherche.'%')
                      ->orWhere('prix',$cherche)
                      ->orWhere('surface',$cherche);
            })
            ->orderBy('created_at' , 'desc')->get();

        return view('client.pages.index')->with('biens' , $Biens);

    }

    //function return page service
    public function service()
    {
        return view('client.pages.service');
    }


}
