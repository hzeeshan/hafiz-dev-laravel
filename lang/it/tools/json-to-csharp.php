<?php

return [
    // SEO
    'title' => 'Convertitore JSON in Classi C# - Genera Classi C# da JSON Gratis | hafiz.dev',
    'description' => 'Generatore online gratuito di classi C# da JSON. Converti dati JSON in classi C# con tipi corretti, proprietà nullable e attributi JsonProperty istantaneamente.',
    'keywords' => 'json in c#, json in csharp, convertitore json classi c#, generare classi c# da json, json to c# online, generatore classi csharp',

    // Page content
    'h1' => 'Generatore di Classi C# da JSON',
    'subtitle' => 'Genera classi C# da dati JSON istantaneamente. Gestisce oggetti annidati, array, tipi nullable e attributi JsonProperty.',

    // UI Labels
    'root_name' => 'Nome Classe Root',
    'collection_type' => 'Tipo Collezione',
    'json_library' => 'Libreria JSON',
    'json_lib_none' => 'Nessuna',
    'nullable_types' => 'Tipi nullable reference',
    'public_classes' => 'Classi pubbliche',
    'get_set' => '{ get; set; }',
    'wrap_namespace' => 'Includi in namespace',
    'json_input' => 'Input JSON',
    'upload_json' => 'Carica .json',
    'csharp_output' => 'Output C#',
    'csharp_output_placeholder' => 'Le classi C# appariranno qui...',
    'generate_classes' => 'Genera Classi',
    'copy' => 'Copia',
    'download_cs' => 'Scarica .cs',
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
            'desc' => 'Mappa automaticamente i tipi JSON ai tipi C#: string, int, long, double, bool, DateTime e classi per oggetti annidati. Gestisce i valori null con tipi nullable.',
        ],
        [
            'title' => 'Supporto Librerie JSON',
            'desc' => 'Genera attributi per Newtonsoft.Json ([JsonProperty]) o System.Text.Json ([JsonPropertyName]).',
        ],
        [
            'title' => 'Output Configurabile',
            'desc' => 'Scegli i tipi di collezione (List, IList, array), attiva i tipi nullable, accesso public/private, auto-proprietà e namespace wrapping.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto JSON in classi C#?',
            'answer' => 'Incolla i tuoi dati JSON nel campo di input e lo strumento genera istantaneamente classi C# con proprietà correttamente tipizzate. Gli oggetti annidati diventano classi separate e gli array vengono tipizzati come List<T> o T[] in base alle impostazioni.',
        ],
        [
            'question' => 'Genera attributi JsonProperty?',
            'answer' => 'Sì! Puoi opzionalmente aggiungere attributi [JsonProperty] di Newtonsoft.Json o [JsonPropertyName] di System.Text.Json per mappare i nomi delle proprietà JSON alle proprietà C# in PascalCase.',
        ],
        [
            'question' => 'Come vengono gestiti gli oggetti JSON annidati?',
            'answer' => 'Ogni oggetto JSON annidato viene estratto nella propria classe C# con un nome in PascalCase derivato dalla chiave della proprietà. Questo mantiene il codice pulito e segue le convenzioni di denominazione C#.',
        ],
        [
            'question' => 'Supporta i tipi nullable?',
            'answer' => 'Sì! Quando abilitato, le proprietà che possono essere null nel JSON vengono generate con tipi nullable reference (string?) seguendo le convenzioni C# 8.0+. I value type con valori null diventano nullable (int?, double?).',
        ],
        [
            'question' => 'Posso scegliere tra List e array per le collezioni?',
            'answer' => 'Sì! Puoi scegliere tra List<T>, IList<T>, IEnumerable<T>, ICollection<T> o T[] per i tipi di collezione. Il predefinito è List<T>, il più comunemente usato nelle applicazioni C#.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'enter_json' => 'Inserisci i dati JSON',
        'invalid_json' => 'JSON non valido:',
        'json_must_be' => 'Il JSON deve essere un oggetto o un array',
        'generated_msg' => 'Generate {count} class{plural} con {props} proprietà',
        'nothing_to_copy' => 'Niente da copiare',
        'copied' => 'Copiato!',
        'nothing_to_download' => 'Niente da scaricare',
        'cs_downloaded' => 'File C# scaricato',
        'file_loaded' => 'File caricato:',
    ],
];
