<?php

namespace App\Observers;

use App\Models\Tool;
use App\Services\IndexNowService;
use Illuminate\Support\Facades\Log;

/**
 * Tool Observer
 *
 * Handles automatic IndexNow submissions when tools are created or updated.
 * This ensures search engines are notified instantly when tool pages change.
 */
class ToolObserver
{
    protected IndexNowService $indexNowService;

    public function __construct(IndexNowService $indexNowService)
    {
        $this->indexNowService = $indexNowService;
    }

    /**
     * Handle the Tool "created" event.
     *
     * If the tool is created as active, notify search engines.
     */
    public function created(Tool $tool): void
    {
        if ($tool->is_active) {
            $this->notifySearchEngines($tool, 'created');
        }
    }

    /**
     * Handle the Tool "updated" event.
     *
     * Notify search engines when:
     * 1. Tool becomes active
     * 2. Active tool content is updated
     */
    public function updated(Tool $tool): void
    {
        // Check if tool just became active
        $wasActive = $tool->getOriginal('is_active');
        $isActive = $tool->is_active;

        if (!$wasActive && $isActive) {
            // Tool was just activated - notify search engines
            $this->notifySearchEngines($tool, 'activated');
            return;
        }

        // If active and content changed, notify about update
        if ($isActive && $this->hasContentChanged($tool)) {
            $this->notifySearchEngines($tool, 'updated');
        }
    }

    /**
     * Check if significant content has changed
     */
    protected function hasContentChanged(Tool $tool): bool
    {
        $contentFields = ['name', 'slug', 'description', 'category'];

        foreach ($contentFields as $field) {
            if ($tool->isDirty($field)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Notify search engines about the tool
     */
    protected function notifySearchEngines(Tool $tool, string $action): void
    {
        if (!$this->indexNowService->isEnabled()) {
            Log::debug('[ToolObserver] IndexNow disabled, skipping notification', [
                'tool_id' => $tool->id,
                'action' => $action,
            ]);
            return;
        }

        Log::info('[ToolObserver] Notifying search engines', [
            'tool_id' => $tool->id,
            'slug' => $tool->slug,
            'action' => $action,
        ]);

        // Submit the tool URL
        $this->indexNowService->submitToolPage($tool->slug);

        // Also update the tools index page since it lists tools
        $this->indexNowService->submitUrl(url('/tools'));
    }
}
