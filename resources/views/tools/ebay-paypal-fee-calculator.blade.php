<x-layout>
    <x-slot:title>eBay PayPal Fee Calculator - Free Online Seller Fee Calculator | hafiz.dev</x-slot:title>
    <x-slot:description>Free online eBay and PayPal fee calculator. Calculate eBay final value fees, PayPal processing fees, and your net profit per sale instantly. No signup required.</x-slot:description>
    <x-slot:keywords>ebay fee calculator, ebay paypal fee calculator, ebay seller fees, ebay final value fee, paypal fee calculator, ebay fees calculator, calculate ebay fees online, free ebay fee calculator, ebay profit calculator</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/ebay-paypal-fee-calculator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>eBay PayPal Fee Calculator - Free Online Seller Fee Calculator | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Calculate eBay and PayPal seller fees instantly. See final value fees, payment processing fees, and your net profit. Free online calculator.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/ebay-paypal-fee-calculator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "eBay PayPal Fee Calculator",
            "description": "Calculate eBay final value fees, PayPal payment processing fees, and determine your net profit per sale as an eBay seller.",
            "url": "https://hafiz.dev/tools/ebay-paypal-fee-calculator",
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
                { "@@type": "ListItem", "position": 3, "name": "eBay PayPal Fee Calculator", "item": "https://hafiz.dev/tools/ebay-paypal-fee-calculator" }
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
                    "name": "What fees does eBay charge sellers?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "eBay charges sellers a final value fee on each sale, which is a percentage of the total sale amount (item price + shipping). The rate varies by category but is typically 13.25% for most categories, plus a $0.30 per-order fee. Some categories like guitars, watches, and sneakers have lower rates."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How much does PayPal charge on eBay transactions?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "PayPal's standard processing fee is 2.99% + $0.49 per transaction for goods and services payments. Rates vary by country and payment type. Note that eBay has transitioned most sellers to eBay Managed Payments, so PayPal fees only apply if you still use PayPal as your payment processor."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is eBay's final value fee?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The final value fee is eBay's commission on each completed sale. It is calculated as a percentage of the total sale amount (item price plus shipping) plus a fixed per-order surcharge of $0.30. The percentage varies from 3% to 15% depending on the product category."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does eBay charge fees on shipping?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, eBay's final value fee is calculated on the total sale amount, which includes both the item price and shipping cost. Offering free shipping and building the cost into the item price does not change the total fee amount."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I calculate my eBay profit?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Your eBay profit equals the sale price minus the item cost, minus shipping cost, minus eBay's final value fee, minus the payment processing fee (eBay Managed Payments or PayPal). Use this calculator to compute all fees automatically and see your net profit instantly."
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
                    <li class="text-gold">eBay PayPal Fee Calculator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">eBay PayPal Fee Calculator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Calculate eBay final value fees and PayPal processing fees instantly. See your total fees, net profit, and profit margin per sale.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options Panel --}}
                <div class="bg-darkBg rounded-lg border border-gold/10 p-4 mb-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        {{-- eBay Category --}}
                        <div>
                            <label for="opt-category" class="block text-sm text-light-muted mb-1">eBay Category</label>
                            <select id="opt-category" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                                <option value="most">Most Categories (13.25%)</option>
                                <option value="books">Books, Movies, Music (14.95%)</option>
                                <option value="clothing">Clothing, Shoes (13.25%)</option>
                                <option value="electronics">Electronics (14.95%)</option>
                                <option value="collectibles">Collectibles (13.25%)</option>
                                <option value="home">Home & Garden (13.25%)</option>
                                <option value="sporting">Sporting Goods (13.25%)</option>
                                <option value="toys">Toys & Hobbies (13.25%)</option>
                                <option value="business">Business & Industrial (13.25%)</option>
                                <option value="guitars">Guitars & Basses (6.35%)</option>
                                <option value="watches">Watches over $1000 (8.95%)</option>
                                <option value="sneakers">Sneakers (8.0%)</option>
                                <option value="jewelry_fine">Fine Jewelry over $500 (6.35%)</option>
                                <option value="custom">Custom Rate</option>
                            </select>
                        </div>

                        {{-- Payment Processor --}}
                        <div>
                            <label for="opt-processor" class="block text-sm text-light-muted mb-1">Payment Processor</label>
                            <select id="opt-processor" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                                <option value="managed">eBay Managed Payments (included)</option>
                                <option value="paypal_standard">PayPal Standard (2.99% + $0.49)</option>
                                <option value="paypal_micropayment">PayPal Micropayment (5% + $0.10)</option>
                                <option value="none">No Additional Processing Fee</option>
                            </select>
                        </div>

                        {{-- eBay Store --}}
                        <div>
                            <label for="opt-store" class="block text-sm text-light-muted mb-1">eBay Store Subscription</label>
                            <select id="opt-store" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                                <option value="none">No Store</option>
                                <option value="starter">Starter Store</option>
                                <option value="basic">Basic Store</option>
                                <option value="premium">Premium Store</option>
                                <option value="anchor">Anchor Store</option>
                                <option value="enterprise">Enterprise Store</option>
                            </select>
                        </div>

                        {{-- Currency Symbol --}}
                        <div>
                            <label for="opt-currency" class="block text-sm text-light-muted mb-1">Display Currency</label>
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
                            <label for="custom-percent" class="block text-sm text-light-muted mb-1">eBay Final Value Fee (%)</label>
                            <input type="number" id="custom-percent" step="0.01" value="13.25" min="0" max="100"
                                class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                        </div>
                        <div>
                            <label for="custom-fixed" class="block text-sm text-light-muted mb-1">Per-Order Surcharge</label>
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
                            Item Sale Price
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
                            Shipping Price
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
                            Item Cost (optional)
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
                                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Total Revenue</div>
                                <div class="text-3xl md:text-4xl font-bold text-gold font-mono" id="result-revenue">$0.00</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Total Fees</div>
                                <div class="text-3xl md:text-4xl font-bold text-red-400 font-mono" id="result-total-fees">-$0.00</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Net Profit</div>
                                <div class="text-3xl md:text-4xl font-bold text-green-400 font-mono" id="result-profit">$0.00</div>
                            </div>
                        </div>
                    </div>

                    {{-- Fee Breakdown --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 mb-4">
                        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Fee Breakdown</div>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-light-muted">eBay final value fee (<span id="breakdown-ebay-rate">13.25%</span>)</span>
                                <span class="text-light font-mono" id="breakdown-ebay-fee">$0.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-light-muted">eBay per-order surcharge</span>
                                <span class="text-light font-mono" id="breakdown-ebay-fixed">$0.30</span>
                            </div>
                            <div id="breakdown-paypal-row" class="hidden flex justify-between">
                                <span class="text-light-muted">PayPal fee (<span id="breakdown-paypal-rate">2.99% + $0.49</span>)</span>
                                <span class="text-light font-mono" id="breakdown-paypal-fee">$0.00</span>
                            </div>
                            <div class="border-t border-gold/10 pt-2 flex justify-between font-semibold">
                                <span class="text-light">Total Fees</span>
                                <span class="text-red-400 font-mono" id="breakdown-total">$0.00</span>
                            </div>
                            <div id="breakdown-cost-row" class="hidden flex justify-between">
                                <span class="text-light-muted">Item cost</span>
                                <span class="text-light font-mono" id="breakdown-cost">$0.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-light-muted">Effective fee rate</span>
                                <span class="text-gold font-mono" id="breakdown-effective-rate">0.00%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-light-muted">Profit margin</span>
                                <span class="text-green-400 font-mono" id="breakdown-profit-margin">0.00%</span>
                            </div>
                        </div>
                    </div>

                    {{-- Quick Comparison Table --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Quick Comparison - Common Price Points</div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="text-left text-light-muted border-b border-gold/10">
                                        <th class="pb-2 pr-4">Sale Price</th>
                                        <th class="pb-2 pr-4">Total Fees</th>
                                        <th class="pb-2 pr-4">You Keep</th>
                                        <th class="pb-2">Fee Rate</th>
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
                    <span>Category: <span id="stat-category" class="text-gold">-</span></span>
                    <span>eBay Fee: <span id="stat-ebay-rate" class="text-gold">-</span></span>
                    <span>Payment: <span id="stat-payment" class="text-gold">-</span></span>
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
                        <span id="error-message" class="text-red-400 text-sm">Please enter a valid item price.</span>
                    </div>
                </div>
            </div>

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📊</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Complete Fee Breakdown</h3>
                    <p class="text-light-muted text-sm">See every fee itemized: eBay final value fees, per-order surcharges, and PayPal processing fees. Know exactly where your money goes on each sale.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">💰</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Profit Calculator</h3>
                    <p class="text-light-muted text-sm">Enter your item cost to see net profit and profit margin instantly. Price your listings confidently with full visibility into all fees.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">Everything runs in your browser. No data is sent to any server. Your pricing and profit details stay completely private.</p>
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
                            <span class="text-light font-medium">What fees does eBay charge sellers?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            eBay charges sellers a <strong>final value fee</strong> on each completed sale. This fee is a percentage of the total sale amount (item price plus shipping) plus a $0.30 per-order surcharge. The percentage varies by product category. Most categories pay 13.25%, while specialty categories like guitars and basses, fine jewelry, and sneakers pay reduced rates between 3% and 8.95%. eBay Store subscribers may get lower final value fees depending on their plan level.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between eBay Managed Payments and PayPal?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            eBay Managed Payments is eBay's in-house payment processing system. With Managed Payments, payment processing fees are included in the final value fee, so there is no separate PayPal charge. If you still process payments through PayPal (some international sellers), PayPal charges its own fee (typically 2.99% + $0.49) on top of eBay's fees. Most eBay sellers have been migrated to Managed Payments since 2023.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does eBay charge fees on shipping?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, eBay's final value fee is calculated on the total sale amount, which includes both the item price and the shipping cost charged to the buyer. Offering "free shipping" by building the cost into the item price does not change your total fees. The same percentage is applied to the total regardless of how you split the price between item and shipping.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Do eBay Store subscriptions reduce fees?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            eBay Store subscriptions can provide reduced final value fee rates and free monthly listing allowances. The savings depend on your subscription tier (Starter, Basic, Premium, Anchor, or Enterprise) and the categories you sell in. For high-volume sellers, the subscription cost can be offset by the reduced per-item fees. This calculator shows the fee impact of each store level to help you decide if a subscription is worth it.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How can I reduce my eBay selling fees?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            There are several ways to reduce eBay fees. Subscribe to an eBay Store for lower final value fee rates. Sell in categories with lower fee percentages. Increase your average sale price so the $0.30 per-order surcharge becomes a smaller percentage of the total. Use eBay Managed Payments instead of PayPal to avoid double processing fees. Maintain Top Rated Seller status for additional fee discounts on eligible listings.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.ebay-paypal-fee-calculator-script')
    @endpush
</x-layout>
