<x-layout>
    <x-slot:title>Crontab Guru - Cron Expression Editor & Explainer | hafiz.dev</x-slot:title>
    <x-slot:description>Free online cron expression editor. Build, validate, and understand crontab schedules with human-readable explanations and next run times. No signup required.</x-slot:description>
    <x-slot:keywords>crontab guru, cron expression, crontab editor, cron schedule, crontab generator, cron job scheduler, crontab every 5 minutes, crontab every hour</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/crontab-guru') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Crontab Guru - Cron Expression Editor & Explainer | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online cron expression editor. Build and understand crontab schedules with human-readable explanations.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/crontab-guru') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Crontab Guru",
            "description": "Free online cron expression editor. Build, validate, and understand crontab schedules.",
            "url": "https://hafiz.dev/tools/crontab-guru",
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
                { "@@type": "ListItem", "position": 3, "name": "Crontab Guru", "item": "https://hafiz.dev/tools/crontab-guru" }
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
                    "name": "What is a cron expression?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A cron expression is a string of five fields separated by spaces that defines a schedule for automated tasks. The five fields represent minute (0-59), hour (0-23), day of month (1-31), month (1-12), and day of week (0-6, where 0 is Sunday)."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I set a cron job to run every 5 minutes?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Use the expression */5 * * * * to run a cron job every 5 minutes. The */5 in the minute field means 'every 5th minute'. You can change the number to any interval you need."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What does the asterisk (*) mean in crontab?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The asterisk (*) is a wildcard that means 'every possible value' for that field. For example, * in the hour field means every hour, and * in the day of month field means every day."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I schedule a cron job for a specific day of the week?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Use the day of week field (the fifth field) with values 0-6 where 0 is Sunday, 1 is Monday, etc. For example, 0 9 * * 1 runs at 9:00 AM every Monday. You can use names like MON, TUE, etc."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I use multiple values in a cron field?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! You can use commas for lists (1,3,5), hyphens for ranges (1-5), slashes for steps (*/10), and combine them. For example, 0 9-17 * * 1-5 runs at the start of every hour from 9 AM to 5 PM on weekdays."
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
                    <li class="text-gold">Crontab Guru</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Crontab Guru</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Build, validate, and understand cron expressions with human-readable explanations and next scheduled run times.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Cron Expression Input --}}
                <div class="mb-6">
                    <label for="cron-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Cron Expression
                    </label>
                    <div class="flex gap-3">
                        <input
                            type="text"
                            id="cron-input"
                            class="flex-1 bg-darkBg border border-gold/20 rounded-lg px-4 py-3 font-mono text-lg text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30"
                            value="* * * * *"
                            spellcheck="false"
                            autocomplete="off"
                        >
                    </div>
                </div>

                {{-- 5-Field Labels --}}
                <div class="mb-6 grid grid-cols-5 gap-2 text-center">
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
                        <div id="field-minute" class="text-xl font-mono font-bold text-gold mb-1">*</div>
                        <div class="text-xs text-light-muted uppercase tracking-wider">Minute</div>
                        <div class="text-xs text-light-muted/60 mt-1">0–59</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
                        <div id="field-hour" class="text-xl font-mono font-bold text-light mb-1">*</div>
                        <div class="text-xs text-light-muted uppercase tracking-wider">Hour</div>
                        <div class="text-xs text-light-muted/60 mt-1">0–23</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
                        <div id="field-dom" class="text-xl font-mono font-bold text-light mb-1">*</div>
                        <div class="text-xs text-light-muted uppercase tracking-wider">Day (Month)</div>
                        <div class="text-xs text-light-muted/60 mt-1">1–31</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
                        <div id="field-month" class="text-xl font-mono font-bold text-light mb-1">*</div>
                        <div class="text-xs text-light-muted uppercase tracking-wider">Month</div>
                        <div class="text-xs text-light-muted/60 mt-1">1–12</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
                        <div id="field-dow" class="text-xl font-mono font-bold text-light mb-1">*</div>
                        <div class="text-xs text-light-muted uppercase tracking-wider">Day (Week)</div>
                        <div class="text-xs text-light-muted/60 mt-1">0–6</div>
                    </div>
                </div>

                {{-- Human-Readable Explanation --}}
                <div id="explanation-box" class="mb-6 bg-darkBg rounded-lg p-4 border border-gold/10">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gold mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <div class="text-xs text-light-muted uppercase tracking-wider mb-1">Meaning</div>
                            <div id="explanation" class="text-light font-medium text-lg">Every minute</div>
                        </div>
                    </div>
                </div>

                {{-- Error Box --}}
                <div id="error-box" class="hidden mb-6 bg-red-900/20 rounded-lg p-4 border border-red-500/30">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <div class="text-xs text-red-400 uppercase tracking-wider mb-1">Error</div>
                            <div id="error-text" class="text-red-300"></div>
                        </div>
                    </div>
                </div>

                {{-- Next Run Times --}}
                <div id="next-runs-box" class="mb-6 bg-darkBg rounded-lg p-4 border border-gold/10">
                    <div class="text-xs text-light-muted uppercase tracking-wider mb-3">Next 5 Scheduled Runs</div>
                    <div id="next-runs" class="space-y-2">
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy Expression
                    </button>
                    <button id="btn-reset" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        Reset
                    </button>
                </div>

                {{-- Success Notification --}}
                <div id="success-notification" class="hidden bg-green-900/20 border border-green-500/30 rounded-lg p-3 flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span id="success-message" class="text-green-400 text-sm">Copied to clipboard!</span>
                </div>

                {{-- Common Presets --}}
                <div class="mt-6">
                    <div class="text-xs text-light-muted uppercase tracking-wider mb-3">Common Presets</div>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-2">
                        <button data-cron="* * * * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <div class="font-mono text-sm text-gold">* * * * *</div>
                            <div class="text-xs text-light-muted mt-1">Every minute</div>
                        </button>
                        <button data-cron="*/5 * * * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <div class="font-mono text-sm text-gold">*/5 * * * *</div>
                            <div class="text-xs text-light-muted mt-1">Every 5 minutes</div>
                        </button>
                        <button data-cron="*/15 * * * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <div class="font-mono text-sm text-gold">*/15 * * * *</div>
                            <div class="text-xs text-light-muted mt-1">Every 15 minutes</div>
                        </button>
                        <button data-cron="0 * * * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <div class="font-mono text-sm text-gold">0 * * * *</div>
                            <div class="text-xs text-light-muted mt-1">Every hour</div>
                        </button>
                        <button data-cron="0 0 * * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <div class="font-mono text-sm text-gold">0 0 * * *</div>
                            <div class="text-xs text-light-muted mt-1">Every day at midnight</div>
                        </button>
                        <button data-cron="0 9 * * 1-5" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <div class="font-mono text-sm text-gold">0 9 * * 1-5</div>
                            <div class="text-xs text-light-muted mt-1">Weekdays at 9:00 AM</div>
                        </button>
                        <button data-cron="0 0 * * 0" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <div class="font-mono text-sm text-gold">0 0 * * 0</div>
                            <div class="text-xs text-light-muted mt-1">Every Sunday at midnight</div>
                        </button>
                        <button data-cron="0 0 1 * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <div class="font-mono text-sm text-gold">0 0 1 * *</div>
                            <div class="text-xs text-light-muted mt-1">First day of every month</div>
                        </button>
                        <button data-cron="0 0 1 1 *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <div class="font-mono text-sm text-gold">0 0 1 1 *</div>
                            <div class="text-xs text-light-muted mt-1">Every year (Jan 1st)</div>
                        </button>
                        <button data-cron="30 4 * * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <div class="font-mono text-sm text-gold">30 4 * * *</div>
                            <div class="text-xs text-light-muted mt-1">Every day at 4:30 AM</div>
                        </button>
                        <button data-cron="0 */6 * * *" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <div class="font-mono text-sm text-gold">0 */6 * * *</div>
                            <div class="text-xs text-light-muted mt-1">Every 6 hours</div>
                        </button>
                        <button data-cron="0 8-17 * * 1-5" class="preset-btn text-left bg-darkBg rounded-lg p-3 border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer">
                            <div class="font-mono text-sm text-gold">0 8-17 * * 1-5</div>
                            <div class="text-xs text-light-muted mt-1">Business hours (hourly)</div>
                        </button>
                    </div>
                </div>

                {{-- Quick Reference --}}
                <div class="mt-6 bg-darkBg rounded-lg p-4 border border-gold/10">
                    <div class="text-xs text-light-muted uppercase tracking-wider mb-3">Quick Reference</div>
                    <div class="grid sm:grid-cols-2 gap-x-8 gap-y-1 text-sm">
                        <div class="flex justify-between py-1 border-b border-gold/5">
                            <span class="text-light-muted">Wildcard (any)</span>
                            <span class="font-mono text-gold">*</span>
                        </div>
                        <div class="flex justify-between py-1 border-b border-gold/5">
                            <span class="text-light-muted">List</span>
                            <span class="font-mono text-gold">1,3,5</span>
                        </div>
                        <div class="flex justify-between py-1 border-b border-gold/5">
                            <span class="text-light-muted">Range</span>
                            <span class="font-mono text-gold">1-5</span>
                        </div>
                        <div class="flex justify-between py-1 border-b border-gold/5">
                            <span class="text-light-muted">Step</span>
                            <span class="font-mono text-gold">*/10</span>
                        </div>
                        <div class="flex justify-between py-1 border-b border-gold/5">
                            <span class="text-light-muted">Range + Step</span>
                            <span class="font-mono text-gold">1-30/5</span>
                        </div>
                        <div class="flex justify-between py-1 border-b border-gold/5">
                            <span class="text-light-muted">Days of week</span>
                            <span class="font-mono text-gold">0=Sun ... 6=Sat</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Related Tools (Dynamic) --}}
            <x-related-tools :tool="$tool" />

            {{-- Features --}}
            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 text-center">
                    <div class="text-3xl mb-3">🕐</div>
                    <h3 class="text-light font-semibold mb-2">Real-Time Parsing</h3>
                    <p class="text-light-muted text-sm">See human-readable explanations and next run times as you type your cron expression.</p>
                </div>
                <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 text-center">
                    <div class="text-3xl mb-3">📋</div>
                    <h3 class="text-light font-semibold mb-2">Common Presets</h3>
                    <p class="text-light-muted text-sm">Quick-load popular schedules like every 5 minutes, hourly, daily, weekly, and monthly.</p>
                </div>
                <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 text-center">
                    <div class="text-3xl mb-3">🔒</div>
                    <h3 class="text-light font-semibold mb-2">100% Client-Side</h3>
                    <p class="text-light-muted text-sm">All parsing happens in your browser. Nothing is sent to any server. Fast and private.</p>
                </div>
            </div>

            {{-- CTA Section --}}
            <x-tool-cta />

            {{-- FAQ Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Frequently Asked Questions</h2>

                <div class="space-y-4 max-w-3xl mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is a cron expression?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A cron expression is a string of five fields separated by spaces that defines a schedule for automated tasks (cron jobs) on Unix/Linux systems. The five fields represent: minute (0-59), hour (0-23), day of month (1-31), month (1-12), and day of week (0-6, where 0 is Sunday). Special characters like *, /, -, and commas allow flexible scheduling patterns.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I set a cron job to run every 5 minutes?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Use the expression <code class="text-gold bg-darkBg px-1 rounded">*/5 * * * *</code>. The <code class="text-gold bg-darkBg px-1 rounded">*/5</code> in the minute field means "every 5th minute". Similarly, <code class="text-gold bg-darkBg px-1 rounded">*/10 * * * *</code> runs every 10 minutes, and <code class="text-gold bg-darkBg px-1 rounded">*/15 * * * *</code> runs every 15 minutes.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What does the asterisk (*) mean in crontab?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The asterisk (*) is a wildcard that means "every possible value" for that field. For example, <code class="text-gold bg-darkBg px-1 rounded">*</code> in the hour field means every hour (0-23), and <code class="text-gold bg-darkBg px-1 rounded">*</code> in the day of month field means every day (1-31). An expression of <code class="text-gold bg-darkBg px-1 rounded">* * * * *</code> means every minute of every hour of every day.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I schedule a cron job for weekdays only?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Use the day of week field (5th field) with the range <code class="text-gold bg-darkBg px-1 rounded">1-5</code>, where 1 is Monday and 5 is Friday. For example, <code class="text-gold bg-darkBg px-1 rounded">0 9 * * 1-5</code> runs at 9:00 AM every weekday. You can also use names: <code class="text-gold bg-darkBg px-1 rounded">0 9 * * MON-FRI</code>.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I combine multiple values in a cron field?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! You can use commas for lists (<code class="text-gold bg-darkBg px-1 rounded">1,3,5</code>), hyphens for ranges (<code class="text-gold bg-darkBg px-1 rounded">1-5</code>), and slashes for steps (<code class="text-gold bg-darkBg px-1 rounded">*/10</code>). These can be combined: <code class="text-gold bg-darkBg px-1 rounded">0 9-17 * * 1-5</code> runs every hour from 9 AM to 5 PM on weekdays.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        const cronInput = document.getElementById('cron-input');
        const fieldMinute = document.getElementById('field-minute');
        const fieldHour = document.getElementById('field-hour');
        const fieldDom = document.getElementById('field-dom');
        const fieldMonth = document.getElementById('field-month');
        const fieldDow = document.getElementById('field-dow');
        const explanationBox = document.getElementById('explanation-box');
        const explanationEl = document.getElementById('explanation');
        const errorBox = document.getElementById('error-box');
        const errorText = document.getElementById('error-text');
        const nextRunsBox = document.getElementById('next-runs-box');
        const nextRunsEl = document.getElementById('next-runs');
        const btnCopy = document.getElementById('btn-copy');
        const btnReset = document.getElementById('btn-reset');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');

        const MONTHS = ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const DAYS = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const MONTH_NAMES = { JAN:1, FEB:2, MAR:3, APR:4, MAY:5, JUN:6, JUL:7, AUG:8, SEP:9, OCT:10, NOV:11, DEC:12 };
        const DAY_NAMES = { SUN:0, MON:1, TUE:2, WED:3, THU:4, FRI:5, SAT:6 };

        function replaceNames(expr) {
            let result = expr.toUpperCase();
            for (const [name, num] of Object.entries(MONTH_NAMES)) {
                result = result.replace(new RegExp('\\b' + name + '\\b', 'g'), num);
            }
            for (const [name, num] of Object.entries(DAY_NAMES)) {
                result = result.replace(new RegExp('\\b' + name + '\\b', 'g'), num);
            }
            return result;
        }

        function parseField(field, min, max) {
            field = replaceNames(field);
            const values = new Set();
            const parts = field.split(',');
            for (const part of parts) {
                if (part === '*') {
                    for (let i = min; i <= max; i++) values.add(i);
                } else if (part.includes('/')) {
                    const [range, stepStr] = part.split('/');
                    const step = parseInt(stepStr);
                    if (isNaN(step) || step <= 0) throw new Error(`Invalid step: ${stepStr}`);
                    let start = min, end = max;
                    if (range !== '*') {
                        if (range.includes('-')) {
                            [start, end] = range.split('-').map(Number);
                        } else {
                            start = parseInt(range);
                            end = max;
                        }
                    }
                    if (isNaN(start) || isNaN(end)) throw new Error(`Invalid range: ${range}`);
                    for (let i = start; i <= end; i += step) values.add(i);
                } else if (part.includes('-')) {
                    const [startStr, endStr] = part.split('-');
                    const start = parseInt(startStr), end = parseInt(endStr);
                    if (isNaN(start) || isNaN(end)) throw new Error(`Invalid range: ${part}`);
                    if (start < min || end > max) throw new Error(`Value out of range: ${part}`);
                    for (let i = start; i <= end; i++) values.add(i);
                } else {
                    const val = parseInt(part);
                    if (isNaN(val)) throw new Error(`Invalid value: ${part}`);
                    if (val < min || val > max) throw new Error(`Value out of range: ${val} (${min}-${max})`);
                    values.add(val);
                }
            }
            return Array.from(values).sort((a, b) => a - b);
        }

        function describeCron(parts) {
            const [minF, hourF, domF, monthF, dowF] = parts;
            const pieces = [];

            // Minute description
            if (minF === '*') {
                pieces.push('Every minute');
            } else if (minF.startsWith('*/')) {
                pieces.push(`Every ${minF.slice(2)} minutes`);
            } else if (minF.includes(',')) {
                pieces.push(`At minutes ${minF}`);
            } else if (minF.includes('-') && !minF.includes('/')) {
                pieces.push(`Every minute from ${minF.split('-')[0]} through ${minF.split('-')[1]}`);
            } else if (minF.includes('/')) {
                pieces.push(`Every ${minF.split('/')[1]} minutes`);
            } else {
                pieces.push(`At minute ${minF}`);
            }

            // Hour
            if (hourF !== '*') {
                if (hourF.startsWith('*/')) {
                    pieces.push(`past every ${hourF.slice(2)} hours`);
                } else if (hourF.includes('-') && !hourF.includes('/')) {
                    const [s, e] = hourF.split('-');
                    pieces.push(`during hours ${formatHour(parseInt(s))}–${formatHour(parseInt(e))}`);
                } else if (hourF.includes(',')) {
                    const hrs = hourF.split(',').map(h => formatHour(parseInt(h))).join(', ');
                    pieces.push(`at ${hrs}`);
                } else {
                    const h = parseInt(hourF);
                    if (minF !== '*' && !minF.includes('/') && !minF.includes(',') && !minF.includes('-')) {
                        // Replace "At minute X" with actual time
                        pieces[0] = `At ${formatTime(h, parseInt(minF))}`;
                    } else {
                        pieces.push(`past hour ${formatHour(h)}`);
                    }
                }
            }

            // Day of month
            if (domF !== '*') {
                if (domF.startsWith('*/')) {
                    pieces.push(`every ${domF.slice(2)} days`);
                } else if (domF.includes(',')) {
                    pieces.push(`on days ${domF} of the month`);
                } else if (domF.includes('-')) {
                    const [s, e] = domF.split('-');
                    pieces.push(`on days ${s}–${e} of the month`);
                } else {
                    pieces.push(`on day ${domF} of the month`);
                }
            }

            // Month
            if (monthF !== '*') {
                const monthStr = replaceNames(monthF);
                if (monthStr.startsWith('*/')) {
                    pieces.push(`every ${monthStr.slice(2)} months`);
                } else if (monthStr.includes(',')) {
                    const ms = monthStr.split(',').map(m => MONTHS[parseInt(m)] || m).join(', ');
                    pieces.push(`in ${ms}`);
                } else if (monthStr.includes('-')) {
                    const [s, e] = monthStr.split('-');
                    pieces.push(`in ${MONTHS[parseInt(s)] || s}–${MONTHS[parseInt(e)] || e}`);
                } else {
                    pieces.push(`in ${MONTHS[parseInt(monthStr)] || monthStr}`);
                }
            }

            // Day of week
            if (dowF !== '*') {
                const dowStr = replaceNames(dowF);
                if (dowStr.includes(',')) {
                    const ds = dowStr.split(',').map(d => DAYS[parseInt(d)] || d).join(', ');
                    pieces.push(`on ${ds}`);
                } else if (dowStr.includes('-')) {
                    const [s, e] = dowStr.split('-');
                    pieces.push(`on ${DAYS[parseInt(s)] || s}–${DAYS[parseInt(e)] || e}`);
                } else {
                    pieces.push(`on ${DAYS[parseInt(dowStr)] || dowStr}`);
                }
            }

            return pieces.join(', ');
        }

        function formatHour(h) {
            if (h === 0) return '12:00 AM';
            if (h === 12) return '12:00 PM';
            return h > 12 ? `${h - 12}:00 PM` : `${h}:00 AM`;
        }

        function formatTime(h, m) {
            const period = h >= 12 ? 'PM' : 'AM';
            const hour12 = h === 0 ? 12 : h > 12 ? h - 12 : h;
            return `${hour12}:${String(m).padStart(2, '0')} ${period}`;
        }

        function getNextRuns(minutes, hours, doms, months, dows, count) {
            const runs = [];
            const now = new Date();
            const candidate = new Date(now);
            candidate.setSeconds(0);
            candidate.setMilliseconds(0);
            candidate.setMinutes(candidate.getMinutes() + 1);

            let maxIter = 525960; // ~1 year of minutes
            while (runs.length < count && maxIter-- > 0) {
                const m = candidate.getMinutes();
                const h = candidate.getHours();
                const dom = candidate.getDate();
                const mon = candidate.getMonth() + 1;
                const dow = candidate.getDay();

                if (months.includes(mon) && doms.includes(dom) && dows.includes(dow) && hours.includes(h) && minutes.includes(m)) {
                    runs.push(new Date(candidate));
                }
                candidate.setMinutes(candidate.getMinutes() + 1);
            }
            return runs;
        }

        function formatRunDate(date) {
            const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const day = days[date.getDay()];
            const mon = months[date.getMonth()];
            const d = date.getDate();
            const y = date.getFullYear();
            const h = date.getHours();
            const m = date.getMinutes();
            const period = h >= 12 ? 'PM' : 'AM';
            const h12 = h === 0 ? 12 : h > 12 ? h - 12 : h;
            return `${day}, ${mon} ${d}, ${y} at ${h12}:${String(m).padStart(2, '0')} ${period}`;
        }

        function update() {
            const raw = cronInput.value.trim();
            const parts = raw.split(/\s+/);

            // Reset field highlights
            [fieldMinute, fieldHour, fieldDom, fieldMonth, fieldDow].forEach(f => {
                f.classList.remove('text-red-400');
            });

            if (parts.length !== 5) {
                showError(`Expected 5 fields, got ${parts.length}. Format: minute hour day month weekday`);
                fieldMinute.textContent = parts[0] || '?';
                fieldHour.textContent = parts[1] || '?';
                fieldDom.textContent = parts[2] || '?';
                fieldMonth.textContent = parts[3] || '?';
                fieldDow.textContent = parts[4] || '?';
                return;
            }

            fieldMinute.textContent = parts[0];
            fieldHour.textContent = parts[1];
            fieldDom.textContent = parts[2];
            fieldMonth.textContent = parts[3];
            fieldDow.textContent = parts[4];

            try {
                const minutes = parseField(parts[0], 0, 59);
                const hours = parseField(parts[1], 0, 23);
                const doms = parseField(parts[2], 1, 31);
                const months = parseField(parts[3], 1, 12);
                const dows = parseField(parts[4], 0, 6);

                // Show explanation
                const desc = describeCron(parts);
                explanationEl.textContent = desc;
                explanationBox.classList.remove('hidden');
                errorBox.classList.add('hidden');

                // Show next runs
                const runs = getNextRuns(minutes, hours, doms, months, dows, 5);
                nextRunsEl.innerHTML = '';
                if (runs.length > 0) {
                    runs.forEach((run, i) => {
                        const div = document.createElement('div');
                        div.className = 'flex items-center gap-3 text-sm';
                        div.innerHTML = `<span class="text-gold font-mono w-6">${i + 1}.</span><span class="text-light">${formatRunDate(run)}</span>`;
                        nextRunsEl.appendChild(div);
                    });
                    nextRunsBox.classList.remove('hidden');
                } else {
                    nextRunsBox.classList.add('hidden');
                }
            } catch (e) {
                showError(e.message);
            }
        }

        function showError(msg) {
            explanationBox.classList.add('hidden');
            nextRunsBox.classList.add('hidden');
            errorBox.classList.remove('hidden');
            errorText.textContent = msg;
        }

        cronInput.addEventListener('input', update);

        // Preset buttons
        document.querySelectorAll('.preset-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                cronInput.value = this.dataset.cron;
                update();
            });
        });

        // Copy
        btnCopy.addEventListener('click', function() {
            const expr = cronInput.value.trim();
            if (!expr) return;
            navigator.clipboard.writeText(expr).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                successNotification.classList.remove('hidden');
                successMessage.textContent = 'Expression copied to clipboard!';
                setTimeout(() => {
                    this.innerHTML = orig;
                    this.classList.remove('text-green-400', 'border-green-400');
                    successNotification.classList.add('hidden');
                }, 2000);
            });
        });

        // Reset
        btnReset.addEventListener('click', function() {
            cronInput.value = '* * * * *';
            update();
        });

        // Initial parse
        update();
    })();
    </script>
    @endpush
</x-layout>
