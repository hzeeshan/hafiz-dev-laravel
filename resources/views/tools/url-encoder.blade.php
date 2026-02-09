<x-layout>
    <x-slot:title>URL Encoder/Decoder - Encode & Decode URLs Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online URL encoder and decoder. Encode special characters for URLs or decode percent-encoded strings. 100% client-side, instant results.</x-slot:description>
    <x-slot:keywords>url encoder, url decoder, urlencode online, percent encoding, encode url, decode url, query string encoder, uri encoder</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/url-encoder') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>URL Encoder/Decoder - Encode & Decode URLs Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online URL encoder and decoder. Encode special characters for URLs or decode percent-encoded strings. 100% client-side processing.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/url-encoder') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "URL Encoder/Decoder",
            "description": "Free online URL encoder and decoder. Encode special characters for URLs or decode percent-encoded strings.",
            "url": "https://hafiz.dev/tools/url-encoder",
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
                    "name": "URL Encoder/Decoder",
                    "item": "https://hafiz.dev/tools/url-encoder"
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
                    "name": "What is URL encoding?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "URL encoding (also called percent-encoding) converts characters into a format that can be safely transmitted in URLs. Special characters are replaced with a percent sign (%) followed by their hexadecimal ASCII value. For example, a space becomes %20 and an ampersand becomes %26."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What's the difference between encodeURI and encodeURIComponent?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "encodeURI is designed for encoding complete URLs and preserves characters that have special meaning in URLs (like :, /, ?, #, &). encodeURIComponent encodes everything except alphanumeric characters and is ideal for encoding URL parameters or query string values where these special characters should be escaped."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Which characters need to be encoded in URLs?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Characters that must be encoded include: spaces, quotes, less-than/greater-than signs, hash (#), percent (%), curly braces, square brackets, pipe (|), backslash, caret (^), and tilde (~). Reserved characters like &, =, +, and ? should be encoded when used as data rather than URL structure."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "When should I use URL encoding?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Use URL encoding when: passing user input as URL parameters, including special characters in query strings, encoding file paths in URLs, sending form data via GET requests, or creating shareable links with dynamic content. Always encode user-supplied data to prevent URL injection attacks."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is this tool free and secure?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, this tool is completely free with no signup required. All URL encoding and decoding happens entirely in your browser using JavaScript. Your data never leaves your computer and is never sent to any server, making it completely safe for sensitive URLs and data."
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
                    <li class="text-gold">URL Encoder/Decoder</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">URL Encoder/Decoder</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Encode and decode URLs and query strings instantly. 100% client-side processing - your data never leaves your browser.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                {{-- Mode Tabs --}}
                <div class="flex gap-2 mb-4">
                    <button id="tab-encode" class="tab-active px-6 py-2 font-semibold rounded-lg transition-all duration-300 cursor-pointer">
                        Encode
                    </button>
                    <button id="tab-decode" class="tab-inactive px-6 py-2 font-semibold rounded-lg transition-all duration-300 cursor-pointer">
                        Decode
                    </button>
                </div>

                <style>
                    .tab-active {
                        background-color: #c9aa71 !important;
                        color: #1e1e28 !important;
                    }
                    .tab-active:hover {
                        background-color: #d4ba8e !important;
                    }
                    .tab-inactive {
                        border: 1px solid rgba(201, 170, 113, 0.5);
                        color: rgb(163 163 163);
                    }
                    .tab-inactive:hover {
                        background-color: rgba(201, 170, 113, 0.1);
                        color: #c9aa71;
                    }
                </style>

                {{-- Encoding Type (only visible in encode mode) --}}
                <div id="encoding-options" class="mb-4 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <label class="text-light font-semibold text-sm mb-3 block">Encoding Type</label>
                    <div class="flex flex-wrap gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="encoding-type" value="component" checked class="w-4 h-4 text-gold bg-darkBg border-gold/30 focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                            <span class="text-light-muted text-sm">encodeURIComponent <span class="text-gold/70">(recommended for query params)</span></span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="encoding-type" value="uri" class="w-4 h-4 text-gold bg-darkBg border-gold/30 focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                            <span class="text-light-muted text-sm">encodeURI <span class="text-gold/70">(preserves URL structure)</span></span>
                        </label>
                    </div>
                </div>

                {{-- Toolbar --}}
                <div class="flex flex-wrap gap-3 mb-4">
                    {{-- Primary Action --}}
                    <button id="btn-convert" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <span id="btn-convert-text">Encode</span>
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
                    <button id="btn-sample" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Sample
                    </button>
                    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                </div>

                {{-- Status Bar --}}
                <div id="status-bar" class="mb-4 p-3 rounded-lg bg-darkBg border border-gold/10 flex items-center justify-between">
                    <div class="flex items-center gap-4 text-sm">
                        <span class="text-light-muted">Status: <span id="status-text" class="text-gold">Ready</span></span>
                        <span class="text-light-muted">Input: <span id="input-count" class="text-light">0</span> chars</span>
                        <span class="text-light-muted">Output: <span id="output-count" class="text-light">0</span> chars</span>
                        <span id="chars-changed" class="text-light-muted hidden">Changed: <span id="chars-changed-count" class="text-gold">0</span> chars</span>
                    </div>
                    <div id="keyboard-hint" class="text-light-muted text-xs hidden sm:block">
                        <kbd class="px-2 py-1 bg-darkCard rounded text-gold">Ctrl</kbd> + <kbd class="px-2 py-1 bg-darkCard rounded text-gold">Enter</kbd> convert
                    </div>
                </div>

                {{-- Editor Area --}}
                <div class="grid lg:grid-cols-2 gap-4">
                    {{-- Input --}}
                    <div class="flex flex-col">
                        <label for="url-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            <span id="input-label">Text to Encode</span>
                        </label>
                        <textarea
                            id="url-input"
                            class="flex-1 min-h-[300px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Enter text or URL to encode..."
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output --}}
                    <div class="flex flex-col">
                        <label for="url-output" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            <span id="output-label">Encoded Result</span>
                        </label>
                        <textarea
                            id="url-output"
                            class="flex-1 min-h-[300px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
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

            {{-- Quick Reference Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <h2 class="text-xl font-bold text-light mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    Common Encoded Characters
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gold/20">
                                <th class="text-left py-2 px-3 text-gold font-semibold">Character</th>
                                <th class="text-left py-2 px-3 text-gold font-semibold">Encoded</th>
                                <th class="text-left py-2 px-3 text-gold font-semibold">Description</th>
                            </tr>
                        </thead>
                        <tbody class="text-light-muted">
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">(space)</td><td class="py-2 px-3 font-mono text-gold">%20</td><td class="py-2 px-3">Space character</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">!</td><td class="py-2 px-3 font-mono text-gold">%21</td><td class="py-2 px-3">Exclamation mark</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">#</td><td class="py-2 px-3 font-mono text-gold">%23</td><td class="py-2 px-3">Hash/pound</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">$</td><td class="py-2 px-3 font-mono text-gold">%24</td><td class="py-2 px-3">Dollar sign</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">&</td><td class="py-2 px-3 font-mono text-gold">%26</td><td class="py-2 px-3">Ampersand</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">'</td><td class="py-2 px-3 font-mono text-gold">%27</td><td class="py-2 px-3">Single quote</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">+</td><td class="py-2 px-3 font-mono text-gold">%2B</td><td class="py-2 px-3">Plus sign</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">/</td><td class="py-2 px-3 font-mono text-gold">%2F</td><td class="py-2 px-3">Forward slash</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">:</td><td class="py-2 px-3 font-mono text-gold">%3A</td><td class="py-2 px-3">Colon</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">=</td><td class="py-2 px-3 font-mono text-gold">%3D</td><td class="py-2 px-3">Equals sign</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono">?</td><td class="py-2 px-3 font-mono text-gold">%3F</td><td class="py-2 px-3">Question mark</td></tr>
                            <tr><td class="py-2 px-3 font-mono">@</td><td class="py-2 px-3 font-mono text-gold">%40</td><td class="py-2 px-3">At sign</td></tr>
                        </tbody>
                    </table>
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
                    <p class="text-light-muted text-sm">Encode and decode URLs instantly as you type with real-time conversion.</p>
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
                            <span class="text-light font-medium">What is URL encoding?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            URL encoding (also called percent-encoding) converts characters into a format that can be safely transmitted in URLs. Special characters are replaced with a percent sign (%) followed by their hexadecimal ASCII value. For example, a space becomes %20 and an ampersand becomes %26. This ensures URLs remain valid even when containing special characters.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What's the difference between encodeURI and encodeURIComponent?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            <strong class="text-light">encodeURI</strong> is designed for encoding complete URLs. It preserves characters that have special meaning in URLs like <code class="bg-darkCard px-1 rounded">:</code>, <code class="bg-darkCard px-1 rounded">/</code>, <code class="bg-darkCard px-1 rounded">?</code>, <code class="bg-darkCard px-1 rounded">#</code>, and <code class="bg-darkCard px-1 rounded">&</code>.<br><br>
                            <strong class="text-light">encodeURIComponent</strong> encodes everything except alphanumeric characters and <code class="bg-darkCard px-1 rounded">- _ . ! ~ * ' ( )</code>. Use this for encoding URL parameters or query string values where special characters should be escaped.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Which characters need to be encoded in URLs?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Characters that must be encoded include: spaces, quotes (<code class="bg-darkCard px-1 rounded">"</code>), less-than/greater-than signs (<code class="bg-darkCard px-1 rounded">&lt; &gt;</code>), hash (<code class="bg-darkCard px-1 rounded">#</code>), percent (<code class="bg-darkCard px-1 rounded">%</code>), curly braces (<code class="bg-darkCard px-1 rounded">{ }</code>), square brackets (<code class="bg-darkCard px-1 rounded">[ ]</code>), pipe (<code class="bg-darkCard px-1 rounded">|</code>), backslash (<code class="bg-darkCard px-1 rounded">\</code>), and caret (<code class="bg-darkCard px-1 rounded">^</code>). Reserved characters like <code class="bg-darkCard px-1 rounded">&</code>, <code class="bg-darkCard px-1 rounded">=</code>, <code class="bg-darkCard px-1 rounded">+</code>, and <code class="bg-darkCard px-1 rounded">?</code> should be encoded when used as data.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">When should I use URL encoding?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Use URL encoding when: passing user input as URL parameters, including special characters in query strings, encoding file paths in URLs, sending form data via GET requests, creating shareable links with dynamic content, or working with APIs that require URL-encoded data. Always encode user-supplied data to prevent URL injection and ensure data integrity.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is this tool free and secure?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, this tool is completely free with no signup required. All URL encoding and decoding happens entirely in your browser using JavaScript. Your data never leaves your computer and is never sent to any server, making it completely safe for sensitive URLs, API keys, authentication tokens, and any confidential data.
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
        const urlInput = document.getElementById('url-input');
        const urlOutput = document.getElementById('url-output');
        const tabEncode = document.getElementById('tab-encode');
        const tabDecode = document.getElementById('tab-decode');
        const encodingOptions = document.getElementById('encoding-options');
        const btnConvert = document.getElementById('btn-convert');
        const btnConvertText = document.getElementById('btn-convert-text');
        const btnSwap = document.getElementById('btn-swap');
        const btnCopy = document.getElementById('btn-copy');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const inputLabel = document.getElementById('input-label');
        const outputLabel = document.getElementById('output-label');
        const statusText = document.getElementById('status-text');
        const inputCount = document.getElementById('input-count');
        const outputCount = document.getElementById('output-count');
        const charsChanged = document.getElementById('chars-changed');
        const charsChangedCount = document.getElementById('chars-changed-count');
        const errorDisplay = document.getElementById('error-display');
        const errorMessage = document.getElementById('error-message');
        const successDisplay = document.getElementById('success-display');
        const successMessage = document.getElementById('success-message');

        // State
        let currentMode = 'encode'; // 'encode' or 'decode'
        let debounceTimer;

        // Sample data
        const encodeSample = 'https://example.com/search?q=hello world&category=books&price=<50';
        const decodeSample = 'https%3A%2F%2Fexample.com%2Fsearch%3Fq%3Dhello%20world%26category%3Dbooks%26price%3D%3C50';

        // Utility Functions
        function setStatus(text, type = 'default') {
            statusText.textContent = text;
            statusText.className = '';
            if (type === 'success') statusText.classList.add('text-green-400');
            else if (type === 'error') statusText.classList.add('text-red-400');
            else statusText.classList.add('text-gold');
        }

        function updateCounts() {
            const inputLen = urlInput.value.length;
            const outputLen = urlOutput.value.length;
            inputCount.textContent = inputLen;
            outputCount.textContent = outputLen;

            // Show characters changed
            if (outputLen > 0 && inputLen > 0) {
                const diff = Math.abs(outputLen - inputLen);
                charsChangedCount.textContent = diff;
                charsChanged.classList.remove('hidden');
            } else {
                charsChanged.classList.add('hidden');
            }
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

        function getEncodingType() {
            const selected = document.querySelector('input[name="encoding-type"]:checked');
            return selected ? selected.value : 'component';
        }

        // Mode switching
        function setMode(mode, skipConvert = false) {
            currentMode = mode;

            if (mode === 'encode') {
                tabEncode.classList.add('tab-active');
                tabEncode.classList.remove('tab-inactive');
                tabDecode.classList.remove('tab-active');
                tabDecode.classList.add('tab-inactive');
                encodingOptions.classList.remove('hidden');
                inputLabel.textContent = 'Text to Encode';
                outputLabel.textContent = 'Encoded Result';
                btnConvertText.textContent = 'Encode';
                urlInput.placeholder = 'Enter text or URL to encode...';
            } else {
                tabDecode.classList.add('tab-active');
                tabDecode.classList.remove('tab-inactive');
                tabEncode.classList.remove('tab-active');
                tabEncode.classList.add('tab-inactive');
                encodingOptions.classList.add('hidden');
                inputLabel.textContent = 'Text to Decode';
                outputLabel.textContent = 'Decoded Result';
                btnConvertText.textContent = 'Decode';
                urlInput.placeholder = 'Enter URL-encoded string to decode...';
            }

            // Clear and reconvert if there's input (unless skipped)
            if (!skipConvert && urlInput.value) {
                convert();
            }
        }

        // Encoding functions
        function encodeURL(text, mode) {
            if (mode === 'component') {
                return encodeURIComponent(text);
            } else if (mode === 'uri') {
                return encodeURI(text);
            }
            return text;
        }

        function decodeURL(text) {
            try {
                return decodeURIComponent(text);
            } catch (e) {
                throw new Error('Invalid URL-encoded string. The input contains malformed percent-encoding sequences.');
            }
        }

        // Core conversion function
        function convert() {
            const input = urlInput.value;

            if (!input) {
                urlOutput.value = '';
                updateCounts();
                hideMessages();
                setStatus('Ready');
                return;
            }

            try {
                let result;
                if (currentMode === 'encode') {
                    const encodingType = getEncodingType();
                    result = encodeURL(input, encodingType);
                    const typeLabel = encodingType === 'component' ? 'encodeURIComponent' : 'encodeURI';
                    showSuccess(`Encoded successfully using ${typeLabel}! Output is ${result.length} characters.`);
                } else {
                    result = decodeURL(input);
                    showSuccess(`Decoded successfully! Output is ${result.length} characters.`);
                }
                urlOutput.value = result;
                updateCounts();
            } catch (error) {
                urlOutput.value = '';
                updateCounts();
                showError(error.message);
            }
        }

        // Swap - moves output to input for encode→decode workflow
        function swapFields() {
            const outputValue = urlOutput.value;

            if (!outputValue) {
                showError('Nothing to swap. Convert something first.');
                return;
            }

            // Move output to input, clear output
            urlInput.value = outputValue;
            urlOutput.value = '';
            updateCounts();
            hideMessages();

            // Switch mode (encode→decode or decode→encode) and convert
            if (currentMode === 'encode') {
                setMode('decode', true); // Skip auto-convert, we'll do it manually
            } else {
                setMode('encode', true);
            }

            // Now convert with new mode
            convert();
            setStatus('Swapped and converted');
        }

        // Copy to clipboard
        function copyToClipboard() {
            const output = urlOutput.value;
            if (!output) {
                showError('Nothing to copy. Convert something first.');
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

        // Load sample data and auto-convert
        function loadSample() {
            if (currentMode === 'encode') {
                urlInput.value = encodeSample;
            } else {
                urlInput.value = decodeSample;
            }
            urlOutput.value = '';
            updateCounts();
            hideMessages();
            // Auto-convert after loading sample
            convert();
        }

        // Clear all
        function clearAll() {
            urlInput.value = '';
            urlOutput.value = '';
            hideMessages();
            setStatus('Ready');
            updateCounts();
        }

        // Event Listeners
        tabEncode.addEventListener('click', () => setMode('encode'));
        tabDecode.addEventListener('click', () => setMode('decode'));
        btnConvert.addEventListener('click', convert);
        btnSwap.addEventListener('click', swapFields);
        btnCopy.addEventListener('click', copyToClipboard);
        btnSample.addEventListener('click', loadSample);
        btnClear.addEventListener('click', clearAll);

        // Auto-convert on input with debounce
        urlInput.addEventListener('input', () => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                convert();
            }, 150);
        });

        // Re-convert when encoding type changes
        document.querySelectorAll('input[name="encoding-type"]').forEach(radio => {
            radio.addEventListener('change', () => {
                if (urlInput.value) {
                    convert();
                }
            });
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + Enter for convert
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                e.preventDefault();
                convert();
            }
        });

        // Initialize
        updateCounts();
    })();
    </script>
    @endpush
</x-layout>
