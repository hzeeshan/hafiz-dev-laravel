<x-layout>
    <x-slot:title>XML to JSON Converter - Convert XML to JSON Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online XML to JSON converter. Convert XML data to JSON format instantly in your browser. Supports nested elements, attributes, CDATA, and complex structures. 100% client-side - your data never leaves your browser.</x-slot:description>
    <x-slot:keywords>xml to json, xml to json converter, convert xml to json, xml json converter, xml to json online, xml2json, parse xml to json</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/xml-to-json') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>XML to JSON Converter - Convert XML to JSON Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online XML to JSON converter. Convert XML to JSON format instantly in your browser. 100% client-side - your data never leaves your browser.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/xml-to-json') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "XML to JSON Converter",
            "description": "Free online XML to JSON converter. Convert XML data to JSON format instantly. Supports nested elements, attributes, CDATA, and complex structures.",
            "url": "https://hafiz.dev/tools/xml-to-json",
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
                    "name": "XML to JSON Converter",
                    "item": "https://hafiz.dev/tools/xml-to-json"
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
                    "name": "How do I convert XML to JSON?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Paste your XML data into the input field and click 'Convert to JSON'. The tool instantly parses your XML and outputs valid, formatted JSON. You can then copy the result or download it as a .json file."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How does the converter handle XML attributes?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "XML attributes are converted to JSON properties with a configurable prefix (default: '@'). For example, <item id='1'> becomes { '@id': '1' }. You can change or remove the prefix in the options."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What happens with nested XML elements?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Nested XML elements are converted to nested JSON objects. Repeated child elements with the same tag name are automatically grouped into JSON arrays. The full hierarchy is preserved in the output."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does it support CDATA sections?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, CDATA sections are extracted and included as text content in the JSON output. The CDATA wrapper is removed and only the content is preserved."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my data secure when using this converter?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Absolutely. All conversion happens locally in your browser using JavaScript. Your data is never uploaded to any server. This means even sensitive XML data like API responses or configuration files can be safely converted."
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
                    <li class="text-gold">XML to JSON Converter</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">XML to JSON Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert XML to JSON format instantly. Parse API responses, SOAP messages, RSS feeds, and configuration files.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <x-tool-privacy-banner />

                {{-- Options Panel --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="json-indent" class="text-light font-semibold mb-2 block text-sm">JSON Indentation</label>
                            <select id="json-indent" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="2">2 Spaces (default)</option>
                                <option value="4">4 Spaces</option>
                                <option value="tab">Tab</option>
                                <option value="0">Minified</option>
                            </select>
                        </div>
                        <div>
                            <label for="attr-prefix" class="text-light font-semibold mb-2 block text-sm">Attribute Prefix</label>
                            <select id="attr-prefix" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="@">@ (default)</option>
                                <option value="_">_ (underscore)</option>
                                <option value="$">$ (dollar)</option>
                                <option value="">None (no prefix)</option>
                            </select>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="trim-text" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Trim Whitespace</span>
                            </label>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="parse-numbers" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Parse Numbers</span>
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
<bookstore>
  <book category="fiction">
    <title>The Great Gatsby</title>
    <author>F. Scott Fitzgerald</author>
    <price>10.99</price>
  </book>
</bookstore>'
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output --}}
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            JSON Output
                        </label>
                        <div id="json-output-wrapper" class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm overflow-auto">
                            <pre id="output-pre" class="whitespace-pre-wrap break-words"><code id="output-code" class="text-light-muted">Converted JSON will appear here...</code></pre>
                        </div>
                        <textarea id="json-output-raw" class="hidden"></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                        Convert to JSON
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download .json
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
                            <div id="stat-elements" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Elements</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-depth" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Max Depth</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-input-size" class="text-2xl font-bold text-light mb-1">0 B</div>
                            <div class="text-light-muted text-sm">XML Size</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-output-size" class="text-2xl font-bold text-light mb-1">0 B</div>
                            <div class="text-light-muted text-sm">JSON Size</div>
                        </div>
                    </div>
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

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Full XML Support</h3>
                    <p class="text-light-muted text-sm">Handles attributes, namespaces, CDATA sections, nested elements, and repeated tags converted to arrays.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Configurable Output</h3>
                    <p class="text-light-muted text-sm">Choose attribute prefix, indentation style, number parsing, and whitespace handling for your needs.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Your XML data — API responses, configs, or SOAP messages — never leaves your device.</p>
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
                            <span class="text-light font-medium">How do I convert XML to JSON?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Paste your XML data into the input field and click "Convert to JSON". The tool instantly parses your XML and outputs valid, formatted JSON. You can then copy the result or download it as a .json file.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How does the converter handle XML attributes?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            XML attributes are converted to JSON properties with a configurable prefix (default: <code class="bg-darkCard px-1 rounded">@</code>). For example, <code class="bg-darkCard px-1 rounded">&lt;item id="1"&gt;</code> becomes <code class="bg-darkCard px-1 rounded">{ "@id": "1" }</code>. You can change or remove the prefix in the options.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What happens with nested XML elements?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Nested XML elements are converted to nested JSON objects. Repeated child elements with the same tag name are automatically grouped into JSON arrays. The full hierarchy is preserved in the output.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does it support CDATA sections?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, CDATA sections are extracted and included as text content in the JSON output. The CDATA wrapper is removed and only the content is preserved.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my data secure when using this converter?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Absolutely. All conversion happens locally in your browser using JavaScript. Your data is never uploaded to any server. This means even sensitive XML data like API responses or configuration files can be safely converted.
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
        const outputCode = document.getElementById('output-code');
        const jsonOutputRaw = document.getElementById('json-output-raw');
        const jsonIndent = document.getElementById('json-indent');
        const attrPrefix = document.getElementById('attr-prefix');
        const trimText = document.getElementById('trim-text');
        const parseNumbers = document.getElementById('parse-numbers');
        const btnConvert = document.getElementById('btn-convert');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const statsBar = document.getElementById('stats-bar');
        const statElements = document.getElementById('stat-elements');
        const statDepth = document.getElementById('stat-depth');
        const statInputSize = document.getElementById('stat-input-size');
        const statOutputSize = document.getElementById('stat-output-size');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        // Sample XML
        const sampleXml = `<?xml version="1.0" encoding="UTF-8"?>
<bookstore>
  <book category="fiction" lang="en">
    <title>The Great Gatsby</title>
    <author>F. Scott Fitzgerald</author>
    <year>1925</year>
    <price>10.99</price>
    <tags>
      <tag>classic</tag>
      <tag>american</tag>
      <tag>novel</tag>
    </tags>
  </book>
  <book category="non-fiction" lang="en">
    <title>Sapiens</title>
    <author>Yuval Noah Harari</author>
    <year>2011</year>
    <price>14.99</price>
    <tags>
      <tag>history</tag>
      <tag>science</tag>
    </tags>
  </book>
  <book category="fiction" lang="es">
    <title>One Hundred Years of Solitude</title>
    <author>Gabriel García Márquez</author>
    <year>1967</year>
    <price>12.50</price>
    <description><![CDATA[A masterpiece of <em>magical realism</em> that tells the multi-generational story of the Buendía family.]]></description>
    <tags>
      <tag>classic</tag>
      <tag>latin-american</tag>
    </tags>
  </book>
</bookstore>`;

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

        function syntaxHighlight(json) {
            if (typeof json !== 'string') json = JSON.stringify(json, null, 2);
            json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            return json.replace(
                /("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g,
                function(match) {
                    let cls = 'text-emerald-400';
                    if (/^"/.test(match)) {
                        if (/:$/.test(match)) {
                            cls = 'text-gold';
                            match = match.slice(0, -1) + '<span class="text-light">:</span>';
                        } else {
                            cls = 'text-sky-400';
                        }
                    } else if (/true|false/.test(match)) {
                        cls = 'text-purple-400';
                    } else if (/null/.test(match)) {
                        cls = 'text-light-muted';
                    }
                    return '<span class="' + cls + '">' + match + '</span>';
                }
            );
        }

        // ===== XML Parser =====

        let elementCount = 0;

        function xmlToJson(xml, options) {
            const parser = new DOMParser();
            const doc = parser.parseFromString(xml, 'text/xml');

            // Check for parse errors
            const parseError = doc.querySelector('parsererror');
            if (parseError) {
                const errorText = parseError.textContent || parseError.innerText;
                throw new Error('XML Parse Error: ' + errorText.split('\n')[0]);
            }

            elementCount = 0;
            const result = processNode(doc.documentElement, options);

            // Wrap in root element name
            const rootName = doc.documentElement.tagName;
            const wrapped = {};
            wrapped[rootName] = result;

            return wrapped;
        }

        function processNode(node, options) {
            elementCount++;
            const obj = {};
            let hasChildren = false;
            let textContent = '';

            // Process attributes
            if (node.attributes && node.attributes.length > 0) {
                hasChildren = true;
                for (let i = 0; i < node.attributes.length; i++) {
                    const attr = node.attributes[i];
                    const key = options.prefix + attr.name;
                    obj[key] = maybeParseValue(attr.value, options);
                }
            }

            // Process child nodes
            if (node.childNodes && node.childNodes.length > 0) {
                const childElements = {};

                for (let i = 0; i < node.childNodes.length; i++) {
                    const child = node.childNodes[i];

                    if (child.nodeType === Node.ELEMENT_NODE) {
                        hasChildren = true;
                        const tagName = child.tagName;

                        const childValue = processNode(child, options);

                        if (childElements[tagName] !== undefined) {
                            // Already seen this tag — convert to array
                            if (!Array.isArray(obj[tagName])) {
                                obj[tagName] = [obj[tagName]];
                            }
                            obj[tagName].push(childValue);
                        } else {
                            obj[tagName] = childValue;
                            childElements[tagName] = true;
                        }
                    } else if (child.nodeType === Node.TEXT_NODE || child.nodeType === Node.CDATA_SECTION_NODE) {
                        const text = options.trim ? child.nodeValue.trim() : child.nodeValue;
                        if (text) {
                            textContent += text;
                        }
                    }
                }
            }

            // Determine return value
            if (hasChildren) {
                if (textContent) {
                    obj['#text'] = maybeParseValue(textContent, options);
                }
                return obj;
            }

            // Leaf node — return text content directly
            return maybeParseValue(textContent, options);
        }

        function maybeParseValue(value, options) {
            if (!options.parseNums) return value;

            // Try to parse as number
            if (value !== '' && !isNaN(value) && !isNaN(parseFloat(value))) {
                const num = Number(value);
                // Avoid parsing things like "007" as numbers
                if (String(num) === value || (value.includes('.') && String(num) === value)) {
                    return num;
                }
            }

            // Parse booleans
            if (value === 'true') return true;
            if (value === 'false') return false;

            return value;
        }

        function getMaxDepth(obj, depth) {
            if (obj === null || typeof obj !== 'object') return depth;
            let max = depth;
            const values = Array.isArray(obj) ? obj : Object.values(obj);
            for (const v of values) {
                const d = getMaxDepth(v, depth + 1);
                if (d > max) max = d;
            }
            return max;
        }

        // ===== Core Functions =====

        function convert() {
            const input = xmlInput.value.trim();
            if (!input) {
                showError('Please enter some XML to convert');
                return;
            }

            try {
                const options = {
                    prefix: attrPrefix.value,
                    trim: trimText.checked,
                    parseNums: parseNumbers.checked
                };

                const data = xmlToJson(input, options);

                let indentValue = jsonIndent.value;
                let jsonString;
                if (indentValue === '0') {
                    jsonString = JSON.stringify(data);
                } else if (indentValue === 'tab') {
                    jsonString = JSON.stringify(data, null, '\t');
                } else {
                    jsonString = JSON.stringify(data, null, parseInt(indentValue));
                }

                jsonOutputRaw.value = jsonString;
                outputCode.innerHTML = syntaxHighlight(jsonString);

                // Stats
                statElements.textContent = elementCount;
                statDepth.textContent = getMaxDepth(data, 0);
                statInputSize.textContent = formatBytes(new Blob([input]).size);
                statOutputSize.textContent = formatBytes(new Blob([jsonString]).size);
                statsBar.classList.remove('hidden');

                showSuccess('XML converted to JSON successfully! ' + elementCount + ' elements processed.');
            } catch (e) {
                showError(e.message);
                statsBar.classList.add('hidden');
            }
        }

        function copyOutput() {
            const output = jsonOutputRaw.value;
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
            const output = jsonOutputRaw.value;
            if (!output) {
                showError('Nothing to download. Convert some XML first.');
                return;
            }
            const filename = 'converted-' + new Date().toISOString().split('T')[0] + '.json';
            const blob = new Blob([output], { type: 'application/json' });
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
            jsonOutputRaw.value = '';
            outputCode.innerHTML = '<span class="text-light-muted">Converted JSON will appear here...</span>';
            statsBar.classList.add('hidden');
        }

        function clearAll() {
            xmlInput.value = '';
            jsonOutputRaw.value = '';
            outputCode.innerHTML = '<span class="text-light-muted">Converted JSON will appear here...</span>';
            statsBar.classList.add('hidden');
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
