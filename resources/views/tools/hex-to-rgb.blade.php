<x-layout>
    <x-slot:title>Hex to RGB Converter - Convert Hex Color to RGB Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online Hex to RGB converter. Convert hex color codes to RGB, HSL, and CMYK values instantly. Live color preview, color picker, and CSS code generation. 100% client-side.</x-slot:description>
    <x-slot:keywords>hex to rgb, hex to rgb converter, convert hex to rgb, hex color to rgb, hex to rgba, color converter, hex to hsl</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/hex-to-rgb') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Hex to RGB Converter - Convert Hex Color to RGB Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online Hex to RGB converter. Convert hex color codes to RGB, HSL, and CMYK instantly with live preview and CSS code generation.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/hex-to-rgb') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Hex to RGB Converter",
            "description": "Free online Hex to RGB converter. Convert hex color codes to RGB, HSL, and CMYK values instantly with live color preview.",
            "url": "https://hafiz.dev/tools/hex-to-rgb",
            "applicationCategory": "DeveloperApplication",
            "operatingSystem": "Any",
            "offers": {
                "@@type": "Offer",
                "price": "0",
                "priceCurrency": "USD"
            },
            "author": {
                "@@type": "Person",
                "name": "Hafiz Riaz",
                "url": "https://hafiz.dev"
            }
        }
        </script>

        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "BreadcrumbList",
            "itemListElement": [
                {
                    "@@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "https://hafiz.dev"
                },
                {
                    "@@type": "ListItem",
                    "position": 2,
                    "name": "Tools",
                    "item": "https://hafiz.dev/tools"
                },
                {
                    "@@type": "ListItem",
                    "position": 3,
                    "name": "Hex to RGB Converter",
                    "item": "https://hafiz.dev/tools/hex-to-rgb"
                }
            ]
        }
        </script>

        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "FAQPage",
            "mainEntity": [
                {
                    "@@type": "Question",
                    "name": "How do I convert hex to RGB?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Enter your hex color code (e.g., #FF5733) and the tool instantly converts it to RGB values (e.g., rgb(255, 87, 51)). It also provides HSL and CMYK values along with ready-to-use CSS code."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between hex and RGB colors?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Hex colors use a 6-digit hexadecimal format (#RRGGBB) where each pair represents Red, Green, and Blue values from 00 to FF. RGB uses decimal values from 0 to 255 for each channel. Both represent the same colors, just in different formats."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I convert RGB back to hex?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! This tool works both ways. You can enter RGB values using the sliders or input fields and see the corresponding hex code instantly. The conversion is bidirectional."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the hex code for white and black?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "White is #FFFFFF in hex or rgb(255, 255, 255). Black is #000000 in hex or rgb(0, 0, 0). These represent the maximum and minimum values for all three color channels."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does the converter support alpha transparency?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, you can adjust the alpha (opacity) slider to generate RGBA and HSLA values with transparency. The hex output also supports 8-digit hex codes (#RRGGBBAA) when alpha is less than 1."
                    }
                }
            ]
        }
        </script>
    @endpush

    <div class="relative z-10 py-12 px-4">
        <div class="max-w-7xl mx-auto">
            {{-- Breadcrumb --}}
            <nav class="mb-6 text-sm" aria-label="Breadcrumb">
                <ol class="flex items-center gap-2 text-light-muted">
                    <li><a href="/" class="hover:text-gold transition-colors">Home</a></li>
                    <li><span class="text-gold/50">/</span></li>
                    <li><a href="/tools" class="hover:text-gold transition-colors">Tools</a></li>
                    <li><span class="text-gold/50">/</span></li>
                    <li class="text-gold">Hex to RGB Converter</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Hex to RGB Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert hex color codes to RGB, HSL, and CMYK values instantly. Live color preview, adjustable sliders, and ready-to-use CSS code.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                <div class="grid lg:grid-cols-2 gap-8">
                    {{-- Left Column: Input & Color Preview --}}
                    <div>
                        {{-- Hex Input --}}
                        <div class="mb-6">
                            <label for="hex-input" class="text-light font-semibold mb-2 block">Hex Color Code</label>
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
                                    title="Pick a color"
                                >
                            </div>
                        </div>

                        {{-- Color Preview --}}
                        <div class="mb-6">
                            <label class="text-light font-semibold mb-2 block">Color Preview</label>
                            <div id="color-preview" class="w-full h-40 rounded-xl border border-gold/10 shadow-inner transition-colors duration-300" style="background-color: #FF5733;"></div>
                        </div>

                        {{-- RGB Sliders --}}
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <label for="slider-r" class="text-sm font-semibold text-red-400">Red</label>
                                    <input type="number" id="val-r" class="w-16 bg-darkBg border border-gold/10 rounded px-2 py-0.5 text-sm text-light text-center font-mono focus:border-gold focus:outline-none" min="0" max="255" value="255">
                                </div>
                                <input type="range" id="slider-r" min="0" max="255" value="255" class="w-full h-2 rounded-full appearance-none cursor-pointer accent-red-500" style="background: linear-gradient(to right, #000 0%, #ff0000 100%);">
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <label for="slider-g" class="text-sm font-semibold text-green-400">Green</label>
                                    <input type="number" id="val-g" class="w-16 bg-darkBg border border-gold/10 rounded px-2 py-0.5 text-sm text-light text-center font-mono focus:border-gold focus:outline-none" min="0" max="255" value="87">
                                </div>
                                <input type="range" id="slider-g" min="0" max="255" value="87" class="w-full h-2 rounded-full appearance-none cursor-pointer accent-green-500" style="background: linear-gradient(to right, #000 0%, #00ff00 100%);">
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <label for="slider-b" class="text-sm font-semibold text-blue-400">Blue</label>
                                    <input type="number" id="val-b" class="w-16 bg-darkBg border border-gold/10 rounded px-2 py-0.5 text-sm text-light text-center font-mono focus:border-gold focus:outline-none" min="0" max="255" value="51">
                                </div>
                                <input type="range" id="slider-b" min="0" max="255" value="51" class="w-full h-2 rounded-full appearance-none cursor-pointer accent-blue-500" style="background: linear-gradient(to right, #000 0%, #0000ff 100%);">
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <label for="slider-a" class="text-sm font-semibold text-light-muted">Alpha</label>
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
                                        Copy
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
                                        Copy
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
                                        Copy
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
                                        Copy
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
                                        Copy
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
                                        Copy
                                    </button>
                                </div>
                                <code id="out-cmyk" class="text-light font-mono text-base">cmyk(0%, 66%, 80%, 0%)</code>
                            </div>

                            {{-- CSS Variable --}}
                            <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                                <div class="flex items-center justify-between mb-1">
                                    <span class="text-sm font-semibold text-gold">CSS Variable</span>
                                    <button class="copy-btn text-light-muted hover:text-gold transition-colors text-xs flex items-center gap-1 cursor-pointer" data-target="out-css">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                        Copy
                                    </button>
                                </div>
                                <code id="out-css" class="text-light font-mono text-base">--color-primary: #FF5733;</code>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Preset Colors --}}
                <div class="mt-8 pt-6 border-t border-gold/10">
                    <h3 class="text-light font-semibold mb-3 text-sm">Quick Presets</h3>
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
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Live Preview</h3>
                    <p class="text-light-muted text-sm">See your color update in real-time as you type hex codes or adjust RGB sliders. Includes a native color picker for visual selection.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Multiple Formats</h3>
                    <p class="text-light-muted text-sm">Convert between HEX, RGB, RGBA, HSL, HSLA, and CMYK color formats. One-click copy for any format you need.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">CSS Ready</h3>
                    <p class="text-light-muted text-sm">Get ready-to-use CSS code with one click. Copy hex, rgb(), hsl(), or CSS custom property declarations directly into your stylesheets.</p>
                </div>
            </div>

            {{-- Dynamic CTA --}}
            <x-tool-cta />

            {{-- FAQ Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Frequently Asked Questions</h2>

                <div class="space-y-4 max-w-3xl mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I convert hex to RGB?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Enter your hex color code (e.g., #FF5733) into the input field and the tool instantly converts it to RGB values (e.g., rgb(255, 87, 51)). You can also use the color picker or adjust the RGB sliders directly. All output formats update in real-time.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between hex and RGB colors?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Hex colors use a 6-digit hexadecimal format (#RRGGBB) where each pair represents Red, Green, and Blue values from 00 to FF (0-255 in decimal). RGB uses decimal values from 0 to 255 for each channel. Both represent the same colors — hex is commonly used in CSS and design tools, while RGB is used in programming and color manipulation.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I convert RGB back to hex?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! This tool works both ways. Use the Red, Green, and Blue sliders or type values directly into the number inputs to set your RGB color. The hex code and all other formats update automatically.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the hex code for white and black?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            White is <code class="bg-darkCard px-1 rounded">#FFFFFF</code> in hex or <code class="bg-darkCard px-1 rounded">rgb(255, 255, 255)</code>. Black is <code class="bg-darkCard px-1 rounded">#000000</code> in hex or <code class="bg-darkCard px-1 rounded">rgb(0, 0, 0)</code>. You can click the Black and White preset buttons above to load these values.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does the converter support alpha transparency?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Adjust the Alpha slider to control opacity from 0 (fully transparent) to 1 (fully opaque). The RGBA and HSLA output values will reflect your transparency setting. When alpha is less than 1, the hex output also shows the 8-digit hex format (#RRGGBBAA).
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.hex-to-rgb-script')
    @endpush
</x-layout>
