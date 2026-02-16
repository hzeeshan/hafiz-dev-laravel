<x-layout>
    <x-slot:title>Backward Text Generator - Free Online Reverse Text Tool | hafiz.dev</x-slot:title>
    <x-slot:description>Free online backward text generator. Reverse your text instantly for social media, Discord, and more. Copy and paste backward text anywhere. No signup required.</x-slot:description>
    <x-slot:keywords>backward text generator, reverse text, backward text, text reverser, reverse text generator, backwards text online, mirror text, reverse string online</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/backward-text-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Backward Text Generator - Free Online Reverse Text Tool | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online backward text generator. Reverse your text instantly for social media, Discord, and more.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/backward-text-generator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Backward Text Generator",
            "description": "Free online backward text generator. Reverse your text instantly in your browser.",
            "url": "https://hafiz.dev/tools/backward-text-generator",
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
                { "@@type": "ListItem", "position": 3, "name": "Backward Text Generator", "item": "https://hafiz.dev/tools/backward-text-generator" }
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
                    "name": "How does the backward text generator work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The tool reverses the order of characters in your text. For example, 'Hello' becomes 'olleH'. You can also choose to reverse by word order instead, so 'Hello World' becomes 'World Hello'."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I use backward text on social media?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Backward text works on all social media platforms including Twitter/X, Facebook, Instagram, Discord, TikTok, Reddit, and more. Simply copy the reversed text and paste it anywhere."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between reversing characters and reversing words?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Reversing characters flips the entire text character by character (e.g., 'Hello World' → 'dlroW olleH'). Reversing words keeps each word intact but reverses their order (e.g., 'Hello World' → 'World Hello')."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is there a character limit for reversing text?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "No, there is no character limit. You can reverse as much text as you want. The conversion happens instantly in your browser with no server processing."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does backward text work with emojis and special characters?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! The backward text generator handles emojis, accented characters, and special Unicode characters correctly. It properly splits text using Unicode-aware methods so multi-byte characters stay intact."
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
                    <li class="text-gold">Backward Text Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Backward Text Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Reverse your text instantly — character by character or word by word. Perfect for social media, puzzles, and fun messages. Just type and copy!
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="flex flex-wrap gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="reverse-mode" id="opt-characters" value="characters" checked class="w-4 h-4 border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Reverse characters</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="reverse-mode" id="opt-words" value="words" class="w-4 h-4 border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Reverse words</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="opt-per-word" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Reverse each word individually</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="opt-per-line" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Reverse line order</span>
                        </label>
                    </div>
                </div>

                {{-- Input / Output --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="text-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Your Text
                        </label>
                        <textarea
                            id="text-input"
                            class="w-full min-h-[200px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Type or paste your text here..."
                            spellcheck="false"
                        ></textarea>
                    </div>
                    <div>
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
                            Backward Text
                        </label>
                        <textarea
                            id="text-output"
                            class="w-full min-h-[200px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="Backward text will appear here..."
                            readonly
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-generate" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
                        Reverse Text
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
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
                    <div class="grid grid-cols-4 gap-4">
                        <div class="text-center">
                            <div id="stat-chars" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Characters</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-words" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Words</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-lines" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Lines</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-mode" class="text-2xl font-bold text-light mb-1">—</div>
                            <div class="text-light-muted text-sm">Mode</div>
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
                    <div class="text-gold text-2xl mb-3">🔄</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Multiple Reverse Modes</h3>
                    <p class="text-light-muted text-sm">Reverse by characters, words, individual words, or line order. Combine modes for creative text effects and unique results.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">⚡</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant Results</h3>
                    <p class="text-light-muted text-sm">Text is reversed instantly in your browser. Copy the result with one click and paste it on Twitter, Discord, Instagram, or anywhere else.</p>
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
                            <span class="text-light font-medium">How does the backward text generator work?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The tool reverses the order of characters in your text. For example, <code class="bg-darkCard px-1 rounded">Hello</code> becomes <code class="bg-darkCard px-1 rounded">olleH</code>. You can also choose to reverse word order instead, so <code class="bg-darkCard px-1 rounded">Hello World</code> becomes <code class="bg-darkCard px-1 rounded">World Hello</code>.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I use backward text on social media?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Backward text works on all social media platforms including Twitter/X, Facebook, Instagram, Discord, TikTok, Reddit, YouTube comments, and more. Simply copy the reversed text and paste it into your post, bio, or message.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between reversing characters and reversing words?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Reversing characters flips the entire text character by character (e.g., <code class="bg-darkCard px-1 rounded">Hello World</code> → <code class="bg-darkCard px-1 rounded">dlroW olleH</code>). Reversing words keeps each word intact but reverses their order (e.g., <code class="bg-darkCard px-1 rounded">Hello World</code> → <code class="bg-darkCard px-1 rounded">World Hello</code>).
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does backward text work with emojis and special characters?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! The backward text generator handles emojis, accented characters, and special Unicode characters correctly. It uses Unicode-aware splitting so multi-byte characters like 😊 and é stay intact when reversed.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is there a character limit for reversing text?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            No, there is no character limit. You can reverse as much text as you want. The conversion happens instantly in your browser with no server processing, so it works even without an internet connection once the page is loaded.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        const SAMPLE_TEXT = 'The quick brown fox jumps over the lazy dog.\nPack my box with five dozen liquor jugs.\nHow vexingly quick daft zebras jump!';

        // DOM Elements
        const textInput = document.getElementById('text-input');
        const textOutput = document.getElementById('text-output');
        const optCharacters = document.getElementById('opt-characters');
        const optWords = document.getElementById('opt-words');
        const optPerWord = document.getElementById('opt-per-word');
        const optPerLine = document.getElementById('opt-per-line');
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
            setTimeout(() => errorNotification.classList.add('hidden'), 3000);
        }

        function reverseString(str) {
            return [...str].reverse().join('');
        }

        function reverseText(text) {
            const reverseChars = optCharacters.checked;
            const perWord = optPerWord.checked;
            const perLine = optPerLine.checked;

            let result = text;

            if (perLine) {
                const lines = result.split('\n');
                result = lines.reverse().join('\n');
            }

            if (reverseChars && !perWord) {
                // Reverse entire text character by character
                result = reverseString(result);
            } else if (!reverseChars && !perWord) {
                // Reverse word order
                const lines = result.split('\n');
                result = lines.map(line => line.split(/(\s+)/).filter(s => s.trim().length > 0).reverse().join(' ')).join('\n');
            }

            if (perWord) {
                // Reverse each word individually
                const lines = result.split('\n');
                result = lines.map(line => {
                    return line.split(/(\s+)/).map(part => {
                        if (part.trim().length === 0) return part;
                        return reverseString(part);
                    }).join('');
                }).join('\n');
            }

            return result;
        }

        function getModeName() {
            const parts = [];
            if (optCharacters.checked) parts.push('Chars');
            if (optWords.checked) parts.push('Words');
            if (optPerWord.checked) parts.push('+Each');
            if (optPerLine.checked) parts.push('+Lines');
            return parts.join(' ') || 'Chars';
        }

        function convert() {
            const text = textInput.value;
            if (!text.trim()) {
                showError('Please enter some text to reverse.');
                return;
            }

            errorNotification.classList.add('hidden');
            const result = reverseText(text);
            textOutput.value = result;

            // Stats
            const chars = [...text].length;
            const words = text.trim().split(/\s+/).filter(w => w.length > 0).length;
            const lines = text.split('\n').length;

            document.getElementById('stat-chars').textContent = chars;
            document.getElementById('stat-words').textContent = words;
            document.getElementById('stat-lines').textContent = lines;
            document.getElementById('stat-mode').textContent = getModeName();
            statsBar.classList.remove('hidden');
        }

        // Event listeners
        btnGenerate.addEventListener('click', convert);

        // Keyboard shortcut: Ctrl/Cmd + Enter
        textInput.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                e.preventDefault();
                convert();
            }
        });

        // Option changes trigger re-conversion if output exists
        [optCharacters, optWords, optPerWord, optPerLine].forEach(el => {
            el.addEventListener('change', function() {
                if (textOutput.value) convert();
            });
        });

        btnCopy.addEventListener('click', function() {
            const output = textOutput.value;
            if (!output) return;
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
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
            a.download = 'backward-text.txt';
            a.click();
            URL.revokeObjectURL(url);
            showSuccess('File downloaded!');
        });

        btnSample.addEventListener('click', function() {
            textInput.value = SAMPLE_TEXT;
            convert();
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
