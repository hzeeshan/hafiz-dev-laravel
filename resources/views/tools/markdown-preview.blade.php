<x-layout>
    <x-slot:title>Markdown Preview - Live Markdown Editor Online | hafiz.dev</x-slot:title>
    <x-slot:description>Free online Markdown preview tool. Write and preview Markdown with real-time rendering, GitHub Flavored Markdown support, and syntax highlighting for code blocks. 100% client-side.</x-slot:description>
    <x-slot:keywords>markdown preview, markdown editor, markdown viewer, live markdown, github flavored markdown, gfm editor, markdown to html, markdown syntax highlighter</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/markdown-preview') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Markdown Preview - Live Markdown Editor Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online Markdown preview tool. Write and preview Markdown with real-time rendering, GitHub Flavored Markdown support, and syntax highlighting.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/markdown-preview') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Markdown Preview",
            "description": "Free online Markdown preview tool. Write and preview Markdown with real-time rendering, GitHub Flavored Markdown support, and syntax highlighting for code blocks.",
            "url": "https://hafiz.dev/tools/markdown-preview",
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
                    "name": "Markdown Preview",
                    "item": "https://hafiz.dev/tools/markdown-preview"
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
                    "name": "What is GitHub Flavored Markdown (GFM)?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "GitHub Flavored Markdown (GFM) is a variant of Markdown with additional features like tables, task lists, strikethrough text, and fenced code blocks with syntax highlighting. This tool fully supports GFM syntax."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does this tool support syntax highlighting?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Code blocks are automatically syntax highlighted for over 180 programming languages including JavaScript, Python, PHP, Ruby, Go, Rust, and many more. Just specify the language after the opening backticks."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I export the rendered HTML?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, you can copy the rendered HTML output or download your Markdown as a .md file. The tool provides buttons for both copying to clipboard and downloading."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my content saved anywhere?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Your content is saved only in your browser's local storage for convenience. Nothing is sent to any server. All processing happens 100% client-side."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What Markdown features are supported?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "This tool supports all standard Markdown features plus GitHub Flavored Markdown extensions: headings, bold, italic, strikethrough, links, images, lists, task lists, blockquotes, code blocks, tables, horizontal rules, and more."
                    }
                }
            ]
        }
        </script>
    @endpush

    @push('head')
    {{-- Highlight.js Theme --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/highlight.js@11.9.0/styles/github-dark.min.css">
    <style>
        /* Markdown Preview Styles */
        .markdown-body {
            color: #c9d1d9;
            font-size: 16px;
            line-height: 1.6;
        }
        .markdown-body h1, .markdown-body h2, .markdown-body h3,
        .markdown-body h4, .markdown-body h5, .markdown-body h6 {
            color: #f0f6fc;
            margin-top: 24px;
            margin-bottom: 16px;
            font-weight: 600;
            line-height: 1.25;
        }
        .markdown-body h1 { font-size: 2em; border-bottom: 1px solid #30363d; padding-bottom: 0.3em; }
        .markdown-body h2 { font-size: 1.5em; border-bottom: 1px solid #30363d; padding-bottom: 0.3em; }
        .markdown-body h3 { font-size: 1.25em; }
        .markdown-body h4 { font-size: 1em; }
        .markdown-body h5 { font-size: 0.875em; }
        .markdown-body h6 { font-size: 0.85em; color: #8b949e; }
        .markdown-body p { margin-top: 0; margin-bottom: 16px; }
        .markdown-body a { color: #d4a853; text-decoration: none; }
        .markdown-body a:hover { text-decoration: underline; }
        .markdown-body strong { color: #f0f6fc; font-weight: 600; }
        .markdown-body em { font-style: italic; }
        .markdown-body del { color: #8b949e; }
        .markdown-body code {
            background: #161b22;
            padding: 0.2em 0.4em;
            border-radius: 6px;
            font-size: 85%;
            font-family: ui-monospace, SFMono-Regular, SF Mono, Menlo, Consolas, Liberation Mono, monospace;
        }
        .markdown-body pre {
            background: #161b22;
            padding: 16px;
            border-radius: 6px;
            overflow-x: auto;
            margin-bottom: 16px;
        }
        .markdown-body pre code {
            background: transparent;
            padding: 0;
            font-size: 85%;
            line-height: 1.45;
        }
        .markdown-body blockquote {
            border-left: 4px solid #d4a853;
            padding: 0 16px;
            color: #8b949e;
            margin: 0 0 16px 0;
        }
        .markdown-body ul, .markdown-body ol {
            padding-left: 2em;
            margin-bottom: 16px;
        }
        .markdown-body li { margin-bottom: 4px; }
        .markdown-body li > p { margin-bottom: 8px; }
        .markdown-body ul { list-style-type: disc; }
        .markdown-body ol { list-style-type: decimal; }
        .markdown-body ul ul, .markdown-body ol ol, .markdown-body ul ol, .markdown-body ol ul {
            margin-top: 4px;
            margin-bottom: 4px;
        }
        /* Task lists */
        .markdown-body .task-list-item {
            list-style-type: none;
            margin-left: -1.5em;
        }
        .markdown-body .task-list-item input[type="checkbox"] {
            margin-right: 0.5em;
            accent-color: #d4a853;
        }
        .markdown-body hr {
            border: 0;
            border-top: 1px solid #30363d;
            margin: 24px 0;
        }
        .markdown-body table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 16px;
        }
        .markdown-body th, .markdown-body td {
            border: 1px solid #30363d;
            padding: 8px 12px;
        }
        .markdown-body th {
            background: #161b22;
            font-weight: 600;
        }
        .markdown-body tr:nth-child(even) {
            background: rgba(22, 27, 34, 0.5);
        }
        .markdown-body img {
            max-width: 100%;
            height: auto;
            border-radius: 6px;
        }

        /* Editor styles */
        .editor-textarea {
            line-height: 1.6;
        }

        /* Split view resizer */
        .split-divider {
            width: 4px;
            background: rgba(212, 168, 83, 0.2);
            cursor: col-resize;
            transition: background 0.2s;
        }
        .split-divider:hover {
            background: rgba(212, 168, 83, 0.5);
        }
    </style>
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
                    <li class="text-gold">Markdown Preview</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Markdown Preview</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Write and preview Markdown with real-time rendering. Supports GitHub Flavored Markdown with syntax highlighting for code blocks.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                {{-- Toolbar --}}
                <div class="flex flex-wrap items-center gap-2 mb-4">
                    {{-- Formatting Buttons --}}
                    <div class="flex items-center gap-1 p-1 bg-darkBg rounded-lg border border-gold/10">
                        <button id="btn-bold" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="Bold (Ctrl+B)">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 4h8a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path><path d="M6 12h9a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path></svg>
                        </button>
                        <button id="btn-italic" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="Italic (Ctrl+I)">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="19" y1="4" x2="10" y2="4"></line><line x1="14" y1="20" x2="5" y2="20"></line><line x1="15" y1="4" x2="9" y2="20"></line></svg>
                        </button>
                        <button id="btn-strikethrough" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="Strikethrough">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 4H9a3 3 0 0 0-3 3v1m10 0H4m16 8h-5m-5 0a3 3 0 0 0 3 3h4a3 3 0 0 0 0-6"></path></svg>
                        </button>
                    </div>

                    <div class="h-6 w-px bg-gold/20 hidden sm:block"></div>

                    <div class="flex items-center gap-1 p-1 bg-darkBg rounded-lg border border-gold/10">
                        <button id="btn-h1" class="toolbar-btn px-2 py-1 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all text-sm font-bold" title="Heading 1">H1</button>
                        <button id="btn-h2" class="toolbar-btn px-2 py-1 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all text-sm font-bold" title="Heading 2">H2</button>
                        <button id="btn-h3" class="toolbar-btn px-2 py-1 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all text-sm font-bold" title="Heading 3">H3</button>
                    </div>

                    <div class="h-6 w-px bg-gold/20 hidden sm:block"></div>

                    <div class="flex items-center gap-1 p-1 bg-darkBg rounded-lg border border-gold/10">
                        <button id="btn-link" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="Link (Ctrl+K)">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                        </button>
                        <button id="btn-image" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="Image">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                        </button>
                        <button id="btn-code" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="Inline Code">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                        </button>
                        <button id="btn-codeblock" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="Code Block">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"></rect><path d="m10 8-3 4 3 4"></path><path d="m14 8 3 4-3 4"></path></svg>
                        </button>
                    </div>

                    <div class="h-6 w-px bg-gold/20 hidden sm:block"></div>

                    <div class="flex items-center gap-1 p-1 bg-darkBg rounded-lg border border-gold/10">
                        <button id="btn-ul" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="Bullet List">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><circle cx="4" cy="6" r="1" fill="currentColor"></circle><circle cx="4" cy="12" r="1" fill="currentColor"></circle><circle cx="4" cy="18" r="1" fill="currentColor"></circle></svg>
                        </button>
                        <button id="btn-ol" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="Numbered List">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="10" y1="6" x2="21" y2="6"></line><line x1="10" y1="12" x2="21" y2="12"></line><line x1="10" y1="18" x2="21" y2="18"></line><text x="3" y="8" font-size="8" fill="currentColor">1</text><text x="3" y="14" font-size="8" fill="currentColor">2</text><text x="3" y="20" font-size="8" fill="currentColor">3</text></svg>
                        </button>
                        <button id="btn-tasklist" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="Task List">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="5" width="6" height="6" rx="1"></rect><path d="m5 8 1 1 2-2"></path><line x1="12" y1="8" x2="21" y2="8"></line><rect x="3" y="13" width="6" height="6" rx="1"></rect><line x1="12" y1="16" x2="21" y2="16"></line></svg>
                        </button>
                        <button id="btn-quote" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="Blockquote">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 01-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179zm10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 01-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179z"></path></svg>
                        </button>
                        <button id="btn-hr" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="Horizontal Rule">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="3" y1="12" x2="21" y2="12"></line></svg>
                        </button>
                        <button id="btn-table" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="Table">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="3" y1="15" x2="21" y2="15"></line><line x1="9" y1="3" x2="9" y2="21"></line><line x1="15" y1="3" x2="15" y2="21"></line></svg>
                        </button>
                    </div>

                    <div class="flex-1"></div>

                    {{-- Action Buttons --}}
                    <div class="flex items-center gap-2">
                        <button id="btn-copy-md" class="px-3 py-1.5 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 text-sm cursor-pointer" title="Copy Markdown">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            Copy MD
                        </button>
                        <button id="btn-copy-html" class="px-3 py-1.5 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 text-sm cursor-pointer" title="Copy HTML">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            Copy HTML
                        </button>
                        <button id="btn-download" class="px-3 py-1.5 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 text-sm cursor-pointer" title="Download .md file">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Download
                        </button>
                        <button id="btn-clear" class="px-3 py-1.5 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 text-sm cursor-pointer" title="Clear">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Clear
                        </button>
                    </div>
                </div>

                {{-- Status Bar --}}
                <div class="flex flex-wrap items-center justify-between gap-4 mb-4 p-3 rounded-lg bg-darkBg border border-gold/10 text-sm">
                    <div class="flex items-center gap-4 text-light-muted">
                        <span>Words: <span id="word-count" class="text-light">0</span></span>
                        <span>Characters: <span id="char-count" class="text-light">0</span></span>
                        <span>Lines: <span id="line-count" class="text-light">0</span></span>
                    </div>
                    <div class="text-light-muted text-xs">
                        <kbd class="px-2 py-0.5 bg-darkCard rounded text-gold">Ctrl</kbd> + <kbd class="px-2 py-0.5 bg-darkCard rounded text-gold">B</kbd> Bold
                        <span class="mx-2">|</span>
                        <kbd class="px-2 py-0.5 bg-darkCard rounded text-gold">Ctrl</kbd> + <kbd class="px-2 py-0.5 bg-darkCard rounded text-gold">I</kbd> Italic
                        <span class="mx-2">|</span>
                        <kbd class="px-2 py-0.5 bg-darkCard rounded text-gold">Ctrl</kbd> + <kbd class="px-2 py-0.5 bg-darkCard rounded text-gold">K</kbd> Link
                    </div>
                </div>

                {{-- Split View Editor --}}
                <div class="flex flex-col lg:flex-row gap-4 lg:gap-0">
                    {{-- Editor Panel --}}
                    <div class="flex-1 flex flex-col min-w-0">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Markdown Editor
                        </label>
                        <div class="flex-1">
                            <textarea
                                id="markdown-input"
                                class="editor-textarea w-full h-[600px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                                placeholder="# Start writing your Markdown here...

## Features
- **Bold** and *italic* text
- [Links](https://example.com)
- Code blocks with syntax highlighting

```javascript
const greeting = 'Hello, World!';
console.log(greeting);
```

> Blockquotes for emphasis

| Column 1 | Column 2 |
|----------|----------|
| Cell 1   | Cell 2   |"
                                spellcheck="false"
                            ></textarea>
                        </div>
                    </div>

                    {{-- Divider (Desktop) --}}
                    <div class="hidden lg:block split-divider mx-2"></div>

                    {{-- Preview Panel --}}
                    <div class="flex-1 flex flex-col min-w-0">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            Preview
                        </label>
                        <div id="markdown-preview" class="markdown-body h-[600px] bg-darkBg border border-gold/20 rounded-lg p-4 overflow-y-auto">
                            <p class="text-light-muted">Preview will appear here as you type...</p>
                        </div>
                    </div>
                </div>

                {{-- Success/Error Notifications --}}
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

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Real-Time Preview</h3>
                    <p class="text-light-muted text-sm">See your Markdown rendered instantly as you type. No need to click any buttons.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Syntax Highlighting</h3>
                    <p class="text-light-muted text-sm">Code blocks are automatically highlighted for 180+ programming languages.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Your content is never sent to any server.</p>
                </div>
            </div>

            {{-- Markdown Quick Reference --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8 mb-12">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Markdown Quick Reference</h2>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Text Formatting --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gold mb-3">Text Formatting</h3>
                        <div class="space-y-2 text-sm">
                            <div><code class="text-light-muted">**bold**</code> <span class="text-light-muted">→</span> <strong class="text-light">bold</strong></div>
                            <div><code class="text-light-muted">*italic*</code> <span class="text-light-muted">→</span> <em class="text-light">italic</em></div>
                            <div><code class="text-light-muted">~~strike~~</code> <span class="text-light-muted">→</span> <del class="text-light">strike</del></div>
                            <div><code class="text-light-muted">`code`</code> <span class="text-light-muted">→</span> <code class="bg-darkBg px-1 rounded text-light">code</code></div>
                        </div>
                    </div>

                    {{-- Headings --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gold mb-3">Headings</h3>
                        <div class="space-y-2 text-sm">
                            <div><code class="text-light-muted"># Text</code> <span class="text-light-muted">→</span> <span class="text-light font-bold text-lg">Heading 1</span></div>
                            <div><code class="text-light-muted">## Text</code> <span class="text-light-muted">→</span> <span class="text-light font-bold text-base">Heading 2</span></div>
                            <div><code class="text-light-muted">### Text</code> <span class="text-light-muted">→</span> <span class="text-light font-bold text-sm">Heading 3</span></div>
                        </div>
                    </div>

                    {{-- Links & Images --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gold mb-3">Links & Images</h3>
                        <div class="space-y-2 text-sm">
                            <div><code class="text-light-muted">[text](url)</code> <span class="text-light-muted">→</span> <a href="#" class="text-gold underline">link</a></div>
                            <div><code class="text-light-muted">![alt](url)</code> <span class="text-light-muted">→</span> <span class="text-light">embedded image</span></div>
                        </div>
                    </div>

                    {{-- Lists --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gold mb-3">Lists</h3>
                        <div class="space-y-2 text-sm">
                            <div><code class="text-light-muted">- item</code> <span class="text-light-muted">→</span> <span class="text-light">• bullet point</span></div>
                            <div><code class="text-light-muted">1. item</code> <span class="text-light-muted">→</span> <span class="text-light">1. numbered</span></div>
                            <div><code class="text-light-muted">- [x] done</code> <span class="text-light-muted">→</span> <span class="text-light"><input type="checkbox" checked disabled class="accent-gold align-middle"> done</span></div>
                            <div><code class="text-light-muted">- [ ] todo</code> <span class="text-light-muted">→</span> <span class="text-light"><input type="checkbox" disabled class="accent-gold align-middle"> todo</span></div>
                        </div>
                    </div>

                    {{-- Code Blocks --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gold mb-3">Code Blocks</h3>
                        <div class="space-y-1 text-sm">
                            <div class="text-light-muted"><code>```javascript</code></div>
                            <div class="text-light-muted"><code>const x = 1;</code></div>
                            <div class="text-light-muted"><code>```</code></div>
                            <div class="pt-1"><span class="text-light-muted">→</span> <code class="bg-darkBg px-2 py-0.5 rounded text-gold text-xs">syntax highlighted</code></div>
                        </div>
                    </div>

                    {{-- Other --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gold mb-3">Other</h3>
                        <div class="space-y-2 text-sm">
                            <div><code class="text-light-muted">> text</code> <span class="text-light-muted">→</span> <span class="text-light border-l-2 border-gold pl-2">blockquote</span></div>
                            <div><code class="text-light-muted">---</code> <span class="text-light-muted">→</span> <span class="inline-block w-16 border-t border-light-muted align-middle"></span> <span class="text-light text-xs">hr</span></div>
                            <div><code class="text-light-muted">| A | B |</code> <span class="text-light-muted">→</span> <span class="text-light">table</span></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FAQ Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Frequently Asked Questions</h2>

                <div class="space-y-4 max-w-3xl mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is GitHub Flavored Markdown (GFM)?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            GitHub Flavored Markdown (GFM) is a variant of Markdown with additional features like tables, task lists, strikethrough text, and fenced code blocks with syntax highlighting. This tool fully supports GFM syntax, making it perfect for writing README files, documentation, and GitHub issues.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does this tool support syntax highlighting?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Code blocks are automatically syntax highlighted for over 180 programming languages including JavaScript, Python, PHP, Ruby, Go, Rust, and many more. Just specify the language after the opening triple backticks (e.g., ```javascript).
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I export the rendered HTML?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, you can copy the rendered HTML output using the "Copy HTML" button, or download your Markdown as a .md file using the "Download" button. This makes it easy to use your content in other applications.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my content saved anywhere?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Your content is saved only in your browser's local storage for convenience, so you won't lose your work if you accidentally close the tab. Nothing is ever sent to any server. All processing happens 100% client-side in your browser.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What Markdown features are supported?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            This tool supports all standard Markdown features plus GitHub Flavored Markdown extensions: headings (H1-H6), bold, italic, strikethrough, links, images, unordered lists, ordered lists, task lists (checkboxes), blockquotes, inline code, fenced code blocks with syntax highlighting, tables, and horizontal rules.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    {{-- Highlight.js for syntax highlighting - MUST load first --}}
    <script src="https://cdn.jsdelivr.net/npm/highlight.js@11.9.0/lib/highlight.min.js"></script>
    {{-- Marked.js for Markdown parsing --}}
    <script src="https://cdn.jsdelivr.net/npm/marked@12.0.0/marked.min.js"></script>

    <script>
    (function() {
        // DOM Elements
        const markdownInput = document.getElementById('markdown-input');
        const markdownPreview = document.getElementById('markdown-preview');
        const wordCount = document.getElementById('word-count');
        const charCount = document.getElementById('char-count');
        const lineCount = document.getElementById('line-count');
        const btnCopyMd = document.getElementById('btn-copy-md');
        const btnCopyHtml = document.getElementById('btn-copy-html');
        const btnDownload = document.getElementById('btn-download');
        const btnClear = document.getElementById('btn-clear');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        // Toolbar buttons
        const btnBold = document.getElementById('btn-bold');
        const btnItalic = document.getElementById('btn-italic');
        const btnStrikethrough = document.getElementById('btn-strikethrough');
        const btnH1 = document.getElementById('btn-h1');
        const btnH2 = document.getElementById('btn-h2');
        const btnH3 = document.getElementById('btn-h3');
        const btnLink = document.getElementById('btn-link');
        const btnImage = document.getElementById('btn-image');
        const btnCode = document.getElementById('btn-code');
        const btnCodeblock = document.getElementById('btn-codeblock');
        const btnUl = document.getElementById('btn-ul');
        const btnOl = document.getElementById('btn-ol');
        const btnTasklist = document.getElementById('btn-tasklist');
        const btnQuote = document.getElementById('btn-quote');
        const btnHr = document.getElementById('btn-hr');
        const btnTable = document.getElementById('btn-table');

        // Local Storage Key
        const STORAGE_KEY = 'markdownPreviewContent';

        // Configure marked.js
        marked.setOptions({
            gfm: true,
            breaks: true
        });

        // ===== Utility Functions =====

        function showSuccess(message) {
            successMessage.textContent = message;
            successNotification.classList.remove('hidden');
            errorNotification.classList.add('hidden');
            setTimeout(() => successNotification.classList.add('hidden'), 2500);
        }

        function showError(message) {
            errorMessage.textContent = message;
            errorNotification.classList.remove('hidden');
            successNotification.classList.add('hidden');
            setTimeout(() => errorNotification.classList.add('hidden'), 3000);
        }

        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // ===== Stats =====

        function updateStats() {
            const text = markdownInput.value;
            const words = text.trim() === '' ? 0 : text.trim().split(/\s+/).filter(w => w.length > 0).length;
            const chars = text.length;
            const lines = text === '' ? 0 : text.split('\n').length;

            wordCount.textContent = words.toLocaleString();
            charCount.textContent = chars.toLocaleString();
            lineCount.textContent = lines.toLocaleString();
        }

        // ===== Preview Rendering =====

        function renderPreview() {
            const markdown = markdownInput.value;

            if (!markdown.trim()) {
                markdownPreview.innerHTML = '<p class="text-light-muted">Preview will appear here as you type...</p>';
                return;
            }

            try {
                const html = marked.parse(markdown);
                markdownPreview.innerHTML = html;

                // Apply syntax highlighting to all code blocks
                if (typeof hljs !== 'undefined') {
                    markdownPreview.querySelectorAll('pre code').forEach((block) => {
                        hljs.highlightElement(block);
                    });
                }
            } catch (error) {
                console.error('Markdown parsing error:', error);
                markdownPreview.innerHTML = '<p class="text-red-400">Error rendering Markdown: ' + error.message + '</p>';
            }
        }

        const debouncedRender = debounce(renderPreview, 150);

        // ===== Local Storage =====

        function saveContent() {
            localStorage.setItem(STORAGE_KEY, markdownInput.value);
        }

        function loadContent() {
            const saved = localStorage.getItem(STORAGE_KEY);
            if (saved) {
                markdownInput.value = saved;
                updateStats();
                renderPreview();
            }
        }

        // ===== Text Manipulation =====

        function wrapSelection(before, after = before) {
            const start = markdownInput.selectionStart;
            const end = markdownInput.selectionEnd;
            const text = markdownInput.value;
            const selectedText = text.substring(start, end);

            const newText = text.substring(0, start) + before + selectedText + after + text.substring(end);
            markdownInput.value = newText;

            // Position cursor
            if (selectedText) {
                markdownInput.setSelectionRange(start + before.length, end + before.length);
            } else {
                markdownInput.setSelectionRange(start + before.length, start + before.length);
            }

            markdownInput.focus();
            markdownInput.dispatchEvent(new Event('input'));
        }

        function insertAtLineStart(prefix) {
            const start = markdownInput.selectionStart;
            const text = markdownInput.value;

            // Find the start of the current line
            let lineStart = start;
            while (lineStart > 0 && text[lineStart - 1] !== '\n') {
                lineStart--;
            }

            const newText = text.substring(0, lineStart) + prefix + text.substring(lineStart);
            markdownInput.value = newText;
            markdownInput.setSelectionRange(start + prefix.length, start + prefix.length);

            markdownInput.focus();
            markdownInput.dispatchEvent(new Event('input'));
        }

        function insertText(text) {
            const start = markdownInput.selectionStart;
            const currentText = markdownInput.value;

            const newText = currentText.substring(0, start) + text + currentText.substring(start);
            markdownInput.value = newText;

            const newCursorPos = start + text.length;
            markdownInput.setSelectionRange(newCursorPos, newCursorPos);

            markdownInput.focus();
            markdownInput.dispatchEvent(new Event('input'));
        }

        // ===== Toolbar Actions =====

        btnBold.addEventListener('click', () => wrapSelection('**'));
        btnItalic.addEventListener('click', () => wrapSelection('*'));
        btnStrikethrough.addEventListener('click', () => wrapSelection('~~'));
        btnH1.addEventListener('click', () => insertAtLineStart('# '));
        btnH2.addEventListener('click', () => insertAtLineStart('## '));
        btnH3.addEventListener('click', () => insertAtLineStart('### '));
        btnLink.addEventListener('click', () => {
            const start = markdownInput.selectionStart;
            const end = markdownInput.selectionEnd;
            const selectedText = markdownInput.value.substring(start, end);

            if (selectedText) {
                wrapSelection('[', '](url)');
            } else {
                insertText('[link text](url)');
            }
        });
        btnImage.addEventListener('click', () => insertText('![alt text](image-url)'));
        btnCode.addEventListener('click', () => wrapSelection('`'));
        btnCodeblock.addEventListener('click', () => {
            const start = markdownInput.selectionStart;
            const end = markdownInput.selectionEnd;
            const selectedText = markdownInput.value.substring(start, end);

            if (selectedText) {
                wrapSelection('\n```\n', '\n```\n');
            } else {
                insertText('\n```javascript\n// code here\n```\n');
            }
        });
        btnUl.addEventListener('click', () => insertAtLineStart('- '));
        btnOl.addEventListener('click', () => insertAtLineStart('1. '));
        btnTasklist.addEventListener('click', () => insertAtLineStart('- [ ] '));
        btnQuote.addEventListener('click', () => insertAtLineStart('> '));
        btnHr.addEventListener('click', () => insertText('\n---\n'));
        btnTable.addEventListener('click', () => {
            const table = `
| Header 1 | Header 2 | Header 3 |
|----------|----------|----------|
| Cell 1   | Cell 2   | Cell 3   |
| Cell 4   | Cell 5   | Cell 6   |
`;
            insertText(table);
        });

        // ===== Action Buttons =====

        btnCopyMd.addEventListener('click', async () => {
            const text = markdownInput.value;
            if (!text) {
                showError('Nothing to copy. Write some Markdown first.');
                return;
            }

            try {
                await navigator.clipboard.writeText(text);
                showSuccess('Markdown copied to clipboard!');
            } catch (err) {
                showError('Failed to copy to clipboard.');
            }
        });

        btnCopyHtml.addEventListener('click', async () => {
            const text = markdownInput.value;
            if (!text) {
                showError('Nothing to copy. Write some Markdown first.');
                return;
            }

            try {
                const html = marked.parse(text);
                await navigator.clipboard.writeText(html);
                showSuccess('HTML copied to clipboard!');
            } catch (err) {
                showError('Failed to copy to clipboard.');
            }
        });

        btnDownload.addEventListener('click', () => {
            const text = markdownInput.value;
            if (!text) {
                showError('Nothing to download. Write some Markdown first.');
                return;
            }

            const blob = new Blob([text], { type: 'text/markdown' });
            const url = URL.createObjectURL(blob);
            const now = new Date();
            const timestamp = now.toISOString().slice(0, 10);
            const a = document.createElement('a');
            a.href = url;
            a.download = `markdown-${timestamp}.md`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            showSuccess('Markdown file downloaded!');
        });

        btnClear.addEventListener('click', () => {
            markdownInput.value = '';
            localStorage.removeItem(STORAGE_KEY);
            updateStats();
            renderPreview();
        });

        // ===== Keyboard Shortcuts =====

        markdownInput.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + B: Bold
            if ((e.ctrlKey || e.metaKey) && e.key === 'b') {
                e.preventDefault();
                wrapSelection('**');
            }
            // Ctrl/Cmd + I: Italic
            if ((e.ctrlKey || e.metaKey) && e.key === 'i') {
                e.preventDefault();
                wrapSelection('*');
            }
            // Ctrl/Cmd + K: Link
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                btnLink.click();
            }
            // Tab handling for indentation
            if (e.key === 'Tab') {
                e.preventDefault();
                const start = this.selectionStart;
                const end = this.selectionEnd;
                this.value = this.value.substring(0, start) + '    ' + this.value.substring(end);
                this.selectionStart = this.selectionEnd = start + 4;
                this.dispatchEvent(new Event('input'));
            }
        });

        // ===== Event Listeners =====

        markdownInput.addEventListener('input', function() {
            updateStats();
            debouncedRender();
            saveContent();
        });

        // Sync scroll between editor and preview
        markdownInput.addEventListener('scroll', function() {
            const scrollPercentage = this.scrollTop / (this.scrollHeight - this.clientHeight);
            markdownPreview.scrollTop = scrollPercentage * (markdownPreview.scrollHeight - markdownPreview.clientHeight);
        });

        // ===== Initialize =====

        // Load saved content from localStorage
        loadContent();

        // Update UI
        updateStats();
        renderPreview();
    })();
    </script>
    @endpush
</x-layout>
