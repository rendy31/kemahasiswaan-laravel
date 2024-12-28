<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Download extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description', 'attachment'];

    // Generate slug from title automatically
    public static function boot()
    {
        parent::boot();
        static::creating(function ($download) {
            $download->slug = Str::slug($download->title);
        });

        static::updating(function ($download) {
            $download->slug = Str::slug($download->title);
        });
    }
}
