<?php

return [
    // SEO
    'title' => 'Convertitore Testo in Binario - Converti Testo in Codice Binario Gratis | hafiz.dev',
    'description' => 'Convertitore online gratuito da testo a binario. Converti testo in codice binario e binario in testo istantaneamente. Supporta codifica ASCII e UTF-8 con più formati di output.',
    'keywords' => 'testo in binario, convertitore testo binario, convertire testo in binario, binario in testo, convertitore binario, traduttore binario, codice binario online',

    // Page content
    'h1' => 'Convertitore Testo in Binario',
    'subtitle' => 'Converti testo in codice binario e binario in testo istantaneamente. Supporta codifica ASCII e UTF-8 con più formati di output.',

    // Options
    'encoding' => 'Codifica',
    'separator' => 'Separatore',
    'output_format' => 'Formato Output',
    'space' => 'Spazio',
    'double_space' => 'Doppio Spazio',
    'new_line' => 'A capo',
    'comma' => 'Virgola',
    'none' => 'Nessuno',
    'add_prefix' => 'Aggiungi prefisso (0b / 0x / 0o)',

    // Direction
    'text_to_binary' => 'Testo → Binario',

    // Labels
    'text_input' => 'Testo di Input',
    'binary_output' => 'Output Binario',
    'text_placeholder' => 'Digita o incolla il tuo testo qui...',
    'binary_placeholder' => 'Il codice binario apparirà qui...',

    // Buttons
    'convert' => 'Converti',
    'swap_direction' => 'Inverti Direzione',
    'copy' => 'Copia',
    'sample' => 'Esempio',
    'clear' => 'Cancella',

    // Stats
    'characters' => 'Caratteri',
    'bytes' => 'Byte',
    'total_bits' => 'Bit Totali',
    'encoding_label' => 'Codifica',

    // Breakdown
    'character_breakdown' => 'Dettaglio Caratteri',
    'first_50' => '(primi 50 caratteri)',
    'char' => 'Car.',
    'decimal' => 'Decimale',
    'hex' => 'Esadecimale',
    'octal' => 'Ottale',
    'binary' => 'Binario',

    // Features
    'features' => [
        [
            'title' => 'Bidirezionale',
            'desc' => 'Converti testo in binario e viceversa. Clicca il pulsante Inverti per cambiare direzione istantaneamente. Supporta anche input decimale, esadecimale e ottale.',
        ],
        [
            'title' => 'Supporto UTF-8',
            'desc' => 'Gestisci qualsiasi carattere inclusi emoji, lettere accentate e scritture internazionali. La codifica UTF-8 preserva correttamente i caratteri multi-byte.',
        ],
        [
            'title' => 'Dettaglio Caratteri',
            'desc' => 'Visualizza una tabella dettagliata con i valori decimale, esadecimale, ottale e binario di ogni carattere affiancati.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come si converte il testo in binario?',
            'answer' => 'Digita o incolla il tuo testo nel campo di input e lo strumento converte istantaneamente ogni carattere nella sua rappresentazione binaria. Ogni carattere ASCII diventa un numero binario a 8 bit. Ad esempio, <code class="bg-darkCard px-1 rounded">A</code> diventa <code class="bg-darkCard px-1 rounded">01000001</code> e <code class="bg-darkCard px-1 rounded">Hello</code> diventa <code class="bg-darkCard px-1 rounded">01001000 01100101 01101100 01101100 01101111</code>.',
        ],
        [
            'question' => 'Cos\'è il codice binario?',
            'answer' => 'Il codice binario è un sistema numerico che utilizza solo due cifre: 0 e 1. I computer usano il binario per memorizzare ed elaborare tutti i dati. Ogni cifra binaria si chiama "bit", e 8 bit formano un "byte" che può rappresentare un carattere ASCII (valori 0–255). Il binario è il linguaggio fondamentale di tutta l\'elettronica digitale.',
        ],
        [
            'question' => 'Posso convertire il binario in testo?',
            'answer' => 'Sì! Clicca il pulsante "Inverti Direzione" per passare alla modalità Binario → Testo. Incolla il codice binario (gruppi di 8 bit separati da spazi come <code class="bg-darkCard px-1 rounded">01001000 01101001</code>) nel campo di input e verrà convertito istantaneamente in testo leggibile.',
        ],
        [
            'question' => 'Qual è il codice binario della lettera A?',
            'answer' => 'La lettera <code class="bg-darkCard px-1 rounded">A</code> maiuscola è <code class="bg-darkCard px-1 rounded">01000001</code> in binario (decimale 65). La lettera <code class="bg-darkCard px-1 rounded">a</code> minuscola è <code class="bg-darkCard px-1 rounded">01100001</code> (decimale 97). La differenza tra maiuscole e minuscole in binario è sempre il sesto bit (bit 5).',
        ],
        [
            'question' => 'Questo strumento supporta emoji e caratteri speciali?',
            'answer' => 'Sì! Seleziona la codifica "UTF-8" per gestire tutti i caratteri Unicode inclusi emoji, lettere accentate (é, ü, ñ) e caratteri di altre scritture (cinese, arabo, cirillico). In UTF-8 ogni carattere può usare da 1 a 4 byte a seconda del code point.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'text_to_binary' => 'Testo → Binario',
        'binary_to_text' => 'Binario → Testo',
        'text_input' => 'Testo di Input',
        'binary_output' => 'Output Binario',
        'binary_input' => 'Input Binario',
        'text_output' => 'Output Testo',
        'text_placeholder' => 'Digita o incolla il tuo testo qui...',
        'binary_placeholder' => 'Il codice binario apparirà qui...',
        'binary_input_placeholder' => 'Incolla il codice binario qui (es. 01001000 01101001)...',
        'decoded_placeholder' => 'Il testo decodificato apparirà qui...',
        'nothing_to_copy' => 'Niente da copiare',
        'copied' => 'Copiato!',
        'converted_chars' => '{count} caratteri convertiti in {format}',
        'converted_bytes' => '{count} byte convertiti in testo',
        'invalid_input' => 'Input non valido: ',
    ],
];
