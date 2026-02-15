<?php

return [
    // SEO
    'title' => 'Convertitore Base64 in Immagine - Converti Base64 in Immagine Online Gratis | hafiz.dev',
    'description' => 'Convertitore Base64 in immagine online gratuito. Decodifica stringhe Base64 in immagini PNG, JPEG, GIF, SVG e WebP istantaneamente. Anteprima, download o copia dell\'immagine nel browser.',
    'keywords' => 'base64 in immagine, convertitore base64 immagine, decodificare base64 immagine, base64 to image, convertire base64 png, decoder base64',

    // Page content
    'h1' => 'Convertitore Base64 in Immagine',
    'subtitle' => 'Decodifica stringhe Base64 in immagini visualizzabili e scaricabili. Supporta PNG, JPEG, GIF, WebP, SVG e altro. Rilevamento automatico del formato.',

    // UI Labels
    'format_label' => 'Formato (se senza prefisso data URI):',
    'auto_detect' => 'Rilevamento automatico',
    'base64_input' => 'Input Base64',
    'input_placeholder' => 'Incolla la stringa Base64 qui (con o senza prefisso data:image/...;base64,)...',
    'decode_image' => 'Decodifica Immagine',
    'download' => 'Scarica',
    'sample' => 'Esempio',
    'image_preview' => 'Anteprima Immagine',
    'format' => 'Formato',
    'dimensions' => 'Dimensioni',
    'base64_size' => 'Dimensione Base64',
    'file_size' => 'Dimensione File (stima)',

    // Features
    'features' => [
        [
            'title' => 'Supporto Multi-Formato',
            'desc' => 'Decodifica Base64 in PNG, JPEG, GIF, WebP, SVG, BMP e ICO. Rilevamento automatico del formato dal prefisso data URI o scelta manuale.',
        ],
        [
            'title' => 'Dettagli Immagine',
            'desc' => 'Visualizza istantaneamente dimensioni, formato, dimensione Base64 e dimensione file stimata. Lo sfondo a scacchiera rivela la trasparenza nelle immagini PNG e WebP.',
        ],
        [
            'title' => 'Download Istantaneo',
            'desc' => 'Scarica l\'immagine decodificata come file con l\'estensione corretta. Un clic e l\'immagine viene salvata sul dispositivo nel formato corretto.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto Base64 in un\'immagine?',
            'answer' => 'Incolla la tua stringa Base64 (con o senza il prefisso data:image) e clicca "Decodifica Immagine". Lo strumento mostra un\'anteprima con i dettagli dell\'immagine e puoi scaricare l\'immagine direttamente.',
        ],
        [
            'question' => 'Quali formati immagine sono supportati?',
            'answer' => 'PNG, JPEG, GIF, WebP, SVG, BMP e ICO sono tutti supportati. Il formato viene rilevato automaticamente dal prefisso data URI, oppure puoi selezionarlo manualmente dal menu a tendina.',
        ],
        [
            'question' => 'Ho bisogno del prefisso data URI?',
            'answer' => 'No! Puoi incollare l\'URI dati completo (data:image/png;base64,...) o solo i caratteri Base64 grezzi. Se incolli Base64 grezzo, seleziona il formato dal menu a tendina o lascia il rilevamento automatico (predefinito: PNG).',
        ],
        [
            'question' => 'C\'è un limite di dimensione del file?',
            'answer' => 'Tutto viene eseguito nel browser, quindi non c\'è limite lato server. Stringhe Base64 molto grandi (oltre 10MB) potrebbero rallentare il browser, ma le immagini tipiche funzionano istantaneamente.',
        ],
        [
            'question' => 'I miei dati sono al sicuro?',
            'answer' => 'Sì! Tutta la conversione avviene interamente nel tuo browser usando JavaScript. Nessun dato viene caricato su alcun server. Le tue stringhe Base64 e le immagini non lasciano mai il tuo dispositivo.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'empty_error' => 'Incolla una stringa Base64',
        'invalid_error' => 'Stringa Base64 non valida. Controlla il tuo input.',
        'decode_error' => 'Impossibile decodificare l\'immagine. I dati Base64 potrebbero essere corrotti o non essere un\'immagine valida.',
        'decoded_prefix' => 'Immagine decodificata — ',
        'downloaded_prefix' => 'Immagine scaricata come ',
        'character' => 'carattere',
        'characters' => 'caratteri',
    ],
];
