<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pendaftaran = [
            [
                'tgl_pendaftaran' => '2024-04-12',
                'kd_jurusan' => 'RPL',
                'nisn' => '0051266258',
                'jumlah_pembiayaan' => '2.150.000',
                'keterangan' => 'Jalur Nilai Raport',
                'nama_petugas' => 'user',
            ],
            [
                'tgl_pendaftaran' => '2024-04-16',
                'kd_jurusan' => 'TKJ',
                'nisn' => '0051266259',
                'jumlah_pembiayaan' => '3.000.000',
                'keterangan' => 'Jalur Prestasi',
                'nama_petugas' => 'user',
            ],
        ];
        // Memasukkan data ke dalam tabel 'users'
        DB::table('registers')->insert($pendaftaran);
    }
}
