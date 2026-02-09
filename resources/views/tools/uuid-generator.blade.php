<x-layout>
    <x-slot:title>UUID Generator Online - Generate UUID v4, v1 & ULID Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online UUID generator. Create UUID v4, UUID v1, and ULID instantly. Bulk generation, multiple formats. 100% client-side, no signup required.</x-slot:description>
    <x-slot:keywords>uuid generator, uuid v4, uuid v1, ulid generator, generate uuid online, random uuid, unique identifier, guid generator, bulk uuid</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/uuid-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>UUID Generator Online - Generate UUID v4, v1 & ULID Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online UUID generator. Create UUID v4, UUID v1, and ULID instantly. Bulk generation supported.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/uuid-generator') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "UUID/ULID Generator",
            "description": "Free online UUID generator. Create UUID v4, UUID v1, and ULID instantly. Bulk generation, multiple formats.",
            "url": "https://hafiz.dev/tools/uuid-generator",
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
                    "name": "UUID Generator",
                    "item": "https://hafiz.dev/tools/uuid-generator"
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
                    "name": "What is a UUID?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A UUID (Universally Unique Identifier) is a 128-bit identifier that is unique across space and time. UUIDs are commonly used in databases, APIs, and distributed systems to identify resources without requiring a central authority to ensure uniqueness. The standard format is 32 hexadecimal digits displayed in five groups separated by hyphens: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What's the difference between UUID v1 and UUID v4?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "UUID v1 is timestamp-based, incorporating the current time and a node identifier (typically a MAC address). This makes v1 UUIDs sortable by creation time but potentially reveals information about when and where they were created. UUID v4 is randomly generated, providing better privacy and unpredictability. V4 is the most commonly used version for general-purpose unique identifiers."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is a ULID and when should I use it?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A ULID (Universally Unique Lexicographically Sortable Identifier) is a 26-character identifier that combines a timestamp with randomness. Unlike UUIDs, ULIDs are case-insensitive, URL-safe, and lexicographically sortable by creation time. Use ULIDs when you need IDs that can be sorted chronologically, such as for database primary keys where insertion order matters."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Are generated UUIDs truly unique?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, for all practical purposes. UUID v4 uses 122 random bits, making the probability of generating duplicate UUIDs astronomically small (about 1 in 5.3 × 10^36). You would need to generate 1 billion UUIDs per second for about 85 years to have a 50% chance of a collision. This makes UUIDs suitable for virtually any application requiring unique identifiers."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is this tool free and secure?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, this UUID generator is completely free with no signup required. All UUID generation happens entirely in your browser using JavaScript - no data is sent to any server. This makes it completely safe and private for generating identifiers for any purpose, including sensitive applications."
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
                    <li class="text-gold">UUID Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">UUID/ULID Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Generate universally unique identifiers instantly. 100% client-side processing - your data never leaves your browser.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                {{-- Type Selector --}}
                <div class="mb-6">
                    <label class="text-light font-semibold mb-3 block">Identifier Type</label>
                    <div class="flex flex-wrap gap-2">
                        <button id="btn-uuid-v4" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 cursor-pointer type-btn active" data-type="uuid-v4">
                            UUID v4 (Random)
                        </button>
                        <button id="btn-uuid-v1" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 cursor-pointer type-btn" data-type="uuid-v1">
                            UUID v1 (Timestamp)
                        </button>
                        <button id="btn-uuid-v7" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 cursor-pointer type-btn" data-type="uuid-v7">
                            UUID v7 (Sortable)
                        </button>
                        <button id="btn-ulid" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 cursor-pointer type-btn" data-type="ulid">
                            ULID
                        </button>
                    </div>
                </div>

                {{-- Options Row --}}
                <div class="flex flex-wrap items-center gap-6 mb-6">
                    {{-- Quantity --}}
                    <div class="flex items-center gap-3">
                        <label for="quantity-select" class="text-light-muted text-sm">Quantity:</label>
                        <select id="quantity-select" class="bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-2 text-sm focus:border-gold focus:outline-none cursor-pointer">
                            <option value="1">1</option>
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>

                    {{-- Format Options --}}
                    <label class="flex items-center gap-2 cursor-pointer" id="hyphens-label">
                        <input type="checkbox" id="hyphens-toggle" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                        <span class="text-light-muted text-sm">Include hyphens</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="uppercase-toggle" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                        <span class="text-light-muted text-sm">Uppercase</span>
                    </label>
                </div>

                {{-- Generate Button --}}
                <div class="mb-6">
                    <button id="btn-generate" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        Generate
                    </button>
                </div>

                {{-- Output Area --}}
                <div class="mb-4">
                    <label class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        Generated IDs
                        <span id="output-count" class="text-light-muted text-sm font-normal">(0)</span>
                    </label>
                    <div id="output-container" class="bg-darkBg border border-gold/20 rounded-lg p-4 min-h-[200px] max-h-[400px] overflow-y-auto">
                        <div id="output-placeholder" class="text-light-muted text-sm">Click "Generate" to create UUIDs...</div>
                        <div id="output-list" class="hidden space-y-1"></div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3">
                    <button id="btn-copy-all" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy All
                    </button>
                    <button id="btn-download" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download
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
            </div>

            {{-- Info Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <h3 class="text-lg font-semibold text-light mb-4">About UUID Versions</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
                    <div class="p-4 bg-darkBg rounded-lg border border-gold/10">
                        <div class="text-gold font-semibold mb-2">UUID v4 (Random)</div>
                        <p class="text-light-muted">Cryptographically random. Most commonly used. Best for general-purpose unique IDs.</p>
                    </div>
                    <div class="p-4 bg-darkBg rounded-lg border border-gold/10">
                        <div class="text-gold font-semibold mb-2">UUID v1 (Timestamp)</div>
                        <p class="text-light-muted">Time-based with node ID. Contains creation timestamp. Useful for time-ordered IDs.</p>
                    </div>
                    <div class="p-4 bg-darkBg rounded-lg border border-gold/10">
                        <div class="text-gold font-semibold mb-2">UUID v7 (Sortable)</div>
                        <p class="text-light-muted">New standard. Unix timestamp prefix makes it sortable. Great for database primary keys.</p>
                    </div>
                    <div class="p-4 bg-darkBg rounded-lg border border-gold/10">
                        <div class="text-gold font-semibold mb-2">ULID</div>
                        <p class="text-light-muted">26-char, case-insensitive, lexicographically sortable. URL-safe alternative to UUID.</p>
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
                    <p class="text-light-muted text-sm">Generate hundreds of UUIDs instantly with bulk generation support.</p>
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
                            <span class="text-light font-medium">What is a UUID?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A UUID (Universally Unique Identifier) is a 128-bit identifier that is unique across space and time. UUIDs are commonly used in databases, APIs, and distributed systems to identify resources without requiring a central authority to ensure uniqueness. The standard format is 32 hexadecimal digits displayed in five groups separated by hyphens: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What's the difference between UUID v1 and UUID v4?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            UUID v1 is timestamp-based, incorporating the current time and a node identifier (typically a MAC address simulation). This makes v1 UUIDs roughly sortable by creation time but potentially reveals information about when they were created. UUID v4 is randomly generated using cryptographically secure random numbers, providing better privacy and unpredictability. V4 is the most commonly used version for general-purpose unique identifiers.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is a ULID and when should I use it?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A ULID (Universally Unique Lexicographically Sortable Identifier) is a 26-character identifier that combines a 48-bit timestamp with 80 bits of randomness. Unlike UUIDs, ULIDs are case-insensitive, URL-safe, and lexicographically sortable by creation time. Use ULIDs when you need IDs that can be sorted chronologically, such as for database primary keys where insertion order matters, or when you need shorter, more URL-friendly identifiers.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Are generated UUIDs truly unique?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, for all practical purposes. UUID v4 uses 122 random bits, making the probability of generating duplicate UUIDs astronomically small (about 1 in 5.3 × 10^36). You would need to generate 1 billion UUIDs per second for about 85 years to have a 50% chance of a collision. This makes UUIDs suitable for virtually any application requiring unique identifiers.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is this tool free and secure?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, this UUID generator is completely free with no signup required. All UUID generation happens entirely in your browser using JavaScript - no data is sent to any server. This makes it completely safe and private for generating identifiers for any purpose, including sensitive applications.
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
        const typeButtons = document.querySelectorAll('.type-btn');
        const quantitySelect = document.getElementById('quantity-select');
        const hyphensToggle = document.getElementById('hyphens-toggle');
        const hyphensLabel = document.getElementById('hyphens-label');
        const uppercaseToggle = document.getElementById('uppercase-toggle');
        const btnGenerate = document.getElementById('btn-generate');
        const btnCopyAll = document.getElementById('btn-copy-all');
        const btnDownload = document.getElementById('btn-download');
        const btnClear = document.getElementById('btn-clear');
        const outputPlaceholder = document.getElementById('output-placeholder');
        const outputList = document.getElementById('output-list');
        const outputCount = document.getElementById('output-count');
        const copyNotification = document.getElementById('copy-notification');
        const copyMessage = document.getElementById('copy-message');

        // State
        let currentType = 'uuid-v4';
        let generatedIds = [];

        // UUID v4 Generation (Random) - Uses crypto API for better randomness
        function generateUUIDv4() {
            if (typeof crypto !== 'undefined' && crypto.getRandomValues) {
                const bytes = new Uint8Array(16);
                crypto.getRandomValues(bytes);
                bytes[6] = (bytes[6] & 0x0f) | 0x40; // Version 4
                bytes[8] = (bytes[8] & 0x3f) | 0x80; // Variant 10xx
                const hex = Array.from(bytes).map(b => b.toString(16).padStart(2, '0')).join('');
                return hex.slice(0, 8) + '-' + hex.slice(8, 12) + '-' + hex.slice(12, 16) + '-' + hex.slice(16, 20) + '-' + hex.slice(20);
            }
            // Fallback
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                const r = Math.random() * 16 | 0;
                const v = c === 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }

        // UUID v1 Generation (Timestamp-based)
        function generateUUIDv1() {
            const now = Date.now();
            // UUID epoch is Oct 15, 1582, JavaScript epoch is Jan 1, 1970
            // Difference in milliseconds: 12219292800000
            const uuidTime = (now + 12219292800000) * 10000;

            const timeLow = (uuidTime & 0xffffffff).toString(16).padStart(8, '0');
            const timeMid = ((uuidTime / 0x100000000) & 0xffff).toString(16).padStart(4, '0');
            const timeHiAndVersion = (((uuidTime / 0x1000000000000) & 0x0fff) | 0x1000).toString(16).padStart(4, '0');

            // Clock sequence (random)
            const clockSeq = ((Math.random() * 0x3fff) | 0x8000).toString(16).padStart(4, '0');

            // Node (random, simulating MAC address with multicast bit set)
            const node = Array.from({length: 6}, () =>
                Math.floor(Math.random() * 256).toString(16).padStart(2, '0')
            ).join('');

            return `${timeLow}-${timeMid}-${timeHiAndVersion}-${clockSeq}-${node}`;
        }

        // UUID v7 Generation (Sortable, timestamp-based)
        function generateUUIDv7() {
            const now = Date.now();

            // 48-bit timestamp (milliseconds since Unix epoch)
            const timestamp = now.toString(16).padStart(12, '0');

            // Random bytes for the rest
            const bytes = new Uint8Array(10);
            if (typeof crypto !== 'undefined' && crypto.getRandomValues) {
                crypto.getRandomValues(bytes);
            } else {
                for (let i = 0; i < 10; i++) {
                    bytes[i] = Math.floor(Math.random() * 256);
                }
            }

            // Version 7 in bits 48-51
            const version = '7';
            const randA = bytes.slice(0, 2);
            randA[0] = (randA[0] & 0x0f); // Clear top 4 bits for version
            const randAHex = Array.from(randA).map(b => b.toString(16).padStart(2, '0')).join('');

            // Variant 10xx in bits 64-65
            const randB = bytes.slice(2);
            randB[0] = (randB[0] & 0x3f) | 0x80; // Set variant
            const randBHex = Array.from(randB).map(b => b.toString(16).padStart(2, '0')).join('');

            return `${timestamp.slice(0, 8)}-${timestamp.slice(8, 12)}-${version}${randAHex}-${randBHex.slice(0, 4)}-${randBHex.slice(4)}`;
        }

        // ULID Generation
        function generateULID() {
            const ENCODING = '0123456789ABCDEFGHJKMNPQRSTVWXYZ';
            const ENCODING_LEN = ENCODING.length;
            const TIME_LEN = 10;
            const RANDOM_LEN = 16;

            function randomChar() {
                if (typeof crypto !== 'undefined' && crypto.getRandomValues) {
                    const arr = new Uint8Array(1);
                    crypto.getRandomValues(arr);
                    return ENCODING[arr[0] % ENCODING_LEN];
                }
                return ENCODING[Math.floor(Math.random() * ENCODING_LEN)];
            }

            function encodeTime(now, len) {
                let str = '';
                for (let i = len - 1; i >= 0; i--) {
                    const mod = now % ENCODING_LEN;
                    str = ENCODING[mod] + str;
                    now = Math.floor(now / ENCODING_LEN);
                }
                return str;
            }

            const time = encodeTime(Date.now(), TIME_LEN);
            let random = '';
            for (let i = 0; i < RANDOM_LEN; i++) {
                random += randomChar();
            }

            return time + random;
        }

        // Generate ID based on current type
        function generateId() {
            switch (currentType) {
                case 'uuid-v1':
                    return generateUUIDv1();
                case 'uuid-v7':
                    return generateUUIDv7();
                case 'ulid':
                    return generateULID();
                case 'uuid-v4':
                default:
                    return generateUUIDv4();
            }
        }

        // Format ID based on options
        function formatId(id) {
            let formatted = id;

            // Handle hyphens (not applicable for ULID)
            if (currentType !== 'ulid' && !hyphensToggle.checked) {
                formatted = formatted.replace(/-/g, '');
            }

            // Handle case
            if (uppercaseToggle.checked) {
                formatted = formatted.toUpperCase();
            } else {
                formatted = formatted.toLowerCase();
            }

            return formatted;
        }

        // Generate multiple IDs
        function generateIds() {
            const quantity = parseInt(quantitySelect.value, 10);
            generatedIds = [];

            for (let i = 0; i < quantity; i++) {
                generatedIds.push(formatId(generateId()));
            }

            renderOutput();
        }

        // Render output list
        function renderOutput() {
            if (generatedIds.length === 0) {
                outputPlaceholder.classList.remove('hidden');
                outputList.classList.add('hidden');
                outputCount.textContent = '(0)';
                return;
            }

            outputPlaceholder.classList.add('hidden');
            outputList.classList.remove('hidden');
            outputCount.textContent = `(${generatedIds.length})`;

            outputList.innerHTML = generatedIds.map((id, index) => `
                <div class="flex items-center justify-between p-2 bg-darkBg/50 rounded border border-gold/10 hover:border-gold/30 transition-colors group">
                    <code class="text-light font-mono text-sm break-all">${id}</code>
                    <button class="copy-single-btn ml-2 p-1.5 text-light-muted hover:text-gold transition-colors opacity-0 group-hover:opacity-100 cursor-pointer" data-id="${id}" title="Copy">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </button>
                </div>
            `).join('');

            // Add click handlers for individual copy buttons
            document.querySelectorAll('.copy-single-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    copyToClipboard(id, 'Copied to clipboard!');
                });
            });
        }

        // Copy to clipboard
        function copyToClipboard(text, message) {
            navigator.clipboard.writeText(text).then(() => {
                showNotification(message);
            }).catch(() => {
                showNotification('Failed to copy', true);
            });
        }

        // Show notification
        function showNotification(message, isError = false) {
            copyMessage.textContent = message;
            copyNotification.classList.remove('hidden');

            if (isError) {
                copyNotification.classList.remove('bg-green-500/10', 'border-green-500/30');
                copyNotification.classList.add('bg-red-500/10', 'border-red-500/30');
                copyMessage.classList.remove('text-green-400');
                copyMessage.classList.add('text-red-400');
            } else {
                copyNotification.classList.remove('bg-red-500/10', 'border-red-500/30');
                copyNotification.classList.add('bg-green-500/10', 'border-green-500/30');
                copyMessage.classList.remove('text-red-400');
                copyMessage.classList.add('text-green-400');
            }

            setTimeout(() => {
                copyNotification.classList.add('hidden');
            }, 2000);
        }

        // Copy all IDs
        function copyAll() {
            if (generatedIds.length === 0) {
                showNotification('Nothing to copy. Generate some IDs first.', true);
                return;
            }
            copyToClipboard(generatedIds.join('\n'), `Copied ${generatedIds.length} IDs to clipboard!`);
        }

        // Download as TXT
        function downloadTxt() {
            if (generatedIds.length === 0) {
                showNotification('Nothing to download. Generate some IDs first.', true);
                return;
            }

            const content = generatedIds.join('\n');
            const blob = new Blob([content], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const now = new Date();
            const timestamp = now.getFullYear() + '-' +
                String(now.getMonth() + 1).padStart(2, '0') + '-' +
                String(now.getDate()).padStart(2, '0') + '-' +
                String(now.getHours()).padStart(2, '0') +
                String(now.getMinutes()).padStart(2, '0') +
                String(now.getSeconds()).padStart(2, '0');

            const typeName = currentType.replace('-', '');
            const a = document.createElement('a');
            a.href = url;
            a.download = `${typeName}-${timestamp}.txt`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);

            showNotification('File downloaded!');
        }

        // Clear all
        function clearAll() {
            generatedIds = [];
            renderOutput();
        }

        // Update type button styles
        function updateTypeButtons() {
            typeButtons.forEach(btn => {
                if (btn.getAttribute('data-type') === currentType) {
                    btn.classList.remove('border', 'border-gold', 'text-gold', 'hover:bg-gold/10');
                    btn.classList.add('bg-gold', 'text-darkBg', 'hover:bg-gold-light');
                } else {
                    btn.classList.remove('bg-gold', 'text-darkBg', 'hover:bg-gold-light');
                    btn.classList.add('border', 'border-gold', 'text-gold', 'hover:bg-gold/10');
                }
            });

            // Hide hyphens option for ULID (ULIDs don't have hyphens)
            if (currentType === 'ulid') {
                hyphensLabel.classList.add('opacity-50');
                hyphensToggle.disabled = true;
            } else {
                hyphensLabel.classList.remove('opacity-50');
                hyphensToggle.disabled = false;
            }
        }

        // Event Listeners
        typeButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                currentType = this.getAttribute('data-type');
                updateTypeButtons();
                // Regenerate if there are existing IDs
                if (generatedIds.length > 0) {
                    generateIds();
                }
            });
        });

        btnGenerate.addEventListener('click', generateIds);
        btnCopyAll.addEventListener('click', copyAll);
        btnDownload.addEventListener('click', downloadTxt);
        btnClear.addEventListener('click', clearAll);

        // Regenerate when options change (if IDs exist)
        hyphensToggle.addEventListener('change', function() {
            if (generatedIds.length > 0) {
                // Re-format existing IDs
                generatedIds = generatedIds.map(id => {
                    // First, normalize to standard format (with hyphens, lowercase)
                    let normalized = id.toLowerCase();
                    if (currentType !== 'ulid' && normalized.length === 32) {
                        // Add hyphens back
                        normalized = normalized.slice(0, 8) + '-' + normalized.slice(8, 12) + '-' + normalized.slice(12, 16) + '-' + normalized.slice(16, 20) + '-' + normalized.slice(20);
                    }
                    return formatId(normalized);
                });
                renderOutput();
            }
        });

        uppercaseToggle.addEventListener('change', function() {
            if (generatedIds.length > 0) {
                generatedIds = generatedIds.map(id => {
                    return uppercaseToggle.checked ? id.toUpperCase() : id.toLowerCase();
                });
                renderOutput();
            }
        });

        // Keyboard shortcut: Enter to generate
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.ctrlKey && !e.metaKey && !e.shiftKey) {
                // Only if not focused on a form element
                if (document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA' && document.activeElement.tagName !== 'SELECT') {
                    e.preventDefault();
                    generateIds();
                }
            }
        });

        // Initialize
        updateTypeButtons();
    })();
    </script>
    @endpush
</x-layout>
