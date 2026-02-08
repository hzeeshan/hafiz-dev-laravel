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
    <script>
    (function() {
        // MD5 Implementation (since Web Crypto API doesn't support MD5)
        // Based on Joseph Myers' implementation
        function md5(string) {
            function md5cycle(x, k) {
                var a = x[0], b = x[1], c = x[2], d = x[3];
                a = ff(a, b, c, d, k[0], 7, -680876936);
                d = ff(d, a, b, c, k[1], 12, -389564586);
                c = ff(c, d, a, b, k[2], 17, 606105819);
                b = ff(b, c, d, a, k[3], 22, -1044525330);
                a = ff(a, b, c, d, k[4], 7, -176418897);
                d = ff(d, a, b, c, k[5], 12, 1200080426);
                c = ff(c, d, a, b, k[6], 17, -1473231341);
                b = ff(b, c, d, a, k[7], 22, -45705983);
                a = ff(a, b, c, d, k[8], 7, 1770035416);
                d = ff(d, a, b, c, k[9], 12, -1958414417);
                c = ff(c, d, a, b, k[10], 17, -42063);
                b = ff(b, c, d, a, k[11], 22, -1990404162);
                a = ff(a, b, c, d, k[12], 7, 1804603682);
                d = ff(d, a, b, c, k[13], 12, -40341101);
                c = ff(c, d, a, b, k[14], 17, -1502002290);
                b = ff(b, c, d, a, k[15], 22, 1236535329);
                a = gg(a, b, c, d, k[1], 5, -165796510);
                d = gg(d, a, b, c, k[6], 9, -1069501632);
                c = gg(c, d, a, b, k[11], 14, 643717713);
                b = gg(b, c, d, a, k[0], 20, -373897302);
                a = gg(a, b, c, d, k[5], 5, -701558691);
                d = gg(d, a, b, c, k[10], 9, 38016083);
                c = gg(c, d, a, b, k[15], 14, -660478335);
                b = gg(b, c, d, a, k[4], 20, -405537848);
                a = gg(a, b, c, d, k[9], 5, 568446438);
                d = gg(d, a, b, c, k[14], 9, -1019803690);
                c = gg(c, d, a, b, k[3], 14, -187363961);
                b = gg(b, c, d, a, k[8], 20, 1163531501);
                a = gg(a, b, c, d, k[13], 5, -1444681467);
                d = gg(d, a, b, c, k[2], 9, -51403784);
                c = gg(c, d, a, b, k[7], 14, 1735328473);
                b = gg(b, c, d, a, k[12], 20, -1926607734);
                a = hh(a, b, c, d, k[5], 4, -378558);
                d = hh(d, a, b, c, k[8], 11, -2022574463);
                c = hh(c, d, a, b, k[11], 16, 1839030562);
                b = hh(b, c, d, a, k[14], 23, -35309556);
                a = hh(a, b, c, d, k[1], 4, -1530992060);
                d = hh(d, a, b, c, k[4], 11, 1272893353);
                c = hh(c, d, a, b, k[7], 16, -155497632);
                b = hh(b, c, d, a, k[10], 23, -1094730640);
                a = hh(a, b, c, d, k[13], 4, 681279174);
                d = hh(d, a, b, c, k[0], 11, -358537222);
                c = hh(c, d, a, b, k[3], 16, -722521979);
                b = hh(b, c, d, a, k[6], 23, 76029189);
                a = hh(a, b, c, d, k[9], 4, -640364487);
                d = hh(d, a, b, c, k[12], 11, -421815835);
                c = hh(c, d, a, b, k[15], 16, 530742520);
                b = hh(b, c, d, a, k[2], 23, -995338651);
                a = ii(a, b, c, d, k[0], 6, -198630844);
                d = ii(d, a, b, c, k[7], 10, 1126891415);
                c = ii(c, d, a, b, k[14], 15, -1416354905);
                b = ii(b, c, d, a, k[5], 21, -57434055);
                a = ii(a, b, c, d, k[12], 6, 1700485571);
                d = ii(d, a, b, c, k[3], 10, -1894986606);
                c = ii(c, d, a, b, k[10], 15, -1051523);
                b = ii(b, c, d, a, k[1], 21, -2054922799);
                a = ii(a, b, c, d, k[8], 6, 1873313359);
                d = ii(d, a, b, c, k[15], 10, -30611744);
                c = ii(c, d, a, b, k[6], 15, -1560198380);
                b = ii(b, c, d, a, k[13], 21, 1309151649);
                a = ii(a, b, c, d, k[4], 6, -145523070);
                d = ii(d, a, b, c, k[11], 10, -1120210379);
                c = ii(c, d, a, b, k[2], 15, 718787259);
                b = ii(b, c, d, a, k[9], 21, -343485551);
                x[0] = add32(a, x[0]);
                x[1] = add32(b, x[1]);
                x[2] = add32(c, x[2]);
                x[3] = add32(d, x[3]);
            }

            function cmn(q, a, b, x, s, t) {
                a = add32(add32(a, q), add32(x, t));
                return add32((a << s) | (a >>> (32 - s)), b);
            }

            function ff(a, b, c, d, x, s, t) {
                return cmn((b & c) | ((~b) & d), a, b, x, s, t);
            }

            function gg(a, b, c, d, x, s, t) {
                return cmn((b & d) | (c & (~d)), a, b, x, s, t);
            }

            function hh(a, b, c, d, x, s, t) {
                return cmn(b ^ c ^ d, a, b, x, s, t);
            }

            function ii(a, b, c, d, x, s, t) {
                return cmn(c ^ (b | (~d)), a, b, x, s, t);
            }

            function md5blk(s) {
                var md5blks = [], i;
                for (i = 0; i < 64; i += 4) {
                    md5blks[i >> 2] = s.charCodeAt(i) + (s.charCodeAt(i + 1) << 8) + (s.charCodeAt(i + 2) << 16) + (s.charCodeAt(i + 3) << 24);
                }
                return md5blks;
            }

            function md5blk_array(a) {
                var md5blks = [], i;
                for (i = 0; i < 64; i += 4) {
                    md5blks[i >> 2] = a[i] + (a[i + 1] << 8) + (a[i + 2] << 16) + (a[i + 3] << 24);
                }
                return md5blks;
            }

            var hex_chr = '0123456789abcdef'.split('');

            function rhex(n) {
                var s = '', j = 0;
                for (; j < 4; j++)
                    s += hex_chr[(n >> (j * 8 + 4)) & 0x0F] + hex_chr[(n >> (j * 8)) & 0x0F];
                return s;
            }

            function hex(x) {
                for (var i = 0; i < x.length; i++)
                    x[i] = rhex(x[i]);
                return x.join('');
            }

            function add32(a, b) {
                return (a + b) & 0xFFFFFFFF;
            }

            function md5_str(s) {
                var n = s.length,
                    state = [1732584193, -271733879, -1732584194, 271733878], i;
                for (i = 64; i <= s.length; i += 64) {
                    md5cycle(state, md5blk(s.substring(i - 64, i)));
                }
                s = s.substring(i - 64);
                var tail = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                for (i = 0; i < s.length; i++)
                    tail[i >> 2] |= s.charCodeAt(i) << ((i % 4) << 3);
                tail[i >> 2] |= 0x80 << ((i % 4) << 3);
                if (i > 55) {
                    md5cycle(state, tail);
                    for (i = 0; i < 16; i++) tail[i] = 0;
                }
                tail[14] = n * 8;
                md5cycle(state, tail);
                return hex(state);
            }

            function md5_array(a) {
                var n = a.length,
                    state = [1732584193, -271733879, -1732584194, 271733878], i;
                for (i = 64; i <= a.length; i += 64) {
                    md5cycle(state, md5blk_array(a.subarray(i - 64, i)));
                }
                var tail = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                var leftover = a.subarray(i - 64);
                for (i = 0; i < leftover.length; i++)
                    tail[i >> 2] |= leftover[i] << ((i % 4) << 3);
                tail[i >> 2] |= 0x80 << ((i % 4) << 3);
                if (i > 55) {
                    md5cycle(state, tail);
                    for (i = 0; i < 16; i++) tail[i] = 0;
                }
                tail[14] = n * 8;
                md5cycle(state, tail);
                return hex(state);
            }

            if (typeof string === 'string') {
                return md5_str(string);
            } else if (string instanceof Uint8Array) {
                return md5_array(string);
            }
            return '';
        }

        // DOM Elements
        const tabText = document.getElementById('tab-text');
        const tabFile = document.getElementById('tab-file');
        const textMode = document.getElementById('text-mode');
        const fileMode = document.getElementById('file-mode');
        const textInput = document.getElementById('text-input');
        const charCount = document.getElementById('char-count');
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('file-input');
        const browseBtn = document.getElementById('browse-btn');
        const dropZoneContent = document.getElementById('drop-zone-content');
        const fileInfo = document.getElementById('file-info');
        const fileName = document.getElementById('file-name');
        const fileSize = document.getElementById('file-size');
        const removeFileBtn = document.getElementById('remove-file-btn');
        const processingIndicator = document.getElementById('processing-indicator');
        const btnCopyAll = document.getElementById('btn-copy-all');
        const btnClear = document.getElementById('btn-clear');
        const copyNotification = document.getElementById('copy-notification');
        const copyMessage = document.getElementById('copy-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        const hashElements = {
            md5: document.getElementById('hash-md5'),
            sha1: document.getElementById('hash-sha1'),
            sha256: document.getElementById('hash-sha256'),
            sha384: document.getElementById('hash-sha384'),
            sha512: document.getElementById('hash-sha512')
        };

        // State
        let currentHashes = {
            md5: '',
            sha1: '',
            sha256: '',
            sha384: '',
            sha512: ''
        };
        let currentMode = 'text';
        let selectedFile = null;
        let debounceTimer = null;

        // Get output format
        function getOutputFormat() {
            return document.querySelector('input[name="output-format"]:checked').value;
        }

        // Format hash based on output format
        function formatHash(hash) {
            if (!hash) return '-';
            return getOutputFormat() === 'uppercase' ? hash.toUpperCase() : hash.toLowerCase();
        }

        // Compute SHA hash using Web Crypto API
        async function computeSHA(algorithm, data) {
            const hashBuffer = await crypto.subtle.digest(algorithm, data);
            const hashArray = Array.from(new Uint8Array(hashBuffer));
            return hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
        }

        // Generate all hashes from text
        async function generateHashesFromText(text) {
            if (!text) {
                clearHashes();
                return;
            }

            processingIndicator.classList.remove('hidden');

            try {
                const encoder = new TextEncoder();
                const data = encoder.encode(text);

                const [sha1, sha256, sha384, sha512] = await Promise.all([
                    computeSHA('SHA-1', data),
                    computeSHA('SHA-256', data),
                    computeSHA('SHA-384', data),
                    computeSHA('SHA-512', data)
                ]);

                currentHashes = {
                    md5: md5(text),
                    sha1,
                    sha256,
                    sha384,
                    sha512
                };

                updateHashDisplay();
            } catch (error) {
                showError('Error generating hashes: ' + error.message);
            } finally {
                processingIndicator.classList.add('hidden');
            }
        }

        // Generate all hashes from file
        async function generateHashesFromFile(file) {
            if (!file) {
                clearHashes();
                return;
            }

            processingIndicator.classList.remove('hidden');

            try {
                const arrayBuffer = await file.arrayBuffer();
                const data = new Uint8Array(arrayBuffer);

                const [sha1, sha256, sha384, sha512] = await Promise.all([
                    computeSHA('SHA-1', data),
                    computeSHA('SHA-256', data),
                    computeSHA('SHA-384', data),
                    computeSHA('SHA-512', data)
                ]);

                currentHashes = {
                    md5: md5(data),
                    sha1,
                    sha256,
                    sha384,
                    sha512
                };

                updateHashDisplay();
            } catch (error) {
                showError('Error hashing file: ' + error.message);
            } finally {
                processingIndicator.classList.add('hidden');
            }
        }

        // Update hash display
        function updateHashDisplay() {
            for (const [algo, element] of Object.entries(hashElements)) {
                const hash = currentHashes[algo];
                if (hash) {
                    element.textContent = formatHash(hash);
                    element.classList.remove('text-light-muted/50');
                    element.classList.add('text-light');
                } else {
                    element.textContent = '-';
                    element.classList.remove('text-light');
                    element.classList.add('text-light-muted/50');
                }
            }
        }

        // Clear hashes
        function clearHashes() {
            currentHashes = {
                md5: '',
                sha1: '',
                sha256: '',
                sha384: '',
                sha512: ''
            };
            updateHashDisplay();
        }

        // Format file size
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        // Handle file selection
        function handleFileSelect(file) {
            selectedFile = file;
            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);
            dropZoneContent.classList.add('hidden');
            fileInfo.classList.remove('hidden');
            generateHashesFromFile(file);
        }

        // Remove selected file
        function removeFile() {
            selectedFile = null;
            fileInput.value = '';
            dropZoneContent.classList.remove('hidden');
            fileInfo.classList.add('hidden');
            clearHashes();
        }

        // Copy to clipboard
        function copyToClipboard(text, message) {
            navigator.clipboard.writeText(text).then(() => {
                showNotification(message);
            }).catch(() => {
                showError('Failed to copy to clipboard');
            });
        }

        // Show success notification
        function showNotification(message) {
            copyMessage.textContent = message;
            copyNotification.classList.remove('hidden');
            errorNotification.classList.add('hidden');

            setTimeout(() => {
                copyNotification.classList.add('hidden');
            }, 2000);
        }

        // Show error notification
        function showError(message) {
            errorMessage.textContent = message;
            errorNotification.classList.remove('hidden');
            copyNotification.classList.add('hidden');

            setTimeout(() => {
                errorNotification.classList.add('hidden');
            }, 3000);
        }

        // Switch tabs
        function switchTab(mode) {
            currentMode = mode;

            if (mode === 'text') {
                tabText.classList.add('bg-gold', 'text-darkBg');
                tabText.classList.remove('border', 'border-gold/30', 'text-light-muted');
                tabFile.classList.remove('bg-gold', 'text-darkBg');
                tabFile.classList.add('border', 'border-gold/30', 'text-light-muted');
                textMode.classList.remove('hidden');
                fileMode.classList.add('hidden');

                // Re-hash the text if there's content
                if (textInput.value) {
                    generateHashesFromText(textInput.value);
                } else {
                    clearHashes();
                }
            } else {
                tabFile.classList.add('bg-gold', 'text-darkBg');
                tabFile.classList.remove('border', 'border-gold/30', 'text-light-muted');
                tabText.classList.remove('bg-gold', 'text-darkBg');
                tabText.classList.add('border', 'border-gold/30', 'text-light-muted');
                fileMode.classList.remove('hidden');
                textMode.classList.add('hidden');

                // Re-hash the file if there's one selected
                if (selectedFile) {
                    generateHashesFromFile(selectedFile);
                } else {
                    clearHashes();
                }
            }
        }

        // Event Listeners

        // Tab switching
        tabText.addEventListener('click', () => switchTab('text'));
        tabFile.addEventListener('click', () => switchTab('file'));

        // Text input with debounce
        textInput.addEventListener('input', function() {
            charCount.textContent = this.value.length + ' characters';

            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                generateHashesFromText(this.value);
            }, 300);
        });

        // Output format change
        document.querySelectorAll('input[name="output-format"]').forEach(radio => {
            radio.addEventListener('change', updateHashDisplay);
        });

        // File drag and drop
        dropZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('border-gold', 'bg-gold/5');
        });

        dropZone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('border-gold', 'bg-gold/5');
        });

        dropZone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('border-gold', 'bg-gold/5');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                handleFileSelect(files[0]);
            }
        });

        // Browse button
        browseBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            fileInput.click();
        });

        dropZone.addEventListener('click', function() {
            if (!selectedFile) {
                fileInput.click();
            }
        });

        // File input change
        fileInput.addEventListener('change', function() {
            if (this.files.length > 0) {
                handleFileSelect(this.files[0]);
            }
        });

        // Remove file button
        removeFileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            removeFile();
        });

        // Copy individual hash buttons
        document.querySelectorAll('.copy-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const algo = this.getAttribute('data-algorithm');
                const hash = currentHashes[algo];
                if (hash) {
                    copyToClipboard(formatHash(hash), algo.toUpperCase() + ' hash copied!');
                } else {
                    showError('No hash to copy. Enter text or select a file first.');
                }
            });
        });

        // Copy all hashes
        btnCopyAll.addEventListener('click', function() {
            const hasAnyHash = Object.values(currentHashes).some(h => h);
            if (!hasAnyHash) {
                showError('No hashes to copy. Enter text or select a file first.');
                return;
            }

            const allHashes = [
                'MD5: ' + formatHash(currentHashes.md5),
                'SHA-1: ' + formatHash(currentHashes.sha1),
                'SHA-256: ' + formatHash(currentHashes.sha256),
                'SHA-384: ' + formatHash(currentHashes.sha384),
                'SHA-512: ' + formatHash(currentHashes.sha512)
            ].join('\n');

            copyToClipboard(allHashes, 'All hashes copied!');
        });

        // Clear button
        btnClear.addEventListener('click', function() {
            textInput.value = '';
            charCount.textContent = '0 characters';
            removeFile();
            clearHashes();
        });
    })();
    </script>
    @endpush
</x-layout>
