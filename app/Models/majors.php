<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class majors extends Model
{
    use HasFactory;
        /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'kd_jurusan',
        'nama_jurusan',
        'link_group',
        'visi',
        'misi',
        'total_biaya',
    ];
}
