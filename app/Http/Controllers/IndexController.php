<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Bien;
use Illuminate\Http\Request;



class IndexController extends Controller
{
    //function return page d'index
    public function index() {
        $biens=DB::table('biens')->where('active',1)->orderBy('created_at' , 'desc')->get();
        return view ('client.pages.index',compact('biens')) ;
    }

    //function recherche
    public function rechercher(Request $request)
    {
        $Biens=DB::table('biens')->where('active',1)->where('titre' , $request->cherche)->orWhere('prix',$request->cherche)->orWhere('surface',$request->cherche)->get();
        
        return view('client.pages.index')->with('biens' , $Biens);  
    
    }

    //function return page service
    public function service(Request $request)
    {
        return view('client.pages.service');
    }

   
}