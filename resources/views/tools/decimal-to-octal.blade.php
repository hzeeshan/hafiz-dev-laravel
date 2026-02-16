<x-layout>
    <x-slot:title>Decimal to Octal Converter - Convert Decimal to Octal Online | hafiz.dev</x-slot:title>
    <x-slot:description>Free online decimal to octal converter. Convert decimal (base-10) numbers to octal (base-8) instantly with step-by-step division breakdown. No signup required.</x-slot:description>
    <x-slot:keywords>decimal to octal, convert decimal to octal, decimal to octal converter, decimal to octal conversion, base 10 to base 8, octal number system</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/decimal-to-octal') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Decimal to Octal Converter - Convert Decimal to Octal Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online decimal to octal converter. Convert decimal numbers to octal instantly with step-by-step division breakdown.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/decimal-to-octal') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Decimal to Octal Converter",
            "description": "Free online decimal to octal converter with step-by-step division breakdown.",
            "url": "https://hafiz.dev/tools/decimal-to-octal",
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
                { "@@type": "ListItem", "position": 3, "name": "Decimal to Octal", "item": "https://hafiz.dev/tools/decimal-to-octal" }
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
                    "name": "How do I convert decimal to octal?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Divide the decimal number by 8 repeatedly, recording each remainder. Read the remainders from bottom to top. For example, 125 ÷ 8 = 15 remainder 5, 15 ÷ 8 = 1 remainder 7, 1 ÷ 8 = 0 remainder 1. Reading bottom-to-top: 175. So 125 in decimal = 175 in octal."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the octal equivalent of decimal 255?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Decimal 255 in octal is 377. The calculation: 255 ÷ 8 = 31 remainder 7, 31 ÷ 8 = 3 remainder 7, 3 ÷ 8 = 0 remainder 3. Reading remainders bottom-to-top gives 377. This is significant in computing as 255 is the maximum value of an 8-bit byte."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Why is octal used in computing?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Octal is used because each octal digit maps to exactly 3 binary bits, making it a compact way to represent binary data. It's commonly used in Unix/Linux file permissions (chmod 755, chmod 644), older programming languages, and some assembly code. It provides a human-readable shorthand for groups of 3 binary digits."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What are common Unix permission values in octal?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Common Unix permissions: 755 (rwxr-xr-x, typical for directories and executables), 644 (rw-r--r--, typical for files), 777 (rwxrwxrwx, full access), 600 (rw-------, private files), 700 (rwx------, private directories). Each digit represents owner, group, and others permissions respectively."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I convert octal back to decimal?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Click the Swap Direction button to switch to Octal → Decimal mode. To manually convert, multiply each octal digit by 8 raised to the power of its position (starting from 0 on the right), then sum all values. For example, octal 175 = (1×64) + (7×8) + (5×1) = 125."
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
                    <li class="text-gold">Decimal to Octal</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Decimal to Octal Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert decimal (base-10) numbers to octal (base-8) instantly with a step-by-step division breakdown. Supports batch conversion and reverse direction.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Direction Label --}}
                <div class="text-center mb-4">
                    <span id="direction-label" class="inline-flex items-center gap-2 px-4 py-1.5 bg-gold/10 border border-gold/30 rounded-full text-gold text-sm font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        Decimal &rarr; Octal
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
                            placeholder="Enter decimal numbers (e.g., 125, 511, 255)..."
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
                        Step-by-Step Division Breakdown
                    </h3>
                    <div id="breakdown-content" class="font-mono text-sm"></div>
                </div>

                {{-- Quick Reference --}}
                <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        Common Decimal to Octal Values
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-2">
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">8</span><br><span class="text-light-muted text-xs font-mono">= 10</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">63</span><br><span class="text-light-muted text-xs font-mono">= 77</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">64</span><br><span class="text-light-muted text-xs font-mono">= 100</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">100</span><br><span class="text-light-muted text-xs font-mono">= 144</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">255</span><br><span class="text-light-muted text-xs font-mono">= 377</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">420</span><br><span class="text-light-muted text-xs font-mono">= 644</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">493</span><br><span class="text-light-muted text-xs font-mono">= 755</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">511</span><br><span class="text-light-muted text-xs font-mono">= 777</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">512</span><br><span class="text-light-muted text-xs font-mono">= 1000</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">1023</span><br><span class="text-light-muted text-xs font-mono">= 1777</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">2047</span><br><span class="text-light-muted text-xs font-mono">= 3777</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">4095</span><br><span class="text-light-muted text-xs font-mono">= 7777</span></div>
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
                    <p class="text-light-muted text-sm">Convert decimal to octal and octal back to decimal. Click the Swap button to switch direction instantly.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Step-by-Step</h3>
                    <p class="text-light-muted text-sm">See the full division-remainder method showing each step of converting a decimal number to its octal representation.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Batch Conversion</h3>
                    <p class="text-light-muted text-sm">Convert multiple decimal values at once. Enter space or comma-separated values for fast bulk conversion.</p>
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
                            <span class="text-light font-medium">How do I convert decimal to octal?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Divide the decimal number by 8 repeatedly, recording each remainder. Read the remainders from bottom to top. For example, <code class="bg-darkCard px-1 rounded">125</code>: 125 &divide; 8 = 15 remainder 5, 15 &divide; 8 = 1 remainder 7, 1 &divide; 8 = 0 remainder 1. Reading bottom-to-top: <code class="bg-darkCard px-1 rounded">175</code> in octal.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the octal equivalent of decimal 255?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Decimal <code class="bg-darkCard px-1 rounded">255</code> in octal is <code class="bg-darkCard px-1 rounded">377</code>. This is significant in computing as 255 is the maximum value of an unsigned 8-bit byte. In Unix permissions, <code class="bg-darkCard px-1 rounded">chmod 377</code> would mean write+execute for owner, and full permissions for group and others.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Why is octal used in computing?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Each octal digit maps to exactly 3 binary bits, making it a compact way to represent binary data. It's commonly used in Unix/Linux file permissions (<code class="bg-darkCard px-1 rounded">chmod 755</code>, <code class="bg-darkCard px-1 rounded">chmod 644</code>), older programming languages, and some assembly code. It provides a human-readable shorthand for groups of 3 binary digits.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What are common Unix permission values in octal?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Common permissions: <code class="bg-darkCard px-1 rounded">755</code> (rwxr-xr-x, directories &amp; executables), <code class="bg-darkCard px-1 rounded">644</code> (rw-r--r--, regular files), <code class="bg-darkCard px-1 rounded">777</code> (rwxrwxrwx, full access), <code class="bg-darkCard px-1 rounded">600</code> (rw-------, private files), <code class="bg-darkCard px-1 rounded">700</code> (rwx------, private directories). Each digit represents owner, group, and others respectively.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I convert octal back to decimal?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Click the "Swap Direction" button to switch to Octal &rarr; Decimal mode. To manually convert, multiply each octal digit by 8 raised to the power of its position (starting from 0 on the right), then sum all values. For example, octal <code class="bg-darkCard px-1 rounded">175</code> = (1&times;64) + (7&times;8) + (5&times;1) = <code class="bg-darkCard px-1 rounded">125</code>.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @include('tools.partials.decimal-to-octal-script')
    @endpush
</x-layout>
