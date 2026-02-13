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

                <x-tool-privacy-banner />

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
        @include('tools.partials.uuid-generator-script')
    @endpush
</x-layout>
