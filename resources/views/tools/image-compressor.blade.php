<x-layout>
    <x-slot:title>Image Compressor - Compress JPEG, PNG, WebP Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online image compressor. Reduce image file size by up to 90% while maintaining quality. Supports JPEG, PNG, WebP, GIF. 100% client-side - your images never leave your browser.</x-slot:description>
    <x-slot:keywords>image compressor, compress images online, reduce image size, jpeg compressor, png compressor, webp compressor, image optimizer, compress photos online free</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/image-compressor') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Image Compressor - Compress JPEG, PNG, WebP Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online image compressor. Reduce image file size by up to 90% while maintaining quality. 100% client-side - your images never leave your browser.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/image-compressor') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Image Compressor",
            "description": "Free online image compressor. Reduce image file size by up to 90% while maintaining quality. Supports JPEG, PNG, WebP, GIF. 100% client-side processing.",
            "url": "https://hafiz.dev/tools/image-compressor",
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
                    "name": "Image Compressor",
                    "item": "https://hafiz.dev/tools/image-compressor"
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
                    "name": "How does the image compressor work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Our tool uses advanced browser-based compression algorithms to reduce image file sizes. The compression happens entirely in your browser - your images are never uploaded to any server."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What image formats are supported?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "We support JPEG, PNG, WebP, and GIF formats. You can also convert between formats during compression."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is there a file size limit?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "There's no strict limit, but very large images (50MB+) may take longer to process. For best performance, we recommend images under 20MB."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Are my images secure?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Absolutely. All compression happens locally in your browser using JavaScript. Your images never leave your device and are not uploaded to any server."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How much can I reduce the file size?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Typical compression reduces file sizes by 60-90% depending on the original image and quality settings. You can adjust the quality slider to balance size and quality."
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
                    <li class="text-gold">Image Compressor</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Image Compressor</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Compress JPEG, PNG, WebP, and GIF images up to 90% smaller. 100% client-side - your images never leave your browser.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                {{-- Privacy Notice --}}
                <div class="flex items-center gap-2 mb-6 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <span class="text-green-400 text-sm">Your images are processed entirely in your browser. Nothing is uploaded to any server.</span>
                </div>

                {{-- Settings Panel --}}
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    {{-- Quality Slider with Presets --}}
                    <div class="lg:col-span-2">
                        <label class="text-light font-semibold mb-2 block text-sm">Quality: <span id="quality-value" class="text-gold">80%</span></label>

                        {{-- Quality Preset Buttons --}}
                        <div class="flex gap-2 mb-3">
                            <button type="button" data-quality="40" class="preset-btn flex-1 px-3 py-2 bg-gray-700 hover:bg-gray-600 border border-gray-600 rounded-lg text-center transition-all duration-200 cursor-pointer">
                                <span class="text-light text-sm block">Blog/Web</span>
                                <span class="text-xs text-light-muted">40%</span>
                            </button>
                            <button type="button" data-quality="60" class="preset-btn flex-1 px-3 py-2 bg-gray-700 hover:bg-gray-600 border border-gray-600 rounded-lg text-center transition-all duration-200 cursor-pointer">
                                <span class="text-light text-sm block">Social Media</span>
                                <span class="text-xs text-light-muted">60%</span>
                            </button>
                            <button type="button" data-quality="85" class="preset-btn flex-1 px-3 py-2 bg-gray-700 hover:bg-gray-600 border border-gray-600 rounded-lg text-center transition-all duration-200 cursor-pointer">
                                <span class="text-light text-sm block">High Quality</span>
                                <span class="text-xs text-light-muted">85%</span>
                            </button>
                        </div>

                        <input type="range" id="quality-slider" min="1" max="100" value="80" class="w-full h-2 bg-darkBg rounded-lg appearance-none cursor-pointer accent-gold">
                        <div class="flex justify-between text-xs text-light-muted mt-1">
                            <span>Smaller</span>
                            <span>Higher Quality</span>
                        </div>
                    </div>

                    {{-- Max Width --}}
                    <div>
                        <label for="max-width" class="text-light font-semibold mb-2 block text-sm">Max Width (px)</label>
                        <input type="number" id="max-width" placeholder="e.g., 1920"
                               class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none">
                        <p class="text-xs text-light-muted mt-1">Leave empty for original</p>
                    </div>

                    {{-- Max Height --}}
                    <div>
                        <label for="max-height" class="text-light font-semibold mb-2 block text-sm">Max Height (px)</label>
                        <input type="number" id="max-height" placeholder="e.g., 1080"
                               class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none">
                        <p class="text-xs text-light-muted mt-1">Leave empty for original</p>
                    </div>
                </div>

                {{-- Second Row: Output Format and Auto-Compress --}}
                <div class="flex flex-wrap items-end gap-4 mb-6">
                    {{-- Output Format --}}
                    <div class="flex-1 min-w-[200px]">
                        <label for="output-format" class="text-light font-semibold mb-2 block text-sm">Output Format</label>
                        <select id="output-format" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                            <option value="original">Original Format</option>
                            <option value="image/jpeg">JPEG</option>
                            <option value="image/png">PNG</option>
                            <option value="image/webp">WebP</option>
                        </select>
                    </div>

                    {{-- Auto-Compress Toggle --}}
                    <div class="flex items-center gap-2 pb-2">
                        <input type="checkbox" id="auto-compress"
                               class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                        <label for="auto-compress" class="text-sm text-light-muted cursor-pointer">
                            Auto-compress on upload
                        </label>
                    </div>
                </div>

                {{-- Drop Zone --}}
                <div id="drop-zone" class="border-2 border-dashed border-gold/30 rounded-xl p-8 text-center cursor-pointer hover:border-gold/60 hover:bg-gold/5 transition-all duration-300 mb-4">
                    <input type="file" id="file-input" multiple accept="image/jpeg,image/png,image/webp,image/gif" class="hidden">
                    <div id="drop-zone-content" class="flex flex-col items-center gap-3">
                        <svg class="w-16 h-16 text-gold/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                            <p id="drop-zone-text" class="text-light font-semibold mb-1">Drag & drop images here or click to browse</p>
                            <p class="text-light-muted text-sm">Supports: JPEG, PNG, WebP, GIF</p>
                        </div>
                    </div>
                </div>
                <p class="text-xs text-light-muted/70 text-center mb-6">
                    Tip: You can also paste images from clipboard (Ctrl+V / Cmd+V)
                </p>

                {{-- Image Queue --}}
                <div id="image-queue" class="hidden mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-light font-semibold">Images Queue</h3>
                        <button id="btn-clear-all" class="text-light-muted hover:text-red-400 text-sm transition-colors flex items-center gap-1 cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Clear All
                        </button>
                    </div>
                    <div id="image-list" class="space-y-3">
                        {{-- Images will be added here dynamically --}}
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div id="action-buttons" class="hidden flex flex-wrap gap-3 mb-6">
                    <button id="btn-compress-all" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg id="compress-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        <span id="compress-text">Compress All</span>
                    </button>
                    <button id="btn-download-all" class="px-6 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        <svg id="download-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>
                        <span id="download-text">Download All (ZIP)</span>
                    </button>
                </div>

                {{-- Summary Statistics --}}
                <div id="summary-stats" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
                    <h3 class="text-light font-semibold mb-3">Compression Summary</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div id="stat-total-images" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Images</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-original-size" class="text-2xl font-bold text-light mb-1">0 KB</div>
                            <div class="text-light-muted text-sm">Original Size</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-compressed-size" class="text-2xl font-bold text-light mb-1">0 KB</div>
                            <div class="text-light-muted text-sm">Compressed Size</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-total-savings" class="text-2xl font-bold text-green-400 mb-1">0%</div>
                            <div class="text-light-muted text-sm">Total Savings</div>
                        </div>
                    </div>
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

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private & Secure</h3>
                    <p class="text-light-muted text-sm">Your images never leave your browser. All compression happens locally on your device.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Batch Processing</h3>
                    <p class="text-light-muted text-sm">Compress multiple images at once. Download individually or as a ZIP file.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Adjustable Quality</h3>
                    <p class="text-light-muted text-sm">Fine-tune compression with quality slider. Preview results before downloading.</p>
                </div>
            </div>

            {{-- FAQ Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Frequently Asked Questions</h2>

                <div class="space-y-4 max-w-3xl mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How does the image compressor work?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Our tool uses advanced browser-based compression algorithms to reduce image file sizes. The compression happens entirely in your browser - your images are never uploaded to any server.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What image formats are supported?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            We support JPEG, PNG, WebP, and GIF formats. You can also convert between formats during compression to get the best results for your use case.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is there a file size limit?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            There's no strict limit, but very large images (50MB+) may take longer to process. For best performance, we recommend images under 20MB.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Are my images secure?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Absolutely. All compression happens locally in your browser using JavaScript. Your images never leave your device and are not uploaded to any server.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How much can I reduce the file size?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Typical compression reduces file sizes by 60-90% depending on the original image and quality settings. You can adjust the quality slider to balance size and quality.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    {{-- Browser Image Compression Library --}}
    <script src="https://cdn.jsdelivr.net/npm/browser-image-compression@2.0.2/dist/browser-image-compression.js"></script>
    {{-- JSZip for downloading multiple files --}}
    <script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>
    {{-- FileSaver.js for saving files --}}
    <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>

    <script>
    (function() {
        // DOM Elements
        const dropZone = document.getElementById('drop-zone');
        const dropZoneText = document.getElementById('drop-zone-text');
        const fileInput = document.getElementById('file-input');
        const qualitySlider = document.getElementById('quality-slider');
        const qualityValue = document.getElementById('quality-value');
        const maxWidthInput = document.getElementById('max-width');
        const maxHeightInput = document.getElementById('max-height');
        const outputFormatSelect = document.getElementById('output-format');
        const autoCompressCheckbox = document.getElementById('auto-compress');
        const imageQueue = document.getElementById('image-queue');
        const imageList = document.getElementById('image-list');
        const actionButtons = document.getElementById('action-buttons');
        const btnCompressAll = document.getElementById('btn-compress-all');
        const btnDownloadAll = document.getElementById('btn-download-all');
        const btnClearAll = document.getElementById('btn-clear-all');
        const compressText = document.getElementById('compress-text');
        const downloadText = document.getElementById('download-text');
        const summaryStats = document.getElementById('summary-stats');
        const statTotalImages = document.getElementById('stat-total-images');
        const statOriginalSize = document.getElementById('stat-original-size');
        const statCompressedSize = document.getElementById('stat-compressed-size');
        const statTotalSavings = document.getElementById('stat-total-savings');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');
        const presetButtons = document.querySelectorAll('.preset-btn');

        // State
        let images = [];
        let imageIdCounter = 0;

        // ===== Settings Persistence =====

        const STORAGE_KEY = 'imageCompressorSettings';

        function saveSettings() {
            const settings = {
                quality: qualitySlider.value,
                maxWidth: maxWidthInput.value,
                maxHeight: maxHeightInput.value,
                outputFormat: outputFormatSelect.value,
                autoCompress: autoCompressCheckbox.checked
            };
            localStorage.setItem(STORAGE_KEY, JSON.stringify(settings));
        }

        function loadSettings() {
            try {
                const saved = localStorage.getItem(STORAGE_KEY);
                if (saved) {
                    const settings = JSON.parse(saved);
                    if (settings.quality) {
                        qualitySlider.value = settings.quality;
                        qualityValue.textContent = settings.quality + '%';
                    }
                    if (settings.maxWidth) maxWidthInput.value = settings.maxWidth;
                    if (settings.maxHeight) maxHeightInput.value = settings.maxHeight;
                    if (settings.outputFormat) outputFormatSelect.value = settings.outputFormat;
                    if (settings.autoCompress !== undefined) autoCompressCheckbox.checked = settings.autoCompress;
                    updatePresetActiveState();
                }
            } catch (e) {
                console.error('Error loading settings:', e);
            }
        }

        // ===== Quality Presets =====

        function setQualityPreset(value) {
            qualitySlider.value = value;
            qualityValue.textContent = value + '%';
            updatePresetActiveState();
            saveSettings();
        }

        function updatePresetActiveState() {
            const currentQuality = parseInt(qualitySlider.value);
            presetButtons.forEach(btn => {
                const presetValue = parseInt(btn.dataset.quality);
                if (presetValue === currentQuality) {
                    btn.classList.remove('border-gray-600');
                    btn.classList.add('border-gold', 'bg-gold/10');
                } else {
                    btn.classList.add('border-gray-600');
                    btn.classList.remove('border-gold', 'bg-gold/10');
                }
            });
        }

        // ===== Utility Functions =====

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        function calculateSavings(original, compressed) {
            if (original === 0) return 0;
            return Math.round(((original - compressed) / original) * 100);
        }

        function getFileExtension(mimeType) {
            const map = {
                'image/jpeg': '.jpg',
                'image/png': '.png',
                'image/webp': '.webp',
                'image/gif': '.gif'
            };
            return map[mimeType] || '.jpg';
        }

        function showSuccess(message) {
            successMessage.textContent = message;
            successNotification.classList.remove('hidden');
            errorNotification.classList.add('hidden');
            setTimeout(() => successNotification.classList.add('hidden'), 3000);
        }

        function showError(message) {
            errorMessage.textContent = message;
            errorNotification.classList.remove('hidden');
            successNotification.classList.add('hidden');
            setTimeout(() => errorNotification.classList.add('hidden'), 5000);
        }

        // Get image dimensions from file
        function getImageDimensions(file) {
            return new Promise((resolve) => {
                const img = new Image();
                img.onload = function() {
                    resolve({ width: this.width, height: this.height });
                    URL.revokeObjectURL(img.src);
                };
                img.onerror = function() {
                    resolve({ width: 0, height: 0 });
                    URL.revokeObjectURL(img.src);
                };
                img.src = URL.createObjectURL(file);
            });
        }

        // ===== Button Text Updates =====

        function updateButtonText() {
            const imageCount = images.length;
            const compressedCount = images.filter(img => img.compressedFile !== null).length;

            if (imageCount === 1) {
                compressText.textContent = 'Compress';
                downloadText.textContent = 'Download';
            } else {
                compressText.textContent = 'Compress All';
                downloadText.textContent = 'Download All (ZIP)';
            }
        }

        // ===== Image Queue Functions =====

        async function addImageToQueue(file) {
            const id = imageIdCounter++;
            const reader = new FileReader();

            // Get dimensions first
            const dimensions = await getImageDimensions(file);

            reader.onload = async function(e) {
                const image = {
                    id,
                    file,
                    originalFile: file,
                    originalSize: file.size,
                    originalWidth: dimensions.width,
                    originalHeight: dimensions.height,
                    compressedFile: null,
                    compressedSize: null,
                    compressedWidth: null,
                    compressedHeight: null,
                    thumbnail: e.target.result,
                    status: 'pending' // pending, compressing, done, error
                };

                images.push(image);
                renderImageItem(image);
                updateUI();

                // Auto-compress if enabled
                if (autoCompressCheckbox.checked) {
                    await compressImage(image);
                    updateUI();
                }
            };

            reader.readAsDataURL(file);
        }

        function renderImageItem(image) {
            const item = document.createElement('div');
            item.id = `image-${image.id}`;
            item.className = 'flex items-center gap-4 p-4 bg-darkBg rounded-lg border border-gold/10';

            const dimensionsText = image.originalWidth && image.originalHeight
                ? ` (${image.originalWidth} × ${image.originalHeight})`
                : '';

            item.innerHTML = `
                <img src="${image.thumbnail}" alt="${image.file.name}" class="w-16 h-16 object-cover rounded-lg flex-shrink-0">
                <div class="flex-1 min-w-0">
                    <p class="text-light font-medium truncate text-sm">${image.file.name}</p>
                    <div class="flex flex-wrap items-center gap-x-2 gap-y-1 mt-1">
                        <span id="original-info-${image.id}" class="text-light-muted text-xs">Original: ${formatFileSize(image.originalSize)}${dimensionsText}</span>
                        <span id="arrow-${image.id}" class="text-light-muted text-xs hidden">→</span>
                        <span id="compressed-info-${image.id}" class="text-xs text-gold hidden"></span>
                        <span id="savings-${image.id}" class="text-xs text-green-400 hidden"></span>
                    </div>
                    <div id="progress-${image.id}" class="hidden mt-2">
                        <div class="h-1.5 bg-gold/20 rounded-full overflow-hidden">
                            <div class="h-full bg-gold rounded-full animate-pulse" style="width: 100%"></div>
                        </div>
                        <span class="text-xs text-gold mt-1 block">Compressing...</span>
                    </div>
                    <div id="error-${image.id}" class="hidden mt-1">
                        <span class="text-xs text-red-400">Compression failed</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button id="download-btn-${image.id}" class="p-2 text-light-muted hover:text-gold transition-colors cursor-pointer disabled:opacity-30 disabled:cursor-not-allowed" disabled title="Download">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    </button>
                    <button class="remove-btn p-2 text-light-muted hover:text-red-400 transition-colors cursor-pointer" data-id="${image.id}" title="Remove">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            `;

            imageList.appendChild(item);

            // Add event listeners
            item.querySelector('.remove-btn').addEventListener('click', function() {
                removeImage(parseInt(this.dataset.id));
            });

            item.querySelector(`#download-btn-${image.id}`).addEventListener('click', function() {
                downloadSingle(image.id);
            });
        }

        function updateImageItem(image) {
            const arrowEl = document.getElementById(`arrow-${image.id}`);
            const compressedInfoEl = document.getElementById(`compressed-info-${image.id}`);
            const savingsEl = document.getElementById(`savings-${image.id}`);
            const progressEl = document.getElementById(`progress-${image.id}`);
            const errorEl = document.getElementById(`error-${image.id}`);
            const downloadBtn = document.getElementById(`download-btn-${image.id}`);

            progressEl.classList.add('hidden');
            errorEl.classList.add('hidden');

            if (image.status === 'compressing') {
                progressEl.classList.remove('hidden');
            } else if (image.status === 'done' && image.compressedSize !== null) {
                const compressedDimensions = image.compressedWidth && image.compressedHeight
                    ? ` (${image.compressedWidth} × ${image.compressedHeight})`
                    : '';

                arrowEl.classList.remove('hidden');
                compressedInfoEl.textContent = `Compressed: ${formatFileSize(image.compressedSize)}${compressedDimensions}`;
                compressedInfoEl.classList.remove('hidden');
                savingsEl.textContent = `• ${calculateSavings(image.originalSize, image.compressedSize)}% smaller`;
                savingsEl.classList.remove('hidden');
                downloadBtn.disabled = false;
            } else if (image.status === 'error') {
                errorEl.classList.remove('hidden');
            }
        }

        function removeImage(id) {
            images = images.filter(img => img.id !== id);
            const item = document.getElementById(`image-${id}`);
            if (item) item.remove();
            updateUI();
        }

        function clearAll() {
            images = [];
            imageList.innerHTML = '';
            updateUI();
        }

        function updateUI() {
            const hasImages = images.length > 0;
            imageQueue.classList.toggle('hidden', !hasImages);
            actionButtons.classList.toggle('hidden', !hasImages);

            const hasCompressed = images.some(img => img.compressedFile !== null);
            btnDownloadAll.disabled = !hasCompressed;

            updateButtonText();
            updateSummary();
        }

        function updateSummary() {
            const compressedImages = images.filter(img => img.compressedFile !== null);

            if (compressedImages.length === 0) {
                summaryStats.classList.add('hidden');
                return;
            }

            summaryStats.classList.remove('hidden');

            const totalOriginal = compressedImages.reduce((sum, img) => sum + img.originalSize, 0);
            const totalCompressed = compressedImages.reduce((sum, img) => sum + img.compressedSize, 0);
            const totalSavings = calculateSavings(totalOriginal, totalCompressed);

            statTotalImages.textContent = compressedImages.length;
            statOriginalSize.textContent = formatFileSize(totalOriginal);
            statCompressedSize.textContent = formatFileSize(totalCompressed);
            statTotalSavings.textContent = `${totalSavings}%`;
        }

        // ===== Compression Functions =====

        async function compressImage(imageObj) {
            const quality = parseInt(qualitySlider.value) / 100;
            const maxWidth = parseInt(maxWidthInput.value) || undefined;
            const maxHeight = parseInt(maxHeightInput.value) || undefined;
            const outputFormat = outputFormatSelect.value;

            const options = {
                maxSizeMB: 10,
                useWebWorker: true,
                initialQuality: quality,
            };

            // Set max dimensions
            if (maxWidth || maxHeight) {
                options.maxWidthOrHeight = Math.max(maxWidth || 0, maxHeight || 0);
            }

            // Set file type if converting
            if (outputFormat !== 'original') {
                options.fileType = outputFormat;
            }

            imageObj.status = 'compressing';
            updateImageItem(imageObj);

            try {
                const compressedFile = await imageCompression(imageObj.originalFile, options);
                imageObj.compressedFile = compressedFile;
                imageObj.compressedSize = compressedFile.size;

                // Get compressed dimensions
                const compressedDimensions = await getImageDimensions(compressedFile);
                imageObj.compressedWidth = compressedDimensions.width;
                imageObj.compressedHeight = compressedDimensions.height;

                imageObj.status = 'done';
            } catch (error) {
                console.error('Compression error:', error);
                imageObj.status = 'error';
            }

            updateImageItem(imageObj);
        }

        async function compressAll() {
            const pendingImages = images.filter(img => img.status === 'pending' || img.status === 'error');

            if (pendingImages.length === 0) {
                showSuccess('All images already compressed!');
                return;
            }

            btnCompressAll.disabled = true;
            const originalText = compressText.textContent;
            btnCompressAll.innerHTML = `
                <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Compressing...</span>
            `;

            for (const imageObj of pendingImages) {
                await compressImage(imageObj);
            }

            btnCompressAll.disabled = false;
            btnCompressAll.innerHTML = `
                <svg id="compress-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                <span id="compress-text">${originalText}</span>
            `;

            updateUI();

            const successful = images.filter(img => img.status === 'done').length;
            const failed = images.filter(img => img.status === 'error').length;

            if (failed > 0) {
                showError(`Compressed ${successful} images. ${failed} failed.`);
            } else {
                showSuccess(`Successfully compressed ${successful} image${successful > 1 ? 's' : ''}!`);
            }
        }

        // ===== Download Functions =====

        function downloadSingle(id) {
            const imageObj = images.find(img => img.id === id);
            if (!imageObj || !imageObj.compressedFile) return;

            const outputFormat = outputFormatSelect.value;
            let fileName = imageObj.file.name;

            // Update extension if format changed
            if (outputFormat !== 'original') {
                const baseName = fileName.substring(0, fileName.lastIndexOf('.')) || fileName;
                fileName = baseName + getFileExtension(outputFormat);
            }

            saveAs(imageObj.compressedFile, fileName);
            showSuccess(`Downloaded: ${fileName}`);
        }

        async function downloadAll() {
            const compressedImages = images.filter(img => img.compressedFile !== null);

            if (compressedImages.length === 0) {
                showError('No compressed images to download.');
                return;
            }

            // If only one image, download directly without ZIP
            if (compressedImages.length === 1) {
                downloadSingle(compressedImages[0].id);
                return;
            }

            // Multiple images - create ZIP
            btnDownloadAll.disabled = true;
            const originalText = downloadText.textContent;
            btnDownloadAll.innerHTML = `
                <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Creating ZIP...</span>
            `;

            try {
                const zip = new JSZip();
                const outputFormat = outputFormatSelect.value;

                for (const imageObj of compressedImages) {
                    let fileName = imageObj.file.name;

                    // Update extension if format changed
                    if (outputFormat !== 'original') {
                        const baseName = fileName.substring(0, fileName.lastIndexOf('.')) || fileName;
                        fileName = baseName + getFileExtension(outputFormat);
                    }

                    zip.file(fileName, imageObj.compressedFile);
                }

                const content = await zip.generateAsync({ type: 'blob' });
                const today = new Date();
                const dateStr = today.toISOString().split('T')[0];
                saveAs(content, `compressed-${dateStr}.zip`);
                showSuccess(`Downloaded ${compressedImages.length} images as ZIP!`);
            } catch (error) {
                console.error('ZIP error:', error);
                showError('Failed to create ZIP file.');
            }

            btnDownloadAll.disabled = false;
            btnDownloadAll.innerHTML = `
                <svg id="download-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>
                <span id="download-text">${originalText}</span>
            `;
        }

        // ===== Event Listeners =====

        // Quality slider
        qualitySlider.addEventListener('input', function() {
            qualityValue.textContent = this.value + '%';
            updatePresetActiveState();
        });

        qualitySlider.addEventListener('change', saveSettings);

        // Preset buttons
        presetButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                setQualityPreset(parseInt(this.dataset.quality));
            });
        });

        // Settings change listeners
        maxWidthInput.addEventListener('change', saveSettings);
        maxHeightInput.addEventListener('change', saveSettings);
        outputFormatSelect.addEventListener('change', saveSettings);
        autoCompressCheckbox.addEventListener('change', saveSettings);

        // Drop zone click
        dropZone.addEventListener('click', () => fileInput.click());

        // File input change
        fileInput.addEventListener('change', function(e) {
            const files = Array.from(e.target.files);
            files.forEach(file => {
                if (file.type.startsWith('image/')) {
                    addImageToQueue(file);
                }
            });
            this.value = ''; // Reset input
        });

        // Drag and drop
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            dropZone.classList.add('border-gold', 'bg-gold/10', 'scale-[1.02]');
            dropZone.classList.remove('border-gold/30');
            dropZoneText.textContent = 'Drop images here';
        }

        function unhighlight() {
            dropZone.classList.remove('border-gold', 'bg-gold/10', 'scale-[1.02]');
            dropZone.classList.add('border-gold/30');
            dropZoneText.textContent = 'Drag & drop images here or click to browse';
        }

        dropZone.addEventListener('drop', function(e) {
            const files = Array.from(e.dataTransfer.files);
            files.forEach(file => {
                if (file.type.startsWith('image/')) {
                    addImageToQueue(file);
                }
            });
        });

        // Paste from clipboard
        document.addEventListener('paste', async function(e) {
            const items = e.clipboardData?.items;
            if (!items) return;

            for (const item of items) {
                if (item.type.startsWith('image/')) {
                    e.preventDefault();
                    const file = item.getAsFile();
                    if (file) {
                        // Generate a filename since clipboard images don't have one
                        const extension = item.type.split('/')[1] || 'png';
                        const timestamp = new Date().toISOString().slice(0, 19).replace(/[:-]/g, '');
                        const namedFile = new File([file], `pasted-image-${timestamp}.${extension}`, {
                            type: file.type
                        });
                        addImageToQueue(namedFile);
                        showSuccess('Image pasted from clipboard!');
                    }
                }
            }
        });

        // Action buttons
        btnCompressAll.addEventListener('click', compressAll);
        btnDownloadAll.addEventListener('click', downloadAll);
        btnClearAll.addEventListener('click', clearAll);

        // Initialize
        loadSettings();
        updatePresetActiveState();
    })();
    </script>
    @endpush
</x-layout>
