<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Monev extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'attachment', 'content'];

    public static function boot()
    {
        parent::boot();

        // Generate slug saat membuat atau memperbarui data
        static::creating(function ($monev) {
            $monev->slug = Str::slug($monev->title);
        });

        static::updating(function ($monev) {
            $monev->slug = Str::slug($monev->title);
        });
    }
}
