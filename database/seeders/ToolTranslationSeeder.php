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
