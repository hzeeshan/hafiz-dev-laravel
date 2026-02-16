<x-layout>
    <x-slot:title>Decimal to Binary Converter - Convert Decimal to Binary Online | hafiz.dev</x-slot:title>
    <x-slot:description>Free online decimal to binary converter. Convert decimal (base-10) numbers to binary (base-2) instantly with step-by-step division breakdown. No signup required.</x-slot:description>
    <x-slot:keywords>decimal to binary, convert decimal to binary, decimal to binary converter, how to convert decimal to binary, decimal to binary formula, base 10 to base 2</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/decimal-to-binary') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Decimal to Binary Converter - Convert Decimal to Binary Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online decimal to binary converter. Convert decimal numbers to binary instantly with step-by-step division breakdown.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/decimal-to-binary') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Decimal to Binary Converter",
            "description": "Free online decimal to binary converter with step-by-step division breakdown.",
            "url": "https://hafiz.dev/tools/decimal-to-binary",
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
                { "@@type": "ListItem", "position": 3, "name": "Decimal to Binary", "item": "https://hafiz.dev/tools/decimal-to-binary" }
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
                    "name": "How do I convert decimal to binary?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Divide the decimal number by 2 repeatedly and record each remainder. Read the remainders from bottom to top to get the binary number. For example, 42 ÷ 2 = 21 r0, 21 ÷ 2 = 10 r1, 10 ÷ 2 = 5 r0, 5 ÷ 2 = 2 r1, 2 ÷ 2 = 1 r0, 1 ÷ 2 = 0 r1, so 42 in binary is 101010."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is binary?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Binary is a base-2 number system that uses only two digits: 0 and 1. It is the fundamental language of computers because digital circuits operate with two states (on/off). Each binary digit is called a bit, and 8 bits make a byte."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is 255 in binary?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "255 in binary is 11111111 (eight 1s). This is the maximum value that can be stored in a single byte (8 bits). It's commonly seen in computing for maximum RGB color values, subnet masks (255.255.255.0), and maximum unsigned 8-bit integers."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the decimal to binary formula?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The formula uses repeated division by 2. Divide the number by 2 and note the remainder (0 or 1). Continue dividing the quotient by 2 until it reaches 0. The binary number is the remainders read from bottom to top. This is called the division-remainder method."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I convert binary back to decimal?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Multiply each binary digit by 2 raised to the power of its position (starting from 0 on the right) and add the results. For example, binary 101010 = (1×32) + (0×16) + (1×8) + (0×4) + (1×2) + (0×1) = 42. This tool supports both directions — click Swap."
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
                    <li class="text-gold">Decimal to Binary</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Decimal to Binary Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert decimal (base-10) numbers to binary (base-2) instantly with a step-by-step division breakdown. Supports batch conversion and reverse direction.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Direction Label --}}
                <div class="text-center mb-4">
                    <span id="direction-label" class="inline-flex items-center gap-2 px-4 py-1.5 bg-gold/10 border border-gold/30 rounded-full text-gold text-sm font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        Decimal → Binary
                    </span>
                </div>

                {{-- Input / Output --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    <div class="flex flex-col">
                        <label for="input-value" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            <span id="input-label">Decimal Input</span>
                        </label>
                        <textarea
                            id="input-value"
                            class="flex-1 min-h-[180px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Enter decimal numbers (e.g., 42, 255, 1024)..."
                            spellcheck="false"
                        ></textarea>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span id="output-label">Binary Output</span>
                        </label>
                        <textarea
                            id="output-value"
                            class="flex-1 min-h-[180px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="Binary result will appear here..."
                            readonly
                        ></textarea>
                    </div>
                </div>

                {{-- Bit Length Option --}}
                <div class="mb-6 p-3 bg-darkBg rounded-lg border border-gold/10 flex flex-wrap items-center gap-4">
                    <label class="text-light text-sm font-semibold">Pad to:</label>
                    <select id="bit-length" class="bg-darkCard border border-gold/20 rounded-lg px-3 py-1.5 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                        <option value="0">No padding</option>
                        <option value="4">4-bit</option>
                        <option value="8" selected>8-bit (byte)</option>
                        <option value="16">16-bit</option>
                        <option value="32">32-bit</option>
                    </select>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="group-bits" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer" checked>
                        <span class="text-sm text-light-muted">Group in 4-bit nibbles</span>
                    </label>
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
                        Step-by-Step Division Method
                    </h3>
                    <div class="overflow-x-auto border border-gold/10 rounded-lg">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="bg-darkCard border-b border-gold/10">
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">Step</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">Division</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">Quotient</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">Remainder</th>
                                </tr>
                            </thead>
                            <tbody id="breakdown-body" class="divide-y divide-gold/5"></tbody>
                        </table>
                    </div>
                    <div id="breakdown-result" class="mt-3 text-sm text-light-muted"></div>
                </div>

                {{-- Quick Reference --}}
                <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        Common Decimal to Binary Values
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-2">
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">1</span><br><span class="text-light-muted text-xs font-mono">= 1</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">8</span><br><span class="text-light-muted text-xs font-mono">= 1000</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">10</span><br><span class="text-light-muted text-xs font-mono">= 1010</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">16</span><br><span class="text-light-muted text-xs font-mono">= 10000</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">42</span><br><span class="text-light-muted text-xs font-mono">= 101010</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">64</span><br><span class="text-light-muted text-xs font-mono">= 1000000</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">100</span><br><span class="text-light-muted text-xs font-mono">= 1100100</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">127</span><br><span class="text-light-muted text-xs font-mono">= 1111111</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">128</span><br><span class="text-light-muted text-xs font-mono">= 10000000</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">255</span><br><span class="text-light-muted text-xs font-mono">= 11111111</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">256</span><br><span class="text-light-muted text-xs font-mono">= 100000000</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">1024</span><br><span class="text-light-muted text-xs font-mono">= 10000000000</span></div>
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
                    <p class="text-light-muted text-sm">Convert decimal to binary and binary back to decimal. Click the Swap button to switch direction instantly.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Division Breakdown</h3>
                    <p class="text-light-muted text-sm">See the full division-remainder method showing each step of converting a decimal number to binary.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Configurable Output</h3>
                    <p class="text-light-muted text-sm">Pad to 4, 8, 16, or 32 bits. Group binary digits into 4-bit nibbles for easy reading.</p>
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
                            <span class="text-light font-medium">How do I convert decimal to binary?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Use the division-remainder method: divide the decimal number by 2 repeatedly and record each remainder. Read the remainders from bottom to top. For example, <code class="bg-darkCard px-1 rounded">42</code> &divide; 2 = 21 r<strong>0</strong>, 21 &divide; 2 = 10 r<strong>1</strong>, 10 &divide; 2 = 5 r<strong>0</strong>, 5 &divide; 2 = 2 r<strong>1</strong>, 2 &divide; 2 = 1 r<strong>0</strong>, 1 &divide; 2 = 0 r<strong>1</strong>. Reading bottom-to-top: <code class="bg-darkCard px-1 rounded">101010</code>.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is binary?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Binary is a base-2 number system using only digits 0 and 1. It's the fundamental language of computers because digital circuits have two states: on (1) and off (0). Each binary digit is called a "bit", 8 bits make a "byte", and a byte can represent values from 0 to 255.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is 255 in binary?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            <code class="bg-darkCard px-1 rounded">255</code> in binary is <code class="bg-darkCard px-1 rounded">11111111</code> (eight 1s). This is the maximum value stored in a single byte (8 bits). It appears commonly in RGB color values (e.g., rgb(255, 255, 255) for white), subnet masks, and as the max unsigned 8-bit integer.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the decimal to binary formula?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The division-remainder method: divide the number by 2 and note the remainder (0 or 1). Continue dividing the quotient by 2 until it reaches 0. The binary number is the remainders read from bottom to top. For large numbers, you can also use positional subtraction: find the largest power of 2 that fits, place a 1, subtract, and repeat.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I convert binary back to decimal?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Multiply each binary digit by 2 raised to the power of its position (starting from 0 on the right) and add the results. For example, <code class="bg-darkCard px-1 rounded">101010</code> = (1&times;32) + (0&times;16) + (1&times;8) + (0&times;4) + (1&times;2) + (0&times;1) = <code class="bg-darkCard px-1 rounded">42</code>. Click "Swap Direction" to use this mode.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @include('tools.partials.decimal-to-binary-script')
    @endpush
</x-layout>
