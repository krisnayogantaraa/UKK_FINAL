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
            'name' => 'Rini Handayani(user)',
            'email' => 'user@gmail.com',
            'nip' => '196510070832001',
            'type' => 0,
            'password' => bcrypt('12345678'),
         ],
         [
            'name' => 'Ahmad Fadli (Admin)',
            'email' => 'admin@gmail.com',
            'nip' => '197203120219004',
            'type' => 1,
            'password' => bcrypt('12345678'),
         ],
         [
            'name' => 'Dewi Sartika (super)',
            'email' => 'super@gmail.com',
            'nip' => '198904040526003',
            'type' => 2,
            'password' => bcrypt('12345678'),
         ],
      ];

      // Memasukkan data ke dalam tabel 'users'
      DB::table('users')->insert($users);
   }
}
