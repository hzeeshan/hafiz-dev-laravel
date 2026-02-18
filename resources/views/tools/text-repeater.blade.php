<x-layout>
    <x-slot:title>Text Repeater - Free Online Text Repeat Tool | hafiz.dev</x-slot:title>
    <x-slot:description>Free online text repeater. Repeat any text or string multiple times instantly in your browser. Add separators, line breaks, and numbering. No signup required.</x-slot:description>
    <x-slot:keywords>text repeater, repeat text online, text repeater online, repeat string, duplicate text, text multiplier, copy text multiple times, free text repeater</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/text-repeater') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Text Repeater - Free Online Text Repeat Tool | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online text repeater. Repeat any text or string multiple times instantly in your browser. No signup required.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/text-repeater') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Text Repeater",
            "description": "Free online text repeater. Repeat any text or string multiple times instantly in your browser. Add separators, line breaks, and numbering.",
            "url": "https://hafiz.dev/tools/text-repeater",
            "applicationCategory": "UtilitiesApplication",
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
                    "name": "Text Repeater",
                    "item": "https://hafiz.dev/tools/text-repeater"
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
                    "name": "How do I repeat text multiple times?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Simply type or paste your text into the input area, set the number of repetitions, choose a separator (new line, space, comma, or custom), and click 'Repeat'. The tool will instantly generate the repeated text in the output area."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I add a separator between repeated text?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! You can choose from several built-in separators: new line, space, comma, semicolon, or define your own custom separator. The separator is placed between each repetition of your text."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the maximum number of repetitions?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "You can repeat text up to 10,000 times. This covers virtually any use case from simple duplications to generating large blocks of repeated content for testing or development."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I add line numbers to repeated text?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Enable the 'Add numbering' option to prefix each repetition with its number (e.g., '1. Hello', '2. Hello', '3. Hello'). This is useful for creating numbered lists or ordered sequences."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my data kept private?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Absolutely! All text processing happens entirely in your browser using JavaScript. Your data never leaves your device - we don't store, transmit, or have access to any text you repeat."
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
                    <li class="text-gold">Text Repeater</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Text Repeater</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Repeat any text or string multiple times instantly. Add separators, numbering, and custom formatting. 100% client-side - runs entirely in your browser.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options Panel --}}
                <div class="flex flex-wrap items-center gap-4 mb-4 p-3 rounded-lg bg-darkBg border border-gold/10">
                    <div class="flex items-center gap-2">
                        <label for="repeat-count" class="text-light-muted text-sm">Repeat:</label>
                        <input type="number" id="repeat-count" value="5" min="1" max="10000" class="w-24 bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-2 text-sm focus:border-gold focus:outline-none">
                        <span class="text-light-muted text-sm">times</span>
                    </div>

                    <div class="h-8 w-px bg-gold/20 hidden sm:block"></div>

                    <div class="flex items-center gap-2">
                        <label for="separator-select" class="text-light-muted text-sm">Separator:</label>
                        <select id="separator-select" class="bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-2 text-sm focus:border-gold focus:outline-none">
                            <option value="newline">New Line</option>
                            <option value="space">Space</option>
                            <option value="comma">Comma</option>
                            <option value="semicolon">Semicolon</option>
                            <option value="tab">Tab</option>
                            <option value="custom">Custom...</option>
                        </select>
                    </div>

                    <div id="custom-separator-wrapper" class="hidden flex items-center gap-2">
                        <label for="custom-separator" class="text-light-muted text-sm">Custom:</label>
                        <input type="text" id="custom-separator" placeholder="e.g. | or -" class="w-24 bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-2 text-sm focus:border-gold focus:outline-none">
                    </div>

                    <div class="h-8 w-px bg-gold/20 hidden sm:block"></div>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="opt-numbering" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
                        <span class="text-light-muted text-sm">Add numbering</span>
                    </label>
                </div>

                {{-- Input/Output Grid --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
                    {{-- Input Text --}}
                    <div class="flex flex-col">
                        <label for="input-text" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Text to Repeat
                        </label>
                        <textarea
                            id="input-text"
                            class="flex-1 bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-y"
                            style="min-height: 300px;"
                            placeholder="Enter text to repeat..."
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output Text --}}
                    <div class="flex flex-col">
                        <label for="output-text" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            Repeated Output
                        </label>
                        <textarea
                            id="output-text"
                            class="flex-1 bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-y"
                            style="min-height: 300px;"
                            placeholder="Repeated text will appear here..."
                            readonly
                            spellcheck="false"
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-4">
                    <button id="btn-repeat" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        Repeat
                    </button>
                    <button id="btn-copy" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download
                    </button>
                    <button id="btn-sample" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Sample
                    </button>
                    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                </div>

                {{-- Stats Bar --}}
                <div id="stats-bar" class="hidden grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-repetitions" class="text-2xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Repetitions</div>
                    </div>

                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-total-chars" class="text-2xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Total Characters</div>
                    </div>

                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-total-lines" class="text-2xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Total Lines</div>
                    </div>

                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-output-size" class="text-2xl font-bold text-gold mb-1">0 B</div>
                        <div class="text-light-muted text-sm">Output Size</div>
                    </div>
                </div>

                {{-- Success Notification --}}
                <div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm"></span>
                    </div>
                </div>

                {{-- Error Notification --}}
                <div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span id="error-message" class="text-red-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔁</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Flexible Repetitions</h3>
                    <p class="text-light-muted text-sm">Repeat text from 1 to 10,000 times with customizable separators, numbering, and formatting options.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">⚡</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant Results</h3>
                    <p class="text-light-muted text-sm">Generate repeated text instantly with one click. Copy to clipboard or download as a text file.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Your data never leaves your device.</p>
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
                            <span class="text-light font-medium">How do I repeat text multiple times?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Simply type or paste your text into the input area, set the number of repetitions, choose a separator (new line, space, comma, or custom), and click "Repeat". The tool will instantly generate the repeated text in the output area.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I add a separator between repeated text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! You can choose from several built-in separators: new line, space, comma, semicolon, tab, or define your own custom separator. The separator is placed between each repetition of your text.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the maximum number of repetitions?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            You can repeat text up to 10,000 times. This covers virtually any use case from simple duplications to generating large blocks of repeated content for testing or development.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I add line numbers to repeated text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Enable the "Add numbering" option to prefix each repetition with its number (e.g., "1. Hello", "2. Hello", "3. Hello"). This is useful for creating numbered lists or ordered sequences.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my data kept private?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Absolutely! All text processing happens entirely in your browser using JavaScript. Your data never leaves your device - we don't store, transmit, or have access to any text you repeat.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.text-repeater-script')
    @endpush
</x-layout>
