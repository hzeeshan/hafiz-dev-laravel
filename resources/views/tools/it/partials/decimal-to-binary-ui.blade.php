{{-- Direction Label --}}
<div class="text-center mb-4">
    <span id="direction-label" class="inline-flex items-center gap-2 px-4 py-1.5 bg-gold/10 border border-gold/30 rounded-full text-gold text-sm font-semibold">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
        {{ __($t . '.dec_to_bin') }}
    </span>
</div>

{{-- Input / Output --}}
<div class="grid lg:grid-cols-2 gap-4 mb-6">
    <div class="flex flex-col">
        <label for="input-value" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            <span id="input-label">{{ __($t . '.decimal_input') }}</span>
        </label>
        <textarea
            id="input-value"
            class="flex-1 min-h-[180px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
            placeholder="{{ __($t . '.decimal_placeholder') }}"
            spellcheck="false"
        ></textarea>
    </div>
    <div class="flex flex-col">
        <label class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            <span id="output-label">{{ __($t . '.binary_output') }}</span>
        </label>
        <textarea
            id="output-value"
            class="flex-1 min-h-[180px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
            placeholder="{{ __($t . '.binary_placeholder') }}"
            readonly
        ></textarea>
    </div>
</div>

{{-- Bit Length Option --}}
<div class="mb-6 p-3 bg-darkBg rounded-lg border border-gold/10 flex flex-wrap items-center gap-4">
    <label class="text-light text-sm font-semibold">{{ __($t . '.pad_to') }}</label>
    <select id="bit-length" class="bg-darkCard border border-gold/20 rounded-lg px-3 py-1.5 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
        <option value="0">{{ __($t . '.no_padding') }}</option>
        <option value="4">{{ __($t . '.bit_4') }}</option>
        <option value="8" selected>{{ __($t . '.bit_8') }}</option>
        <option value="16">{{ __($t . '.bit_16') }}</option>
        <option value="32">{{ __($t . '.bit_32') }}</option>
    </select>
    <label class="flex items-center gap-2 cursor-pointer">
        <input type="checkbox" id="group-bits" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer" checked>
        <span class="text-sm text-light-muted">{{ __($t . '.group_nibbles') }}</span>
    </label>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-swap" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
        {{ __($t . '.swap_direction') }}
    </button>
    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy') }}
    </button>
    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.sample') }}
    </button>
    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.clear') }}
    </button>
</div>

{{-- Step-by-Step Breakdown --}}
<div id="breakdown" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
        {{ __($t . '.step_by_step') }}
    </h3>
    <div class="overflow-x-auto border border-gold/10 rounded-lg">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-darkCard border-b border-gold/10">
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">{{ __($t . '.step') }}</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">{{ __($t . '.division') }}</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">{{ __($t . '.quotient') }}</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">{{ __($t . '.remainder_col') }}</th>
                </tr>
            </thead>
            <tbody id="breakdown-body" class="divide-y divide-gold/5"></tbody>
        </table>
    </div>
    <div id="breakdown-result" class="mt-3 text-sm text-light-muted"></div>
</div>

{{-- Quick Reference --}}
<div class="bg-darkBg rounded-lg p-4 border border-gold/10">
    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
        {{ __($t . '.reference_table') }}
    </h3>
    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-2">
        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">1</span><br><span class="text-light-muted text-xs font-mono">= 1</span></div>
        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">8</span><br><span class="text-light-muted text-xs font-mono">= 1000</span></div>
        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">10</span><br><span class="text-light-muted text-xs font-mono">= 1010</span></div>
        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">16</span><br><span class="text-light-muted text-xs font-mono">= 10000</span></div>
        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">42</span><br><span class="text-light-muted text-xs font-mono">= 101010</span></div>
        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">64</span><br><span class="text-light-muted text-xs font-mono">= 1000000</span></div>
        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">100</span><br><span class="text-light-muted text-xs font-mono">= 1100100</span></div>
        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">127</span><br><span class="text-light-muted text-xs font-mono">= 1111111</span></div>
        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">128</span><br><span class="text-light-muted text-xs font-mono">= 10000000</span></div>
        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">255</span><br><span class="text-light-muted text-xs font-mono">= 11111111</span></div>
        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">256</span><br><span class="text-light-muted text-xs font-mono">= 100000000</span></div>
        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">1024</span><br><span class="text-light-muted text-xs font-mono">= 10000000000</span></div>
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
        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span id="error-message" class="text-red-400 text-sm"></span>
    </div>
</div>
