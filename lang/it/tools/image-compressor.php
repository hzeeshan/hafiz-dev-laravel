<?php

return [
    // SEO
    'title' => 'Compressore di Immagini - Comprimi JPEG, PNG, WebP Online Gratis | hafiz.dev',
    'description' => 'Compressore di immagini online gratuito. Riduci le dimensioni dei file fino al 90% mantenendo la qualità. Supporta JPEG, PNG, WebP, GIF. 100% lato client — le tue immagini non escono mai dal browser.',
    'keywords' => 'compressore immagini, comprimere immagini online, ridurre dimensione immagini, compressore jpeg, compressore png, compressore webp, ottimizzare immagini, comprimere foto online gratis',

    // Page content
    'h1' => 'Compressore di Immagini',
    'subtitle' => 'Comprimi immagini JPEG, PNG, WebP e GIF fino al 90% in meno. 100% lato client — le tue immagini non escono mai dal browser.',

    // UI Labels — Settings
    'quality' => 'Qualità',
    'preset_blog' => 'Blog/Web',
    'preset_social' => 'Social Media',
    'preset_high' => 'Alta Qualità',
    'slider_smaller' => 'Più piccolo',
    'slider_higher_quality' => 'Qualità maggiore',
    'max_width' => 'Larghezza max (px)',
    'max_height' => 'Altezza max (px)',
    'max_dimension_hint' => 'Lascia vuoto per l\'originale',
    'max_width_placeholder' => 'es. 1920',
    'max_height_placeholder' => 'es. 1080',
    'output_format' => 'Formato di uscita',
    'original_format' => 'Formato originale',
    'auto_compress' => 'Comprimi automaticamente al caricamento',

    // UI Labels — Drop zone
    'drop_text' => 'Trascina le immagini qui o clicca per sfogliare',
    'supports' => 'Supporta: JPEG, PNG, WebP, GIF',
    'paste_hint' => 'Suggerimento: puoi anche incollare immagini dagli appunti (Ctrl+V / Cmd+V)',

    // UI Labels — Queue
    'images_queue' => 'Coda Immagini',
    'clear_all' => 'Cancella Tutto',

    // UI Labels — Buttons
    'compress_all' => 'Comprimi Tutto',
    'download_all_zip' => 'Scarica Tutto (ZIP)',

    // UI Labels — Summary
    'compression_summary' => 'Riepilogo Compressione',
    'stat_images' => 'Immagini',
    'stat_original_size' => 'Dimensione Originale',
    'stat_compressed_size' => 'Dimensione Compressa',
    'stat_total_savings' => 'Risparmio Totale',

    // Features
    'features' => [
        [
            'title' => '100% Privato e Sicuro',
            'desc' => 'Le tue immagini non escono mai dal browser. Tutta la compressione avviene localmente sul tuo dispositivo.',
        ],
        [
            'title' => 'Elaborazione in Blocco',
            'desc' => 'Comprimi più immagini contemporaneamente. Scarica singolarmente o come file ZIP.',
        ],
        [
            'title' => 'Qualità Regolabile',
            'desc' => 'Regola la compressione con il cursore della qualità. Anteprima dei risultati prima del download.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come funziona il compressore di immagini?',
            'answer' => 'Il nostro strumento utilizza algoritmi di compressione avanzati basati sul browser per ridurre le dimensioni dei file immagine. La compressione avviene interamente nel tuo browser — le tue immagini non vengono mai caricate su alcun server.',
        ],
        [
            'question' => 'Quali formati immagine sono supportati?',
            'answer' => 'Supportiamo i formati JPEG, PNG, WebP e GIF. Puoi anche convertire tra formati durante la compressione per ottenere i migliori risultati per il tuo caso d\'uso.',
        ],
        [
            'question' => 'C\'è un limite di dimensione del file?',
            'answer' => 'Non c\'è un limite rigido, ma immagini molto grandi (oltre 50 MB) potrebbero richiedere più tempo per l\'elaborazione. Per le migliori prestazioni, raccomandiamo immagini sotto i 20 MB.',
        ],
        [
            'question' => 'Le mie immagini sono al sicuro?',
            'answer' => 'Assolutamente sì. Tutta la compressione avviene localmente nel tuo browser tramite JavaScript. Le tue immagini non lasciano mai il tuo dispositivo e non vengono caricate su alcun server.',
        ],
        [
            'question' => 'Di quanto posso ridurre la dimensione del file?',
            'answer' => 'La compressione tipica riduce le dimensioni dei file del 60-90% a seconda dell\'immagine originale e delle impostazioni di qualità. Puoi regolare il cursore della qualità per bilanciare dimensione e qualità.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'drop_text' => 'Trascina le immagini qui o clicca per sfogliare',
        'drop_here' => 'Rilascia le immagini qui',
        'supports' => 'Supporta: JPEG, PNG, WebP, GIF',
        'paste_hint' => 'Suggerimento: puoi anche incollare immagini dagli appunti (Ctrl+V / Cmd+V)',
        'images_queue' => 'Coda Immagini',
        'clear_all' => 'Cancella Tutto',
        'compress' => 'Comprimi',
        'compress_all' => 'Comprimi Tutto',
        'download' => 'Scarica',
        'download_all_zip' => 'Scarica Tutto (ZIP)',
        'compressing' => 'Compressione in corso...',
        'creating_zip' => 'Creazione ZIP...',
        'compression_summary' => 'Riepilogo Compressione',
        'images' => 'Immagini',
        'original_size' => 'Dimensione Originale',
        'compressed_size' => 'Dimensione Compressa',
        'total_savings' => 'Risparmio Totale',
        'original' => 'Originale',
        'compressed' => 'Compressa',
        'smaller' => 'più piccola',
        'compression_failed' => 'Compressione fallita',
        'all_already_compressed' => 'Tutte le immagini sono già compresse!',
        'success_compressed_one' => 'Immagine compressa con successo!',
        'success_compressed_many' => '{count} immagini compresse con successo!',
        'compressed_with_errors' => '{success} immagini compresse. {failed} fallite.',
        'no_compressed_to_download' => 'Nessuna immagine compressa da scaricare.',
        'zip_failed' => 'Impossibile creare il file ZIP.',
        'downloaded' => 'Scaricato: {filename}',
        'downloaded_zip' => '{count} immagini scaricate come ZIP!',
        'pasted_from_clipboard' => 'Immagine incollata dagli appunti!',
        'slider_smaller' => 'Più piccolo',
        'slider_higher_quality' => 'Qualità maggiore',
    ],
];
