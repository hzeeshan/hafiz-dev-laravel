<?php

return [
    // SEO
    'title' => 'Convertitore CSS in Tailwind - Converti CSS in Classi Tailwind Gratis | hafiz.dev',
    'description' => 'Convertitore online gratuito da CSS a Tailwind CSS. Converti proprietà CSS in classi utility Tailwind istantaneamente nel tuo browser. Nessuna registrazione richiesta.',
    'keywords' => 'css in tailwind, convertitore css tailwind, convertire css in tailwind, css to tailwind online, convertitore classi tailwind, da css a tailwind',

    // Page content
    'h1' => 'Convertitore CSS in Tailwind',
    'subtitle' => 'Converti proprietà CSS in classi utility Tailwind CSS istantaneamente. Supporta colori, spaziatura, tipografia, flexbox, grid e altro.',

    // UI Labels
    'use_arbitrary' => 'Usa valori arbitrari per gli sconosciuti',
    'strip_selectors' => 'Rimuovi selettori (solo classi)',
    'add_important' => 'Aggiungi prefisso ! (important)',
    'css_input' => 'Input CSS',
    'upload_css' => 'Carica .css',
    'tailwind_output' => 'Output Tailwind',
    'tw_output_placeholder' => 'Le classi Tailwind CSS appariranno qui...',
    'convert' => 'Converti',
    'copy' => 'Copia',
    'download' => 'Scarica',
    'sample' => 'Esempio',
    'clear' => 'Cancella',
    'css_rules' => 'Regole CSS',
    'properties' => 'Proprietà',
    'converted' => 'Convertite',
    'unsupported' => 'Non supportate',

    // Features
    'features' => [
        [
            'title' => 'Conversione Istantanea',
            'desc' => 'Incolla il CSS e ottieni le classi Tailwind in tempo reale. Gestisce colori, spaziatura, tipografia, flexbox, grid, bordi, ombre e altro.',
        ],
        [
            'title' => 'Mappatura Colori Intelligente',
            'desc' => 'I colori esadecimali vengono mappati al colore più vicino della palette Tailwind. I colori sconosciuti usano la sintassi con valori arbitrari come bg-[#abc].',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutta la conversione avviene nel tuo browser. Il tuo codice CSS non viene mai inviato a nessun server. Veloce, sicuro e completamente privato.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto CSS in Tailwind CSS?',
            'answer' => 'Incolla il tuo codice CSS nel campo di input e lo strumento converte istantaneamente ogni proprietà CSS nella classe utility Tailwind CSS equivalente. Gestisce colori, spaziatura, tipografia, flexbox, grid, bordi, ombre e altro.',
        ],
        [
            'question' => 'Questo convertitore gestisce tutte le proprietà CSS?',
            'answer' => 'Il convertitore supporta le proprietà CSS più comunemente usate, tra cui display, position, colori, spaziatura (margin, padding), dimensioni (width, height), tipografia (font-size, font-weight, line-height), flexbox, grid, bordi, border-radius, box-shadow, opacity, overflow, z-index e altro. Le proprietà non supportate vengono mostrate come commenti per la conversione manuale.',
        ],
        [
            'question' => 'Converte i colori esadecimali in classi colore Tailwind?',
            'answer' => 'Sì! Il convertitore mappa i valori esadecimali comuni alla palette colori di Tailwind (es. #ef4444 diventa red-500). Per i colori che non corrispondono alla palette, genera la sintassi con valori arbitrari come bg-[#abc123].',
        ],
        [
            'question' => 'Posso convertire più regole CSS contemporaneamente?',
            'answer' => 'Sì! Puoi incollare più regole CSS con selettori e il convertitore elabora ogni regola separatamente, mostrando le classi Tailwind per ogni selettore. Gestisce regole annidate e dichiarazioni multiple per blocco.',
        ],
        [
            'question' => 'La conversione da CSS a Tailwind avviene localmente?',
            'answer' => 'Sì, tutta la conversione avviene al 100% nel tuo browser. Il tuo codice CSS non viene mai inviato a nessun server, garantendo completa privacy e risultati istantanei.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'enter_css' => 'Inserisci il codice CSS',
        'no_valid_css' => 'Nessuna proprietà CSS valida trovata',
        'converted_msg' => 'Convertite {converted} di {total} proprietà in {rules} regol{plural}',
        'error_parsing' => 'Errore nell\'analisi del CSS:',
        'nothing_to_copy' => 'Niente da copiare',
        'copied' => 'Copiato!',
        'nothing_to_download' => 'Niente da scaricare',
        'downloaded' => 'Scaricato tailwind-classes.txt',
        'file_loaded' => 'File caricato:',
    ],
];
