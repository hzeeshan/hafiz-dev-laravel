<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    /**
     * Get a setting value by key.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::rememberForever("setting.{$key}", function () use ($key, $default) {
            $setting = static::where('key', $key)->first();

            return $setting ? $setting->value : $default;
        });
    }

    /**
     * Set a setting value.
     */
    public static function set(string $key, mixed $value): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );

        Cache::forget("setting.{$key}");
    }

    /**
     * Get tools ordering mode.
     */
    public static function getToolsOrderBy(): string
    {
        return static::get('tools_order_by', config('tools.order_by', 'manual'));
    }

    /**
     * Set tools ordering mode.
     */
    public static function setToolsOrderBy(string $mode): void
    {
        static::set('tools_order_by', $mode);
    }
}
