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
                'related_tools' => ['json-to-yaml', 'json-to-csv-converter', 'xml-to-json', 'jwt-decoder'],
            ],
            [
                'name' => 'Base64 Encoder/Decoder',
                'slug' => 'base64-encoder',
                'description' => 'Encode and decode Base64 strings',
                'icon' => '🔐',
                'category' => 'Encoding',
                'position' => 2,
                'related_tools' => ['url-encoder', 'hash-generator', 'jwt-decoder'],
            ],
            [
                'name' => 'Cron Expression Builder',
                'slug' => 'cron-expression-builder',
                'description' => 'Build and validate cron schedule expressions',
                'icon' => '⏰',
                'category' => 'Scheduling',
                'position' => 3,
                'related_tools' => ['timestamp-converter', 'regex-tester', 'uuid-generator'],
            ],
            [
                'name' => 'UUID/ULID Generator',
                'slug' => 'uuid-generator',
                'description' => 'Generate unique identifiers instantly',
                'icon' => '🆔',
                'category' => 'Generators',
                'position' => 4,
                'related_tools' => ['password-generator', 'hash-generator', 'qr-code-generator'],
            ],
            [
                'name' => 'Regex Tester',
                'slug' => 'regex-tester',
                'description' => 'Test and debug regular expressions',
                'icon' => '.*',
                'category' => 'Testing',
                'position' => 5,
                'related_tools' => ['diff-checker', 'word-counter', 'json-formatter'],
            ],
            [
                'name' => 'JWT Decoder',
                'slug' => 'jwt-decoder',
                'description' => 'Decode and inspect JSON Web Tokens',
                'icon' => '🔑',
                'category' => 'Security',
                'position' => 6,
                'related_tools' => ['base64-encoder', 'json-formatter', 'hash-generator', 'password-generator'],
            ],
            [
                'name' => 'Password Generator',
                'slug' => 'password-generator',
                'description' => 'Generate secure random passwords',
                'icon' => '🔐',
                'category' => 'Security',
                'position' => 7,
                'related_tools' => ['hash-generator', 'uuid-generator', 'jwt-decoder'],
            ],
            [
                'name' => 'Hash Generator',
                'slug' => 'hash-generator',
                'description' => 'Generate MD5, SHA-256, SHA-512 hashes',
                'icon' => '#️⃣',
                'category' => 'Security',
                'position' => 8,
                'related_tools' => ['password-generator', 'base64-encoder', 'jwt-decoder'],
            ],
            [
                'name' => 'URL Encoder/Decoder',
                'slug' => 'url-encoder',
                'description' => 'Encode and decode URLs and query strings',
                'icon' => '🔗',
                'category' => 'Encoding',
                'position' => 9,
                'related_tools' => ['base64-encoder', 'qr-code-generator', 'json-formatter'],
            ],
            [
                'name' => 'Lorem Ipsum Generator',
                'slug' => 'lorem-ipsum-generator',
                'description' => 'Generate placeholder text for designs',
                'icon' => '📝',
                'category' => 'Text',
                'position' => 10,
                'related_tools' => ['word-counter', 'diff-checker', 'uuid-generator'],
            ],
            [
                'name' => 'Timestamp Converter',
                'slug' => 'timestamp-converter',
                'description' => 'Convert Unix timestamps to dates',
                'icon' => '🕐',
                'category' => 'Date/Time',
                'position' => 11,
                'related_tools' => ['cron-expression-builder', 'json-formatter', 'uuid-generator'],
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
                'related_tools' => ['lorem-ipsum-generator', 'diff-checker', 'regex-tester'],
            ],
            [
                'name' => 'Image Compressor',
                'slug' => 'image-compressor',
                'description' => 'Compress JPEG, PNG, WebP images',
                'icon' => '🖼️',
                'category' => 'Images',
                'position' => 14,
                'related_tools' => ['qr-code-generator', 'base64-encoder', 'color-converter'],
            ],
            [
                'name' => 'Markdown Preview',
                'slug' => 'markdown-preview',
                'description' => 'Write and preview Markdown with real-time rendering, GitHub Flavored Markdown support, and syntax highlighting',
                'icon' => '📝',
                'category' => 'Text',
                'position' => 16,
                'related_tools' => ['diff-checker', 'word-counter', 'lorem-ipsum-generator'],
            ],
            [
                'name' => 'JSON to CSV Converter',
                'slug' => 'json-to-csv-converter',
                'description' => 'Convert between JSON and CSV formats',
                'icon' => '📊',
                'category' => 'Data',
                'position' => 15,
                'related_tools' => ['json-formatter', 'json-to-yaml', 'xml-to-json'],
            ],
            [
                'name' => 'QR Code Generator',
                'slug' => 'qr-code-generator',
                'description' => 'Create QR codes for URLs, WiFi, contacts, email, SMS, and phone numbers. Customize colors and size, download as PNG or SVG.',
                'icon' => '📱',
                'category' => 'Generators',
                'position' => 17,
                'related_tools' => ['uuid-generator', 'url-encoder', 'password-generator'],
            ],
            [
                'name' => 'Diff Checker',
                'slug' => 'diff-checker',
                'description' => 'Compare two texts and highlight differences instantly',
                'icon' => '↔️',
                'category' => 'Text',
                'position' => 18,
                'related_tools' => ['word-counter', 'regex-tester', 'json-formatter'],
            ],
            [
                'name' => 'JSON to YAML Converter',
                'slug' => 'json-to-yaml',
                'description' => 'Convert JSON data to YAML format for configs, Docker, Kubernetes',
                'icon' => '📋',
                'category' => 'Converter',
                'position' => 19,
                'related_tools' => ['yaml-to-json', 'json-to-csv-converter', 'json-formatter', 'xml-to-json'],
            ],
            [
                'name' => 'YAML to JSON Converter',
                'slug' => 'yaml-to-json',
                'description' => 'Convert YAML configs to JSON format for APIs and data exchange',
                'icon' => '🔄',
                'category' => 'Converter',
                'position' => 20,
                'related_tools' => ['json-to-yaml', 'xml-to-json', 'json-to-csv-converter', 'json-formatter'],
            ],
            [
                'name' => 'XML to JSON Converter',
                'slug' => 'xml-to-json',
                'description' => 'Convert XML data to JSON format. Handles attributes, CDATA, and nested elements',
                'icon' => '📄',
                'category' => 'Converter',
                'position' => 21,
                'related_tools' => ['json-to-yaml', 'yaml-to-json', 'json-to-csv-converter', 'json-formatter'],
            ],
            [
                'name' => 'XML to CSV Converter',
                'slug' => 'xml-to-csv',
                'description' => 'Convert XML data to CSV spreadsheet format for Excel and Google Sheets',
                'icon' => '📊',
                'category' => 'Converter',
                'position' => 22,
                'related_tools' => ['xml-to-json', 'json-to-csv-converter', 'json-to-yaml', 'yaml-to-json'],
            ],
            [
                'name' => 'Twitter Character Counter',
                'slug' => 'twitter-character-counter',
                'description' => 'Count characters for Twitter/X posts with real-time tracking for URLs, mentions, and emojis',
                'icon' => '🐦',
                'category' => 'Text',
                'position' => 23,
                'related_tools' => ['word-counter', 'json-formatter'],
            ],
            [
                'name' => 'Hex to RGB Converter',
                'slug' => 'hex-to-rgb',
                'description' => 'Convert hex color codes to RGB, HSL, and CMYK values with live preview and CSS code generation',
                'icon' => '🎨',
                'category' => 'Converter',
                'position' => 24,
                'related_tools' => ['json-formatter', 'word-counter'],
            ],
            [
                'name' => 'Slug Generator',
                'slug' => 'slug-generator',
                'description' => 'Convert any text to clean, SEO-friendly URL slugs with transliteration, stop word removal, and bulk generation',
                'icon' => '🔗',
                'category' => 'Text',
                'position' => 25,
                'related_tools' => ['url-encoder', 'word-counter', 'lorem-ipsum-generator'],
            ],
            [
                'name' => 'ASCII Table & Generator',
                'slug' => 'ascii-table',
                'description' => 'Complete ASCII reference table with all 128 characters. Search, filter, and convert text to ASCII codes instantly',
                'icon' => '📟',
                'category' => 'Reference',
                'position' => 26,
                'related_tools' => ['base64-encoder', 'text-to-binary', 'hash-generator'],
            ],
        ];

        foreach ($tools as $tool) {
            $existing = Tool::where('slug', $tool['slug'])->first();

            if ($existing) {
                // Don't overwrite position on existing tools (managed via admin drag-drop)
                unset($tool['position']);
                $existing->update($tool);
            } else {
                Tool::create($tool);
            }
        }
    }
}
