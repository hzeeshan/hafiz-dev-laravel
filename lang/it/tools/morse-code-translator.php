<?php

return [
    // SEO
    'title' => 'Traduttore Codice Morse - Testo in Morse e Morse in Testo Online Gratis | hafiz.dev',
    'description' => 'Traduttore codice Morse online gratuito. Converti testo in codice Morse e codice Morse in testo istantaneamente. Ascolta la riproduzione audio, regola la velocità e copia i risultati.',
    'keywords' => 'traduttore codice morse, testo in morse, morse in testo, convertitore codice morse, decodificatore morse, codificatore morse, audio codice morse, codice morse online',

    // Page content
    'h1' => 'Traduttore Codice Morse',
    'subtitle' => 'Converti testo in codice Morse e codice Morse in testo. Ascolta la riproduzione audio con velocità regolabile.',

    // UI Labels
    'translation_direction' => 'Direzione Traduzione',
    'text_to_morse' => 'Testo → Morse',
    'morse_to_text' => 'Morse → Testo',
    'your_text' => 'Il Tuo Testo',
    'morse_code' => 'Codice Morse',
    'decoded_text' => 'Testo Decodificato',
    'input_placeholder_text' => 'Digita o incolla il tuo testo qui...',
    'output_placeholder_morse' => 'Il codice Morse apparirà qui...',
    'input_placeholder_morse' => 'Inserisci il codice Morse (usa . e -, separa le lettere con spazi, le parole con /)...',
    'output_placeholder_text' => 'Il testo decodificato apparirà qui...',
    'copy' => 'Copia',
    'play' => 'Riproduci',
    'stop' => 'Stop',
    'sample' => 'Esempio',
    'clear' => 'Cancella',
    'playback_speed' => 'Velocità di Riproduzione',
    'slow' => 'Lento (5)',
    'fast' => 'Veloce (40)',
    'characters' => 'Caratteri',
    'morse_symbols' => 'Simboli Morse',
    'words' => 'Parole',

    // Reference
    'morse_reference' => 'Riferimento Codice Morse Internazionale',

    // Features
    'features' => [
        [
            'title' => 'Bidirezionale',
            'desc' => 'Traduci testo in codice Morse o decodifica codice Morse in testo. Passa tra le modalità istantaneamente con un clic.',
        ],
        [
            'title' => 'Riproduzione Audio',
            'desc' => 'Ascolta il codice Morse come segnali acustici con velocità WPM regolabile. Senti i punti e le linee come veri segnali sonori.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutto viene elaborato nel tuo browser. Nessun dato viene inviato a nessun server. Il tuo testo resta completamente privato e sicuro.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come funziona il traduttore di codice Morse?',
            'answer' => 'Lo strumento mappa ogni lettera, numero e segno di punteggiatura al suo equivalente nel Codice Morse Internazionale. Un punto (<code class="bg-darkCard px-1 rounded">.</code>) è un segnale breve e una linea (<code class="bg-darkCard px-1 rounded">-</code>) è un segnale lungo. Le lettere sono separate da spazi e le parole da <code class="bg-darkCard px-1 rounded">/</code>. Ad esempio, "SOS" diventa <code class="bg-darkCard px-1 rounded">... --- ...</code>.',
        ],
        [
            'question' => 'Posso ascoltare il codice Morse come audio?',
            'answer' => 'Sì! Clicca il pulsante Riproduci per sentire il codice Morse come segnali acustici utilizzando la Web Audio API. Un punto è un bip breve (1 unità) e una linea è un bip più lungo (3 unità). Puoi regolare la velocità di riproduzione da 5 a 40 WPM (parole al minuto) usando il cursore della velocità.',
        ],
        [
            'question' => 'Come si decodifica il codice Morse?',
            'answer' => 'Passa alla modalità "Morse → Testo", poi inserisci il codice Morse usando punti (<code class="bg-darkCard px-1 rounded">.</code>) e linee (<code class="bg-darkCard px-1 rounded">-</code>). Separa le lettere con spazi e le parole con <code class="bg-darkCard px-1 rounded">/</code>. Ad esempio, <code class="bg-darkCard px-1 rounded">.... . .-.. .-.. ---</code> si decodifica in "HELLO".',
        ],
        [
            'question' => 'Quali caratteri sono supportati?',
            'answer' => 'Il traduttore supporta tutte le 26 lettere dell\'alfabeto inglese (A-Z), le cifre (0-9) e la punteggiatura comune tra cui punto, virgola, punto interrogativo, punto esclamativo, apostrofo, due punti, punto e virgola, segno di uguale, più, meno, barra, parentesi, virgolette e il segno chiocciola (@).',
        ],
        [
            'question' => 'Cos\'è il WPM nel codice Morse?',
            'answer' => 'WPM sta per "Words Per Minute" (parole al minuto) e misura la velocità di trasmissione del codice Morse. La velocità standard è basata sulla parola "PARIS" come riferimento. 20 WPM è una velocità media per principianti, mentre gli operatori esperti possono raggiungere 30-40 WPM o più.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'copied' => 'Copiato!',
        'copied_to_clipboard' => 'Copiato negli appunti!',
        'play' => 'Riproduci',
        'stop' => 'Stop',
        'your_text' => 'Il Tuo Testo',
        'morse_code' => 'Codice Morse',
        'decoded_text' => 'Testo Decodificato',
        'input_placeholder_text' => 'Digita o incolla il tuo testo qui...',
        'output_placeholder_morse' => 'Il codice Morse apparirà qui...',
        'input_placeholder_morse' => 'Inserisci il codice Morse (usa . e -, separa le lettere con spazi, le parole con /)...',
        'output_placeholder_text' => 'Il testo decodificato apparirà qui...',
        'sample_text' => 'Ciao Mondo! SOS',
        'sample_morse' => '.... . .-.. .-.. --- / .-- --- .-. .-.. -.. -.-.-- / ... --- ...',
    ],
];
