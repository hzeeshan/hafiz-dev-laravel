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
    <script>
    (function() {
        // DOM Elements
        const cronExpression = document.getElementById('cron-expression');
        const humanDescription = document.getElementById('human-description');
        const descriptionDisplay = document.getElementById('description-display');
        const errorDisplay = document.getElementById('error-display');
        const errorMessage = document.getElementById('error-message');
        const nextRunsList = document.getElementById('next-runs');
        const laravelCode = document.getElementById('laravel-code');
        const laravelHelper = document.getElementById('laravel-helper');
        const laravelAlternative = document.getElementById('laravel-alternative');
        const btnCopy = document.getElementById('btn-copy');

        // Visual builder elements
        const minuteType = document.getElementById('minute-type');
        const minuteValue = document.getElementById('minute-value');
        const hourType = document.getElementById('hour-type');
        const hourValue = document.getElementById('hour-value');
        const domType = document.getElementById('dom-type');
        const domValue = document.getElementById('dom-value');
        const monthType = document.getElementById('month-type');
        const monthValue = document.getElementById('month-value');
        const dowType = document.getElementById('dow-type');
        const dowValue = document.getElementById('dow-value');

        const presetButtons = document.querySelectorAll('.preset-btn');

        // Day names
        const dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const dayNamesShort = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        // Parse cron expression into parts
        function parseCron(expression) {
            const parts = expression.trim().split(/\s+/);
            if (parts.length !== 5) {
                throw new Error('Cron expression must have exactly 5 fields');
            }
            return {
                minute: parts[0],
                hour: parts[1],
                dayOfMonth: parts[2],
                month: parts[3],
                dayOfWeek: parts[4]
            };
        }

        // Validate a single cron field
        function validateField(value, min, max, fieldName) {
            if (value === '*') return true;

            // Step value (*/n or n/m)
            if (value.includes('/')) {
                const [base, step] = value.split('/');
                if (base !== '*' && !validateField(base, min, max, fieldName)) return false;
                const stepNum = parseInt(step, 10);
                if (isNaN(stepNum) || stepNum < 1) {
                    throw new Error(`Invalid step value in ${fieldName}: ${step}`);
                }
                return true;
            }

            // Range (n-m)
            if (value.includes('-')) {
                const [start, end] = value.split('-').map(v => parseInt(v, 10));
                if (isNaN(start) || isNaN(end) || start < min || end > max || start > end) {
                    throw new Error(`Invalid range in ${fieldName}: ${value}`);
                }
                return true;
            }

            // List (n,m,o)
            if (value.includes(',')) {
                const values = value.split(',');
                for (const v of values) {
                    if (!validateField(v.trim(), min, max, fieldName)) return false;
                }
                return true;
            }

            // Single value
            const num = parseInt(value, 10);
            if (isNaN(num) || num < min || num > max) {
                throw new Error(`Invalid value in ${fieldName}: ${value} (must be ${min}-${max})`);
            }
            return true;
        }

        // Validate entire cron expression
        function validateCron(expression) {
            const parts = parseCron(expression);
            validateField(parts.minute, 0, 59, 'minute');
            validateField(parts.hour, 0, 23, 'hour');
            validateField(parts.dayOfMonth, 1, 31, 'day of month');
            validateField(parts.month, 1, 12, 'month');
            validateField(parts.dayOfWeek, 0, 6, 'day of week');
            return parts;
        }

        // Generate human-readable description
        function describeCron(expression) {
            try {
                const parts = parseCron(expression);
                const { minute, hour, dayOfMonth, month, dayOfWeek } = parts;

                let description = '';

                // Time description
                if (minute === '*' && hour === '*') {
                    description = 'Every minute';
                } else if (minute.startsWith('*/')) {
                    const step = minute.split('/')[1];
                    description = `Every ${step} minutes`;
                } else if (hour === '*') {
                    description = `At minute ${minute} of every hour`;
                } else if (minute === '0' && hour !== '*') {
                    const hourDesc = describeHour(hour);
                    description = `At ${hourDesc}`;
                } else {
                    const hourDesc = describeHour(hour);
                    description = `At ${formatMinute(minute)} past ${hourDesc}`;
                }

                // Day of week
                if (dayOfWeek !== '*') {
                    description += `, ${describeDayOfWeek(dayOfWeek)}`;
                }

                // Day of month
                if (dayOfMonth !== '*') {
                    if (dayOfMonth.includes('-')) {
                        const [start, end] = dayOfMonth.split('-');
                        description += `, on days ${start}-${end} of the month`;
                    } else if (dayOfMonth.includes(',')) {
                        description += `, on days ${dayOfMonth} of the month`;
                    } else if (dayOfMonth.startsWith('*/')) {
                        const step = dayOfMonth.split('/')[1];
                        description += `, every ${step} days`;
                    } else {
                        const suffix = getOrdinalSuffix(parseInt(dayOfMonth, 10));
                        description += `, on the ${dayOfMonth}${suffix}`;
                    }
                }

                // Month
                if (month !== '*') {
                    if (month.includes('-')) {
                        const [start, end] = month.split('-');
                        description += `, ${monthNames[parseInt(start, 10) - 1]} through ${monthNames[parseInt(end, 10) - 1]}`;
                    } else if (month.includes(',')) {
                        const months = month.split(',').map(m => monthNames[parseInt(m, 10) - 1]).join(', ');
                        description += `, in ${months}`;
                    } else if (month.startsWith('*/')) {
                        const step = month.split('/')[1];
                        description += `, every ${step} months`;
                    } else {
                        description += `, in ${monthNames[parseInt(month, 10) - 1]}`;
                    }
                }

                return description;
            } catch (e) {
                return 'Invalid expression';
            }
        }

        function describeHour(hour) {
            if (hour === '*') return 'every hour';
            if (hour.startsWith('*/')) {
                const step = hour.split('/')[1];
                return `every ${step} hours`;
            }
            if (hour.includes('-')) {
                const [start, end] = hour.split('-');
                return `${formatHour(start)} to ${formatHour(end)}`;
            }
            if (hour.includes(',')) {
                const hours = hour.split(',').map(h => formatHour(h)).join(', ');
                return hours;
            }
            return formatHour(hour);
        }

        function formatHour(hour) {
            const h = parseInt(hour, 10);
            if (h === 0) return '12:00 AM';
            if (h === 12) return '12:00 PM';
            if (h < 12) return `${h.toString().padStart(2, '0')}:00 AM`;
            return `${(h - 12).toString().padStart(2, '0')}:00 PM`;
        }

        function formatMinute(minute) {
            if (minute.startsWith('*/')) {
                return `every ${minute.split('/')[1]} minutes`;
            }
            return `minute ${minute}`;
        }

        function describeDayOfWeek(dow) {
            if (dow === '*') return '';
            if (dow.includes('-')) {
                const [start, end] = dow.split('-');
                return `${dayNames[parseInt(start, 10)]} through ${dayNames[parseInt(end, 10)]}`;
            }
            if (dow.includes(',')) {
                const days = dow.split(',').map(d => dayNames[parseInt(d, 10)]).join(', ');
                return `on ${days}`;
            }
            return `on ${dayNames[parseInt(dow, 10)]}`;
        }

        function getOrdinalSuffix(n) {
            const s = ['th', 'st', 'nd', 'rd'];
            const v = n % 100;
            return s[(v - 20) % 10] || s[v] || s[0];
        }

        // Expand cron field to array of values
        function expandField(field, min, max) {
            if (field === '*') {
                return Array.from({ length: max - min + 1 }, (_, i) => min + i);
            }

            if (field.includes('/')) {
                const [base, stepStr] = field.split('/');
                const step = parseInt(stepStr, 10);
                const start = base === '*' ? min : parseInt(base, 10);
                const values = [];
                for (let i = start; i <= max; i += step) {
                    values.push(i);
                }
                return values;
            }

            if (field.includes('-')) {
                const [startStr, endStr] = field.split('-');
                const start = parseInt(startStr, 10);
                const end = parseInt(endStr, 10);
                return Array.from({ length: end - start + 1 }, (_, i) => start + i);
            }

            if (field.includes(',')) {
                return field.split(',').map(v => parseInt(v.trim(), 10));
            }

            return [parseInt(field, 10)];
        }

        // Calculate next run times
        function getNextRunTimes(expression, count = 5) {
            try {
                const parts = parseCron(expression);
                const minutes = expandField(parts.minute, 0, 59);
                const hours = expandField(parts.hour, 0, 23);
                const daysOfMonth = expandField(parts.dayOfMonth, 1, 31);
                const months = expandField(parts.month, 1, 12);
                const daysOfWeek = expandField(parts.dayOfWeek, 0, 6);

                const results = [];
                const now = new Date();
                let current = new Date(now);
                current.setSeconds(0);
                current.setMilliseconds(0);

                // Add 1 minute to start from next possible run
                current.setMinutes(current.getMinutes() + 1);

                const maxIterations = 525600; // 1 year of minutes
                let iterations = 0;

                while (results.length < count && iterations < maxIterations) {
                    iterations++;

                    const month = current.getMonth() + 1;
                    const dayOfMonth = current.getDate();
                    const dayOfWeek = current.getDay();
                    const hour = current.getHours();
                    const minute = current.getMinutes();

                    // Check if current time matches
                    const monthMatch = months.includes(month);
                    const domMatch = daysOfMonth.includes(dayOfMonth);
                    const dowMatch = daysOfWeek.includes(dayOfWeek);
                    const hourMatch = hours.includes(hour);
                    const minuteMatch = minutes.includes(minute);

                    // For day matching: if both DOM and DOW are specified (not *), either can match
                    // If only one is specified, that one must match
                    const domIsWildcard = parts.dayOfMonth === '*';
                    const dowIsWildcard = parts.dayOfWeek === '*';

                    let dayMatch;
                    if (domIsWildcard && dowIsWildcard) {
                        dayMatch = true;
                    } else if (domIsWildcard) {
                        dayMatch = dowMatch;
                    } else if (dowIsWildcard) {
                        dayMatch = domMatch;
                    } else {
                        // Both specified - either can match (OR behavior)
                        dayMatch = domMatch || dowMatch;
                    }

                    if (monthMatch && dayMatch && hourMatch && minuteMatch) {
                        results.push(new Date(current));
                    }

                    // Move to next minute
                    current.setMinutes(current.getMinutes() + 1);
                }

                return results;
            } catch (e) {
                return [];
            }
        }

        // Format date for display
        function formatDate(date) {
            const options = {
                weekday: 'short',
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            };
            return date.toLocaleDateString('en-US', options);
        }

        // Get Laravel helper equivalent
        function getLaravelHelper(expression) {
            const helpers = {
                '* * * * *': '->everyMinute()',
                '*/2 * * * *': '->everyTwoMinutes()',
                '*/3 * * * *': '->everyThreeMinutes()',
                '*/4 * * * *': '->everyFourMinutes()',
                '*/5 * * * *': '->everyFiveMinutes()',
                '*/10 * * * *': '->everyTenMinutes()',
                '*/15 * * * *': '->everyFifteenMinutes()',
                '*/30 * * * *': '->everyThirtyMinutes()',
                '0 * * * *': '->hourly()',
                '0 */2 * * *': '->everyTwoHours()',
                '0 */3 * * *': '->everyThreeHours()',
                '0 */4 * * *': '->everyFourHours()',
                '0 */6 * * *': '->everySixHours()',
                '0 0 * * *': '->daily()',
                '0 0 * * 0': '->weekly()',
                '0 0 1 * *': '->monthly()',
                '0 0 1 */3 *': '->quarterly()',
                '0 0 1 1 *': '->yearly()',
            };

            // Check for exact match first
            if (helpers[expression]) {
                return helpers[expression];
            }

            // Check for daily at specific time
            const dailyMatch = expression.match(/^(\d+)\s+(\d+)\s+\*\s+\*\s+\*$/);
            if (dailyMatch) {
                const minute = dailyMatch[1].padStart(2, '0');
                const hour = dailyMatch[2].padStart(2, '0');
                return `->dailyAt('${hour}:${minute}')`;
            }

            // Check for weekdays at specific time
            const weekdaysMatch = expression.match(/^(\d+)\s+(\d+)\s+\*\s+\*\s+1-5$/);
            if (weekdaysMatch) {
                const minute = weekdaysMatch[1].padStart(2, '0');
                const hour = weekdaysMatch[2].padStart(2, '0');
                return `->weekdays()->at('${hour}:${minute}')`;
            }

            // Check for weekly on specific day
            const weeklyMatch = expression.match(/^(\d+)\s+(\d+)\s+\*\s+\*\s+(\d)$/);
            if (weeklyMatch) {
                const minute = weeklyMatch[1].padStart(2, '0');
                const hour = weeklyMatch[2].padStart(2, '0');
                const dow = parseInt(weeklyMatch[3], 10);
                const dayMethod = ['sundays', 'mondays', 'tuesdays', 'wednesdays', 'thursdays', 'fridays', 'saturdays'][dow];
                return `->${dayMethod}()->at('${hour}:${minute}')`;
            }

            return null;
        }

        // Update everything based on expression
        function updateFromExpression() {
            const expression = cronExpression.value.trim();

            try {
                // Validate
                validateCron(expression);

                // Hide error, show description
                errorDisplay.classList.add('hidden');
                descriptionDisplay.classList.remove('hidden');
                descriptionDisplay.classList.remove('bg-red-500/10', 'border-red-500/30');
                descriptionDisplay.classList.add('bg-gold/10', 'border-gold/30');

                // Update description
                humanDescription.textContent = describeCron(expression);
                humanDescription.classList.remove('text-red-400');
                humanDescription.classList.add('text-gold');

                // Update next run times
                const nextRuns = getNextRunTimes(expression, 5);
                if (nextRuns.length > 0) {
                    nextRunsList.innerHTML = nextRuns.map(date =>
                        `<li class="text-light flex items-center gap-2">
                            <span class="text-gold">&#8226;</span>
                            ${formatDate(date)}
                        </li>`
                    ).join('');
                } else {
                    nextRunsList.innerHTML = '<li class="text-light-muted">No upcoming runs found</li>';
                }

                // Update Laravel code
                updateLaravelCode(expression);

                // Update visual builder
                updateVisualBuilder(expression);

                // Update preset buttons
                updatePresetButtons(expression);

            } catch (e) {
                // Show error
                errorDisplay.classList.remove('hidden');
                errorMessage.textContent = e.message;
                descriptionDisplay.classList.add('hidden');

                nextRunsList.innerHTML = '<li class="text-red-400">Invalid expression</li>';
            }
        }

        // Update Laravel code display
        function updateLaravelCode(expression) {
            laravelCode.innerHTML = `<span class="text-purple-400">$schedule</span><span class="text-light">-></span><span class="text-gold">command</span><span class="text-light">(</span><span class="text-sky-400">'your:command'</span><span class="text-light">)</span>
    <span class="text-light">-></span><span class="text-gold">cron</span><span class="text-light">(</span><span class="text-sky-400">'${expression}'</span><span class="text-light">);</span>`;

            const helper = getLaravelHelper(expression);
            if (helper) {
                laravelAlternative.classList.remove('hidden');
                laravelHelper.innerHTML = `<span class="text-purple-400">$schedule</span><span class="text-light">-></span><span class="text-gold">command</span><span class="text-light">(</span><span class="text-sky-400">'your:command'</span><span class="text-light">)</span>
    <span class="text-light">${helper.replace(/->/g, '-></span><span class="text-gold">').replace(/\(\)/g, '</span><span class="text-light">()</span>').replace(/\('([^']+)'\)/g, '</span><span class="text-light">(</span><span class="text-sky-400">\'$1\'</span><span class="text-light">)</span>')};</span>`;
            } else {
                laravelAlternative.classList.add('hidden');
            }
        }

        // Update visual builder from expression
        function updateVisualBuilder(expression) {
            try {
                const parts = parseCron(expression);

                updateBuilderField(minuteType, minuteValue, parts.minute);
                updateBuilderField(hourType, hourValue, parts.hour);
                updateBuilderField(domType, domValue, parts.dayOfMonth);
                updateBuilderField(monthType, monthValue, parts.month);
                updateBuilderField(dowType, dowValue, parts.dayOfWeek);
            } catch (e) {
                // Invalid expression, don't update builder
            }
        }

        function updateBuilderField(typeSelect, valueInput, value) {
            if (value === '*') {
                typeSelect.value = '*';
                valueInput.classList.add('hidden');
            } else if (value.startsWith('*/')) {
                typeSelect.value = '*/n';
                valueInput.value = value.split('/')[1];
                valueInput.classList.remove('hidden');
                valueInput.placeholder = 'e.g., 5';
            } else if (value.includes('-')) {
                typeSelect.value = 'range';
                valueInput.value = value;
                valueInput.classList.remove('hidden');
                valueInput.placeholder = 'e.g., 1-5';
            } else if (value.includes(',')) {
                typeSelect.value = 'list';
                valueInput.value = value;
                valueInput.classList.remove('hidden');
                valueInput.placeholder = 'e.g., 1,3,5';
            } else {
                typeSelect.value = 'specific';
                valueInput.value = value;
                valueInput.classList.remove('hidden');
                valueInput.placeholder = 'e.g., 0';
            }
        }

        // Update preset button styles
        function updatePresetButtons(expression) {
            presetButtons.forEach(btn => {
                if (btn.dataset.cron === expression) {
                    btn.classList.add('bg-gold/20', 'text-gold', 'border-gold');
                    btn.classList.remove('text-light-muted', 'border-gold/30');
                } else {
                    btn.classList.remove('bg-gold/20', 'text-gold', 'border-gold');
                    btn.classList.add('text-light-muted', 'border-gold/30');
                }
            });
        }

        // Build expression from visual builder
        function buildExpressionFromBuilder() {
            const minute = getFieldValue(minuteType, minuteValue);
            const hour = getFieldValue(hourType, hourValue);
            const dom = getFieldValue(domType, domValue);
            const month = getFieldValue(monthType, monthValue);
            const dow = getFieldValue(dowType, dowValue);

            return `${minute} ${hour} ${dom} ${month} ${dow}`;
        }

        function getFieldValue(typeSelect, valueInput) {
            const type = typeSelect.value;
            const value = valueInput.value.trim();

            switch (type) {
                case '*':
                    return '*';
                case '*/n':
                    return value ? `*/${value}` : '*';
                case 'specific':
                case 'range':
                case 'list':
                    return value || '*';
                default:
                    return '*';
            }
        }

        // Handle type select change
        function handleTypeChange(typeSelect, valueInput, fieldName) {
            const type = typeSelect.value;

            if (type === '*') {
                valueInput.classList.add('hidden');
                valueInput.value = '';
            } else {
                valueInput.classList.remove('hidden');

                // Set default values based on type and field
                const defaults = getDefaultValues(fieldName);

                switch (type) {
                    case '*/n':
                        valueInput.placeholder = `e.g., ${defaults.step}`;
                        if (!valueInput.value || valueInput.value.includes('-') || valueInput.value.includes(',')) {
                            valueInput.value = defaults.step;
                        }
                        break;
                    case 'specific':
                        valueInput.placeholder = `e.g., ${defaults.specific}`;
                        if (!valueInput.value || valueInput.value.includes('-') || valueInput.value.includes(',')) {
                            valueInput.value = defaults.specific;
                        }
                        break;
                    case 'range':
                        valueInput.placeholder = `e.g., ${defaults.range}`;
                        if (!valueInput.value || !valueInput.value.includes('-')) {
                            valueInput.value = defaults.range;
                        }
                        break;
                    case 'list':
                        valueInput.placeholder = `e.g., ${defaults.list}`;
                        if (!valueInput.value || !valueInput.value.includes(',')) {
                            valueInput.value = defaults.list;
                        }
                        break;
                }
            }

            // Update expression without triggering visual builder update (to prevent loop)
            cronExpression.value = buildExpressionFromBuilder();
            updateFromExpressionNoBuilder();
        }

        // Get default values for each field type
        function getDefaultValues(fieldName) {
            const defaults = {
                minute: { specific: '0', step: '5', range: '0-30', list: '0,15,30,45' },
                hour: { specific: '9', step: '2', range: '9-17', list: '9,12,17' },
                dom: { specific: '1', step: '5', range: '1-15', list: '1,15' },
                month: { specific: '1', step: '3', range: '1-6', list: '1,4,7,10' },
                dow: { specific: '1', step: '2', range: '1-5', list: '1,3,5' }
            };
            return defaults[fieldName] || defaults.minute;
        }

        // Update without triggering visual builder (to prevent feedback loop)
        function updateFromExpressionNoBuilder() {
            const expression = cronExpression.value.trim();

            try {
                // Validate
                validateCron(expression);

                // Hide error, show description
                errorDisplay.classList.add('hidden');
                descriptionDisplay.classList.remove('hidden');
                descriptionDisplay.classList.remove('bg-red-500/10', 'border-red-500/30');
                descriptionDisplay.classList.add('bg-gold/10', 'border-gold/30');

                // Update description
                humanDescription.textContent = describeCron(expression);
                humanDescription.classList.remove('text-red-400');
                humanDescription.classList.add('text-gold');

                // Update next run times
                const nextRuns = getNextRunTimes(expression, 5);
                if (nextRuns.length > 0) {
                    nextRunsList.innerHTML = nextRuns.map(date =>
                        `<li class="text-light flex items-center gap-2">
                            <span class="text-gold">&#8226;</span>
                            ${formatDate(date)}
                        </li>`
                    ).join('');
                } else {
                    nextRunsList.innerHTML = '<li class="text-light-muted">No upcoming runs found</li>';
                }

                // Update Laravel code
                updateLaravelCode(expression);

                // Update preset buttons
                updatePresetButtons(expression);

            } catch (e) {
                // Show error
                errorDisplay.classList.remove('hidden');
                errorMessage.textContent = e.message;
                descriptionDisplay.classList.add('hidden');

                nextRunsList.innerHTML = '<li class="text-red-400">Invalid expression</li>';
            }
        }

        // Copy to clipboard
        function copyToClipboard() {
            const expression = cronExpression.value.trim();
            if (!expression) return;

            navigator.clipboard.writeText(expression).then(() => {
                const originalText = btnCopy.innerHTML;
                btnCopy.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                btnCopy.classList.add('text-green-400', 'border-green-400');

                setTimeout(() => {
                    btnCopy.innerHTML = originalText;
                    btnCopy.classList.remove('text-green-400', 'border-green-400');
                }, 2000);
            });
        }

        // Event Listeners
        cronExpression.addEventListener('input', updateFromExpression);
        btnCopy.addEventListener('click', copyToClipboard);

        // Visual builder event listeners
        const fieldNames = ['minute', 'hour', 'dom', 'month', 'dow'];
        [minuteType, hourType, domType, monthType, dowType].forEach((select, index) => {
            const valueInputs = [minuteValue, hourValue, domValue, monthValue, dowValue];
            select.addEventListener('change', () => handleTypeChange(select, valueInputs[index], fieldNames[index]));
        });

        [minuteValue, hourValue, domValue, monthValue, dowValue].forEach(input => {
            // Use updateFromExpressionNoBuilder to prevent the input from disappearing
            input.addEventListener('input', () => {
                cronExpression.value = buildExpressionFromBuilder();
                updateFromExpressionNoBuilder();
            });
        });

        // Preset button listeners
        presetButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                cronExpression.value = btn.dataset.cron;
                updateFromExpression();
            });
        });

        // Initialize
        updateFromExpression();
    })();
    </script>
    @endpush
</x-layout>
