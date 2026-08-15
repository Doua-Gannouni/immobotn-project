<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        ['nom' => 'admin',
         'prenom' => 'admin',
         'email' =>  'admin@gmail.com',
         'role'=>'admin',
         'adresse' =>'Moknine',
         'tel' => '555555' ,
         'password' => Hash::make('admin'),
         'image'=> asset('admin/images_admin/admin.png') ,
        ]
        );
    }
}
