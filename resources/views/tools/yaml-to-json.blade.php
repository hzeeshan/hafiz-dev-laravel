<x-layout>
    <x-slot:title>YAML to JSON Converter - Convert YAML to JSON Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online YAML to JSON converter. Convert YAML configuration files to JSON format instantly in your browser. Supports nested objects, arrays, and complex structures. 100% client-side - your data never leaves your browser.</x-slot:description>
    <x-slot:keywords>yaml to json, yaml to json converter, convert yaml to json, yaml json converter, yaml to json online, yaml2json, parse yaml to json</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/yaml-to-json') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>YAML to JSON Converter - Convert YAML to JSON Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online YAML to JSON converter. Convert YAML to JSON format instantly in your browser. 100% client-side - your data never leaves your browser.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/yaml-to-json') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- SoftwareApplication Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "YAML to JSON Converter",
            "description": "Free online YAML to JSON converter. Convert YAML configuration files to JSON format instantly. Supports nested objects, arrays, and complex structures.",
            "url": "https://hafiz.dev/tools/yaml-to-json",
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
                    "name": "YAML to JSON Converter",
                    "item": "https://hafiz.dev/tools/yaml-to-json"
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
                    "name": "How do I convert YAML to JSON?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Paste your YAML data into the input field and click 'Convert to JSON'. The tool instantly parses your YAML and outputs valid, formatted JSON. You can then copy the result or download it as a .json file."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Why would I convert YAML to JSON?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Common reasons include: using YAML config data with JSON-only APIs, importing Kubernetes or Docker Compose configs into tools that require JSON, debugging YAML syntax by viewing the equivalent JSON structure, or migrating configuration between formats."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does this tool validate my YAML syntax?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, the converter validates your YAML during parsing. If there are syntax errors like incorrect indentation, missing colons, or invalid characters, it will show a clear error message pointing to the issue."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does it support multi-document YAML files?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, if your YAML contains multiple documents separated by ---, the converter will parse the first document by default. For multi-document files, each document is converted separately."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my data secure when using this converter?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Absolutely. All conversion happens locally in your browser using JavaScript. Your data is never uploaded to any server. This means even sensitive configuration files with secrets or credentials can be safely converted."
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
                    <li class="text-gold">YAML to JSON Converter</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">YAML to JSON Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert YAML to JSON format instantly. Paste your Kubernetes configs, Docker Compose files, CI/CD pipelines, or any YAML data.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <x-tool-privacy-banner />

                {{-- Options Panel --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <label for="json-indent" class="text-light font-semibold mb-2 block text-sm">JSON Indentation</label>
                            <select id="json-indent" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="2">2 Spaces (default)</option>
                                <option value="4">4 Spaces</option>
                                <option value="tab">Tab</option>
                                <option value="0">Minified (no whitespace)</option>
                            </select>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="sort-keys" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Sort Keys Alphabetically</span>
                            </label>
                        </div>
                        <div class="flex items-end pb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="strip-comments" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                                <span class="text-sm text-light-muted">Strip YAML Comments</span>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Editor Area --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    {{-- Input --}}
                    <div class="flex flex-col">
                        <label for="yaml-input" class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            YAML Input
                        </label>
                        <textarea
                            id="yaml-input"
                            class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Paste your YAML here...

Example:
apiVersion: apps/v1
kind: Deployment
metadata:
  name: my-app
  labels:
    app: my-app"
                            spellcheck="false"
                        ></textarea>
                    </div>

                    {{-- Output --}}
                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            JSON Output
                        </label>
                        <div id="json-output-wrapper" class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm overflow-auto">
                            <pre id="output-pre" class="whitespace-pre-wrap break-words"><code id="output-code" class="text-light-muted">Converted JSON will appear here...</code></pre>
                        </div>
                        {{-- Hidden textarea for raw value --}}
                        <textarea id="json-output-raw" class="hidden"></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                        Convert to JSON
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download .json
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
                            <div class="text-light-muted text-sm">YAML Size</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-output-size" class="text-2xl font-bold text-light mb-1">0 B</div>
                            <div class="text-light-muted text-sm">JSON Size</div>
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
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">YAML Validation</h3>
                    <p class="text-light-muted text-sm">Validates your YAML syntax during conversion. Get clear error messages with line numbers if something is wrong.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Syntax Highlighted Output</h3>
                    <p class="text-light-muted text-sm">JSON output is syntax highlighted with color-coded keys, strings, numbers, and booleans for easy reading.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Your config files with secrets and credentials never leave your device.</p>
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
                            <span class="text-light font-medium">How do I convert YAML to JSON?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Paste your YAML data into the input field and click "Convert to JSON". The tool instantly parses your YAML and outputs valid, formatted JSON. You can then copy the result or download it as a .json file.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Why would I convert YAML to JSON?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Common reasons include: using YAML config data with JSON-only APIs, importing Kubernetes or Docker Compose configs into tools that require JSON, debugging YAML syntax by viewing the equivalent JSON structure, or migrating configuration between formats.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does this tool validate my YAML syntax?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, the converter validates your YAML during parsing. If there are syntax errors like incorrect indentation, missing colons, or invalid characters, it will show a clear error message pointing to the issue.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does it support multi-document YAML files?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Yes, if your YAML contains multiple documents separated by <code class="bg-darkCard px-1 rounded">---</code>, the converter will parse the first document by default. For multi-document files, each document is converted separately.
                        </div>
                    </details>

                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my data secure when using this converter?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">
                            Absolutely. All conversion happens locally in your browser using JavaScript. Your data is never uploaded to any server. This means even sensitive configuration files with secrets or credentials can be safely converted.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    {{-- js-yaml library for YAML parsing --}}
    <script src="https://cdn.jsdelivr.net/npm/js-yaml@4.1.0/dist/js-yaml.min.js"></script>

    <script>
    (function() {
        // DOM Elements
        const yamlInput = document.getElementById('yaml-input');
        const outputCode = document.getElementById('output-code');
        const jsonOutputRaw = document.getElementById('json-output-raw');
        const jsonIndent = document.getElementById('json-indent');
        const sortKeys = document.getElementById('sort-keys');
        const stripComments = document.getElementById('strip-comments');
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

        // Sample YAML
        const sampleYaml = `# Kubernetes Deployment Configuration
apiVersion: apps/v1
kind: Deployment
metadata:
  name: my-app
  labels:
    app: my-app
    version: "1.0.0"
spec:
  replicas: 3
  selector:
    matchLabels:
      app: my-app
  template:
    metadata:
      labels:
        app: my-app
    spec:
      containers:
        - name: my-app
          image: my-app:1.0.0
          ports:
            - containerPort: 8080
          env:
            - name: NODE_ENV
              value: production
            - name: LOG_LEVEL
              value: info
          resources:
            limits:
              cpu: "500m"
              memory: "128Mi"
            requests:
              cpu: "250m"
              memory: "64Mi"`;

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

        function sortObjectKeys(obj) {
            if (Array.isArray(obj)) {
                return obj.map(item => sortObjectKeys(item));
            }
            if (obj !== null && typeof obj === 'object') {
                const sorted = {};
                Object.keys(obj).sort().forEach(key => {
                    sorted[key] = sortObjectKeys(obj[key]);
                });
                return sorted;
            }
            return obj;
        }

        // ===== Syntax Highlighting =====

        function syntaxHighlight(json) {
            if (typeof json !== 'string') {
                json = JSON.stringify(json, null, 2);
            }

            json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');

            return json.replace(
                /("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g,
                function(match) {
                    let cls = 'text-emerald-400'; // number
                    if (/^"/.test(match)) {
                        if (/:$/.test(match)) {
                            cls = 'text-gold'; // key
                            match = match.slice(0, -1) + '<span class="text-light">:</span>';
                        } else {
                            cls = 'text-sky-400'; // string
                        }
                    } else if (/true|false/.test(match)) {
                        cls = 'text-purple-400'; // boolean
                    } else if (/null/.test(match)) {
                        cls = 'text-light-muted'; // null
                    }
                    return '<span class="' + cls + '">' + match + '</span>';
                }
            );
        }

        // ===== Core Conversion =====

        function convert() {
            const input = yamlInput.value.trim();
            if (!input) {
                showError('Please enter some YAML to convert');
                return;
            }

            try {
                let data = jsyaml.load(input);

                // Sort keys if enabled
                if (sortKeys.checked) {
                    data = sortObjectKeys(data);
                }

                // Get indent setting
                let indentValue = jsonIndent.value;
                let jsonString;

                if (indentValue === '0') {
                    jsonString = JSON.stringify(data);
                } else if (indentValue === 'tab') {
                    jsonString = JSON.stringify(data, null, '\t');
                } else {
                    jsonString = JSON.stringify(data, null, parseInt(indentValue));
                }

                // Store raw value
                jsonOutputRaw.value = jsonString;

                // Apply syntax highlighting
                outputCode.innerHTML = syntaxHighlight(jsonString);

                // Update stats
                statKeys.textContent = getTopLevelKeys(data);
                statDepth.textContent = getMaxDepth(data);
                statInputSize.textContent = formatBytes(new Blob([input]).size);
                statOutputSize.textContent = formatBytes(new Blob([jsonString]).size);
                statsBar.classList.remove('hidden');

                showSuccess('YAML converted to JSON successfully!');
            } catch (e) {
                let errorMsg = 'Invalid YAML: ' + e.message;
                if (e.mark) {
                    errorMsg = `YAML error at line ${e.mark.line + 1}, column ${e.mark.column + 1}: ${e.reason}`;
                }
                showError(errorMsg);
                statsBar.classList.add('hidden');
            }
        }

        function copyOutput() {
            const output = jsonOutputRaw.value;
            if (!output) {
                showError('Nothing to copy. Convert some YAML first.');
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
            const output = jsonOutputRaw.value;
            if (!output) {
                showError('Nothing to download. Convert some YAML first.');
                return;
            }

            const filename = 'converted-' + new Date().toISOString().split('T')[0] + '.json';
            const blob = new Blob([output], { type: 'application/json' });
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
            yamlInput.value = sampleYaml;
            jsonOutputRaw.value = '';
            outputCode.innerHTML = '<span class="text-light-muted">Converted JSON will appear here...</span>';
            statsBar.classList.add('hidden');
        }

        function clearAll() {
            yamlInput.value = '';
            jsonOutputRaw.value = '';
            outputCode.innerHTML = '<span class="text-light-muted">Converted JSON will appear here...</span>';
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
