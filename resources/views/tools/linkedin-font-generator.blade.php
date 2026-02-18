<x-layout>
    <x-slot:title>LinkedIn Font Generator - Free Online Bold & Italic Fonts | hafiz.dev</x-slot:title>
    <x-slot:description>Free online LinkedIn font generator. Create bold, italic, script, and fancy Unicode fonts for LinkedIn posts, profiles, and comments. Copy and paste instantly. No signup required.</x-slot:description>
    <x-slot:keywords>linkedin font generator, linkedin bold text, linkedin italic text, linkedin fonts, unicode fonts for linkedin, linkedin text formatter, fancy text linkedin, linkedin post fonts</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/linkedin-font-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>LinkedIn Font Generator - Free Online Bold & Italic Fonts | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online LinkedIn font generator. Create bold, italic, script, and fancy Unicode fonts for LinkedIn posts and profiles.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/linkedin-font-generator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "LinkedIn Font Generator",
            "description": "Free online LinkedIn font generator. Create bold, italic, script, and fancy Unicode fonts for LinkedIn posts, profiles, and comments.",
            "url": "https://hafiz.dev/tools/linkedin-font-generator",
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
                { "@@type": "ListItem", "position": 3, "name": "LinkedIn Font Generator", "item": "https://hafiz.dev/tools/linkedin-font-generator" }
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
                    "name": "How do I use bold text on LinkedIn?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "LinkedIn doesn't support native formatting in posts or comments, but you can use Unicode bold characters that look like bold text. Type your text in this generator, select the Bold style, and copy-paste it directly into LinkedIn."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Will these fonts work on LinkedIn mobile and desktop?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! These Unicode fonts work on both LinkedIn mobile app and desktop website. They also work in LinkedIn messages, profile headlines, and the About section."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Are LinkedIn Unicode fonts safe to use?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, these are standard Unicode characters supported by all modern devices and platforms. LinkedIn does not penalize or restrict posts using Unicode fonts. However, use them sparingly for best readability."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I use italic text on LinkedIn?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! While LinkedIn has no built-in italic formatting for posts, you can use Unicode italic characters. Select the Italic style in this generator, type your text, and paste the result into your LinkedIn post or comment."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Do fancy fonts affect LinkedIn post reach or SEO?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Unicode fonts may slightly affect searchability since search engines may not index them the same as regular text. For best results, use fancy fonts for headings or emphasis, and keep the main body in regular text."
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
                    <li class="text-gold">LinkedIn Font Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">LinkedIn Font Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Create bold, italic, script, and fancy Unicode fonts for your LinkedIn posts, profile headline, and comments. Just type, pick a style, and copy!
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Font Style Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="text-sm text-light-muted mb-3 font-medium">Font Style</div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2">
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="font-style" value="bold" checked class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝗕𝗼𝗹𝗱</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="font-style" value="italic" class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝘐𝘵𝘢𝘭𝘪𝘤</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="font-style" value="bold-italic" class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝘽𝙤𝙡𝙙 𝙄𝙩𝙖𝙡𝙞𝙘</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="font-style" value="script" class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝓢𝓬𝓻𝓲𝓹𝓽</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="font-style" value="script-bold" class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝓑𝓸𝓵𝓭 𝓢𝓬𝓻𝓲𝓹𝓽</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="font-style" value="monospace" class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝙼𝚘𝚗𝚘𝚜𝚙𝚊𝚌𝚎</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="font-style" value="double-struck" class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝔻𝕠𝕦𝕓𝕝𝕖</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="font-style" value="fraktur" class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝔉𝔯𝔞𝔨𝔱𝔲𝔯</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="font-style" value="sans-serif" class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝖲𝖺𝗇𝗌</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors has-[:checked]:border-gold has-[:checked]:bg-gold/10">
                            <input type="radio" name="font-style" value="sans-bold" class="w-4 h-4 text-gold bg-darkBg border-gray-600 focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light">𝗦𝗮𝗻𝘀 𝗕𝗼𝗹𝗱</span>
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
                        placeholder="Type or paste your LinkedIn post text here..."
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
                    All Font Styles Preview
                </h2>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3" id="font-preview-grid">
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
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 cursor-pointer hover:border-gold/30 transition-colors" data-style="script">
                        <div class="text-xs text-light-muted mb-1 uppercase tracking-wider">Script</div>
                        <div id="preview-script" class="text-light font-mono text-sm break-all">𝒽ℯ𝓁𝓁ℴ 𝓌ℴ𝓇𝓁𝒹</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 cursor-pointer hover:border-gold/30 transition-colors" data-style="script-bold">
                        <div class="text-xs text-light-muted mb-1 uppercase tracking-wider">Bold Script</div>
                        <div id="preview-script-bold" class="text-light font-mono text-sm break-all">𝓗𝓮𝓵𝓵𝓸 𝓦𝓸𝓻𝓵𝓭</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 cursor-pointer hover:border-gold/30 transition-colors" data-style="monospace">
                        <div class="text-xs text-light-muted mb-1 uppercase tracking-wider">Monospace</div>
                        <div id="preview-monospace" class="text-light font-mono text-sm break-all">𝙷𝚎𝚕𝚕𝚘 𝚆𝚘𝚛𝚕𝚍</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 cursor-pointer hover:border-gold/30 transition-colors" data-style="double-struck">
                        <div class="text-xs text-light-muted mb-1 uppercase tracking-wider">Double-Struck</div>
                        <div id="preview-double-struck" class="text-light font-mono text-sm break-all">ℍ𝕖𝕝𝕝𝕠 𝕎𝕠𝕣𝕝𝕕</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 cursor-pointer hover:border-gold/30 transition-colors" data-style="fraktur">
                        <div class="text-xs text-light-muted mb-1 uppercase tracking-wider">Fraktur</div>
                        <div id="preview-fraktur" class="text-light font-mono text-sm break-all">ℌ𝔢𝔩𝔩𝔬 𝔚𝔬𝔯𝔩𝔡</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 cursor-pointer hover:border-gold/30 transition-colors" data-style="sans-serif">
                        <div class="text-xs text-light-muted mb-1 uppercase tracking-wider">Sans-Serif</div>
                        <div id="preview-sans-serif" class="text-light font-mono text-sm break-all">𝖧𝖾𝗅𝗅𝗈 𝖶𝗈𝗋𝗅𝖽</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 cursor-pointer hover:border-gold/30 transition-colors" data-style="sans-bold">
                        <div class="text-xs text-light-muted mb-1 uppercase tracking-wider">Sans Bold</div>
                        <div id="preview-sans-bold" class="text-light font-mono text-sm break-all">𝗛𝗲𝗹𝗹𝗼 𝗪𝗼𝗿𝗹𝗱</div>
                    </div>
                </div>
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">✨</div>
                    <h3 class="text-lg font-semibold text-light mb-2">10 Font Styles</h3>
                    <p class="text-light-muted text-sm">Choose from bold, italic, script, monospace, double-struck, fraktur, and more. All fonts use Unicode characters that work everywhere.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📋</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Copy & Paste</h3>
                    <p class="text-light-muted text-sm">One-click copy to clipboard. Paste styled text directly into LinkedIn posts, headlines, comments, messages, and your About section.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">Everything runs in your browser. No data is sent to any server. Your LinkedIn content stays completely private and secure.</p>
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
                            <span class="text-light font-medium">How do I use bold text on LinkedIn?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            LinkedIn doesn't support native formatting in posts or comments, but you can use Unicode bold characters that look like bold text. Type your text in this generator, select the <strong>Bold</strong> style, and copy-paste it directly into LinkedIn. It works in posts, comments, headlines, and the About section.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Will these fonts work on LinkedIn mobile and desktop?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! These Unicode fonts work on both the LinkedIn mobile app and desktop website. They also work in LinkedIn messages, profile headlines, the About section, and anywhere text is supported on the platform.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Are LinkedIn Unicode fonts safe to use?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, these are standard Unicode characters supported by all modern devices and platforms. LinkedIn does not penalize or restrict posts using Unicode fonts. However, use them sparingly for best readability. Bold for headings and italic for emphasis works great.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I use italic text on LinkedIn?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! While LinkedIn has no built-in italic formatting for posts, you can use Unicode italic characters. Select the <strong>Italic</strong> style in this generator, type your text, and paste the result into your LinkedIn post or comment. It renders as italic on all devices.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Do fancy fonts affect LinkedIn post reach or SEO?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Unicode fonts may slightly affect searchability since LinkedIn's search may not index them the same as regular text. For best results, use fancy fonts for headings or key phrases, and keep the main body of your post in regular text. This gives you the visual impact without hurting discoverability.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @include('tools.partials.linkedin-font-generator-script')
</x-layout>
