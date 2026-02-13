<?php

return [
    // SEO
    'title' => 'Convertitore JSON in CSV - Converti JSON in CSV Online Gratis | hafiz.dev',
    'description' => 'Convertitore JSON in CSV online gratuito. Converti array JSON in file CSV o CSV in JSON istantaneamente. Supporta oggetti annidati, delimitatori personalizzati e conversione bidirezionale. 100% lato client — i tuoi dati non escono mai dal browser.',
    'keywords' => 'json in csv, csv in json, convertitore json, convertitore csv, convertire json in csv online, json a csv, csv a json, convertitore json csv, convertitore dati, json csv online',

    // Page content
    'h1' => 'Convertitore JSON in CSV',
    'subtitle' => 'Converti tra i formati JSON e CSV istantaneamente. Conversione bidirezionale con supporto per oggetti annidati, delimitatori personalizzati e altro.',

    // Direction toggle
    'json_to_csv_tab' => 'JSON → CSV',
    'csv_to_json_tab' => 'CSV → JSON',

    // JSON to CSV Options
    'delimiter' => 'Delimitatore',
    'comma' => 'Virgola (,)',
    'semicolon' => 'Punto e virgola (;)',
    'tab' => 'Tabulazione',
    'pipe' => 'Pipe (|)',
    'include_headers' => 'Includi Intestazioni',
    'flatten_nested' => 'Appiattisci Oggetti Annidati',
    'array_handling' => 'Gestione Array',
    'stringify' => 'Stringifica',
    'join_semicolon' => 'Unisci con punto e virgola',

    // CSV to JSON Options
    'auto_detect' => 'Rilevamento automatico',
    'first_row_header' => 'Prima Riga è Intestazione',
    'parse_numbers' => 'Analizza Numeri',
    'parse_booleans' => 'Analizza Booleani',

    // Editor labels
    'json_input' => 'Input JSON',
    'csv_input' => 'Input CSV',
    'csv_output' => 'Output CSV',
    'json_output' => 'Output JSON',
    'paste_json' => 'Incolla il tuo JSON qui...',
    'paste_csv' => 'Incolla il tuo CSV qui...',
    'output_placeholder' => 'L\'output convertito apparirà qui...',

    // Action buttons
    'convert_to_csv' => 'Converti in CSV',
    'convert_to_json' => 'Converti in JSON',
    'copy' => 'Copia',
    'download' => 'Scarica',
    'swap' => 'Scambia',
    'sample' => 'Esempio',
    'clear' => 'Cancella',

    // Statistics
    'rows' => 'Righe',
    'columns' => 'Colonne',
    'input_size' => 'Dimensione Input',
    'output_size' => 'Dimensione Output',

    // Features
    'features' => [
        [
            'title' => 'Conversione Bidirezionale',
            'desc' => 'Converti da JSON a CSV o da CSV a JSON con un solo clic. Cambia direzione istantaneamente.',
        ],
        [
            'title' => 'Opzioni Avanzate',
            'desc' => 'Personalizza delimitatori, gestisci oggetti annidati, analizza tipi di dati e altro per conversioni precise.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutta l\'elaborazione avviene nel tuo browser. I tuoi dati non escono mai dal tuo dispositivo.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto JSON in CSV?',
            'answer' => 'Basta incollare il tuo array JSON nel campo di input e cliccare "Converti". Lo strumento estrarrà automaticamente tutte le chiavi come intestazioni di colonna e convertirà ogni oggetto dell\'array in una riga CSV. Potrai poi copiare il risultato o scaricarlo come file .csv.',
        ],
        [
            'question' => 'Posso convertire CSV di nuovo in JSON?',
            'answer' => 'Sì! Clicca sulla scheda "CSV → JSON" per cambiare direzione. Incolla i tuoi dati CSV e lo strumento li convertirà in un array JSON di oggetti, usando la prima riga come nomi delle proprietà (se l\'opzione "Prima Riga è Intestazione" è abilitata).',
        ],
        [
            'question' => 'Come gestisce lo strumento gli oggetti JSON annidati?',
            'answer' => 'Quando l\'opzione "Appiattisci Oggetti Annidati" è abilitata, gli oggetti annidati vengono appiattiti usando la notazione con punto. Ad esempio, {"address": {"city": "Milano"}} diventa una colonna chiamata "address.city" con il valore "Milano".',
        ],
        [
            'question' => 'Quali delimitatori sono supportati?',
            'answer' => 'Supportiamo diversi delimitatori: virgola (,), punto e virgola (;), tabulazione e pipe (|). Per la conversione da CSV a JSON, puoi anche usare il rilevamento automatico per identificare automaticamente il delimitatore usato nei tuoi dati.',
        ],
        [
            'question' => 'I miei dati sono al sicuro?',
            'answer' => 'Assolutamente. Tutta la conversione avviene localmente nel tuo browser usando JavaScript. I tuoi dati non vengono mai caricati su nessun server. Questo significa che anche dati sensibili possono essere convertiti in sicurezza senza preoccupazioni per la privacy.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'json_input' => 'Input JSON',
        'csv_input' => 'Input CSV',
        'csv_output' => 'Output CSV',
        'json_output' => 'Output JSON',
        'convert_to_csv' => 'Converti in CSV',
        'convert_to_json' => 'Converti in JSON',
        'paste_json' => 'Incolla il tuo JSON qui...',
        'paste_csv' => 'Incolla il tuo CSV qui...',
        'output_placeholder' => 'L\'output convertito apparirà qui...',
        'enter_data' => 'Inserisci dei dati da convertire',
        'nothing_to_copy' => 'Niente da copiare. Prima converti dei dati.',
        'nothing_to_download' => 'Niente da scaricare. Prima converti dei dati.',
        'nothing_to_swap' => 'Niente da scambiare. Prima converti dei dati.',
        'copy_fail' => 'Copia negli appunti non riuscita',
        'copied' => 'Copiato!',
        'downloaded' => 'Scaricato:',
        'conversion_success' => 'Conversione riuscita!',
        'rows' => 'righe',
        'columns' => 'colonne',
    ],
];
