<?php

return [
    // SEO
    'title' => 'Calcolatore Commissioni eBay e PayPal - Calcola le Fee per Venditori Gratis | hafiz.dev',
    'description' => 'Calcolatore gratuito delle commissioni eBay e PayPal. Calcola le fee sul valore finale eBay, le commissioni di elaborazione PayPal e il tuo profitto netto per vendita. Nessuna registrazione.',
    'keywords' => 'calcolatore commissioni ebay, commissioni ebay paypal, fee ebay venditori, commissioni ebay valore finale, calcolatore fee paypal, calcolo commissioni ebay, calcolatore profitto ebay, fee ebay italia',

    // Page content
    'h1' => 'Calcolatore Commissioni eBay e PayPal',
    'subtitle' => 'Calcola le commissioni sul valore finale eBay e le fee di elaborazione PayPal istantaneamente. Visualizza le commissioni totali, il profitto netto e il margine di profitto per vendita.',

    // Options
    'ebay_category' => 'Categoria eBay',
    'payment_processor' => 'Processore di Pagamento',
    'ebay_store' => 'Abbonamento eBay Store',
    'display_currency' => 'Valuta di Visualizzazione',

    // Categories
    'cat_most' => 'La Maggior Parte delle Categorie (13,25%)',
    'cat_books' => 'Libri, Film, Musica (14,95%)',
    'cat_clothing' => 'Abbigliamento, Scarpe (13,25%)',
    'cat_electronics' => 'Elettronica (14,95%)',
    'cat_collectibles' => 'Collezionismo (13,25%)',
    'cat_home' => 'Casa e Giardino (13,25%)',
    'cat_sporting' => 'Articoli Sportivi (13,25%)',
    'cat_toys' => 'Giocattoli e Hobby (13,25%)',
    'cat_business' => 'Business e Industria (13,25%)',
    'cat_guitars' => 'Chitarre e Bassi (6,35%)',
    'cat_watches' => 'Orologi oltre $1000 (8,95%)',
    'cat_sneakers' => 'Sneakers (8,0%)',
    'cat_jewelry' => 'Gioielleria Fine oltre $500 (6,35%)',
    'cat_custom' => 'Tariffa Personalizzata',

    // Processors
    'proc_managed' => 'eBay Managed Payments (incluso)',
    'proc_paypal_standard' => 'PayPal Standard (2,99% + $0,49)',
    'proc_paypal_micro' => 'PayPal Micropagamenti (5% + $0,10)',
    'proc_none' => 'Nessuna Commissione Aggiuntiva',

    // Store types
    'store_none' => 'Nessun Negozio',
    'store_starter' => 'Negozio Starter',
    'store_basic' => 'Negozio Basic',
    'store_premium' => 'Negozio Premium',
    'store_anchor' => 'Negozio Anchor',
    'store_enterprise' => 'Negozio Enterprise',

    // Custom rate
    'ebay_fvf_percent' => 'Commissione Valore Finale eBay (%)',
    'per_order_surcharge' => 'Sovrapprezzo per Ordine',

    // Input labels
    'item_sale_price' => 'Prezzo di Vendita',
    'shipping_price' => 'Costo di Spedizione',
    'item_cost' => 'Costo Articolo (opzionale)',

    // Buttons
    'calculate_fees' => 'Calcola Commissioni',
    'sample' => 'Esempio',
    'copy' => 'Copia',
    'download' => 'Scarica',
    'clear' => 'Cancella',

    // Result labels
    'total_revenue' => 'Ricavo Totale',
    'total_fees' => 'Commissioni Totali',
    'net_profit' => 'Profitto Netto',

    // Breakdown
    'fee_breakdown' => 'Dettaglio Commissioni',
    'ebay_fvf' => 'Commissione valore finale eBay',
    'ebay_per_order' => 'Sovrapprezzo per ordine eBay',
    'paypal_fee' => 'Commissione PayPal',
    'total_fees_label' => 'Commissioni Totali',
    'item_cost_label' => 'Costo articolo',
    'effective_fee_rate' => 'Tasso commissioni effettivo',
    'profit_margin' => 'Margine di profitto',

    // Comparison table
    'quick_comparison' => 'Confronto Rapido: Fasce di Prezzo Comuni',
    'th_sale_price' => 'Prezzo di Vendita',
    'th_total_fees' => 'Commissioni Totali',
    'th_you_keep' => 'Tieni',
    'th_fee_rate' => 'Tasso Fee',

    // Stats bar
    'stat_category' => 'Categoria',
    'stat_ebay_rate' => 'Fee eBay',
    'stat_payment' => 'Pagamento',

    // Features
    'features' => [
        [
            'title' => 'Dettaglio Completo delle Fee',
            'desc' => 'Visualizza ogni commissione nel dettaglio: fee sul valore finale eBay, sovrapprezzi per ordine e fee di elaborazione PayPal. Sai esattamente dove vanno i tuoi soldi su ogni vendita.',
        ],
        [
            'title' => 'Calcolatore di Profitto',
            'desc' => 'Inserisci il costo dell\'articolo per vedere profitto netto e margine di profitto istantaneamente. Stabilisci i prezzi dei tuoi annunci con piena visibilità su tutte le commissioni.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutto viene eseguito nel tuo browser. Nessun dato viene inviato a nessun server. I tuoi dettagli su prezzi e profitti restano completamente privati.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Quali commissioni applica eBay ai venditori?',
            'answer' => 'eBay addebita ai venditori una commissione sul valore finale per ogni vendita completata. Questa fee è una percentuale dell\'importo totale della vendita (prezzo articolo più spedizione) più un sovrapprezzo di $0,30 per ordine. La percentuale varia per categoria di prodotto. La maggior parte delle categorie paga il 13,25%, mentre categorie speciali come chitarre, gioielleria fine e sneakers hanno tariffe ridotte tra il 3% e l\'8,95%. Gli abbonati a un eBay Store possono ottenere commissioni inferiori in base al piano.',
        ],
        [
            'question' => 'Qual è la differenza tra eBay Managed Payments e PayPal?',
            'answer' => 'eBay Managed Payments è il sistema di elaborazione pagamenti interno di eBay. Con Managed Payments, le fee di elaborazione sono incluse nella commissione sul valore finale, quindi non c\'è una commissione PayPal separata. Se utilizzi ancora PayPal (alcuni venditori internazionali), PayPal addebita la propria fee (tipicamente 2,99% + $0,49) in aggiunta alle commissioni eBay. La maggior parte dei venditori eBay è stata migrata a Managed Payments dal 2023.',
        ],
        [
            'question' => 'eBay addebita commissioni sulla spedizione?',
            'answer' => 'Sì, la commissione sul valore finale di eBay viene calcolata sull\'importo totale della vendita, che include sia il prezzo dell\'articolo che il costo di spedizione addebitato all\'acquirente. Offrire la "spedizione gratuita" includendo il costo nel prezzo dell\'articolo non cambia le commissioni totali. La stessa percentuale viene applicata al totale indipendentemente da come suddividi il prezzo tra articolo e spedizione.',
        ],
        [
            'question' => 'Gli abbonamenti eBay Store riducono le commissioni?',
            'answer' => 'Gli abbonamenti eBay Store possono fornire tariffe ridotte sulla commissione del valore finale e inserzioni mensili gratuite. I risparmi dipendono dal livello di abbonamento (Starter, Basic, Premium, Anchor o Enterprise) e dalle categorie in cui vendi. Per i venditori ad alto volume, il costo dell\'abbonamento può essere compensato dalle commissioni ridotte per articolo. Questo calcolatore mostra l\'impatto delle fee per ogni livello di negozio.',
        ],
        [
            'question' => 'Come posso ridurre le mie commissioni di vendita su eBay?',
            'answer' => 'Ci sono diversi modi per ridurre le fee eBay. Sottoscrivi un eBay Store per tariffe ridotte sul valore finale. Vendi in categorie con percentuali più basse. Aumenta il prezzo medio di vendita in modo che il sovrapprezzo di $0,30 per ordine diventi una percentuale minore del totale. Usa eBay Managed Payments invece di PayPal per evitare doppie commissioni. Mantieni lo status di Venditore Top Rated per sconti aggiuntivi sulle inserzioni idonee.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'enter_valid_price' => 'Inserisci un prezzo articolo valido maggiore di 0.',
        'calculate_first_copy' => 'Prima calcola le commissioni.',
        'calculate_first_download' => 'Prima calcola le commissioni.',
        'copied' => 'Risultati copiati negli appunti!',
        'downloaded' => 'File ebay-paypal-fee-calculation.txt scaricato',
        'copied_btn' => 'Copiato!',
        'copy_btn' => 'Copia',
    ],
];
