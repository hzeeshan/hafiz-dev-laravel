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

    @push('styles')
    <style>
        .prose h1 { font-size: 1.75em; font-weight: bold; margin: 0.5em 0; color: #1a1a1a; border-bottom: 1px solid #e5e7eb; padding-bottom: 0.3em; }
        .prose h2 { font-size: 1.4em; font-weight: bold; margin: 0.5em 0; color: #1a1a1a; border-bottom: 1px solid #e5e7eb; padding-bottom: 0.3em; }
        .prose h3 { font-size: 1.2em; font-weight: bold; margin: 0.5em 0; color: #1a1a1a; }
        .prose h4, .prose h5, .prose h6 { font-size: 1em; font-weight: bold; margin: 0.5em 0; color: #1a1a1a; }
        .prose p { margin: 0.5em 0; line-height: 1.7; }
        .prose a { color: #2563eb; text-decoration: underline; }
        .prose strong { font-weight: bold; }
        .prose em { font-style: italic; }
        .prose del { text-decoration: line-through; color: #888; }
        .prose ul { list-style: disc; padding-left: 1.5em; margin: 0.5em 0; }
        .prose ol { list-style: decimal; padding-left: 1.5em; margin: 0.5em 0; }
        .prose li { margin: 0.25em 0; }
        .prose blockquote { border-left: 4px solid #d1d5db; padding-left: 1em; margin: 0.5em 0; color: #555; font-style: italic; }
        .prose code { background: #f3f4f6; padding: 0.15em 0.4em; border-radius: 3px; font-size: 0.9em; font-family: monospace; }
        .prose pre { background: #1e293b; color: #e2e8f0; padding: 1em; border-radius: 6px; overflow-x: auto; margin: 0.5em 0; }
        .prose pre code { background: none; padding: 0; color: inherit; }
        .prose table { border-collapse: collapse; width: 100%; margin: 0.5em 0; }
        .prose th, .prose td { border: 1px solid #d1d5db; padding: 0.5em 0.75em; text-align: left; }
        .prose th { background: #f3f4f6; font-weight: bold; }
        .prose hr { border: none; border-top: 2px solid #e5e7eb; margin: 1em 0; }
        .prose img { max-width: 100%; border-radius: 4px; }
        .prose input[type="checkbox"] { margin-right: 0.4em; }
    </style>
    @endpush

    @push('scripts')
    <script>
    (function() {
        const mdInput = document.getElementById('md-input');
        const htmlPreview = document.getElementById('html-preview');
        const htmlSource = document.getElementById('html-source');
        const fileUpload = document.getElementById('file-upload');
        const btnViewPreview = document.getElementById('btn-view-preview');
        const btnViewSource = document.getElementById('btn-view-source');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const statsBar = document.getElementById('stats-bar');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');

        const sampleMD = `# Markdown to HTML Demo

## Text Formatting

This is a paragraph with **bold text**, *italic text*, and ~~strikethrough~~. You can also use \`inline code\` for technical terms.

## Lists

### Unordered List
- First item
- Second item
  - Nested item
  - Another nested
- Third item

### Ordered List
1. Step one
2. Step two
3. Step three

### Task List
- [x] Write documentation
- [x] Push to GitHub
- [ ] Deploy to production

## Links & Images

Visit [hafiz.dev](https://hafiz.dev) for more tools.

![Alt text](https://via.placeholder.com/300x100?text=Sample+Image)

## Code Block

\`\`\`javascript
function greet(name) {
    return \`Hello, \${name}!\`;
}

console.log(greet("World"));
\`\`\`

## Blockquote

> "Any fool can write code that a computer can understand.
> Good programmers write code that humans can understand."
> — Martin Fowler

## Table

| Feature | Status | Priority |
|---------|--------|----------|
| Auth    | Done   | High     |
| API     | WIP    | High     |
| Tests   | Todo   | Medium   |

---

*Generated with [hafiz.dev/tools/markdown-to-html](https://hafiz.dev/tools/markdown-to-html)*`;

        // Lightweight Markdown parser
        function parseMarkdown(md) {
            let html = md;

            // Fenced code blocks (must come first)
            html = html.replace(/```(\w*)\n([\s\S]*?)```/g, function(m, lang, code) {
                const escaped = code.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').trimEnd();
                return '<pre><code' + (lang ? ' class="language-' + lang + '"' : '') + '>' + escaped + '</code></pre>';
            });

            // Split by pre blocks to avoid processing code contents
            const parts = html.split(/(<pre>[\s\S]*?<\/pre>)/);
            html = parts.map((part, i) => {
                if (i % 2 === 1) return part; // pre block, skip

                let t = part;

                // Headings
                t = t.replace(/^######\s+(.+)$/gm, '<h6>$1</h6>');
                t = t.replace(/^#####\s+(.+)$/gm, '<h5>$1</h5>');
                t = t.replace(/^####\s+(.+)$/gm, '<h4>$1</h4>');
                t = t.replace(/^###\s+(.+)$/gm, '<h3>$1</h3>');
                t = t.replace(/^##\s+(.+)$/gm, '<h2>$1</h2>');
                t = t.replace(/^#\s+(.+)$/gm, '<h1>$1</h1>');

                // Horizontal rules
                t = t.replace(/^(?:---|\*\*\*|___)\s*$/gm, '<hr>');

                // Blockquotes
                t = t.replace(/^(?:>\s?(.*)(?:\n|$))+/gm, function(match) {
                    const content = match.replace(/^>\s?/gm, '').trim();
                    return '<blockquote><p>' + content.replace(/\n/g, '<br>') + '</p></blockquote>';
                });

                // Tables
                t = t.replace(/^\|(.+)\|\s*\n\|[\s\-:|]+\|\s*\n((?:\|.+\|\s*\n?)*)/gm, function(m, header, body) {
                    const ths = header.split('|').map(c => c.trim()).filter(Boolean);
                    let table = '<table><thead><tr>' + ths.map(h => '<th>' + h + '</th>').join('') + '</tr></thead><tbody>';
                    const rows = body.trim().split('\n');
                    rows.forEach(row => {
                        const cells = row.split('|').map(c => c.trim()).filter(Boolean);
                        table += '<tr>' + cells.map(c => '<td>' + c + '</td>').join('') + '</tr>';
                    });
                    table += '</tbody></table>';
                    return table;
                });

                // Task lists
                t = t.replace(/^- \[x\]\s+(.+)$/gm, '<li class="task"><input type="checkbox" checked disabled> $1</li>');
                t = t.replace(/^- \[ \]\s+(.+)$/gm, '<li class="task"><input type="checkbox" disabled> $1</li>');

                // Unordered lists
                t = t.replace(/^(?:[-*+]\s+.+\n?)+/gm, function(match) {
                    if (match.includes('class="task"')) {
                        return '<ul style="list-style:none;padding-left:0.5em;">' + match.trim() + '</ul>';
                    }
                    const items = match.trim().split('\n').map(line => {
                        const m = line.match(/^\s*([-*+])\s+(.+)/);
                        return m ? '<li>' + m[2] + '</li>' : '';
                    }).join('');
                    return '<ul>' + items + '</ul>';
                });

                // Ordered lists
                t = t.replace(/^(?:\d+\.\s+.+\n?)+/gm, function(match) {
                    const items = match.trim().split('\n').map(line => {
                        const m = line.match(/^\d+\.\s+(.+)/);
                        return m ? '<li>' + m[1] + '</li>' : '';
                    }).join('');
                    return '<ol>' + items + '</ol>';
                });

                // Images
                t = t.replace(/!\[([^\]]*)\]\(([^)]+)\)/g, '<img src="$2" alt="$1">');

                // Links
                t = t.replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2">$1</a>');

                // Bold + italic
                t = t.replace(/\*\*\*(.+?)\*\*\*/g, '<strong><em>$1</em></strong>');
                t = t.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>');
                t = t.replace(/\*(.+?)\*/g, '<em>$1</em>');
                t = t.replace(/~~(.+?)~~/g, '<del>$1</del>');

                // Inline code
                t = t.replace(/`([^`]+)`/g, '<code>$1</code>');

                // Paragraphs — wrap loose text lines
                t = t.replace(/^(?!<[a-z/])((?!<).+)$/gm, '<p>$1</p>');

                // Clean up empty paragraphs
                t = t.replace(/<p>\s*<\/p>/g, '');

                return t;
            }).join('');

            return html.trim();
        }

        function convert() {
            const input = mdInput.value;
            if (!input.trim()) {
                htmlPreview.innerHTML = '<p style="color:#999;font-style:italic;">Start typing Markdown to see the preview...</p>';
                htmlSource.value = '';
                statsBar.classList.add('hidden');
                return;
            }

            const html = parseMarkdown(input);
            htmlPreview.innerHTML = html;
            htmlSource.value = html;

            // Stats
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = html;
            const elements = tempDiv.querySelectorAll('*').length;
            const headings = tempDiv.querySelectorAll('h1,h2,h3,h4,h5,h6').length;
            const links = tempDiv.querySelectorAll('a').length;
            const size = new Blob([html]).size;

            document.getElementById('stat-elements').textContent = elements;
            document.getElementById('stat-headings').textContent = headings;
            document.getElementById('stat-links').textContent = links;
            document.getElementById('stat-size').textContent = size > 1024 ? (size / 1024).toFixed(1) + ' KB' : size + ' B';
            statsBar.classList.remove('hidden');
        }

        function showSuccess(msg) {
            successMessage.textContent = msg;
            successNotification.classList.remove('hidden');
            setTimeout(() => successNotification.classList.add('hidden'), 3000);
        }

        // Toggle preview/source
        btnViewPreview.addEventListener('click', function() {
            htmlPreview.style.display = 'block';
            htmlSource.style.display = 'none';
            this.classList.add('bg-gold/20', 'text-gold');
            this.classList.remove('text-light-muted');
            btnViewSource.classList.remove('bg-gold/20', 'text-gold');
            btnViewSource.classList.add('text-light-muted');
        });
        btnViewSource.addEventListener('click', function() {
            htmlPreview.style.display = 'none';
            htmlSource.style.display = 'block';
            this.classList.add('bg-gold/20', 'text-gold');
            this.classList.remove('text-light-muted');
            btnViewPreview.classList.remove('bg-gold/20', 'text-gold');
            btnViewPreview.classList.add('text-light-muted');
        });

        // Buttons
        btnCopy.addEventListener('click', function() {
            const output = htmlSource.value || parseMarkdown(mdInput.value);
            if (!output) return;
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('bg-green-600');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('bg-green-600'); }, 2000);
            });
        });

        btnDownload.addEventListener('click', function() {
            const output = htmlSource.value;
            if (!output) return;
            const blob = new Blob([output], { type: 'text/html;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = 'converted.html';
            document.body.appendChild(a); a.click();
            document.body.removeChild(a); URL.revokeObjectURL(url);
            showSuccess('HTML file downloaded');
        });

        btnSample.addEventListener('click', function() {
            mdInput.value = sampleMD;
            convert();
        });

        btnClear.addEventListener('click', function() {
            mdInput.value = '';
            htmlPreview.innerHTML = '<p style="color:#999;font-style:italic;">Start typing Markdown to see the preview...</p>';
            htmlSource.value = '';
            statsBar.classList.add('hidden');
        });

        fileUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(evt) { mdInput.value = evt.target.result; convert(); showSuccess('File loaded: ' + file.name); };
            reader.readAsText(file);
            this.value = '';
        });

        // Real-time
        let timer;
        mdInput.addEventListener('input', function() {
            clearTimeout(timer);
            timer = setTimeout(convert, 300);
        });

        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
        });
    })();
    </script>
    @endpush
</x-layout>
