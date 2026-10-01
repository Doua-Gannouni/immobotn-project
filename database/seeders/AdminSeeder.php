<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * email et mot de passe de l'admin : ADMIN_EMAIL et ADMIN_PASSWORD dans le .env
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        ['nom' => 'admin',
         'prenom' => 'admin',
         'email' =>  env('ADMIN_EMAIL', 'admin@gmail.com'),
         'role'=>'admin',
         'adresse' =>'Moknine',
         'tel' => '55555555' ,
         'password' => Hash::make(env('ADMIN_PASSWORD', 'admin')),
         'image'=> 'admin.png' ,
         'created_at' => now(),
         'updated_at' => now(),
        ]
        );
    }
}
