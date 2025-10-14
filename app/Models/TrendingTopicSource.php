<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrendingTopicSource extends Model
{
    protected $fillable = [
        'source',
        'source_id',
        'title',
        'url',
        'excerpt',
        'metadata',
        'calculated_score',
        'upvotes',
        'comments_count',
        'keywords',
        'discovered_at',
        'blog_topic_id',
        'converted_at',
    ];

    protected $casts = [
        'metadata' => 'array',
        'keywords' => 'array',
        'calculated_score' => 'float',
        'upvotes' => 'integer',
        'comments_count' => 'integer',
        'discovered_at' => 'datetime',
        'converted_at' => 'datetime',
    ];

    // Relationships
    public function blogTopic(): BelongsTo
    {
        return $this->belongsTo(BlogTopic::class);
    }

    // Scopes
    public function scopeHighScore($query, float $minScore = 7.0)
    {
        return $query->where('calculated_score', '>=', $minScore);
    }

    public function scopeNotConverted($query)
    {
        return $query->whereNull('blog_topic_id');
    }

    public function scopeBySource($query, string $source)
    {
        return $query->where('source', $source);
    }

    public function scopeRecent($query, int $days = 7)
    {
        return $query->where('discovered_at', '>=', now()->subDays($days));
    }

    // Helpers
    public function isConverted(): bool
    {
        return !is_null($this->blog_topic_id);
    }

    public function isHighScore(): bool
    {
        return $this->calculated_score >= 7.0;
    }

    public function getSourceNameAttribute(): string
    {
        return match ($this->source) {
            'reddit' => '🔴 Reddit',
            'hackernews' => '🔶 Hacker News',
            'google_trends' => '📈 Google Trends',
            default => $this->source,
        };
    }
}
