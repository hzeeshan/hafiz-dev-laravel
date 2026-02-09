<x-layout>
    <x-slot:title>Password Generator - Generate Secure Random Passwords Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online password generator. Create strong, secure random passwords with customizable length and characters. 100% client-side, no passwords stored.</x-slot:description>
    <x-slot:keywords>password generator, random password, secure password generator, strong password, password creator, generate password online</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/password-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Password Generator - Generate Secure Random Passwords Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online password generator. Create strong, secure random passwords with customizable length and characters.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/password-generator') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Password Generator",
            "description": "Free online password generator. Create strong, secure random passwords with customizable length and characters. 100% client-side, no passwords stored.",
            "url": "https://hafiz.dev/tools/password-generator",
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
                    "name": "Password Generator",
                    "item": "https://hafiz.dev/tools/password-generator"
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
                    "name": "How does this password generator work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "This password generator uses the Web Crypto API (crypto.getRandomValues) to generate cryptographically secure random numbers. These random values are then mapped to your selected character set (uppercase, lowercase, numbers, symbols) to create a truly random password. All processing happens entirely in your browser - no data is ever sent to any server."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Are the generated passwords secure?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, the passwords are cryptographically secure. We use the Web Crypto API which provides access to a cryptographically strong random number generator. This is the same technology used by password managers and security applications. The randomness is suitable for all security-sensitive applications."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my password stored or sent anywhere?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "No, absolutely not. This tool runs 100% in your browser using JavaScript. Your generated passwords never leave your computer and are never transmitted over the internet. There are no server requests, no logging, and no tracking. Once you close the page, the passwords exist only if you've copied them."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What makes a strong password?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A strong password typically has: 1) At least 12-16 characters in length, 2) A mix of uppercase and lowercase letters, 3) Numbers and special symbols, 4) No personal information or common words, 5) Unique for each account. Our generator helps you create passwords meeting all these criteria."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How long should my password be?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "For most purposes, 16 characters is a good minimum. For high-security accounts (banking, primary email), consider 20-24 characters. For master passwords (password managers), 24+ characters is recommended. Longer passwords are exponentially harder to crack - each additional character multiplies the difficulty significantly."
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
                    <li class="text-gold">Password Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Password Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Generate secure, random passwords. 100% client-side - your passwords never leave your browser.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Generated Password Display --}}
                <div class="mb-6">
                    <label class="text-light font-semibold mb-3 block">Generated Password</label>
                    <div class="relative">
                        <div class="bg-darkBg border border-gold/20 rounded-lg p-4 pr-24 min-h-[60px] flex items-center">
                            <code id="password-display" class="text-light font-mono text-lg md:text-xl break-all select-all cursor-pointer" title="Click to copy">
                                Click Generate to create a password
                            </code>
                        </div>
                        <div class="absolute right-2 top-1/2 -translate-y-1/2 flex items-center gap-1">
                            <button id="btn-toggle-visibility" class="p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" title="Toggle visibility">
                                <svg id="icon-show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                <svg id="icon-hide" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                            </button>
                            <button id="btn-copy-password" class="p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" title="Copy password">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Strength Meter --}}
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-light-muted text-sm">Password Strength</span>
                        <span id="strength-label" class="text-sm font-semibold text-light-muted">-</span>
                    </div>
                    <div class="h-2 bg-darkBg rounded-full overflow-hidden border border-gold/10">
                        <div id="strength-bar" class="h-full bg-gray-500 transition-all duration-300" style="width: 0%"></div>
                    </div>
                </div>

                {{-- Length Slider --}}
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-3">
                        <label for="password-length" class="text-light font-semibold">Password Length</label>
                        <span id="length-display" class="text-gold font-mono text-lg font-bold">16</span>
                    </div>
                    <input type="range" id="password-length" min="8" max="128" value="16"
                           class="w-full h-2 bg-darkBg rounded-lg appearance-none cursor-pointer accent-gold">
                    <div class="flex justify-between text-xs text-light-muted mt-1">
                        <span>8</span>
                        <span>128</span>
                    </div>
                </div>

                {{-- Character Options --}}
                <div class="mb-6">
                    <label class="text-light font-semibold mb-3 block">Character Types</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <label class="flex items-center gap-2 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <input type="checkbox" id="opt-uppercase" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                            <span class="text-light text-sm">Uppercase (A-Z)</span>
                        </label>
                        <label class="flex items-center gap-2 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <input type="checkbox" id="opt-lowercase" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                            <span class="text-light text-sm">Lowercase (a-z)</span>
                        </label>
                        <label class="flex items-center gap-2 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <input type="checkbox" id="opt-numbers" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                            <span class="text-light text-sm">Numbers (0-9)</span>
                        </label>
                        <label class="flex items-center gap-2 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <input type="checkbox" id="opt-symbols" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                            <span class="text-light text-sm">Symbols (!@#$%)</span>
                        </label>
                    </div>
                </div>

                {{-- Exclude Similar Characters --}}
                <div class="mb-6">
                    <label class="flex items-center gap-3 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer w-fit">
                        <input type="checkbox" id="opt-exclude-similar" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                        <div>
                            <span class="text-light text-sm">Exclude similar characters</span>
                            <span class="text-light-muted text-xs block">Removes: 0, O, l, 1, I (easier to read/type)</span>
                        </div>
                    </label>
                </div>

                {{-- Generate Button --}}
                <div class="mb-6">
                    <button id="btn-generate" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        Generate Password
                    </button>
                </div>

                {{-- Bulk Generation Section --}}
                <div class="border-t border-gold/10 pt-6">
                    <div class="flex flex-wrap items-center gap-4 mb-4">
                        <label class="text-light font-semibold">Bulk Generation</label>
                        <div class="flex items-center gap-2">
                            <select id="bulk-quantity" class="bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-2 text-sm focus:border-gold focus:outline-none cursor-pointer">
                                <option value="5">5 passwords</option>
                                <option value="10">10 passwords</option>
                                <option value="25">25 passwords</option>
                            </select>
                            <button id="btn-bulk-generate" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 cursor-pointer text-sm font-semibold">
                                Generate Bulk
                            </button>
                        </div>
                    </div>

                    {{-- Bulk Output --}}
                    <div id="bulk-container" class="hidden">
                        <div class="bg-darkBg border border-gold/20 rounded-lg p-4 max-h-[300px] overflow-y-auto mb-4">
                            <div id="bulk-list" class="space-y-1 font-mono text-sm"></div>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <button id="btn-copy-all" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                Copy All
                            </button>
                            <button id="btn-download" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download as TXT
                            </button>
                            <button id="btn-clear-bulk" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Clear
                            </button>
                        </div>
                    </div>
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

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔐</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Cryptographically Secure</h3>
                    <p class="text-light-muted text-sm">Uses the Web Crypto API for true randomness. Same technology used by password managers.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">100%</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Client-Side</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Your passwords never touch our servers.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">Free</div>
                    <h3 class="text-lg font-semibold text-light mb-2">No Limits</h3>
                    <p class="text-light-muted text-sm">Generate unlimited passwords. No signup, no ads, no tracking.</p>
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
                            <span class="text-light font-medium">How does this password generator work?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            This password generator uses the Web Crypto API (crypto.getRandomValues) to generate cryptographically secure random numbers. These random values are then mapped to your selected character set (uppercase, lowercase, numbers, symbols) to create a truly random password. All processing happens entirely in your browser - no data is ever sent to any server.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Are the generated passwords secure?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, the passwords are cryptographically secure. We use the Web Crypto API which provides access to a cryptographically strong random number generator. This is the same technology used by password managers and security applications. The randomness is suitable for all security-sensitive applications.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my password stored or sent anywhere?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            No, absolutely not. This tool runs 100% in your browser using JavaScript. Your generated passwords never leave your computer and are never transmitted over the internet. There are no server requests, no logging, and no tracking. Once you close the page, the passwords exist only if you've copied them.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What makes a strong password?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A strong password typically has: 1) At least 12-16 characters in length, 2) A mix of uppercase and lowercase letters, 3) Numbers and special symbols, 4) No personal information or common words, 5) Unique for each account. Our generator helps you create passwords meeting all these criteria.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How long should my password be?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            For most purposes, 16 characters is a good minimum. For high-security accounts (banking, primary email), consider 20-24 characters. For master passwords (password managers), 24+ characters is recommended. Longer passwords are exponentially harder to crack - each additional character multiplies the difficulty significantly.
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
        const passwordDisplay = document.getElementById('password-display');
        const strengthBar = document.getElementById('strength-bar');
        const strengthLabel = document.getElementById('strength-label');
        const lengthSlider = document.getElementById('password-length');
        const lengthDisplay = document.getElementById('length-display');
        const btnGenerate = document.getElementById('btn-generate');
        const btnCopyPassword = document.getElementById('btn-copy-password');
        const btnToggleVisibility = document.getElementById('btn-toggle-visibility');
        const iconShow = document.getElementById('icon-show');
        const iconHide = document.getElementById('icon-hide');
        const optUppercase = document.getElementById('opt-uppercase');
        const optLowercase = document.getElementById('opt-lowercase');
        const optNumbers = document.getElementById('opt-numbers');
        const optSymbols = document.getElementById('opt-symbols');
        const optExcludeSimilar = document.getElementById('opt-exclude-similar');
        const bulkQuantity = document.getElementById('bulk-quantity');
        const btnBulkGenerate = document.getElementById('btn-bulk-generate');
        const bulkContainer = document.getElementById('bulk-container');
        const bulkList = document.getElementById('bulk-list');
        const btnCopyAll = document.getElementById('btn-copy-all');
        const btnDownload = document.getElementById('btn-download');
        const btnClearBulk = document.getElementById('btn-clear-bulk');
        const copyNotification = document.getElementById('copy-notification');
        const copyMessage = document.getElementById('copy-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        // State
        let currentPassword = '';
        let bulkPasswords = [];
        let isPasswordVisible = true;

        // Character sets
        const CHARS = {
            uppercase: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            lowercase: 'abcdefghijklmnopqrstuvwxyz',
            numbers: '0123456789',
            symbols: '!@#$%^&*()_+-=[]{}|;:,.<>?'
        };

        const SIMILAR_CHARS = /[0O1lI]/g;

        // Generate password
        function generatePassword(length) {
            let charset = '';

            if (optUppercase.checked) charset += CHARS.uppercase;
            if (optLowercase.checked) charset += CHARS.lowercase;
            if (optNumbers.checked) charset += CHARS.numbers;
            if (optSymbols.checked) charset += CHARS.symbols;

            if (optExcludeSimilar.checked) {
                charset = charset.replace(SIMILAR_CHARS, '');
            }

            if (charset === '') {
                showError('Please select at least one character type');
                return null;
            }

            let password = '';
            const array = new Uint32Array(length);
            crypto.getRandomValues(array);

            for (let i = 0; i < length; i++) {
                password += charset[array[i] % charset.length];
            }

            return password;
        }

        // Calculate password strength
        function calculateStrength(password) {
            if (!password) return { level: '-', color: 'gray', percent: 0 };

            let score = 0;

            // Length score
            if (password.length >= 8) score += 1;
            if (password.length >= 12) score += 1;
            if (password.length >= 16) score += 1;
            if (password.length >= 24) score += 1;

            // Character variety
            if (/[a-z]/.test(password)) score += 1;
            if (/[A-Z]/.test(password)) score += 1;
            if (/[0-9]/.test(password)) score += 1;
            if (/[^a-zA-Z0-9]/.test(password)) score += 1;

            // Return strength level
            if (score <= 2) return { level: 'Very Weak', color: 'red', percent: 20 };
            if (score <= 4) return { level: 'Weak', color: 'orange', percent: 40 };
            if (score <= 5) return { level: 'Fair', color: 'yellow', percent: 60 };
            if (score <= 7) return { level: 'Strong', color: 'green', percent: 80 };
            return { level: 'Very Strong', color: 'emerald', percent: 100 };
        }

        // Update strength meter
        function updateStrengthMeter(password) {
            const strength = calculateStrength(password);

            strengthLabel.textContent = strength.level;
            strengthBar.style.width = strength.percent + '%';

            // Remove all color classes
            strengthBar.classList.remove('bg-gray-500', 'bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-green-500', 'bg-emerald-500');
            strengthLabel.classList.remove('text-gray-400', 'text-red-400', 'text-orange-400', 'text-yellow-400', 'text-green-400', 'text-emerald-400');

            // Add appropriate color class
            const colorMap = {
                'gray': ['bg-gray-500', 'text-gray-400'],
                'red': ['bg-red-500', 'text-red-400'],
                'orange': ['bg-orange-500', 'text-orange-400'],
                'yellow': ['bg-yellow-500', 'text-yellow-400'],
                'green': ['bg-green-500', 'text-green-400'],
                'emerald': ['bg-emerald-500', 'text-emerald-400']
            };

            const [barColor, labelColor] = colorMap[strength.color];
            strengthBar.classList.add(barColor);
            strengthLabel.classList.add(labelColor);
        }

        // Update password display
        function updatePasswordDisplay() {
            if (!currentPassword) {
                passwordDisplay.textContent = 'Click Generate to create a password';
                return;
            }

            if (isPasswordVisible) {
                passwordDisplay.textContent = currentPassword;
            } else {
                passwordDisplay.textContent = '•'.repeat(currentPassword.length);
            }
        }

        // Generate and display new password
        function generateAndDisplay() {
            const length = parseInt(lengthSlider.value, 10);
            const password = generatePassword(length);

            if (password) {
                currentPassword = password;
                updatePasswordDisplay();
                updateStrengthMeter(password);
                hideError();
            }
        }

        // Generate bulk passwords
        function generateBulk() {
            const quantity = parseInt(bulkQuantity.value, 10);
            const length = parseInt(lengthSlider.value, 10);

            bulkPasswords = [];

            for (let i = 0; i < quantity; i++) {
                const password = generatePassword(length);
                if (password) {
                    bulkPasswords.push(password);
                } else {
                    return; // Error already shown
                }
            }

            renderBulkList();
            bulkContainer.classList.remove('hidden');
        }

        // Render bulk password list
        function renderBulkList() {
            bulkList.innerHTML = bulkPasswords.map((password, index) => `
                <div class="flex items-center justify-between p-2 bg-darkBg/50 rounded border border-gold/10 hover:border-gold/30 transition-colors group">
                    <code class="text-light text-sm break-all">${password}</code>
                    <button class="copy-single-btn ml-2 p-1.5 text-light-muted hover:text-gold transition-colors opacity-0 group-hover:opacity-100 cursor-pointer" data-password="${password}" title="Copy">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </button>
                </div>
            `).join('');

            // Add click handlers for individual copy buttons
            document.querySelectorAll('.copy-single-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const password = this.getAttribute('data-password');
                    copyToClipboard(password, 'Password copied!');
                });
            });
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

        // Hide error notification
        function hideError() {
            errorNotification.classList.add('hidden');
        }

        // Download bulk passwords as TXT
        function downloadTxt() {
            if (bulkPasswords.length === 0) {
                showError('No passwords to download. Generate some first.');
                return;
            }

            const content = bulkPasswords.join('\n');
            const blob = new Blob([content], { type: 'text/plain' });
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
            a.download = `passwords-${timestamp}.txt`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);

            showNotification('Passwords downloaded!');
        }

        // Event Listeners
        btnGenerate.addEventListener('click', generateAndDisplay);

        btnCopyPassword.addEventListener('click', function() {
            if (currentPassword) {
                copyToClipboard(currentPassword, 'Password copied!');
            } else {
                showError('Generate a password first');
            }
        });

        passwordDisplay.addEventListener('click', function() {
            if (currentPassword) {
                copyToClipboard(currentPassword, 'Password copied!');
            }
        });

        btnToggleVisibility.addEventListener('click', function() {
            isPasswordVisible = !isPasswordVisible;
            iconShow.classList.toggle('hidden', !isPasswordVisible);
            iconHide.classList.toggle('hidden', isPasswordVisible);
            updatePasswordDisplay();
        });

        lengthSlider.addEventListener('input', function() {
            lengthDisplay.textContent = this.value;
            if (currentPassword) {
                generateAndDisplay();
            }
        });

        // Auto-generate on option change
        [optUppercase, optLowercase, optNumbers, optSymbols, optExcludeSimilar].forEach(opt => {
            opt.addEventListener('change', function() {
                if (currentPassword) {
                    generateAndDisplay();
                }
            });
        });

        btnBulkGenerate.addEventListener('click', generateBulk);

        btnCopyAll.addEventListener('click', function() {
            if (bulkPasswords.length === 0) {
                showError('No passwords to copy. Generate some first.');
                return;
            }
            copyToClipboard(bulkPasswords.join('\n'), `Copied ${bulkPasswords.length} passwords!`);
        });

        btnDownload.addEventListener('click', downloadTxt);

        btnClearBulk.addEventListener('click', function() {
            bulkPasswords = [];
            bulkList.innerHTML = '';
            bulkContainer.classList.add('hidden');
        });

        // Keyboard shortcut: Enter to generate
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.ctrlKey && !e.metaKey && !e.shiftKey) {
                if (document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA' && document.activeElement.tagName !== 'SELECT') {
                    e.preventDefault();
                    generateAndDisplay();
                }
            }
        });

        // Initialize - generate a password on page load
        generateAndDisplay();
    })();
    </script>
    @endpush
</x-layout>
