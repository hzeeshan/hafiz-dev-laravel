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

{{-- Toolbar --}}
<div class="flex flex-wrap items-center gap-2 mb-4">
    {{-- Formatting Buttons --}}
    <div class="flex items-center gap-1 p-1 bg-darkBg rounded-lg border border-gold/10">
        <button id="btn-bold" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="{{ __($t . '.bold_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 4h8a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path><path d="M6 12h9a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path></svg>
        </button>
        <button id="btn-italic" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="{{ __($t . '.italic_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="19" y1="4" x2="10" y2="4"></line><line x1="14" y1="20" x2="5" y2="20"></line><line x1="15" y1="4" x2="9" y2="20"></line></svg>
        </button>
        <button id="btn-strikethrough" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="{{ __($t . '.strikethrough_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 4H9a3 3 0 0 0-3 3v1m10 0H4m16 8h-5m-5 0a3 3 0 0 0 3 3h4a3 3 0 0 0 0-6"></path></svg>
        </button>
    </div>

    <div class="h-6 w-px bg-gold/20 hidden sm:block"></div>

    <div class="flex items-center gap-1 p-1 bg-darkBg rounded-lg border border-gold/10">
        <button id="btn-h1" class="toolbar-btn px-2 py-1 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all text-sm font-bold" title="{{ __($t . '.heading1_title') }}">H1</button>
        <button id="btn-h2" class="toolbar-btn px-2 py-1 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all text-sm font-bold" title="{{ __($t . '.heading2_title') }}">H2</button>
        <button id="btn-h3" class="toolbar-btn px-2 py-1 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all text-sm font-bold" title="{{ __($t . '.heading3_title') }}">H3</button>
    </div>

    <div class="h-6 w-px bg-gold/20 hidden sm:block"></div>

    <div class="flex items-center gap-1 p-1 bg-darkBg rounded-lg border border-gold/10">
        <button id="btn-link" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="{{ __($t . '.link_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
        </button>
        <button id="btn-image" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="{{ __($t . '.image_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
        </button>
        <button id="btn-code" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="{{ __($t . '.inline_code_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
        </button>
        <button id="btn-codeblock" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="{{ __($t . '.code_block_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"></rect><path d="m10 8-3 4 3 4"></path><path d="m14 8 3 4-3 4"></path></svg>
        </button>
    </div>

    <div class="h-6 w-px bg-gold/20 hidden sm:block"></div>

    <div class="flex items-center gap-1 p-1 bg-darkBg rounded-lg border border-gold/10">
        <button id="btn-ul" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="{{ __($t . '.bullet_list_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><circle cx="4" cy="6" r="1" fill="currentColor"></circle><circle cx="4" cy="12" r="1" fill="currentColor"></circle><circle cx="4" cy="18" r="1" fill="currentColor"></circle></svg>
        </button>
        <button id="btn-ol" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="{{ __($t . '.numbered_list_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="10" y1="6" x2="21" y2="6"></line><line x1="10" y1="12" x2="21" y2="12"></line><line x1="10" y1="18" x2="21" y2="18"></line><text x="3" y="8" font-size="8" fill="currentColor">1</text><text x="3" y="14" font-size="8" fill="currentColor">2</text><text x="3" y="20" font-size="8" fill="currentColor">3</text></svg>
        </button>
        <button id="btn-tasklist" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="{{ __($t . '.task_list_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="5" width="6" height="6" rx="1"></rect><path d="m5 8 1 1 2-2"></path><line x1="12" y1="8" x2="21" y2="8"></line><rect x="3" y="13" width="6" height="6" rx="1"></rect><line x1="12" y1="16" x2="21" y2="16"></line></svg>
        </button>
        <button id="btn-quote" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="{{ __($t . '.blockquote_title') }}">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 01-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179zm10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 01-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179z"></path></svg>
        </button>
        <button id="btn-hr" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="{{ __($t . '.horizontal_rule_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="3" y1="12" x2="21" y2="12"></line></svg>
        </button>
        <button id="btn-table" class="toolbar-btn p-2 text-light-muted hover:text-gold hover:bg-gold/10 rounded transition-all" title="{{ __($t . '.table_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="3" y1="15" x2="21" y2="15"></line><line x1="9" y1="3" x2="9" y2="21"></line><line x1="15" y1="3" x2="15" y2="21"></line></svg>
        </button>
    </div>

    <div class="flex-1"></div>

    {{-- Action Buttons --}}
    <div class="flex items-center gap-2">
        <button id="btn-copy-md" class="px-3 py-1.5 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 text-sm cursor-pointer" title="{{ __($t . '.copy_md_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
            {{ __($t . '.copy_md') }}
        </button>
        <button id="btn-copy-html" class="px-3 py-1.5 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 text-sm cursor-pointer" title="{{ __($t . '.copy_html_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
            {{ __($t . '.copy_html') }}
        </button>
        <button id="btn-download" class="px-3 py-1.5 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 text-sm cursor-pointer" title="{{ __($t . '.download_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            {{ __($t . '.download') }}
        </button>
        <button id="btn-clear" class="px-3 py-1.5 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 text-sm cursor-pointer" title="{{ __($t . '.clear_title') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            {{ __($t . '.clear') }}
        </button>
    </div>
</div>

{{-- Status Bar --}}
<div class="flex flex-wrap items-center justify-between gap-4 mb-4 p-3 rounded-lg bg-darkBg border border-gold/10 text-sm">
    <div class="flex items-center gap-4 text-light-muted">
        <span>{{ __($t . '.words') }}: <span id="word-count" class="text-light">0</span></span>
        <span>{{ __($t . '.characters') }}: <span id="char-count" class="text-light">0</span></span>
        <span>{{ __($t . '.lines') }}: <span id="line-count" class="text-light">0</span></span>
    </div>
    <div class="text-light-muted text-xs">
        <kbd class="px-2 py-0.5 bg-darkCard rounded text-gold">Ctrl</kbd> + <kbd class="px-2 py-0.5 bg-darkCard rounded text-gold">B</kbd> {{ __($t . '.shortcut_bold') }}
        <span class="mx-2">|</span>
        <kbd class="px-2 py-0.5 bg-darkCard rounded text-gold">Ctrl</kbd> + <kbd class="px-2 py-0.5 bg-darkCard rounded text-gold">I</kbd> {{ __($t . '.shortcut_italic') }}
        <span class="mx-2">|</span>
        <kbd class="px-2 py-0.5 bg-darkCard rounded text-gold">Ctrl</kbd> + <kbd class="px-2 py-0.5 bg-darkCard rounded text-gold">K</kbd> {{ __($t . '.shortcut_link') }}
    </div>
</div>

{{-- Split View Editor --}}
<div class="flex flex-col lg:flex-row gap-4 lg:gap-0">
    {{-- Editor Panel --}}
    <div class="flex-1 flex flex-col min-w-0">
        <label class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            {{ __($t . '.markdown_editor') }}
        </label>
        <div class="flex-1">
            <textarea
                id="markdown-input"
                class="editor-textarea w-full h-[600px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                placeholder="{{ __($t . '.editor_placeholder') }}"
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
            {{ __($t . '.preview') }}
        </label>
        <div id="markdown-preview" class="markdown-body h-[600px] bg-darkBg border border-gold/20 rounded-lg p-4 overflow-y-auto">
            <p style="color:#8b949e;font-style:italic">{{ __($t . '.preview_placeholder') }}</p>
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
