<x-layout>
    <x-slot:title>Automazione Processi Aziendali Torino | Risparmia Tempo | Hafiz Riaz</x-slot:title>
    <x-slot:description>Automatizza i processi aziendali ripetitivi e risparmia ore di lavoro. Soluzioni con Make.com, n8n e sviluppo custom. Consulenza gratuita a Torino e in tutta Italia.</x-slot:description>
    <x-slot:keywords>automazione processi aziendali, automazione aziendale, automatizzare processi, automazione torino, make.com, n8n, workflow automation, risparmio tempo</x-slot:keywords>
    <x-slot:canonical>{{ url('/it/automazione-processi-aziendali') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Automazione Processi Aziendali Torino | Risparmia Tempo | Hafiz Riaz</x-slot:ogTitle>
    <x-slot:ogDescription>Automatizza i processi aziendali ripetitivi e risparmia ore di lavoro. Soluzioni con Make.com, n8n e sviluppo custom.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/it/automazione-processi-aziendali') }}</x-slot:ogUrl>
    <x-slot:ogImage>{{ asset('profile-photo.png') }}</x-slot:ogImage>

    @push('head')
        {{-- Hreflang Tags (self-referencing only - no English equivalent page) --}}
        <link rel="alternate" hreflang="it" href="https://hafiz.dev/it/automazione-processi-aziendali" />

        {{-- Open Graph Locale --}}
        <meta property="og:locale" content="it_IT" />
    @endpush

    @push('schemas')
        {{-- LocalBusiness Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "ProfessionalService",
            "name": "Hafiz Riaz - Automazione Processi Aziendali",
            "image": "https://hafiz.dev/profile-photo.png",
            "url": "https://hafiz.dev/it/automazione-processi-aziendali",
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
                "name": "Servizi di Automazione",
                "itemListElement": [
                    {
                        "@@type": "Offer",
                        "itemOffered": {
                            "@@type": "Service",
                            "name": "Automazione Email e Comunicazioni"
                        }
                    },
                    {
                        "@@type": "Offer",
                        "itemOffered": {
                            "@@type": "Service",
                            "name": "Integrazione Sistemi"
                        }
                    },
                    {
                        "@@type": "Offer",
                        "itemOffered": {
                            "@@type": "Service",
                            "name": "Automazione Documenti"
                        }
                    },
                    {
                        "@@type": "Offer",
                        "itemOffered": {
                            "@@type": "Service",
                            "name": "Workflow Personalizzati"
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
                    "name": "Quanto costa un'automazione?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Dipende dalla complessita. Automazioni semplici partono da 500 euro, progetti piu complessi da 2.000 euro. Offro sempre una consulenza gratuita per valutare il progetto."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Quanto tempo serve per implementare un'automazione?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Automazioni semplici: 1-2 giorni. Progetti complessi con piu sistemi: 1-2 settimane."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Devo cambiare i software che uso gia?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "No, le automazioni collegano i sistemi esistenti. Lavoro con i software che gia utilizzi."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Cosa succede se qualcosa smette di funzionare?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Offro monitoraggio e manutenzione. Le automazioni includono notifiche di errore e sono progettate per essere robuste."
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
                    "name": "Automazione Processi Aziendali",
                    "item": "https://hafiz.dev/it/automazione-processi-aziendali"
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
                    Esperto Automazione Aziendale
                </p>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-light mb-6 leading-tight">
                    Automazione Processi Aziendali
                </h1>

                <p class="text-base md:text-lg text-light-muted max-w-2xl mx-auto mb-8 leading-relaxed">
                    Elimina le attivita ripetitive e fai crescere la tua azienda. Automazioni personalizzate che fanno risparmiare ore di lavoro ogni settimana.
                </p>

                <!-- CTA Button -->
                <a href="#contact"
                    class="inline-block px-8 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5 text-lg">
                    Scopri Come Automatizzare
                </a>

                <!-- Benefits Quick -->
                <div class="mt-8 flex flex-wrap items-center justify-center gap-6 text-light-muted text-sm">
                    <span class="flex items-center gap-2">
                        <span class="text-gold">✓</span>
                        <span>Risparmia 10-20 ore/settimana</span>
                    </span>
                    <span class="flex items-center gap-2">
                        <span class="text-gold">✓</span>
                        <span>Zero errori manuali</span>
                    </span>
                    <span class="flex items-center gap-2">
                        <span class="text-gold">✓</span>
                        <span>ROI in poche settimane</span>
                    </span>
                </div>
            </div>
        </section>

        <!-- What I Can Automate Section -->
        <section class="py-20 px-4 bg-darkBg/50" id="servizi">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Cosa Posso Automatizzare</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    Collego i tuoi sistemi esistenti per eliminare il lavoro manuale ripetitivo.
                </p>

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Service 1 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">📧</div>
                        <h3 class="text-xl font-bold text-light mb-3">Automazione Email e Comunicazioni</h3>
                        <p class="text-light-muted leading-relaxed">
                            Risposte automatiche, follow-up programmati, notifiche intelligenti e integrazione con CRM. Non perdere mai piu un lead per mancanza di tempo.
                        </p>
                    </div>

                    <!-- Service 2 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">🔗</div>
                        <h3 class="text-xl font-bold text-light mb-3">Integrazione Sistemi</h3>
                        <p class="text-light-muted leading-relaxed">
                            Collegamento tra software diversi: e-commerce, gestionale, email marketing, contabilita. Fai parlare i tuoi strumenti tra loro.
                        </p>
                    </div>

                    <!-- Service 3 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">📄</div>
                        <h3 class="text-xl font-bold text-light mb-3">Automazione Documenti</h3>
                        <p class="text-light-muted leading-relaxed">
                            Generazione automatica di preventivi, fatture, report e documenti personalizzati. Dai dati al PDF in un click.
                        </p>
                    </div>

                    <!-- Service 4 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">⚙️</div>
                        <h3 class="text-xl font-bold text-light mb-3">Workflow Personalizzati</h3>
                        <p class="text-light-muted leading-relaxed">
                            Flussi di lavoro su misura per le esigenze specifiche della tua azienda. Ogni business e diverso, le automazioni devono esserlo.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Automate Section -->
        <section class="py-20 px-4" id="perche-automatizzare">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Perche Automatizzare?</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    I benefici concreti dell'automazione per la tua azienda.
                </p>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Point 1 -->
                    <div class="text-center p-6 bg-gradient-card rounded-xl border border-gold/20">
                        <div class="text-gold text-4xl mb-4">⏱️</div>
                        <h3 class="text-lg font-bold text-light mb-2">Risparmia Tempo</h3>
                        <p class="text-light-muted text-sm">
                            Le automazioni possono far risparmiare 10-20 ore a settimana su attivita ripetitive.
                        </p>
                    </div>

                    <!-- Point 2 -->
                    <div class="text-center p-6 bg-gradient-card rounded-xl border border-gold/20">
                        <div class="text-gold text-4xl mb-4">✅</div>
                        <h3 class="text-lg font-bold text-light mb-2">Riduci gli Errori</h3>
                        <p class="text-light-muted text-sm">
                            I processi automatici eliminano errori umani e garantiscono consistenza.
                        </p>
                    </div>

                    <!-- Point 3 -->
                    <div class="text-center p-6 bg-gradient-card rounded-xl border border-gold/20">
                        <div class="text-gold text-4xl mb-4">📈</div>
                        <h3 class="text-lg font-bold text-light mb-2">Scala il Business</h3>
                        <p class="text-light-muted text-sm">
                            Gestisci piu clienti e ordini senza aumentare proporzionalmente il personale.
                        </p>
                    </div>

                    <!-- Point 4 -->
                    <div class="text-center p-6 bg-gradient-card rounded-xl border border-gold/20">
                        <div class="text-gold text-4xl mb-4">💰</div>
                        <h3 class="text-lg font-bold text-light mb-2">ROI Rapido</h3>
                        <p class="text-light-muted text-sm">
                            La maggior parte delle automazioni si ripaga in poche settimane.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tools Section -->
        <section class="py-20 px-4 bg-darkBg/50" id="strumenti">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Strumenti che Utilizzo</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    Le migliori piattaforme per automazioni affidabili e scalabili.
                </p>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Tool 1 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card text-center">
                        <div class="text-gold text-4xl mb-4">🔮</div>
                        <h3 class="text-xl font-bold text-light mb-3">Make.com</h3>
                        <p class="text-light-muted text-sm leading-relaxed">
                            Piattaforma potente per automazioni complesse con centinaia di integrazioni. Precedentemente noto come Integromat.
                        </p>
                    </div>

                    <!-- Tool 2 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card text-center">
                        <div class="text-gold text-4xl mb-4">🔧</div>
                        <h3 class="text-xl font-bold text-light mb-3">n8n</h3>
                        <p class="text-light-muted text-sm leading-relaxed">
                            Automazioni self-hosted per chi preferisce mantenere i dati sui propri server. Open source e flessibile.
                        </p>
                    </div>

                    <!-- Tool 3 -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card text-center">
                        <div class="text-gold text-4xl mb-4">💻</div>
                        <h3 class="text-xl font-bold text-light mb-3">Soluzioni Custom</h3>
                        <p class="text-light-muted text-sm leading-relaxed">
                            Sviluppo automazioni personalizzate in Laravel/PHP quando gli strumenti standard non bastano.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Examples Section -->
        <section class="py-20 px-4" id="esempi">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Esempi di Automazione</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    Casi reali di automazioni che ho implementato per clienti.
                </p>

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Example 1 -->
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                        <div class="flex items-start gap-4">
                            <div class="text-gold text-2xl">🛒</div>
                            <div>
                                <h3 class="text-lg font-bold text-light mb-2">E-commerce → Gestionale</h3>
                                <p class="text-light-muted text-sm">
                                    Ordini WooCommerce sincronizzati automaticamente con il gestionale. Fatture generate e inviate senza intervento manuale.
                                </p>
                                <p class="text-gold text-sm mt-2 font-medium">Risparmio: 8 ore/settimana</p>
                            </div>
                        </div>
                    </div>

                    <!-- Example 2 -->
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                        <div class="flex items-start gap-4">
                            <div class="text-gold text-2xl">📋</div>
                            <div>
                                <h3 class="text-lg font-bold text-light mb-2">Lead → CRM → Email</h3>
                                <p class="text-light-muted text-sm">
                                    Nuovi contatti dal sito aggiunti automaticamente al CRM, con sequenza email di benvenuto e task per il commerciale.
                                </p>
                                <p class="text-gold text-sm mt-2 font-medium">Risparmio: 5 ore/settimana</p>
                            </div>
                        </div>
                    </div>

                    <!-- Example 3 -->
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                        <div class="flex items-start gap-4">
                            <div class="text-gold text-2xl">📊</div>
                            <div>
                                <h3 class="text-lg font-bold text-light mb-2">Report Automatici</h3>
                                <p class="text-light-muted text-sm">
                                    Report settimanali generati automaticamente da Google Analytics, CRM e vendite. Inviati via email ogni lunedi mattina.
                                </p>
                                <p class="text-gold text-sm mt-2 font-medium">Risparmio: 3 ore/settimana</p>
                            </div>
                        </div>
                    </div>

                    <!-- Example 4 -->
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                        <div class="flex items-start gap-4">
                            <div class="text-gold text-2xl">📅</div>
                            <div>
                                <h3 class="text-lg font-bold text-light mb-2">Prenotazioni → Calendario</h3>
                                <p class="text-light-muted text-sm">
                                    Appuntamenti da form online sincronizzati con Google Calendar, reminder automatici al cliente e notifica al team.
                                </p>
                                <p class="text-gold text-sm mt-2 font-medium">Risparmio: 6 ore/settimana</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-20 px-4 bg-darkBg/50" id="faq">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Domande Frequenti</h2>
                <p class="text-light-muted text-center mb-12">
                    Risposte alle domande piu comuni sull'automazione.
                </p>

                <div class="space-y-4">
                    <!-- FAQ 1 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Quanto costa un'automazione?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted">
                            <p>Dipende dalla complessita. Automazioni semplici partono da €500, progetti piu complessi da €2.000. Offro sempre una consulenza gratuita per valutare il progetto e darti un preventivo preciso prima di iniziare.</p>
                        </div>
                    </details>

                    <!-- FAQ 2 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Quanto tempo serve per implementare un'automazione?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted">
                            <p>Automazioni semplici: 1-2 giorni. Progetti complessi con piu sistemi: 1-2 settimane. Ti do sempre una stima precisa dopo la consulenza iniziale.</p>
                        </div>
                    </details>

                    <!-- FAQ 3 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Devo cambiare i software che uso gia?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted">
                            <p>No, le automazioni collegano i sistemi esistenti. Lavoro con i software che gia utilizzi: Gmail, Google Sheets, Mailchimp, Shopify, WooCommerce, Slack, e centinaia di altri.</p>
                        </div>
                    </details>

                    <!-- FAQ 4 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Cosa succede se qualcosa smette di funzionare?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted">
                            <p>Offro monitoraggio e manutenzione. Le automazioni includono notifiche di errore e sono progettate per essere robuste. In caso di problemi, intervengo rapidamente per ripristinare il funzionamento.</p>
                        </div>
                    </details>
                </div>
            </div>
        </section>

        <!-- Contact CTA Section -->
        <section class="py-20 px-4" id="contact">
            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-card p-8 md:p-12 rounded-xl border border-gold/20 shadow-dark-card text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-light mb-4">Quante Ore Stai Perdendo?</h2>
                    <p class="text-light-muted mb-8 max-w-2xl mx-auto">
                        Raccontami quali attivita ripetitive ti portano via piu tempo. Ti mostrero come automatizzarle con una consulenza gratuita.
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
                        Richiedi Consulenza Gratuita
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
                    <a href="{{ route('it.laravel-developer') }}" class="text-gold hover:text-gold-light transition-colors">
                        Sviluppatore Laravel Italia →
                    </a>
                </div>
            </div>
        </section>
    </div>
</x-layout>
