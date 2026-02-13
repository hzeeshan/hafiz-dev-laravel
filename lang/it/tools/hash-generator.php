<?php

return [
    // SEO
    'title' => 'Generatore di Hash - MD5, SHA-1, SHA-256, SHA-512 Online | hafiz.dev',
    'description' => 'Generatore di hash online gratuito. Genera hash MD5, SHA-1, SHA-256, SHA-384, SHA-512 da testo o file. 100% lato client, sicuro e privato.',
    'keywords' => 'generatore hash, generatore md5, hash sha256, generatore sha1, hash sha512, calcolatore hash online, hash file, generatore checksum',

    // Page content
    'h1' => 'Generatore di Hash',
    'subtitle' => 'Genera hash MD5, SHA-1, SHA-256, SHA-512 istantaneamente. 100% lato client — i tuoi dati non escono mai dal tuo browser.',

    // UI Labels
    'text_input_tab' => 'Inserimento Testo',
    'file_input_tab' => 'Inserimento File',
    'text_to_hash' => 'Testo da Hashare',
    'text_placeholder' => 'Inserisci il testo per generare gli hash...',
    'file_to_hash' => 'File da Hashare',
    'drag_drop' => 'Trascina un file qui, oppure',
    'browse_files' => 'Sfoglia File',
    'remove' => 'Rimuovi',
    'output_format' => 'Formato Output',
    'lowercase' => 'Minuscolo',
    'uppercase' => 'Maiuscolo',
    'hash_results' => 'Risultati Hash',
    'copy_all_hashes' => 'Copia Tutti gli Hash',

    // Algorithm Reference
    'algorithm_reference' => 'Riferimento Algoritmi',
    'algorithm' => 'Algoritmo',
    'output_length' => 'Lunghezza Output',
    'notes' => 'Note',
    'md5_note' => 'Veloce ma crittograficamente violato, usare solo per checksum',
    'sha1_note' => 'Deprecato per la sicurezza, ancora usato per i commit git',
    'sha256_note' => 'Raccomandato per la maggior parte delle applicazioni di sicurezza',
    'sha384_note' => 'SHA-512 troncato, buon equilibrio tra sicurezza e velocità',
    'sha512_note' => 'Massima sicurezza, leggermente più lento',

    // Features
    'features' => [
        [
            'title' => 'Algoritmi Multipli',
            'desc' => 'Genera hash MD5, SHA-1, SHA-256, SHA-384 e SHA-512 simultaneamente da un singolo input.',
        ],
        [
            'title' => '100% Lato Client',
            'desc' => 'Tutto l\'hashing avviene nel tuo browser. I tuoi dati non escono mai dal tuo computer.',
        ],
        [
            'title' => 'Hashing di File',
            'desc' => 'Hash di file di qualsiasi tipo. Trascina o sfoglia per verificare l\'integrità dei file con i checksum.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Cos\'è una funzione hash?',
            'answer' => 'Una funzione hash è un algoritmo matematico che converte dati di qualsiasi dimensione in una stringa di caratteri a lunghezza fissa (l\'hash o digest). Le funzioni hash sono unidirezionali, il che significa che non è possibile invertire il processo per ottenere i dati originali. Vengono utilizzate per la verifica dell\'integrità dei dati, l\'archiviazione delle password, le firme digitali e i checksum.',
        ],
        [
            'question' => 'Qual è la differenza tra MD5, SHA-1 e SHA-256?',
            'answer' => 'MD5 produce un hash a 128 bit (32 caratteri) ed è veloce ma crittograficamente violato. SHA-1 produce un hash a 160 bit (40 caratteri) ed è deprecato per la sicurezza ma ancora usato per i commit git. SHA-256 produce un hash a 256 bit (64 caratteri) ed è raccomandato per la maggior parte delle applicazioni di sicurezza perché fornisce una forte resistenza alle collisioni.',
        ],
        [
            'question' => 'MD5 è ancora sicuro?',
            'answer' => 'No, MD5 non è sicuro per scopi crittografici. Attacchi di collisione sono stati dimostrati dal 2004, il che significa che input diversi possono produrre lo stesso hash. MD5 dovrebbe essere usato solo per scopi non legati alla sicurezza, come checksum per l\'integrità dei file (dove un attaccante non sta cercando di creare collisioni) o compatibilità con sistemi legacy. Per applicazioni di sicurezza, usa SHA-256 o SHA-512.',
        ],
        [
            'question' => 'Posso invertire un hash per ottenere il testo originale?',
            'answer' => 'No, le funzioni hash sono progettate per essere funzioni unidirezionali. Non è possibile invertire matematicamente un hash per ottenere l\'input originale. Tuttavia, password brevi o comuni possono essere trovate usando rainbow table o attacchi brute force, motivo per cui l\'hashing corretto delle password utilizza il salting e algoritmi specializzati come bcrypt o Argon2.',
        ],
        [
            'question' => 'Questo strumento è gratuito e sicuro?',
            'answer' => 'Sì, questo strumento è completamente gratuito senza limiti o registrazione. È anche sicuro perché tutto l\'hashing viene eseguito interamente nel tuo browser usando JavaScript. I tuoi dati non escono mai dal tuo computer e non vengono mai inviati a nessun server. Lo strumento utilizza la Web Crypto API per gli algoritmi SHA e un\'implementazione JavaScript per MD5.',
        ],
    ],

    // JS strings
    'js_strings' => [
        'copied' => 'Hash {algo} copiato!',
        'no_hash_to_copy' => 'Nessun hash da copiare. Inserisci del testo o seleziona un file.',
        'all_copied' => 'Tutti gli hash copiati!',
        'no_hashes_to_copy' => 'Nessun hash da copiare. Inserisci del testo o seleziona un file.',
        'copy_failed' => 'Copia negli appunti non riuscita',
        'error_hashing' => 'Errore nella generazione degli hash: ',
        'error_file' => 'Errore nell\'hashing del file: ',
        'characters' => 'caratteri',
        'processing' => 'Elaborazione...',
        'drag_drop' => 'Trascina un file qui, oppure',
        'browse_files' => 'Sfoglia File',
        'remove' => 'Rimuovi',
    ],
];
