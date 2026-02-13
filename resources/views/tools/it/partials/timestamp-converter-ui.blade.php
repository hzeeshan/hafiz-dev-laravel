{{-- Current Time Section --}}
<div class="bg-darkBg rounded-lg border border-gold/20 p-4 mb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-light font-semibold mb-2">{{ __($t . '.current_time') }}</h2>
            <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                <div class="flex items-center gap-2">
                    <span class="text-light-muted text-sm">{{ __($t . '.unix_timestamp') }}</span>
                    <code id="current-timestamp" class="text-gold font-mono text-lg cursor-pointer hover:text-gold-light transition-colors" title="{{ __($t . '.copy_timestamp') }}">-</code>
                    <button id="btn-copy-current" class="p-1 text-light-muted hover:text-gold transition-colors cursor-pointer" title="{{ __($t . '.copy_timestamp') }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </button>
                </div>
            </div>
            <p id="current-date" class="text-light-muted text-sm mt-2">-</p>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
            <span class="text-light-muted text-sm">{{ __($t . '.live_updating') }}</span>
        </div>
    </div>
</div>

{{-- Mode Tabs --}}
<div class="flex border-b border-gold/20 mb-6">
    <button id="tab-timestamp-to-date" class="px-4 py-3 text-sm font-semibold border-b-2 border-gold text-gold transition-colors cursor-pointer">
        {{ __($t . '.tab_timestamp_to_date') }}
    </button>
    <button id="tab-date-to-timestamp" class="px-4 py-3 text-sm font-semibold border-b-2 border-transparent text-light-muted hover:text-light transition-colors cursor-pointer">
        {{ __($t . '.tab_date_to_timestamp') }}
    </button>
</div>

{{-- Timestamp to Date Mode --}}
<div id="mode-timestamp-to-date">
    <div class="mb-6">
        <label for="timestamp-input" class="text-light font-semibold mb-3 block">{{ __($t . '.unix_timestamp_label') }}</label>
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1">
                <input type="text" id="timestamp-input" placeholder="{{ __($t . '.timestamp_placeholder') }}"
                       class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light font-mono focus:border-gold focus:outline-none placeholder-light-muted/50">
                <p class="text-light-muted text-xs mt-2">{{ __($t . '.supports_seconds_ms') }}</p>
            </div>
            <div class="flex gap-2">
                <select id="timezone-select" class="bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-3 text-sm focus:border-gold focus:outline-none cursor-pointer">
                    <option value="UTC">UTC</option>
                    <option value="local">Local (Browser)</option>
                    <option value="America/New_York">America/New_York (EST/EDT)</option>
                    <option value="America/Los_Angeles">America/Los_Angeles (PST/PDT)</option>
                    <option value="Europe/London">Europe/London (GMT/BST)</option>
                    <option value="Europe/Paris">Europe/Paris (CET/CEST)</option>
                    <option value="Europe/Rome">Europe/Rome (CET/CEST)</option>
                    <option value="Asia/Tokyo">Asia/Tokyo (JST)</option>
                    <option value="Asia/Shanghai">Asia/Shanghai (CST)</option>
                    <option value="Asia/Dubai">Asia/Dubai (GST)</option>
                    <option value="Australia/Sydney">Australia/Sydney (AEST/AEDT)</option>
                </select>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap gap-3 mb-6">
        <button id="btn-convert-timestamp" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
            {{ __($t . '.convert') }}
        </button>
        <button id="btn-use-current-ts" class="px-4 py-3 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 cursor-pointer">
            {{ __($t . '.use_current_time') }}
        </button>
        <button id="btn-clear-ts" class="px-4 py-3 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 cursor-pointer">
            {{ __($t . '.clear') }}
        </button>
    </div>

    {{-- Results --}}
    <div id="ts-results" class="hidden">
        <label class="text-light font-semibold mb-3 block">{{ __($t . '.converted_date') }}</label>
        <div class="bg-darkBg border border-gold/20 rounded-lg overflow-hidden">
            <div class="divide-y divide-gold/10">
                <div class="flex items-center justify-between p-3 hover:bg-gold/5 transition-colors">
                    <div>
                        <span class="text-light-muted text-xs block mb-1">{{ __($t . '.iso_8601') }}</span>
                        <code id="result-iso8601" class="text-light font-mono text-sm">-</code>
                    </div>
                    <button class="copy-result-btn p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" data-target="result-iso8601" title="Copy">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </button>
                </div>
                <div class="flex items-center justify-between p-3 hover:bg-gold/5 transition-colors">
                    <div>
                        <span class="text-light-muted text-xs block mb-1">{{ __($t . '.rfc_2822') }}</span>
                        <code id="result-rfc2822" class="text-light font-mono text-sm">-</code>
                    </div>
                    <button class="copy-result-btn p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" data-target="result-rfc2822" title="Copy">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </button>
                </div>
                <div class="flex items-center justify-between p-3 hover:bg-gold/5 transition-colors">
                    <div>
                        <span class="text-light-muted text-xs block mb-1">{{ __($t . '.local_format') }}</span>
                        <code id="result-local" class="text-light font-mono text-sm">-</code>
                    </div>
                    <button class="copy-result-btn p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" data-target="result-local" title="Copy">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </button>
                </div>
                <div class="flex items-center justify-between p-3 hover:bg-gold/5 transition-colors">
                    <div>
                        <span class="text-light-muted text-xs block mb-1">{{ __($t . '.utc') }}</span>
                        <code id="result-utc" class="text-light font-mono text-sm">-</code>
                    </div>
                    <button class="copy-result-btn p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" data-target="result-utc" title="Copy">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </button>
                </div>
                <div class="flex items-center justify-between p-3 hover:bg-gold/5 transition-colors">
                    <div>
                        <span class="text-light-muted text-xs block mb-1">{{ __($t . '.relative_time') }}</span>
                        <code id="result-relative" class="text-light font-mono text-sm">-</code>
                    </div>
                    <button class="copy-result-btn p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" data-target="result-relative" title="Copy">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button id="btn-copy-all-ts" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                {{ __($t . '.copy_all_formats') }}
            </button>
        </div>
    </div>
