<x-layout>
    <x-slot:title>Stripe Fee Calculator - Free Online Payment Fee Calculator | hafiz.dev</x-slot:title>
    <x-slot:description>Free online Stripe fee calculator. Calculate Stripe processing fees, determine how much to charge to receive a specific amount, and compare fees across countries. No signup required.</x-slot:description>
    <x-slot:keywords>stripe fee calculator, stripe fees, stripe processing fees, stripe calculator, calculate stripe fees online, free stripe fee calculator, payment processing calculator, stripe percentage fee</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/stripe-fee-calculator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Stripe Fee Calculator - Free Online Payment Fee Calculator | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Calculate Stripe processing fees instantly. Find out how much to charge to receive a specific amount after fees. Free online calculator.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/stripe-fee-calculator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Stripe Fee Calculator",
            "description": "Calculate Stripe payment processing fees, determine how much to charge to receive a specific amount, and compare fee structures across countries.",
            "url": "https://hafiz.dev/tools/stripe-fee-calculator",
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
                { "@@type": "ListItem", "position": 3, "name": "Stripe Fee Calculator", "item": "https://hafiz.dev/tools/stripe-fee-calculator" }
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
                    "name": "What are Stripe's standard processing fees?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Stripe's standard processing fees for US domestic cards are 2.9% + $0.30 per transaction. International cards incur an additional 1.5% fee, and currency conversion adds another 1%. Fees vary by country — for example, EU/UK rates are 1.5% + €0.25 for domestic cards."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I calculate how much to charge to receive a specific amount after Stripe fees?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "To receive a specific amount after Stripe fees, use the reverse calculation formula: Charge Amount = (Desired Amount + Fixed Fee) / (1 - Percentage Fee). For example, to receive $100 with US domestic rates (2.9% + $0.30), you would charge $100.30 / 0.971 = $103.33."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does Stripe charge differently for international cards?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes. Stripe adds 1.5% on top of the base rate for international cards (cards issued outside your country). If currency conversion is also required, Stripe adds an additional 1% fee. So a US merchant processing an international card with conversion would pay 2.9% + 1.5% + 1% + $0.30 = 5.4% + $0.30."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Are Stripe fees tax-deductible?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, Stripe processing fees are generally tax-deductible as a business expense. They fall under payment processing or merchant service fees. Consult your accountant for specific advice related to your business and jurisdiction."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How does this calculator work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "This calculator runs entirely in your browser with no server requests. Enter an amount, select your country and card type, choose the calculation mode (fee from amount or amount needed to receive), and get instant results. All Stripe fee rates are based on publicly available Stripe pricing."
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
                    <li class="text-gold">Stripe Fee Calculator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Stripe Fee Calculator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Calculate Stripe processing fees instantly. Find out how much you'll pay in fees or how much to charge to receive a specific amount after Stripe deductions.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options Panel --}}
                <div class="bg-darkBg rounded-lg border border-gold/10 p-4 mb-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        {{-- Country/Region --}}
                        <div>
                            <label for="opt-country" class="block text-sm text-light-muted mb-1">Country/Region</label>
                            <select id="opt-country" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                                <option value="us">United States (2.9% + $0.30)</option>
                                <option value="eu">Europe / UK (1.5% + €0.25)</option>
                                <option value="au">Australia (1.75% + A$0.30)</option>
                                <option value="ca">Canada (2.9% + CA$0.30)</option>
                                <option value="sg">Singapore (3.4% + S$0.50)</option>
                                <option value="jp">Japan (3.6% + ¥40)</option>
                                <option value="br">Brazil (3.99% + R$0.39)</option>
                                <option value="my">Malaysia (3.0% + RM1.00)</option>
                                <option value="in">India (2.0% + ₹2.00)</option>
                                <option value="custom">Custom Rate</option>
                            </select>
                        </div>

                        {{-- Card Type --}}
                        <div>
                            <label for="opt-card-type" class="block text-sm text-light-muted mb-1">Card Type</label>
                            <select id="opt-card-type" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                                <option value="domestic">Domestic Card</option>
                                <option value="international">International Card (+1.5%)</option>
                                <option value="international_conversion">International + Currency Conversion (+2.5%)</option>
                            </select>
                        </div>

                        {{-- Calculation Mode --}}
                        <div>
                            <label for="opt-mode" class="block text-sm text-light-muted mb-1">Calculation Mode</label>
                            <select id="opt-mode" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                                <option value="fee_from_amount">Calculate fee from charge amount</option>
                                <option value="amount_to_receive">Amount needed to receive $X</option>
                            </select>
                        </div>

                        {{-- Currency Symbol --}}
                        <div>
                            <label for="opt-currency" class="block text-sm text-light-muted mb-1">Display Currency</label>
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
                            <label for="custom-percent" class="block text-sm text-light-muted mb-1">Percentage Fee (%)</label>
                            <input type="number" id="custom-percent" step="0.01" value="2.9" min="0" max="100"
                                class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                        </div>
                        <div>
                            <label for="custom-fixed" class="block text-sm text-light-muted mb-1">Fixed Fee (per transaction)</label>
                            <input type="number" id="custom-fixed" step="0.01" value="0.30" min="0"
                                class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                        </div>
                    </div>
                </div>

                {{-- Input Section --}}
                <div class="mb-6">
                    <label for="input-amount" class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span id="input-label">Charge Amount</span>
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
                                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider" id="result-label-1">You Charge</div>
                                <div class="text-3xl md:text-4xl font-bold text-gold font-mono" id="result-charge">$0.00</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Stripe Fee</div>
                                <div class="text-3xl md:text-4xl font-bold text-red-400 font-mono" id="result-fee">-$0.00</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider" id="result-label-3">You Receive</div>
                                <div class="text-3xl md:text-4xl font-bold text-green-400 font-mono" id="result-receive">$0.00</div>
                            </div>
                        </div>
                    </div>

                    {{-- Fee Breakdown --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 mb-4">
                        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Fee Breakdown</div>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-light-muted">Base percentage fee (<span id="breakdown-percent">2.9%</span>)</span>
                                <span class="text-light font-mono" id="breakdown-percent-amount">$0.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-light-muted">Fixed fee per transaction</span>
                                <span class="text-light font-mono" id="breakdown-fixed-amount">$0.30</span>
                            </div>
                            <div id="breakdown-intl-row" class="hidden flex justify-between">
                                <span class="text-light-muted">International card surcharge (<span id="breakdown-intl-percent">1.5%</span>)</span>
                                <span class="text-light font-mono" id="breakdown-intl-amount">$0.00</span>
                            </div>
                            <div class="border-t border-gold/10 pt-2 flex justify-between font-semibold">
                                <span class="text-light">Total Stripe Fee</span>
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
                        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Quick Comparison — Common Amounts</div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="text-left text-light-muted border-b border-gold/10">
                                        <th class="pb-2 pr-4">Amount</th>
                                        <th class="pb-2 pr-4">Stripe Fee</th>
                                        <th class="pb-2 pr-4">You Receive</th>
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
                    <span>Rate: <span id="stat-rate" class="text-gold">—</span></span>
                    <span>Card: <span id="stat-card" class="text-gold">—</span></span>
                    <span>Region: <span id="stat-region" class="text-gold">—</span></span>
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
                    <div class="text-gold text-2xl mb-3">🌍</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Multi-Region Support</h3>
                    <p class="text-light-muted text-sm">Supports Stripe fee structures for the US, EU/UK, Australia, Canada, Singapore, Japan, Brazil, Malaysia, India, and custom rates.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔄</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Reverse Calculation</h3>
                    <p class="text-light-muted text-sm">Need to receive exactly $100? Calculate how much to charge so you get the exact amount after Stripe takes its cut.</p>
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
                            <span class="text-light font-medium">What are Stripe's standard processing fees?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Stripe's standard processing fees vary by country. In the United States, the rate is 2.9% + $0.30 per successful card charge. In Europe and the UK, it's 1.5% + €0.25 for domestic cards. Australia charges 1.75% + A$0.30, and Canada is 2.9% + CA$0.30. International cards add 1.5% on top of the base rate, and currency conversion adds another 1%.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I pass Stripe fees to the customer?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Use the "Amount needed to receive $X" mode in this calculator. Enter the amount you want to receive, and it will tell you exactly how much to charge. For example, to receive $100 after US domestic fees, charge $103.33. Note: some jurisdictions may restrict surcharging credit card fees to customers, so check local regulations.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does Stripe charge differently for international cards?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes. Stripe adds a 1.5% surcharge for international cards — cards issued outside your Stripe account's country. If currency conversion is also needed (e.g., a EUR card paying a USD merchant), an additional 1% is added. So total international + conversion surcharge is 2.5% on top of the base rate.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Are Stripe fees tax-deductible?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, Stripe processing fees are generally tax-deductible as a business expense in most jurisdictions. They fall under payment processing or merchant service fees. Keep your Stripe dashboard or invoices as records. Always consult a tax professional for advice specific to your situation.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does Stripe offer volume discounts?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, Stripe offers custom pricing for businesses processing large volumes (typically $100K+/month). Contact Stripe sales for a custom quote. They may offer reduced percentage rates, lower fixed fees, or both. You can use the "Custom Rate" option in this calculator to model your negotiated rates.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        'use strict';

        // DOM elements
        const countrySelect = document.getElementById('opt-country');
        const cardTypeSelect = document.getElementById('opt-card-type');
        const modeSelect = document.getElementById('opt-mode');
        const currencySelect = document.getElementById('opt-currency');
        const customRatePanel = document.getElementById('custom-rate-panel');
        const customPercent = document.getElementById('custom-percent');
        const customFixed = document.getElementById('custom-fixed');
        const inputAmount = document.getElementById('input-amount');
        const inputLabel = document.getElementById('input-label');
        const currencyPrefix = document.getElementById('currency-prefix');
        const btnCalculate = document.getElementById('btn-calculate');
        const btnSample = document.getElementById('btn-sample');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const btnClear = document.getElementById('btn-clear');
        const copyText = document.getElementById('copy-text');
        const copyIcon = document.getElementById('copy-icon');
        const resultsSection = document.getElementById('results-section');
        const statsBar = document.getElementById('stats-bar');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        // Fee rates by country: [percentFee, fixedFee, currencySymbol]
        const RATES = {
            us:  { percent: 2.9, fixed: 0.30, currency: '$',   name: 'United States' },
            eu:  { percent: 1.5, fixed: 0.25, currency: '€',   name: 'Europe / UK' },
            au:  { percent: 1.75, fixed: 0.30, currency: 'A$',  name: 'Australia' },
            ca:  { percent: 2.9, fixed: 0.30, currency: 'CA$', name: 'Canada' },
            sg:  { percent: 3.4, fixed: 0.50, currency: 'S$',  name: 'Singapore' },
            jp:  { percent: 3.6, fixed: 40,   currency: '¥',   name: 'Japan' },
            br:  { percent: 3.99, fixed: 0.39, currency: 'R$',  name: 'Brazil' },
            my:  { percent: 3.0, fixed: 1.00, currency: 'RM',  name: 'Malaysia' },
            in:  { percent: 2.0, fixed: 2.00, currency: '₹',   name: 'India' },
        };

        const INTL_SURCHARGE = 1.5;
        const CONVERSION_SURCHARGE = 1.0;

        function getRate() {
            const country = countrySelect.value;
            if (country === 'custom') {
                return {
                    percent: parseFloat(customPercent.value) || 0,
                    fixed: parseFloat(customFixed.value) || 0,
                    currency: currencySelect.value,
                    name: 'Custom'
                };
            }
            return RATES[country];
        }

        function getIntlSurcharge() {
            const cardType = cardTypeSelect.value;
            if (cardType === 'international') return INTL_SURCHARGE;
            if (cardType === 'international_conversion') return INTL_SURCHARGE + CONVERSION_SURCHARGE;
            return 0;
        }

        function getCurrencySymbol() {
            return currencySelect.value;
        }

        function formatMoney(amount, symbol) {
            const decimals = symbol === '¥' ? 0 : 2;
            return symbol + amount.toFixed(decimals);
        }

        function showSuccess(msg) {
            successMessage.textContent = msg;
            successNotification.classList.remove('hidden');
            errorNotification.classList.add('hidden');
            setTimeout(() => successNotification.classList.add('hidden'), 3000);
        }

        function showError(msg) {
            errorMessage.textContent = msg;
            errorNotification.classList.remove('hidden');
            successNotification.classList.add('hidden');
            setTimeout(() => errorNotification.classList.add('hidden'), 5000);
        }

        function calculate() {
            const amount = parseFloat(inputAmount.value);
            if (!amount || amount <= 0) {
                showError('Please enter a valid amount greater than 0.');
                return;
            }

            const rate = getRate();
            const intlSurcharge = getIntlSurcharge();
            const totalPercent = rate.percent + intlSurcharge;
            const fixedFee = rate.fixed;
            const sym = getCurrencySymbol();
            const mode = modeSelect.value;

            let chargeAmount, fee, receiveAmount, percentFeeAmount, intlFeeAmount;

            if (mode === 'fee_from_amount') {
                // Given charge amount, calculate fee
                chargeAmount = amount;
                percentFeeAmount = chargeAmount * (rate.percent / 100);
                intlFeeAmount = chargeAmount * (intlSurcharge / 100);
                fee = percentFeeAmount + intlFeeAmount + fixedFee;
                receiveAmount = chargeAmount - fee;
            } else {
                // Given desired receive amount, calculate charge amount
                receiveAmount = amount;
                chargeAmount = (receiveAmount + fixedFee) / (1 - totalPercent / 100);
                percentFeeAmount = chargeAmount * (rate.percent / 100);
                intlFeeAmount = chargeAmount * (intlSurcharge / 100);
                fee = chargeAmount - receiveAmount;
            }

            // Update results
            document.getElementById('result-charge').textContent = formatMoney(chargeAmount, sym);
            document.getElementById('result-fee').textContent = '-' + formatMoney(fee, sym);
            document.getElementById('result-receive').textContent = formatMoney(receiveAmount, sym);

            // Update labels based on mode
            if (mode === 'fee_from_amount') {
                document.getElementById('result-label-1').textContent = 'You Charge';
                document.getElementById('result-label-3').textContent = 'You Receive';
            } else {
                document.getElementById('result-label-1').textContent = 'Charge This';
                document.getElementById('result-label-3').textContent = 'You Receive';
            }

            // Fee breakdown
            document.getElementById('breakdown-percent').textContent = rate.percent + '%';
            document.getElementById('breakdown-percent-amount').textContent = formatMoney(percentFeeAmount, sym);
            document.getElementById('breakdown-fixed-amount').textContent = formatMoney(fixedFee, sym);

            const intlRow = document.getElementById('breakdown-intl-row');
            if (intlSurcharge > 0) {
                intlRow.classList.remove('hidden');
                intlRow.classList.add('flex');
                document.getElementById('breakdown-intl-percent').textContent = intlSurcharge + '%';
                document.getElementById('breakdown-intl-amount').textContent = formatMoney(intlFeeAmount, sym);
            } else {
                intlRow.classList.add('hidden');
                intlRow.classList.remove('flex');
            }

            document.getElementById('breakdown-total').textContent = formatMoney(fee, sym);
            const effectiveRate = (fee / chargeAmount * 100);
            document.getElementById('breakdown-effective-rate').textContent = effectiveRate.toFixed(2) + '%';

            // Comparison table
            const comparisonAmounts = [5, 10, 25, 50, 100, 250, 500, 1000];
            const tbody = document.getElementById('comparison-table-body');
            tbody.innerHTML = '';
            comparisonAmounts.forEach(amt => {
                const cFee = amt * (totalPercent / 100) + fixedFee;
                const cReceive = amt - cFee;
                const cEffective = (cFee / amt * 100);
                const row = document.createElement('tr');
                row.className = 'border-b border-gold/5';
                row.innerHTML =
                    '<td class="py-2 pr-4">' + formatMoney(amt, sym) + '</td>' +
                    '<td class="py-2 pr-4 text-red-400">' + formatMoney(cFee, sym) + '</td>' +
                    '<td class="py-2 pr-4 text-green-400">' + formatMoney(cReceive, sym) + '</td>' +
                    '<td class="py-2 text-gold">' + cEffective.toFixed(2) + '%</td>';
                tbody.appendChild(row);
            });

            // Stats bar
            document.getElementById('stat-rate').textContent = totalPercent.toFixed(2) + '% + ' + formatMoney(fixedFee, sym);
            document.getElementById('stat-card').textContent = cardTypeSelect.options[cardTypeSelect.selectedIndex].text;
            document.getElementById('stat-region').textContent = rate.name;

            // Show results
            resultsSection.classList.remove('hidden');
            statsBar.classList.remove('hidden');
            errorNotification.classList.add('hidden');
        }

        function getResultText() {
            const sym = getCurrencySymbol();
            const charge = document.getElementById('result-charge').textContent;
            const fee = document.getElementById('result-fee').textContent;
            const receive = document.getElementById('result-receive').textContent;
            const effective = document.getElementById('breakdown-effective-rate').textContent;
            const rate = document.getElementById('stat-rate').textContent;
            const region = document.getElementById('stat-region').textContent;
            const card = document.getElementById('stat-card').textContent;

            return 'Stripe Fee Calculation\n' +
                '=====================\n' +
                'Charge Amount: ' + charge + '\n' +
                'Stripe Fee:    ' + fee + '\n' +
                'You Receive:   ' + receive + '\n' +
                'Effective Rate: ' + effective + '\n\n' +
                'Settings: ' + region + ' | ' + card + ' | Rate: ' + rate + '\n' +
                '\nCalculated at hafiz.dev/tools/stripe-fee-calculator';
        }

        // Event listeners
        btnCalculate.addEventListener('click', calculate);

        btnSample.addEventListener('click', function() {
            inputAmount.value = '100.00';
            countrySelect.value = 'us';
            cardTypeSelect.value = 'domestic';
            modeSelect.value = 'fee_from_amount';
            currencySelect.value = '$';
            currencyPrefix.textContent = '$';
            inputLabel.textContent = 'Charge Amount';
            customRatePanel.classList.add('hidden');
            calculate();
        });

        btnCopy.addEventListener('click', function() {
            if (resultsSection.classList.contains('hidden')) {
                showError('Calculate fees first before copying.');
                return;
            }
            navigator.clipboard.writeText(getResultText()).then(function() {
                copyText.textContent = 'Copied!';
                copyIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>';
                copyIcon.classList.add('text-green-400');
                showSuccess('Results copied to clipboard!');
                setTimeout(function() {
                    copyText.textContent = 'Copy';
                    copyIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>';
                    copyIcon.classList.remove('text-green-400');
                }, 2000);
            });
        });

        btnDownload.addEventListener('click', function() {
            if (resultsSection.classList.contains('hidden')) {
                showError('Calculate fees first before downloading.');
                return;
            }
            const blob = new Blob([getResultText()], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'stripe-fee-calculation.txt';
            a.click();
            URL.revokeObjectURL(url);
            showSuccess('Downloaded stripe-fee-calculation.txt');
        });

        btnClear.addEventListener('click', function() {
            inputAmount.value = '';
            resultsSection.classList.add('hidden');
            statsBar.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        });

        // Country change updates currency
        countrySelect.addEventListener('change', function() {
            const val = countrySelect.value;
            if (val === 'custom') {
                customRatePanel.classList.remove('hidden');
            } else {
                customRatePanel.classList.add('hidden');
                // Auto-set currency symbol
                const rate = RATES[val];
                if (rate) {
                    // Find matching currency in select
                    for (let i = 0; i < currencySelect.options.length; i++) {
                        if (currencySelect.options[i].value === rate.currency) {
                            currencySelect.selectedIndex = i;
                            break;
                        }
                    }
                    currencyPrefix.textContent = rate.currency;
                }
            }
            if (!resultsSection.classList.contains('hidden')) calculate();
        });

        cardTypeSelect.addEventListener('change', function() {
            if (!resultsSection.classList.contains('hidden')) calculate();
        });

        modeSelect.addEventListener('change', function() {
            if (modeSelect.value === 'fee_from_amount') {
                inputLabel.textContent = 'Charge Amount';
            } else {
                inputLabel.textContent = 'Desired Receive Amount';
            }
            if (!resultsSection.classList.contains('hidden')) calculate();
        });

        currencySelect.addEventListener('change', function() {
            currencyPrefix.textContent = currencySelect.value;
            if (!resultsSection.classList.contains('hidden')) calculate();
        });

        // Keyboard shortcut: Ctrl/Cmd+Enter
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                e.preventDefault();
                calculate();
            }
        });

        // Auto-calculate on Enter in input
        inputAmount.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                calculate();
            }
        });
    })();
    </script>
    @endpush
</x-layout>
