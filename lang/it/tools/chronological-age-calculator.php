<?php

return [
    // SEO
    'title' => 'Calcolatore Età Cronologica - Età Esatta in Anni, Mesi, Giorni | hafiz.dev',
    'description' => 'Calcolatore età cronologica online gratuito. Calcola la tua età esatta in anni, mesi, giorni, ore, minuti e secondi. Trova il conto alla rovescia al prossimo compleanno e il segno zodiacale. 100% lato client.',
    'keywords' => 'calcolatore età, calcola età, quanti anni ho, età esatta, età in giorni, calcolatore compleanno, calcolatore data di nascita, età cronologica, calcolo età online',

    // Page content
    'h1' => 'Calcolatore Età Cronologica',
    'subtitle' => 'Calcola la tua età esatta in anni, mesi, giorni, ore, minuti e secondi. Scopri il conto alla rovescia al prossimo compleanno e il tuo segno zodiacale.',

    // UI Labels
    'date_of_birth' => 'Data di Nascita',
    'age_at_date' => 'Età alla Data',
    'calculate_age' => 'Calcola Età',
    'reset' => 'Ripristina',
    'your_age' => 'La Tua Età',
    'years_label' => 'Anni',
    'months_label' => 'Mesi',
    'days_label' => 'Giorni',
    'total_months' => 'Mesi Totali',
    'total_weeks' => 'Settimane Totali',
    'total_days' => 'Giorni Totali',
    'total_hours' => 'Ore Totali',
    'total_minutes' => 'Minuti Totali',
    'total_seconds' => 'Secondi Totali',
    'next_birthday' => 'Prossimo Compleanno',
    'zodiac_sign' => 'Segno Zodiacale',
    'summary' => 'Riepilogo',
    'copy' => 'Copia',

    // Features
    'features' => [
        [
            'title' => 'Calcolo Preciso',
            'desc' => 'Ottieni la tua età esatta fino al secondo. Tiene conto della diversa durata dei mesi e degli anni bisestili per risultati accurati.',
        ],
        [
            'title' => 'Conto alla Rovescia Compleanno',
            'desc' => 'Scopri esattamente quanti giorni mancano al tuo prossimo compleanno, più in quale giorno della settimana cade.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutto viene elaborato nel tuo browser. Nessun dato viene inviato a nessun server. La tua data di nascita resta completamente privata.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Cos\'è l\'età cronologica?',
            'answer' => 'L\'età cronologica è la tua età misurata in anni, mesi e giorni esatti dalla data di nascita alla data attuale. È il metodo più comune e universalmente accettato per determinare l\'età, utilizzato per documenti legali, cartelle cliniche, iscrizioni scolastiche e per scopi quotidiani. A differenza dell\'età biologica (che misura la salute fisiologica) o dell\'età mentale, l\'età cronologica si basa puramente sul trascorrere del tempo.',
        ],
        [
            'question' => 'Come viene calcolata l\'età esatta?',
            'answer' => 'Il calcolatore trova la differenza tra la tua data di nascita e la data target. Conta prima gli anni completi, poi i mesi rimanenti, poi i giorni restanti. Tiene correttamente conto dei mesi con un diverso numero di giorni (28, 29, 30 o 31) e degli anni bisestili. Vengono calcolati anche i valori totali (mesi, settimane, giorni, ore, minuti, secondi).',
        ],
        [
            'question' => 'Posso calcolare l\'età tra due date qualsiasi?',
            'answer' => 'Sì! Mentre la data target predefinita è oggi, puoi cambiare il campo "Età alla Data" con qualsiasi data. È utile per calcolare quanti anni aveva o avrà qualcuno in una data specifica — ad esempio, l\'età di un bambino all\'inizio della scuola, o la tua età in una data futura per la pianificazione pensionistica.',
        ],
        [
            'question' => 'Gestisce correttamente gli anni bisestili?',
            'answer' => 'Sì, il calcolatore gestisce correttamente gli anni bisestili. Se sei nato il 29 febbraio, il conto alla rovescia del prossimo compleanno mostrerà la data corretta. Il calcolo dei giorni totali tiene conto anche degli anni bisestili per tutta la durata tra le date.',
        ],
        [
            'question' => 'Quali segni zodiacali vengono mostrati?',
            'answer' => 'Il calcolatore mostra il tuo segno zodiacale occidentale basato sulla data di nascita. I 12 segni sono: Ariete (21 mar – 19 apr), Toro (20 apr – 20 mag), Gemelli (21 mag – 20 giu), Cancro (21 giu – 22 lug), Leone (23 lug – 22 ago), Vergine (23 ago – 22 set), Bilancia (23 set – 22 ott), Scorpione (23 ott – 21 nov), Sagittario (22 nov – 21 dic), Capricorno (22 dic – 19 gen), Acquario (20 gen – 18 feb) e Pesci (19 feb – 20 mar).',
        ],
    ],

    // JS strings
    'js_strings' => [
        'copied' => 'Copiato!',
        'copied_to_clipboard' => 'Copiato negli appunti!',
        'alert_no_birth' => 'Inserisci una data di nascita.',
        'alert_future_date' => 'La data di nascita non può essere successiva alla data target.',
        'happy_birthday' => 'Buon Compleanno!',
        'days_away' => 'giorni mancanti',
        'day_away' => 'giorno mancante',
        'summary_born' => 'Nato',
        'summary_age' => 'Età',
        'summary_total' => 'Totale',
        'summary_next_birthday' => 'Prossimo Compleanno',
        'summary_zodiac' => 'Zodiaco',
        'years' => 'anni',
        'months' => 'mesi',
        'days' => 'giorni',
        'weeks' => 'settimane',
        'month_names' => 'Gennaio,Febbraio,Marzo,Aprile,Maggio,Giugno,Luglio,Agosto,Settembre,Ottobre,Novembre,Dicembre',
        'day_names' => 'Domenica,Lunedì,Martedì,Mercoledì,Giovedì,Venerdì,Sabato',
        'zodiac_capricorn' => 'Capricorno',
        'zodiac_capricorn_dates' => '22 Dic – 19 Gen',
        'zodiac_aquarius' => 'Acquario',
        'zodiac_aquarius_dates' => '20 Gen – 18 Feb',
        'zodiac_pisces' => 'Pesci',
        'zodiac_pisces_dates' => '19 Feb – 20 Mar',
        'zodiac_aries' => 'Ariete',
        'zodiac_aries_dates' => '21 Mar – 19 Apr',
        'zodiac_taurus' => 'Toro',
        'zodiac_taurus_dates' => '20 Apr – 20 Mag',
        'zodiac_gemini' => 'Gemelli',
        'zodiac_gemini_dates' => '21 Mag – 20 Giu',
        'zodiac_cancer' => 'Cancro',
        'zodiac_cancer_dates' => '21 Giu – 22 Lug',
        'zodiac_leo' => 'Leone',
        'zodiac_leo_dates' => '23 Lug – 22 Ago',
        'zodiac_virgo' => 'Vergine',
        'zodiac_virgo_dates' => '23 Ago – 22 Set',
        'zodiac_libra' => 'Bilancia',
        'zodiac_libra_dates' => '23 Set – 22 Ott',
        'zodiac_scorpio' => 'Scorpione',
        'zodiac_scorpio_dates' => '23 Ott – 21 Nov',
        'zodiac_sagittarius' => 'Sagittario',
        'zodiac_sagittarius_dates' => '22 Nov – 21 Dic',
    ],
];
