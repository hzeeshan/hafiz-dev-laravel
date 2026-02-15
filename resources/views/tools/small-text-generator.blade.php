<x-layout>
    <x-slot:title>Small Text Generator - Tiny Text Converter Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online small text generator. Convert your text to superscript, subscript, and small caps instantly for social media, Discord, and more. Copy and paste tiny text anywhere. No signup required.</x-slot:description>
    <x-slot:keywords>small text generator, tiny text generator, superscript text, subscript text, small caps generator, small text discord, tiny text copy paste</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/small-text-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Small Text Generator - Tiny Text Converter Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online small text generator. Convert text to superscript, subscript, and small caps instantly.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/small-text-generator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Small Text Generator",
            "description": "Free online small text generator. Convert text to superscript, subscript, and small caps instantly.",
            "url": "https://hafiz.dev/tools/small-text-generator",
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
                { "@@type": "ListItem", "position": 3, "name": "Small Text Generator", "item": "https://hafiz.dev/tools/small-text-generator" }
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
                    "name": "How does the small text generator work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The tool maps each letter to its Unicode superscript, subscript, or small caps equivalent. For example, 'a' becomes 'ᵃ' (superscript), 'ₐ' (subscript), or 'ᴀ' (small caps). These are standard Unicode characters that work on most platforms."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I use small text on Discord and social media?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Small text works on most platforms including Discord, Twitter/X, Facebook, Instagram, TikTok, Reddit, and more. Superscript has the widest compatibility. Simply copy the text and paste it anywhere."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between superscript, subscript, and small caps?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Superscript text appears raised and smaller (ˢᵘᵖᵉʳˢᶜʳⁱᵖᵗ), subscript text appears lowered and smaller (ₛᵤᵦₛ꜀ᵣᵢₚₜ), and small caps are uppercase-looking letters at lowercase height (ꜱᴍᴀʟʟ ᴄᴀᴘꜱ). All three are Unicode characters, not images."
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
                    <li class="text-gold">Small Text Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Small Text Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert your text to tiny letters instantly. Choose from ˢᵘᵖᵉʳˢᶜʳⁱᵖᵗ, ₛᵤᵦₛ꜀ᵣᵢₚₜ, or ꜱᴍᴀʟʟ ᴄᴀᴘꜱ styles for social media, Discord, and more.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Style Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <label class="text-light font-semibold mb-3 block text-sm">Text Style</label>
                    <div class="flex flex-wrap gap-3">
                        <label class="flex items-center gap-2 cursor-pointer px-4 py-2 bg-darkCard border border-gold/30 rounded-lg hover:border-gold/50 transition-colors">
                            <input type="radio" name="style" value="superscript" checked class="text-gold focus:ring-gold cursor-pointer">
                            <span class="text-sm text-light">Superscript ˢᵘᵖᵉʳ</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-4 py-2 bg-darkCard border border-gold/20 rounded-lg hover:border-gold/50 transition-colors">
                            <input type="radio" name="style" value="subscript" class="text-gold focus:ring-gold cursor-pointer">
                            <span class="text-sm text-light">Subscript ₛᵤᵦ</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-4 py-2 bg-darkCard border border-gold/20 rounded-lg hover:border-gold/50 transition-colors">
                            <input type="radio" name="style" value="smallcaps" class="text-gold focus:ring-gold cursor-pointer">
                            <span class="text-sm text-light">Small Caps ꜱᴍᴀʟʟ</span>
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
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Small Text
                    </label>
                    <textarea
                        id="text-output"
                        class="w-full min-h-[140px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                        placeholder="Small text will appear here..."
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
                            <div id="stat-converted" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Converted</div>
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
                    All Styles Preview
                </h2>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Original</div>
                        <div id="preview-original" class="text-light/50 font-sans text-2xl break-all min-h-[40px]">Hello World</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Superscript</div>
                        <div id="preview-superscript" class="text-light font-sans text-2xl break-all min-h-[40px]">ᴴᵉˡˡᵒ ᵂᵒʳˡᵈ</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Subscript</div>
                        <div id="preview-subscript" class="text-gold font-sans text-2xl break-all min-h-[40px]">ₕₑₗₗₒ wₒᵣₗd</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Small Caps</div>
                        <div id="preview-smallcaps" class="text-light font-sans text-2xl break-all min-h-[40px]">ʜᴇʟʟᴏ ᴡᴏʀʟᴅ</div>
                    </div>
                </div>
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔤</div>
                    <h3 class="text-lg font-semibold text-light mb-2">3 Styles</h3>
                    <p class="text-light-muted text-sm">Choose from superscript ˢᵘᵖᵉʳ, subscript ₛᵤᵦ, or small caps ꜱᴍᴀʟʟ. All styles use standard Unicode characters that work everywhere.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📋</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Copy & Paste</h3>
                    <p class="text-light-muted text-sm">One-click copy to clipboard. Use tiny text on Twitter, Discord, Instagram, TikTok, Reddit, or anywhere Unicode is supported.</p>
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
                            <span class="text-light font-medium">How does the small text generator work?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The tool maps each letter to its Unicode small equivalent. For superscript, <code class="bg-darkCard px-1 rounded">a</code> becomes <code class="bg-darkCard px-1 rounded">ᵃ</code>. For subscript, <code class="bg-darkCard px-1 rounded">a</code> becomes <code class="bg-darkCard px-1 rounded">ₐ</code>. For small caps, <code class="bg-darkCard px-1 rounded">a</code> becomes <code class="bg-darkCard px-1 rounded">ᴀ</code>. These are standard Unicode characters, not images or formatting.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I use small text on Discord and social media?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Small text works on most platforms including Discord, Twitter/X, Facebook, Instagram bios, TikTok, Reddit, and YouTube comments. Superscript has the widest compatibility, while subscript has fewer available characters in Unicode. Small caps work well across most platforms.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Why do some characters not get converted?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Not all letters have Unicode superscript or subscript equivalents. Superscript covers most letters and all digits (0-9). Subscript has fewer available characters in the Unicode standard — letters like b, c, d, f, g, w, y, z don't have subscript forms. Small caps cover all 26 letters. Characters without equivalents are kept as-is.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @include('tools.partials.small-text-generator-script')
    @endpush
</x-layout>
