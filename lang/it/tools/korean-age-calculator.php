<?php

return [
    // SEO
    'title' => 'Calcolatore Età Coreana - Calcola la Tua Età Coreana Online Gratis | hafiz.dev',
    'description' => 'Calcolatore età coreana online gratuito. Scopri la tua età coreana, età internazionale e la differenza tra le due. Scopri come funziona il sistema coreano. 100% lato client.',
    'keywords' => 'calcolatore età coreana, età coreana, calcolare età coreana, sistema età coreano, quanti anni ho in corea, età coreana vs età internazionale, convertitore età coreana',

    // Page content
    'h1' => 'Calcolatore Età Coreana',
    'subtitle' => 'Calcola la tua età coreana, l\'età internazionale e scopri la differenza. Impara come funziona il sistema tradizionale coreano.',

    // UI Labels
    'date_of_birth' => 'Data di Nascita',
    'reference_date' => 'Data di Riferimento',
    'calculate_age' => 'Calcola Età',
    'reset' => 'Reimposta',
    'korean_age' => 'Età Coreana',
    'international_age' => 'Età Internazionale',
    'difference' => 'Differenza',
    'years_old' => 'anni',
    'year_s' => 'anno/i',
    'how_calculated' => 'Come Viene Calcolata',
    'birth_year' => 'Anno di Nascita',
    'current_year' => 'Anno Corrente',
    'formula' => 'Formula',
    'age_details' => 'Dettagli Età',
    'birthday_this_year' => 'Compleanno quest\'anno',
    'zodiac_sign' => 'Segno Zodiacale',
    'why_difference' => 'Perché la Differenza?',
    'summary' => 'Riepilogo',
    'copy' => 'Copia',

    // Features
    'features' => [
        [
            'title' => 'Sistema Età Coreano',
            'desc' => 'Calcola la tua età usando il sistema tradizionale coreano dove hai 1 anno alla nascita e guadagni un anno ogni 1° gennaio.',
        ],
        [
            'title' => 'Confronto Affiancato',
            'desc' => 'Visualizza la tua età coreana, l\'età internazionale e la differenza esatta tra le due a colpo d\'occhio.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutto funziona nel tuo browser. Nessun dato viene inviato ad alcun server. La tua data di nascita resta completamente privata.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come funziona l\'età coreana?',
            'answer' => 'Nel sistema tradizionale coreano, un neonato è considerato di 1 anno alla nascita (contando il tempo nel grembo materno). Tutti guadagnano un anno il 1° gennaio, indipendentemente dal loro compleanno effettivo. Questo significa che un bambino nato il 31 dicembre diventerà di 2 anni il giorno successivo, il 1° gennaio. La formula è semplice: <code class="bg-darkCard px-1 rounded">Età Coreana = Anno Corrente - Anno di Nascita + 1</code>.',
        ],
        [
            'question' => 'Qual è la differenza tra età coreana e età internazionale?',
            'answer' => 'L\'età coreana è tipicamente 1-2 anni superiore all\'età internazionale. Se hai già festeggiato il compleanno nell\'anno in corso, la differenza è di 1 anno. Se il tuo compleanno non è ancora passato, la differenza è di 2 anni. L\'età internazionale (usata nella maggior parte dei paesi) parte da 0 alla nascita e aumenta nel giorno del compleanno effettivo.',
        ],
        [
            'question' => 'La Corea del Sud usa ancora l\'età coreana?',
            'answer' => 'La Corea del Sud ha adottato ufficialmente il sistema di età internazionale per scopi legali e amministrativi nel giugno 2023. Tuttavia, l\'età coreana (만 나이 vs 세는 나이) è ancora profondamente radicata nella cultura coreana e ampiamente usata nelle conversazioni quotidiane, nelle gerarchie sociali e nei contesti informali.',
        ],
        [
            'question' => 'Come posso calcolare velocemente la mia età coreana?',
            'answer' => 'La formula più rapida: prendi l\'anno corrente, sottrai il tuo anno di nascita e aggiungi 1. Per esempio, se sei nato nel 1995 ed è il 2026: 2026 - 1995 + 1 = 32 di età coreana. La tua età internazionale sarebbe 30 o 31 a seconda che il tuo compleanno sia già passato.',
        ],
        [
            'question' => 'Altri paesi usano un sistema di età simile?',
            'answer' => 'Storicamente, sistemi di conteggio dell\'età simili esistevano in Cina, Giappone, Vietnam e altri paesi dell\'Asia orientale. Tuttavia, la maggior parte di questi paesi ha poi adottato il sistema di età internazionale. La Corea del Sud è stato l\'ultimo grande paese a usare ufficialmente il sistema tradizionale prima del passaggio nel 2023.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'alert_no_birth' => 'Inserisci una data di nascita.',
        'alert_future_date' => 'La data di nascita non può essere successiva alla data di riferimento.',
        'years_old' => 'anni',
        'already_passed' => 'Già passato',
        'not_yet' => 'Non ancora',
        'year' => 'anno',
        'years' => 'anni',
        'explanation_passed' => 'La tua età coreana è {diff} {yearWord} in più rispetto alla tua età internazionale. Poiché il tuo compleanno è già passato quest\'anno, la differenza è di {diff} {yearWord}.',
        'explanation_not_passed' => 'La tua età coreana è {diff} {yearWord} in più rispetto alla tua età internazionale. Poiché il tuo compleanno non è ancora passato quest\'anno, la differenza è di {diff} {yearWord} — non hai ancora compiuto {nextAge} anni a livello internazionale, ma l\'età coreana conta già quest\'anno.',
        'born' => 'Nato',
        'korean_age_label' => 'Età Coreana',
        'international_age_label' => 'Età Internazionale',
        'difference_label' => 'Differenza',
        'formula_label' => 'Formula',
        'zodiac_label' => 'Zodiaco',
        'copied' => 'Copiato!',
        'copied_to_clipboard' => 'Copiato negli appunti!',
        'month_january' => 'Gennaio',
        'month_february' => 'Febbraio',
        'month_march' => 'Marzo',
        'month_april' => 'Aprile',
        'month_may' => 'Maggio',
        'month_june' => 'Giugno',
        'month_july' => 'Luglio',
        'month_august' => 'Agosto',
        'month_september' => 'Settembre',
        'month_october' => 'Ottobre',
        'month_november' => 'Novembre',
        'month_december' => 'Dicembre',
        'zodiac_capricorn' => 'Capricorno',
        'zodiac_aquarius' => 'Acquario',
        'zodiac_pisces' => 'Pesci',
        'zodiac_aries' => 'Ariete',
        'zodiac_taurus' => 'Toro',
        'zodiac_gemini' => 'Gemelli',
        'zodiac_cancer' => 'Cancro',
        'zodiac_leo' => 'Leone',
        'zodiac_virgo' => 'Vergine',
        'zodiac_libra' => 'Bilancia',
        'zodiac_scorpio' => 'Scorpione',
        'zodiac_sagittarius' => 'Sagittario',
    ],
];
