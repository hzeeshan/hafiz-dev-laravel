<x-layout>
    <x-slot:title>Free Developer Tools Online | JSON, Base64, UUID & More | hafiz.dev</x-slot:title>
    <x-slot:description>Free online developer tools: JSON formatter, Base64 encoder, UUID generator, cron expression builder and more. 100% client-side, no signup required.</x-slot:description>
    <x-slot:keywords>developer tools, json formatter, base64 encoder, uuid generator, cron builder, online tools, free tools, web developer tools</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Free Developer Tools Online | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online developer tools: JSON formatter, Base64 encoder, UUID generator and more. 100% client-side, no signup required.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools') }}</x-slot:ogUrl>
    <x-slot:ogImage>{{ url('/images/og/tools.png') }}</x-slot:ogImage>

    @push('schemas')
        {{-- ItemList Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "ItemList",
            "name": "Free Developer Tools",
            "description": "Collection of free online developer tools by hafiz.dev",
            "url": "https://hafiz.dev/tools",
            "numberOfItems": {{ $tools->count() }},
            "itemListElement": [
                @foreach($tools as $index => $tool)
                {
                    "@@type": "ListItem",
                    "position": {{ $index + 1 }},
                    "item": {
                        "@@type": "SoftwareApplication",
                        "name": "{{ $tool->name }}",
                        "description": "{{ $tool->description }}",
                        "url": "https://hafiz.dev/tools/{{ $tool->slug }}",
                        "applicationCategory": "DeveloperApplication",
                        "offers": {
                            "@@type": "Offer",
                            "price": "0",
                            "priceCurrency": "USD"
                        }
                    }
                }@if(!$loop->last),@endif
                @endforeach
            ]
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
                }
            ]
        }
        </script>
    @endpush

    <!-- Override background pattern for tools pages - consistent with blog -->
    <style>
        body > div:first-of-type {
            background-image: none !important;
            background: #1e1e28;
        }
        .tool-card-wrapper {
            transition: opacity 150ms ease;
        }
        .tool-card-wrapper.hiding {
            opacity: 0;
        }
    </style>

    <div class="max-w-6xl mx-auto px-4 py-16 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="mb-6 text-sm" aria-label="Breadcrumb">
                <ol class="flex items-center gap-2 text-light-muted">
                    <li><a href="/" class="hover:text-gold transition-colors">Home</a></li>
                    <li><span class="text-gold/50">/</span></li>
                    <li class="text-gold">Tools</li>
                </ol>
            </nav>

            {{-- Hero Section --}}
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Free Developer Tools</h1>
                <p class="text-light-muted max-w-2xl mx-auto text-lg">
                    100% client-side tools for developers. No signup, no tracking, completely free.
                </p>
                <p class="text-light-muted/70 max-w-xl mx-auto mt-3 text-sm">
                    All tools run entirely in your browser. Your data never leaves your computer.
                </p>
            </div>

            {{-- Search Bar --}}
            <div class="mb-4">
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-light-muted/50 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input
                        type="text"
                        id="tools-search"
                        class="w-full bg-darkBg border border-gold/20 rounded-lg pl-12 pr-10 py-3 text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30"
                        placeholder="Search tools by name, description, or category..."
                        spellcheck="false"
                        autocomplete="off"
                    >
                    <button id="tools-search-clear" class="absolute right-3 top-1/2 -translate-y-1/2 text-light-muted/50 hover:text-light transition-colors hidden cursor-pointer" aria-label="Clear search">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            </div>

            {{-- Category Filter Pills --}}
            <div class="mb-4 flex flex-wrap gap-2">
                <button data-category="all" class="tools-filter-btn px-4 py-2 rounded-lg text-sm font-semibold bg-gold text-darkBg transition-all duration-200 cursor-pointer">All</button>
                <button data-category="converters" class="tools-filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:border-gold/50 hover:text-gold transition-all duration-200 cursor-pointer">Converters</button>
                <button data-category="text" class="tools-filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:border-gold/50 hover:text-gold transition-all duration-200 cursor-pointer">Text</button>
                <button data-category="developer" class="tools-filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:border-gold/50 hover:text-gold transition-all duration-200 cursor-pointer">Developer</button>
                <button data-category="generators" class="tools-filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:border-gold/50 hover:text-gold transition-all duration-200 cursor-pointer">Generators</button>
                <button data-category="security" class="tools-filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:border-gold/50 hover:text-gold transition-all duration-200 cursor-pointer">Security</button>
                <button data-category="calculators" class="tools-filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:border-gold/50 hover:text-gold transition-all duration-200 cursor-pointer">Calculators</button>
                <button data-category="design" class="tools-filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:border-gold/50 hover:text-gold transition-all duration-200 cursor-pointer">Design</button>
                <button data-category="images" class="tools-filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:border-gold/50 hover:text-gold transition-all duration-200 cursor-pointer">Images</button>
            </div>

            {{-- Results Counter --}}
            <div class="text-light-muted text-sm mb-4">
                Showing <span id="tools-result-count" class="text-gold font-semibold">{{ $tools->count() }}</span> of <span id="tools-total-count">{{ $tools->count() }}</span> tools
            </div>

            {{-- Tools Grid --}}
            <div id="tools-grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($tools as $tool)
                @php
                    $categoryMap = [
                        'Converter' => 'converters',
                        'Data' => 'converters',
                        'Text' => 'text',
                        'Text Fun' => 'text',
                        'Developer' => 'developer',
                        'Reference' => 'developer',
                        'Scheduling' => 'developer',
                        'JSON' => 'developer',
                        'Testing' => 'developer',
                        'Generators' => 'generators',
                        'Generator' => 'generators',
                        'Security' => 'security',
                        'Encoding' => 'security',
                        'Calculators' => 'calculators',
                        'Date/Time' => 'calculators',
                        'Design' => 'design',
                        'Images' => 'images',
                    ];
                    $displayCategory = $categoryMap[$tool->category] ?? 'developer';
                @endphp
                <a href="/tools/{{ $tool->slug }}"
                   class="tool-card-wrapper group block"
                   data-name="{{ strtolower($tool->name) }}"
                   data-description="{{ strtolower($tool->description) }}"
                   data-category="{{ $displayCategory }}"
                   data-db-category="{{ strtolower($tool->category) }}">
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
                        <div class="flex items-start justify-between mb-4">
                            <div class="text-3xl {{ $tool->slug === 'json-formatter' || $tool->slug === 'regex-tester' ? 'text-gold font-mono' : '' }}">{{ $tool->icon }}</div>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">{{ $tool->category }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-light mb-2 group-hover:text-gold transition-colors">{{ $tool->name }}</h3>
                        <p class="text-light-muted text-sm mb-4">{{ $tool->description }}</p>
                        <div class="flex items-center text-gold text-sm font-semibold group-hover:gap-2 transition-all">
                            <span>Use Tool</span>
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            {{-- No Results State --}}
            <div id="tools-no-results" class="hidden text-center py-16">
                <svg class="w-16 h-16 mx-auto mb-4 text-light-muted/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <p class="text-light-muted text-lg mb-2">No tools match your search.</p>
                <button id="tools-clear-filters" class="text-gold hover:text-gold-light text-sm font-medium transition-colors cursor-pointer">Clear filters</button>
            </div>

            {{-- Request Tool Section --}}
            <div class="mt-16 text-center">
                <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card max-w-2xl mx-auto">
                    <h2 class="text-xl font-bold text-light mb-3">Need a specific tool?</h2>
                    <p class="text-light-muted mb-6">
                        I'm building this tools collection based on what developers actually need.
                        Let me know what tool would help you most!
                    </p>
                    <a href="mailto:contact@hafiz.dev?subject=Tool%20Request"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Request a Tool
                    </a>
                </div>
            </div>

            {{-- Features Section --}}
            <div class="mt-16 grid md:grid-cols-3 gap-6">
                <div class="text-center p-6">
                    <div class="text-3xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Your data never touches any server.</p>
                </div>
                <div class="text-center p-6">
                    <div class="text-3xl mb-3">⚡</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Instant & Fast</h3>
                    <p class="text-light-muted text-sm">No loading, no waiting. Tools work instantly with no network latency.</p>
                </div>
                <div class="text-center p-6">
                    <div class="text-3xl mb-3">🆓</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Free Forever</h3>
                    <p class="text-light-muted text-sm">No signup, no limits, no ads. Just useful tools for developers.</p>
                </div>
            </div>

    </div>

    @push('scripts')
    <script>
    (function() {
        const searchInput = document.getElementById('tools-search');
        const clearBtn = document.getElementById('tools-search-clear');
        const filterBtns = document.querySelectorAll('.tools-filter-btn');
        const grid = document.getElementById('tools-grid');
        const cards = grid.querySelectorAll('.tool-card-wrapper');
        const resultCount = document.getElementById('tools-result-count');
        const totalCount = document.getElementById('tools-total-count');
        const noResults = document.getElementById('tools-no-results');

        let activeCategory = 'all';
        let searchQuery = '';
        let debounceTimer;

        function filterTools() {
            let visibleCount = 0;

            cards.forEach(card => {
                const name = card.dataset.name;
                const description = card.dataset.description;
                const category = card.dataset.category;
                const dbCategory = card.dataset.dbCategory;

                const matchesCategory = activeCategory === 'all' || category === activeCategory;
                const matchesSearch = !searchQuery ||
                    name.includes(searchQuery) ||
                    description.includes(searchQuery) ||
                    category.includes(searchQuery) ||
                    dbCategory.includes(searchQuery);

                if (matchesCategory && matchesSearch) {
                    card.style.display = '';
                    card.classList.remove('hiding');
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            resultCount.textContent = visibleCount;

            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
                grid.classList.add('hidden');
            } else {
                noResults.classList.add('hidden');
                grid.classList.remove('hidden');
            }
        }

        function setActiveFilter(category) {
            activeCategory = category;

            filterBtns.forEach(btn => {
                if (btn.dataset.category === category) {
                    btn.className = 'tools-filter-btn px-4 py-2 rounded-lg text-sm font-semibold bg-gold text-darkBg transition-all duration-200 cursor-pointer';
                } else {
                    btn.className = 'tools-filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-gold/30 text-light-muted hover:border-gold/50 hover:text-gold transition-all duration-200 cursor-pointer';
                }
            });

            // Update URL hash
            if (category === 'all') {
                history.replaceState(null, '', window.location.pathname);
            } else {
                history.replaceState(null, '', '#' + category);
            }

            filterTools();
        }

        function clearAll() {
            searchInput.value = '';
            searchQuery = '';
            clearBtn.classList.add('hidden');
            setActiveFilter('all');
        }

        // Search input with debounce
        searchInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            const val = this.value;

            clearBtn.classList.toggle('hidden', !val);

            debounceTimer = setTimeout(() => {
                searchQuery = val.toLowerCase().trim();
                filterTools();
            }, 200);
        });

        // Clear search button
        clearBtn.addEventListener('click', function() {
            searchInput.value = '';
            searchQuery = '';
            clearBtn.classList.add('hidden');
            searchInput.focus();
            filterTools();
        });

        // Filter pill clicks
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                setActiveFilter(this.dataset.category);
            });
        });

        // Clear filters button (no results state)
        document.getElementById('tools-clear-filters').addEventListener('click', clearAll);

        // Check URL hash on load
        const hash = window.location.hash.replace('#', '');
        if (hash) {
            const validCategories = Array.from(filterBtns).map(b => b.dataset.category);
            if (validCategories.includes(hash)) {
                setActiveFilter(hash);
            }
        }
    })();
    </script>
    @endpush
</x-layout>
