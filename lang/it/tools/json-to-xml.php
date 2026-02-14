<?php

return [
    // SEO
    'title' => 'Convertitore JSON in XML - Converti JSON in XML Online Gratis | hafiz.dev',
    'description' => 'Convertitore online gratuito da JSON a XML. Converti dati JSON in XML ben formattato istantaneamente. Elementi radice personalizzabili, mappatura attributi, supporto CDATA e formattazione. 100% lato client.',
    'keywords' => 'json in xml, convertitore json xml, convertire json in xml, json to xml online, conversione json xml, json xml convertitore gratis',

    // Page content
    'h1' => 'Convertitore JSON in XML',
    'subtitle' => 'Converti dati JSON in XML ben formattato istantaneamente. Gestisce oggetti annidati, array e valori primitivi con opzioni di output personalizzabili.',

    // Options
    'root_element' => 'Elemento Radice',
    'array_item_name' => 'Nome Elemento Array',
    'auto_singularize' => 'Auto-singolarizza (tags → tag)',
    'always_item' => 'Usa sempre "item"',
    'indent' => 'Indentazione',
    'two_spaces' => '2 spazi',
    'four_spaces' => '4 spazi',
    'minified' => 'Minimizzato',
    'xml_declaration' => 'Dichiarazione XML',
    'wrap_cdata' => 'Avvolgi stringhe in CDATA',
    'add_type_attributes' => 'Aggiungi attributi tipo',
    'self_close_empty' => 'Chiudi automaticamente elementi vuoti',

    // Labels
    'json_input' => 'Input JSON',
    'xml_output' => 'Output XML',
    'upload_json' => 'Carica .json',
    'json_placeholder' => '{
  "name": "John",
  "age": 30,
  "skills": ["PHP", "Laravel", "Vue.js"]
}',
    'xml_placeholder' => 'L\'output XML apparirà qui...',

    // Buttons
    'convert_to_xml' => 'Converti in XML',
    'copy' => 'Copia',
    'download_xml' => 'Scarica .xml',
    'sample' => 'Esempio',
    'clear' => 'Cancella',

    // Stats
    'xml_elements' => 'Elementi XML',
    'max_depth' => 'Profondità Max',
    'input_size' => 'Dimensione Input',
    'output_size' => 'Dimensione Output',

    // Features
    'features' => [
        [
            'title' => 'Annidamento Profondo',
            'desc' => 'Gestisce qualsiasi livello di oggetti e array annidati. Oggetti dentro array, array dentro oggetti — tutto convertito in XML strutturato correttamente.',
        ],
        [
            'title' => 'Array Intelligenti',
            'desc' => 'Singolarizza automaticamente i nomi degli elementi array (users → user, categories → category). Oppure usa un nome fisso "item" per tutti gli array.',
        ],
        [
            'title' => 'Consapevolezza dei Tipi',
            'desc' => 'Gli attributi tipo opzionali preservano i tipi di dati JSON (string, number, boolean, null) nell\'output XML per una conversione bidirezionale senza perdita.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come si converte JSON in XML?',
            'answer' => 'Incolla i dati JSON nel campo di input e lo strumento li converte istantaneamente in XML. Gli oggetti JSON diventano elementi XML, gli array diventano elementi figli ripetuti e i valori primitivi diventano contenuto testuale. Puoi personalizzare il nome dell\'elemento radice, l\'indentazione e altre opzioni di formattazione.',
        ],
        [
            'question' => 'Come vengono gestiti gli array JSON in XML?',
            'answer' => 'Gli array JSON diventano elementi XML ripetuti. Ad esempio, <code class="bg-darkCard px-1 rounded">"tags": ["php", "laravel"]</code> diventa <code class="bg-darkCard px-1 rounded">&lt;tags&gt;&lt;tag&gt;php&lt;/tag&gt;&lt;tag&gt;laravel&lt;/tag&gt;&lt;/tags&gt;</code>. Il nome dell\'elemento viene auto-singolarizzato dalla chiave padre, oppure puoi usare un nome fisso "item".',
        ],
        [
            'question' => 'Posso personalizzare il nome dell\'elemento radice XML?',
            'answer' => 'Sì! Inserisci qualsiasi nome di elemento XML valido nel campo "Elemento Radice" (predefinito: <code class="bg-darkCard px-1 rounded">root</code>). Puoi anche scegliere tra indentazione a 2 spazi, 4 spazi, tabulazione o output minimizzato senza spazi.',
        ],
        [
            'question' => 'Qual è la differenza tra JSON e XML?',
            'answer' => 'JSON utilizza coppie chiave-valore con una sintassi leggera ed è lo standard per le moderne API REST. XML utilizza una struttura basata su tag ed è comune nei sistemi enterprise, nei servizi web SOAP, nei feed RSS e nei file di configurazione come Maven e Android. JSON è tipicamente più compatto, mentre XML supporta attributi, namespace e schemi.',
        ],
        [
            'question' => 'Il convertitore gestisce oggetti JSON annidati?',
            'answer' => 'Sì! Qualsiasi livello di annidamento è completamente supportato. Gli oggetti annidati diventano elementi XML annidati, gli array di oggetti diventano gruppi di elementi ripetuti e le strutture miste vengono gestite correttamente con indentazione appropriata a ogni livello.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'enter_json' => 'Inserisci i dati JSON',
        'invalid_json' => 'JSON non valido: ',
        'converted' => 'Convertito in XML — {elements} elementi, profondità {depth}',
        'nothing_to_copy' => 'Niente da copiare. Prima converti il JSON.',
        'nothing_to_download' => 'Niente da scaricare. Prima converti il JSON.',
        'copied' => 'Copiato!',
        'file_loaded' => 'File caricato: ',
        'xml_downloaded' => 'File XML scaricato',
    ],
];
