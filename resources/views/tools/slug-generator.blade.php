<x-layout>
    <x-slot:title>Slug Generator - Free URL Slug Generator Online | hafiz.dev</x-slot:title>
    <x-slot:description>Free online slug generator. Convert any text to clean, SEO-friendly URL slugs instantly. Supports custom separators, transliteration, and bulk generation. 100% client-side.</x-slot:description>
    <x-slot:keywords>slug generator, url slug generator, slug creator, seo slug generator, url friendly text, slugify online, permalink generator</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/slug-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Slug Generator - Free URL Slug Generator Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online slug generator. Convert any text to clean, SEO-friendly URL slugs instantly. Supports custom separators and bulk generation.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/slug-generator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Slug Generator",
            "description": "Free online slug generator. Convert any text to clean, SEO-friendly URL slugs instantly.",
            "url": "https://hafiz.dev/tools/slug-generator",
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
                    "name": "Slug Generator",
                    "item": "https://hafiz.dev/tools/slug-generator"
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
                    "name": "What is a URL slug?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A URL slug is the part of a web address that identifies a specific page in a human-readable format. For example, in 'example.com/my-blog-post', the slug is 'my-blog-post'. Good slugs are lowercase, use hyphens, and contain relevant keywords."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Why are SEO-friendly slugs important?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "SEO-friendly slugs help search engines understand your page content. Clean, keyword-rich slugs can improve click-through rates and help your pages rank better. They also make URLs easier to read and share."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How does this slug generator handle special characters?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The generator removes special characters, converts accented letters to their ASCII equivalents (e.g., ü to u, é to e), converts spaces to hyphens (or your chosen separator), and converts everything to lowercase."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I generate multiple slugs at once?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Enter multiple lines of text and each line will be converted to a separate slug. This is great for generating slugs for a batch of blog posts, product pages, or categories."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What separator should I use for URL slugs?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Hyphens (-) are the standard and recommended separator for URL slugs. Google treats hyphens as word separators, which helps with SEO. Underscores are treated as joiners, so 'my-post' is better than 'my_post' for search engines."
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
                    <li class="text-gold">Slug Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Slug Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert any text into clean, SEO-friendly URL slugs. Handles special characters, accented letters, and multiple lines.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="separator" class="text-light font-semibold mb-2 block text-sm">Separator</label>
                            <select id="separator" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="-">Hyphen - (recommended)</option>
                                <option value="_">Underscore _</option>
                                <option value=".">Dot .</option>
                                <option value="">None (joined)</option>
                            </select>
                        </div>
                        <div>
                            <label for="max-length" class="text-light font-semibold mb-2 block text-sm">Max Length</label>
                            <select id="max-length" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="0">No limit</option>
                                <option value="50">50 characters</option>
                                <option value="75" selected>75 characters</option>
                                <option value="100">100 characters</option>
                                <option value="150">150 characters</option>
                            </select>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="transliterate" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Transliterate Accents</span>
                            </label>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="remove-stopwords" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Remove Stop Words</span>
                            </label>
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
                            <span class="text-light-muted text-xs font-normal">(one slug per line)</span>
                        </label>
                        <textarea
                            id="text-input"
                            class="flex-1 min-h-[250px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="How to Build a REST API with Laravel
