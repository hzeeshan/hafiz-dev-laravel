<x-layout>
    <x-slot:title>Free Developer Tools Online | JSON, Base64, UUID & More | hafiz.dev</x-slot:title>
    <x-slot:description>Free online developer tools: JSON formatter, Base64 encoder, UUID generator, cron expression builder and more. 100% client-side, no signup required.</x-slot:description>
    <x-slot:keywords>developer tools, json formatter, base64 encoder, uuid generator, cron builder, online tools, free tools, web developer tools</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Free Developer Tools Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online developer tools: JSON formatter, Base64 encoder, UUID generator and more. 100% client-side, no signup required.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools') }}</x-slot:ogUrl>
    <x-slot:ogImage>{{ url('/images/og/tools.png') }}</x-slot:ogImage>

    @push('schemas')
        {{-- ItemList Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "ItemList",
            "name": "Free Developer Tools",
            "description": "Collection of free online developer tools by hafiz.dev",
            "url": "https://hafiz.dev/tools",
            "numberOfItems": 9,
            "itemListElement": [
                {
                    "@@type": "ListItem",
                    "position": 1,
                    "item": {
                        "@@type": "SoftwareApplication",
                        "name": "JSON Formatter & Validator",
                        "description": "Format, validate, and minify JSON instantly",
                        "url": "https://hafiz.dev/tools/json-formatter",
                        "applicationCategory": "DeveloperApplication",
                        "offers": {
                            "@@type": "Offer",
                            "price": "0",
                            "priceCurrency": "USD"
                        }
                    }
                },
                {
                    "@@type": "ListItem",
                    "position": 2,
                    "item": {
                        "@@type": "SoftwareApplication",
                        "name": "Base64 Encoder/Decoder",
                        "description": "Encode and decode Base64 strings",
                        "url": "https://hafiz.dev/tools/base64-encoder",
                        "applicationCategory": "DeveloperApplication",
                        "offers": {
                            "@@type": "Offer",
                            "price": "0",
                            "priceCurrency": "USD"
                        }
                    }
                },
                {
                    "@@type": "ListItem",
                    "position": 3,
                    "item": {
                        "@@type": "SoftwareApplication",
                        "name": "Cron Expression Builder",
                        "description": "Build and validate cron schedule expressions",
                        "url": "https://hafiz.dev/tools/cron-expression-builder",
                        "applicationCategory": "DeveloperApplication",
                        "offers": {
                            "@@type": "Offer",
                            "price": "0",
                            "priceCurrency": "USD"
                        }
                    }
                },
                {
                    "@@type": "ListItem",
                    "position": 4,
                    "item": {
                        "@@type": "SoftwareApplication",
                        "name": "UUID/ULID Generator",
                        "description": "Generate unique identifiers instantly",
                        "url": "https://hafiz.dev/tools/uuid-generator",
                        "applicationCategory": "DeveloperApplication",
                        "offers": {
                            "@@type": "Offer",
                            "price": "0",
                            "priceCurrency": "USD"
                        }
                    }
                },
                {
                    "@@type": "ListItem",
                    "position": 5,
                    "item": {
                        "@@type": "SoftwareApplication",
                        "name": "Regex Tester",
                        "description": "Test and debug regular expressions",
                        "url": "https://hafiz.dev/tools/regex-tester",
                        "applicationCategory": "DeveloperApplication",
                        "offers": {
                            "@@type": "Offer",
                            "price": "0",
                            "priceCurrency": "USD"
                        }
                    }
                },
                {
                    "@@type": "ListItem",
                    "position": 6,
                    "item": {
                        "@@type": "SoftwareApplication",
                        "name": "JWT Decoder",
                        "description": "Decode and inspect JSON Web Tokens",
                        "url": "https://hafiz.dev/tools/jwt-decoder",
                        "applicationCategory": "DeveloperApplication",
                        "offers": {
                            "@@type": "Offer",
                            "price": "0",
                            "priceCurrency": "USD"
                        }
                    }
                },
                {
                    "@@type": "ListItem",
                    "position": 7,
                    "item": {
                        "@@type": "SoftwareApplication",
                        "name": "Password Generator",
                        "description": "Generate secure random passwords",
                        "url": "https://hafiz.dev/tools/password-generator",
                        "applicationCategory": "DeveloperApplication",
                        "offers": {
                            "@@type": "Offer",
                            "price": "0",
                            "priceCurrency": "USD"
                        }
                    }
                },
                {
                    "@@type": "ListItem",
                    "position": 8,
                    "item": {
                        "@@type": "SoftwareApplication",
                        "name": "Hash Generator",
                        "description": "Generate MD5, SHA-256, SHA-512 hashes",
                        "url": "https://hafiz.dev/tools/hash-generator",
                        "applicationCategory": "DeveloperApplication",
                        "offers": {
                            "@@type": "Offer",
                            "price": "0",
                            "priceCurrency": "USD"
                        }
                    }
                },
                {
                    "@@type": "ListItem",
                    "position": 9,
                    "item": {
                        "@@type": "SoftwareApplication",
                        "name": "URL Encoder/Decoder",
                        "description": "Encode and decode URLs and query strings",
                        "url": "https://hafiz.dev/tools/url-encoder",
                        "applicationCategory": "DeveloperApplication",
                        "offers": {
                            "@@type": "Offer",
                            "price": "0",
                            "priceCurrency": "USD"
                        }
                    }
                }
            ]
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
                }
            ]
        }
        </script>
    @endpush

    <!-- Override background pattern for tools pages - consistent with blog -->
    <style>
        body > div:first-of-type {
            background-image: none !important;
            background: #1e1e28;
        }
    </style>

    <div class="max-w-6xl mx-auto px-4 py-16 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="mb-6 text-sm" aria-label="Breadcrumb">
                <ol class="flex items-center gap-2 text-light-muted">
                    <li><a href="/" class="hover:text-gold transition-colors">Home</a></li>
                    <li><span class="text-gold/50">/</span></li>
                    <li class="text-gold">Tools</li>
                </ol>
            </nav>

            {{-- Hero Section --}}
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Free Developer Tools</h1>
                <p class="text-light-muted max-w-2xl mx-auto text-lg">
                    100% client-side tools for developers. No signup, no tracking, completely free.
                </p>
                <p class="text-light-muted/70 max-w-xl mx-auto mt-3 text-sm">
                    All tools run entirely in your browser. Your data never leaves your computer.
                </p>
            </div>

            {{-- Tools Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- JSON Formatter - Available --}}
                <a href="/tools/json-formatter" class="group block">
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
                        <div class="flex items-start justify-between mb-4">
                            <div class="text-3xl text-gold font-mono">{ }</div>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">JSON</span>
                        </div>
                        <h3 class="text-lg font-bold text-light mb-2 group-hover:text-gold transition-colors">JSON Formatter & Validator</h3>
                        <p class="text-light-muted text-sm mb-4">Format, validate, and minify JSON instantly</p>
                        <div class="flex items-center text-gold text-sm font-semibold group-hover:gap-2 transition-all">
                            <span>Use Tool</span>
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

                {{-- Base64 Encoder - Available --}}
                <a href="/tools/base64-encoder" class="group block">
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
                        <div class="flex items-start justify-between mb-4">
                            <div class="text-3xl">🔐</div>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Encoding</span>
                        </div>
                        <h3 class="text-lg font-bold text-light mb-2 group-hover:text-gold transition-colors">Base64 Encoder/Decoder</h3>
                        <p class="text-light-muted text-sm mb-4">Encode and decode Base64 strings</p>
                        <div class="flex items-center text-gold text-sm font-semibold group-hover:gap-2 transition-all">
                            <span>Use Tool</span>
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

                {{-- Cron Builder - Available --}}
                <a href="/tools/cron-expression-builder" class="group block">
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
                        <div class="flex items-start justify-between mb-4">
                            <div class="text-3xl">⏰</div>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Scheduling</span>
                        </div>
                        <h3 class="text-lg font-bold text-light mb-2 group-hover:text-gold transition-colors">Cron Expression Builder</h3>
                        <p class="text-light-muted text-sm mb-4">Build and validate cron schedule expressions</p>
                        <div class="flex items-center text-gold text-sm font-semibold group-hover:gap-2 transition-all">
                            <span>Use Tool</span>
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

                {{-- UUID Generator - Available --}}
                <a href="/tools/uuid-generator" class="group block">
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
                        <div class="flex items-start justify-between mb-4">
                            <div class="text-3xl">🆔</div>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Generators</span>
                        </div>
                        <h3 class="text-lg font-bold text-light mb-2 group-hover:text-gold transition-colors">UUID/ULID Generator</h3>
                        <p class="text-light-muted text-sm mb-4">Generate unique identifiers instantly</p>
                        <div class="flex items-center text-gold text-sm font-semibold group-hover:gap-2 transition-all">
                            <span>Use Tool</span>
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

                {{-- Regex Tester - Available --}}
                <a href="/tools/regex-tester" class="group block">
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
                        <div class="flex items-start justify-between mb-4">
                            <div class="text-3xl font-mono text-gold">.*</div>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Testing</span>
                        </div>
                        <h3 class="text-lg font-bold text-light mb-2 group-hover:text-gold transition-colors">Regex Tester</h3>
                        <p class="text-light-muted text-sm mb-4">Test and debug regular expressions</p>
                        <div class="flex items-center text-gold text-sm font-semibold group-hover:gap-2 transition-all">
                            <span>Use Tool</span>
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

                {{-- JWT Decoder - Available --}}
                <a href="/tools/jwt-decoder" class="group block">
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
                        <div class="flex items-start justify-between mb-4">
                            <div class="text-3xl">🔑</div>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Security</span>
                        </div>
                        <h3 class="text-lg font-bold text-light mb-2 group-hover:text-gold transition-colors">JWT Decoder</h3>
                        <p class="text-light-muted text-sm mb-4">Decode and inspect JSON Web Tokens</p>
                        <div class="flex items-center text-gold text-sm font-semibold group-hover:gap-2 transition-all">
                            <span>Use Tool</span>
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

                {{-- Password Generator - Available --}}
                <a href="/tools/password-generator" class="group block">
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
                        <div class="flex items-start justify-between mb-4">
                            <div class="text-3xl">🔐</div>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Security</span>
                        </div>
                        <h3 class="text-lg font-bold text-light mb-2 group-hover:text-gold transition-colors">Password Generator</h3>
                        <p class="text-light-muted text-sm mb-4">Generate secure random passwords</p>
                        <div class="flex items-center text-gold text-sm font-semibold group-hover:gap-2 transition-all">
                            <span>Use Tool</span>
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

                {{-- Hash Generator - Available --}}
                <a href="/tools/hash-generator" class="group block">
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
                        <div class="flex items-start justify-between mb-4">
                            <div class="text-3xl">#️⃣</div>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Security</span>
                        </div>
                        <h3 class="text-lg font-bold text-light mb-2 group-hover:text-gold transition-colors">Hash Generator</h3>
                        <p class="text-light-muted text-sm mb-4">Generate MD5, SHA-256, SHA-512 hashes</p>
                        <div class="flex items-center text-gold text-sm font-semibold group-hover:gap-2 transition-all">
                            <span>Use Tool</span>
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

                {{-- URL Encoder/Decoder - Available --}}
                <a href="/tools/url-encoder" class="group block">
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
                        <div class="flex items-start justify-between mb-4">
                            <div class="text-3xl">🔗</div>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Encoding</span>
                        </div>
                        <h3 class="text-lg font-bold text-light mb-2 group-hover:text-gold transition-colors">URL Encoder/Decoder</h3>
                        <p class="text-light-muted text-sm mb-4">Encode and decode URLs and query strings</p>
                        <div class="flex items-center text-gold text-sm font-semibold group-hover:gap-2 transition-all">
                            <span>Use Tool</span>
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

            </div>

            {{-- Request Tool Section --}}
            <div class="mt-16 text-center">
                <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card max-w-2xl mx-auto">
                    <h2 class="text-xl font-bold text-light mb-3">Need a specific tool?</h2>
                    <p class="text-light-muted mb-6">
                        I'm building this tools collection based on what developers actually need.
                        Let me know what tool would help you most!
                    </p>
                    <a href="mailto:contact@hafiz.dev?subject=Tool%20Request"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Request a Tool
                    </a>
                </div>
            </div>

            {{-- Features Section --}}
            <div class="mt-16 grid md:grid-cols-3 gap-6">
                <div class="text-center p-6">
                    <div class="text-3xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Your data never touches any server.</p>
                </div>
                <div class="text-center p-6">
                    <div class="text-3xl mb-3">⚡</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant & Fast</h3>
                    <p class="text-light-muted text-sm">No loading, no waiting. Tools work instantly with no network latency.</p>
                </div>
                <div class="text-center p-6">
                    <div class="text-3xl mb-3">🆓</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Free Forever</h3>
                    <p class="text-light-muted text-sm">No signup, no limits, no ads. Just useful tools for developers.</p>
                </div>
            </div>

    </div>
</x-layout>
