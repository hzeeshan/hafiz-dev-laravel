<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ToolCtaSetting extends Model
{
    protected $fillable = [
        'locale',
        'heading',
        'description',
        'button_text',
        'button_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active CTA setting for a locale (cached).
     */
    public static function getActive(?string $locale = null): ?self
    {
        $locale = $locale ?? app()->getLocale();
        $cacheKey = "tool_cta_setting_{$locale}";

        return Cache::remember($cacheKey, 3600, function () use ($locale) {
            return static::where('is_active', true)
                ->where('locale', $locale)
                ->first();
        });
    }

    /**
     * Clear all cached CTA settings.
     */
    public static function clearCache(): void
    {
        Cache::forget('tool_cta_setting_en');
        Cache::forget('tool_cta_setting_it');
    }
}
