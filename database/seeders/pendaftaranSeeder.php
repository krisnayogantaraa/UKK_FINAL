<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $calon_siswa = [
            [
                'nisn' => '0051266258',
                'nama_lengkap' => 'Krisna Yogantara',
                'nama_panggilan' => 'Krisna',
                'alamat' => 'Bandung, ujung berung',
                'agama' => 'Islam',
                'asal_smp' => 'SMP Baiturahman',
                'tempat' => 'Bandung',
                'tanggal_lahir' => '2005-12-25',
                'no_telp' => '089512345678',
            ],
            [
                'nisn' => '0051266259',
                'nama_lengkap' => 'Jajang Nurjaman',
                'nama_panggilan' => 'Jeje',
                'alamat' => 'Cimahi, cihanjuang',
                'agama' => 'Kristen',
                'asal_smp' => 'SMP 08 Bandung',
                'tempat' => 'Cimahi',
                'tanggal_lahir' => '2005-05-17',
                'no_telp' => '089587654321',
            ],
        ];
        // Memasukkan data ke dalam tabel 'users'
        DB::table('potential_students')->insert($calon_siswa);
    }
}
