{{-- Generated Password Display --}}
<div class="mb-6">
    <label class="text-light font-semibold mb-3 block">{{ __($t . '.generated_password') }}</label>
    <div class="relative">
        <div class="bg-darkBg border border-gold/20 rounded-lg p-4 pr-24 min-h-[60px] flex items-center">
            <code id="password-display" class="text-light font-mono text-lg md:text-xl break-all select-all cursor-pointer" title="{{ __($t . '.copy_password') }}">
                {{ __($t . '.placeholder') }}
            </code>
        </div>
        <div class="absolute right-2 top-1/2 -translate-y-1/2 flex items-center gap-1">
            <button id="btn-toggle-visibility" class="p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" title="{{ __($t . '.toggle_visibility') }}">
                <svg id="icon-show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                <svg id="icon-hide" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
            </button>
            <button id="btn-copy-password" class="p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" title="{{ __($t . '.copy_password') }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
            </button>
        </div>
    </div>
</div>

{{-- Strength Meter --}}
<div class="mb-6">
    <div class="flex items-center justify-between mb-2">
        <span class="text-light-muted text-sm">{{ __($t . '.password_strength') }}</span>
        <span id="strength-label" class="text-sm font-semibold text-light-muted">-</span>
    </div>
    <div class="h-2 bg-darkBg rounded-full overflow-hidden border border-gold/10">
        <div id="strength-bar" class="h-full bg-gray-500 transition-all duration-300" style="width: 0%"></div>
    </div>
</div>

{{-- Length Slider --}}
<div class="mb-6">
    <div class="flex items-center justify-between mb-3">
        <label for="password-length" class="text-light font-semibold">{{ __($t . '.password_length') }}</label>
        <span id="length-display" class="text-gold font-mono text-lg font-bold">16</span>
    </div>
    <input type="range" id="password-length" min="8" max="128" value="16"
           class="w-full h-2 bg-darkBg rounded-lg appearance-none cursor-pointer accent-gold">
    <div class="flex justify-between text-xs text-light-muted mt-1">
        <span>8</span>
        <span>128</span>
    </div>
</div>

{{-- Character Options --}}
<div class="mb-6">
    <label class="text-light font-semibold mb-3 block">{{ __($t . '.character_types') }}</label>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
        <label class="flex items-center gap-2 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <input type="checkbox" id="opt-uppercase" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
            <span class="text-light text-sm">{{ __($t . '.uppercase') }}</span>
        </label>
        <label class="flex items-center gap-2 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <input type="checkbox" id="opt-lowercase" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
            <span class="text-light text-sm">{{ __($t . '.lowercase') }}</span>
        </label>
        <label class="flex items-center gap-2 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <input type="checkbox" id="opt-numbers" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
            <span class="text-light text-sm">{{ __($t . '.numbers') }}</span>
        </label>
        <label class="flex items-center gap-2 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <input type="checkbox" id="opt-symbols" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
            <span class="text-light text-sm">{{ __($t . '.symbols') }}</span>
        </label>
    </div>
</div>

{{-- Exclude Similar Characters --}}
<div class="mb-6">
    <label class="flex items-center gap-3 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer w-fit">
        <input type="checkbox" id="opt-exclude-similar" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
        <div>
            <span class="text-light text-sm">{{ __($t . '.exclude_similar') }}</span>
            <span class="text-light-muted text-xs block">{{ __($t . '.exclude_similar_desc') }}</span>
        </div>
    </label>
</div>

{{-- Generate Button --}}
<div class="mb-6">
    <button id="btn-generate" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
        {{ __($t . '.generate_password') }}
    </button>
</div>

{{-- Bulk Generation Section --}}
<div class="border-t border-gold/10 pt-6">
    <div class="flex flex-wrap items-center gap-4 mb-4">
        <label class="text-light font-semibold">{{ __($t . '.bulk_generation') }}</label>
        <div class="flex items-center gap-2">
            <select id="bulk-quantity" class="bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-2 text-sm focus:border-gold focus:outline-none cursor-pointer">
                <option value="5">{{ __($t . '.passwords_5') }}</option>
                <option value="10">{{ __($t . '.passwords_10') }}</option>
                <option value="25">{{ __($t . '.passwords_25') }}</option>
            </select>
            <button id="btn-bulk-generate" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 cursor-pointer text-sm font-semibold">
                {{ __($t . '.generate_bulk') }}
            </button>
        </div>
    </div>

    {{-- Bulk Output --}}
    <div id="bulk-container" class="hidden">
        <div class="bg-darkBg border border-gold/20 rounded-lg p-4 max-h-[300px] overflow-y-auto mb-4">
            <div id="bulk-list" class="space-y-1 font-mono text-sm"></div>
        </div>
        <div class="flex flex-wrap gap-3">
            <button id="btn-copy-all" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                {{ __($t . '.copy_all') }}
            </button>
            <button id="btn-download" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                {{ __($t . '.download_txt') }}
            </button>
            <button id="btn-clear-bulk" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                {{ __('tools.clear') }}
            </button>
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
