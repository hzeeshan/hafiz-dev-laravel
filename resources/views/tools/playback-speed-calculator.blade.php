<x-layout>
    <x-slot:title>Playback Speed Calculator - Free Online Video & Podcast Speed Calculator | hafiz.dev</x-slot:title>
    <x-slot:description>Free online playback speed calculator. Calculate how long any video, podcast, or lecture takes at different speeds. Find your total watch time at 1x, 1.5x, 2x, and custom speeds. No signup required.</x-slot:description>
    <x-slot:keywords>playback speed calculator, video speed calculator, podcast speed calculator, watch time calculator, lecture speed calculator, 2x speed calculator, playback time calculator, how long at 1.5x speed</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/playback-speed-calculator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Playback Speed Calculator - Free Online Video & Podcast Speed Calculator | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Calculate how long any video, podcast, or lecture takes at different playback speeds. Free online speed calculator.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/playback-speed-calculator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Playback Speed Calculator",
            "description": "Calculate how long any video, podcast, or lecture takes at different playback speeds. Supports custom speeds from 0.25x to 4x.",
            "url": "https://hafiz.dev/tools/playback-speed-calculator",
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
                { "@@type": "ListItem", "position": 3, "name": "Playback Speed Calculator", "item": "https://hafiz.dev/tools/playback-speed-calculator" }
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
                    "name": "How does playback speed affect watch time?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Playback speed directly divides the original length. At 2x speed, a 1-hour video takes 30 minutes. At 1.5x, it takes 40 minutes. The formula is: watch time = original length divided by speed. This calculator handles the math for you."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the best playback speed for learning?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Research suggests 1.5x is the sweet spot for most educational content. Comprehension stays high while saving 33% of your time. For complex topics, stick with 1x to 1.25x. For review or familiar material, 1.75x to 2x works well."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How much time do I save watching at 2x speed?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "At 2x speed, you save exactly half the original time. A 60-minute lecture takes 30 minutes. A 3-hour course takes 1.5 hours. Over a full semester of recorded lectures, this can save dozens of hours."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I use this calculator for podcasts and YouTube videos?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes. This calculator works for any media with adjustable playback speed, including YouTube videos, podcasts, online courses, audiobooks, recorded lectures, webinars, and more. Just enter the total length and pick your speed."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What playback speeds do most apps support?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "YouTube supports 0.25x to 2x. Spotify and Apple Podcasts support up to 3x. Audible supports 0.5x to 3.5x. VLC and most video players support 0.25x to 4x or higher. This calculator covers speeds from 0.25x to 4x."
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
                    <li class="text-gold">Playback Speed Calculator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Playback Speed Calculator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Calculate how long any video, podcast, or lecture takes at different playback speeds. Enter the total duration and compare watch times across speeds instantly.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Media Type Selector --}}
                <div class="bg-darkBg rounded-lg border border-gold/10 p-5 mb-6">
                    <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">Media Type</div>
                    <div class="flex flex-wrap gap-2">
                        <button data-media="video" class="media-type-btn px-4 py-2 rounded-lg text-sm font-medium bg-gold text-darkBg transition-all duration-200 cursor-pointer">Video</button>
                        <button data-media="podcast" class="media-type-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:bg-gold/10 hover:text-gold transition-all duration-200 cursor-pointer">Podcast</button>
                        <button data-media="lecture" class="media-type-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:bg-gold/10 hover:text-gold transition-all duration-200 cursor-pointer">Lecture</button>
                        <button data-media="course" class="media-type-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:bg-gold/10 hover:text-gold transition-all duration-200 cursor-pointer">Course</button>
                        <button data-media="audiobook" class="media-type-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:bg-gold/10 hover:text-gold transition-all duration-200 cursor-pointer">Audiobook</button>
                    </div>
                </div>

                {{-- Duration Input --}}
                <div class="bg-darkBg rounded-lg border border-gold/10 p-5 mb-6">
                    <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">Original Duration</div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label for="input-hours" class="text-light text-sm font-medium mb-1 block">Hours</label>
                            <input type="number" id="input-hours" min="0" max="999" value="0" placeholder="0"
                                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light text-lg font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
                            >
                        </div>
                        <div>
                            <label for="input-minutes" class="text-light text-sm font-medium mb-1 block">Minutes</label>
                            <input type="number" id="input-minutes" min="0" max="59" value="0" placeholder="0"
                                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light text-lg font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
                            >
                        </div>
                        <div>
                            <label for="input-seconds" class="text-light text-sm font-medium mb-1 block">Seconds</label>
                            <input type="number" id="input-seconds" min="0" max="59" value="0" placeholder="0"
                                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light text-lg font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
                            >
                        </div>
                    </div>
                </div>

                {{-- Multiple Items --}}
                <div class="bg-darkBg rounded-lg border border-gold/10 p-5 mb-6">
                    <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">Number of Items (optional)</div>
                    <div class="flex items-center gap-4">
                        <div class="flex-1">
                            <label for="input-items" class="text-light text-sm font-medium mb-1 block">How many episodes, videos, or lectures?</label>
                            <input type="number" id="input-items" min="1" max="999" value="1" placeholder="1"
                                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light text-lg font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
                            >
                        </div>
                    </div>
                    <p class="text-light-muted text-xs mt-2">Set to more than 1 if you want to calculate the total time for a playlist, course, or podcast series where each item has the same length.</p>
                </div>

                {{-- Custom Speed --}}
                <div class="bg-darkBg rounded-lg border border-gold/10 p-5 mb-6">
                    <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">Custom Speed</div>
                    <div class="flex items-center gap-4">
                        <input type="range" id="custom-speed-slider" min="0.25" max="4" step="0.05" value="1.5"
                            class="flex-1 h-2 bg-gold/20 rounded-lg appearance-none cursor-pointer accent-gold"
                        >
                        <div class="flex items-center gap-1">
                            <input type="number" id="custom-speed-input" min="0.25" max="4" step="0.05" value="1.5"
                                class="w-20 bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-center font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
                            >
                            <span class="text-light-muted text-sm">x</span>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-calculate" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        Calculate
                    </button>
                    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Sample
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Download
                    </button>
                    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                </div>

                {{-- Results Section (hidden initially) --}}
                <div id="results-section" class="hidden">

                    {{-- Custom Speed Result --}}
                    <div class="bg-darkBg border border-gold/10 rounded-lg p-6 mb-6">
                        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Your Watch Time</div>
                        <div class="flex flex-wrap items-baseline gap-4">
                            <div>
                                <span class="text-4xl md:text-5xl font-bold text-gold" id="custom-result-time">0h 0m</span>
                            </div>
                            <div class="text-light-muted text-sm">
                                at <span id="custom-result-speed" class="text-light font-semibold">1.5x</span> speed
                                (saving <span id="custom-result-saved" class="text-green-400 font-semibold">0h 0m</span>)
                            </div>
                        </div>
                        <div id="items-note" class="hidden text-light-muted text-sm mt-2">
                            Total for <span id="items-count" class="text-light font-medium">1</span> items, <span id="per-item-time" class="text-light font-medium">0h 0m</span> each
                        </div>
                    </div>

                    {{-- Speed Comparison Table --}}
                    <div class="bg-darkBg border border-gold/10 rounded-lg p-5 mb-6">
                        <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">Speed Comparison</div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="border-b border-gold/10">
                                        <th class="pb-3 text-light-muted text-sm font-medium">Speed</th>
                                        <th class="pb-3 text-light-muted text-sm font-medium">Watch Time</th>
                                        <th class="pb-3 text-light-muted text-sm font-medium">Time Saved</th>
                                        <th class="pb-3 text-light-muted text-sm font-medium text-right">% Saved</th>
                                    </tr>
                                </thead>
                                <tbody id="speed-table-body">
                                    {{-- Populated by JS --}}
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Quick Stats --}}
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
                        <div class="bg-darkBg border border-gold/10 rounded-lg p-4 text-center">
                            <div id="stat-original" class="text-xl font-bold text-gold mb-1">0h 0m</div>
                            <div class="text-light-muted text-xs">Original Length</div>
                        </div>
                        <div class="bg-darkBg border border-gold/10 rounded-lg p-4 text-center">
                            <div id="stat-total-minutes" class="text-xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-xs">Total Minutes</div>
                        </div>
                        <div class="bg-darkBg border border-gold/10 rounded-lg p-4 text-center">
                            <div id="stat-at-15x" class="text-xl font-bold text-light mb-1">0h 0m</div>
                            <div class="text-light-muted text-xs">At 1.5x Speed</div>
                        </div>
                        <div class="bg-darkBg border border-gold/10 rounded-lg p-4 text-center">
                            <div id="stat-at-2x" class="text-xl font-bold text-light mb-1">0h 0m</div>
                            <div class="text-light-muted text-xs">At 2x Speed</div>
                        </div>
                    </div>
                </div>

                {{-- Stats bar --}}
                <div id="stats-bar" class="hidden mt-4 p-3 rounded-lg bg-darkBg border border-gold/10">
                    <div class="flex flex-wrap items-center gap-4 text-sm text-light-muted">
                        <span>Original: <span id="stats-original" class="text-light font-medium">-</span></span>
                        <span>Custom Speed: <span id="stats-custom" class="text-light font-medium">-</span></span>
                        <span>Time Saved: <span id="stats-saved" class="text-green-400 font-medium">-</span></span>
                    </div>
                </div>

                {{-- Notifications --}}
                <div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm">Copied to clipboard!</span>
                    </div>
                </div>
                <div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        <span id="error-message" class="text-red-400 text-sm">Please enter a valid duration.</span>
                    </div>
                </div>
            </div>

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">⚡</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant Speed Comparison</h3>
                    <p class="text-light-muted text-sm">See watch times for 0.75x through 3x side by side. Compare how much time you save at each speed with a single click.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🎬</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Works for Any Media</h3>
                    <p class="text-light-muted text-sm">Calculate speeds for YouTube videos, podcasts, online courses, lectures, audiobooks, webinars, and any content with adjustable playback.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All calculations run in your browser. No data is sent to any server. Your viewing habits stay completely private.</p>
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
                            <span class="text-light font-medium">How does playback speed affect total watch time?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Playback speed directly divides the original duration. At 2x speed, content plays twice as fast, so a 1-hour video takes 30 minutes. At 1.5x, the same video takes 40 minutes. The formula is simple: watch time = original length / playback speed. Slower speeds like 0.75x make content take longer, which is useful for complex material.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the best playback speed for learning?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Studies suggest 1.5x is the optimal speed for most educational content. Comprehension stays high while you save a third of your time. For complex or technical material, 1x to 1.25x allows better retention. For review sessions or familiar topics, 1.75x to 2x works well. Start at a comfortable speed and gradually increase.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How much time do I save at 2x speed?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            At 2x speed, you save exactly half the original time. A 60-minute lecture becomes 30 minutes. A 20-hour online course becomes 10 hours. Over a full semester with 40 hours of recorded lectures, that saves 20 hours. Even at 1.5x, you save a third, turning those 40 hours into about 27 hours.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What playback speeds do YouTube, Spotify, and other apps support?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            YouTube supports 0.25x to 2x (with custom speeds via developer tools). Spotify supports 0.5x to 3.5x for podcasts. Apple Podcasts supports 0.5x to 2x. Audible supports 0.5x to 3.5x. VLC and most desktop video players support 0.25x to 4x or higher. This calculator covers the full range from 0.25x to 4x.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I calculate time for a whole playlist or course?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes. Use the "Number of Items" field to multiply the duration. If you have 30 lectures that are each 45 minutes long, enter 45 minutes and set items to 30. The calculator will show the total time for all items at each speed. For items with different lengths, enter the total duration directly.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        // DOM elements
        var inputHours = document.getElementById('input-hours');
        var inputMinutes = document.getElementById('input-minutes');
        var inputSeconds = document.getElementById('input-seconds');
        var inputItems = document.getElementById('input-items');
        var customSpeedSlider = document.getElementById('custom-speed-slider');
        var customSpeedInput = document.getElementById('custom-speed-input');
        var btnCalculate = document.getElementById('btn-calculate');
        var btnSample = document.getElementById('btn-sample');
        var btnCopy = document.getElementById('btn-copy');
        var btnDownload = document.getElementById('btn-download');
        var btnClear = document.getElementById('btn-clear');
        var resultsSection = document.getElementById('results-section');
        var speedTableBody = document.getElementById('speed-table-body');
        var statsBar = document.getElementById('stats-bar');
        var successNotification = document.getElementById('success-notification');
        var successMessage = document.getElementById('success-message');
        var errorNotification = document.getElementById('error-notification');
        var errorMessage = document.getElementById('error-message');
        var mediaTypeBtns = document.querySelectorAll('.media-type-btn');

        var selectedMedia = 'video';

        // Preset speeds
        var presetSpeeds = [0.75, 1, 1.25, 1.5, 1.75, 2, 2.5, 3];

        // Media type selection
        mediaTypeBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                mediaTypeBtns.forEach(function(b) {
                    b.classList.remove('bg-gold', 'text-darkBg');
                    b.classList.add('border', 'border-gold/30', 'text-light-muted');
                });
                btn.classList.remove('border', 'border-gold/30', 'text-light-muted');
                btn.classList.add('bg-gold', 'text-darkBg');
                selectedMedia = btn.getAttribute('data-media');
                if (!resultsSection.classList.contains('hidden')) {
                    calculate();
                }
            });
        });

        // Sync slider and input
        customSpeedSlider.addEventListener('input', function() {
            customSpeedInput.value = parseFloat(this.value).toFixed(2);
            if (!resultsSection.classList.contains('hidden')) {
                calculate();
            }
        });

        customSpeedInput.addEventListener('change', function() {
            var val = parseFloat(this.value);
            if (isNaN(val) || val < 0.25) val = 0.25;
            if (val > 4) val = 4;
            this.value = val;
            customSpeedSlider.value = val;
            if (!resultsSection.classList.contains('hidden')) {
                calculate();
            }
        });

        function showSuccess(msg) {
            successMessage.textContent = msg;
            successNotification.classList.remove('hidden');
            errorNotification.classList.add('hidden');
            setTimeout(function() { successNotification.classList.add('hidden'); }, 2000);
        }

        function showError(msg) {
            errorMessage.textContent = msg;
            errorNotification.classList.remove('hidden');
            successNotification.classList.add('hidden');
            setTimeout(function() { errorNotification.classList.add('hidden'); }, 4000);
        }

        function getTotalSeconds() {
            var h = parseInt(inputHours.value) || 0;
            var m = parseInt(inputMinutes.value) || 0;
            var s = parseInt(inputSeconds.value) || 0;
            var items = parseInt(inputItems.value) || 1;
            if (items < 1) items = 1;
            return (h * 3600 + m * 60 + s) * items;
        }

        function getPerItemSeconds() {
            var h = parseInt(inputHours.value) || 0;
            var m = parseInt(inputMinutes.value) || 0;
            var s = parseInt(inputSeconds.value) || 0;
            return h * 3600 + m * 60 + s;
        }

        function formatTime(totalSeconds) {
            totalSeconds = Math.round(totalSeconds);
            var h = Math.floor(totalSeconds / 3600);
            var m = Math.floor((totalSeconds % 3600) / 60);
            var s = totalSeconds % 60;
            if (h > 0 && m > 0 && s > 0) return h + 'h ' + m + 'm ' + s + 's';
            if (h > 0 && m > 0) return h + 'h ' + m + 'm';
            if (h > 0 && s > 0) return h + 'h 0m ' + s + 's';
            if (h > 0) return h + 'h 0m';
            if (m > 0 && s > 0) return m + 'm ' + s + 's';
            if (m > 0) return m + 'm';
            return s + 's';
        }

        function formatTimeSaved(totalSeconds) {
            if (totalSeconds <= 0) return 'None';
            return formatTime(totalSeconds);
        }

        function calculate() {
            var total = getTotalSeconds();
            if (total <= 0) {
                showError('Please enter a valid duration (at least 1 second).');
                return;
            }

            errorNotification.classList.add('hidden');

            var customSpeed = parseFloat(customSpeedInput.value) || 1.5;
            var items = parseInt(inputItems.value) || 1;

            // Build speed table
            var tableHtml = '';
            var customInPresets = false;
            for (var i = 0; i < presetSpeeds.length; i++) {
                if (Math.abs(presetSpeeds[i] - customSpeed) < 0.01) {
                    customInPresets = true;
                    break;
                }
            }

            for (var i = 0; i < presetSpeeds.length; i++) {
                var speed = presetSpeeds[i];
                var adjusted = total / speed;
                var saved = total - adjusted;
                var pctSaved = ((saved / total) * 100).toFixed(1);
                var isOriginal = speed === 1;
                var isCustomMatch = Math.abs(speed - customSpeed) < 0.01;
                var isSlow = speed < 1;

                var rowClass = isOriginal ? 'text-light-muted' : '';
                if (isCustomMatch) rowClass = 'bg-gold/5';

                tableHtml += '<tr class="border-b border-gold/5 ' + rowClass + '">';
                tableHtml += '<td class="py-3 pr-4"><span class="font-mono font-semibold ' + (isOriginal ? 'text-light-muted' : 'text-gold') + '">' + speed + 'x</span>';
                if (isOriginal) tableHtml += ' <span class="text-xs text-light-muted">(original)</span>';
                if (isSlow) tableHtml += ' <span class="text-xs text-light-muted">(slower)</span>';
                if (isCustomMatch && !isOriginal && !isSlow) tableHtml += ' <span class="text-xs text-gold/70">(custom)</span>';
                tableHtml += '</td>';
                tableHtml += '<td class="py-3 pr-4 font-mono text-light">' + formatTime(adjusted) + '</td>';

                if (isSlow) {
                    var extra = adjusted - total;
                    tableHtml += '<td class="py-3 pr-4 font-mono text-red-400">+' + formatTime(extra) + '</td>';
                    tableHtml += '<td class="py-3 text-right font-mono text-red-400">+' + Math.abs(parseFloat(pctSaved)).toFixed(1) + '%</td>';
                } else if (isOriginal) {
                    tableHtml += '<td class="py-3 pr-4 font-mono text-light-muted">-</td>';
                    tableHtml += '<td class="py-3 text-right font-mono text-light-muted">-</td>';
                } else {
                    tableHtml += '<td class="py-3 pr-4 font-mono text-green-400">' + formatTimeSaved(saved) + '</td>';
                    tableHtml += '<td class="py-3 text-right font-mono text-green-400">' + pctSaved + '%</td>';
                }
                tableHtml += '</tr>';
            }

            // Add custom speed row if not in presets
            if (!customInPresets) {
                var adjusted = total / customSpeed;
                var saved = total - adjusted;
                var pctSaved = ((saved / total) * 100).toFixed(1);

                tableHtml += '<tr class="border-b border-gold/5 bg-gold/5">';
                tableHtml += '<td class="py-3 pr-4"><span class="font-mono font-semibold text-gold">' + customSpeed + 'x</span> <span class="text-xs text-gold/70">(custom)</span></td>';
                tableHtml += '<td class="py-3 pr-4 font-mono text-light">' + formatTime(adjusted) + '</td>';

                if (customSpeed < 1) {
                    var extra = adjusted - total;
                    tableHtml += '<td class="py-3 pr-4 font-mono text-red-400">+' + formatTime(extra) + '</td>';
                    tableHtml += '<td class="py-3 text-right font-mono text-red-400">+' + Math.abs(parseFloat(pctSaved)).toFixed(1) + '%</td>';
                } else {
                    tableHtml += '<td class="py-3 pr-4 font-mono text-green-400">' + formatTimeSaved(saved) + '</td>';
                    tableHtml += '<td class="py-3 text-right font-mono text-green-400">' + pctSaved + '%</td>';
                }

                tableHtml += '</tr>';
            }

            speedTableBody.innerHTML = tableHtml;

            // Custom speed result
            var customAdjusted = total / customSpeed;
            var customSaved = total - customAdjusted;
            document.getElementById('custom-result-time').textContent = formatTime(customAdjusted);
            document.getElementById('custom-result-speed').textContent = customSpeed + 'x';
            document.getElementById('custom-result-saved').textContent = customSpeed >= 1 ? formatTimeSaved(customSaved) : '+' + formatTime(Math.abs(customSaved));

            // Items note
            var itemsNote = document.getElementById('items-note');
            if (items > 1) {
                itemsNote.classList.remove('hidden');
                document.getElementById('items-count').textContent = items;
                document.getElementById('per-item-time').textContent = formatTime(getPerItemSeconds() / customSpeed);
            } else {
                itemsNote.classList.add('hidden');
            }

            // Quick stats
            document.getElementById('stat-original').textContent = formatTime(total);
            document.getElementById('stat-total-minutes').textContent = Math.round(total / 60).toLocaleString();
            document.getElementById('stat-at-15x').textContent = formatTime(total / 1.5);
            document.getElementById('stat-at-2x').textContent = formatTime(total / 2);

            // Stats bar
            document.getElementById('stats-original').textContent = formatTime(total);
            document.getElementById('stats-custom').textContent = customSpeed + 'x = ' + formatTime(customAdjusted);
            document.getElementById('stats-saved').textContent = customSpeed >= 1 ? formatTimeSaved(customSaved) : '+' + formatTime(Math.abs(customSaved));
            statsBar.classList.remove('hidden');

            // Show results
            resultsSection.classList.remove('hidden');
        }

        // Build summary text for copy/download
        function buildSummary() {
            var total = getTotalSeconds();
            if (total <= 0) return '';

            var customSpeed = parseFloat(customSpeedInput.value) || 1.5;
            var items = parseInt(inputItems.value) || 1;
            var lines = [];
            lines.push('Playback Speed Calculator Results');
            lines.push('=================================');
            lines.push('Media Type: ' + selectedMedia.charAt(0).toUpperCase() + selectedMedia.slice(1));
            lines.push('Original Length: ' + formatTime(total));
            if (items > 1) {
                lines.push('Items: ' + items + ' x ' + formatTime(getPerItemSeconds()) + ' each');
            }
            lines.push('');
            lines.push('Speed   | Watch Time     | Time Saved | % Saved');
            lines.push('--------|----------------|------------|--------');

            var allSpeeds = presetSpeeds.slice();
            var customInPresets = false;
            for (var i = 0; i < presetSpeeds.length; i++) {
                if (Math.abs(presetSpeeds[i] - customSpeed) < 0.01) {
                    customInPresets = true;
                    break;
                }
            }

            for (var i = 0; i < allSpeeds.length; i++) {
                var speed = allSpeeds[i];
                var adjusted = total / speed;
                var saved = total - adjusted;
                var pctSaved = speed === 1 ? '-' : ((saved / total) * 100).toFixed(1) + '%';
                if (speed < 1) pctSaved = '+' + Math.abs(parseFloat(((saved / total) * 100).toFixed(1))) + '%';
                var label = speed + 'x';
                while (label.length < 7) label += ' ';
                var timeStr = formatTime(adjusted);
                while (timeStr.length < 14) timeStr += ' ';
                var savedStr = speed === 1 ? '-' : (speed < 1 ? '+' + formatTime(adjusted - total) : formatTimeSaved(saved));
                while (savedStr.length < 10) savedStr += ' ';
                lines.push(label + ' | ' + timeStr + ' | ' + savedStr + ' | ' + pctSaved);
            }

            if (!customInPresets) {
                var adjusted = total / customSpeed;
                var saved = total - adjusted;
                var pctSaved = ((saved / total) * 100).toFixed(1) + '%';
                var label = customSpeed + 'x*';
                while (label.length < 7) label += ' ';
                var timeStr = formatTime(adjusted);
                while (timeStr.length < 14) timeStr += ' ';
                var savedStr = customSpeed < 1 ? '+' + formatTime(adjusted - total) : formatTimeSaved(saved);
                while (savedStr.length < 10) savedStr += ' ';
                lines.push(label + ' | ' + timeStr + ' | ' + savedStr + ' | ' + pctSaved);
                lines.push('');
                lines.push('* Custom speed');
            }

            lines.push('');
            lines.push('Generated at hafiz.dev/tools/playback-speed-calculator');

            return lines.join('\n');
        }

        // Event listeners
        btnCalculate.addEventListener('click', calculate);

        // Sample data per media type
        var sampleData = {
            video:     { hours: 0,  minutes: 22, seconds: 0, items: 1,  speed: 2.00,  label: 'YouTube video (22 min)' },
            podcast:   { hours: 1,  minutes: 15, seconds: 0, items: 10, speed: 1.50,  label: 'Podcast series (10 episodes, 1h 15m each)' },
            lecture:   { hours: 0,  minutes: 50, seconds: 0, items: 30, speed: 1.75,  label: 'University course (30 lectures, 50 min each)' },
            course:    { hours: 2,  minutes: 15, seconds: 0, items: 1,  speed: 1.50,  label: 'Online course (2h 15m total)' },
            audiobook: { hours: 11, minutes: 40, seconds: 0, items: 1,  speed: 1.50,  label: 'Audiobook (11h 40m)' }
        };

        btnSample.addEventListener('click', function() {
            var data = sampleData[selectedMedia] || sampleData.video;
            inputHours.value = data.hours;
            inputMinutes.value = data.minutes;
            inputSeconds.value = data.seconds;
            inputItems.value = data.items;
            customSpeedSlider.value = data.speed;
            customSpeedInput.value = data.speed.toFixed(2);
            calculate();
        });

        btnCopy.addEventListener('click', function() {
            var summary = buildSummary();
            if (!summary) {
                showError('Calculate first before copying.');
                return;
            }
            navigator.clipboard.writeText(summary).then(function() {
                var orig = btnCopy.innerHTML;
                btnCopy.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                btnCopy.classList.add('text-green-400', 'border-green-400');
                showSuccess('Copied to clipboard!');
                setTimeout(function() {
                    btnCopy.innerHTML = orig;
                    btnCopy.classList.remove('text-green-400', 'border-green-400');
                }, 2000);
            });
        });

        btnDownload.addEventListener('click', function() {
            var summary = buildSummary();
            if (!summary) {
                showError('Calculate first before downloading.');
                return;
            }
            var blob = new Blob([summary], { type: 'text/plain' });
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'playback-speed-calculation.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            showSuccess('Downloaded playback-speed-calculation.txt');
        });

        btnClear.addEventListener('click', function() {
            inputHours.value = 0;
            inputMinutes.value = 0;
            inputSeconds.value = 0;
            inputItems.value = 1;
            customSpeedSlider.value = 1.5;
            customSpeedInput.value = '1.50';
            resultsSection.classList.add('hidden');
            statsBar.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        });

        // Keyboard shortcut: Ctrl/Cmd+Enter to calculate
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                e.preventDefault();
                calculate();
            }
        });

        // Auto-recalculate on input change if results are already shown
        [inputHours, inputMinutes, inputSeconds, inputItems].forEach(function(el) {
            el.addEventListener('input', function() {
                if (!resultsSection.classList.contains('hidden')) {
                    calculate();
                }
            });
        });
    })();
    </script>
    @endpush
</x-layout>
