<?php

return [
    // SEO
    'title' => 'Convertitore JSON in YAML - Converti JSON in YAML Online Gratis | hafiz.dev',
    'description' => 'Convertitore online gratuito da JSON a YAML. Converti dati JSON in formato YAML istantaneamente nel browser. Supporta oggetti annidati, array e file di grandi dimensioni. 100% lato client.',
    'keywords' => 'json in yaml, convertitore json yaml, convertire json in yaml, json to yaml online, json2yaml, trasformare json in yaml, convertitore yaml gratis',

    // Page content
    'h1' => 'Convertitore JSON in YAML',
    'subtitle' => 'Converti JSON in formato YAML istantaneamente. Perfetto per configurazioni Kubernetes, file Docker Compose, pipeline CI/CD e molto altro.',

    // UI Labels
    'indentation' => 'Indentazione',
    'spaces_2' => '2 Spazi (predefinito)',
    'spaces_4' => '4 Spazi',
    'inline_short_arrays' => 'Array brevi inline',
    'quote_all_strings' => 'Virgolettare tutte le stringhe',
    'json_input' => 'Input JSON',
    'yaml_output' => 'Output YAML',
    'input_placeholder' => 'Incolla il tuo JSON qui...',
    'output_placeholder' => 'Il YAML convertito apparirà qui...',
    'convert_to_yaml' => 'Converti in YAML',
    'copy' => 'Copia',
    'download_yaml' => 'Scarica .yaml',
    'sample' => 'Esempio',
    'clear' => 'Pulisci',
    'top_level_keys' => 'Chiavi principali',
    'max_depth' => 'Profondità massima',
    'json_size' => 'Dimensione JSON',
    'yaml_size' => 'Dimensione YAML',

    // Features
    'features' => [
        [
            'title' => 'Conversione Istantanea',
            'desc' => 'Converti JSON in YAML in millisecondi. Gestisce file di grandi dimensioni con strutture annidate complesse senza sforzo.',
        ],
        [
            'title' => 'Output Configurabile',
            'desc' => 'Personalizza indentazione, virgolettatura delle stringhe e formattazione degli array per adattarli alle convenzioni YAML del tuo progetto.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutta l\'elaborazione avviene nel browser. I tuoi dati non lasciano mai il dispositivo — sicuro anche per configurazioni sensibili.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto JSON in YAML?',
            'answer' => 'Incolla i tuoi dati JSON nel campo di input e clicca "Converti in YAML". Lo strumento converte istantaneamente il tuo JSON in YAML formattato correttamente. Puoi poi copiare il risultato o scaricarlo come file .yaml.',
        ],
        [
            'question' => 'Qual è la differenza tra JSON e YAML?',
            'answer' => 'JSON usa parentesi graffe e quadre con sintassi rigida, mentre YAML usa la formattazione basata sull\'indentazione che è più leggibile. YAML supporta commenti, stringhe multilinea e ancoraggi. YAML è comunemente usato per file di configurazione (Docker, Kubernetes, CI/CD), mentre JSON è preferito per API e scambio dati.',
        ],
        [
            'question' => 'Questo strumento gestisce oggetti JSON annidati?',
            'answer' => 'Sì, il convertitore gestisce oggetti JSON profondamente annidati, array, tipi misti e strutture dati complesse. Tutta l\'annidazione viene preservata accuratamente nell\'output YAML con indentazione corretta.',
        ],
        [
            'question' => 'Posso personalizzare l\'indentazione YAML?',
            'answer' => 'Sì, puoi scegliere tra indentazione a 2 spazi e 4 spazi per l\'output YAML. Il valore predefinito è 2 spazi, che è la convenzione più comune per i file YAML.',
        ],
        [
            'question' => 'I miei dati sono al sicuro usando questo convertitore?',
            'answer' => 'Assolutamente. Tutta la conversione avviene localmente nel tuo browser usando JavaScript. I tuoi dati non vengono mai caricati su nessun server. Questo significa che anche dati di configurazione sensibili possono essere convertiti in sicurezza senza preoccupazioni per la privacy.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'convert_to_yaml' => 'Converti in YAML',
        'copy' => 'Copia',
        'download_yaml' => 'Scarica .yaml',
        'sample' => 'Esempio',
        'clear' => 'Pulisci',
        'indentation' => 'Indentazione',
        'spaces_2' => '2 Spazi (predefinito)',
        'spaces_4' => '4 Spazi',
        'inline_short_arrays' => 'Array brevi inline',
        'quote_all_strings' => 'Virgolettare tutte le stringhe',
        'json_input' => 'Input JSON',
        'yaml_output' => 'Output YAML',
        'input_placeholder' => 'Incolla il tuo JSON qui...',
        'output_placeholder' => 'Il YAML convertito apparirà qui...',
        'top_level_keys' => 'Chiavi principali',
        'max_depth' => 'Profondità massima',
        'json_size' => 'Dimensione JSON',
        'yaml_size' => 'Dimensione YAML',
        'success_convert' => 'JSON convertito in YAML con successo!',
        'error_empty' => 'Inserisci del JSON da convertire',
        'error_invalid' => 'JSON non valido: ',
        'copy_nothing' => 'Niente da copiare. Converti prima del JSON.',
        'copied' => 'Copiato!',
        'copy_fail' => 'Copia negli appunti non riuscita',
        'download_nothing' => 'Niente da scaricare. Converti prima del JSON.',
        'downloaded' => 'Scaricato: ',
    ],
];
