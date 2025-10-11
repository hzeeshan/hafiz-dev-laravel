<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogGenerationLog extends Model
{
    protected $fillable = [
        'topic_id',
        'post_id',
        'status',
        'error_message',
        'error_stack',
        'retry_count',
        'generation_time',
        'content_tokens',
        'image_count',
        'cost_tracking',
        'prompts',
        'ai_provider',
        'ai_model',
        'image_provider',
    ];

    protected $casts = [
        'cost_tracking' => 'array',
        'prompts' => 'array',
        'generation_time' => 'integer',
        'content_tokens' => 'integer',
        'image_count' => 'integer',
        'retry_count' => 'integer',
    ];

    // Relationships
    public function topic(): BelongsTo
    {
        return $this->belongsTo(BlogTopic::class, 'topic_id');
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    // Helpers
    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function isFailed(): bool
    {
        return $this->status === 'failed';
    }

    public function canRetry(): bool
    {
        return $this->isFailed() && $this->retry_count < 3;
    }

    public function getTotalCost(): float
    {
        return (float) ($this->cost_tracking['total'] ?? 0);
    }

    public function getContentCost(): float
    {
        return (float) ($this->cost_tracking['content'] ?? 0);
    }

    public function getImagesCost(): float
    {
        return (float) ($this->cost_tracking['images'] ?? 0);
    }
}
