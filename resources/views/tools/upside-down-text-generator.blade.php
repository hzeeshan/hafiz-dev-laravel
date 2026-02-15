<x-layout>
    <x-slot:title>Upside Down Text Generator - Flip Text Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online upside down text generator. Flip your text upside down instantly for social media, Discord, and more. Copy and paste flipped text anywhere. No signup required.</x-slot:description>
    <x-slot:keywords>upside down text generator, flip text, upside down text, flipped text generator, text flipper, upside down letters, reverse text</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/upside-down-text-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Upside Down Text Generator - Flip Text Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online upside down text generator. Flip your text upside down instantly for social media, Discord, and more.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/upside-down-text-generator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Upside Down Text Generator",
            "description": "Free online upside down text generator. Flip your text upside down instantly.",
            "url": "https://hafiz.dev/tools/upside-down-text-generator",
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
                { "@@type": "ListItem", "position": 3, "name": "Upside Down Text Generator", "item": "https://hafiz.dev/tools/upside-down-text-generator" }
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
                    "name": "How does the upside down text generator work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The tool maps each letter and number to its upside-down Unicode equivalent. For example, 'a' becomes 'ɐ' and 'b' becomes 'q'. The text is also reversed so it reads correctly when flipped upside down."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I use upside down text on social media?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Upside down text works on most social media platforms including Twitter/X, Facebook, Instagram, Discord, TikTok, Reddit, and more. Simply copy the flipped text and paste it anywhere."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does upside down text work on all devices?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Upside down text uses standard Unicode characters that are supported on virtually all modern devices, operating systems, and browsers. Some older devices may not display every flipped character correctly."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is there a character limit for flipping text?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "No, there is no character limit. You can flip as much text as you want. The conversion happens instantly in your browser with no server processing."
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
                    <li class="text-gold">Upside Down Text Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Upside Down Text Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Flip your text upside down instantly. Perfect for social media posts, Discord usernames, and standing out online. Just type and copy!
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="flex flex-wrap gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="opt-reverse" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Reverse text order</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="opt-flip-numbers" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Flip numbers</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="opt-flip-punctuation" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Flip punctuation</span>
                        </label>
                    </div>
                </div>

                {{-- Input --}}
                <div class="mb-4">
                    <label for="text-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        Your Text
                    </label>
                    <textarea
                        id="text-input"
                        class="w-full min-h-[140px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                        placeholder="Type or paste your text here..."
                        spellcheck="false"
                    ></textarea>
                </div>

                {{-- Output --}}
                <div class="mb-6">
                    <label class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
                        Flipped Text
                    </label>
                    <textarea
                        id="text-output"
                        class="w-full min-h-[140px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                        placeholder="Flipped text will appear here..."
                        readonly
                    ></textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
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
                <div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center">
                            <div id="stat-chars" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Characters</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-flipped" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Flipped</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-unchanged" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Unchanged</div>
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

            {{-- Preview Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <h2 class="text-lg font-semibold text-light mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    Preview
                </h2>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Original</div>
                        <div id="preview-original" class="text-light font-mono text-lg break-all min-h-[40px]">Hello World!</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Flipped</div>
                        <div id="preview-flipped" class="text-gold font-mono text-lg break-all min-h-[40px]">¡plɹoM ollǝH</div>
                    </div>
                </div>
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔄</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant Flip</h3>
                    <p class="text-light-muted text-sm">Text is flipped in real-time as you type. No buttons to click — just type and your upside-down text appears immediately.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📋</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Copy & Paste</h3>
                    <p class="text-light-muted text-sm">One-click copy to clipboard. Use flipped text on Twitter, Discord, Instagram, TikTok, Reddit, or any platform that supports Unicode.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">Everything runs in your browser. No data is sent to any server. Your text stays completely private and secure.</p>
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
                            <span class="text-light font-medium">How does the upside down text generator work?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The tool maps each letter and number to its upside-down Unicode equivalent. For example, <code class="bg-darkCard px-1 rounded">a</code> becomes <code class="bg-darkCard px-1 rounded">ɐ</code>, <code class="bg-darkCard px-1 rounded">b</code> becomes <code class="bg-darkCard px-1 rounded">q</code>, and <code class="bg-darkCard px-1 rounded">e</code> becomes <code class="bg-darkCard px-1 rounded">ǝ</code>. The text is also reversed so it reads correctly when viewed upside down.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I use upside down text on social media?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Upside down text works on most social media platforms including Twitter/X, Facebook, Instagram, Discord, TikTok, Reddit, YouTube comments, and more. Simply copy the flipped text and paste it into your post, bio, or message.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does upside down text work on all devices?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Upside down text uses standard Unicode characters supported on virtually all modern devices, operating systems, and browsers — including iPhones, Android phones, Windows, Mac, and Linux. A few obscure flipped characters may not render on very old devices.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is there a character limit for flipping text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            No, there is no character limit. You can flip as much text as you want. The conversion happens instantly in your browser with no server processing, so it works even without an internet connection once the page is loaded.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @include('tools.partials.upside-down-text-generator-script')
</x-layout>
