@push('head')
<style>
    .diff-line {
        display: flex;
        min-height: 1.5em;
        line-height: 1.5;
    }
    .diff-line-number {
        min-width: 3rem;
        text-align: right;
        padding-right: 0.75rem;
        user-select: none;
        flex-shrink: 0;
        border-right: 1px solid rgba(212, 168, 83, 0.1);
    }
    .diff-line-content {
        padding-left: 0.75rem;
        white-space: pre-wrap;
        word-break: break-all;
        flex: 1;
        min-width: 0;
    }
    .diff-added {
        background: rgba(34, 197, 94, 0.1);
    }
    .diff-added .diff-line-number {
        color: #4ade80;
        border-right-color: rgba(34, 197, 94, 0.2);
    }
    .diff-added .diff-line-content {
        color: #4ade80;
    }
    .diff-removed {
        background: rgba(239, 68, 68, 0.1);
    }
    .diff-removed .diff-line-number {
        color: #f87171;
        border-right-color: rgba(239, 68, 68, 0.2);
    }
    .diff-removed .diff-line-content {
        color: #f87171;
    }
    .diff-empty {
        background: rgba(107, 114, 128, 0.05);
    }
    .diff-empty .diff-line-number {
        color: transparent;
    }
    .diff-empty .diff-line-content {
        color: transparent;
    }
    .diff-unchanged .diff-line-number {
        color: #6b7280;
    }
    .diff-unchanged .diff-line-content {
        color: #9ca3af;
    }
    /* Inline view specific */
    .diff-inline-added {
        background: rgba(34, 197, 94, 0.1);
    }
    .diff-inline-added .diff-line-content {
        color: #4ade80;
    }
    .diff-inline-removed {
        background: rgba(239, 68, 68, 0.1);
    }
    .diff-inline-removed .diff-line-content {
        color: #f87171;
    }
    /* Word-level highlights inside lines */
    .diff-word-added {
        background: rgba(34, 197, 94, 0.25);
        border-radius: 2px;
        padding: 0 1px;
    }
    .diff-word-removed {
        background: rgba(239, 68, 68, 0.25);
        border-radius: 2px;
        padding: 0 1px;
    }
    /* Synced scroll panels */
    .diff-panel {
        overflow-y: auto;
        max-height: 500px;
    }
    .diff-panel::-webkit-scrollbar {
        width: 6px;
    }
    .diff-panel::-webkit-scrollbar-track {
        background: rgba(17, 24, 39, 0.5);
    }
    .diff-panel::-webkit-scrollbar-thumb {
        background: rgba(212, 168, 83, 0.3);
        border-radius: 3px;
    }
    .diff-panel::-webkit-scrollbar-thumb:hover {
        background: rgba(212, 168, 83, 0.5);
    }
</style>
@endpush

{{-- Options Bar --}}
<div class="flex flex-wrap items-center gap-4 mb-4 p-3 rounded-lg bg-darkBg border border-gold/10">
    {{-- Compare Mode --}}
    <div class="flex items-center gap-2">
        <label for="diff-mode" class="text-light-muted text-sm">{{ __($t . '.compare_by') }}</label>
        <select id="diff-mode" class="bg-darkCard border border-gold/30 text-light rounded-lg px-3 py-1.5 text-sm focus:border-gold focus:outline-none">
            <option value="lines" selected>{{ __($t . '.lines') }}</option>
            <option value="words">{{ __($t . '.words') }}</option>
            <option value="characters">{{ __($t . '.characters') }}</option>
        </select>
    </div>

    <div class="h-6 w-px bg-gold/20 hidden sm:block"></div>

    {{-- Checkboxes --}}
    <label class="flex items-center gap-2 cursor-pointer">
        <input type="checkbox" id="ignore-whitespace" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
        <span class="text-light-muted text-sm">{{ __($t . '.ignore_whitespace') }}</span>
    </label>

    <label class="flex items-center gap-2 cursor-pointer">
        <input type="checkbox" id="ignore-case" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
        <span class="text-light-muted text-sm">{{ __($t . '.ignore_case') }}</span>
    </label>

    <label class="flex items-center gap-2 cursor-pointer">
        <input type="checkbox" id="show-unchanged" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
        <span class="text-light-muted text-sm">{{ __($t . '.show_unchanged') }}</span>
    </label>
</div>