</div>

{{-- Date to Timestamp Mode --}}
<div id="mode-date-to-timestamp" class="hidden">
    <div class="mb-6">
        <label class="text-light font-semibold mb-3 block">{{ __($t . '.date_and_time') }}</label>
        <div class="grid sm:grid-cols-3 gap-3">
            <div>
                <label class="text-light-muted text-xs mb-1 block">{{ __($t . '.date_label') }}</label>
                <input type="date" id="date-input"
                       class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light focus:border-gold focus:outline-none cursor-pointer">
            </div>
            <div>
                <label class="text-light-muted text-xs mb-1 block">{{ __($t . '.time_label') }}</label>
                <input type="time" id="time-input" step="1" value="00:00:00"
                       class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light focus:border-gold focus:outline-none cursor-pointer">
            </div>
            <div>
                <label class="text-light-muted text-xs mb-1 block">{{ __($t . '.timezone_label') }}</label>
                <select id="timezone-select-date" class="w-full bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-3 text-sm focus:border-gold focus:outline-none cursor-pointer">
                    <option value="UTC">UTC</option>
                    <option value="local">Local (Browser)</option>
                    <option value="America/New_York">America/New_York (EST/EDT)</option>
                    <option value="America/Los_Angeles">America/Los_Angeles (PST/PDT)</option>
                    <option value="Europe/London">Europe/London (GMT/BST)</option>
                    <option value="Europe/Paris">Europe/Paris (CET/CEST)</option>
                    <option value="Europe/Rome">Europe/Rome (CET/CEST)</option>
                    <option value="Asia/Tokyo">Asia/Tokyo (JST)</option>
                    <option value="Asia/Shanghai">Asia/Shanghai (CST)</option>
                    <option value="Asia/Dubai">Asia/Dubai (GST)</option>
                    <option value="Australia/Sydney">Australia/Sydney (AEST/AEDT)</option>
                </select>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap gap-3 mb-6">
        <button id="btn-convert-date" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
            {{ __($t . '.convert') }}
        </button>
        <button id="btn-use-current-date" class="px-4 py-3 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 cursor-pointer">
            {{ __($t . '.use_current_time') }}
        </button>
        <button id="btn-clear-date" class="px-4 py-3 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 cursor-pointer">
            {{ __($t . '.clear') }}
        </button>
    </div>

    {{-- Results --}}
    <div id="date-results" class="hidden">
        <label class="text-light font-semibold mb-3 block">{{ __($t . '.unix_timestamp_result') }}</label>
        <div class="bg-darkBg border border-gold/20 rounded-lg overflow-hidden">
            <div class="divide-y divide-gold/10">
                <div class="flex items-center justify-between p-3 hover:bg-gold/5 transition-colors">
                    <div>
                        <span class="text-light-muted text-xs block mb-1">{{ __($t . '.seconds_10_digits') }}</span>
                        <code id="result-seconds" class="text-gold font-mono text-lg">-</code>
                    </div>
                    <button class="copy-result-btn p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" data-target="result-seconds" title="Copy">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </button>
                </div>
                <div class="flex items-center justify-between p-3 hover:bg-gold/5 transition-colors">
                    <div>
                        <span class="text-light-muted text-xs block mb-1">{{ __($t . '.milliseconds_13_digits') }}</span>
                        <code id="result-milliseconds" class="text-gold font-mono text-lg">-</code>
                    </div>
                    <button class="copy-result-btn p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" data-target="result-milliseconds" title="Copy">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
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

