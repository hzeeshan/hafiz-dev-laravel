<div class="grid lg:grid-cols-2 gap-8">
    {{-- Left Column: Input & Color Preview --}}
    <div>
        {{-- Hex Input --}}
        <div class="mb-6">
            <label for="hex-input" class="text-light font-semibold mb-2 block">{{ __($t . '.hex_color_code') }}</label>
            <div class="flex gap-3">
                <div class="relative flex-1">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-light-muted text-lg font-mono">#</span>
                    <input
                        type="text"
                        id="hex-input"
                        class="w-full bg-darkBg border border-gold/20 rounded-lg pl-8 pr-4 py-3 font-mono text-lg text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 uppercase"
                        placeholder="FF5733"
                        maxlength="8"
                        value="FF5733"
                        spellcheck="false"
                    >
                </div>
                <input
                    type="color"
                    id="color-picker"
                    class="w-14 h-12 rounded-lg border border-gold/20 cursor-pointer bg-transparent"
                    value="#FF5733"
                    title="{{ __($t . '.pick_color') }}"
                >
            </div>
        </div>

        {{-- Color Preview --}}
        <div class="mb-6">
            <label class="text-light font-semibold mb-2 block">{{ __($t . '.color_preview') }}</label>
            <div id="color-preview" class="w-full h-40 rounded-xl border border-gold/10 shadow-inner transition-colors duration-300" style="background-color: #FF5733;"></div>
        </div>

        {{-- RGB Sliders --}}
        <div class="space-y-4">
            <div>
                <div class="flex justify-between mb-1">
                    <label for="slider-r" class="text-sm font-semibold text-red-400">{{ __($t . '.red') }}</label>
                    <input type="number" id="val-r" class="w-16 bg-darkBg border border-gold/10 rounded px-2 py-0.5 text-sm text-light text-center font-mono focus:border-gold focus:outline-none" min="0" max="255" value="255">
                </div>
                <input type="range" id="slider-r" min="0" max="255" value="255" class="w-full h-2 rounded-full appearance-none cursor-pointer accent-red-500" style="background: linear-gradient(to right, #000 0%, #ff0000 100%);">
            </div>
            <div>
                <div class="flex justify-between mb-1">
                    <label for="slider-g" class="text-sm font-semibold text-green-400">{{ __($t . '.green') }}</label>
                    <input type="number" id="val-g" class="w-16 bg-darkBg border border-gold/10 rounded px-2 py-0.5 text-sm text-light text-center font-mono focus:border-gold focus:outline-none" min="0" max="255" value="87">
                </div>
                <input type="range" id="slider-g" min="0" max="255" value="87" class="w-full h-2 rounded-full appearance-none cursor-pointer accent-green-500" style="background: linear-gradient(to right, #000 0%, #00ff00 100%);">
            </div>
            <div>
                <div class="flex justify-between mb-1">
                    <label for="slider-b" class="text-sm font-semibold text-blue-400">{{ __($t . '.blue') }}</label>
                    <input type="number" id="val-b" class="w-16 bg-darkBg border border-gold/10 rounded px-2 py-0.5 text-sm text-light text-center font-mono focus:border-gold focus:outline-none" min="0" max="255" value="51">
                </div>
                <input type="range" id="slider-b" min="0" max="255" value="51" class="w-full h-2 rounded-full appearance-none cursor-pointer accent-blue-500" style="background: linear-gradient(to right, #000 0%, #0000ff 100%);">
            </div>
            <div>
                <div class="flex justify-between mb-1">
                    <label for="slider-a" class="text-sm font-semibold text-light-muted">{{ __($t . '.alpha') }}</label>
                    <input type="number" id="val-a" class="w-16 bg-darkBg border border-gold/10 rounded px-2 py-0.5 text-sm text-light text-center font-mono focus:border-gold focus:outline-none" min="0" max="1" step="0.01" value="1">
                </div>
                <input type="range" id="slider-a" min="0" max="100" value="100" class="w-full h-2 rounded-full appearance-none cursor-pointer accent-gray-400" style="background: linear-gradient(to right, transparent 0%, #888 100%);">
            </div>
        </div>
    </div>

    {{-- Right Column: Output Values --}}
    <div>
        {{-- Color Values --}}
        <div class="space-y-3">
            {{-- RGB --}}
            <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                <div class="flex items-center justify-between mb-1">
                    <span class="text-sm font-semibold text-gold">RGB</span>
                    <button class="copy-btn text-light-muted hover:text-gold transition-colors text-xs flex items-center gap-1 cursor-pointer" data-target="out-rgb">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        {{ __($t . '.copy') }}
                    </button>
                </div>
                <code id="out-rgb" class="text-light font-mono text-base">rgb(255, 87, 51)</code>
            </div>

            {{-- RGBA --}}
            <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                <div class="flex items-center justify-between mb-1">
                    <span class="text-sm font-semibold text-gold">RGBA</span>
                    <button class="copy-btn text-light-muted hover:text-gold transition-colors text-xs flex items-center gap-1 cursor-pointer" data-target="out-rgba">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        {{ __($t . '.copy') }}
                    </button>
                </div>
                <code id="out-rgba" class="text-light font-mono text-base">rgba(255, 87, 51, 1)</code>
            </div>

            {{-- HEX --}}
            <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                <div class="flex items-center justify-between mb-1">
                    <span class="text-sm font-semibold text-gold">HEX</span>
                    <button class="copy-btn text-light-muted hover:text-gold transition-colors text-xs flex items-center gap-1 cursor-pointer" data-target="out-hex">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        {{ __($t . '.copy') }}
                    </button>
                </div>
                <code id="out-hex" class="text-light font-mono text-base">#FF5733</code>
            </div>

            {{-- HSL --}}
            <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                <div class="flex items-center justify-between mb-1">
                    <span class="text-sm font-semibold text-gold">HSL</span>
                    <button class="copy-btn text-light-muted hover:text-gold transition-colors text-xs flex items-center gap-1 cursor-pointer" data-target="out-hsl">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        {{ __($t . '.copy') }}
                    </button>
                </div>
                <code id="out-hsl" class="text-light font-mono text-base">hsl(11, 100%, 60%)</code>
            </div>

            {{-- HSLA --}}
            <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                <div class="flex items-center justify-between mb-1">
                    <span class="text-sm font-semibold text-gold">HSLA</span>
                    <button class="copy-btn text-light-muted hover:text-gold transition-colors text-xs flex items-center gap-1 cursor-pointer" data-target="out-hsla">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        {{ __($t . '.copy') }}
                    </button>
                </div>
                <code id="out-hsla" class="text-light font-mono text-base">hsla(11, 100%, 60%, 1)</code>
            </div>

            {{-- CMYK --}}
            <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                <div class="flex items-center justify-between mb-1">
                    <span class="text-sm font-semibold text-gold">CMYK</span>
                    <button class="copy-btn text-light-muted hover:text-gold transition-colors text-xs flex items-center gap-1 cursor-pointer" data-target="out-cmyk">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        {{ __($t . '.copy') }}
                    </button>
                </div>
                <code id="out-cmyk" class="text-light font-mono text-base">cmyk(0%, 66%, 80%, 0%)</code>
            </div>

            {{-- CSS Variable --}}
            <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                <div class="flex items-center justify-between mb-1">
                    <span class="text-sm font-semibold text-gold">{{ __($t . '.css_variable') }}</span>
                    <button class="copy-btn text-light-muted hover:text-gold transition-colors text-xs flex items-center gap-1 cursor-pointer" data-target="out-css">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        {{ __($t . '.copy') }}
                    </button>
                </div>
                <code id="out-css" class="text-light font-mono text-base">--color-primary: #FF5733;</code>
            </div>
        </div>
    </div>
