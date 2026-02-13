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
