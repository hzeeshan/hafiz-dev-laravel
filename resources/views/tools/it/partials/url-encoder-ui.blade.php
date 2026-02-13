{{-- Mode Tabs --}}
<div class="flex gap-2 mb-4">
    <button id="tab-encode" class="tab-active px-6 py-2 font-semibold rounded-lg transition-all duration-300 cursor-pointer">
        {{ __($t . '.encode_tab') }}
    </button>
    <button id="tab-decode" class="tab-inactive px-6 py-2 font-semibold rounded-lg transition-all duration-300 cursor-pointer">
        {{ __($t . '.decode_tab') }}
    </button>
</div>

<style>
    .tab-active {
        background-color: #c9aa71 !important;
        color: #1e1e28 !important;
    }
    .tab-active:hover {
        background-color: #d4ba8e !important;
    }
    .tab-inactive {
        border: 1px solid rgba(201, 170, 113, 0.5);
        color: rgb(163 163 163);
    }
    .tab-inactive:hover {
        background-color: rgba(201, 170, 113, 0.1);
        color: #c9aa71;
    }
</style>

{{-- Encoding Type (only visible in encode mode) --}}
<div id="encoding-options" class="mb-4 p-4 bg-darkBg rounded-lg border border-gold/10">
    <label class="text-light font-semibold text-sm mb-3 block">{{ __($t . '.encoding_type') }}</label>
    <div class="flex flex-wrap gap-4">
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="radio" name="encoding-type" value="component" checked class="w-4 h-4 text-gold bg-darkBg border-gold/30 focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
            <span class="text-light-muted text-sm">{{ __($t . '.component_label') }} <span class="text-gold/70">{{ __($t . '.component_desc') }}</span></span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="radio" name="encoding-type" value="uri" class="w-4 h-4 text-gold bg-darkBg border-gold/30 focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
            <span class="text-light-muted text-sm">{{ __($t . '.uri_label') }} <span class="text-gold/70">{{ __($t . '.uri_desc') }}</span></span>
        </label>
    </div>
</div>

{{-- Toolbar --}}
<div class="flex flex-wrap gap-3 mb-4">
    {{-- Primary Action --}}
    <button id="btn-convert" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
        <span id="btn-convert-text">{{ __($t . '.encode_btn') }}</span>
    </button>

    <div class="h-8 w-px bg-gold/20 hidden sm:block"></div>

    {{-- Secondary Actions --}}
    <button id="btn-swap" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
        {{ __($t . '.swap') }}
    </button>
    <button id="btn-copy" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy') }}
    </button>
    <button id="btn-sample" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.sample') }}
    </button>
    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.clear') }}
    </button>
</div>

{{-- Status Bar --}}
<div id="status-bar" class="mb-4 p-3 rounded-lg bg-darkBg border border-gold/10 flex items-center justify-between">
    <div class="flex items-center gap-4 text-sm">
        <span class="text-light-muted">Status: <span id="status-text" class="text-gold">{{ __($t . '.status_ready') }}</span></span>
        <span class="text-light-muted">{{ __($t . '.input_label') }}: <span id="input-count" class="text-light">0</span> {{ __($t . '.chars') }}</span>
        <span class="text-light-muted">{{ __($t . '.output_label') }}: <span id="output-count" class="text-light">0</span> {{ __($t . '.chars') }}</span>
        <span id="chars-changed" class="text-light-muted hidden">{{ __($t . '.changed_label') }}: <span id="chars-changed-count" class="text-gold">0</span> {{ __($t . '.chars') }}</span>
    </div>
    <div id="keyboard-hint" class="text-light-muted text-xs hidden sm:block">
        <kbd class="px-2 py-1 bg-darkCard rounded text-gold">Ctrl</kbd> + <kbd class="px-2 py-1 bg-darkCard rounded text-gold">Enter</kbd> {{ __($t . '.keyboard_hint') }}
    </div>
</div>

