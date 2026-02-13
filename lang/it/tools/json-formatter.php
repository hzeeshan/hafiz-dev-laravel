<?php

return [
    // SEO
    'title' => 'Formattatore JSON Online - Formatta, Valida e Minimizza JSON Gratis | hafiz.dev',
    'description' => 'Formattatore JSON online gratuito. Formatta, valida, minimizza e abbellisci JSON istantaneamente. 100% lato client, nessun dato viene inviato al server.',
    'keywords' => 'formattatore json, validatore json, formattare json online, minimizzare json, json beautifier, json viewer, json parser, formattare json gratis, validare json',

    // Page content
    'h1' => 'Formattatore e Validatore JSON',
    'subtitle' => 'Formatta, valida e minimizza JSON istantaneamente. 100% lato client — i tuoi dati non escono mai dal tuo browser.',

    // Toolbar buttons
    'format' => 'Formatta',
    'minify' => 'Minimizza',
    'validate' => 'Valida',
    'copy' => 'Copia',
    'download' => 'Scarica',
    'sample' => 'Esempio',
    'clear' => 'Pulisci',

    // Settings
    'indent' => 'Indentazione:',
    'spaces_2' => '2 spazi',
    'spaces_4' => '4 spazi',
    'tab' => 'Tab',
    'realtime_validation' => 'Validazione in tempo reale',

    // Status bar
    'status' => 'Stato:',
    'ready' => 'Pronto',
    'lines' => 'Righe:',
    'size' => 'Dimensione:',
    'ctrl_enter_hint' => 'per formattare',

    // Editor labels
    'input' => 'Input',
    'output' => 'Output',
    'input_placeholder' => 'Incolla qui il tuo JSON...',
    'output_placeholder' => 'Il JSON formattato apparirà qui...',

    // Error/Success
    'json_error' => 'Errore JSON',

    // Features
    'features' => [
        [
            'title' => '100% Lato Client',
            'desc' => 'Tutta l\'elaborazione avviene nel tuo browser. I tuoi dati non toccano mai i nostri server.',
        ],
        [
            'title' => 'Gratuito Senza Registrazione',
            'desc' => 'Utilizza quante volte vuoi senza creare un account. Nessuna pubblicità, nessun tracciamento.',
        ],
        [
            'title' => 'Risultati Istantanei',
            'desc' => 'Formatta e valida JSON istantaneamente con supporto per scorciatoie da tastiera.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Cos\'è la formattazione JSON?',
            'answer' => 'La formattazione JSON (chiamata anche abbellimento o pretty-printing) è il processo di aggiunta di indentazione, interruzioni di riga e spaziatura ai dati JSON per renderli leggibili. Questo aiuta gli sviluppatori a comprendere la struttura dei dati JSON più facilmente, ed è fondamentale per il debug di API, la lettura di file di configurazione e il lavoro con i dati.',
        ],
        [
            'question' => 'Come si valida il JSON?',
            'answer' => 'Per validare il JSON, incolla i tuoi dati JSON nel campo di input e clicca il pulsante "Valida". Lo strumento verificherà se il tuo JSON segue le regole di sintassi corrette. Se ci sono errori, ti mostrerà la riga esatta e la posizione del carattere dove si è verificato l\'errore, aiutandoti a identificare e correggere rapidamente problemi come virgole mancanti, parentesi non chiuse o valori non validi.',
        ],
        [
            'question' => 'Qual è la differenza tra minimizzare e abbellire?',
            'answer' => 'Abbellire (formattare) aggiunge indentazione e interruzioni di riga per rendere il JSON leggibile. Minimizzare rimuove tutti gli spazi bianchi non necessari per ridurre la dimensione del file. Usa il JSON abbellito per la lettura, il debug e lo sviluppo. Usa il JSON minimizzato per ambienti di produzione, risposte API e trasferimento dati dove dimensioni più piccole migliorano le prestazioni.',
        ],
        [
            'question' => 'Questo strumento è gratuito?',
            'answer' => 'Sì, questo formattatore e validatore JSON è completamente gratuito. Non è richiesta nessuna registrazione, non ci sono limiti di utilizzo e nessuna pubblicità. È sviluppato da hafiz.dev come risorsa gratuita per la comunità degli sviluppatori.',
        ],
        [
            'question' => 'I miei dati sono al sicuro?',
            'answer' => 'Assolutamente sì. Tutta l\'elaborazione JSON avviene interamente nel tuo browser tramite JavaScript. I tuoi dati non lasciano mai il tuo computer e non vengono mai inviati a nessun server. Questo rende lo strumento completamente sicuro per dati sensibili, chiavi API, file di configurazione e qualsiasi altra informazione privata che devi formattare o validare.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'format' => 'Formatta',
        'minify' => 'Minimizza',
        'validate' => 'Valida',
        'copy' => 'Copia',
        'download' => 'Scarica',
        'sample' => 'Esempio',
        'clear' => 'Pulisci',
        'ready' => 'Pronto',
        'valid_json' => 'JSON Valido',
        'invalid_json' => 'JSON Non Valido',
        'json_error' => 'Errore JSON',
        'output_placeholder' => 'Il JSON formattato apparirà qui...',
        'input_placeholder' => 'Incolla qui il tuo JSON...',
        'format_success' => 'JSON formattato con successo!',
        'minify_success' => 'JSON minimizzato con successo!',
        'validate_success' => 'JSON valido! La sintassi è corretta.',
        'validate_empty' => 'Inserisci del JSON da validare',
        'copy_nothing' => 'Niente da copiare. Formatta prima del JSON.',
        'copied' => 'Copiato!',
        'copy_fail' => 'Copia negli appunti non riuscita',
        'download_nothing' => 'Niente da scaricare. Formatta prima del JSON.',
        'downloaded' => 'File JSON scaricato!',
        'error_parsing' => 'Errore nell\'analisi del JSON. Controlla il tuo input.',
        'realtime_validation' => 'Validazione in tempo reale',
        'spaces_2' => '2 spazi',
        'spaces_4' => '4 spazi',
    ],
];
