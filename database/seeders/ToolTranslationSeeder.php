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
