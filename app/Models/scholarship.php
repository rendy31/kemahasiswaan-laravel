<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scholarship extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'thumbnail', 'content', 'isPublish', 'user_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
