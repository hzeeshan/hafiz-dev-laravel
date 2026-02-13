<x-layout>
    <x-slot:title>Hafiz Riaz | Realizzo il Tuo MVP in 7 Giorni | Sviluppo Web App e SaaS</x-slot:title>
    <x-slot:description>Hai un'idea? La realizzo in 7 giorni. Dal concetto al prodotto funzionante. Ho creato app utilizzate da oltre 500 scuole. Prezzo fisso, nessuna sorpresa. Basato a Torino, lavoro in tutto il mondo.</x-slot:description>
    <x-slot:keywords>sviluppo mvp, costruire mvp velocemente, sviluppatore startup, prototipazione rapida, sviluppatore laravel italia, sviluppatore vue.js, sviluppo saas, sviluppatore full stack torino, sviluppatore web freelance italia</x-slot:keywords>
    <x-slot:canonical>{{ url('/it') }}</x-slot:canonical>

    {{-- Homepage Open Graph --}}
    <x-slot:ogTitle>Hafiz Riaz | Realizzo il Tuo MVP in 7 Giorni | Sviluppo Web App e SaaS</x-slot:ogTitle>
    <x-slot:ogDescription>Hai un'idea? La realizzo in 7 giorni. Dal concetto al prodotto funzionante. Prezzo fisso, nessuna sorpresa.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/it') }}</x-slot:ogUrl>
    <x-slot:ogImage>{{ asset('profile-photo.png') }}</x-slot:ogImage>

    @push('head')
        {{-- Open Graph Locale --}}
        <meta property="og:locale" content="it_IT" />
    @endpush

    @push('schemas')
        {{-- Professional Service Schema --}}
        <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "ProfessionalService",
          "name": "Hafiz Riaz - Servizi di Sviluppo MVP",
          "image": "https://hafiz.dev/profile-photo.png",
          "@@id": "https://hafiz.dev/it",
          "url": "https://hafiz.dev/it",
          "telephone": "+393888255329",
          "email": "contact@@hafiz.dev",
          "address": {
            "@@type": "PostalAddress",
            "streetAddress": "",
            "addressLocality": "Torino",
            "addressRegion": "Piemonte",
            "postalCode": "",
            "addressCountry": "IT"
          },
          "geo": {
            "@@type": "GeoCoordinates",
            "latitude": 45.0703,
            "longitude": 7.6869
          },
          "openingHoursSpecification": {
            "@@type": "OpeningHoursSpecification",
            "dayOfWeek": [
              "Monday",
              "Tuesday",
              "Wednesday",
              "Thursday",
              "Friday"
            ],
            "opens": "09:00",
            "closes": "18:00"
          },
          "priceRange": "€€",
          "areaServed": {
            "@@type": "Country",
            "name": "Worldwide"
          }
        }
        </script>

        {{-- Offer Schema --}}
        <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "Offer",
          "itemOffered": {
            "@@type": "Service",
            "name": "Servizi di Sviluppo MVP",
            "description": "Sviluppo rapido di MVP e applicazioni web. Dall'idea al prodotto funzionante in 7 giorni.",
            "provider": {
              "@@type": "Person",
              "@@id": "https://hafiz.dev/#person"
            },
            "serviceType": "Sviluppo Web",
            "areaServed": "Worldwide"
          },
          "availability": "https://schema.org/InStock",
          "priceSpecification": {
            "@@type": "PriceSpecification",
            "priceCurrency": "EUR"
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
              "name": "Cos'è esattamente un MVP?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Un MVP (Minimum Viable Product) è una versione funzionante del tuo prodotto con solo le funzionalità principali necessarie per risolvere il problema centrale. Non è un prototipo o un mockup — è un prodotto reale e funzionale che i tuoi utenti possono effettivamente utilizzare. L'obiettivo è lanciare velocemente, ottenere feedback reali e iterare da lì."
              }
            },
            {
              "@@type": "Question",
              "name": "E se non sono tecnico?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Perfetto — non devi esserlo. Tu porti l'idea, io mi occupo di tutto il lato tecnico. Trasformo la tua visione in un prodotto funzionante e ti spiego tutto in modo semplice e chiaro."
              }
            },
            {
              "@@type": "Question",
              "name": "Come puoi costruire così velocemente?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Oltre 9 anni di esperienza più strumenti AI moderni. Ho costruito decine di prodotti, quindi so esattamente cosa sviluppare e cosa tralasciare. Nessun tempo sprecato in funzionalità inutili. Mi concentro su ciò che conta per il lancio."
              }
            },
            {
              "@@type": "Question",
              "name": "Che tipi di prodotti puoi costruire in 7 giorni?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Applicazioni web, piattaforme SaaS, app mobile, landing page con waitlist, pannelli amministrativi, estensioni Chrome e strumenti basati su AI. Integrazioni complesse o sistemi enterprise richiedono più tempo — ne parliamo durante la chiamata."
              }
            },
            {
              "@@type": "Question",
              "name": "Possiedo tutto il codice e la proprietà intellettuale?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Sì, al 100%. Una volta completato e pagato il progetto, è tutto tuo. Codice sorgente, design e proprietà intellettuale. Nessun costo di licenza, nessuna royalty, nessun vincolo."
              }
            },
            {
              "@@type": "Question",
              "name": "Qual è la struttura di pagamento?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "50% in anticipo per iniziare, 50% al completamento prima del lancio. Per progetti più grandi possiamo suddividere in milestone. Accetto bonifico bancario e PayPal. Prezzi chiari fin dall'inizio, nessuna fattura a sorpresa."
              }
            },
            {
              "@@type": "Question",
              "name": "E se ho bisogno di modifiche dopo il lancio?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Tutti i pacchetti includono 2 settimane di correzione bug dopo la consegna. Per nuove funzionalità o sviluppo continuativo, possiamo discutere un accordo mensile o un prezzo per singola funzionalità. La maggior parte dei clienti torna per la Fase 2 dopo aver validato la propria idea."
              }
            },
            {
              "@@type": "Question",
              "name": "Lavori con clienti in tutta Italia?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Assolutamente. Sono basato a Torino ma lavoro con clienti in tutta Italia e anche all'estero. La comunicazione avviene via email, Slack o videochiamate — qualsiasi cosa funzioni per te. Essendo in Italia, non ci sono problemi di fuso orario e posso comunicare direttamente in italiano."
              }
            },
            {
              "@@type": "Question",
              "name": "Perché scegliere un freelancer invece di un'agenzia?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Con un freelancer senior lavori direttamente con chi scrive il codice — nessun intermediario, nessun project manager che fa da filtro. Questo significa comunicazione più veloce, meno incomprensioni e prezzi più competitivi. Le agenzie hanno costi strutturali che si riflettono sui prezzi. Con me ottieni la stessa qualità (o superiore) a una frazione del costo, con tempi di consegna molto più rapidi."
              }
            }
          ]
        }
        </script>
    @endpush

    <div class="relative z-10">
        <!-- Hero Section -->
        <section class="min-h-screen flex items-center justify-center px-4 -mt-16 pt-16 pb-20" id="home">
            <div class="max-w-4xl mx-auto text-center">
                <!-- Trust Badge -->
                <div class="mb-6 mt-3">
                    <span
                        class="inline-flex items-center gap-2 px-4 py-2 bg-gold/10 border border-gold/30 rounded-full text-gold text-sm font-medium">
                        <span>🚀</span>
                        <span>Prodotti utilizzati da migliaia di persone</span>
                    </span>
                </div>

                <p class="text-lg md:text-xl text-gold mb-4 font-medium">
                    Dall'idea al prodotto funzionante
                </p>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-light mb-6 leading-tight">
                    Hai un'idea?<br class="hidden sm:block">
                    La realizzo in 7 giorni.
                </h1>

                <div class="text-base md:text-lg text-light-muted max-w-2xl mx-auto mb-8 leading-relaxed space-y-4">
                    <p>
                        Smetti di aspettare mesi per il tuo prodotto. Sviluppo MVP, web app, app mobile e piattaforme SaaS velocemente. Codice reale che scala.
                    </p>
                    <p>
                        <strong class="text-light">Sono basato a Torino</strong> — nessun problema di fuso orario, comunicazione diretta in italiano. Ho creato app utilizzate da oltre 500 scuole, estensioni Chrome con migliaia di utenti e strumenti AI che funzionano davvero.
                    </p>
                    <p class="font-medium text-gold">
                        Prezzo fisso. Nessuna sorpresa. Parliamone.
                    </p>
                </div>

                <!-- Dual CTAs -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                    <a href="https://calendly.com/hafizzeeshan619/15min" target="_blank"
                        class="px-8 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5 text-center">
                        Prenota una Consulenza Gratuita
                    </a>
                    <a href="#portfolio"
                        class="px-8 py-4 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300 text-center">
                        Vedi i Miei Lavori →
                    </a>
                </div>

                <!-- Trust Badges Row -->
                <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-light-muted text-sm">
                    <span class="flex items-center gap-1">
                        <span class="text-green-500">✓</span>
                        <span>Consegna in 7 Giorni</span>
                    </span>
                    <span class="hidden sm:inline text-gold/30">•</span>
                    <span class="flex items-center gap-1">
                        <span class="text-green-500">✓</span>
                        <span>Il Codice è Tuo</span>
                    </span>
                    <span class="hidden sm:inline text-gold/30">•</span>
                    <span class="flex items-center gap-1">
                        <span class="text-green-500">✓</span>
                        <span>Pubblicato e Live</span>
                    </span>
                    <span class="hidden sm:inline text-gold/30">•</span>
                    <span class="flex items-center gap-1">
                        <span class="text-green-500">✓</span>
                        <span>2 Settimane di Bug Fix</span>
                    </span>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section class="py-20 px-4 bg-darkBg" id="services">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Prezzi Chiari. Nessuna Sorpresa.</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    Scegli ciò che si adatta alla tua fase. Tutti i pacchetti includono deployment e 2 settimane di correzione bug.
                </p>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Package 1: Lancio Veloce -->
                    <div
                        class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 flex flex-col">
                        <div class="text-4xl mb-4">🚀</div>
                        <h3 class="text-xl font-bold text-light mb-1">Lancio Veloce</h3>
                        <p class="text-gold text-2xl font-bold mb-1">Da €750</p>
                        <p class="text-light-muted text-sm mb-3">2-3 giorni</p>
                        <p class="text-light-muted text-sm mb-4 leading-relaxed">
                            Landing Page + Waitlist — Perfetto per validare la tua idea
                        </p>
                        <ul class="text-light-muted text-sm space-y-2 mb-6 flex-grow">
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Design personalizzato per il tuo brand</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Raccolta email con notifiche</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Setup analytics (Google Analytics, Plausible)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Pubblicato e live sul tuo dominio</span>
                            </li>
                        </ul>
                        <a href="#contact"
                            class="block w-full px-6 py-3 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300 text-center mt-auto">
                            Iniziamo
                        </a>
                    </div>

                    <!-- Package 2: MVP in 7 Giorni (Più Popolare) -->
                    <div
                        class="bg-gradient-card p-6 rounded-xl border-2 border-gold shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 relative flex flex-col">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2">
                            <span class="bg-gold text-darkBg text-xs font-bold px-3 py-1 rounded-full">PIÙ
                                POPOLARE</span>
                        </div>
                        <div class="text-4xl mb-4">⭐</div>
                        <h3 class="text-xl font-bold text-light mb-1">MVP in 7 Giorni</h3>
                        <p class="text-gold text-2xl font-bold mb-1">Da €2.000</p>
                        <p class="text-light-muted text-sm mb-3">7 giorni</p>
                        <p class="text-light-muted text-sm mb-4 leading-relaxed">
                            La tua idea, funzionante e online
                        </p>
                        <ul class="text-light-muted text-sm space-y-2 mb-6 flex-grow">
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Funzionalità principali sviluppate su misura</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Autenticazione utenti</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Integrazione database</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Pannello admin base</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Design responsive</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>100% proprietà del codice sorgente</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Deploy in produzione</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Documentazione base</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>2 settimane di correzione bug incluse</span>
                            </li>
                        </ul>
                        <a href="#contact"
                            class="block w-full px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 text-center mt-auto">
                            Iniziamo
                        </a>
                    </div>

                    <!-- Package 3: Prodotto Completo -->
                    <div
                        class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 flex flex-col">
                        <div class="text-4xl mb-4">💎</div>
                        <h3 class="text-xl font-bold text-light mb-1">Prodotto Completo</h3>
                        <p class="text-gold text-2xl font-bold mb-1">Da €5.000</p>
                        <p class="text-light-muted text-sm mb-3">2-3 settimane</p>
                        <p class="text-light-muted text-sm mb-4 leading-relaxed">
                            SaaS completo pronto per monetizzare
                        </p>
                        <ul class="text-light-muted text-sm space-y-2 mb-6 flex-grow">
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Tutto nel pacchetto MVP</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Integrazione Stripe/pagamenti</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Dashboard utente con tutte le funzionalità</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Notifiche email</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Pannello amministrativo</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Integrazioni API</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Ottimizzazione performance</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>100% proprietà del codice sorgente</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>1 mese di supporto</span>
                            </li>
                        </ul>
                        <a href="#contact"
                            class="block w-full px-6 py-3 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300 text-center mt-auto">
                            Iniziamo
                        </a>
                    </div>
                </div>

                <p class="text-light-muted text-center mt-8 max-w-2xl mx-auto">
                    Ogni progetto è diverso. Questi sono punti di partenza. Prenota una chiamata gratuita per discutere le tue esigenze specifiche.
                </p>
            </div>
        </section>

        <!-- Portfolio Section -->
        <section class="py-20 px-4 bg-darkBg-secondary" id="portfolio">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Progetti in Evidenza</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    Alcuni dei prodotti SaaS e progetti cliente che ho realizzato negli anni.
                </p>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Project 1: StudyLab -->
                    <div
                        class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/studylab-screenshot.webp" alt="StudyLab.app"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent">
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">StudyLab.app</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Generatore di quiz e flashcard basato su AI da PDF
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">OpenAI</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Stripe</span>
                            </div>
                            <a href="https://studylab.app/" target="_blank"
                                class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                Vedi Progetto →
                            </a>
                        </div>
                    </div>

                    <!-- Project 2: Prompt Optimizer -->
                    <div
                        class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/promptoptimizer-screenshot.webp" alt="Prompt Optimizer"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent">
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">Prompt Optimizer</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Strumento gratuito di miglioramento prompt basato su AI per risultati migliori
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vue.js</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">OpenAI</span>
                            </div>
                            <a href="https://promptoptimizer.tools/" target="_blank"
                                class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                Vedi Progetto →
                            </a>
                        </div>
                    </div>

                    <!-- Project 3: MakeThreads -->
                    <div
                        class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/makethreads.webp" alt="MakeThreads"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent">
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">MakeThreads</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Trasforma video YouTube in thread Twitter/X, tweet e articoli
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Chrome
                                    Ext</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">JavaScript</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">AI
                                    APIs</span>
                            </div>
                            <a href="https://makethreads.app" target="_blank"
                                class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                Vedi Progetto →
                            </a>
                        </div>
                    </div>

                    <!-- Project 4: ReplyGenius -->
                    <div
                        class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/replygenius.io-screenshot.webp" alt="ReplyGenius.io"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent">
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">ReplyGenius.io</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Generatore di risposte per social media basato su AI con marketing contestuale
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Chrome
                                    Ext</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">AI
                                    APIs</span>
                            </div>
                            <a href="https://replygenius.io" target="_blank"
                                class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                Vedi Progetto →
                            </a>
                        </div>
                    </div>

                    <!-- Project 5: Claude Chat Manager -->
                    <div
                        class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/claude-chat-manager-screenshot.webp" alt="Claude Chat Manager"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent">
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">Claude Chat Manager</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Estensione Chrome per organizzare le conversazioni di Claude.ai
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Chrome
                                    Ext</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">JavaScript</span>
                            </div>
                            <a href="https://chromewebstore.google.com/detail/claude-chat-manager/mimbihfbpnglcblklikcjmibobgmlknf"
                                target="_blank"
                                class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                Vedi Progetto →
                            </a>
                        </div>
                    </div>

                    <!-- Project 6: Robobook.ai -->
                    <div
                        class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/robobook-ai-screenshot.webp" alt="Robobook.ai"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent">
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">Robobook.ai</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Piattaforma AI per scrivere automaticamente libri e generare royalty
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">OpenAI</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Stripe</span>
                            </div>
                            <a href="https://robobook.ai/" target="_blank"
                                class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                Vedi Progetto →
                            </a>
                        </div>
                    </div>

                    <!-- Project 7: Quantico Business -->
                    <div
                        class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/quantico-screenshot.webp" alt="Quantico Business"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent">
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">Quantico Business</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Piattaforma di valutazione e assessment aziendale
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vue.js</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vuetify</span>
                            </div>
                            <a href="https://assessment.quanticobusiness.com/" target="_blank"
                                class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                Vedi Progetto →
                            </a>
                        </div>
                    </div>

                    <!-- Project 8: Get Impressed -->
                    <div
                        class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/getimpressed-screenshot.webp" alt="Get Impressed"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent">
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">Get Impressed</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Piattaforma e-commerce per prodotti promozionali e regali aziendali
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">PHP</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">jQuery</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">MySQL</span>
                            </div>
                            <a href="https://getimpressed.eu/" target="_blank"
                                class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                Vedi Progetto →
                            </a>
                        </div>
                    </div>

                    <!-- Project 9: GhibliAIart -->
                    <div
                        class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/ghibliaiart-screenshot.webp" alt="GhibliAIart.com"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent">
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">GhibliAIart.com</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Piattaforma AI per generare immagini in stile Ghibli
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vue.js</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">OpenAI</span>
                            </div>
                            <a href="https://ghibliaiart.com/" target="_blank"
                                class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                Vedi Progetto →
                            </a>
                        </div>
                    </div>

                    <!-- Project 10: AI Tools Universe -->
                    <div
                        class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/aitoolsuniverse-screenshot.webp" alt="AI Tools Universe"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent">
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">AI Tools Universe</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Directory completa di strumenti e risorse AI
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Bootstrap</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">htmx</span>
                            </div>
                            <a href="https://aitoolsuniverse.com/" target="_blank"
                                class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                Vedi Progetto →
                            </a>
                        </div>
                    </div>

                    <!-- Project 11: PianetaGaia -->
                    <div
                        class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/pianetagaia-screenshot.webp" alt="PianetaGaia"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent">
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">PianetaGaia</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Piattaforma agenzia viaggi per tour di gruppo ed esperienze di viaggio personalizzate
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">PHP</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">jQuery</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">MySQL</span>
                            </div>
                            <a href="https://www.pianetagaia.it/" target="_blank"
                                class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                Vedi Progetto →
                            </a>
                        </div>
                    </div>

                    <!-- Project 12: Soluzione Tasse -->
                    <div
                        class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/soluzione-tasse-screenshot.webp" alt="Soluzione Tasse"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy" width="1200" height="900">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent">
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">Soluzione Tasse Tools</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Piattaforma di calcolo tasse e strumenti aziendali
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vue.js</span>
                                <span
                                    class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vuetify</span>
                            </div>
                            <a href="https://tools-ced.soluzionetasse.com/" target="_blank"
                                class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                Vedi Progetto →
                            </a>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <a href="#contact"
                        class="inline-block px-8 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5">
                        Discuti il Tuo Progetto
                    </a>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-20 px-4 bg-darkBg" id="faq">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Domande Frequenti</h2>
                <p class="text-light-muted text-center mb-12">
                    Tutto quello che devi sapere prima di iniziare a lavorare insieme.
                </p>

                <div class="space-y-4">
                    <!-- FAQ 1 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Cos'è esattamente un MVP?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Un MVP (Minimum Viable Product) è una versione funzionante del tuo prodotto con solo le funzionalità principali necessarie per risolvere il problema centrale. Non è un prototipo o un mockup — è un prodotto reale e funzionale che i tuoi utenti possono effettivamente utilizzare. L'obiettivo è lanciare velocemente, ottenere feedback reali e iterare da lì.</p>
                        </div>
                    </details>

                    <!-- FAQ 2 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">E se non sono tecnico?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Perfetto — non devi esserlo. Tu porti l'idea, io mi occupo di tutto il lato tecnico. Trasformo la tua visione in un prodotto funzionante e ti spiego tutto in modo semplice e chiaro.</p>
                        </div>
                    </details>

                    <!-- FAQ 3 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Come puoi costruire così velocemente?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Oltre 9 anni di esperienza più strumenti AI moderni. Ho costruito decine di prodotti, quindi so esattamente cosa sviluppare e cosa tralasciare. Nessun tempo sprecato in funzionalità inutili. Mi concentro su ciò che conta per il lancio.</p>
                        </div>
                    </details>

                    <!-- FAQ 4 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Che tipi di prodotti puoi costruire in 7 giorni?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Applicazioni web, piattaforme SaaS, app mobile, landing page con waitlist, pannelli amministrativi, estensioni Chrome e strumenti basati su AI. Integrazioni complesse o sistemi enterprise richiedono più tempo — ne parliamo durante la chiamata.</p>
                        </div>
                    </details>

                    <!-- FAQ 5 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Possiedo tutto il codice e la proprietà intellettuale?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Sì, al 100%. Una volta completato e pagato il progetto, è tutto tuo. Codice sorgente, design e proprietà intellettuale. Nessun costo di licenza, nessuna royalty, nessun vincolo. È tuo da tenere, modificare o vendere.</p>
                        </div>
                    </details>

                    <!-- FAQ 6 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Qual è la struttura di pagamento?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>50% in anticipo per iniziare, 50% al completamento prima del lancio. Per progetti più grandi possiamo suddividere in milestone. Accetto bonifico bancario e PayPal. Prezzi chiari fin dall'inizio, nessuna fattura a sorpresa.</p>
                        </div>
                    </details>

                    <!-- FAQ 7 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">E se ho bisogno di modifiche dopo il lancio?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Tutti i pacchetti includono 2 settimane di correzione bug dopo la consegna. Per nuove funzionalità o sviluppo continuativo, possiamo discutere un accordo mensile o un prezzo per singola funzionalità. La maggior parte dei clienti torna per la Fase 2 dopo aver validato la propria idea.</p>
                        </div>
                    </details>

                    <!-- FAQ 8 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Lavori con clienti in tutta Italia?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Assolutamente. Sono basato a Torino ma lavoro con clienti in tutta Italia e anche all'estero. La comunicazione avviene via email, Slack o videochiamate — qualsiasi cosa funzioni per te. Essendo in Italia, non ci sono problemi di fuso orario e posso comunicare direttamente in italiano.</p>
                        </div>
                    </details>

                    <!-- FAQ 9 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Perché scegliere un freelancer invece di un'agenzia?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Con un freelancer senior lavori direttamente con chi scrive il codice — nessun intermediario, nessun project manager che fa da filtro. Questo significa comunicazione più veloce, meno incomprensioni e prezzi più competitivi. Le agenzie hanno costi strutturali che si riflettono sui prezzi. Con me ottieni la stessa qualità (o superiore) a una frazione del costo, con tempi di consegna molto più rapidi.</p>
                        </div>
                    </details>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="py-20 px-4 bg-darkBg-secondary" id="contact">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Mettiamoci in Contatto</h2>
                <p class="text-light-muted text-center mb-12">
                    Hai un progetto in mente? Parliamo di come posso aiutarti a raggiungere i tuoi obiettivi.
                </p>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Contact Info -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card">
                        <h3 class="text-2xl font-bold text-light mb-6">Informazioni di Contatto</h3>

                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="text-gold text-xl">📧</div>
                                <div>
                                    <h4 class="text-light font-semibold mb-1">Email</h4>
                                    <a href="mailto:contact@hafiz.dev"
                                        class="text-light-muted hover:text-gold transition-colors">contact@hafiz.dev</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="text-gold text-xl">📍</div>
                                <div>
                                    <h4 class="text-light font-semibold mb-1">Sede</h4>
                                    <p class="text-light-muted">Torino, Italia</p>
                                </div>
                            </div>

                            <!-- Social Links -->
                            <div class="pt-4 border-t border-gold/20">
                                <h4 class="text-light font-semibold mb-3">Seguimi</h4>
                                <div class="flex gap-4">
                                    <a href="https://github.com/hzeeshan" target="_blank"
                                        class="text-light-muted hover:text-gold transition-colors" title="GitHub">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                        </svg>
                                    </a>
                                    <a href="https://www.linkedin.com/in/hafiz-riaz-777501150/" target="_blank"
                                        class="text-light-muted hover:text-gold transition-colors" title="LinkedIn">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Contact -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card">
                        <h3 class="text-2xl font-bold text-light mb-6">Pronto a Costruire?</h3>

                        <p class="text-light-muted mb-6 leading-relaxed">
                            Prenota una chiamata gratuita di 15 minuti. Discuteremo della tua idea, ti dirò onestamente se posso aiutare e riceverai un preventivo fisso entro 24 ore.
                        </p>

                        <div class="space-y-3">
                            <a href="https://calendly.com/hafizzeeshan619/15min" target="_blank"
                                class="block w-full px-6 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 text-center text-lg">
                                Prenota una Consulenza Gratuita
                            </a>
                            <a href="tel:+393888255329"
                                class="block w-full px-6 py-4 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300 text-center text-lg">
                                📱 (+39) 3888255329
                            </a>
                        </div>

                        <p class="text-sm text-gold font-medium mt-6 text-center">
                            🟢 Accetto nuovi progetti
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
