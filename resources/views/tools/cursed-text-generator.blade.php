<x-layout>
    <x-slot:title>Cursed Text Generator - Free Online Creepy Text Maker | hafiz.dev</x-slot:title>
    <x-slot:description>Free online cursed text generator. Create creepy, spooky, and weird Unicode text styles instantly for Discord, social media, and memes. No signup required.</x-slot:description>
    <x-slot:keywords>cursed text generator, cursed text, creepy text generator, weird text generator, cursed font generator, spooky text, creepy text copy paste, cursed text for discord</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/cursed-text-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Cursed Text Generator - Free Online Creepy Text Maker | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online cursed text generator. Create creepy, spooky, and weird Unicode text styles instantly for Discord and social media.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/cursed-text-generator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Cursed Text Generator",
            "description": "Free online cursed text generator. Create creepy, spooky, and weird Unicode text styles instantly.",
            "url": "https://hafiz.dev/tools/cursed-text-generator",
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
                { "@@type": "ListItem", "position": 3, "name": "Cursed Text Generator", "item": "https://hafiz.dev/tools/cursed-text-generator" }
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
                    "name": "What is cursed text?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Cursed text is regular text transformed using special Unicode characters to look creepy, distorted, or otherworldly. It uses combining diacritical marks, unusual Unicode symbols, and character substitutions to create an unsettling visual effect."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I use cursed text on Discord?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Cursed text works perfectly on Discord messages, usernames, bios, and server names. It also works on Twitter/X, Reddit, Facebook, Instagram, TikTok, and most platforms that support Unicode characters."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What cursed text styles are available?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "This generator offers multiple cursed styles: Creepy (combining marks above and below), Demonic (dark Unicode substitutions), Glitch Matrix (scattered combining marks), Ancient (medieval-looking Unicode characters), and Void (text surrounded by darkness symbols)."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is cursed text the same as Zalgo text?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Cursed text and Zalgo text are related but different. Zalgo text specifically uses stacking combining characters for a glitchy, corrupted look. Cursed text is a broader category that includes multiple creepy styles beyond just the Zalgo effect, such as character substitutions and dark Unicode symbols."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Why does cursed text look different on some devices?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Cursed text relies on Unicode characters that may render differently depending on the device, operating system, and font. Most modern devices display cursed text correctly, but some older devices or certain apps may show placeholder boxes for unsupported characters."
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
                    <li class="text-gold">Cursed Text Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Cursed Text Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Transform your text into creepy, cursed Unicode styles instantly. Choose from multiple spooky effects for Discord, social media, and memes. Just type and copy!
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 gap-6">
                        {{-- Style Selector --}}
                        <div>
                            <label class="text-light font-semibold mb-3 block text-sm">Cursed Style</label>
                            <select id="cursed-style" class="w-full bg-darkBg border border-gold/20 rounded-lg p-2.5 text-sm text-light focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 cursor-pointer">
                                <option value="creepy">Creepy (combining marks)</option>
                                <option value="demonic">Demonic (dark symbols)</option>
                                <option value="glitch">Glitch Matrix (scattered)</option>
                                <option value="ancient">Ancient (medieval)</option>
                                <option value="void">Void (darkness)</option>
                            </select>
                        </div>
                        {{-- Intensity --}}
                        <div>
                            <label class="text-light font-semibold mb-3 block text-sm">Intensity</label>
                            <input type="range" id="intensity-level" min="1" max="3" value="2" class="w-full h-2 bg-darkCard rounded-lg appearance-none cursor-pointer accent-gold">
                            <div class="flex justify-between text-xs text-light-muted mt-1">
                                <span>Subtle</span>
                                <span id="intensity-label" class="text-gold font-semibold">Medium</span>
                                <span>Extreme</span>
                            </div>
                        </div>
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
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Cursed Text
                    </label>
                    <textarea
                        id="text-output"
                        class="w-full min-h-[180px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none leading-loose"
                        placeholder="Cursed text will appear here..."
                        readonly
                    ></textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-generate" class="px-5 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Generate
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
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
                <div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center">
                            <div id="stat-input-chars" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Input Chars</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-output-chars" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Output Chars</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-style" class="text-2xl font-bold text-light mb-1">-</div>
                            <div class="text-light-muted text-sm">Style</div>
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
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        <span id="error-message" class="text-red-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">👻</div>
                    <h3 class="text-lg font-semibold text-light mb-2">5 Cursed Styles</h3>
                    <p class="text-light-muted text-sm">Choose from Creepy, Demonic, Glitch Matrix, Ancient, and Void styles. Each produces a unique cursed effect using different Unicode techniques.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🎚️</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Adjustable Intensity</h3>
                    <p class="text-light-muted text-sm">Slide from subtle to extreme. Control exactly how cursed your text looks with three intensity levels for each style.</p>
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
                            <span class="text-light font-medium">What is cursed text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Cursed text is regular text transformed using special Unicode characters to look creepy, distorted, or otherworldly. It uses combining diacritical marks, unusual Unicode symbols, and character substitutions to create an unsettling visual effect that works on any platform supporting Unicode.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I use cursed text on Discord and social media?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Cursed text works on Discord messages, usernames, and bios. It also works on Twitter/X, Reddit, Facebook, Instagram, TikTok, YouTube comments, and most platforms that support Unicode. Simply copy the generated text and paste it wherever you want.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between cursed text and Zalgo text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Zalgo text specifically uses stacking combining characters to create a glitchy, corrupted look. Cursed text is a broader category that includes multiple creepy styles beyond just the Zalgo-like effect. This generator offers five distinct styles including character substitutions, dark symbols, and medieval-looking Unicode characters.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Why does my cursed text look different on different devices?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Cursed text relies on Unicode characters that may render differently depending on the device, operating system, browser, and installed fonts. Most modern devices display it correctly. If you see placeholder boxes, try using a lower intensity or a different style like "Creepy" which has the widest compatibility.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is there a character limit for cursed text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            There is no character limit in this tool. However, keep in mind that cursed text (especially at higher intensities) adds many extra Unicode characters per letter. Some platforms like Twitter have character limits that count each combining mark separately, so your cursed text may use up the limit faster than plain text.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @include('tools.partials.cursed-text-generator-script')
</x-layout>
