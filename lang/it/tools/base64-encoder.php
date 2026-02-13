<?php

return [
    // SEO
    'title' => 'Codificatore Base64 Online - Codifica e Decodifica Base64 Gratis | hafiz.dev',
    'description' => 'Codificatore e decodificatore Base64 online gratuito. Codifica testo in Base64 o decodifica stringhe Base64 istantaneamente. 100% lato client, i tuoi dati non escono mai dal browser.',
    'keywords' => 'codificatore base64, decodificatore base64, base64 online, codifica base64, decodifica base64, convertitore base64, base64 url safe, base64 gratis',

    // Page content
    'h1' => 'Codificatore e Decodificatore Base64',
    'subtitle' => 'Codifica testo in Base64 o decodifica stringhe Base64 istantaneamente. 100% lato client — i tuoi dati non escono mai dal tuo browser.',

    // Toolbar buttons
    'encode' => 'Codifica',
    'decode' => 'Decodifica',
    'swap' => 'Scambia',
    'copy' => 'Copia',
    'download' => 'Scarica',
    'sample' => 'Esempio',
    'clear' => 'Cancella',

    // Options
    'url_safe' => 'Codifica URL-safe',

    // Status bar
    'status_label' => 'Stato',
    'status_ready' => 'Pronto',
    'input_label' => 'Input',
    'output_label' => 'Output',
    'chars' => 'car.',

    // Editor labels
    'input' => 'Input',
    'output' => 'Output',
    'input_placeholder' => 'Inserisci il testo da codificare o una stringa Base64 da decodificare...',
    'output_placeholder' => 'Il risultato apparirà qui...',

    // Error display
    'error_title' => 'Errore',

    // Keyboard hints
    'keyboard_encode' => 'codifica',
    'keyboard_decode' => 'decodifica',

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
            'desc' => 'Codifica e decodifica Base64 istantaneamente con supporto per scorciatoie da tastiera.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Cos\'è la codifica Base64?',
            'answer' => 'Base64 è uno schema di codifica da binario a testo che rappresenta dati binari in formato stringa ASCII. Converte i dati binari in un set di 64 caratteri stampabili (A-Z, a-z, 0-9, +, /), rendendoli sicuri per la trasmissione tramite protocolli testuali come email o per l\'incorporamento in HTML/CSS. L\'output codificato è circa il 33% più grande dei dati originali.',
        ],
        [
            'question' => 'Quando dovrei usare Base64?',
            'answer' => 'Base64 è comunemente usato per: incorporare immagini direttamente in HTML/CSS (data URI), codificare dati binari per l\'inclusione in JSON o XML, allegati email tramite codifica MIME, codificare credenziali di autenticazione nelle intestazioni HTTP Basic Auth, e memorizzare dati binari in database che supportano solo testo.',
        ],
        [
            'question' => 'Cos\'è il Base64 URL-safe?',
            'answer' => 'Il Base64 standard usa i caratteri + e / che hanno un significato speciale negli URL (+ diventa uno spazio, / separa i segmenti del percorso). Il Base64 URL-safe sostituisce + con - e / con _, e tipicamente rimuove i caratteri di padding (=). Questa variante è comunemente usata nei JWT (JSON Web Token), nei parametri URL e nei nomi dei file.',
        ],
        [
            'question' => 'Base64 è una forma di crittografia?',
            'answer' => 'No, Base64 è una codifica, non crittografia. Non fornisce assolutamente alcuna sicurezza. Chiunque può decodificare una stringa Base64 istantaneamente — è una trasformazione semplice e reversibile. Non usare mai Base64 per proteggere informazioni sensibili come password o chiavi API. Per la sicurezza, usa algoritmi di crittografia appropriati come AES o hashing sicuro.',
        ],
        [
            'question' => 'I miei dati sono al sicuro?',
            'answer' => 'Sì, tutta l\'elaborazione Base64 avviene interamente nel tuo browser tramite JavaScript. I tuoi dati non lasciano mai il tuo computer e non vengono mai inviati a nessun server. Questo rende lo strumento completamente sicuro per qualsiasi dato che devi codificare o decodificare, incluse informazioni sensibili, risposte API e contenuti privati.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'encode' => 'Codifica',
        'decode' => 'Decodifica',
        'swap' => 'Scambia',
        'copy' => 'Copia',
        'download' => 'Scarica',
        'sample' => 'Esempio',
        'clear' => 'Cancella',
        'url_safe' => 'Codifica URL-safe',
        'status_ready' => 'Pronto',
        'status_label' => 'Stato',
        'input_label' => 'Input',
        'output_label' => 'Output',
        'input_chars' => 'car.',
        'output_chars' => 'car.',
        'input_placeholder' => 'Inserisci il testo da codificare o una stringa Base64 da decodificare...',
        'output_placeholder' => 'Il risultato apparirà qui...',
        'error_title' => 'Errore',
        'encode_empty' => 'Inserisci il testo da codificare.',
        'decode_empty' => 'Inserisci una stringa Base64 da decodificare.',
        'encode_fail' => 'Codifica non riuscita: ',
        'decode_fail' => 'Stringa Base64 non valida. Assicurati che l\'input sia una stringa Base64 valida.',
        'encode_success' => 'Codificato con successo!',
        'encode_success_url_safe' => ' (URL-safe)',
        'output_is' => ' L\'output è di ',
        'characters' => ' caratteri.',
        'decode_success' => 'Decodificato con successo!',
        'swapped' => 'Input e output scambiati',
        'copy_nothing' => 'Niente da copiare. Codifica o decodifica qualcosa prima.',
        'copied' => 'Copiato!',
        'copy_fail' => 'Copia negli appunti non riuscita',
        'download_nothing' => 'Niente da scaricare. Codifica o decodifica qualcosa prima.',
        'downloaded' => 'File scaricato!',
        'sample_loaded' => 'Esempio caricato — clicca Codifica per convertire',
        'success_label' => 'Successo',
        'error_label' => 'Errore',
    ],
];
