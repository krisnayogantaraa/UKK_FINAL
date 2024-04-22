<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class potential_students extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'nama_panggilan',
        'alamat',
        'agama',
        'asal_smp',
        'tempat',
        'tanggal_lahir',
        'no_telp',
    ];
}
