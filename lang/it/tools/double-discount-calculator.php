<?php

return [
    // SEO
    'title' => 'Calcolatore Doppio Sconto - Calcola Due Sconti Successivi Gratis | hafiz.dev',
    'description' => 'Calcolatore gratuito di doppio sconto online. Applica due sconti successivi a qualsiasi prezzo e scopri il prezzo finale, il risparmio totale e la percentuale di sconto combinata. Nessuna registrazione.',
    'keywords' => 'calcolatore doppio sconto, calcolo doppio sconto, due sconti successivi, sconto su sconto, calcolatore sconto combinato, sconto cumulativo, calcolatore sconti online, doppio sconto percentuale',

    // Page content
    'h1' => 'Calcolatore Doppio Sconto',
    'subtitle' => 'Applica due sconti successivi a qualsiasi prezzo e visualizza il prezzo finale, il risparmio totale e la percentuale di sconto combinata. Aggiungi l\'IVA opzionale per il totale completo.',

    // Options
    'currency' => 'Valuta',
    'decimal_places' => 'Cifre Decimali',
    'sales_tax' => 'IVA (%)',

    // Input labels
    'original_price' => 'Prezzo Originale',
    'first_discount' => 'Primo Sconto (%)',
    'second_discount' => 'Secondo Sconto (%)',

    // Buttons
    'calculate' => 'Calcola',
    'sample' => 'Esempio',
    'copy' => 'Copia',
    'download' => 'Scarica',
    'clear' => 'Cancella',

    // Result labels
    'result_original_price' => 'Prezzo Originale',
    'result_you_save' => 'Risparmi',
    'result_final_price' => 'Prezzo Finale',

    // Breakdown
    'step_by_step' => 'Calcolo Passo per Passo',
    'breakdown_original' => 'Prezzo originale',
    'breakdown_first_discount' => 'Primo sconto',
    'breakdown_after_first' => 'Prezzo dopo il primo sconto',
    'breakdown_second_discount' => 'Secondo sconto',
    'breakdown_after_both' => 'Prezzo dopo entrambi gli sconti',
    'breakdown_sales_tax' => 'IVA',
    'breakdown_final_with_tax' => 'Prezzo finale (con IVA)',

    // Summary
    'discount_summary' => 'Riepilogo Sconti',
    'combined_discount' => 'Sconto Combinato',
    'total_saved' => 'Risparmio Totale',
    'if_added_naive' => 'Se Sommati (naive)',
    'stacking_penalty' => 'Penalità Cumulativa',

    // Stats bar
    'stat_combined' => 'Combinato',
    'stat_currency' => 'Valuta',
    'stat_tax' => 'IVA',

    // Features
    'features' => [
        [
            'title' => 'Sconti Successivi',
            'desc' => 'Applica due sconti uno dopo l\'altro e scopri il vero sconto combinato. Scopri perché 20% + 10% non equivale al 30% di sconto.',
        ],
        [
            'title' => 'Calcolo Passo per Passo',
            'desc' => 'Visualizza esattamente come viene applicato ogni sconto con un calcolo dettagliato che mostra i prezzi a ogni passaggio, più l\'IVA opzionale.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutto viene eseguito nel tuo browser. Nessun dato viene inviato a nessun server. Le tue informazioni sui prezzi restano completamente private.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come si calcola un doppio sconto?',
            'answer' => 'Per calcolare un doppio sconto, applica il primo sconto al prezzo originale, poi applica il secondo sconto al prezzo già ridotto. Ad esempio, con un articolo da 100€ e sconti del 20% e poi del 10%: 100€ x 0,80 = 80€ dopo il primo sconto, poi 80€ x 0,90 = 72€ dopo il secondo. Il prezzo finale è 72€ e lo sconto combinato è del 28%.',
        ],
        [
            'question' => 'Perché 20% + 10% non equivale al 30% di sconto?',
            'answer' => 'Quando gli sconti vengono applicati in successione, il secondo sconto si calcola sul prezzo ridotto, non sul prezzo originale. Con un articolo da 100€, il 30% di sconto dà 70€. Ma il 20% e poi il 10% dà 72€, perché il 10% si applica a 80€ (risparmiando 8€) invece che a 100€ (che risparmierebbe 10€). La differenza di 2€ è la "penalità cumulativa" mostrata in questo calcolatore.',
        ],
        [
            'question' => 'L\'ordine degli sconti è importante?',
            'answer' => 'No, l\'ordine degli sconti percentuali non cambia il prezzo finale. Applicare prima il 20% e poi il 10% dà lo stesso risultato che applicare prima il 10% e poi il 20%. Questo perché la moltiplicazione è commutativa: 0,80 x 0,90 = 0,90 x 0,80 = 0,72. Paghi il 72% del prezzo originale in entrambi i casi.',
        ],
        [
            'question' => 'Qual è la formula dello sconto combinato?',
            'answer' => 'La formula dello sconto combinato per due sconti successivi (d1 e d2) è: Combinato = d1 + d2 - (d1 x d2 / 100). Per il 20% e il 10%: 20 + 10 - (20 x 10 / 100) = 30 - 2 = 28%. Questa formula funziona per qualsiasi coppia di sconti percentuali e dà sempre un risultato inferiore alla semplice somma.',
        ],
        [
            'question' => 'Quando usare un calcolatore di doppio sconto?',
            'answer' => 'Un calcolatore di doppio sconto è utile quando i negozi offrono promozioni cumulative, come "20% di sconto + ulteriore 10% con coupon". È utile durante il Black Friday, per sconti dipendenti sopra i prezzi saldi, sconti fedeltà combinati con offerte promozionali o ribassi di fine stagione con coupon aggiuntivi. Ti mostra il vero risparmio rispetto a quello che le percentuali potrebbero suggerire.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'enter_valid_price' => 'Inserisci un prezzo originale valido maggiore di 0.',
        'discount_range' => 'Le percentuali di sconto devono essere tra 0 e 100.',
        'tax_range' => 'L\'aliquota IVA deve essere tra 0 e 100.',
        'calculate_first_copy' => 'Prima calcola, poi copia.',
        'calculate_first_download' => 'Prima calcola, poi scarica.',
        'copied' => 'Risultati copiati negli appunti!',
        'downloaded' => 'File double-discount-calculation.txt scaricato',
        'final_price' => 'Prezzo Finale',
        'final_price_with_tax' => 'Prezzo Finale (con IVA)',
        'none' => 'Nessuna',
    ],
];
