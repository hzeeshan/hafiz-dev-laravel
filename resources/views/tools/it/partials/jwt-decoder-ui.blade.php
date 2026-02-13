{{-- JWT Input --}}
<div class="mb-6">
    <label for="jwt-input" class="text-light font-semibold mb-2 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
        {{ __($t . '.paste_jwt') }}
    </label>
    <textarea
        id="jwt-input"
        class="w-full min-h-[120px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
        placeholder="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."
        spellcheck="false"
    ></textarea>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-paste" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
        {{ __($t . '.paste') }}
    </button>
    <button id="btn-sample" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.load_sample') }}
    </button>
    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __('tools.clear') }}
    </button>
</div>

{{-- Error Display --}}
<div id="error-display" class="hidden mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/30">
    <div class="flex items-start gap-3">
        <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <div>
            <h4 class="text-red-400 font-semibold mb-1">{{ __($t . '.js_strings.invalid_jwt') }}</h4>
            <p id="error-message" class="text-red-300 text-sm"></p>
        </div>
    </div>
</div>

{{-- Decoded Output --}}
<div id="decoded-output" class="hidden space-y-4">
    {{-- Header Section --}}
    <div class="bg-darkBg rounded-lg border border-gold/20 overflow-hidden">
        <div class="flex items-center justify-between p-4 border-b border-gold/10">
            <div class="flex items-center gap-3">
                <h3 class="text-light font-semibold">{{ __($t . '.header') }}</h3>
                <span id="algorithm-badge" class="text-xs px-2 py-1 bg-purple-500/20 text-purple-400 rounded border border-purple-500/30 font-mono"></span>
            </div>
            <button id="btn-copy-header" class="px-3 py-1.5 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                {{ __($t . '.copy') }}
            </button>
        </div>
        <div class="p-4">
            <pre id="header-output" class="font-mono text-sm whitespace-pre-wrap break-words"></pre>
        </div>
    </div>

    {{-- Payload Section --}}
    <div class="bg-darkBg rounded-lg border border-gold/20 overflow-hidden">
        <div class="flex items-center justify-between p-4 border-b border-gold/10">
            <div class="flex items-center gap-3">
                <h3 class="text-light font-semibold">{{ __($t . '.payload') }}</h3>
                <span id="expiration-badge" class="hidden text-xs px-2 py-1 rounded border font-medium"></span>
            </div>
            <button id="btn-copy-payload" class="px-3 py-1.5 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                {{ __($t . '.copy') }}
            </button>
        </div>
        <div class="p-4">
            <pre id="payload-output" class="font-mono text-sm whitespace-pre-wrap break-words"></pre>
        </div>
    </div>

    {{-- Signature Section --}}
    <div class="bg-darkBg rounded-lg border border-gold/20 overflow-hidden">
        <div class="flex items-center justify-between p-4 border-b border-gold/10">
            <h3 class="text-light font-semibold">{{ __($t . '.signature') }}</h3>
        </div>
        <div class="p-4">
            <p id="signature-output" class="font-mono text-sm text-light-muted break-all"></p>
            <p class="text-xs text-light-muted/70 mt-2 flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ __($t . '.js_strings.signature_note') }}
            </p>
        </div>
    </div>
</div>

{{-- Placeholder --}}
<div id="placeholder" class="text-center py-12 text-light-muted">
    <svg class="w-16 h-16 mx-auto mb-4 text-gold/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
    <p>{{ __($t . '.js_strings.placeholder') }}</p>
</div>

{{-- Copy Notification --}}
<div id="copy-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span id="copy-message" class="text-green-400 text-sm"></span>
    </div>
</div>
