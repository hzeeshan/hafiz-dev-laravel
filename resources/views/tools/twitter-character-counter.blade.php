<x-layout>
    <x-slot:title>Twitter Character Counter - Free Tweet Length Checker | hafiz.dev</x-slot:title>
    <x-slot:description>Free Twitter/X character counter. Check tweet length in real-time with character limit tracking. See how URLs, mentions, and hashtags affect your count. Supports threads and scheduling tips.</x-slot:description>
    <x-slot:keywords>twitter character counter, tweet character counter, twitter character limit, tweet length checker, x character counter, twitter post length, tweet counter</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/twitter-character-counter') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Twitter Character Counter - Free Tweet Length Checker | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free Twitter/X character counter. Check tweet length in real-time with character limit tracking. See how URLs, mentions, and hashtags affect your count.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/twitter-character-counter') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Twitter Character Counter",
            "description": "Free Twitter/X character counter. Check tweet length in real-time with character limit tracking. See how URLs, mentions, and hashtags affect your count.",
            "url": "https://hafiz.dev/tools/twitter-character-counter",
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
                    "name": "Twitter Character Counter",
                    "item": "https://hafiz.dev/tools/twitter-character-counter"
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
                    "name": "What is the Twitter/X character limit?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Standard Twitter/X posts have a 280 character limit. Twitter Premium (X Premium) subscribers can post up to 25,000 characters. URLs always count as 23 characters regardless of their actual length."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How are URLs counted on Twitter?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "All URLs on Twitter/X are automatically shortened using t.co and count as exactly 23 characters, regardless of the original URL length. This applies to both HTTP and HTTPS links."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Do emojis count as more than one character?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, most emojis count as 2 characters on Twitter/X due to Unicode encoding. Some complex emojis like flags or family emojis can count as even more. This tool shows the exact Twitter character count."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Do mentions and hashtags count toward the limit?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, both @mentions and #hashtags count toward the 280 character limit, including the @ and # symbols. When replying to someone, the @mention in a reply does NOT count toward your limit."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the character limit for Twitter DMs?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Twitter/X Direct Messages have a limit of 10,000 characters. This tool lets you switch between tweet mode (280) and DM mode (10,000) to check both."
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
                    <li class="text-gold">Twitter Character Counter</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Twitter Character Counter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Count characters for Twitter/X posts in real-time. Track URLs, mentions, hashtags, and emojis with accurate Twitter counting rules.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                {{-- Mode Selector --}}
                <div class="mb-6 flex flex-wrap gap-3">
                    <button id="mode-tweet" class="px-5 py-2 rounded-lg font-semibold text-sm transition-all duration-300 bg-gold text-darkBg cursor-pointer">
                        Tweet (280)
                    </button>
                    <button id="mode-premium" class="px-5 py-2 rounded-lg font-semibold text-sm transition-all duration-300 border border-gold/50 text-light hover:bg-gold/10 cursor-pointer">
                        X Premium (25,000)
                    </button>
                    <button id="mode-dm" class="px-5 py-2 rounded-lg font-semibold text-sm transition-all duration-300 border border-gold/50 text-light hover:bg-gold/10 cursor-pointer">
                        DM (10,000)
                    </button>
                    <button id="mode-bio" class="px-5 py-2 rounded-lg font-semibold text-sm transition-all duration-300 border border-gold/50 text-light hover:bg-gold/10 cursor-pointer">
                        Bio (160)
                    </button>
                </div>

                {{-- Progress Bar --}}
                <div class="mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <span id="char-count" class="text-3xl font-bold text-gold">0</span>
                        <span class="text-light-muted text-sm">/ <span id="char-limit">280</span> characters</span>
                    </div>
                    <div class="w-full bg-darkBg rounded-full h-3 border border-gold/10">
                        <div id="progress-bar" class="h-full rounded-full transition-all duration-300 bg-gold" style="width: 0%"></div>
                    </div>
                    <div id="remaining-text" class="text-right mt-1 text-sm text-light-muted">
                        <span id="remaining-count">280</span> characters remaining
                    </div>
                </div>

                {{-- Text Input --}}
                <div class="mb-6">
                    <textarea
                        id="tweet-input"
                        class="w-full min-h-[200px] bg-darkBg border border-gold/20 rounded-lg p-4 text-light text-base placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none leading-relaxed"
                        placeholder="Type or paste your tweet here..."
                        autofocus
                    ></textarea>
                </div>

                {{-- Stats Grid --}}
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-3 mb-6">
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
                        <div id="stat-chars" class="text-xl font-bold text-gold">0</div>
                        <div class="text-light-muted text-xs">Characters</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
                        <div id="stat-twitter-chars" class="text-xl font-bold text-gold">0</div>
                        <div class="text-light-muted text-xs">Twitter Count</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
                        <div id="stat-words" class="text-xl font-bold text-light">0</div>
                        <div class="text-light-muted text-xs">Words</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
                        <div id="stat-urls" class="text-xl font-bold text-light">0</div>
                        <div class="text-light-muted text-xs">URLs (23 ea.)</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
                        <div id="stat-mentions" class="text-xl font-bold text-light">0</div>
                        <div class="text-light-muted text-xs">@Mentions</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
                        <div id="stat-hashtags" class="text-xl font-bold text-light">0</div>
                        <div class="text-light-muted text-xs">#Hashtags</div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy Text
                    </button>
                    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                    <a href="https://twitter.com/intent/tweet" target="_blank" rel="noopener noreferrer" id="btn-post" class="px-4 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></svg>
                        Post on X
                    </a>
                </div>

                {{-- Tips Box --}}
                <div id="tips-box" class="bg-darkBg rounded-lg p-4 border border-gold/10">
                    <h3 class="text-light font-semibold mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Twitter/X Character Rules
                    </h3>
                    <div class="grid sm:grid-cols-2 gap-2 text-sm text-light-muted">
                        <div class="flex items-start gap-2">
                            <span class="text-gold mt-0.5">•</span>
                            <span>URLs always count as <strong class="text-light">23 characters</strong> (t.co shortening)</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-gold mt-0.5">•</span>
                            <span>Most emojis count as <strong class="text-light">2 characters</strong></span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-gold mt-0.5">•</span>
                            <span>CJK characters (中文, 日本語) count as <strong class="text-light">2 characters</strong></span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-gold mt-0.5">•</span>
                            <span>@mentions in replies <strong class="text-light">don't count</strong></span>
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
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Real-time Counting</h3>
                    <p class="text-light-muted text-sm">Characters are counted instantly as you type. See your progress with a visual progress bar and color warnings as you approach the limit.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Smart URL Detection</h3>
                    <p class="text-light-muted text-sm">Automatically detects URLs and counts them as 23 characters each, matching Twitter's t.co link shortening behavior exactly.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Multiple Modes</h3>
                    <p class="text-light-muted text-sm">Switch between Tweet (280), X Premium (25,000), DM (10,000), and Bio (160) character limits for any Twitter content type.</p>
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
                            <span class="text-light font-medium">What is the Twitter/X character limit?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Standard Twitter/X posts have a 280 character limit. X Premium subscribers can post up to 25,000 characters. Direct messages allow up to 10,000 characters. Bio/profile descriptions are limited to 160 characters.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How are URLs counted on Twitter?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            All URLs on Twitter/X are automatically shortened using t.co and count as exactly 23 characters, regardless of the original URL length. A 200-character URL still only counts as 23 characters. This tool applies the same rule automatically.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Do emojis count as more than one character?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, most emojis count as 2 characters on Twitter/X due to Unicode encoding. Some complex emojis like flags, skin-tone variants, or family emojis can count as even more. This tool shows the exact Twitter character count so you always know your real usage.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Do mentions and hashtags count toward the limit?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, both @mentions and #hashtags count toward the 280 character limit, including the @ and # symbols themselves. The one exception is @mentions in replies — when replying to someone, the @mention at the start does NOT count toward your limit.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the character limit for Twitter DMs?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Twitter/X Direct Messages have a limit of 10,000 characters. You can switch to DM mode in this tool to check your message length against the DM limit instead of the standard tweet limit.
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
        const tweetInput = document.getElementById('tweet-input');
        const charCount = document.getElementById('char-count');
        const charLimit = document.getElementById('char-limit');
        const progressBar = document.getElementById('progress-bar');
        const remainingCount = document.getElementById('remaining-count');
        const remainingText = document.getElementById('remaining-text');
        const statChars = document.getElementById('stat-chars');
        const statTwitterChars = document.getElementById('stat-twitter-chars');
        const statWords = document.getElementById('stat-words');
        const statUrls = document.getElementById('stat-urls');
        const statMentions = document.getElementById('stat-mentions');
        const statHashtags = document.getElementById('stat-hashtags');
        const btnCopy = document.getElementById('btn-copy');
        const btnClear = document.getElementById('btn-clear');
        const btnPost = document.getElementById('btn-post');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');

        // Mode buttons
        const modeTweet = document.getElementById('mode-tweet');
        const modePremium = document.getElementById('mode-premium');
        const modeDm = document.getElementById('mode-dm');
        const modeBio = document.getElementById('mode-bio');
        const modeButtons = [modeTweet, modePremium, modeDm, modeBio];

        const T_CO_LENGTH = 23;
        let currentLimit = 280;

        // URL regex — matches http(s) and common domains
        const urlRegex = /https?:\/\/[^\s]+|(?:www\.)[^\s]+/gi;
        const mentionRegex = /@\w+/g;
        const hashtagRegex = /#\w+/g;

        // ===== Twitter Character Counting =====
        // Twitter uses a weighted system: most characters = 1, but CJK, emojis = 2

        function getTwitterCharCount(text) {
            // First, replace URLs with placeholder of 23 chars
            const urls = text.match(urlRegex) || [];
            let processedText = text;

            urls.forEach(url => {
                processedText = processedText.replace(url, ' '.repeat(T_CO_LENGTH));
            });

            // Count characters using Twitter's weighting
            let count = 0;
            const segments = Array.from(new Intl.Segmenter().segment(processedText));

            for (const segment of segments) {
                const codePoint = segment.segment.codePointAt(0);

                if (codePoint === undefined) continue;

                // Check if character is in ranges that count as 2
                if (isWeightedTwo(segment.segment, codePoint)) {
                    count += 2;
                } else {
                    count += 1;
                }
            }

            return { count, urls: urls.length };
        }

        function isWeightedTwo(char, codePoint) {
            // CJK Unified Ideographs
            if (codePoint >= 0x4E00 && codePoint <= 0x9FFF) return true;
            // CJK Extension A
            if (codePoint >= 0x3400 && codePoint <= 0x4DBF) return true;
            // CJK Extension B+
            if (codePoint >= 0x20000 && codePoint <= 0x2FA1F) return true;
            // CJK Compatibility Ideographs
            if (codePoint >= 0xF900 && codePoint <= 0xFAFF) return true;
            // Katakana
            if (codePoint >= 0x30A0 && codePoint <= 0x30FF) return true;
            // Hiragana
            if (codePoint >= 0x3040 && codePoint <= 0x309F) return true;
            // Hangul Syllables
            if (codePoint >= 0xAC00 && codePoint <= 0xD7AF) return true;
            // Hangul Jamo
            if (codePoint >= 0x1100 && codePoint <= 0x11FF) return true;
            // Fullwidth forms
            if (codePoint >= 0xFF01 && codePoint <= 0xFF60) return true;
            // Emojis — check for multi-byte (above basic multilingual plane or emoji presentation)
            if (codePoint > 0xFFFF) return true;
            // Common emoji ranges
            if (codePoint >= 0x2600 && codePoint <= 0x27BF) return true;
            if (codePoint >= 0xFE00 && codePoint <= 0xFE0F) return true;
            if (codePoint >= 0x1F000 && codePoint <= 0x1FAFF) return true;

            return false;
        }

        // ===== Update Function =====

        function updateCount() {
            const text = tweetInput.value;

            // Basic stats
            const plainLength = text.length;
            const words = text.trim() === '' ? 0 : text.trim().split(/\s+/).length;
            const mentions = (text.match(mentionRegex) || []).length;
            const hashtags = (text.match(hashtagRegex) || []).length;

            // Twitter-weighted count
            const { count: twitterCount, urls } = getTwitterCharCount(text);

            // Update display
            charCount.textContent = twitterCount;
            statChars.textContent = plainLength;
            statTwitterChars.textContent = twitterCount;
            statWords.textContent = words;
            statUrls.textContent = urls;
            statMentions.textContent = mentions;
            statHashtags.textContent = hashtags;

            // Progress bar
            const percentage = Math.min((twitterCount / currentLimit) * 100, 100);
            progressBar.style.width = percentage + '%';

            // Remaining
            const remaining = currentLimit - twitterCount;
            remainingCount.textContent = remaining;

            // Color coding
            if (remaining < 0) {
                progressBar.className = 'h-full rounded-full transition-all duration-300 bg-red-500';
                charCount.className = 'text-3xl font-bold text-red-400';
                remainingCount.className = '';
                remainingText.className = 'text-right mt-1 text-sm text-red-400';
            } else if (remaining <= 20) {
                progressBar.className = 'h-full rounded-full transition-all duration-300 bg-amber-500';
                charCount.className = 'text-3xl font-bold text-amber-400';
                remainingCount.className = '';
                remainingText.className = 'text-right mt-1 text-sm text-amber-400';
            } else {
                progressBar.className = 'h-full rounded-full transition-all duration-300 bg-gold';
                charCount.className = 'text-3xl font-bold text-gold';
                remainingCount.className = '';
                remainingText.className = 'text-right mt-1 text-sm text-light-muted';
            }

            // Update post button URL
            if (text.trim()) {
                btnPost.href = 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(text);
            } else {
                btnPost.href = 'https://twitter.com/intent/tweet';
            }
        }

        // ===== Mode Switching =====

        function setMode(limit, activeButton) {
            currentLimit = limit;
            charLimit.textContent = limit;

            modeButtons.forEach(btn => {
                btn.className = 'px-5 py-2 rounded-lg font-semibold text-sm transition-all duration-300 border border-gold/50 text-light hover:bg-gold/10 cursor-pointer';
            });
            activeButton.className = 'px-5 py-2 rounded-lg font-semibold text-sm transition-all duration-300 bg-gold text-darkBg cursor-pointer';

            updateCount();
        }

        // ===== Actions =====

        function copyText() {
            const text = tweetInput.value;
            if (!text) return;
            navigator.clipboard.writeText(text).then(() => {
                const originalHTML = btnCopy.innerHTML;
                btnCopy.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                btnCopy.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => {
                    btnCopy.innerHTML = originalHTML;
                    btnCopy.classList.remove('text-green-400', 'border-green-400');
                }, 2000);
            });
        }

        function clearAll() {
            tweetInput.value = '';
            updateCount();
            tweetInput.focus();
        }

        // ===== Event Listeners =====
        tweetInput.addEventListener('input', updateCount);
        btnCopy.addEventListener('click', copyText);
        btnClear.addEventListener('click', clearAll);

        modeTweet.addEventListener('click', () => setMode(280, modeTweet));
        modePremium.addEventListener('click', () => setMode(25000, modePremium));
        modeDm.addEventListener('click', () => setMode(10000, modeDm));
        modeBio.addEventListener('click', () => setMode(160, modeBio));

        // Initial count
        updateCount();
    })();
    </script>
    @endpush
</x-layout>
