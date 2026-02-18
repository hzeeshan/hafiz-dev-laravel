<?php

return [
    // SEO
    'title' => 'Convertitore JSON in Array PHP - Converti JSON in PHP Online Gratis | hafiz.dev',
    'description' => 'Convertitore gratuito da JSON ad array PHP online. Converti dati JSON in sintassi array PHP istantaneamente nel tuo browser. Supporta oggetti annidati, sintassi breve e formato var_export.',
    'keywords' => 'json a php array, convertire json in php, convertitore json php, json in array php online, json to php, convertitore json php online gratis',

    // Page content
    'h1' => 'Convertitore JSON in Array PHP',
    'subtitle' => 'Converti dati JSON in sintassi array PHP istantaneamente. Supporta sintassi breve e lunga, virgole finali e assegnazione a variabile.',

    // UI Labels — Options
    'variable_name' => 'Nome Variabile',
    'array_syntax' => 'Sintassi Array',
    'short_syntax' => 'Sintassi breve []',
    'long_syntax' => 'Sintassi lunga array()',
    'indent' => 'Indentazione',
    'two_spaces' => '2 spazi',
    'four_spaces' => '4 spazi',
    'tab' => 'Tab',
    'trailing_commas' => 'Virgole finali',
    'variable_assignment' => 'Assegnazione variabile',
    'single_quotes' => 'Apici singoli',

    // UI Labels — Input/Output
    'json_input' => 'Input JSON',
    'php_output' => 'Output PHP',
    'upload_json' => 'Carica .json',
    'paste_placeholder' => 'Incolla il tuo JSON qui...',
    'output_placeholder' => 'Il codice array PHP apparirà qui...',

    // Buttons
    'convert_btn' => 'Converti in PHP',
    'copy_btn' => 'Copia',
    'download_btn' => 'Scarica .php',
    'sample_btn' => 'Esempio',
    'clear_btn' => 'Cancella',

    // Stats
    'stat_keys' => 'Chiavi',
    'stat_depth' => 'Profondità Max',
    'stat_arrays' => 'Array',
    'stat_lines' => 'Righe',

    // Features
    'features' => [
        [
            'title' => 'Sintassi PHP Moderna',
            'desc' => 'Scegli tra sintassi breve <code class="bg-darkCard px-1 rounded">[]</code> o tradizionale <code class="bg-darkCard px-1 rounded">array()</code> per adattarti alle convenzioni del tuo progetto.',
        ],
        [
            'title' => 'Annidamento Profondo',
            'desc' => 'Gestisce qualsiasi livello di annidamento di oggetti e array JSON. Produce codice PHP pulito e correttamente indentato, pronto da incollare nel tuo progetto.',
        ],
        [
            'title' => 'Output Configurabile',
            'desc' => 'Personalizza stile virgolette, virgole finali, assegnazione variabile e indentazione per adattarti ai tuoi standard di codifica PHP.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto JSON in un array PHP?',
            'answer' => 'Incolla i tuoi dati JSON o carica un file .json. Lo strumento analizza il JSON e genera il codice array PHP equivalente. Gli oggetti diventano array associativi con chiavi stringa, e gli array JSON diventano array PHP indicizzati.',
        ],
        [
            'question' => 'Qual è la differenza tra sintassi breve e lunga degli array?',
            'answer' => 'La sintassi breve usa le parentesi quadre <code class="bg-darkCard px-1 rounded">[]</code> (PHP 5.4+) mentre la sintassi lunga usa <code class="bg-darkCard px-1 rounded">array()</code>. Entrambe sono funzionalmente identiche. La sintassi breve è lo standard moderno usato in Laravel, Symfony e nella maggior parte dei framework PHP.',
        ],
        [
            'question' => 'Come vengono gestiti i valori null JSON in PHP?',
            'answer' => 'JSON null diventa PHP <code class="bg-darkCard px-1 rounded">null</code>, i booleani diventano <code class="bg-darkCard px-1 rounded">true</code>/<code class="bg-darkCard px-1 rounded">false</code>, i numeri restano interi o float, e le stringhe vengono quotate e sottoposte a escape correttamente con lo stile di virgolette scelto.',
        ],
        [
            'question' => 'Posso convertire oggetti JSON annidati in PHP?',
            'answer' => 'Sì! Gli oggetti JSON annidati diventano array associativi annidati, e gli array annidati diventano array indicizzati annidati. L\'output è correttamente indentato a ogni livello, rendendo facile la lettura anche delle strutture profondamente annidate.',
        ],
        [
            'question' => 'I miei dati JSON sono al sicuro usando questo convertitore?',
            'answer' => 'Assolutamente. L\'intera conversione avviene nel tuo browser usando JavaScript. Nessun dato viene inviato a nessun server. Il tuo JSON non lascia mai il tuo dispositivo, rendendo questo strumento sicuro per dati di configurazione sensibili e payload API.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'paste_json' => 'Incolla il tuo JSON qui...',
        'php_placeholder' => 'Il codice array PHP apparirà qui...',
        'please_enter_json' => 'Inserisci i dati JSON',
        'invalid_json' => 'JSON non valido: ',
        'converted_success' => 'Convertito in array PHP',
        'nothing_to_copy' => 'Niente da copiare',
        'copied' => 'Copiato!',
        'nothing_to_download' => 'Niente da scaricare',
        'php_downloaded' => 'File PHP scaricato',
        'file_loaded' => 'File caricato: ',
    ],
];
