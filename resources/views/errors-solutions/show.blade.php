<x-layout>
    {{-- SEO Meta Tags --}}
    <x-slot:title>{{ $error['meta_title'] }} | Hafiz Riaz</x-slot:title>
    <x-slot:description>{{ $error['meta_description'] }}</x-slot:description>
    <x-slot:keywords>{{ $error['error_message'] }}, Laravel error, {{ $error['category'] }}, PHP error fix, Laravel troubleshooting</x-slot:keywords>
    <x-slot:canonical>{{ route('errors.show', $error['slug']) }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogType>article</x-slot:ogType>
    <x-slot:ogTitle>{{ $error['meta_title'] }}</x-slot:ogTitle>
    <x-slot:ogDescription>{{ $error['meta_description'] }}</x-slot:ogDescription>
    <x-slot:ogUrl>{{ route('errors.show', $error['slug']) }}</x-slot:ogUrl>

    @php
        // Category styling
        $categoryStyles = [
            'routing' => ['bg' => 'bg-green-500/20', 'badge' => 'bg-green-500/20 text-green-400 border-green-500/30'],
            'security' => ['bg' => 'bg-red-500/20', 'badge' => 'bg-red-500/20 text-red-400 border-red-500/30'],
            'database' => ['bg' => 'bg-blue-500/20', 'badge' => 'bg-blue-500/20 text-blue-400 border-blue-500/30'],
            'configuration' => ['bg' => 'bg-purple-500/20', 'badge' => 'bg-purple-500/20 text-purple-400 border-purple-500/30'],
            'autoloading' => ['bg' => 'bg-orange-500/20', 'badge' => 'bg-orange-500/20 text-orange-400 border-orange-500/30'],
            'filesystem' => ['bg' => 'bg-yellow-500/20', 'badge' => 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30'],
            'views' => ['bg' => 'bg-pink-500/20', 'badge' => 'bg-pink-500/20 text-pink-400 border-pink-500/30'],
            'eloquent' => ['bg' => 'bg-indigo-500/20', 'badge' => 'bg-indigo-500/20 text-indigo-400 border-indigo-500/30'],
            'performance' => ['bg' => 'bg-cyan-500/20', 'badge' => 'bg-cyan-500/20 text-cyan-400 border-cyan-500/30'],
            'api' => ['bg' => 'bg-teal-500/20', 'badge' => 'bg-teal-500/20 text-teal-400 border-teal-500/30'],
            'authentication' => ['bg' => 'bg-red-500/20', 'badge' => 'bg-red-500/20 text-red-400 border-red-500/30'],
            'authorization' => ['bg' => 'bg-amber-500/20', 'badge' => 'bg-amber-500/20 text-amber-400 border-amber-500/30'],
            'validation' => ['bg' => 'bg-lime-500/20', 'badge' => 'bg-lime-500/20 text-lime-400 border-lime-500/30'],
            'cache' => ['bg' => 'bg-emerald-500/20', 'badge' => 'bg-emerald-500/20 text-emerald-400 border-emerald-500/30'],
            'queues' => ['bg' => 'bg-violet-500/20', 'badge' => 'bg-violet-500/20 text-violet-400 border-violet-500/30'],
            'mail' => ['bg' => 'bg-rose-500/20', 'badge' => 'bg-rose-500/20 text-rose-400 border-rose-500/30'],
            'middleware' => ['bg' => 'bg-sky-500/20', 'badge' => 'bg-sky-500/20 text-sky-400 border-sky-500/30'],
            'scheduling' => ['bg' => 'bg-fuchsia-500/20', 'badge' => 'bg-fuchsia-500/20 text-fuchsia-400 border-fuchsia-500/30'],
            'broadcasting' => ['bg' => 'bg-orange-500/20', 'badge' => 'bg-orange-500/20 text-orange-400 border-orange-500/30'],
            'session' => ['bg' => 'bg-yellow-500/20', 'badge' => 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30'],
            'cli' => ['bg' => 'bg-gray-500/20', 'badge' => 'bg-gray-500/20 text-gray-400 border-gray-500/30'],
        ];
        $style = $categoryStyles[$error['category']] ?? ['bg' => 'bg-gold/20', 'badge' => 'bg-gold/20 text-gold border-gold/30'];

        // Language labels for code blocks
        $languageLabels = [
            'php' => 'PHP',
            'blade' => 'Blade',
            'bash' => 'Bash',
            'javascript' => 'JavaScript',
            'env' => 'ENV',
            'sql' => 'SQL',
            'json' => 'JSON',
            'ini' => 'INI',
            'nginx' => 'Nginx',
        ];
    @endphp

    {{-- Structured Data Schemas --}}
    @push('schemas')
        {{-- HowTo Schema --}}
        <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "HowTo",
          "name": {{ Js::from("How to fix " . $error['error_message']) }},
          "description": {{ Js::from($error['description']) }},
          "step": [
            @foreach($error['solutions'] as $index => $solution)
            {
              "@@type": "HowToStep",
              "position": {{ $index + 1 }},
              "name": {{ Js::from($solution['title']) }},
              "text": {{ Js::from($solution['title'] . ': ' . $solution['code']) }},
              "itemListElement": {
                "@@type": "HowToDirection",
                "text": {{ Js::from($solution['code']) }}
              }
            }@if(!$loop->last),@endif
            @endforeach
          ],
          "totalTime": "PT5M"
        }
        </script>

        {{-- TechArticle Schema --}}
        <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "TechArticle",
          "headline": {{ Js::from($error['title']) }},
          "description": {{ Js::from($error['meta_description']) }},
          "proficiencyLevel": "Beginner",
          "author": {
            "@@type": "Person",
            "@@id": "https://hafiz.dev/#person",
            "name": "Hafiz Riaz",
            "url": "https://hafiz.dev"
          },
          "publisher": {
            "@@type": "Person",
            "@@id": "https://hafiz.dev/#person",
            "name": "Hafiz Riaz"
          },
          "mainEntityOfPage": {
            "@@type": "WebPage",
            "@@id": {{ Js::from(route('errors.show', $error['slug'])) }}
          },
          "keywords": {{ Js::from($error['error_message'] . ', Laravel, PHP, ' . $error['category']) }},
          "articleSection": {{ Js::from(ucfirst($error['category'])) }},
          "url": {{ Js::from(route('errors.show', $error['slug'])) }},
          "inLanguage": "en-US"
        }
        </script>

        {{-- FAQPage Schema --}}
        <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "FAQPage",
          "mainEntity": [
            {
              "@@type": "Question",
              "name": {{ Js::from("What causes the " . $error['error_message'] . " error in Laravel?") }},
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": {{ Js::from("The " . $error['error_message'] . " error is commonly caused by: " . implode(', ', array_slice($error['causes'], 0, 3)) . ".") }}
              }
            },
            {
              "@@type": "Question",
              "name": {{ Js::from("How do I fix the " . $error['error_message'] . " error?") }},
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": {{ Js::from($error['solutions'][0]['title'] . ". " . $error['description']) }}
              }
            },
            {
              "@@type": "Question",
              "name": "Which Laravel versions does this affect?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": {{ Js::from("This error can occur in Laravel versions " . implode(', ', $error['laravel_versions']) . ".") }}
              }
            }
          ]
        }
        </script>

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
              "name": "Laravel Errors",
              "item": "https://hafiz.dev/errors"
            },
            {
              "@@type": "ListItem",
              "position": 3,
              "name": {{ Js::from($error['title']) }},
              "item": {{ Js::from(route('errors.show', $error['slug'])) }}
            }
          ]
        }
        </script>
    @endpush

    <!-- Override background pattern -->
    <style>
        body {
            background: #1e1e28 !important;
        }
    </style>

    <article class="max-w-4xl mx-auto px-4 py-8 relative z-10">
        <!-- Breadcrumb -->
        <nav class="text-sm text-light-muted mb-6">
            <a href="/" class="hover:text-gold transition-colors">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('errors.index') }}" class="hover:text-gold transition-colors">Laravel Errors</a>
            <span class="mx-2">/</span>
            <span class="text-light">{{ Str::limit($error['title'], 50) }}</span>
        </nav>

        <!-- Header -->
        <header class="mb-12">
            <!-- Category & Laravel Versions -->
            <div class="flex flex-wrap items-center gap-2 mb-6">
                <span class="px-3 py-1 {{ $style['badge'] }} rounded-full text-sm font-medium border">
                    {{ ucfirst($error['category']) }}
                </span>
                @foreach($error['laravel_versions'] as $version)
                    <span class="px-2 py-0.5 bg-darkCard/50 text-light-muted rounded text-xs border border-gold/10">
                        Laravel {{ $version }}
                    </span>
                @endforeach
            </div>

            <h1 class="text-4xl md:text-5xl font-bold text-light mb-6 leading-tight">
                {{ $error['title'] }}
            </h1>

            <p class="text-xl text-light-muted leading-relaxed mb-6">
                {{ $error['description'] }}
            </p>
        </header>

        <!-- Error Message Block -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-light mb-4">The Error</h2>
            <div class="relative bg-[#1a1a24] rounded-lg border border-red-500/30 overflow-hidden">
                <div class="flex items-center justify-between px-4 py-2 bg-red-500/10 border-b border-red-500/20">
                    <span class="text-xs font-medium text-red-400 uppercase tracking-wider">Error Message</span>
                    <button onclick="copyToClipboard(this, {{ Js::from($error['error_message']) }})"
                            class="text-xs text-light-muted hover:text-gold transition-colors flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <span>Copy</span>
                    </button>
                </div>
                <pre class="p-4 overflow-x-auto"><code class="text-red-400 font-mono text-sm">{{ $error['error_message'] }}</code></pre>
            </div>
        </section>

        <!-- Common Causes -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-light mb-4">Common Causes</h2>
            <div class="bg-darkCard/50 rounded-xl border border-gold/20 p-6">
                <ol class="space-y-3">
                    @foreach($error['causes'] as $index => $cause)
                        <li class="flex items-start gap-3">
                            <span class="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-gold/20 text-gold text-sm font-bold">
                                {{ $index + 1 }}
                            </span>
                            <span class="text-light-muted">{{ $cause }}</span>
                        </li>
                    @endforeach
                </ol>
            </div>
        </section>

        <!-- Solutions -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-light mb-6">Solutions</h2>
            <div class="space-y-6">
                @foreach($error['solutions'] as $index => $solution)
                    <div class="bg-darkCard/50 rounded-xl border border-gold/20 overflow-hidden">
                        <!-- Solution Header -->
                        <div class="flex items-center gap-3 px-6 py-4 border-b border-gold/10">
                            <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-gold text-darkBg font-bold">
                                {{ $index + 1 }}
                            </span>
                            <h3 class="text-lg font-semibold text-light">{{ $solution['title'] }}</h3>
                        </div>

                        <!-- Code Block -->
                        <div class="relative">
                            <div class="flex items-center px-4 py-2 bg-[#1a1a24] border-b border-gold/10">
                                <span class="text-xs font-medium text-gold uppercase tracking-wider">
                                    {{ $languageLabels[$solution['language']] ?? strtoupper($solution['language']) }}
                                </span>
                            </div>
                            <pre class="p-4 bg-[#1a1a24] overflow-x-auto"><code class="text-light font-mono text-sm whitespace-pre">{{ $solution['code'] }}</code></pre>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Visual Separator -->
        <hr class="my-16 border-t border-gold/10">

        <!-- CTA Box -->
        <div class="my-16 p-8 bg-darkCard/50 border-2 border-gold/30 rounded-xl shadow-dark-card">
            <h3 class="text-2xl font-bold text-light mb-4">
                Need Help With Your Laravel Project?
            </h3>
            <p class="text-light-muted mb-6 leading-relaxed">
                I specialize in building custom Laravel applications, process automation,
                and SaaS development. Whether you need to eliminate repetitive tasks or
                build something from scratch, let's discuss your project.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="/#contact"
                    class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5">
                    Schedule Free Consultation
                </a>
                <a href="/#portfolio"
                    class="px-6 py-3 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300">
                    View My Work
                </a>
            </div>
            <p class="text-sm text-light-muted mt-4">
                Currently available for 2-3 new projects
            </p>
        </div>

        <!-- Author Bio -->
        <div class="flex items-start gap-6 p-6 bg-darkCard/50 rounded-xl border border-gold/20 shadow-dark-card mb-12">
            <img src="/profile-photo.png" alt="Hafiz Riaz"
                class="w-20 h-20 rounded-2xl border-4 border-gold/30 shadow-gold">
            <div>
                <h4 class="text-light font-bold text-lg mb-2">About Hafiz Riaz</h4>
                <p class="text-light-muted mb-4 leading-relaxed">
                    Full Stack Developer from Turin, Italy. I build web applications with
                    Laravel and Vue.js, and automate business processes. Creator of ReplyGenius,
                    StudyLab, and other SaaS products.
                </p>
                <a href="/" class="text-gold hover:text-gold-light transition-colors">View Portfolio</a>
            </div>
        </div>

        <!-- Related Errors -->
        @if(count($relatedErrors) > 0)
            <hr class="my-16 border-t border-gold/10">

            <section>
                <h3 class="text-2xl font-bold text-light mb-8">Related Errors</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($relatedErrors as $related)
                        @php
                            $relatedStyle = $categoryStyles[$related['category']] ?? ['badge' => 'bg-gold/20 text-gold border-gold/30'];
                        @endphp
                        <a href="{{ route('errors.show', $related['slug']) }}"
                           class="block bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 group overflow-hidden">
                            <div class="p-6">
                                <span class="text-xs px-2.5 py-1 {{ $relatedStyle['badge'] }} rounded-md font-medium border mb-3 inline-block">
                                    {{ ucfirst($related['category']) }}
                                </span>
                                <h4 class="text-light font-semibold mb-2 group-hover:text-gold transition-colors">
                                    {{ $related['title'] }}
                                </h4>
                                <p class="text-light-muted text-sm font-mono truncate">
                                    {{ Str::limit($related['error_message'], 40) }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    </article>

    @push('scripts')
    <script>
        function copyToClipboard(button, text) {
            navigator.clipboard.writeText(text).then(function() {
                const originalText = button.querySelector('span').textContent;
                button.querySelector('span').textContent = 'Copied!';
                button.classList.add('text-gold');
                setTimeout(function() {
                    button.querySelector('span').textContent = originalText;
                    button.classList.remove('text-gold');
                }, 2000);
            }).catch(function(err) {
                console.error('Failed to copy: ', err);
            });
        }
    </script>
    @endpush
</x-layout>
