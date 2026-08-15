<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Bien extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'titre',
        'prix',
        'surface',
        'largeur',
        'longueur',
        'active',
        

    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }
}
