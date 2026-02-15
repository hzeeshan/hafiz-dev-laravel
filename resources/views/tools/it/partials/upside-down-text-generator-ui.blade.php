{{-- Options --}}
<div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
    <div class="flex flex-wrap gap-4">
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" id="opt-reverse" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
            <span class="text-sm text-light-muted">{{ __($t . '.reverse_text') }}</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" id="opt-flip-numbers" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
            <span class="text-sm text-light-muted">{{ __($t . '.flip_numbers') }}</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" id="opt-flip-punctuation" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
            <span class="text-sm text-light-muted">{{ __($t . '.flip_punctuation') }}</span>
        </label>
    </div>
</div>

{{-- Input --}}
<div class="mb-4">
    <label for="text-input" class="text-light font-semibold mb-2 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        {{ __($t . '.your_text') }}
    </label>
    <textarea
        id="text-input"
        class="w-full min-h-[140px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
        placeholder="{{ __($t . '.input_placeholder') }}"
        spellcheck="false"
    ></textarea>
</div>

{{-- Output --}}
<div class="mb-6">
    <label class="text-light font-semibold mb-2 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
        {{ __($t . '.flipped_text') }}
    </label>
    <textarea
        id="text-output"
        class="w-full min-h-[140px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
        placeholder="{{ __($t . '.output_placeholder') }}"
        readonly
    ></textarea>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy') }}
    </button>
    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.sample') }}
    </button>
    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __('tools.clear') }}
    </button>
</div>

{{-- Stats --}}
<div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
    <div class="grid grid-cols-3 gap-4">
        <div class="text-center">
            <div id="stat-chars" class="text-2xl font-bold text-gold mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.characters') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-flipped" class="text-2xl font-bold text-light mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.flipped') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-unchanged" class="text-2xl font-bold text-light mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.unchanged') }}</div>
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
