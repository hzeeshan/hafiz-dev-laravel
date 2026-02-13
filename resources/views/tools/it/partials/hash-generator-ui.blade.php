{{-- Input Mode Tabs --}}
<div class="mb-6">
    <div class="flex gap-2">
        <button id="tab-text" class="px-4 py-2 rounded-lg font-semibold transition-all duration-300 bg-gold text-darkBg cursor-pointer">
            {{ __($t . '.text_input_tab') }}
        </button>
        <button id="tab-file" class="px-4 py-2 rounded-lg font-semibold transition-all duration-300 border border-gold/30 text-light-muted hover:border-gold hover:text-gold cursor-pointer">
            {{ __($t . '.file_input_tab') }}
        </button>
    </div>
</div>

{{-- Text Input Mode --}}
<div id="text-mode" class="mb-6">
    <label for="text-input" class="text-light font-semibold mb-3 block">{{ __($t . '.text_to_hash') }}</label>
    <textarea
        id="text-input"
        rows="5"
        placeholder="{{ __($t . '.text_placeholder') }}"
        class="w-full bg-darkBg border border-gold/20 rounded-lg p-4 text-light font-mono text-sm resize-y focus:border-gold focus:outline-none placeholder:text-light-muted/50"
    ></textarea>
    <div class="flex justify-end mt-2">
        <span id="char-count" class="text-light-muted text-xs">0 {{ __($t . '.js_strings.characters') }}</span>
    </div>
</div>

{{-- File Input Mode --}}
<div id="file-mode" class="mb-6 hidden">
    <label class="text-light font-semibold mb-3 block">{{ __($t . '.file_to_hash') }}</label>
    <div
        id="drop-zone"
        class="border-2 border-dashed border-gold/30 rounded-lg p-8 text-center transition-all duration-300 hover:border-gold/50 cursor-pointer"
    >
        <input type="file" id="file-input" class="hidden">
        <div id="drop-zone-content">
            <svg class="w-12 h-12 mx-auto text-light-muted mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
            </svg>
            <p class="text-light-muted mb-2">{{ __($t . '.drag_drop') }}</p>
            <button id="browse-btn" class="px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10 transition-all duration-300 cursor-pointer font-semibold">
                {{ __($t . '.browse_files') }}
            </button>
        </div>
        <div id="file-info" class="hidden">
            <svg class="w-12 h-12 mx-auto text-gold mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <p id="file-name" class="text-light font-semibold mb-1"></p>
            <p id="file-size" class="text-light-muted text-sm"></p>
            <button id="remove-file-btn" class="mt-3 px-3 py-1 text-sm border border-red-500/50 text-red-400 rounded hover:bg-red-500/10 transition-all duration-300 cursor-pointer">
                {{ __($t . '.remove') }}
            </button>
        </div>
    </div>
</div>

{{-- Output Format Options --}}
<div class="mb-6">
    <label class="text-light font-semibold mb-3 block">{{ __($t . '.output_format') }}</label>
    <div class="flex gap-3">
        <label class="flex items-center gap-2 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <input type="radio" name="output-format" value="lowercase" checked class="w-4 h-4 border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
            <span class="text-light text-sm">{{ __($t . '.lowercase') }}</span>
        </label>
        <label class="flex items-center gap-2 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <input type="radio" name="output-format" value="uppercase" class="w-4 h-4 border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
            <span class="text-light text-sm">{{ __($t . '.uppercase') }}</span>
        </label>
    </div>
</div>

{{-- Hash Results Section --}}
<div class="mb-6">
    <div class="flex items-center justify-between mb-3">
        <label class="text-light font-semibold">{{ __($t . '.hash_results') }}</label>
        <div id="processing-indicator" class="hidden flex items-center gap-2 text-gold text-sm">
            <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            <span>{{ __($t . '.js_strings.processing') }}</span>
        </div>
    </div>

    <div class="space-y-3">
        {{-- MD5 --}}
        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-blue-500/20 text-blue-400 text-xs font-semibold rounded">MD5</span>
                    <span class="text-light-muted text-xs">128-bit (32 hex)</span>
                </div>
                <button class="copy-btn p-1.5 text-light-muted hover:text-gold transition-colors cursor-pointer" data-algorithm="md5" title="Copy MD5 hash">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
            </div>
            <code id="hash-md5" class="text-light font-mono text-sm break-all block text-light-muted/50">-</code>
        </div>

        {{-- SHA-1 --}}
        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-yellow-500/20 text-yellow-400 text-xs font-semibold rounded">SHA-1</span>
                    <span class="text-light-muted text-xs">160-bit (40 hex)</span>
                </div>
                <button class="copy-btn p-1.5 text-light-muted hover:text-gold transition-colors cursor-pointer" data-algorithm="sha1" title="Copy SHA-1 hash">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
            </div>
            <code id="hash-sha1" class="text-light font-mono text-sm break-all block text-light-muted/50">-</code>
        </div>

        {{-- SHA-256 --}}
        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-green-500/20 text-green-400 text-xs font-semibold rounded">SHA-256</span>
                    <span class="text-light-muted text-xs">256-bit (64 hex)</span>
                </div>
                <button class="copy-btn p-1.5 text-light-muted hover:text-gold transition-colors cursor-pointer" data-algorithm="sha256" title="Copy SHA-256 hash">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
            </div>
            <code id="hash-sha256" class="text-light font-mono text-sm break-all block text-light-muted/50">-</code>
        </div>

        {{-- SHA-384 --}}
        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-purple-500/20 text-purple-400 text-xs font-semibold rounded">SHA-384</span>
                    <span class="text-light-muted text-xs">384-bit (96 hex)</span>
                </div>
                <button class="copy-btn p-1.5 text-light-muted hover:text-gold transition-colors cursor-pointer" data-algorithm="sha384" title="Copy SHA-384 hash">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
            </div>
            <code id="hash-sha384" class="text-light font-mono text-sm break-all block text-light-muted/50">-</code>
        </div>

        {{-- SHA-512 --}}
        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-red-500/20 text-red-400 text-xs font-semibold rounded">SHA-512</span>
                    <span class="text-light-muted text-xs">512-bit (128 hex)</span>
                </div>
                <button class="copy-btn p-1.5 text-light-muted hover:text-gold transition-colors cursor-pointer" data-algorithm="sha512" title="Copy SHA-512 hash">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
            </div>
            <code id="hash-sha512" class="text-light font-mono text-sm break-all block text-light-muted/50">-</code>
        </div>
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3">
    <button id="btn-copy-all" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy_all_hashes') }}
    </button>
    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __('tools.clear') }}
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
