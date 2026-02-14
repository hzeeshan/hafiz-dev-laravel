<?php

return [
    // SEO
    'title' => 'Convertitore XML in CSV - Converti XML in CSV Online Gratis | hafiz.dev',
    'description' => 'Convertitore online gratuito da XML a CSV. Converti dati XML in formato CSV per fogli di calcolo istantaneamente nel browser. Appiattisci elementi annidati, estrai attributi ed esporta per Excel o Google Sheets. 100% lato client.',
    'keywords' => 'xml in csv, convertitore xml csv, convertire xml in csv, xml a csv online, xml in foglio di calcolo, xml in excel, conversione xml csv gratis',

    // Page content
    'h1' => 'Convertitore XML in CSV',
    'subtitle' => 'Converti dati XML in formato CSV per fogli di calcolo. Appiattisci elementi annidati, estrai attributi ed esporta per Excel o Google Sheets.',

    // Options
    'delimiter' => 'Delimitatore',
    'comma_default' => 'Virgola (predefinito)',
    'semicolon' => 'Punto e virgola',
    'tab' => 'Tabulazione',
    'pipe' => 'Pipe',
    'attr_prefix' => 'Prefisso Attributi',
    'at_default' => '@ (predefinito)',
    'underscore' => '_ (underscore)',
    'none' => 'Nessuno (senza prefisso)',
    'include_header' => 'Includi Riga Intestazione',
    'flatten_nested' => 'Appiattisci Elementi Annidati',

    // Editor
    'xml_input' => 'Input XML',
    'csv_output' => 'Output CSV',
    'placeholder_input' => 'Incolla il tuo XML qui...',
    'placeholder_output' => 'Il CSV convertito apparirà qui...',

    // Buttons
    'convert' => 'Converti in CSV',
    'copy' => 'Copia',
    'download_csv' => 'Scarica .csv',
    'sample' => 'Esempio',
    'clear' => 'Cancella',

    // Stats
    'rows' => 'Righe',
    'columns_label' => 'Colonne',
    'xml_size' => 'Dimensione XML',
    'csv_size' => 'Dimensione CSV',

    // Preview
    'table_preview' => 'Anteprima Tabella',

    // Features
    'features' => [
        [
            'title' => 'Appiattimento Intelligente',
            'desc' => 'Appiattisce automaticamente strutture XML annidate in righe CSV piatte usando la notazione a punti. Gli elementi ripetuti diventano righe separate.',
        ],
        [
            'title' => 'Anteprima Tabella',
            'desc' => 'Visualizza un\'anteprima dei dati CSV come tabella prima del download. Verifica colonne e righe a colpo d\'occhio.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutta l\'elaborazione avviene nel tuo browser. I tuoi dati XML non escono mai dal tuo dispositivo — sicuro per esportazioni, report e dati sensibili.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto XML in CSV?',
            'answer' => 'Incolla i tuoi dati XML nel campo di input e clicca "Converti in CSV". Lo strumento appiattisce automaticamente la gerarchia XML in righe e colonne. Puoi poi copiare il risultato o scaricarlo come file .csv compatibile con Excel e Google Sheets.',
        ],
        [
            'question' => 'Come gestisce il convertitore gli elementi XML annidati?',
            'answer' => 'Gli elementi annidati vengono appiattiti usando la notazione a punti. Ad esempio, &lt;indirizzo&gt;&lt;città&gt;Roma&lt;/città&gt;&lt;/indirizzo&gt; diventa una colonna chiamata "indirizzo.città" con il valore "Roma". Questo preserva la gerarchia in un formato CSV piatto.',
        ],
        [
            'question' => 'Cosa succede con gli attributi XML?',
            'answer' => 'Gli attributi XML vengono inclusi come colonne CSV separate con un prefisso configurabile (predefinito: @). Ad esempio, &lt;libro categoria="fiction"&gt; crea una colonna "@categoria" con il valore "fiction". Puoi cambiare o rimuovere il prefisso nelle opzioni.',
        ],
        [
            'question' => 'Posso aprire il file CSV in Excel o Google Sheets?',
            'answer' => 'Sì! Il file CSV generato è pienamente compatibile con Microsoft Excel, Google Sheets, LibreOffice Calc e qualsiasi altra applicazione per fogli di calcolo. Basta scaricare il file .csv e aprirlo direttamente.',
        ],
        [
            'question' => 'I miei dati sono sicuri usando questo convertitore?',
            'answer' => 'Assolutamente sì. Tutta la conversione avviene localmente nel tuo browser usando JavaScript. I tuoi dati non vengono mai caricati su nessun server. Questo significa che anche dati XML sensibili da esportazioni o report possono essere convertiti in sicurezza.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'enter_xml' => 'Inserisci del codice XML da convertire',
        'nothing_copy' => 'Niente da copiare. Prima converti del codice XML.',
        'nothing_download' => 'Niente da scaricare. Prima converti del codice XML.',
        'converted' => 'XML convertito in CSV',
        'row_generated' => '1 riga generata.',
        'rows' => 'righe',
        'columns' => 'colonne',
        'copied' => 'Copiato!',
        'copy_fail' => 'Copia negli appunti non riuscita',
        'downloaded' => 'Scaricato:',
        'showing_first' => 'Mostrando i primi',
        'of' => 'di',
        'comma_default' => 'Virgola (predefinito)',
        'semicolon' => 'Punto e virgola',
        'tab' => 'Tabulazione',
        'pipe' => 'Pipe',
        'at_default' => '@ (predefinito)',
        'underscore' => '_ (underscore)',
        'none' => 'Nessuno (senza prefisso)',
        'placeholder_input' => 'Incolla il tuo XML qui...',
        'placeholder_output' => 'Il CSV convertito apparirà qui...',
    ],
];
