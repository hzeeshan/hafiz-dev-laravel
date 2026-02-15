{{-- Input Section --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    {{-- Date of Birth --}}
    <div>
        <label for="birth-date" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            {{ __($t . '.date_of_birth') }}
        </label>
        <div class="date-input-wrapper" data-placeholder="gg/mm/aaaa">
            <input type="date" id="birth-date"
                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
            >
        </div>
    </div>

    {{-- Age at Date --}}
    <div>
        <label for="target-date" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            {{ __($t . '.age_at_date') }}
        </label>
        <input type="date" id="target-date"
            class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
        >
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-calculate" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
        {{ __($t . '.calculate_age') }}
    </button>
    <button id="btn-reset" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.reset') }}
    </button>
</div>

{{-- Results Section (hidden initially) --}}
<div id="results-section" class="hidden">

    {{-- Primary Age Display --}}
    <div class="bg-darkBg border border-gold/10 rounded-lg p-6 mb-6">
        <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">{{ __($t . '.your_age') }}</div>
        <div class="flex flex-wrap items-baseline gap-3">
            <div class="text-center">
                <span id="age-years" class="text-5xl md:text-6xl font-bold text-gold">0</span>
                <span class="block text-sm text-light-muted mt-1">{{ __($t . '.years_label') }}</span>
            </div>
            <span class="text-3xl text-gold/40 self-start mt-2">,</span>
            <div class="text-center">
                <span id="age-months" class="text-5xl md:text-6xl font-bold text-light">0</span>
                <span class="block text-sm text-light-muted mt-1">{{ __($t . '.months_label') }}</span>
            </div>
            <span class="text-3xl text-gold/40 self-start mt-2">,</span>
            <div class="text-center">
                <span id="age-days" class="text-5xl md:text-6xl font-bold text-light">0</span>
                <span class="block text-sm text-light-muted mt-1">{{ __($t . '.days_label') }}</span>
            </div>
        </div>
    </div>

    {{-- Detailed Breakdown --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="text-center">
                <div id="total-months" class="text-2xl font-bold text-gold mb-1">0</div>
                <div class="text-light-muted text-sm">{{ __($t . '.total_months') }}</div>
            </div>
            <div class="text-center">
                <div id="total-weeks" class="text-2xl font-bold text-light mb-1">0</div>
                <div class="text-light-muted text-sm">{{ __($t . '.total_weeks') }}</div>
            </div>
            <div class="text-center">
                <div id="total-days" class="text-2xl font-bold text-light mb-1">0</div>
                <div class="text-light-muted text-sm">{{ __($t . '.total_days') }}</div>
            </div>
            <div class="text-center">
                <div id="total-hours" class="text-2xl font-bold text-light mb-1">0</div>
                <div class="text-light-muted text-sm">{{ __($t . '.total_hours') }}</div>
            </div>
            <div class="text-center">
                <div id="total-minutes" class="text-2xl font-bold text-light mb-1">0</div>
                <div class="text-light-muted text-sm">{{ __($t . '.total_minutes') }}</div>
            </div>
            <div class="text-center">
                <div id="total-seconds" class="text-2xl font-bold text-light mb-1">0</div>
                <div class="text-light-muted text-sm">{{ __($t . '.total_seconds') }}</div>
            </div>
        </div>
    </div>

    {{-- Next Birthday & Zodiac --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-darkBg border border-gold/10 rounded-lg p-5">
            <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">{{ __($t . '.next_birthday') }}</div>
            <p class="text-xl font-bold text-light" id="next-birthday-date">—</p>
            <p class="text-light-muted mt-1" id="next-birthday-day">—</p>
            <div class="mt-3 flex items-center gap-2">
                <span class="text-gold text-lg" id="countdown-icon">🎂</span>
                <span class="text-gold font-semibold" id="next-birthday-countdown">—</span>
            </div>
        </div>
        <div class="bg-darkBg border border-gold/10 rounded-lg p-5">
            <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">{{ __($t . '.zodiac_sign') }}</div>
            <div class="flex items-center gap-3">
                <span class="text-4xl" id="zodiac-emoji">—</span>
                <div>
                    <p class="text-xl font-bold text-light" id="zodiac-name">—</p>
                    <p class="text-sm text-light-muted" id="zodiac-dates">—</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Summary Copy --}}
    <div class="bg-darkBg border border-gold/10 rounded-lg p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="text-xs text-light-muted uppercase tracking-wider">{{ __($t . '.summary') }}</div>
            <button id="btn-copy" class="px-4 py-1.5 text-sm border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                {{ __($t . '.copy') }}
            </button>
        </div>
        <pre class="text-light font-mono text-sm leading-relaxed whitespace-pre-wrap" id="summary-text">—</pre>
    </div>
</div>

{{-- Notifications --}}
<div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span id="success-message" class="text-green-400 text-sm">{{ __($t . '.js_strings.copied_to_clipboard') }}</span>
    </div>
</div>
