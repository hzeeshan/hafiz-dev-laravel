<x-layout>
    <x-slot:title>Hash Generator - MD5, SHA-1, SHA-256, SHA-512 Online | hafiz.dev</x-slot:title>
    <x-slot:description>Free online hash generator. Generate MD5, SHA-1, SHA-256, SHA-384, SHA-512 hashes from text or files. 100% client-side, secure and private.</x-slot:description>
    <x-slot:keywords>hash generator, md5 generator, sha256 hash, sha1 generator, sha512 hash, online hash calculator, file hash, checksum generator</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/hash-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Hash Generator - MD5, SHA-1, SHA-256, SHA-512 Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online hash generator. Generate MD5, SHA-1, SHA-256, SHA-384, SHA-512 hashes from text or files. 100% client-side, secure and private.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/hash-generator') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Hash Generator",
            "description": "Free online hash generator. Generate MD5, SHA-1, SHA-256, SHA-384, SHA-512 hashes from text or files. 100% client-side, secure and private.",
            "url": "https://hafiz.dev/tools/hash-generator",
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
                    "name": "Hash Generator",
                    "item": "https://hafiz.dev/tools/hash-generator"
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
                    "name": "What is a hash function?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A hash function is a mathematical algorithm that converts input data of any size into a fixed-size string of characters (the hash or digest). Hash functions are one-way, meaning you cannot reverse the process to get the original data. They are used for data integrity verification, password storage, digital signatures, and checksums."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What's the difference between MD5, SHA-1, and SHA-256?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "MD5 produces a 128-bit (32 character) hash and is fast but cryptographically broken. SHA-1 produces a 160-bit (40 character) hash and is deprecated for security but still used for git commits. SHA-256 produces a 256-bit (64 character) hash and is recommended for most security applications as it provides strong collision resistance."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is MD5 still secure?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "No, MD5 is not secure for cryptographic purposes. Collision attacks have been demonstrated since 2004, meaning different inputs can produce the same hash. MD5 should only be used for non-security purposes like checksums for file integrity (where an attacker isn't trying to create collisions) or legacy system compatibility. For security applications, use SHA-256 or SHA-512."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I reverse a hash to get the original text?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "No, hash functions are designed to be one-way functions. You cannot mathematically reverse a hash to get the original input. However, short or common passwords can be found using rainbow tables or brute force attacks, which is why proper password hashing uses salting and specialized algorithms like bcrypt or Argon2."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is this tool free and secure?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, this tool is completely free with no limits or signup required. It's also secure because all hashing is performed entirely in your browser using JavaScript. Your data never leaves your computer and is never sent to any server. The tool uses the Web Crypto API for SHA algorithms and a JavaScript implementation for MD5."
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
                    <li class="text-gold">Hash Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Hash Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Generate MD5, SHA-1, SHA-256, SHA-512 hashes instantly. 100% client-side - your data never leaves your browser.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Input Mode Tabs --}}
                <div class="mb-6">
                    <div class="flex gap-2">
                        <button id="tab-text" class="px-4 py-2 rounded-lg font-semibold transition-all duration-300 bg-gold text-darkBg cursor-pointer">
                            Text Input
                        </button>
                        <button id="tab-file" class="px-4 py-2 rounded-lg font-semibold transition-all duration-300 border border-gold/30 text-light-muted hover:border-gold hover:text-gold cursor-pointer">
                            File Input
                        </button>
                    </div>
                </div>

                {{-- Text Input Mode --}}
                <div id="text-mode" class="mb-6">
                    <label for="text-input" class="text-light font-semibold mb-3 block">Text to Hash</label>
                    <textarea
                        id="text-input"
                        rows="5"
                        placeholder="Enter text to generate hashes..."
                        class="w-full bg-darkBg border border-gold/20 rounded-lg p-4 text-light font-mono text-sm resize-y focus:border-gold focus:outline-none placeholder:text-light-muted/50"
                    ></textarea>
                    <div class="flex justify-end mt-2">
                        <span id="char-count" class="text-light-muted text-xs">0 characters</span>
                    </div>
                </div>

                {{-- File Input Mode --}}
                <div id="file-mode" class="mb-6 hidden">
                    <label class="text-light font-semibold mb-3 block">File to Hash</label>
                    <div
                        id="drop-zone"
                        class="border-2 border-dashed border-gold/30 rounded-lg p-8 text-center transition-all duration-300 hover:border-gold/50 cursor-pointer"
                    >
                        <input type="file" id="file-input" class="hidden">
                        <div id="drop-zone-content">
                            <svg class="w-12 h-12 mx-auto text-light-muted mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-light-muted mb-2">Drag and drop a file here, or</p>
                            <button id="browse-btn" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 cursor-pointer font-semibold">
                                Browse Files
                            </button>
                        </div>
                        <div id="file-info" class="hidden">
                            <svg class="w-12 h-12 mx-auto text-gold mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p id="file-name" class="text-light font-semibold mb-1"></p>
                            <p id="file-size" class="text-light-muted text-sm"></p>
                            <button id="remove-file-btn" class="mt-3 px-3 py-1 text-sm border border-red-500/50 text-red-400 rounded hover:bg-red-500/10 transition-all duration-300 cursor-pointer">
                                Remove
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Output Format Options --}}
                <div class="mb-6">
                    <label class="text-light font-semibold mb-3 block">Output Format</label>
                    <div class="flex gap-3">
                        <label class="flex items-center gap-2 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <input type="radio" name="output-format" value="lowercase" checked class="w-4 h-4 border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                            <span class="text-light text-sm">Lowercase</span>
                        </label>
                        <label class="flex items-center gap-2 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <input type="radio" name="output-format" value="uppercase" class="w-4 h-4 border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                            <span class="text-light text-sm">Uppercase</span>
                        </label>
                    </div>
                </div>

                {{-- Hash Results Section --}}
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-3">
                        <label class="text-light font-semibold">Hash Results</label>
                        <div id="processing-indicator" class="hidden flex items-center gap-2 text-gold text-sm">
                            <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            <span>Processing...</span>
                        </div>
                    </div>

                    <div class="space-y-3">
                        {{-- MD5 --}}
                        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-0.5 bg-blue-500/20 text-blue-400 text-xs font-semibold rounded">MD5</span>
                                    <span class="text-light-muted text-xs">128-bit (32 hex)</span>
                                </div>
                                <button class="copy-btn p-1.5 text-light-muted hover:text-gold transition-colors cursor-pointer" data-algorithm="md5" title="Copy MD5 hash">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                </button>
                            </div>
                            <code id="hash-md5" class="text-light font-mono text-sm break-all block text-light-muted/50">-</code>
                        </div>

                        {{-- SHA-1 --}}
                        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-0.5 bg-yellow-500/20 text-yellow-400 text-xs font-semibold rounded">SHA-1</span>
                                    <span class="text-light-muted text-xs">160-bit (40 hex)</span>
                                </div>
                                <button class="copy-btn p-1.5 text-light-muted hover:text-gold transition-colors cursor-pointer" data-algorithm="sha1" title="Copy SHA-1 hash">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                </button>
                            </div>
                            <code id="hash-sha1" class="text-light font-mono text-sm break-all block text-light-muted/50">-</code>
                        </div>

                        {{-- SHA-256 --}}
                        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-0.5 bg-green-500/20 text-green-400 text-xs font-semibold rounded">SHA-256</span>
                                    <span class="text-light-muted text-xs">256-bit (64 hex)</span>
                                </div>
                                <button class="copy-btn p-1.5 text-light-muted hover:text-gold transition-colors cursor-pointer" data-algorithm="sha256" title="Copy SHA-256 hash">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                </button>
                            </div>
                            <code id="hash-sha256" class="text-light font-mono text-sm break-all block text-light-muted/50">-</code>
                        </div>

                        {{-- SHA-384 --}}
                        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-0.5 bg-purple-500/20 text-purple-400 text-xs font-semibold rounded">SHA-384</span>
                                    <span class="text-light-muted text-xs">384-bit (96 hex)</span>
                                </div>
                                <button class="copy-btn p-1.5 text-light-muted hover:text-gold transition-colors cursor-pointer" data-algorithm="sha384" title="Copy SHA-384 hash">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                </button>
                            </div>
                            <code id="hash-sha384" class="text-light font-mono text-sm break-all block text-light-muted/50">-</code>
                        </div>

                        {{-- SHA-512 --}}
                        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-0.5 bg-red-500/20 text-red-400 text-xs font-semibold rounded">SHA-512</span>
                                    <span class="text-light-muted text-xs">512-bit (128 hex)</span>
                                </div>
                                <button class="copy-btn p-1.5 text-light-muted hover:text-gold transition-colors cursor-pointer" data-algorithm="sha512" title="Copy SHA-512 hash">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                </button>
                            </div>
                            <code id="hash-sha512" class="text-light font-mono text-sm break-all block text-light-muted/50">-</code>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3">
                    <button id="btn-copy-all" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy All Hashes
                    </button>
                    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                </div>

                {{-- Success/Copy Notification --}}
                <div id="copy-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="copy-message" class="text-green-400 text-sm"></span>
                    </div>
                </div>

                {{-- Error Notification --}}
                <div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span id="error-message" class="text-red-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Algorithm Reference Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <h2 class="text-xl font-bold text-light mb-4">Algorithm Reference</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gold/20">
                                <th class="text-left py-3 px-4 text-light font-semibold">Algorithm</th>
                                <th class="text-left py-3 px-4 text-light font-semibold">Output Length</th>
                                <th class="text-left py-3 px-4 text-light font-semibold">Notes</th>
                            </tr>
                        </thead>
                        <tbody class="text-light-muted">
                            <tr class="border-b border-gold/10">
                                <td class="py-3 px-4"><span class="px-2 py-0.5 bg-blue-500/20 text-blue-400 text-xs font-semibold rounded">MD5</span></td>
                                <td class="py-3 px-4">128-bit (32 hex)</td>
                                <td class="py-3 px-4">Fast but cryptographically broken, use for checksums only</td>
                            </tr>
                            <tr class="border-b border-gold/10">
                                <td class="py-3 px-4"><span class="px-2 py-0.5 bg-yellow-500/20 text-yellow-400 text-xs font-semibold rounded">SHA-1</span></td>
                                <td class="py-3 px-4">160-bit (40 hex)</td>
                                <td class="py-3 px-4">Deprecated for security, still used for git commits</td>
                            </tr>
                            <tr class="border-b border-gold/10">
                                <td class="py-3 px-4"><span class="px-2 py-0.5 bg-green-500/20 text-green-400 text-xs font-semibold rounded">SHA-256</span></td>
                                <td class="py-3 px-4">256-bit (64 hex)</td>
                                <td class="py-3 px-4">Recommended for most security applications</td>
                            </tr>
                            <tr class="border-b border-gold/10">
                                <td class="py-3 px-4"><span class="px-2 py-0.5 bg-purple-500/20 text-purple-400 text-xs font-semibold rounded">SHA-384</span></td>
                                <td class="py-3 px-4">384-bit (96 hex)</td>
                                <td class="py-3 px-4">Truncated SHA-512, good balance of security/speed</td>
                            </tr>
                            <tr>
                                <td class="py-3 px-4"><span class="px-2 py-0.5 bg-red-500/20 text-red-400 text-xs font-semibold rounded">SHA-512</span></td>
                                <td class="py-3 px-4">512-bit (128 hex)</td>
                                <td class="py-3 px-4">Maximum security, slightly slower</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">#️⃣</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Multiple Algorithms</h3>
                    <p class="text-light-muted text-sm">Generate MD5, SHA-1, SHA-256, SHA-384, and SHA-512 hashes simultaneously from a single input.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">100%</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Client-Side</h3>
                    <p class="text-light-muted text-sm">All hashing happens in your browser. Your data never leaves your computer.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📁</div>
                    <h3 class="text-lg font-semibold text-light mb-2">File Hashing</h3>
                    <p class="text-light-muted text-sm">Hash files of any type. Drag and drop or browse to verify file integrity with checksums.</p>
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
                            <span class="text-light font-medium">What is a hash function?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A hash function is a mathematical algorithm that converts input data of any size into a fixed-size string of characters (the hash or digest). Hash functions are one-way, meaning you cannot reverse the process to get the original data. They are used for data integrity verification, password storage, digital signatures, and checksums.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What's the difference between MD5, SHA-1, and SHA-256?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            MD5 produces a 128-bit (32 character) hash and is fast but cryptographically broken. SHA-1 produces a 160-bit (40 character) hash and is deprecated for security but still used for git commits. SHA-256 produces a 256-bit (64 character) hash and is recommended for most security applications as it provides strong collision resistance.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is MD5 still secure?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            No, MD5 is not secure for cryptographic purposes. Collision attacks have been demonstrated since 2004, meaning different inputs can produce the same hash. MD5 should only be used for non-security purposes like checksums for file integrity (where an attacker isn't trying to create collisions) or legacy system compatibility. For security applications, use SHA-256 or SHA-512.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I reverse a hash to get the original text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            No, hash functions are designed to be one-way functions. You cannot mathematically reverse a hash to get the original input. However, short or common passwords can be found using rainbow tables or brute force attacks, which is why proper password hashing uses salting and specialized algorithms like bcrypt or Argon2.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is this tool free and secure?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, this tool is completely free with no limits or signup required. It's also secure because all hashing is performed entirely in your browser using JavaScript. Your data never leaves your computer and is never sent to any server. The tool uses the Web Crypto API for SHA algorithms and a JavaScript implementation for MD5.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @include('tools.partials.hash-generator-script')
    @endpush
</x-layout>
