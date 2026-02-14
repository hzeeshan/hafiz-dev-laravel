<?php

return [
    // SEO
    'title' => 'Convertitore CSV in XML - Converti CSV in XML Online Gratis | hafiz.dev',
    'description' => 'Convertitore online gratuito da CSV a XML. Converti dati CSV in XML ben formattato istantaneamente. Nomi di elementi personalizzabili, supporto attributi e opzioni CDATA. 100% lato client.',
    'keywords' => 'csv in xml, convertitore csv xml, convertire csv in xml, csv to xml online, conversione csv xml, convertitore csv xml gratis',

    // Page content
    'h1' => 'Convertitore CSV in XML',
    'subtitle' => 'Converti dati CSV in XML ben formattato istantaneamente. Nomi di elementi personalizzabili, modalità attributi, supporto CDATA e output scaricabile.',

    // Options
    'delimiter' => 'Delimitatore',
    'comma' => 'Virgola (,)',
    'semicolon' => 'Punto e virgola (;)',
    'tab' => 'Tabulazione',
    'pipe' => 'Pipe (|)',
    'root_element' => 'Elemento Radice',
    'row_element' => 'Elemento Riga',
    'first_row_header' => 'Prima riga come intestazioni',
    'values_as_attributes' => 'Valori come attributi',
    'wrap_cdata' => 'Avvolgi valori in CDATA',
    'xml_declaration' => 'Dichiarazione XML',
    'minify_output' => 'Minimizza output',

    // Labels
    'csv_input' => 'Input CSV',
    'xml_output' => 'Output XML',
    'upload_csv' => 'Carica .csv',
    'csv_placeholder' => 'name,email,city,role
John Smith,john@example.com,New York,Developer
Jane Doe,jane@example.com,London,Designer
Bob Wilson,bob@example.com,Berlin,Manager',
    'xml_placeholder' => 'L\'output XML apparirà qui...',

    // Buttons
    'convert_to_xml' => 'Converti in XML',
    'copy' => 'Copia',
    'download_xml' => 'Scarica .xml',
    'sample' => 'Esempio',
    'clear' => 'Cancella',

    // Stats
    'rows' => 'Righe',
    'columns' => 'Colonne',
    'input_size' => 'Dimensione Input',
    'output_size' => 'Dimensione Output',

    // Features
    'features' => [
        [
            'title' => 'Opzioni Flessibili',
            'desc' => 'Personalizza i nomi degli elementi radice e riga, scegli tra elementi figli o attributi, aggiungi dichiarazioni XML e abilita il wrapping CDATA.',
        ],
        [
            'title' => 'Output XML Sicuro',
            'desc' => 'Esegue automaticamente l\'escape dei caratteri speciali e sanifica i nomi degli elementi per produrre XML valido e ben formato ogni volta.',
        ],
        [
            'title' => 'Carica e Scarica',
            'desc' => 'Carica file .csv direttamente o incolla i dati. Scarica il file XML convertito con un clic. Tutto viene eseguito nel tuo browser — nessun upload al server.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come si converte CSV in XML?',
            'answer' => 'Incolla i dati CSV nel campo di input o carica un file .csv. Lo strumento li converte automaticamente in XML ben formattato. La prima riga viene usata come nomi degli elementi, e ogni riga successiva diventa un record XML racchiuso nel tag dell\'elemento riga scelto.',
        ],
        [
            'question' => 'Posso personalizzare i nomi degli elementi XML?',
            'answer' => 'Sì! Puoi impostare un nome personalizzato per l\'elemento radice (predefinito: <code class="bg-darkCard px-1 rounded">data</code>) e per l\'elemento riga (predefinito: <code class="bg-darkCard px-1 rounded">record</code>). Le intestazioni delle colonne CSV diventano automaticamente nomi di elementi figli. Puoi anche passare alla modalità "Valori come attributi" dove i valori vengono memorizzati come attributi XML.',
        ],
        [
            'question' => 'Quali delimitatori CSV sono supportati?',
            'answer' => 'Il convertitore supporta virgola, punto e virgola, tabulazione e pipe. Gestisce correttamente i campi tra virgolette, inclusi campi con delimitatori incorporati, a capo e virgolette doppie.',
        ],
        [
            'question' => 'Il convertitore gestisce i caratteri speciali?',
            'answer' => 'Sì, i caratteri speciali XML (<code class="bg-darkCard px-1 rounded">&lt;</code>, <code class="bg-darkCard px-1 rounded">&gt;</code>, <code class="bg-darkCard px-1 rounded">&amp;</code>, <code class="bg-darkCard px-1 rounded">"</code>, <code class="bg-darkCard px-1 rounded">\'</code>) vengono automaticamente sottoposti a escape. Puoi anche abilitare il wrapping CDATA per valori che contengono markup complesso o caratteri speciali.',
        ],
        [
            'question' => 'Posso caricare un file CSV direttamente?',
            'answer' => 'Sì! Clicca il pulsante "Carica .csv" per selezionare un file CSV dal tuo computer. Il file viene elaborato interamente nel tuo browser — nessun dato viene mai inviato a un server. Puoi anche trascinare e incollare il contenuto CSV direttamente nell\'area di input.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'enter_csv' => 'Inserisci o incolla i dati CSV',
        'no_data' => 'Nessun dato trovato nell\'input CSV',
        'converted' => '{rows} righe × {cols} colonne convertite in XML',
        'error_converting' => 'Errore nella conversione CSV: ',
        'nothing_to_copy' => 'Niente da copiare. Prima converti il CSV.',
        'nothing_to_download' => 'Niente da scaricare. Prima converti il CSV.',
        'copied' => 'Copiato!',
        'file_loaded' => 'File caricato: ',
        'xml_downloaded' => 'File XML scaricato',
    ],
];
