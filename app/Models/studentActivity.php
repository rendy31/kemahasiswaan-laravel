<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class studentActivity extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','thumbnail','content','isPublish','user_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
