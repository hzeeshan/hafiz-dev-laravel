@php
    $t = 'tools/' . $toolSlug;
@endphp

<x-layout>
    <x-slot:title>{{ __($t . '.title') }}</x-slot:title>
    <x-slot:description>{{ __($t . '.description') }}</x-slot:description>
    <x-slot:keywords>{{ __($t . '.keywords') }}</x-slot:keywords>
    <x-slot:canonical>{{ url('/it/strumenti/' . $italianSlug) }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogTitle>{{ __($t . '.title') }}</x-slot:ogTitle>
    <x-slot:ogDescription>{{ __($t . '.description') }}</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/it/strumenti/' . $italianSlug) }}</x-slot:ogUrl>

    @push('schemas')
        @include('tools.it.partials.schemas', ['t' => $t, 'italianSlug' => $italianSlug])
    @endpush

    <div class="relative z-10 py-12 px-4">
        <div class="max-w-7xl mx-auto">
            {{-- Breadcrumb --}}
            <nav class="mb-6 text-sm" aria-label="Breadcrumb">
                <ol class="flex items-center gap-2 text-light-muted">
                    <li><a href="/" class="hover:text-gold transition-colors">{{ __('tools.breadcrumb_home') }}</a></li>
                    <li><span class="text-gold/50">/</span></li>
                    <li><a href="/it/strumenti" class="hover:text-gold transition-colors">{{ __('tools.breadcrumb_tools') }}</a></li>
                    <li><span class="text-gold/50">/</span></li>
                    <li class="text-gold">{{ __($t . '.h1') }}</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">{{ __($t . '.h1') }}</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    {{ __($t . '.subtitle') }}
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                {{-- Privacy Banner --}}
                <div class="mb-6 p-3 bg-green-500/10 border border-green-500/30 rounded-lg flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <span class="text-green-400 text-sm">{{ __('tools.privacy_banner') }}</span>
                </div>

                {{-- Tool-specific UI --}}
                @include('tools.it.partials.' . $toolSlug . '-ui', ['t' => $t])
            </div>

            {{-- Features Section --}}
            @if($features = __($t . '.features'))
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                @foreach($features as $index => $feature)
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        @if($index === 0)
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        @elseif($index === 1)
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                        @else
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        @endif
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">{{ $feature['title'] }}</h3>
                    <p class="text-light-muted text-sm">{{ $feature['desc'] }}</p>
                </div>
                @endforeach
            </div>
            @endif

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" locale="it" />

            {{-- CTA Section --}}
            <x-tool-cta />

            {{-- FAQ Section --}}
            @include('tools.it.partials.faq', ['faqs' => __($t . '.faq')])
        </div>
    </div>

    {{-- Tool-specific JavaScript --}}
    @push('scripts')
        {{-- Pass translatable strings to JS via data attributes --}}
        <div id="tool-strings" class="hidden"
            @foreach(__($t . '.js_strings') ?? [] as $key => $value)
                data-{{ Str::kebab($key) }}="{{ $value }}"
            @endforeach
        ></div>

        @include('tools.partials.' . $toolSlug . '-script')
    @endpush
</x-layout>
