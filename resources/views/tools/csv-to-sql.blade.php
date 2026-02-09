<x-layout>
    <x-slot:title>CSV to SQL Converter - Convert CSV to SQL INSERT Statements Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online CSV to SQL converter. Generate SQL INSERT, CREATE TABLE, and UPDATE statements from CSV data instantly. Supports MySQL, PostgreSQL, SQLite, and SQL Server syntax.</x-slot:description>
    <x-slot:keywords>csv to sql, csv to sql converter, convert csv to sql, csv to sql insert, csv to sql online, csv to insert statements, csv to create table</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/csv-to-sql') }}</x-slot:canonical>

    <x-slot:ogTitle>CSV to SQL Converter - Convert CSV to SQL INSERT Statements Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online CSV to SQL converter. Generate INSERT, CREATE TABLE, and UPDATE statements from CSV data. Supports MySQL, PostgreSQL, SQLite, SQL Server.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/csv-to-sql') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "CSV to SQL Converter",
            "description": "Free online CSV to SQL converter. Generate SQL INSERT, CREATE TABLE, and UPDATE statements from CSV data.",
            "url": "https://hafiz.dev/tools/csv-to-sql",
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
                { "@@type": "ListItem", "position": 3, "name": "CSV to SQL Converter", "item": "https://hafiz.dev/tools/csv-to-sql" }
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
                    "name": "How do I convert CSV to SQL INSERT statements?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Paste your CSV data into the input field or upload a .csv file. Set your table name and choose your SQL dialect. The tool generates INSERT statements for each row, using the first row as column names."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Which SQL databases are supported?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The converter supports MySQL, PostgreSQL, SQLite, and SQL Server syntax. Each dialect uses the correct quoting style: backticks for MySQL, double quotes for PostgreSQL and SQLite, and square brackets for SQL Server."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I generate a CREATE TABLE statement from CSV?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Enable the 'Include CREATE TABLE' option to generate a CREATE TABLE statement with auto-detected column types (VARCHAR, INTEGER, DECIMAL, BOOLEAN, DATE) based on your CSV data."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does the converter auto-detect column types?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, the tool analyzes your data to detect column types including integers, decimals, booleans, dates, and text. These types are used in CREATE TABLE statements and for proper value quoting in INSERT statements."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I generate batch INSERT statements?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Choose between single INSERT per row or batch INSERT mode which groups multiple rows into a single INSERT statement. You can configure the batch size (e.g., 100, 500, or 1000 rows per statement)."
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
                    <li class="text-gold">CSV to SQL Converter</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">CSV to SQL Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Generate SQL INSERT, CREATE TABLE, and UPDATE statements from CSV data. Supports MySQL, PostgreSQL, SQLite, and SQL Server with auto-detected column types.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                {{-- Privacy Banner --}}
                <div class="mb-6 p-3 bg-green-500/10 border border-green-500/30 rounded-lg flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <span class="text-green-400 text-sm">Your data is processed entirely in your browser. Nothing is uploaded to any server.</span>
                </div>

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                        <div>
                            <label for="table-name" class="text-light font-semibold mb-2 block text-sm">Table Name</label>
                            <input type="text" id="table-name" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono focus:border-gold/50 focus:outline-none" value="my_table" spellcheck="false">
                        </div>
                        <div>
                            <label for="sql-dialect" class="text-light font-semibold mb-2 block text-sm">SQL Dialect</label>
                            <select id="sql-dialect" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="mysql">MySQL</option>
                                <option value="postgresql">PostgreSQL</option>
                                <option value="sqlite">SQLite</option>
                                <option value="sqlserver">SQL Server</option>
                            </select>
                        </div>
                        <div>
                            <label for="delimiter" class="text-light font-semibold mb-2 block text-sm">Delimiter</label>
                            <select id="delimiter" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value=",">Comma (,)</option>
                                <option value=";">Semicolon (;)</option>
                                <option value="\t">Tab</option>
                                <option value="|">Pipe (|)</option>
                            </select>
                        </div>
                        <div>
                            <label for="insert-mode" class="text-light font-semibold mb-2 block text-sm">Insert Mode</label>
                            <select id="insert-mode" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                <option value="single">Single INSERT per row</option>
                                <option value="batch">Batch INSERT</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="include-create" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Include CREATE TABLE</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="include-drop" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">DROP TABLE IF EXISTS</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="wrap-transaction" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Wrap in transaction</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="null-empty" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Empty values as NULL</span>
                        </label>
                    </div>
                </div>

                {{-- Input / Output --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    <div class="flex flex-col">
                        <div class="flex items-center justify-between mb-2">
                            <label for="csv-input" class="text-light font-semibold flex items-center gap-2">
                                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                CSV Input
                            </label>
                            <label class="px-3 py-1 border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-xs flex items-center gap-1 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Upload .csv
                                <input type="file" id="file-upload" accept=".csv,.tsv,.txt" class="hidden">
                            </label>
                        </div>
                        <textarea
                            id="csv-input"
                            class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="id,name,email,age,salary,active
1,John Smith,john@example.com,32,95000,true
2,Jane Doe,jane@example.com,28,82000,true
3,Bob Wilson,bob@example.com,45,105000,false"
                            spellcheck="false"
                        ></textarea>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path></svg>
                            SQL Output
                        </label>
                        <textarea
                            id="sql-output"
                            class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="SQL output will appear here..."
                            readonly
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Generate SQL
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download .sql
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
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                        <div class="text-center">
                            <div id="stat-rows" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Rows</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-cols" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Columns</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-statements" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Statements</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-dialect" class="text-2xl font-bold text-light mb-1">—</div>
                            <div class="text-light-muted text-sm">Dialect</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-size" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Output Size</div>
                        </div>
                    </div>
                </div>

                {{-- Detected Types Table --}}
                <div id="types-panel" class="hidden mt-4 bg-darkBg rounded-lg p-4 border border-gold/10">
                    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        Detected Column Types
                    </h3>
                    <div class="flex flex-wrap gap-2" id="types-list"></div>
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
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Multi-Dialect</h3>
                    <p class="text-light-muted text-sm">Generate SQL for MySQL, PostgreSQL, SQLite, and SQL Server. Each dialect uses correct quoting, data types, and syntax conventions.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Type Detection</h3>
                    <p class="text-light-muted text-sm">Automatically detects column types: INTEGER, DECIMAL, BOOLEAN, DATE, and VARCHAR. Used for CREATE TABLE and proper value quoting.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Batch & Transaction</h3>
                    <p class="text-light-muted text-sm">Single or batch INSERT mode, optional DROP TABLE, transaction wrapping, and empty-to-NULL conversion for production-ready SQL.</p>
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
                            <span class="text-light font-medium">How do I convert CSV to SQL INSERT statements?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Paste your CSV data or upload a .csv file, set your table name and dialect, then click "Generate SQL". The first row becomes column names, and each subsequent row becomes an INSERT statement with properly quoted values.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Which SQL databases are supported?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">MySQL (backtick quoting), PostgreSQL (double-quote quoting), SQLite (double-quote quoting), and SQL Server (square bracket quoting). Each uses correct data type mappings and syntax.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I generate a CREATE TABLE statement?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! Check "Include CREATE TABLE" and the tool generates a complete CREATE TABLE statement with auto-detected column types. It checks every value in each column to determine the best SQL type.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does the converter detect column types?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes. The tool scans all values in each column to detect: INTEGER (whole numbers), DECIMAL/NUMERIC (numbers with decimals), BOOLEAN (true/false), DATE (common date formats), and VARCHAR (everything else). The detected types are shown below the output.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I generate batch INSERT statements?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! Switch to "Batch INSERT" mode and all rows are grouped into a single INSERT with multiple value tuples. This is much faster for bulk imports than individual INSERT statements.</div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        const csvInput = document.getElementById('csv-input');
        const sqlOutput = document.getElementById('sql-output');
        const tableName = document.getElementById('table-name');
        const sqlDialect = document.getElementById('sql-dialect');
        const delimiterSel = document.getElementById('delimiter');
        const insertMode = document.getElementById('insert-mode');
        const includeCreate = document.getElementById('include-create');
        const includeDrop = document.getElementById('include-drop');
        const wrapTransaction = document.getElementById('wrap-transaction');
        const nullEmpty = document.getElementById('null-empty');
        const fileUpload = document.getElementById('file-upload');
        const btnConvert = document.getElementById('btn-convert');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const btnSample = document.getElementById('btn-sample');
        const btnClear = document.getElementById('btn-clear');
        const statsBar = document.getElementById('stats-bar');
        const typesPanel = document.getElementById('types-panel');
        const typesList = document.getElementById('types-list');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');
        const errorNotification = document.getElementById('error-notification');
        const errorMessage = document.getElementById('error-message');

        const sampleCSV = `id,name,email,age,salary,is_active,hire_date
1,John Smith,john@example.com,32,95000.50,true,2020-03-15
2,Jane Doe,jane@example.com,28,82000.00,true,2021-07-01
3,Bob Wilson,bob@example.com,45,105000.75,false,2018-11-20
4,Alice Chen,alice@example.com,35,112000.00,true,2019-06-10
5,Carlos García,carlos@example.com,29,88000.25,true,2022-01-05`;

        // ===== CSV Parser =====
        function parseCSV(text, delim) {
            const rows = [];
            let current = '', inQuotes = false, row = [];
            for (let i = 0; i < text.length; i++) {
                const ch = text[i], next = text[i + 1];
                if (inQuotes) {
                    if (ch === '"' && next === '"') { current += '"'; i++; }
                    else if (ch === '"') { inQuotes = false; }
                    else { current += ch; }
                } else {
                    if (ch === '"') { inQuotes = true; }
                    else if (ch === delim) { row.push(current.trim()); current = ''; }
                    else if (ch === '\n' || (ch === '\r' && next === '\n')) {
                        row.push(current.trim());
                        if (row.some(c => c !== '')) rows.push(row);
                        row = []; current = '';
                        if (ch === '\r') i++;
                    } else { current += ch; }
                }
            }
            row.push(current.trim());
            if (row.some(c => c !== '')) rows.push(row);
            return rows;
        }

        // ===== Type Detection =====
        function detectType(values) {
            const nonEmpty = values.filter(v => v !== '' && v !== null);
            if (nonEmpty.length === 0) return 'varchar';

            const isInt = nonEmpty.every(v => /^-?\d+$/.test(v));
            if (isInt) return 'integer';

            const isDec = nonEmpty.every(v => /^-?\d+\.\d+$/.test(v));
            if (isDec) return 'decimal';

            const isBool = nonEmpty.every(v => /^(true|false|0|1|yes|no)$/i.test(v));
            if (isBool) return 'boolean';

            const isDate = nonEmpty.every(v => /^\d{4}-\d{2}-\d{2}$/.test(v) || /^\d{2}\/\d{2}\/\d{4}$/.test(v));
            if (isDate) return 'date';

            return 'varchar';
        }

        // ===== Quoting =====
        function quoteIdentifier(name, dialect) {
            const clean = name.replace(/[^a-zA-Z0-9_]/g, '_');
            switch (dialect) {
                case 'mysql': return '`' + clean + '`';
                case 'sqlserver': return '[' + clean + ']';
                default: return '"' + clean + '"';
            }
        }

        function escapeString(val, dialect) {
            return val.replace(/'/g, "''");
        }

        function formatValue(val, type, dialect, emptyAsNull) {
            if (val === '' || val === null || val === undefined) {
                return emptyAsNull ? 'NULL' : "''";
            }
            switch (type) {
                case 'integer':
                case 'decimal':
                    return val;
                case 'boolean':
                    const boolVal = /^(true|1|yes)$/i.test(val);
                    if (dialect === 'mysql') return boolVal ? '1' : '0';
                    if (dialect === 'postgresql') return boolVal ? 'TRUE' : 'FALSE';
                    return boolVal ? '1' : '0';
                case 'date':
                    return "'" + escapeString(val, dialect) + "'";
                default:
                    return "'" + escapeString(val, dialect) + "'";
            }
        }

        function sqlType(type, dialect, maxLen) {
            const len = Math.max(maxLen || 50, 50);
            switch (type) {
                case 'integer':
                    if (dialect === 'sqlserver') return 'INT';
                    return 'INTEGER';
                case 'decimal':
                    if (dialect === 'sqlserver') return 'DECIMAL(12,2)';
                    if (dialect === 'mysql') return 'DECIMAL(12,2)';
                    return 'NUMERIC(12,2)';
                case 'boolean':
                    if (dialect === 'mysql') return 'TINYINT(1)';
                    if (dialect === 'postgresql') return 'BOOLEAN';
                    if (dialect === 'sqlserver') return 'BIT';
                    return 'INTEGER';
                case 'date':
                    return 'DATE';
                default:
                    if (dialect === 'sqlserver') return `NVARCHAR(${len})`;
                    return `VARCHAR(${len})`;
            }
        }

        // ===== Generate SQL =====
        function convert() {
            const input = csvInput.value.trim();
            if (!input) { showError('Please enter or paste CSV data'); return; }

            try {
                const delim = delimiterSel.value === '\\t' ? '\t' : delimiterSel.value;
                const rows = parseCSV(input, delim);
                if (rows.length < 2) { showError('CSV must have at least a header row and one data row'); return; }

                const headers = rows[0];
                const dataRows = rows.slice(1);
                const dialect = sqlDialect.value;
                const table = quoteIdentifier(tableName.value || 'my_table', dialect);
                const quotedCols = headers.map(h => quoteIdentifier(h, dialect));
                const emptyNull = nullEmpty.checked;

                // Detect types per column
                const types = headers.map((_, ci) => {
                    const colVals = dataRows.map(r => ci < r.length ? r[ci] : '');
                    return detectType(colVals);
                });

                // Max lengths for VARCHAR
                const maxLens = headers.map((_, ci) => {
                    return Math.max(...dataRows.map(r => (ci < r.length ? r[ci] : '').length), 1);
                });

                let sql = '';
                let stmtCount = 0;

                // Transaction start
                if (wrapTransaction.checked) {
                    sql += 'BEGIN TRANSACTION;\n\n';
                }

                // DROP TABLE
                if (includeDrop.checked) {
                    if (dialect === 'sqlserver') {
                        sql += `IF OBJECT_ID('${tableName.value || 'my_table'}', 'U') IS NOT NULL DROP TABLE ${table};\n\n`;
                    } else {
                        sql += `DROP TABLE IF EXISTS ${table};\n\n`;
                    }
                    stmtCount++;
                }

                // CREATE TABLE
                if (includeCreate.checked) {
                    sql += `CREATE TABLE ${table} (\n`;
                    const colDefs = headers.map((h, i) => {
                        return `  ${quotedCols[i]} ${sqlType(types[i], dialect, maxLens[i])}`;
                    });
                    sql += colDefs.join(',\n');
                    sql += '\n);\n\n';
                    stmtCount++;
                }

                // INSERT statements
                if (insertMode.value === 'batch') {
                    sql += `INSERT INTO ${table} (${quotedCols.join(', ')})\nVALUES\n`;
                    const valueParts = dataRows.map(row => {
                        const vals = headers.map((_, ci) => {
                            const val = ci < row.length ? row[ci] : '';
                            return formatValue(val, types[ci], dialect, emptyNull);
                        });
                        return `  (${vals.join(', ')})`;
                    });
                    sql += valueParts.join(',\n');
                    sql += ';\n';
                    stmtCount++;
                } else {
                    for (const row of dataRows) {
                        const vals = headers.map((_, ci) => {
                            const val = ci < row.length ? row[ci] : '';
                            return formatValue(val, types[ci], dialect, emptyNull);
                        });
                        sql += `INSERT INTO ${table} (${quotedCols.join(', ')}) VALUES (${vals.join(', ')});\n`;
                        stmtCount++;
                    }
                }

                // Transaction end
                if (wrapTransaction.checked) {
                    sql += '\nCOMMIT;\n';
                }

                sqlOutput.value = sql;

                // Stats
                document.getElementById('stat-rows').textContent = dataRows.length;
                document.getElementById('stat-cols').textContent = headers.length;
                document.getElementById('stat-statements').textContent = stmtCount;
                document.getElementById('stat-dialect').textContent = dialect === 'sqlserver' ? 'MSSQL' : dialect.charAt(0).toUpperCase() + dialect.slice(1);
                document.getElementById('stat-size').textContent = formatSize(sql.length);
                statsBar.classList.remove('hidden');

                // Show types
                const typeColors = { integer: 'text-blue-400 border-blue-400/30 bg-blue-400/10', decimal: 'text-cyan-400 border-cyan-400/30 bg-cyan-400/10', boolean: 'text-purple-400 border-purple-400/30 bg-purple-400/10', date: 'text-green-400 border-green-400/30 bg-green-400/10', varchar: 'text-yellow-400 border-yellow-400/30 bg-yellow-400/10' };
                typesList.innerHTML = headers.map((h, i) => {
                    const cls = typeColors[types[i]] || typeColors.varchar;
                    return `<span class="px-2.5 py-1 rounded-lg border text-xs font-mono ${cls}">${h}: ${types[i].toUpperCase()}</span>`;
                }).join('');
                typesPanel.classList.remove('hidden');

                showSuccess(`Generated ${stmtCount} SQL statements for ${dataRows.length} rows`);
            } catch (e) {
                showError('Error: ' + e.message);
            }
        }

        function formatSize(bytes) {
            if (bytes < 1024) return bytes + ' B';
            return (bytes / 1024).toFixed(1) + ' KB';
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

        // ===== Events =====
        btnConvert.addEventListener('click', convert);

        btnCopy.addEventListener('click', function() {
            const output = sqlOutput.value;
            if (!output) { showError('Nothing to copy'); return; }
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        });

        btnDownload.addEventListener('click', function() {
            const output = sqlOutput.value;
            if (!output) { showError('Nothing to download'); return; }
            const blob = new Blob([output], { type: 'text/sql;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = (tableName.value || 'data') + '.sql';
            document.body.appendChild(a); a.click();
            document.body.removeChild(a); URL.revokeObjectURL(url);
            showSuccess('SQL file downloaded');
        });

        btnSample.addEventListener('click', function() {
            csvInput.value = sampleCSV;
            sqlOutput.value = '';
            statsBar.classList.add('hidden');
            typesPanel.classList.add('hidden');
        });

        btnClear.addEventListener('click', function() {
            csvInput.value = ''; sqlOutput.value = '';
            statsBar.classList.add('hidden');
            typesPanel.classList.add('hidden');
            successNotification.classList.add('hidden');
            errorNotification.classList.add('hidden');
        });

        fileUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(evt) {
                csvInput.value = evt.target.result;
                sqlOutput.value = '';
                statsBar.classList.add('hidden');
                typesPanel.classList.add('hidden');
                showSuccess('File loaded: ' + file.name);
            };
            reader.readAsText(file);
            this.value = '';
        });

        let timer;
        csvInput.addEventListener('input', function() {
            clearTimeout(timer);
            timer = setTimeout(() => { if (csvInput.value.trim()) convert(); }, 500);
        });

        [sqlDialect, delimiterSel, insertMode, includeCreate, includeDrop, wrapTransaction, nullEmpty].forEach(el => {
            el.addEventListener('change', () => { if (csvInput.value.trim()) convert(); });
        });
        tableName.addEventListener('input', () => { clearTimeout(timer); timer = setTimeout(() => { if (csvInput.value.trim()) convert(); }, 500); });

        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
        });
    })();
    </script>
    @endpush
</x-layout>
