<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'description'
    ];

    /**
     * Relations
     */

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    /**
     * Attributes
     */

    public function getImagePathAttribute()
    {
        if ($this->attributes['image_path']) return Storage::url($this->attributes['image_path']);

        return asset('images/not-image.jpg');
    }
}
