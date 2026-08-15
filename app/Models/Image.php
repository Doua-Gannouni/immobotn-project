<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bien;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Image extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable=[
        'image',
        'bien_id',
    ];

    public function biens(){
        return $this->belongsTo(Bien::class , 'bien_id' , 'id');
    }
}
