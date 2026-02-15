<x-layout>
    <x-slot:title>Markdown to HTML Converter - Convert Markdown to HTML Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online Markdown to HTML converter. Convert Markdown syntax to clean HTML code instantly. Supports headings, lists, tables, code blocks, links, images, and GFM extensions.</x-slot:description>
    <x-slot:keywords>markdown to html, markdown to html converter, convert markdown to html, md to html, markdown converter online</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/markdown-to-html') }}</x-slot:canonical>

    <x-slot:ogTitle>Markdown to HTML Converter - Convert Markdown to HTML Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online Markdown to HTML converter. Convert Markdown to clean HTML with live preview. Supports GFM tables, code blocks, and more.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/markdown-to-html') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Markdown to HTML Converter",
            "description": "Free online Markdown to HTML converter with live preview.",
            "url": "https://hafiz.dev/tools/markdown-to-html",
            "applicationCategory": "DeveloperApplication",
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
                { "@@type": "ListItem", "position": 3, "name": "Markdown to HTML", "item": "https://hafiz.dev/tools/markdown-to-html" }
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
                    "name": "How do I convert Markdown to HTML?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Paste your Markdown text into the input field and the tool instantly generates clean HTML. You can view a live rendered preview, copy the HTML source code, or download it as an .html file."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does this support GitHub Flavored Markdown (GFM)?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! This converter supports GFM extensions including tables, task lists (checkboxes), strikethrough text, fenced code blocks with syntax highlighting, and auto-linked URLs."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What Markdown syntax is supported?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "All standard Markdown syntax is supported: headings (# to ######), bold, italic, links, images, ordered and unordered lists, blockquotes, horizontal rules, code blocks (inline and fenced), tables, and task lists."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I preview the rendered Markdown?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Toggle between 'Preview' to see the rendered HTML output and 'Source' to see the raw HTML code. The preview updates in real time as you type."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is the generated HTML clean and semantic?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! The converter produces clean, semantic HTML without unnecessary wrapper divs or inline styles. The output is ready to use in websites, blogs, documentation, or email templates."
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
                    <li class="text-gold">Markdown to HTML</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Markdown to HTML Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert Markdown to clean HTML instantly. Supports headings, lists, tables, code blocks, links, images, and GitHub Flavored Markdown.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Input / Output --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    <div class="flex flex-col">
                        <div class="flex items-center justify-between mb-2">
                            <label for="md-input" class="text-light font-semibold flex items-center gap-2">
                                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                Markdown Input
                            </label>
                            <label class="px-3 py-1 border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-xs flex items-center gap-1 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Upload .md
                                <input type="file" id="file-upload" accept=".md,.markdown,.txt" class="hidden">
                            </label>
                        </div>
                        <textarea
                            id="md-input"
                            class="flex-1 min-h-[450px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Type or paste Markdown here..."
                            spellcheck="false"
                        ></textarea>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex items-center justify-between mb-2">
                            <label class="text-light font-semibold flex items-center gap-2">
                                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                                HTML Output
                            </label>
                            <div class="flex gap-1 bg-darkBg rounded-lg p-0.5 border border-gold/10">
                                <button id="btn-view-preview" class="px-3 py-1 text-xs rounded-md bg-gold/20 text-gold font-medium transition-all cursor-pointer">Preview</button>
                                <button id="btn-view-source" class="px-3 py-1 text-xs rounded-md text-light-muted hover:text-light transition-all cursor-pointer">Source</button>
                            </div>
                        </div>
                        <div id="html-preview" class="flex-1 min-h-[450px] bg-white rounded-lg p-4 text-sm text-gray-800 overflow-auto prose prose-sm max-w-none" style="display:block;"></div>
                        <textarea
                            id="html-source"
                            class="flex-1 min-h-[450px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="HTML output will appear here..."
                            readonly
                            style="display:none;"
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-copy" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy HTML
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download .html
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
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div id="stat-elements" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">HTML Elements</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-headings" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Headings</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-links" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Links</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-size" class="text-2xl font-bold text-light mb-1">0 B</div>
                            <div class="text-light-muted text-sm">Output Size</div>
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

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📝</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Full Markdown Support</h3>
                    <p class="text-light-muted text-sm">Headings, bold, italic, links, images, lists, blockquotes, code blocks, horizontal rules, and more. Covers the complete CommonMark specification.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🐙</div>
                    <h3 class="text-lg font-semibold text-light mb-2">GFM Extensions</h3>
                    <p class="text-light-muted text-sm">GitHub Flavored Markdown extras: tables, task lists with checkboxes, strikethrough text, fenced code blocks, and autolinked URLs.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">👁️</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Live Preview</h3>
                    <p class="text-light-muted text-sm">See rendered output in real time as you type. Switch between a visual preview and raw HTML source code with one click.</p>
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
                            <span class="text-light font-medium">How do I convert Markdown to HTML?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Paste or type Markdown in the left panel. The HTML output appears instantly on the right — toggle between a rendered preview and raw HTML source. Copy the HTML or download it as a file.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does this support GitHub Flavored Markdown?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! GFM extensions are fully supported including tables, task lists, strikethrough (~~text~~), fenced code blocks with language hints, and automatic URL linking.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What Markdown syntax is supported?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">All standard Markdown: headings (# to ######), **bold**, *italic*, [links](url), ![images](url), ordered/unordered lists, blockquotes, code blocks, horizontal rules, plus GFM tables and task lists.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I preview the rendered HTML?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! The default view shows a live rendered preview. Click "Source" to see the raw HTML code, or "Preview" to switch back. Both update in real time as you type.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is the generated HTML clean?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! The output is clean, semantic HTML without unnecessary wrappers or inline styles. It's ready to use in websites, blog posts, documentation, README files, or email templates.</div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @include('tools.partials.markdown-to-html-script')
</x-layout>
