<?php

return [
    // SEO
    'title' => 'Convertitore YAML in JSON - Converti YAML in JSON Online Gratis | hafiz.dev',
    'description' => 'Convertitore online gratuito da YAML a JSON. Converti file di configurazione YAML in formato JSON istantaneamente nel browser. Supporta oggetti annidati, array e strutture complesse. 100% lato client.',
    'keywords' => 'yaml in json, convertitore yaml json, convertire yaml in json, yaml to json online, yaml2json, parser yaml, convertitore yaml gratis',

    // Page content
    'h1' => 'Convertitore YAML in JSON',
    'subtitle' => 'Converti YAML in formato JSON istantaneamente. Incolla le tue configurazioni Kubernetes, file Docker Compose, pipeline CI/CD o qualsiasi dato YAML.',

    // UI Labels
    'json_indentation' => 'Indentazione JSON',
    'spaces_2' => '2 Spazi (predefinito)',
    'spaces_4' => '4 Spazi',
    'tab' => 'Tabulazione',
    'minified' => 'Minimizzato (senza spazi)',
    'sort_keys' => 'Ordina chiavi alfabeticamente',
    'strip_comments' => 'Rimuovi commenti YAML',
    'yaml_input' => 'Input YAML',
    'json_output' => 'Output JSON',
    'input_placeholder' => 'Incolla il tuo YAML qui...',
    'output_placeholder' => 'Il JSON convertito apparirà qui...',
    'convert_to_json' => 'Converti in JSON',
    'copy' => 'Copia',
    'download_json' => 'Scarica .json',
    'sample' => 'Esempio',
    'clear' => 'Pulisci',
    'top_level_keys' => 'Chiavi principali',
    'max_depth' => 'Profondità massima',
    'yaml_size' => 'Dimensione YAML',
    'json_size' => 'Dimensione JSON',

    // Features
    'features' => [
        [
            'title' => 'Validazione YAML',
            'desc' => 'Valida la sintassi YAML durante la conversione. Ricevi messaggi di errore chiari con numeri di riga se qualcosa non va.',
        ],
        [
            'title' => 'Output con Evidenziazione Sintassi',
            'desc' => 'L\'output JSON è evidenziato con chiavi, stringhe, numeri e booleani colorati per una lettura facile.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutta l\'elaborazione avviene nel browser. I tuoi file di configurazione con segreti e credenziali non lasciano mai il dispositivo.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto YAML in JSON?',
            'answer' => 'Incolla i tuoi dati YAML nel campo di input e clicca "Converti in JSON". Lo strumento analizza istantaneamente il tuo YAML e produce JSON valido e formattato. Puoi poi copiare il risultato o scaricarlo come file .json.',
        ],
        [
            'question' => 'Perché convertire YAML in JSON?',
            'answer' => 'I motivi più comuni includono: utilizzare dati di configurazione YAML con API che accettano solo JSON, importare configurazioni Kubernetes o Docker Compose in strumenti che richiedono JSON, debuggare la sintassi YAML visualizzando la struttura JSON equivalente, o migrare configurazioni tra formati.',
        ],
        [
            'question' => 'Questo strumento valida la sintassi YAML?',
            'answer' => 'Sì, il convertitore valida il tuo YAML durante l\'analisi. Se ci sono errori di sintassi come indentazione errata, due punti mancanti o caratteri non validi, mostrerà un messaggio di errore chiaro che indica il problema.',
        ],
        [
            'question' => 'Supporta file YAML multi-documento?',
            'answer' => 'Sì, se il tuo YAML contiene più documenti separati da ---, il convertitore analizzerà il primo documento per impostazione predefinita. Per file multi-documento, ogni documento viene convertito separatamente.',
        ],
        [
            'question' => 'I miei dati sono al sicuro usando questo convertitore?',
            'answer' => 'Assolutamente. Tutta la conversione avviene localmente nel tuo browser usando JavaScript. I tuoi dati non vengono mai caricati su nessun server. Questo significa che anche file di configurazione sensibili con segreti o credenziali possono essere convertiti in sicurezza.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'convert_to_json' => 'Converti in JSON',
        'copy' => 'Copia',
        'download_json' => 'Scarica .json',
        'sample' => 'Esempio',
        'clear' => 'Pulisci',
        'json_indentation' => 'Indentazione JSON',
        'spaces_2' => '2 Spazi (predefinito)',
        'spaces_4' => '4 Spazi',
        'tab' => 'Tabulazione',
        'minified' => 'Minimizzato (senza spazi)',
        'sort_keys' => 'Ordina chiavi alfabeticamente',
        'strip_comments' => 'Rimuovi commenti YAML',
        'yaml_input' => 'Input YAML',
        'json_output' => 'Output JSON',
        'input_placeholder' => 'Incolla il tuo YAML qui...',
        'output_placeholder' => 'Il JSON convertito apparirà qui...',
        'top_level_keys' => 'Chiavi principali',
        'max_depth' => 'Profondità massima',
        'yaml_size' => 'Dimensione YAML',
        'json_size' => 'Dimensione JSON',
        'success_convert' => 'YAML convertito in JSON con successo!',
        'error_empty' => 'Inserisci del YAML da convertire',
        'error_invalid' => 'YAML non valido: ',
        'yaml_error_at' => 'Errore YAML alla riga {line}, colonna {col}: {reason}',
        'copy_nothing' => 'Niente da copiare. Converti prima del YAML.',
        'copied' => 'Copiato!',
        'copy_fail' => 'Copia negli appunti non riuscita',
        'download_nothing' => 'Niente da scaricare. Converti prima del YAML.',
        'downloaded' => 'Scaricato: ',
    ],
];
