<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class BlogTopic extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'keywords',
        'description',
        'target_audience',
        'priority',
        'generation_mode',
        'content_type',
        'source_url',
        'source_content',
        'source_metadata',
        'remix_style',
        'source_type',
        'custom_prompt',
        'status',
        'scheduled_for',
        'publish_to_devto',
        'publish_to_hashnode',
        'publish_to_linkedin',
        'publish_to_medium',
        'generated_at',
        'reviewed_at',
    ];

    protected $casts = [
        'source_metadata' => 'array',
        'scheduled_for' => 'datetime',
        'generated_at' => 'datetime',
        'reviewed_at' => 'datetime',
        'publish_to_devto' => 'boolean',
        'publish_to_hashnode' => 'boolean',
        'publish_to_linkedin' => 'boolean',
        'publish_to_medium' => 'boolean',
        'priority' => 'integer',
    ];

    // Automatically generate slug from title
    protected static function booted(): void
    {
        static::creating(function (BlogTopic $topic) {
            if (empty($topic->slug)) {
                // If title is empty (remix mode), generate slug from source type + timestamp
                if (empty($topic->title)) {
                    $prefix = $topic->source_type ?? 'remix';
                    $topic->slug = Str::slug($prefix . '-' . now()->format('Y-m-d-His'));
                } else {
                    $topic->slug = Str::slug($topic->title);
                }
            }
        });
    }

    // Relationships
    public function post(): HasOne
    {
        return $this->hasOne(Post::class, 'blog_topic_id');
    }

    public function generationLogs(): HasMany
    {
        return $this->hasMany(BlogGenerationLog::class, 'topic_id');
    }

    public function latestLog(): HasOne
    {
        return $this->hasOne(BlogGenerationLog::class, 'topic_id')->latestOfMany();
    }

    public function failedJobs(): HasMany
    {
        return $this->hasMany(FailedJob::class, 'topic_id');
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeScheduled($query)
    {
        return $query->whereNotNull('scheduled_for')
            ->where('scheduled_for', '<=', now())
            ->where('status', 'pending');
    }

    public function scopePriority($query)
    {
        return $query->orderBy('priority', 'desc');
    }

    // Helpers
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isGenerating(): bool
    {
        return $this->status === 'generating';
    }

    public function isReview(): bool
    {
        return $this->status === 'review';
    }

    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    public function isPublished(): bool
    {
        return $this->status === 'published';
    }

    public function isTopicMode(): bool
    {
        return $this->generation_mode === 'topic';
    }

    public function isContextMode(): bool
    {
        return in_array($this->generation_mode, ['context_youtube', 'context_blog', 'context_twitter']);
    }

    public function hasSourceContent(): bool
    {
        return !empty($this->source_content);
    }

    public function isTechnical(): bool
    {
        return $this->content_type === 'technical';
    }

    public function isOpinion(): bool
    {
        return $this->content_type === 'opinion';
    }

    public function isNews(): bool
    {
        return $this->content_type === 'news';
    }

    public function isFailed(): bool
    {
        return $this->status === 'failed';
    }

    public function hasFailedJobs(): bool
    {
        // Note: This won't work with standard DB relationship
        // We'll check in the FailedJob model by parsing payloads
        return FailedJob::query()
            ->get()
            ->filter(fn($job) => $job->getBlogTopicId() === $this->id)
            ->isNotEmpty();
    }

    // ========================================================================
    // Content Remix Helpers
    // ========================================================================

    /**
     * Check if this topic uses remix mode (context-based generation)
     */
    public function isRemixMode(): bool
    {
        return $this->isContextMode() && !empty($this->remix_style);
    }

    /**
     * Get the remix style enum
     */
    public function getRemixStyle(): ?\App\Enums\RemixStyle
    {
        if (empty($this->remix_style)) {
            return null;
        }

        return \App\Enums\RemixStyle::tryFrom($this->remix_style);
    }

    /**
     * Check if topic has valid source content for remixing
     */
    public function hasValidRemixSource(): bool
    {
        return $this->isContextMode()
            && !empty($this->source_content)
            && !empty($this->remix_style);
    }

    /**
     * Get source type label
     */
    public function getSourceTypeLabel(): string
    {
        return match ($this->source_type) {
            'youtube' => '📹 YouTube',
            'blog_post' => '📄 Blog Post',
            'medium' => '📰 Medium',
            'article' => '🔗 Article',
            default => '📋 Other',
        };
    }
}
