{{-- Options Panel --}}
<div class="bg-darkBg rounded-lg border border-gold/10 p-4 mb-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        {{-- Country/Region --}}
        <div>
            <label for="opt-country" class="block text-sm text-light-muted mb-1">{{ __($t . '.country_region') }}</label>
            <select id="opt-country" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                <option value="us">{{ __($t . '.country_us') }}</option>
                <option value="uk">{{ __($t . '.country_uk') }}</option>
                <option value="ca">{{ __($t . '.country_ca') }}</option>
                <option value="au">{{ __($t . '.country_au') }}</option>
                <option value="eu">{{ __($t . '.country_eu') }}</option>
                <option value="in">{{ __($t . '.country_in') }}</option>
            </select>
        </div>

        {{-- Offsite Ads --}}
        <div>
            <label for="opt-offsite-ads" class="block text-sm text-light-muted mb-1">{{ __($t . '.offsite_ads_fee') }}</label>
            <select id="opt-offsite-ads" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                <option value="none">{{ __($t . '.no_offsite_ad') }}</option>
                <option value="15">{{ __($t . '.offsite_under_10k') }}</option>
                <option value="12">{{ __($t . '.offsite_over_10k') }}</option>
            </select>
        </div>

        {{-- Currency Symbol --}}
        <div>
            <label for="opt-currency" class="block text-sm text-light-muted mb-1">{{ __($t . '.display_currency') }}</label>
            <select id="opt-currency" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                <option value="$">$ (USD)</option>
                <option value="£">£ (GBP)</option>
                <option value="CA$">CA$ (CAD)</option>
                <option value="A$">A$ (AUD)</option>
                <option value="€">€ (EUR)</option>
                <option value="₹">₹ (INR)</option>
            </select>
        </div>

        {{-- Number of Items --}}
        <div>
            <label for="opt-quantity" class="block text-sm text-light-muted mb-1">{{ __($t . '.quantity_sold') }}</label>
            <input type="number" id="opt-quantity" value="1" min="1" max="999"
                class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
        </div>
    </div>
</div>

