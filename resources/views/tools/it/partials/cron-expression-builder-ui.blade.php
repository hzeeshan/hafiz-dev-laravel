{{-- Expression Display --}}
<div class="mb-6">
    <label for="cron-expression" class="text-light font-semibold mb-2 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        {{ __($t . '.cron_expression') }}
    </label>
    <div class="flex flex-col sm:flex-row gap-3 mt-2">
        <div class="flex-1 relative">
            <input
                type="text"
                id="cron-expression"
                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 font-mono text-xl text-center text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30"
                value="* * * * *"
                spellcheck="false"
                placeholder="* * * * *"
            >
            <div class="flex justify-between px-4 mt-1 text-xs text-light-muted">
                <span>{{ __($t . '.min') }}</span>
                <span>{{ __($t . '.hour') }}</span>
                <span>{{ __($t . '.day') }}</span>
                <span>{{ __($t . '.month') }}</span>
                <span>{{ __($t . '.dow') }}</span>
            </div>
        </div>
        <button id="btn-copy" class="px-6 py-3 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
            {{ __($t . '.copy') }}
        </button>
    </div>
</div>

{{-- Human Readable Description --}}
<div id="description-display" class="mb-6 p-4 rounded-lg bg-gold/10 border border-gold/30 text-center">
    <p id="human-description" class="text-gold text-lg font-medium">{{ __($t . '.every_minute') }}</p>
</div>

{{-- Error Display --}}
<div id="error-display" class="hidden mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/30">
    <div class="flex items-start gap-3">
        <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <div>
            <h4 class="text-red-400 font-semibold mb-1">{{ __($t . '.invalid_cron') }}</h4>
            <p id="error-message" class="text-red-300 text-sm"></p>
        </div>
    </div>
</div>

{{-- Visual Builder --}}
<div class="mb-6">
    <h3 class="text-light font-semibold mb-4 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
        {{ __($t . '.visual_builder') }}
    </h3>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
        {{-- Minute --}}
        <div class="space-y-2">
            <label class="block text-light-muted text-sm font-medium">{{ __($t . '.minute_label') }}</label>
            <select id="minute-type" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none cursor-pointer">
                <option value="*">{{ __($t . '.every_minute_opt') }}</option>
                <option value="*/n">{{ __($t . '.every_n_minutes') }}</option>
                <option value="specific">{{ __($t . '.specific_minute') }}</option>
                <option value="range">{{ __($t . '.range') }}</option>
                <option value="list">{{ __($t . '.list') }}</option>
            </select>
            <input type="text" id="minute-value" class="hidden w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none font-mono" placeholder="0">
        </div>

        {{-- Hour --}}
        <div class="space-y-2">
            <label class="block text-light-muted text-sm font-medium">{{ __($t . '.hour_label') }}</label>
            <select id="hour-type" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none cursor-pointer">
                <option value="*">{{ __($t . '.every_hour_opt') }}</option>
                <option value="*/n">{{ __($t . '.every_n_hours') }}</option>
                <option value="specific">{{ __($t . '.specific_hour') }}</option>
                <option value="range">{{ __($t . '.range') }}</option>
                <option value="list">{{ __($t . '.list') }}</option>
            </select>
            <input type="text" id="hour-value" class="hidden w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none font-mono" placeholder="0">
        </div>

        {{-- Day of Month --}}
        <div class="space-y-2">
            <label class="block text-light-muted text-sm font-medium">{{ __($t . '.day_of_month_label') }}</label>
            <select id="dom-type" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none cursor-pointer">
                <option value="*">{{ __($t . '.every_day_opt') }}</option>
                <option value="*/n">{{ __($t . '.every_n_days') }}</option>
                <option value="specific">{{ __($t . '.specific_day') }}</option>
                <option value="range">{{ __($t . '.range') }}</option>
                <option value="list">{{ __($t . '.list') }}</option>
            </select>
            <input type="text" id="dom-value" class="hidden w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none font-mono" placeholder="1">
        </div>

        {{-- Month --}}
        <div class="space-y-2">
            <label class="block text-light-muted text-sm font-medium">{{ __($t . '.month_label') }}</label>
            <select id="month-type" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none cursor-pointer">
                <option value="*">{{ __($t . '.every_month_opt') }}</option>
                <option value="*/n">{{ __($t . '.every_n_months') }}</option>
                <option value="specific">{{ __($t . '.specific_month') }}</option>
                <option value="range">{{ __($t . '.range') }}</option>
                <option value="list">{{ __($t . '.list') }}</option>
            </select>
            <input type="text" id="month-value" class="hidden w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none font-mono" placeholder="1">
        </div>

        {{-- Day of Week --}}
        <div class="space-y-2">
            <label class="block text-light-muted text-sm font-medium">{{ __($t . '.day_of_week_label') }}</label>
            <select id="dow-type" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none cursor-pointer">
                <option value="*">{{ __($t . '.every_dow_opt') }}</option>
                <option value="specific">{{ __($t . '.specific_dow') }}</option>
                <option value="range">{{ __($t . '.range') }}</option>
                <option value="list">{{ __($t . '.list') }}</option>
            </select>
            <input type="text" id="dow-value" class="hidden w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none font-mono" placeholder="0">
        </div>
    </div>
</div>

