<x-layout>
    <x-slot:title>Timestamp Converter - Unix Timestamp to Date Online | hafiz.dev</x-slot:title>
    <x-slot:description>Free online Unix timestamp converter. Convert timestamps to human-readable dates and vice versa. Supports multiple timezones and formats. 100% client-side.</x-slot:description>
    <x-slot:keywords>timestamp converter, unix timestamp, epoch converter, timestamp to date, date to timestamp, unix time converter, epoch time</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/timestamp-converter') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Timestamp Converter - Unix Timestamp to Date Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online Unix timestamp converter. Convert timestamps to human-readable dates and vice versa. Supports multiple timezones and formats.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/timestamp-converter') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Timestamp Converter",
            "description": "Free online Unix timestamp converter. Convert timestamps to human-readable dates and vice versa. Supports multiple timezones and formats. 100% client-side.",
            "url": "https://hafiz.dev/tools/timestamp-converter",
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
                    "name": "Timestamp Converter",
                    "item": "https://hafiz.dev/tools/timestamp-converter"
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
                    "name": "What is a Unix timestamp?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A Unix timestamp (also known as Epoch time or POSIX time) is a way of tracking time as a running total of seconds. This count starts at the Unix Epoch on January 1st, 1970 at UTC. For example, the timestamp 1609459200 represents January 1st, 2021 at midnight UTC. Unix timestamps are widely used in programming because they're timezone-independent and easy to work with mathematically."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Why do some timestamps have 10 digits and others have 13?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A 10-digit timestamp represents seconds since the Unix Epoch (January 1, 1970), while a 13-digit timestamp represents milliseconds since the same date. JavaScript's Date.now() returns milliseconds (13 digits), while many server-side languages like PHP use seconds (10 digits). Our converter automatically detects which format you're using and handles it appropriately."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the Year 2038 problem?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The Year 2038 problem (also known as Y2K38 or the Unix Millennium Bug) occurs because many older systems store Unix timestamps as a 32-bit signed integer. The maximum value (2,147,483,647) corresponds to January 19, 2038 at 03:14:07 UTC. After this moment, these systems will overflow and potentially interpret the time as December 13, 1901. Modern systems use 64-bit integers, which can handle dates billions of years into the future."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do timezones affect timestamps?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Unix timestamps are always in UTC (Coordinated Universal Time) and don't include timezone information. The same timestamp represents the exact same moment in time worldwide. When displaying a timestamp as a human-readable date, you apply a timezone offset to show the local time. For example, timestamp 1609459200 is always the same instant, but it displays as different local times in New York vs Tokyo."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is this tool free and accurate?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, this timestamp converter is completely free to use with no limits or signup required. The conversions are performed using JavaScript's built-in Date object and Intl APIs, which are accurate and reliable. All processing happens in your browser - no data is sent to any server. The tool supports timestamps from the year 1970 onwards and handles both seconds and milliseconds formats."
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
                    <li class="text-gold">Timestamp Converter</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Timestamp Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert Unix timestamps to human-readable dates and vice versa. 100% client-side - your data never leaves your browser.
                </p>
            </div>

            {{-- Current Time Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h2 class="text-light font-semibold mb-2">Current Time</h2>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                            <div class="flex items-center gap-2">
                                <span class="text-light-muted text-sm">Unix Timestamp:</span>
                                <code id="current-timestamp" class="text-gold font-mono text-lg cursor-pointer hover:text-gold-light transition-colors" title="Click to copy">-</code>
                                <button id="btn-copy-current" class="p-1 text-light-muted hover:text-gold transition-colors cursor-pointer" title="Copy timestamp">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                </button>
                            </div>
                        </div>
                        <p id="current-date" class="text-light-muted text-sm mt-2">-</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-light-muted text-sm">Live updating</span>
                    </div>
                </div>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                {{-- Mode Tabs --}}
                <div class="flex border-b border-gold/20 mb-6">
                    <button id="tab-timestamp-to-date" class="px-4 py-3 text-sm font-semibold border-b-2 border-gold text-gold transition-colors cursor-pointer">
                        Timestamp → Date
                    </button>
                    <button id="tab-date-to-timestamp" class="px-4 py-3 text-sm font-semibold border-b-2 border-transparent text-light-muted hover:text-light transition-colors cursor-pointer">
                        Date → Timestamp
                    </button>
                </div>

                {{-- Timestamp to Date Mode --}}
                <div id="mode-timestamp-to-date">
                    <div class="mb-6">
                        <label for="timestamp-input" class="text-light font-semibold mb-3 block">Unix Timestamp</label>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <div class="flex-1">
                                <input type="text" id="timestamp-input" placeholder="e.g., 1737556200 or 1737556200000"
                                       class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light font-mono focus:border-gold focus:outline-none placeholder-light-muted/50">
                                <p class="text-light-muted text-xs mt-2">Supports seconds (10 digits) or milliseconds (13 digits)</p>
                            </div>
                            <div class="flex gap-2">
                                <select id="timezone-select" class="bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-3 text-sm focus:border-gold focus:outline-none cursor-pointer">
                                    <option value="UTC">UTC</option>
                                    <option value="local">Local (Browser)</option>
                                    <option value="America/New_York">America/New_York (EST/EDT)</option>
                                    <option value="America/Los_Angeles">America/Los_Angeles (PST/PDT)</option>
                                    <option value="Europe/London">Europe/London (GMT/BST)</option>
                                    <option value="Europe/Paris">Europe/Paris (CET/CEST)</option>
                                    <option value="Europe/Rome">Europe/Rome (CET/CEST)</option>
                                    <option value="Asia/Tokyo">Asia/Tokyo (JST)</option>
                                    <option value="Asia/Shanghai">Asia/Shanghai (CST)</option>
                                    <option value="Asia/Dubai">Asia/Dubai (GST)</option>
                                    <option value="Australia/Sydney">Australia/Sydney (AEST/AEDT)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3 mb-6">
                        <button id="btn-convert-timestamp" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                            Convert
                        </button>
                        <button id="btn-use-current-ts" class="px-4 py-3 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 cursor-pointer">
                            Use Current Time
                        </button>
                        <button id="btn-clear-ts" class="px-4 py-3 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 cursor-pointer">
                            Clear
                        </button>
                    </div>

                    {{-- Results --}}
                    <div id="ts-results" class="hidden">
                        <label class="text-light font-semibold mb-3 block">Converted Date</label>
                        <div class="bg-darkBg border border-gold/20 rounded-lg overflow-hidden">
                            <div class="divide-y divide-gold/10">
                                <div class="flex items-center justify-between p-3 hover:bg-gold/5 transition-colors">
                                    <div>
                                        <span class="text-light-muted text-xs block mb-1">ISO 8601</span>
                                        <code id="result-iso8601" class="text-light font-mono text-sm">-</code>
                                    </div>
                                    <button class="copy-result-btn p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" data-target="result-iso8601" title="Copy">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    </button>
                                </div>
                                <div class="flex items-center justify-between p-3 hover:bg-gold/5 transition-colors">
                                    <div>
                                        <span class="text-light-muted text-xs block mb-1">RFC 2822</span>
                                        <code id="result-rfc2822" class="text-light font-mono text-sm">-</code>
                                    </div>
                                    <button class="copy-result-btn p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" data-target="result-rfc2822" title="Copy">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    </button>
                                </div>
                                <div class="flex items-center justify-between p-3 hover:bg-gold/5 transition-colors">
                                    <div>
                                        <span class="text-light-muted text-xs block mb-1">Local Format</span>
                                        <code id="result-local" class="text-light font-mono text-sm">-</code>
                                    </div>
                                    <button class="copy-result-btn p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" data-target="result-local" title="Copy">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    </button>
                                </div>
                                <div class="flex items-center justify-between p-3 hover:bg-gold/5 transition-colors">
                                    <div>
                                        <span class="text-light-muted text-xs block mb-1">UTC</span>
                                        <code id="result-utc" class="text-light font-mono text-sm">-</code>
                                    </div>
                                    <button class="copy-result-btn p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" data-target="result-utc" title="Copy">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    </button>
                                </div>
                                <div class="flex items-center justify-between p-3 hover:bg-gold/5 transition-colors">
                                    <div>
                                        <span class="text-light-muted text-xs block mb-1">Relative Time</span>
                                        <code id="result-relative" class="text-light font-mono text-sm">-</code>
                                    </div>
                                    <button class="copy-result-btn p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" data-target="result-relative" title="Copy">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button id="btn-copy-all-ts" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                Copy All Formats
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Date to Timestamp Mode --}}
                <div id="mode-date-to-timestamp" class="hidden">
                    <div class="mb-6">
                        <label class="text-light font-semibold mb-3 block">Date & Time</label>
                        <div class="grid sm:grid-cols-3 gap-3">
                            <div>
                                <label class="text-light-muted text-xs mb-1 block">Date</label>
                                <input type="date" id="date-input"
                                       class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light focus:border-gold focus:outline-none cursor-pointer">
                            </div>
                            <div>
                                <label class="text-light-muted text-xs mb-1 block">Time</label>
                                <input type="time" id="time-input" step="1" value="00:00:00"
                                       class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light focus:border-gold focus:outline-none cursor-pointer">
                            </div>
                            <div>
                                <label class="text-light-muted text-xs mb-1 block">Timezone</label>
                                <select id="timezone-select-date" class="w-full bg-darkBg border border-gold/30 text-light rounded-lg px-3 py-3 text-sm focus:border-gold focus:outline-none cursor-pointer">
                                    <option value="UTC">UTC</option>
                                    <option value="local">Local (Browser)</option>
                                    <option value="America/New_York">America/New_York (EST/EDT)</option>
                                    <option value="America/Los_Angeles">America/Los_Angeles (PST/PDT)</option>
                                    <option value="Europe/London">Europe/London (GMT/BST)</option>
                                    <option value="Europe/Paris">Europe/Paris (CET/CEST)</option>
                                    <option value="Europe/Rome">Europe/Rome (CET/CEST)</option>
                                    <option value="Asia/Tokyo">Asia/Tokyo (JST)</option>
                                    <option value="Asia/Shanghai">Asia/Shanghai (CST)</option>
                                    <option value="Asia/Dubai">Asia/Dubai (GST)</option>
                                    <option value="Australia/Sydney">Australia/Sydney (AEST/AEDT)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3 mb-6">
                        <button id="btn-convert-date" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                            Convert
                        </button>
                        <button id="btn-use-current-date" class="px-4 py-3 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 cursor-pointer">
                            Use Current Time
                        </button>
                        <button id="btn-clear-date" class="px-4 py-3 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 cursor-pointer">
                            Clear
                        </button>
                    </div>

                    {{-- Results --}}
                    <div id="date-results" class="hidden">
                        <label class="text-light font-semibold mb-3 block">Unix Timestamp</label>
                        <div class="bg-darkBg border border-gold/20 rounded-lg overflow-hidden">
                            <div class="divide-y divide-gold/10">
                                <div class="flex items-center justify-between p-3 hover:bg-gold/5 transition-colors">
                                    <div>
                                        <span class="text-light-muted text-xs block mb-1">Seconds (10 digits)</span>
                                        <code id="result-seconds" class="text-gold font-mono text-lg">-</code>
                                    </div>
                                    <button class="copy-result-btn p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" data-target="result-seconds" title="Copy">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    </button>
                                </div>
                                <div class="flex items-center justify-between p-3 hover:bg-gold/5 transition-colors">
                                    <div>
                                        <span class="text-light-muted text-xs block mb-1">Milliseconds (13 digits)</span>
                                        <code id="result-milliseconds" class="text-gold font-mono text-lg">-</code>
                                    </div>
                                    <button class="copy-result-btn p-2 text-light-muted hover:text-gold transition-colors cursor-pointer" data-target="result-milliseconds" title="Copy">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Success/Copy Notification --}}
                <div id="copy-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="copy-message" class="text-green-400 text-sm"></span>
                    </div>
                </div>

                {{-- Error Notification --}}
                <div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span id="error-message" class="text-red-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Quick Reference Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <h2 class="text-lg font-bold text-light mb-4">Quick Reference</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gold/20">
                                <th class="text-left text-light-muted font-medium py-2 pr-4">Event</th>
                                <th class="text-left text-light-muted font-medium py-2 pr-4">Unix Timestamp</th>
                                <th class="text-left text-light-muted font-medium py-2">Date (UTC)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gold/10">
                            <tr class="hover:bg-gold/5 transition-colors">
                                <td class="py-3 pr-4 text-light">Unix Epoch</td>
                                <td class="py-3 pr-4"><code class="text-gold font-mono cursor-pointer hover:text-gold-light quick-ref-ts" data-ts="0">0</code></td>
                                <td class="py-3 text-light-muted">Jan 1, 1970 00:00:00</td>
                            </tr>
                            <tr class="hover:bg-gold/5 transition-colors">
                                <td class="py-3 pr-4 text-light">Year 2000</td>
                                <td class="py-3 pr-4"><code class="text-gold font-mono cursor-pointer hover:text-gold-light quick-ref-ts" data-ts="946684800">946684800</code></td>
                                <td class="py-3 text-light-muted">Jan 1, 2000 00:00:00</td>
                            </tr>
                            <tr class="hover:bg-gold/5 transition-colors">
                                <td class="py-3 pr-4 text-light">1 Billion Seconds</td>
                                <td class="py-3 pr-4"><code class="text-gold font-mono cursor-pointer hover:text-gold-light quick-ref-ts" data-ts="1000000000">1000000000</code></td>
                                <td class="py-3 text-light-muted">Sep 9, 2001 01:46:40</td>
                            </tr>
                            <tr class="hover:bg-gold/5 transition-colors">
                                <td class="py-3 pr-4 text-light">Year 2038 Problem</td>
                                <td class="py-3 pr-4"><code class="text-gold font-mono cursor-pointer hover:text-gold-light quick-ref-ts" data-ts="2147483647">2147483647</code></td>
                                <td class="py-3 text-light-muted">Jan 19, 2038 03:14:07</td>
                            </tr>
                            <tr class="hover:bg-gold/5 transition-colors">
                                <td class="py-3 pr-4 text-light">Current Time</td>
                                <td class="py-3 pr-4"><code id="quick-current-ts" class="text-gold font-mono cursor-pointer hover:text-gold-light">-</code></td>
                                <td class="py-3 text-light-muted" id="quick-current-date">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🕐</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Multiple Formats</h3>
                    <p class="text-light-muted text-sm">Convert to ISO 8601, RFC 2822, UTC, local time, and relative time formats.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🌍</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Timezone Support</h3>
                    <p class="text-light-muted text-sm">Convert timestamps across 11 major timezones including UTC, EST, PST, and more.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">100%</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Client-Side</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Your data never leaves your computer.</p>
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
                            <span class="text-light font-medium">What is a Unix timestamp?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A Unix timestamp (also known as Epoch time or POSIX time) is a way of tracking time as a running total of seconds. This count starts at the Unix Epoch on January 1st, 1970 at UTC. For example, the timestamp 1609459200 represents January 1st, 2021 at midnight UTC. Unix timestamps are widely used in programming because they're timezone-independent and easy to work with mathematically.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Why do some timestamps have 10 digits and others have 13?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A 10-digit timestamp represents seconds since the Unix Epoch (January 1, 1970), while a 13-digit timestamp represents milliseconds since the same date. JavaScript's Date.now() returns milliseconds (13 digits), while many server-side languages like PHP use seconds (10 digits). Our converter automatically detects which format you're using and handles it appropriately.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the Year 2038 problem?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The Year 2038 problem (also known as Y2K38 or the Unix Millennium Bug) occurs because many older systems store Unix timestamps as a 32-bit signed integer. The maximum value (2,147,483,647) corresponds to January 19, 2038 at 03:14:07 UTC. After this moment, these systems will overflow and potentially interpret the time as December 13, 1901. Modern systems use 64-bit integers, which can handle dates billions of years into the future.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do timezones affect timestamps?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Unix timestamps are always in UTC (Coordinated Universal Time) and don't include timezone information. The same timestamp represents the exact same moment in time worldwide. When displaying a timestamp as a human-readable date, you apply a timezone offset to show the local time. For example, timestamp 1609459200 is always the same instant, but it displays as different local times in New York vs Tokyo.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is this tool free and accurate?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, this timestamp converter is completely free to use with no limits or signup required. The conversions are performed using JavaScript's built-in Date object and Intl APIs, which are accurate and reliable. All processing happens in your browser - no data is sent to any server. The tool supports timestamps from the year 1970 onwards and handles both seconds and milliseconds formats.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        // DOM Elements - Current Time
        const currentTimestamp = document.getElementById('current-timestamp');
        const currentDate = document.getElementById('current-date');
        const btnCopyCurrent = document.getElementById('btn-copy-current');
        const quickCurrentTs = document.getElementById('quick-current-ts');
        const quickCurrentDate = document.getElementById('quick-current-date');

        // DOM Elements - Tabs
        const tabTimestampToDate = document.getElementById('tab-timestamp-to-date');
        const tabDateToTimestamp = document.getElementById('tab-date-to-timestamp');
        const modeTimestampToDate = document.getElementById('mode-timestamp-to-date');
        const modeDateToTimestamp = document.getElementById('mode-date-to-timestamp');

        // DOM Elements - Timestamp to Date
        const timestampInput = document.getElementById('timestamp-input');
        const timezoneSelect = document.getElementById('timezone-select');
        const btnConvertTimestamp = document.getElementById('btn-convert-timestamp');
        const btnUseCurrentTs = document.getElementById('btn-use-current-ts');
        const btnClearTs = document.getElementById('btn-clear-ts');
        const tsResults = document.getElementById('ts-results');
        const resultIso8601 = document.getElementById('result-iso8601');
        const resultRfc2822 = document.getElementById('result-rfc2822');
        const resultLocal = document.getElementById('result-local');
        const resultUtc = document.getElementById('result-utc');
        const resultRelative = document.getElementById('result-relative');
        const btnCopyAllTs = document.getElementById('btn-copy-all-ts');

        // DOM Elements - Date to Timestamp
        const dateInput = document.getElementById('date-input');
        const timeInput = document.getElementById('time-input');
        const timezoneSelectDate = document.getElementById('timezone-select-date');
        const btnConvertDate = document.getElementById('btn-convert-date');
        const btnUseCurrentDate = document.getElementById('btn-use-current-date');
        const btnClearDate = document.getElementById('btn-clear-date');
        const dateResults = document.getElementById('date-results');
        const resultSeconds = document.getElementById('result-seconds');
        const resultMilliseconds = document.getElementById('result-milliseconds');

        // DOM Elements - Notifications
        const copyNotification = document.getElementById('copy-notification');
        const copyMessage = document.getElementById('copy-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        // Update current time every second
        function updateCurrentTime() {
            const now = new Date();
            const timestamp = Math.floor(now.getTime() / 1000);

            currentTimestamp.textContent = timestamp;
            currentDate.textContent = now.toLocaleString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                timeZoneName: 'short'
            });

            // Update quick reference
            quickCurrentTs.textContent = timestamp;
            quickCurrentDate.textContent = now.toUTCString().replace('GMT', 'UTC').replace(/^\w+, /, '');
        }

        setInterval(updateCurrentTime, 1000);
        updateCurrentTime();

        // Tab switching
        tabTimestampToDate.addEventListener('click', function() {
            tabTimestampToDate.classList.add('border-gold', 'text-gold');
            tabTimestampToDate.classList.remove('border-transparent', 'text-light-muted');
            tabDateToTimestamp.classList.remove('border-gold', 'text-gold');
            tabDateToTimestamp.classList.add('border-transparent', 'text-light-muted');
            modeTimestampToDate.classList.remove('hidden');
            modeDateToTimestamp.classList.add('hidden');
        });

        tabDateToTimestamp.addEventListener('click', function() {
            tabDateToTimestamp.classList.add('border-gold', 'text-gold');
            tabDateToTimestamp.classList.remove('border-transparent', 'text-light-muted');
            tabTimestampToDate.classList.remove('border-gold', 'text-gold');
            tabTimestampToDate.classList.add('border-transparent', 'text-light-muted');
            modeDateToTimestamp.classList.remove('hidden');
            modeTimestampToDate.classList.add('hidden');
        });

        // Get relative time string
        function getRelativeTime(date) {
            const now = new Date();
            const diff = date - now;
            const absDiff = Math.abs(diff);

            const seconds = Math.floor(absDiff / 1000);
            const minutes = Math.floor(seconds / 60);
            const hours = Math.floor(minutes / 60);
            const days = Math.floor(hours / 24);
            const months = Math.floor(days / 30);
            const years = Math.floor(days / 365);

            let result;
            if (years > 0) result = `${years} year${years > 1 ? 's' : ''}`;
            else if (months > 0) result = `${months} month${months > 1 ? 's' : ''}`;
            else if (days > 0) result = `${days} day${days > 1 ? 's' : ''}`;
            else if (hours > 0) result = `${hours} hour${hours > 1 ? 's' : ''}`;
            else if (minutes > 0) result = `${minutes} minute${minutes > 1 ? 's' : ''}`;
            else result = `${seconds} second${seconds !== 1 ? 's' : ''}`;

            return diff < 0 ? `${result} ago` : `in ${result}`;
        }

        // Convert timestamp to date
        function convertTimestampToDate() {
            const input = timestampInput.value.trim();

            if (!input) {
                showError('Please enter a timestamp');
                return;
            }

            const timestamp = parseInt(input, 10);

            if (isNaN(timestamp)) {
                showError('Invalid timestamp. Please enter a valid number.');
                return;
            }

            // Check for negative timestamps (before 1970)
            if (timestamp < 0) {
                showError('Negative timestamps (before 1970) are not supported.');
                return;
            }

            // Auto-detect seconds vs milliseconds
            let ms = timestamp;
            if (timestamp.toString().length <= 10) {
                // Seconds - convert to milliseconds
                ms = timestamp * 1000;
            }

            const date = new Date(ms);

            // Check for invalid date
            if (isNaN(date.getTime())) {
                showError('Invalid timestamp. Unable to convert.');
                return;
            }

            const timezone = timezoneSelect.value;
            const isLocal = timezone === 'local';
            const tz = isLocal ? undefined : timezone;

            // Format results
            resultIso8601.textContent = date.toISOString();
            resultRfc2822.textContent = date.toUTCString();

            if (isLocal) {
                resultLocal.textContent = date.toLocaleString('en-US', {
                    dateStyle: 'full',
                    timeStyle: 'long'
                });
            } else {
                resultLocal.textContent = date.toLocaleString('en-US', {
                    timeZone: tz,
                    dateStyle: 'full',
                    timeStyle: 'long'
                });
            }

            resultUtc.textContent = date.toUTCString();
            resultRelative.textContent = getRelativeTime(date);

            tsResults.classList.remove('hidden');
            hideError();
        }

        // Convert date to timestamp
        function convertDateToTimestamp() {
            const dateValue = dateInput.value;
            const timeValue = timeInput.value || '00:00:00';

            if (!dateValue) {
                showError('Please select a date');
                return;
            }

            const timezone = timezoneSelectDate.value;
            let date;

            if (timezone === 'local') {
                // Local timezone
                date = new Date(`${dateValue}T${timeValue}`);
            } else if (timezone === 'UTC') {
                // UTC
                date = new Date(`${dateValue}T${timeValue}Z`);
            } else {
                // Specific timezone - create date and adjust
                // This is a simplified approach; for production, consider using a library like date-fns-tz
                const localDate = new Date(`${dateValue}T${timeValue}`);
                const utcDate = new Date(`${dateValue}T${timeValue}Z`);

                // Get the offset for the target timezone
                const formatter = new Intl.DateTimeFormat('en-US', {
                    timeZone: timezone,
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false
                });

                // Parse the formatted date back
                const parts = formatter.formatToParts(utcDate);
                const getPart = (type) => parts.find(p => p.type === type)?.value || '00';

                // Calculate the offset by comparing
                const tzDate = new Date(
                    `${getPart('year')}-${getPart('month')}-${getPart('day')}T${getPart('hour')}:${getPart('minute')}:${getPart('second')}Z`
                );

                const offset = utcDate.getTime() - tzDate.getTime();
                date = new Date(utcDate.getTime() + offset);
            }

            if (isNaN(date.getTime())) {
                showError('Invalid date. Please check your input.');
                return;
            }

            const seconds = Math.floor(date.getTime() / 1000);
            const milliseconds = date.getTime();

            resultSeconds.textContent = seconds;
            resultMilliseconds.textContent = milliseconds;

            dateResults.classList.remove('hidden');
            hideError();
        }

        // Copy to clipboard
        function copyToClipboard(text, message) {
            navigator.clipboard.writeText(text).then(() => {
                showNotification(message);
            }).catch(() => {
                showError('Failed to copy to clipboard');
            });
        }

        // Show success notification
        function showNotification(message) {
            copyMessage.textContent = message;
            copyNotification.classList.remove('hidden');
            errorNotification.classList.add('hidden');

            setTimeout(() => {
                copyNotification.classList.add('hidden');
            }, 2000);
        }

        // Show error notification
        function showError(message) {
            errorMessage.textContent = message;
            errorNotification.classList.remove('hidden');
            copyNotification.classList.add('hidden');

            setTimeout(() => {
                errorNotification.classList.add('hidden');
            }, 3000);
        }

        // Hide error notification
        function hideError() {
            errorNotification.classList.add('hidden');
        }

        // Event listeners - Current time
        btnCopyCurrent.addEventListener('click', function() {
            copyToClipboard(currentTimestamp.textContent, 'Timestamp copied!');
        });

        currentTimestamp.addEventListener('click', function() {
            copyToClipboard(currentTimestamp.textContent, 'Timestamp copied!');
        });

        // Event listeners - Timestamp to Date
        btnConvertTimestamp.addEventListener('click', convertTimestampToDate);

        timestampInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                convertTimestampToDate();
            }
        });

        btnUseCurrentTs.addEventListener('click', function() {
            timestampInput.value = Math.floor(Date.now() / 1000);
            convertTimestampToDate();
        });

        btnClearTs.addEventListener('click', function() {
            timestampInput.value = '';
            tsResults.classList.add('hidden');
            hideError();
        });

        btnCopyAllTs.addEventListener('click', function() {
            const all = [
                `ISO 8601: ${resultIso8601.textContent}`,
                `RFC 2822: ${resultRfc2822.textContent}`,
                `Local: ${resultLocal.textContent}`,
                `UTC: ${resultUtc.textContent}`,
                `Relative: ${resultRelative.textContent}`
            ].join('\n');
            copyToClipboard(all, 'All formats copied!');
        });

        // Event listeners - Date to Timestamp
        btnConvertDate.addEventListener('click', convertDateToTimestamp);

        btnUseCurrentDate.addEventListener('click', function() {
            const now = new Date();
            dateInput.value = now.toISOString().split('T')[0];
            timeInput.value = now.toTimeString().split(' ')[0];
            convertDateToTimestamp();
        });

        btnClearDate.addEventListener('click', function() {
            dateInput.value = '';
            timeInput.value = '00:00:00';
            dateResults.classList.add('hidden');
            hideError();
        });

        // Event listeners - Copy result buttons
        document.querySelectorAll('.copy-result-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const target = document.getElementById(targetId);
                if (target) {
                    copyToClipboard(target.textContent, 'Copied!');
                }
            });
        });

        // Quick reference timestamps - click to use
        document.querySelectorAll('.quick-ref-ts').forEach(el => {
            el.addEventListener('click', function() {
                const ts = this.getAttribute('data-ts');
                if (ts) {
                    timestampInput.value = ts;
                    // Switch to timestamp tab if not already there
                    tabTimestampToDate.click();
                    convertTimestampToDate();
                }
            });
        });

        quickCurrentTs.addEventListener('click', function() {
            timestampInput.value = this.textContent;
            tabTimestampToDate.click();
            convertTimestampToDate();
        });

        // Initialize date input with today's date
        const today = new Date();
        dateInput.value = today.toISOString().split('T')[0];
    })();
    </script>
    @endpush
</x-layout>
