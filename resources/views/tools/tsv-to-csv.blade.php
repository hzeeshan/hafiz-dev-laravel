<x-layout>
    <x-slot:title>TSV to CSV Converter - Convert Tab to Comma Separated Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online TSV to CSV converter. Convert tab-separated values to comma-separated values instantly. Handles quoted fields and special characters. No signup required.</x-slot:description>
    <x-slot:keywords>tsv to csv, convert tsv to csv, tsv to csv converter, tab to comma separated, tsv to csv online</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/tsv-to-csv') }}</x-slot:canonical>

    <x-slot:ogTitle>TSV to CSV Converter - Convert Tab to Comma Separated Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online TSV to CSV converter. Convert tab-separated values to comma-separated values instantly. Handles quoted fields and special characters.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/tsv-to-csv') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "TSV to CSV Converter",
            "description": "Free online TSV to CSV converter. Convert tab-separated values to comma-separated values instantly. Handles quoted fields and special characters.",
            "url": "https://hafiz.dev/tools/tsv-to-csv",
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
                { "@@type": "ListItem", "position": 3, "name": "TSV to CSV Converter", "item": "https://hafiz.dev/tools/tsv-to-csv" }
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
                    "name": "How do I convert TSV to CSV?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Paste your TSV data into the input field or upload a .tsv/.txt file. The tool automatically detects tab characters and converts them to comma-separated values. Fields containing commas, quotes, or newlines are properly quoted."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How does it handle fields with commas?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Fields containing commas, quotes, or newlines are automatically wrapped in double quotes. If a field contains a double quote, it's escaped by doubling it (e.g., 'John \"Joe\" Smith' becomes '\"John \"\"Joe\"\" Smith\"')."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What's the difference between TSV and CSV?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "TSV (Tab-Separated Values) uses tab characters (\\t) as field delimiters, while CSV (Comma-Separated Values) uses commas. TSV is often easier to work with when data contains commas, but CSV is more widely supported."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does it preserve special characters?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! The converter preserves all special characters including Unicode, emojis, newlines within fields, and quotes. It properly escapes them according to CSV RFC 4180 standards."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I upload a TSV file?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Click the 'Upload .tsv/.txt' button to upload a file from your device. The converter supports .tsv, .txt, and other text-based tab-delimited formats."
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
                    <li class="text-gold">TSV to CSV Converter</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">TSV to CSV Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert tab-separated values to comma-separated values instantly. Smart quoting handles commas, quotes, and special characters automatically.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="quote-style" class="text-light font-semibold mb-2 block text-sm">Output Quote Style</label>
                            <select id="quote-style" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="smart">Only when needed (default)</option>
                                <option value="all">Always quote all fields</option>
                                <option value="never">Never quote</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="trim-whitespace" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Trim whitespace from fields</span>
                        </label>
                    </div>
                </div>

                {{-- Input / Output --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    <div class="flex flex-col">
                        <div class="flex items-center justify-between mb-2">
                            <label for="tsv-input" class="text-light font-semibold flex items-center gap-2">
                                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                TSV Input
                            </label>
                            <label class="px-3 py-1 border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-xs flex items-center gap-1 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Upload .tsv/.txt
                                <input type="file" id="file-upload" accept=".tsv,.txt" class="hidden">
                            </label>
                        </div>
                        <textarea
                            id="tsv-input"
                            class="flex-1 min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Name	Email	Age	City	Salary
John Smith	john@example.com	32	San Francisco	95000
Jane Doe	jane@example.com	28	London	72000"
                            spellcheck="false"
                        ></textarea>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            CSV Output
                        </label>
                        <textarea
                            id="csv-output"
                            class="flex-1 min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="CSV output will appear here..."
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
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download .csv
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
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div id="stat-rows" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Rows</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-cols" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Columns</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-quoted" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Fields Quoted</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-size" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">File Size</div>
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
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span id="error-message" class="text-red-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Smart Quoting</h3>
                    <p class="text-light-muted text-sm">Only quotes fields that contain commas, quotes, or newlines. Choose between smart, always, or never quote modes to match your needs.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant Conversion</h3>
                    <p class="text-light-muted text-sm">Real-time TSV to CSV conversion as you type or paste data. See results instantly with a 300ms debounce for optimal performance.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All conversion happens in your browser. Tab-separated data never leaves your device. No server uploads, no tracking, completely secure.</p>
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
                            <span class="text-light font-medium">How do I convert TSV to CSV?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Paste your TSV data into the input field or upload a .tsv/.txt file. The tool automatically detects tab characters and converts them to comma-separated values. Fields containing commas, quotes, or newlines are properly quoted according to CSV standards.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How does it handle fields with commas?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Fields containing commas, quotes, or newlines are automatically wrapped in double quotes. If a field contains a double quote, it's escaped by doubling it (e.g., 'John "Joe" Smith' becomes '"John ""Joe"" Smith"'). This follows CSV RFC 4180 standards.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What's the difference between TSV and CSV?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">TSV (Tab-Separated Values) uses tab characters (\t) as field delimiters, while CSV (Comma-Separated Values) uses commas. TSV is often easier to work with when data contains commas, but CSV is more widely supported by spreadsheet applications and databases.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does it preserve special characters?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! The converter preserves all special characters including Unicode, emojis, newlines within fields, and quotes. It properly escapes them according to CSV RFC 4180 standards, ensuring your data remains intact during conversion.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I upload a TSV file?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! Click the "Upload .tsv/.txt" button to upload a file from your device. The converter supports .tsv, .txt, and other text-based tab-delimited formats. The entire file is processed in your browser without uploading to any server.</div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        const tsvInput = document.getElementById('tsv-input');
        const csvOutput = document.getElementById('csv-output');
        const quoteStyle = document.getElementById('quote-style');
        const trimWhitespace = document.getElementById('trim-whitespace');
        const fileUpload = document.getElementById('file-upload');
        const btnConvert = document.getElementById('btn-convert');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const statsBar = document.getElementById('stats-bar');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        const sampleTSV = `Name	Email	Age	City	Salary
John Smith	john@example.com	32	San Francisco	95000
Jane Doe	jane@example.com	28	London	72000
Bob Johnson	bob@example.com	45	Toronto	105000
Alice Brown	alice@example.com	35	Berlin	88000`;

        // ===== TSV Parser =====
        function parseTSV(text) {
            const lines = text.split(/\r?\n/);
            const rows = [];
            for (const line of lines) {
                if (line.trim() === '') continue;
                const fields = line.split('\t');
                rows.push(fields);
            }
            return rows;
        }

        // ===== CSV Formatter =====
        function needsQuoting(field) {
            return field.includes(',') || field.includes('"') || field.includes('\n') || field.includes('\r');
        }

        function escapeField(field) {
            // Double any quotes in the field
            return field.replace(/"/g, '""');
        }

        function formatCSVField(field, style) {
            const shouldTrim = trimWhitespace.checked;
            const trimmed = shouldTrim ? field.trim() : field;

            if (style === 'never') {
                return trimmed;
            }

            if (style === 'all') {
                return '"' + escapeField(trimmed) + '"';
            }

            // Smart quoting (default)
            if (needsQuoting(trimmed)) {
                return '"' + escapeField(trimmed) + '"';
            }

            return trimmed;
        }

        function rowToCSV(row, style) {
            return row.map(field => formatCSVField(field, style)).join(',');
        }

        // ===== Convert Function =====
        function convert() {
            const input = tsvInput.value;
            if (!input.trim()) {
                showError('Please enter or paste TSV data');
                return;
            }

            try {
                const rows = parseTSV(input);
                if (rows.length === 0) {
                    showError('No data found in input');
                    return;
                }

                const style = quoteStyle.value;
                const csvLines = rows.map(row => rowToCSV(row, style));
                const csvText = csvLines.join('\n');

                csvOutput.value = csvText;

                // Calculate stats
                const totalFields = rows.reduce((sum, row) => sum + row.length, 0);
                const quotedFields = csvLines.join(',').match(/"/g);
                const quotedCount = quotedFields ? Math.floor(quotedFields.length / 2) : 0;
                const maxCols = Math.max(...rows.map(r => r.length));

                document.getElementById('stat-rows').textContent = rows.length;
                document.getElementById('stat-cols').textContent = maxCols;
                document.getElementById('stat-quoted').textContent = quotedCount;
                document.getElementById('stat-size').textContent = formatSize(csvText.length);
                statsBar.classList.remove('hidden');

                showSuccess(`Converted ${rows.length} rows with ${quotedCount} quoted fields`);
            } catch (e) {
                showError('Error: ' + e.message);
            }
        }

        function formatSize(bytes) {
            if (bytes < 1024) return bytes + ' B';
            if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
            return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
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

        // ===== Events =====
        btnConvert.addEventListener('click', convert);

        btnCopy.addEventListener('click', function() {
            const output = csvOutput.value;
            if (!output) { showError('Nothing to copy'); return; }
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        });

        btnDownload.addEventListener('click', function() {
            const output = csvOutput.value;
            if (!output) { showError('Nothing to download'); return; }
            const blob = new Blob([output], { type: 'text/csv;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = 'converted.csv';
            document.body.appendChild(a); a.click();
            document.body.removeChild(a); URL.revokeObjectURL(url);
            showSuccess('CSV file downloaded');
        });

        btnSample.addEventListener('click', function() {
            tsvInput.value = sampleTSV;
            csvOutput.value = '';
            statsBar.classList.add('hidden');
        });

        btnClear.addEventListener('click', function() {
            tsvInput.value = ''; csvOutput.value = '';
            statsBar.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        });

        fileUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(evt) {
                tsvInput.value = evt.target.result;
                csvOutput.value = '';
                statsBar.classList.add('hidden');
                showSuccess('File loaded: ' + file.name);
            };
            reader.readAsText(file);
            this.value = '';
        });

        // Real-time conversion with debounce
        let timer;
        tsvInput.addEventListener('input', function() {
            clearTimeout(timer);
            timer = setTimeout(() => { if (tsvInput.value.trim()) convert(); }, 300);
        });

        quoteStyle.addEventListener('change', () => { if (tsvInput.value.trim()) convert(); });
        trimWhitespace.addEventListener('change', () => { if (tsvInput.value.trim()) convert(); });

        // Keyboard shortcut: Ctrl/Cmd + Enter to convert
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                e.preventDefault();
                convert();
            }
        });
    })();
    </script>
    @endpush
</x-layout>
