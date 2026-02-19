<?php

return [
    // SEO
    'title' => 'Generatore di Emoji Casuali - Scegli Emoji Online Gratis | hafiz.dev',
    'description' => 'Generatore gratuito di emoji casuali online. Genera emoji casuali per categoria, copia negli appunti e usali per social media, Slack, Discord e altro. Nessuna registrazione.',
    'keywords' => 'generatore emoji casuali, emoji casuale, generatore emoji online, generatore emoji gratis, emoji picker, generatore emoji random, copia incolla emoji',

    // Page content
    'h1' => 'Generatore di Emoji Casuali',
    'subtitle' => 'Genera emoji casuali istantaneamente. Filtra per categoria, scegli quanti ne vuoi e copia negli appunti per social media, Slack, Discord e altro.',

    // Options
    'category' => 'Categoria',
    'quantity' => 'Quantita',
    'separator' => 'Separatore',
    'unique_only' => 'Solo Unici',

    // Category options
    'cat_all' => 'Tutte le Categorie',
    'cat_smileys' => 'Faccine e Persone',
    'cat_animals' => 'Animali e Natura',
    'cat_food' => 'Cibo e Bevande',
    'cat_activities' => 'Attivita',
    'cat_travel' => 'Viaggi e Luoghi',
    'cat_objects' => 'Oggetti',
    'cat_symbols' => 'Simboli',
    'cat_flags' => 'Bandiere',

    // Separator options
    'sep_none' => 'Nessuno (uniti)',
    'sep_space' => 'Spazio',
    'sep_newline' => 'A Capo',
    'sep_comma' => 'Virgola',

    // Output
    'generated_emojis' => 'Emoji Generati',
    'placeholder' => 'Clicca \'Genera\' per ottenere emoji casuali...',

    // Buttons
    'generate' => 'Genera',
    'copy' => 'Copia',
    'download' => 'Scarica',
    'sample' => 'Esempio',
    'clear' => 'Cancella',

    // Stats
    'stat_emojis_generated' => 'Emoji Generati',
    'stat_category' => 'Categoria',
    'stat_unique' => 'Emoji Unici',
    'stat_pool' => 'Disponibili nel Pool',

    // Features
    'features' => [
        [
            'title' => 'Filtro per Categoria',
            'desc' => 'Scegli tra 8 categorie di emoji: Faccine, Animali, Cibo, Attivita, Viaggi, Oggetti, Simboli e Bandiere. Oppure genera da tutte le categorie insieme.',
        ],
        [
            'title' => 'Copia e Download Istantanei',
            'desc' => 'Copia gli emoji negli appunti con un clic o scaricali come file di testo. Perfetti per incollarli su social media, Slack, Discord o documenti.',
        ],
        [
            'title' => '100% Lato Client',
            'desc' => 'Tutto viene eseguito nel tuo browser. Nessun dato viene inviato a nessun server. Veloce, privato e funziona offline una volta caricata la pagina.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come funziona il generatore di emoji casuali?',
            'answer' => 'Il generatore sceglie emoji in modo casuale da una raccolta curata di emoji Unicode popolari. Puoi filtrare per categoria (Faccine, Animali, Cibo, ecc.), impostare quanti generarne e copiarli negli appunti con un clic. La randomizzazione utilizza il generatore di numeri casuali integrato nel browser.',
        ],
        [
            'question' => 'Posso filtrare le emoji per categoria?',
            'answer' => 'Certo! Puoi scegliere tra 8 categorie: Faccine e Persone, Animali e Natura, Cibo e Bevande, Attivita, Viaggi e Luoghi, Oggetti, Simboli e Bandiere. Oppure seleziona "Tutte le Categorie" per pescare casualmente dall\'intero set di emoji.',
        ],
        [
            'question' => 'Queste emoji sono gratuite e utilizzabili ovunque?',
            'answer' => 'Assolutamente. Tutte le emoji sono caratteri Unicode standard che funzionano ovunque: social media (Instagram, Twitter/X, Facebook), app di messaggistica (Slack, Discord, WhatsApp), email, documenti e siti web. Basta copiare e incollare.',
        ],
        [
            'question' => 'Quanti emoji posso generare in una volta?',
            'answer' => 'Puoi generare da 1 a 100 emoji alla volta. Usa il campo quantita per impostare qualsiasi numero in quel range. Attiva "Solo Unici" per assicurarti che nessun emoji appaia due volte nello stesso batch (limitato dalla dimensione del pool della categoria selezionata).',
        ],
        [
            'question' => 'I miei dati vengono salvati o inviati a un server?',
            'answer' => 'No. Questo strumento funziona al 100% nel tuo browser utilizzando JavaScript. Nessun dato viene inviato a nessun server, nessun cookie viene salvato e nulla viene tracciato. La generazione di emoji avviene interamente lato client.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'placeholder' => 'Clicca \'Genera\' per ottenere emoji casuali...',
        'no_emojis_available' => 'Nessun emoji disponibile per la categoria selezionata.',
        'unique_reduced' => 'Modalita unici: ridotto a {count} (massimo disponibile in questa categoria).',
        'generated' => '{count} emoji generati!',
        'nothing_to_copy' => 'Niente da copiare. Prima genera qualche emoji.',
        'nothing_to_download' => 'Niente da scaricare. Prima genera qualche emoji.',
        'copied' => 'Copiato!',
        'downloaded' => 'Emoji scaricati!',
        'cat_all' => 'Tutte le Categorie',
        'cat_smileys' => 'Faccine e Persone',
        'cat_animals' => 'Animali e Natura',
        'cat_food' => 'Cibo e Bevande',
        'cat_activities' => 'Attivita',
        'cat_travel' => 'Viaggi e Luoghi',
        'cat_objects' => 'Oggetti',
        'cat_symbols' => 'Simboli',
        'cat_flags' => 'Bandiere',
    ],
];
