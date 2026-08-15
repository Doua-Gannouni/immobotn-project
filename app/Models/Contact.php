<?php

namespace App\Models;

use App\Mail\ContactMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mail;

class contact extends Model
{
    use HasFactory;

    public function profs(){
        return $this->belongsTo(User::class, 'prof_id' , 'id' );
    }

    public function clients(){
        return $this->belongsTo(User::class, 'client_id' , 'id' );
    }

    public function biens(){
        return $this->belongsTo(Bien::class, 'bien_id' , 'id' );
    }

}