{{-- Input Panels --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
    {{-- Original Text --}}
    <div class="flex flex-col">
        <label for="original-text" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            {{ __($t . '.original_text') }}
        </label>
        <textarea
            id="original-text"
            class="flex-1 min-h-[250px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-y"
            placeholder="{{ __($t . '.original_placeholder') }}"
            spellcheck="false"
        ></textarea>
    </div>

    {{-- Modified Text --}}
    <div class="flex flex-col">
        <label for="modified-text" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            {{ __($t . '.modified_text') }}
        </label>
        <textarea
            id="modified-text"
            class="flex-1 min-h-[250px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-y"
            placeholder="{{ __($t . '.modified_placeholder') }}"
            spellcheck="false"
        ></textarea>
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-4">
    <button id="btn-compare" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        {{ __($t . '.compare') }}
    </button>
    <button id="btn-swap" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
        {{ __($t . '.swap') }}
    </button>
    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.clear_all') }}
    </button>
    <button id="btn-copy-diff" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy_diff') }}
    </button>
    <button id="btn-sample" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.sample') }}
    </button>
</div>

{{-- View Mode Toggle --}}
<div id="view-toggle-section" class="hidden mb-4">
    <div class="flex items-center gap-2">
        <span class="text-light-muted text-sm">{{ __($t . '.view') }}</span>
        <div class="flex items-center p-1 bg-darkBg rounded-lg border border-gold/10">
            <button id="btn-side-by-side" class="px-3 py-1.5 text-sm rounded-md bg-gold/20 text-gold font-medium transition-all cursor-pointer">
                {{ __($t . '.side_by_side') }}
            </button>
            <button id="btn-inline" class="px-3 py-1.5 text-sm rounded-md text-light-muted hover:text-gold transition-all cursor-pointer">
                {{ __($t . '.inline') }}
            </button>
        </div>
    </div>
</div>

{{-- Statistics Bar --}}
<div id="stats-bar" class="hidden mb-4 p-3 rounded-lg bg-darkBg border border-gold/10">
    <div class="flex flex-wrap items-center gap-4 text-sm">
        <span class="flex items-center gap-1.5">
            <span class="w-3 h-3 rounded-sm bg-green-500/30 border border-green-500/50"></span>
            <span class="text-light-muted">{{ __($t . '.added') }} <span id="stat-added" class="text-green-400 font-medium">0</span></span>
        </span>
        <span class="flex items-center gap-1.5">
            <span class="w-3 h-3 rounded-sm bg-red-500/30 border border-red-500/50"></span>
            <span class="text-light-muted">{{ __($t . '.removed') }} <span id="stat-removed" class="text-red-400 font-medium">0</span></span>
        </span>
        <span class="flex items-center gap-1.5">
            <span class="w-3 h-3 rounded-sm bg-gray-500/30 border border-gray-500/50"></span>
            <span class="text-light-muted">{{ __($t . '.unchanged') }} <span id="stat-unchanged" class="text-light font-medium">0</span></span>
        </span>
    </div>
</div>

{{-- Diff Output --}}
<div id="diff-output" class="hidden">
    {{-- Side by Side View --}}
    <div id="diff-side-by-side" class="grid grid-cols-1 lg:grid-cols-2 gap-0 border border-gold/20 rounded-lg overflow-hidden">
        {{-- Left side (Original) --}}
        <div class="border-b lg:border-b-0 lg:border-r border-gold/20">
            <div class="bg-darkBg px-4 py-2 text-sm font-medium text-light-muted border-b border-gold/20 flex items-center gap-2">
                <svg class="w-3.5 h-3.5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                {{ __($t . '.original') }}
            </div>
            <div id="diff-left" class="diff-panel font-mono text-sm bg-darkCard">
            </div>
        </div>

        {{-- Right side (Modified) --}}
        <div>
            <div class="bg-darkBg px-4 py-2 text-sm font-medium text-light-muted border-b border-gold/20 flex items-center gap-2">
                <svg class="w-3.5 h-3.5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                {{ __($t . '.modified') }}
            </div>
            <div id="diff-right" class="diff-panel font-mono text-sm bg-darkCard">
            </div>
        </div>
    </div>

    {{-- Inline View --}}
    <div id="diff-inline" class="hidden border border-gold/20 rounded-lg overflow-hidden">
        <div class="bg-darkBg px-4 py-2 text-sm font-medium text-light-muted border-b border-gold/20 flex items-center gap-2">
            <svg class="w-3.5 h-3.5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            {{ __($t . '.unified_diff') }}
        </div>
        <div id="diff-unified" class="diff-panel font-mono text-sm bg-darkCard">
        </div>
    </div>
</div>

{{-- No Differences Message --}}
<div id="no-diff-message" class="hidden mt-4 p-4 rounded-lg bg-green-500/10 border border-green-500/30">
    <div class="flex items-center gap-3">
        <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <p class="text-green-400 text-sm font-semibold">{{ __($t . '.no_diff') }}</p>
    </div>
</div>

{{-- Success/Error Notifications --}}
<div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span id="success-message" class="text-green-400 text-sm"></span>
    </div>
</div>
