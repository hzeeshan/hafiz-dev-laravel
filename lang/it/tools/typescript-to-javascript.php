<?php

return [
    // SEO
    'title' => 'Convertitore TypeScript in JavaScript - Converti TS in JS Online Gratis | hafiz.dev',
    'description' => 'Convertitore gratuito da TypeScript a JavaScript online. Rimuovi annotazioni di tipo, interfacce, enum e generici istantaneamente. 100% lato client — il tuo codice non esce mai dal browser.',
    'keywords' => 'typescript a javascript, convertire typescript in javascript, convertitore ts js, rimuovere tipi typescript, compilatore typescript online, strip types typescript',

    // Page content
    'h1' => 'Convertitore TypeScript in JavaScript',
    'subtitle' => 'Converti TypeScript in JavaScript puro istantaneamente. Rimuove annotazioni di tipo, interfacce, enum, generici e modificatori di accesso. Funziona interamente nel tuo browser.',

    // UI Labels — Options
    'preserve_comments' => 'Preserva commenti',
    'remove_modifiers' => 'Rimuovi modificatori di accesso',
    'remove_import_types' => 'Rimuovi istruzioni import type',
    'convert_enums' => 'Converti enum in oggetti',

    // UI Labels — Input/Output
    'ts_input' => 'Input TypeScript',
    'js_output' => 'Output JavaScript',
    'upload_ts' => 'Carica .ts',
    'paste_placeholder' => 'Incolla il tuo codice TypeScript qui...',
    'output_placeholder' => 'Il codice JavaScript apparirà qui...',

    // Buttons
    'convert_btn' => 'Converti in JavaScript',
    'copy_btn' => 'Copia',
    'download_btn' => 'Scarica .js',
    'sample_btn' => 'Esempio',
    'clear_btn' => 'Cancella',

    // Stats
    'stat_lines' => 'Righe',
    'stat_types' => 'Tipi Rimossi',
    'stat_interfaces' => 'Interfacce Rimosse',
    'stat_reduction' => 'Riduzione Dimensione',

    // Features
    'features' => [
        [
            'title' => 'Veloce e Preciso',
            'desc' => 'Converte istantaneamente TypeScript in JavaScript pulito. Gestisce interfacce, enum, generici, decoratori, modificatori di accesso e asserzioni di tipo.',
        ],
        [
            'title' => 'Output Configurabile',
            'desc' => 'Preserva o rimuovi commenti, converti enum in oggetti JS, rimuovi modificatori di accesso e gestisci le istruzioni import type.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutta l\'elaborazione avviene nel tuo browser. Il tuo codice non lascia mai il tuo dispositivo — completamente sicuro per codebase proprietarie.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto TypeScript in JavaScript?',
            'answer' => 'Incolla il tuo codice TypeScript nel campo di input o carica un file .ts/.tsx. Clicca "Converti in JavaScript" e lo strumento rimuove istantaneamente tutte le annotazioni di tipo, interfacce, enum e altra sintassi specifica di TypeScript, producendo un output JavaScript pulito.',
        ],
        [
            'question' => 'Quali funzionalità TypeScript sono supportate?',
            'answer' => 'Il convertitore gestisce annotazioni di tipo, interfacce, alias di tipo, enum (convertiti in oggetti semplici), generici, modificatori di accesso (public/private/protected), readonly, asserzioni as, asserzioni non-null, istruzioni import type, blocchi declare e classi abstract.',
        ],
        [
            'question' => 'Il mio codice è sicuro?',
            'answer' => 'Assolutamente. Tutta la conversione avviene localmente nel tuo browser usando JavaScript. Il tuo codice non viene mai caricato su nessun server, garantendo completa privacy e sicurezza per codice proprietario o sensibile.',
        ],
        [
            'question' => 'Cosa viene esattamente rimosso dal codice TypeScript?',
            'answer' => 'Le dichiarazioni di interfacce e alias di tipo vengono rimosse completamente. Le annotazioni di tipo su variabili, parametri e valori di ritorno vengono eliminate. Gli enum vengono convertiti in oggetti JavaScript semplici. Modificatori di accesso (public, private, protected), readonly, asserzioni di tipo as, asserzioni non-null (!) e istruzioni import type vengono tutti rimossi.',
        ],
        [
            'question' => 'Posso preservare i commenti nell\'output?',
            'answer' => 'Sì! I commenti vengono preservati per impostazione predefinita. Deseleziona "Preserva commenti" se vuoi un output pulito senza commenti. Sia i commenti a riga singola (//) che quelli multiriga (/* */) vengono gestiti correttamente.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'paste_ts' => 'Incolla il tuo codice TypeScript qui...',
        'js_placeholder' => 'Il codice JavaScript apparirà qui...',
        'please_enter_ts' => 'Inserisci il codice TypeScript',
        'conversion_error' => 'Errore di conversione: ',
        'converted_success' => 'TypeScript convertito in JavaScript con successo!',
        'nothing_to_copy' => 'Niente da copiare',
        'copied' => 'Copiato!',
        'nothing_to_download' => 'Niente da scaricare',
        'js_downloaded' => 'File JavaScript scaricato',
        'sample_loaded' => 'Esempio TypeScript caricato — clicca Converti',
        'file_loaded' => 'File caricato: ',
    ],
];
