<x-layout>
    <x-slot:title>IP to Binary Converter - Convert IP Address to Binary Online | hafiz.dev</x-slot:title>
    <x-slot:description>Free online IP to binary converter. Convert IPv4 addresses to binary notation with octet breakdown and subnet visualization. No signup required.</x-slot:description>
    <x-slot:keywords>ip to binary, convert ip to binary, ip to binary converter, ip address to binary, ipv4 to binary, ip address binary conversion</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/ip-to-binary') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>IP to Binary Converter - Convert IP Address to Binary Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online IP to binary converter. Convert IPv4 addresses to binary notation with octet breakdown and subnet visualization.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/ip-to-binary') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "IP to Binary Converter",
            "description": "Free online IP to binary converter. Convert IPv4 addresses to binary notation with octet breakdown.",
            "url": "https://hafiz.dev/tools/ip-to-binary",
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
                { "@@type": "ListItem", "position": 3, "name": "IP to Binary", "item": "https://hafiz.dev/tools/ip-to-binary" }
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
                    "name": "How do I convert an IP address to binary?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Convert each of the four octets (numbers separated by dots) to its 8-bit binary representation. For example, 192.168.1.1 becomes 11000000.10101000.00000001.00000001. Each octet is a number from 0-255, which fits in 8 bits."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the binary of 192.168.1.1?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "192.168.1.1 in binary is 11000000.10101000.00000001.00000001. Breaking it down: 192 = 11000000, 168 = 10101000, 1 = 00000001, 1 = 00000001. The full 32-bit representation is 11000000101010000000000100000001."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Why are IP addresses 32 bits?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "IPv4 addresses use 32 bits (4 bytes) because this was the size chosen when the Internet Protocol was designed in the 1980s. 32 bits allow for about 4.3 billion unique addresses (2^32). Each of the 4 octets uses 8 bits, giving a range of 0-255 per octet. IPv6 uses 128 bits for a much larger address space."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do subnet masks work in binary?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A subnet mask is a 32-bit number where the network portion is all 1s and the host portion is all 0s. For example, 255.255.255.0 in binary is 11111111.11111111.11111111.00000000, meaning the first 24 bits identify the network and the last 8 bits identify hosts. CIDR notation /24 means 24 network bits."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the binary of 255.255.255.0?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "255.255.255.0 in binary is 11111111.11111111.11111111.00000000. Since 255 in binary is 11111111 (all 8 bits set to 1) and 0 is 00000000 (all bits 0), this common subnet mask has 24 consecutive 1-bits followed by 8 zero-bits, written as /24 in CIDR notation."
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
                    <li class="text-gold">IP to Binary</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">IP to Binary Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert IPv4 addresses to binary notation with per-octet breakdown, subnet mask visualization, and CIDR support.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- IP Input --}}
                <div class="mb-6">
                    <label for="ip-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                        IPv4 Address
                    </label>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="flex-1">
                            <input
                                type="text"
                                id="ip-input"
                                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30"
                                placeholder="e.g., 192.168.1.1"
                                spellcheck="false"
                                autocomplete="off"
                            >
                        </div>
                        <div class="sm:w-40">
                            <select id="cidr-input" class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-sm text-light focus:border-gold focus:outline-none cursor-pointer">
                                <option value="">No subnet</option>
                                <option value="8">/8 (255.0.0.0)</option>
                                <option value="16">/16 (255.255.0.0)</option>
                                <option value="24" selected>/24 (255.255.255.0)</option>
                                <option value="25">/25 (255.255.255.128)</option>
                                <option value="26">/26 (255.255.255.192)</option>
                                <option value="27">/27 (255.255.255.224)</option>
                                <option value="28">/28 (255.255.255.240)</option>
                                <option value="30">/30 (255.255.255.252)</option>
                                <option value="32">/32 (255.255.255.255)</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy Binary
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

                {{-- Binary Output --}}
                <div id="output-section" class="hidden space-y-4 mb-6">
                    {{-- Full Binary --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <h3 class="text-light font-semibold mb-2 text-sm">Full 32-bit Binary</h3>
                        <div id="full-binary" class="font-mono text-lg text-gold break-all"></div>
                    </div>

                    {{-- Dotted Binary --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <h3 class="text-light font-semibold mb-2 text-sm">Dotted Binary Notation</h3>
                        <div id="dotted-binary" class="font-mono text-lg text-light break-all"></div>
                    </div>

                    {{-- Octet Breakdown --}}
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                        <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                            Octet Breakdown
                        </h3>
                        <div class="overflow-x-auto border border-gold/10 rounded-lg">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="bg-darkCard border-b border-gold/10">
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">Octet</th>
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">Decimal</th>
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">Binary</th>
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">Hex</th>
                                    </tr>
                                </thead>
                                <tbody id="octet-body" class="divide-y divide-gold/5"></tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Subnet Info --}}
                    <div id="subnet-section" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
                        <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Subnet Information
                        </h3>
                        <div class="grid sm:grid-cols-2 gap-3">
                            <div class="p-3 bg-darkCard rounded-lg border border-gold/10">
                                <div class="text-light-muted text-xs mb-1">Subnet Mask</div>
                                <div id="subnet-mask" class="font-mono text-light text-sm"></div>
                            </div>
                            <div class="p-3 bg-darkCard rounded-lg border border-gold/10">
                                <div class="text-light-muted text-xs mb-1">CIDR Notation</div>
                                <div id="cidr-display" class="font-mono text-light text-sm"></div>
                            </div>
                            <div class="p-3 bg-darkCard rounded-lg border border-gold/10">
                                <div class="text-light-muted text-xs mb-1">Network Address</div>
                                <div id="network-addr" class="font-mono text-light text-sm"></div>
                            </div>
                            <div class="p-3 bg-darkCard rounded-lg border border-gold/10">
                                <div class="text-light-muted text-xs mb-1">Broadcast Address</div>
                                <div id="broadcast-addr" class="font-mono text-light text-sm"></div>
                            </div>
                            <div class="p-3 bg-darkCard rounded-lg border border-gold/10">
                                <div class="text-light-muted text-xs mb-1">Network Bits</div>
                                <div id="network-bits" class="font-mono text-gold text-sm"></div>
                            </div>
                            <div class="p-3 bg-darkCard rounded-lg border border-gold/10">
                                <div class="text-light-muted text-xs mb-1">Host Bits</div>
                                <div id="host-bits" class="font-mono text-light text-sm"></div>
                            </div>
                        </div>

                        {{-- Visual bit breakdown --}}
                        <div class="mt-4">
                            <div class="text-light-muted text-xs mb-2">Network / Host Bits Visualization</div>
                            <div id="bit-visual" class="font-mono text-xs leading-relaxed break-all"></div>
                        </div>
                    </div>
                </div>

                {{-- Common IP Addresses --}}
                <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
                    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        Common IP Addresses
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2">
                        <button class="quick-ip text-left p-3 bg-darkCard rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer" data-ip="192.168.1.1">
                            <span class="text-gold font-mono text-sm">192.168.1.1</span>
                            <span class="text-light-muted text-xs block">Private Network (Home)</span>
                        </button>
                        <button class="quick-ip text-left p-3 bg-darkCard rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer" data-ip="10.0.0.1">
                            <span class="text-gold font-mono text-sm">10.0.0.1</span>
                            <span class="text-light-muted text-xs block">Private Network (Corporate)</span>
                        </button>
                        <button class="quick-ip text-left p-3 bg-darkCard rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer" data-ip="127.0.0.1">
                            <span class="text-gold font-mono text-sm">127.0.0.1</span>
                            <span class="text-light-muted text-xs block">Localhost (Loopback)</span>
                        </button>
                        <button class="quick-ip text-left p-3 bg-darkCard rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer" data-ip="255.255.255.0">
                            <span class="text-gold font-mono text-sm">255.255.255.0</span>
                            <span class="text-light-muted text-xs block">Subnet Mask (/24)</span>
                        </button>
                        <button class="quick-ip text-left p-3 bg-darkCard rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer" data-ip="8.8.8.8">
                            <span class="text-gold font-mono text-sm">8.8.8.8</span>
                            <span class="text-light-muted text-xs block">Google DNS</span>
                        </button>
                        <button class="quick-ip text-left p-3 bg-darkCard rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer" data-ip="0.0.0.0">
                            <span class="text-gold font-mono text-sm">0.0.0.0</span>
                            <span class="text-light-muted text-xs block">Default Route</span>
                        </button>
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
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Octet Breakdown</h3>
                    <p class="text-light-muted text-sm">See each of the four octets converted separately with decimal, binary, and hex values side by side.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Subnet Visualization</h3>
                    <p class="text-light-muted text-sm">Select a CIDR prefix to see network vs host bits highlighted, with network address and broadcast calculated.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Quick Presets</h3>
                    <p class="text-light-muted text-sm">Click common IP addresses like 192.168.1.1, 127.0.0.1, or 8.8.8.8 to instantly see their binary representation.</p>
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
                            <span class="text-light font-medium">How do I convert an IP address to binary?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Convert each of the four octets (numbers separated by dots) to its 8-bit binary representation. For example, <code class="bg-darkCard px-1 rounded">192.168.1.1</code> becomes <code class="bg-darkCard px-1 rounded">11000000.10101000.00000001.00000001</code>. Each octet is a number from 0-255, which fits in exactly 8 binary bits.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the binary of 192.168.1.1?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            <code class="bg-darkCard px-1 rounded">192.168.1.1</code> in binary is <code class="bg-darkCard px-1 rounded">11000000.10101000.00000001.00000001</code>. Breaking it down: 192 = <code class="bg-darkCard px-1 rounded">11000000</code>, 168 = <code class="bg-darkCard px-1 rounded">10101000</code>, 1 = <code class="bg-darkCard px-1 rounded">00000001</code>, 1 = <code class="bg-darkCard px-1 rounded">00000001</code>. The full 32-bit representation without dots is <code class="bg-darkCard px-1 rounded">11000000101010000000000100000001</code>.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Why are IP addresses 32 bits?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            IPv4 addresses use 32 bits (4 bytes) because this was the size chosen when the Internet Protocol was designed in the early 1980s. 32 bits allow for about 4.3 billion unique addresses (2<sup>32</sup>). Each of the 4 octets uses 8 bits, giving a range of 0-255 per octet. IPv6 uses 128 bits for a vastly larger address space.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do subnet masks work in binary?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            A subnet mask is a 32-bit number where the network portion is all 1s and the host portion is all 0s. For example, <code class="bg-darkCard px-1 rounded">255.255.255.0</code> in binary is <code class="bg-darkCard px-1 rounded">11111111.11111111.11111111.00000000</code>, meaning the first 24 bits identify the network and the last 8 bits identify hosts. CIDR notation <code class="bg-darkCard px-1 rounded">/24</code> means 24 network bits.
                        </div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the binary of 255.255.255.0?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            <code class="bg-darkCard px-1 rounded">255.255.255.0</code> in binary is <code class="bg-darkCard px-1 rounded">11111111.11111111.11111111.00000000</code>. Since 255 in binary is <code class="bg-darkCard px-1 rounded">11111111</code> (all 8 bits set to 1) and 0 is <code class="bg-darkCard px-1 rounded">00000000</code> (all bits 0), this common subnet mask has 24 consecutive 1-bits followed by 8 zero-bits, written as <code class="bg-darkCard px-1 rounded">/24</code> in CIDR notation.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('tools.partials.ip-to-binary-script')
    @endpush
</x-layout>
