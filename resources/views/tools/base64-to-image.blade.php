<x-layout>
    <x-slot:title>Base64 to Image Converter - Convert Base64 to Image Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online Base64 to Image converter. Decode Base64 strings to PNG, JPEG, GIF, SVG, and WebP images instantly. Preview, download, or copy the image in your browser.</x-slot:description>
    <x-slot:keywords>base64 to image, base64 to image converter, convert base64 to image, decode base64 image, base64 image decoder, base64 to png</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/base64-to-image') }}</x-slot:canonical>

    <x-slot:ogTitle>Base64 to Image Converter - Convert Base64 to Image Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online Base64 to Image converter. Decode Base64 strings to viewable and downloadable images instantly in your browser.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/base64-to-image') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Base64 to Image Converter",
            "description": "Free online Base64 to Image converter. Decode Base64 strings to images.",
            "url": "https://hafiz.dev/tools/base64-to-image",
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
                { "@@type": "ListItem", "position": 3, "name": "Base64 to Image", "item": "https://hafiz.dev/tools/base64-to-image" }
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
                    "name": "How do I convert Base64 to an image?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Paste your Base64 string into the input field. The tool automatically detects the image format and displays a preview. You can then download the image as a file or copy it to your clipboard."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What image formats are supported?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The converter supports PNG, JPEG, GIF, WebP, SVG, BMP, ICO, and TIFF formats. It auto-detects the format from the Base64 data URI prefix or lets you specify it manually."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Do I need the data URI prefix?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "No! You can paste either the full data URI (data:image/png;base64,...) or just the raw Base64 string. If you paste raw Base64, select the image format from the dropdown and the tool will handle the rest."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is there a file size limit?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Since everything runs in your browser, there's no server-side limit. However, very large Base64 strings (over 10MB) may slow down your browser. Most typical images work perfectly."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my data safe?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! All conversion happens entirely in your browser using JavaScript. No data is uploaded to any server. Your Base64 strings and images never leave your device."
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
                    <li class="text-gold">Base64 to Image</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Base64 to Image Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Decode Base64 strings to viewable and downloadable images. Supports PNG, JPEG, GIF, WebP, SVG, and more. Auto-detects image format.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Format selector --}}
                <div class="mb-4 flex items-center gap-4">
                    <label for="img-format" class="text-light text-sm font-semibold">Format (if no data URI prefix):</label>
                    <select id="img-format" class="bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                        <option value="auto" selected>Auto-detect</option>
                        <option value="image/png">PNG</option>
                        <option value="image/jpeg">JPEG</option>
                        <option value="image/gif">GIF</option>
                        <option value="image/webp">WebP</option>
                        <option value="image/svg+xml">SVG</option>
                        <option value="image/bmp">BMP</option>
                        <option value="image/x-icon">ICO</option>
                    </select>
                </div>

                {{-- Input --}}
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <label for="b64-input" class="text-light font-semibold flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Base64 Input
                        </label>
                        <span id="input-length" class="text-light-muted text-xs">0 characters</span>
                    </div>
                    <textarea
                        id="b64-input"
                        class="w-full min-h-[180px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                        placeholder="Paste Base64 string here (with or without data:image/...;base64, prefix)..."
                        spellcheck="false"
                    ></textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Decode Image
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer" disabled>
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

                {{-- Image Preview --}}
                <div id="preview-area" class="hidden mb-6">
                    <h3 class="text-light font-semibold mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Image Preview
                    </h3>
                    <div class="bg-[#f0f0f0] rounded-lg p-4 flex items-center justify-center min-h-[200px] border border-gold/10" style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2220%22 height=%2220%22><rect width=%2210%22 height=%2210%22 fill=%22%23ddd%22/><rect x=%2210%22 y=%2210%22 width=%2210%22 height=%2210%22 fill=%22%23ddd%22/></svg>'); background-size: 20px 20px;">
                        <img id="preview-img" class="max-w-full max-h-[500px] object-contain" alt="Decoded image">
                    </div>
                </div>

                {{-- Stats --}}
                <div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div id="stat-format" class="text-lg font-bold text-gold mb-1">—</div>
                            <div class="text-light-muted text-sm">Format</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-dimensions" class="text-lg font-bold text-light mb-1">—</div>
                            <div class="text-light-muted text-sm">Dimensions</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-b64size" class="text-lg font-bold text-light mb-1">—</div>
                            <div class="text-light-muted text-sm">Base64 Size</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-filesize" class="text-lg font-bold text-light mb-1">—</div>
                            <div class="text-light-muted text-sm">File Size (est.)</div>
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
                    <div class="text-gold text-2xl mb-3">🖼️</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Multi-Format Support</h3>
                    <p class="text-light-muted text-sm">Decode Base64 to PNG, JPEG, GIF, WebP, SVG, BMP, and ICO. Auto-detects format from data URI prefix or lets you choose manually.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📐</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Image Details</h3>
                    <p class="text-light-muted text-sm">Instantly see image dimensions, format, Base64 size, and estimated file size. Checkerboard background reveals transparency in PNG and WebP images.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">⬇️</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Download Instantly</h3>
                    <p class="text-light-muted text-sm">Download the decoded image as a file with the correct extension. One click and the image is saved to your device with the proper format.</p>
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
                            <span class="text-light font-medium">How do I convert Base64 to an image?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Paste your Base64 string (with or without the data:image prefix) and click "Decode Image". The tool shows a preview with image details, and you can download the image directly.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What image formats are supported?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">PNG, JPEG, GIF, WebP, SVG, BMP, and ICO are all supported. The format is auto-detected from the data URI prefix, or you can select it manually from the dropdown.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Do I need the data URI prefix?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">No! You can paste the full data URI (data:image/png;base64,...) or just the raw Base64 characters. If you paste raw Base64, select the format from the dropdown or leave it on auto-detect (defaults to PNG).</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is there a file size limit?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Everything runs in your browser, so there's no server limit. Very large Base64 strings (10MB+) may be slow, but typical images work instantly.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my data safe?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! All conversion happens entirely in your browser using JavaScript. No data is uploaded to any server. Your Base64 strings and images never leave your device.</div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @include('tools.partials.base64-to-image-script')
</x-layout>
