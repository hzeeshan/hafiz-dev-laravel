{{-- Type Selector --}}
<div class="mb-6">
    <label class="text-light font-semibold mb-3 block">{{ __($t . '.identifier_type') }}</label>
    <div class="flex flex-wrap gap-2">
        <button id="btn-uuid-v4" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 cursor-pointer type-btn active" data-type="uuid-v4">
            {{ __($t . '.uuid_v4_random') }}
        </button>
        <button id="btn-uuid-v1" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 cursor-pointer type-btn" data-type="uuid-v1">
            {{ __($t . '.uuid_v1_timestamp') }}
        </button>
        <button id="btn-uuid-v7" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 cursor-pointer type-btn" data-type="uuid-v7">
            {{ __($t . '.uuid_v7_sortable') }}
        </button>
        <button id="btn-ulid" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 cursor-pointer type-btn" data-type="ulid">
            {{ __($t . '.ulid') }}
        </button>
    </div>
</div>

{{-- Options Row --}}
<div class="flex flex-wrap items-center gap-6 mb-6">
    {{-- Quantity --}}
    <div class="flex items-center gap-3">
        <label for="quantity-select" class="text-light-muted text-sm">{{ __($t . '.quantity') }}</label>
        <select id="quantity-select" class="bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-2 text-sm focus:border-gold focus:outline-none cursor-pointer">
            <option value="1">1</option>
            <option value="5">5</option>
            <option value="10" selected>10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>

    {{-- Format Options --}}
    <label class="flex items-center gap-2 cursor-pointer" id="hyphens-label">
        <input type="checkbox" id="hyphens-toggle" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
        <span class="text-light-muted text-sm">{{ __($t . '.include_hyphens') }}</span>
    </label>

    <label class="flex items-center gap-2 cursor-pointer">
        <input type="checkbox" id="uppercase-toggle" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
        <span class="text-light-muted text-sm">{{ __($t . '.uppercase') }}</span>
    </label>
</div>

{{-- Generate Button --}}
<div class="mb-6">
    <button id="btn-generate" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
        {{ __($t . '.generate') }}
    </button>
</div>

{{-- Output Area --}}
<div class="mb-4">
    <label class="text-light font-semibold mb-2 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
        {{ __($t . '.generated_ids') }}
        <span id="output-count" class="text-light-muted text-sm font-normal">(0)</span>
    </label>
    <div id="output-container" class="bg-darkBg border border-gold/20 rounded-lg p-4 min-h-[200px] max-h-[400px] overflow-y-auto">
        <div id="output-placeholder" class="text-light-muted text-sm">{{ __($t . '.js_strings.placeholder') }}</div>
        <div id="output-list" class="hidden space-y-1"></div>
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3">
    <button id="btn-copy-all" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy_all') }}
    </button>
    <button id="btn-download" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
        {{ __($t . '.download') }}
    </button>
    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.clear') }}
    </button>
</div>

{{-- Success/Copy Notification --}}
<div id="copy-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span id="copy-message" class="text-green-400 text-sm"></span>
    </div>
</div>
