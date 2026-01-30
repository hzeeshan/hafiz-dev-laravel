<!DOCTYPE html>
<html lang="{{ request()->is('it/*') ? 'it' : 'en' }}" class="scroll-smooth scroll-pt-20 h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{-- Primary Meta Tags --}}
    <title>{{ $title ?? 'Hafiz Riaz | Laravel & Vue.js Developer | Process Automation Expert' }}</title>
    <meta name="title" content="{{ $title ?? 'Hafiz Riaz | Laravel & Vue.js Developer | Process Automation Expert' }}">
    <meta name="description"
        content="{{ $description ?? 'Expert Laravel & Vue.js developer specializing in process automation, SaaS development, and custom web applications. Based in Turin, Italy. Available for freelance projects.' }}">
    <meta name="keywords"
        content="Laravel developer, Vue.js developer, Process automation, SaaS development, Full stack developer, PHP developer, Web application development, Italy, {{ $keywords ?? 'Freelance developer' }}">
    <meta name="author" content="Hafiz Riaz">
    <meta name="robots"
        content="{{ $robots ?? 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1' }}">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">

    {{-- Hreflang Tags for English pages (Italian pages add their own) --}}
    @unless(request()->is('it/*'))
    <link rel="alternate" hreflang="en" href="https://hafiz.dev{{ request()->getPathInfo() === '/' ? '' : request()->getPathInfo() }}" />
    <link rel="alternate" hreflang="it" href="https://hafiz.dev/it/sviluppatore-web-torino" />
    <link rel="alternate" hreflang="x-default" href="https://hafiz.dev{{ request()->getPathInfo() === '/' ? '' : request()->getPathInfo() }}" />
    @endunless

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('profile-photo.png') }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ $ogUrl ?? url()->current() }}">
    <meta property="og:title" content="{{ $ogTitle ?? ($title ?? 'Hafiz Riaz | Laravel & Vue.js Developer') }}">
    <meta property="og:description"
        content="{{ $ogDescription ?? ($description ?? 'Expert Laravel & Vue.js developer specializing in process automation, SaaS development, and custom web applications. Available for freelance projects.') }}">
    <meta property="og:image" content="{{ $ogImage ?? url('/profile-photo.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="Hafiz Riaz - Laravel Developer">
    <meta property="og:locale" content="en_US">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $ogUrl ?? url()->current() }}">
    <meta name="twitter:title" content="{{ $ogTitle ?? ($title ?? 'Hafiz Riaz | Laravel & Vue.js Developer') }}">
    <meta name="twitter:description"
        content="{{ $ogDescription ?? ($description ?? 'Expert Laravel & Vue.js developer specializing in process automation and SaaS development.') }}">
    <meta name="twitter:image" content="{{ $ogImage ?? url('/profile-photo.png') }}">
    <meta name="twitter:site" content="@hafizzeeshan619">
    <meta name="twitter:creator" content="@hafizzeeshan619">

    {{-- DNS Prefetch & Preconnect for Performance --}}
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- Preload critical hero image (homepage only) --}}
    @if(request()->is('/'))
        <link rel="preload" as="image" href="{{ asset('profile-photo.webp') }}" type="image/webp">
    @endif

    {{-- Google Fonts - Optimized with preload for critical font --}}
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"></noscript>

    {{-- Structured Data - Organization/Person Schema --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Person",
      "name": "Hafiz Riaz",
      "url": "https://hafiz.dev",
      "image": "https://hafiz.dev/profile-photo.png",
      "sameAs": [
        "https://github.com/hzeeshan",
        "https://www.linkedin.com/in/hafiz-riaz-777501150/",
        "https://x.com/hafizzeeshan619"
      ],
      "jobTitle": "Full Stack Developer",
      "description": "Laravel & Vue.js developer specializing in process automation, SaaS development, and web applications",
      "worksFor": {
        "@@type": "Organization",
        "name": "Freelance"
      },
      "address": {
        "@@type": "PostalAddress",
        "addressLocality": "Turin",
        "addressRegion": "Piedmont",
        "addressCountry": "IT"
      },
      "email": "contact@@hafiz.dev",
      "telephone": "+393888255329",
      "knowsAbout": ["Laravel", "Vue.js", "PHP", "Process Automation", "SaaS Development", "Web Development", "JavaScript", "MySQL", "Docker"],
      "alumniOf": {
        "@@type": "EducationalOrganization",
        "name": "Self-taught Developer"
      }
    }
    </script>

    {{-- Website Schema with Sitelinks Search --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebSite",
      "@@id": "https://hafiz.dev/#website",
      "url": "https://hafiz.dev",
      "name": "Hafiz Riaz - Laravel Developer",
      "description": "Laravel & Vue.js development, process automation, and SaaS building",
      "publisher": {
        "@@type": "Person",
        "@@id": "https://hafiz.dev/#person"
      },
      "inLanguage": "en-US"
    }
    </script>

    {{-- Additional page-specific schemas will be added in child views --}}
    @stack('schemas')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Additional head content --}}
    @stack('head')

    {{-- Google Analytics - Only in production --}}
    @production
        @if (config('services.google_analytics.tracking_id'))
            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.tracking_id') }}">
            </script>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());
                gtag('config', '{{ config('services.google_analytics.tracking_id') }}');
            </script>
        @endif
    @endproduction
