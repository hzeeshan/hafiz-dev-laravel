<?php

return [
    // SEO
    'title' => 'Calcolatore Chmod - Calcolatore Permessi File Linux Online Gratis | hafiz.dev',
    'description' => 'Calcolatore chmod online gratuito. Calcola i permessi dei file Linux con una griglia interattiva. Converti tra notazione simbolica (rwxr-xr-x) e ottale (755) istantaneamente.',
    'keywords' => 'calcolatore chmod, chmod calculator, calcolatore permessi linux, permessi file linux, chmod 755, chmod 644, permessi unix',

    // Page content
    'h1' => 'Calcolatore Chmod',
    'subtitle' => 'Calcola i permessi dei file Linux in modo interattivo. Converti tra notazione ottale (755) e simbolica (rwxr-xr-x) con una griglia visuale.',

    // UI Labels
    'octal_code' => 'Codice Permesso Ottale',
    'read' => 'Lettura (4)',
    'write' => 'Scrittura (2)',
    'execute' => 'Esecuzione (1)',
    'octal' => 'Ottale',
    'owner' => 'Proprietario',
    'owner_user' => 'Utente',
    'group' => 'Gruppo',
    'others' => 'Altri',
    'others_public' => 'Pubblico',
    'result_octal' => 'Ottale',
    'result_symbolic' => 'Simbolico',
    'result_command' => 'Comando chmod',
    'result_filetype' => 'Tipo File',
    'common_presets' => 'Preset Comuni',
    'dirs' => 'cartelle',
    'files' => 'file',
    'private' => 'privato',
    'ssh_keys' => 'chiavi ssh',
    'shared' => 'condiviso',
    'read_only' => 'sola lettura',
    'dangerous' => '⚠ pericoloso',
    'none' => 'nessuno',
    'permission_reference' => 'Riferimento Permessi',
    'ref_octal' => 'Ottale',
    'ref_symbolic' => 'Simbolico',
    'ref_permissions' => 'Permessi',
    'ref_common_use' => 'Uso Comune',
    'ref_rwx' => 'Lettura + Scrittura + Esecuzione',
    'ref_rw' => 'Lettura + Scrittura',
    'ref_rx' => 'Lettura + Esecuzione',
    'ref_r' => 'Solo Lettura',
    'ref_wx' => 'Scrittura + Esecuzione',
    'ref_w' => 'Solo Scrittura',
    'ref_x' => 'Solo Esecuzione',
    'ref_none' => 'Nessun permesso',
    'ref_use_owner_dirs' => 'Proprietario delle cartelle',
    'ref_use_owner_files' => 'Proprietario dei file regolari',
    'ref_use_group_dirs' => 'Gruppo/altri per le cartelle',
    'ref_use_group_files' => 'Gruppo/altri per i file',
    'ref_use_wx' => 'Usato raramente',
    'ref_use_w' => 'Usato raramente',
    'ref_use_x' => 'Script con restrizioni',
    'ref_use_none' => 'Accesso bloccato',

    // Features
    'features' => [
        [
            'title' => 'Permessi Visuali',
            'desc' => 'Griglia interattiva con checkbox per comprendere e impostare facilmente i permessi per proprietario, gruppo e altri. Codice colore per maggiore chiarezza.',
        ],
        [
            'title' => 'Preset Rapidi',
            'desc' => 'Preset con un clic per i permessi più comuni: 755 per cartelle, 644 per file, 600 per chiavi SSH, con avvisi di sicurezza per impostazioni rischiose.',
        ],
        [
            'title' => 'Copia con un Clic',
            'desc' => 'Clicca su qualsiasi valore per copiarlo istantaneamente. Ottieni il codice ottale, la notazione simbolica o il comando chmod completo pronto da incollare nel terminale.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Cosa significa chmod 755?',
            'answer' => 'chmod 755 dà al proprietario i permessi completi (lettura, scrittura, esecuzione = 7), mentre gruppo e altri ottengono lettura ed esecuzione (5). In notazione simbolica: rwxr-xr-x. È lo standard per cartelle e script eseguibili.',
        ],
        [
            'question' => 'Cosa significa chmod 644?',
            'answer' => 'chmod 644 dà al proprietario lettura e scrittura (6), mentre gruppo e altri possono solo leggere (4). Simbolico: rw-r--r--. È lo standard per file regolari come HTML, CSS, PHP, immagini e file di configurazione.',
        ],
        [
            'question' => 'Come funzionano i permessi dei file Linux?',
            'answer' => 'Ogni file ha tre gruppi di permessi: proprietario, gruppo e altri. Ogni gruppo può avere permessi di lettura (r=4), scrittura (w=2) ed esecuzione (x=1). Somma i valori: rwx = 4+2+1 = 7, r-x = 4+0+1 = 5, r-- = 4+0+0 = 4.',
        ],
        [
            'question' => 'Qual è la differenza tra notazione simbolica e ottale?',
            'answer' => 'La notazione ottale usa cifre 0-7 (es. 755) dove ogni posizione è proprietario, gruppo, altri. La notazione simbolica usa lettere r, w, x con trattini (es. rwxr-xr-x). Entrambe rappresentano gli stessi permessi — l\'ottale si usa con i comandi chmod, la simbolica è mostrata da ls -la.',
        ],
        [
            'question' => 'Perché dovrei evitare chmod 777?',
            'answer' => 'chmod 777 dà a tutti gli utenti i permessi completi di lettura, scrittura ed esecuzione. Questo è un grave rischio di sicurezza — qualsiasi utente nel sistema può modificare, eliminare o eseguire il file. Usa 755 per cartelle e script, 644 per file regolari.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'copied_prefix' => 'Copiato: ',
        'warn_777' => 'chmod 777 è un rischio di sicurezza! Tutti gli utenti possono leggere, scrivere ed eseguire. Usa 755 per le cartelle o 644 per i file.',
        'warn_666' => 'chmod 666 permette a tutti gli utenti di leggere e scrivere. Considera 644 (scrittura solo proprietario, altri sola lettura).',
        'warn_world_writable' => 'I file scrivibili da tutti sono un rischio di sicurezza. Gli utenti pubblici possono modificare questo file.',
        'warn_000' => 'Nessuno può accedere a questo file, nemmeno il proprietario. Servirà root (sudo) per cambiare i permessi.',
    ],
];
