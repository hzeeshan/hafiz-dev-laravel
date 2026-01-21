<x-layout>
    <x-slot:title>Sviluppatore Laravel Italia | Consulente PHP Esperto | Hafiz Riaz</x-slot:title>
    <x-slot:description>Sviluppatore Laravel con 9+ anni di esperienza. Sviluppo applicazioni web, API, SaaS e sistemi complessi. Consulenza e sviluppo per aziende italiane.</x-slot:description>
    <x-slot:keywords>sviluppatore laravel, laravel developer italia, programmatore laravel, consulente laravel, sviluppo laravel italia, php developer, filament developer</x-slot:keywords>
    <x-slot:canonical>{{ url('/it/sviluppatore-laravel-italia') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Sviluppatore Laravel Italia | Consulente PHP Esperto | Hafiz Riaz</x-slot:ogTitle>
    <x-slot:ogDescription>Sviluppatore Laravel con 9+ anni di esperienza. Sviluppo applicazioni web, API, SaaS e sistemi complessi per aziende italiane.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/it/sviluppatore-laravel-italia') }}</x-slot:ogUrl>
    <x-slot:ogImage>{{ asset('profile-photo.png') }}</x-slot:ogImage>

    @push('head')
        {{-- Hreflang Tags (self-referencing only - no English equivalent page) --}}
        <link rel="alternate" hreflang="it" href="https://hafiz.dev/it/sviluppatore-laravel-italia" />

        {{-- Open Graph Locale --}}
        <meta property="og:locale" content="it_IT" />
    @endpush

    @push('schemas')
        {{-- LocalBusiness Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "ProfessionalService",
            "name": "Hafiz Riaz - Sviluppatore Laravel Italia",
            "image": "https://hafiz.dev/profile-photo.png",
            "url": "https://hafiz.dev/it/sviluppatore-laravel-italia",
            "telephone": "+393888255329",
            "email": "contact@hafiz.dev",
            "address": {
                "@@type": "PostalAddress",
                "addressLocality": "Torino",
                "addressRegion": "Piemonte",
                "addressCountry": "IT"
            },
            "geo": {
                "@@type": "GeoCoordinates",
                "latitude": "45.0703",
                "longitude": "7.6869"
            },
            "priceRange": "$$",
            "openingHoursSpecification": {
                "@@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                "opens": "09:00",
                "closes": "18:00"
            },
            "areaServed": [
                {"@@type": "City", "name": "Torino"},
                {"@@type": "City", "name": "Milano"},
                {"@@type": "City", "name": "Roma"},
                {"@@type": "Country", "name": "Italia"}
            ],
            "hasOfferCatalog": {
                "@@type": "OfferCatalog",
                "name": "Servizi Laravel",
                "itemListElement": [
                    {
                        "@@type": "Offer",
                        "itemOffered": {
                            "@@type": "Service",
                            "name": "Sviluppo Applicazioni Web Laravel"
                        }
                    },
                    {
                        "@@type": "Offer",
                        "itemOffered": {
                            "@@type": "Service",
                            "name": "Sviluppo SaaS"
                        }
                    },
                    {
                        "@@type": "Offer",
                        "itemOffered": {
                            "@@type": "Service",
                            "name": "API Development"
                        }
                    },
                    {
                        "@@type": "Offer",
                        "itemOffered": {
                            "@@type": "Service",
                            "name": "Consulenza Laravel"
                        }
                    }
                ]
            }
        }
        </script>

        {{-- FAQ Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "FAQPage",
            "mainEntity": [
                {
                    "@@type": "Question",
                    "name": "Perche dovrei scegliere Laravel?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Laravel offre sviluppo rapido, codice manutenibile, sicurezza integrata e un ecosistema ricco di strumenti. E perfetto per progetti di qualsiasi dimensione, dalle startup alle enterprise."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Puoi lavorare su un progetto Laravel esistente?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Si, posso fare code review, ottimizzazione, aggiornamenti di versione e sviluppo di nuove funzionalita su progetti Laravel esistenti."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Offri supporto Filament?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Si, sono esperto di Filament per la creazione di pannelli amministrativi professionali in tempi rapidi."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Qual e il tuo processo di lavoro?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Analizzo i requisiti, propongo un'architettura, sviluppo in sprint con aggiornamenti regolari, e consegno con documentazione completa."
                    }
                }
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
                    "name": "Sviluppatore Laravel Italia",
                    "item": "https://hafiz.dev/it/sviluppatore-laravel-italia"
                }
            ]
        }
        </script>
    @endpush

    <div class="relative z-10">
        <!-- Hero Section -->
        <section class="min-h-[70vh] flex items-center justify-center px-4 pt-16 pb-20" id="home">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-lg md:text-xl text-gold mb-3 font-medium">
                    Esperto Laravel & PHP
                </p>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-light mb-6 leading-tight">
                    Sviluppatore Laravel in Italia
                </h1>

                <p class="text-base md:text-lg text-light-muted max-w-2xl mx-auto mb-8 leading-relaxed">
                    Sviluppo applicazioni web robuste e scalabili con Laravel, il framework PHP piu popolare al mondo.
                    Oltre 9 anni di esperienza nella creazione di SaaS, API e sistemi enterprise.
                </p>

                <!-- CTA Button -->
                <a href="#contact"
                    class="inline-block px-8 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5 text-lg">
                    Richiedi una Consulenza
                </a>

                <!-- Tech Stack -->
                <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                    <span class="px-3 py-1 bg-gold/10 text-gold rounded-full text-sm border border-gold/20">Laravel</span>
                    <span class="px-3 py-1 bg-gold/10 text-gold rounded-full text-sm border border-gold/20">Filament</span>
                    <span class="px-3 py-1 bg-gold/10 text-gold rounded-full text-sm border border-gold/20">Livewire</span>
                    <span class="px-3 py-1 bg-gold/10 text-gold rounded-full text-sm border border-gold/20">Vue.js</span>
                    <span class="px-3 py-1 bg-gold/10 text-gold rounded-full text-sm border border-gold/20">Inertia.js</span>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="py-20 px-4 bg-darkBg/50" id="servizi">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Servizi Laravel</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    Soluzioni complete per ogni esigenza di sviluppo web con Laravel.
                </p>

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Service 1 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">💻</div>
                        <h3 class="text-xl font-bold text-light mb-3">Sviluppo Applicazioni Web</h3>
                        <p class="text-light-muted leading-relaxed">
                            Applicazioni web complete con autenticazione, dashboard, API e integrazioni di terze parti. Dall'idea al prodotto finito, con codice pulito e manutenibile.
                        </p>
                    </div>

                    <!-- Service 2 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">🚀</div>
                        <h3 class="text-xl font-bold text-light mb-3">Sviluppo SaaS</h3>
                        <p class="text-light-muted leading-relaxed">
                            Piattaforme SaaS multi-tenant con abbonamenti, fatturazione automatica e gestione utenti. Ho lanciato i miei SaaS di successo, conosco le sfide.
                        </p>
                    </div>

                    <!-- Service 3 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">🔌</div>
                        <h3 class="text-xl font-bold text-light mb-3">API Development</h3>
                        <p class="text-light-muted leading-relaxed">
                            API RESTful sicure e ben documentate per mobile app, integrazioni e microservizi. Autenticazione, rate limiting, versioning inclusi.
                        </p>
                    </div>

                    <!-- Service 4 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">🔍</div>
                        <h3 class="text-xl font-bold text-light mb-3">Consulenza e Code Review</h3>
                        <p class="text-light-muted leading-relaxed">
                            Analisi del codice esistente, ottimizzazione performance e consulenza architetturale. Ti aiuto a migliorare il tuo progetto Laravel esistente.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Laravel Section -->
        <section class="py-20 px-4" id="perche-laravel">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Perche Laravel?</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    Il framework PHP piu amato dagli sviluppatori, per ottime ragioni.
                </p>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Point 1 -->
                    <div class="text-center p-6">
                        <div class="text-gold text-4xl mb-4">🏢</div>
                        <h3 class="text-lg font-bold text-light mb-2">Enterprise-Ready</h3>
                        <p class="text-light-muted text-sm">
                            Laravel e utilizzato da migliaia di aziende nel mondo. Codice pulito, manutenibile e scalabile.
                        </p>
                    </div>

                    <!-- Point 2 -->
                    <div class="text-center p-6">
                        <div class="text-gold text-4xl mb-4">🧰</div>
                        <h3 class="text-lg font-bold text-light mb-2">Ecosistema Completo</h3>
                        <p class="text-light-muted text-sm">
                            Forge, Vapor, Nova, Horizon: strumenti professionali per deploy, monitoring e amministrazione.
                        </p>
                    </div>

                    <!-- Point 3 -->
                    <div class="text-center p-6">
                        <div class="text-gold text-4xl mb-4">✅</div>
                        <h3 class="text-lg font-bold text-light mb-2">Esperienza Reale</h3>
                        <p class="text-light-muted text-sm">
                            Ho sviluppato SaaS di successo come StudyLab (500+ scuole) utilizzando Laravel in produzione.
                        </p>
                    </div>

                    <!-- Point 4 -->
                    <div class="text-center p-6">
                        <div class="text-gold text-4xl mb-4">⚡</div>
                        <h3 class="text-lg font-bold text-light mb-2">Sempre Aggiornato</h3>
                        <p class="text-light-muted text-sm">
                            Lavoro con Laravel 11, Livewire, Filament e tutte le tecnologie piu recenti dell'ecosistema.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section class="py-20 px-4 bg-darkBg/50" id="progetti">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Progetti Laravel</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    Applicazioni Laravel in produzione che servono migliaia di utenti ogni giorno.
                </p>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Project 1 -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/studylab-screenshot.webp" alt="StudyLab - Piattaforma SaaS"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">StudyLab</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Piattaforma SaaS educativa costruita con Laravel, Vue.js e intelligenza artificiale. Gestisce migliaia di utenti e quiz ogni giorno.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vue.js</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Stripe</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project 2 -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/replygenius.io-screenshot.webp" alt="ReplyGenius - Backend Laravel"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">ReplyGenius</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Backend Laravel per un'estensione Chrome. API veloci e sicure per elaborazione email con AI.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">API</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">OpenAI</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project 3 -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/soluzione-tasse-screenshot.webp" alt="Sistemi Aziendali"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">Sistemi Aziendali</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                CRM personalizzati, sistemi di prenotazione e dashboard analytics per varie aziende italiane.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Filament</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vue.js</span>
                            </div>
                        </div>
                    </div>
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
                    Risposte alle domande piu comuni sui servizi Laravel.
                </p>

                <div class="space-y-4">
                    <!-- FAQ 1 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Perche dovrei scegliere Laravel?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted">
                            <p>Laravel offre sviluppo rapido, codice manutenibile, sicurezza integrata e un ecosistema ricco di strumenti. E perfetto per progetti di qualsiasi dimensione, dalle startup alle enterprise. La community attiva e la documentazione eccellente lo rendono una scelta sicura.</p>
                        </div>
                    </details>

                    <!-- FAQ 2 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Puoi lavorare su un progetto Laravel esistente?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted">
                            <p>Si, posso fare code review, ottimizzazione, aggiornamenti di versione (anche da versioni legacy) e sviluppo di nuove funzionalita su progetti esistenti. Spesso i clienti mi contattano per migliorare performance o aggiungere features a progetti che altri hanno iniziato.</p>
                        </div>
                    </details>

                    <!-- FAQ 3 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Offri supporto Filament?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted">
                            <p>Si, sono esperto di Filament per la creazione di pannelli amministrativi professionali in tempi rapidi. Filament permette di costruire dashboard complete con CRUD, filtri, export e molto altro senza scrivere codice frontend.</p>
                        </div>
                    </details>

                    <!-- FAQ 4 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Qual e il tuo processo di lavoro?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted">
                            <p>Analizzo i requisiti in una call iniziale, propongo un'architettura e un preventivo dettagliato. Sviluppo in sprint settimanali con aggiornamenti regolari via email o call. Consegno con documentazione, test e supporto post-lancio incluso.</p>
                        </div>
                    </details>
                </div>
            </div>
        </section>

        <!-- Contact CTA Section -->
        <section class="py-20 px-4 bg-darkBg/50" id="contact">
            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-card p-8 md:p-12 rounded-xl border border-gold/20 shadow-dark-card text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-light mb-4">Hai un Progetto Laravel?</h2>
                    <p class="text-light-muted mb-8 max-w-2xl mx-auto">
                        Che tu stia iniziando da zero o abbia bisogno di supporto su un progetto esistente, posso aiutarti. Consulenza gratuita per capire le tue esigenze.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                        <a href="mailto:contact@hafiz.dev"
                            class="px-8 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow text-lg">
                            contact@hafiz.dev
                        </a>
                        <a href="tel:+393888255329"
                            class="px-8 py-4 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300 text-lg">
                            +39 388 825 5329
                        </a>
                    </div>

                    <p class="text-sm text-gold font-medium">
                        Parliamone
                    </p>
                </div>
            </div>
        </section>

        <!-- Other Italian Pages Links -->
        <section class="py-12 px-4">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-light-muted mb-4">Scopri anche i miei altri servizi:</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('it.web-developer-torino') }}" class="text-gold hover:text-gold-light transition-colors">
                        Sviluppatore Web Torino →
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
