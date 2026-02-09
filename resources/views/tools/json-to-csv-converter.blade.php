<x-layout>
    <x-slot:title>JSON to CSV Converter - Convert JSON to CSV Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online JSON to CSV converter. Convert JSON arrays to CSV files or CSV to JSON instantly. Supports nested objects, custom delimiters, and bulk conversion. 100% client-side - your data never leaves your browser.</x-slot:description>
    <x-slot:keywords>json to csv, csv to json, json converter, csv converter, convert json to csv online, json to csv online, csv to json online, json csv converter, data converter</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/json-to-csv-converter') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>JSON to CSV Converter - Convert JSON to CSV Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online JSON to CSV converter. Convert JSON arrays to CSV files or CSV to JSON instantly. 100% client-side - your data never leaves your browser.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/json-to-csv-converter') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "JSON to CSV Converter",
            "description": "Free online JSON to CSV converter. Convert JSON arrays to CSV files or CSV to JSON instantly. Supports nested objects, custom delimiters, and bulk conversion.",
            "url": "https://hafiz.dev/tools/json-to-csv-converter",
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
                    "name": "JSON to CSV Converter",
                    "item": "https://hafiz.dev/tools/json-to-csv-converter"
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
                    "name": "How do I convert JSON to CSV?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Simply paste your JSON array into the input field and click 'Convert'. The tool will automatically extract all keys as column headers and convert each object in the array to a CSV row. You can then copy the result or download it as a .csv file."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I convert CSV back to JSON?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Click the 'CSV → JSON' tab to switch directions. Paste your CSV data, and the tool will convert it to a JSON array of objects, using the first row as property names (if the 'First Row is Header' option is enabled)."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How does the tool handle nested JSON objects?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "When the 'Flatten Nested Objects' option is enabled, nested objects are flattened using dot notation. For example, { \"address\": { \"city\": \"New York\" } } becomes a column named 'address.city' with the value 'New York'."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What delimiters are supported?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "We support multiple delimiters: comma (,), semicolon (;), tab, and pipe (|). For CSV to JSON conversion, you can also use auto-detect to automatically identify the delimiter used in your data."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my data secure?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Absolutely. All conversion happens locally in your browser using JavaScript. Your data is never uploaded to any server. This means even sensitive data can be safely converted without privacy concerns."
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
                    <li class="text-gold">JSON to CSV Converter</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">JSON to CSV Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert between JSON and CSV formats instantly. Bidirectional conversion with support for nested objects, custom delimiters, and more.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                {{-- Privacy Notice --}}
                <div class="flex items-center gap-2 mb-6 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <span class="text-green-400 text-sm">Your data is processed entirely in your browser. Nothing is uploaded to any server.</span>
                </div>

                {{-- Direction Toggle --}}
                <div class="flex justify-center mb-6">
                    <div class="inline-flex rounded-lg bg-darkBg p-1 border border-gold/20">
                        <button id="json-to-csv-tab" class="px-6 py-2.5 rounded-md font-semibold transition-all duration-200 cursor-pointer bg-gold text-darkBg">
                            JSON → CSV
                        </button>
                        <button id="csv-to-json-tab" class="px-6 py-2.5 rounded-md font-semibold transition-all duration-200 cursor-pointer text-light-muted hover:text-light">
                            CSV → JSON
                        </button>
                    </div>
                </div>

                {{-- Options Panel --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    {{-- JSON to CSV Options --}}
                    <div id="json-to-csv-options" class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="delimiter-json" class="text-light font-semibold mb-2 block text-sm">Delimiter</label>
                            <select id="delimiter-json" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value=",">Comma (,)</option>
                                <option value=";">Semicolon (;)</option>
                                <option value="&#9;">Tab</option>
                                <option value="|">Pipe (|)</option>
                            </select>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="include-headers" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Include Headers</span>
                            </label>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="flatten-nested" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Flatten Nested Objects</span>
                            </label>
                        </div>
                        <div>
                            <label for="array-handling" class="text-light font-semibold mb-2 block text-sm">Array Handling</label>
                            <select id="array-handling" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="stringify">Stringify</option>
                                <option value="join">Join with semicolon</option>
                            </select>
                        </div>
                    </div>

                    {{-- CSV to JSON Options --}}
                    <div id="csv-to-json-options" class="hidden grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="delimiter-csv" class="text-light font-semibold mb-2 block text-sm">Delimiter</label>
                            <select id="delimiter-csv" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="auto">Auto-detect</option>
                                <option value=",">Comma (,)</option>
                                <option value=";">Semicolon (;)</option>
                                <option value="&#9;">Tab</option>
                                <option value="|">Pipe (|)</option>
                            </select>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="first-row-header" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">First Row is Header</span>
                            </label>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="parse-numbers" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Parse Numbers</span>
                            </label>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="parse-booleans" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Parse Booleans</span>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Editor Area --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    {{-- Input --}}
                    <div class="flex flex-col">
                        <label for="data-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            <span id="input-label">JSON Input</span>
                        </label>
                        <textarea
                            id="data-input"
                            class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Paste your JSON here..."
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output --}}
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            <span id="output-label">CSV Output</span>
                        </label>
                        {{-- CSV Output (textarea) --}}
                        <textarea
                            id="data-output-csv"
                            class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Converted output will appear here..."
                            readonly
                            spellcheck="false"
                        ></textarea>
                        {{-- JSON Output (syntax highlighted) --}}
                        <div id="data-output-json" class="hidden flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm overflow-auto">
                            <pre id="output-pre" class="whitespace-pre-wrap break-words"><code id="output-code" class="text-light-muted">Converted output will appear here...</code></pre>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                        <span id="convert-text">Convert to CSV</span>
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download
                    </button>
                    <button id="btn-swap" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
                        Swap
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
                            <div class="text-light-muted text-sm">Input Size</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-output-size" class="text-2xl font-bold text-light mb-1">0 B</div>
                            <div class="text-light-muted text-sm">Output Size</div>
                        </div>
                    </div>
                </div>

                {{-- Success/Error Notifications --}}
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

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Bidirectional Conversion</h3>
                    <p class="text-light-muted text-sm">Convert JSON to CSV or CSV to JSON with a single click. Switch directions instantly.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Advanced Options</h3>
                    <p class="text-light-muted text-sm">Customize delimiters, handle nested objects, parse data types, and more for precise conversions.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Your data never leaves your device.</p>
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
                            <span class="text-light font-medium">How do I convert JSON to CSV?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Simply paste your JSON array into the input field and click "Convert". The tool will automatically extract all keys as column headers and convert each object in the array to a CSV row. You can then copy the result or download it as a .csv file.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I convert CSV back to JSON?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Click the "CSV → JSON" tab to switch directions. Paste your CSV data, and the tool will convert it to a JSON array of objects, using the first row as property names (if the "First Row is Header" option is enabled).
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How does the tool handle nested JSON objects?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            When the "Flatten Nested Objects" option is enabled, nested objects are flattened using dot notation. For example, <code class="bg-darkCard px-1 rounded">{"address": {"city": "New York"}}</code> becomes a column named "address.city" with the value "New York".
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What delimiters are supported?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            We support multiple delimiters: comma (,), semicolon (;), tab, and pipe (|). For CSV to JSON conversion, you can also use auto-detect to automatically identify the delimiter used in your data.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my data secure?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Absolutely. All conversion happens locally in your browser using JavaScript. Your data is never uploaded to any server. This means even sensitive data can be safely converted without privacy concerns.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    {{-- Papa Parse for robust CSV parsing --}}
    <script src="https://cdn.jsdelivr.net/npm/papaparse@5.4.1/papaparse.min.js"></script>

    <script>
    (function() {
        // DOM Elements
        const jsonToCsvTab = document.getElementById('json-to-csv-tab');
        const csvToJsonTab = document.getElementById('csv-to-json-tab');
        const jsonToCsvOptions = document.getElementById('json-to-csv-options');
        const csvToJsonOptions = document.getElementById('csv-to-json-options');
        const inputLabel = document.getElementById('input-label');
        const outputLabel = document.getElementById('output-label');
        const dataInput = document.getElementById('data-input');
        const dataOutputCsv = document.getElementById('data-output-csv');
        const dataOutputJson = document.getElementById('data-output-json');
        const outputCode = document.getElementById('output-code');
        const convertText = document.getElementById('convert-text');
        const btnConvert = document.getElementById('btn-convert');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const btnSwap = document.getElementById('btn-swap');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const statsBar = document.getElementById('stats-bar');
        const statRows = document.getElementById('stat-rows');
        const statColumns = document.getElementById('stat-columns');
        const statInputSize = document.getElementById('stat-input-size');
        const statOutputSize = document.getElementById('stat-output-size');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        // JSON to CSV Options
        const delimiterJson = document.getElementById('delimiter-json');
        const includeHeaders = document.getElementById('include-headers');
        const flattenNested = document.getElementById('flatten-nested');
        const arrayHandling = document.getElementById('array-handling');

        // CSV to JSON Options
        const delimiterCsv = document.getElementById('delimiter-csv');
        const firstRowHeader = document.getElementById('first-row-header');
        const parseNumbers = document.getElementById('parse-numbers');
        const parseBooleans = document.getElementById('parse-booleans');

        // State
        let currentDirection = 'json-to-csv';

        // Sample Data
        const sampleJson = [
            { "name": "John Doe", "email": "john@example.com", "age": 30, "city": "New York", "active": true },
            { "name": "Jane Smith", "email": "jane@example.com", "age": 25, "city": "London", "active": false },
            { "name": "Bob Johnson", "email": "bob@example.com", "age": 35, "city": "Paris", "active": true }
        ];

        const sampleCsv = `name,email,age,city,active
John Doe,john@example.com,30,New York,true
Jane Smith,jane@example.com,25,London,false
Bob Johnson,bob@example.com,35,Paris,true`;

        // ===== Utility Functions =====

        function formatBytes(bytes) {
            if (bytes === 0) return '0 B';
            const k = 1024;
            const sizes = ['B', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        function showSuccess(message) {
            successMessage.textContent = message;
            successNotification.classList.remove('hidden');
            errorNotification.classList.add('hidden');
            setTimeout(() => successNotification.classList.add('hidden'), 3000);
        }

        function showError(message) {
            errorMessage.textContent = message;
            errorNotification.classList.remove('hidden');
            successNotification.classList.add('hidden');
            setTimeout(() => errorNotification.classList.add('hidden'), 5000);
        }

        function hideNotifications() {
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        }

        // ===== Syntax Highlighting =====

        function syntaxHighlight(json) {
            if (typeof json !== 'string') {
                json = JSON.stringify(json, null, 2);
            }

            // Escape HTML
            json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');

            // Apply syntax highlighting with Tailwind classes
            return json.replace(
                /("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g,
                function(match) {
                    let cls = 'text-emerald-400'; // number
                    if (/^"/.test(match)) {
                        if (/:$/.test(match)) {
                            cls = 'text-gold'; // key
                            match = match.slice(0, -1) + '<span class="text-light">:</span>';
                        } else {
                            cls = 'text-sky-400'; // string
                        }
                    } else if (/true|false/.test(match)) {
                        cls = 'text-purple-400'; // boolean
                    } else if (/null/.test(match)) {
                        cls = 'text-light-muted'; // null
                    }
                    return '<span class="' + cls + '">' + match + '</span>';
                }
            );
        }

        // Get the raw output value (for copy/download)
        function getOutputValue() {
            if (currentDirection === 'json-to-csv') {
                return dataOutputCsv.value;
            } else {
                // For JSON output, get the text content from the highlighted output
                return outputCode.textContent;
            }
        }

        // Set the output value
        function setOutput(value) {
            if (currentDirection === 'json-to-csv') {
                dataOutputCsv.value = value;
            } else {
                // Apply syntax highlighting for JSON
                outputCode.innerHTML = value ? syntaxHighlight(value) : '<span class="text-light-muted">Converted output will appear here...</span>';
            }
        }

        // Clear output
        function clearOutput() {
            dataOutputCsv.value = '';
            outputCode.innerHTML = '<span class="text-light-muted">Converted output will appear here...</span>';
        }

        // Switch output panels based on direction
        function switchOutputPanel(direction) {
            if (direction === 'json-to-csv') {
                dataOutputCsv.classList.remove('hidden');
                dataOutputJson.classList.add('hidden');
            } else {
                dataOutputCsv.classList.add('hidden');
                dataOutputJson.classList.remove('hidden');
            }
        }

        // ===== Flatten Object Function =====

        function flattenObject(obj, prefix = '') {
            const flattened = {};

            for (const key in obj) {
                if (!obj.hasOwnProperty(key)) continue;

                const newKey = prefix ? `${prefix}.${key}` : key;
                const value = obj[key];

                if (value !== null && typeof value === 'object' && !Array.isArray(value)) {
                    Object.assign(flattened, flattenObject(value, newKey));
                } else {
                    flattened[newKey] = value;
                }
            }

            return flattened;
        }

        // ===== CSV Escaping =====

        function escapeCSV(value, delimiter) {
            if (value === null || value === undefined) return '';

            const stringValue = String(value);
            // If contains delimiter, newline, or quotes, wrap in quotes
            if (stringValue.includes(delimiter) || stringValue.includes('\n') || stringValue.includes('\r') || stringValue.includes('"')) {
                return `"${stringValue.replace(/"/g, '""')}"`;
            }
            return stringValue;
        }

        // ===== JSON to CSV Conversion =====

        function jsonToCsv(jsonString) {
            const delimiter = delimiterJson.value;
            const shouldIncludeHeaders = includeHeaders.checked;
            const shouldFlatten = flattenNested.checked;
            const arrayHandlingMethod = arrayHandling.value;

            let data;
            try {
                data = JSON.parse(jsonString);
            } catch (e) {
                throw new Error(`Invalid JSON: ${e.message}`);
            }

            // Ensure it's an array
            if (!Array.isArray(data)) {
                // If single object, wrap in array
                data = [data];
            }

            if (data.length === 0) {
                throw new Error('JSON array is empty');
            }

            // Process each object
            const processedData = data.map(obj => {
                if (typeof obj !== 'object' || obj === null) {
                    return { value: obj };
                }

                let processed = shouldFlatten ? flattenObject(obj) : { ...obj };

                // Handle arrays in values
                for (const key in processed) {
                    if (Array.isArray(processed[key])) {
                        if (arrayHandlingMethod === 'join') {
                            processed[key] = processed[key].join(';');
                        } else {
                            processed[key] = JSON.stringify(processed[key]);
                        }
                    } else if (typeof processed[key] === 'object' && processed[key] !== null) {
                        processed[key] = JSON.stringify(processed[key]);
                    }
                }

                return processed;
            });

            // Get all unique keys (headers)
            const headers = [...new Set(processedData.flatMap(obj => Object.keys(obj)))];

            // Build CSV rows
            const rows = [];

            if (shouldIncludeHeaders) {
                rows.push(headers.map(h => escapeCSV(h, delimiter)).join(delimiter));
            }

            processedData.forEach(obj => {
                const row = headers.map(header => {
                    const value = obj[header];
                    return escapeCSV(value, delimiter);
                });
                rows.push(row.join(delimiter));
            });

            return {
                csv: rows.join('\n'),
                rowCount: processedData.length,
                columnCount: headers.length
            };
        }

        // ===== CSV to JSON Conversion =====

        function csvToJson(csvString) {
            const delimiter = delimiterCsv.value;
            const hasHeader = firstRowHeader.checked;
            const shouldParseNumbers = parseNumbers.checked;
            const shouldParseBooleans = parseBooleans.checked;

            const parseConfig = {
                delimiter: delimiter === 'auto' ? '' : delimiter,
                header: hasHeader,
                dynamicTyping: shouldParseNumbers,
                skipEmptyLines: true
            };

            const result = Papa.parse(csvString.trim(), parseConfig);

            if (result.errors.length > 0) {
                const firstError = result.errors[0];
                throw new Error(`CSV parsing error: ${firstError.message} (Row ${firstError.row || 'unknown'})`);
            }

            let data = result.data;

            if (data.length === 0) {
                throw new Error('CSV data is empty');
            }

            // Parse booleans if enabled
            if (shouldParseBooleans && hasHeader) {
                data = data.map(row => {
                    const newRow = {};
                    for (const key in row) {
                        const value = row[key];
                        if (typeof value === 'string') {
                            const lower = value.toLowerCase().trim();
                            if (lower === 'true') {
                                newRow[key] = true;
                            } else if (lower === 'false') {
                                newRow[key] = false;
                            } else {
                                newRow[key] = value;
                            }
                        } else {
                            newRow[key] = value;
                        }
                    }
                    return newRow;
                });
            }

            // Determine column count
            let columnCount = 0;
            if (hasHeader && data.length > 0) {
                columnCount = Object.keys(data[0]).length;
            } else if (!hasHeader && data.length > 0) {
                columnCount = Array.isArray(data[0]) ? data[0].length : Object.keys(data[0]).length;
            }

            return {
                json: JSON.stringify(data, null, 2),
                rowCount: data.length,
                columnCount: columnCount
            };
        }

        // ===== Direction Switching =====

        function switchDirection(direction) {
            currentDirection = direction;

            if (direction === 'json-to-csv') {
                jsonToCsvTab.classList.add('bg-gold', 'text-darkBg');
                jsonToCsvTab.classList.remove('text-light-muted', 'hover:text-light');
                csvToJsonTab.classList.remove('bg-gold', 'text-darkBg');
                csvToJsonTab.classList.add('text-light-muted', 'hover:text-light');

                jsonToCsvOptions.classList.remove('hidden');
                csvToJsonOptions.classList.add('hidden');

                inputLabel.textContent = 'JSON Input';
                outputLabel.textContent = 'CSV Output';
                dataInput.placeholder = 'Paste your JSON here...';
                convertText.textContent = 'Convert to CSV';
            } else {
                csvToJsonTab.classList.add('bg-gold', 'text-darkBg');
                csvToJsonTab.classList.remove('text-light-muted', 'hover:text-light');
                jsonToCsvTab.classList.remove('bg-gold', 'text-darkBg');
                jsonToCsvTab.classList.add('text-light-muted', 'hover:text-light');

                csvToJsonOptions.classList.remove('hidden');
                jsonToCsvOptions.classList.add('hidden');

                inputLabel.textContent = 'CSV Input';
                outputLabel.textContent = 'JSON Output';
                dataInput.placeholder = 'Paste your CSV here...';
                convertText.textContent = 'Convert to JSON';
            }

            // Switch output panels
            switchOutputPanel(direction);

            // Clear fields when switching
            clearAll();
        }

        // ===== Core Functions =====

        function convert() {
            const input = dataInput.value.trim();

            if (!input) {
                showError('Please enter some data to convert');
                return;
            }

            try {
                let result;
                let outputValue;

                if (currentDirection === 'json-to-csv') {
                    result = jsonToCsv(input);
                    outputValue = result.csv;
                    dataOutputCsv.value = outputValue;
                } else {
                    result = csvToJson(input);
                    outputValue = result.json;
                    // Apply syntax highlighting for JSON output
                    outputCode.innerHTML = syntaxHighlight(outputValue);
                }

                // Update statistics
                statRows.textContent = result.rowCount;
                statColumns.textContent = result.columnCount;
                statInputSize.textContent = formatBytes(new Blob([input]).size);
                statOutputSize.textContent = formatBytes(new Blob([outputValue]).size);
                statsBar.classList.remove('hidden');

                showSuccess(`Conversion successful! ${result.rowCount} rows, ${result.columnCount} columns`);
            } catch (error) {
                showError(error.message);
                statsBar.classList.add('hidden');
            }
        }

        function copyOutput() {
            const output = getOutputValue();
            if (!output || output === 'Converted output will appear here...') {
                showError('Nothing to copy. Convert some data first.');
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
            }).catch(() => {
                showError('Failed to copy to clipboard');
            });
        }

        function downloadOutput() {
            const output = getOutputValue();
            if (!output || output === 'Converted output will appear here...') {
                showError('Nothing to download. Convert some data first.');
                return;
            }

            const extension = currentDirection === 'json-to-csv' ? 'csv' : 'json';
            const mimeType = currentDirection === 'json-to-csv' ? 'text/csv' : 'application/json';
            const filename = `converted-${new Date().toISOString().split('T')[0]}.${extension}`;

            const blob = new Blob([output], { type: mimeType });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);

            showSuccess(`Downloaded: ${filename}`);
        }

        function swapInputOutput() {
            const output = getOutputValue();
            if (!output || output === 'Converted output will appear here...') {
                showError('Nothing to swap. Convert some data first.');
                return;
            }

            // Switch direction
            const newDirection = currentDirection === 'json-to-csv' ? 'csv-to-json' : 'json-to-csv';
            switchDirection(newDirection);

            // Set output as new input (don't clear since switchDirection does it)
            dataInput.value = output;
            clearOutput();
            statsBar.classList.add('hidden');
        }

        function loadSampleData() {
            if (currentDirection === 'json-to-csv') {
                dataInput.value = JSON.stringify(sampleJson, null, 2);
            } else {
                dataInput.value = sampleCsv;
            }
            clearOutput();
            statsBar.classList.add('hidden');
            hideNotifications();
        }

        function clearAll() {
            dataInput.value = '';
            clearOutput();
            statsBar.classList.add('hidden');
            hideNotifications();
        }

        // ===== Event Listeners =====

        jsonToCsvTab.addEventListener('click', () => switchDirection('json-to-csv'));
        csvToJsonTab.addEventListener('click', () => switchDirection('csv-to-json'));

        btnConvert.addEventListener('click', convert);
        btnCopy.addEventListener('click', copyOutput);
        btnDownload.addEventListener('click', downloadOutput);
        btnSwap.addEventListener('click', swapInputOutput);
        btnSample.addEventListener('click', loadSampleData);
        btnClear.addEventListener('click', clearAll);

        // Keyboard shortcut: Ctrl+Enter to convert
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
