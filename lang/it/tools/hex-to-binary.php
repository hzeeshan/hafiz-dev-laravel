<?php

return [
    // SEO
    'title' => 'Convertitore Esadecimale in Binario - Converti Hex in Binario Online | hafiz.dev',
    'description' => 'Convertitore online gratuito da esadecimale a binario. Converti hex in binario istantaneamente con scomposizione nibble passo-passo. Nessuna registrazione richiesta.',
    'keywords' => 'hex in binario, convertire esadecimale in binario, convertitore hex binario, esadecimale in binario, da hex a binario, convertitore esadecimale binario online',

    // Page content
    'h1' => 'Convertitore Esadecimale in Binario',
    'subtitle' => 'Converti esadecimale in binario istantaneamente con scomposizione nibble passo-passo. Supporta conversione in blocco e direzione inversa da binario a hex.',

    // UI Labels
    'hex_input' => 'Input Esadecimale',
    'binary_output' => 'Output Binario',
    'hex_placeholder' => 'Inserisci valori hex (es. FF, 2A, 0x1F4)...',
    'binary_placeholder' => 'Il risultato binario apparirà qui...',

    // Buttons
    'swap_direction' => 'Inverti Direzione',
    'copy' => 'Copia',
    'sample' => 'Esempio',
    'clear' => 'Cancella',

    // Direction labels
    'hex_to_binary' => 'Esadecimale → Binario',
    'binary_to_hex' => 'Binario → Esadecimale',
    'binary_input' => 'Input Binario',
    'hex_output' => 'Output Esadecimale',

    // Breakdown
    'step_by_step_breakdown' => 'Scomposizione Passo-Passo',
    'hex_digit' => 'Cifra Hex',
    'decimal' => 'Decimale',
    'binary_4bit' => 'Binario (4-bit)',

    // Reference table
    'reference_table' => 'Tabella di Riferimento Hex-Binario',

    // Features
    'features' => [
        [
            'title' => 'Bidirezionale',
            'desc' => 'Converti da hex a binario e da binario a hex. Clicca il pulsante Inverti per cambiare direzione istantaneamente.',
        ],
        [
            'title' => 'Scomposizione Nibble',
            'desc' => 'Visualizza ogni cifra hex mappata al suo nibble binario a 4 bit in una tabella passo-passo per facilitare l\'apprendimento.',
        ],
        [
            'title' => 'Conversione in Blocco',
            'desc' => 'Converti più valori hex contemporaneamente. Inserisci valori separati da spazi o virgole per una conversione rapida in massa.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come si converte da esadecimale a binario?',
            'answer' => 'Ogni cifra esadecimale corrisponde direttamente a un nibble binario di 4 bit. Ad esempio, hex A = 1010, hex F = 1111. Per convertire un numero hex come 2F, converti ogni cifra separatamente: 2 = 0010, F = 1111, quindi 2F = 00101111.',
        ],
        [
            'question' => 'Cos\'è il sistema esadecimale?',
            'answer' => 'L\'esadecimale (hex) è un sistema numerico in base 16 che usa le cifre 0-9 e le lettere A-F. È molto usato in informatica perché ogni cifra hex rappresenta esattamente 4 bit binari, rendendolo un modo compatto per rappresentare dati binari. Ad esempio, il numero binario 11111111 è semplicemente FF in hex, e il bianco in CSS è #FFFFFF.',
        ],
        [
            'question' => 'Qual è l\'equivalente binario di hex FF?',
            'answer' => 'Hex FF in binario è 11111111. Ogni F = 1111 in binario, quindi FF = 1111 1111. Questo equivale a 255 in decimale e rappresenta il valore massimo di un singolo byte (8 bit).',
        ],
        [
            'question' => 'Qual è la differenza tra esadecimale e binario?',
            'answer' => 'Il binario è in base 2 (usa solo 0 e 1) mentre l\'esadecimale è in base 16 (usa 0-9 e A-F). L\'hex è una rappresentazione più compatta: una cifra hex equivale esattamente a 4 cifre binarie. Ad esempio, il binario a 8 bit 10110110 è semplicemente B6 in hex. L\'hex è preferito per la leggibilità negli indirizzi di memoria, codici colore e indirizzi MAC.',
        ],
        [
            'question' => 'Posso convertire il binario in esadecimale?',
            'answer' => 'Sì! Raggruppa le cifre binarie in gruppi di 4 da destra a sinistra, poi converti ogni gruppo nel suo equivalente hex. Ad esempio, 10110110 → 1011 0110 → B6. Questo strumento supporta entrambe le direzioni: clicca il pulsante "Inverti Direzione" per passare dalla modalità binario a hex.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'hex_to_binary' => 'Esadecimale → Binario',
        'binary_to_hex' => 'Binario → Esadecimale',
        'hex_input' => 'Input Esadecimale',
        'binary_output' => 'Output Binario',
        'binary_input' => 'Input Binario',
        'hex_output' => 'Output Esadecimale',
        'hex_placeholder' => 'Inserisci valori hex (es. FF, 2A, 0x1F4)...',
        'binary_placeholder' => 'Il risultato binario apparirà qui...',
        'binary_input_placeholder' => 'Inserisci valori binari (es. 11111111, 0b1010)...',
        'hex_result_placeholder' => 'Il risultato hex apparirà qui...',
        'nothing_to_copy' => 'Niente da copiare',
        'copied' => 'Copiato!',
        'converted_hex_to_bin' => '{count} valore/i hex convertito/i in binario',
        'converted_bin_to_hex' => '{count} valore/i binario/i convertito/i in hex',
        'invalid_hex' => 'Valore hex non valido: "{value}"',
        'invalid_binary' => 'Valore binario non valido: "{value}"',
    ],
];
