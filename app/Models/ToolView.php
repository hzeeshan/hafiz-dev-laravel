<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
     * Available tools with their display names.
     */
    public static array $tools = [
        'json-formatter' => 'JSON Formatter',
        'base64-encoder' => 'Base64 Encoder',
        'cron-expression-builder' => 'Cron Expression Builder',
        'uuid-generator' => 'UUID Generator',
        'regex-tester' => 'Regex Tester',
        'jwt-decoder' => 'JWT Decoder',
        'password-generator' => 'Password Generator',
        'hash-generator' => 'Hash Generator',
        'url-encoder' => 'URL Encoder',
        'lorem-ipsum-generator' => 'Lorem Ipsum Generator',
        'timestamp-converter' => 'Timestamp Converter',
    ];

    /**
     * Increment view count for a tool.
     */
    public static function incrementView(string $toolSlug): void
    {
        if (! array_key_exists($toolSlug, self::$tools)) {
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
        $stats = [];

        foreach (self::$tools as $slug => $name) {
            $stats[] = [
                'slug' => $slug,
                'name' => $name,
                'today' => self::getTodayViews($slug),
                'last_7_days' => self::getViewsForPeriod($slug, 7),
                'last_30_days' => self::getViewsForPeriod($slug, 30),
                'total' => self::getTotalViews($slug),
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
        return self::$tools[$this->tool_slug] ?? ucwords(str_replace('-', ' ', $this->tool_slug));
    }
}
