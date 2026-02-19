<?php

return [
    // SEO
    'title' => 'Calcolatore Triplo Sconto - Calcola Tre Sconti Successivi Gratis | hafiz.dev',
    'description' => 'Calcolatore gratuito di triplo sconto online. Applica tre sconti successivi a qualsiasi prezzo e scopri il prezzo finale, il risparmio totale e la percentuale di sconto combinata. Nessuna registrazione.',
    'keywords' => 'calcolatore triplo sconto, calcolo triplo sconto, tre sconti successivi, sconto su sconto, calcolatore sconto combinato, sconto cumulativo tre, calcolatore sconti multipli online, triplo sconto percentuale',

    // Page content
    'h1' => 'Calcolatore Triplo Sconto',
    'subtitle' => 'Applica tre sconti successivi a qualsiasi prezzo e visualizza il prezzo finale, il risparmio totale e la percentuale di sconto combinata. Aggiungi l\'IVA opzionale per il totale completo.',

    // Options
    'currency' => 'Valuta',
    'decimal_places' => 'Cifre Decimali',
    'sales_tax' => 'IVA (%)',

    // Input labels
    'original_price' => 'Prezzo Originale',
    'first_discount' => '1° Sconto (%)',
    'second_discount' => '2° Sconto (%)',
    'third_discount' => '3° Sconto (%)',

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
    'breakdown_after_second' => 'Prezzo dopo il secondo sconto',
    'breakdown_third_discount' => 'Terzo sconto',
    'breakdown_after_all' => 'Prezzo dopo tutti gli sconti',
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
            'title' => 'Tre Sconti Successivi',
            'desc' => 'Applica tre sconti uno dopo l\'altro e scopri il vero sconto combinato. Scopri perché sommare le percentuali dà una risposta sbagliata.',
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
            'question' => 'Come si calcola un triplo sconto?',
            'answer' => 'Per calcolare un triplo sconto, applica ogni sconto in sequenza al prezzo ridotto. Parti dal prezzo originale, applica il primo sconto, poi il secondo al prezzo ridotto e infine il terzo. Ad esempio, con un articolo da 100€ al 20%, poi 10%, poi 5%: 100€ x 0,80 = 80€, poi 80€ x 0,90 = 72€, poi 72€ x 0,95 = 68,40€. Lo sconto combinato è del 31,6%.',
        ],
        [
            'question' => 'Perché 20% + 10% + 5% non equivale al 35% di sconto?',
            'answer' => 'Quando gli sconti vengono applicati in successione, ogni sconto si calcola sul prezzo già ridotto, non su quello originale. Con un articolo da 100€, il 35% di sconto dà 65€. Ma il 20%, poi il 10%, poi il 5% dà 68,40€, perché ogni sconto successivo si applica a un numero più piccolo. La differenza di 3,40€ è la "penalità cumulativa" mostrata in questo calcolatore.',
        ],
        [
            'question' => 'L\'ordine dei tre sconti è importante?',
            'answer' => 'No, l\'ordine degli sconti percentuali non cambia il prezzo finale. Applicare 20%, poi 10%, poi 5% dà lo stesso risultato di qualsiasi altra combinazione. Questo perché la moltiplicazione è commutativa: 0,80 x 0,90 x 0,95 = 0,95 x 0,90 x 0,80 = 0,684. Paghi il 68,4% del prezzo originale indipendentemente dall\'ordine.',
        ],
        [
            'question' => 'Qual è la formula dello sconto combinato per tre sconti?',
            'answer' => 'La formula dello sconto combinato per tre sconti successivi (d1, d2, d3) è: Combinato = 1 - (1 - d1/100) x (1 - d2/100) x (1 - d3/100). Per 20%, 10% e 5%: 1 - (0,80 x 0,90 x 0,95) = 1 - 0,684 = 0,316, ovvero il 31,6%. Questa formula dà sempre un risultato inferiore alla semplice somma dei tre sconti.',
        ],
        [
            'question' => 'Quando usare un calcolatore di triplo sconto?',
            'answer' => 'Un calcolatore di triplo sconto è utile quando i negozi offrono più promozioni cumulative. Ad esempio: saldi stagionali (30%) più coupon del negozio (15%) più sconto fedeltà (10%). Serve anche durante eventi come il Black Friday o il Cyber Monday dove si sommano più offerte, e per confrontare se sconti cumulativi convengono rispetto a un singolo sconto maggiore.',
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
        'downloaded' => 'File triple-discount-calculation.txt scaricato',
        'final_price' => 'Prezzo Finale',
        'final_price_with_tax' => 'Prezzo Finale (con IVA)',
        'none' => 'Nessuna',
    ],
];
