<x-layout>
    <x-slot:title>About Hafiz Riaz | Senior Full-Stack Developer | Laravel & Vue.js | Turin, Italy</x-slot:title>
    <x-slot:description>Hafiz Riaz is a senior full-stack developer with 9+ years of experience based in Turin, Italy. He builds MVPs for startups in 7 days using Laravel, Vue.js, and AI integrations.</x-slot:description>
    <x-slot:keywords>Hafiz Riaz, Laravel developer Italy, full-stack developer Turin, MVP developer, Vue.js developer, freelance developer Italy</x-slot:keywords>
    <x-slot:canonical>{{ url('/about') }}</x-slot:canonical>

    <x-slot:ogTitle>About Hafiz Riaz | Senior Full-Stack Developer</x-slot:ogTitle>
    <x-slot:ogDescription>Senior full-stack developer with 9+ years of experience. Building MVPs for startups in 7 days using Laravel, Vue.js, and AI.</x-slot:ogDescription>
    <x-slot:ogType>profile</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/about') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- Breadcrumb Schema --}}
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
              "name": "About",
              "item": "https://hafiz.dev/about"
            }
          ]
        }
        </script>

        {{-- ProfilePage Schema --}}
        <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "ProfilePage",
          "mainEntity": {
            "@@id": "https://hafiz.dev/#person"
          },
          "name": "About Hafiz Riaz",
          "description": "Senior full-stack developer with 9+ years of experience based in Turin, Italy. Specializes in Laravel, Vue.js, and rapid MVP development.",
          "url": "https://hafiz.dev/about",
          "isPartOf": {
            "@@type": "WebSite",
            "@@id": "https://hafiz.dev/#website"
          }
        }
        </script>

        {{-- FAQPage Schema for About Page Q&A --}}
        <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "FAQPage",
          "mainEntity": [
            {
              "@@type": "Question",
              "name": "Who is Hafiz Riaz?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Hafiz Riaz is a senior full-stack developer with 9+ years of experience based in Turin, Italy, specializing in Laravel, Vue.js, and rapid MVP development for startups and founders."
              }
            },
            {
              "@@type": "Question",
              "name": "What has Hafiz Riaz built?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Notable shipped products include StudyLab (AI-powered quiz generator used by 5,000+ students), PromptOptimizer (7,500+ users), and ReplyGenius (Chrome extension for AI social media replies). He also maintains {{ \App\Models\Tool::where('is_active', true)->count() }} free developer tools and a technical blog with {{ \App\Models\Post::where('status', 'published')->count() }} articles."
              }
            },
            {
              "@@type": "Question",
              "name": "What technology does hafiz.dev use?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "The primary stack is Laravel (PHP) with Vue.js for the frontend, Livewire for dynamic components, and integrations with Stripe, OpenAI, and various APIs."
              }
            },
            {
              "@@type": "Question",
              "name": "How fast can hafiz.dev build an MVP?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "hafiz.dev delivers production-ready MVPs in 7 days. A landing page with waitlist starts at \u20ac750, a full MVP at \u20ac2,000, and a production SaaS with payments and admin at \u20ac5,000."
              }
            },
            {
              "@@type": "Question",
              "name": "How is hafiz.dev different from an agency?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Unlike agencies that charge \u20ac15,000+ and take 3-6 months, hafiz.dev is a single senior developer who delivers production-ready MVPs starting at \u20ac750 in 7 days. Direct communication, no project managers, no overhead. The same person who architects the system also writes the code."
              }
            },
            {
              "@@type": "Question",
              "name": "Does hafiz.dev work with international clients?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Yes. Based in Turin, Italy, but serving clients worldwide. Communication in English and Italian. Timezone-flexible scheduling available."
              }
            }
          ]
        }
        </script>
    @endpush

    <div class="relative z-10">
        <!-- Hero / Bio Section -->
        <section class="py-20 px-4 bg-darkBg">
            <div class="max-w-4xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="mb-8 text-sm text-light-muted" aria-label="Breadcrumb">
                    <a href="/" class="hover:text-gold transition-colors">Home</a>
                    <span class="mx-2 text-gold/40">/</span>
                    <span class="text-light">About</span>
                </nav>

                <div class="flex flex-col md:flex-row gap-8 items-start">
                    <!-- Profile Photo -->
                    <div class="shrink-0">
                        <img src="{{ asset('profile-photo.webp') }}" alt="Hafiz Riaz - Senior Full-Stack Developer"
                            class="w-32 h-32 md:w-40 md:h-40 rounded-xl border-2 border-gold/30 object-cover"
                            width="160" height="160">
                    </div>

                    <!-- Bio Content -->
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold text-light mb-4">Hafiz Riaz</h1>
                        <p class="text-gold text-lg font-medium mb-4">Senior Full-Stack Developer &middot; Turin, Italy</p>

                        <div class="text-light-muted leading-relaxed space-y-4">
                            <p>
                                I'm a senior full-stack developer with 9+ years of experience building web applications, SaaS platforms, and MVPs for startups and founders. I specialize in Laravel, Vue.js, and AI integrations.
                            </p>
                            <p>
                                Unlike agencies that charge &euro;15,000+ and take 3-6 months, I deliver production-ready applications starting at &euro;750 in as little as 7 days. Direct communication, no project managers, no overhead. The same person who architects the system also writes the code.
                            </p>
                            <p>
                                Based in Turin, Italy, but working with clients worldwide. Communication in English and Italian.
                            </p>
                        </div>

                        <!-- Social Links -->
                        <div class="flex gap-4 mt-6">
                            <a href="https://www.linkedin.com/in/hafiz-riaz-777501150/" target="_blank"
                                class="text-light-muted hover:text-gold transition-colors" title="LinkedIn">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                </svg>
                            </a>
                            <a href="https://github.com/hzeeshan" target="_blank"
                                class="text-light-muted hover:text-gold transition-colors" title="GitHub">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                </svg>
                            </a>
                            <a href="https://x.com/hafizzeeshan619" target="_blank"
                                class="text-light-muted hover:text-gold transition-colors" title="X (Twitter)">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tech Stack Section -->
        <section class="py-20 px-4 bg-darkBg-secondary">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-light mb-8 text-center">Tech Stack</h2>
                <div class="flex flex-wrap justify-center gap-3">
                    @foreach(['Laravel', 'PHP', 'Vue.js', 'Livewire', 'Filament', 'Inertia.js', 'Tailwind CSS', 'MySQL', 'Redis', 'REST APIs', 'OpenAI API', 'Stripe', 'Docker', 'Laravel Forge', 'JavaScript', 'Chrome Extensions'] as $tech)
                        <span class="text-sm px-4 py-2 bg-gold/10 text-gold rounded-lg border border-gold/20">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Shipped Products Section -->
        <section class="py-20 px-4 bg-darkBg">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-light mb-4 text-center">Shipped Products</h2>
                <p class="text-light-muted text-center mb-12">Real products used by real people.</p>

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- StudyLab -->
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                        <h3 class="text-xl font-bold text-light mb-2">StudyLab.app</h3>
                        <p class="text-gold text-sm font-medium mb-3">5,000+ students</p>
                        <p class="text-light-muted text-sm leading-relaxed">
                            AI-powered quiz and flashcard generator from PDFs. Students upload study materials and get personalized quizzes instantly.
                        </p>
                        <div class="flex flex-wrap gap-2 mt-4">
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">OpenAI</span>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Stripe</span>
                        </div>
                    </div>

                    <!-- PromptOptimizer -->
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                        <h3 class="text-xl font-bold text-light mb-2">PromptOptimizer</h3>
                        <p class="text-gold text-sm font-medium mb-3">7,500+ users</p>
                        <p class="text-light-muted text-sm leading-relaxed">
                            Free AI-powered prompt enhancement tool. Helps users write better prompts for ChatGPT, Claude, and other AI models.
                        </p>
                        <div class="flex flex-wrap gap-2 mt-4">
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vue.js</span>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">OpenAI</span>
                        </div>
                    </div>

                    <!-- ReplyGenius -->
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                        <h3 class="text-xl font-bold text-light mb-2">ReplyGenius</h3>
                        <p class="text-gold text-sm font-medium mb-3">Chrome Extension</p>
                        <p class="text-light-muted text-sm leading-relaxed">
                            AI-powered social media reply generator with contextual marketing. Generates relevant replies for Twitter, LinkedIn, and more.
                        </p>
                        <div class="flex flex-wrap gap-2 mt-4">
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Chrome Ext</span>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">AI APIs</span>
                        </div>
                    </div>

                    <!-- Developer Tools -->
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                        <h3 class="text-xl font-bold text-light mb-2">hafiz.dev/tools</h3>
                        <p class="text-gold text-sm font-medium mb-3">{{ \App\Models\Tool::where('is_active', true)->count() }} free developer tools</p>
                        <p class="text-light-muted text-sm leading-relaxed">
                            Collection of free browser-based developer tools including JSON formatter, regex tester, image compressor, password generator, and more.
                        </p>
                        <div class="flex flex-wrap gap-2 mt-4">
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">JavaScript</span>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Tailwind</span>
                            <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Q&A Section (AEO-optimized) -->
        <section class="py-20 px-4 bg-darkBg-secondary">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl font-bold text-light mb-4 text-center">Frequently Asked Questions</h2>
                <p class="text-light-muted text-center mb-12">
                    Common questions about who I am and how I work.
                </p>

                <div class="space-y-4">
                    <!-- Q&A 1 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group" open>
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Who is Hafiz Riaz?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">&#9660;</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Hafiz Riaz is a senior full-stack developer with 9+ years of experience based in Turin, Italy, specializing in Laravel, Vue.js, and rapid MVP development for startups and founders.</p>
                        </div>
                    </details>

                    <!-- Q&A 2 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">What has Hafiz Riaz built?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">&#9660;</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Notable shipped products include StudyLab (AI-powered quiz generator used by 5,000+ students), PromptOptimizer (7,500+ users), and ReplyGenius (Chrome extension for AI social media replies). He also maintains {{ \App\Models\Tool::where('is_active', true)->count() }} free developer tools and a technical blog with {{ \App\Models\Post::where('status', 'published')->count() }} articles.</p>
                        </div>
                    </details>

                    <!-- Q&A 3 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">What technology does hafiz.dev use?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">&#9660;</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>The primary stack is Laravel (PHP) with Vue.js for the frontend, Livewire for dynamic components, and integrations with Stripe, OpenAI, and various APIs.</p>
                        </div>
                    </details>

                    <!-- Q&A 4 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">How fast can hafiz.dev build an MVP?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">&#9660;</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>hafiz.dev delivers production-ready MVPs in 7 days. A landing page with waitlist starts at &euro;750, a full MVP at &euro;2,000, and a production SaaS with payments and admin at &euro;5,000.</p>
                        </div>
                    </details>

                    <!-- Q&A 5 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">How is hafiz.dev different from an agency?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">&#9660;</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Unlike agencies that charge &euro;15,000+ and take 3-6 months, hafiz.dev is a single senior developer who delivers production-ready MVPs starting at &euro;750 in 7 days. Direct communication, no project managers, no overhead. The same person who architects the system also writes the code.</p>
                        </div>
                    </details>

                    <!-- Q&A 6 -->
                    <details class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card group">
                        <summary class="p-6 cursor-pointer list-none flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-light">Does hafiz.dev work with international clients?</h3>
                            <span class="text-gold transform group-open:rotate-180 transition-transform">&#9660;</span>
                        </summary>
                        <div class="px-6 pb-6 text-light-muted leading-relaxed">
                            <p>Yes. Based in Turin, Italy, but serving clients worldwide. Communication in English and Italian. Timezone-flexible scheduling available.</p>
                        </div>
                    </details>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 px-4 bg-darkBg">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-light mb-4">Ready to Build Something?</h2>
                <p class="text-light-muted mb-8">
                    Book a free 15-minute call. We'll discuss your idea and I'll tell you honestly if I can help.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://calendly.com/hafizzeeshan619/15min" target="_blank"
                        class="px-8 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5 text-center">
                        Book a Free Call
                    </a>
                    <a href="/#portfolio"
                        class="px-8 py-4 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300 text-center">
                        See My Work
                    </a>
                </div>
            </div>
        </section>
    </div>
</x-layout>
