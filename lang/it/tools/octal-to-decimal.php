<?php

return [
    // SEO
    'title' => 'Convertitore Ottale in Decimale - Converti Ottale in Decimale Online | hafiz.dev',
    'description' => 'Convertitore online gratuito da ottale a decimale. Converti numeri ottali (base 8) in decimali (base 10) istantaneamente con calcolo passo-passo. Nessuna registrazione richiesta.',
    'keywords' => 'ottale in decimale, convertire ottale in decimale, convertitore ottale decimale, come convertire ottale in decimale, base 8 in base 10, sistema numerico ottale',

    // Page content
    'h1' => 'Convertitore Ottale in Decimale',
    'subtitle' => 'Converti numeri ottali (base 8) in decimali (base 10) istantaneamente con scomposizione del calcolo passo-passo. Supporta conversione in blocco e direzione inversa.',

    // UI Labels
    'octal_input' => 'Input Ottale',
    'decimal_output' => 'Output Decimale',
    'octal_placeholder' => 'Inserisci numeri ottali (es. 175, 777, 0o52)...',
    'decimal_placeholder' => 'Il risultato decimale apparirà qui...',

    // Buttons
    'swap_direction' => 'Inverti Direzione',
    'copy' => 'Copia',
    'sample' => 'Esempio',
    'clear' => 'Cancella',

    // Direction labels
    'octal_to_decimal' => 'Ottale → Decimale',
    'decimal_to_octal' => 'Decimale → Ottale',
    'decimal_input' => 'Input Decimale',
    'octal_output' => 'Output Ottale',

    // Breakdown
    'step_by_step_calculation' => 'Calcolo Passo-Passo',

    // Reference table
    'common_values' => 'Valori Comuni Ottale-Decimale',

    // Features
    'features' => [
        [
            'title' => 'Bidirezionale',
            'desc' => 'Converti da ottale a decimale e da decimale a ottale. Clicca il pulsante Inverti per cambiare direzione istantaneamente.',
        ],
        [
            'title' => 'Passo-Passo',
            'desc' => 'Visualizza il calcolo completo in notazione posizionale che mostra come ogni cifra ottale contribuisce al risultato decimale.',
        ],
        [
            'title' => 'Conversione in Blocco',
            'desc' => 'Converti più valori ottali contemporaneamente. Inserisci valori separati da spazi o virgole per una conversione rapida in massa.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come si converte da ottale a decimale?',
            'answer' => 'Moltiplica ogni cifra ottale per 8 elevato alla potenza della sua posizione (partendo da 0 a destra), poi somma tutti i valori. Ad esempio, ottale 175 = (1×8²) + (7×8¹) + (5×8⁰) = 64 + 56 + 5 = 125 in decimale.',
        ],
        [
            'question' => 'Cos\'è il sistema numerico ottale?',
            'answer' => 'Il sistema numerico ottale è in base 8 e usa le cifre da 0 a 7. Era storicamente popolare in informatica perché ogni cifra ottale rappresenta esattamente 3 bit binari. È ancora usato oggi nei permessi file Unix/Linux (chmod 755), in alcuni linguaggi di programmazione (prefisso 0o in Python) e nei sistemi legacy.',
        ],
        [
            'question' => 'Quanto vale ottale 777 in decimale?',
            'answer' => 'Ottale 777 in decimale è 511. Il calcolo: (7×64) + (7×8) + (7×1) = 448 + 56 + 7 = 511. In Unix, chmod 777 concede permessi completi di lettura, scrittura ed esecuzione al proprietario, al gruppo e agli altri.',
        ],
        [
            'question' => 'Qual è la differenza tra ottale e decimale?',
            'answer' => 'Il decimale è in base 10 (cifre 0-9), il sistema numerico standard usato nella vita quotidiana. L\'ottale è in base 8 (cifre 0-7), usato principalmente in informatica. Ogni valore posizionale nel decimale è una potenza di 10, mentre nell\'ottale è una potenza di 8. Ad esempio, 10 in decimale è dieci, ma 10 in ottale equivale a otto.',
        ],
        [
            'question' => 'Posso convertire il decimale in ottale?',
            'answer' => 'Sì! Clicca il pulsante "Inverti Direzione" per passare alla modalità Decimale → Ottale. Per convertire manualmente, dividi ripetutamente il numero decimale per 8, registrando ogni resto. Leggi i resti dal basso verso l\'alto. Ad esempio, 125 ÷ 8 = 15 r5, 15 ÷ 8 = 1 r7, 1 ÷ 8 = 0 r1, quindi 125 = ottale 175.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'octal_to_decimal' => 'Ottale → Decimale',
        'decimal_to_octal' => 'Decimale → Ottale',
        'octal_input' => 'Input Ottale',
        'decimal_output' => 'Output Decimale',
        'decimal_input' => 'Input Decimale',
        'octal_output' => 'Output Ottale',
        'octal_placeholder' => 'Inserisci numeri ottali (es. 175, 777, 0o52)...',
        'decimal_placeholder' => 'Il risultato decimale apparirà qui...',
        'decimal_input_placeholder' => 'Inserisci numeri decimali (es. 125, 511, 255)...',
        'octal_result_placeholder' => 'Il risultato ottale apparirà qui...',
        'nothing_to_copy' => 'Niente da copiare',
        'copied' => 'Copiato!',
        'converted_oct_to_dec' => '{count} valore/i ottale/i convertito/i in decimale',
        'converted_dec_to_oct' => '{count} valore/i decimale/i convertito/i in ottale',
        'invalid_octal' => 'Valore ottale non valido: "{value}" (le cifre devono essere 0-7)',
        'invalid_decimal' => 'Valore decimale non valido: "{value}" (deve essere un intero non negativo)',
    ],
];
