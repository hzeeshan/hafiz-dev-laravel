<x-layout>
    <x-slot:title>{{ __('tools.index_title') }}</x-slot:title>
    <x-slot:description>{{ __('tools.index_description') }}</x-slot:description>
    <x-slot:keywords>{{ __('tools.index_keywords') }}</x-slot:keywords>
    <x-slot:canonical>{{ url('/it/strumenti') }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>{{ __('tools.index_title') }}</x-slot:ogTitle>
    <x-slot:ogDescription>{{ __('tools.index_description') }}</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/it/strumenti') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- ItemList Schema --}}
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "ItemList",
            "name": "{{ __('tools.index_h1') }}",
            "description": "{{ __('tools.index_description') }}",
            "url": "https://hafiz.dev/it/strumenti",
            "numberOfItems": {{ $translations->count() }},
            "itemListElement": [
                @foreach($translations as $index => $translation)
                {
                    "@@type": "ListItem",
                    "position": {{ $index + 1 }},
                    "item": {
                        "@@type": "SoftwareApplication",
                        "name": "{{ $translation->name }}",
                        "description": "{{ $translation->description }}",
                        "url": "https://hafiz.dev/it/strumenti/{{ $translation->slug }}",
                        "applicationCategory": "DeveloperApplication",
                        "inLanguage": "it",
                        "offers": {
                            "@@type": "Offer",
                            "price": "0",
                            "priceCurrency": "USD"
                        }
                    }
                }@if(!$loop->last),@endif
                @endforeach
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
                    "name": "{{ __('tools.breadcrumb_tools') }}",
                    "item": "https://hafiz.dev/it/strumenti"
                }
            ]
        }
        </script>
    @endpush

    <style>
        body > div:first-of-type {
            background-image: none !important;
            background: #1e1e28;
        }
    </style>

    <div class="max-w-6xl mx-auto px-4 py-16 relative z-10">
        {{-- Breadcrumb --}}
        <nav class="mb-6 text-sm" aria-label="Breadcrumb">
            <ol class="flex items-center gap-2 text-light-muted">
                <li><a href="/" class="hover:text-gold transition-colors">{{ __('tools.breadcrumb_home') }}</a></li>
                <li><span class="text-gold/50">/</span></li>
                <li class="text-gold">{{ __('tools.breadcrumb_tools') }}</li>
            </ol>
        </nav>

        {{-- Hero Section --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">{{ __('tools.index_h1') }}</h1>
            <p class="text-light-muted max-w-2xl mx-auto text-lg">
                {{ __('tools.index_subtitle') }}
            </p>
        </div>

        {{-- Tools Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($translations as $translation)
            <a href="/it/strumenti/{{ $translation->slug }}"
               class="group block">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
                    <div class="flex items-start justify-between mb-4">
                        <div class="text-3xl">{{ $translation->tool->icon }}</div>
                        <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">
                            {{ __('tools.categories.' . $translation->tool->category) ?? $translation->tool->category }}
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-light mb-2 group-hover:text-gold transition-colors">{{ $translation->name }}</h3>
                    <p class="text-light-muted text-sm mb-4">{{ $translation->description }}</p>
                    <div class="flex items-center text-gold text-sm font-semibold group-hover:gap-2 transition-all">
                        <span>Usa Strumento</span>
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Request Tool Section --}}
        <div class="mt-16 text-center">
            <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card max-w-2xl mx-auto">
                <h2 class="text-xl font-bold text-light mb-3">{{ __('tools.request_tool_heading') }}</h2>
                <p class="text-light-muted mb-6">{{ __('tools.request_tool_description') }}</p>
                <a href="mailto:contact@hafiz.dev?subject=Richiesta%20Strumento"
                   class="inline-flex items-center gap-2 px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    {{ __('tools.request_tool_button') }}
                </a>
            </div>
        </div>

        {{-- Features Section --}}
        <div class="mt-16 grid md:grid-cols-3 gap-6">
            <div class="text-center p-6">
                <div class="text-3xl mb-3">🔒</div>
                <h3 class="text-lg font-semibold text-light mb-2">{{ __('tools.feature_private_title') }}</h3>
                <p class="text-light-muted text-sm">{{ __('tools.feature_private_desc') }}</p>
            </div>
            <div class="text-center p-6">
                <div class="text-3xl mb-3">⚡</div>
                <h3 class="text-lg font-semibold text-light mb-2">{{ __('tools.feature_fast_title') }}</h3>
                <p class="text-light-muted text-sm">{{ __('tools.feature_fast_desc') }}</p>
            </div>
            <div class="text-center p-6">
                <div class="text-3xl mb-3">🆓</div>
                <h3 class="text-lg font-semibold text-light mb-2">{{ __('tools.feature_free_title') }}</h3>
                <p class="text-light-muted text-sm">{{ __('tools.feature_free_desc') }}</p>
            </div>
        </div>
    </div>
</x-layout>
