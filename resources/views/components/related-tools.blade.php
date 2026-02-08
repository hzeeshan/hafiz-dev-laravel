@props(['tool'])

@php
    $relatedTools = $tool->getRelatedTools();
@endphp

@if($relatedTools->isNotEmpty())
<div class="mb-8">
    <h2 class="text-xl font-bold text-light mb-4">Related Tools</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
        @foreach($relatedTools as $related)
        <a href="/tools/{{ $related->slug }}" class="bg-gradient-card p-4 rounded-lg border border-gold/20 hover:border-gold/50 transition-colors text-center group">
            <span class="text-2xl mb-2 block">{{ $related->icon }}</span>
            <span class="text-light text-sm group-hover:text-gold transition-colors">{{ $related->name }}</span>
        </a>
        @endforeach
    </div>
</div>
@endif