</div>

{{-- Preset Colors --}}
<div class="mt-8 pt-6 border-t border-gold/10">
    <h3 class="text-light font-semibold mb-3 text-sm">{{ __($t . '.quick_presets') }}</h3>
    <div class="flex flex-wrap gap-2" id="presets">
        <button class="preset-btn w-10 h-10 rounded-lg border-2 border-transparent hover:border-gold/50 transition-all cursor-pointer hover:scale-110" data-hex="FF0000" style="background:#FF0000" title="#FF0000 Red"></button>
        <button class="preset-btn w-10 h-10 rounded-lg border-2 border-transparent hover:border-gold/50 transition-all cursor-pointer hover:scale-110" data-hex="FF5733" style="background:#FF5733" title="#FF5733 Orange Red"></button>
        <button class="preset-btn w-10 h-10 rounded-lg border-2 border-transparent hover:border-gold/50 transition-all cursor-pointer hover:scale-110" data-hex="FFC300" style="background:#FFC300" title="#FFC300 Gold"></button>
        <button class="preset-btn w-10 h-10 rounded-lg border-2 border-transparent hover:border-gold/50 transition-all cursor-pointer hover:scale-110" data-hex="28B463" style="background:#28B463" title="#28B463 Green"></button>
        <button class="preset-btn w-10 h-10 rounded-lg border-2 border-transparent hover:border-gold/50 transition-all cursor-pointer hover:scale-110" data-hex="3498DB" style="background:#3498DB" title="#3498DB Blue"></button>
        <button class="preset-btn w-10 h-10 rounded-lg border-2 border-transparent hover:border-gold/50 transition-all cursor-pointer hover:scale-110" data-hex="8E44AD" style="background:#8E44AD" title="#8E44AD Purple"></button>
        <button class="preset-btn w-10 h-10 rounded-lg border-2 border-transparent hover:border-gold/50 transition-all cursor-pointer hover:scale-110" data-hex="1ABC9C" style="background:#1ABC9C" title="#1ABC9C Teal"></button>
        <button class="preset-btn w-10 h-10 rounded-lg border-2 border-transparent hover:border-gold/50 transition-all cursor-pointer hover:scale-110" data-hex="E74C3C" style="background:#E74C3C" title="#E74C3C Alizarin"></button>
        <button class="preset-btn w-10 h-10 rounded-lg border-2 border-transparent hover:border-gold/50 transition-all cursor-pointer hover:scale-110" data-hex="2C3E50" style="background:#2C3E50" title="#2C3E50 Dark Blue"></button>
        <button class="preset-btn w-10 h-10 rounded-lg border-2 border-transparent hover:border-gold/50 transition-all cursor-pointer hover:scale-110" data-hex="ECF0F1" style="background:#ECF0F1" title="#ECF0F1 Cloud"></button>
        <button class="preset-btn w-10 h-10 rounded-lg border-2 border-transparent hover:border-gold/50 transition-all cursor-pointer hover:scale-110" data-hex="000000" style="background:#000000" title="#000000 Black"></button>
        <button class="preset-btn w-10 h-10 rounded-lg border-2 border-transparent hover:border-gold/50 transition-all cursor-pointer hover:scale-110" data-hex="FFFFFF" style="background:#FFFFFF" title="#FFFFFF White"></button>
    </div>
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
