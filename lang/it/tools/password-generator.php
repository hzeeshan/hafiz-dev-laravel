<?php

return [
    // SEO
    'title' => 'Generatore di Password - Crea Password Sicure e Casuali Gratis | hafiz.dev',
    'description' => 'Generatore di password online gratuito. Crea password sicure e casuali con lunghezza e caratteri personalizzabili. 100% lato client, nessuna password viene salvata.',
    'keywords' => 'generatore password, password casuale, generatore password sicura, password forte, creare password, generatore password online, generatore password gratis',

    // Page content
    'h1' => 'Generatore di Password',
    'subtitle' => 'Genera password sicure e casuali. 100% lato client — le tue password non escono mai dal tuo browser.',

    // UI Labels
    'generated_password' => 'Password Generata',
    'placeholder' => 'Clicca Genera per creare una password',
    'toggle_visibility' => 'Mostra/Nascondi password',
    'copy_password' => 'Copia password',

    // Strength meter
    'password_strength' => 'Robustezza della Password',

    // Length
    'password_length' => 'Lunghezza della Password',

    // Character types
    'character_types' => 'Tipi di Caratteri',
    'uppercase' => 'Maiuscole (A-Z)',
    'lowercase' => 'Minuscole (a-z)',
    'numbers' => 'Numeri (0-9)',
    'symbols' => 'Simboli (!@#$%)',

    // Exclude similar
    'exclude_similar' => 'Escludi caratteri simili',
    'exclude_similar_desc' => 'Rimuove: 0, O, l, 1, I (più facili da leggere/digitare)',

    // Generate button
    'generate_password' => 'Genera Password',

    // Bulk generation
    'bulk_generation' => 'Generazione Multipla',
    'passwords_5' => '5 password',
    'passwords_10' => '10 password',
    'passwords_25' => '25 password',
    'generate_bulk' => 'Genera Multiple',
    'copy_all' => 'Copia Tutto',
    'download_txt' => 'Scarica come TXT',

    // Features
    'features' => [
        [
            'title' => 'Crittograficamente Sicuro',
            'desc' => 'Utilizza la Web Crypto API per una vera casualità. La stessa tecnologia usata dai gestori di password.',
        ],
        [
            'title' => '100% Lato Client',
            'desc' => 'Tutta l\'elaborazione avviene nel tuo browser. Le tue password non toccano mai i nostri server.',
        ],
        [
            'title' => 'Nessun Limite',
            'desc' => 'Genera password illimitate. Nessuna registrazione, nessuna pubblicità, nessun tracciamento.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come funziona questo generatore di password?',
            'answer' => 'Questo generatore di password utilizza la Web Crypto API (crypto.getRandomValues) per generare numeri casuali crittograficamente sicuri. Questi valori casuali vengono poi mappati sul set di caratteri selezionato (maiuscole, minuscole, numeri, simboli) per creare una password veramente casuale. Tutta l\'elaborazione avviene interamente nel tuo browser — nessun dato viene mai inviato a nessun server.',
        ],
        [
            'question' => 'Le password generate sono sicure?',
            'answer' => 'Sì, le password sono crittograficamente sicure. Utilizziamo la Web Crypto API che fornisce accesso a un generatore di numeri casuali crittograficamente forte. È la stessa tecnologia utilizzata dai gestori di password e dalle applicazioni di sicurezza. La casualità è adatta a tutte le applicazioni sensibili alla sicurezza.',
        ],
        [
            'question' => 'La mia password viene salvata o inviata da qualche parte?',
            'answer' => 'No, assolutamente no. Questo strumento funziona al 100% nel tuo browser utilizzando JavaScript. Le tue password generate non lasciano mai il tuo computer e non vengono mai trasmesse su internet. Non ci sono richieste al server, nessuna registrazione e nessun tracciamento. Quando chiudi la pagina, le password esistono solo se le hai copiate.',
        ],
        [
            'question' => 'Cosa rende una password forte?',
            'answer' => 'Una password forte ha tipicamente: 1) Almeno 12-16 caratteri di lunghezza, 2) Un mix di lettere maiuscole e minuscole, 3) Numeri e simboli speciali, 4) Nessuna informazione personale o parola comune, 5) Unica per ogni account. Il nostro generatore ti aiuta a creare password che soddisfano tutti questi criteri.',
        ],
        [
            'question' => 'Quanto dovrebbe essere lunga la mia password?',
            'answer' => 'Per la maggior parte degli scopi, 16 caratteri è un buon minimo. Per account ad alta sicurezza (banca, email principale), considera 20-24 caratteri. Per le master password (gestori di password), sono raccomandati 24+ caratteri. Password più lunghe sono esponenzialmente più difficili da decifrare — ogni carattere aggiuntivo moltiplica significativamente la difficoltà.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'placeholder' => 'Clicca Genera per creare una password',
        'no_char_type' => 'Seleziona almeno un tipo di carattere',
        'copied' => 'Password copiata!',
        'copy_fail' => 'Copia negli appunti non riuscita',
        'generate_first' => 'Prima genera una password',
        'no_download' => 'Nessuna password da scaricare. Generane qualcuna prima.',
        'no_copy' => 'Nessuna password da copiare. Generane qualcuna prima.',
        'downloaded' => 'Password scaricate!',
        'copied_count' => '{count} password copiate!',
        'very_weak' => 'Molto Debole',
        'weak' => 'Debole',
        'fair' => 'Discreta',
        'strong' => 'Forte',
        'very_strong' => 'Molto Forte',
    ],
];
