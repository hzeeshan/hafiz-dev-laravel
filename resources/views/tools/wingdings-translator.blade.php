<x-layout>
    <x-slot:title>Wingdings Translator - Free Online Wingdings to English | hafiz.dev</x-slot:title>
    <x-slot:description>Free online Wingdings translator. Convert text to Wingdings symbols and Wingdings to English instantly. Supports Wingdings 1, 2, and 3. No signup required.</x-slot:description>
    <x-slot:keywords>wingdings translator, wingdings to english, english to wingdings, wingdings translator gaster, wingdings font translator, wingdings decoder, wingdings converter, wingdings text</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/wingdings-translator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Wingdings Translator - Free Online Wingdings to English | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online Wingdings translator. Convert text to Wingdings and back instantly. Supports Wingdings 1, 2, and 3.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/wingdings-translator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Wingdings Translator",
            "description": "Free online Wingdings translator. Convert text to Wingdings symbols and Wingdings to English instantly.",
            "url": "https://hafiz.dev/tools/wingdings-translator",
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
                { "@@type": "ListItem", "position": 3, "name": "Wingdings Translator", "item": "https://hafiz.dev/tools/wingdings-translator" }
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
                    "name": "What are Wingdings?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Wingdings is a dingbat font created by Microsoft in 1990. Instead of displaying letters and numbers, it shows decorative symbols like arrows, stars, checkmarks, and geometric shapes. There are three versions: Wingdings 1 (the original), Wingdings 2, and Wingdings 3."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I translate Wingdings to English?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Paste or type the Wingdings symbols into the input field and select the Wingdings to English direction. The translator maps each symbol back to its corresponding ASCII character. You can also use the character reference table to manually look up individual symbols."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What does Gaster say in Wingdings?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "W.D. Gaster is a mysterious character from the game Undertale who communicates using Wingdings font. His messages include phrases like 'ENTRY NUMBER SEVENTEEN' and 'DARK DARKER YET DARKER'. Use the Gaster Mode button to see these famous quotes translated."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between Wingdings, Webdings, and Symbol fonts?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Wingdings uses decorative symbols like arrows, hands, and geometric shapes. Webdings (also by Microsoft) focuses on web-related icons and modern pictograms. Symbol font maps to Greek letters and mathematical symbols. Each font maps different symbols to the same keyboard characters."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I copy and paste Wingdings symbols?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! This translator converts text to standard Unicode symbols that look like Wingdings characters. Unlike the actual Wingdings font (which requires the font to be installed), these Unicode equivalents display correctly on all devices, browsers, and platforms without any special fonts."
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
                    <li class="text-gold">Wingdings Translator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Wingdings Translator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Translate text to Wingdings symbols and Wingdings back to English. Supports Wingdings 1, 2, and 3 fonts. Decode Gaster's secret messages from Undertale!
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 gap-6">
                        {{-- Direction Selector --}}
                        <div>
                            <label class="text-light font-semibold mb-3 block text-sm">Direction</label>
                            <select id="translate-direction" class="w-full bg-darkBg border border-gold/20 rounded-lg p-2.5 text-sm text-light focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 cursor-pointer">
                                <option value="to-wingdings">English to Wingdings</option>
                                <option value="to-english">Wingdings to English</option>
                            </select>
                        </div>
                        {{-- Font Selector --}}
                        <div>
                            <label class="text-light font-semibold mb-3 block text-sm">Wingdings Font</label>
                            <select id="wingdings-font" class="w-full bg-darkBg border border-gold/20 rounded-lg p-2.5 text-sm text-light focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 cursor-pointer">
                                <option value="wingdings1">Wingdings 1</option>
                                <option value="wingdings2">Wingdings 2</option>
                                <option value="wingdings3">Wingdings 3</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Input --}}
                <div class="mb-4">
                    <label for="text-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        <span id="input-label">Your Text</span>
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
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                        <span id="output-label">Wingdings Output</span>
                    </label>
                    <textarea
                        id="text-output"
                        class="w-full min-h-[140px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-lg text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                        placeholder="Translated text will appear here..."
                        readonly
                    ></textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-convert" class="px-5 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                        Translate
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Download
                    </button>
                    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Sample
                    </button>
                    <button id="btn-gaster" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer" title="Load a W.D. Gaster quote from Undertale">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                        Gaster Mode
                    </button>
                    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                </div>

                {{-- Stats --}}
                <div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center">
                            <div id="stat-input-chars" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Input Chars</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-output-chars" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Output Chars</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-font" class="text-2xl font-bold text-light mb-1">-</div>
                            <div class="text-light-muted text-sm">Font</div>
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
                <div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        <span id="error-message" class="text-red-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Character Reference Table --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <details class="group">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h2 class="text-lg font-semibold text-light flex items-center gap-2">
                            <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                            Wingdings Character Reference Table
                        </h2>
                        <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </summary>
                    <div class="mt-4 overflow-x-auto">
                        <div id="char-ref-table" class="grid grid-cols-6 sm:grid-cols-8 md:grid-cols-10 lg:grid-cols-12 gap-2 text-center">
                            {{-- Populated by JavaScript --}}
                        </div>
                    </div>
                </details>
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔄</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Bidirectional Translation</h3>
                    <p class="text-light-muted text-sm">Translate English text to Wingdings symbols or decode Wingdings back to readable English. Works in both directions with a single click.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🎮</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Gaster Mode</h3>
                    <p class="text-light-muted text-sm">Decode W.D. Gaster's secret messages from Undertale. Load famous Gaster quotes and see them translated between Wingdings and English.</p>
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
                            <span class="text-light font-medium">What are Wingdings?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Wingdings is a dingbat font created by Microsoft in 1990. Instead of displaying standard letters and numbers, it renders decorative symbols like arrows, stars, checkmarks, and geometric shapes. There are three versions: Wingdings 1 (the original and most popular), Wingdings 2, and Wingdings 3, each with a different set of symbols.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I translate Wingdings to English?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Select "Wingdings to English" from the Direction dropdown, then paste or type the Wingdings symbols into the input field. Click "Translate" and the tool will map each symbol back to its corresponding ASCII character. You can also browse the character reference table to look up individual symbols.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What does Gaster say in Wingdings?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            W.D. Gaster is a mysterious character from the game Undertale who communicates using the Wingdings font. His known messages include "ENTRY NUMBER SEVENTEEN", "DARK DARKER YET DARKER", "THE DARKNESS KEEPS GROWING", and "PHOTON READINGS NEGATIVE". Click the "Gaster Mode" button to load these quotes and see them translated.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between Wingdings, Webdings, and Symbol?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Wingdings uses decorative symbols like arrows, hands, stars, and geometric shapes. Webdings (also by Microsoft) focuses on web-related icons and modern pictograms. The Symbol font maps to Greek letters and mathematical notation. Each font maps entirely different symbols to the same keyboard characters.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I copy and paste Wingdings symbols?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! This translator converts text to standard Unicode symbols that visually match Wingdings characters. Unlike the actual Wingdings font (which requires the font to be installed), these Unicode equivalents display correctly on all devices, browsers, and platforms including Discord, social media, and messaging apps.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @include('tools.partials.wingdings-translator-script')
</x-layout>
