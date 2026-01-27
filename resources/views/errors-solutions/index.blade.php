<x-layout>
    <x-slot:title>Laravel Error Solutions - Fix Common Laravel Errors | Hafiz Riaz</x-slot:title>
    <x-slot:description>Comprehensive solutions for {{ $totalErrors }}+ common Laravel errors. Find fixes for CSRF token issues, database errors, routing problems, and more with code examples.</x-slot:description>
    <x-slot:keywords>Laravel errors, Laravel error solutions, Laravel debugging, fix Laravel error, Laravel troubleshooting, PHP errors, Laravel CSRF error, Laravel database error</x-slot:keywords>
    <x-slot:canonical>{{ route('errors.index') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>Laravel Error Solutions - Fix {{ $totalErrors }}+ Common Errors</x-slot:ogTitle>
    <x-slot:ogDescription>Comprehensive solutions for common Laravel errors. Find fixes with code examples for CSRF, database, routing, and authentication issues.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ route('errors.index') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- ItemList Schema for all errors --}}
        <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "ItemList",
          "name": "Laravel Error Solutions",
          "description": "Comprehensive solutions for common Laravel errors",
          "numberOfItems": {{ $totalErrors }},
          "itemListElement": [
            @foreach($groupedErrors->flatten(1)->take(20) as $index => $error)
            {
              "@@type": "ListItem",
              "position": {{ $index + 1 }},
              "name": {{ Js::from($error['title']) }},
              "url": {{ Js::from(route('errors.show', $error['slug'])) }}
            }@if(!$loop->last),@endif
            @endforeach
          ]
        }
        </script>

        {{-- CollectionPage Schema --}}
        <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "CollectionPage",
          "name": "Laravel Error Solutions",
          "description": "Comprehensive solutions for common Laravel errors with code examples",
          "url": {{ Js::from(route('errors.index')) }},
          "author": {
            "@@type": "Person",
            "@@id": "https://hafiz.dev/#person",
            "name": "Hafiz Riaz"
          },
          "mainEntity": {
            "@@type": "ItemList",
            "numberOfItems": {{ $totalErrors }}
          }
        }
        </script>
    @endpush

    @php
    // Helper functions for category styling
    $categoryStyles = [
        'routing' => ['bg' => 'bg-green-500/20', 'badge' => 'bg-green-500/20 text-green-400 border-green-500/30', 'icon' => '<svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>'],
        'security' => ['bg' => 'bg-red-500/20', 'badge' => 'bg-red-500/20 text-red-400 border-red-500/30', 'icon' => '<svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>'],
        'database' => ['bg' => 'bg-blue-500/20', 'badge' => 'bg-blue-500/20 text-blue-400 border-blue-500/30', 'icon' => '<svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>'],
        'configuration' => ['bg' => 'bg-purple-500/20', 'badge' => 'bg-purple-500/20 text-purple-400 border-purple-500/30', 'icon' => '<svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>'],
        'autoloading' => ['bg' => 'bg-orange-500/20', 'badge' => 'bg-orange-500/20 text-orange-400 border-orange-500/30', 'icon' => '<svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>'],
        'filesystem' => ['bg' => 'bg-yellow-500/20', 'badge' => 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30', 'icon' => '<svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>'],
        'views' => ['bg' => 'bg-pink-500/20', 'badge' => 'bg-pink-500/20 text-pink-400 border-pink-500/30', 'icon' => '<svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>'],
        'eloquent' => ['bg' => 'bg-indigo-500/20', 'badge' => 'bg-indigo-500/20 text-indigo-400 border-indigo-500/30', 'icon' => '<svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>'],
        'performance' => ['bg' => 'bg-cyan-500/20', 'badge' => 'bg-cyan-500/20 text-cyan-400 border-cyan-500/30', 'icon' => '<svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>'],
        'api' => ['bg' => 'bg-teal-500/20', 'badge' => 'bg-teal-500/20 text-teal-400 border-teal-500/30', 'icon' => '<svg class="w-5 h-5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>'],
        'authentication' => ['bg' => 'bg-red-500/20', 'badge' => 'bg-red-500/20 text-red-400 border-red-500/30', 'icon' => '<svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>'],
        'authorization' => ['bg' => 'bg-amber-500/20', 'badge' => 'bg-amber-500/20 text-amber-400 border-amber-500/30', 'icon' => '<svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>'],
        'validation' => ['bg' => 'bg-lime-500/20', 'badge' => 'bg-lime-500/20 text-lime-400 border-lime-500/30', 'icon' => '<svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'],
        'cache' => ['bg' => 'bg-emerald-500/20', 'badge' => 'bg-emerald-500/20 text-emerald-400 border-emerald-500/30', 'icon' => '<svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>'],
        'queues' => ['bg' => 'bg-violet-500/20', 'badge' => 'bg-violet-500/20 text-violet-400 border-violet-500/30', 'icon' => '<svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>'],
        'mail' => ['bg' => 'bg-rose-500/20', 'badge' => 'bg-rose-500/20 text-rose-400 border-rose-500/30', 'icon' => '<svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'],
        'middleware' => ['bg' => 'bg-sky-500/20', 'badge' => 'bg-sky-500/20 text-sky-400 border-sky-500/30', 'icon' => '<svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>'],
        'scheduling' => ['bg' => 'bg-fuchsia-500/20', 'badge' => 'bg-fuchsia-500/20 text-fuchsia-400 border-fuchsia-500/30', 'icon' => '<svg class="w-5 h-5 text-fuchsia-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'],
        'broadcasting' => ['bg' => 'bg-orange-500/20', 'badge' => 'bg-orange-500/20 text-orange-400 border-orange-500/30', 'icon' => '<svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z"/></svg>'],
        'session' => ['bg' => 'bg-yellow-500/20', 'badge' => 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30', 'icon' => '<svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'],
        'cli' => ['bg' => 'bg-gray-500/20', 'badge' => 'bg-gray-500/20 text-gray-400 border-gray-500/30', 'icon' => '<svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>'],
    ];
    $defaultStyle = ['bg' => 'bg-gold/20', 'badge' => 'bg-gold/20 text-gold border-gold/30', 'icon' => '<svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>'];
    @endphp

    <!-- Override background pattern -->
    <style>
        body > div:first-of-type {
            background-image: none !important;
            background: #1e1e28;
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 py-16 relative z-10">
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold text-light mb-4">Laravel Error Solutions</h1>
            <p class="text-xl text-light-muted max-w-2xl mx-auto mb-6">
                Quick fixes for {{ $totalErrors }}+ common Laravel errors. Find solutions with working
                code examples, causes, and prevention tips.
            </p>
            <div class="flex items-center justify-center gap-2 text-sm text-light-muted">
                <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-gold/10 border border-gold/30 rounded-full">
                    <span class="text-gold font-medium">{{ count($categories) }} Categories</span>
                </span>
                <span class="text-gold/40">|</span>
                <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-gold/10 border border-gold/30 rounded-full">
                    <span class="text-gold font-medium">{{ $totalErrors }} Solutions</span>
                </span>
            </div>
        </div>

        <!-- Category Navigation -->
        <div class="flex flex-wrap justify-center gap-2 mb-12">
            @foreach($groupedErrors->keys() as $category)
                <a href="#{{ $category }}"
                   class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200
                          bg-darkCard/50 text-light-muted hover:bg-gold/20 hover:text-gold border border-gold/20">
                    {{ ucfirst(str_replace('_', ' ', $category)) }}
                    <span class="ml-1 opacity-70">({{ $groupedErrors[$category]->count() }})</span>
                </a>
            @endforeach
        </div>

        <!-- Errors by Category -->
        @foreach($groupedErrors as $category => $errors)
            @php
                $style = $categoryStyles[$category] ?? $defaultStyle;
            @endphp
            <section id="{{ $category }}" class="mb-16 scroll-mt-24">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 flex items-center justify-center rounded-lg {{ $style['bg'] }}">
                        {!! $style['icon'] !!}
                    </div>
                    <h2 class="text-2xl font-bold text-light">
                        {{ ucfirst(str_replace('_', ' ', $category)) }} Errors
                    </h2>
                    <span class="text-sm text-light-muted bg-darkCard/50 px-3 py-1 rounded-full border border-gold/10">
                        {{ $errors->count() }} solutions
                    </span>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($errors as $error)
                        <a href="{{ route('errors.show', $error['slug']) }}"
                           class="block bg-gradient-card rounded-xl shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden border border-gold/10 group hover:-translate-y-1">
                            <div class="p-6">
                                <!-- Category Badge -->
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="text-xs px-2.5 py-1 {{ $style['badge'] }} rounded-md font-medium border">
                                        {{ ucfirst($category) }}
                                    </span>
                                    @if($error['search_volume'] === 'very_high' || $error['search_volume'] === 'high')
                                        <span class="text-xs px-2 py-0.5 bg-red-500/20 text-red-400 rounded border border-red-500/30">
                                            Common
                                        </span>
                                    @endif
                                </div>

                                <!-- Title -->
                                <h3 class="text-lg font-bold text-light mb-3 leading-snug group-hover:text-gold transition-colors duration-300">
                                    {{ $error['title'] }}
                                </h3>

                                <!-- Error Message Preview -->
                                <div class="text-sm text-light-muted mb-4 font-mono bg-[#1a1a24] px-3 py-2 rounded-lg border border-gold/10 truncate">
                                    {{ Str::limit($error['error_message'], 50) }}
                                </div>

                                <!-- Meta -->
                                <div class="flex items-center justify-between text-xs text-light-muted/70 pt-3 border-t border-gold/10">
                                    <span>{{ count($error['solutions']) }} {{ Str::plural('solution', count($error['solutions'])) }}</span>
                                    <span class="flex items-center gap-1 text-gold group-hover:translate-x-1 transition-transform">
                                        View fix
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endforeach

        <!-- CTA Box -->
        <div class="mt-16 p-8 bg-darkCard/50 border-2 border-gold/30 rounded-xl shadow-dark-card text-center">
            <h3 class="text-2xl font-bold text-light mb-4">
                Can't Find Your Error?
            </h3>
            <p class="text-light-muted mb-6 leading-relaxed max-w-2xl mx-auto">
                If you're dealing with a Laravel error not listed here, or need help debugging
                a complex issue, I'm available for consulting.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/#contact"
                    class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5">
                    Get Help With Your Error
                </a>
                <a href="/blog"
                    class="px-6 py-3 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300">
                    Read Laravel Articles
                </a>
            </div>
        </div>
    </div>
</x-layout>
