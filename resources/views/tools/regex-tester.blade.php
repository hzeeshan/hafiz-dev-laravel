<x-layout>
    <x-slot:title>Regex Tester Online - Test Regular Expressions Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online regex tester and debugger. Test regular expressions in real-time with match highlighting. JavaScript/PCRE compatible. No signup required.</x-slot:description>
    <x-slot:keywords>regex tester, regular expression tester, regex debugger, regex online, test regex, regex validator, regex matcher, pattern matching, regex101 alternative</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/regex-tester') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Regex Tester Online - Test Regular Expressions Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online regex tester. Test and debug regular expressions in real-time with match highlighting.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/regex-tester') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Regex Tester",
            "description": "Free online regex tester and debugger. Test regular expressions in real-time with match highlighting.",
            "url": "https://hafiz.dev/tools/regex-tester",
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
                    "name": "Regex Tester",
                    "item": "https://hafiz.dev/tools/regex-tester"
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
                    "name": "What is a regular expression (regex)?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A regular expression (regex) is a sequence of characters that defines a search pattern. It's used for pattern matching within strings, enabling powerful text search, validation, and manipulation. Regex is supported in virtually all programming languages including JavaScript, Python, PHP, Java, and more."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What regex flavor does this tool use?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "This tool uses JavaScript's built-in RegExp engine, which follows the ECMAScript specification. It's compatible with most PCRE (Perl Compatible Regular Expressions) patterns and works identically to regex in browsers and Node.js environments."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What do the flags (g, i, m, s) mean?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "g (global) finds all matches instead of stopping at the first match. i (case-insensitive) makes the pattern match regardless of letter case. m (multiline) makes ^ and $ match the start/end of each line, not just the string. s (dotall) makes the dot (.) match newline characters as well."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Why isn't my regex matching?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Common issues include: forgetting to escape special characters (like . or *), not enabling the correct flags (e.g., 'i' for case-insensitive), using lookahead/lookbehind syntax not supported in JavaScript, or having whitespace issues in your pattern. Check that your pattern syntax is valid - the tool will show an error message for invalid regex."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is this tool free and secure?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, this regex tester is completely free with no signup required. All pattern matching happens entirely in your browser using JavaScript - no data is sent to any server. This makes it completely safe and private for testing patterns against sensitive data."
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
                    <li class="text-gold">Regex Tester</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Regex Tester</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Test and debug regular expressions in real-time. 100% client-side processing - your data never leaves your browser.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Regex Input Row --}}
                <div class="mb-6">
                    <label for="regex-input" class="text-light font-semibold mb-3 block">Regular Expression</label>
                    <div class="flex flex-wrap gap-4 items-start">
                        {{-- Regex Input with delimiters --}}
                        <div class="flex-1 min-w-[300px]">
                            <div class="flex items-center bg-darkBg border border-gold/20 rounded-lg focus-within:border-gold focus-within:ring-1 focus-within:ring-gold/30">
                                <span class="text-gold font-mono text-lg pl-4 select-none">/</span>
                                <input
                                    type="text"
                                    id="regex-input"
                                    class="flex-1 bg-transparent border-none py-3 px-2 font-mono text-light placeholder-light-muted/50 focus:outline-none text-sm"
                                    placeholder="Enter your regex pattern..."
                                    spellcheck="false"
                                    autocomplete="off"
                                >
                                <span class="text-gold font-mono text-lg pr-2 select-none">/</span>
                                <span id="flags-display" class="text-gold font-mono pr-4 select-none">g</span>
                            </div>
                        </div>

                        {{-- Flags --}}
                        <div class="flex items-center gap-4 py-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="flag-g" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                                <span class="text-light-muted text-sm font-mono">g</span>
                                <span class="text-light-muted/60 text-xs">(global)</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="flag-i" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                                <span class="text-light-muted text-sm font-mono">i</span>
                                <span class="text-light-muted/60 text-xs">(case insensitive)</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="flag-m" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                                <span class="text-light-muted text-sm font-mono">m</span>
                                <span class="text-light-muted/60 text-xs">(multiline)</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="flag-s" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                                <span class="text-light-muted text-sm font-mono">s</span>
                                <span class="text-light-muted/60 text-xs">(dotall)</span>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Examples Dropdown --}}
                <div class="mb-6">
                    <label for="examples-select" class="text-light font-semibold mb-2 block">Load Example</label>
                    <select id="examples-select" class="bg-darkBg border border-gold/30 text-light rounded-lg px-4 py-2 text-sm focus:border-gold focus:outline-none cursor-pointer max-w-md">
                        <option value="">Select a common pattern...</option>
                        <option value="email">Email Address</option>
                        <option value="url">URL</option>
                        <option value="phone">Phone Number</option>
                        <option value="ipv4">IPv4 Address</option>
                        <option value="date">Date (YYYY-MM-DD)</option>
                        <option value="html">HTML Tag</option>
                        <option value="hex">Hex Color</option>
                    </select>
                </div>

                {{-- Test String Input --}}
                <div class="mb-6">
                    <label for="test-string" class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Test String
                    </label>
                    <textarea
                        id="test-string"
                        class="w-full min-h-[200px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-y"
                        placeholder="Enter the text to test against your regex..."
                        spellcheck="false"
                    ></textarea>
                </div>

                {{-- Results Section --}}
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-3">
                        <label class="text-light font-semibold flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            Results
                        </label>
                        <span id="match-count" class="text-gold font-semibold">0 matches</span>
                    </div>

                    {{-- Highlighted Preview --}}
                    <div class="bg-darkBg border border-gold/20 rounded-lg p-4 mb-4 min-h-[100px] max-h-[300px] overflow-auto">
                        <div id="highlighted-preview" class="font-mono text-sm text-light whitespace-pre-wrap break-words">
                            <span class="text-light-muted">Matches will be highlighted here...</span>
                        </div>
                    </div>

                    {{-- Match Details --}}
                    <div id="match-details" class="hidden">
                        <label class="text-light font-semibold mb-2 block">Match Details</label>
                        <div class="bg-darkBg border border-gold/20 rounded-lg overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm">
                                    <thead>
                                        <tr class="border-b border-gold/20">
                                            <th class="text-left p-3 text-light-muted font-medium">#</th>
                                            <th class="text-left p-3 text-light-muted font-medium">Match</th>
                                            <th class="text-left p-3 text-light-muted font-medium">Position</th>
                                            <th class="text-left p-3 text-light-muted font-medium">Groups</th>
                                        </tr>
                                    </thead>
                                    <tbody id="match-table-body">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Error Display --}}
                <div id="error-display" class="hidden mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <h4 class="text-red-400 font-semibold mb-1">Invalid Regular Expression</h4>
                            <p id="error-message" class="text-red-300 text-sm font-mono"></p>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3">
                    <button id="btn-copy-regex" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy Regex
                    </button>
                    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear All
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

            {{-- Quick Reference Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <h3 class="text-lg font-semibold text-light mb-4">Quick Reference</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
                    <div class="p-4 bg-darkBg rounded-lg border border-gold/10">
                        <div class="text-gold font-mono font-semibold mb-2">Character Classes</div>
                        <div class="text-light-muted space-y-1 font-mono text-xs">
                            <div><span class="text-light">.</span> - Any character</div>
                            <div><span class="text-light">\d</span> - Digit [0-9]</div>
                            <div><span class="text-light">\w</span> - Word char [a-zA-Z0-9_]</div>
                            <div><span class="text-light">\s</span> - Whitespace</div>
                        </div>
                    </div>
                    <div class="p-4 bg-darkBg rounded-lg border border-gold/10">
                        <div class="text-gold font-mono font-semibold mb-2">Quantifiers</div>
                        <div class="text-light-muted space-y-1 font-mono text-xs">
                            <div><span class="text-light">*</span> - 0 or more</div>
                            <div><span class="text-light">+</span> - 1 or more</div>
                            <div><span class="text-light">?</span> - 0 or 1</div>
                            <div><span class="text-light">{n,m}</span> - n to m times</div>
                        </div>
                    </div>
                    <div class="p-4 bg-darkBg rounded-lg border border-gold/10">
                        <div class="text-gold font-mono font-semibold mb-2">Anchors</div>
                        <div class="text-light-muted space-y-1 font-mono text-xs">
                            <div><span class="text-light">^</span> - Start of string/line</div>
                            <div><span class="text-light">$</span> - End of string/line</div>
                            <div><span class="text-light">\b</span> - Word boundary</div>
                            <div><span class="text-light">\B</span> - Non-word boundary</div>
                        </div>
                    </div>
                    <div class="p-4 bg-darkBg rounded-lg border border-gold/10">
                        <div class="text-gold font-mono font-semibold mb-2">Groups</div>
                        <div class="text-light-muted space-y-1 font-mono text-xs">
                            <div><span class="text-light">(abc)</span> - Capture group</div>
                            <div><span class="text-light">(?:abc)</span> - Non-capture</div>
                            <div><span class="text-light">a|b</span> - Alternation</div>
                            <div><span class="text-light">[abc]</span> - Character set</div>
                        </div>
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
                    <h3 class="text-lg font-semibold text-light mb-2">Real-Time</h3>
                    <p class="text-light-muted text-sm">Matches update instantly as you type. See results in real-time.</p>
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
                            <span class="text-light font-medium">What is a regular expression (regex)?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A regular expression (regex) is a sequence of characters that defines a search pattern. It's used for pattern matching within strings, enabling powerful text search, validation, and manipulation. Regex is supported in virtually all programming languages including JavaScript, Python, PHP, Java, and more. Common uses include validating email addresses, parsing log files, and search-and-replace operations.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What regex flavor does this tool use?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            This tool uses JavaScript's built-in RegExp engine, which follows the ECMAScript specification. It's compatible with most PCRE (Perl Compatible Regular Expressions) patterns and works identically to regex in browsers and Node.js environments. Some advanced features like lookbehind assertions are supported in modern browsers but may not work in older ones.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What do the flags (g, i, m, s) mean?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            <strong class="text-light">g (global)</strong> finds all matches instead of stopping at the first match.<br>
                            <strong class="text-light">i (case-insensitive)</strong> makes the pattern match regardless of letter case (A matches a).<br>
                            <strong class="text-light">m (multiline)</strong> makes ^ and $ match the start/end of each line, not just the whole string.<br>
                            <strong class="text-light">s (dotall)</strong> makes the dot (.) match newline characters as well, allowing patterns to span multiple lines.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Why isn't my regex matching?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Common issues include: forgetting to escape special characters (like . or * which have special meanings), not enabling the correct flags (e.g., 'i' for case-insensitive matching), using syntax not supported in JavaScript (like some lookbehind patterns in older browsers), or having unexpected whitespace in your pattern or test string. Check that your pattern syntax is valid - the tool will show an error message for invalid regex.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is this tool free and secure?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, this regex tester is completely free with no signup required. All pattern matching happens entirely in your browser using JavaScript - no data is sent to any server. This makes it completely safe and private for testing patterns against sensitive data like log files, personal information, or proprietary code.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @include('tools.partials.regex-tester-script')
    @endpush
</x-layout>
