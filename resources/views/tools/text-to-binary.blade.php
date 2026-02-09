<x-layout>
    <x-slot:title>Text to Binary Converter - Convert Text to Binary Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online text to binary converter. Convert text to binary code and binary to text instantly. Supports ASCII and UTF-8 encoding with multiple output formats.</x-slot:description>
    <x-slot:keywords>text to binary, convert text to binary, text to binary converter, binary to text, binary converter, binary translator, text to binary code</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/text-to-binary') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Text to Binary Converter - Convert Text to Binary Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online text to binary converter. Convert text to binary code and binary to text instantly. Supports ASCII and UTF-8 encoding.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/text-to-binary') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Text to Binary Converter",
            "description": "Free online text to binary converter. Convert text to binary code and binary to text instantly.",
            "url": "https://hafiz.dev/tools/text-to-binary",
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
                { "@@type": "ListItem", "position": 3, "name": "Text to Binary", "item": "https://hafiz.dev/tools/text-to-binary" }
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
                    "name": "How do I convert text to binary?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Type or paste your text into the input field and the tool instantly converts each character to its binary representation. Each character becomes an 8-bit binary number (e.g., 'A' = 01000001)."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is binary code?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Binary code is a number system that uses only two digits: 0 and 1. Computers use binary to store and process all data, including text, images, and programs. Each binary digit is called a 'bit', and 8 bits make a 'byte' which can represent one ASCII character."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I convert binary back to text?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Click the Swap button to switch to Binary to Text mode. Paste binary code (space-separated 8-bit groups) and it will be converted back to readable text instantly."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the binary code for the letter A?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Uppercase 'A' is 01000001 in binary (decimal 65). Lowercase 'a' is 01100001 in binary (decimal 97). The difference between uppercase and lowercase letters in binary is always the 6th bit."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does this tool support emoji and special characters?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! When UTF-8 encoding is selected, the tool handles all Unicode characters including emoji, accented letters, and characters from other languages. Each character may use multiple bytes in UTF-8 encoding."
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
                    <li class="text-gold">Text to Binary</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Text to Binary Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert text to binary code and binary back to text instantly. Supports ASCII and UTF-8 encoding with multiple output formats.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="encoding" class="text-light font-semibold mb-2 block text-sm">Encoding</label>
                            <select id="encoding" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="ascii">ASCII (7-bit)</option>
                                <option value="utf8" selected>UTF-8</option>
                            </select>
                        </div>
                        <div>
                            <label for="separator" class="text-light font-semibold mb-2 block text-sm">Separator</label>
                            <select id="separator" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value=" ">Space</option>
                                <option value="  ">Double Space</option>
                                <option value="\n">New Line</option>
                                <option value=", ">Comma</option>
                                <option value="">None</option>
                            </select>
                        </div>
                        <div>
                            <label for="output-format" class="text-light font-semibold mb-2 block text-sm">Output Format</label>
                            <select id="output-format" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="binary">Binary (01000001)</option>
                                <option value="decimal">Decimal (65)</option>
                                <option value="hex">Hexadecimal (41)</option>
                                <option value="octal">Octal (101)</option>
                            </select>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="add-prefix" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Add prefix (0b / 0x / 0o)</span>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Direction Label --}}
                <div class="text-center mb-4">
                    <span id="direction-label" class="inline-flex items-center gap-2 px-4 py-1.5 bg-gold/10 border border-gold/30 rounded-full text-gold text-sm font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        Text → Binary
                    </span>
                </div>

                {{-- Input / Output --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    {{-- Input --}}
                    <div class="flex flex-col">
                        <label for="text-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            <span id="input-label">Text Input</span>
                        </label>
                        <textarea
                            id="text-input"
                            class="flex-1 min-h-[220px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Type or paste your text here..."
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output --}}
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span id="output-label">Binary Output</span>
                        </label>
                        <textarea
                            id="binary-output"
                            class="flex-1 min-h-[220px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="Binary code will appear here..."
                            readonly
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Convert
                    </button>
                    <button id="btn-swap" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
                        Swap Direction
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
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
                <div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div id="stat-chars" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Characters</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-bytes" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Bytes</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-bits" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Total Bits</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-encoding" class="text-2xl font-bold text-light mb-1">—</div>
                            <div class="text-light-muted text-sm">Encoding</div>
                        </div>
                    </div>
                </div>

                {{-- Character Breakdown Table --}}
                <div id="breakdown" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
                    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                        Character Breakdown
                        <span class="text-light-muted font-normal">(first 50 characters)</span>
                    </h3>
                    <div class="overflow-x-auto border border-gold/10 rounded-lg">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="bg-darkCard border-b border-gold/10">
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gold uppercase">Char</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gold uppercase">Decimal</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gold uppercase">Hex</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gold uppercase">Octal</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gold uppercase">Binary</th>
                                </tr>
                            </thead>
                            <tbody id="breakdown-body" class="divide-y divide-gold/5"></tbody>
                        </table>
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
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Bidirectional</h3>
                    <p class="text-light-muted text-sm">Convert text to binary and binary back to text. Click the Swap button to switch direction instantly. Supports decimal, hex, and octal input too.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">UTF-8 Support</h3>
                    <p class="text-light-muted text-sm">Handle any character including emoji, accented letters, and international scripts. UTF-8 encoding preserves multi-byte characters correctly.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Character Breakdown</h3>
                    <p class="text-light-muted text-sm">See a detailed table showing each character with its decimal, hexadecimal, octal, and binary values side by side.</p>
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
                            <span class="text-light font-medium">How do I convert text to binary?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Type or paste your text into the input field and the tool instantly converts each character to its binary representation. Each ASCII character becomes an 8-bit binary number. For example, <code class="bg-darkCard px-1 rounded">A</code> becomes <code class="bg-darkCard px-1 rounded">01000001</code> and <code class="bg-darkCard px-1 rounded">Hello</code> becomes <code class="bg-darkCard px-1 rounded">01001000 01100101 01101100 01101100 01101111</code>.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is binary code?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Binary code is a number system that uses only two digits: 0 and 1. Computers use binary to store and process all data. Each binary digit is called a "bit", and 8 bits make a "byte" which can represent one ASCII character (values 0–255). Binary is the fundamental language of all digital electronics.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I convert binary back to text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Click the "Swap Direction" button to switch to Binary → Text mode. Paste your binary code (space-separated 8-bit groups like <code class="bg-darkCard px-1 rounded">01001000 01101001</code>) into the input field and it will be converted back to readable text.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the binary code for the letter A?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Uppercase <code class="bg-darkCard px-1 rounded">A</code> is <code class="bg-darkCard px-1 rounded">01000001</code> in binary (decimal 65). Lowercase <code class="bg-darkCard px-1 rounded">a</code> is <code class="bg-darkCard px-1 rounded">01100001</code> (decimal 97). The difference between uppercase and lowercase in binary is always the 6th bit (bit 5).
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does this tool support emoji and special characters?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Select "UTF-8" encoding to handle all Unicode characters including emoji, accented letters (é, ü, ñ), and characters from other scripts (Chinese, Arabic, Cyrillic). In UTF-8, each character may use 1 to 4 bytes depending on the code point.
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
        const textInput = document.getElementById('text-input');
        const binaryOutput = document.getElementById('binary-output');
        const encoding = document.getElementById('encoding');
        const separatorSelect = document.getElementById('separator');
        const outputFormat = document.getElementById('output-format');
        const addPrefix = document.getElementById('add-prefix');
        const directionLabel = document.getElementById('direction-label');
        const inputLabel = document.getElementById('input-label');
        const outputLabel = document.getElementById('output-label');
        const btnConvert = document.getElementById('btn-convert');
        const btnSwap = document.getElementById('btn-swap');
        const btnCopy = document.getElementById('btn-copy');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const statsBar = document.getElementById('stats-bar');
        const breakdown = document.getElementById('breakdown');
        const breakdownBody = document.getElementById('breakdown-body');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        let isTextToBinary = true;

        // ===== Conversion Functions =====

        function textToBytes(text, enc) {
            if (enc === 'utf8') {
                return new TextEncoder().encode(text);
            }
            // ASCII
            return Uint8Array.from(text.split('').map(c => {
                const code = c.charCodeAt(0);
                return code > 127 ? 63 : code; // Replace non-ASCII with '?'
            }));
        }

        function formatByte(byte, format, prefix) {
            switch (format) {
                case 'binary':
                    return (prefix ? '0b' : '') + byte.toString(2).padStart(8, '0');
                case 'decimal':
                    return byte.toString(10);
                case 'hex':
                    return (prefix ? '0x' : '') + byte.toString(16).toUpperCase().padStart(2, '0');
                case 'octal':
                    return (prefix ? '0o' : '') + byte.toString(8).padStart(3, '0');
                default:
                    return byte.toString(2).padStart(8, '0');
            }
        }

        function getSeparator() {
            const val = separatorSelect.value;
            if (val === '\\n') return '\n';
            return val;
        }

        function convertTextToBinary() {
            const text = textInput.value;
            if (!text) {
                binaryOutput.value = '';
                statsBar.classList.add('hidden');
                breakdown.classList.add('hidden');
                return;
            }

            const bytes = textToBytes(text, encoding.value);
            const format = outputFormat.value;
            const prefix = addPrefix.checked;
            const sep = getSeparator();

            const formatted = Array.from(bytes).map(b => formatByte(b, format, prefix));
            binaryOutput.value = formatted.join(sep);

            // Stats
            document.getElementById('stat-chars').textContent = [...text].length;
            document.getElementById('stat-bytes').textContent = bytes.length;
            document.getElementById('stat-bits').textContent = bytes.length * 8;
            document.getElementById('stat-encoding').textContent = encoding.value === 'utf8' ? 'UTF-8' : 'ASCII';
            statsBar.classList.remove('hidden');

            // Breakdown table (first 50 chars)
            const chars = [...text].slice(0, 50);
            breakdownBody.innerHTML = chars.map(ch => {
                const charBytes = textToBytes(ch, encoding.value);
                const dec = Array.from(charBytes).map(b => b).join(' ');
                const hex = Array.from(charBytes).map(b => b.toString(16).toUpperCase().padStart(2, '0')).join(' ');
                const oct = Array.from(charBytes).map(b => b.toString(8).padStart(3, '0')).join(' ');
                const bin = Array.from(charBytes).map(b => b.toString(2).padStart(8, '0')).join(' ');
                const display = ch === ' ' ? '␣' : ch === '\n' ? '↵' : ch === '\t' ? '⇥' : ch;
                return `<tr class="hover:bg-gold/5 transition-colors">
                    <td class="px-3 py-2 font-mono text-lg text-gold font-bold">${escapeHtml(display)}</td>
                    <td class="px-3 py-2 font-mono text-light-muted">${dec}</td>
                    <td class="px-3 py-2 font-mono text-light-muted">${hex}</td>
                    <td class="px-3 py-2 font-mono text-light-muted">${oct}</td>
                    <td class="px-3 py-2 font-mono text-light-muted text-xs">${bin}</td>
                </tr>`;
            }).join('');
            breakdown.classList.remove('hidden');

            showSuccess(`Converted ${[...text].length} characters to ${format}`);
        }

        function convertBinaryToText() {
            const input = textInput.value.trim();
            if (!input) {
                binaryOutput.value = '';
                statsBar.classList.add('hidden');
                breakdown.classList.add('hidden');
                return;
            }

            try {
                // Parse input — detect format from current output format setting
                const parts = input.split(/[\s,]+/).filter(Boolean);
                const bytes = parts.map(p => {
                    // Strip known prefixes
                    let cleaned = p.replace(/^0[bBxXoO]/, '');

                    // Detect format
                    if (/^[01]{1,8}$/.test(cleaned)) {
                        return parseInt(cleaned, 2);
                    } else if (/^[0-9a-fA-F]{1,2}$/.test(cleaned) && (p.startsWith('0x') || p.startsWith('0X'))) {
                        return parseInt(cleaned, 16);
                    } else if (/^[0-7]{1,3}$/.test(cleaned) && (p.startsWith('0o') || p.startsWith('0O'))) {
                        return parseInt(cleaned, 8);
                    } else if (/^[0-9]{1,3}$/.test(cleaned)) {
                        return parseInt(cleaned, 10);
                    } else if (/^[0-9a-fA-F]{2}$/.test(cleaned)) {
                        return parseInt(cleaned, 16);
                    } else if (/^[01]{8}$/.test(p)) {
                        return parseInt(p, 2);
                    }
                    throw new Error(`Invalid value: "${p}"`);
                });

                // Validate bytes
                for (const b of bytes) {
                    if (isNaN(b) || b < 0 || b > 255) {
                        throw new Error('Values must be between 0 and 255');
                    }
                }

                let text;
                if (encoding.value === 'utf8') {
                    text = new TextDecoder('utf-8').decode(new Uint8Array(bytes));
                } else {
                    text = bytes.map(b => String.fromCharCode(b)).join('');
                }

                binaryOutput.value = text;

                // Stats
                document.getElementById('stat-chars').textContent = [...text].length;
                document.getElementById('stat-bytes').textContent = bytes.length;
                document.getElementById('stat-bits').textContent = bytes.length * 8;
                document.getElementById('stat-encoding').textContent = encoding.value === 'utf8' ? 'UTF-8' : 'ASCII';
                statsBar.classList.remove('hidden');
                breakdown.classList.add('hidden');

                showSuccess(`Converted ${bytes.length} bytes to text`);
            } catch (e) {
                showError('Invalid input: ' + e.message);
            }
        }

        function convert() {
            if (isTextToBinary) {
                convertTextToBinary();
            } else {
                convertBinaryToText();
            }
        }

        function swapDirection() {
            isTextToBinary = !isTextToBinary;
            if (isTextToBinary) {
                directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg> Text → Binary';
                inputLabel.textContent = 'Text Input';
                outputLabel.textContent = 'Binary Output';
                textInput.placeholder = 'Type or paste your text here...';
                binaryOutput.placeholder = 'Binary code will appear here...';
            } else {
                directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path></svg> Binary → Text';
                inputLabel.textContent = 'Binary Input';
                outputLabel.textContent = 'Text Output';
                textInput.placeholder = 'Paste binary code here (e.g., 01001000 01101001)...';
                binaryOutput.placeholder = 'Decoded text will appear here...';
            }
            // Swap contents
            const temp = textInput.value;
            textInput.value = binaryOutput.value;
            binaryOutput.value = '';
            statsBar.classList.add('hidden');
            breakdown.classList.add('hidden');
        }

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }

        function showSuccess(msg) {
            successMessage.textContent = msg;
            successNotification.classList.remove('hidden');
            errorNotification.classList.add('hidden');
            setTimeout(() => successNotification.classList.add('hidden'), 3000);
        }

        function showError(msg) {
            errorMessage.textContent = msg;
            errorNotification.classList.remove('hidden');
            successNotification.classList.add('hidden');
            setTimeout(() => errorNotification.classList.add('hidden'), 5000);
        }

        // ===== Event Listeners =====
        btnConvert.addEventListener('click', convert);
        btnSwap.addEventListener('click', swapDirection);

        btnCopy.addEventListener('click', function() {
            const output = binaryOutput.value;
            if (!output) { showError('Nothing to copy'); return; }
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        });

        btnSample.addEventListener('click', function() {
            if (isTextToBinary) {
                textInput.value = 'Hello, World! 🌍';
            } else {
                textInput.value = '01001000 01100101 01101100 01101100 01101111';
            }
            binaryOutput.value = '';
            statsBar.classList.add('hidden');
            breakdown.classList.add('hidden');
        });

        btnClear.addEventListener('click', function() {
            textInput.value = '';
            binaryOutput.value = '';
            statsBar.classList.add('hidden');
            breakdown.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        });

        // Real-time conversion
        let debounceTimer;
        textInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(convert, 300);
        });

        // Re-convert on option change
        [encoding, separatorSelect, outputFormat, addPrefix].forEach(el => {
            el.addEventListener('change', () => { if (textInput.value) convert(); });
        });

        // Keyboard shortcut
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
        });
    })();
    </script>
    @endpush
</x-layout>
