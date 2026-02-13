<?php

return [
    // SEO
    'title' => 'Conta Parole - Conta Caratteri, Parole, Frasi Online | hafiz.dev',
    'description' => 'Strumento gratuito per contare parole online. Conta caratteri, parole, frasi, paragrafi istantaneamente. Mostra tempo di lettura e tempo di parlato. Nessuna registrazione richiesta.',
    'keywords' => 'conta parole, conta caratteri, contatore parole online, conta lettere, analizzatore testo, conta frasi, conta paragrafi, calcolatore tempo di lettura',

    // Page content
    'h1' => 'Conta Parole',
    'subtitle' => 'Conta parole, caratteri, frasi e paragrafi istantaneamente. 100% lato client — funziona interamente nel tuo browser.',

    // UI Labels
    'paste' => 'Incolla',
    'copy' => 'Copia',
    'clear' => 'Pulisci',
    'placeholder' => 'Digita o incolla il tuo testo qui...',

    // Stats
    'characters' => 'Caratteri',
    'characters_no_spaces' => 'Caratteri (senza spazi)',
    'words' => 'Parole',
    'sentences' => 'Frasi',
    'paragraphs' => 'Paragrafi',
    'lines' => 'Righe',
    'reading_time' => 'Tempo di Lettura',
    'speaking_time' => 'Tempo di Parlato',

    // Character limit
    'character_limit' => 'Limite Caratteri:',
    'optional' => 'Opzionale',

    // Features
    'features' => [
        [
            'title' => 'Analisi in Tempo Reale',
            'desc' => 'Le statistiche si aggiornano istantaneamente mentre digiti. Non serve cliccare nessun pulsante.',
        ],
        [
            'title' => '100% Lato Client',
            'desc' => 'Tutta l\'elaborazione avviene nel tuo browser. Nessun dato viene inviato a nessun server.',
        ],
        [
            'title' => 'Statistiche Complete',
            'desc' => 'Ottieni parole, caratteri, frasi, paragrafi e tempo stimato di lettura/parlato.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come viene calcolato il conteggio delle parole?',
            'answer' => 'Le parole vengono contate dividendo il testo per spazi bianchi (spazi, tabulazioni, interruzioni di riga) e contando i segmenti non vuoti. Questo significa che "ciao mondo" conta come 2 parole, e spazi multipli tra le parole non influenzano il conteggio.',
        ],
        [
            'question' => 'Come viene calcolato il tempo di lettura?',
            'answer' => 'Il tempo di lettura viene calcolato sulla base di una velocità di lettura media di 200 parole al minuto, che è la tipica velocità di lettura silenziosa per gli adulti. Il risultato viene arrotondato al minuto successivo.',
        ],
        [
            'question' => 'Cosa conta come una frase?',
            'answer' => 'Una frase viene rilevata cercando testo che termina con un punto (.), punto esclamativo (!) o punto interrogativo (?). Segni di punteggiatura multipli (come "..." o "?!") vengono trattati come una singola fine di frase.',
        ],
        [
            'question' => 'Cosa conta come un paragrafo?',
            'answer' => 'Un paragrafo viene rilevato cercando testo separato da una o più righe vuote (doppie interruzioni di riga). Le singole interruzioni di riga all\'interno di testo continuo non vengono contate come separatori di paragrafo.',
        ],
        [
            'question' => 'Questo strumento funziona offline?',
            'answer' => 'Sì! Una volta caricata la pagina, il conta parole funziona interamente nel tuo browser senza alcuna comunicazione con il server. Tutta l\'elaborazione avviene localmente sul tuo dispositivo, rendendolo veloce e privato.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'placeholder' => 'Digita o incolla il tuo testo qui...',
        'pasted' => 'Testo incollato dagli appunti!',
        'paste_fail' => 'Impossibile incollare. Controlla i permessi degli appunti.',
        'copied' => 'Copiato negli appunti!',
        'copy_fail' => 'Copia negli appunti non riuscita.',
        'nothing_to_copy' => 'Niente da copiare. Inserisci prima del testo.',
        'characters' => 'caratteri',
        'remaining' => 'rimanenti',
        'over_limit' => 'oltre il limite',
        'min' => 'min',
        'less_than_min' => '< 1 min',
    ],
];
