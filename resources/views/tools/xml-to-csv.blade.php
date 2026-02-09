<x-layout>
    <x-slot:title>XML to CSV Converter - Convert XML to CSV Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online XML to CSV converter. Convert XML data to CSV spreadsheet format instantly in your browser. Flatten nested elements, extract attributes, and export for Excel or Google Sheets. 100% client-side.</x-slot:description>
    <x-slot:keywords>xml to csv, xml to csv converter, convert xml to csv, xml csv converter, xml to csv online, xml to spreadsheet, xml to excel</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/xml-to-csv') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>XML to CSV Converter - Convert XML to CSV Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online XML to CSV converter. Convert XML to CSV format instantly in your browser. 100% client-side - your data never leaves your browser.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/xml-to-csv') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "XML to CSV Converter",
            "description": "Free online XML to CSV converter. Convert XML data to CSV spreadsheet format instantly. Flatten nested elements, extract attributes, and export for Excel or Google Sheets.",
            "url": "https://hafiz.dev/tools/xml-to-csv",
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
                    "name": "XML to CSV Converter",
                    "item": "https://hafiz.dev/tools/xml-to-csv"
                }
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
                    "name": "How do I convert XML to CSV?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Paste your XML data into the input field and click 'Convert to CSV'. The tool automatically flattens your XML hierarchy into rows and columns. You can then copy the result or download it as a .csv file."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How does the converter handle nested XML elements?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Nested elements are flattened using dot notation. For example, <address><city>Rome</city></address> becomes a column named 'address.city' with the value 'Rome'. This preserves the hierarchy in a flat CSV format."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What happens with XML attributes?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "XML attributes are included as separate CSV columns with a configurable prefix (default: @). For example, <book category='fiction'> creates a column '@category' with the value 'fiction'."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I open the CSV file in Excel or Google Sheets?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! The generated CSV file is fully compatible with Microsoft Excel, Google Sheets, LibreOffice Calc, and any other spreadsheet application. Just download the .csv file and open it."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my data secure when using this converter?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Absolutely. All conversion happens locally in your browser using JavaScript. Your data is never uploaded to any server. This means even sensitive XML data can be safely converted without privacy concerns."
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
                    <li class="text-gold">XML to CSV Converter</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">XML to CSV Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert XML data to CSV spreadsheet format. Flatten nested elements, extract attributes, and export for Excel or Google Sheets.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                {{-- Privacy Notice --}}
                <div class="flex items-center gap-2 mb-6 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <span class="text-green-400 text-sm">Your data is processed entirely in your browser. Nothing is uploaded to any server.</span>
                </div>

                {{-- Options Panel --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="delimiter" class="text-light font-semibold mb-2 block text-sm">Delimiter</label>
                            <select id="delimiter" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value=",">Comma (default)</option>
                                <option value=";">Semicolon</option>
                                <option value="&#9;">Tab</option>
                                <option value="|">Pipe</option>
                            </select>
                        </div>
                        <div>
                            <label for="attr-prefix" class="text-light font-semibold mb-2 block text-sm">Attribute Prefix</label>
                            <select id="attr-prefix" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="@">@ (default)</option>
                                <option value="_">_ (underscore)</option>
                                <option value="">None (no prefix)</option>
                            </select>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="include-header" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Include Header Row</span>
                            </label>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="flatten-nested" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Flatten Nested Elements</span>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Editor Area --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    {{-- Input --}}
                    <div class="flex flex-col">
                        <label for="xml-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            XML Input
                        </label>
                        <textarea
                            id="xml-input"
                            class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder='Paste your XML here...

Example:
<employees>
  <employee id="1">
    <name>John Doe</name>
    <department>Engineering</department>
    <salary>75000</salary>
  </employee>
</employees>'
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output --}}
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            CSV Output
                        </label>
                        <textarea
                            id="csv-output"
                            class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="Converted CSV will appear here..."
                            readonly
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                        Convert to CSV
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

                {{-- Statistics Bar --}}
                <div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div id="stat-rows" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Rows</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-columns" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Columns</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-input-size" class="text-2xl font-bold text-light mb-1">0 B</div>
                            <div class="text-light-muted text-sm">XML Size</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-output-size" class="text-2xl font-bold text-light mb-1">0 B</div>
                            <div class="text-light-muted text-sm">CSV Size</div>
                        </div>
                    </div>
                </div>

                {{-- CSV Preview Table --}}
                <div id="preview-section" class="hidden mb-6">
                    <h3 class="text-light font-semibold mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Table Preview
                    </h3>
                    <div class="overflow-x-auto bg-darkBg rounded-lg border border-gold/10">
                        <table id="preview-table" class="w-full text-sm text-left">
                            <thead id="preview-thead" class="text-gold bg-darkCard border-b border-gold/20"></thead>
                            <tbody id="preview-tbody" class="text-light-muted"></tbody>
                        </table>
                    </div>
                    <p id="preview-note" class="text-light-muted text-xs mt-2 hidden"></p>
                </div>

                {{-- Notifications --}}
                <div id="success-notification" class="hidden p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm"></span>
                    </div>
                </div>
                <div id="error-notification" class="hidden p-3 rounded-lg bg-red-500/10 border border-red-500/30">
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
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Smart Flattening</h3>
                    <p class="text-light-muted text-sm">Automatically flattens nested XML structures into flat CSV rows using dot notation. Repeated elements become separate rows.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Table Preview</h3>
                    <p class="text-light-muted text-sm">See a visual preview of your CSV data as a table before downloading. Verify columns and rows are correct at a glance.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Your XML data never leaves your device — safe for exports, reports, and sensitive data.</p>
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
                            <span class="text-light font-medium">How do I convert XML to CSV?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Paste your XML data into the input field and click "Convert to CSV". The tool automatically flattens your XML hierarchy into rows and columns. You can then copy the result or download it as a .csv file compatible with Excel and Google Sheets.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How does the converter handle nested XML elements?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Nested elements are flattened using dot notation. For example, <code class="bg-darkCard px-1 rounded">&lt;address&gt;&lt;city&gt;Rome&lt;/city&gt;&lt;/address&gt;</code> becomes a column named <code class="bg-darkCard px-1 rounded">address.city</code> with the value "Rome". This preserves the hierarchy in a flat CSV format.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What happens with XML attributes?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            XML attributes are included as separate CSV columns with a configurable prefix (default: <code class="bg-darkCard px-1 rounded">@</code>). For example, <code class="bg-darkCard px-1 rounded">&lt;book category="fiction"&gt;</code> creates a column <code class="bg-darkCard px-1 rounded">@category</code> with the value "fiction". You can change or remove the prefix in the options.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I open the CSV file in Excel or Google Sheets?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! The generated CSV file is fully compatible with Microsoft Excel, Google Sheets, LibreOffice Calc, and any other spreadsheet application. Just download the .csv file and open it directly.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my data secure when using this converter?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Absolutely. All conversion happens locally in your browser using JavaScript. Your data is never uploaded to any server. This means even sensitive XML data from exports or reports can be safely converted.
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
        const xmlInput = document.getElementById('xml-input');
        const csvOutput = document.getElementById('csv-output');
        const delimiterSelect = document.getElementById('delimiter');
        const attrPrefixSelect = document.getElementById('attr-prefix');
        const includeHeader = document.getElementById('include-header');
        const flattenNested = document.getElementById('flatten-nested');
        const btnConvert = document.getElementById('btn-convert');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const statsBar = document.getElementById('stats-bar');
        const statRows = document.getElementById('stat-rows');
        const statColumns = document.getElementById('stat-columns');
        const statInputSize = document.getElementById('stat-input-size');
        const statOutputSize = document.getElementById('stat-output-size');
        const previewSection = document.getElementById('preview-section');
        const previewThead = document.getElementById('preview-thead');
        const previewTbody = document.getElementById('preview-tbody');
        const previewNote = document.getElementById('preview-note');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        // Sample XML
        const sampleXml = `<?xml version="1.0" encoding="UTF-8"?>
<employees>
  <employee id="1" department="Engineering">
    <name>Alice Johnson</name>
    <email>alice@example.com</email>
    <salary>95000</salary>
    <location>
      <city>San Francisco</city>
      <state>CA</state>
    </location>
    <skills>
      <skill>JavaScript</skill>
      <skill>Python</skill>
    </skills>
  </employee>
  <employee id="2" department="Design">
    <name>Bob Smith</name>
    <email>bob@example.com</email>
    <salary>85000</salary>
    <location>
      <city>New York</city>
      <state>NY</state>
    </location>
    <skills>
      <skill>Figma</skill>
      <skill>CSS</skill>
    </skills>
  </employee>
  <employee id="3" department="Marketing">
    <name>Carol Davis</name>
    <email>carol@example.com</email>
    <salary>78000</salary>
    <location>
      <city>Chicago</city>
      <state>IL</state>
    </location>
    <skills>
      <skill>SEO</skill>
      <skill>Analytics</skill>
    </skills>
  </employee>
</employees>`;

        // ===== Utility Functions =====

        function formatBytes(bytes) {
            if (bytes === 0) return '0 B';
            const k = 1024;
            const sizes = ['B', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
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

        // ===== XML to CSV Conversion =====

        function parseXml(xmlString) {
            const parser = new DOMParser();
            const doc = parser.parseFromString(xmlString, 'text/xml');

            const parseError = doc.querySelector('parsererror');
            if (parseError) {
                const errorText = parseError.textContent || parseError.innerText;
                throw new Error('XML Parse Error: ' + errorText.split('\n')[0]);
            }

            return doc;
        }

        function findRepeatingElements(rootElement) {
            // Find the repeated child elements (the "rows")
            const children = rootElement.children;
            if (children.length === 0) return { parent: rootElement, tagName: null, elements: [] };

            // Count occurrences of each tag name
            const tagCounts = {};
            for (let i = 0; i < children.length; i++) {
                const tag = children[i].tagName;
                tagCounts[tag] = (tagCounts[tag] || 0) + 1;
            }

            // Find the most repeated tag (these are our "rows")
            let maxTag = null;
            let maxCount = 0;
            for (const [tag, count] of Object.entries(tagCounts)) {
                if (count > maxCount) {
                    maxCount = count;
                    maxTag = tag;
                }
            }

            if (maxCount <= 1 && children.length === 1) {
                // Single child — recurse into it
                return findRepeatingElements(children[0]);
            }

            const elements = [];
            for (let i = 0; i < children.length; i++) {
                if (children[i].tagName === maxTag) {
                    elements.push(children[i]);
                }
            }

            return { parent: rootElement, tagName: maxTag, elements: elements };
        }

        function flattenElement(element, prefix, options) {
            const result = {};

            // Process attributes
            if (element.attributes) {
                for (let i = 0; i < element.attributes.length; i++) {
                    const attr = element.attributes[i];
                    const key = prefix ? prefix + '.' + options.attrPrefix + attr.name : options.attrPrefix + attr.name;
                    result[key] = attr.value;
                }
            }

            // Process child elements
            let hasChildElements = false;
            const childTexts = [];

            for (let i = 0; i < element.childNodes.length; i++) {
                const child = element.childNodes[i];

                if (child.nodeType === Node.ELEMENT_NODE) {
                    hasChildElements = true;
                    const childTag = child.tagName;
                    const childKey = prefix ? prefix + '.' + childTag : childTag;

                    // Check if this child has only text content
                    const childHasOnlyText = child.children.length === 0;

                    if (childHasOnlyText) {
                        const text = (child.textContent || '').trim();
                        // Check if there are already entries with this key (repeated elements)
                        if (result[childKey] !== undefined) {
                            // Append with separator for repeated simple elements
                            result[childKey] += ', ' + text;
                        } else {
                            result[childKey] = text;
                        }
                    } else if (options.flatten) {
                        // Recursively flatten nested elements
                        const nested = flattenElement(child, childKey, options);
                        Object.assign(result, nested);
                    } else {
                        // Don't flatten — serialize as string
                        result[childKey] = child.textContent.trim();
                    }
                } else if (child.nodeType === Node.TEXT_NODE || child.nodeType === Node.CDATA_SECTION_NODE) {
                    const text = child.nodeValue.trim();
                    if (text) childTexts.push(text);
                }
            }

            // If element has both text and child elements, store text separately
            if (childTexts.length > 0 && !hasChildElements) {
                const key = prefix || '#text';
                result[key] = childTexts.join(' ');
            } else if (childTexts.length > 0 && hasChildElements) {
                const key = prefix ? prefix + '.#text' : '#text';
                result[key] = childTexts.join(' ');
            }

            return result;
        }

        function escapeCSVField(value, delimiter) {
            if (value === null || value === undefined) return '';
            const str = String(value);
            if (str.includes(delimiter) || str.includes('"') || str.includes('\n') || str.includes('\r')) {
                return '"' + str.replace(/"/g, '""') + '"';
            }
            return str;
        }

        function convert() {
            const input = xmlInput.value.trim();
            if (!input) {
                showError('Please enter some XML to convert');
                return;
            }

            try {
                const doc = parseXml(input);
                const options = {
                    attrPrefix: attrPrefixSelect.value,
                    flatten: flattenNested.checked
                };

                const delimiter = delimiterSelect.value;

                // Find the repeating elements (rows)
                const { elements } = findRepeatingElements(doc.documentElement);

                if (elements.length === 0) {
                    // Single element — treat entire doc as one row
                    const row = flattenElement(doc.documentElement, '', options);
                    const headers = Object.keys(row);
                    const lines = [];

                    if (includeHeader.checked) {
                        lines.push(headers.map(h => escapeCSVField(h, delimiter)).join(delimiter));
                    }
                    lines.push(headers.map(h => escapeCSVField(row[h], delimiter)).join(delimiter));

                    const csvString = lines.join('\n');
                    csvOutput.value = csvString;
                    renderPreview([headers], [[row]], headers);
                    updateStats(1, headers.length, input, csvString);
                    showSuccess('XML converted to CSV — 1 row generated.');
                    return;
                }

                // Flatten all repeating elements
                const rows = elements.map(el => flattenElement(el, '', options));

                // Collect all unique headers across all rows
                const headerSet = new Set();
                rows.forEach(row => Object.keys(row).forEach(k => headerSet.add(k)));
                const headers = Array.from(headerSet);

                // Build CSV
                const lines = [];
                if (includeHeader.checked) {
                    lines.push(headers.map(h => escapeCSVField(h, delimiter)).join(delimiter));
                }

                rows.forEach(row => {
                    const line = headers.map(h => escapeCSVField(row[h] || '', delimiter));
                    lines.push(line.join(delimiter));
                });

                const csvString = lines.join('\n');
                csvOutput.value = csvString;

                // Render preview
                renderPreview(headers, rows, headers);
                updateStats(rows.length, headers.length, input, csvString);
                showSuccess('XML converted to CSV — ' + rows.length + ' rows, ' + headers.length + ' columns.');

            } catch (e) {
                showError(e.message);
                statsBar.classList.add('hidden');
                previewSection.classList.add('hidden');
            }
        }

        function renderPreview(headers, rows, allHeaders) {
            const maxPreviewRows = 10;
            const maxPreviewCols = 8;

            const displayHeaders = allHeaders.slice(0, maxPreviewCols);
            const hasMoreCols = allHeaders.length > maxPreviewCols;

            // Build thead
            let theadHtml = '<tr>';
            displayHeaders.forEach(h => {
                theadHtml += '<th class="px-3 py-2 font-semibold text-xs whitespace-nowrap">' + escapeHtml(h) + '</th>';
            });
            if (hasMoreCols) {
                theadHtml += '<th class="px-3 py-2 font-semibold text-xs text-light-muted">...</th>';
            }
            theadHtml += '</tr>';
            previewThead.innerHTML = theadHtml;

            // Build tbody
            const displayRows = rows.slice(0, maxPreviewRows);
            let tbodyHtml = '';
            displayRows.forEach(row => {
                tbodyHtml += '<tr class="border-b border-gold/10 hover:bg-gold/5">';
                displayHeaders.forEach(h => {
                    const val = row[h] || '';
                    tbodyHtml += '<td class="px-3 py-2 text-xs whitespace-nowrap max-w-[200px] truncate">' + escapeHtml(String(val)) + '</td>';
                });
                if (hasMoreCols) {
                    tbodyHtml += '<td class="px-3 py-2 text-xs text-light-muted">...</td>';
                }
                tbodyHtml += '</tr>';
            });
            previewTbody.innerHTML = tbodyHtml;

            // Show note if truncated
            const notes = [];
            if (rows.length > maxPreviewRows) notes.push('Showing first ' + maxPreviewRows + ' of ' + rows.length + ' rows');
            if (hasMoreCols) notes.push('Showing first ' + maxPreviewCols + ' of ' + allHeaders.length + ' columns');
            if (notes.length > 0) {
                previewNote.textContent = notes.join(' · ');
                previewNote.classList.remove('hidden');
            } else {
                previewNote.classList.add('hidden');
            }

            previewSection.classList.remove('hidden');
        }

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }

        function updateStats(rows, cols, input, output) {
            statRows.textContent = rows;
            statColumns.textContent = cols;
            statInputSize.textContent = formatBytes(new Blob([input]).size);
            statOutputSize.textContent = formatBytes(new Blob([output]).size);
            statsBar.classList.remove('hidden');
        }

        function copyOutput() {
            const output = csvOutput.value;
            if (!output) {
                showError('Nothing to copy. Convert some XML first.');
                return;
            }
            navigator.clipboard.writeText(output).then(() => {
                const originalHTML = btnCopy.innerHTML;
                btnCopy.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                btnCopy.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => {
                    btnCopy.innerHTML = originalHTML;
                    btnCopy.classList.remove('text-green-400', 'border-green-400');
                }, 2000);
            }).catch(() => showError('Failed to copy to clipboard'));
        }

        function downloadOutput() {
            const output = csvOutput.value;
            if (!output) {
                showError('Nothing to download. Convert some XML first.');
                return;
            }
            const filename = 'converted-' + new Date().toISOString().split('T')[0] + '.csv';
            // Add BOM for Excel UTF-8 compatibility
            const bom = '\uFEFF';
            const blob = new Blob([bom + output], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            showSuccess('Downloaded: ' + filename);
        }

        function loadSample() {
            xmlInput.value = sampleXml;
            csvOutput.value = '';
            statsBar.classList.add('hidden');
            previewSection.classList.add('hidden');
        }

        function clearAll() {
            xmlInput.value = '';
            csvOutput.value = '';
            statsBar.classList.add('hidden');
            previewSection.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        }

        // ===== Event Listeners =====
        btnConvert.addEventListener('click', convert);
        btnCopy.addEventListener('click', copyOutput);
        btnDownload.addEventListener('click', downloadOutput);
        btnSample.addEventListener('click', loadSample);
        btnClear.addEventListener('click', clearAll);

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
