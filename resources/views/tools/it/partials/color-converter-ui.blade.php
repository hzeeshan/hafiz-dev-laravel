<div class="grid lg:grid-cols-2 gap-8">
    {{-- Left Side: Color Preview & Picker --}}
    <div>
        <label class="text-light font-semibold mb-3 block">{{ __($t . '.color_preview') }}</label>

        {{-- Color Preview Box --}}
        <div id="color-preview" class="w-full h-40 rounded-lg border-2 border-gold/30 mb-4 transition-colors duration-200" style="background-color: #D4AF37;"></div>

        {{-- Color Picker & Random Button --}}
        <div class="flex items-center gap-4 mb-6">
            <div class="flex-1">
                <label class="text-light-muted text-sm mb-2 block">{{ __($t . '.color_picker') }}</label>
                <input type="color" id="color-picker" value="#D4AF37" class="w-full h-12 rounded-lg cursor-pointer border border-gold/30 bg-darkBg">
            </div>
            <div>
                <label class="text-light-muted text-sm mb-2 block">&nbsp;</label>
                <button id="btn-random" class="px-4 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    {{ __($t . '.random') }}
                </button>
            </div>
        </div>

        {{-- Complementary Color --}}
        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
            <label class="text-light font-semibold mb-3 block">{{ __($t . '.complementary_color') }}</label>
            <div class="flex items-center gap-4">
                <div id="complementary-preview" class="w-16 h-16 rounded-lg border border-gold/30 cursor-pointer transition-colors duration-200" style="background-color: #2B50C8;" title="Click to use this color"></div>
                <div>
                    <code id="complementary-hex" class="text-light font-mono text-lg">#2B50C8</code>
                    <p class="text-light-muted text-sm mt-1">{{ __($t . '.opposite_on_wheel') }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Side: Color Format Inputs --}}
    <div>
        <label class="text-light font-semibold mb-3 block">{{ __($t . '.color_formats') }}</label>

        {{-- HEX Input --}}
        <div class="mb-4">
            <label class="text-light-muted text-sm mb-2 block">HEX</label>
            <div class="flex items-center gap-2">
                <div class="flex-1 flex items-center bg-darkBg border border-gold/20 rounded-lg overflow-hidden">
                    <span class="px-3 text-light-muted font-mono">#</span>
                    <input type="text" id="input-hex" value="D4AF37" maxlength="6" class="flex-1 bg-transparent text-light font-mono py-3 pr-3 focus:outline-none" placeholder="RRGGBB">
                </div>
                <button class="copy-btn p-3 text-light-muted hover:text-gold transition-colors cursor-pointer border border-gold/20 rounded-lg hover:border-gold/40" data-target="hex" title="{{ __($t . '.copy_hex') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
            </div>
        </div>

        {{-- RGB Input --}}
        <div class="mb-4">
            <label class="text-light-muted text-sm mb-2 block">RGB</label>
            <div class="flex items-center gap-2">
                <div class="flex-1 flex items-center bg-darkBg border border-gold/20 rounded-lg overflow-hidden">
                    <span class="px-3 text-light-muted font-mono text-sm">rgb(</span>
                    <input type="number" id="input-r" value="212" min="0" max="255" class="w-16 bg-transparent text-light font-mono py-3 text-center focus:outline-none" placeholder="R">
                    <span class="text-light-muted">,</span>
                    <input type="number" id="input-g" value="175" min="0" max="255" class="w-16 bg-transparent text-light font-mono py-3 text-center focus:outline-none" placeholder="G">
                    <span class="text-light-muted">,</span>
                    <input type="number" id="input-b" value="55" min="0" max="255" class="w-16 bg-transparent text-light font-mono py-3 text-center focus:outline-none" placeholder="B">
                    <span class="px-3 text-light-muted font-mono text-sm">)</span>
                </div>
                <button class="copy-btn p-3 text-light-muted hover:text-gold transition-colors cursor-pointer border border-gold/20 rounded-lg hover:border-gold/40" data-target="rgb" title="{{ __($t . '.copy_rgb') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
            </div>
        </div>

        {{-- RGBA Input --}}
        <div class="mb-4">
            <label class="text-light-muted text-sm mb-2 block">RGBA</label>
            <div class="flex items-center gap-2">
                <div class="flex-1 flex items-center bg-darkBg border border-gold/20 rounded-lg overflow-hidden">
                    <span class="px-2 text-light-muted font-mono text-sm">rgba(</span>
                    <input type="number" id="input-ra" value="212" min="0" max="255" class="w-14 bg-transparent text-light font-mono py-3 text-center focus:outline-none" placeholder="R">
                    <span class="text-light-muted">,</span>
                    <input type="number" id="input-ga" value="175" min="0" max="255" class="w-14 bg-transparent text-light font-mono py-3 text-center focus:outline-none" placeholder="G">
                    <span class="text-light-muted">,</span>
                    <input type="number" id="input-ba" value="55" min="0" max="255" class="w-14 bg-transparent text-light font-mono py-3 text-center focus:outline-none" placeholder="B">
                    <span class="text-light-muted">,</span>
                    <input type="number" id="input-alpha" value="1" min="0" max="1" step="0.1" class="w-14 bg-transparent text-light font-mono py-3 text-center focus:outline-none" placeholder="A">
                    <span class="px-2 text-light-muted font-mono text-sm">)</span>
                </div>
                <button class="copy-btn p-3 text-light-muted hover:text-gold transition-colors cursor-pointer border border-gold/20 rounded-lg hover:border-gold/40" data-target="rgba" title="{{ __($t . '.copy_rgba') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
            </div>
        </div>

        {{-- HSL Input --}}
        <div class="mb-4">
            <label class="text-light-muted text-sm mb-2 block">HSL</label>
            <div class="flex items-center gap-2">
                <div class="flex-1 flex items-center bg-darkBg border border-gold/20 rounded-lg overflow-hidden">
                    <span class="px-3 text-light-muted font-mono text-sm">hsl(</span>
                    <input type="number" id="input-h" value="46" min="0" max="360" class="w-14 bg-transparent text-light font-mono py-3 text-center focus:outline-none" placeholder="H">
                    <span class="text-light-muted">°,</span>
                    <input type="number" id="input-s" value="64" min="0" max="100" class="w-14 bg-transparent text-light font-mono py-3 text-center focus:outline-none" placeholder="S">
                    <span class="text-light-muted">%,</span>
                    <input type="number" id="input-l" value="52" min="0" max="100" class="w-14 bg-transparent text-light font-mono py-3 text-center focus:outline-none" placeholder="L">
                    <span class="px-3 text-light-muted font-mono text-sm">%)</span>
                </div>
                <button class="copy-btn p-3 text-light-muted hover:text-gold transition-colors cursor-pointer border border-gold/20 rounded-lg hover:border-gold/40" data-target="hsl" title="{{ __($t . '.copy_hsl') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
            </div>
        </div>

        {{-- HSLA Input --}}
        <div class="mb-4">
            <label class="text-light-muted text-sm mb-2 block">HSLA</label>
            <div class="flex items-center gap-2">
                <div class="flex-1 flex items-center bg-darkBg border border-gold/20 rounded-lg overflow-hidden">
                    <span class="px-2 text-light-muted font-mono text-sm">hsla(</span>
                    <input type="number" id="input-ha" value="46" min="0" max="360" class="w-12 bg-transparent text-light font-mono py-3 text-center focus:outline-none" placeholder="H">
                    <span class="text-light-muted">°,</span>
                    <input type="number" id="input-sa" value="64" min="0" max="100" class="w-12 bg-transparent text-light font-mono py-3 text-center focus:outline-none" placeholder="S">
                    <span class="text-light-muted">%,</span>
                    <input type="number" id="input-la" value="52" min="0" max="100" class="w-12 bg-transparent text-light font-mono py-3 text-center focus:outline-none" placeholder="L">
                    <span class="text-light-muted">%,</span>
                    <input type="number" id="input-alpha-hsl" value="1" min="0" max="1" step="0.1" class="w-12 bg-transparent text-light font-mono py-3 text-center focus:outline-none" placeholder="A">
                    <span class="px-2 text-light-muted font-mono text-sm">)</span>
                </div>
                <button class="copy-btn p-3 text-light-muted hover:text-gold transition-colors cursor-pointer border border-gold/20 rounded-lg hover:border-gold/40" data-target="hsla" title="{{ __($t . '.copy_hsla') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Contrast Checker Section --}}
