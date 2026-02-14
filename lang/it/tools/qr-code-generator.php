<?php

return [
    // SEO
    'title' => 'Generatore di Codici QR - Crea Codici QR Gratis Online | hafiz.dev',
    'description' => 'Generatore di codici QR gratuito per URL, WiFi, contatti, email e altro. Personalizza colori e dimensioni, scarica in PNG o SVG. 100% gratuito, senza registrazione, funziona offline.',
    'keywords' => 'generatore codice qr, generatore qr code gratis, generatore qr wifi, creare codice qr, generatore qr code online, qr code vcard, creare qr gratis',

    // Page content
    'h1' => 'Generatore di Codici QR',
    'subtitle' => 'Crea codici QR per URL, WiFi, contatti, email e altro. Personalizza colori e dimensioni, scarica in PNG o SVG.',

    // UI Labels — Type selector
    'qr_code_type' => 'Tipo di Codice QR',
    'type_text_url' => 'Testo/URL',
    'type_wifi' => 'WiFi',
    'type_contact' => 'Contatto',
    'type_email' => 'Email',
    'type_sms' => 'SMS',
    'type_phone' => 'Telefono',

    // Text/URL form
    'enter_text_or_url' => 'Inserisci testo o URL',
    'text_placeholder' => 'https://esempio.com o qualsiasi testo...',
    'char_count' => 'Conteggio caratteri',

    // WiFi form
    'wifi_ssid' => 'Nome Rete (SSID)',
    'wifi_ssid_placeholder' => 'La Mia Rete WiFi',
    'wifi_password' => 'Password',
    'wifi_password_placeholder' => 'Password della rete',
    'wifi_encryption' => 'Crittografia',
    'wifi_encryption_none' => 'Nessuna',
    'wifi_hidden' => 'Rete Nascosta',

    // vCard form
    'vcard_firstname' => 'Nome',
    'vcard_firstname_placeholder' => 'Mario',
    'vcard_lastname' => 'Cognome',
    'vcard_lastname_placeholder' => 'Rossi',
    'vcard_mobile' => 'Cellulare',
    'vcard_email' => 'Email',
    'vcard_company' => 'Azienda',
    'vcard_company_placeholder' => 'Azienda Srl',
    'vcard_title' => 'Titolo Professionale',
    'vcard_title_placeholder' => 'Sviluppatore Software',
    'vcard_website' => 'Sito Web',

    // Email form
    'email_to' => 'Destinatario',
    'email_subject' => 'Oggetto',
    'email_subject_placeholder' => 'Ciao',
    'email_body' => 'Messaggio',
    'email_body_placeholder' => 'Il tuo messaggio qui...',

    // SMS form
    'sms_phone' => 'Numero di Telefono',
    'sms_message' => 'Messaggio',
    'sms_message_placeholder' => 'Il tuo messaggio...',

    // Phone form
    'phone_number' => 'Numero di Telefono',

    // QR Preview & Customization
    'qr_preview' => 'Anteprima Codice QR',
    'fill_details' => 'Compila i dettagli per generare il codice QR',
    'size' => 'Dimensione',
    'foreground' => 'Primo Piano',
    'background' => 'Sfondo',

    // Action buttons
    'download_png' => 'Scarica PNG',
    'download_svg' => 'Scarica SVG',
    'copy' => 'Copia',

    // Features
    'features' => [
        [
            'title' => 'Tipologie Multiple',
            'desc' => 'Genera codici QR per URL, reti WiFi, biglietti da visita, email, SMS e numeri di telefono.',
        ],
        [
            'title' => 'Personalizzazione Completa',
            'desc' => 'Personalizza colori, dimensioni e livello di correzione errori. Scarica in PNG per la condivisione o SVG per la stampa.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutto viene elaborato nel tuo browser. I tuoi dati non toccano mai i nostri server.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come si crea un codice QR?',
            'answer' => 'Seleziona semplicemente il tipo di codice QR che vuoi creare (URL, WiFi, Contatto, ecc.), compila le informazioni richieste e il codice QR verrà generato istantaneamente. Puoi poi personalizzare i colori e la dimensione prima di scaricarlo.',
        ],
        [
            'question' => 'Quali tipi di codici QR posso creare?',
            'answer' => 'Il nostro generatore supporta diversi tipi di codici QR: Testo/URL per siti web e testo semplice, WiFi per condividere le credenziali di rete, vCard per le informazioni di contatto, Email per email precompilate, SMS per messaggi di testo e Telefono per chiamate dirette.',
        ],
        [
            'question' => 'Posso personalizzare i colori del codice QR?',
            'answer' => 'Sì! Puoi modificare sia il colore di primo piano (punti) che il colore dello sfondo usando i selettori di colore. Assicurati solo che ci sia abbastanza contrasto tra i colori affinché il codice QR rimanga leggibile.',
        ],
        [
            'question' => 'Qual è la differenza tra il download PNG e SVG?',
            'answer' => 'PNG è un formato immagine raster, ideale per la condivisione online o la stampa a dimensione fissa. SVG è un formato vettoriale che può essere scalato a qualsiasi dimensione senza perdere qualità, rendendolo perfetto per stampe di grandi dimensioni o lavori di design professionale.',
        ],
        [
            'question' => 'I miei dati sono al sicuro?',
            'answer' => 'Assolutamente. Tutti i codici QR vengono generati direttamente nel tuo browser usando JavaScript. I tuoi dati non lasciano mai il tuo dispositivo — non memorizziamo, trasmettiamo o abbiamo accesso a nessuna informazione che inserisci.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'char_count' => 'Conteggio caratteri',
        'fill_details' => 'Compila i dettagli per generare il codice QR',
        'downloaded_png' => 'Codice QR scaricato come PNG!',
        'downloaded_svg' => 'Codice QR scaricato come SVG!',
        'copied_clipboard' => 'Codice QR copiato negli appunti!',
        'copy_failed' => 'Copia negli appunti non riuscita',
    ],
];
