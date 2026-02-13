@if(!empty($faqs))
<div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
    <h2 class="text-2xl font-bold text-light mb-6 text-center">{{ __('tools.faq_heading') }}</h2>

    <div class="space-y-4 max-w-3xl mx-auto">
        @foreach($faqs as $faq)
        <details class="group">
            <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                <span class="text-light font-medium">{{ $faq['question'] }}</span>
                <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </summary>
            <div class="p-4 text-light-muted text-sm leading-relaxed">
                {{ $faq['answer'] }}
            </div>
        </details>
        @endforeach
    </div>
</div>
@endif
