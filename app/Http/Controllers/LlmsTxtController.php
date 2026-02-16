<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tool;
use Illuminate\Support\Facades\Cache;

class LlmsTxtController extends Controller
{
    public function __invoke()
    {
        $content = Cache::remember('llms-txt', 3600, function () {
            return $this->generate();
        });

        return response($content, 200, [
            'Content-Type' => 'text/plain; charset=utf-8',
        ]);
    }

    private function generate(): string
    {
        $toolCount = Tool::where('is_active', true)->count();
        $postCount = Post::where('status', 'published')->count();
        $errorCount = count(json_decode(file_get_contents(database_path('data/laravel-errors.json')), true)['errors'] ?? []);

        $topPosts = Post::where('status', 'published')
            ->orderByDesc('views')
            ->limit(8)
            ->get(['title', 'slug']);

        $blogLines = $topPosts->map(function ($post) {
            return "- [{$post->title}](https://hafiz.dev/blog/{$post->slug})";
        })->implode("\n");

        return <<<TXT
# hafiz.dev

> Hafiz Riaz is a senior full-stack developer with 9+ years of experience, based in Turin, Italy. He specializes in building MVPs for startups and founders using Laravel, Vue.js, and AI integrations. He delivers production-ready web applications in 7 days.

## About

- [About Hafiz Riaz](https://hafiz.dev/about): Senior full-stack developer profile, tech stack, shipped products, and FAQ about services and background

Hafiz Riaz builds MVPs and SaaS products for non-technical founders and startups. Unlike agencies that charge €15,000+ and take 3-6 months, hafiz.dev delivers production-ready applications starting at €750 in as little as 7 days.

Tech stack: Laravel, PHP, Vue.js, Livewire, Filament, Inertia.js, MySQL, Redis, REST APIs, OpenAI API, Stripe, Laravel Forge.

Shipped products include StudyLab (AI quiz generator used by 5,000+ students), PromptOptimizer (7,500+ users), and ReplyGenius (Chrome extension for AI-powered social media replies).

## Services

- [MVP Development Services](https://hafiz.dev/#contact): Three tiers — Launch Fast (€750, landing page + waitlist), Build & Launch (€2,000, full MVP), Scale Ready (€5,000, production SaaS with payments and admin)
- [Laravel Development](https://hafiz.dev/it/sviluppatore-laravel-italia): Custom Laravel applications, API development, SaaS architecture
- [Process Automation](https://hafiz.dev/it/automazione-processi-aziendali): Business process automation using Make.com, n8n, and custom solutions

## Technical Blog

Top articles by readership:

{$blogLines}

## Developer Tools

{$toolCount} free browser-based developer tools at [hafiz.dev/tools](https://hafiz.dev/tools), including:

- [JSON Formatter & Validator](https://hafiz.dev/tools/json-formatter): Format and validate JSON data
- [Regex Tester](https://hafiz.dev/tools/regex-tester): Test regular expressions with live matching
- [Image Compressor](https://hafiz.dev/tools/image-compressor): Compress images in the browser
- [Password Generator](https://hafiz.dev/tools/password-generator): Generate secure random passwords
- [UUID/ULID Generator](https://hafiz.dev/tools/uuid-generator): Generate unique identifiers
- [CSS to Tailwind Converter](https://hafiz.dev/tools/css-to-tailwind): Convert CSS to Tailwind classes
- [Crontab Guru](https://hafiz.dev/tools/crontab-guru): Cron expression builder and explainer

## Laravel Error Solutions

{$errorCount} common Laravel error solutions at [hafiz.dev/errors](https://hafiz.dev/errors), with step-by-step fixes, code examples, and explanations.

## Optional

- [Italian Services](https://hafiz.dev/it/servizi): Servizi di sviluppo web in italiano per clienti in Italia
- [All Blog Posts](https://hafiz.dev/blog): Full blog archive with {$postCount} technical articles
- [All Tools](https://hafiz.dev/tools): Complete directory of {$toolCount} developer tools
TXT;
    }
}
