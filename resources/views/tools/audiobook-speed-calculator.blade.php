<x-layout>
    <x-slot:title>Audiobook Speed Calculator - Free Online Listening Time Calculator | hafiz.dev</x-slot:title>
    <x-slot:description>Free online audiobook speed calculator. Calculate how long an audiobook takes at different playback speeds. Find your total listening time at 1x, 1.25x, 1.5x, 2x, and custom speeds. No signup required.</x-slot:description>
    <x-slot:keywords>audiobook speed calculator, audiobook length calculator, audiobook playback speed, audiobook listening time, audiobook time calculator, audiobook 1.5x speed, audiobook 2x speed, how long audiobook at 1.5 speed</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/audiobook-speed-calculator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Audiobook Speed Calculator - Free Online Listening Time Calculator | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Calculate how long an audiobook takes at different playback speeds. Free online audiobook speed calculator.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/audiobook-speed-calculator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Audiobook Speed Calculator",
            "description": "Calculate how long an audiobook takes at different playback speeds. Supports custom speeds from 0.5x to 4x.",
            "url": "https://hafiz.dev/tools/audiobook-speed-calculator",
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
                { "@@type": "ListItem", "position": 3, "name": "Audiobook Speed Calculator", "item": "https://hafiz.dev/tools/audiobook-speed-calculator" }
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
                    "name": "How does audiobook playback speed work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Audiobook playback speed multiplies the rate at which audio plays. At 1.5x speed, a 10-hour audiobook finishes in about 6 hours and 40 minutes. At 2x speed, it finishes in 5 hours. The formula is: listening time = original length divided by playback speed."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the best speed for listening to audiobooks?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Most people find 1.25x to 1.5x comfortable for everyday listening. Fiction and complex non-fiction are best at 1x to 1.25x for comprehension. Lighter non-fiction and familiar topics can be comfortable at 1.5x to 2x. Start slower and gradually increase as your ear adjusts."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How much time do I save listening at 1.5x speed?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "At 1.5x speed, you save one-third of the original listening time. A 12-hour audiobook takes only 8 hours at 1.5x speed, saving you 4 hours. A 30-hour audiobook takes 20 hours, saving 10 hours."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I listen to audiobooks at 3x or 4x speed?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "While most audiobook apps support speeds up to 3x or higher, comprehension drops significantly above 2x for most listeners. Some experienced speed listeners can handle 2.5x to 3x with practice. Speeds above 3x are generally only useful for skimming or reviewing familiar content."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I calculate audiobook listening time manually?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Divide the total audiobook length by the playback speed. For example, a 15-hour audiobook at 1.5x speed: 15 / 1.5 = 10 hours. At 2x speed: 15 / 2 = 7.5 hours (7 hours 30 minutes). This calculator handles the math automatically, including hours and minutes."
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
                    <li class="text-gold">Audiobook Speed Calculator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Audiobook Speed Calculator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Calculate how long an audiobook takes at different playback speeds. Enter the total length and see listening times for 1x, 1.25x, 1.5x, 2x, and custom speeds.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                {{-- Input Section --}}
                <div class="bg-darkBg rounded-lg border border-gold/10 p-5 mb-6">
                    <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">Audiobook Length</div>
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

                {{-- Custom Speed --}}
                <div class="bg-darkBg rounded-lg border border-gold/10 p-5 mb-6">
                    <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">Custom Speed</div>
                    <div class="flex items-center gap-4">
                        <input type="range" id="custom-speed-slider" min="0.5" max="4" step="0.05" value="1.5"
                            class="flex-1 h-2 bg-gold/20 rounded-lg appearance-none cursor-pointer accent-gold"
                        >
                        <div class="flex items-center gap-1">
                            <input type="number" id="custom-speed-input" min="0.5" max="4" step="0.05" value="1.5"
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

                    {{-- Speed Comparison Table --}}
                    <div class="bg-darkBg border border-gold/10 rounded-lg p-5 mb-6">
                        <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">Speed Comparison</div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="border-b border-gold/10">
                                        <th class="pb-3 text-light-muted text-sm font-medium">Speed</th>
                                        <th class="pb-3 text-light-muted text-sm font-medium">Listening Time</th>
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

                    {{-- Custom Speed Result --}}
                    <div class="bg-darkBg border border-gold/10 rounded-lg p-6 mb-6">
                        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Custom Speed Result</div>
                        <div class="flex flex-wrap items-baseline gap-4">
                            <div>
                                <span class="text-4xl md:text-5xl font-bold text-gold" id="custom-result-time">0h 0m</span>
                            </div>
                            <div class="text-light-muted text-sm">
                                at <span id="custom-result-speed" class="text-light font-semibold">1.5x</span> speed
                                (saving <span id="custom-result-saved" class="text-green-400 font-semibold">0h 0m</span>)
                            </div>
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
                            <div id="stat-chapters" class="text-xl font-bold text-light mb-1">~0</div>
                            <div class="text-light-muted text-xs">Est. Chapters</div>
                        </div>
                        <div class="bg-darkBg border border-gold/10 rounded-lg p-4 text-center">
                            <div id="stat-words" class="text-xl font-bold text-light mb-1">~0</div>
                            <div class="text-light-muted text-xs">Est. Word Count</div>
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
                        <span id="error-message" class="text-red-400 text-sm">Please enter a valid audiobook length.</span>
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
                    <p class="text-light-muted text-sm">See listening times for 1x, 1.25x, 1.5x, 1.75x, 2x, 2.5x, and 3x speeds side by side. Compare time saved at each speed instantly.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🎚️</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Custom Speed Slider</h3>
                    <p class="text-light-muted text-sm">Set any playback speed from 0.5x to 4x with a smooth slider. Fine-tune to the exact speed your audiobook app supports.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All calculations run in your browser. No data is sent to any server. Your listening habits stay completely private.</p>
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
                            <span class="text-light font-medium">How does audiobook playback speed work?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Audiobook playback speed multiplies the rate at which audio plays back. At 1.5x speed, a 10-hour audiobook would finish in about 6 hours and 40 minutes. At 2x speed, it would take just 5 hours. The formula is simple: divide the original length by the speed multiplier to get your actual listening time.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the best speed for listening to audiobooks?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Most people find 1.25x to 1.5x comfortable for everyday listening. Fiction and complex non-fiction are best at 1x to 1.25x for maximum comprehension. Lighter non-fiction and familiar topics work well at 1.5x to 2x. Start at a slower speed and gradually increase as your ear adjusts to faster narration.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How much time do I save at 1.5x speed?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            At 1.5x speed, you save one-third of the original listening time. For example, a 12-hour audiobook takes only 8 hours at 1.5x speed, saving you 4 hours. A 30-hour audiobook takes 20 hours, saving 10 hours. This makes it one of the most popular speed choices for regular audiobook listeners.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I listen to audiobooks at 3x or 4x speed?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            While most audiobook apps support speeds up to 3x or higher, comprehension drops significantly above 2x for most listeners. Some experienced speed listeners can handle 2.5x to 3x with practice. Speeds above 3x are generally only useful for skimming or reviewing content you have already heard before.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I calculate audiobook listening time manually?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Divide the total audiobook length by the playback speed. For example, a 15-hour audiobook at 1.5x speed: 15 / 1.5 = 10 hours. At 2x speed: 15 / 2 = 7.5 hours (7 hours and 30 minutes). This calculator handles the math automatically, including hours, minutes, and seconds.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.audiobook-speed-calculator-script')
    @endpush
</x-layout>
