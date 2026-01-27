<x-layout>
    <x-slot:title>Servizi di Sviluppo Web in Italia | Hafiz Riaz</x-slot:title>
    <x-slot:description>Servizi professionali di sviluppo web, Laravel, Vue.js, e-commerce e automazione per aziende in tutta Italia. Milano, Roma, Bologna, Firenze, Napoli, Genova e Torino.</x-slot:description>
    <x-slot:keywords>sviluppatore web italia, sviluppatore laravel italia, sviluppo software italia, freelance sviluppatore, consulenza IT italia, sviluppo ecommerce italia</x-slot:keywords>
    <x-slot:canonical>{{ route('it.servizi') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Sviluppatore Web Freelance in Italia | Servizi di Sviluppo Software</x-slot:ogTitle>
    <x-slot:ogDescription>Servizi professionali di sviluppo web, Laravel, Vue.js, e-commerce e automazione per aziende in tutta Italia.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ route('it.servizi') }}</x-slot:ogUrl>
    <x-slot:ogImage>{{ asset('profile-photo.png') }}</x-slot:ogImage>

    @push('head')
        {{-- Hreflang Tags --}}
        <link rel="alternate" hreflang="en" href="https://hafiz.dev/" />
        <link rel="alternate" hreflang="it" href="https://hafiz.dev/it/servizi" />
        <link rel="alternate" hreflang="x-default" href="https://hafiz.dev/" />

        {{-- Open Graph Locale --}}
        <meta property="og:locale" content="it_IT" />

        <style>
            .collapsible-content {
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease-out;
            }
            .collapsible-content.expanded {
                max-height: 2000px;
            }
            .collapse-arrow {
                transition: transform 0.3s ease;
                display: inline-block;
            }
            .collapse-arrow.rotated {
                transform: rotate(180deg);
            }
        </style>
    @endpush

    @push('schemas')
        @php
            // ItemList Schema for services
            $itemListSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'ItemList',
                'name' => 'Servizi di Sviluppo Web in Italia',
                'description' => 'Servizi professionali di sviluppo web per aziende italiane',
                'numberOfItems' => count($services),
                'itemListElement' => collect($services)->values()->map(function ($service, $index) {
                    return [
                        '@type' => 'ListItem',
                        'position' => $index + 1,
                        'name' => $service['name_it'],
                        'description' => $service['description'],
                    ];
                })->toArray(),
            ];

            // CollectionPage Schema
            $collectionPageSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'CollectionPage',
                'name' => 'Servizi di Sviluppo Web in Italia',
                'description' => 'Servizi professionali di sviluppo web, Laravel, Vue.js, e-commerce e automazione',
                'url' => route('it.servizi'),
                'author' => [
                    '@type' => 'Person',
                    '@id' => 'https://hafiz.dev/#person',
                    'name' => 'Hafiz Riaz',
                ],
                'mainEntity' => [
                    '@type' => 'ItemList',
                    'numberOfItems' => $totalPages,
                ],
            ];

            // LocalBusiness Schema
            $localBusinessSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'ProfessionalService',
                'name' => 'Hafiz Riaz - Sviluppatore Web Freelance',
                'image' => 'https://hafiz.dev/profile-photo.png',
                'url' => route('it.servizi'),
                'telephone' => $shared['phone'],
                'email' => $shared['email'],
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => $shared['base_location'],
                    'addressRegion' => 'Piemonte',
                    'addressCountry' => 'IT',
                ],
                'priceRange' => $shared['price_range'],
                'openingHoursSpecification' => [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => $shared['working_hours']['days'],
                    'opens' => $shared['working_hours']['opens'],
                    'closes' => $shared['working_hours']['closes'],
                ],
                'areaServed' => array_merge(
                    array_map(fn($city) => ['@type' => 'City', 'name' => $city['name']], $cities),
                    [['@type' => 'Country', 'name' => 'Italia']]
                ),
                'hasOfferCatalog' => [
                    '@type' => 'OfferCatalog',
                    'name' => 'Servizi di Sviluppo Web',
                    'itemListElement' => collect($services)->map(fn($s) => [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => $s['name_it'],
                        ],
                    ])->toArray(),
                ],
            ];

            // BreadcrumbList Schema
            $breadcrumbSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Home',
                        'item' => 'https://hafiz.dev',
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'Servizi Italia',
                        'item' => route('it.servizi'),
                    ],
                ],
            ];
        @endphp

        <script type="application/ld+json">{!! json_encode($itemListSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
        <script type="application/ld+json">{!! json_encode($collectionPageSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
        <script type="application/ld+json">{!! json_encode($localBusinessSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
        <script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
    @endpush

    @php
        // Service icons mapping
        $serviceIcons = [
            'web-developer' => '🌐',
            'laravel-developer' => '⚡',
            'vuejs-developer' => '🎨',
            'ecommerce' => '🛒',
            'web-app' => '💻',
            'automation' => '🤖',
            'software-gestionale' => '🏢',
            'consulenza-it' => '🎯',
        ];

        // Short descriptions for cards
        $serviceDescriptions = [
            'web-developer' => 'Siti web professionali, veloci e ottimizzati per i motori di ricerca.',
            'laravel-developer' => 'Applicazioni web robuste e scalabili con il framework PHP più popolare.',
            'vuejs-developer' => 'Interfacce utente moderne e reattive per applicazioni web veloci.',
            'ecommerce' => 'Negozi online completi con pagamenti sicuri e gestione spedizioni.',
            'web-app' => 'Software personalizzato per digitalizzare i processi aziendali.',
            'automation' => 'Automatizza attività ripetitive per risparmiare tempo e ridurre errori.',
            'software-gestionale' => 'ERP, CRM e gestionali personalizzati per la tua azienda.',
            'consulenza-it' => 'Analisi, architettura e consulenza tecnica per i tuoi progetti.',
        ];
    @endphp

    <div class="relative z-10">
        <!-- Hero Section -->
        <section class="min-h-[60vh] flex items-center justify-center px-4 pt-16 pb-12">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-lg md:text-xl text-gold mb-3 font-medium">
                    Sviluppatore Freelance
                </p>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-light mb-6 leading-tight">
                    Servizi di Sviluppo Web in Italia
                </h1>

                <p class="text-base md:text-lg text-light-muted max-w-2xl mx-auto mb-8 leading-relaxed">
                    Offro servizi professionali di sviluppo web, software e automazione per aziende di ogni dimensione.
                    Basato a Torino, lavoro con clienti in tutta Italia.
                </p>

                <!-- Stats -->
                <div class="flex flex-wrap items-center justify-center gap-4 mb-8">
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-gold/10 border border-gold/30 rounded-full">
                        <span class="text-gold font-bold">{{ $shared['experience_years'] }}</span>
                        <span class="text-light-muted text-sm">Anni di Esperienza</span>
                    </span>
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-gold/10 border border-gold/30 rounded-full">
                        <span class="text-gold font-bold">{{ count($services) }}</span>
                        <span class="text-light-muted text-sm">Servizi Offerti</span>
                    </span>
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-gold/10 border border-gold/30 rounded-full">
                        <span class="text-gold font-bold">{{ count($cities) + 1 }}</span>
                        <span class="text-light-muted text-sm">Città Servite</span>
                    </span>
                </div>

                <!-- CTA Button -->
                <a href="#contact"
                    class="inline-block px-8 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5 text-lg">
                    Richiedi un Preventivo Gratuito
                </a>
            </div>
        </section>

        <!-- Services Section -->
        <section class="py-16 px-4 bg-darkBg/50" id="servizi">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-light mb-4">I Miei Servizi</h2>
                    <p class="text-light-muted max-w-2xl mx-auto">
                        Soluzioni digitali complete per far crescere la tua attività online.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($services as $key => $service)
                        <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 group">
                            <div class="text-3xl mb-3">{{ $serviceIcons[$key] ?? '📦' }}</div>
                            <h3 class="text-lg font-bold text-light mb-2">
                                {{ $service['name_it'] }}
                            </h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                {{ $serviceDescriptions[$key] ?? $service['description'] }}
                            </p>

                            <!-- Cities for this service -->
                            <button onclick="toggleCollapse('service-{{ $key }}')"
                                    class="w-full flex items-center justify-between text-sm text-gold hover:text-gold-light transition-colors cursor-pointer">
                                <span>{{ count($cities) }} città disponibili</span>
                                <span id="arrow-service-{{ $key }}" class="collapse-arrow">▼</span>
                            </button>

                            <div id="service-{{ $key }}" class="collapsible-content mt-3 pt-3 border-t border-gold/20">
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($cities as $cityKey => $city)
                                        @php
                                            $slug = $service['slug_prefix'] . '-' . $cityKey;
                                            $pageExists = in_array($slug, $pageSlugs);
                                        @endphp
                                        @if ($pageExists)
                                            <a href="{{ route('it.local-seo', $slug) }}"
                                               class="text-xs px-2 py-1 bg-gold/10 text-gold rounded hover:bg-gold/20 transition-colors">
                                                {{ $city['name'] }}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Cities Section -->
        <section class="py-16 px-4" id="citta">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-light mb-4">Dove Lavoro</h2>
                    <p class="text-light-muted max-w-2xl mx-auto">
                        Basato a Torino, offro i miei servizi in tutta Italia. Lavoro principalmente da remoto ma sono disponibile per incontri di persona.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Torino (Base) -->
                    <div class="bg-gradient-card p-6 rounded-xl border-2 border-gold/40 shadow-dark-card relative overflow-hidden">
                        <div class="absolute top-0 right-0 bg-gold text-darkBg text-xs font-bold px-3 py-1 rounded-bl-lg">
                            Sede Principale
                        </div>
                        <div class="text-3xl mb-3">📍</div>
                        <h3 class="text-lg font-bold text-light mb-1">Torino</h3>
                        <p class="text-light-muted text-sm mb-3">Piemonte</p>
                        <a href="{{ route('it.web-developer-torino') }}"
                           class="text-gold text-sm hover:text-gold-light transition-colors">
                            Sviluppatore Web Torino →
                        </a>
                    </div>

                    <!-- Other Cities -->
                    @foreach ($cities as $key => $city)
                        <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 group">
                            <div class="text-3xl mb-3">🏙️</div>
                            <h3 class="text-lg font-bold text-light mb-1">
                                {{ $city['name'] }}
                            </h3>
                            <p class="text-light-muted text-sm mb-3">{{ $city['region'] }}</p>

                            <!-- Services for this city -->
                            <button onclick="toggleCollapse('city-{{ $key }}')"
                                    class="w-full flex items-center justify-between text-sm text-gold hover:text-gold-light transition-colors cursor-pointer">
                                <span>{{ count($services) }} servizi</span>
                                <span id="arrow-city-{{ $key }}" class="collapse-arrow">▼</span>
                            </button>

                            <div id="city-{{ $key }}" class="collapsible-content mt-3 pt-3 border-t border-gold/20">
                                <div class="space-y-1">
                                    @foreach ($services as $serviceKey => $service)
                                        @php
                                            $slug = $service['slug_prefix'] . '-' . $key;
                                            $pageExists = in_array($slug, $pageSlugs);
                                        @endphp
                                        @if ($pageExists)
                                            <a href="{{ route('it.local-seo', $slug) }}"
                                               class="flex items-center gap-2 text-xs text-light-muted hover:text-gold transition-colors py-1">
                                                <span>{{ $serviceIcons[$serviceKey] ?? '📦' }}</span>
                                                <span>{{ $service['name_it'] }}</span>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Collapsible All Pages Section -->
        <section class="py-16 px-4 bg-darkBg/50" id="tutti-servizi">
            <div class="max-w-6xl mx-auto">
                <!-- Custom Pages Highlight (Always Visible) -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-light mb-4 flex items-center justify-center gap-2">
                        <span class="text-gold">★</span> Pagine Principali
                    </h2>
                    <div class="grid md:grid-cols-3 gap-4 max-w-4xl mx-auto">
                        <a href="{{ route('it.web-developer-torino') }}"
                           class="flex items-center gap-3 p-4 bg-gradient-card rounded-xl border-2 border-gold/30 hover:border-gold/50 transition-all duration-300 group">
                            <span class="text-2xl">🌐</span>
                            <div class="text-left">
                                <h4 class="font-bold text-light group-hover:text-gold transition-colors text-sm">Sviluppatore Web Torino</h4>
                                <p class="text-light-muted text-xs">Sede principale</p>
                            </div>
                        </a>
                        <a href="{{ route('it.laravel-developer') }}"
                           class="flex items-center gap-3 p-4 bg-gradient-card rounded-xl border-2 border-gold/30 hover:border-gold/50 transition-all duration-300 group">
                            <span class="text-2xl">⚡</span>
                            <div class="text-left">
                                <h4 class="font-bold text-light group-hover:text-gold transition-colors text-sm">Sviluppatore Laravel Italia</h4>
                                <p class="text-light-muted text-xs">Tutta Italia</p>
                            </div>
                        </a>
                        <a href="{{ route('it.process-automation') }}"
                           class="flex items-center gap-3 p-4 bg-gradient-card rounded-xl border-2 border-gold/30 hover:border-gold/50 transition-all duration-300 group">
                            <span class="text-2xl">🤖</span>
                            <div class="text-left">
                                <h4 class="font-bold text-light group-hover:text-gold transition-colors text-sm">Automazione Processi</h4>
                                <p class="text-light-muted text-xs">Tutta Italia</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Toggle Button -->
                <div class="text-center mb-8">
                    <button onclick="toggleCollapse('all-pages')"
                            class="px-6 py-3 bg-darkCard/50 text-light-muted hover:text-gold border border-gold/20 hover:border-gold/40 rounded-lg transition-all duration-300 inline-flex items-center gap-2 cursor-pointer">
                        <span id="all-pages-text">Mostra tutte le {{ $totalPages }} pagine</span>
                        <span id="arrow-all-pages" class="collapse-arrow">▼</span>
                    </button>
                </div>

                <!-- Collapsible Content -->
                <div id="all-pages" class="collapsible-content">
                    <div class="bg-darkCard/30 rounded-xl border border-gold/10 p-6">
                        <p class="text-light-muted text-center mb-6 text-sm">
                            Trova il servizio specifico per la tua zona. Clicca per maggiori dettagli.
                        </p>

                        <!-- Services by Category -->
                        @foreach ($services as $serviceKey => $service)
                            <div class="mb-6 pb-6 border-b border-gold/10 last:border-0 last:mb-0 last:pb-0 text-center">
                                <div class="flex items-center justify-center gap-2 mb-3">
                                    <span class="text-xl">{{ $serviceIcons[$serviceKey] ?? '📦' }}</span>
                                    <h3 class="text-lg font-bold text-light">{{ $service['name_it'] }}</h3>
                                </div>

                                <div class="flex flex-wrap justify-center gap-2">
                                    @foreach ($cities as $cityKey => $city)
                                        @php
                                            $slug = $service['slug_prefix'] . '-' . $cityKey;
                                            $pageExists = in_array($slug, $pageSlugs);
                                        @endphp
                                        @if ($pageExists)
                                            <a href="{{ route('it.local-seo', $slug) }}"
                                               class="px-3 py-1.5 bg-gradient-card rounded-lg border border-gold/20 hover:border-gold/40 hover:bg-gold/5 transition-all duration-200 text-sm text-light hover:text-gold">
                                                {{ $city['name'] }}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact CTA Section -->
        <section class="py-20 px-4" id="contact">
            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-card p-8 md:p-12 rounded-xl border border-gold/20 shadow-dark-card text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-light mb-4">Parliamo del Tuo Progetto</h2>
                    <p class="text-light-muted mb-8 max-w-2xl mx-auto">
                        Hai un'idea o un progetto da realizzare? Contattami per una consulenza gratuita. Rispondo entro 24 ore.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                        <a href="mailto:{{ $shared['email'] }}"
                            class="px-8 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow text-lg">
                            {{ $shared['email'] }}
                        </a>
                        <a href="tel:{{ $shared['phone'] }}"
                            class="px-8 py-4 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300 text-lg">
                            {{ preg_replace('/(\+39)(\d{3})(\d{3})(\d{4})/', '$1 $2 $3 $4', $shared['phone']) }}
                        </a>
                    </div>

                    <p class="text-sm text-gold font-medium">
                        Disponibile per nuovi progetti
                    </p>
                </div>
            </div>
        </section>

        <!-- Back to Home -->
        <section class="py-12 px-4 border-t border-gold/10">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-light-muted mb-4">Scopri di più:</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="/" class="text-gold hover:text-gold-light transition-colors">
                        ← Home
                    </a>
                    <span class="text-gold/40">|</span>
                    <a href="/blog" class="text-gold hover:text-gold-light transition-colors">
                        Blog →
                    </a>
                    <span class="text-gold/40">|</span>
                    <a href="/#portfolio" class="text-gold hover:text-gold-light transition-colors">
                        Portfolio →
                    </a>
                    <span class="text-gold/40">|</span>
                    <a href="/#contact" class="text-gold hover:text-gold-light transition-colors">
                        Contatti →
                    </a>
                </div>
            </div>
        </section>
    </div>

    <script>
        function toggleCollapse(id) {
            const content = document.getElementById(id);
            const arrow = document.getElementById('arrow-' + id);

            if (content.classList.contains('expanded')) {
                content.classList.remove('expanded');
                if (arrow) arrow.classList.remove('rotated');

                // Update text for all-pages button
                if (id === 'all-pages') {
                    document.getElementById('all-pages-text').textContent = 'Mostra tutte le {{ $totalPages }} pagine';
                }
            } else {
                content.classList.add('expanded');
                if (arrow) arrow.classList.add('rotated');

                // Update text for all-pages button
                if (id === 'all-pages') {
                    document.getElementById('all-pages-text').textContent = 'Nascondi tutte le pagine';
                }
            }
        }
    </script>
</x-layout>
