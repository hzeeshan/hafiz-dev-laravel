<x-layout>
    <x-slot:title>Sviluppatore Web a Torino | Siti Web e Applicazioni | Hafiz Riaz</x-slot:title>
    <x-slot:description>Sviluppatore web freelance a Torino. Realizzo siti web professionali, e-commerce e applicazioni web su misura. Oltre 9 anni di esperienza. Contattami per un preventivo.</x-slot:description>
    <x-slot:keywords>sviluppatore web torino, programmatore torino, web developer torino, sviluppatore freelance torino, creazione siti web torino, sviluppo web piemonte</x-slot:keywords>
    <x-slot:canonical>{{ url('/it/sviluppatore-web-torino') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Sviluppatore Web a Torino | Siti Web e Applicazioni | Hafiz Riaz</x-slot:ogTitle>
    <x-slot:ogDescription>Sviluppatore web freelance a Torino. Realizzo siti web professionali, e-commerce e applicazioni web su misura. Oltre 9 anni di esperienza.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/it/sviluppatore-web-torino') }}</x-slot:ogUrl>
    <x-slot:ogImage>{{ asset('profile-photo.png') }}</x-slot:ogImage>

    @push('head')
        {{-- Hreflang Tags --}}
        <link rel="alternate" hreflang="en" href="https://hafiz.dev/" />
        <link rel="alternate" hreflang="it" href="https://hafiz.dev/it/sviluppatore-web-torino" />
        <link rel="alternate" hreflang="x-default" href="https://hafiz.dev/" />

        {{-- Open Graph Locale --}}
        <meta property="og:locale" content="it_IT" />
    @endpush

    @push('schemas')
        {{-- LocalBusiness Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "ProfessionalService",
            "name": "Hafiz Riaz - Sviluppatore Web Torino",
            "image": "https://hafiz.dev/profile-photo.png",
            "url": "https://hafiz.dev/it/sviluppatore-web-torino",
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
                "name": "Servizi di Sviluppo Web",
                "itemListElement": [
                    {
                        "@@type": "Offer",
                        "itemOffered": {
                            "@@type": "Service",
                            "name": "Creazione Siti Web"
                        }
                    },
                    {
                        "@@type": "Offer",
                        "itemOffered": {
                            "@@type": "Service",
                            "name": "Sviluppo E-commerce"
                        }
                    },
                    {
                        "@@type": "Offer",
                        "itemOffered": {
                            "@@type": "Service",
                            "name": "Applicazioni Web Personalizzate"
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
                    "name": "Quanto costa un sito web?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Il costo dipende dalla complessita del progetto. Un sito vetrina parte da 1.500 euro, mentre un e-commerce completo parte da 3.000 euro. Contattami per un preventivo personalizzato."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Quanto tempo serve per realizzare un sito?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Un sito vetrina richiede 2-4 settimane. Un e-commerce o un'applicazione web piu complessa richiede 4-8 settimane."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Offri assistenza dopo la consegna?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Si, offro pacchetti di manutenzione mensile che includono aggiornamenti, backup e supporto tecnico."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Lavori solo a Torino?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Sono basato a Torino ma lavoro con clienti in tutta Italia. La maggior parte della comunicazione avviene online, ma sono disponibile per incontri di persona in Piemonte."
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
                    "name": "Sviluppatore Web Torino",
                    "item": "https://hafiz.dev/it/sviluppatore-web-torino"
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
                    Sviluppatore Web Freelance
                </p>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-light mb-6 leading-tight">
                    Sviluppatore Web a Torino
                </h1>

                <p class="text-base md:text-lg text-light-muted max-w-2xl mx-auto mb-8 leading-relaxed">
                    Realizzo siti web professionali, e-commerce e applicazioni web personalizzate per aziende di ogni dimensione.
                    Con oltre 9 anni di esperienza, trasformo le tue idee in soluzioni digitali che funzionano.
                </p>

                <!-- CTA Button -->
                <a href="#contact"
                    class="inline-block px-8 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5 text-lg">
                    Richiedi un Preventivo Gratuito
                </a>

                <!-- Contact Quick Info -->
                <div class="mt-8 flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-light-muted text-sm">
                    <span class="flex items-center gap-2">
                        <span>Torino, Italia</span>
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
                    Soluzioni web complete per far crescere la tua attivita online.
                </p>

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Service 1 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">🌐</div>
                        <h3 class="text-xl font-bold text-light mb-3">Creazione Siti Web</h3>
                        <p class="text-light-muted leading-relaxed">
                            Realizzo siti web moderni, veloci e ottimizzati per i motori di ricerca. Dal sito vetrina al portale aziendale complesso, ogni progetto e costruito su misura per le tue esigenze.
                        </p>
                    </div>

                    <!-- Service 2 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">🛒</div>
                        <h3 class="text-xl font-bold text-light mb-3">Sviluppo E-commerce</h3>
                        <p class="text-light-muted leading-relaxed">
                            Negozi online completi con gestione prodotti, pagamenti sicuri e integrazione con i principali corrieri italiani. Vendi online con una piattaforma professionale.
                        </p>
                    </div>

                    <!-- Service 3 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">💻</div>
                        <h3 class="text-xl font-bold text-light mb-3">Applicazioni Web</h3>
                        <p class="text-light-muted leading-relaxed">
                            Applicazioni web personalizzate per gestire prenotazioni, CRM, dashboard aziendali e molto altro. Software su misura che risolve i problemi specifici della tua azienda.
                        </p>
                    </div>

                    <!-- Service 4 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">🔧</div>
                        <h3 class="text-xl font-bold text-light mb-3">Manutenzione e Supporto</h3>
                        <p class="text-light-muted leading-relaxed">
                            Assistenza continua, aggiornamenti di sicurezza e ottimizzazione delle performance per il tuo sito. Non ti lascio solo dopo la consegna.
                        </p>
                    </div>
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
                        <div class="text-gold text-4xl mb-4">9+</div>
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
                            Utilizzo Laravel, Vue.js e le migliori tecnologie per siti veloci e sicuri.
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
                        <h3 class="text-lg font-bold text-light mb-2">Basato a Torino</h3>
                        <p class="text-light-muted text-sm">
                            Disponibile per incontri di persona a Torino e in Piemonte.
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
                    <!-- Project 1 -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/studylab-screenshot.webp" alt="StudyLab - Piattaforma Educativa"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">StudyLab</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Piattaforma SaaS per la generazione automatica di quiz con intelligenza artificiale. Utilizzata da oltre 500 scuole.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vue.js</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">AI</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project 2 -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/replygenius.io-screenshot.webp" alt="ReplyGenius - Estensione Chrome"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">ReplyGenius</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Estensione Chrome per rispondere alle email in modo intelligente. Migliaia di utenti attivi.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Chrome</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">AI</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project 3 -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/robobook-ai-screenshot.webp" alt="Robobook - Piattaforma AI"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">Siti Web Aziendali</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Ho realizzato siti web per aziende in diversi settori: ristorazione, servizi professionali, e-commerce e molto altro.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">PHP</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
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
                    Risposte alle domande piu comuni sui miei servizi.
                </p>

                <div class="space-y-4">
                    <!-- FAQ 1 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Quanto costa un sito web?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted">
                            <p>Il costo dipende dalla complessita del progetto. Un sito vetrina parte da €1.500, mentre un e-commerce completo parte da €3.000. Contattami per un preventivo personalizzato gratuito.</p>
                        </div>
                    </details>

                    <!-- FAQ 2 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Quanto tempo serve per realizzare un sito?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted">
                            <p>Un sito vetrina richiede 2-4 settimane. Un e-commerce o un'applicazione web piu complessa richiede 4-8 settimane. I tempi esatti dipendono dalla complessita e dalla rapidita nel fornire contenuti e feedback.</p>
                        </div>
                    </details>

                    <!-- FAQ 3 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Offri assistenza dopo la consegna?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted">
                            <p>Si, offro pacchetti di manutenzione mensile che includono aggiornamenti, backup, monitoraggio della sicurezza e supporto tecnico. Non ti lascio solo dopo la consegna del progetto.</p>
                        </div>
                    </details>

                    <!-- FAQ 4 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Lavori solo a Torino?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted">
                            <p>Sono basato a Torino ma lavoro con clienti in tutta Italia e anche all'estero. La maggior parte della comunicazione avviene online, ma sono disponibile per incontri di persona a Torino e in Piemonte.</p>
                        </div>
                    </details>

                    <!-- FAQ 5 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Posso vedere altri lavori che hai realizzato?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted">
                            <p>Certamente! Visita la <a href="/#portfolio" class="text-gold hover:text-gold-light">pagina Portfolio</a> sul mio sito per vedere una selezione dei miei progetti. Se cerchi esempi specifici nel tuo settore, contattami e ti mostrero lavori pertinenti.</p>
                        </div>
                    </details>
                </div>
            </div>
        </section>

        <!-- Contact CTA Section -->
        <section class="py-20 px-4 bg-darkBg/50" id="contact">
            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-card p-8 md:p-12 rounded-xl border border-gold/20 shadow-dark-card text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-light mb-4">Parliamo del Tuo Progetto</h2>
                    <p class="text-light-muted mb-8 max-w-2xl mx-auto">
                        Hai un'idea o un progetto da realizzare? Contattami per una consulenza gratuita. Rispondo entro 24 ore.
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
