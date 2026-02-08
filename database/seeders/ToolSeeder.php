<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        $tools = [
            [
                'name' => 'JSON Formatter & Validator',
                'slug' => 'json-formatter',
                'description' => 'Format, validate, and minify JSON instantly',
                'icon' => '{ }',
                'category' => 'JSON',
                'position' => 1,
            ],
            [
                'name' => 'Base64 Encoder/Decoder',
                'slug' => 'base64-encoder',
                'description' => 'Encode and decode Base64 strings',
                'icon' => '🔐',
                'category' => 'Encoding',
                'position' => 2,
            ],
            [
                'name' => 'Cron Expression Builder',
                'slug' => 'cron-expression-builder',
                'description' => 'Build and validate cron schedule expressions',
                'icon' => '⏰',
                'category' => 'Scheduling',
                'position' => 3,
            ],
            [
                'name' => 'UUID/ULID Generator',
                'slug' => 'uuid-generator',
                'description' => 'Generate unique identifiers instantly',
                'icon' => '🆔',
                'category' => 'Generators',
                'position' => 4,
            ],
            [
                'name' => 'Regex Tester',
                'slug' => 'regex-tester',
                'description' => 'Test and debug regular expressions',
                'icon' => '.*',
                'category' => 'Testing',
                'position' => 5,
            ],
            [
                'name' => 'JWT Decoder',
                'slug' => 'jwt-decoder',
                'description' => 'Decode and inspect JSON Web Tokens',
                'icon' => '🔑',
                'category' => 'Security',
                'position' => 6,
            ],
            [
                'name' => 'Password Generator',
                'slug' => 'password-generator',
                'description' => 'Generate secure random passwords',
                'icon' => '🔐',
                'category' => 'Security',
                'position' => 7,
            ],
            [
                'name' => 'Hash Generator',
                'slug' => 'hash-generator',
                'description' => 'Generate MD5, SHA-256, SHA-512 hashes',
                'icon' => '#️⃣',
                'category' => 'Security',
                'position' => 8,
            ],
            [
                'name' => 'URL Encoder/Decoder',
                'slug' => 'url-encoder',
                'description' => 'Encode and decode URLs and query strings',
                'icon' => '🔗',
                'category' => 'Encoding',
                'position' => 9,
            ],
            [
                'name' => 'Lorem Ipsum Generator',
                'slug' => 'lorem-ipsum-generator',
                'description' => 'Generate placeholder text for designs',
                'icon' => '📝',
                'category' => 'Text',
                'position' => 10,
            ],
            [
                'name' => 'Timestamp Converter',
                'slug' => 'timestamp-converter',
                'description' => 'Convert Unix timestamps to dates',
                'icon' => '🕐',
                'category' => 'Date/Time',
                'position' => 11,
            ],
            [
                'name' => 'Color Converter',
                'slug' => 'color-converter',
                'description' => 'Convert between HEX, RGB, HSL formats',
                'icon' => '🎨',
                'category' => 'Design',
                'position' => 12,
            ],
            [
                'name' => 'Word Counter',
                'slug' => 'word-counter',
                'description' => 'Count words, characters, and sentences',
                'icon' => '📝',
                'category' => 'Text',
                'position' => 13,
            ],
            [
                'name' => 'Image Compressor',
                'slug' => 'image-compressor',
                'description' => 'Compress JPEG, PNG, WebP images',
                'icon' => '🖼️',
                'category' => 'Images',
                'position' => 14,
            ],
            [
                'name' => 'JSON to CSV Converter',
                'slug' => 'json-to-csv-converter',
                'description' => 'Convert between JSON and CSV formats',
                'icon' => '📊',
                'category' => 'Data',
                'position' => 15,
            ],
            [
                'name' => 'QR Code Generator',
                'slug' => 'qr-code-generator',
                'description' => 'Create QR codes for URLs, WiFi, contacts, email, SMS, and phone numbers. Customize colors and size, download as PNG or SVG.',
                'icon' => '📱',
                'category' => 'Generators',
                'position' => 17,
            ],
            [
                'name' => 'Diff Checker',
                'slug' => 'diff-checker',
                'description' => 'Compare two texts and highlight differences instantly',
                'icon' => '↔️',
                'category' => 'Text',
                'position' => 18,
            ],
            [
                'name' => 'JSON to YAML Converter',
                'slug' => 'json-to-yaml',
                'description' => 'Convert JSON data to YAML format for configs, Docker, Kubernetes',
                'icon' => '📋',
                'category' => 'Converter',
                'position' => 19,
            ],
            [
                'name' => 'YAML to JSON Converter',
                'slug' => 'yaml-to-json',
                'description' => 'Convert YAML configs to JSON format for APIs and data exchange',
                'icon' => '🔄',
                'category' => 'Converter',
                'position' => 20,
            ],
        ];

        foreach ($tools as $tool) {
            Tool::updateOrCreate(
                ['slug' => $tool['slug']],
                $tool
            );
        }
    }
}
