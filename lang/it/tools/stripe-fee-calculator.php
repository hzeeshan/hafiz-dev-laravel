<?php

return [
    // SEO
    'title' => 'Calcolatore Commissioni Stripe - Calcola le Fee di Pagamento Online Gratis | hafiz.dev',
    'description' => 'Calcolatore gratuito delle commissioni Stripe. Calcola le fee di elaborazione, scopri quanto addebitare per ricevere un importo specifico e confronta le tariffe tra paesi. Nessuna registrazione.',
    'keywords' => 'calcolatore commissioni stripe, commissioni stripe, fee stripe, calcolo commissioni stripe, calcolatore fee pagamento, stripe italia, calcolo fee stripe online, commissioni stripe italia',

    // Page content
    'h1' => 'Calcolatore Commissioni Stripe',
    'subtitle' => 'Calcola le commissioni di elaborazione Stripe istantaneamente. Scopri quanto pagherai di fee o quanto addebitare per ricevere un importo specifico dopo le deduzioni Stripe.',

    // Options labels
    'country_region' => 'Paese/Regione',
    'card_type' => 'Tipo di Carta',
    'calculation_mode' => 'Modalità di Calcolo',
    'display_currency' => 'Valuta di Visualizzazione',
    'percentage_fee' => 'Commissione Percentuale (%)',
    'fixed_fee' => 'Commissione Fissa (per transazione)',

    // Country options
    'country_us' => 'Stati Uniti (2,9% + $0,30)',
    'country_eu' => 'Europa / UK (1,5% + €0,25)',
    'country_au' => 'Australia (1,75% + A$0,30)',
    'country_ca' => 'Canada (2,9% + CA$0,30)',
    'country_sg' => 'Singapore (3,4% + S$0,50)',
    'country_jp' => 'Giappone (3,6% + ¥40)',
    'country_br' => 'Brasile (3,99% + R$0,39)',
    'country_my' => 'Malesia (3,0% + RM1,00)',
    'country_in' => 'India (2,0% + ₹2,00)',
    'country_custom' => 'Tariffa Personalizzata',

    // Card types
    'card_domestic' => 'Carta Domestica',
    'card_international' => 'Carta Internazionale (+1,5%)',
    'card_international_conversion' => 'Internazionale + Conversione Valuta (+2,5%)',

    // Modes
    'mode_fee_from_amount' => 'Calcola la fee dall\'importo addebitato',
    'mode_amount_to_receive' => 'Importo da addebitare per ricevere $X',

    // Input
    'charge_amount' => 'Importo da Addebitare',

    // Buttons
    'calculate_fees' => 'Calcola Commissioni',
    'sample' => 'Esempio',
    'copy' => 'Copia',
    'download' => 'Scarica',
    'clear' => 'Cancella',

    // Result labels
    'you_charge' => 'Addebiti',
    'stripe_fee' => 'Commissione Stripe',
    'you_receive' => 'Ricevi',
    'charge_this' => 'Addebita Questo',

    // Fee breakdown
    'fee_breakdown' => 'Dettaglio Commissioni',
    'base_percentage_fee' => 'Commissione percentuale base',
    'fixed_fee_per_transaction' => 'Commissione fissa per transazione',
    'international_surcharge' => 'Sovrapprezzo carta internazionale',
    'total_stripe_fee' => 'Commissione Stripe Totale',
    'effective_rate' => 'Tasso effettivo',

    // Comparison table
    'quick_comparison' => 'Confronto Rapido: Importi Comuni',
    'th_amount' => 'Importo',
    'th_stripe_fee' => 'Commissione Stripe',
    'th_you_receive' => 'Ricevi',
    'th_effective_rate' => 'Tasso Effettivo',

    // Stats bar
    'stat_rate' => 'Tariffa',
    'stat_card' => 'Carta',
    'stat_region' => 'Regione',

    // Features
    'features' => [
        [
            'title' => 'Supporto Multi-Regione',
            'desc' => 'Supporta le strutture tariffarie Stripe per USA, EU/UK, Australia, Canada, Singapore, Giappone, Brasile, Malesia, India e tariffe personalizzate.',
        ],
        [
            'title' => 'Calcolo Inverso',
            'desc' => 'Vuoi ricevere esattamente 100€? Calcola quanto addebitare per ottenere l\'importo esatto dopo le commissioni Stripe.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutto viene eseguito nel tuo browser. Nessun dato viene inviato a nessun server. I tuoi dettagli finanziari restano completamente privati.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Quali sono le commissioni standard di Stripe?',
            'answer' => 'Le commissioni standard di Stripe variano per paese. Negli Stati Uniti, la tariffa è del 2,9% + $0,30 per transazione. In Europa e nel Regno Unito, è l\'1,5% + €0,25 per le carte domestiche. L\'Australia applica l\'1,75% + A$0,30, e il Canada il 2,9% + CA$0,30. Le carte internazionali aggiungono l\'1,5% alla tariffa base, e la conversione valuta aggiunge un ulteriore 1%.',
        ],
        [
            'question' => 'Come trasferire le commissioni Stripe al cliente?',
            'answer' => 'Usa la modalità "Importo da addebitare per ricevere $X" in questo calcolatore. Inserisci l\'importo che vuoi ricevere e ti dirà esattamente quanto addebitare. Ad esempio, per ricevere $100 con le tariffe domestiche USA, addebita $103,33. Nota: in alcune giurisdizioni potrebbe essere vietato trasferire le commissioni al cliente.',
        ],
        [
            'question' => 'Stripe addebita di più per le carte internazionali?',
            'answer' => 'Sì. Stripe aggiunge un sovrapprezzo dell\'1,5% per le carte internazionali, ovvero carte emesse al di fuori del paese del tuo account Stripe. Se è necessaria anche la conversione valuta (ad es. una carta EUR che paga un commerciante USD), viene aggiunto un ulteriore 1%. Quindi il sovrapprezzo totale internazionale + conversione è del 2,5% sulla tariffa base.',
        ],
        [
            'question' => 'Le commissioni Stripe sono deducibili fiscalmente?',
            'answer' => 'Sì, le commissioni di elaborazione Stripe sono generalmente deducibili come spesa aziendale nella maggior parte delle giurisdizioni. Rientrano nelle spese di elaborazione pagamenti o servizi commerciali. Conserva la dashboard Stripe o le fatture come documentazione. Consulta sempre un professionista fiscale per consigli specifici alla tua situazione.',
        ],
        [
            'question' => 'Stripe offre sconti per volumi elevati?',
            'answer' => 'Sì, Stripe offre tariffe personalizzate per aziende che elaborano grandi volumi (tipicamente $100K+/mese). Contatta il reparto vendite Stripe per un preventivo personalizzato. Possono offrire percentuali ridotte, commissioni fisse inferiori o entrambe. Puoi usare l\'opzione "Tariffa Personalizzata" in questo calcolatore per simulare le tue tariffe negoziate.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        // Country options
        'country_us' => 'Stati Uniti (2,9% + $0,30)',
        'country_eu' => 'Europa / UK (1,5% + €0,25)',
        'country_au' => 'Australia (1,75% + A$0,30)',
        'country_ca' => 'Canada (2,9% + CA$0,30)',
        'country_sg' => 'Singapore (3,4% + S$0,50)',
        'country_jp' => 'Giappone (3,6% + ¥40)',
        'country_br' => 'Brasile (3,99% + R$0,39)',
        'country_my' => 'Malesia (3,0% + RM1,00)',
        'country_in' => 'India (2,0% + ₹2,00)',
        'country_custom' => 'Tariffa Personalizzata',
        // Country names
        'name_us' => 'Stati Uniti',
        'name_eu' => 'Europa / UK',
        'name_au' => 'Australia',
        'name_ca' => 'Canada',
        'name_sg' => 'Singapore',
        'name_jp' => 'Giappone',
        'name_br' => 'Brasile',
        'name_my' => 'Malesia',
        'name_in' => 'India',
        // Card types
        'card_domestic' => 'Carta Domestica',
        'card_international' => 'Carta Internazionale (+1,5%)',
        'card_international_conversion' => 'Internazionale + Conversione Valuta (+2,5%)',
        // Modes
        'mode_fee_from_amount' => 'Calcola la fee dall\'importo addebitato',
        'mode_amount_to_receive' => 'Importo da addebitare per ricevere $X',
        // Buttons
        'calculate_fees' => 'Calcola Commissioni',
        'sample' => 'Esempio',
        'copy' => 'Copia',
        'download' => 'Scarica',
        'clear' => 'Cancella',
        // Labels
        'charge_amount' => 'Importo da Addebitare',
        'desired_receive_amount' => 'Importo Desiderato da Ricevere',
        'you_charge' => 'Addebiti',
        'charge_this' => 'Addebita Questo',
        'stripe_fee' => 'Commissione Stripe',
        'you_receive' => 'Ricevi',
        'fee_breakdown' => 'Dettaglio Commissioni',
        'base_percentage_fee' => 'Commissione percentuale base',
        'fixed_fee_per_transaction' => 'Commissione fissa per transazione',
        'international_surcharge' => 'Sovrapprezzo carta internazionale',
        'total_stripe_fee' => 'Commissione Stripe Totale',
        'effective_rate' => 'Tasso effettivo',
        'quick_comparison' => 'Confronto Rapido: Importi Comuni',
        'th_amount' => 'Importo',
        'th_stripe_fee' => 'Commissione Stripe',
        'th_you_receive' => 'Ricevi',
        'th_effective_rate' => 'Tasso Effettivo',
        // Messages
        'enter_valid_amount' => 'Inserisci un importo valido maggiore di 0.',
        'copied_to_clipboard' => 'Risultati copiati negli appunti!',
        'calculate_first' => 'Prima calcola le commissioni.',
        'calculate_first_download' => 'Prima calcola le commissioni.',
        'downloaded' => 'File stripe-fee-calculation.txt scaricato',
        'copied' => 'Copiato!',
        // Download/copy content
        'result_header' => 'Calcolo Commissioni Stripe',
        'result_charge_amount' => 'Importo Addebitato',
        'result_stripe_fee' => 'Commissione Stripe',
        'result_you_receive' => 'Ricevi',
        'result_effective_rate' => 'Tasso Effettivo',
        'result_settings' => 'Impostazioni',
        'result_rate' => 'Tariffa',
        // Stats
        'stat_rate' => 'Tariffa',
        'stat_card' => 'Carta',
        'stat_region' => 'Regione',
    ],
];
