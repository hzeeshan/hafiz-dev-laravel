{{-- Media Type Selector --}}
<div class="bg-darkBg rounded-lg border border-gold/10 p-5 mb-6">
    <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">{{ __($t . '.media_type') }}</div>
    <div class="flex flex-wrap gap-2">
        <button data-media="video" class="media-type-btn px-4 py-2 rounded-lg text-sm font-medium bg-gold text-darkBg transition-all duration-200 cursor-pointer">{{ __($t . '.video') }}</button>
        <button data-media="podcast" class="media-type-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:bg-gold/10 hover:text-gold transition-all duration-200 cursor-pointer">{{ __($t . '.podcast') }}</button>
        <button data-media="lecture" class="media-type-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:bg-gold/10 hover:text-gold transition-all duration-200 cursor-pointer">{{ __($t . '.lecture') }}</button>
        <button data-media="course" class="media-type-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:bg-gold/10 hover:text-gold transition-all duration-200 cursor-pointer">{{ __($t . '.course') }}</button>
        <button data-media="audiobook" class="media-type-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:bg-gold/10 hover:text-gold transition-all duration-200 cursor-pointer">{{ __($t . '.audiobook') }}</button>
    </div>
</div>

{{-- Duration Input --}}
<div class="bg-darkBg rounded-lg border border-gold/10 p-5 mb-6">
    <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">{{ __($t . '.original_duration') }}</div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div>
            <label for="input-hours" class="text-light text-sm font-medium mb-1 block">{{ __($t . '.hours') }}</label>
            <input type="number" id="input-hours" min="0" max="999" value="0" placeholder="0"
                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light text-lg font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
            >
        </div>
        <div>
            <label for="input-minutes" class="text-light text-sm font-medium mb-1 block">{{ __($t . '.minutes') }}</label>
            <input type="number" id="input-minutes" min="0" max="59" value="0" placeholder="0"
                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light text-lg font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
            >
        </div>
        <div>
            <label for="input-seconds" class="text-light text-sm font-medium mb-1 block">{{ __($t . '.seconds') }}</label>
            <input type="number" id="input-seconds" min="0" max="59" value="0" placeholder="0"
                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light text-lg font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
            >
        </div>
    </div>
</div>

{{-- Multiple Items --}}
<div class="bg-darkBg rounded-lg border border-gold/10 p-5 mb-6">
    <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">{{ __($t . '.number_of_items') }}</div>
    <div class="flex items-center gap-4">
        <div class="flex-1">
            <label for="input-items" class="text-light text-sm font-medium mb-1 block">{{ __($t . '.items_description') }}</label>
            <input type="number" id="input-items" min="1" max="999" value="1" placeholder="1"
                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light text-lg font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
            >
        </div>
    </div>
    <p class="text-light-muted text-xs mt-2">{{ __($t . '.items_help') }}</p>
</div>

{{-- Custom Speed --}}
<div class="bg-darkBg rounded-lg border border-gold/10 p-5 mb-6">
    <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">{{ __($t . '.custom_speed') }}</div>
    <div class="flex items-center gap-4">
        <input type="range" id="custom-speed-slider" min="0.25" max="4" step="0.05" value="1.5"
            class="flex-1 h-2 bg-gold/20 rounded-lg appearance-none cursor-pointer accent-gold"
        >
        <div class="flex items-center gap-1">
            <input type="number" id="custom-speed-input" min="0.25" max="4" step="0.05" value="1.5"
                class="w-20 bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-center font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
            >
            <span class="text-light-muted text-sm">x</span>
        </div>
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-calculate" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
        {{ __($t . '.calculate') }}
    </button>
    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
        {{ __($t . '.sample') }}
    </button>
    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy') }}
    </button>
    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.download') }}
    </button>
    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __('tools.clear') }}
    </button>
</div>

{{-- Results Section (hidden initially) --}}
<div id="results-section" class="hidden">

    {{-- Custom Speed Result --}}
    <div class="bg-darkBg border border-gold/10 rounded-lg p-6 mb-6">
        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">{{ __($t . '.your_watch_time') }}</div>
        <div class="flex flex-wrap items-baseline gap-4">
            <div>
                <span class="text-4xl md:text-5xl font-bold text-gold" id="custom-result-time">0h 0m</span>
            </div>
            <div class="text-light-muted text-sm">
                {{ __($t . '.at_speed') }} <span id="custom-result-speed" class="text-light font-semibold">1.5x</span> {{ __($t . '.speed_label') }}
                ({{ __($t . '.saving') }} <span id="custom-result-saved" class="text-green-400 font-semibold">0h 0m</span>)
            </div>
        </div>
        <div id="items-note" class="hidden text-light-muted text-sm mt-2">
            {{ __($t . '.total_for') }} <span id="items-count" class="text-light font-medium">1</span> {{ __($t . '.items_word') }}, <span id="per-item-time" class="text-light font-medium">0h 0m</span> {{ __($t . '.each') }}
        </div>
    </div>

    {{-- Speed Comparison Table --}}
    <div class="bg-darkBg border border-gold/10 rounded-lg p-5 mb-6">
        <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">{{ __($t . '.speed_comparison') }}</div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-gold/10">
                        <th class="pb-3 text-light-muted text-sm font-medium">{{ __($t . '.speed') }}</th>
                        <th class="pb-3 text-light-muted text-sm font-medium">{{ __($t . '.watch_time') }}</th>
                        <th class="pb-3 text-light-muted text-sm font-medium">{{ __($t . '.time_saved') }}</th>
                        <th class="pb-3 text-light-muted text-sm font-medium text-right">{{ __($t . '.pct_saved') }}</th>
                    </tr>
                </thead>
                <tbody id="speed-table-body">
                    {{-- Populated by JS --}}
                </tbody>
            </table>
        </div>
    </div>

    {{-- Quick Stats --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
        <div class="bg-darkBg border border-gold/10 rounded-lg p-4 text-center">
            <div id="stat-original" class="text-xl font-bold text-gold mb-1">0h 0m</div>
            <div class="text-light-muted text-xs">{{ __($t . '.original_length') }}</div>
        </div>
        <div class="bg-darkBg border border-gold/10 rounded-lg p-4 text-center">
            <div id="stat-total-minutes" class="text-xl font-bold text-light mb-1">0</div>
            <div class="text-light-muted text-xs">{{ __($t . '.total_minutes') }}</div>
        </div>
        <div class="bg-darkBg border border-gold/10 rounded-lg p-4 text-center">
            <div id="stat-at-15x" class="text-xl font-bold text-light mb-1">0h 0m</div>
            <div class="text-light-muted text-xs">{{ __($t . '.at_15x_speed') }}</div>
        </div>
        <div class="bg-darkBg border border-gold/10 rounded-lg p-4 text-center">
            <div id="stat-at-2x" class="text-xl font-bold text-light mb-1">0h 0m</div>
            <div class="text-light-muted text-xs">{{ __($t . '.at_2x_speed') }}</div>
        </div>
    </div>
</div>

{{-- Stats bar --}}
<div id="stats-bar" class="hidden mt-4 p-3 rounded-lg bg-darkBg border border-gold/10">
    <div class="flex flex-wrap items-center gap-4 text-sm text-light-muted">
        <span>{{ __($t . '.original_stat') }}: <span id="stats-original" class="text-light font-medium">-</span></span>
        <span>{{ __($t . '.custom_speed_stat') }}: <span id="stats-custom" class="text-light font-medium">-</span></span>
        <span>{{ __($t . '.time_saved_stat') }}: <span id="stats-saved" class="text-green-400 font-medium">-</span></span>
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
