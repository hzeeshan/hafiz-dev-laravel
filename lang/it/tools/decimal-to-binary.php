<?php

return [
    // SEO
    'title' => 'Convertitore Decimale in Binario - Converti Decimale in Binario Online | hafiz.dev',
    'description' => 'Convertitore online gratuito da decimale a binario. Converti numeri decimali (base 10) in binario (base 2) istantaneamente con scomposizione della divisione passo-passo. Nessuna registrazione richiesta.',
    'keywords' => 'decimale in binario, convertire decimale in binario, convertitore decimale binario, da decimale a binario, formula decimale binario, base 10 in base 2',

    // Page content
    'h1' => 'Convertitore Decimale in Binario',
    'subtitle' => 'Converti numeri decimali (base 10) in binario (base 2) istantaneamente con scomposizione della divisione passo-passo. Supporta conversione in blocco e direzione inversa.',

    // UI Labels
    'decimal_input' => 'Input Decimale',
    'binary_output' => 'Output Binario',
    'decimal_placeholder' => 'Inserisci numeri decimali (es. 42, 255, 1024)...',
    'binary_placeholder' => 'Il risultato binario apparirà qui...',

    // Buttons
    'swap_direction' => 'Inverti Direzione',
    'copy' => 'Copia',
    'sample' => 'Esempio',
    'clear' => 'Cancella',

    // Direction labels
    'dec_to_bin' => 'Decimale → Binario',
    'bin_to_dec' => 'Binario → Decimale',
    'binary_input' => 'Input Binario',
    'decimal_output' => 'Output Decimale',

    // Bit length options
    'pad_to' => 'Riempi a:',
    'no_padding' => 'Nessun riempimento',
    'bit_4' => '4-bit',
    'bit_8' => '8-bit (byte)',
    'bit_16' => '16-bit',
    'bit_32' => '32-bit',
    'group_nibbles' => 'Raggruppa in nibble da 4 bit',

    // Breakdown
    'step_by_step' => 'Metodo di Divisione Passo-Passo',
    'step' => 'Passo',
    'division' => 'Divisione',
    'quotient' => 'Quoziente',
    'remainder_col' => 'Resto',

    // Reference table
    'reference_table' => 'Valori Comuni Decimale-Binario',

    // Features
    'features' => [
        [
            'title' => 'Bidirezionale',
            'desc' => 'Converti da decimale a binario e da binario a decimale. Clicca il pulsante Inverti per cambiare direzione istantaneamente.',
        ],
        [
            'title' => 'Scomposizione Divisione',
            'desc' => 'Visualizza il metodo completo della divisione con resto che mostra ogni passo della conversione da decimale a binario.',
        ],
        [
            'title' => 'Output Configurabile',
            'desc' => 'Riempi a 4, 8, 16 o 32 bit. Raggruppa le cifre binarie in nibble da 4 bit per una lettura più facile.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come si converte da decimale a binario?',
            'answer' => 'Usa il metodo della divisione con resto: dividi il numero decimale per 2 ripetutamente e registra ogni resto. Leggi i resti dal basso verso l\'alto. Ad esempio, <code class="bg-darkCard px-1 rounded">42</code> ÷ 2 = 21 r<strong>0</strong>, 21 ÷ 2 = 10 r<strong>1</strong>, 10 ÷ 2 = 5 r<strong>0</strong>, 5 ÷ 2 = 2 r<strong>1</strong>, 2 ÷ 2 = 1 r<strong>0</strong>, 1 ÷ 2 = 0 r<strong>1</strong>. Leggendo dal basso: <code class="bg-darkCard px-1 rounded">101010</code>.',
        ],
        [
            'question' => 'Cos\'è il sistema binario?',
            'answer' => 'Il binario è un sistema numerico in base 2 che usa solo le cifre 0 e 1. È il linguaggio fondamentale dei computer perché i circuiti digitali hanno due stati: acceso (1) e spento (0). Ogni cifra binaria si chiama "bit", 8 bit formano un "byte" e un byte può rappresentare valori da 0 a 255.',
        ],
        [
            'question' => 'Quanto vale 255 in binario?',
            'answer' => '<code class="bg-darkCard px-1 rounded">255</code> in binario è <code class="bg-darkCard px-1 rounded">11111111</code> (otto 1). È il valore massimo memorizzabile in un singolo byte (8 bit). Compare comunemente nei valori colore RGB (es. rgb(255, 255, 255) per il bianco), nelle maschere di sottorete e come massimo intero unsigned a 8 bit.',
        ],
        [
            'question' => 'Qual è la formula per convertire decimale in binario?',
            'answer' => 'Il metodo della divisione con resto: dividi il numero per 2 e annota il resto (0 o 1). Continua a dividere il quoziente per 2 finché non raggiunge 0. Il numero binario è formato dai resti letti dal basso verso l\'alto. Per numeri grandi, puoi anche usare la sottrazione posizionale: trova la più grande potenza di 2 che entra, metti un 1, sottrai e ripeti.',
        ],
        [
            'question' => 'Posso convertire il binario in decimale?',
            'answer' => 'Sì! Moltiplica ogni cifra binaria per 2 elevato alla potenza della sua posizione (partendo da 0 a destra) e somma i risultati. Ad esempio, <code class="bg-darkCard px-1 rounded">101010</code> = (1×32) + (0×16) + (1×8) + (0×4) + (1×2) + (0×1) = <code class="bg-darkCard px-1 rounded">42</code>. Clicca "Inverti Direzione" per usare questa modalità.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'dec_to_bin' => 'Decimale → Binario',
        'bin_to_dec' => 'Binario → Decimale',
        'decimal_input' => 'Input Decimale',
        'binary_output' => 'Output Binario',
        'binary_input' => 'Input Binario',
        'decimal_output' => 'Output Decimale',
        'decimal_placeholder' => 'Inserisci numeri decimali (es. 42, 255, 1024)...',
        'binary_placeholder' => 'Il risultato binario apparirà qui...',
        'binary_input_placeholder' => 'Inserisci numeri binari (es. 101010, 11111111)...',
        'decimal_result_placeholder' => 'Il risultato decimale apparirà qui...',
        'nothing_to_copy' => 'Niente da copiare',
        'copied' => 'Copiato!',
        'converted_dec_to_bin' => '{count} valore/i decimale/i convertito/i in binario',
        'converted_bin_to_dec' => '{count} valore/i binario/i convertito/i in decimale',
        'invalid_decimal' => 'Valore decimale non valido: "{value}" (deve essere un intero non negativo)',
        'invalid_binary' => 'Valore binario non valido: "{value}" (le cifre devono essere 0 o 1)',
        'no_padding' => 'Nessun riempimento',
        'group_nibbles' => 'Raggruppa in nibble da 4 bit',
        'pad_to' => 'Riempi a:',
        'step_by_step' => 'Metodo di Divisione Passo-Passo',
        'step' => 'Passo',
        'division' => 'Divisione',
        'quotient' => 'Quoziente',
        'remainder' => 'Resto',
        'read_remainders' => 'Leggi i resti dal basso verso l\'alto:',
        'sample_dec' => '42, 255, 1024, 65535',
        'sample_bin' => '101010, 11111111, 10000000000',
    ],
];
