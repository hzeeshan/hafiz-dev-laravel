<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ToolView extends Model
{
    protected $fillable = [
        'tool_slug',
        'date',
        'views',
    ];

    protected $casts = [
        'date' => 'date',
        'views' => 'integer',
    ];

    /**
     * Get the tool that owns this view record.
     */
    public function tool(): BelongsTo
    {
        return $this->belongsTo(Tool::class, 'tool_slug', 'slug');
    }

    /**
     * Increment view count for a tool.
     */
    public static function incrementView(string $toolSlug): void
    {
        // Check if tool exists in database
        if (! Tool::where('slug', $toolSlug)->exists()) {
            return;
        }

        $today = now()->toDateString();

        // Use upsert for atomic operation - insert or update
        static::upsert(
            [
                'tool_slug' => $toolSlug,
                'date' => $today,
                'views' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ['tool_slug', 'date'],
            ['views' => \Illuminate\Support\Facades\DB::raw('views + 1'), 'updated_at' => now()]
        );
    }

    /**
     * Get total views for a tool (all time).
     */
    public static function getTotalViews(string $toolSlug): int
    {
        return static::where('tool_slug', $toolSlug)->sum('views');
    }

    /**
     * Get views for today.
     */
    public static function getTodayViews(string $toolSlug): int
    {
        return static::where('tool_slug', $toolSlug)
            ->where('date', now()->toDateString())
            ->value('views') ?? 0;
    }

    /**
     * Get views for a specific period.
     */
    public static function getViewsForPeriod(string $toolSlug, int $days): int
    {
        return static::where('tool_slug', $toolSlug)
            ->where('date', '>=', now()->subDays($days)->toDateString())
            ->sum('views');
    }

    /**
     * Get stats for all tools.
     */
    public static function getAllToolStats(): array
    {
        $tools = Tool::active()->get();
        $stats = [];

        foreach ($tools as $tool) {
            $stats[] = [
                'slug' => $tool->slug,
                'name' => $tool->name,
                'today' => self::getTodayViews($tool->slug),
                'last_7_days' => self::getViewsForPeriod($tool->slug, 7),
                'last_30_days' => self::getViewsForPeriod($tool->slug, 30),
                'total' => self::getTotalViews($tool->slug),
            ];
        }

        return collect($stats)->sortByDesc('total')->values()->all();
    }

    /**
     * Get total views across all tools.
     */
    public static function getTotalAllToolsViews(): int
    {
        return static::sum('views');
    }

    /**
     * Get today's total views across all tools.
     */
    public static function getTodayAllToolsViews(): int
    {
        return static::where('date', now()->toDateString())->sum('views');
    }

    /**
     * Get display name for a tool slug.
     */
    public function getToolNameAttribute(): string
    {
        $tool = Tool::where('slug', $this->tool_slug)->first();

        return $tool ? $tool->name : ucwords(str_replace('-', ' ', $this->tool_slug));
    }
}