{{-- Input Section --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    {{-- Item Price --}}
    <div>
        <label for="input-item-price" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
            {{ __($t . '.item_price') }}
        </label>
        <div class="relative">
            <span id="currency-prefix-price" class="absolute left-4 top-1/2 -translate-y-1/2 text-gold font-semibold">$</span>
            <input type="number" id="input-item-price" step="0.01" min="0" placeholder="25.00"
                class="w-full bg-darkBg border border-gold/20 rounded-lg pl-10 pr-4 py-3 text-light font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors">
        </div>
    </div>

    {{-- Shipping Price --}}
    <div>
        <label for="input-shipping" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
            {{ __($t . '.shipping_price') }}
        </label>
        <div class="relative">
            <span id="currency-prefix-shipping" class="absolute left-4 top-1/2 -translate-y-1/2 text-gold font-semibold">$</span>
            <input type="number" id="input-shipping" step="0.01" min="0" placeholder="5.00" value="0"
                class="w-full bg-darkBg border border-gold/20 rounded-lg pl-10 pr-4 py-3 text-light font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors">
        </div>
    </div>

    {{-- Item Cost --}}
    <div>
        <label for="input-item-cost" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            {{ __($t . '.item_cost') }}
        </label>
        <div class="relative">
            <span id="currency-prefix-cost" class="absolute left-4 top-1/2 -translate-y-1/2 text-gold font-semibold">$</span>
            <input type="number" id="input-item-cost" step="0.01" min="0" placeholder="10.00" value="0"
                class="w-full bg-darkBg border border-gold/20 rounded-lg pl-10 pr-4 py-3 text-light font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors">
        </div>
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-calculate" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
        {{ __($t . '.calculate_fees') }}
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
                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">{{ __($t . '.total_revenue') }}</div>
                <div class="text-3xl md:text-4xl font-bold text-gold font-mono" id="result-revenue">$0.00</div>
            </div>
            <div class="text-center">
                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">{{ __($t . '.total_etsy_fees') }}</div>
                <div class="text-3xl md:text-4xl font-bold text-red-400 font-mono" id="result-total-fees">-$0.00</div>
            </div>
            <div class="text-center">
                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">{{ __($t . '.net_profit') }}</div>
                <div class="text-3xl md:text-4xl font-bold text-green-400 font-mono" id="result-profit">$0.00</div>
            </div>
        </div>
    </div>

    {{-- Fee Breakdown --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 mb-4">
        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">{{ __($t . '.fee_breakdown') }}</div>
        <div class="space-y-2 text-sm">
            <div class="flex justify-between">
                <span class="text-light-muted">{{ __($t . '.listing_fee') }} ({{ __($t . '.listing_fee_detail') }} <span id="breakdown-qty">1</span> {{ __($t . '.item_singular') }}<span id="breakdown-qty-plural"></span>)</span>
                <span class="text-light font-mono" id="breakdown-listing">$0.20</span>
            </div>
            <div class="flex justify-between">
                <span class="text-light-muted">{{ __($t . '.transaction_fee') }}</span>
                <span class="text-light font-mono" id="breakdown-transaction">$0.00</span>
            </div>
            <div class="flex justify-between">
                <span class="text-light-muted">{{ __($t . '.payment_processing_fee') }} (<span id="breakdown-processing-rate">3% + $0.25</span>)</span>
                <span class="text-light font-mono" id="breakdown-processing">$0.00</span>
            </div>
            <div id="breakdown-offsite-row" class="hidden flex justify-between">
                <span class="text-light-muted">{{ __($t . '.offsite_ads_fee_label') }} (<span id="breakdown-offsite-rate">15%</span>)</span>
                <span class="text-light font-mono" id="breakdown-offsite">$0.00</span>
            </div>
            <div class="border-t border-gold/10 pt-2 flex justify-between font-semibold">
                <span class="text-light">{{ __($t . '.total_etsy_fees_label') }}</span>
                <span class="text-red-400 font-mono" id="breakdown-total">$0.00</span>
            </div>
            <div id="breakdown-cost-row" class="hidden flex justify-between">
                <span class="text-light-muted">{{ __($t . '.item_cost_label') }}</span>
                <span class="text-light font-mono" id="breakdown-cost">$0.00</span>
            </div>
            <div class="flex justify-between">
                <span class="text-light-muted">{{ __($t . '.effective_fee_rate') }}</span>
                <span class="text-gold font-mono" id="breakdown-effective-rate">0.00%</span>
            </div>
            <div class="flex justify-between">
                <span class="text-light-muted">{{ __($t . '.profit_margin') }}</span>
                <span class="text-green-400 font-mono" id="breakdown-profit-margin">0.00%</span>
            </div>
        </div>
    </div>

    {{-- Quick Comparison Table --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">{{ __($t . '.quick_comparison') }}</div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-light-muted border-b border-gold/10">
                        <th class="pb-2 pr-4">{{ __($t . '.th_item_price') }}</th>
                        <th class="pb-2 pr-4">{{ __($t . '.th_etsy_fees') }}</th>
                        <th class="pb-2 pr-4">{{ __($t . '.th_you_keep') }}</th>
                        <th class="pb-2">{{ __($t . '.th_fee_rate') }}</th>
                    </tr>
                </thead>
                <tbody id="comparison-table-body" class="text-light font-mono">
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Stats Bar --}}
<div id="stats-bar" class="hidden mt-4 flex flex-wrap gap-4 text-xs text-light-muted">
    <span>{{ __($t . '.stat_region') }}: <span id="stat-region" class="text-gold">-</span></span>
    <span>{{ __($t . '.stat_processing') }}: <span id="stat-processing" class="text-gold">-</span></span>
    <span>{{ __($t . '.stat_offsite_ads') }}: <span id="stat-offsite" class="text-gold">-</span></span>
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
