<x-layout>
    <x-slot:title>AI ASCII Art Generator - Free Online Text to ASCII Art | hafiz.dev</x-slot:title>
    <x-slot:description>Free online AI ASCII art generator. Convert any text to stunning ASCII art with 15+ font styles instantly in your browser. No signup required.</x-slot:description>
    <x-slot:keywords>ascii art generator, text to ascii art, ascii art, ascii text generator, figlet generator, text art generator, free ascii art generator online</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/ai-ascii-art-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>AI ASCII Art Generator - Free Online Text to ASCII Art | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online AI ASCII art generator. Convert any text to stunning ASCII art with 15+ font styles instantly in your browser.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/ai-ascii-art-generator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "AI ASCII Art Generator",
            "description": "Free online AI ASCII art generator. Convert any text to stunning ASCII art with multiple font styles instantly.",
            "url": "https://hafiz.dev/tools/ai-ascii-art-generator",
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
                { "@@type": "ListItem", "position": 3, "name": "AI ASCII Art Generator", "item": "https://hafiz.dev/tools/ai-ascii-art-generator" }
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
                    "name": "How does the ASCII art generator work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The tool converts each character of your input text into large block-letter patterns made from ASCII characters. It supports 15+ font styles including standard, block, shadow, and banner fonts. Everything runs in your browser with no server processing."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What font styles are available?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The generator includes 15+ built-in fonts: Standard, Block, Shadow, Banner, Big, Slant, Mini, Small, Lean, Ivrit, Script, Bubble, Digital, Graffiti, and more. Each font creates a unique visual style for your ASCII art."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I use the ASCII art on social media and Discord?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! ASCII art works anywhere that supports monospace or plain text. Wrap it in a code block on Discord, Reddit, or Slack for best results. You can also use it in email signatures, comments, and README files."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is there a character limit for generating ASCII art?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "For best results, keep your text under 20 characters. Longer text will still work but may be very wide. The tool runs entirely in your browser, so there is no hard limit on input length."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is this tool really free?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, this ASCII art generator is 100% free with no signup, no ads, and no usage limits. It runs entirely in your browser so your text stays private and is never sent to any server."
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
                    <li class="text-gold">AI ASCII Art Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">AI ASCII Art Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert any text into stunning ASCII art with 15+ font styles. Perfect for Discord, README files, code comments, and social media.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <label for="font-select" class="text-light font-semibold mb-2 block text-sm">Font Style</label>
                            <select id="font-select" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="standard" selected>Standard</option>
                                <option value="block">Block</option>
                                <option value="shadow">Shadow</option>
                                <option value="banner">Banner</option>
                                <option value="big">Big</option>
                                <option value="slant">Slant</option>
                                <option value="mini">Mini</option>
                                <option value="small">Small</option>
                                <option value="lean">Lean</option>
                                <option value="script">Script</option>
                                <option value="bubble">Bubble</option>
                                <option value="digital">Digital</option>
                                <option value="ivrit">Ivrit (Mirror)</option>
                                <option value="graffiti">Graffiti</option>
                                <option value="doom">Doom</option>
                            </select>
                        </div>
                        <div>
                            <label for="char-width" class="text-light font-semibold mb-2 block text-sm">Horizontal Spacing</label>
                            <select id="char-width" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="fitted">Fitted (tight)</option>
                                <option value="default" selected>Default</option>
                                <option value="wide">Wide</option>
                            </select>
                        </div>
                        <div>
                            <label for="output-char" class="text-light font-semibold mb-2 block text-sm">Custom Character</label>
                            <input type="text" id="output-char" maxlength="1" placeholder="Leave empty for default" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none placeholder-light-muted/50">
                        </div>
                    </div>
                </div>

                {{-- Input / Output --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    {{-- Input --}}
                    <div class="flex flex-col">
                        <label for="text-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Text Input
                        </label>
                        <textarea
                            id="text-input"
                            class="w-full min-h-[200px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-y"
                            style="resize: vertical;"
                            placeholder="Type your text here..."
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output --}}
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            ASCII Art Output
                        </label>
                        <textarea
                            id="text-output"
                            class="w-full min-h-[200px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-xs text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-y leading-none"
                            style="resize: vertical;"
                            placeholder="ASCII art will appear here..."
                            readonly
                        ></textarea>
                    </div>
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
                            <div id="stat-lines" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Lines</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-width" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Max Width</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-chars" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Characters</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-font" class="text-2xl font-bold text-light mb-1">-</div>
                            <div class="text-light-muted text-sm">Font</div>
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
                    <div class="text-gold text-2xl mb-3">🎨</div>
                    <h3 class="text-lg font-semibold text-light mb-2">15+ Font Styles</h3>
                    <p class="text-light-muted text-sm">Choose from Standard, Block, Shadow, Banner, Big, Slant, Doom, Graffiti, and many more built-in ASCII art fonts.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant Generation</h3>
                    <p class="text-light-muted text-sm">Generate ASCII art in milliseconds. Everything runs in your browser with no server calls and no waiting.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">Your text is never sent to any server. All conversion happens locally in your browser, keeping your content completely private.</p>
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
                            <span class="text-light font-medium">How does the ASCII art generator work?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The tool converts each character of your text into large block-letter patterns made from ASCII characters. Each font style defines how letters are drawn using characters like <code class="bg-darkCard px-1 rounded">#</code>, <code class="bg-darkCard px-1 rounded">|</code>, <code class="bg-darkCard px-1 rounded">/</code>, and <code class="bg-darkCard px-1 rounded">_</code>. The patterns are combined side by side to form the final output. Everything runs in your browser.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What font styles are available?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The generator includes 15 built-in fonts: Standard, Block, Shadow, Banner, Big, Slant, Mini, Small, Lean, Script, Bubble, Digital, Ivrit (mirrored), Graffiti, and Doom. Each font creates a unique visual style for your ASCII art. Try different fonts to find the one that best suits your needs.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I use ASCII art on Discord and social media?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! ASCII art works great on Discord (wrap in triple backticks for a code block), Reddit, Slack, and other platforms. It also looks great in GitHub README files, code comments, terminal banners, and email signatures. Just copy and paste the output wherever you need it.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is there a character limit for the input text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            There is no hard character limit. However, for best results, keep your text under 20 characters since ASCII art letters are wide and longer text may become hard to read. The tool runs entirely in your browser, so performance depends only on your device.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is this ASCII art generator really free?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, 100% free with no signup, no ads, and no usage limits. The tool converts text to ASCII art entirely in your browser, so your data stays private and is never sent to any server. Use it as much as you want.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        // ========== FIGlet-style ASCII Art Font Definitions ==========
        // Each font maps characters to arrays of strings (one per line height)

        const FONTS = {};

        // --- Standard font (height 6) ---
        FONTS.standard = {
            height: 6,
            chars: {
                'A': [
                    '    _    ',
                    '   / \\   ',
                    '  / _ \\  ',
                    ' / ___ \\ ',
                    '/_/   \\_\\',
                    '         '
                ],
                'B': [
                    ' ____  ',
                    '| __ ) ',
                    '|  _ \\ ',
                    '| |_) |',
                    '|____/ ',
                    '       '
                ],
                'C': [
                    '  ____ ',
                    ' / ___|',
                    '| |    ',
                    '| |___ ',
                    ' \\____|',
                    '       '
                ],
                'D': [
                    ' ____  ',
                    '|  _ \\ ',
                    '| | | |',
                    '| |_| |',
                    '|____/ ',
                    '       '
                ],
                'E': [
                    ' _____ ',
                    '| ____|',
                    '|  _|  ',
                    '| |___ ',
                    '|_____|',
                    '       '
                ],
                'F': [
                    ' _____ ',
                    '|  ___|',
                    '| |_   ',
                    '|  _|  ',
                    '|_|    ',
                    '       '
                ],
                'G': [
                    '  ____ ',
                    ' / ___|',
                    '| |  _ ',
                    '| |_| |',
                    ' \\____|',
                    '       '
                ],
                'H': [
                    ' _   _ ',
                    '| | | |',
                    '| |_| |',
                    '|  _  |',
                    '|_| |_|',
                    '       '
                ],
                'I': [
                    ' ___ ',
                    '|_ _|',
                    ' | | ',
                    ' | | ',
                    '|___|',
                    '     '
                ],
                'J': [
                    '     _ ',
                    '    | |',
                    ' _  | |',
                    '| |_| |',
                    ' \\___/ ',
                    '       '
                ],
                'K': [
                    ' _  __',
                    '| |/ /',
                    '| \' / ',
                    '| . \\ ',
                    '|_|\\_\\',
                    '      '
                ],
                'L': [
                    ' _     ',
                    '| |    ',
                    '| |    ',
                    '| |___ ',
                    '|_____|',
                    '       '
                ],
                'M': [
                    ' __  __ ',
                    '|  \\/  |',
                    '| |\\/| |',
                    '| |  | |',
                    '|_|  |_|',
                    '        '
                ],
                'N': [
                    ' _   _ ',
                    '| \\ | |',
                    '|  \\| |',
                    '| |\\  |',
                    '|_| \\_|',
                    '       '
                ],
                'O': [
                    '  ___  ',
                    ' / _ \\ ',
                    '| | | |',
                    '| |_| |',
                    ' \\___/ ',
                    '       '
                ],
                'P': [
                    ' ____  ',
                    '|  _ \\ ',
                    '| |_) |',
                    '|  __/ ',
                    '|_|    ',
                    '       '
                ],
                'Q': [
                    '  ___  ',
                    ' / _ \\ ',
                    '| | | |',
                    '| |_| |',
                    ' \\__\\_\\',
                    '       '
                ],
                'R': [
                    ' ____  ',
                    '|  _ \\ ',
                    '| |_) |',
                    '|  _ < ',
                    '|_| \\_\\',
                    '       '
                ],
                'S': [
                    ' ____  ',
                    '/ ___| ',
                    '\\___ \\ ',
                    ' ___) |',
                    '|____/ ',
                    '       '
                ],
                'T': [
                    ' _____ ',
                    '|_   _|',
                    '  | |  ',
                    '  | |  ',
                    '  |_|  ',
                    '       '
                ],
                'U': [
                    ' _   _ ',
                    '| | | |',
                    '| | | |',
                    '| |_| |',
                    ' \\___/ ',
                    '       '
                ],
                'V': [
                    '__     __',
                    '\\ \\   / /',
                    ' \\ \\ / / ',
                    '  \\ V /  ',
                    '   \\_/   ',
                    '         '
                ],
                'W': [
                    '__        __',
                    '\\ \\      / /',
                    ' \\ \\ /\\ / / ',
                    '  \\ V  V /  ',
                    '   \\_/\\_/   ',
                    '            '
                ],
                'X': [
                    '__  __',
                    '\\ \\/ /',
                    ' \\  / ',
                    ' /  \\ ',
                    '/_/\\_\\',
                    '      '
                ],
                'Y': [
                    '__   __',
                    '\\ \\ / /',
                    ' \\ V / ',
                    '  | |  ',
                    '  |_|  ',
                    '       '
                ],
                'Z': [
                    ' _____',
                    '|__  /',
                    '  / / ',
                    ' / /_ ',
                    '/____|',
                    '      '
                ],
                '0': [
                    '  ___  ',
                    ' / _ \\ ',
                    '| | | |',
                    '| |_| |',
                    ' \\___/ ',
                    '       '
                ],
                '1': [
                    ' _ ',
                    '/ |',
                    '| |',
                    '| |',
                    '|_|',
                    '   '
                ],
                '2': [
                    ' ____  ',
                    '|___ \\ ',
                    '  __) |',
                    ' / __/ ',
                    '|_____|',
                    '       '
                ],
                '3': [
                    ' _____ ',
                    '|___ / ',
                    '  |_ \\ ',
                    ' ___) |',
                    '|____/ ',
                    '       '
                ],
                '4': [
                    ' _  _   ',
                    '| || |  ',
                    '| || |_ ',
                    '|__   _|',
                    '   |_|  ',
                    '        '
                ],
                '5': [
                    ' ____  ',
                    '| ___| ',
                    '|___ \\ ',
                    ' ___) |',
                    '|____/ ',
                    '       '
                ],
                '6': [
                    '  __   ',
                    ' / /_  ',
                    '| \'_ \\ ',
                    '| (_) |',
                    ' \\___/ ',
                    '       '
                ],
                '7': [
                    ' _____ ',
                    '|___  |',
                    '   / / ',
                    '  / /  ',
                    ' /_/   ',
                    '       '
                ],
                '8': [
                    '  ___  ',
                    ' ( _ ) ',
                    ' / _ \\ ',
                    '| (_) |',
                    ' \\___/ ',
                    '       '
                ],
                '9': [
                    '  ___  ',
                    ' / _ \\ ',
                    '| (_) |',
                    ' \\__, |',
                    '   /_/ ',
                    '       '
                ],
                ' ': [
                    '   ',
                    '   ',
                    '   ',
                    '   ',
                    '   ',
                    '   '
                ],
                '!': [
                    ' _ ',
                    '| |',
                    '| |',
                    '|_|',
                    '(_)',
                    '   '
                ],
                '?': [
                    ' ___ ',
                    '|__ \\',
                    '  / /',
                    ' |_| ',
                    ' (_) ',
                    '     '
                ],
                '.': [
                    '   ',
                    '   ',
                    '   ',
                    ' _ ',
                    '(_)',
                    '   '
                ],
                ',': [
                    '   ',
                    '   ',
                    '   ',
                    ' _ ',
                    '( )',
                    '|/ '
                ],
                '-': [
                    '       ',
                    '       ',
                    ' _____ ',
                    '|_____|',
                    '       ',
                    '       '
                ],
                '_': [
                    '        ',
                    '        ',
                    '        ',
                    '        ',
                    ' ______ ',
                    '|______|'
                ],
                '@': [
                    '   ____  ',
                    '  / __ \\ ',
                    ' / / _` |',
                    '| | (_| |',
                    ' \\ \\__,_|',
                    '  \\____/ '
                ],
                '#': [
                    '   _  _   ',
                    ' _| || |_ ',
                    '|_  ..  _|',
                    '|_      _|',
                    '  |_||_|  ',
                    '          '
                ],
                '/': [
                    '    __',
                    '   / /',
                    '  / / ',
                    ' / /  ',
                    '/_/   ',
                    '      '
                ],
                ':': [
                    '   ',
                    ' _ ',
                    '(_)',
                    ' _ ',
                    '(_)',
                    '   '
                ],
                ';': [
                    '   ',
                    ' _ ',
                    '(_)',
                    ' _ ',
                    '( )',
                    '|/ '
                ],
                '+': [
                    '       ',
                    '   _   ',
                    ' _| |_ ',
                    '|_   _|',
                    '  |_|  ',
                    '       '
                ],
                '=': [
                    '       ',
                    ' _____ ',
                    '|_____|',
                    '|_____|',
                    '       ',
                    '       '
                ],
                '(': [
                    '  __',
                    ' / /',
                    '| | ',
                    '| | ',
                    '| | ',
                    ' \\_\\'
                ],
                ')': [
                    '__  ',
                    '\\ \\ ',
                    ' | |',
                    ' | |',
                    ' | |',
                    '/_/ '
                ],
                '\'': [
                    ' _ ',
                    '( )',
                    '|/ ',
                    '   ',
                    '   ',
                    '   '
                ],
                '"': [
                    ' _ _ ',
                    '( | )',
                    ' V V ',
                    '     ',
                    '     ',
                    '     '
                ],
                '*': [
                    '      ',
                    ' __/\\__',
                    ' \\    /',
                    ' /_  _\\',
                    '   \\/  ',
                    '       '
                ],
                '&': [
                    '        ',
                    '  ___   ',
                    ' ( _ )  ',
                    ' / _ \\/\\',
                    '| (_>  <',
                    ' \\___/\\/'
                ]
            }
        };

        // --- Block font (height 7) ---
        FONTS.block = {
            height: 7,
            chars: {}
        };
        (function() {
            const blockTemplate = function(lines) { return lines; };
            const a_z = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            const blockDefs = {
                'A': [' _______  ','|   _   | ','|  |_|  | ','|   _   | ','|  | |  | ','|__| |__| ','          '],
                'B': [' _______  ','|   _   \\ ','|  |_|  / ','|   _   \\ ','|  |_|  / ','|_______/ ','          '],
                'C': [' _______  ','|   ____| ','|  |      ','|  |      ','|  |____  ','|_______| ','          '],
                'D': [' ______   ','|   _  \\  ','|  | |  | ','|  | |  | ','|  |_|  / ','|______/  ','          '],
                'E': [' _______  ','|   ____| ','|  |__    ','|   __|   ','|  |____  ','|_______| ','          '],
                'F': [' _______  ','|   ____| ','|  |__    ','|   __|   ','|  |      ','|__|      ','          '],
                'G': [' _______  ','|   ____| ','|  |  __  ','|  | |  | ','|  |_|  | ','|_______| ','          '],
                'H': [' _   _    ','| | | |   ','| |_| |   ','|  _  |   ','| | | |   ','|_| |_|   ','          '],
                'I': [' _____  ','|_   _| ','  | |   ','  | |   ','  | |   ','|_____|  ','         '],
                'J': [' _______  ','|___   _| ','    | |   ',' _  | |   ','| |_| |   ','|_____|   ','          '],
                'K': [' _   __   ','| | / /   ','| |/ /    ','|   /     ','| |\\ \\    ','|_| \\_\\   ','          '],
                'L': [' _        ','| |       ','| |       ','| |       ','| |____   ','|______|  ','          '],
                'M': [' __    __ ','|  \\  /  |','|   \\/   |','| |\\  /| |','| | \\/ | |','|_|    |_|','          '],
                'N': [' __    _  ','|  \\  | | ','|   \\ | | ','| |\\ \\| | ','| | \\   | ','|_|  \\__| ','          '],
                'O': [' _______  ','|   _   | ','|  | |  | ','|  | |  | ','|  |_|  | ','|_______| ','          '],
                'P': [' _______  ','|   _   \\ ','|  |_|  / ','|   ___/  ','|  |      ','|__|      ','          '],
                'Q': [' _______  ','|   _   | ','|  | |  | ','|  | |  | ','|  |_| /  ','|______\\_\\','          '],
                'R': [' _______  ','|   _   \\ ','|  |_|  / ','|   _  /  ','|  | \\ \\  ','|__| \\_\\ ','          '],
                'S': [' _______  ','|   ____| ','\\_____  \\ ',' _____|  |','|_______/ ','          ','          '],
                'T': [' _______  ','|__   __| ','   | |    ','   | |    ','   | |    ','   |_|    ','          '],
                'U': [' _     _  ','| |   | | ','| |   | | ','| |   | | ','| |___| | ','|_______| ','          '],
                'V': [' _     _  ','| |   | | ','| |   | | ','\\ \\   / / ',' \\ \\_/ /  ','  \\___/   ','          '],
                'W': [' _     _  ','| |   | | ','| | _ | | ','| |/ \\| | ','|   _   | ','|__/ \\__| ','          '],
                'X': [' _     _  ','| |   | | ','\\ \\_/ /  ','  > _ <   ',' / / \\ \\  ','|_|   |_| ','          '],
                'Y': [' _     _  ','| |   | | ','\\ \\_/ /  ',' \\   /   ','  | |     ','  |_|     ','          '],
                'Z': [' ________ ','|___   _| ','   / /    ','  / /     ',' / /____  ','|________|','          '],
                ' ': ['     ','     ','     ','     ','     ','     ','     ']
            };
            for (let c in blockDefs) FONTS.block.chars[c] = blockDefs[c];
            // Numbers and lowercase map to uppercase
        })();

        // --- Shadow font (height 7) ---
        FONTS.shadow = {
            height: 7,
            chars: {}
        };
        (function() {
            const shadowDefs = {
                'A': ['      ','  /\\  ',' /  \\ ','/ /\\ \\','| |  | |','|_|  |_|','       '],
                'B': ['____  ','| _ \\ ','||_) |','|  _ <','| |_) |','|____/ ','       '],
                'C': [' ____ ','/ ___|','| |   ','| |___','\\____|','      ','      '],
                'D': [' ____  ','|  _ \\ ','| | | |','| |_| |','|____/ ','       ','       '],
                'E': [' _____ ','| ____|','|  _|_ ','| |___ ','|_____|','       ','       '],
                'F': [' _____ ','|  ___|','| |_   ','|  _|  ','|_|    ','       ','       '],
                'G': [' ____ ','/ ___|','| |  _','| |_| |','\\____|','      ','      '],
                'H': [' _   _ ','| | | |','| |_| |','|  _  |','|_| |_|','       ','       '],
                'I': [' ___ ','|_ _|',' | | ',' | | ','|___|','     ','     '],
                'J': ['     _ ','    | |',' _  | |','| |_| |',' \\___/ ','       ','       '],
                'K': [' _  __','| |/ /','| \' / ','| . \\ ','|_|\\_\\','      ','      '],
                'L': [' _     ','| |    ','| |    ','| |___ ','|_____|','       ','       '],
                'M': [' __  __ ','|  \\/  |','| |\\/| |','| |  | |','|_|  |_|','        ','        '],
                'N': [' _   _ ','| \\ | |','|  \\| |','| |\\  |','|_| \\_|','       ','       '],
                'O': [' ___  ',' / _ \\ ','| | | |','| |_| |',' \\___/ ','       ','       '],
                'P': [' ____  ','|  _ \\ ','| |_) |','|  __/ ','|_|    ','       ','       '],
                'Q': [' ___  ',' / _ \\ ','| | | |','| |_| |',' \\__\\_\\','       ','       '],
                'R': [' ____  ','|  _ \\ ','| |_) |','|  _ < ','|_| \\_\\','       ','       '],
                'S': [' ____  ','/ ___| ','\\___ \\ ',' ___) |','|____/ ','       ','       '],
                'T': [' _____ ','|_   _|','  | |  ','  | |  ','  |_|  ','       ','       '],
                'U': [' _   _ ','| | | |','| | | |','| |_| |',' \\___/ ','       ','       '],
                'V': ['__     __','\\ \\   / /',' \\ \\ / / ','  \\ V /  ','   \\_/   ','         ','         '],
                'W': ['__        __','\\ \\      / /',' \\ \\ /\\ / / ','  \\ V  V /  ','   \\_/\\_/   ','            ','            '],
                'X': ['__  __','\\ \\/ /',' \\  / ',' /  \\ ','/_/\\_\\','      ','      '],
                'Y': ['__   __','\\ \\ / /',' \\ V / ','  | |  ','  |_|  ','       ','       '],
                'Z': [' _____','|__  /','  / / ',' / /_ ','/____|','      ','      '],
                ' ': ['   ','   ','   ','   ','   ','   ','   ']
            };
            for (let c in shadowDefs) FONTS.shadow.chars[c] = shadowDefs[c];
        })();

        // --- Big font (height 8) ---
        FONTS.big = {
            height: 8,
            chars: {}
        };
        (function() {
            const bigDefs = {
                'A': ['         ','   /\\    ','  /  \\   ',' / /\\ \\  ','/ /__\\ \\ ','/ /    \\ \\','/_/      \\_\\','           '],
                'B': ['______  ','| ___ \\ ','| |_/ / ','| ___ \\ ','| |_/ / ','|_____/ ','        ','        '],
                'C': [' _______ ','/ _____ \\','| /     |','| |      ','| \\_____/','\\_______ ','         ','         '],
                'D': ['______  ','|  _  \\ ','| | | | ','| | | | ','| |/ /  ','|___/   ','        ','        '],
                'E': ['_______ ','|  ___| ','| |__   ','|  __|  ','| |___  ','|_____| ','        ','        '],
                'F': ['_______ ','|  ___| ','| |__   ','|  __|  ','| |     ','|_|     ','        ','        '],
                'G': [' _______ ','|  _____|','| |  __  ','| | |_ | ','| |__| | ','|______| ','         ','         '],
                'H': ['_     _ ','| |   | |','| |___| |','|  ___  |','| |   | |','|_|   |_|','        ','        '],
                'I': ['_____ ','|_   _|','  | |  ','  | |  ','  | |  ','|_____|','       ','       '],
                'J': ['    ___ ','   |_  |','     | |','     | |',' /\\__| |',' \\____/ ','        ','        '],
                'K': ['_     _ ','| |  / /','| | / / ','| |< <  ','| | \\ \\ ','|_|  \\_\\','        ','        '],
                'L': ['_       ','| |      ','| |      ','| |      ','| |_____ ','|_______|','         ','         '],
                'M': ['__     __ ','|  \\  /  |','| |\\/ /| |','| |  / | |','| | /  | |','|_|/   |_|','          ','          '],
                'N': ['__     _ ','|  \\  | |','| |\\  | |','| | \\ | |','| |  \\| |','|_|   \\_|','         ','         '],
                'O': [' _______ ','|  ___  |','| |   | |','| |   | |','| |___| |','|_______|','         ','         '],
                'P': ['_______ ','|  __  \\','| |__| |','|  ____/','| |     ','|_|     ','        ','        '],
                'Q': [' _______ ','|  ___  |','| |   | |','| | /\\| |','| |/ \\| |','\\_____\\_\\','         ','         '],
                'R': ['_______ ','|  __  \\','| |__| |','|  _  / ','| | \\ \\ ','|_|  \\_\\','        ','        '],
                'S': ['_______ ','/ _____|','\\_____\\\\','  _____)','/_____/ ','        ','        ','        '],
                'T': ['_______ ','|__   __|','   | |   ','   | |   ','   | |   ','   |_|   ','         ','         '],
                'U': ['_     _ ','| |   | |','| |   | |','| |   | |','| |___| |','\\_____/ ','        ','        '],
                'V': ['_       _ ','| |     | |','\\ \\   / / ',' \\ \\ / /  ','  \\ V /   ','   \\_/    ','          ','          '],
                'W': ['_       _ ','| |     | |','| | _ | |  ','| |/ \\| |  ','|   _   |  ','|__/ \\__|  ','           ','           '],
                'X': ['_     _ ','| |   | |','\\ \\ / / ',' > _ <  ','/ / \\ \\ ','|_|  |_|','        ','        '],
                'Y': ['_     _ ','| |   | |','\\ \\ / / ',' \\ V /  ','  | |   ','  |_|   ','        ','        '],
                'Z': ['_______ ','|___  / ','   / /  ','  / /   ',' / /__  ','|______|','        ','        '],
                ' ': ['    ','    ','    ','    ','    ','    ','    ','    ']
            };
            for (let c in bigDefs) FONTS.big.chars[c] = bigDefs[c];
        })();

        // --- Mini font (height 4) ---
        FONTS.mini = {
            height: 4,
            chars: {}
        };
        (function() {
            const miniDefs = {
                'A': [' _  ','|_| ','| | ','    '],
                'B': ['_  ','|_)','|_)','   '],
                'C': [' _ ','|  ','|_ ','   '],
                'D': ['_  ','| \\','|_/','   '],
                'E': [' _ ','|_ ','|_ ','   '],
                'F': [' _ ','|_ ','|  ','   '],
                'G': [' _ ','|  ','|] ','   '],
                'H': ['   ','|_|','| |','   '],
                'I': ['_ ','| ','| ','  '],
                'J': [' _ ',' | ','_| ','   '],
                'K': ['   ','|/ ','|\\ ','   '],
                'L': ['   ','|  ','|_ ','   '],
                'M': ['    ','|\\/|','|  |','    '],
                'N': ['    ','|\\ |','| \\|','    '],
                'O': [' _ ','| |','|_|','   '],
                'P': ['_  ','|_)','|  ','   '],
                'Q': [' _ ','| |','|_\\','   '],
                'R': ['_  ','|_)','| \\','   '],
                'S': [' _ ','|_ ',' _|','   '],
                'T': ['___',' | ',' | ','   '],
                'U': ['   ','| |','|_|','   '],
                'V': ['    ','\\ / ',' V  ','    '],
                'W': ['     ','|   |','|_|_|','     '],
                'X': ['   ','\\/ ','/\\ ','   '],
                'Y': ['   ','\\/ ',' | ','   '],
                'Z': ['__ ',' / ','/__','   '],
                ' ': ['  ','  ','  ','  ']
            };
            for (let c in miniDefs) FONTS.mini.chars[c] = miniDefs[c];
        })();

        // --- Small font (height 5) ---
        FONTS.small = {
            height: 5,
            chars: {}
        };
        (function() {
            const smallDefs = {
                'A': ['  _   ','/ \\  ','/   \\ ','| - |','|   |'],
                'B': ['___  ','| _ \\','||_)/','| _ \\','|___/'],
                'C': [' ___ ','/ __|','| |  ','| |__','\\___/'],
                'D': [' __  ','| _\\ ','||  |','||  |','|__/ '],
                'E': [' ___ ','| __|','| _| ','| |__','|___|'],
                'F': [' ___ ','| __|','| _| ','|_|  ','     '],
                'G': [' ___ ','/ __|','| (_ ','\\__| ','     '],
                'H': [' _ _ ','| | |','| _ |','|_|_|','     '],
                'I': [' _ ','| |','| |','| |','|_|'],
                'J': [' ___ ','|_  |',' _| |','| __|','\\_/ '],
                'K': [' _ __','| |/ ','| \'< ','| |\\ ','|_|\\_'],
                'L': [' _   ','| |  ','| |  ','| |__','|____|'],
                'M': [' __  __ ','|  \\/  |','| |\\/| |','| |  | |','|_|  |_|'],
                'N': [' _  _ ','| \\| |','| .` |','|_|\\_|','      '],
                'O': [' ___  ','/ _ \\ ','| (_)|','\\___/ ','      '],
                'P': [' ___ ','| _ \\','| __/','|_|  ','     '],
                'Q': [' ___  ','/ _ \\ ','| (_)|','\\__\\_\\','      '],
                'R': [' ___ ','| _ \\','|   /','|_\\_\\','     '],
                'S': [' ___ ','/ __|','\\__ \\','|___/','     '],
                'T': [' ___ ','|___|',' | | ',' |_| ','     '],
                'U': [' _  _ ','| || |','| || |','\\____|','      '],
                'V': ['__   __','\\ \\ / /',' \\_V/ ','      ','      '],
                'W': ['__      __','\\ \\    / /','  \\/\\/\\/  ','          ','          '],
                'X': ['__ __','\\  / ',' \\/ ',' /\\ ','/_\\_\\'],
                'Y': ['_   _','\\ | /','  V  ',' | | ',' |_| '],
                'Z': ['_____','|__ /','  / /','/ /_ ','/____|'],
                ' ': ['   ','   ','   ','   ','   ']
            };
            for (let c in smallDefs) FONTS.small.chars[c] = smallDefs[c];
        })();

        // --- Banner font (height 7) - uses # characters ---
        FONTS.banner = {
            height: 7,
            chars: {}
        };
        (function() {
            const bannerDefs = {
                'A': ['   #   ','  # #  ',' #   # ','#     #','#######','#     #','#     #'],
                'B': ['###### ','#     #','#     #','###### ','#     #','#     #','###### '],
                'C': [' ##### ','#     #','#      ','#      ','#      ','#     #',' ##### '],
                'D': ['###### ','#     #','#     #','#     #','#     #','#     #','###### '],
                'E': ['#######','#      ','#      ','#####  ','#      ','#      ','#######'],
                'F': ['#######','#      ','#      ','#####  ','#      ','#      ','#      '],
                'G': [' ##### ','#     #','#      ','#  ####','#     #','#     #',' ##### '],
                'H': ['#     #','#     #','#     #','#######','#     #','#     #','#     #'],
                'I': ['###',' # ',' # ',' # ',' # ',' # ','###'],
                'J': ['      #','      #','      #','      #','#     #','#     #',' ##### '],
                'K': ['#    # ','#   #  ','#  #   ','###    ','#  #   ','#   #  ','#    # '],
                'L': ['#      ','#      ','#      ','#      ','#      ','#      ','#######'],
                'M': ['#     #','##   ##','# # # #','#  #  #','#     #','#     #','#     #'],
                'N': ['#     #','##    #','# #   #','#  #  #','#   # #','#    ##','#     #'],
                'O': [' ##### ','#     #','#     #','#     #','#     #','#     #',' ##### '],
                'P': ['###### ','#     #','#     #','###### ','#      ','#      ','#      '],
                'Q': [' ##### ','#     #','#     #','#     #','#   # #','#    # ',' #### #'],
                'R': ['###### ','#     #','#     #','###### ','#   #  ','#    # ','#     #'],
                'S': [' ##### ','#     #','#      ',' ##### ','      #','#     #',' ##### '],
                'T': ['#######','   #   ','   #   ','   #   ','   #   ','   #   ','   #   '],
                'U': ['#     #','#     #','#     #','#     #','#     #','#     #',' ##### '],
                'V': ['#     #','#     #','#     #','#     #',' #   # ','  # #  ','   #   '],
                'W': ['#     #','#     #','#  #  #','#  #  #','#  #  #','#  #  #',' ## ## '],
                'X': ['#     #',' #   # ','  # #  ','   #   ','  # #  ',' #   # ','#     #'],
                'Y': ['#     #',' #   # ','  # #  ','   #   ','   #   ','   #   ','   #   '],
                'Z': ['#######','     # ','    #  ','   #   ','  #    ',' #     ','#######'],
                ' ': ['    ','    ','    ','    ','    ','    ','    '],
                '0': [' ##### ','#     #','#   # #','#  #  #','# #   #','#     #',' ##### '],
                '1': ['  #  ',' ##  ','  #  ','  #  ','  #  ','  #  ','#####'],
                '2': [' ##### ','#     #','      #',' ##### ','#      ','#      ','#######'],
                '3': [' ##### ','#     #','      #',' ##### ','      #','#     #',' ##### '],
                '4': ['#      ','#    # ','#    # ','#######','     # ','     # ','     # '],
                '5': ['#######','#      ','#      ','###### ','      #','#     #',' ##### '],
                '6': [' ##### ','#     #','#      ','###### ','#     #','#     #',' ##### '],
                '7': ['#######','#    # ','    #  ','   #   ','  #    ','  #    ','  #    '],
                '8': [' ##### ','#     #','#     #',' ##### ','#     #','#     #',' ##### '],
                '9': [' ##### ','#     #','#     #',' ######','      #','#     #',' ##### '],
                '!': [' # ',' # ',' # ',' # ',' # ','   ',' # '],
                '?': [' ##### ','#     #','      #','   ## ','   #   ','       ','   #   '],
                '.': ['   ','   ','   ','   ','   ','   ',' # '],
                '-': ['       ','       ','       ','#######','       ','       ','       '],
                ',': ['   ','   ','   ','   ',' # ',' # ','#  ']
            };
            for (let c in bannerDefs) FONTS.banner.chars[c] = bannerDefs[c];
        })();

        // --- Slant font (height 6) ---
        FONTS.slant = {
            height: 6,
            chars: {}
        };
        (function() {
            const slantDefs = {
                'A': ['   ___   ','  /   |  ',' / /| |  ','/ ___ |  ','/_/  |_| ','         '],
                'B': ['    ____ ','   / __ )','  / __  |',' / /_/ / ','/_____/  ','         '],
                'C': ['   ______','  / ____/',' / /     ','/ /___   ','\\____/   ','         '],
                'D': ['    ____ ','   / __ \\','  / / / /','/ /_/ / ','\\____/   ','         '],
                'E': ['    ____','   / __/','  / _/  ',' / /___ ','/_____/ ','        '],
                'F': ['    ____','   / __/','  / /_  ',' / __/  ','/_/     ','        '],
                'G': ['   ______','  / ____/',' / / __  ','/ /_/ /  ','\\____/   ','         '],
                'H': ['    __  __','   / / / /','  / /_/ / ',' / __  /  ','/_/ /_/   ','          '],
                'I': ['    __','   / /','  / / ',' / /  ','/_/   ','      '],
                'J': ['       __','      / /','  __ / / ',' / /_/ /  ',' \\____/   ','          '],
                'K': ['    __ __','   / //_/','  / ,<   ',' / /| |  ','/_/ |_|  ','         '],
                'L': ['    __ ','   / / ','  / /  ',' / /___','/_____/','       '],
                'M': ['    __  ___','   /  |/  /','  / /|_/ / ',' / /  / /  ','/_/  /_/   ','           '],
                'N': ['    _   __','   / | / /','  /  |/ / ',' / /|  /  ','/_/ |_/   ','          '],
                'O': ['   ____ ','  / __ \\','/ / / /','/ /_/ / ','\\____/  ','        '],
                'P': ['    ____ ','   / __ \\','  / /_/ /',' / ____/ ','/_/      ','         '],
                'Q': ['   ____ ','  / __ \\','/ / / /','/ /_/ / ','\\___\\_\\ ','        '],
                'R': ['    ____ ','   / __ \\','  / /_/ /',' / _  _/ ','/_/ |_|  ','         '],
                'S': ['   _____ ','  / ___/ ',' \\__ \\   ','___/ /   ','/____/   ','         '],
                'T': ['  ______','/_  __/ ',' / /    ','/ /     ','/_/     ','        '],
                'U': ['   __  __','  / / / /','/ / / /','/ /_/ / ','\\____/  ','        '],
                'V': ['  _   __','| | / /','| |/ / ','|   /  ','|__/   ','       '],
                'W': ['  _      __','| | /| / /','| |/ |/ / ','|   /|  / ','|__/ |_/  ','          '],
                'X': ['   _  __','  | |/ /','  >   < ',' / /| | ','/_/ |_| ','        '],
                'Y': ['  __  __','  \\ \\/ /',' \\   / ','  | |  ',' |_|   ','       '],
                'Z': ['  _____','/___ /','  / /  ',' / /__ ','/_____/','       '],
                ' ': ['    ','    ','    ','    ','    ','    ']
            };
            for (let c in slantDefs) FONTS.slant.chars[c] = slantDefs[c];
        })();

        // --- Lean font (height 6) uses / only ---
        FONTS.lean = {
            height: 6,
            chars: {}
        };
        (function() {
            const leanDefs = {
                'A': ['    _/\\   ','   /  \\   ','  / /\\ \\  ',' / /--\\ \\ ','/_/    \\_\\','          ','          '],
                'B': ['_____  ','|  _ \\ ','| |_) |','|  _ < ','| |_) |','|____/ '],
                'C': [' _____ ','/ ____|','| |    ','| |___ ','\\_____|','       '],
                'D': ['_____  ','|  _ \\ ','| | | |','| |_| |','|____/ ','       '],
                'E': [' _____ ','| ____|','|  _|  ','| |___ ','|_____|','       '],
                'F': [' _____ ','|  ___|','| |_   ','|  _|  ','|_|    ','       '],
                'G': [' _____ ','/ ____|','| |  _ ','| |_| |','\\_____|','       '],
                'H': ['_   _ ','| | | |','| |_| |','|  _  |','|_| |_|','       '],
                'I': [' ___ ','|_ _|',' | | ',' | | ','|___|','     '],
                'J': ['     _ ','    | |',' _  | |','| |_| |',' \\___/ ','       '],
                'K': ['_  __','| |/ /','| \' / ','| . \\ ','|_|\\_\\','      '],
                'L': ['_     ','| |    ','| |    ','| |___ ','|_____|','       '],
                'M': ['__  __ ','|  \\/  |','| |\\/| |','| |  | |','|_|  |_|','        '],
                'N': ['_   _ ','| \\ | |','|  \\| |','| |\\  |','|_| \\_|','       '],
                'O': [' ___  ','/ _ \\ ','| | | |','| |_| |',' \\___/ ','       '],
                'P': ['____  ','|  _ \\ ','| |_) |','|  __/ ','|_|    ','       '],
                'Q': [' ___  ','/ _ \\ ','| | | |','| |_| |',' \\__\\_\\','       '],
                'R': ['____  ','|  _ \\ ','| |_) |','|  _ < ','|_| \\_\\','       '],
                'S': [' ____ ','/ ___|','\\___ \\ ',' ___) |','|____/ ','       '],
                'T': ['_____ ','|_   _|','  | |  ','  | |  ','  |_|  ','       '],
                'U': ['_   _ ','| | | |','| | | |','| |_| |',' \\___/ ','       '],
                'V': ['__     __','\\ \\   / /',' \\ \\ / / ','  \\ V /  ','   \\_/   ','         '],
                'W': ['__        __','\\ \\      / /',' \\ \\ /\\ / / ','  \\ V  V /  ','   \\_/\\_/   ','            '],
                'X': ['__  __','\\ \\/ /',' \\  / ',' /  \\ ','/_/\\_\\','      '],
                'Y': ['__   __','\\ \\ / /',' \\ V / ','  | |  ','  |_|  ','       '],
                'Z': [' _____','|__  /','  / / ',' / /_ ','/____|','      '],
                ' ': ['   ','   ','   ','   ','   ','   ']
            };
            FONTS.lean.height = 6;
            for (let c in leanDefs) {
                // Normalize to 6 lines
                const lines = leanDefs[c];
                while (lines.length < 6) lines.push(' '.repeat(lines[0].length));
                FONTS.lean.chars[c] = lines.slice(0, 6);
            }
        })();

        // --- Script font (height 6) ---
        FONTS.script = {
            height: 6,
            chars: {}
        };
        (function() {
            const scriptDefs = {
                'A': ['       ','  __ _ ',' / _` |','| (_| |',' \\__,_|','       '],
                'B': [' _     ','| |__  ','| \'_ \\ ','| |_) |','|_.__/ ','       '],
                'C': ['      ','  ___ ',' / __|','| (__ ',' \\___|','      '],
                'D': ['     _ ','  __| |',' / _` |','| (_| |',' \\__,_|','       '],
                'E': ['      ','  ___ ',' / _ \\','|  __/','|\\___|','      '],
                'F': ['  __ ','/ _|','| |_ ','|  _|','|_|  ','     '],
                'G': ['       ','  __ _ ',' / _` |','| (_| |',' \\__, |',' |___/ '],
                'H': [' _     ','| |__  ','|  _ \\ ','| | | |','|_| |_|','       '],
                'I': [' _ ','(_)','| |','| |','|_|','   '],
                'J': ['    _ ','   (_)','   | |','   | |','  _/ |',' |__/ '],
                'K': [' _    ','| | __','| |/ /','|   < ','|_|\\_\\','      '],
                'L': [' _ ','| |','| |','| |','|_|','   '],
                'M': ['           ','  _ __ ___ ',' | \'_ ` _ \\','| | | | | |','|_| |_| |_|','           '],
                'N': ['        ','  _ __  ',' | \'_ \\ ','| | | |','|_| |_|','       '],
                'O': ['       ','  ___  ',' / _ \\ ','| (_) |',' \\___/ ','       '],
                'P': ['       ','  _ __ ',' | \'_ \\','| |_) |','| .__/ ','|_|    '],
                'Q': ['       ','  __ _ ',' / _` |','| (_| |',' \\__, |','    |_|'],
                'R': ['      ','  _ _ ',' | \'_|','| |   ','|_|   ','      '],
                'S': ['     ','  ___',' (_-<',' /__/','     ','     '],
                'T': ['  _   ','| |_ ','|  _|','|_|  ','     ','     '],
                'U': ['        ','  _   _ ',' | | | |','| |_| | ',' \\__,_| ','        '],
                'V': ['       ','__   __','\\ \\ / /',' \\ V / ','  \\_/  ','       '],
                'W': ['           ','__      __','\\ \\ /\\ / / ',' \\ V  V /  ','  \\_/\\_/   ','           '],
                'X': ['      ',' __ __','| \\/ |','|_/\\_|','      ','      '],
                'Y': ['       ','  _   _',' | | | |','  \\_, | ','  |__/  ','        '],
                'Z': ['     ','____','|_ /','/ /_ ','/____|','     '],
                ' ': ['   ','   ','   ','   ','   ','   ']
            };
            for (let c in scriptDefs) {
                const lines = scriptDefs[c];
                while (lines.length < 6) lines.push(' '.repeat(lines[0] ? lines[0].length : 3));
                FONTS.script.chars[c] = lines.slice(0, 6);
            }
        })();

        // --- Bubble font (height 5) uses (O) style ---
        FONTS.bubble = {
            height: 5,
            chars: {}
        };
        (function() {
            const bubbleDefs = {
                'A': ['  _   ','/ _ \\ ','|(_)| ','|   | ','|_|_| '],
                'B': [' ___ ','| _ )','| _ \\','|___/','     '],
                'C': [' ___ ','/ __|','| (__','\\___/','     '],
                'D': [' ___  ','|   \\ ','| |) |','|___/ ','      '],
                'E': [' ___ ','| __|','| _| ','|___|','     '],
                'F': [' ___ ','| __|','| _| ','|_|  ','     '],
                'G': [' ___ ','/ __|','| (_ ','\\___|','     '],
                'H': [' _  _ ','| || |','| __ |','|_||_|','      '],
                'I': [' _ ','| |','| |','|_|','   '],
                'J': ['   _ ','  | |','_ | |','\\__|','    '],
                'K': [' _  _','| |/ ','| \' <','|_|\\_','     '],
                'L': [' _   ','| |  ','| |__','|____|','     '],
                'M': [' __  __ ','|  \\/  |','| |\\/| |','|_|  |_|','        '],
                'N': [' _  _ ','| \\| |','| .` |','|_|\\_|','      '],
                'O': [' ___  ','/ _ \\ ','| (_) |','\\___/ ','       '],
                'P': [' ___ ','| _ \\','|  _/','|_|  ','     '],
                'Q': [' ___  ','/ _ \\ ','| (_) |','\\__\\_\\','       '],
                'R': [' ___ ','| _ \\','|   /','|_\\_\\','     '],
                'S': [' ___ ','/ __|','\\__ \\','|___/','     '],
                'T': [' ___ ','|_  )','  | |',' |__|','     '],
                'U': [' _  _ ','| || |','| \\_ |','\\___/ ','      '],
                'V': ['__   __','\\ \\ / /',' \\_V/ ','      ','      '],
                'W': ['__      __','\\ \\    / /',' \\/\\/\\/ / ','  \\_/\\_/  ','          '],
                'X': ['__  __','\\ \\/ /',' \\  / ',' /  \\ ','/_/\\_\\'],
                'Y': ['_   _','\\ | /',' \\V/ ',' | | ','  |_|'],
                'Z': [' ____','|_  /','  / / ',' / /_ ','/____|'],
                ' ': ['   ','   ','   ','   ','   ']
            };
            for (let c in bubbleDefs) {
                const lines = bubbleDefs[c];
                while (lines.length < 5) lines.push(' '.repeat(lines[0] ? lines[0].length : 3));
                FONTS.bubble.chars[c] = lines.slice(0, 5);
            }
        })();

        // --- Digital font (height 5) uses | _ segments ---
        FONTS.digital = {
            height: 5,
            chars: {}
        };
        (function() {
            const digitalDefs = {
                'A': [' _  ','| | ','|_| ','| | ','    '],
                'B': ['_   ','|_) ','|_) ','    ','    '],
                'C': [' _  ','|   ','|_  ','    ','    '],
                'D': ['_   ','| \\ ','|_/ ','    ','    '],
                'E': [' _  ','|_  ','|_  ','    ','    '],
                'F': [' _  ','|_  ','|   ','    ','    '],
                'G': [' _  ','|   ','|_] ','    ','    '],
                'H': ['    ','|_| ','| | ','    ','    '],
                'I': ['  ','| ','| ','  ','  '],
                'J': ['  _ ',' _| ','  | ','    ','    '],
                'K': ['    ','|/  ','|\\ ','    ','    '],
                'L': ['    ','|   ','|_  ','    ','    '],
                'M': ['     ','|\\/| ','|  | ','     ','     '],
                'N': ['     ','|\\ | ','| \\| ','     ','     '],
                'O': [' _  ','| | ','|_| ','    ','    '],
                'P': [' _  ','|_) ','|   ','    ','    '],
                'Q': [' _  ','| | ','|_\\ ','    ','    '],
                'R': [' _  ','|_) ','| \\ ','    ','    '],
                'S': [' _  ','|_  ',' _| ','    ','    '],
                'T': ['___ ',' |  ',' |  ','    ','    '],
                'U': ['    ','| | ','|_| ','    ','    '],
                'V': ['    ','\\ / ',' V  ','    ','    '],
                'W': ['       ','|   | ','|_|_| ','      ','      '],
                'X': ['    ','\\/ ','/\\ ','    ','    '],
                'Y': ['    ','\\/ ',' | ','    ','    '],
                'Z': ['__ ',' / ','/__','   ','   '],
                ' ': ['   ','   ','   ','   ','   ']
            };
            for (let c in digitalDefs) {
                const lines = digitalDefs[c];
                while (lines.length < 5) lines.push(' '.repeat(lines[0] ? lines[0].length : 3));
                FONTS.digital.chars[c] = lines.slice(0, 5);
            }
        })();

        // --- Ivrit (mirror/reversed Standard) ---
        FONTS.ivrit = {
            height: 6,
            mirrorOf: 'standard'
        };

        // --- Graffiti font (height 6) ---
        FONTS.graffiti = {
            height: 6,
            chars: {}
        };
        (function() {
            const graffitiDefs = {
                'A': ['  ___   ','.|   |. ','||   || ','||___|| ','|/   \\| ','         '],
                'B': [' ____  ','| __ ) ','|  _ \\ ','| |_) |','|____/ ','       '],
                'C': ['  ____ ','/ ___|','| |    ','| |___ ','\\____|','       '],
                'D': [' ____  ','|  _ \\ ','| | | |','| |_| |','|____/ ','       '],
                'E': [' _____ ','| ____|','|  _|  ','| |___ ','|_____|','       '],
                'F': [' _____ ','|  ___|','| |_   ','|  _|  ','|_|    ','       '],
                'G': ['  ____ ','/ ___|','| |  _ ','| |_| |','\\____|','       '],
                'H': ['_   _ ','| | | |','| |_| |','|  _  |','|_| |_|','       '],
                'I': [' ___ ','|_ _|',' | | ',' | | ','|___|','     '],
                'J': ['     _ ','    | |',' _  | |','| |_| |',' \\___/ ','       '],
                'K': [' _  __','| |/ /','| \' / ','| . \\ ','|_|\\_\\','      '],
                'L': [' _     ','| |    ','| |    ','| |___ ','|_____|','       '],
                'M': [' __  __ ','|  \\/  |','| |\\/| |','| |  | |','|_|  |_|','        '],
                'N': [' _   _ ','| \\ | |','|  \\| |','| |\\  |','|_| \\_|','       '],
                'O': ['  ___  ','/ _ \\ ','| | | |','| |_| |',' \\___/ ','       '],
                'P': [' ____  ','|  _ \\ ','| |_) |','|  __/ ','|_|    ','       '],
                'Q': ['  ___  ','/ _ \\ ','| | | |','| |_| |',' \\__\\_\\','       '],
                'R': [' ____  ','|  _ \\ ','| |_) |','|  _ < ','|_| \\_\\','       '],
                'S': [' ____  ','/ ___| ','\\___ \\ ',' ___) |','|____/ ','       '],
                'T': [' _____ ','|_   _|','  | |  ','  | |  ','  |_|  ','       '],
                'U': [' _   _ ','| | | |','| | | |','| |_| |',' \\___/ ','       '],
                'V': ['__     __','\\ \\   / /',' \\ \\ / / ','  \\ V /  ','   \\_/   ','         '],
                'W': ['__        __','\\ \\      / /',' \\ \\ /\\ / / ','  \\ V  V /  ','   \\_/\\_/   ','            '],
                'X': ['__  __','\\ \\/ /',' \\  / ',' /  \\ ','/_/\\_\\','      '],
                'Y': ['__   __','\\ \\ / /',' \\ V / ','  | |  ','  |_|  ','       '],
                'Z': [' _____','|__  /','  / / ',' / /_ ','/____|','      '],
                ' ': ['   ','   ','   ','   ','   ','   ']
            };
            for (let c in graffitiDefs) FONTS.graffiti.chars[c] = graffitiDefs[c];
        })();

        // --- Doom font (height 8) ---
        FONTS.doom = {
            height: 8,
            chars: {}
        };
        (function() {
            const doomDefs = {
                'A': ['  ___   ','  / _ \\  ',' / /_\\ \\ ','|  _  | ','| | | | ','|_| |_| ','        ','        '],
                'B': ['______  ','| ___ \\ ','| |_/ / ','| ___ \\ ','| |_/ / ','\\____/  ','        ','        '],
                'C': [' _____ ','/ ____|','| |    ','| |    ','| |____','\\_____|','       ','       '],
                'D': ['______  ','|  _  \\ ','| | | | ','| | | | ','| |/ /  ','|___/   ','        ','        '],
                'E': ['______ ','|  ___| ','| |__  ','|  __| ','| |___ ','\\____/ ','       ','       '],
                'F': ['______ ','|  ___| ','| |__  ','|  __| ','| |    ','|_|    ','       ','       '],
                'G': [' _____ ','|  __ \\','| |  \\/ ','| | __ ','| |_\\ \\','\\____/ ','       ','       '],
                'H': [' _   _ ','| | | | ','| |_| | ','|  _  | ','| | | | ','|_| |_| ','        ','        '],
                'I': [' _____ ','|_   _| ','  | |   ','  | |   ','  | |   ','  |_|   ','        ','        '],
                'J': ['   ___  ','  |_  | ','    | | ','    | | ','/\\__/ / ','\\____/  ','        ','        '],
                'K': [' _   __ ','| | / / ','| |/ /  ','|    \\  ','| |\\  \\ ','|_| \\_\\ ','        ','        '],
                'L': [' _      ','| |     ','| |     ','| |     ','| |____ ','|______| ','         ','         '],
                'M': ['___  ___ ','|  \\/  | ','| .  . | ','| |\\/| | ','| |  | | ','|_|  |_| ','         ','         '],
                'N': [' _   _  ','| \\ | | ','|  \\| | ','| . ` | ','| |\\  | ','|_| \\_| ','        ','        '],
                'O': [' _____  ','|  _  | ','| | | | ','| | | | ','| |_| | ','|_____| ','        ','        '],
                'P': ['______  ','| ___ \\ ','| |_/ / ','|  __/  ','| |     ','|_|     ','        ','        '],
                'Q': [' _____  ','|  _  | ','| | | | ','| |/\\| | ','|  /\\  | ','|_/  |_| ','         ','         '],
                'R': ['______  ','| ___ \\ ','| |_/ / ','|    /  ','| |\\ \\  ','|_| \\_\\ ','        ','        '],
                'S': [' _____ ','/ ____| ','\\___  \\ ',' ___/ / ','/_____/ ','        ','        ','        '],
                'T': [' _____  ','|_   _| ','  | |   ','  | |   ','  | |   ','  |_|   ','        ','        '],
                'U': [' _   _  ','| | | | ','| | | | ','| |_| | ','\\___  | ','    |_/ ','        ','        '],
                'V': ['__     __ ','\\ \\   / / ',' \\ \\ / /  ','  \\ V /   ','   \\_/    ','          ','          ','          '],
                'W': ['__        __ ','\\ \\      / / ',' \\ \\    / /  ','  \\ \\/\\/ /   ','   \\  /\\  /  ','    \\/  \\/   ','             ','             '],
                'X': ['__   __ ','\\ \\ / / ',' \\   /  ',' / _ \\  ','/ / \\ \\ ','|_|  |_| ','         ','         '],
                'Y': ['__   __ ','\\ \\ / / ',' \\ V /  ','  | |   ','  | |   ','  |_|   ','        ','        '],
                'Z': ['_______ ','|___  / ','   / /  ','  / /   ',' / /    ','/_/     ','        ','        '],
                ' ': ['    ','    ','    ','    ','    ','    ','    ','    ']
            };
            for (let c in doomDefs) FONTS.doom.chars[c] = doomDefs[c];
        })();


        // ========== Helper: mirror text lines ==========
        function mirrorLines(lines) {
            return lines.map(line => [...line].reverse().join('')
                .replace(/\\/g, '<<BSLASH>>')
                .replace(/\//g, '\\')
                .replace(/<<BSLASH>>/g, '/')
                .replace(/\(/g, '<<LP>>')
                .replace(/\)/g, '(')
                .replace(/<<LP>>/g, ')')
                .replace(/\[/g, '<<LB>>')
                .replace(/\]/g, '[')
                .replace(/<<LB>>/g, ']')
                .replace(/\{/g, '<<LC>>')
                .replace(/\}/g, '{')
                .replace(/<<LC>>/g, '}')
                .replace(/</g, '<<LT>>')
                .replace(/>/g, '<')
                .replace(/<<LT>>/g, '>')
            );
        }

        // ========== Core: render text with a font ==========
        function renderText(text, fontName, spacing, customChar) {
            text = text.toUpperCase();
            let font = FONTS[fontName];
            if (!font) font = FONTS.standard;

            // Handle mirrored fonts
            const isMirrored = !!font.mirrorOf;
            if (isMirrored) {
                font = FONTS[font.mirrorOf];
                text = [...text].reverse().join('');
            }

            const height = font.height;
            const chars = font.chars;

            // Build lines
            const lines = Array.from({ length: height }, () => '');

            let spacer = '';
            if (spacing === 'wide') spacer = '  ';
            else if (spacing === 'default') spacer = ' ';
            // fitted = no extra spacing

            for (const ch of text) {
                const glyph = chars[ch] || chars[' '] || Array.from({ length: height }, () => '   ');
                for (let row = 0; row < height; row++) {
                    const glyphRow = glyph[row] || '';
                    lines[row] += glyphRow + spacer;
                }
            }

            let result = isMirrored ? mirrorLines(lines) : lines;

            // Apply custom character
            if (customChar && customChar.length === 1) {
                result = result.map(line =>
                    line.replace(/[^\s]/g, customChar)
                );
            }

            // Trim trailing whitespace on each line, remove empty trailing lines
            result = result.map(l => l.replace(/\s+$/, ''));
            while (result.length > 0 && result[result.length - 1].trim() === '') result.pop();

            return result.join('\n');
        }


        // ========== DOM Elements ==========
        const textInput = document.getElementById('text-input');
        const textOutput = document.getElementById('text-output');
        const fontSelect = document.getElementById('font-select');
        const charWidth = document.getElementById('char-width');
        const outputChar = document.getElementById('output-char');
        const btnGenerate = document.getElementById('btn-generate');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const statsBar = document.getElementById('stats-bar');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        const SAMPLE_TEXT = 'HELLO';

        // ========== Helpers ==========
        function showSuccess(msg) {
            successMessage.textContent = msg;
            successNotification.classList.remove('hidden');
            errorNotification.classList.add('hidden');
            setTimeout(() => successNotification.classList.add('hidden'), 3000);
        }

        function showError(msg) {
            errorMessage.textContent = msg;
            errorNotification.classList.remove('hidden');
            successNotification.classList.add('hidden');
            setTimeout(() => errorNotification.classList.add('hidden'), 5000);
        }

        // ========== Generate ==========
        function generate() {
            const text = textInput.value.trim();
            if (!text) {
                showError('Please enter some text to generate ASCII art.');
                textOutput.value = '';
                statsBar.classList.add('hidden');
                return;
            }

            const font = fontSelect.value;
            const spacing = charWidth.value;
            const custom = outputChar.value;

            // Handle multi-line: generate each line separately
            const inputLines = text.split('\n').filter(l => l.trim() !== '');
            const results = inputLines.map(line => renderText(line, font, spacing, custom));
            const output = results.join('\n\n');

            textOutput.value = output;

            // Stats
            const outputLines = output.split('\n');
            const maxWidth = Math.max(...outputLines.map(l => l.length));
            document.getElementById('stat-lines').textContent = outputLines.length;
            document.getElementById('stat-width').textContent = maxWidth;
            document.getElementById('stat-chars').textContent = output.length;
            document.getElementById('stat-font').textContent = fontSelect.options[fontSelect.selectedIndex].text;
            statsBar.classList.remove('hidden');
        }

        // ========== Event Listeners ==========
        btnGenerate.addEventListener('click', generate);

        // Keyboard shortcut: Ctrl/Cmd + Enter
        textInput.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                e.preventDefault();
                generate();
            }
        });

        // Re-generate on option change if output exists
        fontSelect.addEventListener('change', function() {
            if (textInput.value.trim()) generate();
        });
        charWidth.addEventListener('change', function() {
            if (textInput.value.trim()) generate();
        });
        outputChar.addEventListener('input', function() {
            if (textInput.value.trim()) generate();
        });

        btnCopy.addEventListener('click', function() {
            const output = textOutput.value;
            if (!output) return;
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                showSuccess('Copied to clipboard!');
                setTimeout(() => {
                    this.innerHTML = orig;
                    this.classList.remove('text-green-400', 'border-green-400');
                }, 2000);
            });
        });

        btnDownload.addEventListener('click', function() {
            const output = textOutput.value;
            if (!output) return;
            const blob = new Blob([output], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'ascii-art.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            showSuccess('Downloaded ascii-art.txt');
        });

        btnSample.addEventListener('click', function() {
            textInput.value = SAMPLE_TEXT;
            generate();
        });

        btnClear.addEventListener('click', function() {
            textInput.value = '';
            textOutput.value = '';
            statsBar.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        });
    })();
    </script>
    @endpush
</x-layout>
