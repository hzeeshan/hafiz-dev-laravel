{{-- Toolbar --}}
<div class="flex flex-wrap gap-3 mb-4">
    <button id="btn-paste" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
        {{ __($t . '.paste') }}
    </button>
    <button id="btn-copy" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy') }}
    </button>
    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.clear') }}
    </button>
</div>

{{-- Textarea --}}
<div class="mb-6">
    <textarea id="text-input"
              class="w-full bg-darkBg border border-gold/20 rounded-lg p-4 text-light font-normal resize-y focus:border-gold/50 focus:outline-none placeholder:text-light-muted/50"
              style="min-height: 300px;"
              placeholder="{{ __($t . '.placeholder') }}"></textarea>
</div>

{{-- Stats Grid --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    {{-- Characters (total) --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
        <div id="stat-chars" class="text-3xl font-bold text-gold mb-1">0</div>
        <div class="text-light-muted text-sm">{{ __($t . '.characters') }}</div>
    </div>

    {{-- Characters (no spaces) --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
        <div id="stat-chars-no-spaces" class="text-3xl font-bold text-gold mb-1">0</div>
        <div class="text-light-muted text-sm">{{ __($t . '.characters_no_spaces') }}</div>
    </div>

    {{-- Words --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
        <div id="stat-words" class="text-3xl font-bold text-gold mb-1">0</div>
        <div class="text-light-muted text-sm">{{ __($t . '.words') }}</div>
    </div>

    {{-- Sentences --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
        <div id="stat-sentences" class="text-3xl font-bold text-gold mb-1">0</div>
        <div class="text-light-muted text-sm">{{ __($t . '.sentences') }}</div>
    </div>

    {{-- Paragraphs --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
        <div id="stat-paragraphs" class="text-3xl font-bold text-gold mb-1">0</div>
        <div class="text-light-muted text-sm">{{ __($t . '.paragraphs') }}</div>
    </div>

    {{-- Lines --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
        <div id="stat-lines" class="text-3xl font-bold text-gold mb-1">0</div>
        <div class="text-light-muted text-sm">{{ __($t . '.lines') }}</div>
    </div>

    {{-- Reading Time --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
        <div id="stat-reading-time" class="text-3xl font-bold text-gold mb-1">0 min</div>
        <div class="text-light-muted text-sm">{{ __($t . '.reading_time') }}</div>
    </div>

    {{-- Speaking Time --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
        <div id="stat-speaking-time" class="text-3xl font-bold text-gold mb-1">0 min</div>
        <div class="text-light-muted text-sm">{{ __($t . '.speaking_time') }}</div>
    </div>
</div>

{{-- Character Limit Section --}}
<div class="bg-darkBg rounded-lg p-4 border border-gold/10">
    <div class="flex flex-col sm:flex-row sm:items-center gap-4">
        <div class="flex items-center gap-3">
            <label for="char-limit" class="text-light text-sm whitespace-nowrap">{{ __($t . '.character_limit') }}</label>
            <input type="number" id="char-limit"
                   class="w-28 bg-transparent border border-gold/30 rounded px-3 py-1.5 text-light text-sm focus:border-gold focus:outline-none"
                   placeholder="{{ __($t . '.optional') }}" min="1">
        </div>
        <div class="flex-1">
            <div id="limit-progress-container" class="hidden">
                <div class="flex justify-between text-xs text-light-muted mb-1">
                    <span id="limit-usage">0 / 0 {{ __($t . '.js_strings.characters') }}</span>
                    <span id="limit-remaining">0 {{ __($t . '.js_strings.remaining') }}</span>
                </div>
                <div class="h-2 bg-gold/10 rounded-full overflow-hidden">
                    <div id="limit-progress-bar" class="h-full bg-gold transition-all duration-300 rounded-full" style="width: 0%"></div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Success/Copy Notification --}}
<div id="copy-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span id="copy-message" class="text-green-400 text-sm"></span>
    </div>
</div>

{{-- Error Notification --}}
<div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span id="error-message" class="text-red-400 text-sm"></span>
    </div>
</div>
