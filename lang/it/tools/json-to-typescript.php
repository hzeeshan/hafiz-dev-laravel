<?php

return [
    // SEO
    'title' => 'Convertitore JSON in TypeScript - Genera Interfacce TypeScript Gratis | hafiz.dev',
    'description' => 'Convertitore JSON in TypeScript online gratuito. Genera interfacce e tipi TypeScript da dati JSON istantaneamente. Supporta oggetti annidati, array, campi opzionali e sintassi export.',
    'keywords' => 'json in typescript, convertitore json typescript, generare interfacce typescript, json in interfaccia typescript, json to ts, generare tipi da json',

    // Page content
    'h1' => 'Convertitore JSON in TypeScript',
    'subtitle' => 'Genera interfacce e tipi TypeScript da dati JSON istantaneamente. Gestisce oggetti annidati, array, union type e proprietà opzionali.',

    // UI Labels
    'root_name' => 'Nome Interfaccia Root',
    'output_style' => 'Stile Output',
    'output_interface' => 'interface',
    'output_type' => 'type alias',
    'indent' => 'Indentazione',
    'indent_2' => '2 spazi',
    'indent_4' => '4 spazi',
    'indent_tab' => 'Tab',
    'export_keyword' => 'Parola chiave export',
    'optional_props' => 'Tutte le proprietà opzionali',
    'readonly_props' => 'Proprietà readonly',
    'trailing_semicolons' => 'Punto e virgola finale',
    'json_input' => 'Input JSON',
    'upload_json' => 'Carica .json',
    'ts_output' => 'Output TypeScript',
    'ts_output_placeholder' => 'Le interfacce TypeScript appariranno qui...',
    'generate_types' => 'Genera Tipi',
    'copy' => 'Copia',
    'download_ts' => 'Scarica .ts',
    'sample' => 'Esempio',
    'clear' => 'Cancella',
    'interfaces' => 'Interfacce',
    'properties' => 'Proprietà',
    'nested_types' => 'Tipi Annidati',
    'lines' => 'Righe',

    // Features
    'features' => [
        [
            'title' => 'Nomi Intelligenti',
            'desc' => 'Gli oggetti annidati ottengono nomi di interfaccia in PascalCase derivati dalle chiavi delle proprietà. Gli array di oggetti generano tipi puliti e riutilizzabili.',
        ],
        [
            'title' => 'Union Type',
            'desc' => 'Array misti come [1, "ciao", true] diventano (number | string | boolean)[]. I valori null producono union type con null.',
        ],
        [
            'title' => 'Output Configurabile',
            'desc' => 'Scegli tra interface e type, parola chiave export, modificatori optional/readonly, punto e virgola e indentazione per adattarsi allo stile del tuo progetto.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto JSON in interfacce TypeScript?',
            'answer' => 'Incolla i tuoi dati JSON o carica un file .json. Lo strumento analizza la struttura e genera interfacce TypeScript con proprietà correttamente tipizzate. Gli oggetti annidati diventano interfacce separate per un codice pulito e riutilizzabile.',
        ],
        [
            'question' => 'Dovrei usare interface o type in TypeScript?',
            'answer' => 'Le interfacce sono preferite per definire la forma degli oggetti perché supportano la declaration merging e extends. I type alias sono migliori per union, intersection e tipi mappati complessi. Per la tipizzazione delle risposte API, le interfacce sono la scelta standard.',
        ],
        [
            'question' => 'Come vengono gestiti gli array JSON?',
            'answer' => 'Gli array di primitivi diventano array tipizzati (string[], number[]). Gli array di oggetti vengono uniti in una singola interfaccia che rappresenta tutte le proprietà possibili. Gli array misti diventano union type come (string | number)[].',
        ],
        [
            'question' => 'Gestisce gli oggetti JSON annidati?',
            'answer' => 'Sì! Ogni oggetto annidato viene estratto nella propria interfaccia con nome. Ad esempio, un utente con un campo indirizzo genera interfacce separate User e Address, mantenendo il codice modulare e riutilizzabile.',
        ],
        [
            'question' => 'Posso rendere tutte le proprietà opzionali?',
            'answer' => 'Sì! Attiva "Tutte le proprietà opzionali" per aggiungere il modificatore ? a ogni proprietà. È utile per pattern Partial<T>, tipi di stato dei form o payload API dove i campi sono presenti condizionalmente.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'json_input' => 'Input JSON',
        'ts_output' => 'Output TypeScript',
        'upload_json' => 'Carica .json',
        'generate_types' => 'Genera Tipi',
        'copy' => 'Copia',
        'download_ts' => 'Scarica .ts',
        'sample' => 'Esempio',
        'clear' => 'Cancella',
        'copied' => 'Copiato!',
        'nothing_to_copy' => 'Niente da copiare',
        'nothing_to_download' => 'Niente da scaricare',
        'ts_downloaded' => 'File TypeScript scaricato',
        'file_loaded' => 'File caricato:',
        'enter_json' => 'Inserisci i dati JSON',
        'invalid_json' => 'JSON non valido:',
        'generated_msg' => 'Generate {count} {style}{plural} con {props} proprietà',
        'generated_primitive' => 'Tipo generato per valore primitivo',
    ],
];
