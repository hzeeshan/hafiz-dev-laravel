<?php

return [
    // SEO
    'title' => 'Tester Regex Online - Testa Espressioni Regolari Gratis | hafiz.dev',
    'description' => 'Tester regex online gratuito e debugger. Testa espressioni regolari in tempo reale con evidenziazione delle corrispondenze. Compatibile con JavaScript/PCRE. Nessuna registrazione richiesta.',
    'keywords' => 'tester regex, tester espressioni regolari, regex online, testare regex, validatore regex, regex italiano, pattern matching, alternativa regex101',

    // Page content
    'h1' => 'Tester Regex',
    'subtitle' => 'Testa e debug espressioni regolari in tempo reale. 100% lato client — i tuoi dati non escono mai dal tuo browser.',

    // UI Labels
    'regular_expression' => 'Espressione Regolare',
    'regex_placeholder' => 'Inserisci il tuo pattern regex...',
    'flag_global' => '(globale)',
    'flag_case_insensitive' => '(ignora maiuscole)',
    'flag_multiline' => '(multilinea)',
    'flag_dotall' => '(dotall)',
    'load_example' => 'Carica Esempio',
    'select_pattern' => 'Seleziona un pattern comune...',
    'example_email' => 'Indirizzo Email',
    'example_url' => 'URL',
    'example_phone' => 'Numero di Telefono',
    'example_ipv4' => 'Indirizzo IPv4',
    'example_date' => 'Data (AAAA-MM-GG)',
    'example_html' => 'Tag HTML',
    'example_hex' => 'Colore Esadecimale',
    'test_string' => 'Stringa di Test',
    'test_string_placeholder' => 'Inserisci il testo da testare con la tua regex...',
    'results' => 'Risultati',
    'match_details' => 'Dettagli Corrispondenze',
    'col_number' => '#',
    'col_match' => 'Corrispondenza',
    'col_position' => 'Posizione',
    'col_groups' => 'Gruppi',
    'invalid_regex' => 'Espressione Regolare Non Valida',
    'copy_regex' => 'Copia Regex',
    'clear_all' => 'Cancella Tutto',

    // Quick Reference
    'quick_reference' => 'Riferimento Rapido',
    'character_classes' => 'Classi di Caratteri',
    'char_any' => 'Qualsiasi carattere',
    'char_digit' => 'Cifra [0-9]',
    'char_word' => 'Carattere parola [a-zA-Z0-9_]',
    'char_whitespace' => 'Spazio bianco',
    'quantifiers' => 'Quantificatori',
    'quant_zero_more' => '0 o più',
    'quant_one_more' => '1 o più',
    'quant_zero_one' => '0 o 1',
    'quant_n_m' => 'da n a m volte',
    'anchors' => 'Ancoraggi',
    'anchor_start' => 'Inizio stringa/riga',
    'anchor_end' => 'Fine stringa/riga',
    'anchor_word' => 'Confine di parola',
    'anchor_non_word' => 'Non-confine di parola',
    'groups' => 'Gruppi',
    'group_capture' => 'Gruppo di cattura',
    'group_non_capture' => 'Non-cattura',
    'group_alternation' => 'Alternanza',
    'group_charset' => 'Set di caratteri',

    // Features
    'features' => [
        [
            'title' => '100% Lato Client',
            'desc' => 'Tutta l\'elaborazione avviene nel tuo browser. I tuoi dati non toccano mai i nostri server.',
        ],
        [
            'title' => 'Gratuito e Senza Registrazione',
            'desc' => 'Usa il tool senza limiti e senza creare un account. Nessuna pubblicità, nessun tracciamento.',
        ],
        [
            'title' => 'Risultati in Tempo Reale',
            'desc' => 'Le corrispondenze si aggiornano istantaneamente mentre scrivi. Visualizza i risultati in tempo reale.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Cos\'è un\'espressione regolare (regex)?',
            'answer' => 'Un\'espressione regolare (regex) è una sequenza di caratteri che definisce un pattern di ricerca. Viene utilizzata per il pattern matching all\'interno delle stringhe, permettendo potenti operazioni di ricerca, validazione e manipolazione del testo. Le regex sono supportate praticamente in tutti i linguaggi di programmazione, inclusi JavaScript, Python, PHP, Java e molti altri. Usi comuni includono la validazione di indirizzi email, il parsing di file di log e le operazioni di ricerca e sostituzione.',
        ],
        [
            'question' => 'Quale variante di regex utilizza questo strumento?',
            'answer' => 'Questo strumento utilizza il motore RegExp nativo di JavaScript, conforme alla specifica ECMAScript. È compatibile con la maggior parte dei pattern PCRE (Perl Compatible Regular Expressions) e funziona in modo identico alle regex nei browser e negli ambienti Node.js. Alcune funzionalità avanzate come le asserzioni lookbehind sono supportate nei browser moderni ma potrebbero non funzionare in quelli più vecchi.',
        ],
        [
            'question' => 'Cosa significano i flag (g, i, m, s)?',
            'answer' => 'g (globale) trova tutte le corrispondenze invece di fermarsi alla prima. i (case-insensitive) fa corrispondere il pattern indipendentemente dalle maiuscole e minuscole (A corrisponde ad a). m (multilinea) fa corrispondere ^ e $ all\'inizio/fine di ogni riga, non solo dell\'intera stringa. s (dotall) fa corrispondere il punto (.) anche ai caratteri di nuova riga, permettendo ai pattern di estendersi su più righe.',
        ],
        [
            'question' => 'Perché la mia regex non trova corrispondenze?',
            'answer' => 'Problemi comuni includono: dimenticare di fare l\'escape dei caratteri speciali (come . o * che hanno significati speciali), non attivare i flag corretti (es. \'i\' per la corrispondenza case-insensitive), usare sintassi non supportata in JavaScript (come alcuni pattern lookbehind nei browser più vecchi), o avere spazi bianchi inaspettati nel pattern o nella stringa di test. Verifica che la sintassi del pattern sia valida — lo strumento mostrerà un messaggio di errore per regex non valide.',
        ],
        [
            'question' => 'Questo strumento è gratuito e sicuro?',
            'answer' => 'Sì, questo tester regex è completamente gratuito e non richiede registrazione. Tutto il pattern matching avviene interamente nel tuo browser tramite JavaScript — nessun dato viene inviato ad alcun server. Questo lo rende completamente sicuro e privato per testare pattern su dati sensibili come file di log, informazioni personali o codice proprietario.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'matches_placeholder' => 'Le corrispondenze verranno evidenziate qui...',
        'enter_test_string' => 'Inserisci una stringa di test sopra...',
        'zero_matches' => '0 corrispondenze',
        'one_match' => '1 corrispondenza',
        'n_matches' => '{n} corrispondenze',
        'invalid_regex' => 'Espressione Regolare Non Valida',
        'copied' => 'Regex copiata negli appunti!',
        'copy_fail' => 'Copia negli appunti non riuscita',
        'nothing_to_copy' => 'Niente da copiare. Inserisci prima un pattern regex.',
        'example_email' => 'Indirizzo Email',
        'example_url' => 'URL',
        'example_phone' => 'Numero di Telefono',
        'example_ipv4' => 'Indirizzo IPv4',
        'example_date' => 'Data (AAAA-MM-GG)',
        'example_html' => 'Tag HTML',
        'example_hex' => 'Colore Esadecimale',
    ],
];
