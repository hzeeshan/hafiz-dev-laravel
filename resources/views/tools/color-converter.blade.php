<x-layout>
    <x-slot:title>Color Converter - HEX to RGB, HSL Online | hafiz.dev</x-slot:title>
    <x-slot:description>Free online color converter. Convert between HEX, RGB, RGBA, HSL, HSLA color formats instantly. Includes color picker, contrast checker, and WCAG compliance.</x-slot:description>
    <x-slot:keywords>color converter, hex to rgb, rgb to hex, hsl converter, color picker online, hex color code, rgba converter, color format converter</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/color-converter') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Color Converter - HEX to RGB, HSL Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online color converter. Convert between HEX, RGB, RGBA, HSL, HSLA color formats instantly.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/color-converter') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Color Converter",
            "description": "Free online color converter. Convert between HEX, RGB, RGBA, HSL, HSLA color formats instantly. Includes color picker, contrast checker, and WCAG compliance.",
            "url": "https://hafiz.dev/tools/color-converter",
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

        {{-- BreadcrumbList Schema --}}
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
                    "name": "Color Converter",
                    "item": "https://hafiz.dev/tools/color-converter"
                }
            ]
        }
        </script>

        {{-- FAQPage Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "FAQPage",
            "mainEntity": [
                {
                    "@@type": "Question",
                    "name": "How do I convert HEX to RGB?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "To convert HEX to RGB, each pair of hexadecimal digits represents a color channel (Red, Green, Blue). For example, #FF5733 converts to RGB(255, 87, 51) where FF=255 (red), 57=87 (green), and 33=51 (blue). Our tool does this conversion automatically - just enter a HEX code and see the RGB values instantly."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What's the difference between RGB and RGBA?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "RGB defines colors using Red, Green, and Blue channels (0-255 each). RGBA adds an Alpha channel (0-1) for transparency, where 0 is fully transparent and 1 is fully opaque. For example, rgba(255, 87, 51, 0.5) is the same color as rgb(255, 87, 51) but at 50% opacity."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is HSL color format?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "HSL stands for Hue, Saturation, and Lightness. Hue is the color angle (0-360°), Saturation is the color intensity (0-100%), and Lightness is how light or dark the color is (0-100%). HSL is often more intuitive for designers because adjusting lightness or saturation is straightforward."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I find the complementary color?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A complementary color is directly opposite on the color wheel. In HSL terms, it's the same color with the hue rotated by 180°. For example, blue (hue 240°) has an orange complement (hue 60°). Our tool automatically calculates and displays the complementary color for any color you select."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is WCAG color contrast?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "WCAG (Web Content Accessibility Guidelines) defines minimum contrast ratios for readable text. Level AA requires 4.5:1 for normal text and 3:1 for large text. Level AAA requires 7:1 for normal text and 4.5:1 for large text. Our tool calculates contrast ratios against both black and white text to help ensure your colors are accessible."
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
                    <li class="text-gold">Color Converter</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Color Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert colors between HEX, RGB, HSL formats instantly. Free online color picker with WCAG contrast checker.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <div class="grid lg:grid-cols-2 gap-8">
                    {{-- Left Side: Color Preview & Picker --}}
                    <div>
                        <label class="text-light font-semibold mb-3 block">Color Preview</label>

                        {{-- Color Preview Box --}}
                        <div id="color-preview" class="w-full h-40 rounded-lg border-2 border-gold/30 mb-4 transition-colors duration-200" style="background-color: #D4AF37;"></div>

                        {{-- Color Picker & Random Button --}}
                        <div class="flex items-center gap-4 mb-6">
                            <div class="flex-1">
                                <label class="text-light-muted text-sm mb-2 block">Color Picker</label>
                                <input type="color" id="color-picker" value="#D4AF37" class="w-full h-12 rounded-lg cursor-pointer border border-gold/30 bg-darkBg">
                            </div>
                            <div>
                                <label class="text-light-muted text-sm mb-2 block">&nbsp;</label>
                                <button id="btn-random" class="px-4 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                    Random
                                </button>
                            </div>
                        </div>

                        {{-- Complementary Color --}}
                        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
                            <label class="text-light font-semibold mb-3 block">Complementary Color</label>
                            <div class="flex items-center gap-4">
                                <div id="complementary-preview" class="w-16 h-16 rounded-lg border border-gold/30 cursor-pointer transition-colors duration-200" style="background-color: #2B50C8;" title="Click to use this color"></div>
                                <div>
                                    <code id="complementary-hex" class="text-light font-mono text-lg">#2B50C8</code>
                                    <p class="text-light-muted text-sm mt-1">Opposite on the color wheel</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right Side: Color Format Inputs --}}
                    <div>
                        <label class="text-light font-semibold mb-3 block">Color Formats</label>

                        {{-- HEX Input --}}
                        <div class="mb-4">
                            <label class="text-light-muted text-sm mb-2 block">HEX</label>
                            <div class="flex items-center gap-2">
                                <div class="flex-1 flex items-center bg-darkBg border border-gold/20 rounded-lg overflow-hidden">
                                    <span class="px-3 text-light-muted font-mono">#</span>
                                    <input type="text" id="input-hex" value="D4AF37" maxlength="6" class="flex-1 bg-transparent text-light font-mono py-3 pr-3 focus:outline-none" placeholder="RRGGBB">
                                </div>
                                <button class="copy-btn p-3 text-light-muted hover:text-gold transition-colors cursor-pointer border border-gold/20 rounded-lg hover:border-gold/40" data-target="hex" title="Copy HEX">
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
                                <button class="copy-btn p-3 text-light-muted hover:text-gold transition-colors cursor-pointer border border-gold/20 rounded-lg hover:border-gold/40" data-target="rgb" title="Copy RGB">
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
                                <button class="copy-btn p-3 text-light-muted hover:text-gold transition-colors cursor-pointer border border-gold/20 rounded-lg hover:border-gold/40" data-target="rgba" title="Copy RGBA">
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
                                <button class="copy-btn p-3 text-light-muted hover:text-gold transition-colors cursor-pointer border border-gold/20 rounded-lg hover:border-gold/40" data-target="hsl" title="Copy HSL">
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
                                <button class="copy-btn p-3 text-light-muted hover:text-gold transition-colors cursor-pointer border border-gold/20 rounded-lg hover:border-gold/40" data-target="hsla" title="Copy HSLA">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contrast Checker Section --}}
                <div class="border-t border-gold/10 mt-6 pt-6">
                    <label class="text-light font-semibold mb-4 block">Contrast Checker (WCAG)</label>
                    <div class="grid md:grid-cols-2 gap-4">
                        {{-- White Text Contrast --}}
                        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-light-muted">White Text</span>
                                <span id="contrast-white-ratio" class="text-light font-mono font-bold">4.23:1</span>
                            </div>
                            <div id="contrast-white-preview" class="rounded-lg p-4 mb-3 text-center transition-colors duration-200" style="background-color: #D4AF37;">
                                <span class="text-white font-semibold text-lg">Sample Text</span>
                            </div>
                            <div class="flex gap-2">
                                <span id="wcag-white-aa" class="px-2 py-1 text-xs rounded font-semibold bg-red-500/20 text-red-400 border border-red-500/30">AA: Fail</span>
                                <span id="wcag-white-aaa" class="px-2 py-1 text-xs rounded font-semibold bg-red-500/20 text-red-400 border border-red-500/30">AAA: Fail</span>
                            </div>
                        </div>

                        {{-- Black Text Contrast --}}
                        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-light-muted">Black Text</span>
                                <span id="contrast-black-ratio" class="text-light font-mono font-bold">4.97:1</span>
                            </div>
                            <div id="contrast-black-preview" class="rounded-lg p-4 mb-3 text-center transition-colors duration-200" style="background-color: #D4AF37;">
                                <span class="text-black font-semibold text-lg">Sample Text</span>
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
                        <label class="text-light font-semibold">Color History</label>
                        <button id="btn-clear-history" class="text-light-muted hover:text-gold text-sm transition-colors cursor-pointer">Clear</button>
                    </div>
                    <div id="color-history" class="flex flex-wrap gap-2">
                        <span class="text-light-muted text-sm">No colors yet. Start picking colors!</span>
                    </div>
                </div>

                {{-- Success/Copy Notification --}}
                <div id="copy-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="copy-message" class="text-green-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🎨</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Multiple Formats</h3>
                    <p class="text-light-muted text-sm">Convert between HEX, RGB, RGBA, HSL, and HSLA formats instantly.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">♿</div>
                    <h3 class="text-lg font-semibold text-light mb-2">WCAG Contrast</h3>
                    <p class="text-light-muted text-sm">Check color accessibility with WCAG AA and AAA compliance indicators.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">100%</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Client-Side</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. No data sent to servers.</p>
                </div>
            </div>

            {{-- FAQ Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Frequently Asked Questions</h2>

                <div class="space-y-4 max-w-3xl mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I convert HEX to RGB?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            To convert HEX to RGB, each pair of hexadecimal digits represents a color channel (Red, Green, Blue). For example, #FF5733 converts to RGB(255, 87, 51) where FF=255 (red), 57=87 (green), and 33=51 (blue). Our tool does this conversion automatically - just enter a HEX code and see the RGB values instantly.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What's the difference between RGB and RGBA?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            RGB defines colors using Red, Green, and Blue channels (0-255 each). RGBA adds an Alpha channel (0-1) for transparency, where 0 is fully transparent and 1 is fully opaque. For example, rgba(255, 87, 51, 0.5) is the same color as rgb(255, 87, 51) but at 50% opacity.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is HSL color format?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            HSL stands for Hue, Saturation, and Lightness. Hue is the color angle (0-360°), Saturation is the color intensity (0-100%), and Lightness is how light or dark the color is (0-100%). HSL is often more intuitive for designers because adjusting lightness or saturation is straightforward.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I find the complementary color?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A complementary color is directly opposite on the color wheel. In HSL terms, it's the same color with the hue rotated by 180°. For example, blue (hue 240°) has an orange complement (hue 60°). Our tool automatically calculates and displays the complementary color for any color you select.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is WCAG color contrast?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            WCAG (Web Content Accessibility Guidelines) defines minimum contrast ratios for readable text. Level AA requires 4.5:1 for normal text and 3:1 for large text. Level AAA requires 7:1 for normal text and 4.5:1 for large text. Our tool calculates contrast ratios against both black and white text to help ensure your colors are accessible.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        // DOM Elements
        const colorPicker = document.getElementById('color-picker');
        const colorPreview = document.getElementById('color-preview');
        const btnRandom = document.getElementById('btn-random');
        const inputHex = document.getElementById('input-hex');
        const inputR = document.getElementById('input-r');
        const inputG = document.getElementById('input-g');
        const inputB = document.getElementById('input-b');
        const inputRa = document.getElementById('input-ra');
        const inputGa = document.getElementById('input-ga');
        const inputBa = document.getElementById('input-ba');
        const inputAlpha = document.getElementById('input-alpha');
        const inputH = document.getElementById('input-h');
        const inputS = document.getElementById('input-s');
        const inputL = document.getElementById('input-l');
        const inputHa = document.getElementById('input-ha');
        const inputSa = document.getElementById('input-sa');
        const inputLa = document.getElementById('input-la');
        const inputAlphaHsl = document.getElementById('input-alpha-hsl');
        const complementaryPreview = document.getElementById('complementary-preview');
        const complementaryHex = document.getElementById('complementary-hex');
        const contrastWhiteRatio = document.getElementById('contrast-white-ratio');
        const contrastBlackRatio = document.getElementById('contrast-black-ratio');
        const contrastWhitePreview = document.getElementById('contrast-white-preview');
        const contrastBlackPreview = document.getElementById('contrast-black-preview');
        const wcagWhiteAa = document.getElementById('wcag-white-aa');
        const wcagWhiteAaa = document.getElementById('wcag-white-aaa');
        const wcagBlackAa = document.getElementById('wcag-black-aa');
        const wcagBlackAaa = document.getElementById('wcag-black-aaa');
        const colorHistory = document.getElementById('color-history');
        const btnClearHistory = document.getElementById('btn-clear-history');
        const copyNotification = document.getElementById('copy-notification');
        const copyMessage = document.getElementById('copy-message');

        // State
        let currentColor = { r: 212, g: 175, b: 55 };
        let currentAlpha = 1;
        let isUpdating = false;

        // ===== Color Conversion Functions =====

        // HEX to RGB
        function hexToRgb(hex) {
            hex = hex.replace(/^#/, '');

            // Handle shorthand hex (e.g., #F00 -> #FF0000)
            if (hex.length === 3) {
                hex = hex.split('').map(c => c + c).join('');
            }

            const result = /^([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
            return result ? {
                r: parseInt(result[1], 16),
                g: parseInt(result[2], 16),
                b: parseInt(result[3], 16)
            } : null;
        }

        // RGB to HEX
        function rgbToHex(r, g, b) {
            return [r, g, b].map(x => {
                const hex = Math.max(0, Math.min(255, Math.round(x))).toString(16);
                return hex.length === 1 ? '0' + hex : hex;
            }).join('').toUpperCase();
        }

        // RGB to HSL
        function rgbToHsl(r, g, b) {
            r /= 255; g /= 255; b /= 255;
            const max = Math.max(r, g, b), min = Math.min(r, g, b);
            let h, s, l = (max + min) / 2;

            if (max === min) {
                h = s = 0;
            } else {
                const d = max - min;
                s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
                switch (max) {
                    case r: h = ((g - b) / d + (g < b ? 6 : 0)) / 6; break;
                    case g: h = ((b - r) / d + 2) / 6; break;
                    case b: h = ((r - g) / d + 4) / 6; break;
                }
            }
            return {
                h: Math.round(h * 360),
                s: Math.round(s * 100),
                l: Math.round(l * 100)
            };
        }

        // HSL to RGB
        function hslToRgb(h, s, l) {
            s /= 100; l /= 100;
            const k = n => (n + h / 30) % 12;
            const a = s * Math.min(l, 1 - l);
            const f = n => l - a * Math.max(-1, Math.min(k(n) - 3, Math.min(9 - k(n), 1)));
            return {
                r: Math.round(255 * f(0)),
                g: Math.round(255 * f(8)),
                b: Math.round(255 * f(4))
            };
        }

        // Get complementary color (hue + 180°)
        function getComplementary(r, g, b) {
            const hsl = rgbToHsl(r, g, b);
            const complementaryHue = (hsl.h + 180) % 360;
            return hslToRgb(complementaryHue, hsl.s, hsl.l);
        }

        // Calculate relative luminance
        function getLuminance(r, g, b) {
            const [rs, gs, bs] = [r, g, b].map(v => {
                v /= 255;
                return v <= 0.03928 ? v / 12.92 : Math.pow((v + 0.055) / 1.055, 2.4);
            });
            return 0.2126 * rs + 0.7152 * gs + 0.0722 * bs;
        }

        // Calculate contrast ratio
        function getContrastRatio(rgb1, rgb2) {
            const l1 = getLuminance(rgb1.r, rgb1.g, rgb1.b);
            const l2 = getLuminance(rgb2.r, rgb2.g, rgb2.b);
            const lighter = Math.max(l1, l2);
            const darker = Math.min(l1, l2);
            return (lighter + 0.05) / (darker + 0.05);
        }

        // ===== UI Update Functions =====

        function updateAllFromRgb(r, g, b, source = null) {
            if (isUpdating) return;
            isUpdating = true;

            currentColor = { r, g, b };
            const hex = rgbToHex(r, g, b);
            const hsl = rgbToHsl(r, g, b);

            // Update color picker
            colorPicker.value = '#' + hex;

            // Update preview
            colorPreview.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;

            // Update HEX input
            if (source !== 'hex') inputHex.value = hex;

            // Update RGB inputs
            if (source !== 'rgb') {
                inputR.value = r;
                inputG.value = g;
                inputB.value = b;
            }

            // Update RGBA inputs
            if (source !== 'rgba') {
                inputRa.value = r;
                inputGa.value = g;
                inputBa.value = b;
            }

            // Update HSL inputs
            if (source !== 'hsl') {
                inputH.value = hsl.h;
                inputS.value = hsl.s;
                inputL.value = hsl.l;
            }

            // Update HSLA inputs
            if (source !== 'hsla') {
                inputHa.value = hsl.h;
                inputSa.value = hsl.s;
                inputLa.value = hsl.l;
            }

            // Update complementary color
            const comp = getComplementary(r, g, b);
            const compHex = '#' + rgbToHex(comp.r, comp.g, comp.b);
            complementaryPreview.style.backgroundColor = compHex;
            complementaryHex.textContent = compHex;

            // Update contrast previews
            contrastWhitePreview.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;
            contrastBlackPreview.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;

            // Calculate contrast ratios
            const whiteContrast = getContrastRatio(currentColor, { r: 255, g: 255, b: 255 });
            const blackContrast = getContrastRatio(currentColor, { r: 0, g: 0, b: 0 });

            contrastWhiteRatio.textContent = whiteContrast.toFixed(2) + ':1';
            contrastBlackRatio.textContent = blackContrast.toFixed(2) + ':1';

            // Update WCAG badges
            updateWcagBadge(wcagWhiteAa, whiteContrast >= 4.5, 'AA');
            updateWcagBadge(wcagWhiteAaa, whiteContrast >= 7, 'AAA');
            updateWcagBadge(wcagBlackAa, blackContrast >= 4.5, 'AA');
            updateWcagBadge(wcagBlackAaa, blackContrast >= 7, 'AAA');

            isUpdating = false;
        }

        function updateWcagBadge(element, passes, level) {
            if (passes) {
                element.textContent = level + ': Pass';
                element.className = 'px-2 py-1 text-xs rounded font-semibold bg-green-500/20 text-green-400 border border-green-500/30';
            } else {
                element.textContent = level + ': Fail';
                element.className = 'px-2 py-1 text-xs rounded font-semibold bg-red-500/20 text-red-400 border border-red-500/30';
            }
        }

        // ===== Color History Functions =====

        function getHistory() {
            try {
                return JSON.parse(localStorage.getItem('colorHistory') || '[]');
            } catch {
                return [];
            }
        }

        function saveToHistory(hex) {
            let history = getHistory();
            hex = '#' + hex.replace(/^#/, '').toUpperCase();
            history = history.filter(c => c !== hex);
            history.unshift(hex);
            history = history.slice(0, 10);
            localStorage.setItem('colorHistory', JSON.stringify(history));
            renderHistory();
        }

        function renderHistory() {
            const history = getHistory();

            if (history.length === 0) {
                colorHistory.innerHTML = '<span class="text-light-muted text-sm">No colors yet. Start picking colors!</span>';
                return;
            }

            colorHistory.innerHTML = history.map(hex => `
                <button class="history-color w-10 h-10 rounded-lg border-2 border-transparent hover:border-gold transition-all cursor-pointer hover:scale-110"
                        style="background-color: ${hex};"
                        data-color="${hex}"
                        title="${hex}"></button>
            `).join('');

            // Add click handlers
            document.querySelectorAll('.history-color').forEach(btn => {
                btn.addEventListener('click', function() {
                    const hex = this.getAttribute('data-color').replace('#', '');
                    const rgb = hexToRgb(hex);
                    if (rgb) {
                        updateAllFromRgb(rgb.r, rgb.g, rgb.b, 'history');
                    }
                });
            });
        }

        function clearHistory() {
            localStorage.removeItem('colorHistory');
            renderHistory();
        }

        // ===== Clipboard Functions =====

        function copyToClipboard(text, message) {
            navigator.clipboard.writeText(text).then(() => {
                showNotification(message);
            }).catch(() => {
                showNotification('Failed to copy');
            });
        }

        function showNotification(message) {
            copyMessage.textContent = message;
            copyNotification.classList.remove('hidden');
            setTimeout(() => {
                copyNotification.classList.add('hidden');
            }, 2000);
        }

        function getColorString(format) {
            const { r, g, b } = currentColor;
            const hsl = rgbToHsl(r, g, b);

            switch (format) {
                case 'hex':
                    return '#' + rgbToHex(r, g, b);
                case 'rgb':
                    return `rgb(${r}, ${g}, ${b})`;
                case 'rgba':
                    return `rgba(${r}, ${g}, ${b}, ${currentAlpha})`;
                case 'hsl':
                    return `hsl(${hsl.h}, ${hsl.s}%, ${hsl.l}%)`;
                case 'hsla':
                    return `hsla(${hsl.h}, ${hsl.s}%, ${hsl.l}%, ${currentAlpha})`;
                default:
                    return '';
            }
        }

        // ===== Random Color =====

        function generateRandomColor() {
            const r = Math.floor(Math.random() * 256);
            const g = Math.floor(Math.random() * 256);
            const b = Math.floor(Math.random() * 256);
            updateAllFromRgb(r, g, b, 'random');
            saveToHistory(rgbToHex(r, g, b));
        }

        // ===== Event Listeners =====

        // Color picker change
        colorPicker.addEventListener('input', function() {
            const rgb = hexToRgb(this.value);
            if (rgb) {
                updateAllFromRgb(rgb.r, rgb.g, rgb.b, 'picker');
            }
        });

        colorPicker.addEventListener('change', function() {
            saveToHistory(this.value);
        });

        // Random button
        btnRandom.addEventListener('click', generateRandomColor);

        // HEX input
        inputHex.addEventListener('input', function() {
            let hex = this.value.replace(/[^a-fA-F0-9]/g, '');
            if (hex.length >= 3) {
                const rgb = hexToRgb(hex);
                if (rgb) {
                    updateAllFromRgb(rgb.r, rgb.g, rgb.b, 'hex');
                }
            }
        });

        inputHex.addEventListener('change', function() {
            saveToHistory(this.value);
        });

        // RGB inputs
        [inputR, inputG, inputB].forEach(input => {
            input.addEventListener('input', function() {
                const r = parseInt(inputR.value) || 0;
                const g = parseInt(inputG.value) || 0;
                const b = parseInt(inputB.value) || 0;
                updateAllFromRgb(
                    Math.max(0, Math.min(255, r)),
                    Math.max(0, Math.min(255, g)),
                    Math.max(0, Math.min(255, b)),
                    'rgb'
                );
            });

            input.addEventListener('change', function() {
                saveToHistory(rgbToHex(currentColor.r, currentColor.g, currentColor.b));
            });
        });

        // RGBA inputs
        [inputRa, inputGa, inputBa].forEach(input => {
            input.addEventListener('input', function() {
                const r = parseInt(inputRa.value) || 0;
                const g = parseInt(inputGa.value) || 0;
                const b = parseInt(inputBa.value) || 0;
                updateAllFromRgb(
                    Math.max(0, Math.min(255, r)),
                    Math.max(0, Math.min(255, g)),
                    Math.max(0, Math.min(255, b)),
                    'rgba'
                );
            });

            input.addEventListener('change', function() {
                saveToHistory(rgbToHex(currentColor.r, currentColor.g, currentColor.b));
            });
        });

        inputAlpha.addEventListener('input', function() {
            currentAlpha = Math.max(0, Math.min(1, parseFloat(this.value) || 1));
            inputAlphaHsl.value = currentAlpha;
        });

        // HSL inputs
        [inputH, inputS, inputL].forEach(input => {
            input.addEventListener('input', function() {
                const h = parseInt(inputH.value) || 0;
                const s = parseInt(inputS.value) || 0;
                const l = parseInt(inputL.value) || 0;
                const rgb = hslToRgb(
                    Math.max(0, Math.min(360, h)),
                    Math.max(0, Math.min(100, s)),
                    Math.max(0, Math.min(100, l))
                );
                updateAllFromRgb(rgb.r, rgb.g, rgb.b, 'hsl');
            });

            input.addEventListener('change', function() {
                saveToHistory(rgbToHex(currentColor.r, currentColor.g, currentColor.b));
            });
        });

        // HSLA inputs
        [inputHa, inputSa, inputLa].forEach(input => {
            input.addEventListener('input', function() {
                const h = parseInt(inputHa.value) || 0;
                const s = parseInt(inputSa.value) || 0;
                const l = parseInt(inputLa.value) || 0;
                const rgb = hslToRgb(
                    Math.max(0, Math.min(360, h)),
                    Math.max(0, Math.min(100, s)),
                    Math.max(0, Math.min(100, l))
                );
                updateAllFromRgb(rgb.r, rgb.g, rgb.b, 'hsla');
            });

            input.addEventListener('change', function() {
                saveToHistory(rgbToHex(currentColor.r, currentColor.g, currentColor.b));
            });
        });

        inputAlphaHsl.addEventListener('input', function() {
            currentAlpha = Math.max(0, Math.min(1, parseFloat(this.value) || 1));
            inputAlpha.value = currentAlpha;
        });

        // Complementary color click
        complementaryPreview.addEventListener('click', function() {
            const comp = getComplementary(currentColor.r, currentColor.g, currentColor.b);
            updateAllFromRgb(comp.r, comp.g, comp.b, 'complementary');
            saveToHistory(rgbToHex(comp.r, comp.g, comp.b));
        });

        // Copy buttons
        document.querySelectorAll('.copy-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const format = this.getAttribute('data-target');
                const colorString = getColorString(format);
                copyToClipboard(colorString, `Copied: ${colorString}`);
            });
        });

        // Clear history
        btnClearHistory.addEventListener('click', clearHistory);

        // Initialize
        renderHistory();
        updateAllFromRgb(212, 175, 55);
    })();
    </script>
    @endpush
</x-layout>
