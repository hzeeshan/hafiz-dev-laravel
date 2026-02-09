<x-layout>
    <x-slot:title>Word Counter - Count Characters, Words, Sentences Online | hafiz.dev</x-slot:title>
    <x-slot:description>Free online word counter tool. Count characters, words, sentences, paragraphs instantly. Shows reading time and speaking time. No signup required.</x-slot:description>
    <x-slot:keywords>word counter, character counter, word count online, letter counter, text analyzer, sentence counter, paragraph counter, reading time calculator</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/word-counter') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Word Counter - Count Characters, Words, Sentences Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online word counter tool. Count characters, words, sentences, paragraphs instantly. Shows reading time and speaking time.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/word-counter') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Word Counter",
            "description": "Free online word counter tool. Count characters, words, sentences, paragraphs instantly. Shows reading time and speaking time. No signup required.",
            "url": "https://hafiz.dev/tools/word-counter",
            "applicationCategory": "DeveloperApplication",
            "operatingSystem": "Any",
            "offers": {
                "@@type": "Offer",
                "price": "0",
                "priceCurrency": "USD"
            },
            "author": {
                "@@type": "Person",
                "name": "Hafiz Riaz",
                "url": "https://hafiz.dev"
            }
        }
        </script>

        {{-- BreadcrumbList Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "BreadcrumbList",
            "itemListElement": [
                {
                    "@@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "https://hafiz.dev"
                },
                {
                    "@@type": "ListItem",
                    "position": 2,
                    "name": "Tools",
                    "item": "https://hafiz.dev/tools"
                },
                {
                    "@@type": "ListItem",
                    "position": 3,
                    "name": "Word Counter",
                    "item": "https://hafiz.dev/tools/word-counter"
                }
            ]
        }
        </script>

        {{-- FAQPage Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "FAQPage",
            "mainEntity": [
                {
                    "@@type": "Question",
                    "name": "How is word count calculated?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Words are counted by splitting the text by whitespace (spaces, tabs, line breaks) and counting non-empty segments. This means 'hello world' counts as 2 words, and multiple spaces between words don't affect the count."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How is reading time calculated?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Reading time is calculated based on an average reading speed of 200 words per minute, which is the typical silent reading speed for adults. The result is rounded up to the nearest minute."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What counts as a sentence?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A sentence is detected by looking for text ending with a period (.), exclamation mark (!), or question mark (?). Multiple punctuation marks (like '...' or '?!') are treated as a single sentence ending."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What counts as a paragraph?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A paragraph is detected by looking for text separated by one or more blank lines (double line breaks). Single line breaks within continuous text are not counted as paragraph separators."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does this tool work offline?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Once the page is loaded, the word counter works entirely in your browser without any server communication. All processing happens locally on your device, making it fast and private."
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
                    <li class="text-gold">Word Counter</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Word Counter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Count words, characters, sentences, and paragraphs instantly. 100% client-side - runs entirely in your browser.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Toolbar --}}
                <div class="flex flex-wrap gap-3 mb-4">
                    <button id="btn-paste" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        Paste
                    </button>
                    <button id="btn-copy" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                </div>

                {{-- Textarea --}}
                <div class="mb-6">
                    <textarea id="text-input"
                              class="w-full bg-darkBg border border-gold/20 rounded-lg p-4 text-light font-normal resize-y focus:border-gold/50 focus:outline-none"
                              style="min-height: 300px;"
                              placeholder="Type or paste your text here..."></textarea>
                </div>

                {{-- Stats Grid --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    {{-- Characters (total) --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-chars" class="text-3xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Characters</div>
                    </div>

                    {{-- Characters (no spaces) --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-chars-no-spaces" class="text-3xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Characters (no spaces)</div>
                    </div>

                    {{-- Words --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-words" class="text-3xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Words</div>
                    </div>

                    {{-- Sentences --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-sentences" class="text-3xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Sentences</div>
                    </div>

                    {{-- Paragraphs --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-paragraphs" class="text-3xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Paragraphs</div>
                    </div>

                    {{-- Lines --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-lines" class="text-3xl font-bold text-gold mb-1">0</div>
                        <div class="text-light-muted text-sm">Lines</div>
                    </div>

                    {{-- Reading Time --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-reading-time" class="text-3xl font-bold text-gold mb-1">0 min</div>
                        <div class="text-light-muted text-sm">Reading Time</div>
                    </div>

                    {{-- Speaking Time --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div id="stat-speaking-time" class="text-3xl font-bold text-gold mb-1">0 min</div>
                        <div class="text-light-muted text-sm">Speaking Time</div>
                    </div>
                </div>

                {{-- Character Limit Section --}}
                <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                        <div class="flex items-center gap-3">
                            <label for="char-limit" class="text-light text-sm whitespace-nowrap">Character Limit:</label>
                            <input type="number" id="char-limit"
                                   class="w-28 bg-transparent border border-gold/30 rounded px-3 py-1.5 text-light text-sm focus:border-gold focus:outline-none"
                                   placeholder="Optional" min="1">
                        </div>
                        <div class="flex-1">
                            <div id="limit-progress-container" class="hidden">
                                <div class="flex justify-between text-xs text-light-muted mb-1">
                                    <span id="limit-usage">0 / 0 characters</span>
                                    <span id="limit-remaining">0 remaining</span>
                                </div>
                                <div class="h-2 bg-gold/10 rounded-full overflow-hidden">
                                    <div id="limit-progress-bar" class="h-full bg-gold transition-all duration-300 rounded-full" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Success/Copy Notification --}}
                <div id="copy-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="copy-message" class="text-green-400 text-sm"></span>
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

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">⚡</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Real-Time Analysis</h3>
                    <p class="text-light-muted text-sm">Statistics update instantly as you type. No need to click any button.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">100%</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Client-Side</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. No data is sent to any server.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📊</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Comprehensive Stats</h3>
                    <p class="text-light-muted text-sm">Get words, characters, sentences, paragraphs, and estimated reading/speaking time.</p>
                </div>
            </div>

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

            {{-- CTA Section --}}
            <x-tool-cta />

            {{-- FAQ Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Frequently Asked Questions</h2>

                <div class="space-y-4 max-w-3xl mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How is word count calculated?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Words are counted by splitting the text by whitespace (spaces, tabs, line breaks) and counting non-empty segments. This means "hello world" counts as 2 words, and multiple spaces between words don't affect the count.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How is reading time calculated?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Reading time is calculated based on an average reading speed of 200 words per minute, which is the typical silent reading speed for adults. The result is rounded up to the nearest minute.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What counts as a sentence?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A sentence is detected by looking for text ending with a period (.), exclamation mark (!), or question mark (?). Multiple punctuation marks (like "..." or "?!") are treated as a single sentence ending.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What counts as a paragraph?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A paragraph is detected by looking for text separated by one or more blank lines (double line breaks). Single line breaks within continuous text are not counted as paragraph separators.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does this tool work offline?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Once the page is loaded, the word counter works entirely in your browser without any server communication. All processing happens locally on your device, making it fast and private.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        // DOM Elements
        const textInput = document.getElementById('text-input');
        const btnPaste = document.getElementById('btn-paste');
        const btnCopy = document.getElementById('btn-copy');
        const btnClear = document.getElementById('btn-clear');
        const charLimitInput = document.getElementById('char-limit');
        const limitProgressContainer = document.getElementById('limit-progress-container');
        const limitUsage = document.getElementById('limit-usage');
        const limitRemaining = document.getElementById('limit-remaining');
        const limitProgressBar = document.getElementById('limit-progress-bar');
        const copyNotification = document.getElementById('copy-notification');
        const copyMessage = document.getElementById('copy-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        // Stat elements
        const statChars = document.getElementById('stat-chars');
        const statCharsNoSpaces = document.getElementById('stat-chars-no-spaces');
        const statWords = document.getElementById('stat-words');
        const statSentences = document.getElementById('stat-sentences');
        const statParagraphs = document.getElementById('stat-paragraphs');
        const statLines = document.getElementById('stat-lines');
        const statReadingTime = document.getElementById('stat-reading-time');
        const statSpeakingTime = document.getElementById('stat-speaking-time');

        // Analyze text and return all stats
        function analyzeText(text) {
            // Characters (total)
            const charCount = text.length;

            // Characters (no spaces)
            const charNoSpaces = text.replace(/\s/g, '').length;

            // Words (split by whitespace, filter empty)
            const words = text.trim().split(/\s+/).filter(word => word.length > 0);
            const wordCount = text.trim() === '' ? 0 : words.length;

            // Sentences (split by . ! ? followed by space or end)
            const sentences = text.split(/[.!?]+/).filter(s => s.trim().length > 0);
            const sentenceCount = text.trim() === '' ? 0 : sentences.length;

            // Paragraphs (split by double newline or multiple newlines)
            const paragraphs = text.split(/\n\s*\n/).filter(p => p.trim().length > 0);
            const paragraphCount = text.trim() === '' ? 0 : paragraphs.length;

            // Lines (split by single newline)
            const lines = text.split(/\n/);
            const lineCount = text === '' ? 0 : lines.length;

            // Reading time (200 words per minute average)
            const readingMinutes = Math.ceil(wordCount / 200);
            const readingTime = wordCount === 0 ? '0 min' : (readingMinutes < 1 ? '< 1 min' : `${readingMinutes} min`);

            // Speaking time (150 words per minute average)
            const speakingMinutes = Math.ceil(wordCount / 150);
            const speakingTime = wordCount === 0 ? '0 min' : (speakingMinutes < 1 ? '< 1 min' : `${speakingMinutes} min`);

            return {
                charCount,
                charNoSpaces,
                wordCount,
                sentenceCount,
                paragraphCount,
                lineCount,
                readingTime,
                speakingTime
            };
        }

        // Update display with stats
        function updateDisplay(stats) {
            statChars.textContent = stats.charCount.toLocaleString();
            statCharsNoSpaces.textContent = stats.charNoSpaces.toLocaleString();
            statWords.textContent = stats.wordCount.toLocaleString();
            statSentences.textContent = stats.sentenceCount.toLocaleString();
            statParagraphs.textContent = stats.paragraphCount.toLocaleString();
            statLines.textContent = stats.lineCount.toLocaleString();
            statReadingTime.textContent = stats.readingTime;
            statSpeakingTime.textContent = stats.speakingTime;

            // Update character limit if set
            updateCharacterLimit(stats.charCount);
        }

        // Update character limit progress
        function updateCharacterLimit(currentChars) {
            const limit = parseInt(charLimitInput.value, 10);

            if (limit && limit > 0) {
                limitProgressContainer.classList.remove('hidden');

                const percentage = Math.min((currentChars / limit) * 100, 100);
                const remaining = limit - currentChars;

                limitUsage.textContent = `${currentChars.toLocaleString()} / ${limit.toLocaleString()} characters`;
                limitRemaining.textContent = remaining >= 0 ? `${remaining.toLocaleString()} remaining` : `${Math.abs(remaining).toLocaleString()} over limit`;

                limitProgressBar.style.width = `${percentage}%`;

                // Change color based on usage
                if (percentage >= 100) {
                    limitProgressBar.classList.remove('bg-gold', 'bg-yellow-500');
                    limitProgressBar.classList.add('bg-red-500');
                    limitRemaining.classList.add('text-red-400');
                    limitRemaining.classList.remove('text-light-muted');
                } else if (percentage >= 90) {
                    limitProgressBar.classList.remove('bg-gold', 'bg-red-500');
                    limitProgressBar.classList.add('bg-yellow-500');
                    limitRemaining.classList.remove('text-red-400');
                    limitRemaining.classList.add('text-light-muted');
                } else {
                    limitProgressBar.classList.remove('bg-yellow-500', 'bg-red-500');
                    limitProgressBar.classList.add('bg-gold');
                    limitRemaining.classList.remove('text-red-400');
                    limitRemaining.classList.add('text-light-muted');
                }
            } else {
                limitProgressContainer.classList.add('hidden');
            }
        }

        // Show success notification
        function showNotification(message) {
            copyMessage.textContent = message;
            copyNotification.classList.remove('hidden');
            errorNotification.classList.add('hidden');

            setTimeout(() => {
                copyNotification.classList.add('hidden');
            }, 2000);
        }

        // Show error notification
        function showError(message) {
            errorMessage.textContent = message;
            errorNotification.classList.remove('hidden');
            copyNotification.classList.add('hidden');

            setTimeout(() => {
                errorNotification.classList.add('hidden');
            }, 3000);
        }

        // Paste from clipboard
        async function pasteText() {
            try {
                const text = await navigator.clipboard.readText();
                textInput.value = text;
                textInput.dispatchEvent(new Event('input'));
                showNotification('Text pasted from clipboard!');
            } catch (err) {
                showError('Unable to paste. Please check clipboard permissions.');
            }
        }

        // Copy to clipboard
        async function copyText() {
            const text = textInput.value;
            if (!text) {
                showError('Nothing to copy. Enter some text first.');
                return;
            }

            try {
                await navigator.clipboard.writeText(text);
                showNotification('Copied to clipboard!');
            } catch (err) {
                showError('Failed to copy to clipboard.');
            }
        }

        // Clear text
        function clearText() {
            textInput.value = '';
            textInput.dispatchEvent(new Event('input'));
        }

        // Event Listeners
        textInput.addEventListener('input', function() {
            const stats = analyzeText(this.value);
            updateDisplay(stats);
        });

        charLimitInput.addEventListener('input', function() {
            const stats = analyzeText(textInput.value);
            updateCharacterLimit(stats.charCount);
        });

        btnPaste.addEventListener('click', pasteText);
        btnCopy.addEventListener('click', copyText);
        btnClear.addEventListener('click', clearText);

        // Initialize with empty stats
        updateDisplay(analyzeText(''));
    })();
    </script>
    @endpush
</x-layout>
