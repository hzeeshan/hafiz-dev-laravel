<x-layout>
    <x-slot:title>Double Discount Calculator - Free Online Discount Calculator | hafiz.dev</x-slot:title>
    <x-slot:description>Free online double discount calculator. Apply two successive discounts to any price and see the final price, total savings, and combined discount percentage instantly. No signup required.</x-slot:description>
    <x-slot:keywords>double discount calculator, successive discount calculator, two discounts calculator, combined discount calculator, stacked discount calculator, multiple discount calculator, free discount calculator online, discount on discount calculator</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/double-discount-calculator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Double Discount Calculator - Free Online Discount Calculator | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Apply two successive discounts to any price and see the final price, total savings, and combined discount percentage instantly. Free online calculator.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/double-discount-calculator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Double Discount Calculator",
            "description": "Calculate the final price after applying two successive discounts. See total savings, combined discount percentage, and step-by-step breakdown.",
            "url": "https://hafiz.dev/tools/double-discount-calculator",
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
                { "@@type": "ListItem", "position": 3, "name": "Double Discount Calculator", "item": "https://hafiz.dev/tools/double-discount-calculator" }
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
                    "name": "How do you calculate a double discount?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "To calculate a double discount, apply the first discount to the original price, then apply the second discount to the reduced price. For example, with a $100 item and discounts of 20% then 10%: first discount gives $80, second discount gives $72. The combined discount is 28%, not 30%."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is a 20% + 10% discount the same as 30% off?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "No. Two successive discounts of 20% and 10% give a combined discount of 28%, not 30%. The second discount is applied to the already-reduced price, so you save less than if both percentages were added together."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does the order of discounts matter?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "No, the order does not affect the final price. Applying 20% first then 10% gives the same result as applying 10% first then 20%. Mathematically, multiplying by 0.8 then 0.9 equals multiplying by 0.9 then 0.8. Both produce the same final price."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I find the single equivalent discount?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The single equivalent discount formula is: Combined Discount = 1 - (1 - d1/100) x (1 - d2/100), where d1 and d2 are the two discount percentages. For 20% and 10%: 1 - (0.8 x 0.9) = 1 - 0.72 = 0.28, or 28%."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I calculate more than two discounts?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "This calculator supports two successive discounts plus an optional sales tax. For three or more discounts, you can chain calculations by using the final price from one calculation as the original price for the next."
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
                    <li class="text-gold">Double Discount Calculator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Double Discount Calculator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Apply two successive discounts to any price and see the final price, total savings, and combined discount percentage. Add optional sales tax to get the complete total.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options Panel --}}
                <div class="bg-darkBg rounded-lg border border-gold/10 p-4 mb-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        {{-- Currency Symbol --}}
                        <div>
                            <label for="opt-currency" class="block text-sm text-light-muted mb-1">Currency</label>
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
                            <label for="opt-decimals" class="block text-sm text-light-muted mb-1">Decimal Places</label>
                            <select id="opt-decimals" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none">
                                <option value="0">0</option>
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>

                        {{-- Sales Tax --}}
                        <div>
                            <label for="opt-tax" class="block text-sm text-light-muted mb-1">Sales Tax (%)</label>
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
                            Original Price
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
                            First Discount (%)
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
                            Second Discount (%)
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
                        Calculate
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
                                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Original Price</div>
                                <div class="text-3xl md:text-4xl font-bold text-light font-mono" id="result-original">$0.00</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">You Save</div>
                                <div class="text-3xl md:text-4xl font-bold text-green-400 font-mono" id="result-savings">$0.00</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xs text-light-muted mb-2 uppercase tracking-wider" id="result-final-label">Final Price</div>
                                <div class="text-3xl md:text-4xl font-bold text-gold font-mono" id="result-final">$0.00</div>
                            </div>
                        </div>
                    </div>

                    {{-- Step-by-Step Breakdown --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 mb-4">
                        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Step-by-Step Breakdown</div>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-light-muted">Original price</span>
                                <span class="text-light font-mono" id="breakdown-original">$0.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-light-muted">First discount (<span id="breakdown-d1-pct">0%</span>)</span>
                                <span class="text-green-400 font-mono" id="breakdown-d1-amount">-$0.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-light-muted">Price after first discount</span>
                                <span class="text-light font-mono" id="breakdown-after-d1">$0.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-light-muted">Second discount (<span id="breakdown-d2-pct">0%</span>)</span>
                                <span class="text-green-400 font-mono" id="breakdown-d2-amount">-$0.00</span>
                            </div>
                            <div class="border-t border-gold/10 pt-2 flex justify-between font-semibold">
                                <span class="text-light">Price after both discounts</span>
                                <span class="text-gold font-mono" id="breakdown-after-d2">$0.00</span>
                            </div>
                            <div id="breakdown-tax-row" class="hidden flex justify-between">
                                <span class="text-light-muted">Sales tax (<span id="breakdown-tax-pct">0%</span>)</span>
                                <span class="text-red-400 font-mono" id="breakdown-tax-amount">+$0.00</span>
                            </div>
                            <div id="breakdown-final-row" class="hidden border-t border-gold/10 pt-2 flex justify-between font-semibold">
                                <span class="text-light">Final price (with tax)</span>
                                <span class="text-gold font-mono" id="breakdown-final-with-tax">$0.00</span>
                            </div>
                        </div>
                    </div>

                    {{-- Summary Stats --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Discount Summary</div>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
                            <div>
                                <div class="text-2xl font-bold text-green-400 font-mono" id="summary-combined-pct">0%</div>
                                <div class="text-xs text-light-muted mt-1">Combined Discount</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-green-400 font-mono" id="summary-total-saved">$0.00</div>
                                <div class="text-xs text-light-muted mt-1">Total Saved</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-light font-mono" id="summary-naive-pct">0%</div>
                                <div class="text-xs text-light-muted mt-1">If Added (naive)</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-red-400 font-mono" id="summary-difference">$0.00</div>
                                <div class="text-xs text-light-muted mt-1">Stacking Penalty</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Stats Bar --}}
                <div id="stats-bar" class="hidden mt-4 flex flex-wrap gap-4 text-xs text-light-muted">
                    <span>Combined: <span id="stat-combined" class="text-gold">--</span></span>
                    <span>Currency: <span id="stat-currency" class="text-gold">--</span></span>
                    <span>Tax: <span id="stat-tax" class="text-gold">--</span></span>
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
                        <span id="error-message" class="text-red-400 text-sm">Please enter a valid price.</span>
                    </div>
                </div>
            </div>

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔢</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Successive Discounts</h3>
                    <p class="text-light-muted text-sm">Apply two discounts one after the other and see the true combined discount. Learn why 20% + 10% is not the same as 30% off.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📊</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Step-by-Step Breakdown</h3>
                    <p class="text-light-muted text-sm">See exactly how each discount is applied with a detailed breakdown showing prices at every step, plus optional sales tax.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">Everything runs in your browser. No data is sent to any server. Your pricing information stays completely private.</p>
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
                            <span class="text-light font-medium">How do you calculate a double discount?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            To calculate a double discount, apply the first discount to the original price, then apply the second discount to the already-reduced price. For example, with a $100 item at 20% off then 10% off: $100 x 0.80 = $80 after the first discount, then $80 x 0.90 = $72 after the second. The final price is $72, and the combined discount is 28%.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Why is 20% + 10% not the same as 30% off?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            When discounts are applied successively, the second discount is calculated on the reduced price, not the original price. With a $100 item, 30% off gives you $70. But 20% off then 10% off gives you $72, because the 10% applies to $80 (saving $8) instead of $100 (which would save $10). The difference of $2 is the "stacking penalty" shown in this calculator.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does the order of discounts matter?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            No, the order of percentage discounts does not change the final price. Applying 20% first then 10% gives the same result as applying 10% first then 20%. This is because multiplication is commutative: 0.80 x 0.90 = 0.90 x 0.80 = 0.72. You pay 72% of the original price either way.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the combined discount formula?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The combined discount formula for two successive discounts (d1 and d2) is: <strong>Combined = d1 + d2 - (d1 x d2 / 100)</strong>. For 20% and 10%: 20 + 10 - (20 x 10 / 100) = 30 - 2 = 28%. This formula works for any two percentage discounts and always gives a result less than the simple sum of the two discounts.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">When would I use a double discount calculator?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A double discount calculator is useful when stores offer stacked promotions, such as "20% off sale + extra 10% with coupon." It helps during Black Friday deals, employee discounts on top of sale prices, clearance markdowns with additional coupons, or loyalty member discounts combined with promotional offers. It shows you the true savings compared to what the percentages might suggest.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.double-discount-calculator-script')
    @endpush
</x-layout>
