<x-layout>
    <x-slot:title>CSS to Tailwind Converter - Convert CSS to Tailwind Classes Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online CSS to Tailwind CSS converter. Convert CSS properties to Tailwind utility classes instantly in your browser. No signup required.</x-slot:description>
    <x-slot:keywords>css to tailwind converter, css to tailwind, convert css to tailwind, tailwind css converter, css to tailwind online, tailwind class converter</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/css-to-tailwind') }}</x-slot:canonical>

    <x-slot:ogTitle>CSS to Tailwind Converter - Convert CSS to Tailwind Classes Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Convert CSS properties to Tailwind CSS utility classes instantly. Free online converter with support for colors, spacing, typography, flexbox, grid, and more.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/css-to-tailwind') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "CSS to Tailwind Converter",
            "description": "Free online CSS to Tailwind CSS converter. Convert CSS properties to Tailwind utility classes instantly.",
            "url": "https://hafiz.dev/tools/css-to-tailwind",
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
                { "@@type": "ListItem", "position": 3, "name": "CSS to Tailwind", "item": "https://hafiz.dev/tools/css-to-tailwind" }
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
                    "name": "How do I convert CSS to Tailwind CSS?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Paste your CSS code into the input field and the tool instantly converts each CSS property to its equivalent Tailwind CSS utility class. It handles colors, spacing, typography, flexbox, grid, borders, shadows, and more."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does this converter handle all CSS properties?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The converter supports the most commonly used CSS properties including display, position, colors, spacing (margin, padding), sizing (width, height), typography (font-size, font-weight, line-height), flexbox, grid, borders, border-radius, box-shadow, opacity, overflow, z-index, and more. Unsupported properties are shown as comments for manual conversion."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does it convert hex colors to Tailwind color classes?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! The converter maps common hex color values to Tailwind's color palette (e.g., #ef4444 becomes red-500). For colors that don't match the palette, it generates arbitrary value syntax like bg-[#abc123]."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I convert multiple CSS rules at once?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! You can paste multiple CSS rules with selectors and the converter processes each rule separately, showing the Tailwind classes for each selector. It handles nested rules and multiple declarations per block."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is the CSS to Tailwind conversion done locally?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, all conversion happens 100% in your browser. Your CSS code is never sent to any server, ensuring complete privacy and instant results."
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
                    <li class="text-gold">CSS to Tailwind</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">CSS to Tailwind Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert CSS properties to Tailwind CSS utility classes instantly. Supports colors, spacing, typography, flexbox, grid, and more.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="flex flex-wrap gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="opt-arbitrary" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Use arbitrary values for unknowns</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="opt-strip-selectors" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Strip selectors (classes only)</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="opt-important" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Add ! prefix (important)</span>
                        </label>
                    </div>
                </div>

                {{-- Input / Output --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    <div class="flex flex-col">
                        <div class="flex items-center justify-between mb-2">
                            <label for="css-input" class="text-light font-semibold flex items-center gap-2">
                                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                CSS Input
                            </label>
                            <label class="px-3 py-1 border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-xs flex items-center gap-1 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Upload .css
                                <input type="file" id="file-upload" accept=".css" class="hidden">
                            </label>
                        </div>
                        <textarea
                            id="css-input"
                            class="flex-1 min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Paste your CSS here...

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 1rem;
  background-color: #ffffff;
}"
                            spellcheck="false"
                        ></textarea>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            Tailwind Output
                        </label>
                        <textarea
                            id="tw-output"
                            class="flex-1 min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="Tailwind CSS classes will appear here..."
                            readonly
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Convert
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download
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

                {{-- Stats --}}
                <div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div id="stat-rules" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">CSS Rules</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-properties" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Properties</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-converted" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Converted</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-unsupported" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Unsupported</div>
                        </div>
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

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant Conversion</h3>
                    <p class="text-light-muted text-sm">Paste CSS and get Tailwind classes in real-time. Handles colors, spacing, typography, flexbox, grid, borders, shadows, and more.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Smart Color Mapping</h3>
                    <p class="text-light-muted text-sm">Hex colors are mapped to the closest Tailwind palette color. Unknown colors use arbitrary value syntax like <code class="bg-darkCard px-1 rounded">bg-[#abc]</code>.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All conversion happens in your browser. Your CSS code is never sent to any server. Fast, secure, and completely private.</p>
                </div>
            </div>

            {{-- Dynamic CTA --}}
            <x-tool-cta />

            {{-- FAQ Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Frequently Asked Questions</h2>
                <div class="space-y-4 max-w-3xl mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I convert CSS to Tailwind CSS?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Paste your CSS code into the input field and the tool instantly converts each CSS property to its equivalent Tailwind CSS utility class. It handles colors, spacing, typography, flexbox, grid, borders, shadows, and more.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does this converter handle all CSS properties?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">The converter supports the most commonly used CSS properties including display, position, colors, spacing (margin, padding), sizing (width, height), typography (font-size, font-weight, line-height), flexbox, grid, borders, border-radius, box-shadow, opacity, overflow, z-index, and more. Unsupported properties are shown as comments for manual conversion.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does it convert hex colors to Tailwind color classes?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! The converter maps common hex color values to Tailwind's color palette (e.g., #ef4444 becomes red-500). For colors that don't match the palette, it generates arbitrary value syntax like bg-[#abc123].</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I convert multiple CSS rules at once?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! You can paste multiple CSS rules with selectors and the converter processes each rule separately, showing the Tailwind classes for each selector. It handles nested rules and multiple declarations per block.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is the CSS to Tailwind conversion done locally?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes, all conversion happens 100% in your browser. Your CSS code is never sent to any server, ensuring complete privacy and instant results.</div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        const cssInput = document.getElementById('css-input');
        const twOutput = document.getElementById('tw-output');
        const optArbitrary = document.getElementById('opt-arbitrary');
        const optStripSelectors = document.getElementById('opt-strip-selectors');
        const optImportant = document.getElementById('opt-important');
        const fileUpload = document.getElementById('file-upload');
        const btnConvert = document.getElementById('btn-convert');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const statsBar = document.getElementById('stats-bar');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        const sampleCSS = `.container {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 1.5rem;
  margin: 0 auto;
  max-width: 1280px;
}

.card {
  background-color: #ffffff;
  border-radius: 0.75rem;
  border: 1px solid #e5e7eb;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  padding: 1.5rem;
  margin-bottom: 1rem;
}

.card-title {
  font-size: 1.5rem;
  font-weight: 700;
  line-height: 2rem;
  color: #111827;
  margin-bottom: 0.5rem;
}

.card-text {
  font-size: 0.875rem;
  color: #6b7280;
  line-height: 1.25rem;
}

.btn-primary {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.5rem 1rem;
  background-color: #3b82f6;
  color: #ffffff;
  font-weight: 600;
  border-radius: 0.5rem;
  cursor: pointer;
  transition: all 150ms ease-in-out;
}

.btn-primary:hover {
  background-color: #2563eb;
}

.grid-layout {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.5rem;
}

.hidden {
  display: none;
}

.text-center {
  text-align: center;
}`;

        // Tailwind color palette (hex -> name)
        const twColors = {
            '#000000': 'black', '#ffffff': 'white',
            '#f8fafc': 'slate-50', '#f1f5f9': 'slate-100', '#e2e8f0': 'slate-200', '#cbd5e1': 'slate-300', '#94a3b8': 'slate-400', '#64748b': 'slate-500', '#475569': 'slate-600', '#334155': 'slate-700', '#1e293b': 'slate-800', '#0f172a': 'slate-900', '#020617': 'slate-950',
            '#f9fafb': 'gray-50', '#f3f4f6': 'gray-100', '#e5e7eb': 'gray-200', '#d1d5db': 'gray-300', '#9ca3af': 'gray-400', '#6b7280': 'gray-500', '#4b5563': 'gray-600', '#374151': 'gray-700', '#1f2937': 'gray-800', '#111827': 'gray-900', '#030712': 'gray-950',
            '#fafafa': 'zinc-50', '#f4f4f5': 'zinc-100', '#e4e4e7': 'zinc-200', '#d4d4d8': 'zinc-300', '#a1a1aa': 'zinc-400', '#71717a': 'zinc-500', '#52525b': 'zinc-600', '#3f3f46': 'zinc-700', '#27272a': 'zinc-800', '#18181b': 'zinc-900', '#09090b': 'zinc-950',
            '#fafaf9': 'stone-50', '#f5f5f4': 'stone-100', '#e7e5e4': 'stone-200', '#d6d3d1': 'stone-300', '#a8a29e': 'stone-400', '#78716c': 'stone-500', '#57534e': 'stone-600', '#44403c': 'stone-700', '#292524': 'stone-800', '#1c1917': 'stone-900', '#0c0a09': 'stone-950',
            '#fef2f2': 'red-50', '#fee2e2': 'red-100', '#fecaca': 'red-200', '#fca5a5': 'red-300', '#f87171': 'red-400', '#ef4444': 'red-500', '#dc2626': 'red-600', '#b91c1c': 'red-700', '#991b1b': 'red-800', '#7f1d1d': 'red-900', '#450a0a': 'red-950',
            '#fff7ed': 'orange-50', '#ffedd5': 'orange-100', '#fed7aa': 'orange-200', '#fdba74': 'orange-300', '#fb923c': 'orange-400', '#f97316': 'orange-500', '#ea580c': 'orange-600', '#c2410c': 'orange-700', '#9a3412': 'orange-800', '#7c2d12': 'orange-900', '#431407': 'orange-950',
            '#fefce8': 'yellow-50', '#fef9c3': 'yellow-100', '#fef08a': 'yellow-200', '#fde047': 'yellow-300', '#facc15': 'yellow-400', '#eab308': 'yellow-500', '#ca8a04': 'yellow-600', '#a16207': 'yellow-700', '#854d0e': 'yellow-800', '#713f12': 'yellow-900', '#422006': 'yellow-950',
            '#f0fdf4': 'green-50', '#dcfce7': 'green-100', '#bbf7d0': 'green-200', '#86efac': 'green-300', '#4ade80': 'green-400', '#22c55e': 'green-500', '#16a34a': 'green-600', '#15803d': 'green-700', '#166534': 'green-800', '#14532d': 'green-900', '#052e16': 'green-950',
            '#eff6ff': 'blue-50', '#dbeafe': 'blue-100', '#bfdbfe': 'blue-200', '#93c5fd': 'blue-300', '#60a5fa': 'blue-400', '#3b82f6': 'blue-500', '#2563eb': 'blue-600', '#1d4ed8': 'blue-700', '#1e40af': 'blue-800', '#1e3a8a': 'blue-900', '#172554': 'blue-950',
            '#eef2ff': 'indigo-50', '#e0e7ff': 'indigo-100', '#c7d2fe': 'indigo-200', '#a5b4fc': 'indigo-300', '#818cf8': 'indigo-400', '#6366f1': 'indigo-500', '#4f46e5': 'indigo-600', '#4338ca': 'indigo-700', '#3730a3': 'indigo-800', '#312e81': 'indigo-900', '#1e1b4b': 'indigo-950',
            '#f5f3ff': 'violet-50', '#ede9fe': 'violet-100', '#ddd6fe': 'violet-200', '#c4b5fd': 'violet-300', '#a78bfa': 'violet-400', '#8b5cf6': 'violet-500', '#7c3aed': 'violet-600', '#6d28d9': 'violet-700', '#5b21b6': 'violet-800', '#4c1d95': 'violet-900', '#2e1065': 'violet-950',
            '#fdf4ff': 'purple-50', '#fae8ff': 'purple-100', '#f5d0fe': 'purple-200', '#f0abfc': 'purple-300', '#e879f9': 'purple-400', '#d946ef': 'purple-500', '#c026d3': 'purple-600', '#a21caf': 'purple-700', '#86198f': 'purple-800', '#701a75': 'purple-900', '#4a044e': 'purple-950',
            '#fdf2f8': 'pink-50', '#fce7f3': 'pink-100', '#fbcfe8': 'pink-200', '#f9a8d4': 'pink-300', '#f472b6': 'pink-400', '#ec4899': 'pink-500', '#db2777': 'pink-600', '#be185d': 'pink-700', '#9d174d': 'pink-800', '#831843': 'pink-900', '#500724': 'pink-950',
            '#ecfdf5': 'emerald-50', '#d1fae5': 'emerald-100', '#a7f3d0': 'emerald-200', '#6ee7b7': 'emerald-300', '#34d399': 'emerald-400', '#10b981': 'emerald-500', '#059669': 'emerald-600', '#047857': 'emerald-700', '#065f46': 'emerald-800', '#064e3b': 'emerald-900', '#022c22': 'emerald-950',
            '#f0fdfa': 'teal-50', '#ccfbf1': 'teal-100', '#99f6e4': 'teal-200', '#5eead4': 'teal-300', '#2dd4bf': 'teal-400', '#14b8a6': 'teal-500', '#0d9488': 'teal-600', '#0f766e': 'teal-700', '#115e59': 'teal-800', '#134e4a': 'teal-900', '#042f2e': 'teal-950',
            '#ecfeff': 'cyan-50', '#cffafe': 'cyan-100', '#a5f3fc': 'cyan-200', '#67e8f9': 'cyan-300', '#22d3ee': 'cyan-400', '#06b6d4': 'cyan-500', '#0891b2': 'cyan-600', '#0e7490': 'cyan-700', '#155e75': 'cyan-800', '#164e63': 'cyan-900', '#083344': 'cyan-950',
            '#f0f9ff': 'sky-50', '#e0f2fe': 'sky-100', '#bae6fd': 'sky-200', '#7dd3fc': 'sky-300', '#38bdf8': 'sky-400', '#0ea5e9': 'sky-500', '#0284c7': 'sky-600', '#0369a1': 'sky-700', '#075985': 'sky-800', '#0c4a6e': 'sky-900', '#082f49': 'sky-950',
            '#fffbeb': 'amber-50', '#fef3c7': 'amber-100', '#fde68a': 'amber-200', '#fcd34d': 'amber-300', '#fbbf24': 'amber-400', '#f59e0b': 'amber-500', '#d97706': 'amber-600', '#b45309': 'amber-700', '#92400e': 'amber-800', '#78350f': 'amber-900', '#451a03': 'amber-950',
            '#fafce8': 'lime-50', '#ecfccb': 'lime-100', '#d9f99d': 'lime-200', '#bef264': 'lime-300', '#a3e635': 'lime-400', '#84cc16': 'lime-500', '#65a30d': 'lime-600', '#4d7c0f': 'lime-700', '#3f6212': 'lime-800', '#365314': 'lime-900', '#1a2e05': 'lime-950',
            '#fecdd3': 'rose-200', '#fda4af': 'rose-300', '#fb7185': 'rose-400', '#f43f5e': 'rose-500', '#e11d48': 'rose-600', '#be123c': 'rose-700', '#9f1239': 'rose-800',
            'transparent': 'transparent', 'currentcolor': 'current', 'inherit': 'inherit'
        };

        // Spacing: value -> tw
        const spacingMap = {
            '0': '0', '0px': '0', '0rem': '0',
            '1px': 'px',
            '0.125rem': '0.5', '2px': '0.5',
            '0.25rem': '1', '4px': '1',
            '0.375rem': '1.5', '6px': '1.5',
            '0.5rem': '2', '8px': '2',
            '0.625rem': '2.5', '10px': '2.5',
            '0.75rem': '3', '12px': '3',
            '0.875rem': '3.5', '14px': '3.5',
            '1rem': '4', '16px': '4',
            '1.25rem': '5', '20px': '5',
            '1.5rem': '6', '24px': '6',
            '1.75rem': '7', '28px': '7',
            '2rem': '8', '32px': '8',
            '2.25rem': '9', '36px': '9',
            '2.5rem': '10', '40px': '10',
            '2.75rem': '11', '44px': '11',
            '3rem': '12', '48px': '12',
            '3.5rem': '14', '56px': '14',
            '4rem': '16', '64px': '16',
            '5rem': '20', '80px': '20',
            '6rem': '24', '96px': '24',
            '7rem': '28', '112px': '28',
            '8rem': '32', '128px': '32',
            '9rem': '36', '144px': '36',
            '10rem': '40', '160px': '40',
            '11rem': '44', '176px': '44',
            '12rem': '48', '192px': '48',
            '13rem': '52', '208px': '52',
            '14rem': '56', '224px': '56',
            '15rem': '60', '240px': '60',
            '16rem': '64', '256px': '64',
            '18rem': '72', '288px': '72',
            '20rem': '80', '320px': '80',
            '24rem': '96', '384px': '96',
            'auto': 'auto',
        };

        const fontSizeMap = {
            '0.75rem': 'xs', '12px': 'xs',
            '0.875rem': 'sm', '14px': 'sm',
            '1rem': 'base', '16px': 'base',
            '1.125rem': 'lg', '18px': 'lg',
            '1.25rem': 'xl', '20px': 'xl',
            '1.5rem': '2xl', '24px': '2xl',
            '1.875rem': '3xl', '30px': '3xl',
            '2.25rem': '4xl', '36px': '4xl',
            '3rem': '5xl', '48px': '5xl',
            '3.75rem': '6xl', '60px': '6xl',
            '4.5rem': '7xl', '72px': '7xl',
            '6rem': '8xl', '96px': '8xl',
            '8rem': '9xl', '128px': '9xl',
        };

        const fontWeightMap = {
            '100': 'thin', '200': 'extralight', '300': 'light', '400': 'normal',
            '500': 'medium', '600': 'semibold', '700': 'bold', '800': 'extrabold', '900': 'black',
            'normal': 'normal', 'bold': 'bold',
        };

        const lineHeightMap = {
            '1': 'none', '1.25': 'tight', '1.375': 'snug', '1.5': 'normal',
            '1.625': 'relaxed', '2': 'loose',
            '0.75rem': '3', '1rem': '4', '1.25rem': '5', '1.5rem': '6',
            '1.75rem': '7', '2rem': '8', '2.25rem': '9', '2.5rem': '10',
        };

        const borderRadiusMap = {
            '0': 'none', '0px': 'none',
            '0.125rem': 'sm', '2px': 'sm',
            '0.25rem': 'DEFAULT', '4px': 'DEFAULT',
            '0.375rem': 'md', '6px': 'md',
            '0.5rem': 'lg', '8px': 'lg',
            '0.75rem': 'xl', '12px': 'xl',
            '1rem': '2xl', '16px': '2xl',
            '1.5rem': '3xl', '24px': '3xl',
            '9999px': 'full', '50%': 'full',
        };

        const widthMap = {
            '100%': 'full', '100vw': 'screen', '100dvw': 'dvw',
            'auto': 'auto', 'min-content': 'min', 'max-content': 'max', 'fit-content': 'fit',
            '0': '0', '0px': '0',
            '20rem': '80', '320px': '80',
            '24rem': '96', '384px': '96',
            '28rem': '112',
            '32rem': '128', '512px': '128',
            '36rem': '144', '576px': '144',
            '42rem': '168', '672px': '168',
            '48rem': '192', '768px': '192',
            '56rem': '224', '896px': '224',
            '64rem': '256', '1024px': '256',
            '72rem': '288', '1152px': '288',
            '80rem': '320', '1280px': '320',
        };

        const maxWidthMap = {
            'none': 'none', '0': '0',
            '20rem': 'xs', '320px': 'xs',
            '24rem': 'sm', '384px': 'sm',
            '28rem': 'md', '448px': 'md',
            '32rem': 'lg', '512px': 'lg',
            '36rem': 'xl', '576px': 'xl',
            '42rem': '2xl', '672px': '2xl',
            '48rem': '3xl', '768px': '3xl',
            '56rem': '4xl', '896px': '4xl',
            '64rem': '5xl', '1024px': '5xl',
            '72rem': '6xl', '1152px': '6xl',
            '80rem': '7xl', '1280px': '7xl',
            '100%': 'full', 'min-content': 'min', 'max-content': 'max', 'fit-content': 'fit',
            '65ch': 'prose',
        };

        function normalizeColor(val) {
            val = val.trim().toLowerCase();
            if (val === 'transparent' || val === 'currentcolor' || val === 'inherit') return val;
            // 3-char hex to 6-char
            if (/^#[0-9a-f]{3}$/.test(val)) {
                val = '#' + val[1]+val[1] + val[2]+val[2] + val[3]+val[3];
            }
            // rgb(r, g, b) to hex
            const rgbMatch = val.match(/^rgb\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)$/);
            if (rgbMatch) {
                const r = parseInt(rgbMatch[1]).toString(16).padStart(2, '0');
                const g = parseInt(rgbMatch[2]).toString(16).padStart(2, '0');
                const b = parseInt(rgbMatch[3]).toString(16).padStart(2, '0');
                val = '#' + r + g + b;
            }
            // rgba(r, g, b, a)
            const rgbaMatch = val.match(/^rgba\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*,\s*([\d.]+)\s*\)$/);
            if (rgbaMatch) {
                const r = parseInt(rgbaMatch[1]).toString(16).padStart(2, '0');
                const g = parseInt(rgbaMatch[2]).toString(16).padStart(2, '0');
                const b = parseInt(rgbaMatch[3]).toString(16).padStart(2, '0');
                const a = parseFloat(rgbaMatch[4]);
                if (a === 0) return 'transparent';
                val = '#' + r + g + b;
            }
            return val;
        }

        function colorToTw(prefix, val) {
            const norm = normalizeColor(val);
            if (twColors[norm]) return prefix + '-' + twColors[norm];
            if (norm.startsWith('#') && optArbitrary.checked) return prefix + '-[' + norm + ']';
            if (norm.startsWith('#')) return prefix + '-[' + norm + ']';
            return null;
        }

        function spacingToTw(prefix, val) {
            val = val.trim();
            if (spacingMap[val] !== undefined) return prefix + '-' + spacingMap[val];
            // fractions
            if (val === '50%') return prefix + '-1/2';
            if (val === '33.333%' || val === '33.3333%') return prefix + '-1/3';
            if (val === '66.666%' || val === '66.6667%') return prefix + '-2/3';
            if (val === '25%') return prefix + '-1/4';
            if (val === '75%') return prefix + '-3/4';
            if (val === '100%') return prefix + '-full';
            if (optArbitrary.checked) return prefix + '-[' + val + ']';
            return null;
        }

        function convertProperty(prop, val) {
            prop = prop.trim().toLowerCase();
            val = val.trim();

            // Remove trailing ;
            if (val.endsWith(';')) val = val.slice(0, -1).trim();

            // Display
            if (prop === 'display') {
                const displayMap = {
                    'block': 'block', 'inline-block': 'inline-block', 'inline': 'inline',
                    'flex': 'flex', 'inline-flex': 'inline-flex', 'grid': 'grid', 'inline-grid': 'inline-grid',
                    'table': 'table', 'table-row': 'table-row', 'table-cell': 'table-cell',
                    'none': 'hidden', 'contents': 'contents', 'flow-root': 'flow-root',
                    'list-item': 'list-item',
                };
                return displayMap[val] || null;
            }

            // Position
            if (prop === 'position') {
                const posMap = { 'static': 'static', 'fixed': 'fixed', 'absolute': 'absolute', 'relative': 'relative', 'sticky': 'sticky' };
                return posMap[val] || null;
            }

            // Top / Right / Bottom / Left
            if (['top', 'right', 'bottom', 'left'].includes(prop)) {
                return spacingToTw(prop, val);
            }
            if (prop === 'inset') return spacingToTw('inset', val);

            // Visibility
            if (prop === 'visibility') {
                return val === 'visible' ? 'visible' : val === 'hidden' ? 'invisible' : null;
            }

            // Flex
            if (prop === 'flex-direction') {
                const fdMap = { 'row': 'flex-row', 'row-reverse': 'flex-row-reverse', 'column': 'flex-col', 'column-reverse': 'flex-col-reverse' };
                return fdMap[val] || null;
            }
            if (prop === 'flex-wrap') {
                const fwMap = { 'wrap': 'flex-wrap', 'nowrap': 'flex-nowrap', 'wrap-reverse': 'flex-wrap-reverse' };
                return fwMap[val] || null;
            }
            if (prop === 'flex-grow') return val === '1' ? 'grow' : val === '0' ? 'grow-0' : null;
            if (prop === 'flex-shrink') return val === '1' ? 'shrink' : val === '0' ? 'shrink-0' : null;
            if (prop === 'flex') {
                const flexMap = { '1 1 0%': 'flex-1', '1 1 auto': 'flex-auto', '0 1 auto': 'flex-initial', 'none': 'flex-none' };
                return flexMap[val] || null;
            }
            if (prop === 'order') {
                const orderMap = { '1': 'order-1', '2': 'order-2', '3': 'order-3', '4': 'order-4', '5': 'order-5', '6': 'order-6', '7': 'order-7', '8': 'order-8', '9': 'order-9', '10': 'order-10', '11': 'order-11', '12': 'order-12', '-9999': 'order-first', '9999': 'order-last', '0': 'order-none' };
                return orderMap[val] || null;
            }

            // Justify / Align
            if (prop === 'justify-content') {
                const jcMap = { 'flex-start': 'justify-start', 'flex-end': 'justify-end', 'center': 'justify-center', 'space-between': 'justify-between', 'space-around': 'justify-around', 'space-evenly': 'justify-evenly', 'start': 'justify-start', 'end': 'justify-end', 'normal': 'justify-normal', 'stretch': 'justify-stretch' };
                return jcMap[val] || null;
            }
            if (prop === 'align-items') {
                const aiMap = { 'flex-start': 'items-start', 'flex-end': 'items-end', 'center': 'items-center', 'baseline': 'items-baseline', 'stretch': 'items-stretch', 'start': 'items-start', 'end': 'items-end' };
                return aiMap[val] || null;
            }
            if (prop === 'align-self') {
                const asMap = { 'auto': 'self-auto', 'flex-start': 'self-start', 'flex-end': 'self-end', 'center': 'self-center', 'stretch': 'self-stretch', 'baseline': 'self-baseline' };
                return asMap[val] || null;
            }
            if (prop === 'align-content') {
                const acMap = { 'flex-start': 'content-start', 'flex-end': 'content-end', 'center': 'content-center', 'space-between': 'content-between', 'space-around': 'content-around', 'space-evenly': 'content-evenly', 'baseline': 'content-baseline', 'normal': 'content-normal', 'stretch': 'content-stretch' };
                return acMap[val] || null;
            }
            if (prop === 'justify-items') {
                const jiMap = { 'start': 'justify-items-start', 'end': 'justify-items-end', 'center': 'justify-items-center', 'stretch': 'justify-items-stretch' };
                return jiMap[val] || null;
            }
            if (prop === 'justify-self') {
                const jsMap = { 'auto': 'justify-self-auto', 'start': 'justify-self-start', 'end': 'justify-self-end', 'center': 'justify-self-center', 'stretch': 'justify-self-stretch' };
                return jsMap[val] || null;
            }
            if (prop === 'place-content') {
                const pcMap = { 'center': 'place-content-center', 'start': 'place-content-start', 'end': 'place-content-end', 'stretch': 'place-content-stretch', 'space-between': 'place-content-between', 'space-around': 'place-content-around', 'space-evenly': 'place-content-evenly', 'baseline': 'place-content-baseline' };
                return pcMap[val] || null;
            }
            if (prop === 'place-items') {
                const piMap = { 'center': 'place-items-center', 'start': 'place-items-start', 'end': 'place-items-end', 'stretch': 'place-items-stretch', 'baseline': 'place-items-baseline' };
                return piMap[val] || null;
            }

            // Grid
            if (prop === 'grid-template-columns') {
                const colMatch = val.match(/^repeat\((\d+),\s*1fr\)$/);
                if (colMatch) return 'grid-cols-' + colMatch[1];
                if (val === 'none') return 'grid-cols-none';
                if (val === 'subgrid') return 'grid-cols-subgrid';
                if (optArbitrary.checked) return 'grid-cols-[' + val.replace(/\s+/g, '_') + ']';
                return null;
            }
            if (prop === 'grid-template-rows') {
                const rowMatch = val.match(/^repeat\((\d+),\s*1fr\)$/);
                if (rowMatch) return 'grid-rows-' + rowMatch[1];
                if (val === 'none') return 'grid-rows-none';
                if (val === 'subgrid') return 'grid-rows-subgrid';
                if (optArbitrary.checked) return 'grid-rows-[' + val.replace(/\s+/g, '_') + ']';
                return null;
            }
            if (prop === 'grid-column') {
                const gcMap = { 'auto': 'col-auto', 'span 1 / span 1': 'col-span-1', '1 / -1': 'col-span-full' };
                if (gcMap[val]) return gcMap[val];
                const spanMatch = val.match(/^span\s+(\d+)\s*\/\s*span\s+(\d+)$/);
                if (spanMatch) return 'col-span-' + spanMatch[1];
                return null;
            }
            if (prop === 'grid-row') {
                const grMap = { 'auto': 'row-auto', '1 / -1': 'row-span-full' };
                if (grMap[val]) return grMap[val];
                const spanMatch = val.match(/^span\s+(\d+)\s*\/\s*span\s+(\d+)$/);
                if (spanMatch) return 'row-span-' + spanMatch[1];
                return null;
            }

            // Gap
            if (prop === 'gap') return spacingToTw('gap', val);
            if (prop === 'row-gap') return spacingToTw('gap-y', val);
            if (prop === 'column-gap') return spacingToTw('gap-x', val);

            // Padding
            if (prop === 'padding') {
                const parts = val.split(/\s+/);
                if (parts.length === 1) return spacingToTw('p', parts[0]);
                if (parts.length === 2) {
                    const y = spacingToTw('py', parts[0]);
                    const x = spacingToTw('px', parts[1]);
                    return (y && x) ? y + ' ' + x : null;
                }
                if (parts.length === 4) {
                    const classes = [];
                    const dirs = [['pt', parts[0]], ['pr', parts[1]], ['pb', parts[2]], ['pl', parts[3]]];
                    for (const [d, v] of dirs) {
                        const c = spacingToTw(d, v);
                        if (c) classes.push(c); else return null;
                    }
                    return classes.join(' ');
                }
                return null;
            }
            if (prop === 'padding-top') return spacingToTw('pt', val);
            if (prop === 'padding-right') return spacingToTw('pr', val);
            if (prop === 'padding-bottom') return spacingToTw('pb', val);
            if (prop === 'padding-left') return spacingToTw('pl', val);
            if (prop === 'padding-inline') return spacingToTw('px', val);
            if (prop === 'padding-block') return spacingToTw('py', val);

            // Margin
            if (prop === 'margin') {
                const parts = val.split(/\s+/);
                if (parts.length === 1) {
                    if (val === '0 auto' || val === 'auto') return spacingToTw('m', val);
                    return spacingToTw('m', parts[0]);
                }
                if (parts.length === 2) {
                    const y = spacingToTw('my', parts[0]);
                    const x = spacingToTw('mx', parts[1]);
                    return (y && x) ? y + ' ' + x : null;
                }
                if (parts.length === 4) {
                    const classes = [];
                    const dirs = [['mt', parts[0]], ['mr', parts[1]], ['mb', parts[2]], ['ml', parts[3]]];
                    for (const [d, v] of dirs) {
                        const c = spacingToTw(d, v);
                        if (c) classes.push(c); else return null;
                    }
                    return classes.join(' ');
                }
                return null;
            }
            if (prop === 'margin-top') return spacingToTw('mt', val);
            if (prop === 'margin-right') return spacingToTw('mr', val);
            if (prop === 'margin-bottom') return spacingToTw('mb', val);
            if (prop === 'margin-left') return spacingToTw('ml', val);
            if (prop === 'margin-inline') return spacingToTw('mx', val);
            if (prop === 'margin-block') return spacingToTw('my', val);

            // Width / Height
            if (prop === 'width') {
                if (widthMap[val]) return 'w-' + widthMap[val];
                return spacingToTw('w', val);
            }
            if (prop === 'height') {
                const hMap = { '100%': 'full', '100vh': 'screen', '100dvh': 'dvh', '100svh': 'svh', 'auto': 'auto', 'min-content': 'min', 'max-content': 'max', 'fit-content': 'fit' };
                if (hMap[val]) return 'h-' + hMap[val];
                return spacingToTw('h', val);
            }
            if (prop === 'min-width') {
                if (val === '0' || val === '0px') return 'min-w-0';
                if (val === '100%') return 'min-w-full';
                if (val === 'min-content') return 'min-w-min';
                if (val === 'max-content') return 'min-w-max';
                if (val === 'fit-content') return 'min-w-fit';
                if (optArbitrary.checked) return 'min-w-[' + val + ']';
                return null;
            }
            if (prop === 'max-width') {
                if (maxWidthMap[val]) return 'max-w-' + maxWidthMap[val];
                if (optArbitrary.checked) return 'max-w-[' + val + ']';
                return null;
            }
            if (prop === 'min-height') {
                if (val === '0' || val === '0px') return 'min-h-0';
                if (val === '100%') return 'min-h-full';
                if (val === '100vh') return 'min-h-screen';
                if (val === '100dvh') return 'min-h-dvh';
                if (val === 'min-content') return 'min-h-min';
                if (val === 'max-content') return 'min-h-max';
                if (val === 'fit-content') return 'min-h-fit';
                if (optArbitrary.checked) return 'min-h-[' + val + ']';
                return null;
            }
            if (prop === 'max-height') {
                if (val === 'none') return 'max-h-none';
                if (val === '100%') return 'max-h-full';
                if (val === '100vh') return 'max-h-screen';
                if (val === 'min-content') return 'max-h-min';
                if (val === 'max-content') return 'max-h-max';
                if (val === 'fit-content') return 'max-h-fit';
                if (optArbitrary.checked) return 'max-h-[' + val + ']';
                return null;
            }

            // Colors
            if (prop === 'color') return colorToTw('text', val);
            if (prop === 'background-color') return colorToTw('bg', val);
            if (prop === 'border-color') return colorToTw('border', val);
            if (prop === 'outline-color') return colorToTw('outline', val);
            if (prop === 'accent-color') return colorToTw('accent', val);
            if (prop === 'caret-color') return colorToTw('caret', val);

            // Typography
            if (prop === 'font-size') {
                if (fontSizeMap[val]) return 'text-' + fontSizeMap[val];
                if (optArbitrary.checked) return 'text-[' + val + ']';
                return null;
            }
            if (prop === 'font-weight') {
                if (fontWeightMap[val]) return 'font-' + fontWeightMap[val];
                return null;
            }
            if (prop === 'line-height') {
                if (lineHeightMap[val]) return 'leading-' + lineHeightMap[val];
                if (optArbitrary.checked) return 'leading-[' + val + ']';
                return null;
            }
            if (prop === 'font-style') {
                return val === 'italic' ? 'italic' : val === 'normal' ? 'not-italic' : null;
            }
            if (prop === 'font-family') {
                if (val.match(/sans-serif|system-ui|helvetica/i)) return 'font-sans';
                if (val.match(/serif|georgia|times/i)) return 'font-serif';
                if (val.match(/mono|consolas|courier|menlo/i)) return 'font-mono';
                return null;
            }
            if (prop === 'text-align') {
                const taMap = { 'left': 'text-left', 'center': 'text-center', 'right': 'text-right', 'justify': 'text-justify', 'start': 'text-start', 'end': 'text-end' };
                return taMap[val] || null;
            }
            if (prop === 'text-decoration') {
                const tdMap = { 'underline': 'underline', 'overline': 'overline', 'line-through': 'line-through', 'none': 'no-underline' };
                return tdMap[val] || null;
            }
            if (prop === 'text-decoration-line') {
                const tdlMap = { 'underline': 'underline', 'overline': 'overline', 'line-through': 'line-through', 'none': 'no-underline' };
                return tdlMap[val] || null;
            }
            if (prop === 'text-transform') {
                const ttMap = { 'uppercase': 'uppercase', 'lowercase': 'lowercase', 'capitalize': 'capitalize', 'none': 'normal-case' };
                return ttMap[val] || null;
            }
            if (prop === 'letter-spacing') {
                const lsMap = { '-0.05em': 'tracking-tighter', '-0.025em': 'tracking-tight', '0': 'tracking-normal', '0em': 'tracking-normal', '0.025em': 'tracking-wide', '0.05em': 'tracking-wider', '0.1em': 'tracking-widest' };
                if (lsMap[val] !== undefined) return lsMap[val];
                if (optArbitrary.checked) return 'tracking-[' + val + ']';
                return null;
            }
            if (prop === 'word-break') {
                if (val === 'break-all') return 'break-all';
                if (val === 'keep-all') return 'break-keep';
                if (val === 'normal') return 'break-normal';
                return null;
            }
            if (prop === 'overflow-wrap' || prop === 'word-wrap') {
                if (val === 'break-word') return 'break-words';
                if (val === 'normal') return 'break-normal';
                return null;
            }
            if (prop === 'white-space') {
                const wsMap = { 'normal': 'whitespace-normal', 'nowrap': 'whitespace-nowrap', 'pre': 'whitespace-pre', 'pre-line': 'whitespace-pre-line', 'pre-wrap': 'whitespace-pre-wrap', 'break-spaces': 'whitespace-break-spaces' };
                return wsMap[val] || null;
            }
            if (prop === 'text-overflow') {
                if (val === 'ellipsis') return 'text-ellipsis';
                if (val === 'clip') return 'text-clip';
                return null;
            }
            if (prop === 'vertical-align') {
                const vaMap = { 'baseline': 'align-baseline', 'top': 'align-top', 'middle': 'align-middle', 'bottom': 'align-bottom', 'text-top': 'align-text-top', 'text-bottom': 'align-text-bottom', 'sub': 'align-sub', 'super': 'align-super' };
                return vaMap[val] || null;
            }

            // Border
            if (prop === 'border') {
                // border: 1px solid #e5e7eb
                const bMatch = val.match(/^(\d+(?:\.\d+)?px)\s+(solid|dashed|dotted|double|none)\s+(.+)$/);
                if (bMatch) {
                    const classes = [];
                    const w = bMatch[1];
                    if (w === '0' || w === '0px') classes.push('border-0');
                    else if (w === '1px') classes.push('border');
                    else if (w === '2px') classes.push('border-2');
                    else if (w === '4px') classes.push('border-4');
                    else if (w === '8px') classes.push('border-8');
                    else classes.push('border');

                    if (bMatch[2] !== 'solid') {
                        const bsMap = { 'dashed': 'border-dashed', 'dotted': 'border-dotted', 'double': 'border-double', 'none': 'border-none' };
                        if (bsMap[bMatch[2]]) classes.push(bsMap[bMatch[2]]);
                    }

                    const c = colorToTw('border', bMatch[3]);
                    if (c) classes.push(c);

                    return classes.join(' ');
                }
                if (val === 'none' || val === '0') return 'border-0';
                return null;
            }
            if (prop === 'border-width') {
                const bwMap = { '0': 'border-0', '0px': 'border-0', '1px': 'border', '2px': 'border-2', '4px': 'border-4', '8px': 'border-8' };
                return bwMap[val] || null;
            }
            if (prop === 'border-style') {
                const bsMap = { 'solid': 'border-solid', 'dashed': 'border-dashed', 'dotted': 'border-dotted', 'double': 'border-double', 'none': 'border-none', 'hidden': 'border-hidden' };
                return bsMap[val] || null;
            }
            if (prop === 'border-radius') {
                const parts = val.split(/\s+/);
                if (parts.length === 1) {
                    if (borderRadiusMap[val]) {
                        const r = borderRadiusMap[val];
                        return r === 'DEFAULT' ? 'rounded' : 'rounded-' + r;
                    }
                    if (optArbitrary.checked) return 'rounded-[' + val + ']';
                    return null;
                }
                return null;
            }
            if (['border-top-left-radius', 'border-top-right-radius', 'border-bottom-right-radius', 'border-bottom-left-radius'].includes(prop)) {
                const cornerMap = { 'border-top-left-radius': 'rounded-tl', 'border-top-right-radius': 'rounded-tr', 'border-bottom-right-radius': 'rounded-br', 'border-bottom-left-radius': 'rounded-bl' };
                const prefix = cornerMap[prop];
                if (borderRadiusMap[val]) {
                    const r = borderRadiusMap[val];
                    return r === 'DEFAULT' ? prefix : prefix + '-' + r;
                }
                if (optArbitrary.checked) return prefix + '-[' + val + ']';
                return null;
            }

            // Box Shadow
            if (prop === 'box-shadow') {
                if (val === 'none') return 'shadow-none';
                if (val.match(/0\s+1px\s+2px.*0\s+1px\s+1px/)) return 'shadow-sm';
                if (val.match(/0\s+1px\s+3px.*0\s+1px\s+2px/)) return 'shadow';
                if (val.match(/0\s+4px\s+6px.*0\s+2px\s+4px/)) return 'shadow-md';
                if (val.match(/0\s+10px\s+15px.*0\s+4px\s+6px/)) return 'shadow-lg';
                if (val.match(/0\s+20px\s+25px.*0\s+8px\s+10px/)) return 'shadow-xl';
                if (val.match(/0\s+25px\s+50px/)) return 'shadow-2xl';
                if (optArbitrary.checked) return 'shadow-[' + val.replace(/\s+/g, '_') + ']';
                return 'shadow';
            }

            // Opacity
            if (prop === 'opacity') {
                const pct = Math.round(parseFloat(val) * 100);
                const opMap = { 0: '0', 5: '5', 10: '10', 15: '15', 20: '20', 25: '25', 30: '30', 35: '35', 40: '40', 45: '45', 50: '50', 55: '55', 60: '60', 65: '65', 70: '70', 75: '75', 80: '80', 85: '85', 90: '90', 95: '95', 100: '100' };
                if (opMap[pct] !== undefined) return 'opacity-' + opMap[pct];
                if (optArbitrary.checked) return 'opacity-[' + val + ']';
                return null;
            }

            // Overflow
            if (prop === 'overflow') {
                const oMap = { 'auto': 'overflow-auto', 'hidden': 'overflow-hidden', 'visible': 'overflow-visible', 'scroll': 'overflow-scroll', 'clip': 'overflow-clip' };
                return oMap[val] || null;
            }
            if (prop === 'overflow-x') {
                const oxMap = { 'auto': 'overflow-x-auto', 'hidden': 'overflow-x-hidden', 'visible': 'overflow-x-visible', 'scroll': 'overflow-x-scroll', 'clip': 'overflow-x-clip' };
                return oxMap[val] || null;
            }
            if (prop === 'overflow-y') {
                const oyMap = { 'auto': 'overflow-y-auto', 'hidden': 'overflow-y-hidden', 'visible': 'overflow-y-visible', 'scroll': 'overflow-y-scroll', 'clip': 'overflow-y-clip' };
                return oyMap[val] || null;
            }

            // Z-index
            if (prop === 'z-index') {
                const zMap = { '0': 'z-0', '10': 'z-10', '20': 'z-20', '30': 'z-30', '40': 'z-40', '50': 'z-50', 'auto': 'z-auto' };
                if (zMap[val]) return zMap[val];
                if (optArbitrary.checked) return 'z-[' + val + ']';
                return null;
            }

            // Cursor
            if (prop === 'cursor') {
                const cMap = { 'auto': 'cursor-auto', 'default': 'cursor-default', 'pointer': 'cursor-pointer', 'wait': 'cursor-wait', 'text': 'cursor-text', 'move': 'cursor-move', 'help': 'cursor-help', 'not-allowed': 'cursor-not-allowed', 'none': 'cursor-none', 'crosshair': 'cursor-crosshair', 'grab': 'cursor-grab', 'grabbing': 'cursor-grabbing' };
                return cMap[val] || null;
            }

            // Pointer events
            if (prop === 'pointer-events') {
                return val === 'none' ? 'pointer-events-none' : val === 'auto' ? 'pointer-events-auto' : null;
            }

            // User select
            if (prop === 'user-select') {
                const usMap = { 'none': 'select-none', 'text': 'select-text', 'all': 'select-all', 'auto': 'select-auto' };
                return usMap[val] || null;
            }

            // Transition
            if (prop === 'transition') {
                if (val.match(/all/)) return 'transition-all';
                if (val.match(/color|background|border|opacity|shadow/)) return 'transition-colors';
                if (val.match(/transform|translate|scale|rotate/)) return 'transition-transform';
                return 'transition';
            }
            if (prop === 'transition-duration') {
                const durMap = { '75ms': 'duration-75', '100ms': 'duration-100', '150ms': 'duration-150', '200ms': 'duration-200', '300ms': 'duration-300', '500ms': 'duration-500', '700ms': 'duration-700', '1000ms': 'duration-1000', '0.075s': 'duration-75', '0.1s': 'duration-100', '0.15s': 'duration-150', '0.2s': 'duration-200', '0.3s': 'duration-300', '0.5s': 'duration-500', '0.7s': 'duration-700', '1s': 'duration-1000' };
                return durMap[val] || null;
            }
            if (prop === 'transition-timing-function') {
                const ttfMap = { 'linear': 'ease-linear', 'ease': 'ease-in-out', 'ease-in': 'ease-in', 'ease-out': 'ease-out', 'ease-in-out': 'ease-in-out' };
                return ttfMap[val] || null;
            }

            // Transform
            if (prop === 'transform') {
                if (val === 'none') return 'transform-none';
                // Try to parse common transforms
                const classes = [];
                const rotMatch = val.match(/rotate\((-?\d+(?:\.\d+)?)(deg)\)/);
                if (rotMatch) {
                    const deg = rotMatch[1];
                    const rotMap = { '0': 'rotate-0', '1': 'rotate-1', '2': 'rotate-2', '3': 'rotate-3', '6': 'rotate-6', '12': 'rotate-12', '45': 'rotate-45', '90': 'rotate-90', '180': 'rotate-180' };
                    classes.push(rotMap[deg] || 'rotate-[' + deg + 'deg]');
                }
                const scaleMatch = val.match(/scale\(([^)]+)\)/);
                if (scaleMatch) {
                    const s = scaleMatch[1];
                    const scMap = { '0': 'scale-0', '.5': 'scale-50', '0.5': 'scale-50', '.75': 'scale-75', '0.75': 'scale-75', '.9': 'scale-90', '0.9': 'scale-90', '.95': 'scale-95', '0.95': 'scale-95', '1': 'scale-100', '1.05': 'scale-105', '1.1': 'scale-110', '1.25': 'scale-125', '1.5': 'scale-150' };
                    classes.push(scMap[s] || 'scale-[' + s + ']');
                }
                return classes.length ? classes.join(' ') : null;
            }

            // Object fit
            if (prop === 'object-fit') {
                const ofMap = { 'contain': 'object-contain', 'cover': 'object-cover', 'fill': 'object-fill', 'none': 'object-none', 'scale-down': 'object-scale-down' };
                return ofMap[val] || null;
            }

            // Object position
            if (prop === 'object-position') {
                const opMap = { 'bottom': 'object-bottom', 'center': 'object-center', 'left': 'object-left', 'left bottom': 'object-left-bottom', 'left top': 'object-left-top', 'right': 'object-right', 'right bottom': 'object-right-bottom', 'right top': 'object-right-top', 'top': 'object-top' };
                return opMap[val] || null;
            }

            // Aspect ratio
            if (prop === 'aspect-ratio') {
                const arMap = { 'auto': 'aspect-auto', '1 / 1': 'aspect-square', '1/1': 'aspect-square', '16 / 9': 'aspect-video', '16/9': 'aspect-video' };
                return arMap[val] || null;
            }

            // List style
            if (prop === 'list-style-type') {
                const lstMap = { 'none': 'list-none', 'disc': 'list-disc', 'decimal': 'list-decimal' };
                return lstMap[val] || null;
            }
            if (prop === 'list-style-position') {
                return val === 'inside' ? 'list-inside' : val === 'outside' ? 'list-outside' : null;
            }

            // Background
            if (prop === 'background-size') {
                const bsMap = { 'auto': 'bg-auto', 'cover': 'bg-cover', 'contain': 'bg-contain' };
                return bsMap[val] || null;
            }
            if (prop === 'background-position') {
                const bpMap = { 'bottom': 'bg-bottom', 'center': 'bg-center', 'left': 'bg-left', 'left bottom': 'bg-left-bottom', 'left top': 'bg-left-top', 'right': 'bg-right', 'right bottom': 'bg-right-bottom', 'right top': 'bg-right-top', 'top': 'bg-top' };
                return bpMap[val] || null;
            }
            if (prop === 'background-repeat') {
                const brMap = { 'repeat': 'bg-repeat', 'no-repeat': 'bg-no-repeat', 'repeat-x': 'bg-repeat-x', 'repeat-y': 'bg-repeat-y', 'round': 'bg-repeat-round', 'space': 'bg-repeat-space' };
                return brMap[val] || null;
            }

            // Outline
            if (prop === 'outline') {
                if (val === 'none' || val === '0') return 'outline-none';
                return null;
            }
            if (prop === 'outline-style') {
                const osMap = { 'none': 'outline-none', 'solid': 'outline', 'dashed': 'outline-dashed', 'dotted': 'outline-dotted', 'double': 'outline-double' };
                return osMap[val] || null;
            }
            if (prop === 'outline-width') {
                const owMap = { '0': 'outline-0', '0px': 'outline-0', '1px': 'outline-1', '2px': 'outline-2', '4px': 'outline-4', '8px': 'outline-8' };
                return owMap[val] || null;
            }
            if (prop === 'outline-offset') {
                const ooMap = { '0': 'outline-offset-0', '0px': 'outline-offset-0', '1px': 'outline-offset-1', '2px': 'outline-offset-2', '4px': 'outline-offset-4', '8px': 'outline-offset-8' };
                return ooMap[val] || null;
            }

            // Box sizing
            if (prop === 'box-sizing') {
                return val === 'border-box' ? 'box-border' : val === 'content-box' ? 'box-content' : null;
            }

            // Float / Clear
            if (prop === 'float') {
                const flMap = { 'left': 'float-left', 'right': 'float-right', 'none': 'float-none', 'start': 'float-start', 'end': 'float-end' };
                return flMap[val] || null;
            }
            if (prop === 'clear') {
                const clMap = { 'left': 'clear-left', 'right': 'clear-right', 'both': 'clear-both', 'none': 'clear-none', 'start': 'clear-start', 'end': 'clear-end' };
                return clMap[val] || null;
            }

            // Resize
            if (prop === 'resize') {
                const rMap = { 'none': 'resize-none', 'both': 'resize', 'vertical': 'resize-y', 'horizontal': 'resize-x' };
                return rMap[val] || null;
            }

            // Appearance
            if (prop === 'appearance') {
                return val === 'none' ? 'appearance-none' : val === 'auto' ? 'appearance-auto' : null;
            }

            // Content
            if (prop === 'content') {
                return val === 'none' || val === "''" || val === '""' ? 'content-none' : null;
            }

            // Columns
            if (prop === 'columns') {
                const numMatch = val.match(/^(\d+)$/);
                if (numMatch && parseInt(numMatch[1]) >= 1 && parseInt(numMatch[1]) <= 12) return 'columns-' + numMatch[1];
                return null;
            }

            // Table layout
            if (prop === 'table-layout') {
                return val === 'auto' ? 'table-auto' : val === 'fixed' ? 'table-fixed' : null;
            }

            // Border collapse
            if (prop === 'border-collapse') {
                return val === 'collapse' ? 'border-collapse' : val === 'separate' ? 'border-separate' : null;
            }

            return null;
        }

        function parseCSS(css) {
            const results = [];
            let totalProps = 0;
            let converted = 0;
            let unsupported = 0;

            // Remove CSS comments
            css = css.replace(/\/\*[\s\S]*?\*\//g, '');

            // Try to parse rule blocks: selector { ... }
            const ruleRegex = /([^{}]+?)\s*\{([^{}]*)\}/g;
            let match;
            let foundRules = false;

            while ((match = ruleRegex.exec(css)) !== null) {
                foundRules = true;
                const selector = match[1].trim();
                const declarations = match[2].trim();

                if (!declarations) continue;

                const classes = [];
                const comments = [];

                const lines = declarations.split(';').map(l => l.trim()).filter(Boolean);

                for (const line of lines) {
                    const colonIdx = line.indexOf(':');
                    if (colonIdx === -1) continue;

                    const prop = line.substring(0, colonIdx).trim();
                    const val = line.substring(colonIdx + 1).trim();

                    totalProps++;

                    const result = convertProperty(prop, val);
                    if (result) {
                        if (optImportant.checked) {
                            classes.push(...result.split(' ').map(c => '!' + c));
                        } else {
                            classes.push(...result.split(' '));
                        }
                        converted++;
                    } else {
                        comments.push('/* ' + prop + ': ' + val + ' */');
                        unsupported++;
                    }
                }

                results.push({ selector, classes, comments });
            }

            // If no rules found, try parsing as bare declarations
            if (!foundRules) {
                const classes = [];
                const comments = [];
                const lines = css.split(';').map(l => l.trim()).filter(Boolean);

                for (const line of lines) {
                    const colonIdx = line.indexOf(':');
                    if (colonIdx === -1) continue;

                    const prop = line.substring(0, colonIdx).trim();
                    const val = line.substring(colonIdx + 1).trim();

                    totalProps++;

                    const result = convertProperty(prop, val);
                    if (result) {
                        if (optImportant.checked) {
                            classes.push(...result.split(' ').map(c => '!' + c));
                        } else {
                            classes.push(...result.split(' '));
                        }
                        converted++;
                    } else {
                        comments.push('/* ' + prop + ': ' + val + ' */');
                        unsupported++;
                    }
                }

                if (classes.length || comments.length) {
                    results.push({ selector: null, classes, comments });
                }
            }

            return { results, totalProps, converted, unsupported, ruleCount: results.length };
        }

        function convert() {
            const input = cssInput.value.trim();
            if (!input) { showError('Please enter CSS code'); return; }

            try {
                const { results, totalProps, converted, unsupported, ruleCount } = parseCSS(input);

                if (results.length === 0) {
                    showError('No valid CSS properties found');
                    return;
                }

                let output = '';

                if (optStripSelectors.checked) {
                    // Just output classes
                    const allClasses = [];
                    const allComments = [];
                    for (const r of results) {
                        allClasses.push(...r.classes);
                        allComments.push(...r.comments);
                    }
                    output = allClasses.join(' ');
                    if (allComments.length) {
                        output += '\n\n' + allComments.join('\n');
                    }
                } else {
                    for (const r of results) {
                        if (r.selector) {
                            output += '/* ' + r.selector + ' */\n';
                        }
                        if (r.classes.length) {
                            output += r.classes.join(' ') + '\n';
                        }
                        if (r.comments.length) {
                            output += r.comments.join('\n') + '\n';
                        }
                        output += '\n';
                    }
                }

                twOutput.value = output.trimEnd();

                // Stats
                document.getElementById('stat-rules').textContent = ruleCount;
                document.getElementById('stat-properties').textContent = totalProps;
                document.getElementById('stat-converted').textContent = converted;
                document.getElementById('stat-unsupported').textContent = unsupported;
                statsBar.classList.remove('hidden');

                showSuccess('Converted ' + converted + ' of ' + totalProps + ' properties across ' + ruleCount + ' rule' + (ruleCount !== 1 ? 's' : ''));
            } catch (e) {
                showError('Error parsing CSS: ' + e.message);
            }
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

        // Events
        btnConvert.addEventListener('click', convert);

        btnCopy.addEventListener('click', function() {
            const output = twOutput.value;
            if (!output) { showError('Nothing to copy'); return; }
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        });

        btnDownload.addEventListener('click', function() {
            const output = twOutput.value;
            if (!output) { showError('Nothing to download'); return; }
            const blob = new Blob([output], { type: 'text/plain;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = 'tailwind-classes.txt';
            document.body.appendChild(a); a.click();
            document.body.removeChild(a); URL.revokeObjectURL(url);
            showSuccess('Downloaded tailwind-classes.txt');
        });

        btnSample.addEventListener('click', function() {
            cssInput.value = sampleCSS;
            twOutput.value = '';
            statsBar.classList.add('hidden');
        });

        btnClear.addEventListener('click', function() {
            cssInput.value = ''; twOutput.value = '';
            statsBar.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        });

        fileUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(evt) {
                cssInput.value = evt.target.result;
                twOutput.value = '';
                statsBar.classList.add('hidden');
                showSuccess('File loaded: ' + file.name);
            };
            reader.readAsText(file);
            this.value = '';
        });

        let timer;
        cssInput.addEventListener('input', function() {
            clearTimeout(timer);
            timer = setTimeout(() => { if (cssInput.value.trim()) convert(); }, 500);
        });

        [optArbitrary, optStripSelectors, optImportant].forEach(el => {
            el.addEventListener('change', () => { if (cssInput.value.trim()) convert(); });
        });

        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
        });
    })();
    </script>
    @endpush
</x-layout>
