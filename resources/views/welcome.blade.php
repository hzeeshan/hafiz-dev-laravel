<x-layout>
    <x-slot:title>Hafiz Riaz | I Build Your MVP in 7 Days | Web Apps & SaaS Development</x-slot:title>
    <x-slot:description>Got an idea? I'll build it in 7 days. From concept to working product. I've shipped apps used by
        500+ schools. Fixed price, no surprises. Based in Italy, working worldwide.</x-slot:description>
    <x-slot:keywords>MVP development, build MVP fast, startup developer, rapid prototyping, Laravel developer Italy,
        Vue.js developer, SaaS development, Full stack developer Turin, Freelance web developer</x-slot:keywords>
    <x-slot:canonical>{{ url('/') }}</x-slot:canonical>

    {{-- Homepage Open Graph --}}
    <x-slot:ogTitle>Hafiz Riaz | I Build Your MVP in 7 Days | Web Apps & SaaS Development</x-slot:ogTitle>
    <x-slot:ogDescription>Got an idea? I'll build it in 7 days. From concept to working product. Fixed price, no
        surprises.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/') }}</x-slot:ogUrl>
    <x-slot:ogImage>{{ asset('profile-photo.png') }}</x-slot:ogImage>

    @push('schemas')
        {{-- Professional Service Schema --}}
        <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "ProfessionalService",
          "name": "Hafiz Riaz - MVP Development Services",
          "image": "https://hafiz.dev/profile-photo.png",
          "@@id": "https://hafiz.dev",
          "url": "https://hafiz.dev",
          "telephone": "+393888255329",
          "email": "contact@@hafiz.dev",
          "address": {
            "@@type": "PostalAddress",
            "streetAddress": "",
            "addressLocality": "Turin",
            "addressRegion": "Piedmont",
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
            "name": "MVP Development Services",
            "description": "Rapid MVP and web application development. From idea to working product in 7 days.",
            "provider": {
              "@@type": "Person",
              "@@id": "https://hafiz.dev/#person"
            },
            "serviceType": "Web Development",
            "areaServed": "Worldwide"
          },
          "availability": "https://schema.org/InStock",
          "priceSpecification": {
            "@@type": "PriceSpecification",
            "priceCurrency": "EUR"
          }
        }
        </script>
    @endpush

    <div class="relative z-10">
        <!-- Hero Section  -->
        <section class="min-h-screen flex items-center justify-center px-4 -mt-16 pt-16 pb-20" id="home">
            <div class="max-w-4xl mx-auto text-center">
                <!-- Trust Badge -->
                <div class="mb-6 mt-3">
                    <span
                        class="inline-flex items-center gap-2 px-4 py-2 bg-gold/10 border border-gold/30 rounded-full text-gold text-sm font-medium">
                        <span>🚀</span>
                        <span>Shipped products used by thousands</span>
                    </span>
                </div>

                <p class="text-lg md:text-xl text-gold mb-4 font-medium">
                    From idea to working product
                </p>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-light mb-6 leading-tight">
                    Got an idea?<br class="hidden sm:block">
                    I'll build it in 7 days.
                </h1>

                <div class="text-base md:text-lg text-light-muted max-w-2xl mx-auto mb-8 leading-relaxed space-y-4">
                    <p>
                        Stop waiting months for your product. I build MVPs, web apps, mobile apps, and SaaS platforms
                        fast. Real code that scales. </p>
                    {{-- <p>
                        I've shipped apps used by 500+ schools, Chrome extensions with thousands of users, and AI tools
                        that actually work. Now I'll build yours.
                    </p> --}}
                    <p class="font-medium text-gold">
                        Fixed price. No surprises. Let's talk.
                    </p>
                </div>

                <!-- Dual CTAs -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                    <a href="https://calendly.com/hafizzeeshan619/15min" target="_blank"
                        class="px-8 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5 text-center">
                        Book a Free Call
                    </a>
                    <a href="#portfolio"
                        class="px-8 py-4 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300 text-center">
                        See My Work →
                    </a>
                </div>

                <!-- Trust Badges Row -->
                <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-light-muted text-sm">
                    <span class="flex items-center gap-1">
                        <span class="text-green-500">✓</span>
                        <span>7-Day Delivery</span>
                    </span>
                    <span class="hidden sm:inline text-gold/30">•</span>
                    <span class="flex items-center gap-1">
                        <span class="text-green-500">✓</span>
                        <span>You Own the Code</span>
                    </span>
                    <span class="hidden sm:inline text-gold/30">•</span>
                    <span class="flex items-center gap-1">
                        <span class="text-green-500">✓</span>
                        <span>Deployed & Live</span>
                    </span>
                    <span class="hidden sm:inline text-gold/30">•</span>
                    <span class="flex items-center gap-1">
                        <span class="text-green-500">✓</span>
                        <span>2 Weeks Bug Fixes Included</span>
                    </span>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section class="py-20 px-4 bg-darkBg" id="services">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Clear Pricing. No Surprises.</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    Choose what fits your stage. All packages include deployment and 2 weeks of bug fixes.
                </p>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Package 1: Launch Fast -->
                    <div
                        class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 flex flex-col">
                        <div class="text-4xl mb-4">🚀</div>
                        <h3 class="text-xl font-bold text-light mb-1">Launch Fast</h3>
                        <p class="text-gold text-2xl font-bold mb-1">From €750</p>
                        <p class="text-light-muted text-sm mb-3">2-3 days</p>
                        <p class="text-light-muted text-sm mb-4 leading-relaxed">
                            Landing Page + Waitlist - Perfect for validating your idea
                        </p>
                        <ul class="text-light-muted text-sm space-y-2 mb-6 flex-grow">
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Custom design matching your brand</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Email capture with notifications</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Analytics setup (Google Analytics, Plausible)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Deployed and live on your domain</span>
                            </li>
                        </ul>
                        <a href="#contact"
                            class="block w-full px-6 py-3 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300 text-center mt-auto">
                            Get Started
                        </a>
                    </div>

                    <!-- Package 2: MVP in 7 Days (Most Popular) -->
                    <div
                        class="bg-gradient-card p-6 rounded-xl border-2 border-gold shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 relative flex flex-col">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2">
                            <span class="bg-gold text-darkBg text-xs font-bold px-3 py-1 rounded-full">MOST
                                POPULAR</span>
                        </div>
                        <div class="text-4xl mb-4">⭐</div>
                        <h3 class="text-xl font-bold text-light mb-1">MVP in 7 Days</h3>
                        <p class="text-gold text-2xl font-bold mb-1">From €2,000</p>
                        <p class="text-light-muted text-sm mb-3">7 days</p>
                        <p class="text-light-muted text-sm mb-4 leading-relaxed">
                            Your idea, working and live
                        </p>
                        <ul class="text-light-muted text-sm space-y-2 mb-6 flex-grow">
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Core features built to spec</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>User authentication</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Database integration</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Basic admin dashboard</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Responsive design</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>100% source code ownership</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Deployed to production</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Basic documentation</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>2 weeks of bug fixes included</span>
                            </li>
                        </ul>
                        <a href="#contact"
                            class="block w-full px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 text-center mt-auto">
                            Get Started
                        </a>
                    </div>

                    <!-- Package 3: Full Product -->
                    <div
                        class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 flex flex-col">
                        <div class="text-4xl mb-4">💎</div>
                        <h3 class="text-xl font-bold text-light mb-1">Full Product</h3>
                        <p class="text-gold text-2xl font-bold mb-1">From €5,000</p>
                        <p class="text-light-muted text-sm mb-3">2-3 weeks</p>
                        <p class="text-light-muted text-sm mb-4 leading-relaxed">
                            Complete SaaS ready to monetize
                        </p>
                        <ul class="text-light-muted text-sm space-y-2 mb-6 flex-grow">
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Everything in MVP package</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Stripe/payment integration</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>User dashboard with full features</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Email notifications</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Admin panel</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>API integrations</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>Performance optimization</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>100% source code ownership</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold">•</span>
                                <span>1 month of support</span>
                            </li>
                        </ul>
                        <a href="#contact"
                            class="block w-full px-6 py-3 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300 text-center mt-auto">
                            Get Started
                        </a>
                    </div>
                </div>

                <p class="text-light-muted text-center mt-8 max-w-2xl mx-auto">
                    Every project is different. These are starting points. Book a free call to discuss your specific
                    needs.
                </p>
            </div>
        </section>

        <!-- Portfolio Section -->
        <section class="py-20 px-4 bg-darkBg-secondary" id="portfolio">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Featured Projects</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    Some of the SaaS products and client projects I've built over the years.
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
                                AI-based quiz and flashcards generator from PDFs
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
                                View Project →
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
                                Free AI-powered prompt enhancement tool for better AI results
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
                                View Project →
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
                                Turn YouTube videos into Twitter/X threads, tweets, and articles
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
                                View Project →
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
                                AI-powered social media reply generator with contextual marketing
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
                                View Project →
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
                                Chrome extension for organizing Claude.ai conversations
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
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 4: Robobook.ai -->
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
                                AI platform for automatically writing books and generating royalties
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
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 5: Quantico Business -->
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
                                Business assessment and evaluation platform
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
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 6: Get Impressed -->
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
                                E-commerce platform for promotional products and corporate gifts
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
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 7: GhibliAIart -->
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
                                AI art platform for generating Ghibli-style images
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
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 8: AI Tools Universe -->
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
                                Comprehensive directory of AI tools and resources
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
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 9: PianetaGaia -->
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
                                Travel agency platform for group tours and custom travel experiences
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
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 10: Soluzione Tasse -->
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
                                Tax calculation and business tools platform
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
                                View Project →
                            </a>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <a href="#contact"
                        class="inline-block px-8 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5">
                        Discuss Your Project
                    </a>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-20 px-4 bg-darkBg" id="faq">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Common Questions</h2>
                <p class="text-light-muted text-center mb-12">
                    Everything you need to know before we start working together.
                </p>

                <div class="space-y-4">
                    <!-- FAQ 1 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">What exactly is an MVP?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>An MVP (Minimum Viable Product) is a working version of your product with just the core
                                features needed to solve the main problem. It's not a prototype or mockup. It's a real,
                                functional product your users can actually use. The goal is to launch fast, get real
                                feedback, and iterate from there.</p>
                        </div>
                    </details>

                    <!-- FAQ 2 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">What if I'm not technical?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Perfect - you don't need to be. You bring the idea, I handle everything technical. I'll
                                translate your vision into a working product and explain things in plain language along
                                the way.</p>
                        </div>
                    </details>

                    <!-- FAQ 3 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">How can you build so fast?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>9+ years of experience plus modern AI tools. I've built dozens of products, so I know
                                exactly what to build and what to skip. No wasted time on unnecessary features. I focus
                                on what matters for launch, not perfect code that nobody sees.</p>
                        </div>
                    </details>

                    <!-- FAQ 4 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">What types of products can you build in 7
                                days?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Web applications, SaaS platforms, mobile apps, landing pages with waitlists, admin
                                dashboards, Chrome extensions, and AI-powered tools. Complex integrations or enterprise
                                systems need more time. We'd figure that out on our call.</p>
                        </div>
                    </details>

                    <!-- FAQ 5 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Do I own all the code and intellectual
                                property?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Yes, 100%. Once the project is complete and paid, you own everything. All source code,
                                designs, and IP. No licensing fees. No royalties. No lock-in. It's yours to keep,
                                modify, or sell.</p>
                        </div>
                    </details>

                    <!-- FAQ 6 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">What's the payment structure?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>50% upfront to start, 50% on completion before launch. For larger projects, we can split
                                into milestones. I accept bank transfer and PayPal. Clear pricing upfront, no surprise
                                invoices.</p>
                        </div>
                    </details>

                    <!-- FAQ 7 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">What if I need changes after launch?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>All packages include 2 weeks of bug fixes after delivery. For new features or ongoing
                                development, we can discuss a monthly retainer or per-feature pricing. Most clients come
                                back for Phase 2 once they've validated their idea.</p>
                        </div>
                    </details>

                    <!-- FAQ 8 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Do you work with international clients?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Absolutely. I work with clients worldwide. Communication happens via email, Slack, or
                                video calls. Whatever works for you. I'm based in Italy (CET timezone) so I overlap well
                                with both European and US clients.</p>
                        </div>
                    </details>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="py-20 px-4 bg-darkBg-secondary" id="contact">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Get In Touch</h2>
                <p class="text-light-muted text-center mb-12">
                    Have a project in mind? Let's discuss how I can help you achieve your goals.
                </p>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Contact Info -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card">
                        <h3 class="text-2xl font-bold text-light mb-6">Contact Information</h3>

                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="text-gold text-xl">📧</div>
                                <div>
                                    <h4 class="text-light font-semibold mb-1">Email</h4>
                                    <a href="https://calendly.com/hafizzeeshan619/15min" target="_blank"
                                        class="text-light-muted hover:text-gold transition-colors">contact@hafiz.dev</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="text-gold text-xl">📍</div>
                                <div>
                                    <h4 class="text-light font-semibold mb-1">Location</h4>
                                    <p class="text-light-muted">Torino, Italy</p>
                                </div>
                            </div>

                            <!-- Social Links -->
                            <div class="pt-4 border-t border-gold/20">
                                <h4 class="text-light font-semibold mb-3">Follow Me</h4>
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
                                    {{-- <a href="https://x.com/hafizzeeshan619" target="_blank"
                                        class="text-light-muted hover:text-gold transition-colors"
                                        title="X (Twitter)">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                        </svg>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Contact -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card">
                        <h3 class="text-2xl font-bold text-light mb-6">Ready to Build?</h3>

                        <p class="text-light-muted mb-6 leading-relaxed">
                            Book a free 15-minute call. We'll discuss your idea, I'll tell you honestly if I can help,
                            and you'll get a fixed quote within 24 hours.
                        </p>

                        <div class="space-y-3">
                            <a href="https://calendly.com/hafizzeeshan619/15min" target="_blank"
                                class="block w-full px-6 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 text-center text-lg">
                                Book a Free Call
                            </a>
                            <a href="tel:+393888255329"
                                class="block w-full px-6 py-4 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300 text-center text-lg">
                                📱 (+39) 3888255329
                            </a>
                        </div>

                        <p class="text-sm text-gold font-medium mt-6 text-center">
                            🟢 Accepting new projects
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
