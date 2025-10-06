<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'seo_title',
        'seo_description',
        'tags',
        'status',
        'published_at',
        'views',
        'reading_time',
    ];

    protected $casts = [
        'tags' => 'array',
        'published_at' => 'datetime',
    ];

    // Relationships
    public function publications()
    {
        return $this->hasMany(PostPublication::class);
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                    ->where('published_at', '<=', now());
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    // Accessors
    public function getReadingTimeAttribute($value)
    {
        // If not set, calculate from content (average 200 words/min)
        if (!$value) {
            $wordCount = str_word_count(strip_tags($this->content));
            return ceil($wordCount / 200);
        }
        return $value;
    }

    public function getExcerptAttribute($value)
    {
        // If excerpt not set, generate from content
        if (!$value) {
            return Str::limit(strip_tags($this->content), 200);
        }
        return $value;
    }

    // Auto-generate slug from title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
}
