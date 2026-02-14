<?php

return [
    // SEO
    'title' => 'Convertitore Hex in RGB - Converti Colori Hex in RGB Online Gratis | hafiz.dev',
    'description' => 'Convertitore online gratuito da Hex a RGB. Converti codici colore esadecimali in valori RGB, HSL e CMYK istantaneamente. Anteprima colore dal vivo, selettore colori e generazione codice CSS. 100% lato client.',
    'keywords' => 'hex in rgb, convertitore hex rgb, convertire hex in rgb, colore hex in rgb, hex in rgba, convertitore colori, hex in hsl, convertitore colori online',

    // Page content
    'h1' => 'Convertitore Hex in RGB',
    'subtitle' => 'Converti codici colore esadecimali in valori RGB, HSL e CMYK istantaneamente. Anteprima colore dal vivo, slider regolabili e codice CSS pronto all\'uso.',

    // Hex Input
    'hex_color_code' => 'Codice Colore Hex',
    'pick_color' => 'Scegli un colore',

    // Color Preview
    'color_preview' => 'Anteprima Colore',

    // Sliders
    'red' => 'Rosso',
    'green' => 'Verde',
    'blue' => 'Blu',
    'alpha' => 'Alfa',

    // Output labels
    'css_variable' => 'Variabile CSS',
    'copy' => 'Copia',

    // Presets
    'quick_presets' => 'Preset Rapidi',

    // Features
    'features' => [
        [
            'title' => 'Anteprima dal Vivo',
            'desc' => 'Visualizza il colore aggiornarsi in tempo reale mentre digiti codici hex o regoli gli slider RGB. Include un selettore colori nativo per la selezione visiva.',
        ],
        [
            'title' => 'Formati Multipli',
            'desc' => 'Converti tra formati colore HEX, RGB, RGBA, HSL, HSLA e CMYK. Copia con un clic qualsiasi formato ti serva.',
        ],
        [
            'title' => 'Pronto per CSS',
            'desc' => 'Ottieni codice CSS pronto all\'uso con un clic. Copia hex, rgb(), hsl() o dichiarazioni di proprietà personalizzate CSS direttamente nei tuoi fogli di stile.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come converto hex in RGB?',
            'answer' => 'Inserisci il tuo codice colore esadecimale (es. #FF5733) nel campo di input e lo strumento lo converte istantaneamente in valori RGB (es. rgb(255, 87, 51)). Puoi anche usare il selettore colori o regolare direttamente gli slider RGB. Tutti i formati di output si aggiornano in tempo reale.',
        ],
        [
            'question' => 'Qual è la differenza tra colori hex e RGB?',
            'answer' => 'I colori hex usano un formato esadecimale a 6 cifre (#RRGGBB) dove ogni coppia rappresenta i valori Rosso, Verde e Blu da 00 a FF (0-255 in decimale). RGB usa valori decimali da 0 a 255 per ogni canale. Entrambi rappresentano gli stessi colori — hex è comunemente usato in CSS e strumenti di design, mentre RGB è usato nella programmazione e nella manipolazione dei colori.',
        ],
        [
            'question' => 'Posso convertire RGB in hex?',
            'answer' => 'Sì! Questo strumento funziona in entrambe le direzioni. Usa gli slider Rosso, Verde e Blu o digita i valori direttamente nei campi numerici per impostare il colore RGB. Il codice hex e tutti gli altri formati si aggiornano automaticamente.',
        ],
        [
            'question' => 'Qual è il codice hex per bianco e nero?',
            'answer' => 'Il bianco è #FFFFFF in hex oppure rgb(255, 255, 255). Il nero è #000000 in hex oppure rgb(0, 0, 0). Puoi cliccare i pulsanti preset Nero e Bianco sopra per caricare questi valori.',
        ],
        [
            'question' => 'Il convertitore supporta la trasparenza alfa?',
            'answer' => 'Sì! Regola lo slider Alfa per controllare l\'opacità da 0 (completamente trasparente) a 1 (completamente opaco). I valori di output RGBA e HSLA rifletteranno la tua impostazione di trasparenza. Quando l\'alfa è inferiore a 1, l\'output hex mostra anche il formato a 8 cifre (#RRGGBBAA).',
        ],
    ],

    // JS strings
    'js_strings' => [
        'copied' => 'Copiato!',
        'copy' => 'Copia',
        'invalid_hex' => 'Codice colore hex non valido',
    ],
];