</head>

<body class="bg-gradient-dark text-light antialiased h-full flex flex-col relative overflow-x-hidden">
    <!-- Background Pattern -->
    <div class="fixed top-0 left-0 w-full h-full pointer-events-none z-0"
        style="background-image: radial-gradient(circle at 20% 50%, rgba(201, 170, 113, 0.03) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(201, 170, 113, 0.03) 0%, transparent 50%), radial-gradient(circle at 40% 80%, rgba(201, 170, 113, 0.02) 0%, transparent 50%);">
    </div>

    <!-- Dark Navigation -->
    <nav class="bg-darkCard/80 border-b border-gold/10 fixed top-0 left-0 right-0 z-50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/"
                    class="text-xl font-bold text-light hover:text-gold transition-colors duration-300 flex items-center gap-2">
                    <span class="text-gold">&lt;/&gt;</span>
                    <span>hafiz.dev</span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="/"
                        class="text-light-muted hover:text-light font-medium transition-colors duration-300">Home</a>
                    <a href="/#services"
                        class="text-light-muted hover:text-light font-medium transition-colors duration-300">Services</a>
                    <a href="/#portfolio"
                        class="text-light-muted hover:text-light font-medium transition-colors duration-300">Portfolio</a>
                    <a href="/blog"
                        class="text-light-muted hover:text-light font-medium transition-colors duration-300">Blog</a>
                    <a href="/tools"
                        class="text-light-muted hover:text-light font-medium transition-colors duration-300">Tools</a>
                    <a href="/#contact"
                        class="px-5 py-2.5 bg-gold text-darkBg rounded-lg hover:bg-gold-light font-semibold transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5">
                        Contact
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-light hover:text-gold transition-colors p-2" aria-label="Open navigation menu" aria-expanded="false" aria-controls="mobile-menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="/"
                        class="text-light-muted hover:text-light font-medium transition-colors duration-300 py-2 border-b border-gold/10">Home</a>
                    <a href="/#services"
                        class="text-light-muted hover:text-light font-medium transition-colors duration-300 py-2 border-b border-gold/10">Services</a>
                    <a href="/#portfolio"
                        class="text-light-muted hover:text-light font-medium transition-colors duration-300 py-2 border-b border-gold/10">Portfolio</a>
                    <a href="/blog"
                        class="text-light-muted hover:text-light font-medium transition-colors duration-300 py-2 border-b border-gold/10">Blog</a>
                    <a href="/tools"
                        class="text-light-muted hover:text-light font-medium transition-colors duration-300 py-2 border-b border-gold/10">Tools</a>
                    <a href="/#contact"
                        class="px-5 py-2.5 bg-gold text-darkBg rounded-lg hover:bg-gold-light font-semibold transition-all duration-300 text-center">
                        Contact
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.add('hidden');
            });
        });
    </script>

    <!-- Main Content -->
    <main class="flex-1 pt-16">
        {{ $slot }}
    </main>

    <!-- Dark Footer -->
    <footer class="bg-darkCard/60 border-t border-gold/10 relative z-10">
        <div class="max-w-7xl mx-auto px-4 py-5">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-light-muted text-sm">
                    © {{ date('Y') }} Hafiz Riaz. All rights reserved.
                </p>
                <!-- Language Switcher -->
                <div class="flex items-center gap-2 text-sm">
                    <span class="text-light-muted">🌐</span>
                    @if(request()->is('it/*'))
                        <a href="/" class="text-light-muted hover:text-gold transition-colors">English</a>
                        <span class="text-gold/40">|</span>
                        <span class="text-gold font-medium">Italiano</span>
                    @else
                        <span class="text-gold font-medium">English</span>
                        <span class="text-gold/40">|</span>
                        <a href="/it/sviluppatore-web-torino" class="text-light-muted hover:text-gold transition-colors">Italiano</a>
                    @endif
                </div>
            </div>
        </div>
    </footer>

    {{-- Page-specific scripts --}}
    @stack('scripts')

    {{-- Tool View Tracking --}}
    @if(request()->is('tools/*') && !request()->is('tools'))
    <script>
        (function() {
            const path = window.location.pathname;
            const toolSlug = path.replace('/tools/', '');
            if (toolSlug && toolSlug !== 'index') {
                fetch('/tools/' + toolSlug + '/view', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                }).catch(function() {});
            }
        })();
    </script>
    @endif
</body>

</html>
