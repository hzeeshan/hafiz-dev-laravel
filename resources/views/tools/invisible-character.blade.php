<x-layout>
    <x-slot:title>Invisible Character - Free Online Blank Text Copy Paste | hafiz.dev</x-slot:title>
    <x-slot:description>Free online invisible character generator. Copy and paste blank, empty, and invisible Unicode characters for usernames, messages, and forms. No signup required.</x-slot:description>
    <x-slot:keywords>invisible character, blank character, empty character, invisible text, blank space copy paste, zero width space, invisible unicode, empty text copy</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/invisible-character') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Invisible Character - Free Online Blank Text Copy Paste | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online invisible character generator. Copy and paste blank, empty, and invisible Unicode characters instantly. No signup required.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/invisible-character') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Invisible Character Generator",
            "description": "Free online invisible character generator. Copy and paste blank, empty, and invisible Unicode characters for usernames, messages, and forms.",
            "url": "https://hafiz.dev/tools/invisible-character",
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
                    "name": "Invisible Character",
                    "item": "https://hafiz.dev/tools/invisible-character"
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
                    "name": "What is an invisible character?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "An invisible character is a Unicode character that takes up space but has no visible glyph. Common examples include the Zero Width Space (U+200B), Zero Width Non-Joiner (U+200C), and Hangul Filler (U+3164). These characters are useful for blank usernames, empty messages, and formatting tricks."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I copy an invisible character?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Click the 'Copy' button next to any invisible character in the list. The character will be copied to your clipboard instantly. You can also generate multiple invisible characters and copy them all at once from the output area."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Where can I use invisible characters?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Invisible characters work on most platforms including Discord, WhatsApp, Instagram, Twitter/X, Telegram, Steam, and more. Common uses include blank usernames, empty messages, spacing tricks in bios, and bypassing required field validators."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between invisible characters?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Different invisible characters have different Unicode properties. Zero Width Space (U+200B) has zero display width and is widely supported. Hangul Filler (U+3164) takes visible space and works well for blank names. Braille Blank (U+2800) is often the most compatible for empty-looking text on social media."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is this tool free and private?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, this tool is completely free with no signup required. All processing happens in your browser using JavaScript. No data is ever sent to any server."
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
                    <li class="text-gold">Invisible Character</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Invisible Character</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Copy and paste invisible, blank, and empty Unicode characters. Perfect for usernames, empty messages, bios, and formatting tricks.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options Panel --}}
                <div class="flex flex-wrap items-center gap-4 mb-4 p-3 rounded-lg bg-darkBg border border-gold/10">
                    <div class="flex items-center gap-2">
                        <label for="char-type" class="text-light-muted text-sm">Character:</label>
                        <select id="char-type" class="bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-2 text-sm focus:border-gold focus:outline-none">
                            <option value="zwsp">Zero Width Space (U+200B)</option>
                            <option value="zwnj">Zero Width Non-Joiner (U+200C)</option>
                            <option value="zwj">Zero Width Joiner (U+200D)</option>
                            <option value="wj">Word Joiner (U+2060)</option>
                            <option value="hangul" selected>Hangul Filler (U+3164)</option>
                            <option value="braille">Braille Blank (U+2800)</option>
                            <option value="mongolian">Mongolian Vowel (U+180E)</option>
                            <option value="nbsp">No-Break Space (U+00A0)</option>
                        </select>
                    </div>

                    <div class="flex items-center gap-2">
                        <label for="repeat-count" class="text-light-muted text-sm">Count:</label>
                        <input type="number" id="repeat-count" value="1" min="1" max="1000" class="w-20 bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-2 text-sm focus:border-gold focus:outline-none">
                    </div>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="opt-newline" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
                        <span class="text-light-muted text-sm">Separate with newlines</span>
                    </label>
                </div>

                {{-- Input/Output Grid --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
                    {{-- Character Table --}}
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                            Invisible Characters
                        </label>
                        <div id="char-table" class="flex-1 bg-darkBg border border-gold/20 rounded-lg p-4 overflow-auto" style="min-height: 400px;">
                            {{-- Populated by JS --}}
                        </div>
                    </div>

                    {{-- Output / Test Area --}}
                    <div class="flex flex-col">
                        <label for="output-text" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            Output / Test Area
                        </label>
                        <textarea
                            id="output-text"
                            class="flex-1 bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-y"
                            style="min-height: 400px;"
                            placeholder="Generated invisible characters will appear here. You can also paste text here to inspect invisible characters..."
                            spellcheck="false"
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-4">
                    <button id="btn-generate" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        Generate
                    </button>
                    <button id="btn-copy" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download
                    </button>
                    <button id="btn-inspect" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        Inspect
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
                        <div id="stat-total" class="text-2xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Total Characters</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-invisible" class="text-2xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Invisible Characters</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-visible" class="text-2xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Visible Characters</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-bytes" class="text-2xl font-bold text-gold mb-1">0 B</div>
                        <div class="text-light-muted text-sm">Size in Bytes</div>
                    </div>
                </div>

                {{-- Inspect Results --}}
                <div id="inspect-results" class="hidden mb-4">
                    <label class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        Character Inspection
                    </label>
                    <div id="inspect-output" class="mt-2 bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light overflow-auto max-h-64">
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
                    <div class="text-gold text-2xl mb-3">📋</div>
                    <h3 class="text-lg font-semibold text-light mb-2">8 Character Types</h3>
                    <p class="text-light-muted text-sm">Choose from Zero Width Space, Hangul Filler, Braille Blank, and 5 more invisible Unicode characters for any platform.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔍</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Character Inspector</h3>
                    <p class="text-light-muted text-sm">Paste any text to detect and identify hidden invisible characters with their Unicode code points and names.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. No data is sent to any server. Completely safe and private.</p>
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
                            <span class="text-light font-medium">What is an invisible character?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            An invisible character is a Unicode character that takes up space in a string but has no visible glyph. Common examples include the Zero Width Space (U+200B), Zero Width Non-Joiner (U+200C), and Hangul Filler (U+3164). They are useful for creating blank usernames, empty messages, and other formatting tricks on platforms like Discord, WhatsApp, and Instagram.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I copy an invisible character?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Click the "Copy" button next to any character in the table to copy a single invisible character. You can also select a character type, set a count, click "Generate", and then click the "Copy" button below the output to copy multiple invisible characters at once.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Where can I use invisible characters?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Invisible characters work on most platforms including Discord, WhatsApp, Instagram, Twitter/X, Telegram, Steam, TikTok, and more. Common uses include blank usernames, empty-looking messages, spacing tricks in bios, bypassing required field validators, and separating text without visible characters.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between invisible characters?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Different invisible characters have different Unicode properties and behavior. Zero Width Space (U+200B) has zero display width and is widely supported. Hangul Filler (U+3164) takes visible space and works well for blank names on many platforms. Braille Blank (U+2800) is often the most compatible for empty-looking text on social media. The best choice depends on the platform you are using.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is this tool free and private?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, this invisible character tool is completely free to use with no signup required. All processing happens entirely in your browser using JavaScript. No data is ever sent to any server, making it completely safe and private.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.invisible-character-script')
    @endpush
</x-layout>
