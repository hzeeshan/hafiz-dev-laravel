<?php

return [
    // SEO
    'title'       => 'Visualizzatore CSV Online - Apri File CSV in Tabella | hafiz.dev',
    'description' => 'Visualizzatore CSV gratuito online. Incolla o carica dati CSV per vederli in una tabella ordinabile e ricercabile. Nessuna registrazione richiesta.',
    'keywords'    => 'visualizzatore csv online, aprire file csv, csv in tabella, csv viewer, lettore csv online, tabella csv',

    // Page content
    'h1'       => 'Visualizzatore CSV Online',
    'subtitle' => 'Visualizza ed esplora file CSV in una tabella ordinabile e ricercabile. Incolla o carica i tuoi dati per una visualizzazione immediata.',

    // Options
    'delimiter_label'      => 'Delimitatore',
    'delimiter_auto'       => 'Rilevamento automatico',
    'delimiter_comma'      => 'Virgola (,)',
    'delimiter_semicolon'  => 'Punto e virgola (;)',
    'delimiter_tab'        => 'Tab',
    'delimiter_pipe'       => 'Pipe (|)',
    'first_row_header'     => 'Prima riga come intestazione',

    // Input labels
    'csv_data_label'   => 'Dati CSV',
    'upload_csv'       => 'Carica .csv',
    'placeholder'      => 'Incolla qui i dati CSV o carica un file...',

    // Buttons
    'btn_view'     => 'Visualizza Tabella',
    'btn_copy'     => 'Copia CSV',
    'btn_download' => 'Scarica',
    'btn_sample'   => 'Esempio',
    'btn_clear'    => 'Pulisci',

    // Stats
    'stat_rows'        => 'Righe',
    'stat_cols'        => 'Colonne',
    'stat_total_cells' => 'Celle Totali',
    'stat_file_size'   => 'Dimensione',

    // Search
    'search_placeholder' => 'Cerca in tutte le colonne...',

    // Features
    'features' => [
        [
            'title' => 'Analisi Intelligente',
            'desc'  => 'Rileva automaticamente il delimitatore e gestisce campi tra virgolette, caratteri speciali e interruzioni di riga nei campi.',
        ],
        [
            'title' => 'Ordina e Cerca',
            'desc'  => 'Fai clic sulle intestazioni delle colonne per ordinare in modo crescente/decrescente. Usa la ricerca per filtrare le righe istantaneamente su tutte le colonne.',
        ],
        [
            'title' => '100% Privato',
            'desc'  => 'I dati CSV rimangono nel tuo browser. I file non vengono mai caricati su alcun server. Veloce, sicuro e completamente privato.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come visualizzo un file CSV online?',
            'answer'   => 'Incolla i tuoi dati CSV nell\'area di testo o carica un file .csv con il pulsante di upload. Fai clic su "Visualizza Tabella" e lo strumento mostrerà i dati in una tabella ordinabile e pulita. Il delimitatore viene rilevato automaticamente per comodità.',
        ],
        [
            'question' => 'Supporta delimitatori diversi?',
            'answer'   => 'Sì! Lo strumento supporta virgola, punto e virgola, tab e pipe come delimitatori. La modalità di rilevamento automatico analizza i dati e seleziona il delimitatore più probabile. Puoi anche scegliere manualmente un delimitatore specifico.',
        ],
        [
            'question' => 'Posso ordinare i dati CSV per colonna?',
            'answer'   => 'Sì! Fai clic su qualsiasi intestazione di colonna per ordinare in modo crescente. Fai clic di nuovo per l\'ordine decrescente e una terza volta per tornare all\'ordine originale. L\'ordinamento funziona per testo, numeri e date.',
        ],
        [
            'question' => 'Posso cercare e filtrare le righe?',
            'answer'   => 'Sì! Usa la casella di ricerca sopra la tabella per filtrare le righe istantaneamente. La ricerca non distingue le maiuscole e controlla tutte le colonne. Il conteggio delle righe corrispondenti si aggiorna in tempo reale mentre digiti.',
        ],
        [
            'question' => 'I miei dati CSV sono al sicuro?',
            'answer'   => 'Sì, al 100%. Tutta l\'elaborazione avviene nel tuo browser tramite JavaScript. I dati CSV non vengono mai inviati a nessun server, garantendo privacy completa e risultati immediati.',
        ],
    ],

    // JS strings (passed via data-* attributes)
    'js_strings' => [
        'enter_csv'          => 'Inserisci o incolla i dati CSV',
        'no_data'            => 'Nessun dato valido trovato',
        'column_prefix'      => 'Colonna',
        'nothing_to_copy'    => 'Niente da copiare',
        'nothing_to_download'=> 'Niente da scaricare',
        'copied'             => 'Copiato!',
        'csv_downloaded'     => 'File CSV scaricato',
        'file_loaded'        => 'File caricato',
        'loaded_prefix'      => 'Caricate',
        'rows_x'             => 'righe ×',
        'columns_suffix'     => 'colonne',
        'of'                 => 'di',
        'rows'               => 'righe',
    ],
];
