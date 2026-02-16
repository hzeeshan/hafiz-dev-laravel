<?php

return [
    // SEO
    'title' => 'Convertitore Binario in Ottale - Converti Binario in Ottale Online | hafiz.dev',
    'description' => 'Convertitore online gratuito da binario a ottale. Converti numeri binari (base 2) in ottale (base 8) istantaneamente con raggruppamento a 3 bit passo-passo. Nessuna registrazione richiesta.',
    'keywords' => 'binario in ottale, convertire binario in ottale, convertitore binario ottale, da binario a ottale, conversione binario ottale, base 2 in base 8',

    // Page content
    'h1' => 'Convertitore Binario in Ottale',
    'subtitle' => 'Converti numeri binari (base 2) in ottale (base 8) istantaneamente con raggruppamento a 3 bit passo-passo. Supporta conversione in blocco e direzione inversa.',

    // UI Labels
    'binary_input' => 'Input Binario',
    'octal_output' => 'Output Ottale',
    'binary_placeholder' => 'Inserisci numeri binari (es. 11111101, 111111111, 0b1010)...',
    'octal_placeholder' => 'Il risultato ottale apparirà qui...',

    // Buttons
    'swap_direction' => 'Inverti Direzione',
    'copy' => 'Copia',
    'sample' => 'Esempio',
    'clear' => 'Cancella',

    // Direction labels
    'bin_to_oct' => 'Binario → Ottale',
    'oct_to_bin' => 'Ottale → Binario',
    'octal_input' => 'Input Ottale',
    'binary_output' => 'Output Binario',

    // Breakdown
    'step_by_step' => 'Raggruppamento a 3 Bit Passo-Passo',
    'group' => 'Gruppo',
    'three_bit_binary' => 'Binario a 3 Bit',
    'octal_digit' => 'Cifra Ottale',

    // Reference table
    'reference_table' => 'Riferimento Binario 3-Bit a Ottale',

    // Features
    'features' => [
        [
            'title' => 'Bidirezionale',
            'desc' => 'Converti da binario a ottale e da ottale a binario. Clicca il pulsante Inverti per cambiare direzione istantaneamente.',
        ],
        [
            'title' => 'Raggruppamento a 3 Bit',
            'desc' => 'Visualizza la scomposizione delle cifre binarie raggruppate in gruppi di 3 bit, ciascuno mappato direttamente a una cifra ottale.',
        ],
        [
            'title' => 'Conversione in Blocco',
            'desc' => 'Converti più valori binari contemporaneamente. Inserisci valori separati da spazi o virgole per una conversione rapida in massa.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come si converte da binario a ottale?',
            'answer' => 'Raggruppa le cifre binarie in gruppi di 3 da destra a sinistra, aggiungendo zeri iniziali se necessario. Poi converti ogni gruppo di 3 bit nella cifra ottale corrispondente (0-7). Ad esempio, binario <code class="bg-darkCard px-1 rounded">11111101</code> → <code class="bg-darkCard px-1 rounded">011 111 101</code> → <code class="bg-darkCard px-1 rounded">3 7 5</code> → ottale <code class="bg-darkCard px-1 rounded">375</code>.',
        ],
        [
            'question' => 'Perché la conversione da binario a ottale usa gruppi di 3?',
            'answer' => 'Perché 8 = 2³, ogni cifra ottale rappresenta esattamente 3 bit binari. Questo rende la conversione diretta — nessun calcolo necessario, basta raggruppare e mappare. Questa relazione matematica è il motivo per cui l\'ottale era storicamente popolare come rappresentazione compatta del binario nei primi computer.',
        ],
        [
            'question' => 'Quanto vale 11111111 in binario in ottale?',
            'answer' => 'Il binario <code class="bg-darkCard px-1 rounded">11111111</code> in ottale è <code class="bg-darkCard px-1 rounded">377</code>. Raggruppando in gruppi di 3 bit: <code class="bg-darkCard px-1 rounded">011 111 111</code> → 3, 7, 7. Questo rappresenta il decimale 255, il valore massimo di un byte unsigned a 8 bit.',
        ],
        [
            'question' => 'Qual è la differenza tra binario e ottale?',
            'answer' => 'Il binario è in base 2 (usa solo 0 e 1), il linguaggio fondamentale dei computer digitali. L\'ottale è in base 8 (cifre 0-7), una rappresentazione compatta del binario. Poiché 8 è una potenza di 2, ogni cifra ottale corrisponde esattamente a 3 cifre binarie, rendendo la conversione diretta senza calcoli aritmetici.',
        ],
        [
            'question' => 'Posso convertire l\'ottale in binario?',
            'answer' => 'Sì! Clicca il pulsante "Inverti Direzione" per passare alla modalità Ottale → Binario. Per convertire manualmente, sostituisci ogni cifra ottale con il suo equivalente binario a 3 bit. Ad esempio, ottale <code class="bg-darkCard px-1 rounded">375</code> → 3=<code class="bg-darkCard px-1 rounded">011</code>, 7=<code class="bg-darkCard px-1 rounded">111</code>, 5=<code class="bg-darkCard px-1 rounded">101</code> → binario <code class="bg-darkCard px-1 rounded">11111101</code>.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'bin_to_oct' => 'Binario → Ottale',
        'oct_to_bin' => 'Ottale → Binario',
        'binary_input' => 'Input Binario',
        'octal_output' => 'Output Ottale',
        'octal_input' => 'Input Ottale',
        'binary_output' => 'Output Binario',
        'binary_placeholder' => 'Inserisci numeri binari (es. 11111101, 111111111, 0b1010)...',
        'octal_placeholder' => 'Il risultato ottale apparirà qui...',
        'octal_input_placeholder' => 'Inserisci numeri ottali (es. 375, 777, 0o52)...',
        'binary_result_placeholder' => 'Il risultato binario apparirà qui...',
        'nothing_to_copy' => 'Niente da copiare',
        'copied' => 'Copiato!',
        'converted_bin_to_oct' => '{count} valore/i binario/i convertito/i in ottale',
        'converted_oct_to_bin' => '{count} valore/i ottale/i convertito/i in binario',
        'invalid_binary' => 'Valore binario non valido: "{value}" (solo 0 e 1 ammessi)',
        'invalid_octal' => 'Valore ottale non valido: "{value}" (le cifre devono essere 0-7)',
        'step_by_step' => 'Raggruppamento a 3 Bit Passo-Passo',
        'padded_info' => 'Binario riempito a {bits} bit (multiplo di 3)',
        'group' => 'Gruppo',
        'three_bit_binary' => 'Binario a 3 Bit',
        'octal_digit' => 'Cifra Ottale',
        'grouped' => 'Raggruppato:',
        'sample_bin' => '11111101, 111111111, 1010, 11101101',
        'sample_oct' => '375, 777, 12, 355',
    ],
];
