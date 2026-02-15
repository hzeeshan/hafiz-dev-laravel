<?php

namespace Database\Seeders;

use App\Models\Tool;
use App\Models\ToolTranslation;
use Illuminate\Database\Seeder;

class ToolTranslationSeeder extends Seeder
{
    public function run(): void
    {
        $translations = [
            // Italian translations
            [
                'tool_slug' => 'password-generator',
                'locale' => 'it',
                'slug' => 'generatore-password',
                'name' => 'Generatore di Password',
                'description' => 'Genera password sicure e casuali con lunghezza e caratteri personalizzabili. 100% lato client.',
            ],
            [
                'tool_slug' => 'word-counter',
                'locale' => 'it',
                'slug' => 'conta-parole',
                'name' => 'Conta Parole',
                'description' => 'Conta caratteri, parole, frasi e paragrafi istantaneamente. Mostra tempo di lettura e parlato.',
            ],
            [
                'tool_slug' => 'json-formatter',
                'locale' => 'it',
                'slug' => 'formattatore-json',
                'name' => 'Formattatore JSON',
                'description' => 'Formatta, valida e minimizza JSON istantaneamente. 100% lato client, nessun dato inviato al server.',
            ],
            [
                'tool_slug' => 'image-compressor',
                'locale' => 'it',
                'slug' => 'compressore-immagini',
                'name' => 'Compressore di Immagini',
                'description' => 'Comprimi immagini JPEG, PNG, WebP e GIF fino al 90%. 100% lato client, le tue immagini non escono mai dal browser.',
            ],
            [
                'tool_slug' => 'base64-encoder',
                'locale' => 'it',
                'slug' => 'codificatore-base64',
                'name' => 'Codificatore Base64',
                'description' => 'Codifica testo in Base64 o decodifica stringhe Base64 istantaneamente. 100% lato client, i tuoi dati non escono mai dal browser.',
            ],
            [
                'tool_slug' => 'cron-expression-builder',
                'locale' => 'it',
                'slug' => 'generatore-espressioni-cron',
                'name' => 'Generatore di Espressioni Cron',
                'description' => 'Crea e valida espressioni cron con un\'interfaccia visuale intuitiva. Visualizza le prossime esecuzioni istantaneamente.',
            ],
            [
                'tool_slug' => 'uuid-generator',
                'locale' => 'it',
                'slug' => 'generatore-uuid',
                'name' => 'Generatore UUID',
                'description' => 'Genera UUID v4, UUID v1 e ULID istantaneamente. Generazione in blocco, formati multipli. 100% lato client.',
            ],
            [
                'tool_slug' => 'regex-tester',
                'locale' => 'it',
                'slug' => 'tester-regex',
                'name' => 'Tester Regex',
                'description' => 'Testa espressioni regolari in tempo reale con evidenziazione delle corrispondenze. Compatibile JavaScript/PCRE. 100% lato client.',
            ],
            [
                'tool_slug' => 'jwt-decoder',
                'locale' => 'it',
                'slug' => 'decodificatore-jwt',
                'name' => 'Decodificatore JWT',
                'description' => 'Decodifica e analizza JSON Web Token istantaneamente. Visualizza header, payload e scadenza. 100% lato client.',
            ],
            [
                'tool_slug' => 'hash-generator',
                'locale' => 'it',
                'slug' => 'generatore-hash',
                'name' => 'Generatore di Hash',
                'description' => 'Genera hash MD5, SHA-1, SHA-256, SHA-512 da testo o file istantaneamente. 100% lato client.',
            ],
            [
                'tool_slug' => 'url-encoder',
                'locale' => 'it',
                'slug' => 'codificatore-url',
                'name' => 'Codificatore/Decodificatore URL',
                'description' => 'Codifica e decodifica URL istantaneamente con encodeURIComponent e encodeURI. 100% lato client.',
            ],
            [
                'tool_slug' => 'lorem-ipsum-generator',
                'locale' => 'it',
                'slug' => 'generatore-lorem-ipsum',
                'name' => 'Generatore Lorem Ipsum',
                'description' => 'Genera testo segnaposto per paragrafi, frasi o parole. Perfetto per mockup e design. 100% lato client.',
            ],
            [
                'tool_slug' => 'timestamp-converter',
                'locale' => 'it',
                'slug' => 'convertitore-timestamp',
                'name' => 'Convertitore Timestamp',
                'description' => 'Converti timestamp Unix in date leggibili e viceversa. Supporta più fusi orari e formati. 100% lato client.',
            ],
            [
                'tool_slug' => 'color-converter',
                'locale' => 'it',
                'slug' => 'convertitore-colori',
                'name' => 'Convertitore di Colori',
                'description' => 'Converti colori tra formati HEX, RGB, RGBA, HSL, HSLA istantaneamente. Include selettore colori e verifica contrasto WCAG.',
            ],
            [
                'tool_slug' => 'markdown-preview',
                'locale' => 'it',
                'slug' => 'anteprima-markdown',
                'name' => 'Anteprima Markdown',
                'description' => 'Scrivi e visualizza Markdown con rendering in tempo reale. Supporta GitHub Flavored Markdown con evidenziazione sintassi. 100% lato client.',
            ],
            [
                'tool_slug' => 'json-to-csv-converter',
                'locale' => 'it',
                'slug' => 'convertitore-json-csv',
                'name' => 'Convertitore JSON in CSV',
                'description' => 'Converti tra JSON e CSV istantaneamente. Supporta oggetti annidati, delimitatori personalizzati e conversione bidirezionale. 100% lato client.',
            ],
            [
                'tool_slug' => 'qr-code-generator',
                'locale' => 'it',
                'slug' => 'generatore-codice-qr',
                'name' => 'Generatore di Codici QR',
                'description' => 'Crea codici QR per URL, WiFi, contatti, email e altro. Personalizza colori e dimensioni, scarica in PNG o SVG. 100% gratuito.',
            ],
            [
                'tool_slug' => 'diff-checker',
                'locale' => 'it',
                'slug' => 'confronta-testi',
                'name' => 'Confronta Testi (Diff Checker)',
                'description' => 'Confronta due testi e trova le differenze. Evidenzia aggiunte, eliminazioni e modifiche istantaneamente. 100% lato client.',
            ],
            [
                'tool_slug' => 'json-to-yaml',
                'locale' => 'it',
                'slug' => 'convertitore-json-yaml',
                'name' => 'Convertitore JSON in YAML',
                'description' => 'Converti dati JSON in formato YAML istantaneamente. Supporta oggetti annidati, array e file di grandi dimensioni. 100% lato client.',
            ],
            [
                'tool_slug' => 'yaml-to-json',
                'locale' => 'it',
                'slug' => 'convertitore-yaml-json',
                'name' => 'Convertitore YAML in JSON',
                'description' => 'Converti file di configurazione YAML in formato JSON istantaneamente. Validazione sintassi e output con evidenziazione. 100% lato client.',
            ],
            [
                'tool_slug' => 'xml-to-json',
                'locale' => 'it',
                'slug' => 'convertitore-xml-json',
                'name' => 'Convertitore XML in JSON',
                'description' => 'Converti dati XML in formato JSON istantaneamente. Supporta attributi, CDATA e strutture complesse. 100% lato client.',
            ],
            [
                'tool_slug' => 'xml-to-csv',
                'locale' => 'it',
                'slug' => 'convertitore-xml-csv',
                'name' => 'Convertitore XML in CSV',
                'description' => 'Converti dati XML in formato CSV per fogli di calcolo istantaneamente. Appiattisci elementi annidati, estrai attributi ed esporta per Excel o Google Sheets. 100% lato client.',
            ],
            [
                'tool_slug' => 'twitter-character-counter',
                'locale' => 'it',
                'slug' => 'contatore-caratteri-twitter',
                'name' => 'Contatore Caratteri Twitter',
                'description' => 'Conta i caratteri per Twitter/X in tempo reale. Monitora URL, menzioni, hashtag ed emoji con le regole di conteggio precise di Twitter.',
            ],
            [
                'tool_slug' => 'hex-to-rgb',
                'locale' => 'it',
                'slug' => 'convertitore-hex-rgb',
                'name' => 'Convertitore Hex in RGB',
                'description' => 'Converti codici colore esadecimali in valori RGB, HSL e CMYK istantaneamente. Anteprima colore dal vivo e generazione codice CSS. 100% lato client.',
            ],
            [
                'tool_slug' => 'slug-generator',
                'locale' => 'it',
                'slug' => 'generatore-slug',
                'name' => 'Generatore di Slug',
                'description' => 'Converti qualsiasi testo in slug URL puliti e SEO-friendly istantaneamente. Supporta traslitterazione, separatori personalizzati e generazione in blocco. 100% lato client.',
            ],
            [
                'tool_slug' => 'ascii-table',
                'locale' => 'it',
                'slug' => 'tabella-ascii',
                'name' => 'Tabella ASCII e Generatore',
                'description' => 'Tabella ASCII completa con tutti i 128 caratteri. Cerca, filtra e converti testo in codici ASCII istantaneamente. 100% lato client.',
            ],
            [
                'tool_slug' => 'text-to-binary',
                'locale' => 'it',
                'slug' => 'convertitore-testo-binario',
                'name' => 'Convertitore Testo in Binario',
                'description' => 'Converti testo in codice binario e binario in testo istantaneamente. Supporta ASCII e UTF-8 con più formati di output.',
            ],
            [
                'tool_slug' => 'csv-to-xml',
                'locale' => 'it',
                'slug' => 'convertitore-csv-xml',
                'name' => 'Convertitore CSV in XML',
                'description' => 'Converti dati CSV in XML ben formattato istantaneamente. Nomi di elementi personalizzabili, supporto attributi e CDATA. 100% lato client.',
            ],
            [
                'tool_slug' => 'json-to-xml',
                'locale' => 'it',
                'slug' => 'convertitore-json-xml',
                'name' => 'Convertitore JSON in XML',
                'description' => 'Converti dati JSON in XML ben formattato istantaneamente. Oggetti annidati, array intelligenti e attributi tipo. 100% lato client.',
            ],
            [
                'tool_slug' => 'csv-to-sql',
                'locale' => 'it',
                'slug' => 'convertitore-csv-sql',
                'name' => 'Convertitore CSV in SQL',
                'description' => 'Genera istruzioni SQL INSERT, CREATE TABLE e UPDATE da dati CSV. Supporta MySQL, PostgreSQL, SQLite e SQL Server.',
            ],
            [
                'tool_slug' => 'json-to-typescript',
                'locale' => 'it',
                'slug' => 'convertitore-json-typescript',
                'name' => 'Convertitore JSON in TypeScript',
                'description' => 'Genera interfacce e tipi TypeScript da dati JSON istantaneamente. Supporta oggetti annidati, array e campi opzionali.',
            ],
            [
                'tool_slug' => 'student-email-signature-generator',
                'locale' => 'it',
                'slug' => 'generatore-firma-email-studente',
                'name' => 'Generatore Firma Email per Studenti',
                'description' => 'Crea firme email professionali per studenti con università, corso di studi, anno di laurea e link social. Copia HTML o testo semplice.',
            ],
            [
                'tool_slug' => 'chmod-calculator',
                'locale' => 'it',
                'slug' => 'calcolatore-chmod',
                'name' => 'Calcolatore Chmod',
                'description' => 'Calcolatore chmod online gratuito. Calcola i permessi dei file Linux con una griglia interattiva. Converti tra notazione simbolica e ottale istantaneamente.',
            ],
            [
                'tool_slug' => 'markdown-to-html',
                'locale' => 'it',
                'slug' => 'convertitore-markdown-html',
                'name' => 'Convertitore Markdown in HTML',
                'description' => 'Converti la sintassi Markdown in codice HTML pulito istantaneamente. Supporta intestazioni, liste, tabelle, blocchi di codice e GFM.',
            ],
            [
                'tool_slug' => 'base64-to-image',
                'locale' => 'it',
                'slug' => 'convertitore-base64-immagine',
                'name' => 'Convertitore Base64 in Immagine',
                'description' => 'Decodifica stringhe Base64 in immagini PNG, JPEG, GIF, SVG e WebP istantaneamente. Anteprima, download e rilevamento automatico del formato.',
            ],
            [
                'tool_slug' => 'robots-txt-generator',
                'locale' => 'it',
                'slug' => 'generatore-robots-txt',
                'name' => 'Generatore Robots.txt',
                'description' => 'Crea un file robots.txt per il tuo sito con un editor visuale. Aggiungi regole di crawling, sitemap e crawl-delay per i bot dei motori di ricerca.',
            ],
            [
                'tool_slug' => 'bubble-text-generator',
                'locale' => 'it',
                'slug' => 'generatore-testo-bolle',
                'name' => 'Generatore Testo a Bolle',
                'description' => 'Converti il tuo testo in lettere a bolla istantaneamente per social media, Discord e altro. Stile contorno e pieno.',
            ],
            [
                'tool_slug' => 'strikethrough-text-generator',
                'locale' => 'it',
                'slug' => 'generatore-testo-barrato',
                'name' => 'Generatore Testo Barrato',
                'description' => 'Crea testo barrato istantaneamente con 4 stili diversi. Perfetto per social media, Discord e altro. Copia e incolla ovunque.',
            ],
            [
                'tool_slug' => 'upside-down-text-generator',
                'locale' => 'it',
                'slug' => 'generatore-testo-capovolto',
                'name' => 'Generatore Testo Capovolto',
                'description' => 'Capovolgi il tuo testo istantaneamente per social media, Discord e altro. Copia e incolla il testo rovesciato ovunque.',
            ],
            [
                'tool_slug' => 'zalgo-text-generator',
                'locale' => 'it',
                'slug' => 'generatore-testo-zalgo',
                'name' => 'Generatore Testo Zalgo',
                'description' => 'Crea testo glitch inquietante con livello di caos personalizzabile. Perfetto per Discord, Roblox, social media e meme.',
            ],
            [
                'tool_slug' => 'small-text-generator',
                'locale' => 'it',
                'slug' => 'generatore-testo-piccolo',
                'name' => 'Generatore di Testo Piccolo',
                'description' => 'Converti il tuo testo in apice, pedice e maiuscoletto istantaneamente per social media, Discord e altro. Copia e incolla ovunque.',
            ],
            [
                'tool_slug' => 'morse-code-translator',
                'locale' => 'it',
                'slug' => 'traduttore-codice-morse',
                'name' => 'Traduttore Codice Morse',
                'description' => 'Converti testo in codice Morse e codice Morse in testo istantaneamente. Riproduzione audio con velocità regolabile.',
            ],
            [
                'tool_slug' => 'chronological-age-calculator',
                'locale' => 'it',
                'slug' => 'calcolatore-eta-cronologica',
                'name' => 'Calcolatore Età Cronologica',
                'description' => 'Calcola la tua età esatta in anni, mesi, giorni, ore, minuti e secondi. Conto alla rovescia compleanno e segno zodiacale.',
            ],
            [
                'tool_slug' => 'korean-age-calculator',
                'locale' => 'it',
                'slug' => 'calcolatore-eta-coreana',
                'name' => 'Calcolatore Età Coreana',
                'description' => 'Calcola la tua età coreana, età internazionale e la differenza. Scopri come funziona il sistema di età coreano.',
            ],
            [
                'tool_slug' => 'crontab-guru',
                'locale' => 'it',
                'slug' => 'crontab-guru',
                'name' => 'Crontab Guru',
                'description' => 'Editor di espressioni cron online. Crea, valida e comprendi le pianificazioni crontab con spiegazioni leggibili.',
            ],
            [
                'tool_slug' => 'http-status-codes',
                'locale' => 'it',
                'slug' => 'codici-stato-http',
                'name' => 'Codici di Stato HTTP',
                'description' => 'Guida completa ai codici di stato HTTP con descrizioni, categorie ed esempi. Cerca e filtra tutti i codici 1xx-5xx.',
            ],
        ];

        foreach ($translations as $data) {
            $tool = Tool::where('slug', $data['tool_slug'])->first();

            if (! $tool) {
                $this->command->warn("Tool not found: {$data['tool_slug']}");

                continue;
            }

            ToolTranslation::updateOrCreate(
                [
                    'tool_id' => $tool->id,
                    'locale' => $data['locale'],
                ],
                [
                    'slug' => $data['slug'],
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'is_active' => true,
                ]
            );
        }
    }
}
