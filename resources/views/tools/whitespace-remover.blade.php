<x-layout>
    <x-slot:title>Whitespace Remover - Remove Extra Spaces Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online whitespace remover. Remove extra spaces, leading/trailing whitespace, and blank lines instantly. No signup required.</x-slot:description>
    <x-slot:keywords>whitespace remover, remove extra spaces, trim whitespace, remove whitespace online, space remover</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/whitespace-remover') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Whitespace Remover - Remove Extra Spaces Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online whitespace remover. Remove extra spaces, leading/trailing whitespace, and blank lines instantly. No signup required.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/whitespace-remover') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Whitespace Remover",
            "description": "Free online whitespace remover. Remove extra spaces, leading/trailing whitespace, and blank lines instantly. No signup required.",
            "url": "https://hafiz.dev/tools/whitespace-remover",
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
                    "name": "Whitespace Remover",
                    "item": "https://hafiz.dev/tools/whitespace-remover"
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
                    "name": "How do I remove extra whitespace from text?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Simply paste your text into the input area, select the cleaning options you want (like removing extra spaces or blank lines), and click 'Clean'. The tool will instantly process your text and show the cleaned version in the output area."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What types of whitespace does this tool remove?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "This tool can remove various types of whitespace including leading/trailing spaces, extra spaces between words (multiple spaces reduced to one), blank lines (empty lines), tabs, and all whitespace entirely if needed. You can choose which types to remove using the checkboxes."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I remove blank lines from text?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Simply check the 'Remove blank lines' option and the tool will remove all empty lines from your text, condensing it by removing any lines that contain only whitespace or are completely empty."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does it preserve line breaks?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, unless you enable 'Remove all whitespace'. By default, line breaks are preserved and only extra spaces within lines are cleaned. If you check 'Remove all whitespace', all spaces, tabs, and line breaks will be removed completely."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my text data kept private?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Absolutely! All text processing happens entirely in your browser using JavaScript. Your data never leaves your device - we don't store, transmit, or have access to any text you clean."
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
                    <li class="text-gold">Whitespace Remover</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Whitespace Remover</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Remove extra spaces, leading/trailing whitespace, and blank lines instantly. 100% client-side - runs entirely in your browser.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options Panel --}}
                <div class="flex flex-wrap items-center gap-4 mb-4 p-3 rounded-lg bg-darkBg border border-gold/10">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="opt-trim-leading-trailing" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
                        <span class="text-light-muted text-sm">Remove leading/trailing whitespace</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="opt-extra-spaces" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
                        <span class="text-light-muted text-sm">Remove extra spaces between words</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="opt-blank-lines" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
                        <span class="text-light-muted text-sm">Remove blank lines</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="opt-all-whitespace" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
                        <span class="text-light-muted text-sm">Remove all whitespace</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="opt-trim-each-line" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
                        <span class="text-light-muted text-sm">Trim each line</span>
                    </label>
                </div>

                {{-- Input/Output Grid --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
                    {{-- Input Text --}}
                    <div class="flex flex-col">
                        <label for="input-text" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Input Text
                        </label>
                        <textarea
                            id="input-text"
                            class="flex-1 bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-y"
                            style="min-height: 400px;"
                            placeholder="Paste text with extra spaces here..."
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output Text --}}
                    <div class="flex flex-col">
                        <label for="output-text" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            Cleaned Output
                        </label>
                        <textarea
                            id="output-text"
                            class="flex-1 bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-y"
                            style="min-height: 400px;"
                            placeholder="Cleaned text will appear here..."
                            readonly
                            spellcheck="false"
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-4">
                    <button id="btn-clean" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        Clean
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

                {{-- Statistics Bar --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-chars-removed" class="text-2xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Characters Removed</div>
                    </div>

                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-spaces-removed" class="text-2xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Spaces Removed</div>
                    </div>

                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-lines-removed" class="text-2xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Lines Removed</div>
                    </div>

                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-size-reduction" class="text-2xl font-bold text-gold mb-1">0%</div>
                        <div class="text-light-muted text-sm">Size Reduction</div>
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
                    <div class="text-gold text-2xl mb-3">⚙️</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Multiple Cleaning Modes</h3>
                    <p class="text-light-muted text-sm">Remove extra spaces, blank lines, or all whitespace. Choose the cleaning options that fit your needs.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">⚡</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Real-Time Preview</h3>
                    <p class="text-light-muted text-sm">See cleaned output instantly as you type or toggle options. No need to wait for processing.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Data never leaves your device.</p>
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
                            <span class="text-light font-medium">How do I remove extra whitespace from text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Simply paste your text into the input area, select the cleaning options you want (like removing extra spaces or blank lines), and click "Clean". The tool will instantly process your text and show the cleaned version in the output area.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What types of whitespace does this tool remove?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            This tool can remove various types of whitespace including leading/trailing spaces, extra spaces between words (multiple spaces reduced to one), blank lines (empty lines), tabs, and all whitespace entirely if needed. You can choose which types to remove using the checkboxes.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I remove blank lines from text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Simply check the "Remove blank lines" option and the tool will remove all empty lines from your text, condensing it by removing any lines that contain only whitespace or are completely empty.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does it preserve line breaks?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, unless you enable "Remove all whitespace". By default, line breaks are preserved and only extra spaces within lines are cleaned. If you check "Remove all whitespace", all spaces, tabs, and line breaks will be removed completely.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my text data kept private?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Absolutely! All text processing happens entirely in your browser using JavaScript. Your data never leaves your device - we don't store, transmit, or have access to any text you clean.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.whitespace-remover-script')
    @endpush
</x-layout>
