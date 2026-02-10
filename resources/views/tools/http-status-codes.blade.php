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
    <script>
    (function() {
        const codes = [
            // 1xx Informational
            { code: 100, name: 'Continue', category: '1xx', description: 'The server has received the request headers and the client should proceed to send the request body.' },
            { code: 101, name: 'Switching Protocols', category: '1xx', description: 'The server is switching protocols as requested by the client (e.g., upgrading to WebSocket).' },
            { code: 102, name: 'Processing', category: '1xx', description: 'The server has received and is processing the request, but no response is available yet (WebDAV).' },
            { code: 103, name: 'Early Hints', category: '1xx', description: 'Used to return some response headers before the final HTTP message, allowing preloading of resources.' },

            // 2xx Success
            { code: 200, name: 'OK', category: '2xx', description: 'The request succeeded. The response body contains the requested resource.' },
            { code: 201, name: 'Created', category: '2xx', description: 'The request succeeded and a new resource was created. Typically used after POST or PUT requests.' },
            { code: 202, name: 'Accepted', category: '2xx', description: 'The request has been accepted for processing, but processing has not been completed (async operations).' },
            { code: 203, name: 'Non-Authoritative Information', category: '2xx', description: 'The returned metadata is not from the origin server but from a local or third-party copy.' },
            { code: 204, name: 'No Content', category: '2xx', description: 'The request succeeded but there is no content to return. Often used for DELETE or PUT operations.' },
            { code: 205, name: 'Reset Content', category: '2xx', description: 'The request succeeded and the client should reset the document view (e.g., clear a form).' },
            { code: 206, name: 'Partial Content', category: '2xx', description: 'The server is delivering only part of the resource due to a Range header sent by the client.' },
            { code: 207, name: 'Multi-Status', category: '2xx', description: 'Conveys information about multiple resources where multiple status codes might be appropriate (WebDAV).' },
            { code: 208, name: 'Already Reported', category: '2xx', description: 'Used inside a DAV: propstat response to avoid repeatedly enumerating members of a binding (WebDAV).' },
            { code: 226, name: 'IM Used', category: '2xx', description: 'The server has fulfilled a GET request with instance-manipulations applied to the current instance.' },

            // 3xx Redirection
            { code: 300, name: 'Multiple Choices', category: '3xx', description: 'The request has more than one possible response. The user or agent should choose one.' },
            { code: 301, name: 'Moved Permanently', category: '3xx', description: 'The resource has been permanently moved to a new URL. Search engines will update their links. Use for permanent URL changes.' },
            { code: 302, name: 'Found', category: '3xx', description: 'The resource is temporarily at a different URL. The client should continue using the original URL for future requests.' },
            { code: 303, name: 'See Other', category: '3xx', description: 'The response to the request can be found at another URL using a GET request (often after POST).' },
            { code: 304, name: 'Not Modified', category: '3xx', description: 'The resource has not been modified since the last request. The client can use its cached copy.' },
            { code: 307, name: 'Temporary Redirect', category: '3xx', description: 'The resource is temporarily at a different URL. Unlike 302, the request method must not be changed.' },
            { code: 308, name: 'Permanent Redirect', category: '3xx', description: 'The resource has been permanently moved. Unlike 301, the request method must not be changed.' },

            // 4xx Client Error
            { code: 400, name: 'Bad Request', category: '4xx', description: 'The server cannot process the request due to a client error (malformed syntax, invalid request, etc.).' },
            { code: 401, name: 'Unauthorized', category: '4xx', description: 'Authentication is required. The client must authenticate itself to get the requested response.' },
            { code: 402, name: 'Payment Required', category: '4xx', description: 'Reserved for future use. Originally intended for digital payment systems.' },
            { code: 403, name: 'Forbidden', category: '4xx', description: 'The server understood the request but refuses to authorize it. Unlike 401, re-authenticating will not help.' },
            { code: 404, name: 'Not Found', category: '4xx', description: 'The server cannot find the requested resource. The most common HTTP error encountered by users.' },
            { code: 405, name: 'Method Not Allowed', category: '4xx', description: 'The HTTP method used is not supported for the requested resource (e.g., POST on a read-only resource).' },
            { code: 406, name: 'Not Acceptable', category: '4xx', description: 'The server cannot produce a response matching the Accept headers sent by the client.' },
            { code: 407, name: 'Proxy Authentication Required', category: '4xx', description: 'Similar to 401, but authentication must be done through a proxy.' },
            { code: 408, name: 'Request Timeout', category: '4xx', description: 'The server timed out waiting for the request. The client took too long to send the complete request.' },
            { code: 409, name: 'Conflict', category: '4xx', description: 'The request conflicts with the current state of the server (e.g., edit conflict, duplicate resource).' },
            { code: 410, name: 'Gone', category: '4xx', description: 'The resource has been permanently deleted. Unlike 404, this is intentional and the resource will not return.' },
            { code: 411, name: 'Length Required', category: '4xx', description: 'The server requires the Content-Length header to be specified in the request.' },
            { code: 412, name: 'Precondition Failed', category: '4xx', description: 'One or more conditions in the request headers evaluated to false on the server.' },
            { code: 413, name: 'Payload Too Large', category: '4xx', description: 'The request body is larger than the server is willing or able to process.' },
            { code: 414, name: 'URI Too Long', category: '4xx', description: 'The URL requested is longer than the server is willing to interpret.' },
            { code: 415, name: 'Unsupported Media Type', category: '4xx', description: 'The media format of the request is not supported by the server.' },
            { code: 416, name: 'Range Not Satisfiable', category: '4xx', description: 'The range specified in the Range header cannot be fulfilled by the server.' },
            { code: 417, name: 'Expectation Failed', category: '4xx', description: 'The expectation indicated by the Expect request header cannot be met by the server.' },
            { code: 418, name: "I'm a Teapot", category: '4xx', description: 'An April Fools\' joke from RFC 2324. The server refuses to brew coffee because it is a teapot.' },
            { code: 421, name: 'Misdirected Request', category: '4xx', description: 'The request was directed at a server that is not able to produce a response.' },
            { code: 422, name: 'Unprocessable Entity', category: '4xx', description: 'The request was well-formed but could not be processed due to semantic errors (validation failures).' },
            { code: 423, name: 'Locked', category: '4xx', description: 'The resource being accessed is locked (WebDAV).' },
            { code: 424, name: 'Failed Dependency', category: '4xx', description: 'The request failed because it depended on another request that failed (WebDAV).' },
            { code: 425, name: 'Too Early', category: '4xx', description: 'The server is unwilling to risk processing a request that might be replayed (TLS early data).' },
            { code: 426, name: 'Upgrade Required', category: '4xx', description: 'The server refuses the request using the current protocol but may accept it after a protocol upgrade.' },
            { code: 428, name: 'Precondition Required', category: '4xx', description: 'The server requires the request to be conditional to prevent lost update conflicts.' },
            { code: 429, name: 'Too Many Requests', category: '4xx', description: 'The user has sent too many requests in a given time period (rate limiting).' },
            { code: 431, name: 'Request Header Fields Too Large', category: '4xx', description: 'The server refuses the request because the header fields are too large.' },
            { code: 451, name: 'Unavailable For Legal Reasons', category: '4xx', description: 'The resource is unavailable due to legal demands (censorship, court order, etc.). Named after Fahrenheit 451.' },

            // 5xx Server Error
            { code: 500, name: 'Internal Server Error', category: '5xx', description: 'A generic server error. Something went wrong on the server side that it couldn\'t handle.' },
            { code: 501, name: 'Not Implemented', category: '5xx', description: 'The server does not support the functionality required to fulfill the request.' },
            { code: 502, name: 'Bad Gateway', category: '5xx', description: 'The server acting as a gateway received an invalid response from the upstream server.' },
            { code: 503, name: 'Service Unavailable', category: '5xx', description: 'The server is temporarily unable to handle the request (overloaded or down for maintenance).' },
            { code: 504, name: 'Gateway Timeout', category: '5xx', description: 'The server acting as a gateway did not receive a timely response from the upstream server.' },
            { code: 505, name: 'HTTP Version Not Supported', category: '5xx', description: 'The server does not support the HTTP version used in the request.' },
            { code: 506, name: 'Variant Also Negotiates', category: '5xx', description: 'The server has an internal configuration error: transparent content negotiation results in a circular reference.' },
            { code: 507, name: 'Insufficient Storage', category: '5xx', description: 'The server is unable to store the representation needed to complete the request (WebDAV).' },
            { code: 508, name: 'Loop Detected', category: '5xx', description: 'The server detected an infinite loop while processing the request (WebDAV).' },
            { code: 510, name: 'Not Extended', category: '5xx', description: 'Further extensions to the request are required for the server to fulfill it.' },
            { code: 511, name: 'Network Authentication Required', category: '5xx', description: 'The client needs to authenticate to gain network access (e.g., captive portal).' }
        ];

        const categoryColors = {
            '1xx': { badge: 'bg-blue-500/20 text-blue-400 border-blue-500/30', border: 'border-blue-500/20 hover:border-blue-500/40' },
            '2xx': { badge: 'bg-green-500/20 text-green-400 border-green-500/30', border: 'border-green-500/20 hover:border-green-500/40' },
            '3xx': { badge: 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30', border: 'border-yellow-500/20 hover:border-yellow-500/40' },
            '4xx': { badge: 'bg-orange-500/20 text-orange-400 border-orange-500/30', border: 'border-orange-500/20 hover:border-orange-500/40' },
            '5xx': { badge: 'bg-red-500/20 text-red-400 border-red-500/30', border: 'border-red-500/20 hover:border-red-500/40' }
        };

        const searchInput = document.getElementById('search-input');
        const codesContainer = document.getElementById('codes-container');
        const resultCount = document.getElementById('result-count');
        const noResults = document.getElementById('no-results');
        const filterBtns = document.querySelectorAll('.filter-btn');

        let activeFilter = 'all';

        function renderCodes(filtered) {
            codesContainer.innerHTML = '';
            resultCount.textContent = filtered.length;

            if (filtered.length === 0) {
                noResults.classList.remove('hidden');
                return;
            }
            noResults.classList.add('hidden');

            let currentCategory = '';
            filtered.forEach(item => {
                if (item.category !== currentCategory) {
                    currentCategory = item.category;
                    const label = { '1xx': '1xx — Informational', '2xx': '2xx — Success', '3xx': '3xx — Redirection', '4xx': '4xx — Client Error', '5xx': '5xx — Server Error' }[currentCategory];
                    const colors = categoryColors[currentCategory];
                    const header = document.createElement('div');
                    header.className = 'mt-4 first:mt-0 mb-2';
                    header.innerHTML = `<span class="inline-block px-3 py-1 rounded-full text-xs font-semibold border ${colors.badge}">${label}</span>`;
                    codesContainer.appendChild(header);
                }

                const colors = categoryColors[item.category];
                const row = document.createElement('div');
                row.className = `bg-darkBg rounded-lg p-4 border ${colors.border} transition-colors`;
                row.innerHTML = `
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
                        <div class="shrink-0">
                            <span class="inline-block px-3 py-1 rounded-md font-mono font-bold text-sm border ${colors.badge}">${item.code}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-light font-medium">${item.name}</div>
                            <div class="text-light-muted text-sm mt-1">${item.description}</div>
                        </div>
                    </div>
                `;
                codesContainer.appendChild(row);
            });
        }

        function filter() {
            const query = searchInput.value.toLowerCase().trim();
            let filtered = codes;

            if (activeFilter !== 'all') {
                filtered = filtered.filter(c => c.category === activeFilter);
            }

            if (query) {
                filtered = filtered.filter(c =>
                    String(c.code).includes(query) ||
                    c.name.toLowerCase().includes(query) ||
                    c.description.toLowerCase().includes(query)
                );
            }

            renderCodes(filtered);
        }

        searchInput.addEventListener('input', filter);

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => {
                    b.classList.remove('active', 'text-gold', 'border-gold/50', 'bg-gold/10');
                    b.classList.remove('text-blue-400', 'bg-blue-500/10', 'border-blue-500/50');
                    b.classList.remove('text-green-400', 'bg-green-500/10', 'border-green-500/50');
                    b.classList.remove('text-yellow-400', 'bg-yellow-500/10', 'border-yellow-500/50');
                    b.classList.remove('text-orange-400', 'bg-orange-500/10', 'border-orange-500/50');
                    b.classList.remove('text-red-400', 'bg-red-500/10', 'border-red-500/50');
                });

                const f = this.dataset.filter;
                activeFilter = f;

                // Apply active styles based on category
                const colorMap = {
                    'all': ['text-gold', 'border-gold/50', 'bg-gold/10'],
                    '1xx': ['text-blue-400', 'border-blue-500/50', 'bg-blue-500/10'],
                    '2xx': ['text-green-400', 'border-green-500/50', 'bg-green-500/10'],
                    '3xx': ['text-yellow-400', 'border-yellow-500/50', 'bg-yellow-500/10'],
                    '4xx': ['text-orange-400', 'border-orange-500/50', 'bg-orange-500/10'],
                    '5xx': ['text-red-400', 'border-red-500/50', 'bg-red-500/10']
                };

                // Reset all to default colors
                filterBtns.forEach(b => {
                    const bf = b.dataset.filter;
                    const defaults = {
                        'all': ['border-gold/50', 'text-gold'],
                        '1xx': ['border-blue-500/30', 'text-blue-400'],
                        '2xx': ['border-green-500/30', 'text-green-400'],
                        '3xx': ['border-yellow-500/30', 'text-yellow-400'],
                        '4xx': ['border-orange-500/30', 'text-orange-400'],
                        '5xx': ['border-red-500/30', 'text-red-400']
                    };
                    defaults[bf].forEach(c => b.classList.add(c));
                });

                // Highlight active
                this.classList.add('active', ...colorMap[f]);

                filter();
            });
        });

        // Initial render
        renderCodes(codes);
    })();
    </script>
    @endpush
</x-layout>
