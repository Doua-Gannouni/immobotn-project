<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Bien;
use App\Models\User;
use App\Mail\AdminMail;
use App\Models\contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{

    /* Mail professionnel */

        //Function return page contact professionnel
            public function contact($id)
            {
                $bien=Bien::find($id);
                $email=User::find($bien->user_id)->email;

                return view('client.pages.contact',compact('email','bien'));
                
                
            }

        //Function :  send mail to professionnel
            public function postmail(Request $request , $id )
            {
                
                $bien=Bien::find($id);
                $email=User::find($bien->user_id)->email;
                $prof=User::find($bien->user_id)->id;
                $bien_id=Bien::find($id)->id;
                

                $contact = new contact();
                $contact->client_id=Auth::user()->id;
                $contact->prof_id=$prof;
                $contact->bien_id=$bien_id;
                $contact->save();
                
                Mail::to($email)->send(new ContactMail($request));
                
                return redirect()->back()->with(['success' => 'Votre email est envoyé avec succées.']); 
            }


            
    /* Mail Administrateur */

       
        //Function return page contact Admin
        public function contact_admin()
        {
            return view('client.pages.contact_admin');
        }

          //Function :  send mail to professionnel
          public function send_mail_admin(Request $request)
          {

            /*$data = [
                'email' =>$request->email,
                'titre' =>$request->titre,
            ];*/
              
              Mail::to("gannounidoua09@gmail.com")->send(new AdminMail($request));
              
              return redirect()->back()->with(['success' => 'Votre email est envoyé avec succées.']); 
          }

   }

