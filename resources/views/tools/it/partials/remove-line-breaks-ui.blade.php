{{-- Options Panel --}}
<div class="bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
    <h3 class="text-light font-medium mb-4">{{ __($t . '.options_title') }}</h3>

    <div class="grid md:grid-cols-2 gap-4">
        {{-- Replacement Character --}}
        <div>
            <label for="replacement-select" class="block text-light-muted text-sm mb-2">{{ __($t . '.replacement_label') }}</label>
            <select id="replacement-select" class="w-full bg-transparent border border-gold/30 rounded-lg px-4 py-2 text-light focus:border-gold focus:outline-none">
                <option value="space" selected>{{ __($t . '.opt_space') }}</option>
                <option value="nothing">{{ __($t . '.opt_nothing') }}</option>
                <option value="comma">{{ __($t . '.opt_comma') }}</option>
                <option value="comma-space">{{ __($t . '.opt_comma_space') }}</option>
                <option value="semicolon">{{ __($t . '.opt_semicolon') }}</option>
                <option value="pipe">{{ __($t . '.opt_pipe') }}</option>
                <option value="custom">{{ __($t . '.opt_custom') }}</option>
            </select>
        </div>

        {{-- Custom Separator Input --}}
        <div id="custom-separator-container" class="hidden">
            <label for="custom-separator" class="block text-light-muted text-sm mb-2">{{ __($t . '.custom_sep_label') }}</label>
            <input type="text" id="custom-separator" class="w-full bg-transparent border border-gold/30 rounded-lg px-4 py-2 text-light placeholder-light-muted/50 focus:border-gold focus:outline-none" placeholder="{{ __($t . '.custom_sep_placeholder') }}">
        </div>
    </div>

    {{-- Checkboxes --}}
    <div class="mt-4 space-y-2">
        <label class="flex items-center gap-2 cursor-pointer text-light-muted hover:text-light transition-colors">
            <input type="checkbox" id="remove-empty-only" class="w-4 h-4 rounded border-gold/30 text-gold focus:ring-gold focus:ring-offset-0">
            <span class="text-sm">{{ __($t . '.opt_remove_empty_only') }}</span>
        </label>

        <label class="flex items-center gap-2 cursor-pointer text-light-muted hover:text-light transition-colors">
            <input type="checkbox" id="trim-lines" class="w-4 h-4 rounded border-gold/30 text-gold focus:ring-gold focus:ring-offset-0" checked>
            <span class="text-sm">{{ __($t . '.opt_trim_lines') }}</span>
        </label>

        <label class="flex items-center gap-2 cursor-pointer text-light-muted hover:text-light transition-colors">
            <input type="checkbox" id="preserve-paragraphs" class="w-4 h-4 rounded border-gold/30 text-gold focus:ring-gold focus:ring-offset-0">
            <span class="text-sm">{{ __($t . '.opt_preserve_paragraphs') }}</span>
        </label>
    </div>
</div>

{{-- Input/Output Grid --}}
<div class="grid md:grid-cols-2 gap-4 mb-6">
    {{-- Input --}}
    <div class="flex flex-col">
        <label for="text-input" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            {{ __($t . '.label_input') }}
        </label>
        <textarea id="text-input"
                  class="flex-1 bg-darkBg border border-gold/20 rounded-lg p-4 text-light font-mono text-sm placeholder-light-muted/50 resize-y focus:border-gold/50 focus:outline-none"
                  style="min-height: 400px;"
                  placeholder="{{ __($t . '.placeholder_input') }}"
                  spellcheck="false"></textarea>
    </div>

    {{-- Output --}}
    <div class="flex flex-col">
        <label for="text-output" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
            {{ __($t . '.label_output') }}
        </label>
        <textarea id="text-output"
                  class="flex-1 bg-darkBg border border-gold/20 rounded-lg p-4 text-light font-mono text-sm placeholder-light-muted/50 resize-y focus:border-gold/50 focus:outline-none"
                  style="min-height: 400px;"
                  placeholder="{{ __($t . '.placeholder_output') }}"
                  readonly
                  spellcheck="false"></textarea>
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-4">
    <button id="btn-remove" class="px-4 py-2 bg-gold text-darkBg rounded-lg hover:bg-gold/90 transition-all duration-300 font-medium flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        {{ __($t . '.btn_remove') }}
    </button>
    <button id="btn-copy" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.btn_copy') }}
    </button>
    <button id="btn-download" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
        {{ __($t . '.btn_download') }}
    </button>
    <button id="btn-sample" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.btn_sample') }}
    </button>
    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.btn_clear') }}
    </button>
</div>

{{-- Stats Bar --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
        <div id="stat-lines-before" class="text-2xl font-bold text-gold mb-1">0</div>
        <div class="text-light-muted text-xs">{{ __($t . '.stat_lines_before') }}</div>
    </div>
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
        <div id="stat-lines-after" class="text-2xl font-bold text-gold mb-1">0</div>
        <div class="text-light-muted text-xs">{{ __($t . '.stat_lines_after') }}</div>
    </div>
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
        <div id="stat-chars-before" class="text-2xl font-bold text-gold mb-1">0</div>
        <div class="text-light-muted text-xs">{{ __($t . '.stat_chars_before') }}</div>
    </div>
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
        <div id="stat-chars-after" class="text-2xl font-bold text-gold mb-1">0</div>
        <div class="text-light-muted text-xs">{{ __($t . '.stat_chars_after') }}</div>
    </div>
</div>

{{-- Success Notification --}}
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
