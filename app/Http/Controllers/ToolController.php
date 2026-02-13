<?php

namespace App\Http\Controllers;

use App\Models\ToolTranslation;
use App\Models\ToolView;

class ToolController extends Controller
{
    public function italianIndex()
    {
        $translations = ToolTranslation::where('locale', 'it')
            ->where('is_active', true)
            ->whereHas('tool', fn ($q) => $q->where('is_active', true))
            ->with('tool')
            ->get()
            ->sortBy('tool.position');

        return view('tools.it.index', compact('translations'));
    }

    public function italianShow(string $slug)
    {
        $translation = ToolTranslation::where('locale', 'it')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->with('tool')
            ->firstOrFail();

        $tool = $translation->tool;

        if (! $tool->is_active) {
            abort(404);
        }

        $toolSlug = $tool->slug;
        $italianSlug = $slug;

        return view('tools.it.show', compact('tool', 'toolSlug', 'italianSlug', 'translation'));
    }

    public function italianTrackView(string $slug)
    {
        $translation = ToolTranslation::where('locale', 'it')
            ->where('slug', $slug)
            ->with('tool')
            ->first();

        if ($translation) {
            ToolView::incrementView($translation->tool->slug);
        }

        return response()->json(['success' => true]);
    }
}
