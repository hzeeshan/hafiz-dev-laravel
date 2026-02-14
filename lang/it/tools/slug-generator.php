<?php

return [
    // SEO
    'title' => 'Generatore di Slug - Crea Slug URL SEO-Friendly Gratis | hafiz.dev',
    'description' => 'Generatore di slug online gratuito. Converti qualsiasi testo in slug URL puliti e SEO-friendly istantaneamente. Supporta separatori personalizzati, traslitterazione e generazione in blocco. 100% lato client.',
    'keywords' => 'generatore slug, generatore slug url, creatore slug, slug seo, testo url friendly, slugify online, generatore permalink',

    // Page content
    'h1' => 'Generatore di Slug',
    'subtitle' => 'Converti qualsiasi testo in slug URL puliti e SEO-friendly. Gestisce caratteri speciali, lettere accentate e righe multiple.',

    // UI Labels
    'separator' => 'Separatore',
    'hyphen_recommended' => 'Trattino - (consigliato)',
    'underscore' => 'Underscore _',
    'dot' => 'Punto .',
    'none_joined' => 'Nessuno (unito)',
    'max_length' => 'Lunghezza Massima',
    'no_limit' => 'Nessun limite',
    'characters' => 'caratteri',
    'transliterate_accents' => 'Traslittera Accenti',
    'remove_stop_words' => 'Rimuovi Stop Word',
    'text_input' => 'Testo di Input',
    'one_slug_per_line' => '(uno slug per riga)',
    'generated_slugs' => 'Slug Generati',
    'slugs_placeholder' => 'Gli slug appariranno qui...',
    'generate_slugs' => 'Genera Slug',
    'copy' => 'Copia',
    'sample' => 'Esempio',
    'clear' => 'Pulisci',
    'slugs_generated_stat' => 'Slug Generati',
    'characters_saved' => 'Caratteri Risparmiati',
    'avg_slug_length' => 'Lunghezza Media Slug',
    'longest_slug' => 'Slug Più Lungo',
    'url_preview' => 'Anteprima URL',

    // Features
    'features' => [
        [
            'title' => 'Traslitterazione Intelligente',
            'desc' => 'Converte caratteri accentati e speciali negli equivalenti ASCII. Über diventa uber, café diventa cafe, naïve diventa naive.',
        ],
        [
            'title' => 'Ottimizzato per la SEO',
            'desc' => 'La rimozione opzionale delle stop word elimina parole comuni come "the", "and", "is" per creare slug più corti e focalizzati sulle keyword.',
        ],
        [
            'title' => 'Generazione in Blocco',
            'desc' => 'Inserisci più titoli o frasi, uno per riga, e genera tutti gli slug in una volta. Perfetto per creare URL in batch per post del blog o pagine prodotto.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Cos\'è uno slug URL?',
            'answer' => 'Uno slug URL è la parte di un indirizzo web che identifica una pagina specifica in un formato leggibile. Ad esempio, in <code class="bg-darkCard px-1 rounded">esempio.com/il-mio-post</code>, lo slug è <code class="bg-darkCard px-1 rounded">il-mio-post</code>. Buoni slug sono in minuscolo, usano i trattini come separatori e contengono keyword rilevanti per la SEO.',
        ],
        [
            'question' => 'Perché gli slug SEO-friendly sono importanti?',
            'answer' => 'Gli slug SEO-friendly aiutano i motori di ricerca a comprendere il contenuto della pagina. Slug puliti e ricchi di keyword possono migliorare il tasso di clic dai risultati di ricerca e aiutare le tue pagine a posizionarsi meglio. Rendono inoltre gli URL più facili da leggere, ricordare e condividere sui social media.',
        ],
        [
            'question' => 'Come gestisce i caratteri speciali questo strumento?',
            'answer' => 'Il generatore rimuove i caratteri speciali, converte le lettere accentate nei loro equivalenti ASCII (es. ü→u, é→e, ñ→n), converte gli spazi nel separatore scelto e mette tutto in minuscolo. Questo garantisce che gli slug siano sicuri per gli URL e funzionino correttamente in tutti i browser.',
        ],
        [
            'question' => 'Posso generare più slug contemporaneamente?',
            'answer' => 'Sì! Inserisci più righe di testo e ogni riga verrà convertita in uno slug separato. Questo è perfetto per generare slug per un batch di articoli del blog, pagine prodotto o categorie tutte in una volta.',
        ],
        [
            'question' => 'Quale separatore dovrei usare per gli slug URL?',
            'answer' => 'I trattini (-) sono il separatore standard e consigliato per gli slug URL. Google tratta i trattini come separatori di parole, il che aiuta la SEO. I trattini bassi sono trattati come connettori, quindi <code class="bg-darkCard px-1 rounded">mio-post</code> è meglio di <code class="bg-darkCard px-1 rounded">mio_post</code> per l\'ottimizzazione nei motori di ricerca.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'enter_text' => 'Inserisci del testo per generare gli slug',
        'nothing_to_copy' => 'Niente da copiare. Genera prima degli slug.',
        'copied' => 'Copiato!',
        'slugs_generated' => '{count} slug generati',
        'and_more' => '... e altri {count}',
        'hyphen_recommended' => 'Trattino - (consigliato)',
        'underscore' => 'Underscore _',
        'dot' => 'Punto .',
        'none_joined' => 'Nessuno (unito)',
        'no_limit' => 'Nessun limite',
        'characters' => 'caratteri',
    ],
];
