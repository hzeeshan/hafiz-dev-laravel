<?php

return [
    // SEO
    'title' => 'Convertitore JSON in Dart - Genera Classi Dart da JSON Gratis | hafiz.dev',
    'description' => 'Convertitore online gratuito da JSON a Dart. Genera classi Dart con factory constructor, metodi toJson e null safety. Nessuna registrazione richiesta.',
    'keywords' => 'json in dart, convertitore json dart, json in classe dart, convertire json in dart, generare classi dart da json, json to dart flutter',

    // Page content
    'h1' => 'Convertitore JSON in Dart',
    'subtitle' => 'Genera classi Dart da JSON con factory constructor, metodi toJson e supporto null safety. Perfetto per le integrazioni API Flutter.',

    // UI Labels
    'root_name' => 'Nome Classe Root',
    'null_safety' => 'Null safety',
    'final_props' => 'Proprietà final',
    'generate_from_json' => 'Genera fromJson',
    'generate_to_json' => 'Genera toJson',
    'generate_copy_with' => 'Genera copyWith',
    'json_input' => 'Input JSON',
    'upload_json' => 'Carica .json',
    'dart_output' => 'Output Dart',
    'dart_output_placeholder' => 'Le classi Dart appariranno qui...',
    'generate_classes' => 'Genera Classi',
    'copy' => 'Copia',
    'download_dart' => 'Scarica .dart',
    'sample' => 'Esempio',
    'clear' => 'Cancella',
    'classes' => 'Classi',
    'properties' => 'Proprietà',
    'nested_classes' => 'Classi Annidate',
    'lines' => 'Righe',

    // Features
    'features' => [
        [
            'title' => 'Inferenza Tipi Intelligente',
            'desc' => 'Mappa automaticamente i tipi JSON ai tipi Dart equivalenti: String, int, double, bool, DateTime, List<T> e classi personalizzate con supporto null safety.',
        ],
        [
            'title' => 'Serializzazione Completa',
            'desc' => 'Genera factory constructor per fromJson e metodi di istanza per toJson, gestendo oggetti annidati e array automaticamente.',
        ],
        [
            'title' => 'Null Safety',
            'desc' => 'Supporto completo alla null safety di Dart con tipi nullable (Type?). I valori null nel JSON producono proprietà nullable con controlli null appropriati nei metodi di serializzazione.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto JSON in classi Dart?',
            'answer' => 'Incolla i tuoi dati JSON o carica un file .json. Lo strumento analizza la struttura e genera classi Dart con tipi corretti, costruttori e metodi di serializzazione. Gli oggetti annidati diventano classi separate con nomi in PascalCase.',
        ],
        [
            'question' => 'Genera i metodi fromJson e toJson?',
            'answer' => 'Sì! Lo strumento genera automaticamente factory constructor per fromJson e metodi di istanza per toJson. Questi metodi gestiscono le conversioni di tipo, gli oggetti annidati, le liste e la null safety. Puoi attivare o disattivare queste funzionalità.',
        ],
        [
            'question' => 'Come vengono gestiti gli oggetti JSON annidati?',
            'answer' => 'Gli oggetti annidati vengono estratti in classi Dart separate con nomi in PascalCase. I metodi fromJson e toJson gestiscono automaticamente l\'istanziazione e la serializzazione delle classi annidate, creando codice pulito e manutenibile.',
        ],
        [
            'question' => 'Supporta la null safety di Dart?',
            'answer' => 'Sì! La null safety è abilitata per impostazione predefinita. I valori null nel JSON producono tipi nullable (Type?) e il codice generato usa operatori null-aware e controlli di tipo appropriati nei metodi di serializzazione.',
        ],
        [
            'question' => 'Posso generare metodi copyWith?',
            'answer' => 'Sì! Abilita l\'opzione copyWith per generare pattern di classi dati immutabili. Questo metodo crea copie modificate degli oggetti mantenendo l\'immutabilità, perfetto per la gestione dello stato in Flutter con provider come BLoC o Riverpod.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'enter_json' => 'Inserisci i dati JSON',
        'invalid_json' => 'JSON non valido:',
        'processed_array' => 'Array elaborato - considera di racchiuderlo in un oggetto',
        'generated_primitive' => 'Tipo generato per valore primitivo',
        'generated_msg' => 'Generate {count} class{plural} con {props} proprietà',
        'nothing_to_copy' => 'Niente da copiare',
        'copied' => 'Copiato!',
        'nothing_to_download' => 'Niente da scaricare',
        'dart_downloaded' => 'File Dart scaricato',
        'file_loaded' => 'File caricato:',
    ],
];
