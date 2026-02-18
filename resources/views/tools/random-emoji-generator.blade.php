<x-layout>
    <x-slot:title>Random Emoji Generator - Free Online Emoji Picker | hafiz.dev</x-slot:title>
    <x-slot:description>Free online random emoji generator. Generate random emojis by category, copy to clipboard, and use for social media, Slack, Discord, and more. No signup required.</x-slot:description>
    <x-slot:keywords>random emoji generator, emoji picker, random emoji, emoji generator online, free emoji generator, random emoji picker, emoji randomizer, copy paste emoji</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/random-emoji-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Random Emoji Generator - Free Online Emoji Picker | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online random emoji generator. Generate random emojis by category, copy to clipboard instantly. No signup required.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/random-emoji-generator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Random Emoji Generator",
            "description": "Free online random emoji generator. Generate random emojis by category, copy to clipboard instantly.",
            "url": "https://hafiz.dev/tools/random-emoji-generator",
            "applicationCategory": "UtilitiesApplication",
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
                    "name": "Random Emoji Generator",
                    "item": "https://hafiz.dev/tools/random-emoji-generator"
                }
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
                    "name": "How does the random emoji generator work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The generator picks emojis randomly from a curated collection of popular Unicode emojis. You can filter by category (Smileys, Animals, Food, etc.), set how many to generate, and copy them to your clipboard with one click."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I filter emojis by category?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! You can choose from categories like Smileys & People, Animals & Nature, Food & Drink, Activities, Travel & Places, Objects, Symbols, and Flags. Or select 'All' to pick from every category."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Are the emojis free to use anywhere?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Absolutely. All emojis are standard Unicode characters that work everywhere — social media, messaging apps, emails, documents, code, and websites. Just copy and paste."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How many emojis can I generate at once?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "You can generate between 1 and 100 emojis at a time. Use the quantity selector or type a custom number. All generated emojis can be copied to clipboard with a single click."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my data stored or sent to a server?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "No. This tool runs 100% in your browser. No data is sent to any server. The emoji generation happens entirely client-side using JavaScript."
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
                    <li class="text-gold">Random Emoji Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Random Emoji Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Generate random emojis instantly. Filter by category, pick how many you need, and copy to clipboard for social media, Slack, Discord, and more.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="emoji-category" class="text-light font-semibold mb-2 block text-sm">Category</label>
                            <select id="emoji-category" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="all">All Categories</option>
                                <option value="smileys">Smileys & People</option>
                                <option value="animals">Animals & Nature</option>
                                <option value="food">Food & Drink</option>
                                <option value="activities">Activities</option>
                                <option value="travel">Travel & Places</option>
                                <option value="objects">Objects</option>
                                <option value="symbols">Symbols</option>
                                <option value="flags">Flags</option>
                            </select>
                        </div>
                        <div>
                            <label for="emoji-count" class="text-light font-semibold mb-2 block text-sm">Quantity</label>
                            <input type="number" id="emoji-count" min="1" max="1000" value="12" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none">
                        </div>
                        <div>
                            <label for="emoji-separator" class="text-light font-semibold mb-2 block text-sm">Separator</label>
                            <select id="emoji-separator" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="none">None (joined)</option>
                                <option value="space" selected>Space</option>
                                <option value="newline">New Line</option>
                                <option value="comma">Comma</option>
                            </select>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="unique-only" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Unique Only</span>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Output Area --}}
                <div class="mb-6">
                    <label for="emoji-output" class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Generated Emojis
                    </label>
                    <style>#emoji-output::placeholder { font-size: 0.875rem; }</style>
                    <textarea
                        id="emoji-output"
                        class="w-full min-h-[200px] bg-darkBg border border-gold/20 rounded-lg p-4 text-3xl text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none leading-relaxed"
                        placeholder="Click 'Generate' to get random emojis..."
                        readonly
                    ></textarea>
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
                            <div id="stat-count" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Emojis Generated</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-category" class="text-2xl font-bold text-light mb-1">-</div>
                            <div class="text-light-muted text-sm">Category</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-unique" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Unique Emojis</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-pool" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Available in Pool</div>
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
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Category Filtering</h3>
                    <p class="text-light-muted text-sm">Pick from 8 emoji categories — Smileys, Animals, Food, Activities, Travel, Objects, Symbols, and Flags — or generate from all at once.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant Copy & Download</h3>
                    <p class="text-light-muted text-sm">Copy emojis to clipboard with one click or download as a text file. Perfect for pasting into social media, Slack, Discord, or documents.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Client-Side</h3>
                    <p class="text-light-muted text-sm">Everything runs in your browser. No data is sent to any server. Fast, private, and works offline once the page is loaded.</p>
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
                            <span class="text-light font-medium">How does the random emoji generator work?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The generator picks emojis randomly from a curated collection of popular Unicode emojis. You can filter by category (Smileys, Animals, Food, etc.), set how many to generate, and copy them to your clipboard with one click. The randomization uses your browser's built-in random number generator.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I filter emojis by category?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! You can choose from 8 categories: Smileys & People, Animals & Nature, Food & Drink, Activities, Travel & Places, Objects, Symbols, and Flags. Or select "All Categories" to pick randomly from the entire emoji set.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Are these emojis free to use anywhere?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Absolutely. All emojis are standard Unicode characters that work everywhere — social media (Instagram, Twitter/X, Facebook), messaging apps (Slack, Discord, WhatsApp), emails, documents, and websites. Just copy and paste.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How many emojis can I generate at once?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            You can generate between 1 and 100 emojis at a time. Use the quantity input to set any number in that range. Enable "Unique Only" to ensure no emoji appears twice in the same batch (limited by the pool size of the selected category).
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my data stored or sent to a server?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            No. This tool runs 100% in your browser using JavaScript. No data is sent to any server, no cookies are stored, and nothing is tracked. The emoji generation happens entirely client-side.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        // Emoji data by category
        const EMOJIS = {
            smileys: ['😀','😃','😄','😁','😆','😅','🤣','😂','🙂','🙃','😉','😊','😇','🥰','😍','🤩','😘','😗','😚','😙','🥲','😋','😛','😜','🤪','😝','🤑','🤗','🤭','🤫','🤔','🫡','🤐','🤨','😐','😑','😶','🫥','😏','😒','🙄','😬','🤥','😌','😔','😪','🤤','😴','😷','🤒','🤕','🤢','🤮','🥵','🥶','🥴','😵','🤯','🤠','🥳','🥸','😎','🤓','🧐','😕','🫤','😟','🙁','😮','😯','😲','😳','🥺','🥹','😦','😧','😨','😰','😥','😢','😭','😱','😖','😣','😞','😓','😩','😫','🥱','😤','😡','😠','🤬','😈','👿','💀','☠️','💩','🤡','👹','👺','👻','👽','👾','🤖','😺','😸','😹','😻','😼','😽','🙀','😿','😾','🫶','👋','🤚','🖐️','✋','🖖','🫱','🫲','🫳','🫴','👌','🤌','🤏','✌️','🤞','🫰','🤟','🤘','🤙','👈','👉','👆','🖕','👇','☝️','🫵','👍','👎','✊','👊','🤛','🤜','👏','🙌','🫶','👐','🤲','🤝','🙏','💪','🦾','🦿','🦵','🦶','👂','🦻','👃','🧠','🫀','🫁','🦷','🦴','👀','👁️','👅','👄'],
            animals: ['🐶','🐱','🐭','🐹','🐰','🦊','🐻','🐼','🐻‍❄️','🐨','🐯','🦁','🐮','🐷','🐽','🐸','🐵','🙈','🙉','🙊','🐒','🐔','🐧','🐦','🐤','🐣','🐥','🦆','🦅','🦉','🦇','🐺','🐗','🐴','🦄','🐝','🪱','🐛','🦋','🐌','🐞','🐜','🪰','🪲','🪳','🦟','🦗','🕷️','🕸️','🦂','🐢','🐍','🦎','🦖','🦕','🐙','🦑','🦐','🦞','🦀','🪼','🐡','🐠','🐟','🐬','🐳','🐋','🦈','🐊','🐅','🐆','🦓','🦍','🦧','🐘','🦛','🦏','🐪','🐫','🦒','🦘','🦬','🐃','🐂','🐄','🐎','🐖','🐏','🐑','🦙','🐐','🦌','🐕','🐩','🦮','🐕‍🦺','🐈','🐈‍⬛','🪶','🐓','🦃','🦤','🦚','🦜','🦢','🦩','🕊️','🐇','🦝','🦨','🦡','🦫','🦦','🦥','🐁','🐀','🐿️','🦔','🐾','🐉','🐲','🌵','🎄','🌲','🌳','🌴','🪵','🌱','🌿','☘️','🍀','🎍','🪴','🎋','🍃','🍂','🍁','🍄','🌾','💐','🌷','🌹','🥀','🌺','🌸','🌼','🌻','🌞','🌝','🌛','🌜','🌚','🌕','🌖','🌗','🌘','🌑','🌒','🌓','🌔','🌙','🌎','🌍','🌏','🪐','💫','⭐','🌟','✨','⚡','☄️','💥','🔥','🌪️','🌈','☀️','🌤️','⛅','🌥️','☁️','🌦️','🌧️','⛈️','🌩️','🌨️','❄️','☃️','⛄','🌬️','💨','💧','💦','🫧','☔','☂️','🌊','🌫️'],
            food: ['🍏','🍎','🍐','🍊','🍋','🍌','🍉','🍇','🍓','🫐','🍈','🍒','🍑','🥭','🍍','🥥','🥝','🍅','🍆','🥑','🥦','🥬','🥒','🌶️','🫑','🌽','🥕','🫒','🧄','🧅','🥔','🍠','🫘','🥐','🥯','🍞','🥖','🥨','🧀','🥚','🍳','🧈','🥞','🧇','🥓','🥩','🍗','🍖','🦴','🌭','🍔','🍟','🍕','🫓','🥪','🥙','🧆','🌮','🌯','🫔','🥗','🥘','🫕','🍝','🍜','🍲','🍛','🍣','🍱','🥟','🦪','🍤','🍙','🍚','🍘','🍥','🥠','🥮','🍢','🍡','🍧','🍨','🍦','🥧','🧁','🍰','🎂','🍮','🍭','🍬','🍫','🍿','🍩','🍪','🌰','🥜','🍯','🥛','🍼','🫖','☕','🍵','🧃','🥤','🧋','🍶','🍺','🍻','🥂','🍷','🥃','🍸','🍹','🧉','🍾','🧊','🥄','🍴','🍽️','🥣','🥡','🥢'],
            activities: ['⚽','🏀','🏈','⚾','🥎','🎾','🏐','🏉','🥏','🎱','🪀','🏓','🏸','🏒','🏑','🥍','🏏','🪃','🥅','⛳','🪁','🏹','🎣','🤿','🥊','🥋','🎽','🛹','🛼','🛷','⛸️','🥌','🎿','⛷️','🏂','🪂','🏋️','🤼','🤸','🤺','⛹️','🤾','🏌️','🏇','🧘','🏄','🏊','🤽','🚣','🧗','🚴','🚵','🎖️','🏆','🥇','🥈','🥉','🏅','🎪','🤹','🎭','🎨','🎬','🎤','🎧','🎼','🎹','🥁','🪘','🎷','🎺','🪗','🎸','🪕','🎻','🎲','♟️','🎯','🎳','🎮','🕹️','🎰','🧩','🃏','🀄','🎴','🎐','🧸','🪅','🪩','🪆','🖼️','🧵','🪡','🧶','🪢'],
            travel: ['🚗','🚕','🚙','🚌','🚎','🏎️','🚓','🚑','🚒','🚐','🛻','🚚','🚛','🚜','🏍️','🛵','🚲','🛴','🛺','🚏','🛣️','🛤️','🛞','⛽','🛞','🚨','🚥','🚦','🛑','🚧','⚓','🛟','⛵','🛶','🚤','🛳️','⛴️','🛥️','🚢','✈️','🛩️','🛫','🛬','🪂','💺','🚁','🚟','🚠','🚡','🛰️','🚀','🛸','🏠','🏡','🏘️','🏚️','🏗️','🏭','🏢','🏬','🏣','🏤','🏥','🏦','🏨','🏪','🏫','🏩','💒','🏛️','⛪','🕌','🕍','🛕','🕋','⛩️','🛖','🗾','🎑','🏞️','🌅','🌄','🌠','🎇','🎆','🌇','🌆','🏙️','🌃','🌌','🌉','🌁','🗼','🗽','🗿','🏰','🏯','🎡','🎢','🎠','⛲','⛱️','🏖️','🏝️','🏜️','🌋','⛰️','🏔️','🗻','🧭','🏕️','⛺','🛖'],
            objects: ['⌚','📱','📲','💻','⌨️','🖥️','🖨️','🖱️','🖲️','🕹️','🗜️','💽','💾','💿','📀','📼','📷','📸','📹','🎥','📽️','🎞️','📞','☎️','📟','📠','📺','📻','🎙️','🎚️','🎛️','🧭','⏱️','⏲️','⏰','🕰️','⌛','⏳','📡','🔋','🪫','🔌','💡','🔦','🕯️','🪔','🧯','🛢️','💸','💵','💴','💶','💷','🪙','💰','💳','🪪','💎','⚖️','🪜','🧰','🪛','🔧','🔨','⚒️','🛠️','⛏️','🪚','🔩','⚙️','🪤','🧱','⛓️','🧲','🔫','💣','🧨','🪓','🔪','🗡️','⚔️','🛡️','🚬','⚰️','🪦','⚱️','🏺','🔮','📿','🧿','🪬','💈','⚗️','🔭','🔬','🕳️','🩹','🩺','🩻','🩼','💊','💉','🩸','🧬','🦠','🧫','🧪','🌡️','🧹','🪠','🧺','🧻','🧼','🫧','🪥','🧽','🧯','🛒','🚬','🪑','🛗','🪞','🪟','🛏️','🛋️','🪑','🚿','🛁','🪤','🪒','🧴','🧷','🧹','🧺','🔑','🗝️','🚪','🪑','💡','📦','📫','📪','📬','📭','📮','🗳️','✏️','✒️','🖋️','🖊️','🖌️','🖍️','📝','💼','📁','📂','🗂️','📅','📆','🗒️','🗓️','📇','📈','📉','📊','📋','📌','📍','📎','🖇️','📏','📐','✂️','🗃️','🗄️','🗑️','🔒','🔓','🔏','🔐','🔑','🗝️'],
            symbols: ['❤️','🧡','💛','💚','💙','💜','🖤','🤍','🤎','💔','❤️‍🔥','❤️‍🩹','❣️','💕','💞','💓','💗','💖','💘','💝','💟','☮️','✝️','☪️','🕉️','☸️','✡️','🔯','🕎','☯️','☦️','🛐','⛎','♈','♉','♊','♋','♌','♍','♎','♏','♐','♑','♒','♓','🆔','⚛️','🉑','☢️','☣️','📴','📳','🈶','🈚','🈸','🈺','🈷️','✴️','🆚','💮','🉐','㊙️','㊗️','🈴','🈵','🈹','🈲','🅰️','🅱️','🆎','🆑','🅾️','🆘','❌','⭕','🛑','⛔','📛','🚫','💯','💢','♨️','🚷','🚯','🚳','🚱','🔞','📵','🚭','❗','❕','❓','❔','‼️','⁉️','🔅','🔆','〽️','⚠️','🚸','🔱','⚜️','🔰','♻️','✅','🈯','💹','❇️','✳️','❎','🌐','💠','Ⓜ️','🌀','💤','🏧','🚾','♿','🅿️','🛗','🈳','🈂️','🛂','🛃','🛄','🛅','🚹','🚺','🚼','⚧️','🚻','🚮','🎦','📶','🈁','🔣','ℹ️','🔤','🔡','🔠','🆖','🆗','🆙','🆒','🆕','🆓','0️⃣','1️⃣','2️⃣','3️⃣','4️⃣','5️⃣','6️⃣','7️⃣','8️⃣','9️⃣','🔟','🔢','#️⃣','*️⃣','⏏️','▶️','⏸️','⏯️','⏹️','⏺️','⏭️','⏮️','⏩','⏪','⏫','⏬','◀️','🔼','🔽','➡️','⬅️','⬆️','⬇️','↗️','↘️','↙️','↖️','↕️','↔️','↪️','↩️','⤴️','⤵️','🔀','🔁','🔂','🔄','🔃','🎵','🎶','➕','➖','➗','✖️','🟰','♾️','💲','💱','™️','©️','®️','〰️','➰','➿','🔚','🔙','🔛','🔝','🔜','✔️','☑️','🔘','🔴','🟠','🟡','🟢','🔵','🟣','⚫','⚪','🟤','🔺','🔻','🔸','🔹','🔶','🔷','🔳','🔲','▪️','▫️','◾','◽','◼️','◻️','🟥','🟧','🟨','🟩','🟦','🟪','⬛','⬜','🟫','🔈','🔇','🔉','🔊','🔔','🔕','📣','📢','💬','💭','🗯️','♠️','♣️','♥️','♦️','🃏','🎴','🀄','🕐','🕑','🕒','🕓','🕔','🕕','🕖','🕗','🕘','🕙','🕚','🕛'],
            flags: ['🏁','🚩','🎌','🏴','🏳️','🏳️‍🌈','🏳️‍⚧️','🏴‍☠️','🇦🇫','🇦🇱','🇩🇿','🇦🇸','🇦🇩','🇦🇴','🇦🇮','🇦🇬','🇦🇷','🇦🇲','🇦🇼','🇦🇺','🇦🇹','🇦🇿','🇧🇸','🇧🇭','🇧🇩','🇧🇧','🇧🇾','🇧🇪','🇧🇿','🇧🇯','🇧🇲','🇧🇹','🇧🇴','🇧🇦','🇧🇼','🇧🇷','🇧🇳','🇧🇬','🇧🇫','🇧🇮','🇰🇭','🇨🇲','🇨🇦','🇨🇻','🇨🇫','🇹🇩','🇨🇱','🇨🇳','🇨🇴','🇰🇲','🇨🇬','🇨🇩','🇨🇷','🇭🇷','🇨🇺','🇨🇾','🇨🇿','🇩🇰','🇩🇯','🇩🇲','🇩🇴','🇪🇨','🇪🇬','🇸🇻','🇬🇶','🇪🇷','🇪🇪','🇸🇿','🇪🇹','🇫🇯','🇫🇮','🇫🇷','🇬🇦','🇬🇲','🇬🇪','🇩🇪','🇬🇭','🇬🇷','🇬🇩','🇬🇹','🇬🇳','🇬🇾','🇭🇹','🇭🇳','🇭🇰','🇭🇺','🇮🇸','🇮🇳','🇮🇩','🇮🇷','🇮🇶','🇮🇪','🇮🇱','🇮🇹','🇯🇲','🇯🇵','🇯🇴','🇰🇿','🇰🇪','🇰🇼','🇱🇧','🇱🇾','🇲🇾','🇲🇽','🇲🇦','🇲🇿','🇳🇱','🇳🇿','🇳🇬','🇳🇴','🇵🇰','🇵🇦','🇵🇪','🇵🇭','🇵🇱','🇵🇹','🇶🇦','🇷🇴','🇷🇺','🇸🇦','🇷🇸','🇸🇬','🇸🇰','🇸🇮','🇿🇦','🇰🇷','🇪🇸','🇱🇰','🇸🇪','🇨🇭','🇹🇼','🇹🇭','🇹🇷','🇺🇦','🇦🇪','🇬🇧','🇺🇸','🇺🇾','🇻🇪','🇻🇳']
        };

        const CATEGORY_LABELS = {
            all: 'All Categories',
            smileys: 'Smileys & People',
            animals: 'Animals & Nature',
            food: 'Food & Drink',
            activities: 'Activities',
            travel: 'Travel & Places',
            objects: 'Objects',
            symbols: 'Symbols',
            flags: 'Flags'
        };

        // DOM Elements
        const emojiCategory = document.getElementById('emoji-category');
        const emojiCount = document.getElementById('emoji-count');
        const emojiSeparator = document.getElementById('emoji-separator');
        const uniqueOnly = document.getElementById('unique-only');
        const emojiOutput = document.getElementById('emoji-output');
        const btnGenerate = document.getElementById('btn-generate');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const statsBar = document.getElementById('stats-bar');
        const statCount = document.getElementById('stat-count');
        const statCategory = document.getElementById('stat-category');
        const statUnique = document.getElementById('stat-unique');
        const statPool = document.getElementById('stat-pool');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        function getPool() {
            const cat = emojiCategory.value;
            if (cat === 'all') {
                return Object.values(EMOJIS).flat();
            }
            return EMOJIS[cat] || [];
        }

        function getSeparator() {
            const val = emojiSeparator.value;
            if (val === 'none') return '';
            if (val === 'space') return ' ';
            if (val === 'newline') return '\n';
            if (val === 'comma') return ', ';
            return ' ';
        }

        function generate() {
            const pool = getPool();
            let count = parseInt(emojiCount.value) || 12;
            count = Math.max(1, Math.min(1000, count));
            emojiCount.value = count;

            if (pool.length === 0) {
                showError('No emojis available for the selected category.');
                return;
            }

            const unique = uniqueOnly.checked;
            if (unique && count > pool.length) {
                count = pool.length;
                emojiCount.value = count;
                showError('Unique mode: reduced to ' + count + ' (max available in this category).');
            }

            let result = [];
            if (unique) {
                const shuffled = [...pool].sort(() => Math.random() - 0.5);
                result = shuffled.slice(0, count);
            } else {
                for (let i = 0; i < count; i++) {
                    result.push(pool[Math.floor(Math.random() * pool.length)]);
                }
            }

            const sep = getSeparator();
            emojiOutput.value = result.join(sep);

            // Stats
            const uniqueSet = new Set(result);
            statCount.textContent = result.length;
            statCategory.textContent = CATEGORY_LABELS[emojiCategory.value] || 'All';
            statUnique.textContent = uniqueSet.size;
            statPool.textContent = pool.length;
            statsBar.classList.remove('hidden');

            showSuccess(result.length + ' emoji(s) generated!');
        }

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

        function copyOutput() {
            const output = emojiOutput.value;
            if (!output) { showError('Nothing to copy. Generate some emojis first.'); return; }
            navigator.clipboard.writeText(output).then(() => {
                const originalHTML = btnCopy.innerHTML;
                btnCopy.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                btnCopy.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { btnCopy.innerHTML = originalHTML; btnCopy.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        }

        function downloadOutput() {
            const output = emojiOutput.value;
            if (!output) { showError('Nothing to download. Generate some emojis first.'); return; }
            const blob = new Blob([output], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'random-emojis.txt';
            a.click();
            URL.revokeObjectURL(url);
            showSuccess('Emojis downloaded!');
        }

        function loadSample() {
            emojiCategory.value = 'smileys';
            emojiCount.value = 20;
            emojiSeparator.value = 'space';
            uniqueOnly.checked = true;
            generate();
        }

        function clearAll() {
            emojiOutput.value = '';
            statsBar.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        }

        // Event Listeners
        btnGenerate.addEventListener('click', generate);
        btnCopy.addEventListener('click', copyOutput);
        btnDownload.addEventListener('click', downloadOutput);
        btnSample.addEventListener('click', loadSample);
        btnClear.addEventListener('click', clearAll);

        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); generate(); }
        });
    })();
    </script>
    @endpush
</x-layout>
