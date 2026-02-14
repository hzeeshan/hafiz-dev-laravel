<x-layout>
    <x-slot:title>Diff Checker - Compare Text Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online diff checker to compare two texts and highlight differences. Find additions, deletions, and modifications instantly. Perfect for comparing code, configs, or any text. 100% client-side.</x-slot:description>
    <x-slot:keywords>diff checker, text compare, compare two texts, online diff tool, code diff, text diff, file compare, diff viewer, code comparison tool</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/diff-checker') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Diff Checker - Compare Text Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online diff checker to compare two texts and highlight differences. Find additions, deletions, and modifications instantly. 100% client-side.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/diff-checker') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Diff Checker",
            "description": "Free online diff checker to compare two texts and highlight differences. Find additions, deletions, and modifications instantly.",
            "url": "https://hafiz.dev/tools/diff-checker",
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
                    "name": "Diff Checker",
                    "item": "https://hafiz.dev/tools/diff-checker"
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
                    "name": "How do I compare two texts?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Simply paste your original text in the left panel and the modified text in the right panel, then click \"Compare\". The tool will instantly highlight all differences - additions in green, deletions in red."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What's the difference between line, word, and character comparison?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Line comparison treats each line as a unit (best for code). Word comparison highlights individual word changes (best for prose). Character comparison shows every single character difference (most detailed but can be noisy)."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I ignore whitespace differences?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Enable the \"Ignore whitespace\" option to skip differences caused by spaces, tabs, or line breaks. This is useful when comparing code that may have different formatting but identical logic."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What do Side by Side and Inline views show?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Side by Side shows original and modified texts in parallel columns, making it easy to see what changed where. Inline (unified) view shows everything in a single column with deletions and additions marked, similar to git diff output."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my data secure?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Absolutely. All comparisons happen directly in your browser using JavaScript. Your text never leaves your device - we don't store, transmit, or have access to any content you compare."
                    }
                }
            ]
        }
        </script>
    @endpush

    @push('head')
    <style>
        .diff-line {
            display: flex;
            min-height: 1.5em;
            line-height: 1.5;
        }
        .diff-line-number {
            min-width: 3rem;
            text-align: right;
            padding-right: 0.75rem;
            user-select: none;
            flex-shrink: 0;
            border-right: 1px solid rgba(212, 168, 83, 0.1);
        }
        .diff-line-content {
            padding-left: 0.75rem;
            white-space: pre-wrap;
            word-break: break-all;
            flex: 1;
            min-width: 0;
        }
        .diff-added {
            background: rgba(34, 197, 94, 0.1);
        }
        .diff-added .diff-line-number {
            color: #4ade80;
            border-right-color: rgba(34, 197, 94, 0.2);
        }
        .diff-added .diff-line-content {
            color: #4ade80;
        }
        .diff-removed {
            background: rgba(239, 68, 68, 0.1);
        }
        .diff-removed .diff-line-number {
            color: #f87171;
            border-right-color: rgba(239, 68, 68, 0.2);
        }
        .diff-removed .diff-line-content {
            color: #f87171;
        }
        .diff-empty {
            background: rgba(107, 114, 128, 0.05);
        }
        .diff-empty .diff-line-number {
            color: transparent;
        }
        .diff-empty .diff-line-content {
            color: transparent;
        }
        .diff-unchanged .diff-line-number {
            color: #6b7280;
        }
        .diff-unchanged .diff-line-content {
            color: #9ca3af;
        }
        /* Inline view specific */
        .diff-inline-added {
            background: rgba(34, 197, 94, 0.1);
        }
        .diff-inline-added .diff-line-content {
            color: #4ade80;
        }
        .diff-inline-removed {
            background: rgba(239, 68, 68, 0.1);
        }
        .diff-inline-removed .diff-line-content {
            color: #f87171;
        }
        /* Word-level highlights inside lines */
        .diff-word-added {
            background: rgba(34, 197, 94, 0.25);
            border-radius: 2px;
            padding: 0 1px;
        }
        .diff-word-removed {
            background: rgba(239, 68, 68, 0.25);
            border-radius: 2px;
            padding: 0 1px;
        }
        /* Synced scroll panels */
        .diff-panel {
            overflow-y: auto;
            max-height: 500px;
        }
        .diff-panel::-webkit-scrollbar {
            width: 6px;
        }
        .diff-panel::-webkit-scrollbar-track {
            background: rgba(17, 24, 39, 0.5);
        }
        .diff-panel::-webkit-scrollbar-thumb {
            background: rgba(212, 168, 83, 0.3);
            border-radius: 3px;
        }
        .diff-panel::-webkit-scrollbar-thumb:hover {
            background: rgba(212, 168, 83, 0.5);
        }
    </style>
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
                    <li class="text-gold">Diff Checker</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Diff Checker</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Compare two texts and find the differences. Highlights additions, deletions, and modifications instantly. 100% client-side.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <x-tool-privacy-banner />

                {{-- Options Bar --}}
                <div class="flex flex-wrap items-center gap-4 mb-4 p-3 rounded-lg bg-darkBg border border-gold/10">
                    {{-- Compare Mode --}}
                    <div class="flex items-center gap-2">
                        <label for="diff-mode" class="text-light-muted text-sm">Compare by:</label>
                        <select id="diff-mode" class="bg-darkCard border border-gold/30 text-light rounded-lg px-3 py-1.5 text-sm focus:border-gold focus:outline-none">
                            <option value="lines" selected>Lines</option>
                            <option value="words">Words</option>
                            <option value="characters">Characters</option>
                        </select>
                    </div>

                    <div class="h-6 w-px bg-gold/20 hidden sm:block"></div>

                    {{-- Checkboxes --}}
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="ignore-whitespace" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
                        <span class="text-light-muted text-sm">Ignore whitespace</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="ignore-case" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
                        <span class="text-light-muted text-sm">Ignore case</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="show-unchanged" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg">
                        <span class="text-light-muted text-sm">Show unchanged</span>
                    </label>
                </div>

                {{-- Input Panels --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
                    {{-- Original Text --}}
                    <div class="flex flex-col">
                        <label for="original-text" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Original Text
                        </label>
                        <textarea
                            id="original-text"
                            class="flex-1 min-h-[250px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-y"
                            placeholder="Paste original text here..."
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Modified Text --}}
                    <div class="flex flex-col">
                        <label for="modified-text" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Modified Text
                        </label>
                        <textarea
                            id="modified-text"
                            class="flex-1 min-h-[250px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-y"
                            placeholder="Paste modified text here..."
                            spellcheck="false"
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-4">
                    <button id="btn-compare" class="px-4 py-2 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        Compare
                    </button>
                    <button id="btn-swap" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
                        Swap
                    </button>
                    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear All
                    </button>
                    <button id="btn-copy-diff" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy Diff
                    </button>
                    <button id="btn-sample" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Sample
                    </button>
                </div>

                {{-- View Mode Toggle --}}
                <div id="view-toggle-section" class="hidden mb-4">
                    <div class="flex items-center gap-2">
                        <span class="text-light-muted text-sm">View:</span>
                        <div class="flex items-center p-1 bg-darkBg rounded-lg border border-gold/10">
                            <button id="btn-side-by-side" class="px-3 py-1.5 text-sm rounded-md bg-gold/20 text-gold font-medium transition-all cursor-pointer">
                                Side by Side
                            </button>
                            <button id="btn-inline" class="px-3 py-1.5 text-sm rounded-md text-light-muted hover:text-gold transition-all cursor-pointer">
                                Inline
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Statistics Bar --}}
                <div id="stats-bar" class="hidden mb-4 p-3 rounded-lg bg-darkBg border border-gold/10">
                    <div class="flex flex-wrap items-center gap-4 text-sm">
                        <span class="flex items-center gap-1.5">
                            <span class="w-3 h-3 rounded-sm bg-green-500/30 border border-green-500/50"></span>
                            <span class="text-light-muted">Added: <span id="stat-added" class="text-green-400 font-medium">0</span></span>
                        </span>
                        <span class="flex items-center gap-1.5">
                            <span class="w-3 h-3 rounded-sm bg-red-500/30 border border-red-500/50"></span>
                            <span class="text-light-muted">Removed: <span id="stat-removed" class="text-red-400 font-medium">0</span></span>
                        </span>
                        <span class="flex items-center gap-1.5">
                            <span class="w-3 h-3 rounded-sm bg-gray-500/30 border border-gray-500/50"></span>
                            <span class="text-light-muted">Unchanged: <span id="stat-unchanged" class="text-light font-medium">0</span></span>
                        </span>
                    </div>
                </div>

                {{-- Diff Output --}}
                <div id="diff-output" class="hidden">
                    {{-- Side by Side View --}}
                    <div id="diff-side-by-side" class="grid grid-cols-1 lg:grid-cols-2 gap-0 border border-gold/20 rounded-lg overflow-hidden">
                        {{-- Left side (Original) --}}
                        <div class="border-b lg:border-b-0 lg:border-r border-gold/20">
                            <div class="bg-darkBg px-4 py-2 text-sm font-medium text-light-muted border-b border-gold/20 flex items-center gap-2">
                                <svg class="w-3.5 h-3.5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                                Original
                            </div>
                            <div id="diff-left" class="diff-panel font-mono text-sm bg-darkCard">
                            </div>
                        </div>

                        {{-- Right side (Modified) --}}
                        <div>
                            <div class="bg-darkBg px-4 py-2 text-sm font-medium text-light-muted border-b border-gold/20 flex items-center gap-2">
                                <svg class="w-3.5 h-3.5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                Modified
                            </div>
                            <div id="diff-right" class="diff-panel font-mono text-sm bg-darkCard">
                            </div>
                        </div>
                    </div>

                    {{-- Inline View --}}
                    <div id="diff-inline" class="hidden border border-gold/20 rounded-lg overflow-hidden">
                        <div class="bg-darkBg px-4 py-2 text-sm font-medium text-light-muted border-b border-gold/20 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                            Unified Diff
                        </div>
                        <div id="diff-unified" class="diff-panel font-mono text-sm bg-darkCard">
                        </div>
                    </div>
                </div>

                {{-- No Differences Message --}}
                <div id="no-diff-message" class="hidden mt-4 p-4 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="text-green-400 text-sm font-semibold">No differences found! Both texts are identical.</p>
                    </div>
                </div>

                {{-- Success/Error Notifications --}}
                <div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant Comparison</h3>
                    <p class="text-light-muted text-sm">Compare texts instantly with real-time highlighting of additions, deletions, and modifications.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Multiple View Modes</h3>
                    <p class="text-light-muted text-sm">Choose between side-by-side or inline unified view. Compare by lines, words, or characters.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">Everything runs in your browser. Your text never touches our servers.</p>
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
                            <span class="text-light font-medium">How do I compare two texts?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Simply paste your original text in the left panel and the modified text in the right panel, then click "Compare". The tool will instantly highlight all differences - additions in green, deletions in red. You can also load sample data to see how it works.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What's the difference between line, word, and character comparison?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Line comparison treats each line as a unit and is best for comparing code or structured text. Word comparison highlights individual word changes and works great for prose or documentation. Character comparison shows every single character difference - it's the most detailed but can be noisy for large texts.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I ignore whitespace differences?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Enable the "Ignore whitespace" option to skip differences caused by spaces, tabs, or trailing whitespace. This is particularly useful when comparing code that may have different formatting or indentation styles but identical logic.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What do Side by Side and Inline views show?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Side by Side shows original and modified texts in parallel columns, making it easy to see what changed where. Lines are aligned so you can directly compare corresponding sections. Inline (unified) view shows everything in a single column with deletions and additions marked with - and + prefixes, similar to git diff output.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my data secure?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Absolutely. All comparisons happen directly in your browser using JavaScript. Your text never leaves your device - we don't store, transmit, or have access to any content you compare. This makes the tool completely safe for comparing sensitive code, configuration files, or any private data.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.diff-checker-script')
    @endpush
</x-layout>
