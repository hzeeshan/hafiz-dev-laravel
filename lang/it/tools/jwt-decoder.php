<?php

return [
    // SEO
    'title' => 'Decodificatore JWT - Decodifica JSON Web Token Online Gratis | hafiz.dev',
    'description' => 'Decodificatore JWT online gratuito. Decodifica e analizza JSON Web Token istantaneamente. Visualizza header, payload e scadenza. 100% lato client, nessuna registrazione.',
    'keywords' => 'decodificatore jwt, decodifica jwt, json web token decoder, jwt parser, jwt viewer, jwt inspector, jwt online, decodifica token jwt, jwt debugger',

    // Page content
    'h1' => 'Decodificatore JWT',
    'subtitle' => 'Decodifica e analizza JSON Web Token istantaneamente. 100% lato client — i tuoi token non escono mai dal tuo browser.',

    // UI Labels
    'paste_jwt' => 'Incolla Token JWT',
    'paste' => 'Incolla',
    'load_sample' => 'Carica Esempio',
    'header' => 'Header',
    'payload' => 'Payload',
    'signature' => 'Firma',
    'copy' => 'Copia',

    // Common Claims Reference
    'common_claims' => 'Claim JWT Comuni',
    'claim' => 'Claim',
    'claim_name' => 'Nome',
    'claim_description' => 'Descrizione',
    'claim_iss' => 'Emittente',
    'claim_iss_desc' => 'Chi ha emesso il token',
    'claim_sub' => 'Soggetto',
    'claim_sub_desc' => 'A chi si riferisce il token (di solito l\'ID utente)',
    'claim_aud' => 'Destinatario',
    'claim_aud_desc' => 'A chi è destinato il token',
    'claim_exp' => 'Scadenza',
    'claim_exp_desc' => 'Quando scade il token (timestamp Unix)',
    'claim_iat' => 'Emesso Il',
    'claim_iat_desc' => 'Quando è stato emesso il token (timestamp Unix)',
    'claim_nbf' => 'Non Prima Di',
    'claim_nbf_desc' => 'Il token non è valido prima di questo momento',
    'claim_jti' => 'ID JWT',
    'claim_jti_desc' => 'Identificatore univoco del token',

    // Features
    'features' => [
        [
            'title' => '100% Lato Client',
            'desc' => 'Tutta la decodifica avviene nel tuo browser. I tuoi token non toccano mai i nostri server.',
        ],
        [
            'title' => 'Gratuito e Senza Registrazione',
            'desc' => 'Utilizzo illimitato senza creare un account. Nessuna pubblicità, nessun tracciamento.',
        ],
        [
            'title' => 'Decodifica Istantanea',
            'desc' => 'Decodifica JWT mentre digiti con analisi in tempo reale e conversione dei timestamp.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Cos\'è un JWT (JSON Web Token)?',
            'answer' => 'Un JSON Web Token (JWT) è un formato di token compatto e sicuro per gli URL, utilizzato per trasmettere informazioni in modo sicuro tra le parti. I JWT sono comunemente usati per l\'autenticazione e l\'autorizzazione nelle applicazioni web. Sono composti da tre parti: un header (algoritmo e tipo di token), un payload (claim/dati) e una firma (per la verifica). I JWT sono autonomi, il che significa che tutte le informazioni necessarie per verificare il token sono contenute nel token stesso.',
        ],
        [
            'question' => 'Questo strumento può verificare le firme JWT?',
            'answer' => 'No, questo strumento decodifica e visualizza solo il contenuto di un JWT. La verifica della firma richiede la chiave segreta (per algoritmi HMAC) o la chiave pubblica (per algoritmi RSA/ECDSA) utilizzata per firmare il token. Queste chiavi non dovrebbero mai essere condivise pubblicamente o inserite in strumenti online. Questo decodificatore è progettato per ispezionare il contenuto dei token durante lo sviluppo e il debug — verifica sempre le firme sul tuo server usando librerie crittografiche appropriate.',
        ],
        [
            'question' => 'Quali sono le tre parti di un JWT?',
            'answer' => 'Un JWT è composto da tre parti separate da punti (xxxxx.yyyyy.zzzzz): <strong>1) Header</strong> — contiene metadati sul token, incluso il tipo di token (JWT) e l\'algoritmo di firma (es. HS256, RS256). <strong>2) Payload</strong> — contiene i claim, ovvero dichiarazioni sull\'utente e metadati aggiuntivi come il tempo di scadenza. <strong>3) Firma</strong> — creata codificando header e payload e firmando con una chiave segreta per garantire che il token non sia stato manomesso.',
        ],
        [
            'question' => 'Cosa significano i claim comuni come exp, iat, sub?',
            'answer' => 'I claim JWT sono coppie chiave-valore nel payload. I claim registrati comuni includono: <strong>exp</strong> (Expiration Time) — timestamp Unix di quando scade il token; <strong>iat</strong> (Issued At) — timestamp Unix di quando è stato creato il token; <strong>sub</strong> (Subject) — identificatore di chi riguarda il token, di solito un ID utente; <strong>iss</strong> (Issuer) — chi ha creato e firmato il token; <strong>aud</strong> (Audience) — destinatario previsto del token; <strong>nbf</strong> (Not Before) — il token non è valido prima di questo momento; <strong>jti</strong> (JWT ID) — identificatore univoco del token.',
        ],
        [
            'question' => 'Questo strumento è gratuito e sicuro?',
            'answer' => 'Sì, questo decodificatore JWT è completamente gratuito e non richiede registrazione. Tutta la decodifica avviene interamente nel tuo browser usando JavaScript — i tuoi token non vengono mai inviati a nessun server. Questo lo rende sicuro per decodificare token contenenti informazioni sensibili durante lo sviluppo. Tuttavia, dovresti comunque evitare di condividere pubblicamente i token di produzione, poiché potrebbero contenere informazioni sensibili sugli utenti.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'invalid_format' => 'Formato JWT non valido. Il token deve avere 3 parti separate da punti.',
        'decode_failed' => 'Decodifica JWT fallita. Contenuto base64 o JSON non valido.',
        'clipboard_error' => 'Impossibile accedere agli appunti. Incolla manualmente.',
        'header_copied' => 'Header copiato negli appunti!',
        'payload_copied' => 'Payload copiato negli appunti!',
        'copy_failed' => 'Copia non riuscita',
        'expired' => 'Scaduto',
        'expired_ago' => 'scaduto {n} {unit} fa',
        'expires_in' => 'scade tra {n} {unit}',
        'day' => 'giorno',
        'days' => 'giorni',
        'hour' => 'ora',
        'hours' => 'ore',
        'minute' => 'minuto',
        'minutes' => 'minuti',
        'placeholder' => 'Incolla un token JWT sopra per decodificarlo',
        'signature_note' => 'La verifica della firma richiede la chiave segreta. Questo strumento decodifica soltanto i token.',
        'invalid_jwt' => 'JWT Non Valido',
    ],
];
