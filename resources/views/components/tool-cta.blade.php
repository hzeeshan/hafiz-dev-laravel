@php
    $cta = \App\Models\ToolCtaSetting::getActive();
@endphp

@if($cta)
    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8 mb-12 text-center">
        <h2 class="text-xl font-bold text-light mb-3">{{ $cta->heading }}</h2>
        <p class="text-light-muted mb-6 max-w-xl mx-auto">{{ $cta->description }}</p>
        <a href="{{ $cta->button_url }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300">
            {{ $cta->button_text }}
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>
@endif
