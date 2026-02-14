{{-- Options --}}
<div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div>
            <label for="separator" class="text-light font-semibold mb-2 block text-sm">{{ __($t . '.separator') }}</label>
            <select id="separator" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                <option value="-">{{ __($t . '.hyphen_recommended') }}</option>
                <option value="_">{{ __($t . '.underscore') }}</option>
                <option value=".">{{ __($t . '.dot') }}</option>
                <option value="">{{ __($t . '.none_joined') }}</option>
            </select>
        </div>
        <div>
            <label for="max-length" class="text-light font-semibold mb-2 block text-sm">{{ __($t . '.max_length') }}</label>
            <select id="max-length" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                <option value="0">{{ __($t . '.no_limit') }}</option>
                <option value="50">50 {{ __($t . '.characters') }}</option>
                <option value="75" selected>75 {{ __($t . '.characters') }}</option>
                <option value="100">100 {{ __($t . '.characters') }}</option>
                <option value="150">150 {{ __($t . '.characters') }}</option>
            </select>
        </div>
        <div class="flex items-end pb-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" id="transliterate" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                <span class="text-sm text-light-muted">{{ __($t . '.transliterate_accents') }}</span>
            </label>
        </div>
        <div class="flex items-end pb-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" id="remove-stopwords" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                <span class="text-sm text-light-muted">{{ __($t . '.remove_stop_words') }}</span>
            </label>
        </div>
    </div>
</div>

{{-- Input / Output --}}
<div class="grid lg:grid-cols-2 gap-4 mb-6">
    {{-- Input --}}
    <div class="flex flex-col">
        <label for="text-input" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            {{ __($t . '.text_input') }}
            <span class="text-light-muted text-xs font-normal">{{ __($t . '.one_slug_per_line') }}</span>
        </label>
        <textarea
            id="text-input"
            class="flex-1 min-h-[250px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
            placeholder="How to Build a REST API with Laravel
10 Tips for Better SEO in 2026
Über uns — Kontakt & Impressum
Café résumé naïve"
            spellcheck="false"
        ></textarea>
    </div>

    {{-- Output --}}
    <div class="flex flex-col">
        <label class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
            {{ __($t . '.generated_slugs') }}
        </label>
        <textarea
            id="slug-output"
            class="flex-1 min-h-[250px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
            placeholder="{{ __($t . '.slugs_placeholder') }}"
            readonly
        ></textarea>
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-generate" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
        {{ __($t . '.generate_slugs') }}
    </button>
    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy') }}
    </button>
    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.sample') }}
    </button>
    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.clear') }}
    </button>
</div>

{{-- Stats --}}
<div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="text-center">
            <div id="stat-slugs" class="text-2xl font-bold text-gold mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.slugs_generated_stat') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-chars-saved" class="text-2xl font-bold text-light mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.characters_saved') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-avg-length" class="text-2xl font-bold text-light mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.avg_slug_length') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-longest" class="text-2xl font-bold text-light mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.longest_slug') }}</div>
        </div>
    </div>
</div>

{{-- URL Preview --}}
<div id="url-preview" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
        {{ __($t . '.url_preview') }}
    </h3>
    <div id="url-preview-list" class="space-y-2 font-mono text-sm"></div>
</div>

{{-- Notifications --}}
<div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span id="success-message" class="text-green-400 text-sm"></span>
    </div>
</div>
<div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span id="error-message" class="text-red-400 text-sm"></span>
    </div>
</div>
