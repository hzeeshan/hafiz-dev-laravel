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
                <x-tool-privacy-banner />

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
    @include('tools.partials.json-to-csv-converter-script')
    @endpush
</x-layout>
