<x-layout>
    <x-slot:title>ASCII Table & Generator - Complete ASCII Chart Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online ASCII table with all 128 characters. Search, filter, and convert text to ASCII codes instantly. Includes decimal, hex, octal, binary, and HTML entity values.</x-slot:description>
    <x-slot:keywords>ascii table, ascii table generator, ascii chart, ascii codes, ascii characters, text to ascii, ascii converter, ascii reference</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/ascii-table') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>ASCII Table & Generator - Complete ASCII Chart Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online ASCII table with all 128 characters. Search, filter, and convert text to ASCII codes. Includes decimal, hex, octal, binary values.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/ascii-table') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "ASCII Table & Generator",
            "description": "Free online ASCII table with all 128 characters. Search, filter, and convert text to ASCII codes instantly.",
            "url": "https://hafiz.dev/tools/ascii-table",
            "applicationCategory": "DeveloperApplication",
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
                { "@@type": "ListItem", "position": 3, "name": "ASCII Table", "item": "https://hafiz.dev/tools/ascii-table" }
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
                    "name": "What is ASCII?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "ASCII (American Standard Code for Information Interchange) is a character encoding standard that assigns numeric values to 128 characters, including letters (A-Z, a-z), digits (0-9), punctuation marks, and control characters. It was first published in 1963 and remains the foundation of modern text encoding."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How many characters are in the ASCII table?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The standard ASCII table contains 128 characters (0-127). This includes 33 control characters (0-31 and 127), 95 printable characters including letters, digits, punctuation, and the space character (32)."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between ASCII and Unicode?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "ASCII only covers 128 characters (English letters, digits, basic symbols). Unicode is a superset that supports over 149,000 characters from virtually all writing systems worldwide, including emoji. The first 128 Unicode code points are identical to ASCII."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the ASCII value of 'A'?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The uppercase letter 'A' has ASCII value 65 in decimal, 41 in hexadecimal, 101 in octal, and 01000001 in binary. Lowercase 'a' is 97 (decimal), 61 (hex), 141 (octal), 01100001 (binary)."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I convert text to ASCII codes?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Use the Text to ASCII converter on this page. Type or paste any text and see the ASCII decimal, hexadecimal, or binary values for each character instantly. You can also search the ASCII table to find specific character codes."
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
                    <li class="text-gold">ASCII Table</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">ASCII Table & Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Complete ASCII reference table with all 128 characters. Search, filter by category, and convert text to ASCII codes instantly.
                </p>
            </div>

            {{-- Text to ASCII Converter --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <x-tool-privacy-banner />
                <h2 class="text-lg font-semibold text-light mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    Text ↔ ASCII Converter
                </h2>

                <div class="grid lg:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="text-input" class="text-light font-semibold mb-2 block text-sm">Text Input</label>
                        <textarea
                            id="text-input"
                            class="w-full h-28 bg-darkBg border border-gold/20 rounded-lg p-3 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Type text here to see ASCII codes..."
                            spellcheck="false"
                        ></textarea>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="text-light font-semibold text-sm">ASCII Output</label>
                            <select id="output-format" class="bg-darkBg border border-gold/20 rounded px-2 py-1 text-xs text-light focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="decimal">Decimal</option>
                                <option value="hex">Hexadecimal</option>
                                <option value="binary">Binary</option>
                                <option value="octal">Octal</option>
                                <option value="html">HTML Entity</option>
                            </select>
                        </div>
                        <textarea
                            id="ascii-output"
                            class="w-full h-28 bg-darkBg border border-gold/20 rounded-lg p-3 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="ASCII codes will appear here..."
                            readonly
                        ></textarea>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3">
                    <button id="btn-copy-ascii" class="px-4 py-2 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-sm flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy Output
                    </button>
                    <button id="btn-swap" class="px-4 py-2 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-sm flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
                        Swap (ASCII → Text)
                    </button>
                    <button id="btn-clear-converter" class="px-4 py-2 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-sm flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                </div>
            </div>

            {{-- ASCII Table --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <h2 class="text-lg font-semibold text-light mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    Complete ASCII Table (0–127)
                </h2>

                {{-- Filters --}}
                <div class="mb-4 flex flex-wrap gap-3 items-center">
                    <div class="relative flex-1 min-w-[200px] max-w-sm">
                        <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-light-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <input
                            type="text"
                            id="table-search"
                            class="w-full bg-darkBg border border-gold/20 rounded-lg pl-10 pr-4 py-2 text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none"
                            placeholder="Search by char, code, or name..."
                        >
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button class="filter-btn px-3 py-1.5 rounded-lg text-xs font-medium border cursor-pointer transition-all bg-gold/20 border-gold text-gold" data-filter="all">All (128)</button>
                        <button class="filter-btn px-3 py-1.5 rounded-lg text-xs font-medium border cursor-pointer transition-all border-gold/20 text-light-muted hover:border-gold/50" data-filter="control">Control (33)</button>
                        <button class="filter-btn px-3 py-1.5 rounded-lg text-xs font-medium border cursor-pointer transition-all border-gold/20 text-light-muted hover:border-gold/50" data-filter="digits">Digits (10)</button>
                        <button class="filter-btn px-3 py-1.5 rounded-lg text-xs font-medium border cursor-pointer transition-all border-gold/20 text-light-muted hover:border-gold/50" data-filter="uppercase">A–Z (26)</button>
                        <button class="filter-btn px-3 py-1.5 rounded-lg text-xs font-medium border cursor-pointer transition-all border-gold/20 text-light-muted hover:border-gold/50" data-filter="lowercase">a–z (26)</button>
                        <button class="filter-btn px-3 py-1.5 rounded-lg text-xs font-medium border cursor-pointer transition-all border-gold/20 text-light-muted hover:border-gold/50" data-filter="symbols">Symbols (33)</button>
                    </div>
                </div>

                {{-- Table --}}
                <div class="overflow-x-auto border border-gold/10 rounded-lg">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-darkBg border-b border-gold/10">
                                <th class="px-3 py-3 text-left text-xs font-semibold text-gold uppercase tracking-wider cursor-pointer hover:text-gold-light" data-sort="dec">Dec ↕</th>
                                <th class="px-3 py-3 text-left text-xs font-semibold text-gold uppercase tracking-wider">Hex</th>
                                <th class="px-3 py-3 text-left text-xs font-semibold text-gold uppercase tracking-wider">Oct</th>
                                <th class="px-3 py-3 text-left text-xs font-semibold text-gold uppercase tracking-wider">Binary</th>
                                <th class="px-3 py-3 text-left text-xs font-semibold text-gold uppercase tracking-wider">Char</th>
                                <th class="px-3 py-3 text-left text-xs font-semibold text-gold uppercase tracking-wider">HTML</th>
                                <th class="px-3 py-3 text-left text-xs font-semibold text-gold uppercase tracking-wider">Description</th>
                            </tr>
                        </thead>
                        <tbody id="ascii-table-body" class="divide-y divide-gold/5">
                            {{-- Generated via JS --}}
                        </tbody>
                    </table>
                </div>

                <div id="table-count" class="mt-3 text-light-muted text-sm text-center"></div>
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Search & Filter</h3>
                    <p class="text-light-muted text-sm">Instantly search by character, code, or description. Filter by category: control characters, digits, letters, or symbols.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Text ↔ ASCII</h3>
                    <p class="text-light-muted text-sm">Convert any text to ASCII decimal, hex, binary, or octal codes. Works both ways — paste ASCII codes to get text back.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">All 128 Characters</h3>
                    <p class="text-light-muted text-sm">Complete reference with decimal, hex, octal, binary, HTML entities, and human-readable descriptions for every ASCII character.</p>
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
                            <span class="text-light font-medium">What is ASCII?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            ASCII (American Standard Code for Information Interchange) is a character encoding standard that assigns numeric values to 128 characters. It was first published in 1963 and includes English letters (A-Z, a-z), digits (0-9), punctuation marks, and control characters. ASCII remains the foundation of modern text encoding systems like UTF-8.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How many characters are in the ASCII table?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The standard ASCII table contains 128 characters (codes 0–127). This includes 33 control characters (0–31 and 127), the space character (32), and 94 printable characters including uppercase letters, lowercase letters, digits, and punctuation symbols.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between ASCII and Unicode?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            ASCII covers only 128 characters (English letters, digits, basic symbols). Unicode is a superset that supports over 149,000 characters from virtually every writing system worldwide, including emoji, CJK characters, Arabic, Cyrillic, and more. The first 128 Unicode code points (U+0000 to U+007F) are identical to ASCII, making ASCII a subset of Unicode.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the ASCII value of 'A'?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Uppercase <code class="bg-darkCard px-1 rounded">A</code> has ASCII value 65 (decimal), 41 (hex), 101 (octal), and 01000001 (binary). Lowercase <code class="bg-darkCard px-1 rounded">a</code> is 97 (decimal), 61 (hex), 141 (octal), 01100001 (binary). The difference between uppercase and lowercase is always 32.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I convert text to ASCII codes?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Use the Text to ASCII converter at the top of this page. Type or paste any text and the ASCII values appear instantly. You can switch between decimal, hexadecimal, binary, octal, and HTML entity output formats using the dropdown menu.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @include('tools.partials.ascii-table-script')
    @endpush
</x-layout>
