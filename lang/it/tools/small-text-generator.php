<?php

return [
    // SEO
    'title' => 'Generatore di Testo Piccolo - Convertitore Testo Minuscolo Online Gratis | hafiz.dev',
    'description' => 'Generatore di testo piccolo online gratuito. Converti il tuo testo in apice, pedice e maiuscoletto istantaneamente per social media, Discord e altro. Copia e incolla il testo minuscolo ovunque.',
    'keywords' => 'generatore testo piccolo, testo minuscolo, testo apice, testo pedice, maiuscoletto, testo piccolo discord, testo piccolo social media, generatore testo minuscolo',

    // Page content
    'h1' => 'Generatore di Testo Piccolo',
    'subtitle' => 'Converti il tuo testo in lettere minuscole istantaneamente. Scegli tra stili ˢᵘᵖᵉʳˢᶜʳⁱᵖᵗ, ₛᵤᵦₛ꜀ᵣᵢₚₜ o ꜱᴍᴀʟʟ ᴄᴀᴘꜱ per social media, Discord e altro.',

    // UI Labels
    'text_style' => 'Stile Testo',
    'superscript' => 'Apice ˢᵘᵖᵉʳ',
    'subscript' => 'Pedice ₛᵤᵦ',
    'small_caps' => 'Maiuscoletto ꜱᴍᴀʟʟ',
    'your_text' => 'Il Tuo Testo',
    'input_placeholder' => 'Digita o incolla il tuo testo qui...',
    'small_text' => 'Testo Piccolo',
    'output_placeholder' => 'Il testo piccolo apparirà qui...',
    'copy' => 'Copia',
    'sample' => 'Esempio',
    'clear' => 'Cancella',
    'characters' => 'Caratteri',
    'converted' => 'Convertiti',
    'unchanged' => 'Invariati',

    // Preview
    'all_styles_preview' => 'Anteprima Tutti gli Stili',
    'original' => 'Originale',

    // Features
    'features' => [
        [
            'title' => '3 Stili',
            'desc' => 'Scegli tra apice ˢᵘᵖᵉʳ, pedice ₛᵤᵦ o maiuscoletto ꜱᴍᴀʟʟ. Tutti gli stili usano caratteri Unicode standard che funzionano ovunque.',
        ],
        [
            'title' => 'Copia e Incolla',
            'desc' => 'Copia negli appunti con un clic. Usa il testo minuscolo su Twitter, Discord, Instagram, TikTok, Reddit o dovunque sia supportato Unicode.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutto viene elaborato nel tuo browser. Nessun dato viene inviato a nessun server. Il tuo testo resta completamente privato e sicuro.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come funziona il generatore di testo piccolo?',
            'answer' => 'Lo strumento mappa ogni lettera al suo equivalente Unicode piccolo. Per l\'apice, <code class="bg-darkCard px-1 rounded">a</code> diventa <code class="bg-darkCard px-1 rounded">ᵃ</code>. Per il pedice, <code class="bg-darkCard px-1 rounded">a</code> diventa <code class="bg-darkCard px-1 rounded">ₐ</code>. Per il maiuscoletto, <code class="bg-darkCard px-1 rounded">a</code> diventa <code class="bg-darkCard px-1 rounded">ᴀ</code>. Sono caratteri Unicode standard, non immagini o formattazione.',
        ],
        [
            'question' => 'Posso usare il testo piccolo su Discord e i social media?',
            'answer' => 'Sì! Il testo piccolo funziona sulla maggior parte delle piattaforme tra cui Discord, Twitter/X, Facebook, bio di Instagram, TikTok, Reddit e altro. L\'apice ha la compatibilità più ampia, mentre il pedice ha meno caratteri disponibili in Unicode. Il maiuscoletto funziona bene sulla maggior parte delle piattaforme.',
        ],
        [
            'question' => 'Perché alcuni caratteri non vengono convertiti?',
            'answer' => 'Non tutte le lettere hanno equivalenti Unicode in apice o pedice. L\'apice copre la maggior parte delle lettere e tutte le cifre (0-9). Il pedice ha meno caratteri disponibili nello standard Unicode — lettere come b, c, d, f, g, w, y, z non hanno forme in pedice. Il maiuscoletto copre tutte le 26 lettere. I caratteri senza equivalenti vengono mantenuti invariati.',
        ],
        [
            'question' => 'Il testo piccolo è accessibile?',
            'answer' => 'I caratteri Unicode piccoli sono riconosciuti dalla maggior parte dei dispositivi moderni e sistemi operativi. Tuttavia, alcuni screen reader potrebbero non leggerli correttamente. Per contenuti importanti che devono essere accessibili a tutti, è meglio usare il testo normale.',
        ],
        [
            'question' => 'Qual è la differenza tra apice, pedice e maiuscoletto?',
            'answer' => 'L\'apice appare rialzato e più piccolo (ˢᵘᵖᵉʳˢᶜʳⁱᵖᵗ), il pedice appare abbassato e più piccolo (ₛᵤᵦₛ꜀ᵣᵢₚₜ), e il maiuscoletto sono lettere dall\'aspetto maiuscolo all\'altezza delle minuscole (ꜱᴍᴀʟʟ ᴄᴀᴘꜱ). Tutti e tre sono caratteri Unicode, non immagini.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'copied' => 'Copiato!',
        'copied_to_clipboard' => 'Copiato negli appunti!',
        'sample_text' => 'Ciao Mondo! Il testo piccolo è fantastico.',
        'default_preview' => 'Ciao Mondo',
    ],
];
