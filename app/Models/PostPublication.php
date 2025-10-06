<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostPublication extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'platform',
        'external_url',
        'external_id',
        'views',
        'likes',
        'comments',
        'status',
        'error_message',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Relationships
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
