<x-layout>
    <x-slot:title>Hex to Binary Converter - Convert Hexadecimal to Binary Online | hafiz.dev</x-slot:title>
    <x-slot:description>Free online hex to binary converter. Convert hexadecimal to binary instantly with step-by-step nibble breakdown. No signup required.</x-slot:description>
    <x-slot:keywords>hex to binary, convert hex to binary, hexadecimal to binary, hex to binary converter, how to convert hex to binary, hex to bin</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/hex-to-binary') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Hex to Binary Converter - Convert Hexadecimal to Binary Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online hex to binary converter. Convert hexadecimal to binary instantly with step-by-step nibble breakdown.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/hex-to-binary') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Hex to Binary Converter",
            "description": "Free online hex to binary converter. Convert hexadecimal to binary instantly with step-by-step breakdown.",
            "url": "https://hafiz.dev/tools/hex-to-binary",
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
                { "@@type": "ListItem", "position": 3, "name": "Hex to Binary", "item": "https://hafiz.dev/tools/hex-to-binary" }
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
                    "name": "How do I convert hex to binary?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Each hexadecimal digit maps directly to a 4-bit binary nibble. For example, hex A = 1010, hex F = 1111. To convert a hex number like 2F, convert each digit separately: 2 = 0010, F = 1111, so 2F = 00101111."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is hexadecimal?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Hexadecimal (hex) is a base-16 number system that uses digits 0-9 and letters A-F. It's widely used in computing because each hex digit represents exactly 4 binary bits, making it a compact way to represent binary data. For example, the binary number 11111111 is just FF in hex."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the binary equivalent of hex FF?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Hex FF in binary is 11111111. F = 1111 in binary, so FF = 1111 1111. This equals 255 in decimal and represents the maximum value of a single byte."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between hex and binary?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Binary is base-2 (uses 0 and 1) while hexadecimal is base-16 (uses 0-9 and A-F). Hex is a more compact representation — one hex digit equals exactly 4 binary digits. For example, the 8-bit binary 10110110 is just B6 in hex. Hex is preferred for readability in memory addresses, color codes, and MAC addresses."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I convert binary back to hex?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Group the binary digits into sets of 4 from right to left, then convert each group to its hex equivalent. For example, 10110110 → 1011 0110 → B6. This tool supports both directions — click the Swap button to switch from binary to hex mode."
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
                    <li class="text-gold">Hex to Binary</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Hex to Binary Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert hexadecimal to binary instantly with a step-by-step nibble breakdown. Supports batch conversion and reverse binary to hex.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Direction Label --}}
                <div class="text-center mb-4">
                    <span id="direction-label" class="inline-flex items-center gap-2 px-4 py-1.5 bg-gold/10 border border-gold/30 rounded-full text-gold text-sm font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        Hexadecimal → Binary
                    </span>
                </div>

                {{-- Input / Output --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    {{-- Input --}}
                    <div class="flex flex-col">
                        <label for="hex-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            <span id="input-label">Hexadecimal Input</span>
                        </label>
                        <textarea
                            id="hex-input"
                            class="flex-1 min-h-[180px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Enter hex values (e.g., FF, 2A, 0x1F4)..."
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output --}}
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span id="output-label">Binary Output</span>
                        </label>
                        <textarea
                            id="binary-output"
                            class="flex-1 min-h-[180px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="Binary result will appear here..."
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

                {{-- Nibble Breakdown --}}
                <div id="breakdown" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
                    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                        Step-by-Step Breakdown
                    </h3>
                    <div class="overflow-x-auto border border-gold/10 rounded-lg">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="bg-darkCard border-b border-gold/10">
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">Hex Digit</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">Decimal</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">Binary (4-bit)</th>
                                </tr>
                            </thead>
                            <tbody id="breakdown-body" class="divide-y divide-gold/5"></tbody>
                        </table>
                    </div>
                </div>

                {{-- Hex Reference Table --}}
                <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        Hex to Binary Reference Table
                    </h3>
                    <div class="grid grid-cols-4 sm:grid-cols-8 gap-2">
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">0</span><br><span class="text-light-muted text-xs font-mono">0000</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">1</span><br><span class="text-light-muted text-xs font-mono">0001</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">2</span><br><span class="text-light-muted text-xs font-mono">0010</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">3</span><br><span class="text-light-muted text-xs font-mono">0011</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">4</span><br><span class="text-light-muted text-xs font-mono">0100</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">5</span><br><span class="text-light-muted text-xs font-mono">0101</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">6</span><br><span class="text-light-muted text-xs font-mono">0110</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">7</span><br><span class="text-light-muted text-xs font-mono">0111</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">8</span><br><span class="text-light-muted text-xs font-mono">1000</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">9</span><br><span class="text-light-muted text-xs font-mono">1001</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">A</span><br><span class="text-light-muted text-xs font-mono">1010</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">B</span><br><span class="text-light-muted text-xs font-mono">1011</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">C</span><br><span class="text-light-muted text-xs font-mono">1100</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">D</span><br><span class="text-light-muted text-xs font-mono">1101</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">E</span><br><span class="text-light-muted text-xs font-mono">1110</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">F</span><br><span class="text-light-muted text-xs font-mono">1111</span></div>
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
                    <p class="text-light-muted text-sm">Convert hex to binary and binary back to hex. Click the Swap button to switch direction instantly.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Nibble Breakdown</h3>
                    <p class="text-light-muted text-sm">See each hex digit mapped to its 4-bit binary nibble in a step-by-step table for easy learning.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Batch Conversion</h3>
                    <p class="text-light-muted text-sm">Convert multiple hex values at once. Enter space or comma-separated values for fast bulk conversion.</p>
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
                            <span class="text-light font-medium">How do I convert hex to binary?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Each hexadecimal digit maps directly to a 4-bit binary nibble. For example, hex <code class="bg-darkCard px-1 rounded">A</code> = <code class="bg-darkCard px-1 rounded">1010</code>, hex <code class="bg-darkCard px-1 rounded">F</code> = <code class="bg-darkCard px-1 rounded">1111</code>. To convert a hex number like <code class="bg-darkCard px-1 rounded">2F</code>, convert each digit separately: <code class="bg-darkCard px-1 rounded">2</code> = <code class="bg-darkCard px-1 rounded">0010</code>, <code class="bg-darkCard px-1 rounded">F</code> = <code class="bg-darkCard px-1 rounded">1111</code>, so <code class="bg-darkCard px-1 rounded">2F</code> = <code class="bg-darkCard px-1 rounded">00101111</code>.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is hexadecimal?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Hexadecimal (hex) is a base-16 number system that uses digits 0-9 and letters A-F. It's widely used in computing because each hex digit represents exactly 4 binary bits, making it a compact way to represent binary data. For example, the binary number <code class="bg-darkCard px-1 rounded">11111111</code> is just <code class="bg-darkCard px-1 rounded">FF</code> in hex, and the color white in CSS is <code class="bg-darkCard px-1 rounded">#FFFFFF</code>.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the binary equivalent of hex FF?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Hex <code class="bg-darkCard px-1 rounded">FF</code> in binary is <code class="bg-darkCard px-1 rounded">11111111</code>. Each <code class="bg-darkCard px-1 rounded">F</code> = <code class="bg-darkCard px-1 rounded">1111</code> in binary, so <code class="bg-darkCard px-1 rounded">FF</code> = <code class="bg-darkCard px-1 rounded">1111 1111</code>. This equals 255 in decimal and represents the maximum value of a single byte (8 bits).
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between hex and binary?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Binary is base-2 (uses only 0 and 1) while hexadecimal is base-16 (uses 0-9 and A-F). Hex is a more compact representation — one hex digit equals exactly 4 binary digits. For example, the 8-bit binary <code class="bg-darkCard px-1 rounded">10110110</code> is just <code class="bg-darkCard px-1 rounded">B6</code> in hex. Hex is preferred for readability in memory addresses, color codes, and MAC addresses.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I convert binary back to hex?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Group the binary digits into sets of 4 from right to left, then convert each group to its hex equivalent. For example, <code class="bg-darkCard px-1 rounded">10110110</code> → <code class="bg-darkCard px-1 rounded">1011 0110</code> → <code class="bg-darkCard px-1 rounded">B6</code>. This tool supports both directions — click the "Swap Direction" button to switch from binary to hex mode.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        const hexInput = document.getElementById('hex-input');
        const binaryOutput = document.getElementById('binary-output');
        const directionLabel = document.getElementById('direction-label');
        const inputLabel = document.getElementById('input-label');
        const outputLabel = document.getElementById('output-label');
        const btnSwap = document.getElementById('btn-swap');
        const btnCopy = document.getElementById('btn-copy');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const breakdown = document.getElementById('breakdown');
        const breakdownBody = document.getElementById('breakdown-body');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        let isHexToBinary = true;

        const hexToBinMap = {
            '0': '0000', '1': '0001', '2': '0010', '3': '0011',
            '4': '0100', '5': '0101', '6': '0110', '7': '0111',
            '8': '1000', '9': '1001', 'A': '1010', 'B': '1011',
            'C': '1100', 'D': '1101', 'E': '1110', 'F': '1111'
        };

        const binToHexMap = {};
        for (const [k, v] of Object.entries(hexToBinMap)) binToHexMap[v] = k;

        function convertHexToBinary() {
            const raw = hexInput.value.trim();
            if (!raw) {
                binaryOutput.value = '';
                breakdown.classList.add('hidden');
                return;
            }

            // Split on whitespace, commas, or newlines; strip 0x prefixes
            const values = raw.split(/[\s,\n]+/).filter(Boolean);
            const results = [];
            const allDigits = [];

            for (const val of values) {
                const cleaned = val.replace(/^0[xX]/, '').toUpperCase();
                if (!/^[0-9A-F]+$/.test(cleaned)) {
                    showError(`Invalid hex value: "${val}"`);
                    return;
                }

                let binary = '';
                for (const ch of cleaned) {
                    binary += hexToBinMap[ch];
                    allDigits.push({ hex: ch, decimal: parseInt(ch, 16), binary: hexToBinMap[ch] });
                }
                results.push(binary);
            }

            binaryOutput.value = results.join(' ');

            // Breakdown table
            breakdownBody.innerHTML = allDigits.map(d =>
                `<tr class="hover:bg-gold/5 transition-colors">
                    <td class="px-4 py-2 font-mono text-lg text-gold font-bold">${d.hex}</td>
                    <td class="px-4 py-2 font-mono text-light-muted">${d.decimal}</td>
                    <td class="px-4 py-2 font-mono text-light-muted">${d.binary}</td>
                </tr>`
            ).join('');
            breakdown.classList.remove('hidden');

            showSuccess(`Converted ${values.length} hex value${values.length > 1 ? 's' : ''} to binary`);
        }

        function convertBinaryToHex() {
            const raw = hexInput.value.trim();
            if (!raw) {
                binaryOutput.value = '';
                breakdown.classList.add('hidden');
                return;
            }

            const values = raw.split(/[\s,\n]+/).filter(Boolean);
            const results = [];

            for (const val of values) {
                const cleaned = val.replace(/^0[bB]/, '');
                if (!/^[01]+$/.test(cleaned)) {
                    showError(`Invalid binary value: "${val}"`);
                    return;
                }

                // Pad to multiple of 4
                const padded = cleaned.padStart(Math.ceil(cleaned.length / 4) * 4, '0');
                let hex = '';
                for (let i = 0; i < padded.length; i += 4) {
                    const nibble = padded.substring(i, i + 4);
                    hex += binToHexMap[nibble] || '?';
                }
                results.push(hex);
            }

            binaryOutput.value = results.join(' ');
            breakdown.classList.add('hidden');

            showSuccess(`Converted ${values.length} binary value${values.length > 1 ? 's' : ''} to hex`);
        }

        function convert() {
            if (isHexToBinary) {
                convertHexToBinary();
            } else {
                convertBinaryToHex();
            }
        }

        function swapDirection() {
            isHexToBinary = !isHexToBinary;
            if (isHexToBinary) {
                directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg> Hexadecimal → Binary';
                inputLabel.textContent = 'Hexadecimal Input';
                outputLabel.textContent = 'Binary Output';
                hexInput.placeholder = 'Enter hex values (e.g., FF, 2A, 0x1F4)...';
                binaryOutput.placeholder = 'Binary result will appear here...';
            } else {
                directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path></svg> Binary → Hexadecimal';
                inputLabel.textContent = 'Binary Input';
                outputLabel.textContent = 'Hexadecimal Output';
                hexInput.placeholder = 'Enter binary values (e.g., 11111111, 0b1010)...';
                binaryOutput.placeholder = 'Hex result will appear here...';
            }
            const temp = hexInput.value;
            hexInput.value = binaryOutput.value;
            binaryOutput.value = '';
            breakdown.classList.add('hidden');
            if (hexInput.value) convert();
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

        // Event listeners
        btnSwap.addEventListener('click', swapDirection);

        btnCopy.addEventListener('click', function() {
            const output = binaryOutput.value;
            if (!output) { showError('Nothing to copy'); return; }
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        });

        btnSample.addEventListener('click', function() {
            if (isHexToBinary) {
                hexInput.value = 'FF 2A 0x1F4 DEADBEEF';
            } else {
                hexInput.value = '11111111 00101010 0001111101000';
            }
            binaryOutput.value = '';
            breakdown.classList.add('hidden');
            convert();
        });

        btnClear.addEventListener('click', function() {
            hexInput.value = '';
            binaryOutput.value = '';
            breakdown.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        });

        // Real-time conversion
        let debounceTimer;
        hexInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(convert, 300);
        });

        // Keyboard shortcut
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
        });
    })();
    </script>
    @endpush
</x-layout>
