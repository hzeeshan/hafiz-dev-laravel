# Multilingual Tool Pages — Architecture Reference

## Why

Inspired by a Reddit post(https://www.reddit.com/r/SaaS/comments/1r2mx24/comment/o50t7bw/?context=3) about a boring utilities site reaching 600K monthly users (key insight: "multi-language pages worked better than blog posts"), we translate tool pages to multiply rankable pages and target low-competition keywords in other languages. Starting with Italian (living in Italy = authentic + local SEO boost), designed to scale to 5+ languages × 100+ tools.

## URL Structure

```
English (existing, untouched):
  /tools                         → hardcoded English index
  /tools/{slug}                  → hardcoded English tool page

Italian:
  /it/strumenti                  → Italian tools index
  /it/strumenti/{italian-slug}   → Italian tool page (shared template)

Future languages (same pattern):
  /es/herramientas/{slug}
  /de/werkzeuge/{slug}
  /fr/outils/{slug}
```

Italian tool URLs use **translated slugs** for SEO (e.g., `/it/strumenti/generatore-password` not `/it/strumenti/password-generator`).

## Architecture Decisions

### Why PHP translation files?

- Laravel native (`__()` helper, cached in production)
- Git-versioned, easy to diff/review
- No database overhead for 60-80 strings per tool
- Familiar pattern for Laravel developers

### Why keep English hardcoded?

- Zero risk of breaking existing 60+ tool pages
- No refactoring cost
- English pages remain the "source of truth"
- Italian pages use a separate shared template that reads from translation files

### Why one shared Italian template?

- Adding a new Italian tool = create 2 files (translation + UI partial), not a full blade template
- Shared scaffolding: SEO meta, JSON-LD schemas, breadcrumbs, features, FAQ, CTA
- 100 tools × 5 languages = 500 UI partials, not 500 full page templates

## Database

### `tool_translations` table

Lightweight slug mapping for routing. Tool content lives in PHP files, not the database.

```
tool_translations:
  - id
  - tool_id (FK → tools.id, cascade delete)
  - locale (string: 'it', 'es', etc.)
  - slug (string: 'generatore-password')
  - name (string: 'Generatore di Password') — for index page
  - description (text) — for index page
  - is_active (boolean, default true)
  - timestamps
  UNIQUE(tool_id, locale)
  UNIQUE(locale, slug)
```

### Model relationships

```php
// Tool.php
public function translations(): HasMany
public function translation(string $locale): ?ToolTranslation

// ToolTranslation.php
public function tool(): BelongsTo
```

## File Locations

### Per-tool files (created for each translated tool)

| File                                                     | Purpose                                                       |
| -------------------------------------------------------- | ------------------------------------------------------------- |
| `lang/it/tools/{slug}.php`                               | All Italian translations (SEO, UI, FAQ, features, JS strings) |
| `resources/views/tools/it/partials/{slug}-ui.blade.php`  | Tool-specific HTML with `__()` calls                          |
| `resources/views/tools/partials/{slug}-script.blade.php` | Extracted JS (shared between EN/IT)                           |

### Shared files (created once, used by all tools)

| File                                                  | Purpose                                                           |
| ----------------------------------------------------- | ----------------------------------------------------------------- |
| `lang/it/tools.php`                                   | Common strings (buttons, breadcrumbs, categories, privacy banner) |
| `resources/views/tools/it/show.blade.php`             | Shared template for ALL Italian tools                             |
| `resources/views/tools/it/index.blade.php`            | Italian tools listing page                                        |
| `resources/views/tools/it/partials/schemas.blade.php` | Dynamic JSON-LD generator                                         |
| `resources/views/tools/it/partials/faq.blade.php`     | Reusable FAQ renderer                                             |

### Infrastructure files

| File                                                          | Purpose                         |
| ------------------------------------------------------------- | ------------------------------- |
| `app/Models/ToolTranslation.php`                              | Translation model               |
| `app/Http/Controllers/ToolController.php`                     | Italian tool routes handler     |
| `app/Http/Middleware/SetLocale.php`                           | Auto-set locale from URL prefix |
| `database/seeders/ToolTranslationSeeder.php`                  | Seed Italian slug mappings      |
| `database/migrations/xxxx_create_tool_translations_table.php` | Schema                          |

## Translation File Format

Example: `lang/it/tools/password-generator.php`

```php
<?php

return [
    // SEO — target Italian keywords
    'title' => 'Generatore di Password - Crea Password Sicure e Casuali Gratis | hafiz.dev',
    'description' => 'Generatore di password online gratuito...',
    'keywords' => 'generatore password, password casuale, ...',

    // Page content
    'h1' => 'Generatore di Password',
    'subtitle' => 'Genera password sicure e casuali...',

    // UI Labels (tool-specific)
    'generated_password' => 'Password Generata',
    'password_length' => 'Lunghezza della Password',
    // ... all visible UI text

    // Features (3 cards shown below tool)
    'features' => [
        ['title' => 'Crittograficamente Sicuro', 'desc' => '...'],
        ['title' => '100% Lato Client', 'desc' => '...'],
        ['title' => 'Nessun Limite', 'desc' => '...'],
    ],

    // FAQ (5 Q&A pairs — rendered as HTML + JSON-LD)
    'faq' => [
        ['question' => 'Come funziona...?', 'answer' => '...'],
        // ...
    ],

    // JS strings (passed to JavaScript via data-* attributes)
    'js_strings' => [
        'placeholder' => 'Clicca Genera per creare una password',
        'copied' => 'Password copiata!',
        'copy_fail' => 'Copia negli appunti non riuscita',
        // snake_case keys → become kebab-case data attributes
        // e.g., 'no_char_type' → data-no-char-type
    ],
];
```

## How JS Strings Work

The shared `show.blade.php` renders a hidden div with data attributes from the `js_strings` array:

```html
<div
    id="tool-strings"
    class="hidden"
    data-placeholder="Clicca Genera per creare una password"
    data-copied="Password copiata!"
    data-no-char-type="Seleziona almeno un tipo di carattere"
></div>
```

The extracted script partial reads these with English fallbacks:

```javascript
const stringsEl = document.getElementById("tool-strings");
const S = {
    placeholder:
        stringsEl?.dataset.placeholder || "Click Generate to create a password",
    copied: stringsEl?.dataset.copied || "Password copied!",
};
```

This means the same JS file works for both English (no `#tool-strings` div → uses defaults) and Italian (reads translated strings from data attributes).

## How to Add a New Italian Tool

Use the `/translate-tool` Claude Code skill:

```
/translate-tool json-formatter
```

Or manually:

1. **Extract JS** (if not done): Move `<script>` from English template to `resources/views/tools/partials/{slug}-script.blade.php`, replace hardcoded strings with `S.key` reads from data attributes
2. **Update English template**: Replace inline `<script>` with `@include('tools.partials.{slug}-script')`
3. **Create translation**: `lang/it/tools/{slug}.php` with all Italian strings
4. **Create UI partial**: `resources/views/tools/it/partials/{slug}-ui.blade.php` with tool HTML using `__()` calls
5. **Add seed**: Add entry to `ToolTranslationSeeder.php`
6. **Run seeder**: `php artisan db:seed --class=ToolTranslationSeeder`

## How to Add a New Language

1. Create `lang/{locale}/tools.php` — shared strings (copy from `lang/it/tools.php`, translate)
2. Create `lang/{locale}/tools/{slug}.php` — per-tool translations
3. Add `tool_translations` seed entries with new locale and translated slugs
4. Add routes in `routes/web.php` inside `/it/` group pattern (or make ToolController generic):
    ```php
    Route::prefix('{locale}')->middleware('set-locale')->group(function () {
        Route::get('/{tools-word}/{slug}', [ToolController::class, 'show']);
    });
    ```
5. Create `resources/views/tools/{locale}/` directory or reuse `it/` templates (they read from `__()` which respects locale)
6. Supported locales are defined in `SetLocale.php` middleware

## Routes

```php
// Inside Route::prefix('it')->middleware('set-locale') group:
Route::get('/strumenti', [ToolController::class, 'italianIndex'])->name('tools.index');
Route::get('/strumenti/{slug}', [ToolController::class, 'italianShow'])->name('tools.show');
Route::post('/strumenti/{slug}/view', [ToolController::class, 'italianTrackView']);
```

## Hreflang Tags

The layout (`resources/views/components/layout.blade.php`) generates bidirectional hreflang tags:

- English tool page → links to Italian equivalent (if translation exists)
- Italian tool page → links to English original
- `x-default` → English URL

## View Tracking

Italian tool page views are tracked under the **English slug** in the `tool_views` table. The layout script and `ToolController::italianTrackView()` both resolve Italian slug → English slug before incrementing.

## Sitemap

`GenerateSitemap.php` includes Italian tool URLs by querying `ToolTranslation::where('locale', 'it')`.
