<x-layout>
    <x-slot:title>Venmo Fee Calculator - Free Online Payment Fee Calculator | hafiz.dev</x-slot:title>
    <x-slot:description>Free online Venmo fee calculator. Calculate Venmo fees for personal payments, business transactions, credit cards, and instant transfers. No signup required.</x-slot:description>
    <x-slot:keywords>venmo fee calculator, venmo fees, venmo business fees, venmo credit card fee, venmo instant transfer fee, calculate venmo fees online, free venmo fee calculator, venmo goods and services fee</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/venmo-fee-calculator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Venmo Fee Calculator - Free Online Payment Fee Calculator | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Calculate Venmo fees instantly for personal payments, business transactions, and instant transfers. Free online calculator.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/venmo-fee-calculator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Venmo Fee Calculator",
            "description": "Calculate Venmo payment fees for personal payments, business transactions, credit card sends, and instant transfers.",
            "url": "https://hafiz.dev/tools/venmo-fee-calculator",
            "applicationCategory": "UtilitiesApplication",
            "operatingSystem": "Any",
            "offers": { "@@type": "Offer", "price": "0", "priceCurrency": "USD" },
            "author": { "@@type": "Person", "name": "Hafiz Riaz", "url": "https://hafiz.dev" }
        }
        </script>
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "BreadcrumbList",
            "itemListElement": [
                { "@@type": "ListItem", "position": 1, "name": "Home", "item": "https://hafiz.dev" },
                { "@@type": "ListItem", "position": 2, "name": "Tools", "item": "https://hafiz.dev/tools" },
                { "@@type": "ListItem", "position": 3, "name": "Venmo Fee Calculator", "item": "https://hafiz.dev/tools/venmo-fee-calculator" }
            ]
        }
        </script>
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "FAQPage",
            "mainEntity": [
                {
                    "@@type": "Question",
                    "name": "What are Venmo's fees for sending money?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Sending money on Venmo is free when you use a bank account, debit card, or Venmo balance for personal payments. Credit card payments incur a 3% fee. Business payments (goods and services) are charged 1.9% + $0.10 to the seller."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How much does Venmo charge for instant transfer?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Venmo charges 1.75% for instant transfers to your bank account or eligible debit card, with a minimum fee of $0.25 and a maximum fee of $25.00. Standard bank transfers (1-3 business days) are free."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the Venmo goods and services fee?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "When you receive a payment tagged as goods and services on Venmo, the seller pays 1.9% + $0.10 per transaction. This fee applies to business profiles and purchase-protected payments. The buyer does not pay any fee."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is there a fee to receive money on Venmo?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Receiving personal payments on Venmo is free. However, if you receive a business payment (goods and services), a fee of 1.9% + $0.10 is deducted from the amount. This seller fee covers purchase protection for the buyer."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How does this Venmo fee calculator work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "This calculator runs entirely in your browser with no data sent to any server. Select a transaction type (personal, business, credit card, or instant transfer), enter an amount, and get instant fee calculations. It supports both forward calculation (fee from amount) and reverse calculation (amount needed to receive a specific sum)."
                    }
                }
            ]
        }
        </script>
    @endpush

    <div class="relative z-10 py-12 px-4">
        <div class="max-w-7xl mx-auto">
            {{-- Breadcrumb --}}
            <nav class="mb-6 text-sm" aria-label="Breadcrumb">
                <ol class="flex items-center gap-2 text-light-muted">
                    <li><a href="/" class="hover:text-gold transition-colors">Home</a></li>
                    <li><span class="text-gold/50">/</span></li>
                    <li><a href="/tools" class="hover:text-gold transition-colors">Tools</a></li>
                    <li><span class="text-gold/50">/</span></li>
                    <li class="text-gold">Venmo Fee Calculator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Venmo Fee Calculator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Calculate Venmo fees instantly for personal payments, business transactions, credit card sends, and instant transfers. See exactly how much you'll pay or receive.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options Panel --}}
                <div class="bg-darkBg rounded-lg border border-gold/10 p-4 mb-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        {{-- Transaction Type --}}
                        <div>
                            <label for="opt-transaction-type" class="block text-sm text-light-muted mb-1">Transaction Type</label>
                            <select id="opt-transaction-type" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                                <option value="personal_free">Personal - Bank/Debit/Balance (Free)</option>
                                <option value="personal_credit">Personal - Credit Card (3%)</option>
                                <option value="business">Business / Goods & Services (1.9% + $0.10)</option>
                                <option value="instant_transfer">Instant Transfer (1.75%, min $0.25, max $25)</option>
                            </select>
                        </div>

                        {{-- Calculation Mode --}}
                        <div>
                            <label for="opt-mode" class="block text-sm text-light-muted mb-1">Calculation Mode</label>
                            <select id="opt-mode" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                                <option value="fee_from_amount">Calculate fee from amount</option>
                                <option value="amount_to_receive">Amount needed to receive $X</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Input Section --}}
                <div class="mb-6">
                    <label for="input-amount" class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span id="input-label">Payment Amount</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gold font-semibold text-lg">$</span>
                        <input type="number" id="input-amount" step="0.01" min="0" placeholder="100.00"
                            class="w-full bg-darkBg border border-gold/20 rounded-lg pl-10 pr-4 py-4 text-light text-xl font-mono focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors">
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-calculate" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        Calculate Fees
                    </button>
                    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Sample
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg id="copy-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        <span id="copy-text">Copy</span>
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Download
                    </button>
                    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                </div>

                {{-- Results Section (hidden initially) --}}
                <div id="results-section" class="hidden">

                    {{-- Primary Result --}}
                    <div class="bg-darkBg border border-gold/10 rounded-lg p-6 mb-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="text-center">
                                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider" id="result-label-1">You Send</div>
                                <div class="text-3xl md:text-4xl font-bold text-gold font-mono" id="result-send">$0.00</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Venmo Fee</div>
                                <div class="text-3xl md:text-4xl font-bold text-red-400 font-mono" id="result-fee">-$0.00</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider" id="result-label-3">Recipient Gets</div>
                                <div class="text-3xl md:text-4xl font-bold text-green-400 font-mono" id="result-receive">$0.00</div>
                            </div>
                        </div>
                    </div>

                    {{-- Fee Breakdown --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 mb-4">
                        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Fee Breakdown</div>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-light-muted">Fee type</span>
                                <span class="text-light font-mono" id="breakdown-fee-type">Free</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-light-muted">Percentage fee (<span id="breakdown-percent">0%</span>)</span>
                                <span class="text-light font-mono" id="breakdown-percent-amount">$0.00</span>
                            </div>
                            <div id="breakdown-fixed-row" class="hidden flex justify-between">
                                <span class="text-light-muted">Fixed fee per transaction</span>
                                <span class="text-light font-mono" id="breakdown-fixed-amount">$0.10</span>
                            </div>
                            <div class="border-t border-gold/10 pt-2 flex justify-between font-semibold">
                                <span class="text-light">Total Venmo Fee</span>
                                <span class="text-red-400 font-mono" id="breakdown-total">$0.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-light-muted">Effective rate</span>
                                <span class="text-gold font-mono" id="breakdown-effective-rate">0.00%</span>
                            </div>
                        </div>
                    </div>

                    {{-- Quick Comparison Table --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Quick Comparison - Common Amounts</div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="text-left text-light-muted border-b border-gold/10">
                                        <th class="pb-2 pr-4">Amount</th>
                                        <th class="pb-2 pr-4">Venmo Fee</th>
                                        <th class="pb-2 pr-4">Recipient Gets</th>
                                        <th class="pb-2">Effective Rate</th>
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
                    <span>Type: <span id="stat-type" class="text-gold">-</span></span>
                    <span>Rate: <span id="stat-rate" class="text-gold">-</span></span>
                    <span>Mode: <span id="stat-mode" class="text-gold">-</span></span>
                </div>

                {{-- Success Notification --}}
                <div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm">Copied to clipboard!</span>
                    </div>
                </div>

                {{-- Error Notification --}}
                <div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        <span id="error-message" class="text-red-400 text-sm">Please enter a valid amount.</span>
                    </div>
                </div>
            </div>

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">💸</div>
                    <h3 class="text-lg font-semibold text-light mb-2">All Transaction Types</h3>
                    <p class="text-light-muted text-sm">Covers personal payments, business transactions, credit card sends, and instant transfers with accurate fee rates for each type.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔄</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Reverse Calculation</h3>
                    <p class="text-light-muted text-sm">Need to receive exactly $100? Calculate how much to request so you get the exact amount after Venmo takes its fees.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">Everything runs in your browser. No data is sent to any server. Your financial details stay completely private.</p>
                </div>
            </div>

            {{-- Dynamic CTA --}}
            <x-tool-cta />

            {{-- FAQ Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Frequently Asked Questions</h2>
                <div class="space-y-4 max-w-3xl mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is Venmo free to use for personal payments?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, sending and receiving personal payments on Venmo is free when you use a linked bank account, debit card, or your Venmo balance. The only fee for personal payments occurs when you use a credit card to send money, which costs 3% of the transaction amount.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How much does Venmo charge for business payments?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Venmo charges sellers 1.9% + $0.10 per transaction for business payments (goods and services). This fee is deducted from the payment amount before the seller receives it. The buyer does not pay any additional fee. This applies to business profiles and payments tagged as goods and services.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the Venmo instant transfer fee?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Venmo charges 1.75% for instant transfers to your bank account or eligible debit card. The minimum fee is $0.25 and the maximum is $25.00. If you can wait 1-3 business days, standard bank transfers are completely free.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I avoid Venmo fees?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, you can avoid most Venmo fees by using a bank account, debit card, or Venmo balance for personal payments (completely free). For transfers to your bank, choose the standard 1-3 business day option instead of instant transfer. The only unavoidable fee is the 1.9% + $0.10 seller fee on business/goods and services transactions.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How does Venmo compare to PayPal fees?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Venmo (owned by PayPal) generally has similar fee structures. Both charge for business/goods and services transactions, credit card payments, and instant transfers. Venmo's business rate of 1.9% + $0.10 is slightly lower than PayPal's standard rate of 2.99% + $0.49 for goods and services. Personal payments are free on both platforms when using a bank account or balance.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.venmo-fee-calculator-script')
    @endpush
</x-layout>
