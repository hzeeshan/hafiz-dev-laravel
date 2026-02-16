<?php

return [
    // SEO
    'title' => 'Convertitore Decimale in Ottale - Converti Decimale in Ottale Online | hafiz.dev',
    'description' => 'Convertitore online gratuito da decimale a ottale. Converti numeri decimali (base 10) in ottale (base 8) istantaneamente con scomposizione della divisione passo-passo. Nessuna registrazione richiesta.',
    'keywords' => 'decimale in ottale, convertire decimale in ottale, convertitore decimale ottale, da decimale a ottale, conversione decimale ottale, base 10 in base 8',

    // Page content
    'h1' => 'Convertitore Decimale in Ottale',
    'subtitle' => 'Converti numeri decimali (base 10) in ottale (base 8) istantaneamente con scomposizione della divisione passo-passo. Supporta conversione in blocco e direzione inversa.',

    // UI Labels
    'decimal_input' => 'Input Decimale',
    'octal_output' => 'Output Ottale',
    'decimal_placeholder' => 'Inserisci numeri decimali (es. 125, 511, 255)...',
    'octal_placeholder' => 'Il risultato ottale apparirà qui...',

    // Buttons
    'swap_direction' => 'Inverti Direzione',
    'copy' => 'Copia',
    'sample' => 'Esempio',
    'clear' => 'Cancella',

    // Direction labels
    'dec_to_oct' => 'Decimale → Ottale',
    'oct_to_dec' => 'Ottale → Decimale',
    'octal_input' => 'Input Ottale',
    'decimal_output' => 'Output Decimale',

    // Breakdown
    'step_by_step' => 'Scomposizione Divisione Passo-Passo',
    'step' => 'Passo',
    'division' => 'Divisione',
    'quotient' => 'Quoziente',
    'remainder_col' => 'Resto',

    // Reference table
    'reference_table' => 'Valori Comuni Decimale-Ottale',

    // Features
    'features' => [
        [
            'title' => 'Bidirezionale',
            'desc' => 'Converti da decimale a ottale e da ottale a decimale. Clicca il pulsante Inverti per cambiare direzione istantaneamente.',
        ],
        [
            'title' => 'Passo-Passo',
            'desc' => 'Visualizza il metodo completo della divisione con resto che mostra ogni passo della conversione da decimale a ottale.',
        ],
        [
            'title' => 'Conversione in Blocco',
            'desc' => 'Converti più valori decimali contemporaneamente. Inserisci valori separati da spazi o virgole per una conversione rapida in massa.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come si converte da decimale a ottale?',
            'answer' => 'Dividi il numero decimale per 8 ripetutamente, registrando ogni resto. Leggi i resti dal basso verso l\'alto. Ad esempio, <code class="bg-darkCard px-1 rounded">125</code>: 125 ÷ 8 = 15 resto 5, 15 ÷ 8 = 1 resto 7, 1 ÷ 8 = 0 resto 1. Leggendo dal basso: <code class="bg-darkCard px-1 rounded">175</code> in ottale.',
        ],
        [
            'question' => 'Qual è l\'equivalente ottale di 255 in decimale?',
            'answer' => 'Il decimale <code class="bg-darkCard px-1 rounded">255</code> in ottale è <code class="bg-darkCard px-1 rounded">377</code>. Questo è significativo in informatica poiché 255 è il valore massimo di un byte unsigned a 8 bit. Nei permessi Unix, <code class="bg-darkCard px-1 rounded">chmod 377</code> significa scrittura+esecuzione per il proprietario e permessi completi per gruppo e altri.',
        ],
        [
            'question' => 'Perché l\'ottale è usato in informatica?',
            'answer' => 'Ogni cifra ottale corrisponde esattamente a 3 bit binari, rendendolo un modo compatto per rappresentare dati binari. È comunemente usato nei permessi dei file Unix/Linux (<code class="bg-darkCard px-1 rounded">chmod 755</code>, <code class="bg-darkCard px-1 rounded">chmod 644</code>), nei linguaggi di programmazione più vecchi e in alcuni codici assembly. Fornisce una rappresentazione leggibile per gruppi di 3 cifre binarie.',
        ],
        [
            'question' => 'Quali sono i valori comuni dei permessi Unix in ottale?',
            'answer' => 'Permessi comuni: <code class="bg-darkCard px-1 rounded">755</code> (rwxr-xr-x, directory ed eseguibili), <code class="bg-darkCard px-1 rounded">644</code> (rw-r--r--, file normali), <code class="bg-darkCard px-1 rounded">777</code> (rwxrwxrwx, accesso completo), <code class="bg-darkCard px-1 rounded">600</code> (rw-------, file privati), <code class="bg-darkCard px-1 rounded">700</code> (rwx------, directory private). Ogni cifra rappresenta rispettivamente proprietario, gruppo e altri.',
        ],
        [
            'question' => 'Posso convertire l\'ottale in decimale?',
            'answer' => 'Sì! Clicca il pulsante "Inverti Direzione" per passare alla modalità Ottale → Decimale. Per convertire manualmente, moltiplica ogni cifra ottale per 8 elevato alla potenza della sua posizione (partendo da 0 a destra), poi somma tutti i valori. Ad esempio, ottale <code class="bg-darkCard px-1 rounded">175</code> = (1×64) + (7×8) + (5×1) = <code class="bg-darkCard px-1 rounded">125</code>.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'dec_to_oct' => 'Decimale → Ottale',
        'oct_to_dec' => 'Ottale → Decimale',
        'decimal_input' => 'Input Decimale',
        'octal_output' => 'Output Ottale',
        'octal_input' => 'Input Ottale',
        'decimal_output' => 'Output Decimale',
        'decimal_placeholder' => 'Inserisci numeri decimali (es. 125, 511, 255)...',
        'octal_placeholder' => 'Il risultato ottale apparirà qui...',
        'octal_input_placeholder' => 'Inserisci numeri ottali (es. 175, 777, 0o52)...',
        'decimal_result_placeholder' => 'Il risultato decimale apparirà qui...',
        'nothing_to_copy' => 'Niente da copiare',
        'copied' => 'Copiato!',
        'converted_dec_to_oct' => '{count} valore/i decimale/i convertito/i in ottale',
        'converted_oct_to_dec' => '{count} valore/i ottale/i convertito/i in decimale',
        'invalid_decimal' => 'Valore decimale non valido: "{value}" (deve essere un intero non negativo)',
        'invalid_octal' => 'Valore ottale non valido: "{value}" (le cifre devono essere 0-7)',
        'step_by_step' => 'Scomposizione Divisione Passo-Passo',
        'step' => 'Passo',
        'division' => 'Divisione',
        'quotient' => 'Quoziente',
        'remainder' => 'Resto',
        'read_remainders' => 'Leggi i resti dal basso verso l\'alto:',
        'result' => 'Risultato:',
        'sample_dec' => '125, 255, 493, 511',
        'sample_oct' => '175, 377, 755, 777',
    ],
];
