<?php

return [
    // SEO
    'title' => 'Generatore UUID Online - Genera UUID v4, v1 e ULID Gratis | hafiz.dev',
    'description' => 'Generatore UUID online gratuito. Crea UUID v4, UUID v1 e ULID istantaneamente. Generazione in blocco, formati multipli. 100% lato client, nessuna registrazione richiesta.',
    'keywords' => 'generatore uuid, uuid v4, uuid v1, generatore ulid, generare uuid online, uuid casuale, identificatore univoco, generatore guid, uuid in blocco',

    // Page content
    'h1' => 'Generatore UUID/ULID',
    'subtitle' => 'Genera identificatori univoci universali istantaneamente. 100% lato client — i tuoi dati non escono mai dal tuo browser.',

    // UI Labels
    'identifier_type' => 'Tipo di Identificatore',
    'uuid_v4_random' => 'UUID v4 (Casuale)',
    'uuid_v1_timestamp' => 'UUID v1 (Timestamp)',
    'uuid_v7_sortable' => 'UUID v7 (Ordinabile)',
    'ulid' => 'ULID',
    'quantity' => 'Quantità:',
    'include_hyphens' => 'Includi trattini',
    'uppercase' => 'Maiuscolo',
    'generate' => 'Genera',
    'generated_ids' => 'ID Generati',
    'copy_all' => 'Copia Tutto',
    'download' => 'Scarica',
    'clear' => 'Cancella',

    // Info Card
    'about_uuid_versions' => 'Informazioni sulle Versioni UUID',
    'uuid_v4_title' => 'UUID v4 (Casuale)',
    'uuid_v4_desc' => 'Crittograficamente casuale. Il più usato. Ideale per ID univoci generici.',
    'uuid_v1_title' => 'UUID v1 (Timestamp)',
    'uuid_v1_desc' => 'Basato sul tempo con ID nodo. Contiene il timestamp di creazione. Utile per ID ordinati cronologicamente.',
    'uuid_v7_title' => 'UUID v7 (Ordinabile)',
    'uuid_v7_desc' => 'Nuovo standard. Il prefisso timestamp Unix lo rende ordinabile. Ottimo per chiavi primarie nei database.',
    'ulid_title' => 'ULID',
    'ulid_desc' => '26 caratteri, case-insensitive, ordinabile lessicograficamente. Alternativa URL-safe agli UUID.',

    // Features
    'features' => [
        [
            'title' => '100% Lato Client',
            'desc' => 'Tutta l\'elaborazione avviene nel tuo browser. I tuoi dati non toccano mai i nostri server.',
        ],
        [
            'title' => 'Gratuito e Senza Registrazione',
            'desc' => 'Usa senza limiti senza creare un account. Nessuna pubblicità, nessun tracciamento.',
        ],
        [
            'title' => 'Risultati Istantanei',
            'desc' => 'Genera centinaia di UUID istantaneamente con il supporto alla generazione in blocco.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Cos\'è un UUID?',
            'answer' => 'Un UUID (Universally Unique Identifier) è un identificatore a 128 bit che è unico nello spazio e nel tempo. Gli UUID sono comunemente usati in database, API e sistemi distribuiti per identificare risorse senza richiedere un\'autorità centrale che garantisca l\'unicità. Il formato standard è composto da 32 cifre esadecimali visualizzate in cinque gruppi separati da trattini: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx.',
        ],
        [
            'question' => 'Qual è la differenza tra UUID v1 e UUID v4?',
            'answer' => 'UUID v1 è basato sul timestamp, incorporando l\'ora corrente e un identificatore di nodo (tipicamente una simulazione di indirizzo MAC). Questo rende gli UUID v1 approssimativamente ordinabili per data di creazione ma potenzialmente rivela informazioni su quando sono stati creati. UUID v4 è generato casualmente usando numeri casuali crittograficamente sicuri, offrendo maggiore privacy e imprevedibilità. La v4 è la versione più comunemente usata per identificatori univoci generici.',
        ],
        [
            'question' => 'Cos\'è un ULID e quando dovrei usarlo?',
            'answer' => 'Un ULID (Universally Unique Lexicographically Sortable Identifier) è un identificatore di 26 caratteri che combina un timestamp a 48 bit con 80 bit di casualità. A differenza degli UUID, gli ULID sono case-insensitive, URL-safe e ordinabili lessicograficamente per data di creazione. Usa gli ULID quando hai bisogno di ID ordinabili cronologicamente, come per le chiavi primarie dei database dove l\'ordine di inserimento è importante, o quando servono identificatori più corti e compatibili con gli URL.',
        ],
        [
            'question' => 'Gli UUID generati sono davvero unici?',
            'answer' => 'Sì, per tutti gli scopi pratici. UUID v4 usa 122 bit casuali, rendendo la probabilità di generare UUID duplicati astronomicamente piccola (circa 1 su 5,3 × 10^36). Dovresti generare 1 miliardo di UUID al secondo per circa 85 anni per avere una probabilità del 50% di una collisione. Questo rende gli UUID adatti a praticamente qualsiasi applicazione che richieda identificatori univoci.',
        ],
        [
            'question' => 'Questo strumento è gratuito e sicuro?',
            'answer' => 'Sì, questo generatore di UUID è completamente gratuito e non richiede registrazione. Tutta la generazione degli UUID avviene interamente nel tuo browser usando JavaScript — nessun dato viene inviato a nessun server. Questo lo rende completamente sicuro e privato per generare identificatori per qualsiasi scopo, incluse applicazioni sensibili.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'placeholder' => 'Clicca "Genera" per creare UUID...',
        'copied' => 'Copiato negli appunti!',
        'copy_fail' => 'Copia non riuscita',
        'nothing_to_copy' => 'Niente da copiare. Prima genera qualche ID.',
        'nothing_to_download' => 'Niente da scaricare. Prima genera qualche ID.',
        'file_downloaded' => 'File scaricato!',
        'copied_count' => '{count} ID copiati negli appunti!',
        'copy_title' => 'Copia',
    ],
];
