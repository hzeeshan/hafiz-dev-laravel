<?php

return [
    // SEO
    'title' => 'Calcolatore Velocità di Riproduzione - Calcola Tempo Video e Podcast Gratis | hafiz.dev',
    'description' => 'Calcolatore velocità di riproduzione gratuito. Calcola quanto dura qualsiasi video, podcast o lezione a diverse velocità. Scopri il tempo di visione a 1x, 1.5x, 2x e velocità personalizzate.',
    'keywords' => 'calcolatore velocità riproduzione, calcolatore velocità video, calcolatore velocità podcast, tempo di visione, calcolatore velocità lezione, velocità 2x, quanto dura a 1.5x',

    // Page content
    'h1' => 'Calcolatore Velocità di Riproduzione',
    'subtitle' => 'Calcola quanto dura qualsiasi video, podcast o lezione a diverse velocità di riproduzione. Inserisci la durata totale e confronta i tempi di visione a diverse velocità.',

    // UI Labels
    'media_type' => 'Tipo di Media',
    'video' => 'Video',
    'podcast' => 'Podcast',
    'lecture' => 'Lezione',
    'course' => 'Corso',
    'audiobook' => 'Audiolibro',
    'original_duration' => 'Durata Originale',
    'hours' => 'Ore',
    'minutes' => 'Minuti',
    'seconds' => 'Secondi',
    'number_of_items' => 'Numero di Elementi (opzionale)',
    'items_description' => 'Quanti episodi, video o lezioni?',
    'items_help' => 'Imposta un valore maggiore di 1 se vuoi calcolare il tempo totale per una playlist, corso o serie podcast dove ogni elemento ha la stessa durata.',
    'custom_speed' => 'Velocità Personalizzata',
    'calculate' => 'Calcola',
    'sample' => 'Esempio',
    'copy' => 'Copia',
    'download' => 'Scarica',
    'your_watch_time' => 'Il Tuo Tempo di Visione',
    'at_speed' => 'a',
    'speed_label' => 'velocità',
    'saving' => 'risparmi',
    'total_for' => 'Totale per',
    'items_word' => 'elementi',
    'each' => 'ciascuno',
    'speed_comparison' => 'Confronto Velocità',
    'speed' => 'Velocità',
    'watch_time' => 'Tempo di Visione',
    'time_saved' => 'Tempo Risparmiato',
    'pct_saved' => '% Risparmiato',
    'original_length' => 'Durata Originale',
    'total_minutes' => 'Minuti Totali',
    'at_15x_speed' => 'A 1.5x',
    'at_2x_speed' => 'A 2x',
    'original_stat' => 'Originale',
    'custom_speed_stat' => 'Velocità Personalizzata',
    'time_saved_stat' => 'Tempo Risparmiato',

    // Features
    'features' => [
        [
            'title' => 'Confronto Velocità Istantaneo',
            'desc' => 'Visualizza i tempi di visione da 0.75x a 3x affiancati. Confronta quanto tempo risparmi a ogni velocità con un solo clic.',
        ],
        [
            'title' => 'Funziona per Qualsiasi Media',
            'desc' => 'Calcola le velocità per video YouTube, podcast, corsi online, lezioni, audiolibri, webinar e qualsiasi contenuto con riproduzione regolabile.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutti i calcoli avvengono nel tuo browser. Nessun dato viene inviato a nessun server. Le tue abitudini di visione restano completamente private.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come influisce la velocità di riproduzione sul tempo di visione?',
            'answer' => 'La velocità di riproduzione divide direttamente la durata originale. A 2x, il contenuto viene riprodotto due volte più velocemente, quindi un video di 1 ora dura 30 minuti. A 1.5x, lo stesso video dura 40 minuti. La formula è semplice: tempo di visione = durata originale / velocità di riproduzione. Le velocità più lente come 0.75x allungano il contenuto, utile per materiale complesso.',
        ],
        [
            'question' => 'Qual è la velocità di riproduzione migliore per studiare?',
            'answer' => 'Gli studi suggeriscono che 1.5x è la velocità ottimale per la maggior parte dei contenuti educativi. La comprensione resta alta mentre risparmi un terzo del tempo. Per materiale complesso o tecnico, 1x-1.25x permette una migliore ritenzione. Per sessioni di ripasso o argomenti familiari, 1.75x-2x funziona bene. Inizia a una velocità comoda e aumenta gradualmente.',
        ],
        [
            'question' => 'Quanto tempo risparmio guardando a 2x?',
            'answer' => 'A 2x risparmi esattamente la metà del tempo originale. Una lezione di 60 minuti diventa 30 minuti. Un corso online di 20 ore diventa 10 ore. In un intero semestre con 40 ore di lezioni registrate, risparmi 20 ore. Anche a 1.5x risparmi un terzo, trasformando 40 ore in circa 27.',
        ],
        [
            'question' => 'Quali velocità di riproduzione supportano YouTube, Spotify e le altre app?',
            'answer' => 'YouTube supporta da 0.25x a 2x (con velocità personalizzate tramite gli strumenti sviluppatore). Spotify supporta da 0.5x a 3.5x per i podcast. Apple Podcasts supporta da 0.5x a 2x. Audible supporta da 0.5x a 3.5x. VLC e la maggior parte dei player desktop supportano da 0.25x a 4x o superiori. Questo calcolatore copre l\'intera gamma da 0.25x a 4x.',
        ],
        [
            'question' => 'Posso calcolare il tempo per un\'intera playlist o corso?',
            'answer' => 'Sì. Usa il campo "Numero di Elementi" per moltiplicare la durata. Se hai 30 lezioni da 45 minuti ciascuna, inserisci 45 minuti e imposta gli elementi a 30. Il calcolatore mostrerà il tempo totale per tutti gli elementi a ogni velocità. Per elementi con durate diverse, inserisci direttamente la durata totale.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'video' => 'Video',
        'podcast' => 'Podcast',
        'lecture' => 'Lezione',
        'course' => 'Corso',
        'audiobook' => 'Audiolibro',
        'original' => 'originale',
        'slower' => 'più lento',
        'custom' => 'personalizzata',
        'none' => 'Nessuno',
        'total_for' => 'Totale per',
        'items' => 'elementi',
        'each' => 'ciascuno',
        'error_invalid' => 'Inserisci una durata valida (almeno 1 secondo).',
        'error_calculate_first_copy' => 'Calcola prima di copiare.',
        'error_calculate_first_download' => 'Calcola prima di scaricare.',
        'copied' => 'Copiato!',
        'copied_to_clipboard' => 'Copiato negli appunti!',
        'downloaded' => 'Scaricato playback-speed-calculation.txt',
        'summary_title' => 'Risultati Calcolatore Velocità Riproduzione',
        'media_type_label' => 'Tipo di Media',
        'original_length' => 'Durata Originale',
        'items_label' => 'Elementi',
        'x_each' => 'ciascuno',
        'speed_header' => 'Velocità',
        'watch_time' => 'Tempo Visione',
        'time_saved' => 'Tempo Risparmiato',
        'pct_saved' => '% Risparmiato',
        'custom_speed_note' => '* Velocità personalizzata',
        'generated_at' => 'Generato su hafiz.dev/tools/playback-speed-calculator',
    ],
];
