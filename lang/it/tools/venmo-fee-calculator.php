<?php

return [
    // SEO
    'title' => 'Calcolatore Commissioni Venmo - Calcola le Fee Venmo Gratis | hafiz.dev',
    'description' => 'Calcolatore commissioni Venmo gratuito. Calcola le commissioni Venmo per pagamenti personali, transazioni aziendali, carta di credito e trasferimenti istantanei. Nessuna registrazione richiesta.',
    'keywords' => 'calcolatore commissioni venmo, commissioni venmo, venmo fee calculator, venmo business fee, venmo carta di credito, venmo trasferimento istantaneo, calcola commissioni venmo',

    // Page content
    'h1' => 'Calcolatore Commissioni Venmo',
    'subtitle' => 'Calcola le commissioni Venmo istantaneamente per pagamenti personali, transazioni aziendali, invii con carta di credito e trasferimenti istantanei. Scopri esattamente quanto paghi o ricevi.',

    // UI Labels
    'transaction_type' => 'Tipo di Transazione',
    'personal_free' => 'Personale - Banca/Debito/Saldo (Gratis)',
    'personal_credit' => 'Personale - Carta di Credito (3%)',
    'business' => 'Business / Beni e Servizi (1.9% + $0.10)',
    'instant_transfer' => 'Trasferimento Istantaneo (1.75%, min $0.25, max $25)',
    'calculation_mode' => 'Modalità di Calcolo',
    'fee_from_amount' => 'Calcola commissione dall\'importo',
    'amount_to_receive' => 'Importo necessario per ricevere $X',
    'payment_amount' => 'Importo del Pagamento',
    'desired_receive_amount' => 'Importo Desiderato da Ricevere',
    'calculate_fees' => 'Calcola Commissioni',
    'sample' => 'Esempio',
    'copy' => 'Copia',
    'download' => 'Scarica',
    'you_send' => 'Invii',
    'venmo_fee' => 'Commissione Venmo',
    'recipient_gets' => 'Il Destinatario Riceve',
    'transfer_amount' => 'Importo Trasferimento',
    'you_receive' => 'Ricevi',
    'buyer_pays' => 'Il Compratore Paga',
    'seller_receives' => 'Il Venditore Riceve',
    'charge_this' => 'Addebita Questo',
    'send_this' => 'Invia Questo',
    'fee_breakdown' => 'Dettaglio Commissioni',
    'fee_type' => 'Tipo di commissione',
    'percentage_fee' => 'Commissione percentuale',
    'fixed_fee' => 'Commissione fissa per transazione',
    'total_venmo_fee' => 'Commissione Venmo Totale',
    'effective_rate' => 'Tasso effettivo',
    'quick_comparison' => 'Confronto Rapido - Importi Comuni',
    'amount' => 'Importo',
    'free' => 'Gratis',
    'type_stat' => 'Tipo',
    'rate_stat' => 'Tariffa',
    'mode_stat' => 'Modalità',
    'fee_from_amount_stat' => 'Commissione da importo',
    'reverse_calculation' => 'Calcolo inverso',

    // Features
    'features' => [
        [
            'title' => 'Tutti i Tipi di Transazione',
            'desc' => 'Copre pagamenti personali, transazioni aziendali, invii con carta di credito e trasferimenti istantanei con le tariffe precise per ogni tipo.',
        ],
        [
            'title' => 'Calcolo Inverso',
            'desc' => 'Devi ricevere esattamente $100? Calcola quanto richiedere per ottenere l\'importo esatto dopo che Venmo trattiene le commissioni.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutto viene elaborato nel tuo browser. Nessun dato viene inviato a nessun server. I tuoi dettagli finanziari restano completamente privati.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Venmo è gratuito per i pagamenti personali?',
            'answer' => 'Sì, inviare e ricevere pagamenti personali su Venmo è gratuito quando usi un conto bancario collegato, carta di debito o il saldo Venmo. L\'unica commissione per i pagamenti personali si applica quando usi una carta di credito per inviare denaro, con un costo del 3% dell\'importo della transazione.',
        ],
        [
            'question' => 'Quanto costa Venmo per i pagamenti business?',
            'answer' => 'Venmo addebita al venditore l\'1.9% + $0.10 per transazione per i pagamenti business (beni e servizi). Questa commissione viene detratta dall\'importo del pagamento prima che il venditore lo riceva. Il compratore non paga alcuna commissione aggiuntiva. Questo si applica ai profili business e ai pagamenti contrassegnati come beni e servizi.',
        ],
        [
            'question' => 'Qual è la commissione per il trasferimento istantaneo Venmo?',
            'answer' => 'Venmo addebita l\'1.75% per i trasferimenti istantanei al tuo conto bancario o carta di debito idonea. La commissione minima è $0.25 e la massima è $25.00. Se puoi attendere 1-3 giorni lavorativi, i trasferimenti bancari standard sono completamente gratuiti.',
        ],
        [
            'question' => 'Posso evitare le commissioni Venmo?',
            'answer' => 'Sì, puoi evitare la maggior parte delle commissioni Venmo usando un conto bancario, carta di debito o saldo Venmo per i pagamenti personali (completamente gratuito). Per i trasferimenti al tuo conto, scegli l\'opzione standard 1-3 giorni lavorativi invece del trasferimento istantaneo. L\'unica commissione inevitabile è l\'1.9% + $0.10 del venditore sulle transazioni business/beni e servizi.',
        ],
        [
            'question' => 'Come si confronta Venmo con le commissioni PayPal?',
            'answer' => 'Venmo (di proprietà di PayPal) ha generalmente strutture di commissioni simili. Entrambi addebitano per transazioni business/beni e servizi, pagamenti con carta di credito e trasferimenti istantanei. La tariffa business di Venmo dell\'1.9% + $0.10 è leggermente inferiore alla tariffa standard di PayPal del 2.99% + $0.49 per beni e servizi. I pagamenti personali sono gratuiti su entrambe le piattaforme quando si usa un conto bancario o il saldo.',
        ],
    ],

    // JS strings (passed to JS via data-* attributes on #tool-strings div)
    'js_strings' => [
        'error_invalid' => 'Inserisci un importo valido maggiore di 0.',
        'error_calculate_first_copy' => 'Calcola le commissioni prima di copiare.',
        'error_calculate_first_download' => 'Calcola le commissioni prima di scaricare.',
        'copied_to_clipboard' => 'Risultati copiati negli appunti!',
        'downloaded' => 'Scaricato venmo-fee-calculation.txt',
        'payment_amount' => 'Importo del Pagamento',
        'desired_receive_amount' => 'Importo Desiderato da Ricevere',
        'fee_from_amount_mode' => 'Commissione da importo',
        'reverse_mode' => 'Calcolo inverso',
        'transfer_amount' => 'Importo Trasferimento',
        'you_receive' => 'Ricevi',
        'buyer_pays' => 'Il Compratore Paga',
        'seller_receives' => 'Il Venditore Riceve',
        'charge_this' => 'Addebita Questo',
        'you_send' => 'Invii',
        'recipient_gets' => 'Il Destinatario Riceve',
        'send_this' => 'Invia Questo',
        'free_label' => 'Gratis',
        'copied' => 'Copiato!',
        'copy' => 'Copia',
    ],
];