{{-- Editor Area --}}
<div class="grid lg:grid-cols-2 gap-4">
    {{-- Input --}}
    <div class="flex flex-col">
        <label for="url-input" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            <span id="input-label">{{ __($t . '.input_label_encode') }}</span>
        </label>
        <textarea
            id="url-input"
            class="flex-1 min-h-[300px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
            placeholder="{{ __($t . '.input_placeholder_encode') }}"
            spellcheck="false"
        ></textarea>
    </div>

    {{-- Output --}}
    <div class="flex flex-col">
        <label for="url-output" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
            <span id="output-label">{{ __($t . '.output_label_encode') }}</span>
        </label>
        <textarea
            id="url-output"
            class="flex-1 min-h-[300px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
            placeholder="{{ __($t . '.output_placeholder') }}"
            readonly
        ></textarea>
    </div>
</div>

{{-- Error Display --}}
<div id="error-display" class="hidden mt-4 p-4 rounded-lg bg-red-500/10 border border-red-500/30">
    <div class="flex items-start gap-3">
        <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <div>
            <h4 class="text-red-400 font-semibold mb-1">{{ __($t . '.error_title') }}</h4>
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

{{-- Quick Reference: Common Encoded Characters --}}
<div class="mt-6 pt-6 border-t border-gold/10">
    <h2 class="text-xl font-bold text-light mb-4 flex items-center gap-2">
        <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
        {{ __($t . '.common_chars_title') }}
    </h2>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gold/20">
                    <th class="text-left py-2 px-3 text-gold font-semibold">{{ __($t . '.character') }}</th>
                    <th class="text-left py-2 px-3 text-gold font-semibold">{{ __($t . '.encoded') }}</th>
                    <th class="text-left py-2 px-3 text-gold font-semibold">{{ __($t . '.char_description') }}</th>
                </tr>
            </thead>
            <tbody class="text-light-muted">
                <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">({{ strtolower(__($t . '.space')) }})</td><td class="py-2 px-3 font-mono text-gold">%20</td><td class="py-2 px-3">{{ __($t . '.space') }}</td></tr>
                <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">!</td><td class="py-2 px-3 font-mono text-gold">%21</td><td class="py-2 px-3">{{ __($t . '.exclamation') }}</td></tr>
                <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">#</td><td class="py-2 px-3 font-mono text-gold">%23</td><td class="py-2 px-3">{{ __($t . '.hash') }}</td></tr>
                <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">$</td><td class="py-2 px-3 font-mono text-gold">%24</td><td class="py-2 px-3">{{ __($t . '.dollar') }}</td></tr>
                <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">&amp;</td><td class="py-2 px-3 font-mono text-gold">%26</td><td class="py-2 px-3">{{ __($t . '.ampersand') }}</td></tr>
                <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">'</td><td class="py-2 px-3 font-mono text-gold">%27</td><td class="py-2 px-3">{{ __($t . '.single_quote') }}</td></tr>
                <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">+</td><td class="py-2 px-3 font-mono text-gold">%2B</td><td class="py-2 px-3">{{ __($t . '.plus') }}</td></tr>
                <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">/</td><td class="py-2 px-3 font-mono text-gold">%2F</td><td class="py-2 px-3">{{ __($t . '.forward_slash') }}</td></tr>
                <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">:</td><td class="py-2 px-3 font-mono text-gold">%3A</td><td class="py-2 px-3">{{ __($t . '.colon') }}</td></tr>
                <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">=</td><td class="py-2 px-3 font-mono text-gold">%3D</td><td class="py-2 px-3">{{ __($t . '.equals') }}</td></tr>
                <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">?</td><td class="py-2 px-3 font-mono text-gold">%3F</td><td class="py-2 px-3">{{ __($t . '.question_mark') }}</td></tr>
                <tr><td class="py-2 px-3 font-mono">@</td><td class="py-2 px-3 font-mono text-gold">%40</td><td class="py-2 px-3">{{ __($t . '.at_sign') }}</td></tr>
            </tbody>
        </table>
    </div>
</div>
