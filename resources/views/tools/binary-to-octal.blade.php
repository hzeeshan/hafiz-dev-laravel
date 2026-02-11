<x-layout>
    <x-slot:title>Binary to Octal Converter - Convert Binary to Octal Online | hafiz.dev</x-slot:title>
    <x-slot:description>Free online binary to octal converter. Convert binary (base-2) numbers to octal (base-8) instantly with step-by-step 3-bit grouping breakdown. No signup required.</x-slot:description>
    <x-slot:keywords>binary to octal, convert binary to octal, binary to octal converter, binary to octal conversion, base 2 to base 8, binary number system</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/binary-to-octal') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Binary to Octal Converter - Convert Binary to Octal Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online binary to octal converter. Convert binary numbers to octal instantly with 3-bit grouping breakdown.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/binary-to-octal') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Binary to Octal Converter",
            "description": "Free online binary to octal converter with step-by-step 3-bit grouping breakdown.",
            "url": "https://hafiz.dev/tools/binary-to-octal",
            "applicationCategory": "DeveloperApplication",
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
                { "@@type": "ListItem", "position": 3, "name": "Binary to Octal", "item": "https://hafiz.dev/tools/binary-to-octal" }
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
                    "name": "How do I convert binary to octal?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Group the binary digits into sets of 3 from right to left (pad with leading zeros if needed), then convert each group to its octal digit (0-7). For example, binary 11111101 → 011 111 101 → 3 7 5 → octal 375."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Why does binary to octal use groups of 3?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Because 8 = 2³, each octal digit represents exactly 3 binary bits. This makes the conversion direct — no arithmetic needed, just group and map. This is why octal was historically popular in computing as a compact binary representation."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is binary 11111111 in octal?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Binary 11111111 in octal is 377. Grouping: 011 111 111 → 3 7 7. This represents decimal 255, the maximum value of an 8-bit byte. In Unix permissions, octal 377 has special significance."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between binary and octal?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Binary is base-2 (uses only 0 and 1), the fundamental language of computers. Octal is base-8 (uses digits 0-7), a compact representation of binary. Since 8 is a power of 2, conversion is straightforward — each octal digit maps to exactly 3 binary digits."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I convert octal back to binary?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Click the Swap Direction button to switch to Octal → Binary mode. To manually convert, replace each octal digit with its 3-bit binary equivalent. For example, octal 375 → 3=011, 7=111, 5=101 → binary 011111101 (or 11111101 without leading zero)."
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
                    <li class="text-gold">Binary to Octal</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Binary to Octal Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert binary (base-2) numbers to octal (base-8) instantly with a step-by-step 3-bit grouping breakdown. Supports batch conversion and reverse direction.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Direction Label --}}
                <div class="text-center mb-4">
                    <span id="direction-label" class="inline-flex items-center gap-2 px-4 py-1.5 bg-gold/10 border border-gold/30 rounded-full text-gold text-sm font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        Binary &rarr; Octal
                    </span>
                </div>

                {{-- Input / Output --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    <div class="flex flex-col">
                        <label for="input-value" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            <span id="input-label">Binary Input</span>
                        </label>
                        <textarea
                            id="input-value"
                            class="flex-1 min-h-[180px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Enter binary numbers (e.g., 11111101, 111111111, 0b1010)..."
                            spellcheck="false"
                        ></textarea>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span id="output-label">Octal Output</span>
                        </label>
                        <textarea
                            id="output-value"
                            class="flex-1 min-h-[180px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="Octal result will appear here..."
                            readonly
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-swap" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
                        Swap Direction
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Sample
                    </button>
                    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                </div>

                {{-- Step-by-Step Breakdown --}}
                <div id="breakdown" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
                    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                        Step-by-Step 3-Bit Grouping
                    </h3>
                    <div id="breakdown-content" class="font-mono text-sm"></div>
                </div>

                {{-- Quick Reference --}}
                <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        3-Bit Binary to Octal Reference
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-2">
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">000</span><br><span class="text-light-muted text-xs font-mono">= 0</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">001</span><br><span class="text-light-muted text-xs font-mono">= 1</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">010</span><br><span class="text-light-muted text-xs font-mono">= 2</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">011</span><br><span class="text-light-muted text-xs font-mono">= 3</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">100</span><br><span class="text-light-muted text-xs font-mono">= 4</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">101</span><br><span class="text-light-muted text-xs font-mono">= 5</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">110</span><br><span class="text-light-muted text-xs font-mono">= 6</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">111</span><br><span class="text-light-muted text-xs font-mono">= 7</span></div>
                    </div>
                </div>

                {{-- Notifications --}}
                <div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm"></span>
                    </div>
                </div>
                <div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span id="error-message" class="text-red-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

            {{-- Features --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Bidirectional</h3>
                    <p class="text-light-muted text-sm">Convert binary to octal and octal back to binary. Click the Swap button to switch direction instantly.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">3-Bit Grouping</h3>
                    <p class="text-light-muted text-sm">See the visual breakdown of binary digits grouped into 3-bit sets, each mapping directly to an octal digit.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Batch Conversion</h3>
                    <p class="text-light-muted text-sm">Convert multiple binary values at once. Enter space or comma-separated values for fast bulk conversion.</p>
                </div>
            </div>

            {{-- CTA --}}
            <x-tool-cta />

            {{-- FAQ Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Frequently Asked Questions</h2>
                <div class="space-y-4 max-w-3xl mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I convert binary to octal?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Group the binary digits into sets of 3 from right to left, padding with leading zeros if needed. Then convert each 3-bit group to its octal digit (0-7). For example, binary <code class="bg-darkCard px-1 rounded">11111101</code> &rarr; <code class="bg-darkCard px-1 rounded">011 111 101</code> &rarr; <code class="bg-darkCard px-1 rounded">3 7 5</code> &rarr; octal <code class="bg-darkCard px-1 rounded">375</code>.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Why does binary to octal use groups of 3?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Because 8 = 2&sup3;, each octal digit represents exactly 3 binary bits. This makes the conversion direct &mdash; no arithmetic needed, just group and map. This mathematical relationship is why octal was historically popular as a compact binary representation in early computing.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is binary 11111111 in octal?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Binary <code class="bg-darkCard px-1 rounded">11111111</code> in octal is <code class="bg-darkCard px-1 rounded">377</code>. Grouping into 3-bit sets: <code class="bg-darkCard px-1 rounded">011 111 111</code> &rarr; 3, 7, 7. This represents decimal 255, the maximum value of an unsigned 8-bit byte.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between binary and octal?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Binary is base-2 (uses only 0 and 1), the fundamental language of digital computers. Octal is base-8 (digits 0-7), a compact representation of binary. Since 8 is a power of 2, each octal digit maps to exactly 3 binary digits, making conversion straightforward without arithmetic.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I convert octal back to binary?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Click the "Swap Direction" button to switch to Octal &rarr; Binary mode. To manually convert, replace each octal digit with its 3-bit binary equivalent. For example, octal <code class="bg-darkCard px-1 rounded">375</code> &rarr; 3=<code class="bg-darkCard px-1 rounded">011</code>, 7=<code class="bg-darkCard px-1 rounded">111</code>, 5=<code class="bg-darkCard px-1 rounded">101</code> &rarr; binary <code class="bg-darkCard px-1 rounded">11111101</code>.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        const inputEl = document.getElementById('input-value');
        const outputEl = document.getElementById('output-value');
        const directionLabel = document.getElementById('direction-label');
        const inputLabel = document.getElementById('input-label');
        const outputLabel = document.getElementById('output-label');
        const btnSwap = document.getElementById('btn-swap');
        const btnCopy = document.getElementById('btn-copy');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const breakdown = document.getElementById('breakdown');
        const breakdownContent = document.getElementById('breakdown-content');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        let isBinaryToOctal = true;

        // 3-bit binary to octal lookup
        const binToOct = { '000': '0', '001': '1', '010': '2', '011': '3', '100': '4', '101': '5', '110': '6', '111': '7' };
        const octToBin = { '0': '000', '1': '001', '2': '010', '3': '011', '4': '100', '5': '101', '6': '110', '7': '111' };

        function binaryToOctal(bin) {
            if (!/^[01]+$/.test(bin)) return null;
            // Pad to multiple of 3
            while (bin.length % 3 !== 0) bin = '0' + bin;
            let result = '';
            for (let i = 0; i < bin.length; i += 3) {
                result += binToOct[bin.substring(i, i + 3)];
            }
            // Remove leading zeros but keep at least one digit
            return result.replace(/^0+/, '') || '0';
        }

        function octalToBinary(oct) {
            if (!/^[0-7]+$/.test(oct)) return null;
            let result = '';
            for (const digit of oct) {
                result += octToBin[digit];
            }
            // Remove leading zeros but keep at least one digit
            return result.replace(/^0+/, '') || '0';
        }

        function buildBreakdown(bin, oct) {
            // Pad to multiple of 3
            let padded = bin;
            while (padded.length % 3 !== 0) padded = '0' + padded;

            const groups = [];
            for (let i = 0; i < padded.length; i += 3) {
                groups.push(padded.substring(i, i + 3));
            }

            let html = `<div class="mb-3 text-light-muted text-xs">Binary padded to ${padded.length} bits (multiple of 3)</div>`;
            html += `<div class="overflow-x-auto"><table class="w-full text-sm">
                <thead><tr class="text-light-muted border-b border-gold/10">
                    <th class="text-left py-2 px-3">Group</th>
                    <th class="text-left py-2 px-3">3-Bit Binary</th>
                    <th class="text-left py-2 px-3">Octal Digit</th>
                </tr></thead><tbody>`;

            groups.forEach((group, i) => {
                html += `<tr class="border-b border-gold/5">
                    <td class="py-2 px-3 text-light-muted">${i + 1}</td>
                    <td class="py-2 px-3 text-light font-mono">${group}</td>
                    <td class="py-2 px-3 text-gold font-bold font-mono">${binToOct[group]}</td>
                </tr>`;
            });

            html += `</tbody></table></div>`;
            html += `<div class="mt-3 pt-2 border-t border-gold/10">
                <div class="flex flex-wrap items-center gap-1 text-sm">
                    <span class="text-light-muted">Grouped:</span>
                    ${groups.map(g => `<span class="px-2 py-0.5 bg-gold/10 border border-gold/20 rounded text-gold font-mono">${g}</span>`).join(' ')}
                    <span class="text-light-muted">&rarr;</span>
                    <span class="text-gold font-bold font-mono">${oct}</span>
                </div>
            </div>`;

            return html;
        }

        function convert() {
            const raw = inputEl.value.trim();
            if (!raw) {
                outputEl.value = '';
                breakdown.classList.add('hidden');
                return;
            }

            const values = raw.split(/[\s,\n]+/).filter(Boolean);
            const results = [];

            if (isBinaryToOctal) {
                let firstBin = null, firstOct = null;
                for (const val of values) {
                    const cleaned = val.replace(/^0[bB]/, '');
                    const oct = binaryToOctal(cleaned);
                    if (oct === null) {
                        showError(`Invalid binary value: "${val}" (only 0 and 1 allowed)`);
                        return;
                    }
                    if (!firstBin) { firstBin = cleaned; firstOct = oct; }
                    results.push(oct);
                }
                outputEl.value = results.join('\n');
                if (firstBin && values.length === 1) {
                    breakdownContent.innerHTML = buildBreakdown(firstBin, firstOct);
                    breakdown.classList.remove('hidden');
                } else {
                    breakdown.classList.add('hidden');
                }
                showSuccess(`Converted ${values.length} binary value${values.length > 1 ? 's' : ''} to octal`);
            } else {
                for (const val of values) {
                    const cleaned = val.replace(/^0[oO]/, '');
                    const bin = octalToBinary(cleaned);
                    if (bin === null) {
                        showError(`Invalid octal value: "${val}" (digits must be 0-7)`);
                        return;
                    }
                    results.push(bin);
                }
                outputEl.value = results.join('\n');
                breakdown.classList.add('hidden');
                showSuccess(`Converted ${values.length} octal value${values.length > 1 ? 's' : ''} to binary`);
            }
        }

        function swapDirection() {
            isBinaryToOctal = !isBinaryToOctal;
            if (isBinaryToOctal) {
                directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg> Binary &rarr; Octal';
                inputLabel.textContent = 'Binary Input';
                outputLabel.textContent = 'Octal Output';
                inputEl.placeholder = 'Enter binary numbers (e.g., 11111101, 111111111, 0b1010)...';
                outputEl.placeholder = 'Octal result will appear here...';
            } else {
                directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path></svg> Octal &rarr; Binary';
                inputLabel.textContent = 'Octal Input';
                outputLabel.textContent = 'Binary Output';
                inputEl.placeholder = 'Enter octal numbers (e.g., 375, 777, 0o52)...';
                outputEl.placeholder = 'Binary result will appear here...';
            }
            const temp = inputEl.value;
            inputEl.value = outputEl.value;
            outputEl.value = '';
            breakdown.classList.add('hidden');
            if (inputEl.value) convert();
        }

        function showSuccess(msg) {
            successMessage.textContent = msg;
            successNotification.classList.remove('hidden');
            errorNotification.classList.add('hidden');
            setTimeout(() => successNotification.classList.add('hidden'), 3000);
        }

        function showError(msg) {
            errorMessage.textContent = msg;
            errorNotification.classList.remove('hidden');
            successNotification.classList.add('hidden');
            setTimeout(() => errorNotification.classList.add('hidden'), 5000);
        }

        btnSwap.addEventListener('click', swapDirection);

        btnCopy.addEventListener('click', function() {
            const output = outputEl.value;
            if (!output) { showError('Nothing to copy'); return; }
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        });

        btnSample.addEventListener('click', function() {
            inputEl.value = isBinaryToOctal ? '11111101, 111111111, 1010, 11101101' : '375, 777, 12, 355';
            outputEl.value = '';
            breakdown.classList.add('hidden');
            convert();
        });

        btnClear.addEventListener('click', function() {
            inputEl.value = '';
            outputEl.value = '';
            breakdown.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        });

        let debounceTimer;
        inputEl.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(convert, 300);
        });

        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
        });
    })();
    </script>
    @endpush
</x-layout>
