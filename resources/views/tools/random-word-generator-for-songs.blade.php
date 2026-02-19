<x-layout>
    <x-slot:title>Random Word Generator for Songs - Free Online Songwriting Tool | hafiz.dev</x-slot:title>
    <x-slot:description>Free online random word generator for songs. Get instant lyric inspiration with rhyming words, themed vocabulary, and songwriting prompts. No signup required.</x-slot:description>
    <x-slot:keywords>random word generator for songs, songwriting word generator, random lyrics generator, song word ideas, rhyming word generator, songwriting inspiration, random words for lyrics, song vocabulary generator</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/random-word-generator-for-songs') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Random Word Generator for Songs - Free Online Songwriting Tool | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online random word generator for songs. Get instant lyric inspiration with rhyming words and themed vocabulary. No signup required.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/random-word-generator-for-songs') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Random Word Generator for Songs",
            "description": "Free online random word generator for songs. Get instant lyric inspiration with rhyming words, themed vocabulary, and songwriting prompts.",
            "url": "https://hafiz.dev/tools/random-word-generator-for-songs",
            "applicationCategory": "UtilitiesApplication",
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
                    "name": "Random Word Generator for Songs",
                    "item": "https://hafiz.dev/tools/random-word-generator-for-songs"
                }
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
                    "name": "How does the random word generator for songs work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The generator picks random words from curated songwriting vocabulary organized by themes like love, nature, emotions, and more. You can filter by theme, choose how many words to generate, and get rhyming suggestions to help with your lyrics."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I filter words by theme or mood?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes. You can choose from themes including Love & Romance, Nature & Seasons, Emotions & Feelings, Night & Dreams, Journey & Freedom, Urban & Modern, and Heartbreak & Loss. Each theme contains words commonly used in that style of songwriting."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does this tool generate rhyming words?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes. Enable the 'Include Rhymes' option and the generator will suggest rhyming pairs alongside your random words. This helps you build verses and choruses with natural rhyme schemes."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I use these words for any genre of music?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Absolutely. The word lists are versatile and work for pop, rock, country, R&B, hip-hop, folk, indie, and any other genre. The themed categories help you find the right vocabulary for your specific style."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is this tool free to use?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, completely free. The tool runs 100% in your browser with no server calls, no signup, and no limits on how many words you can generate. Use it as much as you need for your songwriting sessions."
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
                    <li class="text-gold">Random Word Generator for Songs</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Random Word Generator for Songs</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Get instant songwriting inspiration. Generate random words by theme, discover rhyming pairs, and break through writer's block with fresh vocabulary for your lyrics.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="word-theme" class="text-light font-semibold mb-2 block text-sm">Theme</label>
                            <select id="word-theme" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="all">All Themes</option>
                                <option value="love">Love & Romance</option>
                                <option value="nature">Nature & Seasons</option>
                                <option value="emotions">Emotions & Feelings</option>
                                <option value="night">Night & Dreams</option>
                                <option value="journey">Journey & Freedom</option>
                                <option value="urban">Urban & Modern</option>
                                <option value="heartbreak">Heartbreak & Loss</option>
                            </select>
                        </div>
                        <div>
                            <label for="word-count" class="text-light font-semibold mb-2 block text-sm">Word Count</label>
                            <input type="number" id="word-count" min="1" max="100" value="12" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none">
                        </div>
                        <div>
                            <label for="word-separator" class="text-light font-semibold mb-2 block text-sm">Display</label>
                            <select id="word-separator" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="space">Spaced</option>
                                <option value="newline">One per Line</option>
                                <option value="comma">Comma Separated</option>
                                <option value="numbered">Numbered List</option>
                            </select>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="include-rhymes" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Include Rhymes</span>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Output Area --}}
                <div class="mb-6">
                    <label for="word-output" class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
                        Generated Words
                    </label>
                    <textarea
                        id="word-output"
                        class="w-full min-h-[250px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                        placeholder="Click 'Generate' to get random songwriting words..."
                        readonly
                    ></textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-generate" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Generate
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Download
                    </button>
                    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Sample
                    </button>
                    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                </div>

                {{-- Stats --}}
                <div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div id="stat-count" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Words Generated</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-theme" class="text-2xl font-bold text-light mb-1">-</div>
                            <div class="text-light-muted text-sm">Theme</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-syllables" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Avg Syllables</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-pool" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Words in Pool</div>
                        </div>
                    </div>
                </div>

                {{-- Notifications --}}
                <div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm"></span>
                    </div>
                </div>
                <div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span id="error-message" class="text-red-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Themed Word Lists</h3>
                    <p class="text-light-muted text-sm">Choose from 7 songwriting themes including love, nature, emotions, night, journey, urban, and heartbreak. Each theme has curated vocabulary for that mood.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Rhyme Suggestions</h3>
                    <p class="text-light-muted text-sm">Enable rhyme mode to get word pairs that rhyme together. Build verses and choruses with natural rhyme schemes for catchier lyrics.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Client-Side</h3>
                    <p class="text-light-muted text-sm">Everything runs in your browser. No data is sent to any server, no signup needed, and no limits on generation. Use it freely during your songwriting sessions.</p>
                </div>
            </div>

            {{-- Dynamic CTA --}}
            <x-tool-cta />

            {{-- FAQ Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Frequently Asked Questions</h2>

                <div class="space-y-4 max-w-3xl mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How does the random word generator for songs work?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The generator picks random words from curated songwriting vocabulary organized by themes like love, nature, emotions, and more. You can filter by theme, choose how many words to generate, and enable rhyme suggestions to help build your verses.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What themes are available for songwriting words?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            You can choose from 7 themes: Love & Romance, Nature & Seasons, Emotions & Feelings, Night & Dreams, Journey & Freedom, Urban & Modern, and Heartbreak & Loss. Each theme contains words commonly used in that style of songwriting. Select "All Themes" to pull from every category at once.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I get rhyming word pairs for my lyrics?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Check the "Include Rhymes" option and the generator will pair each word with a rhyming match. This makes it easier to build choruses, verses, and bridges with natural-sounding rhyme schemes.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What music genres does this tool work for?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The word lists are versatile and work for any genre: pop, rock, country, R&B, hip-hop, folk, indie, electronic, and more. The themed categories help you find vocabulary that fits your specific style and mood.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is this tool free and does it store my data?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Completely free with no limits. The tool runs 100% in your browser using JavaScript. No data is sent to any server, no cookies are stored, and no signup is required. Generate as many words as you need for your songwriting sessions.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.random-word-generator-for-songs-script')
    @endpush
</x-layout>
