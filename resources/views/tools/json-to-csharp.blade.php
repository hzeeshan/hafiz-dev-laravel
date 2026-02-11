<x-layout>
    <x-slot:title>JSON to C# Class Generator - Convert JSON to C# Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online JSON to C# class generator. Convert JSON data to C# classes with proper types, nullable properties, and JsonProperty attributes instantly.</x-slot:description>
    <x-slot:keywords>json to c# class, json to csharp, convert json to c# class, json to c# converter, json to c# online, json to csharp class generator</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/json-to-csharp') }}</x-slot:canonical>

    <x-slot:ogTitle>JSON to C# Class Generator - Convert JSON to C# Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Convert JSON data to C# classes with proper types, nullable properties, and JsonProperty attributes instantly. Free online tool.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/json-to-csharp') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "JSON to C# Class Generator",
            "description": "Free online JSON to C# class generator. Convert JSON data to C# classes instantly.",
            "url": "https://hafiz.dev/tools/json-to-csharp",
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
                { "@@type": "ListItem", "position": 3, "name": "JSON to C#", "item": "https://hafiz.dev/tools/json-to-csharp" }
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
                    "name": "How do I convert JSON to C# classes?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Paste your JSON data into the input field and the tool instantly generates C# classes with properly typed properties. Nested objects become separate classes, and arrays are typed as List<T> or T[] depending on your settings."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does it generate JsonProperty attributes?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! You can optionally add [JsonProperty] attributes from Newtonsoft.Json or [JsonPropertyName] from System.Text.Json to map JSON property names to PascalCase C# properties."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How are nested JSON objects handled?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Each nested JSON object is extracted into its own C# class with a PascalCase name derived from the property key. This keeps your code clean and follows C# naming conventions."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does it support nullable types?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! When enabled, properties that can be null in the JSON are generated with nullable reference types (string?) following C# 8.0+ conventions. Value types with null values become nullable (int?, double?)."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I choose between List and array for collections?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! You can choose between List<T>, IList<T>, IEnumerable<T>, ICollection<T>, or T[] for collection types. The default is List<T> which is the most commonly used in C# applications."
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
                    <li class="text-gold">JSON to C#</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">JSON to C# Class Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Generate C# classes from JSON data instantly. Handles nested objects, arrays, nullable types, and JsonProperty attributes.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label for="root-name" class="text-light font-semibold mb-2 block text-sm">Root Class Name</label>
                            <input type="text" id="root-name" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono focus:border-gold/50 focus:outline-none" value="Root" spellcheck="false">
                        </div>
                        <div>
                            <label for="collection-type" class="text-light font-semibold mb-2 block text-sm">Collection Type</label>
                            <select id="collection-type" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="List">List&lt;T&gt;</option>
                                <option value="IList">IList&lt;T&gt;</option>
                                <option value="IEnumerable">IEnumerable&lt;T&gt;</option>
                                <option value="ICollection">ICollection&lt;T&gt;</option>
                                <option value="array">T[]</option>
                            </select>
                        </div>
                        <div>
                            <label for="json-lib" class="text-light font-semibold mb-2 block text-sm">JSON Library</label>
                            <select id="json-lib" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="none">None</option>
                                <option value="newtonsoft">Newtonsoft.Json</option>
                                <option value="system">System.Text.Json</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="opt-nullable" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Nullable reference types</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="opt-public" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Public classes</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="opt-getset" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">{ get; set; }</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="opt-namespace" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Wrap in namespace</span>
                        </label>
                    </div>
                </div>

                {{-- Input / Output --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    <div class="flex flex-col">
                        <div class="flex items-center justify-between mb-2">
                            <label for="json-input" class="text-light font-semibold flex items-center gap-2">
                                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                JSON Input
                            </label>
                            <label class="px-3 py-1 border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-xs flex items-center gap-1 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Upload .json
                                <input type="file" id="file-upload" accept=".json" class="hidden">
                            </label>
                        </div>
                        <textarea
                            id="json-input"
                            class="flex-1 min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder='Paste your JSON here...'
                            spellcheck="false"
                        ></textarea>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            C# Output
                        </label>
                        <textarea
                            id="csharp-output"
                            class="flex-1 min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="C# classes will appear here..."
                            readonly
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Generate Classes
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download .cs
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
                            <div id="stat-classes" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Classes</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-properties" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Properties</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-nested" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Nested Classes</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-lines" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Lines</div>
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
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Smart Type Inference</h3>
                    <p class="text-light-muted text-sm">Automatically maps JSON types to C# types: string, int, long, double, bool, DateTime, and nested object classes. Handles null values with nullable types.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">JSON Library Support</h3>
                    <p class="text-light-muted text-sm">Generate attributes for Newtonsoft.Json (<code class="bg-darkCard px-1 rounded">[JsonProperty]</code>) or System.Text.Json (<code class="bg-darkCard px-1 rounded">[JsonPropertyName]</code>).</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Configurable Output</h3>
                    <p class="text-light-muted text-sm">Choose collection types (List, IList, array), toggle nullable types, public/private access, auto-properties, and namespace wrapping.</p>
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
                            <span class="text-light font-medium">How do I convert JSON to C# classes?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Paste your JSON data into the input field and the tool instantly generates C# classes with properly typed properties. Nested objects become separate classes, and arrays are typed as List&lt;T&gt; or T[] depending on your settings.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does it generate JsonProperty attributes?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! You can optionally add [JsonProperty] attributes from Newtonsoft.Json or [JsonPropertyName] from System.Text.Json to map JSON property names to PascalCase C# properties.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How are nested JSON objects handled?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Each nested JSON object is extracted into its own C# class with a PascalCase name derived from the property key. This keeps your code clean and follows C# naming conventions.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does it support nullable types?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! When enabled, properties that can be null in the JSON are generated with nullable reference types (string?) following C# 8.0+ conventions. Value types with null values become nullable (int?, double?).</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I choose between List and array for collections?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! You can choose between List&lt;T&gt;, IList&lt;T&gt;, IEnumerable&lt;T&gt;, ICollection&lt;T&gt;, or T[] for collection types. The default is List&lt;T&gt; which is the most commonly used in C# applications.</div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        const jsonInput = document.getElementById('json-input');
        const csharpOutput = document.getElementById('csharp-output');
        const rootName = document.getElementById('root-name');
        const collectionType = document.getElementById('collection-type');
        const jsonLib = document.getElementById('json-lib');
        const optNullable = document.getElementById('opt-nullable');
        const optPublic = document.getElementById('opt-public');
        const optGetSet = document.getElementById('opt-getset');
        const optNamespace = document.getElementById('opt-namespace');
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

        const sampleJSON = `{
  "id": 1,
  "name": "John Smith",
  "email": "john@example.com",
  "age": 32,
  "is_active": true,
  "balance": 1250.75,
  "tags": ["developer", "laravel", "vue"],
  "address": {
    "street": "123 Main St",
    "city": "San Francisco",
    "state": "CA",
    "zip": "94105",
    "country": "US"
  },
  "projects": [
    {
      "id": 101,
      "title": "E-commerce Platform",
      "status": "completed",
      "budget": 15000
    },
    {
      "id": 102,
      "title": "Mobile App MVP",
      "status": "in_progress",
      "budget": 8500
    }
  ],
  "metadata": null,
  "scores": [98, 85, 92, 78],
  "created_at": "2024-01-15T10:30:00Z"
}`;

        let classes = {};
        let classCount = 0;
        let propertyCount = 0;
        let nestedCount = 0;

        function toPascalCase(str) {
            return str
                .replace(/[^a-zA-Z0-9_]/g, '_')
                .split('_')
                .filter(Boolean)
                .map(w => w.charAt(0).toUpperCase() + w.slice(1))
                .join('');
        }

        function getUniqueClassName(base) {
            let name = toPascalCase(base);
            if (!name) name = 'Item';
            if (classes[name] === undefined) return name;
            let i = 2;
            while (classes[name + i] !== undefined) i++;
            return name + i;
        }

        function isDateString(val) {
            if (typeof val !== 'string') return false;
            return /^\d{4}-\d{2}-\d{2}(T\d{2}:\d{2}:\d{2})?/.test(val);
        }

        function isInteger(val) {
            return typeof val === 'number' && Number.isInteger(val);
        }

        function isLong(val) {
            return typeof val === 'number' && Number.isInteger(val) && (val > 2147483647 || val < -2147483648);
        }

        function wrapCollection(innerType) {
            const ct = collectionType.value;
            if (ct === 'array') return innerType + '[]';
            return ct + '<' + innerType + '>';
        }

        function inferType(value, propertyName) {
            if (value === null) return { type: 'object', nullable: true };
            if (value === undefined) return { type: 'object', nullable: true };

            if (typeof value === 'string') {
                if (isDateString(value)) return { type: 'DateTime', nullable: false };
                return { type: 'string', nullable: false };
            }
            if (typeof value === 'boolean') return { type: 'bool', nullable: false };
            if (typeof value === 'number') {
                if (isLong(value)) return { type: 'long', nullable: false };
                if (isInteger(value)) return { type: 'int', nullable: false };
                return { type: 'double', nullable: false };
            }

            if (Array.isArray(value)) {
                if (value.length === 0) return { type: wrapCollection('object'), nullable: false };

                let elementType = null;
                let hasNull = false;

                for (const item of value) {
                    if (item === null) { hasNull = true; continue; }

                    if (typeof item === 'object' && !Array.isArray(item)) {
                        if (!elementType || elementType === 'object') {
                            const className = getUniqueClassName(propertyName || 'Item');
                            elementType = className;
                            classes[className] = {};
                            for (const key of Object.keys(item)) {
                                const childResult = inferType(item[key], key);
                                if (classes[className][key]) {
                                    // Merge: keep broader type
                                    const existing = classes[className][key];
                                    if (childResult.nullable) existing.nullable = true;
                                } else {
                                    classes[className][key] = childResult;
                                    propertyCount++;
                                }
                            }
                        } else {
                            // Merge additional object items into existing class
                            if (classes[elementType]) {
                                for (const key of Object.keys(item)) {
                                    if (!classes[elementType][key]) {
                                        classes[elementType][key] = inferType(item[key], key);
                                        propertyCount++;
                                    }
                                }
                            }
                        }
                    } else {
                        const childResult = inferType(item, propertyName);
                        elementType = childResult.type;
                    }
                }

                return { type: wrapCollection(elementType || 'object'), nullable: false };
            }

            if (typeof value === 'object') {
                const className = getUniqueClassName(propertyName || 'Object');
                classes[className] = {};
                nestedCount++;

                for (const key of Object.keys(value)) {
                    classes[className][key] = inferType(value[key], key);
                    propertyCount++;
                }

                return { type: className, nullable: false };
            }

            return { type: 'object', nullable: true };
        }

        function buildClass(name, props) {
            const access = optPublic.checked ? 'public' : 'internal';
            const getset = optGetSet.checked ? ' { get; set; }' : ';';
            const lib = jsonLib.value;
            const nullable = optNullable.checked;
            let result = '';

            result += access + ' class ' + name + '\n{\n';

            for (const [key, info] of Object.entries(props)) {
                const propName = toPascalCase(key);
                let typeName = info.type;

                // Add nullable marker
                if (info.nullable && nullable) {
                    if (['int', 'long', 'double', 'bool', 'DateTime'].includes(typeName)) {
                        typeName += '?';
                    } else if (typeName === 'string' || typeName === 'object') {
                        typeName += '?';
                    }
                }

                // JSON attribute
                if (lib === 'newtonsoft' && key !== propName) {
                    result += '    [JsonProperty("' + key + '")]\n';
                } else if (lib === 'system' && key !== propName) {
                    result += '    [JsonPropertyName("' + key + '")]\n';
                }

                result += '    public ' + typeName + ' ' + propName + getset + '\n\n';
            }

            // Remove trailing empty line
            if (result.endsWith('\n\n')) {
                result = result.slice(0, -1);
            }

            result += '}\n';
            return result;
        }

        function convert() {
            const input = jsonInput.value.trim();
            if (!input) { showError('Please enter JSON data'); return; }

            try {
                const parsed = JSON.parse(input);

                classes = {};
                classCount = 0;
                propertyCount = 0;
                nestedCount = 0;

                const rn = toPascalCase(rootName.value) || 'Root';

                // Handle root
                if (Array.isArray(parsed)) {
                    const arrType = inferType(parsed, rn);
                    // Create a wrapper
                    classes['__root_array__'] = arrType;
                } else if (typeof parsed === 'object' && parsed !== null) {
                    classes[rn] = {};
                    for (const key of Object.keys(parsed)) {
                        classes[rn][key] = inferType(parsed[key], key);
                        propertyCount++;
                    }
                } else {
                    showError('JSON must be an object or array');
                    return;
                }

                // Build output
                const lib = jsonLib.value;
                let output = '';

                // Using statements
                if (lib === 'newtonsoft') {
                    output += 'using Newtonsoft.Json;\n\n';
                } else if (lib === 'system') {
                    output += 'using System.Text.Json.Serialization;\n\n';
                }

                // Namespace
                const useNamespace = optNamespace.checked;
                if (useNamespace) {
                    output += 'namespace MyApp.Models;\n\n';
                }

                // Output nested classes first
                const keys = Object.keys(classes);
                for (const name of keys) {
                    if (name === '__root_array__') continue;
                    if (name === rn) continue;
                    output += buildClass(name, classes[name]);
                    output += '\n';
                    classCount++;
                }

                // Root class
                if (classes[rn]) {
                    output += buildClass(rn, classes[rn]);
                    classCount++;
                }

                // Root array alias note
                if (classes['__root_array__']) {
                    output += '// Root is an array: ' + classes['__root_array__'].type + '\n';
                    classCount++;
                }

                csharpOutput.value = output.trimEnd();

                // Stats
                document.getElementById('stat-classes').textContent = classCount;
                document.getElementById('stat-properties').textContent = propertyCount;
                document.getElementById('stat-nested').textContent = nestedCount;
                document.getElementById('stat-lines').textContent = output.trimEnd().split('\n').length;
                statsBar.classList.remove('hidden');

                showSuccess('Generated ' + classCount + ' class' + (classCount !== 1 ? 'es' : '') + ' with ' + propertyCount + ' properties');
            } catch (e) {
                showError('Invalid JSON: ' + e.message);
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
            const output = csharpOutput.value;
            if (!output) { showError('Nothing to copy'); return; }
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        });

        btnDownload.addEventListener('click', function() {
            const output = csharpOutput.value;
            if (!output) { showError('Nothing to download'); return; }
            const blob = new Blob([output], { type: 'text/plain;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = (toPascalCase(rootName.value) || 'Root') + '.cs';
            document.body.appendChild(a); a.click();
            document.body.removeChild(a); URL.revokeObjectURL(url);
            showSuccess('C# file downloaded');
        });

        btnSample.addEventListener('click', function() {
            jsonInput.value = sampleJSON;
            csharpOutput.value = '';
            statsBar.classList.add('hidden');
        });

        btnClear.addEventListener('click', function() {
            jsonInput.value = ''; csharpOutput.value = '';
            statsBar.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        });

        fileUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(evt) {
                jsonInput.value = evt.target.result;
                csharpOutput.value = '';
                statsBar.classList.add('hidden');
                showSuccess('File loaded: ' + file.name);
            };
            reader.readAsText(file);
            this.value = '';
        });

        let timer;
        jsonInput.addEventListener('input', function() {
            clearTimeout(timer);
            timer = setTimeout(() => { if (jsonInput.value.trim()) convert(); }, 500);
        });

        [collectionType, jsonLib, optNullable, optPublic, optGetSet, optNamespace].forEach(el => {
            el.addEventListener('change', () => { if (jsonInput.value.trim()) convert(); });
        });
        rootName.addEventListener('input', () => { clearTimeout(timer); timer = setTimeout(() => { if (jsonInput.value.trim()) convert(); }, 500); });

        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
        });
    })();
    </script>
    @endpush
</x-layout>
