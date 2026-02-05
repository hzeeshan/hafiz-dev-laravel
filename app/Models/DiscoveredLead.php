<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscoveredLead extends Model
{
    protected $fillable = [
        'source',
        'source_id',
        'title',
        'url',
        'body',
        'author',
        'subreddit',
        'calculated_score',
        'score_category',
        'upvotes',
        'comments_count',
        'intent_keywords_found',
        'metadata',
        'posted_at',
        'discovered_at',
        'status',
        'notes',
        'notified',
        'notified_at',
    ];

    protected $casts = [
        'intent_keywords_found' => 'array',
        'metadata' => 'array',
        'calculated_score' => 'float',
        'upvotes' => 'integer',
        'comments_count' => 'integer',
        'posted_at' => 'datetime',
        'discovered_at' => 'datetime',
        'notified' => 'boolean',
        'notified_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Filter hot leads (score >= 8.0).
     */
    public function scopeHotLeads($query)
    {
        return $query->where('calculated_score', '>=', 8.0);
    }

    /**
     * Filter strong leads (score >= 6.0).
     */
    public function scopeStrongLeads($query)
    {
        return $query->where('calculated_score', '>=', 6.0);
    }

    /**
     * Filter leads worth checking (score >= 4.0).
     */
    public function scopeWorthChecking($query)
    {
        return $query->where('calculated_score', '>=', 4.0);
    }

    /**
     * Filter by status.
     */
    public function scopeWithStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Filter new leads.
     */
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    /**
     * Filter contacted leads.
     */
    public function scopeContacted($query)
    {
        return $query->where('status', 'contacted');
    }

    /**
     * Filter converted leads.
     */
    public function scopeConverted($query)
    {
        return $query->where('status', 'converted');
    }

    /**
     * Filter by source.
     */
    public function scopeBySource($query, string $source)
    {
        return $query->where('source', $source);
    }

    /**
     * Filter recent leads.
     */
    public function scopeRecent($query, int $days = 7)
    {
        return $query->where('discovered_at', '>=', now()->subDays($days));
    }

    /**
     * Filter by subreddit.
     */
    public function scopeFromSubreddit($query, string $subreddit)
    {
        return $query->where('subreddit', $subreddit);
    }

    /**
     * Filter notified leads.
     */
    public function scopeNotified($query)
    {
        return $query->where('notified', true);
    }

    /**
     * Filter unnotified leads.
     */
    public function scopeUnnotified($query)
    {
        return $query->where('notified', false);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Get formatted source name.
     */
    public function getSourceNameAttribute(): string
    {
        return match ($this->source) {
            'reddit' => '🔴 Reddit',
            'hackernews' => '🔶 Hacker News',
            default => $this->source,
        };
    }

    /**
     * Get score category label.
     */
    public function getScoreCategoryLabelAttribute(): string
    {
        return match ($this->score_category) {
            'hot_lead' => '🔥 Hot Lead',
            'strong_lead' => '⭐ Strong Lead',
            'worth_checking' => '👀 Worth Checking',
            'saved' => '📋 Saved',
            default => $this->score_category,
        };
    }

    /**
     * Get status label.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'new' => '🆕 New',
            'contacted' => '📧 Contacted',
            'replied' => '💬 Replied',
            'converted' => '✅ Converted',
            'skipped' => '⏭️ Skipped',
            default => $this->status,
        };
    }

    /**
     * Get full source URL (including comments for Reddit).
     */
    public function getSourceUrlAttribute(): string
    {
        if ($this->source === 'reddit' && isset($this->metadata['permalink'])) {
            return 'https://reddit.com'.$this->metadata['permalink'];
        }

        if ($this->source === 'hackernews') {
            return $this->metadata['hn_url'] ?? $this->url;
        }

        return $this->url;
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Check if this is a hot lead.
     */
    public function isHotLead(): bool
    {
        return $this->calculated_score >= 8.0;
    }

    /**
     * Check if this is a strong lead.
     */
    public function isStrongLead(): bool
    {
        return $this->calculated_score >= 6.0;
    }

    /**
     * Get flat list of all intent keywords found.
     */
    public function getAllIntentKeywords(): array
    {
        $keywords = $this->intent_keywords_found ?? [];

        return collect($keywords)->flatten()->unique()->values()->toArray();
    }

    /**
     * Mark lead as contacted.
     */
    public function markAsContacted(?string $notes = null): void
    {
        $this->update([
            'status' => 'contacted',
            'notes' => $notes ?? $this->notes,
        ]);
    }

    /**
     * Mark lead as converted.
     */
    public function markAsConverted(?string $notes = null): void
    {
        $this->update([
            'status' => 'converted',
            'notes' => $notes ?? $this->notes,
        ]);
    }

    /**
     * Mark lead as skipped.
     */
    public function markAsSkipped(?string $notes = null): void
    {
        $this->update([
            'status' => 'skipped',
            'notes' => $notes ?? $this->notes,
        ]);
    }
}
