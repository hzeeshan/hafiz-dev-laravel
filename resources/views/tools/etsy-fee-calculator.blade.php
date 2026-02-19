<x-layout>
    <x-slot:title>Etsy Fee Calculator - Free Online Seller Fee Calculator | hafiz.dev</x-slot:title>
    <x-slot:description>Free online Etsy fee calculator. Calculate Etsy listing fees, transaction fees, payment processing fees, and profit margins instantly. No signup required.</x-slot:description>
    <x-slot:keywords>etsy fee calculator, etsy fees, etsy seller fees, etsy transaction fee, etsy listing fee, calculate etsy fees online, free etsy fee calculator, etsy profit calculator, etsy payment processing fee</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/etsy-fee-calculator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Etsy Fee Calculator - Free Online Seller Fee Calculator | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Calculate Etsy seller fees instantly. Find listing fees, transaction fees, payment processing fees, and your net profit. Free online calculator.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/etsy-fee-calculator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Etsy Fee Calculator",
            "description": "Calculate Etsy seller fees including listing fees, transaction fees, payment processing fees, and determine your net profit per sale.",
            "url": "https://hafiz.dev/tools/etsy-fee-calculator",
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
                { "@@type": "ListItem", "position": 3, "name": "Etsy Fee Calculator", "item": "https://hafiz.dev/tools/etsy-fee-calculator" }
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
                    "name": "What fees does Etsy charge sellers?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Etsy charges sellers several fees: a $0.20 listing fee per item (renewed every 4 months or upon sale), a 6.5% transaction fee on the sale price including shipping, and a payment processing fee of 3% + $0.25 per transaction. If you use Etsy Ads or Offsite Ads, additional fees may apply."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How much is the Etsy transaction fee?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The Etsy transaction fee is 6.5% of the total sale price, which includes the item price and shipping cost. This fee is charged on every sale regardless of your Etsy plan."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does Etsy charge fees on shipping?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, Etsy charges the 6.5% transaction fee on the total order amount including shipping. The payment processing fee (3% + $0.25) is also calculated on the total amount with shipping. This means offering 'free shipping' by including it in the item price does not change your total fees."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the Etsy Offsite Ads fee?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Etsy charges a 15% Offsite Ads fee on sales that result from Etsy advertising your products on Google, Facebook, Instagram, and other platforms. Sellers who made $10,000+ in the past year pay a reduced 12% rate. Sellers earning under $10,000/year can opt out of Offsite Ads."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I calculate my Etsy profit?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Your Etsy profit = Sale Price - Item Cost - Shipping Cost - Listing Fee ($0.20) - Transaction Fee (6.5%) - Payment Processing Fee (3% + $0.25) - Offsite Ads Fee (if applicable). Use this calculator to compute all fees automatically and see your net profit instantly."
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
                    <li class="text-gold">Etsy Fee Calculator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Etsy Fee Calculator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Calculate all Etsy seller fees instantly. Listing fees, transaction fees, payment processing, and Offsite Ads. See your net profit per sale.
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
                                <option value="us">United States (3% + $0.25)</option>
                                <option value="uk">United Kingdom (4% + £0.20)</option>
                                <option value="ca">Canada (3% + CA$0.25)</option>
                                <option value="au">Australia (3% + A$0.25)</option>
                                <option value="eu">Europe (4% + €0.30)</option>
                                <option value="in">India (4% + ₹3.00)</option>
                            </select>
                        </div>

                        {{-- Offsite Ads --}}
                        <div>
                            <label for="opt-offsite-ads" class="block text-sm text-light-muted mb-1">Offsite Ads Fee</label>
                            <select id="opt-offsite-ads" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                                <option value="none">No Offsite Ad</option>
                                <option value="15">15% (under $10K/year)</option>
                                <option value="12">12% ($10K+/year)</option>
                            </select>
                        </div>

                        {{-- Currency Symbol --}}
                        <div>
                            <label for="opt-currency" class="block text-sm text-light-muted mb-1">Display Currency</label>
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
                            <label for="opt-quantity" class="block text-sm text-light-muted mb-1">Quantity Sold</label>
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
                            Item Price
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
                            Shipping Price
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
                            Item Cost (optional)
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
                                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Total Etsy Fees</div>
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
                                <span class="text-light-muted">Listing fee ($0.20 × <span id="breakdown-qty">1</span> item<span id="breakdown-qty-plural"></span>)</span>
                                <span class="text-light font-mono" id="breakdown-listing">$0.20</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-light-muted">Transaction fee (6.5% of sale + shipping)</span>
                                <span class="text-light font-mono" id="breakdown-transaction">$0.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-light-muted">Payment processing fee (<span id="breakdown-processing-rate">3% + $0.25</span>)</span>
                                <span class="text-light font-mono" id="breakdown-processing">$0.00</span>
                            </div>
                            <div id="breakdown-offsite-row" class="hidden flex justify-between">
                                <span class="text-light-muted">Offsite Ads fee (<span id="breakdown-offsite-rate">15%</span>)</span>
                                <span class="text-light font-mono" id="breakdown-offsite">$0.00</span>
                            </div>
                            <div class="border-t border-gold/10 pt-2 flex justify-between font-semibold">
                                <span class="text-light">Total Etsy Fees</span>
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
                        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Quick Comparison: Common Price Points</div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="text-left text-light-muted border-b border-gold/10">
                                        <th class="pb-2 pr-4">Item Price</th>
                                        <th class="pb-2 pr-4">Etsy Fees</th>
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
                    <span>Region: <span id="stat-region" class="text-gold">—</span></span>
                    <span>Processing: <span id="stat-processing" class="text-gold">—</span></span>
                    <span>Offsite Ads: <span id="stat-offsite" class="text-gold">—</span></span>
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
                    <p class="text-light-muted text-sm">See every Etsy fee itemized: listing fees, transaction fees, payment processing, and Offsite Ads. You'll know exactly where your money goes.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">💰</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Profit Calculator</h3>
                    <p class="text-light-muted text-sm">Enter your item cost to see your net profit and profit margin instantly. Price your products confidently with full fee visibility.</p>
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
                            <span class="text-light font-medium">What fees does Etsy charge sellers?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Etsy charges sellers several fees on each sale. The <strong>listing fee</strong> is $0.20 per item and renews every 4 months or when the item sells. The <strong>transaction fee</strong> is 6.5% of the total sale price including shipping. The <strong>payment processing fee</strong> varies by country; in the US it's 3% + $0.25 per order. If your sale came through Etsy's Offsite Ads, there's an additional 15% fee (or 12% for sellers earning $10K+/year).
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does Etsy charge fees on shipping?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, Etsy charges the 6.5% transaction fee on the total order amount, which includes both the item price and shipping cost. The payment processing fee is also calculated on the total amount. This means offering "free shipping" by including it in the item price doesn't change your total fees. The fee percentage is applied to the same total either way.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the Etsy Offsite Ads fee?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            When Etsy advertises your products on platforms like Google, Facebook, and Instagram, and a buyer clicks the ad and makes a purchase, Etsy charges an Offsite Ads fee. The rate is 15% of the sale price for sellers earning under $10,000/year, and 12% for sellers earning $10,000+/year. Sellers with under $10K in revenue can opt out of the program.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How can I reduce my Etsy fees?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            While you can't avoid the standard listing, transaction, and processing fees, you can optimize your pricing to maintain healthy margins. Price your items to account for all fees (typically 10-13% total). If eligible, opt out of Offsite Ads. Increase your average order value to make the fixed $0.25 processing fee a smaller percentage. Bundling items can also help reduce per-item listing fees.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How much do Etsy fees cost in total?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            For a typical US seller without Offsite Ads, total Etsy fees are approximately 10-13% of your sale price. This includes the $0.20 listing fee, 6.5% transaction fee, and 3% + $0.25 payment processing fee. With Offsite Ads (15%), total fees can reach 25-28%. The exact percentage depends on your item price. Higher-priced items have a lower effective fee rate because the fixed fees ($0.20 + $0.25) become a smaller proportion.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.etsy-fee-calculator-script')
    @endpush
</x-layout>
