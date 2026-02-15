<x-layout>
    <x-slot:title>HTTP Status Codes Cheat Sheet - Complete Reference Guide | hafiz.dev</x-slot:title>
    <x-slot:description>Complete HTTP status codes cheat sheet with descriptions, categories, and examples. Search and filter all 1xx-5xx codes. Free reference for developers.</x-slot:description>
    <x-slot:keywords>http status codes cheat sheet, http status codes, http response codes, 404 status code, 200 ok, 301 redirect, 500 internal server error</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/http-status-codes') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>HTTP Status Codes Cheat Sheet - Complete Reference Guide | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Complete HTTP status codes reference with descriptions, categories, and examples. Search and filter all 1xx-5xx codes.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/http-status-codes') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "HTTP Status Codes Cheat Sheet",
            "description": "Complete HTTP status codes reference with descriptions and categories.",
            "url": "https://hafiz.dev/tools/http-status-codes",
            "applicationCategory": "UtilitiesApplication",
            "operatingSystem": "Any",
            "offers": { "@@type": "Offer", "price": "0", "priceCurrency": "USD" },
            "author": { "@@type": "Person", "name": "Hafiz Riaz", "url": "https://hafiz.dev" }
        }
        </script>
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "BreadcrumbList",
            "itemListElement": [
                { "@@type": "ListItem", "position": 1, "name": "Home", "item": "https://hafiz.dev" },
                { "@@type": "ListItem", "position": 2, "name": "Tools", "item": "https://hafiz.dev/tools" },
                { "@@type": "ListItem", "position": 3, "name": "HTTP Status Codes", "item": "https://hafiz.dev/tools/http-status-codes" }
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
                    "name": "What are HTTP status codes?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "HTTP status codes are three-digit numbers returned by a web server in response to a client's request. They indicate whether the request was successful, redirected, or resulted in an error. Codes are grouped into five classes: 1xx (Informational), 2xx (Success), 3xx (Redirection), 4xx (Client Error), and 5xx (Server Error)."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between 301 and 302 redirects?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A 301 redirect is permanent, meaning the resource has permanently moved to a new URL. Search engines transfer SEO value to the new URL. A 302 redirect is temporary, indicating the resource is temporarily at a different URL. Search engines keep indexing the original URL. Use 301 for permanent URL changes and 302 for temporary redirects."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What does a 403 Forbidden error mean?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A 403 Forbidden error means the server understands the request but refuses to authorize it. Unlike 401 Unauthorized (which means authentication is needed), 403 means the server knows who you are but you don't have permission to access the resource. Common causes include insufficient file permissions, IP blocking, or access control rules."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between 401 and 403?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "401 Unauthorized means the request lacks valid authentication credentials — the user needs to log in. 403 Forbidden means the user is authenticated but doesn't have permission to access the resource. In short: 401 = 'Who are you?' and 403 = 'I know who you are, but you can't access this.'"
                    }
                },
                {
                    "@@type": "Question",
                    "name": "When should I use 404 vs 410?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Use 404 Not Found when a resource doesn't exist or may have never existed. Use 410 Gone when a resource has been intentionally and permanently removed. The key difference is that 410 tells search engines to remove the page from their index faster, while 404 may be recrawled periodically. Use 410 when you deliberately delete content."
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
                    <li class="text-gold">HTTP Status Codes</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">HTTP Status Codes Cheat Sheet</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Complete reference of all HTTP status codes with descriptions, categories, and usage examples. Search and filter to find any code instantly.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Search & Filter --}}
                <div class="mb-6 flex flex-col sm:flex-row gap-3">
                    <div class="flex-1">
                        <label for="search-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            Search
                        </label>
                        <input
                            type="text"
                            id="search-input"
                            class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30"
                            placeholder="Search by code, name, or description..."
                            spellcheck="false"
                            autocomplete="off"
                        >
                    </div>
                </div>

                {{-- Category Filters --}}
                <div class="mb-6 flex flex-wrap gap-2">
                    <button data-filter="all" class="filter-btn active px-4 py-2 rounded-lg text-sm font-medium border border-gold/50 text-gold bg-gold/10 transition-all duration-300 cursor-pointer">All</button>
                    <button data-filter="1xx" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-blue-500/30 text-blue-400 hover:bg-blue-500/10 transition-all duration-300 cursor-pointer">1xx Informational</button>
                    <button data-filter="2xx" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-green-500/30 text-green-400 hover:bg-green-500/10 transition-all duration-300 cursor-pointer">2xx Success</button>
                    <button data-filter="3xx" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-yellow-500/30 text-yellow-400 hover:bg-yellow-500/10 transition-all duration-300 cursor-pointer">3xx Redirection</button>
                    <button data-filter="4xx" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-orange-500/30 text-orange-400 hover:bg-orange-500/10 transition-all duration-300 cursor-pointer">4xx Client Error</button>
                    <button data-filter="5xx" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-red-500/30 text-red-400 hover:bg-red-500/10 transition-all duration-300 cursor-pointer">5xx Server Error</button>
                </div>

                {{-- Results Count --}}
                <div class="mb-4 text-sm text-light-muted">
                    Showing <span id="result-count" class="text-gold font-semibold">63</span> status codes
                </div>

                {{-- Status Codes Table --}}
                <div id="codes-container" class="space-y-2">
                </div>

                {{-- No Results --}}
                <div id="no-results" class="hidden text-center py-12">
                    <div class="text-4xl mb-3">🔍</div>
                    <p class="text-light-muted">No status codes match your search.</p>
                </div>
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features --}}
            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 text-center">
                    <div class="text-3xl mb-3">📖</div>
                    <h3 class="text-light font-semibold mb-2">Complete Reference</h3>
                    <p class="text-light-muted text-sm">All standard HTTP status codes from 100 to 511, with clear descriptions and real-world usage notes.</p>
                </div>
                <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 text-center">
                    <div class="text-3xl mb-3">🔍</div>
                    <h3 class="text-light font-semibold mb-2">Instant Search</h3>
                    <p class="text-light-muted text-sm">Search by code number, name, or description. Filter by category to quickly find the code you need.</p>
                </div>
                <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 text-center">
                    <div class="text-3xl mb-3">🎨</div>
                    <h3 class="text-light font-semibold mb-2">Color-Coded</h3>
                    <p class="text-light-muted text-sm">Each category is color-coded for quick visual identification: blue, green, yellow, orange, and red.</p>
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
                            <span class="text-light font-medium">What are HTTP status codes?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            HTTP status codes are three-digit numbers returned by a web server in response to a client's request. They indicate whether the request was successful, redirected, or resulted in an error. Codes are grouped into five classes: 1xx (Informational), 2xx (Success), 3xx (Redirection), 4xx (Client Error), and 5xx (Server Error).
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between 301 and 302 redirects?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A 301 redirect is permanent, meaning the resource has permanently moved to a new URL. Search engines transfer SEO value to the new URL. A 302 redirect is temporary, indicating the resource is temporarily at a different URL. Search engines keep indexing the original URL. Use 301 for permanent URL changes and 302 for temporary redirects.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between 401 and 403?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            401 Unauthorized means the request lacks valid authentication credentials — the user needs to log in. 403 Forbidden means the user is authenticated but doesn't have permission to access the resource. In short: 401 = "Who are you?" and 403 = "I know who you are, but you can't access this."
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">When should I use 404 vs 410?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Use 404 Not Found when a resource doesn't exist or may have never existed. Use 410 Gone when a resource has been intentionally and permanently removed. The key difference is that 410 tells search engines to remove the page from their index faster, while 404 may be recrawled periodically. Use 410 when you deliberately delete content.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What does 500 Internal Server Error mean?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A 500 Internal Server Error is a generic catch-all error indicating something went wrong on the server side. The server encountered an unexpected condition that prevented it from fulfilling the request. Common causes include unhandled exceptions in code, misconfigured servers, database connection failures, or syntax errors in server-side scripts. Check server logs for specific details.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @include('tools.partials.http-status-codes-script')
    @endpush
</x-layout>
