<?php

return [
    // SEO
    'title' => 'Contatore Caratteri Twitter - Conta Caratteri Tweet Gratis | hafiz.dev',
    'description' => 'Contatore di caratteri gratuito per Twitter/X. Controlla la lunghezza dei tweet in tempo reale con monitoraggio del limite caratteri. Scopri come URL, menzioni e hashtag influenzano il conteggio. Supporta thread e suggerimenti.',
    'keywords' => 'contatore caratteri twitter, conta caratteri tweet, limite caratteri twitter, lunghezza tweet, contatore caratteri x, contatore tweet, verifica lunghezza tweet',

    // Page content
    'h1' => 'Contatore Caratteri Twitter',
    'subtitle' => 'Conta i caratteri per i post su Twitter/X in tempo reale. Monitora URL, menzioni, hashtag ed emoji con le regole di conteggio precise di Twitter.',

    // Mode buttons
    'mode_tweet' => 'Tweet (280)',
    'mode_premium' => 'X Premium (25.000)',
    'mode_dm' => 'DM (10.000)',
    'mode_bio' => 'Bio (160)',

    // Progress
    'characters' => 'caratteri',
    'characters_remaining' => 'caratteri rimanenti',

    // Input
    'placeholder' => 'Scrivi o incolla il tuo tweet qui...',

    // Stats
    'stat_characters' => 'Caratteri',
    'stat_twitter_count' => 'Conteggio Twitter',
    'stat_words' => 'Parole',
    'stat_urls' => 'URL (23 cad.)',
    'stat_mentions' => '@Menzioni',
    'stat_hashtags' => '#Hashtag',

    // Buttons
    'copy_text' => 'Copia Testo',
    'clear' => 'Cancella',
    'post_on_x' => 'Pubblica su X',

    // Tips
    'tips_title' => 'Regole Caratteri Twitter/X',
    'tip_urls' => 'Gli URL contano sempre come <strong class="text-light">23 caratteri</strong> (abbreviazione t.co)',
    'tip_emojis' => 'La maggior parte delle emoji conta come <strong class="text-light">2 caratteri</strong>',
    'tip_cjk' => 'I caratteri CJK (中文, 日本語) contano come <strong class="text-light">2 caratteri</strong>',
    'tip_mentions' => 'Le @menzioni nelle risposte <strong class="text-light">non contano</strong>',

    // Features
    'features' => [
        [
            'title' => 'Conteggio in Tempo Reale',
            'desc' => 'I caratteri vengono contati istantaneamente mentre scrivi. Visualizza i progressi con una barra di avanzamento e avvisi colorati quando ti avvicini al limite.',
        ],
        [
            'title' => 'Rilevamento URL Intelligente',
            'desc' => 'Rileva automaticamente gli URL e li conta come 23 caratteri ciascuno, replicando esattamente il comportamento di abbreviazione link t.co di Twitter.',
        ],
        [
            'title' => 'Modalità Multiple',
            'desc' => 'Passa tra Tweet (280), X Premium (25.000), DM (10.000) e Bio (160) caratteri limite per qualsiasi tipo di contenuto Twitter.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Qual è il limite di caratteri di Twitter/X?',
            'answer' => 'I post standard di Twitter/X hanno un limite di 280 caratteri. Gli abbonati X Premium possono pubblicare fino a 25.000 caratteri. I messaggi diretti consentono fino a 10.000 caratteri. Le descrizioni del profilo/bio sono limitate a 160 caratteri.',
        ],
        [
            'question' => 'Come vengono contati gli URL su Twitter?',
            'answer' => 'Tutti gli URL su Twitter/X vengono automaticamente abbreviati usando t.co e contano esattamente come 23 caratteri, indipendentemente dalla lunghezza dell\'URL originale. Un URL di 200 caratteri conta comunque solo 23 caratteri. Questo strumento applica la stessa regola automaticamente.',
        ],
        [
            'question' => 'Le emoji contano più di un carattere?',
            'answer' => 'Sì, la maggior parte delle emoji conta come 2 caratteri su Twitter/X a causa della codifica Unicode. Alcune emoji complesse come bandiere, varianti di tonalità della pelle o emoji famiglia possono contare anche di più. Questo strumento mostra il conteggio esatto dei caratteri Twitter.',
        ],
        [
            'question' => 'Le menzioni e gli hashtag contano per il limite?',
            'answer' => 'Sì, sia le @menzioni che gli #hashtag contano per il limite di 280 caratteri, inclusi i simboli @ e # stessi. L\'unica eccezione sono le @menzioni nelle risposte — quando rispondi a qualcuno, la @menzione iniziale NON conta per il tuo limite.',
        ],
        [
            'question' => 'Qual è il limite di caratteri per i DM di Twitter?',
            'answer' => 'I messaggi diretti di Twitter/X hanno un limite di 10.000 caratteri. Puoi passare alla modalità DM in questo strumento per verificare la lunghezza del messaggio rispetto al limite DM invece del limite standard dei tweet.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'characters' => 'caratteri',
        'characters_remaining' => 'caratteri rimanenti',
        'placeholder' => 'Scrivi o incolla il tuo tweet qui...',
        'copied' => 'Copiato!',
        'copy_text' => 'Copia Testo',
    ],
];
