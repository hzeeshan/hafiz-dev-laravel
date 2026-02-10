<x-layout>
    <x-slot:title>Zalgo Text Generator - Creepy Glitch Text Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online Zalgo text generator. Create creepy glitch text with customizable chaos level instantly. Perfect for Discord, social media, and memes. No signup required.</x-slot:description>
    <x-slot:keywords>zalgo text generator, zalgo text, glitch text generator, creepy text generator, zalgo text generator for roblox, cursed text generator, corrupted text</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/zalgo-text-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Zalgo Text Generator - Creepy Glitch Text Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online Zalgo text generator. Create creepy glitch text with customizable chaos level.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/zalgo-text-generator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Zalgo Text Generator",
            "description": "Free online Zalgo text generator. Create creepy glitch text instantly.",
            "url": "https://hafiz.dev/tools/zalgo-text-generator",
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
                { "@@type": "ListItem", "position": 3, "name": "Zalgo Text Generator", "item": "https://hafiz.dev/tools/zalgo-text-generator" }
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
                    "name": "What is Zalgo text?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Zalgo text is text that has been modified with Unicode combining characters that stack above, below, and through the original characters, creating a corrupted or glitchy appearance. It's named after a creepypasta meme character."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I use Zalgo text on Discord and Roblox?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Zalgo text works on Discord, Roblox chat, Twitter/X, Reddit, Facebook, and most platforms that support Unicode. Simply copy the generated text and paste it. Some platforms may limit extreme Zalgo effects."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I control how glitchy the text looks?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Use the Chaos Level slider to control the intensity. Mini adds 1-2 combining characters, Normal adds 3-5, and Maximum adds 8-15 per character. You can also toggle which directions the glitch extends: up, middle, or down."
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
                    <li class="text-gold">Zalgo Text Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Zalgo Text Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Create creepy, glitchy Zalgo text instantly. Adjust the chaos level and direction for Discord, Roblox, social media, and memes.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 gap-6">
                        {{-- Chaos Level --}}
                        <div>
                            <label class="text-light font-semibold mb-3 block text-sm">Chaos Level</label>
                            <input type="range" id="chaos-level" min="1" max="3" value="2" class="w-full h-2 bg-darkCard rounded-lg appearance-none cursor-pointer accent-gold">
                            <div class="flex justify-between text-xs text-light-muted mt-1">
                                <span>Mini</span>
                                <span id="chaos-label" class="text-gold font-semibold">Normal</span>
                                <span>Maximum</span>
                            </div>
                        </div>
                        {{-- Directions --}}
                        <div>
                            <label class="text-light font-semibold mb-3 block text-sm">Direction</label>
                            <div class="flex flex-col gap-2">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" id="opt-up" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                    <span class="text-sm text-light-muted">↑ Up (above text)</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" id="opt-mid" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                    <span class="text-sm text-light-muted">↔ Middle (through text)</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" id="opt-down" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                    <span class="text-sm text-light-muted">↓ Down (below text)</span>
                                </label>
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
                        class="w-full min-h-[120px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                        placeholder="Type or paste your text here..."
                        spellcheck="false"
                    ></textarea>
                </div>

                {{-- Output --}}
                <div class="mb-6">
                    <label class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Zalgo Text
                    </label>
                    <textarea
                        id="text-output"
                        class="w-full min-h-[180px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none leading-loose"
                        placeholder="Zalgo text will appear here..."
                        readonly
                    ></textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-regenerate" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        Regenerate
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

            {{-- Features --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🎚️</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Adjustable Chaos</h3>
                    <p class="text-light-muted text-sm">Slide from subtle glitch to maximum insanity. Control how many combining characters are added to each letter for the perfect creepy effect.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">↕️</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Direction Control</h3>
                    <p class="text-light-muted text-sm">Toggle glitch effects above, through, or below the text independently. Mix and match for unique creepy text styles.</p>
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
                            <span class="text-light font-medium">What is Zalgo text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Zalgo text is text modified with Unicode combining diacritical marks that stack above, below, and through the original characters, creating a corrupted or glitchy appearance. It's named after "Zalgo," a creepypasta meme character. The effect is achieved using legitimate Unicode characters, not special fonts.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I use Zalgo text on Discord and Roblox?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Zalgo text works on Discord messages, usernames, and bios as well as Roblox chat. It also works on Twitter/X, Reddit, Facebook, Instagram, and most platforms supporting Unicode. Some platforms may strip extreme Zalgo effects, so try the Mini or Normal chaos level if Maximum doesn't display correctly.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I control how glitchy the text looks?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Use the Chaos Level slider to adjust intensity. Mini adds 1–2 combining characters per letter for a subtle effect. Normal adds 3–5 for a good balance. Maximum adds 8–15 for extreme corruption. You can also toggle which directions (up, middle, down) the glitch extends for more control.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Why does the Zalgo text look different each time?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The combining characters are randomly selected and randomly positioned each time, so every generation produces a unique result. Click "Regenerate" to get a different variation of the same text. This randomness is what makes Zalgo text look organically corrupted.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        // Unicode combining characters for Zalgo effect
        const combiningUp = [
            '\u0300','\u0301','\u0302','\u0303','\u0304','\u0305','\u0306','\u0307',
            '\u0308','\u0309','\u030A','\u030B','\u030C','\u030D','\u030E','\u030F',
            '\u0310','\u0311','\u0312','\u0313','\u0314','\u0315','\u031A','\u033D',
            '\u033E','\u033F','\u0340','\u0341','\u0342','\u0343','\u0344','\u0346',
            '\u034A','\u034B','\u034C','\u0350','\u0351','\u0352','\u0357','\u0358',
            '\u035B','\u035D','\u035E','\u0360','\u0361'
        ];

        const combiningMid = [
            '\u0334','\u0335','\u0336','\u0337','\u0338','\u0339','\u033A','\u033B','\u033C'
        ];

        const combiningDown = [
            '\u0316','\u0317','\u0318','\u0319','\u031C','\u031D','\u031E','\u031F',
            '\u0320','\u0321','\u0322','\u0323','\u0324','\u0325','\u0326','\u0327',
            '\u0328','\u0329','\u032A','\u032B','\u032C','\u032D','\u032E','\u032F',
            '\u0330','\u0331','\u0332','\u0333','\u0339','\u033A','\u033B','\u033C',
            '\u0345','\u0347','\u0348','\u0349','\u034D','\u034E','\u0353','\u0354',
            '\u0355','\u0356','\u0359','\u035A','\u035C','\u035F','\u0362'
        ];

        // Chaos level ranges: [min, max] combining chars per direction
        const chaosLevels = {
            1: [1, 2],   // Mini
            2: [3, 5],   // Normal
            3: [8, 15]   // Maximum
        };

        const chaosLabels = { 1: 'Mini', 2: 'Normal', 3: 'Maximum' };

        const textInput = document.getElementById('text-input');
        const textOutput = document.getElementById('text-output');
        const chaosSlider = document.getElementById('chaos-level');
        const chaosLabel = document.getElementById('chaos-label');
        const optUp = document.getElementById('opt-up');
        const optMid = document.getElementById('opt-mid');
        const optDown = document.getElementById('opt-down');
        const btnCopy = document.getElementById('btn-copy');
        const btnRegenerate = document.getElementById('btn-regenerate');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');

        function rand(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function randItem(arr) {
            return arr[Math.floor(Math.random() * arr.length)];
        }

        function zalgoify(text) {
            const level = parseInt(chaosSlider.value);
            const [min, max] = chaosLevels[level];
            const useUp = optUp.checked;
            const useMid = optMid.checked;
            const useDown = optDown.checked;

            if (!useUp && !useMid && !useDown) return text;

            return [...text].map(ch => {
                if (ch === ' ' || ch === '\n' || ch === '\t') return ch;

                let result = ch;
                if (useUp) {
                    const count = rand(min, max);
                    for (let i = 0; i < count; i++) result += randItem(combiningUp);
                }
                if (useMid) {
                    const count = rand(Math.max(1, Math.floor(min / 2)), Math.max(1, Math.floor(max / 2)));
                    for (let i = 0; i < count; i++) result += randItem(combiningMid);
                }
                if (useDown) {
                    const count = rand(min, max);
                    for (let i = 0; i < count; i++) result += randItem(combiningDown);
                }
                return result;
            }).join('');
        }

        function convert() {
            const text = textInput.value;
            if (!text) { textOutput.value = ''; return; }
            textOutput.value = zalgoify(text);
        }

        chaosSlider.addEventListener('input', function() {
            chaosLabel.textContent = chaosLabels[this.value];
            convert();
        });

        textInput.addEventListener('input', convert);
        [optUp, optMid, optDown].forEach(el => el.addEventListener('change', convert));
        btnRegenerate.addEventListener('click', convert);

        btnCopy.addEventListener('click', function() {
            const output = textOutput.value;
            if (!output) return;
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                successNotification.classList.remove('hidden');
                successMessage.textContent = 'Copied to clipboard!';
                setTimeout(() => {
                    this.innerHTML = orig;
                    this.classList.remove('text-green-400', 'border-green-400');
                    successNotification.classList.add('hidden');
                }, 2000);
            });
        });

        btnSample.addEventListener('click', function() {
            textInput.value = 'He comes. Zalgo awaits.';
            convert();
        });

        btnClear.addEventListener('click', function() {
            textInput.value = '';
            textOutput.value = '';
        });
    })();
    </script>
    @endpush
</x-layout>
