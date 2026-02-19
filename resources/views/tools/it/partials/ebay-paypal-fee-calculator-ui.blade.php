{{-- Options Panel --}}
<div class="bg-darkBg rounded-lg border border-gold/10 p-4 mb-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        {{-- eBay Category --}}
        <div>
            <label for="opt-category" class="block text-sm text-light-muted mb-1">{{ __($t . '.ebay_category') }}</label>
            <select id="opt-category" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                <option value="most">{{ __($t . '.cat_most') }}</option>
                <option value="books">{{ __($t . '.cat_books') }}</option>
                <option value="clothing">{{ __($t . '.cat_clothing') }}</option>
                <option value="electronics">{{ __($t . '.cat_electronics') }}</option>
                <option value="collectibles">{{ __($t . '.cat_collectibles') }}</option>
                <option value="home">{{ __($t . '.cat_home') }}</option>
                <option value="sporting">{{ __($t . '.cat_sporting') }}</option>
                <option value="toys">{{ __($t . '.cat_toys') }}</option>
                <option value="business">{{ __($t . '.cat_business') }}</option>
                <option value="guitars">{{ __($t . '.cat_guitars') }}</option>
                <option value="watches">{{ __($t . '.cat_watches') }}</option>
                <option value="sneakers">{{ __($t . '.cat_sneakers') }}</option>
                <option value="jewelry_fine">{{ __($t . '.cat_jewelry') }}</option>
                <option value="custom">{{ __($t . '.cat_custom') }}</option>
            </select>
        </div>

        {{-- Payment Processor --}}
        <div>
            <label for="opt-processor" class="block text-sm text-light-muted mb-1">{{ __($t . '.payment_processor') }}</label>
            <select id="opt-processor" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                <option value="managed">{{ __($t . '.proc_managed') }}</option>
                <option value="paypal_standard">{{ __($t . '.proc_paypal_standard') }}</option>
                <option value="paypal_micropayment">{{ __($t . '.proc_paypal_micro') }}</option>
                <option value="none">{{ __($t . '.proc_none') }}</option>
            </select>
        </div>

        {{-- eBay Store --}}
        <div>
            <label for="opt-store" class="block text-sm text-light-muted mb-1">{{ __($t . '.ebay_store') }}</label>
            <select id="opt-store" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                <option value="none">{{ __($t . '.store_none') }}</option>
                <option value="starter">{{ __($t . '.store_starter') }}</option>
                <option value="basic">{{ __($t . '.store_basic') }}</option>
                <option value="premium">{{ __($t . '.store_premium') }}</option>
                <option value="anchor">{{ __($t . '.store_anchor') }}</option>
                <option value="enterprise">{{ __($t . '.store_enterprise') }}</option>
            </select>
        </div>

        {{-- Currency Symbol --}}
        <div>
            <label for="opt-currency" class="block text-sm text-light-muted mb-1">{{ __($t . '.display_currency') }}</label>
            <select id="opt-currency" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                <option value="$">$ (USD)</option>
                <option value="£">£ (GBP)</option>
                <option value="€">€ (EUR)</option>
                <option value="CA$">CA$ (CAD)</option>
                <option value="A$">A$ (AUD)</option>
            </select>
        </div>
    </div>

    {{-- Custom Rate Input (hidden by default) --}}
    <div id="custom-rate-panel" class="hidden mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label for="custom-percent" class="block text-sm text-light-muted mb-1">{{ __($t . '.ebay_fvf_percent') }}</label>
            <input type="number" id="custom-percent" step="0.01" value="13.25" min="0" max="100"
                class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
        </div>
        <div>
            <label for="custom-fixed" class="block text-sm text-light-muted mb-1">{{ __($t . '.per_order_surcharge') }}</label>
            <input type="number" id="custom-fixed" step="0.01" value="0.30" min="0"
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
            {{ __($t . '.item_sale_price') }}
        </label>
        <div class="relative">
            <span id="currency-prefix-price" class="absolute left-4 top-1/2 -translate-y-1/2 text-gold font-semibold">$</span>
            <input type="number" id="input-item-price" step="0.01" min="0" placeholder="50.00"
                class="w-full bg-darkBg border border-gold/20 rounded-lg pl-10 pr-4 py-3 text-light font-mono placeholder:text-light-muted/40 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors">
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
            <input type="number" id="input-shipping" step="0.01" min="0" placeholder="0.00"
                class="w-full bg-darkBg border border-gold/20 rounded-lg pl-10 pr-4 py-3 text-light font-mono placeholder:text-light-muted/40 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors">
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
            <input type="number" id="input-item-cost" step="0.01" min="0" placeholder="0.00"
                class="w-full bg-darkBg border border-gold/20 rounded-lg pl-10 pr-4 py-3 text-light font-mono placeholder:text-light-muted/40 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors">
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
                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">{{ __($t . '.total_fees') }}</div>
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
                <span class="text-light-muted">{{ __($t . '.ebay_fvf') }} (<span id="breakdown-ebay-rate">13.25%</span>)</span>
                <span class="text-light font-mono" id="breakdown-ebay-fee">$0.00</span>
            </div>
            <div class="flex justify-between">
                <span class="text-light-muted">{{ __($t . '.ebay_per_order') }}</span>
                <span class="text-light font-mono" id="breakdown-ebay-fixed">$0.30</span>
            </div>
            <div id="breakdown-paypal-row" class="hidden flex justify-between">
                <span class="text-light-muted">{{ __($t . '.paypal_fee') }} (<span id="breakdown-paypal-rate">2.99% + $0.49</span>)</span>
                <span class="text-light font-mono" id="breakdown-paypal-fee">$0.00</span>
            </div>
            <div class="border-t border-gold/10 pt-2 flex justify-between font-semibold">
                <span class="text-light">{{ __($t . '.total_fees_label') }}</span>
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
                        <th class="pb-2 pr-4">{{ __($t . '.th_sale_price') }}</th>
                        <th class="pb-2 pr-4">{{ __($t . '.th_total_fees') }}</th>
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
    <span>{{ __($t . '.stat_category') }}: <span id="stat-category" class="text-gold">-</span></span>
    <span>{{ __($t . '.stat_ebay_rate') }}: <span id="stat-ebay-rate" class="text-gold">-</span></span>
    <span>{{ __($t . '.stat_payment') }}: <span id="stat-payment" class="text-gold">-</span></span>
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
