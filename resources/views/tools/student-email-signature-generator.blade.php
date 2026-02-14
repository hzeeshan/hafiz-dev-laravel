<x-layout>
    <x-slot:title>Student Email Signature Generator - Free Email Signature for Students | hafiz.dev</x-slot:title>
    <x-slot:description>Free student email signature generator. Create professional email signatures for students with university name, major, graduation year, and social links. Copy HTML or plain text.</x-slot:description>
    <x-slot:keywords>student email signature generator, email signature generator for students, college email signature, university email signature, professional student signature</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/student-email-signature-generator') }}</x-slot:canonical>

    <x-slot:ogTitle>Student Email Signature Generator - Free Email Signature for Students | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Create professional email signatures for students with university, major, graduation year, and social links. Free and instant.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/student-email-signature-generator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Student Email Signature Generator",
            "description": "Free student email signature generator. Create professional email signatures for students.",
            "url": "https://hafiz.dev/tools/student-email-signature-generator",
            "applicationCategory": "UtilitiesApplication",
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
                { "@@type": "ListItem", "position": 3, "name": "Student Email Signature Generator", "item": "https://hafiz.dev/tools/student-email-signature-generator" }
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
                    "name": "How do I create a professional email signature as a student?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Fill in your name, university, major, and graduation year. Add optional fields like phone, website, and social links. Choose a template style and color, then copy the HTML signature to paste into Gmail, Outlook, or Apple Mail."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do I add this signature to Gmail?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Click 'Copy HTML', then go to Gmail Settings → General → Signature. Click the signature editor, press Ctrl+A to select all, then Ctrl+V to paste your new signature. Click Save Changes at the bottom."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I include social media links?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! You can add LinkedIn, GitHub, Twitter/X, and a personal website or portfolio URL. These appear as clickable links in your signature, making it easy for contacts to connect with you."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What should a student email signature include?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A good student email signature should include your full name, university name, major or program, expected graduation year, and one or two relevant links like LinkedIn or a portfolio. Keep it clean and professional."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does this work with Outlook and Apple Mail?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! The generated HTML signature is compatible with Gmail, Outlook (desktop and web), Apple Mail, and most other email clients. The inline CSS ensures consistent rendering across platforms."
                    }
                }
            ]
        }
        </script>
    @endpush

    @push('styles')
    <style>
        .sig-preview table { border-collapse: collapse; }
        .sig-preview td { vertical-align: top; }
        .color-swatch { width: 28px; height: 28px; border-radius: 6px; cursor: pointer; border: 2px solid transparent; transition: all 0.2s; }
        .color-swatch:hover, .color-swatch.active { border-color: white; transform: scale(1.15); }
    </style>
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
                    <li class="text-gold">Student Email Signature Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Student Email Signature Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Create a professional email signature for Gmail, Outlook, and Apple Mail. Add your university, major, graduation year, and social links.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                <div class="grid lg:grid-cols-2 gap-8">
                    {{-- Left: Form --}}
                    <div>
                        <h2 class="text-light font-semibold mb-4 text-lg">Your Details</h2>

                        {{-- Personal --}}
                        <div class="space-y-4 mb-6">
                            <div>
                                <label for="sig-name" class="text-light text-sm font-medium mb-1 block">Full Name *</label>
                                <input type="text" id="sig-name" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="Jane Smith" value="Jane Smith">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="sig-university" class="text-light text-sm font-medium mb-1 block">University *</label>
                                    <input type="text" id="sig-university" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="Stanford University" value="Stanford University">
                                </div>
                                <div>
                                    <label for="sig-major" class="text-light text-sm font-medium mb-1 block">Major / Program</label>
                                    <input type="text" id="sig-major" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="Computer Science" value="Computer Science, B.S.">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="sig-grad-year" class="text-light text-sm font-medium mb-1 block">Graduation Year</label>
                                    <input type="text" id="sig-grad-year" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="Class of 2026" value="Class of 2026">
                                </div>
                                <div>
                                    <label for="sig-pronouns" class="text-light text-sm font-medium mb-1 block">Pronouns</label>
                                    <input type="text" id="sig-pronouns" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="she/her">
                                </div>
                            </div>
                        </div>

                        {{-- Contact --}}
                        <h3 class="text-light font-semibold mb-3 text-sm">Contact Info</h3>
                        <div class="space-y-4 mb-6">
                            <div>
                                <label for="sig-email" class="text-light text-sm font-medium mb-1 block">Email</label>
                                <input type="email" id="sig-email" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="jane@stanford.edu" value="jane.smith@stanford.edu">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="sig-phone" class="text-light text-sm font-medium mb-1 block">Phone</label>
                                    <input type="text" id="sig-phone" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="(555) 123-4567">
                                </div>
                                <div>
                                    <label for="sig-website" class="text-light text-sm font-medium mb-1 block">Website / Portfolio</label>
                                    <input type="url" id="sig-website" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="https://janesmith.dev">
                                </div>
                            </div>
                        </div>

                        {{-- Social --}}
                        <h3 class="text-light font-semibold mb-3 text-sm">Social Links</h3>
                        <div class="space-y-4 mb-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="sig-linkedin" class="text-light text-sm font-medium mb-1 block">LinkedIn</label>
                                    <input type="url" id="sig-linkedin" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="https://linkedin.com/in/..." value="https://linkedin.com/in/janesmith">
                                </div>
                                <div>
                                    <label for="sig-github" class="text-light text-sm font-medium mb-1 block">GitHub</label>
                                    <input type="url" id="sig-github" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="https://github.com/...">
                                </div>
                            </div>
                            <div>
                                <label for="sig-twitter" class="text-light text-sm font-medium mb-1 block">Twitter / X</label>
                                <input type="url" id="sig-twitter" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="https://x.com/...">
                            </div>
                        </div>

                        {{-- Style --}}
                        <h3 class="text-light font-semibold mb-3 text-sm">Style</h3>
                        <div class="mb-4">
                            <label class="text-light text-sm font-medium mb-2 block">Accent Color</label>
                            <div class="flex gap-2 flex-wrap" id="color-picker">
                                <button class="color-swatch active" data-color="#2563EB" style="background:#2563EB"></button>
                                <button class="color-swatch" data-color="#059669" style="background:#059669"></button>
                                <button class="color-swatch" data-color="#7C3AED" style="background:#7C3AED"></button>
                                <button class="color-swatch" data-color="#DC2626" style="background:#DC2626"></button>
                                <button class="color-swatch" data-color="#D97706" style="background:#D97706"></button>
                                <button class="color-swatch" data-color="#0891B2" style="background:#0891B2"></button>
                                <button class="color-swatch" data-color="#4F46E5" style="background:#4F46E5"></button>
                                <button class="color-swatch" data-color="#334155" style="background:#334155"></button>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="sig-template" class="text-light text-sm font-medium mb-1 block">Template</label>
                                <select id="sig-template" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                    <option value="classic">Classic</option>
                                    <option value="modern">Modern (side bar)</option>
                                    <option value="minimal">Minimal</option>
                                </select>
                            </div>
                            <div>
                                <label for="sig-font" class="text-light text-sm font-medium mb-1 block">Font</label>
                                <select id="sig-font" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                    <option value="Arial, Helvetica, sans-serif">Arial</option>
                                    <option value="Georgia, serif">Georgia</option>
                                    <option value="'Trebuchet MS', sans-serif">Trebuchet MS</option>
                                    <option value="Verdana, sans-serif">Verdana</option>
                                    <option value="Tahoma, sans-serif">Tahoma</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Right: Preview --}}
                    <div>
                        <h2 class="text-light font-semibold mb-4 text-lg">Live Preview</h2>
                        <div class="bg-white rounded-lg p-6 min-h-[200px] sig-preview" id="sig-preview"></div>

                        <div class="flex flex-wrap gap-3 mt-4">
                            <button id="btn-copy-html" class="px-5 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                Copy HTML
                            </button>
                            <button id="btn-copy-text" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                Copy Plain Text
                            </button>
                            <button id="btn-copy-source" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                                Copy Source
                            </button>
                        </div>

                        {{-- Instructions --}}
                        <div class="mt-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                            <h3 class="text-light font-semibold text-sm mb-2">How to add to your email client</h3>
                            <div class="text-light-muted text-sm space-y-2">
                                <p><strong class="text-light">Gmail:</strong> Settings → General → Signature → paste with Ctrl+V</p>
                                <p><strong class="text-light">Outlook:</strong> Settings → Mail → Compose → Email signature → paste</p>
                                <p><strong class="text-light">Apple Mail:</strong> Preferences → Signatures → paste into signature editor</p>
                            </div>
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
            </div>

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🎓</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Made for Students</h3>
                    <p class="text-light-muted text-sm">Fields designed for academic life: university, major, graduation year, and pronouns. Perfect for networking emails, internship applications, and campus communication.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🎨</div>
                    <h3 class="text-lg font-semibold text-light mb-2">3 Templates</h3>
                    <p class="text-light-muted text-sm">Classic (separator line), Modern (colored sidebar), and Minimal styles. 8 accent colors and 5 fonts to match your personal brand.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📧</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Works Everywhere</h3>
                    <p class="text-light-muted text-sm">Inline CSS ensures your signature renders perfectly in Gmail, Outlook, Apple Mail, Thunderbird, and Yahoo Mail. Copy and paste in seconds.</p>
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
                            <span class="text-light font-medium">How do I create a professional student email signature?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Fill in your name, university, and major. Add your email and any social links you want to share. Choose a template and color, then click "Copy HTML" to paste into your email client's signature settings.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do I add this to Gmail?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Click "Copy HTML", then open Gmail → Settings (gear icon) → See all settings → General tab → scroll to Signature. Click inside the signature editor, select all (Ctrl+A), then paste (Ctrl+V). Click Save Changes.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I include social media links?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! Add LinkedIn, GitHub, Twitter/X, and a personal website. They appear as clickable links in your signature. LinkedIn is especially recommended for students — recruiters and professors often check profiles.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What should a student include in their email signature?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">At minimum: full name, university, and major. Optionally add graduation year, email, phone, and a LinkedIn or portfolio URL. Keep it concise — 4-5 lines is ideal. Avoid quotes, images, or overly colorful designs.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does this work with Outlook and Apple Mail?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! All signatures use inline CSS for maximum compatibility. They render correctly in Gmail, Outlook (web and desktop), Apple Mail, Thunderbird, Yahoo Mail, and most other email clients.</div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @include('tools.partials.student-email-signature-generator-script')
    @endpush
</x-layout>
