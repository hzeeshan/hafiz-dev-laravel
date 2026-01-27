<x-layout>
    <x-slot:title>{{ $pageTitle }} | Hafiz Riaz</x-slot:title>
    <x-slot:description>{{ $metaDescription }}</x-slot:description>
    <x-slot:keywords>{{ $keywords }}</x-slot:keywords>
    <x-slot:canonical>{{ url('/it/' . $slug) }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>{{ $pageTitle }} | Hafiz Riaz</x-slot:ogTitle>
    <x-slot:ogDescription>{{ $metaDescription }}</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/it/' . $slug) }}</x-slot:ogUrl>
    <x-slot:ogImage>{{ asset('profile-photo.png') }}</x-slot:ogImage>

    @push('head')
        {{-- Hreflang Tags --}}
        <link rel="alternate" hreflang="en" href="https://hafiz.dev/" />
        <link rel="alternate" hreflang="it" href="https://hafiz.dev/it/{{ $slug }}" />
        <link rel="alternate" hreflang="x-default" href="https://hafiz.dev/" />

        {{-- Open Graph Locale --}}
        <meta property="og:locale" content="it_IT" />
    @endpush

    @push('schemas')
        @php
            // LocalBusiness / ProfessionalService Schema
            $localBusinessSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'ProfessionalService',
                'name' => "Hafiz Riaz - {$service['name_it']} {$city['name']}",
                'image' => 'https://hafiz.dev/profile-photo.png',
                'url' => url('/it/' . $slug),
                'telephone' => $shared['phone'],
                'email' => $shared['email'],
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => $shared['base_location'],
                    'addressRegion' => 'Piemonte',
                    'addressCountry' => 'IT',
                ],
                'geo' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => $city['lat'],
                    'longitude' => $city['lng'],
                ],
                'priceRange' => $shared['price_range'],
                'openingHoursSpecification' => [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => $shared['working_hours']['days'],
                    'opens' => $shared['working_hours']['opens'],
                    'closes' => $shared['working_hours']['closes'],
                ],
                'areaServed' => array_merge(
                    [['@type' => 'City', 'name' => $city['name']]],
                    array_map(fn($c) => ['@type' => 'City', 'name' => $c], $city['area_served_extra'] ?? []),
                    [['@type' => 'Country', 'name' => 'Italia']]
                ),
                'hasOfferCatalog' => [
                    '@type' => 'OfferCatalog',
                    'name' => "Servizi di {$service['name_it']}",
                    'itemListElement' => array_map(fn($s) => [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => $s['title'],
                        ],
                    ], $service['services_offered']),
                ],
            ];

            // FAQ Schema
            $faqSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => array_map(fn($item) => [
                    '@type' => 'Question',
                    'name' => $item['question'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $item['answer'],
                    ],
                ], $faq),
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
                        'name' => $pageTitle,
                        'item' => url('/it/' . $slug),
                    ],
                ],
            ];
        @endphp

        <script type="application/ld+json">{!! json_encode($localBusinessSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
        <script type="application/ld+json">{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
        <script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
    @endpush

    <div class="relative z-10">
        <!-- Hero Section -->
        <section class="min-h-[70vh] flex items-center justify-center px-4 pt-16 pb-20" id="home">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-lg md:text-xl text-gold mb-3 font-medium">
                    {{ $service['hero_subtitle'] }}
                </p>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-light mb-6 leading-tight">
                    {{ $pageTitle }}
                </h1>

                <p class="text-base md:text-lg text-light-muted max-w-2xl mx-auto mb-8 leading-relaxed">
                    {{ $service['description'] }}
                    Con oltre {{ $shared['experience_years'] }} anni di esperienza, trasformo le tue idee in soluzioni digitali che funzionano.
                </p>

                <!-- CTA Button -->
                <a href="#contact"
                    class="inline-block px-8 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5 text-lg">
                    Richiedi un Preventivo Gratuito
                </a>

                <!-- Contact Quick Info -->
                <div class="mt-8 flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-light-muted text-sm">
                    <span class="flex items-center gap-2">
                        <span>{{ $city['name'] }}, Italia</span>
                    </span>
                    <span class="hidden sm:inline">|</span>
                    <span class="flex items-center gap-2 text-gold font-medium">
                        Disponibile per nuovi progetti
                    </span>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="py-20 px-4 bg-darkBg/50" id="servizi">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">I Miei Servizi</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    Soluzioni professionali per aziende a {{ $city['name'] }} e in {{ $city['region'] }}.
                </p>

                <div class="grid md:grid-cols-2 gap-6">
                    @foreach ($service['services_offered'] as $offered)
                        <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                            <div class="text-gold text-3xl mb-4">{{ $offered['icon'] }}</div>
                            <h3 class="text-xl font-bold text-light mb-3">{{ $offered['title'] }}</h3>
                            <p class="text-light-muted leading-relaxed">
                                {{ $offered['description'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Why Choose Me Section -->
        <section class="py-20 px-4" id="perche-scegliermi">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Perche Scegliere Me</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    Esperienza, tecnologie moderne e comunicazione diretta per il successo del tuo progetto.
                </p>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Point 1 -->
                    <div class="text-center p-6">
                        <div class="text-gold text-4xl mb-4">{{ $shared['experience_years'] }}</div>
                        <h3 class="text-lg font-bold text-light mb-2">Anni di Esperienza</h3>
                        <p class="text-light-muted text-sm">
                            Ho lavorato con aziende di ogni dimensione, dalle startup alle grandi imprese.
                        </p>
                    </div>

                    <!-- Point 2 -->
                    <div class="text-center p-6">
                        <div class="text-gold text-4xl mb-4">⚡</div>
                        <h3 class="text-lg font-bold text-light mb-2">Tecnologie Moderne</h3>
                        <p class="text-light-muted text-sm">
                            Utilizzo {{ implode(', ', array_slice($service['technologies'], 0, 3)) }} e le migliori tecnologie.
                        </p>
                    </div>

                    <!-- Point 3 -->
                    <div class="text-center p-6">
                        <div class="text-gold text-4xl mb-4">💬</div>
                        <h3 class="text-lg font-bold text-light mb-2">Comunicazione Diretta</h3>
                        <p class="text-light-muted text-sm">
                            Lavori direttamente con me, senza intermediari. Risposte rapide e aggiornamenti costanti.
                        </p>
                    </div>

                    <!-- Point 4 -->
                    <div class="text-center p-6">
                        <div class="text-gold text-4xl mb-4">📍</div>
                        <h3 class="text-lg font-bold text-light mb-2">Disponibile a {{ $city['name'] }}</h3>
                        <p class="text-light-muted text-sm">
                            {{ $city['commute_note'] }}.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section class="py-20 px-4 bg-darkBg/50" id="progetti">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Progetti Recenti</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    Alcuni dei progetti che ho realizzato per clienti in diversi settori.
                </p>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach ($shared['projects'] as $project)
                        <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                            <div class="relative overflow-hidden h-48">
                                <img src="{{ $project['image'] }}" alt="{{ $project['name'] }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    loading="lazy" width="1200" height="900">
                                <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-light mb-2">{{ $project['name'] }}</h3>
                                <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                    {{ $project['description'] }}
                                </p>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($project['tags'] as $tag)
                                        <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <a href="/#portfolio" class="text-gold hover:text-gold-light transition-colors font-semibold">
                        Vedi tutti i progetti →
                    </a>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-20 px-4" id="faq">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Domande Frequenti</h2>
                <p class="text-light-muted text-center mb-12">
                    Risposte alle domande piu comuni sui miei servizi a {{ $city['name'] }}.
                </p>

                <div class="space-y-4">
                    @foreach ($faq as $item)
                        <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                            <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-light">{{ $item['question'] }}</h3>
                                <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                            </summary>
                            <div class="px-6 pb-6 text-light-muted">
                                <p>{{ $item['answer'] }}</p>
                            </div>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Contact CTA Section -->
        <section class="py-20 px-4 bg-darkBg/50" id="contact">
            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-card p-8 md:p-12 rounded-xl border border-gold/20 shadow-dark-card text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-light mb-4">Parliamo del Tuo Progetto</h2>
                    <p class="text-light-muted mb-8 max-w-2xl mx-auto">
                        Hai un'idea o un progetto da realizzare a {{ $city['name'] }}? Contattami per una consulenza gratuita. Rispondo entro 24 ore.
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

        <!-- Other Italian Pages Links -->
        <section class="py-12 px-4">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-light-muted mb-4">Scopri anche i miei altri servizi:</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('it.servizi') }}" class="text-gold hover:text-gold-light transition-colors font-semibold">
                        ← Tutti i Servizi
                    </a>
                    <span class="text-gold/40">|</span>
                    <a href="{{ route('it.web-developer-torino') }}" class="text-gold hover:text-gold-light transition-colors">
                        Sviluppatore Web Torino →
                    </a>
                    <span class="text-gold/40">|</span>
                    <a href="{{ route('it.laravel-developer') }}" class="text-gold hover:text-gold-light transition-colors">
                        Sviluppatore Laravel Italia →
                    </a>
                    <span class="text-gold/40">|</span>
                    <a href="{{ route('it.process-automation') }}" class="text-gold hover:text-gold-light transition-colors">
                        Automazione Processi Aziendali →
                    </a>
                </div>
            </div>
        </section>
    </div>
</x-layout>
