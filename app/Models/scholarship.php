<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scholarship extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'attachment', 'content'];

    // Generate slug from title automatically
    public static function boot()
    {
        parent::boot();
        static::creating(function ($scholarship) {
            $scholarship->slug = Str::slug($scholarship->title);
        });

        static::updating(function ($scholarship) {
            $scholarship->slug = Str::slug($scholarship->title);
        });
    }
}
