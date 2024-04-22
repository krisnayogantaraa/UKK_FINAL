<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registers extends Model
{
    use HasFactory;
        /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'tgl_pendaftaran',
        'kd_jurusan',
        'nisn',
        'jumlah_pembiayaan',
        'keterangan',
        'nama_petugas',
    ];
}