10 Tips for Better SEO in 2026
Über uns — Kontakt & Impressum
Café résumé naïve"
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output --}}
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                            Generated Slugs
                        </label>
                        <textarea
                            id="slug-output"
                            class="flex-1 min-h-[250px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="Slugs will appear here..."
                            readonly
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-generate" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Generate Slugs
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
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
                <div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div id="stat-slugs" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Slugs Generated</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-chars-saved" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Characters Saved</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-avg-length" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Avg Slug Length</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-longest" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Longest Slug</div>
                        </div>
                    </div>
                </div>

                {{-- URL Preview --}}
                <div id="url-preview" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
                    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                        URL Preview
                    </h3>
                    <div id="url-preview-list" class="space-y-2 font-mono text-sm"></div>
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
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Smart Transliteration</h3>
                    <p class="text-light-muted text-sm">Converts accented and special characters to ASCII equivalents. Über becomes uber, café becomes cafe, naïve becomes naive.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">SEO Optimized</h3>
                    <p class="text-light-muted text-sm">Optional stop word removal strips common words like "the", "and", "is" to create shorter, more keyword-focused slugs that rank better.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Bulk Generation</h3>
                    <p class="text-light-muted text-sm">Enter multiple titles or phrases, one per line, and generate all slugs at once. Perfect for batch-creating URLs for blog posts or product pages.</p>
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
                            <span class="text-light font-medium">What is a URL slug?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A URL slug is the part of a web address that identifies a specific page in a human-readable format. For example, in <code class="bg-darkCard px-1 rounded">example.com/my-blog-post</code>, the slug is <code class="bg-darkCard px-1 rounded">my-blog-post</code>. Good slugs are lowercase, use hyphens as separators, and contain relevant keywords for SEO.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Why are SEO-friendly slugs important?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            SEO-friendly slugs help search engines understand your page content. Clean, keyword-rich slugs can improve click-through rates from search results and help your pages rank better. They also make URLs easier to read, remember, and share on social media.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How does this tool handle special characters?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The generator removes special characters, converts accented letters to their ASCII equivalents (e.g., ü→u, é→e, ñ→n), converts spaces to your chosen separator, and lowercases everything. This ensures your slugs are URL-safe and work correctly in all browsers.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I generate multiple slugs at once?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Enter multiple lines of text and each line will be converted to a separate slug. This is perfect for generating slugs for a batch of blog posts, product pages, or categories all at once.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What separator should I use for URL slugs?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Hyphens (-) are the standard and recommended separator for URL slugs. Google treats hyphens as word separators, which helps with SEO. Underscores are treated as joiners, so <code class="bg-darkCard px-1 rounded">my-post</code> is better than <code class="bg-darkCard px-1 rounded">my_post</code> for search engine optimization.
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
        const slugOutput = document.getElementById('slug-output');
        const separator = document.getElementById('separator');
        const maxLength = document.getElementById('max-length');
        const transliterate = document.getElementById('transliterate');
        const removeStopwords = document.getElementById('remove-stopwords');
        const btnGenerate = document.getElementById('btn-generate');
        const btnCopy = document.getElementById('btn-copy');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const statsBar = document.getElementById('stats-bar');
        const statSlugs = document.getElementById('stat-slugs');
        const statCharsSaved = document.getElementById('stat-chars-saved');
        const statAvgLength = document.getElementById('stat-avg-length');
        const statLongest = document.getElementById('stat-longest');
        const urlPreview = document.getElementById('url-preview');
        const urlPreviewList = document.getElementById('url-preview-list');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        // Stop words (common English)
        const STOP_WORDS = new Set([
            'a', 'an', 'the', 'and', 'or', 'but', 'in', 'on', 'at', 'to', 'for',
            'of', 'with', 'by', 'from', 'is', 'are', 'was', 'were', 'be', 'been',
            'being', 'have', 'has', 'had', 'do', 'does', 'did', 'will', 'would',
            'could', 'should', 'may', 'might', 'shall', 'can', 'it', 'its',
            'this', 'that', 'these', 'those', 'i', 'you', 'he', 'she', 'we', 'they',
            'me', 'him', 'her', 'us', 'them', 'my', 'your', 'his', 'our', 'their',
            'what', 'which', 'who', 'whom', 'when', 'where', 'why', 'how',
            'not', 'no', 'nor', 'so', 'if', 'then', 'than', 'too', 'very',
            'just', 'about', 'above', 'after', 'again', 'all', 'also', 'any',
            'as', 'because', 'before', 'between', 'both', 'each', 'few',
            'into', 'more', 'most', 'other', 'out', 'over', 'same', 'some',
            'such', 'through', 'under', 'until', 'up', 'while'
        ]);

        // Transliteration map
        const TRANSLITERATION = {
            'À':'A','Á':'A','Â':'A','Ã':'A','Ä':'A','Å':'A','Æ':'AE',
            'Ç':'C','È':'E','É':'E','Ê':'E','Ë':'E','Ì':'I','Í':'I',
            'Î':'I','Ï':'I','Ð':'D','Ñ':'N','Ò':'O','Ó':'O','Ô':'O',
            'Õ':'O','Ö':'O','Ø':'O','Ù':'U','Ú':'U','Û':'U','Ü':'U',
            'Ý':'Y','Þ':'TH','ß':'ss','à':'a','á':'a','â':'a','ã':'a',
            'ä':'a','å':'a','æ':'ae','ç':'c','è':'e','é':'e','ê':'e',
            'ë':'e','ì':'i','í':'i','î':'i','ï':'i','ð':'d','ñ':'n',
            'ò':'o','ó':'o','ô':'o','õ':'o','ö':'o','ø':'o','ù':'u',
            'ú':'u','û':'u','ü':'u','ý':'y','þ':'th','ÿ':'y','Ł':'L',
            'ł':'l','Ń':'N','ń':'n','Ś':'S','ś':'s','Ź':'Z','ź':'z',
            'Ż':'Z','ż':'z','Ă':'A','ă':'a','Đ':'D','đ':'d','Ş':'S',
            'ş':'s','Ţ':'T','ţ':'t','ŉ':'n','Ő':'O','ő':'o','Ű':'U',
            'ű':'u','Č':'C','č':'c','Ď':'D','ď':'d','Ě':'E','ě':'e',
            'Ň':'N','ň':'n','Ř':'R','ř':'r','Š':'S','š':'s','Ť':'T',
            'ť':'t','Ů':'U','ů':'u','Ž':'Z','ž':'z','ƒ':'f','Ơ':'O',
            'ơ':'o','Ư':'U','ư':'u','ĩ':'i','ũ':'u'
        };

        const sampleText = `How to Build a REST API with Laravel in 2026
10 Tips für Better SEO — A Beginner's Guide
Café & Restaurant Reviews: Best Spots in München
Ação de Graças: Receitas Tradicionais do Brasil
What's New in TypeScript 5.7? (Features & Updates)`;

        // ===== Slug Generation =====

        function generateSlug(text) {
            let slug = text.trim();
            if (!slug) return '';

            // Transliterate accented characters
            if (transliterate.checked) {
                slug = slug.split('').map(c => TRANSLITERATION[c] || c).join('');
            }

            // Lowercase
            slug = slug.toLowerCase();

            // Remove stop words
            if (removeStopwords.checked) {
                const sep = separator.value || ' ';
                const words = slug.split(/\s+/).filter(w => !STOP_WORDS.has(w) && w.length > 0);
                slug = words.join(' ');
            }

            // Replace special chars and spaces with separator
            const sep = separator.value;
            slug = slug
                .replace(/[&]/g, sep ? sep + 'and' + sep : 'and')
                .replace(/[^\w\s-]/g, '')      // Remove non-word chars (except spaces and hyphens)
                .replace(/[\s_-]+/g, sep)        // Replace spaces/underscores/hyphens with separator
                .replace(new RegExp('\\' + (sep || '-') + '+', 'g'), sep) // Collapse multiple separators
                .replace(new RegExp('^\\' + (sep || '-') + '+'), '')       // Trim from start
                .replace(new RegExp('\\' + (sep || '-') + '+$'), '');      // Trim from end

            // Apply max length (cut at word boundary)
            const limit = parseInt(maxLength.value);
            if (limit > 0 && slug.length > limit) {
                slug = slug.substring(0, limit);
                // Don't cut mid-word — trim to last separator
                if (sep) {
                    const lastSep = slug.lastIndexOf(sep);
                    if (lastSep > 0) {
                        slug = slug.substring(0, lastSep);
                    }
                }
            }

            return slug;
        }

        function generate() {
            const input = textInput.value.trim();
            if (!input) {
                showError('Please enter some text to generate slugs');
                return;
            }

            const lines = input.split('\n').filter(l => l.trim());
            const slugs = lines.map(line => generateSlug(line));
            const validSlugs = slugs.filter(s => s.length > 0);

            slugOutput.value = slugs.join('\n');

            // Stats
            const totalInputChars = lines.reduce((sum, l) => sum + l.length, 0);
            const totalSlugChars = validSlugs.reduce((sum, s) => sum + s.length, 0);
            const avgLength = validSlugs.length > 0 ? Math.round(totalSlugChars / validSlugs.length) : 0;
            const longest = validSlugs.length > 0 ? Math.max(...validSlugs.map(s => s.length)) : 0;

            statSlugs.textContent = validSlugs.length;
            statCharsSaved.textContent = totalInputChars - totalSlugChars;
            statAvgLength.textContent = avgLength;
            statLongest.textContent = longest;
            statsBar.classList.remove('hidden');

            // URL Preview (show first 5)
            const previewSlugs = validSlugs.slice(0, 5);
            urlPreviewList.innerHTML = previewSlugs.map(s =>
                `<div class="text-light-muted truncate">
                    <span class="text-light-muted/50">https://example.com/</span><span class="text-gold">${escapeHtml(s)}</span>
                </div>`
            ).join('');
            if (validSlugs.length > 5) {
                urlPreviewList.innerHTML += `<div class="text-light-muted/50 text-xs">... and ${validSlugs.length - 5} more</div>`;
            }
            urlPreview.classList.remove('hidden');

            showSuccess(validSlugs.length + ' slug' + (validSlugs.length !== 1 ? 's' : '') + ' generated');
        }

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
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
            const output = slugOutput.value;
            if (!output) { showError('Nothing to copy. Generate some slugs first.'); return; }
            navigator.clipboard.writeText(output).then(() => {
                const originalHTML = btnCopy.innerHTML;
                btnCopy.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                btnCopy.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { btnCopy.innerHTML = originalHTML; btnCopy.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        }

        function loadSample() {
            textInput.value = sampleText;
            slugOutput.value = '';
            statsBar.classList.add('hidden');
            urlPreview.classList.add('hidden');
        }

        function clearAll() {
            textInput.value = '';
            slugOutput.value = '';
            statsBar.classList.add('hidden');
            urlPreview.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        }

        // Real-time generation on typing
        let debounceTimer;
        textInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                if (textInput.value.trim()) generate();
            }, 300);
        });

        // Option changes trigger re-generation
        [separator, maxLength, transliterate, removeStopwords].forEach(el => {
            el.addEventListener('change', () => { if (textInput.value.trim()) generate(); });
        });

        // ===== Event Listeners =====
        btnGenerate.addEventListener('click', generate);
        btnCopy.addEventListener('click', copyOutput);
        btnSample.addEventListener('click', loadSample);
        btnClear.addEventListener('click', clearAll);

        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); generate(); }
        });
    })();
    </script>
    @endpush
</x-layout>
