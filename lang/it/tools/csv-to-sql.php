<?php

return [
    // SEO
    'title' => 'Convertitore CSV in SQL - Genera INSERT da CSV Gratis | hafiz.dev',
    'description' => 'Convertitore CSV in SQL online gratuito. Genera istruzioni INSERT, CREATE TABLE e UPDATE da dati CSV. Supporta MySQL, PostgreSQL, SQLite e SQL Server.',
    'keywords' => 'csv in sql, convertitore csv sql, convertire csv in sql, csv in insert sql, csv in create table, generare sql da csv, importare csv database',

    // Page content
    'h1' => 'Convertitore CSV in SQL',
    'subtitle' => 'Genera istruzioni SQL INSERT, CREATE TABLE e UPDATE da dati CSV. Supporta MySQL, PostgreSQL, SQLite e SQL Server con rilevamento automatico dei tipi di colonna.',

    // UI Labels
    'table_name' => 'Nome Tabella',
    'sql_dialect' => 'Dialetto SQL',
    'delimiter' => 'Delimitatore',
    'delimiter_comma' => 'Virgola (,)',
    'delimiter_semicolon' => 'Punto e virgola (;)',
    'delimiter_tab' => 'Tab',
    'delimiter_pipe' => 'Pipe (|)',
    'insert_mode' => 'Modalità Insert',
    'insert_single' => 'INSERT singolo per riga',
    'insert_batch' => 'INSERT in blocco',
    'include_create' => 'Includi CREATE TABLE',
    'drop_table' => 'DROP TABLE IF EXISTS',
    'wrap_transaction' => 'Racchiudi in transazione',
    'empty_as_null' => 'Valori vuoti come NULL',
    'csv_input' => 'Input CSV',
    'upload_csv' => 'Carica .csv',
    'sql_output' => 'Output SQL',
    'sql_output_placeholder' => 'L\'output SQL apparirà qui...',
    'generate_sql' => 'Genera SQL',
    'copy' => 'Copia',
    'download_sql' => 'Scarica .sql',
    'sample' => 'Esempio',
    'clear' => 'Cancella',
    'rows' => 'Righe',
    'columns' => 'Colonne',
    'statements' => 'Istruzioni',
    'dialect' => 'Dialetto',
    'output_size' => 'Dimensione Output',
    'detected_types' => 'Tipi di Colonna Rilevati',

    // Features
    'features' => [
        [
            'title' => 'Multi-Dialetto',
            'desc' => 'Genera SQL per MySQL, PostgreSQL, SQLite e SQL Server. Ogni dialetto usa le convenzioni corrette di quoting, tipi di dato e sintassi.',
        ],
        [
            'title' => 'Rilevamento Tipi',
            'desc' => 'Rileva automaticamente i tipi di colonna: INTEGER, DECIMAL, BOOLEAN, DATE e VARCHAR. Usati per CREATE TABLE e per il corretto quoting dei valori.',
        ],
        [
            'title' => 'Batch e Transazioni',
            'desc' => 'Modalità INSERT singolo o batch, DROP TABLE opzionale, wrapping in transazione e conversione valori vuoti in NULL per SQL pronto per la produzione.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto i dati CSV in istruzioni SQL INSERT?',
            'answer' => 'Incolla i tuoi dati CSV o carica un file .csv, imposta il nome della tabella e il dialetto, poi clicca "Genera SQL". La prima riga diventa i nomi delle colonne, e ogni riga successiva diventa un\'istruzione INSERT con valori correttamente quotati.',
        ],
        [
            'question' => 'Quali database SQL sono supportati?',
            'answer' => 'MySQL (quoting con backtick), PostgreSQL (quoting con doppi apici), SQLite (quoting con doppi apici) e SQL Server (quoting con parentesi quadre). Ognuno usa le mappature corrette dei tipi di dato e la sintassi appropriata.',
        ],
        [
            'question' => 'Posso generare un\'istruzione CREATE TABLE?',
            'answer' => 'Sì! Attiva "Includi CREATE TABLE" e lo strumento genera un\'istruzione CREATE TABLE completa con tipi di colonna rilevati automaticamente. Controlla ogni valore in ogni colonna per determinare il tipo SQL migliore.',
        ],
        [
            'question' => 'Il convertitore rileva i tipi di colonna?',
            'answer' => 'Sì. Lo strumento analizza tutti i valori in ogni colonna per rilevare: INTEGER (numeri interi), DECIMAL/NUMERIC (numeri decimali), BOOLEAN (true/false), DATE (formati data comuni) e VARCHAR (tutto il resto). I tipi rilevati vengono mostrati sotto l\'output.',
        ],
        [
            'question' => 'Posso generare istruzioni INSERT in blocco?',
            'answer' => 'Sì! Passa alla modalità "INSERT in blocco" e tutte le righe vengono raggruppate in un singolo INSERT con più tuple di valori. Questo è molto più veloce per importazioni massive rispetto a singole istruzioni INSERT.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'csv_input' => 'Input CSV',
        'sql_output' => 'Output SQL',
        'upload_csv' => 'Carica .csv',
        'generate_sql' => 'Genera SQL',
        'copy' => 'Copia',
        'download_sql' => 'Scarica .sql',
        'sample' => 'Esempio',
        'clear' => 'Cancella',
        'copied' => 'Copiato!',
        'nothing_to_copy' => 'Niente da copiare',
        'nothing_to_download' => 'Niente da scaricare',
        'sql_downloaded' => 'File SQL scaricato',
        'file_loaded' => 'File caricato:',
        'enter_csv' => 'Inserisci o incolla i dati CSV',
        'min_rows' => 'Il CSV deve avere almeno una riga di intestazione e una riga di dati',
        'generated_msg' => 'Generate {statements} istruzioni SQL per {rows} righe',
        'error_prefix' => 'Errore:',
        'rows' => 'Righe',
        'columns' => 'Colonne',
        'statements' => 'Istruzioni',
        'dialect' => 'Dialetto',
        'output_size' => 'Dimensione Output',
        'detected_types' => 'Tipi di Colonna Rilevati',
    ],
];
