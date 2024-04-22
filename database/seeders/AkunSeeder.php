<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run()
   {
      $users = [
         [
            'name' => 'user',
            'email' => 'user@gmail.com',
            'nip' => 'user NIP',
            'type' => 0,
            'password' => bcrypt('12345678'),
         ],
         [
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'nip' => 'admin NIP',
            'type' => 1,
            'password' => bcrypt('12345678'),
         ],
         [
            'name' => 'Superroot User',
            'email' => 'superroot@gmail.com',
            'nip' => 'superroot NIP',
            'type' => 2,
            'password' => bcrypt('12345678'),
         ],
      ];

      // Memasukkan data ke dalam tabel 'users'
      DB::table('users')->insert($users);
   }
}
