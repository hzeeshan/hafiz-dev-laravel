<x-layout>
    <x-slot:title>Strikethrough Text Generator - Cross Out Text Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online strikethrough text generator. Create crossed out text instantly for social media, Discord, and more. Copy and paste strikethrough text anywhere. No signup required.</x-slot:description>
    <x-slot:keywords>strikethrough text generator, strikethrough text, crossed out text, cross out text generator, strikethrough font, strikethrough text copy paste</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/strikethrough-text-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Strikethrough Text Generator - Cross Out Text Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online strikethrough text generator. Create crossed out text instantly for social media.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/strikethrough-text-generator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Strikethrough Text Generator",
            "description": "Free online strikethrough text generator. Create crossed out text instantly.",
            "url": "https://hafiz.dev/tools/strikethrough-text-generator",
            "applicationCategory": "UtilitiesApplication",
            "operatingSystem": "Any",
            "offers": { "@@type": "Offer", "price": "0", "priceCurrency": "USD" },
            "author": { "@@type": "Person", "name": "Hafiz Riaz", "url": "https://hafiz.dev" }
        }
        </script>
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "BreadcrumbList",
            "itemListElement": [
                { "@@type": "ListItem", "position": 1, "name": "Home", "item": "https://hafiz.dev" },
                { "@@type": "ListItem", "position": 2, "name": "Tools", "item": "https://hafiz.dev/tools" },
                { "@@type": "ListItem", "position": 3, "name": "Strikethrough Text Generator", "item": "https://hafiz.dev/tools/strikethrough-text-generator" }
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
                    "name": "How does the strikethrough text generator work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The tool adds a Unicode combining character (U+0336 for single strikethrough or U+0333 for double) after each character in your text. This makes the text appear crossed out on any platform that supports Unicode."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I use strikethrough text on social media?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Strikethrough text works on most platforms including Twitter/X, Facebook, Instagram, Discord, Reddit, YouTube, and more. Simply copy the crossed out text and paste it anywhere."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between single and double strikethrough?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Single strikethrough uses one line through the text, while double strikethrough uses two lines. Both are achieved using Unicode combining characters and work across most platforms."
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
                    <li class="text-gold">Strikethrough Text Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Strikethrough Text Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Create crossed out text instantly. Perfect for showing corrections, edits, or adding emphasis on social media, Discord, and more.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Style Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <label class="text-light font-semibold mb-3 block text-sm">Strikethrough Style</label>
                    <div class="flex flex-wrap gap-3">
                        <label class="flex items-center gap-2 cursor-pointer px-4 py-2 bg-darkCard border border-gold/30 rounded-lg hover:border-gold/50 transition-colors">
                            <input type="radio" name="style" value="single" checked class="text-gold focus:ring-gold cursor-pointer">
                            <span class="text-sm text-light">S̶i̶n̶g̶l̶e̶ ̶S̶t̶r̶i̶k̶e̶</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-4 py-2 bg-darkCard border border-gold/20 rounded-lg hover:border-gold/50 transition-colors">
                            <input type="radio" name="style" value="double" class="text-gold focus:ring-gold cursor-pointer">
                            <span class="text-sm text-light">D̳o̳u̳b̳l̳e̳ ̳S̳t̳r̳i̳k̳e̳</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-4 py-2 bg-darkCard border border-gold/20 rounded-lg hover:border-gold/50 transition-colors">
                            <input type="radio" name="style" value="tilde" class="text-gold focus:ring-gold cursor-pointer">
                            <span class="text-sm text-light">T̴i̴l̴d̴e̴ ̴S̴t̴r̴i̴k̴e̴</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-4 py-2 bg-darkCard border border-gold/20 rounded-lg hover:border-gold/50 transition-colors">
                            <input type="radio" name="style" value="slash" class="text-gold focus:ring-gold cursor-pointer">
                            <span class="text-sm text-light">S̸l̸a̸s̸h̸ ̸S̸t̸r̸i̸k̸e̸</span>
                        </label>
                    </div>
                </div>

                {{-- Input --}}
                <div class="mb-4">
                    <label for="text-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        Your Text
                    </label>
                    <textarea
                        id="text-input"
                        class="w-full min-h-[140px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                        placeholder="Type or paste your text here..."
                        spellcheck="false"
                    ></textarea>
                </div>

                {{-- Output --}}
                <div class="mb-6">
                    <label class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Strikethrough Text
                    </label>
                    <textarea
                        id="text-output"
                        class="w-full min-h-[140px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                        placeholder="Strikethrough text will appear here..."
                        readonly
                    ></textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Sample
                    </button>
                    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                </div>

                {{-- Stats --}}
                <div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <div id="stat-chars" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Characters</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-style" class="text-2xl font-bold text-light mb-1">—</div>
                            <div class="text-light-muted text-sm">Style</div>
                        </div>
                    </div>
                </div>

                {{-- Notifications --}}
                <div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Preview Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <h2 class="text-lg font-semibold text-light mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    All Styles Preview
                </h2>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Single</div>
                        <div id="preview-single" class="text-light font-mono text-lg break-all min-h-[30px]">H̶e̶l̶l̶o̶ ̶W̶o̶r̶l̶d̶</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Double</div>
                        <div id="preview-double" class="text-light font-mono text-lg break-all min-h-[30px]">H̳e̳l̳l̳o̳ ̳W̳o̳r̳l̳d̳</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Tilde</div>
                        <div id="preview-tilde" class="text-light font-mono text-lg break-all min-h-[30px]">H̴e̴l̴l̴o̴ ̴W̴o̴r̴l̴d̴</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Slash</div>
                        <div id="preview-slash" class="text-gold font-mono text-lg break-all min-h-[30px]">H̸e̸l̸l̸o̸ ̸W̸o̸r̸l̸d̸</div>
                    </div>
                </div>
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">✏️</div>
                    <h3 class="text-lg font-semibold text-light mb-2">4 Styles</h3>
                    <p class="text-light-muted text-sm">Choose from single, double, tilde, or slash strikethrough. Each style uses different Unicode combining characters for a unique look.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📋</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Copy & Paste</h3>
                    <p class="text-light-muted text-sm">One-click copy to clipboard. Works on Twitter, Discord, Instagram, TikTok, Reddit, YouTube comments, and any platform supporting Unicode.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">Everything runs in your browser. No data is sent to any server. Your text stays completely private and secure.</p>
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
                            <span class="text-light font-medium">How does the strikethrough text generator work?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The tool adds a Unicode combining character after each character in your text. For single strikethrough, it uses U+0336 (combining long stroke overlay). This makes the text appear crossed out on any platform that supports Unicode rendering.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I use strikethrough text on Instagram?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Strikethrough text works on Instagram bios, captions, comments, and stories. Copy the generated text and paste it directly into Instagram. It also works on Twitter/X, Facebook, Discord, TikTok, Reddit, and most other platforms.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between single and double strikethrough?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Single strikethrough draws one line through the middle of text (using U+0336), while double strikethrough draws a line below using U+0333. The tilde style uses U+0334 for a wavy overlay, and slash uses U+0338 for a diagonal line. Each creates a different visual effect.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Why does strikethrough look different on some platforms?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The appearance of strikethrough text depends on how each platform renders Unicode combining characters. Most modern platforms render it well, but some may show slight visual differences. Single strikethrough (U+0336) has the widest compatibility across platforms.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        // Strikethrough combining characters
        const strikeChars = {
            single: '\u0336',  // Combining long stroke overlay
            double: '\u0333',  // Combining double low line
            tilde:  '\u0334',  // Combining tilde overlay
            slash:  '\u0338'   // Combining long solidus overlay
        };

        // DOM Elements
        const textInput = document.getElementById('text-input');
        const textOutput = document.getElementById('text-output');
        const styleRadios = document.querySelectorAll('input[name="style"]');
        const btnCopy = document.getElementById('btn-copy');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const statsBar = document.getElementById('stats-bar');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');

        function getSelectedStyle() {
            return document.querySelector('input[name="style"]:checked').value;
        }

        function applyStrike(text, style) {
            const combChar = strikeChars[style];
            return [...text].map(ch => ch + combChar).join('');
        }

        function convert() {
            const text = textInput.value;
            if (!text) {
                textOutput.value = '';
                statsBar.classList.add('hidden');
                updatePreviews('Hello World');
                return;
            }

            const style = getSelectedStyle();
            textOutput.value = applyStrike(text, style);

            // Stats
            document.getElementById('stat-chars').textContent = [...text].length;
            const styleNames = { single: 'Single', double: 'Double', tilde: 'Tilde', slash: 'Slash' };
            document.getElementById('stat-style').textContent = styleNames[style];
            statsBar.classList.remove('hidden');

            // Previews
            updatePreviews(text.length > 40 ? text.substring(0, 40) + '…' : text);
        }

        function updatePreviews(text) {
            document.getElementById('preview-single').textContent = applyStrike(text, 'single');
            document.getElementById('preview-double').textContent = applyStrike(text, 'double');
            document.getElementById('preview-tilde').textContent = applyStrike(text, 'tilde');
            document.getElementById('preview-slash').textContent = applyStrike(text, 'slash');
        }

        // Event listeners
        textInput.addEventListener('input', convert);
        styleRadios.forEach(r => r.addEventListener('change', convert));

        btnCopy.addEventListener('click', function() {
            const output = textOutput.value;
            if (!output) return;
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                successNotification.classList.remove('hidden');
                successMessage.textContent = 'Copied to clipboard!';
                setTimeout(() => {
                    this.innerHTML = orig;
                    this.classList.remove('text-green-400', 'border-green-400');
                    successNotification.classList.add('hidden');
                }, 2000);
            });
        });

        btnSample.addEventListener('click', function() {
            textInput.value = 'This text has been crossed out.';
            convert();
        });

        btnClear.addEventListener('click', function() {
            textInput.value = '';
            textOutput.value = '';
            statsBar.classList.add('hidden');
            updatePreviews('Hello World');
            successNotification.classList.add('hidden');
        });

        // Initialize previews
        updatePreviews('Hello World');
    })();
    </script>
    @endpush
</x-layout>
