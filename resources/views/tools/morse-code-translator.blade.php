<x-layout>
    <x-slot:title>Morse Code Translator - Text to Morse & Morse to Text | hafiz.dev</x-slot:title>
    <x-slot:description>Free online Morse code translator. Convert text to Morse code and Morse code to text instantly. Listen to audio playback, adjust speed, and copy results. No signup required.</x-slot:description>
    <x-slot:keywords>morse code translator, text to morse code, morse code to text, morse code converter, morse code decoder, morse code encoder, morse code audio</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/morse-code-translator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Morse Code Translator - Text to Morse & Morse to Text | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online Morse code translator. Convert text to Morse code and back instantly with audio playback.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/morse-code-translator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Morse Code Translator",
            "description": "Free online Morse code translator. Convert text to Morse code and back instantly with audio playback.",
            "url": "https://hafiz.dev/tools/morse-code-translator",
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
                { "@@type": "ListItem", "position": 3, "name": "Morse Code Translator", "item": "https://hafiz.dev/tools/morse-code-translator" }
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
                    "name": "How does the Morse code translator work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The tool maps each letter, number, and common punctuation to its International Morse Code equivalent using dots (.) and dashes (-). Letters are separated by spaces, and words are separated by a forward slash (/). It works bidirectionally — you can convert text to Morse or Morse to text."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I listen to the Morse code audio?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Click the Play button to hear the Morse code as audio beeps. A dot is a short beep and a dash is a longer beep. You can adjust the playback speed using the WPM (words per minute) slider."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What characters are supported?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The translator supports all 26 English letters (A-Z), digits (0-9), and common punctuation including period, comma, question mark, exclamation mark, apostrophe, colon, semicolon, equals sign, plus, minus, slash, parentheses, quotation marks, and the at sign (@)."
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
                    <li class="text-gold">Morse Code Translator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Morse Code Translator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert text to Morse code and Morse code back to text. Listen to audio playback with adjustable speed.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Direction Toggle --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <label class="text-light font-semibold mb-3 block text-sm">Translation Direction</label>
                    <div class="flex flex-wrap gap-3">
                        <label class="flex items-center gap-2 cursor-pointer px-4 py-2 bg-darkCard border border-gold/30 rounded-lg hover:border-gold/50 transition-colors">
                            <input type="radio" name="direction" value="text-to-morse" checked class="text-gold focus:ring-gold cursor-pointer">
                            <span class="text-sm text-light">Text → Morse</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer px-4 py-2 bg-darkCard border border-gold/20 rounded-lg hover:border-gold/50 transition-colors">
                            <input type="radio" name="direction" value="morse-to-text" class="text-gold focus:ring-gold cursor-pointer">
                            <span class="text-sm text-light">Morse → Text</span>
                        </label>
                    </div>
                </div>

                {{-- Input --}}
                <div class="mb-4">
                    <label for="text-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        <span id="input-label">Your Text</span>
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
                        <span id="output-label">Morse Code</span>
                    </label>
                    <textarea
                        id="text-output"
                        class="w-full min-h-[140px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                        placeholder="Morse code will appear here..."
                        readonly
                    ></textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-play" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg id="play-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span id="play-text">Play</span>
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

                {{-- Speed Control --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="flex items-center justify-between mb-2">
                        <label class="text-light font-semibold text-sm">Playback Speed</label>
                        <span id="speed-label" class="text-gold text-sm font-mono">20 WPM</span>
                    </div>
                    <input
                        type="range"
                        id="speed-slider"
                        min="5"
                        max="40"
                        value="20"
                        class="w-full accent-gold cursor-pointer"
                    >
                    <div class="flex justify-between text-xs text-light-muted mt-1">
                        <span>Slow (5)</span>
                        <span>Fast (40)</span>
                    </div>
                </div>

                {{-- Stats --}}
                <div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center">
                            <div id="stat-chars" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Characters</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-symbols" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Morse Symbols</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-words" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Words</div>
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

            {{-- Morse Code Reference --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <h2 class="text-lg font-semibold text-light mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    International Morse Code Reference
                </h2>
                <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-9 gap-2">
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">A</div>
                        <div class="text-gold font-mono text-sm">.-</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">B</div>
                        <div class="text-gold font-mono text-sm">-...</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">C</div>
                        <div class="text-gold font-mono text-sm">-.-.</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">D</div>
                        <div class="text-gold font-mono text-sm">-..</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">E</div>
                        <div class="text-gold font-mono text-sm">.</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">F</div>
                        <div class="text-gold font-mono text-sm">..-.</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">G</div>
                        <div class="text-gold font-mono text-sm">--.</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">H</div>
                        <div class="text-gold font-mono text-sm">....</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">I</div>
                        <div class="text-gold font-mono text-sm">..</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">J</div>
                        <div class="text-gold font-mono text-sm">.---</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">K</div>
                        <div class="text-gold font-mono text-sm">-.-</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">L</div>
                        <div class="text-gold font-mono text-sm">.-..</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">M</div>
                        <div class="text-gold font-mono text-sm">--</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">N</div>
                        <div class="text-gold font-mono text-sm">-.</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">O</div>
                        <div class="text-gold font-mono text-sm">---</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">P</div>
                        <div class="text-gold font-mono text-sm">.--.</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">Q</div>
                        <div class="text-gold font-mono text-sm">--.-</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">R</div>
                        <div class="text-gold font-mono text-sm">.-.</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">S</div>
                        <div class="text-gold font-mono text-sm">...</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">T</div>
                        <div class="text-gold font-mono text-sm">-</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">U</div>
                        <div class="text-gold font-mono text-sm">..-</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">V</div>
                        <div class="text-gold font-mono text-sm">...-</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">W</div>
                        <div class="text-gold font-mono text-sm">.--</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">X</div>
                        <div class="text-gold font-mono text-sm">-..-</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">Y</div>
                        <div class="text-gold font-mono text-sm">-.--</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">Z</div>
                        <div class="text-gold font-mono text-sm">--..</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">0</div>
                        <div class="text-gold font-mono text-sm">-----</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">1</div>
                        <div class="text-gold font-mono text-sm">.----</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">2</div>
                        <div class="text-gold font-mono text-sm">..---</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">3</div>
                        <div class="text-gold font-mono text-sm">...--</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">4</div>
                        <div class="text-gold font-mono text-sm">....-</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">5</div>
                        <div class="text-gold font-mono text-sm">.....</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">6</div>
                        <div class="text-gold font-mono text-sm">-....</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">7</div>
                        <div class="text-gold font-mono text-sm">--...</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">8</div>
                        <div class="text-gold font-mono text-sm">---..</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
                        <div class="text-light font-bold text-lg">9</div>
                        <div class="text-gold font-mono text-sm">----.</div>
                    </div>
                </div>
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔄</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Bidirectional</h3>
                    <p class="text-light-muted text-sm">Translate text to Morse code or decode Morse code back to text. Switch between modes instantly with one click.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔊</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Audio Playback</h3>
                    <p class="text-light-muted text-sm">Listen to Morse code as audio beeps with adjustable WPM speed. Hear the dots and dashes as real sound signals.</p>
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
                            <span class="text-light font-medium">How does the Morse code translator work?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The tool maps each letter, number, and punctuation mark to its International Morse Code equivalent. A dot (<code class="bg-darkCard px-1 rounded">.</code>) is a short signal and a dash (<code class="bg-darkCard px-1 rounded">-</code>) is a long signal. Letters are separated by spaces, and words are separated by <code class="bg-darkCard px-1 rounded">/</code>. For example, "SOS" becomes <code class="bg-darkCard px-1 rounded">... --- ...</code>.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I listen to the Morse code as audio?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Click the Play button to hear the Morse code as audio beeps using the Web Audio API. A dot is a short beep (1 unit) and a dash is a longer beep (3 units). You can adjust the playback speed from 5 to 40 WPM (words per minute) using the speed slider.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I decode Morse code?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Switch to "Morse → Text" mode, then enter your Morse code using dots (<code class="bg-darkCard px-1 rounded">.</code>) and dashes (<code class="bg-darkCard px-1 rounded">-</code>). Separate letters with spaces and words with <code class="bg-darkCard px-1 rounded">/</code>. For example, <code class="bg-darkCard px-1 rounded">.... . .-.. .-.. ---</code> decodes to "HELLO".
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        // International Morse Code
        const textToMorse = {
            'A': '.-', 'B': '-...', 'C': '-.-.', 'D': '-..', 'E': '.', 'F': '..-.',
            'G': '--.', 'H': '....', 'I': '..', 'J': '.---', 'K': '-.-', 'L': '.-..',
            'M': '--', 'N': '-.', 'O': '---', 'P': '.--.', 'Q': '--.-', 'R': '.-.',
            'S': '...', 'T': '-', 'U': '..-', 'V': '...-', 'W': '.--', 'X': '-..-',
            'Y': '-.--', 'Z': '--..',
            '0': '-----', '1': '.----', '2': '..---', '3': '...--', '4': '....-',
            '5': '.....', '6': '-....', '7': '--...', '8': '---..', '9': '----.',
            '.': '.-.-.-', ',': '--..--', '?': '..--..', "'": '.----.', '!': '-.-.--',
            '/': '-..-.', '(': '-.--.', ')': '-.--.-', '&': '.-...', ':': '---...',
            ';': '-.-.-.', '=': '-...-', '+': '.-.-.', '-': '-....-', '_': '..--.-',
            '"': '.-..-.', '$': '...-..-', '@': '.--.-.'
        };

        // Reverse map for morse-to-text
        const morseToText = {};
        for (const [key, value] of Object.entries(textToMorse)) {
            morseToText[value] = key;
        }

        const textInput = document.getElementById('text-input');
        const textOutput = document.getElementById('text-output');
        const directionRadios = document.querySelectorAll('input[name="direction"]');
        const inputLabel = document.getElementById('input-label');
        const outputLabel = document.getElementById('output-label');
        const btnCopy = document.getElementById('btn-copy');
        const btnPlay = document.getElementById('btn-play');
        const playIcon = document.getElementById('play-icon');
        const playText = document.getElementById('play-text');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const speedSlider = document.getElementById('speed-slider');
        const speedLabel = document.getElementById('speed-label');
        const statsBar = document.getElementById('stats-bar');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');

        let isPlaying = false;
        let audioCtx = null;

        function getDirection() {
            return document.querySelector('input[name="direction"]:checked').value;
        }

        function encodeToMorse(text) {
            return text.toUpperCase().split('').map(ch => {
                if (ch === ' ') return '/';
                return textToMorse[ch] || '';
            }).filter(Boolean).join(' ');
        }

        function decodeFromMorse(morse) {
            return morse.trim().split(' / ').map(word =>
                word.split(' ').map(code => morseToText[code] || '').join('')
            ).join(' ');
        }

        function convert() {
            const input = textInput.value;
            if (!input) {
                textOutput.value = '';
                statsBar.classList.add('hidden');
                return;
            }

            const direction = getDirection();
            let result, morseCode;

            if (direction === 'text-to-morse') {
                result = encodeToMorse(input);
                morseCode = result;
            } else {
                result = decodeFromMorse(input);
                morseCode = input;
            }

            textOutput.value = result;

            // Stats
            const inputLen = input.length;
            const dots = (morseCode.match(/\./g) || []).length;
            const dashes = (morseCode.match(/-/g) || []).length;
            const words = direction === 'text-to-morse'
                ? input.trim().split(/\s+/).filter(Boolean).length
                : result.trim().split(/\s+/).filter(Boolean).length;

            document.getElementById('stat-chars').textContent = inputLen;
            document.getElementById('stat-symbols').textContent = dots + dashes;
            document.getElementById('stat-words').textContent = words;
            statsBar.classList.remove('hidden');
        }

        function getMorseForPlayback() {
            const direction = getDirection();
            if (direction === 'text-to-morse') {
                return textOutput.value;
            } else {
                return textInput.value;
            }
        }

        async function playMorse() {
            const morse = getMorseForPlayback();
            if (!morse || isPlaying) return;

            isPlaying = true;
            playText.textContent = 'Stop';
            playIcon.innerHTML = '<rect x="6" y="4" width="4" height="16" rx="1" fill="currentColor"></rect><rect x="14" y="4" width="4" height="16" rx="1" fill="currentColor"></rect>';

            if (!audioCtx) audioCtx = new (window.AudioContext || window.webkitAudioContext)();

            const wpm = parseInt(speedSlider.value);
            const dotDuration = 1.2 / wpm; // Standard PARIS timing

            const symbols = morse.split('');
            let time = audioCtx.currentTime;

            for (const symbol of symbols) {
                if (!isPlaying) break;

                if (symbol === '.') {
                    playBeep(time, dotDuration);
                    time += dotDuration * 2; // dot + inter-element gap
                } else if (symbol === '-') {
                    playBeep(time, dotDuration * 3);
                    time += dotDuration * 4; // dash + inter-element gap
                } else if (symbol === ' ') {
                    time += dotDuration * 3; // inter-letter gap (total 3, already 1 from prev)
                } else if (symbol === '/') {
                    time += dotDuration * 4; // word gap (total 7, already ~3 from spaces around /)
                }
            }

            // Wait for playback to finish
            const remaining = (time - audioCtx.currentTime) * 1000;
            if (remaining > 0) {
                await new Promise(resolve => {
                    const timeout = setTimeout(resolve, remaining);
                    const checkStop = setInterval(() => {
                        if (!isPlaying) {
                            clearTimeout(timeout);
                            clearInterval(checkStop);
                            resolve();
                        }
                    }, 50);
                });
            }

            stopPlayback();
        }

        function playBeep(startTime, duration) {
            const osc = audioCtx.createOscillator();
            const gain = audioCtx.createGain();
            osc.connect(gain);
            gain.connect(audioCtx.destination);
            osc.frequency.value = 600;
            gain.gain.value = 0.5;
            osc.start(startTime);
            osc.stop(startTime + duration);
        }

        function stopPlayback() {
            isPlaying = false;
            playText.textContent = 'Play';
            playIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
        }

        // Event listeners
        textInput.addEventListener('input', convert);

        directionRadios.forEach(r => r.addEventListener('change', function() {
            const dir = getDirection();
            if (dir === 'text-to-morse') {
                inputLabel.textContent = 'Your Text';
                outputLabel.textContent = 'Morse Code';
                textInput.placeholder = 'Type or paste your text here...';
                textOutput.placeholder = 'Morse code will appear here...';
            } else {
                inputLabel.textContent = 'Morse Code';
                outputLabel.textContent = 'Decoded Text';
                textInput.placeholder = 'Enter Morse code (use . and -, separate letters with spaces, words with /)...';
                textOutput.placeholder = 'Decoded text will appear here...';
            }
            textInput.value = '';
            textOutput.value = '';
            statsBar.classList.add('hidden');
        }));

        speedSlider.addEventListener('input', function() {
            speedLabel.textContent = this.value + ' WPM';
        });

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

        btnPlay.addEventListener('click', function() {
            if (isPlaying) {
                stopPlayback();
            } else {
                playMorse();
            }
        });

        btnSample.addEventListener('click', function() {
            const dir = getDirection();
            if (dir === 'text-to-morse') {
                textInput.value = 'Hello World! SOS';
            } else {
                textInput.value = '.... . .-.. .-.. --- / .-- --- .-. .-.. -.. -.-.-- / ... --- ...';
            }
            convert();
        });

        btnClear.addEventListener('click', function() {
            textInput.value = '';
            textOutput.value = '';
            statsBar.classList.add('hidden');
            stopPlayback();
        });
    })();
    </script>
    @endpush
</x-layout>
