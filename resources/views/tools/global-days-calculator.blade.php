<x-layout>
    <x-slot:title>Global Days Calculator - Free Online Date Difference Calculator | hafiz.dev</x-slot:title>
    <x-slot:description>Free online global days calculator. Calculate the exact number of days between any two dates instantly in your browser. No signup required.</x-slot:description>
    <x-slot:keywords>global days calculator, days between dates, date difference calculator, how many days between two dates, day counter, days calculator online, free date calculator, count days between dates</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/global-days-calculator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Global Days Calculator - Free Online Date Difference Calculator | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Calculate the exact number of days between any two dates. Free online days calculator with business days, weekends, and detailed breakdown.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/global-days-calculator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Global Days Calculator",
            "description": "Calculate the exact number of days between any two dates with business days, weekends, and detailed breakdown.",
            "url": "https://hafiz.dev/tools/global-days-calculator",
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
                { "@@type": "ListItem", "position": 3, "name": "Global Days Calculator", "item": "https://hafiz.dev/tools/global-days-calculator" }
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
                    "name": "How do I calculate the number of days between two dates?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Enter a start date and an end date in the calculator. It instantly computes the total number of calendar days between them, including a breakdown of business days, weekend days, weeks, months, and years."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does this calculator include or exclude the end date?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "By default, the calculator counts from the start date up to but not including the end date. You can toggle the 'Include End Date' option to add one extra day to the total count."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How are business days calculated?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Business days count only Monday through Friday, excluding Saturday and Sunday. The calculator shows both total calendar days and business days so you can plan work schedules and deadlines accurately."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I calculate days from a past date to a future date?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes. The calculator works with any combination of past, present, and future dates. If the start date is after the end date, the result will still show the absolute number of days between them."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does this calculator account for leap years?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes. The calculator uses native date arithmetic that properly handles leap years, varying month lengths, and daylight saving transitions to give you an accurate day count."
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
                    <li class="text-gold">Global Days Calculator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Global Days Calculator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Calculate the exact number of days between any two dates. Get a detailed breakdown of business days, weekend days, weeks, months, and more.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                {{-- Options Panel --}}
                <div class="bg-darkBg rounded-lg border border-gold/10 p-4 mb-6">
                    <div class="flex flex-wrap items-center gap-4">
                        <label class="flex items-center gap-2 text-light text-sm cursor-pointer">
                            <input type="checkbox" id="opt-include-end" class="accent-gold w-4 h-4 cursor-pointer">
                            Include end date
                        </label>
                    </div>
                </div>

                {{-- Input Section --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    {{-- Start Date --}}
                    <div>
                        <label for="start-date" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Start Date
                        </label>
                        <div class="date-input-wrapper" data-placeholder="dd/mm/yyyy">
                            <input type="date" id="start-date"
                                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
                            >
                        </div>
                    </div>

                    {{-- End Date --}}
                    <div>
                        <label for="end-date" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            End Date
                        </label>
                        <div class="date-input-wrapper" data-placeholder="dd/mm/yyyy">
                            <input type="date" id="end-date"
                                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
                            >
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-calculate" class="px-5 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        Calculate Days
                    </button>
                    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Sample
                    </button>
                    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                </div>

                {{-- Results Section (hidden initially) --}}
                <div id="results-section" class="hidden">

                    {{-- Primary Days Display --}}
                    <div class="bg-darkBg border border-gold/10 rounded-lg p-6 mb-6">
                        <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">Days Between Dates</div>
                        <div class="flex flex-wrap items-baseline gap-3">
                            <div class="text-center">
                                <span id="result-days" class="text-5xl md:text-6xl font-bold text-gold">0</span>
                                <span class="block text-sm text-light-muted mt-1">Calendar Days</span>
                            </div>
                        </div>
                        <p class="text-light-muted text-sm mt-3" id="result-range-label"></p>
                    </div>

                    {{-- Detailed Breakdown --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                            <div class="text-center">
                                <div id="result-years" class="text-2xl font-bold text-gold mb-1">0</div>
                                <div class="text-light-muted text-sm">Years</div>
                            </div>
                            <div class="text-center">
                                <div id="result-months" class="text-2xl font-bold text-light mb-1">0</div>
                                <div class="text-light-muted text-sm">Months</div>
                            </div>
                            <div class="text-center">
                                <div id="result-weeks" class="text-2xl font-bold text-light mb-1">0</div>
                                <div class="text-light-muted text-sm">Weeks</div>
                            </div>
                            <div class="text-center">
                                <div id="result-business-days" class="text-2xl font-bold text-light mb-1">0</div>
                                <div class="text-light-muted text-sm">Business Days</div>
                            </div>
                            <div class="text-center">
                                <div id="result-weekend-days" class="text-2xl font-bold text-light mb-1">0</div>
                                <div class="text-light-muted text-sm">Weekend Days</div>
                            </div>
                            <div class="text-center">
                                <div id="result-hours" class="text-2xl font-bold text-light mb-1">0</div>
                                <div class="text-light-muted text-sm">Hours</div>
                            </div>
                        </div>
                    </div>

                    {{-- Day of Week Info --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="bg-darkBg border border-gold/10 rounded-lg p-5">
                            <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Start Date</div>
                            <p class="text-xl font-bold text-light" id="start-date-display"></p>
                            <p class="text-light-muted mt-1" id="start-day-of-week"></p>
                        </div>
                        <div class="bg-darkBg border border-gold/10 rounded-lg p-5">
                            <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">End Date</div>
                            <p class="text-xl font-bold text-light" id="end-date-display"></p>
                            <p class="text-light-muted mt-1" id="end-day-of-week"></p>
                        </div>
                    </div>

                    {{-- Summary Copy --}}
                    <div class="bg-darkBg border border-gold/10 rounded-lg p-5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="text-xs text-light-muted uppercase tracking-wider">Summary</div>
                            <button id="btn-copy" class="px-4 py-1.5 text-sm border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                Copy
                            </button>
                        </div>
                        <pre class="text-light font-mono text-sm leading-relaxed whitespace-pre-wrap" id="summary-text"></pre>
                    </div>
                </div>

                {{-- Stats Bar --}}
                <div id="stats-bar" class="hidden mt-4 text-xs text-light-muted text-center">
                    Calculated instantly in your browser
                </div>

                {{-- Notifications --}}
                <div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm">Copied to clipboard!</span>
                    </div>
                </div>
                <div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        <span id="error-message" class="text-red-400 text-sm">Please enter both dates.</span>
                    </div>
                </div>
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📅</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Full Date Breakdown</h3>
                    <p class="text-light-muted text-sm">Get calendar days, business days, weekend days, weeks, months, years, and hours between your selected dates.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">💼</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Business Day Count</h3>
                    <p class="text-light-muted text-sm">Instantly see how many weekdays fall between your dates. Perfect for project planning, deadlines, and work schedules.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All calculations run in your browser. No data is sent to any server. Your dates remain completely private.</p>
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
                            <span class="text-light font-medium">How do I calculate the number of days between two dates?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Enter a start date and an end date using the date pickers above, then click "Calculate Days." The calculator instantly shows the total number of calendar days between the two dates along with a full breakdown of business days, weekend days, weeks, months, and hours.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does this calculator include or exclude the end date?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            By default, the calculator counts from the start date up to but not including the end date (for example, January 1 to January 2 = 1 day). If you check the "Include end date" option, it adds one extra day to the total, which is useful for counting inclusive date ranges like rental periods or event durations.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How are business days calculated?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Business days count only Monday through Friday, excluding Saturday and Sunday. Public holidays are not factored in since they vary by country and region. The calculator shows both total calendar days and business days so you can plan work schedules and deadlines accurately.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I calculate days between past and future dates?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes. The calculator works with any combination of past, present, and future dates. If the start date is after the end date, the calculator automatically swaps them and shows the absolute number of days. This makes it easy to calculate how long ago an event occurred or how many days until a future deadline.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does this calculator handle leap years?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes. The calculator uses native JavaScript date arithmetic that correctly accounts for leap years, varying month lengths (28, 29, 30, or 31 days), and all calendar edge cases. You can rely on it for accurate results across any date range.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @include('tools.partials.global-days-calculator-script')
    @endpush
</x-layout>
