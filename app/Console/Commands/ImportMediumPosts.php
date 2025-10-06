<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use DOMDocument;
use DOMXPath;

class ImportMediumPosts extends Command
{
    protected $signature = 'import:medium {--test : Only import first 3 posts for testing}';
    protected $description = 'Import Medium exported posts into the blog';

    public function handle()
    {
        $postsPath = base_path('medium-exported-data/posts');

        if (!is_dir($postsPath)) {
            $this->error("Posts directory not found: {$postsPath}");
            return 1;
        }

        $files = glob($postsPath . '/*.html');

        if (empty($files)) {
            $this->error('No HTML files found in the posts directory');
            return 1;
        }

        // Sort by filename (date) ascending
        sort($files);

        // If testing, only import first 3 posts
        if ($this->option('test')) {
            $files = array_slice($files, 0, 3);
            $this->info('Testing mode: Importing first 3 posts only');
        }

        $this->info('Found ' . count($files) . ' posts to import');
        $bar = $this->output->createProgressBar(count($files));
        $bar->start();

        $imported = 0;
        $skipped = 0;

        foreach ($files as $file) {
            $result = $this->importPost($file);

            if ($result) {
                $imported++;
            } else {
                $skipped++;
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);
        $this->info("Import complete!");
        $this->info("Imported: {$imported}");
        $this->info("Skipped: {$skipped}");

        return 0;
    }

    protected function importPost($filePath)
    {
        $html = file_get_contents($filePath);

        // Parse HTML
        $dom = new DOMDocument();
        @$dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $xpath = new DOMXPath($dom);

        // Extract data
        $title = $this->extractTitle($xpath);
        $subtitle = $this->extractSubtitle($xpath);

        // Extract featured image BEFORE extracting content (so we get the first image)
        $rawContent = $this->extractRawContent($xpath, $dom);
        $featuredImage = $this->extractFeaturedImage($rawContent);

        // Now extract content with duplicates removed
        $content = $this->cleanContent($rawContent);

        $publishDate = $this->extractPublishDate($filePath);
        $mediumUrl = $this->extractCanonicalUrl($xpath);

        if (empty($title) || empty($content)) {
            $this->warn("Skipping {$filePath}: Missing title or content");
            return false;
        }

        // Generate slug from title
        $slug = Str::slug($title);

        // Check if post already exists
        if (Post::where('slug', $slug)->exists()) {
            $this->warn("Skipping {$title}: Already exists");
            return false;
        }

        // Convert HTML to Markdown
        $markdown = $this->htmlToMarkdown($content);

        // Calculate reading time (average 200 words per minute)
        $wordCount = str_word_count(strip_tags($markdown));
        $readingTime = max(1, ceil($wordCount / 200));

        // Extract tags from title/content (simple approach)
        $tags = $this->extractTags($title, $markdown);

        // Create post
        Post::create([
            'title' => $title,
            'slug' => $slug,
            'excerpt' => $subtitle ?: Str::limit(strip_tags($markdown), 200),
            'content' => $markdown,
            'featured_image' => $featuredImage,
            'seo_title' => $title,
            'seo_description' => $subtitle ?: Str::limit(strip_tags($markdown), 160),
            'tags' => $tags,
            'status' => 'draft', // Import as draft for review before publishing
            'published_at' => $publishDate, // Keep original date, but set status to draft
            'reading_time' => $readingTime,
            'views' => 0,
        ]);

        return true;
    }

    protected function extractTitle($xpath)
    {
        $nodes = $xpath->query('//h1[@class="p-name"]');
        return $nodes->length > 0 ? trim($nodes->item(0)->textContent) : '';
    }

    protected function extractSubtitle($xpath)
    {
        $nodes = $xpath->query('//section[@data-field="subtitle"]');
        return $nodes->length > 0 ? trim($nodes->item(0)->textContent) : '';
    }

    protected function extractRawContent($xpath, $dom)
    {
        $nodes = $xpath->query('//section[@data-field="body"]');

        if ($nodes->length > 0) {
            $bodyNode = $nodes->item(0);

            // Get inner HTML
            $innerHTML = '';
            foreach ($bodyNode->childNodes as $child) {
                $innerHTML .= $dom->saveHTML($child);
            }

            return $innerHTML;
        }

        return '';
    }

    protected function cleanContent($innerHTML)
    {
        // Remove the title and subtitle from content (they're displayed separately in the template)
        // Remove h3 with class "graf--title" (main title)
        $innerHTML = preg_replace('/<h3[^>]*class="[^"]*graf--title[^"]*"[^>]*>.*?<\/h3>/is', '', $innerHTML);

        // Remove h4 with class "graf--subtitle" (subtitle)
        $innerHTML = preg_replace('/<h4[^>]*class="[^"]*graf--subtitle[^"]*"[^>]*>.*?<\/h4>/is', '', $innerHTML);

        // Remove the first figure/image (it's the featured image, displayed separately)
        $innerHTML = preg_replace('/<figure[^>]*>.*?<\/figure>/is', '', $innerHTML, 1);

        return $innerHTML;
    }

    protected function extractPublishDate($filePath)
    {
        // Extract date from filename: 2023-09-16_Title-goes-here.html
        $filename = basename($filePath);

        if (preg_match('/^(\d{4}-\d{2}-\d{2})_/', $filename, $matches)) {
            return $matches[1] . ' 12:00:00';
        }

        return now();
    }

    protected function extractCanonicalUrl($xpath)
    {
        $nodes = $xpath->query('//a[@class="p-canonical"]');
        return $nodes->length > 0 ? $nodes->item(0)->getAttribute('href') : '';
    }

    protected function extractFeaturedImage($html)
    {
        // Find first image in content
        if (preg_match('/<img[^>]+src="([^">]+)"/', $html, $matches)) {
            return $matches[1];
        }

        return null;
    }

    protected function htmlToMarkdown($html)
    {
        // Clean up HTML
        $html = $this->cleanHtml($html);

        // Convert common HTML elements to Markdown
        $markdown = $html;

        // Convert headings
        $markdown = preg_replace('/<h3[^>]*>(.*?)<\/h3>/is', "### $1\n\n", $markdown);
        $markdown = preg_replace('/<h4[^>]*>(.*?)<\/h4>/is', "#### $1\n\n", $markdown);
        $markdown = preg_replace('/<h5[^>]*>(.*?)<\/h5>/is', "##### $1\n\n", $markdown);

        // Convert bold
        $markdown = preg_replace('/<strong[^>]*>(.*?)<\/strong>/is', "**$1**", $markdown);

        // Convert italic
        $markdown = preg_replace('/<em[^>]*>(.*?)<\/em>/is', "*$1*", $markdown);

        // Convert code blocks
        $markdown = preg_replace('/<pre[^>]*><span[^>]*>(.*?)<\/span><\/pre>/is', "```\n$1\n```\n\n", $markdown);
        $markdown = preg_replace('/<pre[^>]*>(.*?)<\/pre>/is', "```\n$1\n```\n\n", $markdown);

        // Convert inline code
        $markdown = preg_replace('/<code[^>]*>(.*?)<\/code>/is', "`$1`", $markdown);

        // Convert links
        $markdown = preg_replace('/<a[^>]+href="([^"]*)"[^>]*>(.*?)<\/a>/is', "[$2]($1)", $markdown);

        // Convert images
        $markdown = preg_replace('/<img[^>]+src="([^"]+)"[^>]*>/i', "![]($1)\n\n", $markdown);

        // Convert lists
        $markdown = preg_replace('/<li[^>]*>(.*?)<\/li>/is', "- $1\n", $markdown);
        $markdown = preg_replace('/<\/ul>/', "\n", $markdown);
        $markdown = preg_replace('/<ul[^>]*>/', "\n", $markdown);
        $markdown = preg_replace('/<\/ol>/', "\n", $markdown);
        $markdown = preg_replace('/<ol[^>]*>/', "\n", $markdown);

        // Convert paragraphs
        $markdown = preg_replace('/<p[^>]*>(.*?)<\/p>/is', "$1\n\n", $markdown);

        // Remove remaining HTML tags
        $markdown = strip_tags($markdown);

        // Clean up line breaks
        $markdown = preg_replace("/\n{3,}/", "\n\n", $markdown);
        $markdown = html_entity_decode($markdown, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        return trim($markdown);
    }

    protected function cleanHtml($html)
    {
        // Remove section wrappers
        $html = preg_replace('/<section[^>]*>/', '', $html);
        $html = preg_replace('/<\/section>/', '', $html);

        // Remove divs
        $html = preg_replace('/<div[^>]*>/', '', $html);
        $html = preg_replace('/<\/div>/', '', $html);

        // Remove figures but keep images
        $html = preg_replace('/<figure[^>]*>/', '', $html);
        $html = preg_replace('/<\/figure>/', '', $html);

        // Remove class attributes
        $html = preg_replace('/\s+class="[^"]*"/i', '', $html);
        $html = preg_replace('/\s+id="[^"]*"/i', '', $html);
        $html = preg_replace('/\s+name="[^"]*"/i', '', $html);
        $html = preg_replace('/\s+data-[^=]*="[^"]*"/i', '', $html);

        return $html;
    }

    protected function extractTags($title, $content)
    {
        $tags = [];

        // Common tech keywords to look for
        $keywords = [
            'Laravel', 'Vue', 'Vuetify', 'PHP', 'JavaScript', 'MySQL', 'Docker',
            'API', 'AI', 'Linux', 'Bash', 'Programming', 'Web Development',
            'Tutorial', 'Guide', 'Beginner', 'Development', 'PWA', 'SaaS'
        ];

        $text = $title . ' ' . $content;

        foreach ($keywords as $keyword) {
            if (stripos($text, $keyword) !== false) {
                $tags[] = $keyword;
            }
        }

        // Limit to 5 tags
        return array_slice(array_unique($tags), 0, 5);
    }
}
