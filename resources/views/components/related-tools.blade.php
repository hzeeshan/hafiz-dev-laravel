@props(['tool'])

@php
    $relatedTools = $tool->getRelatedTools();
@endphp

@if($relatedTools->isNotEmpty())
<div class="mb-12">
    <h2 class="text-xl font-bold text-light mb-4 text-center">Related Tools</h2>
    <div class="flex flex-wrap justify-center gap-3">
        @foreach($relatedTools as $related)
        <a href="/tools/{{ $related->slug }}" class="w-[calc(50%-0.375rem)] md:w-[calc(25%-0.5625rem)] bg-gradient-card p-4 rounded-lg border border-gold/20 hover:border-gold/50 transition-colors text-center group">
            <span class="text-2xl mb-2 block">{{ $related->icon }}</span>
            <span class="text-light text-sm group-hover:text-gold transition-colors">{{ $related->name }}</span>
        </a>
        @endforeach
    </div>
</div>
@endif
