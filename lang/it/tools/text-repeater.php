<?php

return [
    // SEO
    'title' => 'Ripetitore di Testo - Strumento Online Gratuito per Ripetere Testo | hafiz.dev',
    'description' => 'Ripetitore di testo online gratuito. Ripeti qualsiasi testo o stringa più volte istantaneamente nel tuo browser. Aggiungi separatori, a capo e numerazione. Nessuna registrazione richiesta.',
    'keywords' => 'ripetitore testo, ripetere testo online, duplicare testo, moltiplicatore testo, ripetere stringa, copiare testo più volte, ripetitore testo gratis, ripetere testo gratis',

    // Page content
    'h1' => 'Ripetitore di Testo',
    'subtitle' => 'Ripeti qualsiasi testo o stringa più volte istantaneamente. Aggiungi separatori, numerazione e formattazione personalizzata. 100% lato client - viene eseguito interamente nel tuo browser.',

    // UI Labels
    'repeat_label' => 'Ripeti:',
    'times' => 'volte',
    'separator_label' => 'Separatore:',
    'newline' => 'A capo',
    'space' => 'Spazio',
    'comma' => 'Virgola',
    'semicolon' => 'Punto e virgola',
    'tab' => 'Tabulazione',
    'custom' => 'Personalizzato...',
    'custom_label' => 'Personalizzato:',
    'custom_placeholder' => 'es. | o -',
    'add_numbering' => 'Aggiungi numerazione',
    'text_to_repeat' => 'Testo da Ripetere',
    'input_placeholder' => 'Inserisci il testo da ripetere...',
    'repeated_output' => 'Output Ripetuto',
    'output_placeholder' => 'Il testo ripetuto apparirà qui...',
    'btn_repeat' => 'Ripeti',
    'btn_copy' => 'Copia',
    'btn_download' => 'Scarica',
    'btn_sample' => 'Esempio',
    'btn_clear' => 'Cancella',
    'stat_repetitions' => 'Ripetizioni',
    'stat_total_chars' => 'Caratteri Totali',
    'stat_total_lines' => 'Righe Totali',
    'stat_output_size' => 'Dimensione Output',

    // Features
    'features' => [
        [
            'title' => 'Ripetizioni Flessibili',
            'desc' => 'Ripeti il testo da 1 a 10.000 volte con separatori personalizzabili, numerazione e opzioni di formattazione.',
        ],
        [
            'title' => 'Risultati Istantanei',
            'desc' => 'Genera testo ripetuto istantaneamente con un clic. Copia negli appunti o scarica come file di testo.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutta l\'elaborazione avviene nel tuo browser. I tuoi dati non escono mai dal tuo dispositivo.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come faccio a ripetere un testo più volte?',
            'answer' => 'Digita o incolla il tuo testo nell\'area di input, imposta il numero di ripetizioni, scegli un separatore (a capo, spazio, virgola o personalizzato) e clicca "Ripeti". Lo strumento genererà istantaneamente il testo ripetuto nell\'area di output.',
        ],
        [
            'question' => 'Posso aggiungere un separatore tra il testo ripetuto?',
            'answer' => 'Sì! Puoi scegliere tra diversi separatori predefiniti: a capo, spazio, virgola, punto e virgola, tabulazione, oppure definire un separatore personalizzato. Il separatore viene inserito tra ogni ripetizione del tuo testo.',
        ],
        [
            'question' => 'Qual è il numero massimo di ripetizioni?',
            'answer' => 'Puoi ripetere il testo fino a 10.000 volte. Questo copre praticamente qualsiasi esigenza, dalla semplice duplicazione alla generazione di grandi blocchi di contenuto ripetuto per test o sviluppo.',
        ],
        [
            'question' => 'Posso aggiungere la numerazione al testo ripetuto?',
            'answer' => 'Sì! Attiva l\'opzione "Aggiungi numerazione" per aggiungere un numero progressivo a ogni ripetizione (es. "1. Ciao", "2. Ciao", "3. Ciao"). È utile per creare elenchi numerati o sequenze ordinate.',
        ],
        [
            'question' => 'I miei dati sono mantenuti privati?',
            'answer' => 'Assolutamente sì! Tutta l\'elaborazione del testo avviene interamente nel tuo browser tramite JavaScript. I tuoi dati non lasciano mai il tuo dispositivo: non memorizziamo, trasmettiamo né abbiamo accesso a nessun testo che ripeti.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'enter_text' => 'Inserisci del testo da ripetere.',
        'invalid_count' => 'Inserisci un numero di ripetizioni valido (1 o superiore).',
        'max_exceeded' => 'Massimo 10.000 ripetizioni consentite.',
        'repeated_success' => 'Testo ripetuto {count} volte!',
        'nothing_to_copy' => 'Niente da copiare. Prima ripeti del testo.',
        'copied_btn' => 'Copiato!',
        'copied' => 'Copiato negli appunti!',
        'copy_fail' => 'Copia negli appunti non riuscita.',
        'nothing_to_download' => 'Niente da scaricare. Prima ripeti del testo.',
        'downloaded' => 'Scaricato come repeated-text.txt',
        'sample_text' => 'Ciao, Mondo!',
    ],
];
