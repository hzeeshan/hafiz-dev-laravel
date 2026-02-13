<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

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
        'related_tools',
    ];

    protected $casts = [
        'position' => 'integer',
        'is_active' => 'boolean',
        'related_tools' => 'array',
    ];

    /**
     * Get translations for this tool.
     */
    public function translations(): HasMany
    {
        return $this->hasMany(ToolTranslation::class);
    }

    /**
     * Get a specific locale translation.
     */
    public function translation(string $locale): ?ToolTranslation
    {
        return $this->translations()->where('locale', $locale)->first();
    }

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
     * Get related tools (only active + existing ones).
     * Falls back to same-category tools if none configured.
     */
    public function getRelatedTools(): Collection
    {
        return Cache::remember("tool_related_{$this->slug}", 3600, function () {
            if (! empty($this->related_tools)) {
                $tools = static::whereIn('slug', $this->related_tools)
                    ->where('is_active', true)
                    ->ordered()
                    ->get();

                if ($tools->isNotEmpty()) {
                    return $tools;
                }
            }

            // Fallback: same category tools (excluding self), max 4
            return static::where('category', $this->category)
                ->where('id', '!=', $this->id)
                ->where('is_active', true)
                ->ordered()
                ->limit(4)
                ->get();
        });
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
            'Converter' => 'Converter',
            'Calculators' => 'Calculators',
        ];
    }
}
