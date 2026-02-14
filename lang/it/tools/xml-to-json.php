<?php

return [
    // SEO
    'title' => 'Convertitore XML in JSON - Converti XML in JSON Online Gratis | hafiz.dev',
    'description' => 'Convertitore online gratuito da XML a JSON. Converti dati XML in formato JSON istantaneamente nel browser. Supporta elementi annidati, attributi, CDATA e strutture complesse. 100% lato client.',
    'keywords' => 'xml in json, convertitore xml json, convertire xml in json, xml to json online, xml2json, parser xml, convertitore xml gratis',

    // Page content
    'h1' => 'Convertitore XML in JSON',
    'subtitle' => 'Converti XML in formato JSON istantaneamente. Analizza risposte API, messaggi SOAP, feed RSS e file di configurazione.',

    // UI Labels
    'json_indentation' => 'Indentazione JSON',
    'spaces_2' => '2 Spazi (predefinito)',
    'spaces_4' => '4 Spazi',
    'tab' => 'Tabulazione',
    'minified' => 'Minimizzato',
    'attribute_prefix' => 'Prefisso attributi',
    'trim_whitespace' => 'Elimina spazi',
    'parse_numbers' => 'Analizza numeri',
    'xml_input' => 'Input XML',
    'json_output' => 'Output JSON',
    'input_placeholder' => 'Incolla il tuo XML qui...',
    'output_placeholder' => 'Il JSON convertito apparirà qui...',
    'convert_to_json' => 'Converti in JSON',
    'copy' => 'Copia',
    'download_json' => 'Scarica .json',
    'sample' => 'Esempio',
    'clear' => 'Pulisci',
    'elements' => 'Elementi',
    'max_depth' => 'Profondità massima',
    'xml_size' => 'Dimensione XML',
    'json_size' => 'Dimensione JSON',

    // Features
    'features' => [
        [
            'title' => 'Supporto XML Completo',
            'desc' => 'Gestisce attributi, namespace, sezioni CDATA, elementi annidati e tag ripetuti convertiti in array.',
        ],
        [
            'title' => 'Output Configurabile',
            'desc' => 'Scegli prefisso attributi, stile di indentazione, analisi numeri e gestione spazi bianchi in base alle tue esigenze.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutta l\'elaborazione avviene nel browser. I tuoi dati XML — risposte API, configurazioni o messaggi SOAP — non lasciano mai il dispositivo.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto XML in JSON?',
            'answer' => 'Incolla i tuoi dati XML nel campo di input e clicca "Converti in JSON". Lo strumento analizza istantaneamente il tuo XML e produce JSON valido e formattato. Puoi poi copiare il risultato o scaricarlo come file .json.',
        ],
        [
            'question' => 'Come gestisce il convertitore gli attributi XML?',
            'answer' => 'Gli attributi XML vengono convertiti in proprietà JSON con un prefisso configurabile (predefinito: @). Ad esempio, <item id="1"> diventa { "@id": "1" }. Puoi cambiare o rimuovere il prefisso nelle opzioni.',
        ],
        [
            'question' => 'Cosa succede con gli elementi XML annidati?',
            'answer' => 'Gli elementi XML annidati vengono convertiti in oggetti JSON annidati. Gli elementi figli ripetuti con lo stesso nome tag vengono automaticamente raggruppati in array JSON. L\'intera gerarchia viene preservata nell\'output.',
        ],
        [
            'question' => 'Supporta le sezioni CDATA?',
            'answer' => 'Sì, le sezioni CDATA vengono estratte e incluse come contenuto testuale nell\'output JSON. Il wrapper CDATA viene rimosso e solo il contenuto viene preservato.',
        ],
        [
            'question' => 'I miei dati sono al sicuro usando questo convertitore?',
            'answer' => 'Assolutamente. Tutta la conversione avviene localmente nel tuo browser usando JavaScript. I tuoi dati non vengono mai caricati su nessun server. Questo significa che anche dati XML sensibili come risposte API o file di configurazione possono essere convertiti in sicurezza.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'convert_to_json' => 'Converti in JSON',
        'copy' => 'Copia',
        'download_json' => 'Scarica .json',
        'sample' => 'Esempio',
        'clear' => 'Pulisci',
        'json_indentation' => 'Indentazione JSON',
        'spaces_2' => '2 Spazi (predefinito)',
        'spaces_4' => '4 Spazi',
        'tab' => 'Tabulazione',
        'minified' => 'Minimizzato',
        'attribute_prefix' => 'Prefisso attributi',
        'trim_whitespace' => 'Elimina spazi',
        'parse_numbers' => 'Analizza numeri',
        'xml_input' => 'Input XML',
        'json_output' => 'Output JSON',
        'input_placeholder' => 'Incolla il tuo XML qui...',
        'output_placeholder' => 'Il JSON convertito apparirà qui...',
        'elements' => 'Elementi',
        'max_depth' => 'Profondità massima',
        'xml_size' => 'Dimensione XML',
        'json_size' => 'Dimensione JSON',
        'success_convert' => 'XML convertito in JSON con successo!',
        'elements_processed' => ' elementi elaborati.',
        'error_empty' => 'Inserisci del XML da convertire',
        'copy_nothing' => 'Niente da copiare. Converti prima del XML.',
        'copied' => 'Copiato!',
        'copy_fail' => 'Copia negli appunti non riuscita',
        'download_nothing' => 'Niente da scaricare. Converti prima del XML.',
        'downloaded' => 'Scaricato: ',
    ],
];
