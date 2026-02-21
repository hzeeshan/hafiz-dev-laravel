{{-- Options --}}
<div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
    <div class="grid sm:grid-cols-2 gap-6">
        {{-- Direction Selector --}}
        <div>
            <label class="text-light font-semibold mb-3 block text-sm">{{ __($t . '.direction') }}</label>
            <select id="translate-direction" class="w-full bg-darkBg border border-gold/20 rounded-lg p-2.5 text-sm text-light focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 cursor-pointer">
                <option value="to-wingdings">{{ __($t . '.to_wingdings') }}</option>
                <option value="to-english">{{ __($t . '.to_english') }}</option>
            </select>
        </div>
        {{-- Font Selector --}}
        <div>
            <label class="text-light font-semibold mb-3 block text-sm">{{ __($t . '.wingdings_font') }}</label>
            <select id="wingdings-font" class="w-full bg-darkBg border border-gold/20 rounded-lg p-2.5 text-sm text-light focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 cursor-pointer">
                <option value="wingdings1">Wingdings 1</option>
                <option value="wingdings2">Wingdings 2</option>
                <option value="wingdings3">Wingdings 3</option>
            </select>
        </div>
    </div>
</div>

{{-- Input --}}
<div class="mb-4">
    <label for="text-input" class="text-light font-semibold mb-2 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        <span id="input-label">{{ __($t . '.your_text') }}</span>
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
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
        <span id="output-label">{{ __($t . '.wingdings_output') }}</span>
    </label>
    <textarea
        id="text-output"
        class="w-full min-h-[140px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-lg text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
        placeholder="{{ __($t . '.output_placeholder') }}"
        readonly
    ></textarea>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-convert" class="px-5 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
        {{ __($t . '.translate') }}
    </button>
    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy') }}
    </button>
    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.download') }}
    </button>
    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.sample') }}
    </button>
    <button id="btn-gaster" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer" title="{{ __($t . '.gaster_mode') }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
        {{ __($t . '.gaster_mode') }}
    </button>
    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.clear') }}
    </button>
</div>

{{-- Stats --}}
<div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
    <div class="grid grid-cols-3 gap-4">
        <div class="text-center">
            <div id="stat-input-chars" class="text-2xl font-bold text-gold mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.input_chars') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-output-chars" class="text-2xl font-bold text-light mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.output_chars') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-font" class="text-2xl font-bold text-light mb-1">-</div>
            <div class="text-light-muted text-sm">{{ __($t . '.font') }}</div>
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
        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        <span id="error-message" class="text-red-400 text-sm"></span>
    </div>
</div>

{{-- Character Reference Table --}}
<div class="mt-6 bg-darkBg rounded-lg border border-gold/10 p-4">
    <details class="group">
        <summary class="flex items-center justify-between cursor-pointer">
            <h2 class="text-lg font-semibold text-light flex items-center gap-2">
                <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                {{ __($t . '.char_ref_table') }}
            </h2>
            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </summary>
        <div class="mt-4 overflow-x-auto">
            <div id="char-ref-table" class="grid grid-cols-6 sm:grid-cols-8 md:grid-cols-10 lg:grid-cols-12 gap-2 text-center">
                {{-- Populated by JavaScript --}}
            </div>
        </div>
    </details>
</div>
