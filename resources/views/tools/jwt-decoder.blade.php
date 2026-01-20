<x-layout>
    <x-slot:title>JWT Decoder Online - Decode JSON Web Tokens Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online JWT decoder. Decode and inspect JSON Web Tokens instantly. View header, payload, and expiration. 100% client-side, no signup required.</x-slot:description>
    <x-slot:keywords>jwt decoder, jwt debugger, json web token decoder, decode jwt, jwt parser, jwt viewer, jwt inspector, jwt online, jwt token decoder</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/jwt-decoder') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>JWT Decoder Online - Decode JSON Web Tokens Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online JWT decoder. Decode and inspect JSON Web Tokens instantly. View header and payload.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/jwt-decoder') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "JWT Decoder",
            "description": "Free online JWT decoder. Decode and inspect JSON Web Tokens instantly. View header, payload, and expiration.",
            "url": "https://hafiz.dev/tools/jwt-decoder",
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
                    "name": "JWT Decoder",
                    "item": "https://hafiz.dev/tools/jwt-decoder"
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
                    "name": "What is a JWT (JSON Web Token)?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A JSON Web Token (JWT) is a compact, URL-safe token format used for securely transmitting information between parties. JWTs are commonly used for authentication and authorization in web applications. They consist of three parts: a header (algorithm and token type), a payload (claims/data), and a signature (for verification)."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can this tool verify JWT signatures?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "No, this tool only decodes and displays the contents of a JWT. Signature verification requires the secret key or public key used to sign the token, which should never be shared publicly. This tool is designed for inspecting token contents, not for security validation. Always verify signatures on your server using proper libraries."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What are the three parts of a JWT?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A JWT consists of three parts separated by dots: 1) Header - contains the token type (JWT) and signing algorithm (e.g., HS256, RS256). 2) Payload - contains claims, which are statements about the user and additional metadata. 3) Signature - created by encoding the header and payload with a secret key, used to verify the token hasn't been tampered with."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What do common claims like exp, iat, sub mean?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Common JWT claims include: 'exp' (Expiration Time) - when the token expires; 'iat' (Issued At) - when the token was created; 'sub' (Subject) - who the token is about, usually a user ID; 'iss' (Issuer) - who issued the token; 'aud' (Audience) - intended recipient; 'nbf' (Not Before) - token not valid before this time; 'jti' (JWT ID) - unique identifier for the token."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is this tool free and secure?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, this JWT decoder is completely free with no signup required. All decoding happens entirely in your browser using JavaScript - your tokens are never sent to any server. This makes it safe to decode tokens containing sensitive information, though you should still avoid sharing tokens publicly."
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
                    <li class="text-gold">JWT Decoder</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">JWT Decoder</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Decode and inspect JSON Web Tokens instantly. 100% client-side processing - your tokens never leave your browser.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                {{-- JWT Input --}}
                <div class="mb-6">
                    <label for="jwt-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                        Paste JWT Token
                    </label>
                    <textarea
                        id="jwt-input"
                        class="w-full min-h-[120px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                        placeholder="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."
                        spellcheck="false"
                    ></textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-paste" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        Paste
                    </button>
                    <button id="btn-sample" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Load Sample
                    </button>
                    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                </div>

                {{-- Error Display --}}
                <div id="error-display" class="hidden mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <h4 class="text-red-400 font-semibold mb-1">Invalid JWT</h4>
                            <p id="error-message" class="text-red-300 text-sm"></p>
                        </div>
                    </div>
                </div>

                {{-- Decoded Output --}}
                <div id="decoded-output" class="hidden space-y-4">
                    {{-- Header Section --}}
                    <div class="bg-darkBg rounded-lg border border-gold/20 overflow-hidden">
                        <div class="flex items-center justify-between p-4 border-b border-gold/10">
                            <div class="flex items-center gap-3">
                                <h3 class="text-light font-semibold">Header</h3>
                                <span id="algorithm-badge" class="text-xs px-2 py-1 bg-purple-500/20 text-purple-400 rounded border border-purple-500/30 font-mono"></span>
                            </div>
                            <button id="btn-copy-header" class="px-3 py-1.5 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                Copy
                            </button>
                        </div>
                        <div class="p-4">
                            <pre id="header-output" class="font-mono text-sm whitespace-pre-wrap break-words"></pre>
                        </div>
                    </div>

                    {{-- Payload Section --}}
                    <div class="bg-darkBg rounded-lg border border-gold/20 overflow-hidden">
                        <div class="flex items-center justify-between p-4 border-b border-gold/10">
                            <div class="flex items-center gap-3">
                                <h3 class="text-light font-semibold">Payload</h3>
                                <span id="expiration-badge" class="hidden text-xs px-2 py-1 rounded border font-medium"></span>
                            </div>
                            <button id="btn-copy-payload" class="px-3 py-1.5 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                Copy
                            </button>
                        </div>
                        <div class="p-4">
                            <pre id="payload-output" class="font-mono text-sm whitespace-pre-wrap break-words"></pre>
                        </div>
                    </div>

                    {{-- Signature Section --}}
                    <div class="bg-darkBg rounded-lg border border-gold/20 overflow-hidden">
                        <div class="flex items-center justify-between p-4 border-b border-gold/10">
                            <h3 class="text-light font-semibold">Signature</h3>
                        </div>
                        <div class="p-4">
                            <p id="signature-output" class="font-mono text-sm text-light-muted break-all"></p>
                            <p class="text-xs text-light-muted/70 mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Signature verification requires the secret key. This tool only decodes tokens.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Placeholder --}}
                <div id="placeholder" class="text-center py-12 text-light-muted">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gold/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                    <p>Paste a JWT token above to decode it</p>
                </div>

                {{-- Copy Notification --}}
                <div id="copy-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="copy-message" class="text-green-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Common Claims Reference --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <h3 class="text-lg font-semibold text-light mb-4">Common JWT Claims</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gold/20">
                                <th class="text-left py-2 px-3 text-gold font-semibold">Claim</th>
                                <th class="text-left py-2 px-3 text-gold font-semibold">Name</th>
                                <th class="text-left py-2 px-3 text-gold font-semibold">Description</th>
                            </tr>
                        </thead>
                        <tbody class="text-light-muted">
                            <tr class="border-b border-gold/10">
                                <td class="py-2 px-3 font-mono text-purple-400">iss</td>
                                <td class="py-2 px-3 text-light">Issuer</td>
                                <td class="py-2 px-3">Who issued the token</td>
                            </tr>
                            <tr class="border-b border-gold/10">
                                <td class="py-2 px-3 font-mono text-purple-400">sub</td>
                                <td class="py-2 px-3 text-light">Subject</td>
                                <td class="py-2 px-3">Who the token is about (usually user ID)</td>
                            </tr>
                            <tr class="border-b border-gold/10">
                                <td class="py-2 px-3 font-mono text-purple-400">aud</td>
                                <td class="py-2 px-3 text-light">Audience</td>
                                <td class="py-2 px-3">Who the token is intended for</td>
                            </tr>
                            <tr class="border-b border-gold/10">
                                <td class="py-2 px-3 font-mono text-purple-400">exp</td>
                                <td class="py-2 px-3 text-light">Expiration</td>
                                <td class="py-2 px-3">When the token expires (Unix timestamp)</td>
                            </tr>
                            <tr class="border-b border-gold/10">
                                <td class="py-2 px-3 font-mono text-purple-400">iat</td>
                                <td class="py-2 px-3 text-light">Issued At</td>
                                <td class="py-2 px-3">When the token was issued (Unix timestamp)</td>
                            </tr>
                            <tr class="border-b border-gold/10">
                                <td class="py-2 px-3 font-mono text-purple-400">nbf</td>
                                <td class="py-2 px-3 text-light">Not Before</td>
                                <td class="py-2 px-3">Token not valid before this time</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 font-mono text-purple-400">jti</td>
                                <td class="py-2 px-3 text-light">JWT ID</td>
                                <td class="py-2 px-3">Unique identifier for the token</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">100%</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Client-Side</h3>
                    <p class="text-light-muted text-sm">All decoding happens in your browser. Your tokens never touch our servers.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">Free</div>
                    <h3 class="text-lg font-semibold text-light mb-2">No Signup</h3>
                    <p class="text-light-muted text-sm">Use unlimited times without creating an account. No ads, no tracking.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">Fast</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant Decode</h3>
                    <p class="text-light-muted text-sm">Decode JWTs as you type with real-time parsing and timestamp conversion.</p>
                </div>
            </div>

            {{-- FAQ Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Frequently Asked Questions</h2>

                <div class="space-y-4 max-w-3xl mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is a JWT (JSON Web Token)?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A JSON Web Token (JWT) is a compact, URL-safe token format used for securely transmitting information between parties. JWTs are commonly used for authentication and authorization in web applications. They consist of three parts: a header (algorithm and token type), a payload (claims/data), and a signature (for verification). JWTs are self-contained, meaning all the information needed to verify the token is within the token itself.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can this tool verify JWT signatures?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            No, this tool only decodes and displays the contents of a JWT. Signature verification requires the secret key (for HMAC algorithms) or public key (for RSA/ECDSA algorithms) used to sign the token. These keys should never be shared publicly or entered into online tools. This decoder is designed for inspecting token contents during development and debugging - always verify signatures on your server using proper cryptographic libraries.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What are the three parts of a JWT?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A JWT consists of three parts separated by dots (xxxxx.yyyyy.zzzzz): <strong class="text-light">1) Header</strong> - contains metadata about the token, including the token type (JWT) and the signing algorithm (e.g., HS256, RS256). <strong class="text-light">2) Payload</strong> - contains claims, which are statements about the user and additional metadata like expiration time. <strong class="text-light">3) Signature</strong> - created by encoding the header and payload, then signing with a secret key to ensure the token hasn't been tampered with.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What do common claims like exp, iat, sub mean?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            JWT claims are key-value pairs in the payload. Common registered claims include: <strong class="text-light">exp</strong> (Expiration Time) - Unix timestamp when the token expires; <strong class="text-light">iat</strong> (Issued At) - Unix timestamp when the token was created; <strong class="text-light">sub</strong> (Subject) - identifier for who the token is about, usually a user ID; <strong class="text-light">iss</strong> (Issuer) - who created and signed the token; <strong class="text-light">aud</strong> (Audience) - intended recipient of the token; <strong class="text-light">nbf</strong> (Not Before) - token not valid before this time; <strong class="text-light">jti</strong> (JWT ID) - unique identifier for the token.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is this tool free and secure?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, this JWT decoder is completely free with no signup required. All decoding happens entirely in your browser using JavaScript - your tokens are never sent to any server. This makes it safe to decode tokens containing sensitive information during development. However, you should still avoid sharing production tokens publicly, as they may contain sensitive user information and could be replayed if not expired.
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
        const jwtInput = document.getElementById('jwt-input');
        const btnPaste = document.getElementById('btn-paste');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const btnCopyHeader = document.getElementById('btn-copy-header');
        const btnCopyPayload = document.getElementById('btn-copy-payload');
        const errorDisplay = document.getElementById('error-display');
        const errorMessage = document.getElementById('error-message');
        const decodedOutput = document.getElementById('decoded-output');
        const placeholder = document.getElementById('placeholder');
        const headerOutput = document.getElementById('header-output');
        const payloadOutput = document.getElementById('payload-output');
        const signatureOutput = document.getElementById('signature-output');
        const algorithmBadge = document.getElementById('algorithm-badge');
        const expirationBadge = document.getElementById('expiration-badge');
        const copyNotification = document.getElementById('copy-notification');
        const copyMessage = document.getElementById('copy-message');

        // Sample JWT (expires in 2030)
        const sampleJwt = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiZW1haWwiOiJqb2huQGV4YW1wbGUuY29tIiwicm9sZSI6ImFkbWluIiwiaWF0IjoxNzA1MzEyMDAwLCJleHAiOjE4OTM0NTYwMDAsImlzcyI6Imh0dHBzOi8vaGFmaXouZGV2IiwiYXVkIjoiaHR0cHM6Ly9hcGkuaGFmaXouZGV2In0.dBjftJeZ4CVP-mB92K27uhbUJU1p1r_wW1gFWFOEjXk';

        // State
        let decodedHeader = null;
        let decodedPayload = null;

        // Base64URL decode
        function base64UrlDecode(str) {
            // Replace URL-safe characters
            let base64 = str.replace(/-/g, '+').replace(/_/g, '/');
            // Pad with '=' if necessary
            const padding = base64.length % 4;
            if (padding) {
                base64 += '='.repeat(4 - padding);
            }
            try {
                return decodeURIComponent(atob(base64).split('').map(function(c) {
                    return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
                }).join(''));
            } catch (e) {
                return atob(base64);
            }
        }

        // Decode JWT
        function decodeJWT(token) {
            const parts = token.trim().split('.');

            if (parts.length !== 3) {
                throw new Error('Invalid JWT format. Token must have 3 parts separated by dots.');
            }

            try {
                const header = JSON.parse(base64UrlDecode(parts[0]));
                const payload = JSON.parse(base64UrlDecode(parts[1]));
                const signature = parts[2];

                return { header, payload, signature };
            } catch (e) {
                throw new Error('Failed to decode JWT. Invalid base64 or JSON content.');
            }
        }

        // Format timestamp to human readable
        function formatTimestamp(timestamp) {
            const date = new Date(timestamp * 1000);
            const options = {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                timeZoneName: 'short'
            };
            return date.toLocaleString(undefined, options);
        }

        // Get relative time
        function getRelativeTime(timestamp) {
            const now = new Date();
            const date = new Date(timestamp * 1000);
            const diff = date - now;

            if (diff < 0) {
                const absDiff = Math.abs(diff);
                const days = Math.floor(absDiff / (1000 * 60 * 60 * 24));
                const hours = Math.floor(absDiff / (1000 * 60 * 60));
                const minutes = Math.floor(absDiff / (1000 * 60));

                if (days > 0) return `expired ${days} day${days > 1 ? 's' : ''} ago`;
                if (hours > 0) return `expired ${hours} hour${hours > 1 ? 's' : ''} ago`;
                return `expired ${minutes} minute${minutes > 1 ? 's' : ''} ago`;
            } else {
                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor(diff / (1000 * 60 * 60));
                const minutes = Math.floor(diff / (1000 * 60));

                if (days > 0) return `expires in ${days} day${days > 1 ? 's' : ''}`;
                if (hours > 0) return `expires in ${hours} hour${hours > 1 ? 's' : ''}`;
                return `expires in ${minutes} minute${minutes > 1 ? 's' : ''}`;
            }
        }

        // Check expiration
        function checkExpiration(payload) {
            if (!payload.exp) return null;

            const expDate = new Date(payload.exp * 1000);
            const now = new Date();

            return {
                isExpired: expDate < now,
                expDate: expDate,
                timeRemaining: expDate - now
            };
        }

        // Syntax highlighting for JSON
        function syntaxHighlight(json) {
            if (typeof json !== 'string') {
                json = JSON.stringify(json, null, 2);
            }

            // Escape HTML
            json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');

            // Apply syntax highlighting
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

        // Format payload with timestamp annotations
        function formatPayloadWithTimestamps(payload) {
            const timestampClaims = ['exp', 'iat', 'nbf', 'auth_time'];
            const formatted = {};

            for (const [key, value] of Object.entries(payload)) {
                if (timestampClaims.includes(key) && typeof value === 'number') {
                    formatted[key] = value;
                    formatted[`_${key}_readable`] = formatTimestamp(value) + ' (' + getRelativeTime(value) + ')';
                } else {
                    formatted[key] = value;
                }
            }

            return formatted;
        }

        // Show error
        function showError(message) {
            errorDisplay.classList.remove('hidden');
            errorMessage.textContent = message;
            decodedOutput.classList.add('hidden');
            placeholder.classList.add('hidden');
        }

        // Hide error
        function hideError() {
            errorDisplay.classList.add('hidden');
        }

        // Show notification
        function showNotification(message) {
            copyMessage.textContent = message;
            copyNotification.classList.remove('hidden');
            setTimeout(() => {
                copyNotification.classList.add('hidden');
            }, 2000);
        }

        // Copy to clipboard
        function copyToClipboard(text, message) {
            navigator.clipboard.writeText(text).then(() => {
                showNotification(message);
            }).catch(() => {
                showNotification('Failed to copy');
            });
        }

        // Process JWT input
        function processJwt() {
            const token = jwtInput.value.trim();

            if (!token) {
                hideError();
                decodedOutput.classList.add('hidden');
                placeholder.classList.remove('hidden');
                decodedHeader = null;
                decodedPayload = null;
                return;
            }

            try {
                const decoded = decodeJWT(token);
                decodedHeader = decoded.header;
                decodedPayload = decoded.payload;

                // Hide error and placeholder
                hideError();
                placeholder.classList.add('hidden');
                decodedOutput.classList.remove('hidden');

                // Display algorithm badge
                algorithmBadge.textContent = decoded.header.alg || 'Unknown';

                // Display header
                headerOutput.innerHTML = syntaxHighlight(JSON.stringify(decoded.header, null, 2));

                // Display payload with timestamps
                const formattedPayload = formatPayloadWithTimestamps(decoded.payload);
                payloadOutput.innerHTML = syntaxHighlight(JSON.stringify(formattedPayload, null, 2));

                // Display signature
                signatureOutput.textContent = decoded.signature;

                // Check and display expiration
                const expStatus = checkExpiration(decoded.payload);
                if (expStatus) {
                    expirationBadge.classList.remove('hidden');
                    if (expStatus.isExpired) {
                        expirationBadge.textContent = 'Expired';
                        expirationBadge.className = 'text-xs px-2 py-1 rounded border font-medium bg-red-500/20 text-red-400 border-red-500/30';
                    } else {
                        expirationBadge.textContent = getRelativeTime(decoded.payload.exp);
                        expirationBadge.className = 'text-xs px-2 py-1 rounded border font-medium bg-green-500/20 text-green-400 border-green-500/30';
                    }
                } else {
                    expirationBadge.classList.add('hidden');
                }

            } catch (e) {
                showError(e.message);
                decodedHeader = null;
                decodedPayload = null;
            }
        }

        // Event Listeners
        let debounceTimer;
        jwtInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(processJwt, 150);
        });

        btnPaste.addEventListener('click', async function() {
            try {
                const text = await navigator.clipboard.readText();
                jwtInput.value = text;
                processJwt();
            } catch (e) {
                showError('Unable to access clipboard. Please paste manually.');
            }
        });

        btnSample.addEventListener('click', function() {
            jwtInput.value = sampleJwt;
            processJwt();
        });

        btnClear.addEventListener('click', function() {
            jwtInput.value = '';
            hideError();
            decodedOutput.classList.add('hidden');
            placeholder.classList.remove('hidden');
            decodedHeader = null;
            decodedPayload = null;
        });

        btnCopyHeader.addEventListener('click', function() {
            if (decodedHeader) {
                copyToClipboard(JSON.stringify(decodedHeader, null, 2), 'Header copied to clipboard!');
            }
        });

        btnCopyPayload.addEventListener('click', function() {
            if (decodedPayload) {
                copyToClipboard(JSON.stringify(decodedPayload, null, 2), 'Payload copied to clipboard!');
            }
        });

        // Keyboard shortcut: Ctrl+V to paste and decode
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'v' && document.activeElement !== jwtInput) {
                e.preventDefault();
                btnPaste.click();
            }
        });
    })();
    </script>
    @endpush
</x-layout>
