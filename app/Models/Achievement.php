<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    protected $fillable =['nim','nama','penyelenggara','tempat','tglMulai','tglAkhir','namaPenghargaan','peringkat','level','file'];
}
