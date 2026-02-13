{{-- Toolbar --}}
<div class="flex flex-wrap gap-3 mb-4">
    {{-- Primary Actions --}}
    <button id="btn-format" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
        {{ __($t . '.format') }}
    </button>
    <button id="btn-minify" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        {{ __($t . '.minify') }}
    </button>
    <button id="btn-validate" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        {{ __($t . '.validate') }}
    </button>

    <div class="h-8 w-px bg-gold/20 hidden sm:block"></div>

    {{-- Secondary Actions --}}
    <button id="btn-copy" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy') }}
    </button>
    <button id="btn-download" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
        {{ __($t . '.download') }}
    </button>
    <button id="btn-sample" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.sample') }}
    </button>
    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.clear') }}
    </button>

    <div class="h-8 w-px bg-gold/20 hidden sm:block"></div>

    {{-- Settings --}}
    <div class="flex items-center gap-2">
        <label for="indent-select" class="text-light-muted text-sm">{{ __($t . '.indent') }}</label>
        <select id="indent-select" class="bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-2 text-sm focus:border-gold focus:outline-none">
            <option value="2">{{ __($t . '.spaces_2') }}</option>
            <option value="4" selected>{{ __($t . '.spaces_4') }}</option>
            <option value="tab">{{ __($t . '.tab') }}</option>
        </select>
    </div>

    <label class="flex items-center gap-2 cursor-pointer ml-auto">
        <input type="checkbox" id="realtime-toggle" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
        <span class="text-light-muted text-sm">{{ __($t . '.realtime_validation') }}</span>
    </label>
</div>

{{-- Status Bar --}}
<div id="status-bar" class="mb-4 p-3 rounded-lg bg-darkBg border border-gold/10 flex items-center justify-between">
    <div class="flex items-center gap-4 text-sm">
        <span class="text-light-muted">{{ __($t . '.status') }} <span id="status-text" class="text-gold">{{ __($t . '.ready') }}</span></span>
        <span class="text-light-muted">{{ __($t . '.lines') }} <span id="line-count" class="text-light">0</span></span>
        <span class="text-light-muted">{{ __($t . '.size') }} <span id="file-size" class="text-light">0 B</span></span>
    </div>
    <div id="keyboard-hint" class="text-light-muted text-xs hidden sm:block">
        <kbd class="px-2 py-1 bg-darkCard rounded text-gold">Ctrl</kbd> + <kbd class="px-2 py-1 bg-darkCard rounded text-gold">Enter</kbd> {{ __($t . '.ctrl_enter_hint') }}
    </div>
</div>

{{-- Editor Area --}}
<div class="grid lg:grid-cols-2 gap-4">
    {{-- Input --}}
    <div class="flex flex-col">
        <label for="json-input" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            {{ __($t . '.input') }}
        </label>
        <textarea
            id="json-input"
            class="flex-1 min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
            placeholder="{{ __($t . '.input_placeholder') }}"
            spellcheck="false"
        ></textarea>
    </div>

    {{-- Output --}}
    <div class="flex flex-col">
        <label class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
            {{ __($t . '.output') }}
        </label>
        <div id="json-output" class="flex-1 min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm overflow-auto">
            <pre id="output-pre" class="whitespace-pre-wrap break-words"><code id="output-code" class="text-light-muted">{{ __($t . '.output_placeholder') }}</code></pre>
        </div>
    </div>
</div>

{{-- Error Display --}}
<div id="error-display" class="hidden mt-4 p-4 rounded-lg bg-red-500/10 border border-red-500/30">
    <div class="flex items-start gap-3">
        <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <div>
            <h4 class="text-red-400 font-semibold mb-1">{{ __($t . '.json_error') }}</h4>
            <p id="error-message" class="text-red-300 text-sm font-mono"></p>
        </div>
    </div>
</div>

{{-- Success Display --}}
<div id="success-display" class="hidden mt-4 p-4 rounded-lg bg-green-500/10 border border-green-500/30">
    <div class="flex items-center gap-3">
        <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <p id="success-message" class="text-green-400 text-sm font-semibold"></p>
    </div>
</div>
