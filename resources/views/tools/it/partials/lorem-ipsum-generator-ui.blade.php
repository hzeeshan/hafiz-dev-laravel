{{-- Side-by-side layout: Controls left, Output right --}}
<div class="grid grid-cols-1 md:grid-cols-5 gap-6">

    {{-- Left Column: Controls (40%) --}}
    <div class="md:col-span-2 flex flex-col">
        {{-- Generation Type Tabs --}}
        <div class="mb-8">
            <label class="text-light font-semibold mb-3 block">{{ __($t . '.generation_type') }}</label>
            <div class="flex flex-wrap gap-2">
                <button data-type="paragraphs" class="type-tab px-4 py-2 rounded-lg font-semibold transition-all duration-300 cursor-pointer bg-gold text-darkBg">
                    {{ __($t . '.paragraphs') }}
                </button>
                <button data-type="sentences" class="type-tab px-4 py-2 rounded-lg font-semibold transition-all duration-300 cursor-pointer border border-gold/50 text-light-muted hover:bg-gold/10 hover:text-gold">
                    {{ __($t . '.sentences') }}
                </button>
                <button data-type="words" class="type-tab px-4 py-2 rounded-lg font-semibold transition-all duration-300 cursor-pointer border border-gold/50 text-light-muted hover:bg-gold/10 hover:text-gold">
                    {{ __($t . '.words') }}
                </button>
            </div>
        </div>

        {{-- Quantity Slider --}}
        <div class="mb-8">
            <div class="flex items-center justify-between mb-3">
                <label for="quantity-slider" class="text-light font-semibold">
                    <span id="quantity-label">{{ __($t . '.paragraphs') }}</span>
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
        <div class="mb-8 space-y-3">
            <label class="flex items-center gap-3 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                <input type="checkbox" id="start-with-lorem" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                <span class="text-light text-sm">{{ __($t . '.start_with_lorem') }}</span>
            </label>
            <label id="html-tags-option" class="flex items-center gap-3 p-3 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                <input type="checkbox" id="include-html-tags" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                <span class="text-light text-sm">{!! __($t . '.include_html_tags') !!}</span>
            </label>
        </div>

        {{-- Generate Button + Stats --}}
        <div class="flex flex-wrap items-center gap-4 mt-auto">
            <button id="btn-generate" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                {{ __($t . '.generate') }}
            </button>
            <div class="flex flex-wrap gap-3 text-sm">
                <div class="flex items-center gap-1">
                    <span class="text-light-muted" id="count-label">{{ __($t . '.paragraphs') }}:</span>
                    <span id="para-count" class="text-gold font-mono font-semibold">0</span>
                </div>
                <div class="flex items-center gap-1">
                    <span class="text-light-muted">{{ __($t . '.words_label') }}</span>
                    <span id="word-count" class="text-gold font-mono font-semibold">0</span>
                </div>
                <div class="flex items-center gap-1">
                    <span class="text-light-muted">{{ __($t . '.chars_label') }}</span>
                    <span id="char-count" class="text-gold font-mono font-semibold">0</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Column: Output (60%) --}}
    <div class="md:col-span-3" style="min-width:0">
        <label class="text-light font-semibold mb-3 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            {{ __($t . '.generated_output') }}
        </label>
        <textarea id="output-textarea" readonly
                  style="width:100%;box-sizing:border-box"
                  class="min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 text-light font-normal resize-none focus:border-gold/50 focus:outline-none"
                  placeholder="{{ __($t . '.placeholder') }}"></textarea>
    </div>

</div>

{{-- Action Buttons (full width below both columns) --}}
<div class="flex flex-wrap gap-3 mt-6 pt-6 border-t border-gold/10">
    <button id="btn-copy" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy_to_clipboard') }}
    </button>
    <button id="btn-download" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
        {{ __($t . '.download_txt') }}
    </button>
    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.clear') }}
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
