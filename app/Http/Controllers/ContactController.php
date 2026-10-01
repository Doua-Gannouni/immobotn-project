<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Bien;
use App\Mail\AdminMail;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{

    /* Mail professionnel */

        //Function return page contact professionnel
            public function contact($id)
            {
                $bien=Bien::where('active',1)->findOrFail($id);
                $email=$bien->users->email;

                return view('client.pages.contact',compact('email','bien'));


            }

        //Function :  send mail to professionnel
            public function postmail(Request $request , $id )
            {
                $request->validate(
                    ['titre' => 'required|string|max:255',
                    'sujet'=>'required|string|max:255',
                    'description'=>'required|string|max:5000',
                    ]
                   );

                $bien=Bien::where('active',1)->findOrFail($id);
                $email=$bien->users->email;

                $contact = new Contact();
                $contact->client_id=Auth::user()->id;
                $contact->prof_id=$bien->user_id;
                $contact->bien_id=$bien->id;
                $contact->save();

                Mail::to($email)->send(new ContactMail($request));

                return redirect()->back()->with(['success' => 'Votre email est envoyé avec succès.']);
            }



    /* Mail Administrateur */


        //Function return page contact Admin
        public function contact_admin()
        {
            return view('client.pages.contact_admin');
        }

          //Function :  send mail to administrateur
          public function send_mail_admin(Request $request)
          {
              $request->validate(
                  ['titre' => 'required|string|max:255',
                  'sujet'=>'required|string|max:255',
                  'description'=>'required|string|max:5000',
                  ]
                 );

              Mail::to("gannounidoua09@gmail.com")->send(new AdminMail($request));

              return redirect()->back()->with(['success' => 'Votre email est envoyé avec succès.']);
          }

   }
