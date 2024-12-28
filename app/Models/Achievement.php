<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achievement extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim',
        'nama',
        'prodi',
        'event',
        'penyelenggara',
        'tempat',
        'tglMulai',
        'tglAkhir',
        'kategoriPenghargaan',
        'peringkat',
        'level',
        'attachment',
    ];
}