{{-- Quick Reference Section --}}
<div class="border-t border-gold/10 mt-6 pt-6">
    <h2 class="text-lg font-bold text-light mb-4">{{ __($t . '.quick_reference') }}</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gold/20">
                    <th class="text-left text-light-muted font-medium py-2 pr-4">{{ __($t . '.event') }}</th>
                    <th class="text-left text-light-muted font-medium py-2 pr-4">{{ __($t . '.unix_timestamp_col') }}</th>
                    <th class="text-left text-light-muted font-medium py-2">{{ __($t . '.date_utc') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gold/10">
                <tr class="hover:bg-gold/5 transition-colors">
                    <td class="py-3 pr-4 text-light">{{ __($t . '.unix_epoch') }}</td>
                    <td class="py-3 pr-4"><code class="text-gold font-mono cursor-pointer hover:text-gold-light quick-ref-ts" data-ts="0">0</code></td>
                    <td class="py-3 text-light-muted">Jan 1, 1970 00:00:00</td>
                </tr>
                <tr class="hover:bg-gold/5 transition-colors">
                    <td class="py-3 pr-4 text-light">{{ __($t . '.year_2000') }}</td>
                    <td class="py-3 pr-4"><code class="text-gold font-mono cursor-pointer hover:text-gold-light quick-ref-ts" data-ts="946684800">946684800</code></td>
                    <td class="py-3 text-light-muted">Jan 1, 2000 00:00:00</td>
                </tr>
                <tr class="hover:bg-gold/5 transition-colors">
                    <td class="py-3 pr-4 text-light">{{ __($t . '.one_billion_seconds') }}</td>
                    <td class="py-3 pr-4"><code class="text-gold font-mono cursor-pointer hover:text-gold-light quick-ref-ts" data-ts="1000000000">1000000000</code></td>
                    <td class="py-3 text-light-muted">Sep 9, 2001 01:46:40</td>
                </tr>
                <tr class="hover:bg-gold/5 transition-colors">
                    <td class="py-3 pr-4 text-light">{{ __($t . '.year_2038_problem') }}</td>
                    <td class="py-3 pr-4"><code class="text-gold font-mono cursor-pointer hover:text-gold-light quick-ref-ts" data-ts="2147483647">2147483647</code></td>
                    <td class="py-3 text-light-muted">Jan 19, 2038 03:14:07</td>
                </tr>
                <tr class="hover:bg-gold/5 transition-colors">
                    <td class="py-3 pr-4 text-light">{{ __($t . '.current_time_row') }}</td>
                    <td class="py-3 pr-4"><code id="quick-current-ts" class="text-gold font-mono cursor-pointer hover:text-gold-light">-</code></td>
                    <td class="py-3 text-light-muted" id="quick-current-date">-</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
