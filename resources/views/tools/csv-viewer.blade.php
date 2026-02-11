<x-layout>
    <x-slot:title>CSV Viewer Online - View CSV Files in Table Format Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online CSV viewer. Upload or paste CSV data to view in a sortable, searchable table. No signup required.</x-slot:description>
    <x-slot:keywords>csv viewer online, csv viewer, view csv file, csv table viewer, open csv online, csv file reader</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/csv-viewer') }}</x-slot:canonical>

    <x-slot:ogTitle>CSV Viewer Online - View CSV Files in Table Format Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online CSV viewer. Upload or paste CSV data to view in a sortable, searchable table instantly.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/csv-viewer') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "CSV Viewer Online",
            "description": "Free online CSV viewer. View CSV files in a sortable, searchable table.",
            "url": "https://hafiz.dev/tools/csv-viewer",
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
                { "@@type": "ListItem", "position": 3, "name": "CSV Viewer", "item": "https://hafiz.dev/tools/csv-viewer" }
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
                    "name": "How do I view a CSV file online?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Paste your CSV data into the text area or upload a .csv file using the upload button. Click 'View Table' and the tool displays your data in a clean, sortable table. The delimiter is auto-detected for convenience."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does it support different delimiters?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! The tool supports comma, semicolon, tab, and pipe delimiters. Auto-detect mode analyzes your data and picks the most likely delimiter automatically. You can also select a specific delimiter manually."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I sort the CSV data by column?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Click any column header to sort ascending. Click again for descending, and a third time to reset to the original order. Sorting works for text, numbers, and dates."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I search and filter rows?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Use the search box above the table to filter rows instantly. The search is case-insensitive and checks all columns. The matching row count updates in real-time as you type."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my CSV data kept private?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, 100%. All processing happens in your browser using JavaScript. Your CSV data is never uploaded to any server, ensuring complete privacy and instant results."
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
                    <li class="text-gold">CSV Viewer</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">CSV Viewer Online</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    View and explore CSV files in a sortable, searchable table. Paste or upload your data for instant visualization.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <label for="delimiter" class="text-light font-semibold mb-2 block text-sm">Delimiter</label>
                            <select id="delimiter" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="auto" selected>Auto-detect</option>
                                <option value=",">Comma (,)</option>
                                <option value=";">Semicolon (;)</option>
                                <option value="tab">Tab</option>
                                <option value="|">Pipe (|)</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="opt-header" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">First row is header</span>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- CSV Input --}}
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <label for="csv-input" class="text-light font-semibold flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            CSV Data
                        </label>
                        <label class="px-3 py-1 border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-xs flex items-center gap-1 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                            Upload .csv
                            <input type="file" id="file-upload" accept=".csv,.tsv,.txt" class="hidden">
                        </label>
                    </div>
                    <textarea
                        id="csv-input"
                        class="w-full min-h-[200px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                        placeholder="Paste your CSV data here or upload a file..."
                        spellcheck="false"
                    ></textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-view" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        View Table
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy CSV
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download
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
                            <div id="stat-rows" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Rows</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-cols" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Columns</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-cells" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Total Cells</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-size" class="text-2xl font-bold text-light mb-1">0 B</div>
                            <div class="text-light-muted text-sm">File Size</div>
                        </div>
                    </div>
                </div>

                {{-- Search & Table Area --}}
                <div id="table-area" class="hidden">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <input type="text" id="table-search" class="bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-sm text-light focus:border-gold/50 focus:outline-none w-64" placeholder="Search all columns...">
                        </div>
                        <span id="row-count" class="text-light-muted text-sm"></span>
                    </div>
                    <div class="overflow-auto max-h-[500px] rounded-lg border border-gold/10">
                        <table id="csv-table" class="w-full text-sm text-left">
                            <thead id="table-head" class="bg-darkBg text-gold text-xs uppercase sticky top-0 z-10">
                            </thead>
                            <tbody id="table-body" class="text-light">
                            </tbody>
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

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Smart Parsing</h3>
                    <p class="text-light-muted text-sm">Auto-detects delimiters and handles quoted fields, escaped characters, and newlines within fields.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Sort & Search</h3>
                    <p class="text-light-muted text-sm">Click column headers to sort ascending/descending. Search to filter rows instantly across all columns.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">CSV data stays in your browser. Files are never uploaded to any server. Fast, secure, and completely private.</p>
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
                            <span class="text-light font-medium">How do I view a CSV file online?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Paste your CSV data into the text area or upload a .csv file using the upload button. Click "View Table" and the tool displays your data in a clean, sortable table. The delimiter is auto-detected for convenience.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does it support different delimiters?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! The tool supports comma, semicolon, tab, and pipe delimiters. Auto-detect mode analyzes your data and picks the most likely delimiter. You can also select a specific delimiter manually.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I sort the CSV data by column?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! Click any column header to sort ascending. Click again for descending, and a third time to reset to the original order. Sorting works for text, numbers, and dates.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I search and filter rows?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! Use the search box above the table to filter rows instantly. The search is case-insensitive and checks all columns. The matching row count updates in real-time as you type.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my CSV data kept private?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes, 100%. All processing happens in your browser using JavaScript. Your CSV data is never uploaded to any server, ensuring complete privacy and instant results.</div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        const csvInput = document.getElementById('csv-input');
        const delimiterSel = document.getElementById('delimiter');
        const optHeader = document.getElementById('opt-header');
        const fileUpload = document.getElementById('file-upload');
        const btnView = document.getElementById('btn-view');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const statsBar = document.getElementById('stats-bar');
        const tableArea = document.getElementById('table-area');
        const tableSearch = document.getElementById('table-search');
        const rowCount = document.getElementById('row-count');
        const tableHead = document.getElementById('table-head');
        const tableBody = document.getElementById('table-body');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        const sampleCSV = `Name,Email,Age,City,Country,Salary
John Smith,john@example.com,32,San Francisco,US,95000
Jane Doe,jane@example.com,28,London,UK,72000
Bob Johnson,bob@example.com,45,Toronto,CA,105000
Alice Brown,alice@example.com,35,Berlin,DE,88000
Charlie Wilson,charlie@example.com,29,Tokyo,JP,78000
Diana Prince,diana@example.com,31,Paris,FR,92000
Eve Martinez,eve@example.com,38,Madrid,ES,83000
Frank Lee,frank@example.com,42,Sydney,AU,110000
Grace Kim,grace@example.com,26,Seoul,KR,68000
Henry Zhang,henry@example.com,33,Shanghai,CN,91000`;

        let parsedHeaders = [];
        let parsedRows = [];
        let sortCol = -1;
        let sortDir = 0; // 0=none, 1=asc, 2=desc

        function autoDetectDelimiter(text) {
            const firstLine = text.split('\n')[0];
            const delimiters = [',', ';', '\t', '|'];
            let best = ',';
            let bestCount = 0;
            for (const d of delimiters) {
                const count = (firstLine.match(new RegExp(d === '|' ? '\\|' : (d === '\t' ? '\t' : d), 'g')) || []).length;
                if (count > bestCount) {
                    bestCount = count;
                    best = d;
                }
            }
            return best;
        }

        function parseCSV(text, delim) {
            const rows = [];
            let current = '', inQuotes = false, row = [];
            for (let i = 0; i < text.length; i++) {
                const ch = text[i], next = text[i + 1];
                if (inQuotes) {
                    if (ch === '"' && next === '"') { current += '"'; i++; }
                    else if (ch === '"') { inQuotes = false; }
                    else { current += ch; }
                } else {
                    if (ch === '"') { inQuotes = true; }
                    else if (ch === delim) { row.push(current); current = ''; }
                    else if (ch === '\n' || (ch === '\r' && next === '\n')) {
                        row.push(current);
                        if (row.some(c => c.trim() !== '')) rows.push(row);
                        row = []; current = '';
                        if (ch === '\r') i++;
                    } else { current += ch; }
                }
            }
            row.push(current);
            if (row.some(c => c.trim() !== '')) rows.push(row);
            return rows;
        }

        function getDelimiter() {
            const val = delimiterSel.value;
            if (val === 'auto') return autoDetectDelimiter(csvInput.value);
            if (val === 'tab') return '\t';
            return val;
        }

        function formatSize(bytes) {
            if (bytes < 1024) return bytes + ' B';
            if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
            return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
        }

        function renderTable() {
            const input = csvInput.value.trim();
            if (!input) { showError('Please enter or paste CSV data'); return; }

            const delim = getDelimiter();
            const allRows = parseCSV(input, delim);
            if (allRows.length === 0) { showError('No valid data found'); return; }

            if (optHeader.checked && allRows.length > 0) {
                parsedHeaders = allRows[0].map(h => h.trim());
                parsedRows = allRows.slice(1);
            } else {
                parsedHeaders = allRows[0].map((_, i) => 'Column ' + (i + 1));
                parsedRows = allRows;
            }

            // Normalize column count
            const colCount = parsedHeaders.length;
            parsedRows = parsedRows.map(row => {
                while (row.length < colCount) row.push('');
                return row.slice(0, colCount);
            });

            sortCol = -1;
            sortDir = 0;

            buildTableHead();
            filterAndRender();

            // Stats
            document.getElementById('stat-rows').textContent = parsedRows.length;
            document.getElementById('stat-cols').textContent = colCount;
            document.getElementById('stat-cells').textContent = parsedRows.length * colCount;
            document.getElementById('stat-size').textContent = formatSize(new Blob([input]).size);
            statsBar.classList.remove('hidden');
            tableArea.classList.remove('hidden');

            showSuccess('Loaded ' + parsedRows.length + ' rows × ' + colCount + ' columns');
        }

        function buildTableHead() {
            let html = '<tr>';
            for (let i = 0; i < parsedHeaders.length; i++) {
                const arrow = sortCol === i
                    ? (sortDir === 1 ? ' ▲' : sortDir === 2 ? ' ▼' : '')
                    : '';
                html += '<th class="px-4 py-3 border-b border-gold/20 cursor-pointer hover:text-gold-light select-none whitespace-nowrap" data-col="' + i + '">';
                html += escapeHtml(parsedHeaders[i]) + '<span class="ml-1 text-gold/60">' + arrow + '</span>';
                html += '</th>';
            }
            html += '</tr>';
            tableHead.innerHTML = html;

            // Sort click handlers
            tableHead.querySelectorAll('th').forEach(th => {
                th.addEventListener('click', function() {
                    const col = parseInt(this.dataset.col);
                    if (sortCol === col) {
                        sortDir = (sortDir + 1) % 3;
                    } else {
                        sortCol = col;
                        sortDir = 1;
                    }
                    if (sortDir === 0) sortCol = -1;
                    buildTableHead();
                    filterAndRender();
                });
            });
        }

        function filterAndRender() {
            const query = tableSearch.value.toLowerCase().trim();
            let filtered = parsedRows;

            if (query) {
                filtered = parsedRows.filter(row =>
                    row.some(cell => cell.toLowerCase().includes(query))
                );
            }

            // Sort
            if (sortCol >= 0 && sortDir > 0) {
                filtered = [...filtered].sort((a, b) => {
                    let va = a[sortCol] || '';
                    let vb = b[sortCol] || '';

                    // Try numeric sort
                    const na = parseFloat(va);
                    const nb = parseFloat(vb);
                    if (!isNaN(na) && !isNaN(nb)) {
                        return sortDir === 1 ? na - nb : nb - na;
                    }

                    // String sort
                    va = va.toLowerCase();
                    vb = vb.toLowerCase();
                    if (va < vb) return sortDir === 1 ? -1 : 1;
                    if (va > vb) return sortDir === 1 ? 1 : -1;
                    return 0;
                });
            }

            // Build rows
            let html = '';
            for (let r = 0; r < filtered.length; r++) {
                const bgClass = r % 2 === 0 ? '' : 'bg-darkCard/30';
                html += '<tr class="border-b border-gold/10 hover:bg-gold/5 ' + bgClass + '">';
                for (const cell of filtered[r]) {
                    html += '<td class="px-4 py-2 whitespace-nowrap">' + escapeHtml(cell) + '</td>';
                }
                html += '</tr>';
            }
            tableBody.innerHTML = html;

            rowCount.textContent = filtered.length + ' of ' + parsedRows.length + ' rows';
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

        // Events
        btnView.addEventListener('click', renderTable);

        btnCopy.addEventListener('click', function() {
            const text = csvInput.value;
            if (!text) { showError('Nothing to copy'); return; }
            navigator.clipboard.writeText(text).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        });

        btnDownload.addEventListener('click', function() {
            const text = csvInput.value;
            if (!text) { showError('Nothing to download'); return; }
            const blob = new Blob([text], { type: 'text/csv;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = 'data.csv';
            document.body.appendChild(a); a.click();
            document.body.removeChild(a); URL.revokeObjectURL(url);
            showSuccess('CSV file downloaded');
        });

        btnSample.addEventListener('click', function() {
            csvInput.value = sampleCSV;
            tableArea.classList.add('hidden');
            statsBar.classList.add('hidden');
        });

        btnClear.addEventListener('click', function() {
            csvInput.value = '';
            tableArea.classList.add('hidden');
            statsBar.classList.add('hidden');
            tableSearch.value = '';
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        });

        fileUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(evt) {
                csvInput.value = evt.target.result;
                tableArea.classList.add('hidden');
                statsBar.classList.add('hidden');
                showSuccess('File loaded: ' + file.name);
            };
            reader.readAsText(file);
            this.value = '';
        });

        tableSearch.addEventListener('input', filterAndRender);

        [delimiterSel, optHeader].forEach(el => {
            el.addEventListener('change', () => {
                if (csvInput.value.trim() && tableArea.classList.contains('hidden') === false) renderTable();
            });
        });

        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); renderTable(); }
        });
    })();
    </script>
    @endpush
</x-layout>
