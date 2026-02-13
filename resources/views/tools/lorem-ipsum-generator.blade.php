<x-layout>
    <x-slot:title>Lorem Ipsum Generator - Generate Placeholder Text Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free Lorem Ipsum generator. Generate placeholder text by paragraphs, sentences, or words. Perfect for mockups, designs, and testing. No signup required.</x-slot:description>
    <x-slot:keywords>lorem ipsum generator, placeholder text, dummy text generator, lorem ipsum, lipsum, sample text generator, filler text</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/lorem-ipsum-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Lorem Ipsum Generator - Generate Placeholder Text Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free Lorem Ipsum generator. Generate placeholder text by paragraphs, sentences, or words. Perfect for mockups and designs.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/lorem-ipsum-generator') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Lorem Ipsum Generator",
            "description": "Free Lorem Ipsum generator. Generate placeholder text by paragraphs, sentences, or words. Perfect for mockups, designs, and testing. No signup required.",
            "url": "https://hafiz.dev/tools/lorem-ipsum-generator",
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
                    "name": "Lorem Ipsum Generator",
                    "item": "https://hafiz.dev/tools/lorem-ipsum-generator"
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
                    "name": "What is Lorem Ipsum?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Lorem Ipsum is dummy text used in the printing and typesetting industry since the 1500s. It's derived from sections of 'De Finibus Bonorum et Malorum' by Cicero, written in 45 BC. The text has been the industry's standard placeholder text ever since, used to demonstrate visual layout without the distraction of meaningful content."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Why do designers use Lorem Ipsum?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Designers use Lorem Ipsum because it has a more-or-less normal distribution of letters, making it look like readable English. This allows viewers to focus on the design elements rather than being distracted by the content. It also prevents stakeholders from getting caught up in copywriting during the design review phase."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is the generated text random?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The text is semi-random. It uses a word bank of traditional Lorem Ipsum words and arranges them randomly into sentences and paragraphs. Each generation produces unique combinations while maintaining the familiar Latin-like appearance of classic Lorem Ipsum text."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I use this text commercially?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, Lorem Ipsum text is in the public domain and can be used freely for any purpose, including commercial projects. It's placeholder text with no copyright restrictions. However, remember to replace it with actual content before publishing your final work."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is this tool free?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, this Lorem Ipsum generator is completely free to use with no limits, no signup required, and no ads. All processing happens in your browser, so your data never leaves your computer."
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
                    <li class="text-gold">Lorem Ipsum Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Lorem Ipsum Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Generate placeholder text for your designs and mockups. 100% client-side - runs entirely in your browser.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Generation Type Tabs --}}
                <div class="mb-6">
                    <label class="text-light font-semibold mb-3 block">Generation Type</label>
                    <div class="flex flex-wrap gap-2">
                        <button data-type="paragraphs" class="type-tab px-4 py-2 rounded-lg font-semibold transition-all duration-300 cursor-pointer bg-gold text-darkBg">
                            Paragraphs
                        </button>
                        <button data-type="sentences" class="type-tab px-4 py-2 rounded-lg font-semibold transition-all duration-300 cursor-pointer border border-gold/50 text-light-muted hover:bg-gold/10 hover:text-gold">
                            Sentences
                        </button>
                        <button data-type="words" class="type-tab px-4 py-2 rounded-lg font-semibold transition-all duration-300 cursor-pointer border border-gold/50 text-light-muted hover:bg-gold/10 hover:text-gold">
                            Words
                        </button>
                    </div>
                </div>

                {{-- Quantity Slider --}}
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-3">
                        <label for="quantity-slider" class="text-light font-semibold">
                            <span id="quantity-label">Paragraphs</span>
                        </label>
                        <span id="quantity-display" class="text-gold font-mono text-lg font-bold">3</span>
                    </div>
                    <input type="range" id="quantity-slider" min="1" max="20" value="3"
                           class="w-full h-2 bg-darkBg rounded-lg appearance-none cursor-pointer accent-gold">
                    <div class="flex justify-between text-xs text-light-muted mt-1">
                        <span id="min-label">1</span>
                        <span id="max-label">20</span>
                    </div>
                </div>

                {{-- Options --}}
                <div class="mb-6 space-y-3">
                    <label class="flex items-center gap-3 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer w-fit">
                        <input type="checkbox" id="start-with-lorem" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                        <span class="text-light text-sm">Start with "Lorem ipsum dolor sit amet..."</span>
                    </label>
                    <label id="html-tags-option" class="flex items-center gap-3 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer w-fit">
                        <input type="checkbox" id="include-html-tags" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                        <span class="text-light text-sm">Include HTML &lt;p&gt; tags</span>
                    </label>
                </div>

                {{-- Generate Button --}}
                <div class="mb-6">
                    <button id="btn-generate" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        Generate
                    </button>
                </div>

                {{-- Stats Bar --}}
                <div class="mb-4 flex flex-wrap gap-4 text-sm">
                    <div class="flex items-center gap-2">
                        <span class="text-light-muted" id="count-label">Paragraphs:</span>
                        <span id="para-count" class="text-gold font-mono font-semibold">0</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-light-muted">Words:</span>
                        <span id="word-count" class="text-gold font-mono font-semibold">0</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-light-muted">Characters:</span>
                        <span id="char-count" class="text-gold font-mono font-semibold">0</span>
                    </div>
                </div>

                {{-- Output Textarea --}}
                <div class="mb-4">
                    <textarea id="output-textarea" readonly
                              class="w-full h-80 bg-darkBg border border-gold/20 rounded-lg p-4 text-light font-normal resize-y focus:border-gold/50 focus:outline-none"
                              placeholder="Click Generate to create placeholder text..."></textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3">
                    <button id="btn-copy" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy to Clipboard
                    </button>
                    <button id="btn-download" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download TXT
                    </button>
                    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
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

            {{-- What is Lorem Ipsum Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <h2 class="text-xl font-bold text-light mb-4">What is Lorem Ipsum?</h2>
                <p class="text-light-muted leading-relaxed">
                    Lorem Ipsum is dummy text used in the printing and typesetting industry since the 1500s.
                    It's used as placeholder text to demonstrate visual layout without the distraction of meaningful content.
                    The text is derived from "De Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero,
                    a Roman philosopher, written in 45 BC. It has survived five centuries of typesetting and has
                    remained the industry standard for placeholder text.
                </p>
            </div>

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📝</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Multiple Formats</h3>
                    <p class="text-light-muted text-sm">Generate text by paragraphs, sentences, or word count. Perfect for any design requirement.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">100%</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Client-Side</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. No data is sent to any server.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">Free</div>
                    <h3 class="text-lg font-semibold text-light mb-2">No Limits</h3>
                    <p class="text-light-muted text-sm">Generate unlimited text. No signup, no ads, no tracking.</p>
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
                            <span class="text-light font-medium">What is Lorem Ipsum?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Lorem Ipsum is dummy text used in the printing and typesetting industry since the 1500s. It's derived from sections of "De Finibus Bonorum et Malorum" by Cicero, written in 45 BC. The text has been the industry's standard placeholder text ever since, used to demonstrate visual layout without the distraction of meaningful content.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Why do designers use Lorem Ipsum?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Designers use Lorem Ipsum because it has a more-or-less normal distribution of letters, making it look like readable English. This allows viewers to focus on the design elements rather than being distracted by the content. It also prevents stakeholders from getting caught up in copywriting during the design review phase.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is the generated text random?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The text is semi-random. It uses a word bank of traditional Lorem Ipsum words and arranges them randomly into sentences and paragraphs. Each generation produces unique combinations while maintaining the familiar Latin-like appearance of classic Lorem Ipsum text.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I use this text commercially?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, Lorem Ipsum text is in the public domain and can be used freely for any purpose, including commercial projects. It's placeholder text with no copyright restrictions. However, remember to replace it with actual content before publishing your final work.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is this tool free?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, this Lorem Ipsum generator is completely free to use with no limits, no signup required, and no ads. All processing happens in your browser, so your data never leaves your computer.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.lorem-ipsum-generator-script')
    @endpush
</x-layout>
