<x-layout>
    <x-slot:title>Octal to Decimal Converter - Convert Octal to Decimal Online | hafiz.dev</x-slot:title>
    <x-slot:description>Free online octal to decimal converter. Convert octal (base-8) numbers to decimal (base-10) instantly with step-by-step calculation. No signup required.</x-slot:description>
    <x-slot:keywords>octal to decimal, convert octal to decimal, octal to decimal converter, how to convert octal to decimal, base 8 to base 10, octal number system</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/octal-to-decimal') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Octal to Decimal Converter - Convert Octal to Decimal Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online octal to decimal converter. Convert octal numbers to decimal instantly with step-by-step calculation.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/octal-to-decimal') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Octal to Decimal Converter",
            "description": "Free online octal to decimal converter with step-by-step calculation breakdown.",
            "url": "https://hafiz.dev/tools/octal-to-decimal",
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
                { "@@type": "ListItem", "position": 3, "name": "Octal to Decimal", "item": "https://hafiz.dev/tools/octal-to-decimal" }
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
                    "name": "How do I convert octal to decimal?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Multiply each octal digit by 8 raised to the power of its position (starting from 0 on the right). Then add all values together. For example, octal 175 = (1×8²) + (7×8¹) + (5×8⁰) = 64 + 56 + 5 = 125 in decimal."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the octal number system?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The octal number system is a base-8 system that uses digits 0-7. It was historically popular in computing because each octal digit represents exactly 3 binary bits. It's still used today in Unix file permissions (chmod), some programming languages (0o prefix), and legacy systems."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is octal 777 in decimal?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Octal 777 in decimal is 511. The calculation is: (7×8²) + (7×8¹) + (7×8⁰) = (7×64) + (7×8) + (7×1) = 448 + 56 + 7 = 511. In Unix, chmod 777 means full read/write/execute permissions for owner, group, and others."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between octal and decimal?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Decimal is base-10 (uses digits 0-9), the standard number system we use daily. Octal is base-8 (uses digits 0-7), primarily used in computing. Each place value in decimal is a power of 10, while in octal it's a power of 8. For example, '10' in decimal is ten, but '10' in octal is eight."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I convert decimal back to octal?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Divide the decimal number by 8 repeatedly, recording each remainder. Read the remainders from bottom to top to get the octal number. For example, 125 ÷ 8 = 15 remainder 5, 15 ÷ 8 = 1 remainder 7, 1 ÷ 8 = 0 remainder 1, so 125 decimal = 175 octal. This tool supports both directions."
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
                    <li class="text-gold">Octal to Decimal</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Octal to Decimal Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert octal (base-8) numbers to decimal (base-10) instantly with a step-by-step calculation breakdown. Supports batch conversion and reverse direction.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Direction Label --}}
                <div class="text-center mb-4">
                    <span id="direction-label" class="inline-flex items-center gap-2 px-4 py-1.5 bg-gold/10 border border-gold/30 rounded-full text-gold text-sm font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        Octal → Decimal
                    </span>
                </div>

                {{-- Input / Output --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    <div class="flex flex-col">
                        <label for="input-value" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            <span id="input-label">Octal Input</span>
                        </label>
                        <textarea
                            id="input-value"
                            class="flex-1 min-h-[180px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Enter octal numbers (e.g., 175, 777, 0o52)..."
                            spellcheck="false"
                        ></textarea>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span id="output-label">Decimal Output</span>
                        </label>
                        <textarea
                            id="output-value"
                            class="flex-1 min-h-[180px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="Decimal result will appear here..."
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
                        Step-by-Step Calculation
                    </h3>
                    <div id="breakdown-content" class="font-mono text-sm space-y-2"></div>
                </div>

                {{-- Quick Reference --}}
                <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        Common Octal to Decimal Values
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-2">
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">10</span><br><span class="text-light-muted text-xs font-mono">= 8</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">77</span><br><span class="text-light-muted text-xs font-mono">= 63</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">100</span><br><span class="text-light-muted text-xs font-mono">= 64</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">144</span><br><span class="text-light-muted text-xs font-mono">= 100</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">377</span><br><span class="text-light-muted text-xs font-mono">= 255</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">644</span><br><span class="text-light-muted text-xs font-mono">= 420</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">755</span><br><span class="text-light-muted text-xs font-mono">= 493</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">777</span><br><span class="text-light-muted text-xs font-mono">= 511</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">1000</span><br><span class="text-light-muted text-xs font-mono">= 512</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">1777</span><br><span class="text-light-muted text-xs font-mono">= 1023</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">3777</span><br><span class="text-light-muted text-xs font-mono">= 2047</span></div>
                        <div class="text-center p-2 bg-darkCard rounded border border-gold/10"><span class="text-gold font-mono font-bold">7777</span><br><span class="text-light-muted text-xs font-mono">= 4095</span></div>
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
                    <p class="text-light-muted text-sm">Convert octal to decimal and decimal back to octal. Click the Swap button to switch direction instantly.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Step-by-Step</h3>
                    <p class="text-light-muted text-sm">See the full positional notation calculation showing how each octal digit contributes to the decimal result.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Batch Conversion</h3>
                    <p class="text-light-muted text-sm">Convert multiple octal values at once. Enter space or comma-separated values for fast bulk conversion.</p>
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
                            <span class="text-light font-medium">How do I convert octal to decimal?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Multiply each octal digit by 8 raised to the power of its position (starting from 0 on the right), then add all values together. For example, octal <code class="bg-darkCard px-1 rounded">175</code> = (1&times;8&sup2;) + (7&times;8&sup1;) + (5&times;8&sup0;) = 64 + 56 + 5 = <code class="bg-darkCard px-1 rounded">125</code> in decimal.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the octal number system?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            The octal number system is base-8, using digits 0 through 7. It was historically popular in computing because each octal digit represents exactly 3 binary bits. It's still used today in Unix/Linux file permissions (<code class="bg-darkCard px-1 rounded">chmod 755</code>), some programming languages (<code class="bg-darkCard px-1 rounded">0o</code> prefix in Python), and legacy systems.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is octal 777 in decimal?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Octal <code class="bg-darkCard px-1 rounded">777</code> in decimal is <code class="bg-darkCard px-1 rounded">511</code>. The calculation: (7&times;64) + (7&times;8) + (7&times;1) = 448 + 56 + 7 = 511. In Unix, <code class="bg-darkCard px-1 rounded">chmod 777</code> grants full read, write, and execute permissions to owner, group, and others.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between octal and decimal?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Decimal is base-10 (digits 0-9), the standard number system used in everyday life. Octal is base-8 (digits 0-7), used primarily in computing. Each place value in decimal is a power of 10, while in octal it's a power of 8. For example, <code class="bg-darkCard px-1 rounded">10</code> in decimal is ten, but <code class="bg-darkCard px-1 rounded">10</code> in octal equals eight.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I convert decimal back to octal?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! Click the "Swap Direction" button to switch to Decimal → Octal mode. To manually convert, divide the decimal number by 8 repeatedly, recording each remainder. Read the remainders bottom-to-top. For example, 125 &divide; 8 = 15 r5, 15 &divide; 8 = 1 r7, 1 &divide; 8 = 0 r1, so 125 = octal <code class="bg-darkCard px-1 rounded">175</code>.
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

        let isOctalToDecimal = true;

        function octalToDecimal(oct) {
            if (!/^[0-7]+$/.test(oct)) return null;
            return parseInt(oct, 8);
        }

        function decimalToOctal(dec) {
            const n = parseInt(dec, 10);
            if (isNaN(n) || n < 0 || dec !== String(n)) return null;
            return n.toString(8);
        }

        function buildBreakdown(oct, dec) {
            const digits = oct.split('');
            const len = digits.length;
            const parts = digits.map((d, i) => {
                const pos = len - 1 - i;
                const val = parseInt(d) * Math.pow(8, pos);
                return `<span class="text-light-muted">(</span><span class="text-gold">${d}</span> <span class="text-light-muted">×</span> 8<sup>${pos}</sup><span class="text-light-muted">)</span> = <span class="text-light">${val}</span>`;
            });
            return `<div class="space-y-1">${parts.map(p => `<div>${p}</div>`).join('')}</div>
                    <div class="mt-2 pt-2 border-t border-gold/10 text-light">
                        ${parts.map((_, i) => { const d = digits[i]; const pos = len-1-i; return parseInt(d)*Math.pow(8,pos); }).join(' + ')} = <span class="text-gold font-bold">${dec}</span>
                    </div>`;
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

            if (isOctalToDecimal) {
                let firstOct = null, firstDec = null;
                for (const val of values) {
                    const cleaned = val.replace(/^0[oO]/, '');
                    const dec = octalToDecimal(cleaned);
                    if (dec === null) {
                        showError(`Invalid octal value: "${val}" (digits must be 0-7)`);
                        return;
                    }
                    if (!firstOct) { firstOct = cleaned; firstDec = dec; }
                    results.push(dec);
                }
                outputEl.value = results.join('\n');
                if (firstOct && values.length === 1) {
                    breakdownContent.innerHTML = buildBreakdown(firstOct, firstDec);
                    breakdown.classList.remove('hidden');
                } else {
                    breakdown.classList.add('hidden');
                }
                showSuccess(`Converted ${values.length} octal value${values.length > 1 ? 's' : ''} to decimal`);
            } else {
                for (const val of values) {
                    const oct = decimalToOctal(val);
                    if (oct === null) {
                        showError(`Invalid decimal value: "${val}" (must be a non-negative integer)`);
                        return;
                    }
                    results.push(oct);
                }
                outputEl.value = results.join('\n');
                breakdown.classList.add('hidden');
                showSuccess(`Converted ${values.length} decimal value${values.length > 1 ? 's' : ''} to octal`);
            }
        }

        function swapDirection() {
            isOctalToDecimal = !isOctalToDecimal;
            if (isOctalToDecimal) {
                directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg> Octal → Decimal';
                inputLabel.textContent = 'Octal Input';
                outputLabel.textContent = 'Decimal Output';
                inputEl.placeholder = 'Enter octal numbers (e.g., 175, 777, 0o52)...';
                outputEl.placeholder = 'Decimal result will appear here...';
            } else {
                directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path></svg> Decimal → Octal';
                inputLabel.textContent = 'Decimal Input';
                outputLabel.textContent = 'Octal Output';
                inputEl.placeholder = 'Enter decimal numbers (e.g., 125, 511, 255)...';
                outputEl.placeholder = 'Octal result will appear here...';
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
            inputEl.value = isOctalToDecimal ? '175, 777, 755, 644' : '125, 511, 493, 420';
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
