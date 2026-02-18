{{-- Options Panel --}}
<div class="bg-darkBg rounded-lg border border-gold/10 p-4 mb-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        {{-- Country/Region --}}
        <div>
            <label for="opt-country" class="block text-sm text-light-muted mb-1">{{ __($t . '.country_region') }}</label>
            <select id="opt-country" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                <option value="us">{{ __($t . '.country_us') }}</option>
                <option value="eu">{{ __($t . '.country_eu') }}</option>
                <option value="au">{{ __($t . '.country_au') }}</option>
                <option value="ca">{{ __($t . '.country_ca') }}</option>
                <option value="sg">{{ __($t . '.country_sg') }}</option>
                <option value="jp">{{ __($t . '.country_jp') }}</option>
                <option value="br">{{ __($t . '.country_br') }}</option>
                <option value="my">{{ __($t . '.country_my') }}</option>
                <option value="in">{{ __($t . '.country_in') }}</option>
                <option value="custom">{{ __($t . '.country_custom') }}</option>
            </select>
        </div>

        {{-- Card Type --}}
        <div>
            <label for="opt-card-type" class="block text-sm text-light-muted mb-1">{{ __($t . '.card_type') }}</label>
            <select id="opt-card-type" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                <option value="domestic">{{ __($t . '.card_domestic') }}</option>
                <option value="international">{{ __($t . '.card_international') }}</option>
                <option value="international_conversion">{{ __($t . '.card_international_conversion') }}</option>
            </select>
        </div>

        {{-- Calculation Mode --}}
        <div>
            <label for="opt-mode" class="block text-sm text-light-muted mb-1">{{ __($t . '.calculation_mode') }}</label>
            <select id="opt-mode" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                <option value="fee_from_amount">{{ __($t . '.mode_fee_from_amount') }}</option>
                <option value="amount_to_receive">{{ __($t . '.mode_amount_to_receive') }}</option>
            </select>
        </div>

        {{-- Currency Symbol --}}
        <div>
            <label for="opt-currency" class="block text-sm text-light-muted mb-1">{{ __($t . '.display_currency') }}</label>
            <select id="opt-currency" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                <option value="$">$ (USD)</option>
                <option value="€">€ (EUR)</option>
                <option value="£">£ (GBP)</option>
                <option value="A$">A$ (AUD)</option>
                <option value="CA$">CA$ (CAD)</option>
                <option value="S$">S$ (SGD)</option>
                <option value="¥">¥ (JPY)</option>
                <option value="R$">R$ (BRL)</option>
                <option value="RM">RM (MYR)</option>
                <option value="₹">₹ (INR)</option>
            </select>
        </div>
    </div>

    {{-- Custom Rate Inputs (hidden by default) --}}
    <div id="custom-rate-panel" class="hidden mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label for="custom-percent" class="block text-sm text-light-muted mb-1">{{ __($t . '.percentage_fee') }}</label>
            <input type="number" id="custom-percent" step="0.01" value="2.9" min="0" max="100"
                class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
        </div>
        <div>
            <label for="custom-fixed" class="block text-sm text-light-muted mb-1">{{ __($t . '.fixed_fee') }}</label>
            <input type="number" id="custom-fixed" step="0.01" value="0.30" min="0"
                class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
        </div>
    </div>
</div>

{{-- Input Section --}}
<div class="mb-6">
    <label for="input-amount" class="text-light font-semibold mb-2 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span id="input-label">{{ __($t . '.charge_amount') }}</span>
    </label>
    <div class="relative">
        <span id="currency-prefix" class="absolute left-4 top-1/2 -translate-y-1/2 text-gold font-semibold text-lg">$</span>
        <input type="number" id="input-amount" step="0.01" min="0" placeholder="100.00"
            class="w-full bg-darkBg border border-gold/20 rounded-lg pl-10 pr-4 py-4 text-light text-xl font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors">
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
                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider" id="result-label-1">{{ __($t . '.you_charge') }}</div>
                <div class="text-3xl md:text-4xl font-bold text-gold font-mono" id="result-charge">$0.00</div>
            </div>
            <div class="text-center">
                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">{{ __($t . '.stripe_fee') }}</div>
                <div class="text-3xl md:text-4xl font-bold text-red-400 font-mono" id="result-fee">-$0.00</div>
            </div>
            <div class="text-center">
                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider" id="result-label-3">{{ __($t . '.you_receive') }}</div>
                <div class="text-3xl md:text-4xl font-bold text-green-400 font-mono" id="result-receive">$0.00</div>
            </div>
        </div>
    </div>

    {{-- Fee Breakdown --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 mb-4">
        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">{{ __($t . '.fee_breakdown') }}</div>
        <div class="space-y-2 text-sm">
            <div class="flex justify-between">
                <span class="text-light-muted">{{ __($t . '.base_percentage_fee') }} (<span id="breakdown-percent">2.9%</span>)</span>
                <span class="text-light font-mono" id="breakdown-percent-amount">$0.00</span>
            </div>
            <div class="flex justify-between">
                <span class="text-light-muted">{{ __($t . '.fixed_fee_per_transaction') }}</span>
                <span class="text-light font-mono" id="breakdown-fixed-amount">$0.30</span>
            </div>
            <div id="breakdown-intl-row" class="hidden flex justify-between">
                <span class="text-light-muted">{{ __($t . '.international_surcharge') }} (<span id="breakdown-intl-percent">1.5%</span>)</span>
                <span class="text-light font-mono" id="breakdown-intl-amount">$0.00</span>
            </div>
            <div class="border-t border-gold/10 pt-2 flex justify-between font-semibold">
                <span class="text-light">{{ __($t . '.total_stripe_fee') }}</span>
                <span class="text-red-400 font-mono" id="breakdown-total">$0.00</span>
            </div>
            <div class="flex justify-between">
                <span class="text-light-muted">{{ __($t . '.effective_rate') }}</span>
                <span class="text-gold font-mono" id="breakdown-effective-rate">0.00%</span>
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
                        <th class="pb-2 pr-4">{{ __($t . '.th_amount') }}</th>
                        <th class="pb-2 pr-4">{{ __($t . '.th_stripe_fee') }}</th>
                        <th class="pb-2 pr-4">{{ __($t . '.th_you_receive') }}</th>
                        <th class="pb-2">{{ __($t . '.th_effective_rate') }}</th>
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
    <span>{{ __($t . '.stat_rate') }}: <span id="stat-rate" class="text-gold">—</span></span>
    <span>{{ __($t . '.stat_card') }}: <span id="stat-card" class="text-gold">—</span></span>
    <span>{{ __($t . '.stat_region') }}: <span id="stat-region" class="text-gold">—</span></span>
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
