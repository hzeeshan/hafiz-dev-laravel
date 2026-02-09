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
                {{-- Privacy Banner --}}
                <div class="mb-6 p-3 bg-green-500/10 border border-green-500/30 rounded-lg flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <span class="text-green-400 text-sm">Your data is processed entirely in your browser. Nothing is uploaded to any server.</span>
                </div>
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
    <script>
    (function() {
        // ===== ASCII Data =====
        const CONTROL_NAMES = {
            0:'NUL (Null)',1:'SOH (Start of Heading)',2:'STX (Start of Text)',3:'ETX (End of Text)',
            4:'EOT (End of Transmission)',5:'ENQ (Enquiry)',6:'ACK (Acknowledge)',7:'BEL (Bell)',
            8:'BS (Backspace)',9:'HT (Horizontal Tab)',10:'LF (Line Feed)',11:'VT (Vertical Tab)',
            12:'FF (Form Feed)',13:'CR (Carriage Return)',14:'SO (Shift Out)',15:'SI (Shift In)',
            16:'DLE (Data Link Escape)',17:'DC1 (Device Control 1)',18:'DC2 (Device Control 2)',
            19:'DC3 (Device Control 3)',20:'DC4 (Device Control 4)',21:'NAK (Negative Acknowledge)',
            22:'SYN (Synchronous Idle)',23:'ETB (End of Trans. Block)',24:'CAN (Cancel)',
            25:'EM (End of Medium)',26:'SUB (Substitute)',27:'ESC (Escape)',28:'FS (File Separator)',
            29:'GS (Group Separator)',30:'RS (Record Separator)',31:'US (Unit Separator)',
            32:'Space',127:'DEL (Delete)'
        };

        const PRINTABLE_NAMES = {
            33:'Exclamation mark',34:'Double quote',35:'Hash / Number sign',36:'Dollar sign',
            37:'Percent',38:'Ampersand',39:'Single quote',40:'Left parenthesis',41:'Right parenthesis',
            42:'Asterisk',43:'Plus',44:'Comma',45:'Hyphen / Minus',46:'Period / Dot',47:'Slash',
            48:'Zero',49:'One',50:'Two',51:'Three',52:'Four',53:'Five',54:'Six',55:'Seven',
            56:'Eight',57:'Nine',58:'Colon',59:'Semicolon',60:'Less than',61:'Equals',
            62:'Greater than',63:'Question mark',64:'At sign',
            91:'Left bracket',92:'Backslash',93:'Right bracket',94:'Caret',95:'Underscore',96:'Backtick',
            123:'Left brace',124:'Pipe / Vertical bar',125:'Right brace',126:'Tilde'
        };

        const HTML_ENTITIES = {
            34:'&quot;',38:'&amp;',39:'&apos;',60:'&lt;',62:'&gt;',160:'&nbsp;'
        };

        function getCharData(code) {
            const hex = code.toString(16).toUpperCase().padStart(2, '0');
            const oct = code.toString(8).padStart(3, '0');
            const bin = code.toString(2).padStart(8, '0');
            const htmlEntity = HTML_ENTITIES[code] || `&#${code};`;

            let char, description, category;

            if (code <= 31 || code === 127) {
                const abbr = CONTROL_NAMES[code].split(' ')[0];
                char = abbr;
                description = CONTROL_NAMES[code];
                category = 'control';
            } else if (code === 32) {
                char = '␣';
                description = 'Space';
                category = 'symbols';
            } else if (code >= 48 && code <= 57) {
                char = String.fromCharCode(code);
                description = PRINTABLE_NAMES[code] || `Digit ${char}`;
                category = 'digits';
            } else if (code >= 65 && code <= 90) {
                char = String.fromCharCode(code);
                description = `Uppercase ${char}`;
                category = 'uppercase';
            } else if (code >= 97 && code <= 122) {
                char = String.fromCharCode(code);
                description = `Lowercase ${char}`;
                category = 'lowercase';
            } else {
                char = String.fromCharCode(code);
                description = PRINTABLE_NAMES[code] || `Character ${char}`;
                category = 'symbols';
            }

            return { code, hex, oct, bin, char, htmlEntity, description, category };
        }

        // Build all 128 characters
        const allChars = [];
        for (let i = 0; i < 128; i++) {
            allChars.push(getCharData(i));
        }

        // ===== Table Rendering =====
        const tableBody = document.getElementById('ascii-table-body');
        const tableSearch = document.getElementById('table-search');
        const tableCount = document.getElementById('table-count');
        const filterBtns = document.querySelectorAll('.filter-btn');

        let currentFilter = 'all';

        function renderTable(filter, search) {
            let filtered = allChars;

            // Category filter
            if (filter !== 'all') {
                filtered = filtered.filter(c => c.category === filter);
            }

            // Search filter
            if (search) {
                const q = search.toLowerCase();
                filtered = filtered.filter(c =>
                    c.code.toString() === q ||
                    c.hex.toLowerCase() === q ||
                    c.char.toLowerCase().includes(q) ||
                    c.description.toLowerCase().includes(q) ||
                    c.htmlEntity.toLowerCase().includes(q)
                );
            }

            const categoryColors = {
                control: 'text-red-400/70',
                digits: 'text-blue-400',
                uppercase: 'text-green-400',
                lowercase: 'text-emerald-400',
                symbols: 'text-yellow-400'
            };

            tableBody.innerHTML = filtered.map(c => {
                const charClass = categoryColors[c.category] || 'text-light';
                const isControl = c.category === 'control';
                return `<tr class="hover:bg-gold/5 transition-colors">
                    <td class="px-3 py-2.5 font-mono text-light font-semibold">${c.code}</td>
                    <td class="px-3 py-2.5 font-mono text-light-muted">0x${c.hex}</td>
                    <td class="px-3 py-2.5 font-mono text-light-muted">${c.oct}</td>
                    <td class="px-3 py-2.5 font-mono text-light-muted text-xs">${c.bin}</td>
                    <td class="px-3 py-2.5 font-mono text-lg ${charClass} ${isControl ? 'text-xs' : 'font-bold'}">${escapeHtml(c.char)}</td>
                    <td class="px-3 py-2.5 font-mono text-light-muted text-xs">${escapeHtml(c.htmlEntity)}</td>
                    <td class="px-3 py-2.5 text-light-muted text-xs">${c.description}</td>
                </tr>`;
            }).join('');

            tableCount.textContent = `Showing ${filtered.length} of 128 characters`;
        }

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }

        // Filter buttons
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => {
                    b.classList.remove('bg-gold/20', 'border-gold', 'text-gold');
                    b.classList.add('border-gold/20', 'text-light-muted');
                });
                this.classList.add('bg-gold/20', 'border-gold', 'text-gold');
                this.classList.remove('border-gold/20', 'text-light-muted');
                currentFilter = this.dataset.filter;
                renderTable(currentFilter, tableSearch.value.trim());
            });
        });

        // Search
        let searchTimer;
        tableSearch.addEventListener('input', function() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(() => {
                renderTable(currentFilter, this.value.trim());
            }, 200);
        });

        // ===== Text ↔ ASCII Converter =====
        const textInput = document.getElementById('text-input');
        const asciiOutput = document.getElementById('ascii-output');
        const outputFormat = document.getElementById('output-format');
        const btnCopyAscii = document.getElementById('btn-copy-ascii');
        const btnSwap = document.getElementById('btn-swap');
        const btnClear = document.getElementById('btn-clear-converter');

        function textToAscii(text) {
            const format = outputFormat.value;
            return text.split('').map(ch => {
                const code = ch.charCodeAt(0);
                switch (format) {
                    case 'decimal': return code;
                    case 'hex': return '0x' + code.toString(16).toUpperCase().padStart(2, '0');
                    case 'binary': return code.toString(2).padStart(8, '0');
                    case 'octal': return code.toString(8).padStart(3, '0');
                    case 'html': return `&#${code};`;
                    default: return code;
                }
            }).join(' ');
        }

        function asciiToText(input) {
            const parts = input.trim().split(/[\s,]+/).filter(Boolean);
            return parts.map(p => {
                let code;
                if (p.startsWith('0x') || p.startsWith('0X')) {
                    code = parseInt(p, 16);
                } else if (p.startsWith('&#') && p.endsWith(';')) {
                    code = parseInt(p.slice(2, -1));
                } else if (/^[01]{7,8}$/.test(p)) {
                    code = parseInt(p, 2);
                } else {
                    code = parseInt(p);
                }
                return (isNaN(code) || code < 0 || code > 127) ? '?' : String.fromCharCode(code);
            }).join('');
        }

        function updateConverter() {
            const text = textInput.value;
            if (!text) { asciiOutput.value = ''; return; }
            asciiOutput.value = textToAscii(text);
        }

        textInput.addEventListener('input', updateConverter);
        outputFormat.addEventListener('change', updateConverter);

        btnSwap.addEventListener('click', function() {
            const codes = asciiOutput.value.trim();
            if (!codes) return;
            const text = asciiToText(codes);
            textInput.value = text;
            asciiOutput.value = textToAscii(text);
        });

        btnCopyAscii.addEventListener('click', function() {
            const output = asciiOutput.value;
            if (!output) return;
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        });

        btnClear.addEventListener('click', function() {
            textInput.value = '';
            asciiOutput.value = '';
        });

        // Initialize table
        renderTable('all', '');
    })();
    </script>
    @endpush
</x-layout>
