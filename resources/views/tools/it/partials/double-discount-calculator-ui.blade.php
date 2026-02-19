{{-- Options Panel --}}
<div class="bg-darkBg rounded-lg border border-gold/10 p-4 mb-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        {{-- Currency Symbol --}}
        <div>
            <label for="opt-currency" class="block text-sm text-light-muted mb-1">{{ __($t . '.currency') }}</label>
            <select id="opt-currency" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                <option value="$">$ (USD)</option>
                <option value="€">€ (EUR)</option>
                <option value="£">£ (GBP)</option>
                <option value="CA$">CA$ (CAD)</option>
                <option value="A$">A$ (AUD)</option>
                <option value="¥">¥ (JPY)</option>
                <option value="₹">₹ (INR)</option>
                <option value="R$">R$ (BRL)</option>
            </select>
        </div>

        {{-- Decimal Places --}}
        <div>
            <label for="opt-decimals" class="block text-sm text-light-muted mb-1">{{ __($t . '.decimal_places') }}</label>
            <select id="opt-decimals" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                <option value="0">0</option>
                <option value="2" selected>2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>

        {{-- Sales Tax --}}
        <div>
            <label for="opt-tax" class="block text-sm text-light-muted mb-1">{{ __($t . '.sales_tax') }}</label>
            <input type="number" id="opt-tax" step="0.01" min="0" max="100" value="0" placeholder="0"
                class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
        </div>
    </div>
</div>

