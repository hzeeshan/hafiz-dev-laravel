<x-layout>
    <x-slot:title>JSON to YAML Converter - Convert JSON to YAML Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online JSON to YAML converter. Convert JSON data to YAML format instantly in your browser. Supports nested objects, arrays, and large files. 100% client-side - your data never leaves your browser.</x-slot:description>
    <x-slot:keywords>json to yaml, json to yaml converter, convert json to yaml, json yaml converter, json to yaml online, json2yaml, transform json to yaml</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/json-to-yaml') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>JSON to YAML Converter - Convert JSON to YAML Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online JSON to YAML converter. Convert JSON to YAML format instantly in your browser. 100% client-side - your data never leaves your browser.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/json-to-yaml') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "JSON to YAML Converter",
            "description": "Free online JSON to YAML converter. Convert JSON data to YAML format instantly. Supports nested objects, arrays, and large files.",
            "url": "https://hafiz.dev/tools/json-to-yaml",
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
                    "name": "JSON to YAML Converter",
                    "item": "https://hafiz.dev/tools/json-to-yaml"
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
                    "name": "How do I convert JSON to YAML?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Paste your JSON data into the input field and click 'Convert to YAML'. The tool instantly converts your JSON to properly formatted YAML. You can then copy the result or download it as a .yaml file."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between JSON and YAML?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "JSON uses braces and brackets with strict syntax, while YAML uses indentation-based formatting that is more human-readable. YAML supports comments, multi-line strings, and anchors. YAML is commonly used for configuration files (Docker, Kubernetes, CI/CD), while JSON is preferred for APIs and data exchange."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does this tool handle nested JSON objects?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, the converter handles deeply nested JSON objects, arrays, mixed types, and complex data structures. All nesting is preserved accurately in the YAML output with proper indentation."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I customize the YAML indentation?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, you can choose between 2-space and 4-space indentation for the YAML output. The default is 2 spaces, which is the most common convention for YAML files."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my data secure when using this converter?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Absolutely. All conversion happens locally in your browser using JavaScript. Your data is never uploaded to any server. This means even sensitive configuration data can be safely converted without privacy concerns."
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
                    <li class="text-gold">JSON to YAML Converter</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">JSON to YAML Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert JSON to YAML format instantly. Perfect for Kubernetes configs, Docker Compose files, CI/CD pipelines, and more.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <x-tool-privacy-banner />

                {{-- Options Panel --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <label for="indent-size" class="text-light font-semibold mb-2 block text-sm">Indentation</label>
                            <select id="indent-size" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="2">2 Spaces (default)</option>
                                <option value="4">4 Spaces</option>
                            </select>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="inline-short-arrays" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Inline Short Arrays</span>
                            </label>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="quote-strings" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Quote All Strings</span>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Editor Area --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    {{-- Input --}}
                    <div class="flex flex-col">
                        <label for="json-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            JSON Input
                        </label>
                        <textarea
                            id="json-input"
                            class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder='Paste your JSON here...

Example:
{
  "name": "my-app",
  "version": "1.0.0",
  "dependencies": {
    "express": "^4.18.0"
  }
}'
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output --}}
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            YAML Output
                        </label>
                        <textarea
                            id="yaml-output"
                            class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Converted YAML will appear here..."
                            readonly
                            spellcheck="false"
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                        Convert to YAML
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download .yaml
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

                {{-- Statistics Bar --}}
                <div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div id="stat-keys" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Top-level Keys</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-depth" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Max Depth</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-input-size" class="text-2xl font-bold text-light mb-1">0 B</div>
                            <div class="text-light-muted text-sm">JSON Size</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-output-size" class="text-2xl font-bold text-light mb-1">0 B</div>
                            <div class="text-light-muted text-sm">YAML Size</div>
                        </div>
                    </div>
                </div>

                {{-- Success/Error Notifications --}}
                <div id="success-notification" class="hidden p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm"></span>
                    </div>
                </div>

                <div id="error-notification" class="hidden p-3 rounded-lg bg-red-500/10 border border-red-500/30">
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
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant Conversion</h3>
                    <p class="text-light-muted text-sm">Convert JSON to YAML in milliseconds. Handles large files with complex nested structures effortlessly.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Configurable Output</h3>
                    <p class="text-light-muted text-sm">Customize indentation, string quoting, and array formatting to match your project's YAML conventions.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Your data never leaves your device — safe for sensitive configs.</p>
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
                            <span class="text-light font-medium">How do I convert JSON to YAML?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Paste your JSON data into the input field and click "Convert to YAML". The tool instantly converts your JSON to properly formatted YAML. You can then copy the result or download it as a .yaml file.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between JSON and YAML?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            JSON uses braces and brackets with strict syntax, while YAML uses indentation-based formatting that is more human-readable. YAML supports comments, multi-line strings, and anchors. YAML is commonly used for configuration files (Docker, Kubernetes, CI/CD), while JSON is preferred for APIs and data exchange.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does this tool handle nested JSON objects?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, the converter handles deeply nested JSON objects, arrays, mixed types, and complex data structures. All nesting is preserved accurately in the YAML output with proper indentation.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I customize the YAML indentation?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, you can choose between 2-space and 4-space indentation for the YAML output. The default is 2 spaces, which is the most common convention for YAML files.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my data secure when using this converter?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Absolutely. All conversion happens locally in your browser using JavaScript. Your data is never uploaded to any server. This means even sensitive configuration data can be safely converted without privacy concerns.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        // DOM Elements
        const jsonInput = document.getElementById('json-input');
        const yamlOutput = document.getElementById('yaml-output');
        const indentSize = document.getElementById('indent-size');
        const inlineShortArrays = document.getElementById('inline-short-arrays');
        const quoteStrings = document.getElementById('quote-strings');
        const btnConvert = document.getElementById('btn-convert');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const statsBar = document.getElementById('stats-bar');
        const statKeys = document.getElementById('stat-keys');
        const statDepth = document.getElementById('stat-depth');
        const statInputSize = document.getElementById('stat-input-size');
        const statOutputSize = document.getElementById('stat-output-size');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        // Sample Data
        const sampleJson = {
            "apiVersion": "apps/v1",
            "kind": "Deployment",
            "metadata": {
                "name": "my-app",
                "labels": {
                    "app": "my-app",
                    "version": "1.0.0"
                }
            },
            "spec": {
                "replicas": 3,
                "selector": {
                    "matchLabels": {
                        "app": "my-app"
                    }
                },
                "template": {
                    "metadata": {
                        "labels": {
                            "app": "my-app"
                        }
                    },
                    "spec": {
                        "containers": [
                            {
                                "name": "my-app",
                                "image": "my-app:1.0.0",
                                "ports": [
                                    { "containerPort": 8080 }
                                ],
                                "env": [
                                    { "name": "NODE_ENV", "value": "production" },
                                    { "name": "LOG_LEVEL", "value": "info" }
                                ],
                                "resources": {
                                    "limits": {
                                        "cpu": "500m",
                                        "memory": "128Mi"
                                    },
                                    "requests": {
                                        "cpu": "250m",
                                        "memory": "64Mi"
                                    }
                                }
                            }
                        ]
                    }
                }
            }
        };

        // ===== Utility Functions =====

        function formatBytes(bytes) {
            if (bytes === 0) return '0 B';
            const k = 1024;
            const sizes = ['B', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
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

        function getMaxDepth(obj, currentDepth = 0) {
            if (obj === null || typeof obj !== 'object') return currentDepth;
            let maxDepth = currentDepth;
            const values = Array.isArray(obj) ? obj : Object.values(obj);
            for (const value of values) {
                const depth = getMaxDepth(value, currentDepth + 1);
                if (depth > maxDepth) maxDepth = depth;
            }
            return maxDepth;
        }

        function getTopLevelKeys(data) {
            if (Array.isArray(data)) return data.length;
            if (typeof data === 'object' && data !== null) return Object.keys(data).length;
            return 0;
        }

        // ===== JSON to YAML Conversion =====

        function jsonToYaml(value, indent, currentIndent, options) {
            const indentStr = ' '.repeat(indent);
            const prefix = ' '.repeat(currentIndent);

            if (value === null) return 'null';
            if (value === undefined) return 'null';

            if (typeof value === 'boolean') return value ? 'true' : 'false';

            if (typeof value === 'number') {
                if (Number.isNaN(value)) return '.nan';
                if (!Number.isFinite(value)) return value > 0 ? '.inf' : '-.inf';
                return String(value);
            }

            if (typeof value === 'string') {
                // Check if string needs quoting
                if (options.quoteAll) {
                    return '"' + value.replace(/\\/g, '\\\\').replace(/"/g, '\\"').replace(/\n/g, '\\n') + '"';
                }

                // Auto-quote strings that could be misinterpreted
                const needsQuoting =
                    value === '' ||
                    value === 'true' || value === 'false' ||
                    value === 'null' || value === 'yes' || value === 'no' ||
                    value === 'on' || value === 'off' ||
                    value === 'True' || value === 'False' ||
                    value === 'Yes' || value === 'No' ||
                    value === 'NULL' || value === 'Null' ||
                    /^[0-9]/.test(value) ||
                    /^[-?:,\[\]{}#&*!|>'"%@`]/.test(value) ||
                    value.includes(': ') || value.includes(' #') ||
                    value.includes('\n') ||
                    /^\s|\s$/.test(value);

                if (needsQuoting) {
                    if (value.includes('\n')) {
                        // Use block scalar for multi-line strings
                        const lines = value.split('\n');
                        return '|\n' + lines.map(line => prefix + indentStr + line).join('\n');
                    }
                    return '"' + value.replace(/\\/g, '\\\\').replace(/"/g, '\\"') + '"';
                }

                return value;
            }

            if (Array.isArray(value)) {
                if (value.length === 0) return '[]';

                // Inline short arrays option
                if (options.inlineShort && value.length <= 5 && value.every(v => typeof v !== 'object' || v === null)) {
                    const items = value.map(v => {
                        if (v === null) return 'null';
                        if (typeof v === 'string') {
                            const needsQ = v === '' || /^[0-9]/.test(v) || ['true','false','null','yes','no'].includes(v.toLowerCase());
                            return needsQ ? '"' + v.replace(/"/g, '\\"') + '"' : v;
                        }
                        return String(v);
                    });
                    return '[' + items.join(', ') + ']';
                }

                const lines = value.map(item => {
                    if (typeof item === 'object' && item !== null && !Array.isArray(item)) {
                        const keys = Object.keys(item);
                        if (keys.length === 0) return prefix + '- {}';

                        let result = prefix + '- ' + keys[0] + ': ' + jsonToYaml(item[keys[0]], indent, currentIndent + indent + 2, options);
                        for (let i = 1; i < keys.length; i++) {
                            result += '\n' + prefix + '  ' + keys[i] + ': ' + jsonToYaml(item[keys[i]], indent, currentIndent + indent + 2, options);
                        }
                        return result;
                    }

                    const converted = jsonToYaml(item, indent, currentIndent + indent, options);
                    if (typeof item === 'object' && item !== null) {
                        return prefix + '-\n' + converted;
                    }
                    return prefix + '- ' + converted;
                });

                return '\n' + lines.join('\n');
            }

            if (typeof value === 'object') {
                const keys = Object.keys(value);
                if (keys.length === 0) return '{}';

                const lines = keys.map(key => {
                    const val = value[key];
                    const yamlKey = /^[a-zA-Z0-9_.-]+$/.test(key) ? key : '"' + key.replace(/"/g, '\\"') + '"';
                    const converted = jsonToYaml(val, indent, currentIndent + indent, options);

                    if (typeof val === 'object' && val !== null && converted.startsWith('\n')) {
                        return prefix + yamlKey + ':' + converted;
                    }

                    return prefix + yamlKey + ': ' + converted;
                });

                return '\n' + lines.join('\n');
            }

            return String(value);
        }

        function convert() {
            const input = jsonInput.value.trim();
            if (!input) {
                showError('Please enter some JSON to convert');
                return;
            }

            try {
                const data = JSON.parse(input);
                const indent = parseInt(indentSize.value);
                const options = {
                    inlineShort: inlineShortArrays.checked,
                    quoteAll: quoteStrings.checked
                };

                let yaml = jsonToYaml(data, indent, 0, options);

                // Remove leading newline for top-level objects/arrays
                if (yaml.startsWith('\n')) {
                    yaml = yaml.substring(1);
                }

                yamlOutput.value = yaml;

                // Update stats
                statKeys.textContent = getTopLevelKeys(data);
                statDepth.textContent = getMaxDepth(data);
                statInputSize.textContent = formatBytes(new Blob([input]).size);
                statOutputSize.textContent = formatBytes(new Blob([yaml]).size);
                statsBar.classList.remove('hidden');

                showSuccess('JSON converted to YAML successfully!');
            } catch (e) {
                showError('Invalid JSON: ' + e.message);
                statsBar.classList.add('hidden');
            }
        }

        function copyOutput() {
            const output = yamlOutput.value;
            if (!output) {
                showError('Nothing to copy. Convert some JSON first.');
                return;
            }

            navigator.clipboard.writeText(output).then(() => {
                const originalHTML = btnCopy.innerHTML;
                btnCopy.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                btnCopy.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => {
                    btnCopy.innerHTML = originalHTML;
                    btnCopy.classList.remove('text-green-400', 'border-green-400');
                }, 2000);
            }).catch(() => showError('Failed to copy to clipboard'));
        }

        function downloadOutput() {
            const output = yamlOutput.value;
            if (!output) {
                showError('Nothing to download. Convert some JSON first.');
                return;
            }

            const filename = 'converted-' + new Date().toISOString().split('T')[0] + '.yaml';
            const blob = new Blob([output], { type: 'text/yaml' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            showSuccess('Downloaded: ' + filename);
        }

        function loadSample() {
            jsonInput.value = JSON.stringify(sampleJson, null, 2);
            yamlOutput.value = '';
            statsBar.classList.add('hidden');
        }

        function clearAll() {
            jsonInput.value = '';
            yamlOutput.value = '';
            statsBar.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        }

        // ===== Event Listeners =====
        btnConvert.addEventListener('click', convert);
        btnCopy.addEventListener('click', copyOutput);
        btnDownload.addEventListener('click', downloadOutput);
        btnSample.addEventListener('click', loadSample);
        btnClear.addEventListener('click', clearAll);

        // Ctrl+Enter to convert
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                e.preventDefault();
                convert();
            }
        });
    })();
    </script>
    @endpush
</x-layout>
