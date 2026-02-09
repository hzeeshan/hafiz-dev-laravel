<x-layout>
    <x-slot:title>Base64 Encoder & Decoder Online - Free Tool | hafiz.dev</x-slot:title>
    <x-slot:description>Free online Base64 encoder and decoder. Encode text to Base64 or decode Base64 to text instantly. 100% client-side, your data never leaves your browser.</x-slot:description>
    <x-slot:keywords>base64 encoder, base64 decoder, base64 online, encode base64, decode base64, base64 converter, url safe base64</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/base64-encoder') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Base64 Encoder & Decoder Online - Free Tool | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online Base64 encoder and decoder. Encode text to Base64 or decode Base64 to text instantly. 100% client-side processing.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/base64-encoder') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Base64 Encoder & Decoder",
            "description": "Free online Base64 encoder and decoder. Encode text to Base64 or decode Base64 to text instantly.",
            "url": "https://hafiz.dev/tools/base64-encoder",
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
                    "name": "Base64 Encoder",
                    "item": "https://hafiz.dev/tools/base64-encoder"
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
                    "name": "What is Base64 encoding?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Base64 is a binary-to-text encoding scheme that represents binary data in ASCII string format. It converts binary data into a set of 64 printable characters (A-Z, a-z, 0-9, +, /), making it safe to transmit through text-based protocols like email or embed in HTML/CSS."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "When should I use Base64?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Base64 is commonly used for embedding images in HTML/CSS (data URIs), encoding data for URLs, storing binary data in JSON, email attachments (MIME encoding), and encoding authentication credentials in HTTP headers."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is URL-safe Base64?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Standard Base64 uses + and / characters which have special meaning in URLs. URL-safe Base64 replaces + with - and / with _, and removes padding characters (=). This variant is commonly used in JWTs and URL parameters."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is Base64 encryption?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "No, Base64 is encoding, not encryption. It's easily reversible and provides no security whatsoever. Anyone can decode Base64 strings. Never use Base64 to protect sensitive information - use proper encryption instead."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my data secure?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, all Base64 processing happens entirely in your browser using JavaScript. Your data never leaves your computer and is never sent to any server, making this tool completely safe for any data."
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
                    <li class="text-gold">Base64 Encoder</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Base64 Encoder & Decoder</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Encode text to Base64 or decode Base64 strings instantly. 100% client-side processing - your data never leaves your browser.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Toolbar --}}
                <div class="flex flex-wrap gap-3 mb-4">
                    {{-- Primary Actions --}}
                    <button id="btn-encode" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Encode
                    </button>
                    <button id="btn-decode" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path></svg>
                        Decode
                    </button>

                    <div class="h-8 w-px bg-gold/20 hidden sm:block"></div>

                    {{-- Secondary Actions --}}
                    <button id="btn-swap" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
                        Swap
                    </button>
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

                    {{-- Options --}}
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="url-safe-toggle" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                        <span class="text-light-muted text-sm">URL-safe encoding</span>
                    </label>
                </div>

                {{-- Status Bar --}}
                <div id="status-bar" class="mb-4 p-3 rounded-lg bg-darkBg border border-gold/10 flex items-center justify-between">
                    <div class="flex items-center gap-4 text-sm">
                        <span class="text-light-muted">Status: <span id="status-text" class="text-gold">Ready</span></span>
                        <span class="text-light-muted">Input: <span id="input-count" class="text-light">0</span> chars</span>
                        <span class="text-light-muted">Output: <span id="output-count" class="text-light">0</span> chars</span>
                    </div>
                    <div id="keyboard-hint" class="text-light-muted text-xs hidden sm:block">
                        <kbd class="px-2 py-1 bg-darkCard rounded text-gold">Ctrl</kbd> + <kbd class="px-2 py-1 bg-darkCard rounded text-gold">E</kbd> encode |
                        <kbd class="px-2 py-1 bg-darkCard rounded text-gold">Ctrl</kbd> + <kbd class="px-2 py-1 bg-darkCard rounded text-gold">D</kbd> decode
                    </div>
                </div>

                {{-- Editor Area --}}
                <div class="grid lg:grid-cols-2 gap-4">
                    {{-- Input --}}
                    <div class="flex flex-col">
                        <label for="base64-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Input
                        </label>
                        <textarea
                            id="base64-input"
                            class="flex-1 min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Enter text to encode or Base64 string to decode..."
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output --}}
                    <div class="flex flex-col">
                        <label for="base64-output" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            Output
                        </label>
                        <textarea
                            id="base64-output"
                            class="flex-1 min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Result will appear here..."
                            readonly
                        ></textarea>
                    </div>
                </div>

                {{-- Error Display --}}
                <div id="error-display" class="hidden mt-4 p-4 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <h4 class="text-red-400 font-semibold mb-1">Error</h4>
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
                    <p class="text-light-muted text-sm">Encode and decode Base64 instantly with keyboard shortcuts support.</p>
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
                            <span class="text-light font-medium">What is Base64 encoding?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Base64 is a binary-to-text encoding scheme that represents binary data in ASCII string format. It converts binary data into a set of 64 printable characters (A-Z, a-z, 0-9, +, /), making it safe to transmit through text-based protocols like email or embed in HTML/CSS. The encoded output is about 33% larger than the original data.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">When should I use Base64?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Base64 is commonly used for: embedding images directly in HTML/CSS (data URIs), encoding binary data for inclusion in JSON or XML, email attachments via MIME encoding, encoding authentication credentials in HTTP Basic Auth headers, and storing binary data in databases that only support text.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is URL-safe Base64?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Standard Base64 uses + and / characters which have special meaning in URLs (+ becomes a space, / separates path segments). URL-safe Base64 replaces + with - and / with _, and typically removes the padding characters (=). This variant is commonly used in JWTs (JSON Web Tokens), URL parameters, and filenames.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is Base64 encryption?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            No, Base64 is encoding, not encryption. It provides absolutely no security whatsoever. Anyone can decode a Base64 string instantly - it's a simple, reversible transformation. Never use Base64 to protect sensitive information like passwords or API keys. For security, use proper encryption algorithms like AES or secure hashing.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my data secure?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, all Base64 processing happens entirely in your browser using JavaScript. Your data never leaves your computer and is never sent to any server. This makes the tool completely safe for any data you need to encode or decode, including sensitive information, API responses, and private content.
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
        const base64Input = document.getElementById('base64-input');
        const base64Output = document.getElementById('base64-output');
        const btnEncode = document.getElementById('btn-encode');
        const btnDecode = document.getElementById('btn-decode');
        const btnSwap = document.getElementById('btn-swap');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const urlSafeToggle = document.getElementById('url-safe-toggle');
        const statusText = document.getElementById('status-text');
        const inputCount = document.getElementById('input-count');
        const outputCount = document.getElementById('output-count');
        const errorDisplay = document.getElementById('error-display');
        const errorMessage = document.getElementById('error-message');
        const successDisplay = document.getElementById('success-display');
        const successMessage = document.getElementById('success-message');

        // Sample text
        const sampleText = "Hello, World! This is a Base64 encoding test from hafiz.dev 🚀";

        // Utility Functions
        function setStatus(text, type = 'default') {
            statusText.textContent = text;
            statusText.className = '';
            if (type === 'success') statusText.classList.add('text-green-400');
            else if (type === 'error') statusText.classList.add('text-red-400');
            else statusText.classList.add('text-gold');
        }

        function updateCounts() {
            inputCount.textContent = base64Input.value.length;
            outputCount.textContent = base64Output.value.length;
        }

        function showError(message) {
            errorDisplay.classList.remove('hidden');
            successDisplay.classList.add('hidden');
            errorMessage.textContent = message;
            setStatus('Error', 'error');
        }

        function showSuccess(message) {
            successDisplay.classList.remove('hidden');
            errorDisplay.classList.add('hidden');
            successMessage.textContent = message;
            setStatus('Success', 'success');
        }

        function hideMessages() {
            errorDisplay.classList.add('hidden');
            successDisplay.classList.add('hidden');
        }

        // Base64 Encode Function
        function encodeBase64(text, urlSafe = false) {
            try {
                // Handle UTF-8 characters properly
                let encoded = btoa(unescape(encodeURIComponent(text)));
                if (urlSafe) {
                    encoded = encoded.replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '');
                }
                return encoded;
            } catch (error) {
                throw new Error('Failed to encode: ' + error.message);
            }
        }

        // Base64 Decode Function
        function decodeBase64(base64, urlSafe = false) {
            try {
                let input = base64;
                if (urlSafe) {
                    input = input.replace(/-/g, '+').replace(/_/g, '/');
                    // Add padding if needed
                    while (input.length % 4) {
                        input += '=';
                    }
                }
                // Handle UTF-8 characters properly
                return decodeURIComponent(escape(atob(input)));
            } catch (error) {
                throw new Error('Invalid Base64 string. Make sure the input is a valid Base64 encoded string.');
            }
        }

        // Core Functions
        function encode() {
            const input = base64Input.value;
            if (!input) {
                showError('Please enter text to encode.');
                return;
            }

            try {
                const urlSafe = urlSafeToggle.checked;
                const encoded = encodeBase64(input, urlSafe);
                base64Output.value = encoded;
                updateCounts();
                const mode = urlSafe ? ' (URL-safe)' : '';
                showSuccess(`Encoded successfully!${mode} Output is ${encoded.length} characters.`);
            } catch (error) {
                base64Output.value = '';
                updateCounts();
                showError(error.message);
            }
        }

        function decode() {
            const input = base64Input.value.trim();
            if (!input) {
                showError('Please enter a Base64 string to decode.');
                return;
            }

            try {
                const urlSafe = urlSafeToggle.checked;
                const decoded = decodeBase64(input, urlSafe);
                base64Output.value = decoded;
                updateCounts();
                showSuccess(`Decoded successfully! Output is ${decoded.length} characters.`);
            } catch (error) {
                base64Output.value = '';
                updateCounts();
                showError(error.message);
            }
        }

        function swapFields() {
            const temp = base64Input.value;
            base64Input.value = base64Output.value;
            base64Output.value = temp;
            updateCounts();
            hideMessages();
            setStatus('Swapped input and output');
        }

        function copyToClipboard() {
            const output = base64Output.value;
            if (!output) {
                showError('Nothing to copy. Encode or decode something first.');
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

        function downloadResult() {
            const output = base64Output.value;
            if (!output) {
                showError('Nothing to download. Encode or decode something first.');
                return;
            }

            const blob = new Blob([output], { type: 'text/plain' });
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
            a.download = `base64-result-${timestamp}.txt`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);

            showSuccess('File downloaded!');
        }

        function loadSample() {
            base64Input.value = sampleText;
            base64Output.value = '';
            updateCounts();
            hideMessages();
            setStatus('Sample loaded - click Encode to convert');
        }

        function clearAll() {
            base64Input.value = '';
            base64Output.value = '';
            hideMessages();
            setStatus('Ready');
            updateCounts();
        }

        // Event Listeners
        btnEncode.addEventListener('click', encode);
        btnDecode.addEventListener('click', decode);
        btnSwap.addEventListener('click', swapFields);
        btnCopy.addEventListener('click', copyToClipboard);
        btnDownload.addEventListener('click', downloadResult);
        btnSample.addEventListener('click', loadSample);
        btnClear.addEventListener('click', clearAll);

        // Update counts on input
        base64Input.addEventListener('input', updateCounts);

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + E for Encode
            if ((e.ctrlKey || e.metaKey) && e.key === 'e') {
                e.preventDefault();
                encode();
            }
            // Ctrl/Cmd + D for Decode
            if ((e.ctrlKey || e.metaKey) && e.key === 'd') {
                e.preventDefault();
                decode();
            }
        });

        // Initialize counts
        updateCounts();
    })();
    </script>
    @endpush
</x-layout>
