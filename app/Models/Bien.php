<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;

class Bien extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'prix',
        'surface',
        'largeur',
        'longueur',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }

    public function images(){
        return $this->hasMany(Image::class, 'bien_id' , 'id');
    }

    //supprimer les fichiers images du bien (image principale + galerie)
    public function supprimer_images(){
        File::delete(public_path('clients/images_biens/'.$this->image));

        foreach($this->images as $i){
            File::delete(public_path('clients/images_biens/'.$i->image));
        }
    }
}
