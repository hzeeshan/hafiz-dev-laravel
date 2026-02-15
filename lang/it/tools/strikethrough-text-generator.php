<?php

return [
    // SEO
    'title' => 'Generatore Testo Barrato - Barra il Testo Online Gratis | hafiz.dev',
    'description' => 'Generatore di testo barrato online gratuito. Crea testo sbarrato istantaneamente per social media, Discord e altro. Copia e incolla il testo barrato ovunque.',
    'keywords' => 'generatore testo barrato, testo barrato, testo sbarrato, testo cancellato, barrato copia incolla, strikethrough text, testo barrato online',

    // Page content
    'h1' => 'Generatore Testo Barrato',
    'subtitle' => 'Crea testo barrato istantaneamente. Perfetto per mostrare correzioni, modifiche o aggiungere enfasi sui social media, Discord e altro.',

    // UI Labels
    'strikethrough_style' => 'Stile Barrato',
    'single_strike' => 'S̶i̶n̶g̶o̶l̶o̶',
    'double_strike' => 'D̳o̳p̳p̳i̳o̳',
    'tilde_strike' => 'T̴i̴l̴d̴e̴',
    'slash_strike' => 'S̸l̸a̸s̸h̸',
    'your_text' => 'Il Tuo Testo',
    'input_placeholder' => 'Digita o incolla il tuo testo qui...',
    'strikethrough_text' => 'Testo Barrato',
    'output_placeholder' => 'Il testo barrato apparirà qui...',
    'copy' => 'Copia',
    'sample' => 'Esempio',
    'characters' => 'Caratteri',
    'style' => 'Stile',
    'all_styles_preview' => 'Anteprima Tutti gli Stili',
    'single' => 'Singolo',
    'double' => 'Doppio',
    'tilde' => 'Tilde',
    'slash' => 'Slash',

    // Features
    'features' => [
        [
            'title' => '4 Stili',
            'desc' => 'Scegli tra barrato singolo, doppio, tilde o slash. Ogni stile utilizza diversi caratteri combinanti Unicode per un aspetto unico.',
        ],
        [
            'title' => 'Copia e Incolla',
            'desc' => 'Copia negli appunti con un clic. Funziona su Twitter, Discord, Instagram, TikTok, Reddit, commenti YouTube e qualsiasi piattaforma che supporta Unicode.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutto viene eseguito nel tuo browser. Nessun dato viene inviato a nessun server. Il tuo testo resta completamente privato e sicuro.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come funziona il generatore di testo barrato?',
            'answer' => 'Lo strumento aggiunge un carattere combinante Unicode dopo ogni carattere del tuo testo. Per il barrato singolo, utilizza U+0336 (combining long stroke overlay). Questo fa apparire il testo sbarrato su qualsiasi piattaforma che supporta il rendering Unicode.',
        ],
        [
            'question' => 'Posso usare il testo barrato su Instagram?',
            'answer' => 'Sì! Il testo barrato funziona nelle bio, didascalie, commenti e storie di Instagram. Copia il testo generato e incollalo direttamente su Instagram. Funziona anche su Twitter/X, Facebook, Discord, TikTok, Reddit e la maggior parte delle altre piattaforme.',
        ],
        [
            'question' => 'Qual è la differenza tra barrato singolo e doppio?',
            'answer' => 'Il barrato singolo traccia una linea attraverso il centro del testo (usando U+0336), mentre il barrato doppio traccia una linea sotto usando U+0333. Lo stile tilde usa U+0334 per una sovrapposizione ondulata, e lo slash usa U+0338 per una linea diagonale. Ognuno crea un effetto visivo diverso.',
        ],
        [
            'question' => 'Perché il testo barrato appare diverso su alcune piattaforme?',
            'answer' => 'L\'aspetto del testo barrato dipende da come ogni piattaforma renderizza i caratteri combinanti Unicode. La maggior parte delle piattaforme moderne lo renderizza bene, ma alcune possono mostrare leggere differenze visive. Il barrato singolo (U+0336) ha la compatibilità più ampia tra le piattaforme.',
        ],
        [
            'question' => 'I miei dati sono al sicuro?',
            'answer' => 'Sì! Tutto viene eseguito interamente nel tuo browser utilizzando JavaScript. Nessun dato viene inviato a nessun server. Il tuo testo non lascia mai il tuo dispositivo.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'sample_text' => 'Questo testo è stato barrato.',
        'copied' => 'Copiato negli appunti!',
        'default_preview' => 'Ciao Mondo',
        'style_single' => 'Singolo',
        'style_double' => 'Doppio',
        'style_tilde' => 'Tilde',
        'style_slash' => 'Slash',
    ],
];