<div class="border-t border-gold/10 mt-6 pt-6">
    <label class="text-light font-semibold mb-4 block">{{ __($t . '.contrast_checker') }}</label>
    <div class="grid md:grid-cols-2 gap-4">
        {{-- White Text Contrast --}}
        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
            <div class="flex items-center justify-between mb-3">
                <span class="text-light-muted">{{ __($t . '.white_text') }}</span>
                <span id="contrast-white-ratio" class="text-light font-mono font-bold">4.23:1</span>
            </div>
            <div id="contrast-white-preview" class="rounded-lg p-4 mb-3 text-center transition-colors duration-200" style="background-color: #D4AF37;">
                <span class="text-white font-semibold text-lg">{{ __($t . '.sample_text') }}</span>
            </div>
            <div class="flex gap-2">
                <span id="wcag-white-aa" class="px-2 py-1 text-xs rounded font-semibold bg-red-500/20 text-red-400 border border-red-500/30">AA: Fail</span>
                <span id="wcag-white-aaa" class="px-2 py-1 text-xs rounded font-semibold bg-red-500/20 text-red-400 border border-red-500/30">AAA: Fail</span>
            </div>
        </div>

        {{-- Black Text Contrast --}}
        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
            <div class="flex items-center justify-between mb-3">
                <span class="text-light-muted">{{ __($t . '.black_text') }}</span>
                <span id="contrast-black-ratio" class="text-light font-mono font-bold">4.97:1</span>
            </div>
            <div id="contrast-black-preview" class="rounded-lg p-4 mb-3 text-center transition-colors duration-200" style="background-color: #D4AF37;">
                <span class="text-black font-semibold text-lg">{{ __($t . '.sample_text') }}</span>
            </div>
            <div class="flex gap-2">
                <span id="wcag-black-aa" class="px-2 py-1 text-xs rounded font-semibold bg-green-500/20 text-green-400 border border-green-500/30">AA: Pass</span>
                <span id="wcag-black-aaa" class="px-2 py-1 text-xs rounded font-semibold bg-red-500/20 text-red-400 border border-red-500/30">AAA: Fail</span>
            </div>
        </div>
    </div>
</div>

{{-- Color History Section --}}
<div class="border-t border-gold/10 mt-6 pt-6">
    <div class="flex items-center justify-between mb-4">
        <label class="text-light font-semibold">{{ __($t . '.color_history') }}</label>
        <button id="btn-clear-history" class="text-light-muted hover:text-gold text-sm transition-colors cursor-pointer">{{ __($t . '.clear') }}</button>
    </div>
    <div id="color-history" class="flex flex-wrap gap-2">
        <span class="text-light-muted text-sm">{{ __($t . '.no_history') }}</span>
    </div>
</div>

{{-- Success/Copy Notification --}}
<div id="copy-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span id="copy-message" class="text-green-400 text-sm"></span>
    </div>
</div>
