{{-- Cron Expression Input --}}
<div class="mb-6">
    <label for="cron-input" class="text-light font-semibold mb-2 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        {{ __($t . '.cron_expression') }}
    </label>
    <div class="flex gap-3">
        <input
            type="text"
            id="cron-input"
            class="flex-1 bg-darkBg border border-gold/20 rounded-lg px-4 py-3 font-mono text-lg text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30"
            value="* * * * *"
            spellcheck="false"
            autocomplete="off"
        >
    </div>
</div>

{{-- 5-Field Labels --}}
<div class="mb-6 grid grid-cols-5 gap-2 text-center">
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
        <div id="field-minute" class="text-xl font-mono font-bold text-gold mb-1">*</div>
        <div class="text-xs text-light-muted uppercase tracking-wider">{{ __($t . '.minute') }}</div>
        <div class="text-xs text-light-muted/60 mt-1">0–59</div>
    </div>
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
        <div id="field-hour" class="text-xl font-mono font-bold text-light mb-1">*</div>
        <div class="text-xs text-light-muted uppercase tracking-wider">{{ __($t . '.hour') }}</div>
        <div class="text-xs text-light-muted/60 mt-1">0–23</div>
    </div>
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
        <div id="field-dom" class="text-xl font-mono font-bold text-light mb-1">*</div>
        <div class="text-xs text-light-muted uppercase tracking-wider">{{ __($t . '.day_month') }}</div>
        <div class="text-xs text-light-muted/60 mt-1">1–31</div>
    </div>
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
        <div id="field-month" class="text-xl font-mono font-bold text-light mb-1">*</div>
        <div class="text-xs text-light-muted uppercase tracking-wider">{{ __($t . '.month') }}</div>
        <div class="text-xs text-light-muted/60 mt-1">1–12</div>
    </div>
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
        <div id="field-dow" class="text-xl font-mono font-bold text-light mb-1">*</div>
        <div class="text-xs text-light-muted uppercase tracking-wider">{{ __($t . '.day_week') }}</div>
        <div class="text-xs text-light-muted/60 mt-1">0–6</div>
    </div>
</div>

{{-- Human-Readable Explanation --}}
<div id="explanation-box" class="mb-6 bg-darkBg rounded-lg p-4 border border-gold/10">
    <div class="flex items-start gap-3">
        <svg class="w-5 h-5 text-gold mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <div>
            <div class="text-xs text-light-muted uppercase tracking-wider mb-1">{{ __($t . '.meaning') }}</div>
            <div id="explanation" class="text-light font-medium text-lg">Every minute</div>
        </div>
    </div>
</div>

{{-- Error Box --}}
<div id="error-box" class="hidden mb-6 bg-red-900/20 rounded-lg p-4 border border-red-500/30">
    <div class="flex items-start gap-3">
        <svg class="w-5 h-5 text-red-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <div>
            <div class="text-xs text-red-400 uppercase tracking-wider mb-1">{{ __($t . '.error') }}</div>
            <div id="error-text" class="text-red-300"></div>
        </div>
    </div>
</div>

{{-- Next Run Times --}}
<div id="next-runs-box" class="mb-6 bg-darkBg rounded-lg p-4 border border-gold/10">
    <div class="text-xs text-light-muted uppercase tracking-wider mb-3">{{ __($t . '.next_5_runs') }}</div>
    <div id="next-runs" class="space-y-2">
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy_expression') }}
    </button>
    <button id="btn-reset" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
        {{ __($t . '.reset') }}
    </button>
</div>

{{-- Success Notification --}}
<div id="success-notification" class="hidden bg-green-900/20 border border-green-500/30 rounded-lg p-3 flex items-center gap-2">
    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
    <span id="success-message" class="text-green-400 text-sm"></span>
</div>

