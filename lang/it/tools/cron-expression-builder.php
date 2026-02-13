<?php

return [
    // SEO
    'title' => 'Generatore di Espressioni Cron - Crea e Valida Cron Online Gratis | hafiz.dev',
    'description' => 'Generatore e validatore di espressioni cron online gratuito. Crea, testa e comprendi le pianificazioni cron facilmente. Visualizza le prossime esecuzioni istantaneamente. Perfetto per Laravel, Linux e DevOps.',
    'keywords' => 'generatore espressioni cron, generatore cron, generatore crontab, costruttore cron, validatore cron, parser cron, scheduler laravel, cron online gratis',

    // Page content
    'h1' => 'Generatore di Espressioni Cron',
    'subtitle' => 'Crea e valida espressioni cron con un\'interfaccia visuale intuitiva. Visualizza descrizioni leggibili e le prossime esecuzioni pianificate istantaneamente.',

    // Expression input
    'cron_expression' => 'Espressione Cron',
    'copy' => 'Copia',
    'min' => 'min',
    'hour' => 'ora',
    'day' => 'giorno',
    'month' => 'mese',
    'dow' => 'gds',

    // Description
    'every_minute' => 'Ogni minuto',

    // Error
    'invalid_cron' => 'Espressione Cron Non Valida',

    // Visual builder
    'visual_builder' => 'Costruttore Visuale',
    'minute_label' => 'Minuto',
    'hour_label' => 'Ora',
    'day_of_month_label' => 'Giorno del Mese',
    'month_label' => 'Mese',
    'day_of_week_label' => 'Giorno della Settimana',

    // Select options
    'every_minute_opt' => 'Ogni minuto (*)',
    'every_n_minutes' => 'Ogni N minuti',
    'specific_minute' => 'Minuto specifico',
    'range' => 'Intervallo',
    'list' => 'Lista',
    'every_hour_opt' => 'Ogni ora (*)',
    'every_n_hours' => 'Ogni N ore',
    'specific_hour' => 'Ora specifica',
    'every_day_opt' => 'Ogni giorno (*)',
    'every_n_days' => 'Ogni N giorni',
    'specific_day' => 'Giorno specifico',
    'every_month_opt' => 'Ogni mese (*)',
    'every_n_months' => 'Ogni N mesi',
    'specific_month' => 'Mese specifico',
    'every_dow_opt' => 'Ogni giorno (*)',
    'specific_dow' => 'Giorno specifico',

    // Common presets
    'common_presets' => 'Preset Comuni',
    'preset_every_minute' => 'Ogni minuto',
    'preset_every_5_minutes' => 'Ogni 5 minuti',
    'preset_every_hour' => 'Ogni ora',
    'preset_daily_midnight' => 'Ogni giorno a mezzanotte',
    'preset_daily_9am' => 'Ogni giorno alle 9',
    'preset_monday_9am' => 'Lunedì alle 9',
    'preset_weekdays_9am' => 'Giorni feriali alle 9',
    'preset_monthly' => 'Mensile (1°)',
    'preset_sunday_midnight' => 'Domenica a mezzanotte',

    // Next run times
    'next_5_runs' => 'Prossime 5 Esecuzioni',
    'calculating' => 'Calcolo in corso...',
    'times_in_local' => 'Orari mostrati nel tuo fuso orario locale',

    // Laravel usage
    'laravel_usage' => 'Uso in Laravel',
    'or_using_helpers' => 'Oppure usando gli helper di Laravel:',

    // Reference card
    'field_reference' => 'Riferimento Campi Cron',
    'field' => 'Campo',
    'values' => 'Valori',
    'special_chars' => 'Caratteri Speciali',
    'every_value' => 'Ogni valore',
    'list_desc' => 'Lista (1,3,5)',
    'range_desc' => 'Intervallo (1-5)',
    'step_desc' => 'Passo (*/5)',

    // Features
    'features' => [
        [
            'title' => '100% Lato Client',
            'desc' => 'Tutta l\'elaborazione avviene nel tuo browser. I tuoi dati non toccano mai i nostri server.',
        ],
        [
            'title' => 'Gratuito e Senza Registrazione',
            'desc' => 'Usa senza limiti e senza creare un account. Nessuna pubblicità, nessun tracciamento.',
        ],
        [
            'title' => 'Risultati Istantanei',
            'desc' => 'Crea e valida espressioni cron istantaneamente con aggiornamenti in tempo reale.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Cos\'è un\'espressione cron?',
            'answer' => 'Un\'espressione cron è una stringa di 5 campi che rappresenta una pianificazione. Viene usata nei sistemi Unix/Linux e in molti framework come Laravel per pianificare attività ricorrenti. Ogni campo rappresenta un\'unità di tempo: minuto (0-59), ora (0-23), giorno del mese (1-31), mese (1-12) e giorno della settimana (0-6, dove 0 è Domenica).',
        ],
        [
            'question' => 'Cosa significa ogni campo?',
            'answer' => 'I 5 campi sono: <strong>Minuto</strong> (0-59), <strong>Ora</strong> (0-23), <strong>Giorno del Mese</strong> (1-31), <strong>Mese</strong> (1-12) e <strong>Giorno della Settimana</strong> (0-6 dove 0 è Domenica). Ogni campo può contenere valori specifici, intervalli (1-5), liste (1,3,5) o caratteri jolly (*).',
        ],
        [
            'question' => 'Cosa significa * nel cron?',
            'answer' => 'L\'asterisco (*) significa "ogni" valore per quel campo. Ad esempio, * nel campo minuto significa "ogni minuto", e * nel campo ora significa "ogni ora". Quindi <code class="text-gold bg-darkBg px-1 rounded">* * * * *</code> viene eseguito ogni minuto di ogni ora di ogni giorno.',
        ],
        [
            'question' => 'Cosa significa */5?',
            'answer' => 'La sintassi <code class="text-gold bg-darkBg px-1 rounded">*/5</code> significa "ogni 5° valore". Quindi <code class="text-gold bg-darkBg px-1 rounded">*/5</code> nel campo minuti significa ogni 5 minuti (0, 5, 10, 15, 20...). Allo stesso modo, <code class="text-gold bg-darkBg px-1 rounded">*/2</code> nelle ore significa ogni 2 ore, e <code class="text-gold bg-darkBg px-1 rounded">*/3</code> nei mesi significa ogni 3 mesi.',
        ],
        [
            'question' => 'Come si usa in Laravel?',
            'answer' => 'In Laravel, usa <code class="text-gold bg-darkBg px-1 rounded">$schedule->command(\'nome\')->cron(\'* * * * *\')</code> nel file <code class="text-light bg-darkBg px-1 rounded">app/Console/Kernel.php</code>. Laravel fornisce anche metodi helper comodi come <code class="text-gold bg-darkBg px-1 rounded">->daily()</code>, <code class="text-gold bg-darkBg px-1 rounded">->hourly()</code>, <code class="text-gold bg-darkBg px-1 rounded">->weekdays()</code> e <code class="text-gold bg-darkBg px-1 rounded">->at(\'09:00\')</code> per le pianificazioni più comuni.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'copy' => 'Copia',
        'copied' => 'Copiato!',
        'every_minute' => 'Ogni minuto',
        'every_n_minutes' => 'Ogni {n} minuti',
        'at_minute_of' => 'Al minuto {m} di ogni ora',
        'at' => 'Alle',
        'at_minute_past' => 'Al {m} dopo le {h}',
        'every_hour' => 'ogni ora',
        'every_n_hours' => 'ogni {n} ore',
        'to' => 'a',
        'on_days' => 'nei giorni {d} del mese',
        'on_days_range' => 'nei giorni {s}-{e} del mese',
        'every_n_days' => 'ogni {n} giorni',
        'on_the' => 'il {d}',
        'through' => 'fino a',
        'in_months' => 'in {m}',
        'every_n_months' => 'ogni {n} mesi',
        'on' => 'il',
        'invalid_expression' => 'Espressione non valida',
        'invalid_cron' => 'Espressione Cron Non Valida',
        'must_have_5_fields' => 'L\'espressione cron deve avere esattamente 5 campi',
        'invalid_step' => 'Valore di passo non valido in {f}: {v}',
        'invalid_range' => 'Intervallo non valido in {f}: {v}',
        'invalid_value' => 'Valore non valido in {f}: {v} (deve essere {min}-{max})',
        'no_upcoming' => 'Nessuna esecuzione futura trovata',
        'calculating' => 'Calcolo in corso...',
        'times_in_local' => 'Orari nel tuo fuso orario locale',
        'or_using_helpers' => 'Oppure usando gli helper di Laravel:',
        'every_value' => 'Ogni valore',
        'list' => 'Lista (1,3,5)',
        'range' => 'Intervallo (1-5)',
        'step' => 'Passo (*/5)',
        'minute' => 'minuto',
        'minute_label' => 'Minuto',
        'hour_label' => 'Ora',
        'day_of_month_label' => 'Giorno del Mese',
        'month_label' => 'Mese',
        'day_of_week_label' => 'Giorno della Settimana',
        // Day names
        'sunday' => 'Domenica',
        'monday' => 'Lunedì',
        'tuesday' => 'Martedì',
        'wednesday' => 'Mercoledì',
        'thursday' => 'Giovedì',
        'friday' => 'Venerdì',
        'saturday' => 'Sabato',
        // Month names
        'january' => 'Gennaio',
        'february' => 'Febbraio',
        'march' => 'Marzo',
        'april' => 'Aprile',
        'may' => 'Maggio',
        'june' => 'Giugno',
        'july' => 'Luglio',
        'august' => 'Agosto',
        'september' => 'Settembre',
        'october' => 'Ottobre',
        'november' => 'Novembre',
        'december' => 'Dicembre',
        // Ordinal (Italian uses °)
        'ordinal_st' => '°',
        'ordinal_nd' => '°',
        'ordinal_rd' => '°',
        'ordinal_th' => '°',
        // Date locale
        'date_locale' => 'it-IT',
    ],
];
