<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class majors extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $majors = [
            [
                'kd_jurusan' => 'RPL',
                'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                'link_group' => 'http://RPL.com',
                'visi' => 'Visi RPL',
                'misi' => 'Misi RPL',
                'total_biaya' => '5.000.000',
            ],
            [
                'kd_jurusan' => 'TKJ',
                'nama_jurusan' => 'Teknik Komputer Jaringan',
                'link_group' => 'http://TKJ.com',
                'visi' => 'Visi TKJ',
                'misi' => 'Misi TKJ',
                'total_biaya' => '5.000.000',
            ],
            [
                'kd_jurusan' => 'TP',
                'nama_jurusan' => 'Teknik Permesinan',
                'link_group' => 'http://TP.com',
                'visi' => 'Visi TP',
                'misi' => 'Misi TP',
                'total_biaya' => '5.000.000',
            ],
            [
                'kd_jurusan' => 'TKR',
                'nama_jurusan' => 'Teknik Kendaraan Ringan',
                'link_group' => 'http://TKRO.com',
                'visi' => 'Visi TKRO',
                'misi' => 'Misi TKRO',
                'total_biaya' => '5.000.000',

            ],
            [
                'kd_jurusan' => 'TSM',
                'nama_jurusan' => 'Teknik Sepeda Motor',
                'link_group' => 'http://TSM.com',
                'visi' => 'Visi TSM',
                'misi' => 'Misi TSM',
                'total_biaya' => '5.000.000',
            ],
        ];
        // Memasukkan data ke dalam tabel 'users'
        DB::table('majors')->insert($majors);
    }
}
