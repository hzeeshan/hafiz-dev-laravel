<x-layout>
    <x-slot:title>Korean Age Calculator - Calculate Your Korean Age Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free Korean age calculator. Find your Korean age, international age, and the difference between them. Learn how the Korean age system works. 100% client-side.</x-slot:description>
    <x-slot:keywords>korean age calculator, korean age, calculate korean age, korean age system, how old am I in korea, korean age vs international age, korean age converter</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/korean-age-calculator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Korean Age Calculator - Calculate Your Korean Age Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Find your Korean age, international age, and the difference between them. Free online Korean age calculator.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/korean-age-calculator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Korean Age Calculator",
            "description": "Calculate your Korean age, international age, and see the difference. Learn how the Korean age system works.",
            "url": "https://hafiz.dev/tools/korean-age-calculator",
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
                { "@@type": "ListItem", "position": 3, "name": "Korean Age Calculator", "item": "https://hafiz.dev/tools/korean-age-calculator" }
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
                    "name": "How does Korean age work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "In the traditional Korean age system, a baby is considered 1 year old at birth. Everyone then gains one year on January 1st, regardless of their actual birthday. So a baby born on December 31st would be 2 years old the very next day."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between Korean age and international age?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Korean age is typically 1-2 years older than international age. The difference is 1 year if you have already had your birthday this year, and 2 years if your birthday has not yet passed."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does South Korea still use Korean age?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "South Korea officially switched to the international age system for legal and administrative purposes in June 2023. However, Korean age is still widely used in everyday conversations, social settings, and cultural contexts."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I calculate my Korean age?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The formula is simple: Korean Age = Current Year - Birth Year + 1. For example, if you were born in 1995 and the current year is 2026, your Korean age would be 2026 - 1995 + 1 = 32."
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
                    <li class="text-gold">Korean Age Calculator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Korean Age Calculator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Calculate your Korean age, international age, and see the difference. Learn how the traditional Korean age system works.
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
                        <input type="date" id="birth-date"
                            class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 transition-colors"
                        >
                    </div>

                    {{-- Reference Date --}}
                    <div>
                        <label for="target-date" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Reference Date
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

                    {{-- Age Comparison Cards --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="bg-darkBg border border-gold/20 rounded-lg p-6 text-center">
                            <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Korean Age</div>
                            <div id="korean-age" class="text-5xl md:text-6xl font-bold text-gold">0</div>
                            <div class="text-sm text-light-muted mt-2">years old</div>
                        </div>
                        <div class="bg-darkBg border border-gold/10 rounded-lg p-6 text-center">
                            <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">International Age</div>
                            <div id="international-age" class="text-5xl md:text-6xl font-bold text-light">0</div>
                            <div class="text-sm text-light-muted mt-2">years old</div>
                        </div>
                        <div class="bg-darkBg border border-gold/10 rounded-lg p-6 text-center">
                            <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Difference</div>
                            <div id="age-difference" class="text-5xl md:text-6xl font-bold text-light">0</div>
                            <div class="text-sm text-light-muted mt-2">year(s)</div>
                        </div>
                    </div>

                    {{-- Detailed Info --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="bg-darkBg border border-gold/10 rounded-lg p-5">
                            <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">How It's Calculated</div>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-light-muted">Birth Year</span>
                                    <span class="text-light font-mono" id="birth-year-display">—</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-light-muted">Current Year</span>
                                    <span class="text-light font-mono" id="current-year-display">—</span>
                                </div>
                                <div class="border-t border-gold/10 pt-2 flex justify-between">
                                    <span class="text-light-muted">Formula</span>
                                    <span class="text-gold font-mono text-xs" id="formula-display">—</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-darkBg border border-gold/10 rounded-lg p-5">
                            <div class="text-xs text-light-muted mb-3 uppercase tracking-wider">Age Details</div>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-light-muted">International Age</span>
                                    <span class="text-light" id="intl-detail">—</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-light-muted">Birthday this year</span>
                                    <span class="text-light" id="birthday-status">—</span>
                                </div>
                                <div class="border-t border-gold/10 pt-2 flex justify-between">
                                    <span class="text-light-muted">Zodiac Sign</span>
                                    <span class="text-light" id="zodiac-display">—</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Explanation Box --}}
                    <div class="bg-darkBg border border-gold/10 rounded-lg p-5 mb-6">
                        <div class="text-xs text-light-muted mb-2 uppercase tracking-wider">Why the Difference?</div>
                        <p class="text-light-muted text-sm leading-relaxed" id="explanation-text">—</p>
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
                    <div class="text-gold text-2xl mb-3">🇰🇷</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Korean Age System</h3>
                    <p class="text-light-muted text-sm">Calculates your age using the traditional Korean system where you're 1 at birth and gain a year every January 1st.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔄</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Side-by-Side Comparison</h3>
                    <p class="text-light-muted text-sm">See your Korean age, international age, and the exact difference between them at a glance.</p>
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
                            <span class="text-light font-medium">How does Korean age work?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            In the traditional Korean age system, a baby is considered 1 year old at birth (counting the time in the womb). Everyone then gains one year on January 1st, regardless of their actual birthday. This means a baby born on December 31st would turn 2 years old the very next day on January 1st. The formula is simple: <code class="bg-darkCard px-1 rounded">Korean Age = Current Year - Birth Year + 1</code>.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between Korean age and international age?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Korean age is typically 1 to 2 years older than international age. If you have already had your birthday this calendar year, the difference is 1 year. If your birthday has not yet passed this year, the difference is 2 years. International age (used in most countries) counts from 0 at birth and increases on your actual birthday.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does South Korea still use Korean age?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            South Korea officially adopted the international age system for legal and administrative purposes in June 2023. However, Korean age (만 나이 vs 세는 나이) is still deeply embedded in Korean culture and widely used in everyday conversations, social hierarchies, and informal settings. Many Koreans still think of their age in the traditional system.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I calculate my Korean age quickly?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The quickest formula: take the current year, subtract your birth year, and add 1. For example, if you were born in 1995 and it's 2026: 2026 - 1995 + 1 = 32 Korean age. Your international age would be either 30 or 31 depending on whether your birthday has passed.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Do other countries use a similar age system?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Historically, similar age counting systems existed in China, Japan, Vietnam, and other East Asian countries. However, most of these countries have since adopted the international age system. South Korea was the last major country to officially use the traditional system before switching in 2023.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <style>
        /* Normalize date inputs on iOS Safari */
        input[type="date"] {
            -webkit-appearance: none;
            appearance: none;
            min-height: 50px;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(85%) sepia(20%) saturate(500%) hue-rotate(10deg) brightness(95%);
            cursor: pointer;
        }
    </style>
    <script>
    (function() {
        // Set default target date to today
        const today = new Date();
        document.getElementById('target-date').value = today.toISOString().split('T')[0];

        // DOM Elements
        const btnCalculate = document.getElementById('btn-calculate');
        const btnReset = document.getElementById('btn-reset');
        const btnCopy = document.getElementById('btn-copy');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');

        // Zodiac signs
        const zodiacSigns = [
            { name: 'Capricorn', emoji: '♑', startMonth: 12, startDay: 22, endMonth: 1, endDay: 19 },
            { name: 'Aquarius', emoji: '♒', startMonth: 1, startDay: 20, endMonth: 2, endDay: 18 },
            { name: 'Pisces', emoji: '♓', startMonth: 2, startDay: 19, endMonth: 3, endDay: 20 },
            { name: 'Aries', emoji: '♈', startMonth: 3, startDay: 21, endMonth: 4, endDay: 19 },
            { name: 'Taurus', emoji: '♉', startMonth: 4, startDay: 20, endMonth: 5, endDay: 20 },
            { name: 'Gemini', emoji: '♊', startMonth: 5, startDay: 21, endMonth: 6, endDay: 20 },
            { name: 'Cancer', emoji: '♋', startMonth: 6, startDay: 21, endMonth: 7, endDay: 22 },
            { name: 'Leo', emoji: '♌', startMonth: 7, startDay: 23, endMonth: 8, endDay: 22 },
            { name: 'Virgo', emoji: '♍', startMonth: 8, startDay: 23, endMonth: 9, endDay: 22 },
            { name: 'Libra', emoji: '♎', startMonth: 9, startDay: 23, endMonth: 10, endDay: 22 },
            { name: 'Scorpio', emoji: '♏', startMonth: 10, startDay: 23, endMonth: 11, endDay: 21 },
            { name: 'Sagittarius', emoji: '♐', startMonth: 11, startDay: 22, endMonth: 12, endDay: 21 },
        ];

        function getZodiacSign(month, day) {
            for (const sign of zodiacSigns) {
                if (sign.startMonth > sign.endMonth) {
                    if ((month === sign.startMonth && day >= sign.startDay) || (month === sign.endMonth && day <= sign.endDay)) return sign;
                } else {
                    if ((month === sign.startMonth && day >= sign.startDay) || (month === sign.endMonth && day <= sign.endDay)) return sign;
                }
            }
            return zodiacSigns[0];
        }

        function calculateAge() {
            const birthInput = document.getElementById('birth-date').value;
            const targetInput = document.getElementById('target-date').value;

            if (!birthInput) {
                alert('Please enter a date of birth.');
                return;
            }

            const birth = new Date(birthInput + 'T00:00:00');
            const target = new Date(targetInput + 'T00:00:00');

            if (birth > target) {
                alert('Date of birth cannot be after the reference date.');
                return;
            }

            const birthYear = birth.getFullYear();
            const targetYear = target.getFullYear();
            const birthMonth = birth.getMonth();
            const birthDay = birth.getDate();
            const targetMonth = target.getMonth();
            const targetDay = target.getDate();

            // Korean age: Current Year - Birth Year + 1
            const koreanAge = targetYear - birthYear + 1;

            // International age
            let internationalAge = targetYear - birthYear;
            if (targetMonth < birthMonth || (targetMonth === birthMonth && targetDay < birthDay)) {
                internationalAge--;
            }

            // Difference
            const difference = koreanAge - internationalAge;

            // Has birthday passed?
            const birthdayPassed = targetMonth > birthMonth || (targetMonth === birthMonth && targetDay >= birthDay);

            // Zodiac
            const zodiac = getZodiacSign(birthMonth + 1, birthDay);

            // Month names
            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

            // Update display
            document.getElementById('korean-age').textContent = koreanAge;
            document.getElementById('international-age').textContent = internationalAge;
            document.getElementById('age-difference').textContent = '+' + difference;

            document.getElementById('birth-year-display').textContent = birthYear;
            document.getElementById('current-year-display').textContent = targetYear;
            document.getElementById('formula-display').textContent = `${targetYear} - ${birthYear} + 1 = ${koreanAge}`;

            document.getElementById('intl-detail').textContent = `${internationalAge} years old`;
            document.getElementById('birthday-status').textContent = birthdayPassed ? 'Already passed' : 'Not yet';
            document.getElementById('zodiac-display').textContent = `${zodiac.emoji} ${zodiac.name}`;

            // Explanation
            const explanation = birthdayPassed
                ? `Your Korean age is ${difference} year${difference !== 1 ? 's' : ''} more than your international age. Since your birthday has already passed this year, the difference is ${difference} year${difference !== 1 ? 's' : ''}.`
                : `Your Korean age is ${difference} years more than your international age. Since your birthday has not yet passed this year, the difference is ${difference} years — you haven't turned ${internationalAge + 1} internationally yet, but Korean age already counts this year.`;
            document.getElementById('explanation-text').textContent = explanation;

            // Summary
            const birthFormatted = `${monthNames[birthMonth]} ${birthDay}, ${birthYear}`;
            const summary = `Born: ${birthFormatted}\nKorean Age: ${koreanAge}\nInternational Age: ${internationalAge}\nDifference: +${difference} year${difference !== 1 ? 's' : ''}\nFormula: ${targetYear} - ${birthYear} + 1 = ${koreanAge}\nZodiac: ${zodiac.emoji} ${zodiac.name}`;
            document.getElementById('summary-text').textContent = summary;

            // Show results
            document.getElementById('results-section').classList.remove('hidden');
        }

        // Event listeners
        btnCalculate.addEventListener('click', calculateAge);

        btnReset.addEventListener('click', function() {
            document.getElementById('birth-date').value = '';
            document.getElementById('target-date').value = new Date().toISOString().split('T')[0];
            document.getElementById('results-section').classList.add('hidden');
            successNotification.classList.add('hidden');
        });

        btnCopy.addEventListener('click', function() {
            const text = document.getElementById('summary-text').textContent;
            if (!text || text === '—') return;
            navigator.clipboard.writeText(text).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                successNotification.classList.remove('hidden');
                successMessage.textContent = 'Copied to clipboard!';
                setTimeout(() => {
                    this.innerHTML = orig;
                    this.classList.remove('text-green-400', 'border-green-400');
                    successNotification.classList.add('hidden');
                }, 2000);
            });
        });
    })();
    </script>
    @endpush
</x-layout>
