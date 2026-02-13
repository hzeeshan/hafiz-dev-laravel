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

                <x-tool-privacy-banner />

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

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

            {{-- CTA Section --}}
            <x-tool-cta />

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
        @include('tools.partials.color-converter-script')
    @endpush
</x-layout>
