@props(['tool', 'locale' => null])

@php
    $relatedTools = $tool->getRelatedTools();
@endphp

@if($relatedTools->isNotEmpty())
<div class="mb-12">
    <h2 class="text-xl font-bold text-light mb-4 text-center">{{ $locale ? __('tools.related_tools') : 'Related Tools' }}</h2>
    <div class="flex flex-wrap justify-center gap-3">
        @foreach($relatedTools as $related)
        @php
            if ($locale) {
                $translation = $related->translation($locale);
                $href = $translation ? '/it/strumenti/' . $translation->slug : '/tools/' . $related->slug;
                $name = $translation ? $translation->name : $related->name;
            } else {
                $href = '/tools/' . $related->slug;
                $name = $related->name;
            }
        @endphp
        <a href="{{ $href }}" class="w-[calc(50%-0.375rem)] md:w-[calc(25%-0.5625rem)] bg-gradient-card p-4 rounded-lg border border-gold/20 hover:border-gold/50 transition-colors text-center group">
            <span class="text-2xl mb-2 block">{{ $related->icon }}</span>
            <span class="text-light text-sm group-hover:text-gold transition-colors">{{ $name }}</span>
        </a>
        @endforeach
    </div>
</div>
@endif
