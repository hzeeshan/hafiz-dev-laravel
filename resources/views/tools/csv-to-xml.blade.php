<x-layout>
    <x-slot:title>CSV to XML Converter - Convert CSV to XML Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online CSV to XML converter. Convert CSV data to well-formatted XML instantly. Custom root and row element names, attribute support, and CDATA options. 100% client-side.</x-slot:description>
    <x-slot:keywords>csv to xml, convert csv to xml, csv to xml converter, csv to xml conversion, csv to xml online, csv xml converter</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/csv-to-xml') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>CSV to XML Converter - Convert CSV to XML Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online CSV to XML converter. Convert CSV data to well-formatted XML instantly with custom element names and formatting options.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/csv-to-xml') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "CSV to XML Converter",
            "description": "Free online CSV to XML converter. Convert CSV data to well-formatted XML instantly.",
            "url": "https://hafiz.dev/tools/csv-to-xml",
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
                { "@@type": "ListItem", "position": 3, "name": "CSV to XML Converter", "item": "https://hafiz.dev/tools/csv-to-xml" }
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
                    "name": "How do I convert CSV to XML?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Paste your CSV data into the input field or upload a .csv file. The tool instantly converts it to well-formatted XML. The first row is used as element names, and each subsequent row becomes an XML record."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I customize the XML element names?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! You can set custom root element name (default: 'data'), row element name (default: 'record'), and choose whether to use CSV headers as element names or as attributes on each row element."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What CSV delimiters are supported?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The converter supports comma, semicolon, tab, and pipe delimiters. It also handles quoted fields correctly, including fields with embedded commas, newlines, and escaped quotes."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does the converter handle special characters in XML?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, the tool automatically escapes XML special characters like <, >, &, and quotes. You can also enable CDATA wrapping for text values that contain special characters."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I upload a CSV file directly?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Click the Upload button to select a .csv file from your computer. The file is processed entirely in your browser and never sent to any server."
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
                    <li class="text-gold">CSV to XML Converter</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">CSV to XML Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert CSV data to well-formatted XML instantly. Custom element names, attribute mode, CDATA support, and downloadable output.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label for="delimiter" class="text-light font-semibold mb-2 block text-sm">Delimiter</label>
                            <select id="delimiter" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value=",">Comma (,)</option>
                                <option value=";">Semicolon (;)</option>
                                <option value="\t">Tab</option>
                                <option value="|">Pipe (|)</option>
                            </select>
                        </div>
                        <div>
                            <label for="root-element" class="text-light font-semibold mb-2 block text-sm">Root Element</label>
                            <input type="text" id="root-element" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono focus:border-gold/50 focus:outline-none" value="data" spellcheck="false">
                        </div>
                        <div>
                            <label for="row-element" class="text-light font-semibold mb-2 block text-sm">Row Element</label>
                            <input type="text" id="row-element" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono focus:border-gold/50 focus:outline-none" value="record" spellcheck="false">
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="first-row-header" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">First row as headers</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="use-attributes" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Values as attributes</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="use-cdata" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Wrap values in CDATA</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="include-declaration" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">XML declaration</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="minify-output" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Minify output</span>
                        </label>
                    </div>
                </div>

                {{-- Input / Output --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    {{-- Input --}}
                    <div class="flex flex-col">
                        <div class="flex items-center justify-between mb-2">
                            <label for="csv-input" class="text-light font-semibold flex items-center gap-2">
                                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                CSV Input
                            </label>
                            <label class="px-3 py-1 border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-xs flex items-center gap-1 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Upload .csv
                                <input type="file" id="file-upload" accept=".csv,.tsv,.txt" class="hidden">
                            </label>
                        </div>
                        <textarea
                            id="csv-input"
                            class="flex-1 min-h-[320px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="name,email,city,role
John Smith,john@example.com,New York,Developer
Jane Doe,jane@example.com,London,Designer
Bob Wilson,bob@example.com,Berlin,Manager"
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output --}}
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            XML Output
                        </label>
                        <textarea
                            id="xml-output"
                            class="flex-1 min-h-[320px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="XML output will appear here..."
                            readonly
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Convert to XML
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download .xml
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
                            <div id="stat-input-size" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Input Size</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-output-size" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Output Size</div>
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

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Flexible Options</h3>
                    <p class="text-light-muted text-sm">Customize root and row element names, choose between child elements or attributes, add XML declarations, and enable CDATA wrapping.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Safe XML Output</h3>
                    <p class="text-light-muted text-sm">Automatically escapes special characters and sanitizes element names to produce valid, well-formed XML every time.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Upload & Download</h3>
                    <p class="text-light-muted text-sm">Upload .csv files directly or paste data. Download the converted XML file with one click. Everything runs in your browser — no server uploads.</p>
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
                            <span class="text-light font-medium">How do I convert CSV to XML?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Paste your CSV data into the input field or upload a .csv file. The tool converts it to well-formatted XML automatically. The first row is used as element names, and each subsequent row becomes an XML record wrapped in your chosen row element tag.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I customize the XML element names?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! You can set a custom root element name (default: <code class="bg-darkCard px-1 rounded">data</code>) and row element name (default: <code class="bg-darkCard px-1 rounded">record</code>). CSV column headers automatically become child element names. You can also switch to "Values as attributes" mode where values are stored as XML attributes instead of child elements.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What CSV delimiters are supported?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The converter supports comma, semicolon, tab, and pipe delimiters. It handles quoted fields correctly, including fields with embedded delimiters, newlines, and escaped quotes (double-quote inside quoted fields).
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does the converter handle special characters?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, XML special characters (<code class="bg-darkCard px-1 rounded">&lt;</code>, <code class="bg-darkCard px-1 rounded">&gt;</code>, <code class="bg-darkCard px-1 rounded">&amp;</code>, <code class="bg-darkCard px-1 rounded">"</code>, <code class="bg-darkCard px-1 rounded">'</code>) are automatically escaped. You can also enable CDATA wrapping for values that contain complex markup or special characters.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I upload a CSV file directly?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Click the "Upload .csv" button to select a CSV file from your computer. The file is processed entirely in your browser — no data is ever sent to a server. You can also drag and paste CSV content directly into the input area.
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
        const csvInput = document.getElementById('csv-input');
        const xmlOutput = document.getElementById('xml-output');
        const delimiter = document.getElementById('delimiter');
        const rootElement = document.getElementById('root-element');
        const rowElement = document.getElementById('row-element');
        const firstRowHeader = document.getElementById('first-row-header');
        const useAttributes = document.getElementById('use-attributes');
        const useCdata = document.getElementById('use-cdata');
        const includeDeclaration = document.getElementById('include-declaration');
        const minifyOutput = document.getElementById('minify-output');
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

        const sampleCSV = `name,email,city,role,salary
John Smith,john@example.com,New York,Developer,95000
Jane Doe,jane@example.com,London,Designer,82000
Bob Wilson,bob@example.com,Berlin,Manager,105000
Alice Chen,alice@example.com,Tokyo,"Senior Developer",112000
Carlos García,carlos@example.com,Madrid,DevOps,88000`;

        // ===== CSV Parser =====
        function parseCSV(text, delim) {
            const rows = [];
            let current = '';
            let inQuotes = false;
            let row = [];

            for (let i = 0; i < text.length; i++) {
                const ch = text[i];
                const next = text[i + 1];

                if (inQuotes) {
                    if (ch === '"' && next === '"') {
                        current += '"';
                        i++;
                    } else if (ch === '"') {
                        inQuotes = false;
                    } else {
                        current += ch;
                    }
                } else {
                    if (ch === '"') {
                        inQuotes = true;
                    } else if (ch === delim) {
                        row.push(current.trim());
                        current = '';
                    } else if (ch === '\n' || (ch === '\r' && next === '\n')) {
                        row.push(current.trim());
                        if (row.some(cell => cell !== '')) rows.push(row);
                        row = [];
                        current = '';
                        if (ch === '\r') i++;
                    } else {
                        current += ch;
                    }
                }
            }
            // Last field
            row.push(current.trim());
            if (row.some(cell => cell !== '')) rows.push(row);

            return rows;
        }

        // ===== XML Generation =====
        function sanitizeElementName(name) {
            // XML element name rules: start with letter or _, no spaces/special chars
            let clean = name.replace(/[^a-zA-Z0-9_.-]/g, '_').replace(/^[^a-zA-Z_]/, '_');
            if (!clean) clean = 'field';
            return clean;
        }

        function escapeXml(str) {
            return str
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&apos;');
        }

        function wrapValue(value, cdata) {
            if (cdata && value.length > 0) {
                return '<![CDATA[' + value + ']]>';
            }
            return escapeXml(value);
        }

        function convert() {
            const input = csvInput.value.trim();
            if (!input) {
                showError('Please enter or paste CSV data');
                return;
            }

            try {
                const delim = delimiter.value === '\\t' ? '\t' : delimiter.value;
                const rows = parseCSV(input, delim);

                if (rows.length === 0) {
                    showError('No data found in CSV input');
                    return;
                }

                const root = sanitizeElementName(rootElement.value || 'data');
                const row = sanitizeElementName(rowElement.value || 'record');
                const hasHeaders = firstRowHeader.checked;
                const asAttributes = useAttributes.checked;
                const cdata = useCdata.checked;
                const declaration = includeDeclaration.checked;
                const minify = minifyOutput.checked;

                // Headers
                let headers;
                let dataRows;
                if (hasHeaders && rows.length > 1) {
                    headers = rows[0].map(h => sanitizeElementName(h));
                    dataRows = rows.slice(1);
                } else {
                    headers = rows[0].map((_, i) => 'field' + (i + 1));
                    dataRows = hasHeaders ? rows.slice(1) : rows;
                }

                const nl = minify ? '' : '\n';
                const t1 = minify ? '' : '  ';
                const t2 = minify ? '' : '    ';

                let xml = '';
                if (declaration) {
                    xml += '<?xml version="1.0" encoding="UTF-8"?>' + nl;
                }
                xml += '<' + root + '>' + nl;

                for (const dataRow of dataRows) {
                    if (asAttributes) {
                        // Attribute mode
                        xml += t1 + '<' + row;
                        for (let i = 0; i < headers.length; i++) {
                            const val = i < dataRow.length ? dataRow[i] : '';
                            xml += ' ' + headers[i] + '="' + escapeXml(val) + '"';
                        }
                        xml += '/>' + nl;
                    } else {
                        // Child element mode
                        xml += t1 + '<' + row + '>' + nl;
                        for (let i = 0; i < headers.length; i++) {
                            const val = i < dataRow.length ? dataRow[i] : '';
                            xml += t2 + '<' + headers[i] + '>' + wrapValue(val, cdata) + '</' + headers[i] + '>' + nl;
                        }
                        xml += t1 + '</' + row + '>' + nl;
                    }
                }

                xml += '</' + root + '>';

                xmlOutput.value = xml;

                // Stats
                document.getElementById('stat-rows').textContent = dataRows.length;
                document.getElementById('stat-cols').textContent = headers.length;
                document.getElementById('stat-input-size').textContent = formatSize(input.length);
                document.getElementById('stat-output-size').textContent = formatSize(xml.length);
                statsBar.classList.remove('hidden');

                showSuccess(`Converted ${dataRows.length} rows × ${headers.length} columns to XML`);
            } catch (e) {
                showError('Error converting CSV: ' + e.message);
            }
        }

        function formatSize(bytes) {
            if (bytes < 1024) return bytes + ' B';
            return (bytes / 1024).toFixed(1) + ' KB';
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

        btnCopy.addEventListener('click', function() {
            const output = xmlOutput.value;
            if (!output) { showError('Nothing to copy. Convert CSV first.'); return; }
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        });

        btnDownload.addEventListener('click', function() {
            const output = xmlOutput.value;
            if (!output) { showError('Nothing to download. Convert CSV first.'); return; }
            const blob = new Blob([output], { type: 'application/xml;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'data.xml';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            showSuccess('XML file downloaded');
        });

        btnSample.addEventListener('click', function() {
            csvInput.value = sampleCSV;
            xmlOutput.value = '';
            statsBar.classList.add('hidden');
        });

        btnClear.addEventListener('click', function() {
            csvInput.value = '';
            xmlOutput.value = '';
            statsBar.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        });

        fileUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(evt) {
                csvInput.value = evt.target.result;
                xmlOutput.value = '';
                statsBar.classList.add('hidden');
                showSuccess('File loaded: ' + file.name);
            };
            reader.readAsText(file);
            this.value = '';
        });

        // Real-time conversion
        let debounceTimer;
        csvInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                if (csvInput.value.trim()) convert();
            }, 500);
        });

        // Re-convert on option change
        [delimiter, firstRowHeader, useAttributes, useCdata, includeDeclaration, minifyOutput].forEach(el => {
            el.addEventListener('change', () => { if (csvInput.value.trim()) convert(); });
        });
        [rootElement, rowElement].forEach(el => {
            el.addEventListener('input', () => { if (csvInput.value.trim()) { clearTimeout(debounceTimer); debounceTimer = setTimeout(convert, 500); } });
        });

        // Keyboard shortcut
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
        });
    })();
    </script>
    @endpush
</x-layout>