{{-- Input Section --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    {{-- Original Price --}}
    <div>
        <label for="input-price" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            {{ __($t . '.original_price') }}
        </label>
        <div class="relative">
            <span id="currency-prefix" class="absolute left-4 top-1/2 -translate-y-1/2 text-gold font-semibold">$</span>
            <input type="number" id="input-price" step="0.01" min="0" placeholder="100.00"
                class="w-full bg-darkBg border border-gold/20 rounded-lg pl-10 pr-4 py-3 text-light font-mono placeholder:text-light-muted/40 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors">
        </div>
    </div>

    {{-- First Discount --}}
    <div>
        <label for="input-discount1" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
            {{ __($t . '.first_discount') }}
        </label>
        <div class="relative">
            <input type="number" id="input-discount1" step="0.01" min="0" max="100" placeholder="20"
                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 pr-10 py-3 text-light font-mono placeholder:text-light-muted/40 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors">
            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gold font-semibold">%</span>
        </div>
    </div>

    {{-- Second Discount --}}
    <div>
        <label for="input-discount2" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
            {{ __($t . '.second_discount') }}
        </label>
        <div class="relative">
            <input type="number" id="input-discount2" step="0.01" min="0" max="100" placeholder="10"
                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 pr-10 py-3 text-light font-mono placeholder:text-light-muted/40 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors">
            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gold font-semibold">%</span>
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
        <svg id="copy-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        <span id="copy-text">{{ __($t . '.copy') }}</span>
    </button>
    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.download') }}
    </button>
    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.clear') }}
    </button>
</div>

{{-- Results Section (hidden initially) --}}
<div id="results-section" class="hidden">

    {{-- Primary Result --}}
    <div class="bg-darkBg border border-gold/10 rounded-lg p-6 mb-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center">
                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">{{ __($t . '.result_original_price') }}</div>
                <div class="text-3xl md:text-4xl font-bold text-light font-mono" id="result-original">$0.00</div>
            </div>
            <div class="text-center">
                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">{{ __($t . '.result_you_save') }}</div>
                <div class="text-3xl md:text-4xl font-bold text-green-400 font-mono" id="result-savings">$0.00</div>
            </div>
            <div class="text-center">
                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider" id="result-final-label">{{ __($t . '.result_final_price') }}</div>
                <div class="text-3xl md:text-4xl font-bold text-gold font-mono" id="result-final">$0.00</div>
            </div>
        </div>
    </div>

    {{-- Step-by-Step Breakdown --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 mb-4">
        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">{{ __($t . '.step_by_step') }}</div>
        <div class="space-y-2 text-sm">
            <div class="flex justify-between">
                <span class="text-light-muted">{{ __($t . '.breakdown_original') }}</span>
                <span class="text-light font-mono" id="breakdown-original">$0.00</span>
            </div>
            <div class="flex justify-between">
                <span class="text-light-muted">{{ __($t . '.breakdown_first_discount') }} (<span id="breakdown-d1-pct">0%</span>)</span>
                <span class="text-green-400 font-mono" id="breakdown-d1-amount">-$0.00</span>
            </div>
            <div class="flex justify-between">
                <span class="text-light-muted">{{ __($t . '.breakdown_after_first') }}</span>
                <span class="text-light font-mono" id="breakdown-after-d1">$0.00</span>
            </div>
            <div class="flex justify-between">
                <span class="text-light-muted">{{ __($t . '.breakdown_second_discount') }} (<span id="breakdown-d2-pct">0%</span>)</span>
                <span class="text-green-400 font-mono" id="breakdown-d2-amount">-$0.00</span>
            </div>
            <div class="border-t border-gold/10 pt-2 flex justify-between font-semibold">
                <span class="text-light">{{ __($t . '.breakdown_after_both') }}</span>
                <span class="text-gold font-mono" id="breakdown-after-d2">$0.00</span>
            </div>
            <div id="breakdown-tax-row" class="hidden flex justify-between">
                <span class="text-light-muted">{{ __($t . '.breakdown_sales_tax') }} (<span id="breakdown-tax-pct">0%</span>)</span>
                <span class="text-red-400 font-mono" id="breakdown-tax-amount">+$0.00</span>
            </div>
            <div id="breakdown-final-row" class="hidden border-t border-gold/10 pt-2 flex justify-between font-semibold">
                <span class="text-light">{{ __($t . '.breakdown_final_with_tax') }}</span>
                <span class="text-gold font-mono" id="breakdown-final-with-tax">$0.00</span>
            </div>
        </div>
    </div>

    {{-- Summary Stats --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">{{ __($t . '.discount_summary') }}</div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
            <div>
                <div class="text-2xl font-bold text-green-400 font-mono" id="summary-combined-pct">0%</div>
                <div class="text-xs text-light-muted mt-1">{{ __($t . '.combined_discount') }}</div>
            </div>
            <div>
                <div class="text-2xl font-bold text-green-400 font-mono" id="summary-total-saved">$0.00</div>
                <div class="text-xs text-light-muted mt-1">{{ __($t . '.total_saved') }}</div>
            </div>
            <div>
                <div class="text-2xl font-bold text-light font-mono" id="summary-naive-pct">0%</div>
                <div class="text-xs text-light-muted mt-1">{{ __($t . '.if_added_naive') }}</div>
            </div>
            <div>
                <div class="text-2xl font-bold text-red-400 font-mono" id="summary-difference">$0.00</div>
                <div class="text-xs text-light-muted mt-1">{{ __($t . '.stacking_penalty') }}</div>
            </div>
        </div>
    </div>
</div>

{{-- Stats Bar --}}
<div id="stats-bar" class="hidden mt-4 flex flex-wrap gap-4 text-xs text-light-muted">
    <span>{{ __($t . '.stat_combined') }}: <span id="stat-combined" class="text-gold">--</span></span>
    <span>{{ __($t . '.stat_currency') }}: <span id="stat-currency" class="text-gold">--</span></span>
    <span>{{ __($t . '.stat_tax') }}: <span id="stat-tax" class="text-gold">--</span></span>
</div>

{{-- Success Notification --}}
<div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span id="success-message" class="text-green-400 text-sm"></span>
    </div>
</div>

{{-- Error Notification --}}
<div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        <span id="error-message" class="text-red-400 text-sm"></span>
    </div>
</div>
