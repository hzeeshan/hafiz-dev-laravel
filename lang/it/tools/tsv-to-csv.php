<?php

return [
    // SEO
    'title'       => 'Convertitore TSV in CSV Online - Converti Tab in Virgola Gratis | hafiz.dev',
    'description' => 'Convertitore TSV in CSV gratuito online. Converti valori separati da tab in valori separati da virgola istantaneamente. Gestisce campi tra virgolette e caratteri speciali. Nessuna registrazione richiesta.',
    'keywords'    => 'convertitore tsv csv, da tsv a csv, tsv in csv online, converti tab in virgola, tsv csv convertitore, valori separati tab',

    // Page content
    'h1'       => 'Convertitore TSV in CSV',
    'subtitle' => 'Converti valori separati da tab in valori separati da virgola istantaneamente. Le virgolette intelligenti gestiscono automaticamente virgole, apici e caratteri speciali.',

    // Options
    'quote_style_label' => 'Stile Virgolette in Uscita',
    'quote_smart'       => 'Solo quando necessario (predefinito)',
    'quote_all'         => 'Aggiungi sempre virgolette',
    'quote_never'       => 'Mai aggiungere virgolette',
    'trim_whitespace'   => 'Rimuovi spazi dai campi',

    // Input/Output labels
    'tsv_input_label'     => 'Input TSV',
    'csv_output_label'    => 'Output CSV',
    'upload_tsv'          => 'Carica .tsv/.txt',
    'output_placeholder'  => 'L\'output CSV apparirà qui...',

    // Buttons
    'btn_convert'  => 'Converti',
    'btn_copy'     => 'Copia',
    'btn_download' => 'Scarica .csv',
    'btn_sample'   => 'Esempio',
    'btn_clear'    => 'Pulisci',

    // Stats
    'stat_rows'         => 'Righe',
    'stat_cols'         => 'Colonne',
    'stat_fields_quoted'=> 'Campi tra Virgolette',
    'stat_file_size'    => 'Dimensione',

    // Features
    'features' => [
        [
            'title' => 'Virgolette Intelligenti',
            'desc'  => 'Aggiunge virgolette solo ai campi che contengono virgole, apici o interruzioni di riga. Scegli tra modalità intelligente, sempre o mai per adattarsi alle tue esigenze.',
        ],
        [
            'title' => 'Conversione Istantanea',
            'desc'  => 'Conversione TSV in CSV in tempo reale mentre digiti o incolli i dati. I risultati appaiono istantaneamente con un debounce di 300ms per prestazioni ottimali.',
        ],
        [
            'title' => '100% Privato',
            'desc'  => 'Tutta la conversione avviene nel tuo browser. I dati separati da tab non escono mai dal tuo dispositivo. Nessun caricamento su server, nessun tracciamento, completamente sicuro.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto TSV in CSV?',
            'answer'   => 'Incolla i dati TSV nel campo di input o carica un file .tsv/.txt. Lo strumento rileva automaticamente i caratteri tab e li converte in valori separati da virgola. I campi contenenti virgole, apici o interruzioni di riga vengono correttamente racchiusi tra virgolette secondo gli standard CSV.',
        ],
        [
            'question' => 'Come gestisce i campi con virgole?',
            'answer'   => 'I campi contenenti virgole, apici o interruzioni di riga vengono automaticamente racchiusi tra virgolette doppie. Se un campo contiene un apice doppio, viene protetto raddoppiandolo (es. \'John "Joe" Smith\' diventa \'"John ""Joe"" Smith"\') seguendo gli standard CSV RFC 4180.',
        ],
        [
            'question' => 'Qual è la differenza tra TSV e CSV?',
            'answer'   => 'Il TSV (Tab-Separated Values) usa caratteri tab (\\t) come separatori di campo, mentre il CSV (Comma-Separated Values) usa le virgole. Il TSV è spesso più pratico quando i dati contengono virgole, ma il CSV è più ampiamente supportato dalle applicazioni per fogli di calcolo e dai database.',
        ],
        [
            'question' => 'Preserva i caratteri speciali?',
            'answer'   => 'Sì! Il convertitore preserva tutti i caratteri speciali inclusi Unicode, emoji, interruzioni di riga nei campi e apici. Li protegge correttamente secondo gli standard CSV RFC 4180, garantendo che i dati rimangano intatti durante la conversione.',
        ],
        [
            'question' => 'Posso caricare un file TSV?',
            'answer'   => 'Sì! Fai clic sul pulsante "Carica .tsv/.txt" per caricare un file dal tuo dispositivo. Il convertitore supporta i formati .tsv, .txt e altri formati di testo delimitati da tab. L\'intero file viene elaborato nel browser senza caricare nulla su alcun server.',
        ],
    ],

    // JS strings (passed via data-* attributes)
    'js_strings' => [
        'enter_tsv'          => 'Inserisci o incolla i dati TSV',
        'no_data'            => 'Nessun dato trovato nell\'input',
        'nothing_to_copy'    => 'Niente da copiare',
        'nothing_to_download'=> 'Niente da scaricare',
        'copied'             => 'Copiato!',
        'csv_downloaded'     => 'File CSV scaricato',
        'file_loaded'        => 'File caricato',
        'converted_prefix'   => 'Convertite',
        'rows_suffix'        => 'righe con',
        'quoted_suffix'      => 'campi tra virgolette',
    ],
];
