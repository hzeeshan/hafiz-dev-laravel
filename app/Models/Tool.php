<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tool extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'category',
        'position',
        'is_active',
    ];

    protected $casts = [
        'position' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Get the views for this tool.
     */
    public function views(): HasMany
    {
        return $this->hasMany(ToolView::class, 'tool_slug', 'slug');
    }

    /**
     * Get total views for this tool.
     */
    public function getTotalViewsAttribute(): int
    {
        return $this->views()->sum('views');
    }

    /**
     * Scope to get only active tools.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by position.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('position');
    }

    /**
     * Scope to order by popularity (total views).
     */
    public function scopeByPopularity($query)
    {
        return $query->withSum('views as total_views', 'views')
            ->orderByDesc('total_views');
    }

    /**
     * Get tools for display based on ordering mode.
     */
    public static function getForDisplay(string $orderBy = 'manual'): \Illuminate\Database\Eloquent\Collection
    {
        $query = static::active();

        if ($orderBy === 'popularity') {
            return $query->byPopularity()->get();
        }

        return $query->ordered()->get();
    }

    /**
     * Available categories for tools.
     */
    public static function categories(): array
    {
        return [
            'JSON' => 'JSON',
            'Encoding' => 'Encoding',
            'Scheduling' => 'Scheduling',
            'Generators' => 'Generators',
            'Testing' => 'Testing',
            'Security' => 'Security',
            'Text' => 'Text',
            'Date/Time' => 'Date/Time',
            'Design' => 'Design',
            'Images' => 'Images',
        ];
    }
}
