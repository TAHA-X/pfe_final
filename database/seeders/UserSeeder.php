<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = new User();
         $user->id = 1;
         $user->prenom = "taha";
         $user->nom = "echch";
         $user->email = "admin@gmail.com";
         $user->password = Hash::make("12345678");
         $user->status = "directeur";
         $user->phone = "0658843130";
         $user->save();

    }
}
