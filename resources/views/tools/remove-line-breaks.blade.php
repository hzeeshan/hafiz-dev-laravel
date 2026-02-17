<x-layout>
    <x-slot:title>Remove Line Breaks Online - Free Line Break Remover | hafiz.dev</x-slot:title>
    <x-slot:description>Remove line breaks from text online. Convert multi-line text to a single line with custom separator. Free tool, no signup required.</x-slot:description>
    <x-slot:keywords>remove line breaks, remove line breaks online, line break remover, remove newlines, convert multiline to single line</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/remove-line-breaks') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Remove Line Breaks Online - Free Line Break Remover | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Remove line breaks from text online. Convert multi-line text to a single line with custom separator. Free tool, no signup required.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/remove-line-breaks') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Remove Line Breaks",
            "description": "Remove line breaks from text online. Convert multi-line text to a single line with custom separator. Free tool, no signup required.",
            "url": "https://hafiz.dev/tools/remove-line-breaks",
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
                    "name": "Remove Line Breaks",
                    "item": "https://hafiz.dev/tools/remove-line-breaks"
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
                    "name": "How do I remove line breaks from text?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Simply paste or type your multi-line text into the input box. The tool will automatically remove line breaks and display the result in the output box. You can choose to replace line breaks with spaces, commas, custom text, or nothing at all."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I replace line breaks with a custom separator?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! You can choose from several replacement options: Space (default), Nothing (empty), Comma, Comma + Space, Semicolon, Pipe, or Custom. Select 'Custom' to enter any text you want to use as a separator between lines."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I preserve paragraph breaks while removing line breaks?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Enable the 'Preserve paragraph breaks' option to keep double newlines (paragraph breaks) intact while removing single line breaks within paragraphs. This is useful for maintaining document structure."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does it remove both Windows (CRLF) and Unix (LF) line breaks?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! The tool automatically handles all line break formats including Windows (CRLF), Unix/Linux (LF), and old Mac (CR) line endings. All formats are processed correctly regardless of your operating system."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is the text processed on my computer?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! All text processing happens entirely in your browser using JavaScript. Your text never leaves your device or gets sent to any server, ensuring complete privacy and security."
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
                    <li class="text-gold">Remove Line Breaks</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Remove Line Breaks</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert multi-line text to a single line. Replace line breaks with custom separators or remove them entirely.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options Panel --}}
                <div class="bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
                    <h3 class="text-light font-medium mb-4">Options</h3>

                    <div class="grid md:grid-cols-2 gap-4">
                        {{-- Replacement Character --}}
                        <div>
                            <label for="replacement-select" class="block text-light-muted text-sm mb-2">Replacement character:</label>
                            <select id="replacement-select" class="w-full bg-transparent border border-gold/30 rounded-lg px-4 py-2 text-light focus:border-gold focus:outline-none">
                                <option value="space" selected>Space</option>
                                <option value="nothing">Nothing (empty)</option>
                                <option value="comma">Comma</option>
                                <option value="comma-space">Comma + Space</option>
                                <option value="semicolon">Semicolon</option>
                                <option value="pipe">Pipe</option>
                                <option value="custom">Custom</option>
                            </select>
                        </div>

                        {{-- Custom Separator Input --}}
                        <div id="custom-separator-container" class="hidden">
                            <label for="custom-separator" class="block text-light-muted text-sm mb-2">Custom separator:</label>
                            <input type="text" id="custom-separator" class="w-full bg-transparent border border-gold/30 rounded-lg px-4 py-2 text-light placeholder-light-muted/50 focus:border-gold focus:outline-none" placeholder="Enter custom separator">
                        </div>
                    </div>

                    {{-- Checkboxes --}}
                    <div class="mt-4 space-y-2">
                        <label class="flex items-center gap-2 cursor-pointer text-light-muted hover:text-light transition-colors">
                            <input type="checkbox" id="remove-empty-only" class="w-4 h-4 rounded border-gold/30 text-gold focus:ring-gold focus:ring-offset-0">
                            <span class="text-sm">Remove empty lines only</span>
                        </label>

                        <label class="flex items-center gap-2 cursor-pointer text-light-muted hover:text-light transition-colors">
                            <input type="checkbox" id="trim-lines" class="w-4 h-4 rounded border-gold/30 text-gold focus:ring-gold focus:ring-offset-0" checked>
                            <span class="text-sm">Trim each line before joining</span>
                        </label>

                        <label class="flex items-center gap-2 cursor-pointer text-light-muted hover:text-light transition-colors">
                            <input type="checkbox" id="preserve-paragraphs" class="w-4 h-4 rounded border-gold/30 text-gold focus:ring-gold focus:ring-offset-0">
                            <span class="text-sm">Preserve paragraph breaks (double newlines)</span>
                        </label>
                    </div>
                </div>

                {{-- Input/Output Grid --}}
                <div class="grid md:grid-cols-2 gap-4 mb-6">
                    {{-- Input --}}
                    <div class="flex flex-col">
                        <label for="text-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Input (Multi-line text)
                        </label>
                        <textarea id="text-input"
                                  class="flex-1 bg-darkBg border border-gold/20 rounded-lg p-4 text-light font-mono text-sm placeholder-light-muted/50 resize-y focus:border-gold/50 focus:outline-none"
                                  style="min-height: 400px;"
                                  placeholder="Paste your multi-line text here..."
                                  spellcheck="false"></textarea>
                    </div>

                    {{-- Output --}}
                    <div class="flex flex-col">
                        <label for="text-output" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            Output (Single line)
                        </label>
                        <textarea id="text-output"
                                  class="flex-1 bg-darkBg border border-gold/20 rounded-lg p-4 text-light font-mono text-sm placeholder-light-muted/50 resize-y focus:border-gold/50 focus:outline-none"
                                  style="min-height: 400px;"
                                  placeholder="Result will appear here..."
                                  readonly
                                  spellcheck="false"></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-4">
                    <button id="btn-remove" class="px-4 py-2 bg-gold text-darkBg rounded-lg hover:bg-gold/90 transition-all duration-300 font-medium flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Remove Breaks
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
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
                        <div id="stat-lines-before" class="text-2xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-xs">Lines Before</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
                        <div id="stat-lines-after" class="text-2xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-xs">Lines After</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
                        <div id="stat-chars-before" class="text-2xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-xs">Characters Before</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
                        <div id="stat-chars-after" class="text-2xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-xs">Characters After</div>
                    </div>
                </div>

                {{-- Success Notification --}}
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
            </div>

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔄</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Flexible Separators</h3>
                    <p class="text-light-muted text-sm">Replace line breaks with spaces, commas, custom text, or nothing at all.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">⚙️</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Smart Options</h3>
                    <p class="text-light-muted text-sm">Preserve paragraph breaks, trim lines, or remove only empty lines.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All processing in browser, your text never leaves your device.</p>
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
                            <span class="text-light font-medium">How do I remove line breaks from text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Simply paste or type your multi-line text into the input box. The tool will automatically remove line breaks and display the result in the output box. You can choose to replace line breaks with spaces, commas, custom text, or nothing at all.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I replace line breaks with a custom separator?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! You can choose from several replacement options: Space (default), Nothing (empty), Comma, Comma + Space, Semicolon, Pipe, or Custom. Select "Custom" to enter any text you want to use as a separator between lines.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I preserve paragraph breaks while removing line breaks?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Enable the "Preserve paragraph breaks" option to keep double newlines (paragraph breaks) intact while removing single line breaks within paragraphs. This is useful for maintaining document structure.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does it remove both Windows (CRLF) and Unix (LF) line breaks?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! The tool automatically handles all line break formats including Windows (CRLF), Unix/Linux (LF), and old Mac (CR) line endings. All formats are processed correctly regardless of your operating system.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is the text processed on my computer?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! All text processing happens entirely in your browser using JavaScript. Your text never leaves your device or gets sent to any server, ensuring complete privacy and security.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.remove-line-breaks-script')
    @endpush
</x-layout>
