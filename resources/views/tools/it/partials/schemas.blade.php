{{-- Dynamic SoftwareApplication Schema --}}
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "SoftwareApplication",
    "name": "{{ __($t . '.h1') }}",
    "description": "{{ __($t . '.description') }}",
    "url": "https://hafiz.dev/it/strumenti/{{ $italianSlug }}",
    "applicationCategory": "DeveloperApplication",
    "operatingSystem": "Any",
    "inLanguage": "it",
    "offers": {
        "@@type": "Offer",
        "price": "0",
        "priceCurrency": "USD"
    },
    "author": {
        "@@type": "Person",
        "name": "Hafiz Riaz",
        "url": "https://hafiz.dev"
    }
}
</script>

{{-- Dynamic BreadcrumbList Schema --}}
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
        },
        {
            "@@type": "ListItem",
            "position": 3,
            "name": "{{ __($t . '.h1') }}",
            "item": "https://hafiz.dev/it/strumenti/{{ $italianSlug }}"
        }
    ]
}
</script>

{{-- Dynamic FAQPage Schema --}}
@if($faqs = __($t . '.faq'))
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "FAQPage",
    "mainEntity": [
        @foreach($faqs as $index => $faq)
        {
            "@@type": "Question",
            "name": "{{ $faq['question'] }}",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "{{ $faq['answer'] }}"
            }
        }@if(!$loop->last),@endif
        @endforeach
    ]
}
</script>
@endif
