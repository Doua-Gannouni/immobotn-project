<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Auth;

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data ;
    public $user ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data=$data;
        $this->user=Auth::user();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //répondre au mail = répondre à l'utilisateur
        return $this->replyTo($this->user->email)->subject('Contact Message')->view('client.pages.emails.ContactAdmin');
    }
}
