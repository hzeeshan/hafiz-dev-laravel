<?php

return [
    // SEO
    'title' => 'Confronta Testi Online Gratis - Diff Checker | hafiz.dev',
    'description' => 'Confronta due testi online gratis e trova le differenze. Evidenzia aggiunte, eliminazioni e modifiche istantaneamente. 100% lato client, nessun dato inviato al server.',
    'keywords' => 'confronta testi, diff checker, confronto testo online, trova differenze testo, confronta codice, diff online, confronta file testo, strumento diff gratis',

    // Page content
    'h1' => 'Confronta Testi (Diff Checker)',
    'subtitle' => 'Confronta due testi e trova le differenze. Evidenzia aggiunte, eliminazioni e modifiche istantaneamente. 100% lato client.',

    // Options
    'compare_by' => 'Confronta per:',
    'lines' => 'Righe',
    'words' => 'Parole',
    'characters' => 'Caratteri',
    'ignore_whitespace' => 'Ignora spazi',
    'ignore_case' => 'Ignora maiuscole/minuscole',
    'show_unchanged' => 'Mostra invariati',

    // Input labels
    'original_text' => 'Testo Originale',
    'modified_text' => 'Testo Modificato',
    'original_placeholder' => 'Incolla il testo originale qui...',
    'modified_placeholder' => 'Incolla il testo modificato qui...',

    // Buttons
    'compare' => 'Confronta',
    'swap' => 'Scambia',
    'clear_all' => 'Cancella Tutto',
    'copy_diff' => 'Copia Diff',
    'sample' => 'Esempio',

    // View modes
    'view' => 'Vista:',
    'side_by_side' => 'Affiancata',
    'inline' => 'In linea',

    // Stats
    'added' => 'Aggiunte:',
    'removed' => 'Rimosse:',
    'unchanged' => 'Invariate:',

    // Diff output labels
    'original' => 'Originale',
    'modified' => 'Modificato',
    'unified_diff' => 'Diff Unificato',

    // Messages
    'no_diff' => 'Nessuna differenza trovata! I due testi sono identici.',
    'copied' => 'Diff copiato negli appunti!',

    // Features
    'features' => [
        [
            'title' => 'Confronto Istantaneo',
            'desc' => 'Confronta i testi istantaneamente con evidenziazione in tempo reale di aggiunte, eliminazioni e modifiche.',
        ],
        [
            'title' => 'Modalità di Visualizzazione Multiple',
            'desc' => 'Scegli tra vista affiancata o in linea unificata. Confronta per righe, parole o caratteri.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutto avviene nel tuo browser. I tuoi testi non toccano mai i nostri server.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come confronto due testi?',
            'answer' => 'Incolla il testo originale nel pannello sinistro e il testo modificato nel pannello destro, poi clicca "Confronta". Lo strumento evidenzierà istantaneamente tutte le differenze: le aggiunte in verde e le eliminazioni in rosso. Puoi anche caricare dati di esempio per vedere come funziona.',
        ],
        [
            'question' => 'Qual è la differenza tra confronto per righe, parole e caratteri?',
            'answer' => 'Il confronto per righe tratta ogni riga come un\'unità ed è ideale per confrontare codice o testo strutturato. Il confronto per parole evidenzia le singole parole modificate ed è ottimo per prosa e documentazione. Il confronto per caratteri mostra ogni singolo carattere diverso — è il più dettagliato ma può essere confuso per testi lunghi.',
        ],
        [
            'question' => 'Posso ignorare le differenze negli spazi?',
            'answer' => 'Sì! Attiva l\'opzione "Ignora spazi" per saltare le differenze causate da spazi, tabulazioni o spazi finali. Questo è particolarmente utile quando confronti codice che potrebbe avere formattazione o indentazione diversa ma logica identica.',
        ],
        [
            'question' => 'Cosa mostrano le viste Affiancata e In linea?',
            'answer' => 'La vista Affiancata mostra i testi originale e modificato in colonne parallele, rendendo facile vedere cosa è cambiato e dove. La vista In linea (unificata) mostra tutto in una singola colonna con eliminazioni e aggiunte contrassegnate con prefissi - e +, simile all\'output di git diff.',
        ],
        [
            'question' => 'I miei dati sono al sicuro?',
            'answer' => 'Assolutamente. Tutti i confronti avvengono direttamente nel tuo browser usando JavaScript. I tuoi testi non lasciano mai il tuo dispositivo — non memorizziamo, trasmettiamo o abbiamo accesso a nessun contenuto che confronti. Questo rende lo strumento completamente sicuro per confrontare codice sensibile, file di configurazione o qualsiasi dato privato.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'compare_by' => 'Confronta per:',
        'lines' => 'Righe',
        'words' => 'Parole',
        'characters' => 'Caratteri',
        'ignore_whitespace' => 'Ignora spazi',
        'ignore_case' => 'Ignora maiuscole/minuscole',
        'show_unchanged' => 'Mostra invariati',
        'compare' => 'Confronta',
        'swap' => 'Scambia',
        'clear_all' => 'Cancella Tutto',
        'copy_diff' => 'Copia Diff',
        'sample' => 'Esempio',
        'view' => 'Vista:',
        'side_by_side' => 'Affiancata',
        'inline' => 'In linea',
        'added' => 'Aggiunte:',
        'removed' => 'Rimosse:',
        'unchanged' => 'Invariate:',
        'original' => 'Originale',
        'modified' => 'Modificato',
        'unified_diff' => 'Diff Unificato',
        'no_content' => 'Nessun contenuto',
        'no_diff' => 'Nessuna differenza trovata! I due testi sono identici.',
        'copied' => 'Diff copiato negli appunti!',
        'original_placeholder' => 'Incolla il testo originale qui...',
        'modified_placeholder' => 'Incolla il testo modificato qui...',
    ],
];
