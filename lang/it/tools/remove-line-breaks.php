<?php

return [
    // SEO
    'title'       => 'Rimuovi Interruzioni di Riga Online - Converti Testo Multilinea in Una Riga | hafiz.dev',
    'description' => 'Rimuovi le interruzioni di riga dal testo online. Converti testo su più righe in una singola riga con separatore personalizzabile. Strumento gratuito, nessuna registrazione.',
    'keywords'    => 'rimuovi interruzioni di riga, elimina a capo, converti multiriga in singola riga, rimuovi newline online, unire righe testo',

    // Page content
    'h1'       => 'Rimuovi Interruzioni di Riga',
    'subtitle' => 'Converti testo su più righe in una singola riga. Sostituisci le interruzioni di riga con separatori personalizzati o rimuovile completamente.',

    // Options panel
    'options_title'       => 'Opzioni',
    'replacement_label'   => 'Carattere sostitutivo:',
    'custom_sep_label'    => 'Separatore personalizzato:',
    'custom_sep_placeholder' => 'Inserisci separatore personalizzato',

    // Select options
    'opt_space'        => 'Spazio',
    'opt_nothing'      => 'Niente (vuoto)',
    'opt_comma'        => 'Virgola',
    'opt_comma_space'  => 'Virgola + Spazio',
    'opt_semicolon'    => 'Punto e virgola',
    'opt_pipe'         => 'Barra verticale',
    'opt_custom'       => 'Personalizzato',

    // Checkboxes
    'opt_remove_empty_only'     => 'Rimuovi solo righe vuote',
    'opt_trim_lines'            => 'Taglia ogni riga prima di unire',
    'opt_preserve_paragraphs'   => 'Mantieni interruzioni di paragrafo (doppi a capo)',

    // Labels
    'label_input'  => 'Input (Testo Multiriga)',
    'label_output' => 'Output (Riga Singola)',

    // Placeholders
    'placeholder_input'  => 'Incolla il tuo testo multiriga qui...',
    'placeholder_output' => 'Il risultato apparirà qui...',

    // Buttons
    'btn_remove'   => 'Rimuovi A Capo',
    'btn_copy'     => 'Copia',
    'btn_download' => 'Scarica',
    'btn_sample'   => 'Esempio',
    'btn_clear'    => 'Cancella',

    // Stats
    'stat_lines_before'  => 'Righe Prima',
    'stat_lines_after'   => 'Righe Dopo',
    'stat_chars_before'  => 'Caratteri Prima',
    'stat_chars_after'   => 'Caratteri Dopo',

    // Features
    'features' => [
        [
            'title' => 'Separatori Flessibili',
            'desc'  => 'Sostituisci le interruzioni di riga con spazi, virgole, testo personalizzato o niente del tutto.',
        ],
        [
            'title' => 'Opzioni Intelligenti',
            'desc'  => 'Mantieni le interruzioni di paragrafo, taglia le righe o rimuovi solo le righe vuote.',
        ],
        [
            'title' => '100% Privato',
            'desc'  => 'Tutta l\'elaborazione avviene nel tuo browser. Il tuo testo non lascia mai il tuo dispositivo.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come rimuovo le interruzioni di riga dal testo?',
            'answer'   => 'Incolla o digita il tuo testo multiriga nella casella di input. Lo strumento rimuoverà automaticamente le interruzioni di riga e mostrerà il risultato nella casella di output. Puoi scegliere di sostituire le interruzioni di riga con spazi, virgole, testo personalizzato o niente del tutto.',
        ],
        [
            'question' => 'Posso sostituire le interruzioni di riga con un separatore personalizzato?',
            'answer'   => 'Sì! Puoi scegliere tra diverse opzioni di sostituzione: Spazio (predefinito), Niente (vuoto), Virgola, Virgola + Spazio, Punto e virgola, Barra verticale o Personalizzato. Seleziona "Personalizzato" per inserire qualsiasi testo da usare come separatore tra le righe.',
        ],
        [
            'question' => 'Posso preservare le interruzioni di paragrafo mentre rimuovo gli a capo?',
            'answer'   => 'Sì! Attiva l\'opzione "Mantieni interruzioni di paragrafo" per conservare i doppi a capo (interruzioni di paragrafo) intatti mentre rimuovi i singoli a capo all\'interno dei paragrafi. Utile per mantenere la struttura del documento.',
        ],
        [
            'question' => 'Rimuove sia le interruzioni di riga Windows (CRLF) che Unix (LF)?',
            'answer'   => 'Sì! Lo strumento gestisce automaticamente tutti i formati di interruzione di riga inclusi Windows (CRLF), Unix/Linux (LF) e il vecchio Mac (CR). Tutti i formati vengono elaborati correttamente indipendentemente dal sistema operativo.',
        ],
        [
            'question' => 'Il testo viene elaborato sul mio computer?',
            'answer'   => 'Sì! Tutta l\'elaborazione del testo avviene interamente nel tuo browser tramite JavaScript. Il tuo testo non lascia mai il tuo dispositivo né viene inviato ad alcun server, garantendo la massima privacy e sicurezza.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'error_nothing_to_copy'     => 'Niente da copiare. Elabora prima del testo.',
        'error_nothing_to_download' => 'Niente da scaricare. Elabora prima del testo.',
        'error_copy_failed'         => 'Impossibile copiare negli appunti.',
        'success_copied'            => 'Copiato negli appunti!',
        'success_downloaded'        => 'File scaricato!',
    ],
];
