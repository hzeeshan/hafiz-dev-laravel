<x-layout>
    <x-slot:title>Bold Italic Text Generator - Free Online Unicode Text Styler | hafiz.dev</x-slot:title>
    <x-slot:description>Free online bold italic text generator. Create bold, italic, and bold italic Unicode text for social media, Discord, and more. Copy and paste styled text anywhere. No signup required.</x-slot:description>
    <x-slot:keywords>bold italic text generator, bold text generator, italic text generator, bold italic font, unicode bold italic, bold text copy paste, italic text copy paste, fancy text generator</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/bold-italic-text-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Bold Italic Text Generator - Free Online Unicode Text Styler | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online bold italic text generator. Create bold, italic, and bold italic Unicode text for social media and more.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/bold-italic-text-generator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Bold Italic Text Generator",
            "description": "Free online bold italic text generator. Create bold, italic, and bold italic Unicode text instantly.",
            "url": "https://hafiz.dev/tools/bold-italic-text-generator",
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
                { "@@type": "ListItem", "position": 3, "name": "Bold Italic Text Generator", "item": "https://hafiz.dev/tools/bold-italic-text-generator" }
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
                    "name": "How does the bold italic text generator work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The tool maps each letter and number to its Unicode Mathematical Alphanumeric Symbols equivalent. For example, 'A' in bold becomes '𝗔' (U+1D5D4). These are standard Unicode characters that work on any platform supporting Unicode."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I use bold italic text on social media?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Bold and italic Unicode text works on most social media platforms including Twitter/X, Facebook, Instagram, LinkedIn, Discord, TikTok, Reddit, and more. Simply copy the styled text and paste it anywhere."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between bold, italic, and bold italic?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Bold text uses thicker Unicode characters for emphasis. Italic text uses slanted Unicode characters for titles or subtle emphasis. Bold italic combines both styles for maximum visual impact. All three are separate Unicode character ranges."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does bold italic text work on all devices?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Bold and italic Unicode characters are supported on virtually all modern devices, including iPhones, Android phones, Windows, Mac, and Linux. Some very old devices or basic fonts may not render every character correctly."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is there a character limit for converting text?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "No, there is no character limit. You can convert as much text as you want. The conversion happens instantly in your browser with no server processing, so it works offline once the page is loaded."
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
                    <li class="text-gold">Bold Italic Text Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Bold Italic Text Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert your text to 𝗯𝗼𝗹𝗱, 𝘪𝘵𝘢𝘭𝘪𝘤, or 𝙗𝙤𝙡𝙙 𝙞𝙩𝙖𝙡𝙞𝙘 instantly. Perfect for social media posts, bios, Discord, and anywhere you want your text to stand out.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Style Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="text-sm text-light-muted mb-3 font-medium">Text Style</div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-2">
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="text-style" value="bold" checked class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝗕𝗼𝗹𝗱</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="text-style" value="italic" class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝘐𝘵𝘢𝘭𝘪𝘤</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="text-style" value="bold-italic" class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝘽𝙤𝙡𝙙 𝙄𝙩𝙖𝙡𝙞𝙘</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="text-style" value="sans-bold" class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝗦𝗮𝗻𝘀 𝗕𝗼𝗹𝗱</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="text-style" value="sans-italic" class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝘚𝘢𝘯𝘴 𝘐𝘵𝘢𝘭𝘪𝘤</span>
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
                        Styled Text
                    </label>
                    <textarea
                        id="text-output"
                        class="w-full min-h-[140px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                        placeholder="Styled text will appear here..."
                        readonly
                    ></textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
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

                {{-- Success Notification --}}
                <div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm"></span>
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

            {{-- Preview Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <h2 class="text-lg font-semibold text-light mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    All Styles Preview
                </h2>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3" id="style-preview-grid">
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 cursor-pointer hover:border-gold/30 transition-colors" data-style="bold">
                        <div class="text-xs text-light-muted mb-1 uppercase tracking-wider">Bold</div>
                        <div id="preview-bold" class="text-light font-mono text-sm break-all">𝗛𝗲𝗹𝗹𝗼 𝗪𝗼𝗿𝗹𝗱</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 cursor-pointer hover:border-gold/30 transition-colors" data-style="italic">
                        <div class="text-xs text-light-muted mb-1 uppercase tracking-wider">Italic</div>
                        <div id="preview-italic" class="text-light font-mono text-sm break-all">𝘏𝘦𝘭𝘭𝘰 𝘞𝘰𝘳𝘭𝘥</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 cursor-pointer hover:border-gold/30 transition-colors" data-style="bold-italic">
                        <div class="text-xs text-light-muted mb-1 uppercase tracking-wider">Bold Italic</div>
                        <div id="preview-bold-italic" class="text-light font-mono text-sm break-all">𝙃𝙚𝙡𝙡𝙤 𝙒𝙤𝙧𝙡𝙙</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 cursor-pointer hover:border-gold/30 transition-colors" data-style="sans-bold">
                        <div class="text-xs text-light-muted mb-1 uppercase tracking-wider">Sans Bold</div>
                        <div id="preview-sans-bold" class="text-light font-mono text-sm break-all">𝗛𝗲𝗹𝗹𝗼 𝗪𝗼𝗿𝗹𝗱</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 cursor-pointer hover:border-gold/30 transition-colors" data-style="sans-italic">
                        <div class="text-xs text-light-muted mb-1 uppercase tracking-wider">Sans Italic</div>
                        <div id="preview-sans-italic" class="text-light font-mono text-sm break-all">𝘏𝘦𝘭𝘭𝘰 𝘞𝘰𝘳𝘭𝘥</div>
                    </div>
                </div>
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">✨</div>
                    <h3 class="text-lg font-semibold text-light mb-2">5 Text Styles</h3>
                    <p class="text-light-muted text-sm">Choose from bold, italic, bold italic, sans bold, and sans italic. All styles use standard Unicode characters that display correctly everywhere.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📋</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Copy & Paste</h3>
                    <p class="text-light-muted text-sm">One-click copy to clipboard. Paste styled text into Twitter, Instagram, LinkedIn, Discord, TikTok, Reddit, or any platform that supports Unicode.</p>
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
                            <span class="text-light font-medium">How does the bold italic text generator work?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The tool maps each letter and number to its Unicode Mathematical Alphanumeric Symbols equivalent. For example, <code class="bg-darkCard px-1 rounded">a</code> in bold becomes <code class="bg-darkCard px-1 rounded">𝗮</code> (U+1D5EE), and in italic becomes <code class="bg-darkCard px-1 rounded">𝘢</code> (U+1D462). These are standard Unicode characters, not images or special fonts.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I use bold italic text on social media?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Bold and italic Unicode text works on most social media platforms including Twitter/X, Facebook, Instagram bios and captions, LinkedIn posts, Discord, TikTok, Reddit, and YouTube comments. Simply copy the styled text and paste it into your post, bio, or message.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between bold, italic, and bold italic?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Bold text (<code class="bg-darkCard px-1 rounded">𝗯𝗼𝗹𝗱</code>) uses thicker Unicode characters for strong emphasis. Italic text (<code class="bg-darkCard px-1 rounded">𝘪𝘵𝘢𝘭𝘪𝘤</code>) uses slanted characters for subtle emphasis or titles. Bold italic (<code class="bg-darkCard px-1 rounded">𝙗𝙤𝙡𝙙 𝙞𝙩𝙖𝙡𝙞𝙘</code>) combines both styles for maximum visual impact. Each uses a separate Unicode character range.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does bold italic text work on all devices?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Bold and italic Unicode characters are supported on virtually all modern devices, including iPhones, Android phones, Windows, Mac, and Linux. All major browsers (Chrome, Firefox, Safari, Edge) display them correctly. Some very old devices may not render every character.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is there a character limit for converting text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            No, there is no character limit. You can convert as much text as you want. The conversion happens instantly in your browser with no server processing, so it works even without an internet connection once the page is loaded.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @include('tools.partials.bold-italic-text-generator-script')
</x-layout>
