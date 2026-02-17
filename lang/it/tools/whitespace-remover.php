<?php

return [
    // SEO
    'title'       => 'Rimuovi Spazi Bianchi Online - Elimina Spazi Extra Gratis | hafiz.dev',
    'description' => 'Strumento online gratuito per rimuovere spazi bianchi in eccesso, spazi iniziali/finali e righe vuote istantaneamente. Nessuna registrazione richiesta.',
    'keywords'    => 'rimuovi spazi bianchi, elimina spazi extra, taglia spazi, rimuovi spazi online, pulisci testo, rimuovi righe vuote',

    // Page content
    'h1'       => 'Rimuovi Spazi Bianchi',
    'subtitle' => 'Elimina spazi extra, spazi iniziali/finali e righe vuote istantaneamente. 100% lato client - elaborato interamente nel tuo browser.',

    // Options panel
    'opt_trim_leading_trailing' => 'Rimuovi spazi iniziali/finali',
    'opt_extra_spaces'          => 'Rimuovi spazi extra tra le parole',
    'opt_blank_lines'           => 'Rimuovi righe vuote',
    'opt_all_whitespace'        => 'Rimuovi tutti gli spazi bianchi',
    'opt_trim_each_line'        => 'Taglia ogni riga',

    // Labels
    'label_input'  => 'Testo di Input',
    'label_output' => 'Output Pulito',

    // Placeholders
    'placeholder_input'  => 'Incolla il testo con spazi extra qui...',
    'placeholder_output' => 'Il testo pulito apparirà qui...',

    // Buttons
    'btn_clean'    => 'Pulisci',
    'btn_copy'     => 'Copia',
    'btn_download' => 'Scarica',
    'btn_sample'   => 'Esempio',
    'btn_clear'    => 'Cancella',

    // Stats
    'stat_chars_removed'  => 'Caratteri Rimossi',
    'stat_spaces_removed' => 'Spazi Rimossi',
    'stat_lines_removed'  => 'Righe Rimosse',
    'stat_size_reduction' => 'Riduzione Dimensione',

    // Features
    'features' => [
        [
            'title' => 'Modalità di Pulizia Multiple',
            'desc'  => 'Rimuovi spazi extra, righe vuote o tutti gli spazi bianchi. Scegli le opzioni che si adattano alle tue esigenze.',
        ],
        [
            'title' => 'Anteprima in Tempo Reale',
            'desc'  => 'Vedi l\'output pulito istantaneamente mentre digiti o modifichi le opzioni. Nessuna attesa necessaria.',
        ],
        [
            'title' => '100% Privato',
            'desc'  => 'Tutta l\'elaborazione avviene nel tuo browser. I dati non lasciano mai il tuo dispositivo.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come rimuovo gli spazi bianchi in eccesso dal testo?',
            'answer'   => 'Incolla semplicemente il testo nell\'area di input, seleziona le opzioni di pulizia desiderate (come rimuovere spazi extra o righe vuote) e clicca su "Pulisci". Lo strumento elaborerà istantaneamente il testo e mostrerà la versione pulita nell\'area di output.',
        ],
        [
            'question' => 'Che tipi di spazi bianchi rimuove questo strumento?',
            'answer'   => 'Questo strumento può rimuovere vari tipi di spazi bianchi inclusi spazi iniziali/finali, spazi extra tra le parole (più spazi ridotti a uno), righe vuote, tabulazioni e tutti gli spazi bianchi se necessario. Puoi scegliere quali tipi rimuovere usando le caselle di controllo.',
        ],
        [
            'question' => 'Posso rimuovere le righe vuote dal testo?',
            'answer'   => 'Sì! Seleziona semplicemente l\'opzione "Rimuovi righe vuote" e lo strumento rimuoverà tutte le righe vuote dal tuo testo, compattandolo eliminando le righe che contengono solo spazi bianchi o sono completamente vuote.',
        ],
        [
            'question' => 'Preserva le interruzioni di riga?',
            'answer'   => 'Sì, a meno che non abiliti "Rimuovi tutti gli spazi bianchi". Per impostazione predefinita, le interruzioni di riga vengono preservate e vengono puliti solo gli spazi extra all\'interno delle righe. Se selezioni "Rimuovi tutti gli spazi bianchi", tutti gli spazi, le tabulazioni e le interruzioni di riga verranno rimossi completamente.',
        ],
        [
            'question' => 'I miei dati di testo sono al sicuro?',
            'answer'   => 'Assolutamente! Tutta l\'elaborazione del testo avviene interamente nel tuo browser tramite JavaScript. I tuoi dati non lasciano mai il tuo dispositivo - non archiviamo, trasmettiamo o abbiamo accesso a nessun testo che pulisci.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'error_nothing_to_copy'     => 'Niente da copiare. Pulisci prima del testo.',
        'error_nothing_to_download' => 'Niente da scaricare. Pulisci prima del testo.',
        'error_copy_failed'         => 'Impossibile copiare negli appunti.',
        'success_copied'            => 'Copiato negli appunti!',
        'success_downloaded'        => 'Scaricato come cleaned-text.txt',
        'success_sample_loaded'     => 'Testo di esempio caricato!',
        'copied'                    => 'Copiato!',
    ],
];
