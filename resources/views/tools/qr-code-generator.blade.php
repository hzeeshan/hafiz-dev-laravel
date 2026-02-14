<x-layout>
    <x-slot:title>QR Code Generator - Create Free QR Codes Online | hafiz.dev</x-slot:title>
    <x-slot:description>Free QR code generator for URLs, WiFi, contacts, email, and more. Customize colors and size, download as PNG or SVG. 100% free, no signup required, works offline.</x-slot:description>
    <x-slot:keywords>qr code generator, free qr code generator, wifi qr code generator, qr code maker, create qr code, vcard qr code, qr code creator online</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/qr-code-generator') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>QR Code Generator - Create Free QR Codes Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free QR code generator for URLs, WiFi, contacts, email, and more. Customize colors and size, download as PNG or SVG.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/qr-code-generator') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "QR Code Generator",
            "description": "Free QR code generator for URLs, WiFi, contacts, email, and more. Customize colors and size, download as PNG or SVG. 100% free, no signup required.",
            "url": "https://hafiz.dev/tools/qr-code-generator",
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
                    "name": "QR Code Generator",
                    "item": "https://hafiz.dev/tools/qr-code-generator"
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
                    "name": "How do I create a QR code?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Simply select the type of QR code you want to create (URL, WiFi, Contact, etc.), fill in the required information, and your QR code will be generated instantly. You can then customize the colors and size before downloading."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What types of QR codes can I create?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Our generator supports multiple QR code types: Text/URL for websites and plain text, WiFi for sharing network credentials, vCard for contact information, Email for pre-filled emails, SMS for text messages, and Phone for direct dial numbers."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I customize the QR code colors?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! You can change both the foreground (dots) color and background color using the color pickers. Just make sure there's enough contrast between the colors for the QR code to remain scannable."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What's the difference between PNG and SVG download?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "PNG is a raster image format, best for sharing online or printing at a fixed size. SVG is a vector format that can be scaled to any size without losing quality, making it ideal for large prints or professional design work."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my data secure?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Absolutely. All QR codes are generated directly in your browser using JavaScript. Your data never leaves your device - we don't store, transmit, or have access to any information you enter."
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
                    <li class="text-gold">QR Code Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">QR Code Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Create QR codes for URLs, WiFi, contacts, email, and more. Customize colors and size, download as PNG or SVG.
                </p>
            </div>

            <x-tool-privacy-banner />

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <div class="grid lg:grid-cols-[1fr,400px] gap-8">
                    {{-- Left Column: Input Section --}}
                    <div>
                        {{-- Type Selector --}}
                        <div class="mb-6">
                            <label class="text-light font-semibold mb-3 block">QR Code Type</label>
                            <div class="flex flex-wrap gap-2">
                                <button data-type="text" class="type-btn px-4 py-2 rounded-lg bg-gold/20 text-gold border border-gold/50 hover:bg-gold/30 transition-colors cursor-pointer">
                                    Text/URL
                                </button>
                                <button data-type="wifi" class="type-btn px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-light transition-colors border border-transparent cursor-pointer">
                                    WiFi
                                </button>
                                <button data-type="vcard" class="type-btn px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-light transition-colors border border-transparent cursor-pointer">
                                    Contact
                                </button>
                                <button data-type="email" class="type-btn px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-light transition-colors border border-transparent cursor-pointer">
                                    Email
                                </button>
                                <button data-type="sms" class="type-btn px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-light transition-colors border border-transparent cursor-pointer">
                                    SMS
                                </button>
                                <button data-type="phone" class="type-btn px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-light transition-colors border border-transparent cursor-pointer">
                                    Phone
                                </button>
                            </div>
                        </div>

                        {{-- Text/URL Form --}}
                        <div id="form-text" class="form-section">
                            <label for="input-text" class="text-light font-semibold mb-2 block">Enter text or URL</label>
                            <textarea id="input-text" rows="4" placeholder="https://example.com or any text..."
                                      class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none resize-none"></textarea>
                            <p class="text-xs text-light-muted mt-1">Character count: <span id="text-count">0</span></p>
                        </div>

                        {{-- WiFi Form --}}
                        <div id="form-wifi" class="form-section hidden">
                            <div class="space-y-4">
                                <div>
                                    <label for="wifi-ssid" class="text-light font-semibold mb-2 block">Network Name (SSID)</label>
                                    <input type="text" id="wifi-ssid" placeholder="My WiFi Network"
                                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                                </div>
                                <div>
                                    <label for="wifi-password" class="text-light font-semibold mb-2 block">Password</label>
                                    <div class="relative">
                                        <input type="password" id="wifi-password" placeholder="Network password"
                                               class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 pr-10 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                                        <button type="button" id="wifi-toggle-password" class="absolute right-3 top-1/2 -translate-y-1/2 text-light-muted hover:text-gold transition-colors cursor-pointer">
                                            <svg class="w-5 h-5 show-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            <svg class="w-5 h-5 hide-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <label for="wifi-encryption" class="text-light font-semibold mb-2 block">Encryption</label>
                                    <select id="wifi-encryption" class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light focus:border-gold/50 focus:outline-none cursor-pointer">
                                        <option value="WPA">WPA/WPA2</option>
                                        <option value="WEP">WEP</option>
                                        <option value="">None</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" id="wifi-hidden" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                                        <span class="text-light text-sm">Hidden Network</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- vCard Form --}}
                        <div id="form-vcard" class="form-section hidden">
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label for="vcard-firstname" class="text-light font-semibold mb-2 block">First Name</label>
                                    <input type="text" id="vcard-firstname" placeholder="John"
                                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                                </div>
                                <div>
                                    <label for="vcard-lastname" class="text-light font-semibold mb-2 block">Last Name</label>
                                    <input type="text" id="vcard-lastname" placeholder="Doe"
                                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                                </div>
                                <div>
                                    <label for="vcard-mobile" class="text-light font-semibold mb-2 block">Mobile Phone</label>
                                    <input type="tel" id="vcard-mobile" placeholder="+1234567890"
                                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                                </div>
                                <div>
                                    <label for="vcard-email" class="text-light font-semibold mb-2 block">Email</label>
                                    <input type="email" id="vcard-email" placeholder="john@example.com"
                                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                                </div>
                                <div>
                                    <label for="vcard-company" class="text-light font-semibold mb-2 block">Company</label>
                                    <input type="text" id="vcard-company" placeholder="Acme Corp"
                                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                                </div>
                                <div>
                                    <label for="vcard-title" class="text-light font-semibold mb-2 block">Job Title</label>
                                    <input type="text" id="vcard-title" placeholder="Software Engineer"
                                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                                </div>
                                <div class="md:col-span-2">
                                    <label for="vcard-website" class="text-light font-semibold mb-2 block">Website</label>
                                    <input type="url" id="vcard-website" placeholder="https://example.com"
                                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                                </div>
                            </div>
                        </div>

                        {{-- Email Form --}}
                        <div id="form-email" class="form-section hidden">
                            <div class="space-y-4">
                                <div>
                                    <label for="email-to" class="text-light font-semibold mb-2 block">To</label>
                                    <input type="email" id="email-to" placeholder="recipient@example.com"
                                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                                </div>
                                <div>
                                    <label for="email-subject" class="text-light font-semibold mb-2 block">Subject</label>
                                    <input type="text" id="email-subject" placeholder="Hello"
                                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                                </div>
                                <div>
                                    <label for="email-body" class="text-light font-semibold mb-2 block">Message</label>
                                    <textarea id="email-body" rows="4" placeholder="Your message here..."
                                              class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none resize-none"></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- SMS Form --}}
                        <div id="form-sms" class="form-section hidden">
                            <div class="space-y-4">
                                <div>
                                    <label for="sms-phone" class="text-light font-semibold mb-2 block">Phone Number</label>
                                    <input type="tel" id="sms-phone" placeholder="+1234567890"
                                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                                </div>
                                <div>
                                    <label for="sms-message" class="text-light font-semibold mb-2 block">Message</label>
                                    <textarea id="sms-message" rows="4" placeholder="Your message..."
                                              class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none resize-none"></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Phone Form --}}
                        <div id="form-phone" class="form-section hidden">
                            <div>
                                <label for="phone-number" class="text-light font-semibold mb-2 block">Phone Number</label>
                                <input type="tel" id="phone-number" placeholder="+1234567890"
                                       class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                            </div>
                        </div>
                    </div>

                    {{-- Right Column: QR Preview & Customization --}}
                    <div>
                        {{-- QR Code Preview --}}
                        <div class="mb-6">
                            <label class="text-light font-semibold mb-3 block">QR Code Preview</label>
                            <div class="bg-white rounded-lg p-6 flex items-center justify-center min-h-[300px]">
                                <div id="qr-container" class="hidden">
                                    <canvas id="qr-canvas"></canvas>
                                </div>
                                <div id="qr-placeholder" class="text-center text-gray-400">
                                    <svg class="w-16 h-16 mx-auto mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                                    <p class="text-sm">Fill in details to generate QR code</p>
                                </div>
                            </div>
                        </div>

                        {{-- Customization Options --}}
                        <div class="space-y-4 mb-6">
                            <div>
                                <label for="qr-size" class="text-light font-semibold mb-2 block">Size: <span id="size-value">256px</span></label>
                                <select id="qr-size" class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light focus:border-gold/50 focus:outline-none cursor-pointer">
                                    <option value="128">128 × 128</option>
                                    <option value="256" selected>256 × 256</option>
                                    <option value="512">512 × 512</option>
                                    <option value="1024">1024 × 1024</option>
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="text-light font-semibold mb-2 block">Foreground</label>
                                    <div class="flex items-center gap-2">
                                        <input type="color" id="qr-fg-color" value="#000000"
                                               class="w-12 h-10 rounded border border-gold/20 bg-darkBg cursor-pointer">
                                        <input type="text" id="fg-color-input" value="#000000" maxlength="7" placeholder="#000000"
                                               class="flex-1 bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                                    </div>
                                </div>
                                <div>
                                    <label class="text-light font-semibold mb-2 block">Background</label>
                                    <div class="flex items-center gap-2">
                                        <input type="color" id="qr-bg-color" value="#ffffff"
                                               class="w-12 h-10 rounded border border-gold/20 bg-darkBg cursor-pointer">
                                        <input type="text" id="bg-color-input" value="#FFFFFF" maxlength="7" placeholder="#FFFFFF"
                                               class="flex-1 bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-wrap gap-3">
                            <button id="btn-download-png" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download PNG
                            </button>
                            <button id="btn-download-svg" class="px-6 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download SVG
                            </button>
                            <button id="btn-copy" class="px-6 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                Copy
                            </button>
                        </div>

                        {{-- Success/Error Notifications --}}
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
                </div>
            </div>

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h4a1 1 0 010 2H6v2a1 1 0 01-2 0V5zM4 13a1 1 0 011 1v2h2a1 1 0 010 2H5a1 1 0 01-1-1v-3a1 1 0 011-1zM20 5a1 1 0 00-1-1h-4a1 1 0 000 2h2v2a1 1 0 002 0V5zM20 13a1 1 0 00-1 1v2h-2a1 1 0 000 2h3a1 1 0 001-1v-3a1 1 0 00-1-1z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Multiple QR Types</h3>
                    <p class="text-light-muted text-sm">Generate QR codes for URLs, WiFi networks, contact cards, emails, SMS, and phone numbers.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Full Customization</h3>
                    <p class="text-light-muted text-sm">Customize colors, size, and error correction level. Download as PNG for sharing or SVG for print.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">Everything runs in your browser. Your data never touches our servers.</p>
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
                            <span class="text-light font-medium">How do I create a QR code?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Simply select the type of QR code you want to create (URL, WiFi, Contact, etc.), fill in the required information, and your QR code will be generated instantly. You can then customize the colors and size before downloading.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What types of QR codes can I create?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Our generator supports multiple QR code types: Text/URL for websites and plain text, WiFi for sharing network credentials, vCard for contact information, Email for pre-filled emails, SMS for text messages, and Phone for direct dial numbers.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I customize the QR code colors?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes! You can change both the foreground (dots) color and background color using the color pickers. Just make sure there's enough contrast between the colors for the QR code to remain scannable.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What's the difference between PNG and SVG download?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            PNG is a raster image format, best for sharing online or printing at a fixed size. SVG is a vector format that can be scaled to any size without losing quality, making it ideal for large prints or professional design work.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my data secure?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Absolutely. All QR codes are generated directly in your browser using JavaScript. Your data never leaves your device - we don't store, transmit, or have access to any information you enter.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.qr-code-generator-script')
    @endpush
</x-layout>
