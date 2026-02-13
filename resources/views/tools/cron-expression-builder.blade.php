<x-layout>
    <x-slot:title>Cron Expression Builder & Validator - Free Online Tool | hafiz.dev</x-slot:title>
    <x-slot:description>Free online cron expression builder and validator. Build, test, and understand cron schedules easily. See next run times instantly. Perfect for Laravel, Linux, and DevOps.</x-slot:description>
    <x-slot:keywords>cron expression builder, cron generator, crontab generator, cron schedule builder, cron validator, cron parser, laravel scheduler</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/cron-expression-builder') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Cron Expression Builder & Validator - Free Online Tool | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online cron expression builder and validator. Build, test, and understand cron schedules easily. See next run times instantly.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/cron-expression-builder') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Cron Expression Builder & Validator",
            "description": "Free online cron expression builder and validator. Build, test, and understand cron schedules easily. See next run times instantly.",
            "url": "https://hafiz.dev/tools/cron-expression-builder",
            "applicationCategory": "DeveloperApplication",
            "operatingSystem": "Any",
            "offers": {
                "@@type": "Offer",
                "price": "0",
                "priceCurrency": "USD"
            },
            "author": {
                "@@type": "Person",
                "name": "Hafiz Riaz",
                "url": "https://hafiz.dev"
            }
        }
        </script>

        {{-- BreadcrumbList Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "BreadcrumbList",
            "itemListElement": [
                {
                    "@@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "https://hafiz.dev"
                },
                {
                    "@@type": "ListItem",
                    "position": 2,
                    "name": "Tools",
                    "item": "https://hafiz.dev/tools"
                },
                {
                    "@@type": "ListItem",
                    "position": 3,
                    "name": "Cron Expression Builder",
                    "item": "https://hafiz.dev/tools/cron-expression-builder"
                }
            ]
        }
        </script>

        {{-- FAQPage Schema --}}
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
                        "text": "A cron expression is a string of 5 fields representing a schedule. It's used in Unix/Linux systems and many frameworks like Laravel to schedule recurring tasks. Each field represents minute, hour, day of month, month, and day of week."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What does each field mean in a cron expression?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The 5 fields are: Minute (0-59), Hour (0-23), Day of Month (1-31), Month (1-12), and Day of Week (0-6 where 0 is Sunday). Each field can contain specific values, ranges, lists, or wildcards."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What does * mean in cron?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The asterisk (*) means 'every' value for that field. For example, * in the minute field means 'every minute', and * in the hour field means 'every hour'."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What does */5 mean in cron?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The */5 syntax means 'every 5th' value. So */5 in the minutes field means every 5 minutes (0, 5, 10, 15, 20...), and */2 in hours means every 2 hours."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I use cron expressions in Laravel?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "In Laravel, use $schedule->command('name')->cron('* * * * *') in your app/Console/Kernel.php file. Laravel also provides helper methods like ->daily(), ->hourly(), ->weekdays(), and ->at('09:00') for common schedules."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What timezone does this cron builder use?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "This tool uses your browser's local timezone to calculate and display next run times. In production environments like Laravel, you should configure your desired timezone in config/app.php."
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
                    <li class="text-gold">Cron Expression Builder</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Cron Expression Builder</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Build and validate cron expressions with an easy visual interface. See human-readable descriptions and next scheduled run times instantly.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Expression Display --}}
                <div class="mb-6">
                    <label for="cron-expression" class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Cron Expression
                    </label>
                    <div class="flex flex-col sm:flex-row gap-3 mt-2">
                        <div class="flex-1 relative">
                            <input
                                type="text"
                                id="cron-expression"
                                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 font-mono text-xl text-center text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30"
                                value="* * * * *"
                                spellcheck="false"
                                placeholder="* * * * *"
                            >
                            <div class="flex justify-between px-4 mt-1 text-xs text-light-muted">
                                <span>min</span>
                                <span>hour</span>
                                <span>day</span>
                                <span>month</span>
                                <span>dow</span>
                            </div>
                        </div>
                        <button id="btn-copy" class="px-6 py-3 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            Copy
                        </button>
                    </div>
                </div>

                {{-- Human Readable Description --}}
                <div id="description-display" class="mb-6 p-4 rounded-lg bg-gold/10 border border-gold/30 text-center">
                    <p id="human-description" class="text-gold text-lg font-medium">Every minute</p>
                </div>

                {{-- Error Display --}}
                <div id="error-display" class="hidden mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <h4 class="text-red-400 font-semibold mb-1">Invalid Cron Expression</h4>
                            <p id="error-message" class="text-red-300 text-sm"></p>
                        </div>
                    </div>
                </div>

                {{-- Visual Builder --}}
                <div class="mb-6">
                    <h3 class="text-light font-semibold mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                        Visual Builder
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                        {{-- Minute --}}
                        <div class="space-y-2">
                            <label class="block text-light-muted text-sm font-medium">Minute</label>
                            <select id="minute-type" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none cursor-pointer">
                                <option value="*">Every minute (*)</option>
                                <option value="*/n">Every N minutes</option>
                                <option value="specific">Specific minute</option>
                                <option value="range">Range</option>
                                <option value="list">List</option>
                            </select>
                            <input type="text" id="minute-value" class="hidden w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none font-mono" placeholder="0">
                        </div>

                        {{-- Hour --}}
                        <div class="space-y-2">
                            <label class="block text-light-muted text-sm font-medium">Hour</label>
                            <select id="hour-type" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none cursor-pointer">
                                <option value="*">Every hour (*)</option>
                                <option value="*/n">Every N hours</option>
                                <option value="specific">Specific hour</option>
                                <option value="range">Range</option>
                                <option value="list">List</option>
                            </select>
                            <input type="text" id="hour-value" class="hidden w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none font-mono" placeholder="0">
                        </div>

                        {{-- Day of Month --}}
                        <div class="space-y-2">
                            <label class="block text-light-muted text-sm font-medium">Day of Month</label>
                            <select id="dom-type" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none cursor-pointer">
                                <option value="*">Every day (*)</option>
                                <option value="*/n">Every N days</option>
                                <option value="specific">Specific day</option>
                                <option value="range">Range</option>
                                <option value="list">List</option>
                            </select>
                            <input type="text" id="dom-value" class="hidden w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none font-mono" placeholder="1">
                        </div>

                        {{-- Month --}}
                        <div class="space-y-2">
                            <label class="block text-light-muted text-sm font-medium">Month</label>
                            <select id="month-type" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none cursor-pointer">
                                <option value="*">Every month (*)</option>
                                <option value="*/n">Every N months</option>
                                <option value="specific">Specific month</option>
                                <option value="range">Range</option>
                                <option value="list">List</option>
                            </select>
                            <input type="text" id="month-value" class="hidden w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none font-mono" placeholder="1">
                        </div>

                        {{-- Day of Week --}}
                        <div class="space-y-2">
                            <label class="block text-light-muted text-sm font-medium">Day of Week</label>
                            <select id="dow-type" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none cursor-pointer">
                                <option value="*">Every day (*)</option>
                                <option value="specific">Specific day</option>
                                <option value="range">Range</option>
                                <option value="list">List</option>
                            </select>
                            <input type="text" id="dow-value" class="hidden w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold focus:outline-none font-mono" placeholder="0">
                        </div>
                    </div>
                </div>

                {{-- Common Presets --}}
                <div class="mb-6">
                    <h3 class="text-light font-semibold mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Common Presets
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="* * * * *">Every minute</button>
                        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="*/5 * * * *">Every 5 minutes</button>
                        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="0 * * * *">Every hour</button>
                        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="0 0 * * *">Daily at midnight</button>
                        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="0 9 * * *">Daily at 9 AM</button>
                        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="0 9 * * 1">Monday at 9 AM</button>
                        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="0 9 * * 1-5">Weekdays at 9 AM</button>
                        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="0 0 1 * *">Monthly (1st)</button>
                        <button class="preset-btn px-3 py-2 text-sm border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold hover:border-gold transition-all duration-300 cursor-pointer" data-cron="0 0 * * 0">Sunday at midnight</button>
                    </div>
                </div>

                {{-- Next Run Times --}}
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-light font-semibold mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Next 5 Run Times
                        </h3>
                        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
                            <ul id="next-runs" class="space-y-2 font-mono text-sm">
                                <li class="text-light-muted">Calculating...</li>
                            </ul>
                        </div>
                        <p class="text-light-muted/70 text-xs mt-2">Times shown in your local timezone</p>
                    </div>

                    {{-- Laravel Usage --}}
                    <div>
                        <h3 class="text-light font-semibold mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            Laravel Usage
                        </h3>
                        <div class="bg-darkBg rounded-lg border border-gold/10 p-4">
                            <pre class="text-sm overflow-x-auto"><code id="laravel-code" class="text-light"><span class="text-purple-400">$schedule</span><span class="text-light">-></span><span class="text-gold">command</span><span class="text-light">(</span><span class="text-sky-400">'your:command'</span><span class="text-light">)</span>
    <span class="text-light">-></span><span class="text-gold">cron</span><span class="text-light">(</span><span class="text-sky-400">'* * * * *'</span><span class="text-light">);</span></code></pre>
                            <div id="laravel-alternative" class="mt-3 pt-3 border-t border-gold/10">
                                <p class="text-light-muted text-xs mb-2">Or using Laravel helpers:</p>
                                <pre class="text-sm overflow-x-auto"><code id="laravel-helper" class="text-light"><span class="text-purple-400">$schedule</span><span class="text-light">-></span><span class="text-gold">command</span><span class="text-light">(</span><span class="text-sky-400">'your:command'</span><span class="text-light">)</span>
    <span class="text-light">-></span><span class="text-gold">everyMinute</span><span class="text-light">();</span></code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Reference Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <h2 class="text-xl font-bold text-light mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Cron Field Reference
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gold/20">
                                <th class="text-left py-3 px-4 text-gold font-semibold">Field</th>
                                <th class="text-left py-3 px-4 text-gold font-semibold">Values</th>
                                <th class="text-left py-3 px-4 text-gold font-semibold">Special Characters</th>
                            </tr>
                        </thead>
                        <tbody class="text-light-muted">
                            <tr class="border-b border-gold/10">
                                <td class="py-3 px-4 text-light">Minute</td>
                                <td class="py-3 px-4 font-mono">0-59</td>
                                <td class="py-3 px-4 font-mono">* , - /</td>
                            </tr>
                            <tr class="border-b border-gold/10">
                                <td class="py-3 px-4 text-light">Hour</td>
                                <td class="py-3 px-4 font-mono">0-23</td>
                                <td class="py-3 px-4 font-mono">* , - /</td>
                            </tr>
                            <tr class="border-b border-gold/10">
                                <td class="py-3 px-4 text-light">Day of Month</td>
                                <td class="py-3 px-4 font-mono">1-31</td>
                                <td class="py-3 px-4 font-mono">* , - /</td>
                            </tr>
                            <tr class="border-b border-gold/10">
                                <td class="py-3 px-4 text-light">Month</td>
                                <td class="py-3 px-4 font-mono">1-12</td>
                                <td class="py-3 px-4 font-mono">* , - /</td>
                            </tr>
                            <tr>
                                <td class="py-3 px-4 text-light">Day of Week</td>
                                <td class="py-3 px-4 font-mono">0-6 <span class="text-light-muted/70">(Sun=0)</span></td>
                                <td class="py-3 px-4 font-mono">* , - /</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 grid sm:grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
                        <span class="text-gold font-mono">*</span>
                        <span class="text-light-muted ml-2">Every value</span>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
                        <span class="text-gold font-mono">,</span>
                        <span class="text-light-muted ml-2">List (1,3,5)</span>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
                        <span class="text-gold font-mono">-</span>
                        <span class="text-light-muted ml-2">Range (1-5)</span>
                    </div>
                    <div class="bg-darkBg rounded-lg p-3 border border-gold/10">
                        <span class="text-gold font-mono">/</span>
                        <span class="text-light-muted ml-2">Step (*/5)</span>
                    </div>
                </div>
            </div>

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">100%</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Client-Side</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Your data never touches our servers.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">Free</div>
                    <h3 class="text-lg font-semibold text-light mb-2">No Signup</h3>
                    <p class="text-light-muted text-sm">Use unlimited times without creating an account. No ads, no tracking.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">Fast</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant Results</h3>
                    <p class="text-light-muted text-sm">Build and validate cron expressions instantly with real-time updates.</p>
                </div>
            </div>

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

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
                            A cron expression is a string of 5 fields representing a schedule. It's used in Unix/Linux systems and many frameworks like Laravel to schedule recurring tasks. Each field represents a time unit: minute (0-59), hour (0-23), day of month (1-31), month (1-12), and day of week (0-6, where 0 is Sunday).
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What does each field mean?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The 5 fields are: <strong class="text-light">Minute</strong> (0-59), <strong class="text-light">Hour</strong> (0-23), <strong class="text-light">Day of Month</strong> (1-31), <strong class="text-light">Month</strong> (1-12), and <strong class="text-light">Day of Week</strong> (0-6 where 0 is Sunday). Each field can contain specific values, ranges (1-5), lists (1,3,5), or wildcards (*).
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What does * mean in cron?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The asterisk (*) means "every" value for that field. For example, * in the minute field means "every minute", and * in the hour field means "every hour". So <code class="text-gold bg-darkBg px-1 rounded">* * * * *</code> runs every minute of every hour of every day.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What does */5 mean?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The <code class="text-gold bg-darkBg px-1 rounded">*/5</code> syntax means "every 5th" value. So <code class="text-gold bg-darkBg px-1 rounded">*/5</code> in the minutes field means every 5 minutes (0, 5, 10, 15, 20...). Similarly, <code class="text-gold bg-darkBg px-1 rounded">*/2</code> in hours means every 2 hours, and <code class="text-gold bg-darkBg px-1 rounded">*/3</code> in months means every 3 months.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I use this in Laravel?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            In Laravel, use <code class="text-gold bg-darkBg px-1 rounded">$schedule->command('name')->cron('* * * * *')</code> in your <code class="text-light bg-darkBg px-1 rounded">app/Console/Kernel.php</code> file. Laravel also provides convenient helper methods like <code class="text-gold bg-darkBg px-1 rounded">->daily()</code>, <code class="text-gold bg-darkBg px-1 rounded">->hourly()</code>, <code class="text-gold bg-darkBg px-1 rounded">->weekdays()</code>, and <code class="text-gold bg-darkBg px-1 rounded">->at('09:00')</code> for common schedules.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What timezone does this use?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            This tool uses your browser's local timezone to calculate and display next run times. In production environments, cron jobs typically run in the server's timezone. In Laravel, you can configure your desired timezone in <code class="text-light bg-darkBg px-1 rounded">config/app.php</code> or set it per-schedule using <code class="text-gold bg-darkBg px-1 rounded">->timezone('America/New_York')</code>.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.cron-expression-builder-script')
    @endpush
</x-layout>
