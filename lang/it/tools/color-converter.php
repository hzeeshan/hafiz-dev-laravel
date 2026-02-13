<?php

return [
    // SEO
    'title' => 'Convertitore di Colori - HEX a RGB, HSL Online | hafiz.dev',
    'description' => 'Convertitore di colori online gratuito. Converti tra formati HEX, RGB, RGBA, HSL, HSLA istantaneamente. Include selettore colori, verifica contrasto e conformità WCAG.',
    'keywords' => 'convertitore colori, hex a rgb, rgb a hex, convertitore hsl, selettore colori online, codice colore hex, convertitore rgba, convertitore formato colore',

    // Page content
    'h1' => 'Convertitore di Colori',
    'subtitle' => 'Converti colori tra formati HEX, RGB, HSL istantaneamente. Selettore colori gratuito con verifica contrasto WCAG.',

    // UI Labels
    'color_preview' => 'Anteprima Colore',
    'color_picker' => 'Selettore Colore',
    'random' => 'Casuale',
    'complementary_color' => 'Colore Complementare',
    'opposite_on_wheel' => 'Opposto sulla ruota dei colori',
    'color_formats' => 'Formati Colore',
    'contrast_checker' => 'Verifica Contrasto (WCAG)',
    'white_text' => 'Testo Bianco',
    'black_text' => 'Testo Nero',
    'sample_text' => 'Testo di Esempio',
    'color_history' => 'Cronologia Colori',
    'clear' => 'Cancella',
    'no_history' => 'Nessun colore ancora. Inizia a scegliere i colori!',

    // Copy
    'copy_hex' => 'Copia HEX',
    'copy_rgb' => 'Copia RGB',
    'copy_rgba' => 'Copia RGBA',
    'copy_hsl' => 'Copia HSL',
    'copy_hsla' => 'Copia HSLA',

    // Features
    'features' => [
        [
            'title' => 'Formati Multipli',
            'desc' => 'Converti tra formati HEX, RGB, RGBA, HSL e HSLA istantaneamente.',
        ],
        [
            'title' => 'Contrasto WCAG',
            'desc' => 'Verifica l\'accessibilità dei colori con indicatori di conformità WCAG AA e AAA.',
        ],
        [
            'title' => '100% Lato Client',
            'desc' => 'Tutta l\'elaborazione avviene nel tuo browser. Nessun dato inviato ai server.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto HEX in RGB?',
            'answer' => 'Per convertire HEX in RGB, ogni coppia di cifre esadecimali rappresenta un canale colore (Rosso, Verde, Blu). Ad esempio, #FF5733 si converte in RGB(255, 87, 51) dove FF=255 (rosso), 57=87 (verde) e 33=51 (blu). Il nostro strumento esegue questa conversione automaticamente — basta inserire un codice HEX per vedere i valori RGB istantaneamente.',
        ],
        [
            'question' => 'Qual è la differenza tra RGB e RGBA?',
            'answer' => 'RGB definisce i colori usando i canali Rosso, Verde e Blu (0-255 ciascuno). RGBA aggiunge un canale Alpha (0-1) per la trasparenza, dove 0 è completamente trasparente e 1 è completamente opaco. Ad esempio, rgba(255, 87, 51, 0.5) è lo stesso colore di rgb(255, 87, 51) ma al 50% di opacità.',
        ],
        [
            'question' => 'Cos\'è il formato colore HSL?',
            'answer' => 'HSL sta per Tonalità (Hue), Saturazione (Saturation) e Luminosità (Lightness). La Tonalità è l\'angolo del colore (0-360°), la Saturazione è l\'intensità del colore (0-100%) e la Luminosità indica quanto è chiaro o scuro il colore (0-100%). HSL è spesso più intuitivo per i designer perché regolare luminosità o saturazione è semplice.',
        ],
        [
            'question' => 'Come trovo il colore complementare?',
            'answer' => 'Un colore complementare è direttamente opposto sulla ruota dei colori. In termini HSL, è lo stesso colore con la tonalità ruotata di 180°. Ad esempio, il blu (tonalità 240°) ha un complementare arancione (tonalità 60°). Il nostro strumento calcola e mostra automaticamente il colore complementare per qualsiasi colore selezionato.',
        ],
        [
            'question' => 'Cos\'è il contrasto colore WCAG?',
            'answer' => 'Le WCAG (Linee Guida per l\'Accessibilità dei Contenuti Web) definiscono rapporti di contrasto minimi per un testo leggibile. Il livello AA richiede 4.5:1 per il testo normale e 3:1 per il testo grande. Il livello AAA richiede 7:1 per il testo normale e 4.5:1 per il testo grande. Il nostro strumento calcola i rapporti di contrasto rispetto al testo nero e bianco per garantire che i tuoi colori siano accessibili.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'no_history' => 'Nessun colore ancora. Inizia a scegliere i colori!',
        'copied' => 'Copiato',
        'copy_fail' => 'Copia non riuscita',
        'pass' => 'Superato',
        'fail' => 'Non superato',
        'sample_text' => 'Testo di Esempio',
        'opposite_on_wheel' => 'Opposto sulla ruota dei colori',
    ],
];