{{-- Common Presets --}}
<div class="mt-6">
    <div class="text-xs text-light-muted uppercase tracking-wider mb-3">{{ __($t . '.common_presets') }}</div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-2">
        <button data-cron="* * * * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <div class="font-mono text-sm text-gold">* * * * *</div>
            <div class="text-xs text-light-muted mt-1">{{ __($t . '.every_minute') }}</div>
        </button>
        <button data-cron="*/5 * * * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <div class="font-mono text-sm text-gold">*/5 * * * *</div>
            <div class="text-xs text-light-muted mt-1">{{ __($t . '.every_5_minutes') }}</div>
        </button>
        <button data-cron="*/15 * * * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <div class="font-mono text-sm text-gold">*/15 * * * *</div>
            <div class="text-xs text-light-muted mt-1">{{ __($t . '.every_15_minutes') }}</div>
        </button>
        <button data-cron="0 * * * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <div class="font-mono text-sm text-gold">0 * * * *</div>
            <div class="text-xs text-light-muted mt-1">{{ __($t . '.every_hour') }}</div>
        </button>
        <button data-cron="0 0 * * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <div class="font-mono text-sm text-gold">0 0 * * *</div>
            <div class="text-xs text-light-muted mt-1">{{ __($t . '.every_day_midnight') }}</div>
        </button>
        <button data-cron="0 9 * * 1-5" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <div class="font-mono text-sm text-gold">0 9 * * 1-5</div>
            <div class="text-xs text-light-muted mt-1">{{ __($t . '.weekdays_9am') }}</div>
        </button>
        <button data-cron="0 0 * * 0" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <div class="font-mono text-sm text-gold">0 0 * * 0</div>
            <div class="text-xs text-light-muted mt-1">{{ __($t . '.every_sunday_midnight') }}</div>
        </button>
        <button data-cron="0 0 1 * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <div class="font-mono text-sm text-gold">0 0 1 * *</div>
            <div class="text-xs text-light-muted mt-1">{{ __($t . '.first_day_month') }}</div>
        </button>
        <button data-cron="0 0 1 1 *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <div class="font-mono text-sm text-gold">0 0 1 1 *</div>
            <div class="text-xs text-light-muted mt-1">{{ __($t . '.every_year') }}</div>
        </button>
        <button data-cron="30 4 * * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <div class="font-mono text-sm text-gold">30 4 * * *</div>
            <div class="text-xs text-light-muted mt-1">{{ __($t . '.every_day_430am') }}</div>
        </button>
        <button data-cron="0 */6 * * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <div class="font-mono text-sm text-gold">0 */6 * * *</div>
            <div class="text-xs text-light-muted mt-1">{{ __($t . '.every_6_hours') }}</div>
        </button>
        <button data-cron="0 8-17 * * 1-5" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
            <div class="font-mono text-sm text-gold">0 8-17 * * 1-5</div>
            <div class="text-xs text-light-muted mt-1">{{ __($t . '.business_hours') }}</div>
        </button>
    </div>
</div>

{{-- Quick Reference --}}
<div class="mt-6 bg-darkBg rounded-lg p-4 border border-gold/10">
    <div class="text-xs text-light-muted uppercase tracking-wider mb-3">{{ __($t . '.quick_reference') }}</div>
    <div class="grid sm:grid-cols-2 gap-x-8 gap-y-1 text-sm">
        <div class="flex justify-between py-1 border-b border-gold/5">
            <span class="text-light-muted">{{ __($t . '.wildcard') }}</span>
            <span class="font-mono text-gold">*</span>
        </div>
        <div class="flex justify-between py-1 border-b border-gold/5">
            <span class="text-light-muted">{{ __($t . '.list') }}</span>
            <span class="font-mono text-gold">1,3,5</span>
        </div>
        <div class="flex justify-between py-1 border-b border-gold/5">
            <span class="text-light-muted">{{ __($t . '.range') }}</span>
            <span class="font-mono text-gold">1-5</span>
        </div>
        <div class="flex justify-between py-1 border-b border-gold/5">
            <span class="text-light-muted">{{ __($t . '.step') }}</span>
            <span class="font-mono text-gold">*/10</span>
        </div>
        <div class="flex justify-between py-1 border-b border-gold/5">
            <span class="text-light-muted">{{ __($t . '.range_step') }}</span>
            <span class="font-mono text-gold">1-30/5</span>
        </div>
        <div class="flex justify-between py-1 border-b border-gold/5">
            <span class="text-light-muted">{{ __($t . '.days_of_week') }}</span>
            <span class="font-mono text-gold">0=Dom ... 6=Sab</span>
        </div>
    </div>
</div>
