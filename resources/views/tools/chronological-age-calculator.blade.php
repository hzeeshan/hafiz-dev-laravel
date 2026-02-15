<x-layout>
    <x-slot:title>Chronological Age Calculator - Exact Age in Years, Months, Days | hafiz.dev</x-slot:title>
    <x-slot:description>Free chronological age calculator. Calculate your exact age in years, months, days, hours, minutes, and seconds. Find next birthday countdown and zodiac sign. 100% client-side.</x-slot:description>
    <x-slot:keywords>chronological age calculator, age calculator, exact age calculator, calculate my age, how old am I, age in days, birthday calculator, date of birth calculator</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/chronological-age-calculator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Chronological Age Calculator - Exact Age in Years, Months, Days | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Calculate your exact chronological age in years, months, days, hours, minutes, and seconds. Free online age calculator.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/chronological-age-calculator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Chronological Age Calculator",
            "description": "Calculate your exact chronological age in years, months, days, hours, minutes, and seconds from your date of birth.",
            "url": "https://hafiz.dev/tools/chronological-age-calculator",
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
                { "@@type": "ListItem", "position": 3, "name": "Chronological Age Calculator", "item": "https://hafiz.dev/tools/chronological-age-calculator" }
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
                    "name": "What is chronological age?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Chronological age is your age measured in exact years, months, and days from your date of birth to the current date. It is the standard way age is measured worldwide, based purely on the passage of calendar time since birth."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How is exact age calculated?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Exact age is calculated by finding the difference between your date of birth and today's date. The calculator accounts for varying month lengths and leap years to give you a precise result in years, months, days, hours, minutes, and seconds."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I calculate age between two dates?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Enter a birth date and optionally change the 'Age at Date' field to any target date. The calculator will compute the exact time difference between the two dates, showing results in years, months, days, and more."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does this calculator handle leap years?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, the calculator properly handles leap years. If you were born on February 29th, it correctly calculates your age and shows when your next actual birthday falls."
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
                    <li class="text-gold">Chronological Age Calculator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Chronological Age Calculator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Calculate your exact age in years, months, days, hours, minutes, and seconds. Find your next birthday countdown and zodiac sign.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Input Section --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    {{-- Date of Birth --}}
                    <div>
                        <label for="birth-date" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Date of Birth
                        </label>
                        <div class="date-input-wrapper" data-placeholder="dd/mm/yyyy">
                            <input type="date" id="birth-date"
                                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
                            >
                        </div>
                    </div>

                    {{-- Age at Date --}}
                    <div>
                        <label for="target-date" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Age at Date
                        </label>
                        <input type="date" id="target-date"
                            class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
                        >
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-calculate" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        Calculate Age
                    </button>
                    <button id="btn-reset" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Reset
                    </button>
                </div>

                {{-- Results Section (hidden initially) --}}
                <div id="results-section" class="hidden">

                    {{-- Primary Age Display --}}
                    <div class="bg-darkBg border border-gold/10 rounded-lg p-6 mb-6">
                        <div class="text-xs text-light-muted mb-4 uppercase tracking-wider">Your Age</div>
                        <div class="flex flex-wrap items-baseline gap-3">
                            <div class="text-center">
                                <span id="age-years" class="text-5xl md:text-6xl font-bold text-gold">0</span>
                                <span class="block text-sm text-light-muted mt-1">Years</span>
                            </div>
                            <span class="text-3xl text-gold/40 self-start mt-2">,</span>
                            <div class="text-center">
                                <span id="age-months" class="text-5xl md:text-6xl font-bold text-light">0</span>
                                <span class="block text-sm text-light-muted mt-1">Months</span>
                            </div>
                            <span class="text-3xl text-gold/40 self-start mt-2">,</span>
                            <div class="text-center">
                                <span id="age-days" class="text-5xl md:text-6xl font-bold text-light">0</span>
                                <span class="block text-sm text-light-muted mt-1">Days</span>
                            </div>
                        </div>
                    </div>

                    {{-- Detailed Breakdown --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                            <div class="text-center">
                                <div id="total-months" class="text-2xl font-bold text-gold mb-1">0</div>
                                <div class="text-light-muted text-sm">Total Months</div>
                            </div>
                            <div class="text-center">
                                <div id="total-weeks" class="text-2xl font-bold text-light mb-1">0</div>
                                <div class="text-light-muted text-sm">Total Weeks</div>
                            </div>
                            <div class="text-center">
                                <div id="total-days" class="text-2xl font-bold text-light mb-1">0</div>
                                <div class="text-light-muted text-sm">Total Days</div>
                            </div>
                            <div class="text-center">
                                <div id="total-hours" class="text-2xl font-bold text-light mb-1">0</div>
                                <div class="text-light-muted text-sm">Total Hours</div>
                            </div>
                            <div class="text-center">
                                <div id="total-minutes" class="text-2xl font-bold text-light mb-1">0</div>
                                <div class="text-light-muted text-sm">Total Minutes</div>
                            </div>
                            <div class="text-center">
                                <div id="total-seconds" class="text-2xl font-bold text-light mb-1">0</div>
                                <div class="text-light-muted text-sm">Total Seconds</div>
                            </div>
                        </div>
                    </div>

                    {{-- Next Birthday & Zodiac --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="bg-darkBg border border-gold/10 rounded-lg p-5">
                            <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Next Birthday</div>
                            <p class="text-xl font-bold text-light" id="next-birthday-date">—</p>
                            <p class="text-light-muted mt-1" id="next-birthday-day">—</p>
                            <div class="mt-3 flex items-center gap-2">
                                <span class="text-gold text-lg" id="countdown-icon">🎂</span>
                                <span class="text-gold font-semibold" id="next-birthday-countdown">—</span>
                            </div>
                        </div>
                        <div class="bg-darkBg border border-gold/10 rounded-lg p-5">
                            <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Zodiac Sign</div>
                            <div class="flex items-center gap-3">
                                <span class="text-4xl" id="zodiac-emoji">—</span>
                                <div>
                                    <p class="text-xl font-bold text-light" id="zodiac-name">—</p>
                                    <p class="text-sm text-light-muted" id="zodiac-dates">—</p>
                                </div>
                            </div>
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
                        <pre class="text-light font-mono text-sm leading-relaxed whitespace-pre-wrap" id="summary-text">—</pre>
                    </div>
                </div>

                {{-- Notifications --}}
                <div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm">Copied to clipboard!</span>
                    </div>
                </div>
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🎯</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Precise Calculation</h3>
                    <p class="text-light-muted text-sm">Get your exact age down to the second. Accounts for varying month lengths and leap years for accurate results.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🎂</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Birthday Countdown</h3>
                    <p class="text-light-muted text-sm">See exactly how many days until your next birthday, plus what day of the week it falls on.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">Everything runs in your browser. No data is sent to any server. Your birth date stays completely private.</p>
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
                            <span class="text-light font-medium">What is chronological age?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Chronological age is your age measured in exact years, months, and days from your date of birth to the current date. It is the most common and universally accepted method of determining age, used for legal documents, medical records, school enrollment, and everyday purposes. Unlike biological age (which measures physiological health) or mental age, chronological age is purely based on the passage of calendar time.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How is the exact age calculated?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The calculator finds the difference between your date of birth and the target date. It counts complete years first, then remaining months, then remaining days. It properly accounts for months with different numbers of days (28, 29, 30, or 31) and leap years. Total values (months, weeks, days, hours, minutes, seconds) are also calculated for detailed breakdowns.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I calculate age between any two dates?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! While the default target date is today, you can change the "Age at Date" field to any date. This is useful for calculating how old someone was or will be on a specific date — for example, a child's age at the start of school, or your age on a future date for retirement planning.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does it handle leap years correctly?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, the calculator correctly handles leap years. If you were born on February 29th, the next birthday countdown will show the correct date. The total days calculation also accounts for leap years throughout the entire duration between dates.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What zodiac signs are shown?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The calculator shows your Western zodiac sign based on your birth date. The 12 signs are: Aries (Mar 21–Apr 19), Taurus (Apr 20–May 20), Gemini (May 21–Jun 20), Cancer (Jun 21–Jul 22), Leo (Jul 23–Aug 22), Virgo (Aug 23–Sep 22), Libra (Sep 23–Oct 22), Scorpio (Oct 23–Nov 21), Sagittarius (Nov 22–Dec 21), Capricorn (Dec 22–Jan 19), Aquarius (Jan 20–Feb 18), and Pisces (Feb 19–Mar 20).
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @include('tools.partials.chronological-age-calculator-script')
    @endpush
</x-layout>
