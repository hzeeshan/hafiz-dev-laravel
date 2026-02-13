<?php

return [
    // SEO
    'title' => 'Convertitore Timestamp - Converti Unix Timestamp in Data Online | hafiz.dev',
    'description' => 'Convertitore di timestamp Unix online gratuito. Converti timestamp in date leggibili e viceversa. Supporta più fusi orari e formati. 100% lato client.',
    'keywords' => 'convertitore timestamp, timestamp unix, convertitore epoch, timestamp a data, data a timestamp, convertitore unix time, epoch time, timestamp online',

    // Page content
    'h1' => 'Convertitore Timestamp',
    'subtitle' => 'Converti timestamp Unix in date leggibili e viceversa. 100% lato client — i tuoi dati non escono mai dal tuo browser.',

    // Current Time Card
    'current_time' => 'Ora Corrente',
    'unix_timestamp' => 'Timestamp Unix:',
    'copy_timestamp' => 'Copia timestamp',
    'live_updating' => 'Aggiornamento in tempo reale',

    // Mode Tabs
    'tab_timestamp_to_date' => 'Timestamp → Data',
    'tab_date_to_timestamp' => 'Data → Timestamp',

    // Timestamp to Date
    'unix_timestamp_label' => 'Timestamp Unix',
    'timestamp_placeholder' => 'es. 1737556200 o 1737556200000',
    'supports_seconds_ms' => 'Supporta secondi (10 cifre) o millisecondi (13 cifre)',
    'convert' => 'Converti',
    'use_current_time' => 'Usa Ora Corrente',
    'clear' => 'Cancella',

    // Results - Timestamp to Date
    'converted_date' => 'Data Convertita',
    'iso_8601' => 'ISO 8601',
    'rfc_2822' => 'RFC 2822',
    'local_format' => 'Formato Locale',
    'utc' => 'UTC',
    'relative_time' => 'Tempo Relativo',
    'copy_all_formats' => 'Copia Tutti i Formati',

    // Date to Timestamp
    'date_and_time' => 'Data & Ora',
    'date_label' => 'Data',
    'time_label' => 'Ora',
    'timezone_label' => 'Fuso Orario',

    // Results - Date to Timestamp
    'unix_timestamp_result' => 'Timestamp Unix',
    'seconds_10_digits' => 'Secondi (10 cifre)',
    'milliseconds_13_digits' => 'Millisecondi (13 cifre)',

    // Quick Reference
    'quick_reference' => 'Riferimento Rapido',
    'event' => 'Evento',
    'unix_timestamp_col' => 'Timestamp Unix',
    'date_utc' => 'Data (UTC)',
    'unix_epoch' => 'Epoch Unix',
    'year_2000' => 'Anno 2000',
    'one_billion_seconds' => '1 Miliardo di Secondi',
    'year_2038_problem' => 'Problema dell\'Anno 2038',
    'current_time_row' => 'Ora Corrente',

    // Features
    'features' => [
        [
            'title' => 'Formati Multipli',
            'desc' => 'Converti in formati ISO 8601, RFC 2822, UTC, ora locale e tempo relativo.',
        ],
        [
            'title' => 'Supporto Fusi Orari',
            'desc' => 'Converti timestamp tra 11 fusi orari principali, inclusi UTC, EST, PST e altri.',
        ],
        [
            'title' => '100% Lato Client',
            'desc' => 'Tutta l\'elaborazione avviene nel tuo browser. I tuoi dati non escono mai dal tuo computer.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Cos\'è un timestamp Unix?',
            'answer' => 'Un timestamp Unix (noto anche come Epoch time o POSIX time) è un modo di tracciare il tempo come conteggio totale di secondi. Questo conteggio inizia dall\'Epoch Unix il 1 gennaio 1970 alle 00:00 UTC. Ad esempio, il timestamp 1609459200 rappresenta il 1 gennaio 2021 a mezzanotte UTC. I timestamp Unix sono ampiamente utilizzati nella programmazione perché sono indipendenti dal fuso orario e facili da manipolare matematicamente.',
        ],
        [
            'question' => 'Perché alcuni timestamp hanno 10 cifre e altri 13?',
            'answer' => 'Un timestamp a 10 cifre rappresenta i secondi dall\'Epoch Unix (1 gennaio 1970), mentre uno a 13 cifre rappresenta i millisecondi dalla stessa data. Il metodo Date.now() di JavaScript restituisce millisecondi (13 cifre), mentre molti linguaggi lato server come PHP usano i secondi (10 cifre). Il nostro convertitore rileva automaticamente il formato utilizzato e lo gestisce in modo appropriato.',
        ],
        [
            'question' => 'Cos\'è il problema dell\'anno 2038?',
            'answer' => 'Il problema dell\'anno 2038 (noto anche come Y2K38 o Unix Millennium Bug) si verifica perché molti sistemi più datati memorizzano i timestamp Unix come interi con segno a 32 bit. Il valore massimo (2.147.483.647) corrisponde al 19 gennaio 2038 alle 03:14:07 UTC. Dopo questo momento, questi sistemi andranno in overflow e potrebbero interpretare l\'ora come il 13 dicembre 1901. I sistemi moderni usano interi a 64 bit, che possono gestire date miliardi di anni nel futuro.',
        ],
        [
            'question' => 'Come influiscono i fusi orari sui timestamp?',
            'answer' => 'I timestamp Unix sono sempre in UTC (Coordinated Universal Time) e non includono informazioni sul fuso orario. Lo stesso timestamp rappresenta esattamente lo stesso istante nel tempo in tutto il mondo. Quando si visualizza un timestamp come data leggibile, si applica un offset di fuso orario per mostrare l\'ora locale. Ad esempio, il timestamp 1609459200 è sempre lo stesso istante, ma viene visualizzato come orari locali diversi a New York rispetto a Tokyo.',
        ],
        [
            'question' => 'Questo strumento è gratuito e accurato?',
            'answer' => 'Sì, questo convertitore di timestamp è completamente gratuito e senza limiti o registrazione richiesta. Le conversioni vengono eseguite utilizzando l\'oggetto Date integrato di JavaScript e le API Intl, che sono accurate e affidabili. Tutta l\'elaborazione avviene nel tuo browser — nessun dato viene inviato ad alcun server. Lo strumento supporta timestamp dal 1970 in poi e gestisce sia il formato in secondi che in millisecondi.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'timestamp_copied' => 'Timestamp copiato!',
        'enter_timestamp' => 'Inserisci un timestamp',
        'invalid_timestamp' => 'Timestamp non valido. Inserisci un numero valido.',
        'negative_timestamp' => 'I timestamp negativi (prima del 1970) non sono supportati.',
        'unable_to_convert' => 'Timestamp non valido. Impossibile convertire.',
        'select_date' => 'Seleziona una data',
        'invalid_date' => 'Data non valida. Controlla i dati inseriti.',
        'copy_failed' => 'Copia negli appunti non riuscita',
        'copied' => 'Copiato!',
        'all_formats_copied' => 'Tutti i formati copiati!',
        'year' => 'anno',
        'years' => 'anni',
        'month' => 'mese',
        'months' => 'mesi',
        'day' => 'giorno',
        'days' => 'giorni',
        'hour' => 'ora',
        'hours' => 'ore',
        'minute' => 'minuto',
        'minutes' => 'minuti',
        'second' => 'secondo',
        'seconds' => 'secondi',
        'ago' => '{time} fa',
        'in_future' => 'tra {time}',
    ],
];
