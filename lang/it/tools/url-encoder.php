<?php

return [
    // SEO
    'title' => 'Codificatore/Decodificatore URL Online - Codifica e Decodifica URL Gratis | hafiz.dev',
    'description' => 'Codificatore e decodificatore URL online gratuito. Codifica caratteri speciali per URL o decodifica stringhe percent-encoded. 100% lato client, risultati istantanei.',
    'keywords' => 'codificatore url, decodificatore url, url encode online, percent encoding, codifica url, decodifica url, codificatore query string, codificatore uri',

    // Page content
    'h1' => 'Codificatore/Decodificatore URL',
    'subtitle' => 'Codifica e decodifica URL e query string istantaneamente. 100% lato client — i tuoi dati non escono mai dal tuo browser.',

    // Tab labels
    'encode_tab' => 'Codifica',
    'decode_tab' => 'Decodifica',

    // Encoding type
    'encoding_type' => 'Tipo di Codifica',
    'component_label' => 'encodeURIComponent',
    'component_desc' => '(consigliato per parametri query)',
    'uri_label' => 'encodeURI',
    'uri_desc' => '(preserva la struttura URL)',

    // Toolbar buttons
    'encode_btn' => 'Codifica',
    'decode_btn' => 'Decodifica',
    'swap' => 'Scambia',
    'copy' => 'Copia',
    'sample' => 'Esempio',
    'clear' => 'Cancella',

    // Input/Output labels
    'input_label_encode' => 'Testo da Codificare',
    'input_label_decode' => 'Testo da Decodificare',
    'output_label_encode' => 'Risultato Codificato',
    'output_label_decode' => 'Risultato Decodificato',

    // Placeholders
    'input_placeholder_encode' => 'Inserisci testo o URL da codificare...',
    'input_placeholder_decode' => 'Inserisci stringa URL-encoded da decodificare...',
    'output_placeholder' => 'Il risultato apparirà qui...',

    // Status bar
    'status_ready' => 'Pronto',
    'input_label' => 'Input',
    'output_label' => 'Output',
    'changed_label' => 'Modificati',
    'chars' => 'car.',
    'keyboard_hint' => 'converti',

    // Error display
    'error_title' => 'Errore',

    // Common encoded characters table
    'common_chars_title' => 'Caratteri Codificati Comuni',
    'character' => 'Carattere',
    'encoded' => 'Codificato',
    'char_description' => 'Descrizione',
    'space' => 'Spazio',
    'exclamation' => 'Punto esclamativo',
    'hash' => 'Cancelletto',
    'dollar' => 'Simbolo del dollaro',
    'ampersand' => 'E commerciale',
    'single_quote' => 'Apice singolo',
    'plus' => 'Segno più',
    'forward_slash' => 'Barra',
    'colon' => 'Due punti',
    'equals' => 'Segno uguale',
    'question_mark' => 'Punto interrogativo',
    'at_sign' => 'Chiocciola',

    // Features
    'features' => [
        [
            'title' => '100% Lato Client',
            'desc' => 'Tutta l\'elaborazione avviene nel tuo browser. I tuoi dati non toccano mai i nostri server.',
        ],
        [
            'title' => 'Gratuito e Senza Registrazione',
            'desc' => 'Usa senza limiti e senza creare un account. Nessuna pubblicità, nessun tracciamento.',
        ],
        [
            'title' => 'Risultati Istantanei',
            'desc' => 'Codifica e decodifica URL istantaneamente mentre digiti con conversione in tempo reale.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Cos\'è la codifica URL?',
            'answer' => 'La codifica URL (chiamata anche percent-encoding) converte i caratteri in un formato che può essere trasmesso in sicurezza negli URL. I caratteri speciali vengono sostituiti con un segno di percentuale (%) seguito dal loro valore esadecimale ASCII. Ad esempio, uno spazio diventa %20 e una e commerciale diventa %26. Questo garantisce che gli URL rimangano validi anche quando contengono caratteri speciali.',
        ],
        [
            'question' => 'Qual è la differenza tra encodeURI e encodeURIComponent?',
            'answer' => 'encodeURI è progettato per codificare URL completi e preserva i caratteri che hanno un significato speciale negli URL come :, /, ?, # e &. encodeURIComponent codifica tutto tranne i caratteri alfanumerici ed è ideale per codificare parametri URL o valori delle query string dove questi caratteri speciali devono essere convertiti.',
        ],
        [
            'question' => 'Quali caratteri devono essere codificati negli URL?',
            'answer' => 'I caratteri che devono essere codificati includono: spazi, virgolette, segni di minore/maggiore, cancelletto (#), percentuale (%), parentesi graffe, parentesi quadre, pipe (|), barra rovesciata e accento circonflesso (^). I caratteri riservati come &, =, + e ? devono essere codificati quando utilizzati come dati e non come struttura dell\'URL.',
        ],
        [
            'question' => 'Quando dovrei usare la codifica URL?',
            'answer' => 'Usa la codifica URL quando: passi input dell\'utente come parametri URL, includi caratteri speciali nelle query string, codifichi percorsi di file negli URL, invii dati di form tramite richieste GET, crei link condivisibili con contenuto dinamico o lavori con API che richiedono dati URL-encoded. Codifica sempre i dati forniti dall\'utente per prevenire injection URL e garantire l\'integrità dei dati.',
        ],
        [
            'question' => 'Questo strumento è gratuito e sicuro?',
            'answer' => 'Sì, questo strumento è completamente gratuito e non richiede registrazione. Tutta la codifica e decodifica URL avviene interamente nel tuo browser tramite JavaScript. I tuoi dati non lasciano mai il tuo computer e non vengono mai inviati a nessun server, rendendolo completamente sicuro per URL sensibili, chiavi API, token di autenticazione e qualsiasi dato riservato.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'encode_tab' => 'Codifica',
        'decode_tab' => 'Decodifica',
        'encoding_type' => 'Tipo di Codifica',
        'component_label' => 'encodeURIComponent',
        'component_desc' => '(consigliato per parametri query)',
        'uri_label' => 'encodeURI',
        'uri_desc' => '(preserva la struttura URL)',
        'encode_btn' => 'Codifica',
        'decode_btn' => 'Decodifica',
        'swap' => 'Scambia',
        'copy' => 'Copia',
        'sample' => 'Esempio',
        'clear' => 'Cancella',
        'input_label_encode' => 'Testo da Codificare',
        'input_label_decode' => 'Testo da Decodificare',
        'output_label_encode' => 'Risultato Codificato',
        'output_label_decode' => 'Risultato Decodificato',
        'input_placeholder_encode' => 'Inserisci testo o URL da codificare...',
        'input_placeholder_decode' => 'Inserisci stringa URL-encoded da decodificare...',
        'output_placeholder' => 'Il risultato apparirà qui...',
        'status_ready' => 'Pronto',
        'swap_nothing' => 'Niente da scambiare. Converti qualcosa prima.',
        'copy_nothing' => 'Niente da copiare. Converti qualcosa prima.',
        'copy_fail' => 'Copia negli appunti non riuscita',
        'copied' => 'Copiato!',
        'encode_success' => 'Codificato con successo usando {type}! L\'output è di {n} caratteri.',
        'decode_success' => 'Decodificato con successo! L\'output è di {n} caratteri.',
        'decode_error' => 'Stringa URL-encoded non valida. L\'input contiene sequenze percent-encoding malformate.',
        'swapped_status' => 'Scambiato e convertito',
        'input_label' => 'Input',
        'output_label' => 'Output',
        'changed_label' => 'Modificati',
        'keyboard_hint' => 'converti',
    ],
];
