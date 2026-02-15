<?php

return [
    // SEO
    'title' => 'Generatore Robots.txt - Crea File Robots.txt Online Gratis | hafiz.dev',
    'description' => 'Generatore robots.txt online gratuito. Crea un file robots.txt per il tuo sito con un editor visuale. Aggiungi regole di crawling, sitemap e crawl-delay per i bot dei motori di ricerca.',
    'keywords' => 'generatore robots.txt, creare robots.txt, generatore robots txt online, robots.txt creator, robots.txt generator, regole crawling',

    // Page content
    'h1' => 'Generatore Robots.txt',
    'subtitle' => 'Crea un file robots.txt con un editor visuale. Aggiungi regole per diversi bot, blocca percorsi, imposta il crawl-delay e includi l\'URL della sitemap.',

    // UI Labels
    'quick_presets' => 'Preset Rapidi',
    'allow_all' => 'Consenti Tutto',
    'block_all' => 'Blocca Tutto',
    'block_ai' => 'Blocca Bot IA',
    'bot_rule' => 'Regola Bot',
    'remove' => 'Rimuovi',
    'user_agent' => 'User-agent',
    'disallow_label' => 'Disallow (percorsi da bloccare, uno per riga)',
    'allow_label' => 'Allow (percorsi da consentire esplicitamente)',
    'crawl_delay_label' => 'Crawl-delay (secondi)',
    'add_rule' => '+ Aggiungi Altra Regola Bot',
    'sitemap_urls' => 'URL Sitemap (uno per riga)',
    'robots_output' => 'Output robots.txt',
    'copy' => 'Copia',
    'download_robots' => 'Scarica robots.txt',
    'how_to_install' => 'Come installare',
    'install_step_1' => '1. Scarica o copia il contenuto del robots.txt',
    'install_step_2' => '2. Caricalo nella directory root del tuo sito',
    'install_step_3' => '3. Verifica su',
    'install_step_4' => '4. Testa con',
    'google_robots_tool' => 'lo strumento di test Robots di Google',

    // Features
    'features' => [
        [
            'title' => 'Regole per Bot Multipli',
            'desc' => 'Crea regole separate per diversi motori di ricerca e bot. Controlla Google, Bing, crawler IA e bot social media in modo indipendente.',
        ],
        [
            'title' => 'Preset Rapidi',
            'desc' => 'Preset con un clic per WordPress, Laravel, consenti tutto, blocca tutto e blocca bot di addestramento IA. Parti da un preset e personalizza.',
        ],
        [
            'title' => 'Supporto Sitemap',
            'desc' => 'Includi uno o più URL sitemap per aiutare i motori di ricerca a scoprire tutte le tue pagine. Supporta sitemap multiple per siti grandi.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Cos\'è un file robots.txt?',
            'answer' => 'Un file robots.txt dice ai crawler dei motori di ricerca quali pagine possono o non possono accedere sul tuo sito. Si trova nella root del tuo dominio (es. esempio.com/robots.txt) e usa direttive semplici per controllare il crawling.',
        ],
        [
            'question' => 'Dove devo mettere il file robots.txt?',
            'answer' => 'Posizionalo nella root del tuo sito web così che sia raggiungibile su tuosito.com/robots.txt. Caricalo via FTP, dal pannello di controllo hosting o includilo nel deployment. Per Laravel, mettilo nella directory public/.',
        ],
        [
            'question' => 'Il robots.txt impedisce alle pagine di apparire su Google?',
            'answer' => 'Non completamente. Il robots.txt previene il crawling, ma Google può comunque indicizzare l\'URL se altre pagine lo linkano. Per prevenire completamente l\'indicizzazione, usa il meta tag noindex o l\'header X-Robots-Tag.',
        ],
        [
            'question' => 'Cos\'è il crawl-delay?',
            'answer' => 'Il crawl-delay dice ai bot di aspettare X secondi tra le richieste per evitare il sovraccarico del server. Bing e Yandex lo rispettano, ma Googlebot lo ignora — usa le impostazioni di velocità di scansione di Google Search Console.',
        ],
        [
            'question' => 'Devo aggiungere la sitemap al robots.txt?',
            'answer' => 'Sì! Aggiungere una direttiva Sitemap aiuta i motori di ricerca a scoprire la tua sitemap XML più velocemente. È particolarmente utile se non l\'hai inviata manualmente tramite Google Search Console o Bing Webmaster Tools.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'generated_comment' => '# robots.txt generato da hafiz.dev/it/strumenti/generatore-robots-txt',
        'downloaded' => 'robots.txt scaricato',
        'copied' => 'Copiato!',
        'bot_rule_prefix' => 'Regola Bot #',
        'remove' => 'Rimuovi',
        'user_agent' => 'User-agent',
        'disallow_label' => 'Disallow (percorsi da bloccare, uno per riga)',
        'allow_label' => 'Allow (percorsi da consentire esplicitamente)',
        'crawl_delay_label' => 'Crawl-delay (secondi)',
    ],
];