{{-- Common Presets --}}
<div class="mb-6">
    <h3 class="text-light font-semibold mb-4 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
        {{ __($t . '.common_presets') }}
    </h3>
    <div class="flex flex-wrap gap-2">
        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="* * * * *">{{ __($t . '.preset_every_minute') }}</button>
        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="*/5 * * * *">{{ __($t . '.preset_every_5_minutes') }}</button>
        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="0 * * * *">{{ __($t . '.preset_every_hour') }}</button>
        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="0 0 * * *">{{ __($t . '.preset_daily_midnight') }}</button>
        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="0 9 * * *">{{ __($t . '.preset_daily_9am') }}</button>
        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="0 9 * * 1">{{ __($t . '.preset_monday_9am') }}</button>
        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="0 9 * * 1-5">{{ __($t . '.preset_weekdays_9am') }}</button>
        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="0 0 1 * *">{{ __($t . '.preset_monthly') }}</button>
        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="0 0 * * 0">{{ __($t . '.preset_sunday_midnight') }}</button>
    </div>
</div>

{{-- Next Run Times --}}
<div class="grid md:grid-cols-2 gap-6">
    <div>
        <h3 class="text-light font-semibold mb-4 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            {{ __($t . '.next_5_runs') }}
        </h3>
        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
            <ul id="next-runs" class="space-y-2 font-mono text-sm">
                <li class="text-light-muted">{{ __($t . '.calculating') }}</li>
            </ul>
        </div>
        <p class="text-light-muted/70 text-xs mt-2">{{ __($t . '.times_in_local') }}</p>
    </div>

    {{-- Laravel Usage --}}
    <div>
        <h3 class="text-light font-semibold mb-4 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
            {{ __($t . '.laravel_usage') }}
        </h3>
        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
            <pre class="text-sm overflow-x-auto"><code id="laravel-code" class="text-light"><span class="text-purple-400">$schedule</span><span class="text-light">-></span><span class="text-gold">command</span><span class="text-light">(</span><span class="text-sky-400">'your:command'</span><span class="text-light">)</span>
    <span class="text-light">-></span><span class="text-gold">cron</span><span class="text-light">(</span><span class="text-sky-400">'* * * * *'</span><span class="text-light">);</span></code></pre>
            <div id="laravel-alternative" class="mt-3 pt-3 border-t border-gold/10">
                <p class="text-light-muted text-xs mb-2">{{ __($t . '.or_using_helpers') }}</p>
                <pre class="text-sm overflow-x-auto"><code id="laravel-helper" class="text-light"><span class="text-purple-400">$schedule</span><span class="text-light">-></span><span class="text-gold">command</span><span class="text-light">(</span><span class="text-sky-400">'your:command'</span><span class="text-light">)</span>
    <span class="text-light">-></span><span class="text-gold">everyMinute</span><span class="text-light">();</span></code></pre>
            </div>
        </div>
    </div>
</div>

{{-- Reference Card --}}
<div class="mt-6 pt-6 border-t border-gold/20">
    <h2 class="text-xl font-bold text-light mb-4 flex items-center gap-2">
        <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.field_reference') }}
    </h2>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gold/20">
                    <th class="text-left py-3 px-4 text-gold font-semibold">{{ __($t . '.field') }}</th>
                    <th class="text-left py-3 px-4 text-gold font-semibold">{{ __($t . '.values') }}</th>
                    <th class="text-left py-3 px-4 text-gold font-semibold">{{ __($t . '.special_chars') }}</th>
                </tr>
            </thead>
            <tbody class="text-light-muted">
                <tr class="border-b border-gold/10">
                    <td class="py-3 px-4 text-light">{{ __($t . '.minute_label') }}</td>
                    <td class="py-3 px-4 font-mono">0-59</td>
                    <td class="py-3 px-4 font-mono">* , - /</td>
                </tr>
                <tr class="border-b border-gold/10">
                    <td class="py-3 px-4 text-light">{{ __($t . '.hour_label') }}</td>
                    <td class="py-3 px-4 font-mono">0-23</td>
                    <td class="py-3 px-4 font-mono">* , - /</td>
                </tr>
                <tr class="border-b border-gold/10">
                    <td class="py-3 px-4 text-light">{{ __($t . '.day_of_month_label') }}</td>
                    <td class="py-3 px-4 font-mono">1-31</td>
                    <td class="py-3 px-4 font-mono">* , - /</td>
                </tr>
                <tr class="border-b border-gold/10">
                    <td class="py-3 px-4 text-light">{{ __($t . '.month_label') }}</td>
                    <td class="py-3 px-4 font-mono">1-12</td>
                    <td class="py-3 px-4 font-mono">* , - /</td>
                </tr>
                <tr>
                    <td class="py-3 px-4 text-light">{{ __($t . '.day_of_week_label') }}</td>
                    <td class="py-3 px-4 font-mono">0-6 <span class="text-light-muted/70">(Dom=0)</span></td>
                    <td class="py-3 px-4 font-mono">* , - /</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-4 grid sm:grid-cols-2 md:grid-cols-4 gap-4 text-sm">
        <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
            <span class="text-gold font-mono">*</span>
            <span class="text-light-muted ml-2">{{ __($t . '.every_value') }}</span>
        </div>
        <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
            <span class="text-gold font-mono">,</span>
            <span class="text-light-muted ml-2">{{ __($t . '.list_desc') }}</span>
        </div>
        <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
            <span class="text-gold font-mono">-</span>
            <span class="text-light-muted ml-2">{{ __($t . '.range_desc') }}</span>
        </div>
        <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
            <span class="text-gold font-mono">/</span>
            <span class="text-light-muted ml-2">{{ __($t . '.step_desc') }}</span>
        </div>
    </div>
</div>
