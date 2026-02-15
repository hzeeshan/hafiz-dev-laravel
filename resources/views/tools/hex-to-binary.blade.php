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
        @include('tools.partials.hex-to-binary-script')
    @endpush
</x-layout>
