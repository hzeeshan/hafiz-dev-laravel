<x-layout>
    <x-slot:title>JSON Formatter & Validator Online - Free Tool | hafiz.dev</x-slot:title>
    <x-slot:description>Free online JSON formatter, validator, and beautifier. Format, validate, minify JSON instantly. No signup required. Developer tools by hafiz.dev</x-slot:description>
    <x-slot:keywords>json formatter, json validator, json beautifier, json viewer, json parser, format json online, validate json, minify json, pretty print json, json tool</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/json-formatter') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>JSON Formatter & Validator Online - Free Tool | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online JSON formatter, validator, and beautifier. Format, validate, minify JSON instantly. No signup required.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/json-formatter') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "JSON Formatter & Validator",
            "description": "Free online JSON formatter, validator, and beautifier. Format, validate, minify JSON instantly.",
            "url": "https://hafiz.dev/tools/json-formatter",
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
                    "name": "JSON Formatter",
                    "item": "https://hafiz.dev/tools/json-formatter"
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
                    "name": "What is JSON formatting?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "JSON formatting (also called beautifying or pretty-printing) is the process of adding proper indentation, line breaks, and spacing to JSON data to make it human-readable. This helps developers understand the structure of JSON data more easily."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How to validate JSON?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "To validate JSON, paste your JSON data into the input field and click the 'Validate' button. The tool will check if your JSON follows the correct syntax rules. If there are errors, it will show you the exact line and character position where the error occurred."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What's the difference between minify and beautify?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Beautify (format) adds indentation and line breaks to make JSON readable, while minify removes all unnecessary whitespace to reduce file size. Beautified JSON is for reading and debugging; minified JSON is for production and data transfer efficiency."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is this tool free?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, this JSON formatter and validator is completely free to use. There's no signup required, no usage limits, and no ads. It's built by hafiz.dev as a free resource for developers."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my data secure?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Absolutely. All JSON processing happens entirely in your browser using JavaScript. Your data never leaves your computer and is never sent to any server. This makes the tool completely safe for sensitive data."
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
                    <li class="text-gold">JSON Formatter</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">JSON Formatter & Validator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Format, validate, and minify JSON instantly. 100% client-side processing - your data never leaves your browser.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                {{-- Toolbar --}}
                <div class="flex flex-wrap gap-3 mb-4">
                    {{-- Primary Actions --}}
                    <button id="btn-format" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                        Format
                    </button>
                    <button id="btn-minify" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        Minify
                    </button>
                    <button id="btn-validate" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Validate
                    </button>

                    <div class="h-8 w-px bg-gold/20 hidden sm:block"></div>

                    {{-- Secondary Actions --}}
                    <button id="btn-copy" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download
                    </button>
                    <button id="btn-sample" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Sample
                    </button>
                    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>

                    <div class="h-8 w-px bg-gold/20 hidden sm:block"></div>

                    {{-- Settings --}}
                    <div class="flex items-center gap-2">
                        <label for="indent-select" class="text-light-muted text-sm">Indent:</label>
                        <select id="indent-select" class="bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-2 text-sm focus:border-gold focus:outline-none">
                            <option value="2">2 spaces</option>
                            <option value="4" selected>4 spaces</option>
                            <option value="tab">Tab</option>
                        </select>
                    </div>

                    <label class="flex items-center gap-2 cursor-pointer ml-auto">
                        <input type="checkbox" id="realtime-toggle" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
                        <span class="text-light-muted text-sm">Real-time validation</span>
                    </label>
                </div>

                {{-- Status Bar --}}
                <div id="status-bar" class="mb-4 p-3 rounded-lg bg-darkBg border border-gold/10 flex items-center justify-between">
                    <div class="flex items-center gap-4 text-sm">
                        <span class="text-light-muted">Status: <span id="status-text" class="text-gold">Ready</span></span>
                        <span class="text-light-muted">Lines: <span id="line-count" class="text-light">0</span></span>
                        <span class="text-light-muted">Size: <span id="file-size" class="text-light">0 B</span></span>
                    </div>
                    <div id="keyboard-hint" class="text-light-muted text-xs hidden sm:block">
                        <kbd class="px-2 py-1 bg-darkCard rounded text-gold">Ctrl</kbd> + <kbd class="px-2 py-1 bg-darkCard rounded text-gold">Enter</kbd> to format
                    </div>
                </div>

                {{-- Editor Area --}}
                <div class="grid lg:grid-cols-2 gap-4">
                    {{-- Input --}}
                    <div class="flex flex-col">
                        <label for="json-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Input
                        </label>
                        <textarea
                            id="json-input"
                            class="flex-1 min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Paste your JSON here..."
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output --}}
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            Output
                        </label>
                        <div id="json-output" class="flex-1 min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm overflow-auto">
                            <pre id="output-pre" class="whitespace-pre-wrap break-words"><code id="output-code" class="text-light-muted">Formatted JSON will appear here...</code></pre>
                        </div>
                    </div>
                </div>

                {{-- Error Display --}}
                <div id="error-display" class="hidden mt-4 p-4 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <h4 class="text-red-400 font-semibold mb-1">JSON Error</h4>
                            <p id="error-message" class="text-red-300 text-sm font-mono"></p>
                        </div>
                    </div>
                </div>

                {{-- Success Display --}}
                <div id="success-display" class="hidden mt-4 p-4 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p id="success-message" class="text-green-400 text-sm font-semibold"></p>
                    </div>
                </div>
            </div>

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">100%</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Client-Side</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Your data never touches our servers.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">Free</div>
                    <h3 class="text-lg font-semibold text-light mb-2">No Signup</h3>
                    <p class="text-light-muted text-sm">Use unlimited times without creating an account. No ads, no tracking.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">Fast</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant Results</h3>
                    <p class="text-light-muted text-sm">Format and validate JSON instantly with keyboard shortcuts support.</p>
                </div>
            </div>

            {{-- CTA Section --}}
            <x-tool-cta />

            {{-- FAQ Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Frequently Asked Questions</h2>

                <div class="space-y-4 max-w-3xl mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is JSON formatting?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            JSON formatting (also called beautifying or pretty-printing) is the process of adding proper indentation, line breaks, and spacing to JSON data to make it human-readable. This helps developers understand the structure of JSON data more easily, making it invaluable for debugging APIs, reading configuration files, and working with data.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How to validate JSON?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            To validate JSON, paste your JSON data into the input field and click the "Validate" button. The tool will check if your JSON follows the correct syntax rules. If there are errors, it will show you the exact line and character position where the error occurred, helping you quickly identify and fix issues like missing commas, unclosed brackets, or invalid values.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What's the difference between minify and beautify?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Beautify (format) adds indentation and line breaks to make JSON readable by humans. Minify removes all unnecessary whitespace, newlines, and formatting to reduce file size. Use beautified JSON for reading, debugging, and development. Use minified JSON for production environments, API responses, and data transfer where smaller file sizes improve performance.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is this tool free?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, this JSON formatter and validator is completely free to use. There's no signup required, no usage limits, and no advertisements. It's built by hafiz.dev as a free resource for the developer community.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my data secure?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Absolutely. All JSON processing happens entirely in your browser using JavaScript. Your data never leaves your computer and is never sent to any server. This makes the tool completely safe for sensitive data, API keys, configuration files, and any other private information you need to format or validate.
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
        const jsonInput = document.getElementById('json-input');
        const outputCode = document.getElementById('output-code');
        const btnFormat = document.getElementById('btn-format');
        const btnMinify = document.getElementById('btn-minify');
        const btnValidate = document.getElementById('btn-validate');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const indentSelect = document.getElementById('indent-select');
        const realtimeToggle = document.getElementById('realtime-toggle');
        const statusText = document.getElementById('status-text');
        const lineCount = document.getElementById('line-count');
        const fileSize = document.getElementById('file-size');
        const errorDisplay = document.getElementById('error-display');
        const errorMessage = document.getElementById('error-message');
        const successDisplay = document.getElementById('success-display');
        const successMessage = document.getElementById('success-message');

        // Sample JSON
        const sampleJson = {
            "name": "John Doe",
            "email": "john@example.com",
            "age": 30,
            "isActive": true,
            "address": {
                "street": "123 Main St",
                "city": "New York",
                "country": "USA",
                "zipCode": "10001"
            },
            "skills": ["JavaScript", "PHP", "Laravel", "Vue.js"],
            "projects": [
                {
                    "name": "Project Alpha",
                    "status": "completed",
                    "year": 2024
                },
                {
                    "name": "Project Beta",
                    "status": "in-progress",
                    "year": 2025
                }
            ],
            "metadata": null
        };

        // Utility Functions
        function getIndent() {
            const value = indentSelect.value;
            if (value === 'tab') return '\t';
            return parseInt(value, 10);
        }

        function formatBytes(bytes) {
            if (bytes === 0) return '0 B';
            const k = 1024;
            const sizes = ['B', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        function countLines(str) {
            if (!str) return 0;
            return str.split('\n').length;
        }

        function updateStats(text) {
            lineCount.textContent = countLines(text);
            fileSize.textContent = formatBytes(new Blob([text]).size);
        }

        function setStatus(text, type = 'default') {
            statusText.textContent = text;
            statusText.className = '';
            if (type === 'success') statusText.classList.add('text-green-400');
            else if (type === 'error') statusText.classList.add('text-red-400');
            else statusText.classList.add('text-gold');
        }

        function showError(message) {
            errorDisplay.classList.remove('hidden');
            successDisplay.classList.add('hidden');
            errorMessage.textContent = message;
            setStatus('Invalid JSON', 'error');
        }

        function showSuccess(message) {
            successDisplay.classList.remove('hidden');
            errorDisplay.classList.add('hidden');
            successMessage.textContent = message;
            setStatus('Valid JSON', 'success');
        }

        function hideMessages() {
            errorDisplay.classList.add('hidden');
            successDisplay.classList.add('hidden');
        }

        function parseJsonError(error, input) {
            const message = error.message;

            // Try to extract position from error message
            const posMatch = message.match(/position\s*(\d+)/i);
            if (posMatch) {
                const position = parseInt(posMatch[1], 10);
                const beforeError = input.substring(0, position);
                const lineNumber = (beforeError.match(/\n/g) || []).length + 1;
                const lastNewline = beforeError.lastIndexOf('\n');
                const column = position - lastNewline;
                return `${message} (Line ${lineNumber}, Column ${column})`;
            }

            return message;
        }

        // Syntax Highlighting
        function syntaxHighlight(json) {
            if (typeof json !== 'string') {
                json = JSON.stringify(json, null, getIndent());
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

        // Core Functions
        function formatJson() {
            const input = jsonInput.value.trim();
            if (!input) {
                hideMessages();
                outputCode.innerHTML = '<span class="text-light-muted">Formatted JSON will appear here...</span>';
                setStatus('Ready');
                return;
            }

            try {
                const parsed = JSON.parse(input);
                const formatted = JSON.stringify(parsed, null, getIndent());
                outputCode.innerHTML = syntaxHighlight(formatted);
                updateStats(formatted);
                showSuccess('JSON formatted successfully!');
            } catch (error) {
                showError(parseJsonError(error, input));
                outputCode.innerHTML = '<span class="text-red-400">Error parsing JSON. Check your input.</span>';
            }
        }

        function minifyJson() {
            const input = jsonInput.value.trim();
            if (!input) {
                hideMessages();
                return;
            }

            try {
                const parsed = JSON.parse(input);
                const minified = JSON.stringify(parsed);
                outputCode.innerHTML = syntaxHighlight(minified);
                updateStats(minified);
                showSuccess('JSON minified successfully!');
            } catch (error) {
                showError(parseJsonError(error, input));
            }
        }

        function validateJson() {
            const input = jsonInput.value.trim();
            if (!input) {
                showError('Please enter JSON to validate');
                return;
            }

            try {
                JSON.parse(input);
                showSuccess('Valid JSON! The syntax is correct.');
            } catch (error) {
                showError(parseJsonError(error, input));
            }
        }

        function copyToClipboard() {
            const output = outputCode.textContent;
            if (!output || output === 'Formatted JSON will appear here...') {
                showError('Nothing to copy. Format some JSON first.');
                return;
            }

            navigator.clipboard.writeText(output).then(() => {
                const originalText = btnCopy.innerHTML;
                btnCopy.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                btnCopy.classList.add('text-green-400', 'border-green-400');

                setTimeout(() => {
                    btnCopy.innerHTML = originalText;
                    btnCopy.classList.remove('text-green-400', 'border-green-400');
                }, 2000);
            }).catch(() => {
                showError('Failed to copy to clipboard');
            });
        }

        function downloadJson() {
            const output = outputCode.textContent;
            if (!output || output === 'Formatted JSON will appear here...') {
                showError('Nothing to download. Format some JSON first.');
                return;
            }

            const blob = new Blob([output], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const now = new Date();
            const timestamp = now.getFullYear() + '-' +
                String(now.getMonth() + 1).padStart(2, '0') + '-' +
                String(now.getDate()).padStart(2, '0') + '-' +
                String(now.getHours()).padStart(2, '0') +
                String(now.getMinutes()).padStart(2, '0') +
                String(now.getSeconds()).padStart(2, '0');
            const a = document.createElement('a');
            a.href = url;
            a.download = `json-formatted-${timestamp}.json`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);

            showSuccess('JSON file downloaded!');
        }

        function loadSample() {
            jsonInput.value = JSON.stringify(sampleJson);
            formatJson();
        }

        function clearAll() {
            jsonInput.value = '';
            outputCode.innerHTML = '<span class="text-light-muted">Formatted JSON will appear here...</span>';
            hideMessages();
            setStatus('Ready');
            updateStats('');
        }

        // Event Listeners
        btnFormat.addEventListener('click', formatJson);
        btnMinify.addEventListener('click', minifyJson);
        btnValidate.addEventListener('click', validateJson);
        btnCopy.addEventListener('click', copyToClipboard);
        btnDownload.addEventListener('click', downloadJson);
        btnSample.addEventListener('click', loadSample);
        btnClear.addEventListener('click', clearAll);

        // Real-time validation
        let debounceTimer;
        jsonInput.addEventListener('input', function() {
            updateStats(jsonInput.value);

            if (realtimeToggle.checked) {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    const input = jsonInput.value.trim();
                    if (!input) {
                        hideMessages();
                        setStatus('Ready');
                        return;
                    }

                    try {
                        JSON.parse(input);
                        setStatus('Valid JSON', 'success');
                        hideMessages();
                    } catch (error) {
                        setStatus('Invalid JSON', 'error');
                    }
                }, 300);
            }
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                e.preventDefault();
                formatJson();
            }
        });

        // Initialize stats
        updateStats('');
    })();
    </script>
    @endpush
</x-layout>
