<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ToolCtaSetting extends Model
{
    protected $fillable = [
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
     * Get the active CTA setting (cached).
     */
    public static function getActive(): ?self
    {
        return Cache::remember('tool_cta_setting', 3600, function () {
            return static::where('is_active', true)->first();
        });
    }

    /**
     * Clear the cached CTA setting.
     */
    public static function clearCache(): void
    {
        Cache::forget('tool_cta_setting');
    }
}
