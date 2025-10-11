<?php

namespace App\Services;

use App\Models\BlogTopic;
use App\Services\AI\OpenRouterService;
use App\Services\AI\BlogPromptBuilder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BlogContentGenerator
{
    protected OpenRouterService $ai;
    protected BlogPromptBuilder $promptBuilder;
    protected int $minWordCount;
    protected int $maxWordCount;

    public function __construct(
        OpenRouterService $ai,
        BlogPromptBuilder $promptBuilder
    ) {
        $this->ai = $ai;
        $this->promptBuilder = $promptBuilder;
        $this->minWordCount = config('blog.min_word_count', 1500);
        $this->maxWordCount = config('blog.max_word_count', 2500);
    }

    /**
     * Generate complete blog post from topic
     *
     * @param BlogTopic $topic
     * @return array ['title', 'content', 'excerpt', 'seo_title', 'seo_description', 'tags', 'reading_time', 'generation_metadata']
     */
    public function generate(BlogTopic $topic): array
    {
        Log::info('BlogContentGenerator: Starting generation', [
            'topic_id' => $topic->id,
            'mode' => $topic->generation_mode,
        ]);

        // Generate based on mode
        $content = match ($topic->generation_mode) {
            'topic' => $this->generateFromTopic($topic),
            'context_youtube' => $this->generateFromYouTube($topic),
            'context_blog' => $this->generateFromBlog($topic),
            'context_twitter' => $this->generateFromTwitter($topic),
            default => throw new \Exception('Invalid generation mode: ' . $topic->generation_mode),
        };

        // Generate metadata (SEO, excerpt, etc.)
        $metadata = $this->generateMetadata(
            $content['title'],
            $content['ai_generated_excerpt'] ?? null,
            $content['ai_generated_meta_description'] ?? null
        );

        // Convert markdown to HTML
        $htmlContent = $this->convertMarkdownToHtml($content['content']);

        // Flatten generation_metadata for easier access in jobs
        $generationMetadata = $content['generation_metadata'] ?? [];

        return [
            'title' => $content['title'],
            'content' => $content['content'],
            'html_content' => $htmlContent,
            'markdown_content' => $content['content'],
            'tags' => $content['tags'] ?? [],
            'reading_time' => $content['reading_time'] ?? 5,

            // SEO fields (match job expectations)
            'meta_title' => $metadata['seo_title'],
            'meta_description' => $metadata['seo_description'],
            'excerpt' => $metadata['excerpt'],

            // AI-generated image prompt
            'ai_generated_image_prompt' => $content['ai_generated_image_prompt'] ?? null,

            // Quality & code review
            'quality_score' => $generationMetadata['quality_score'] ?? null,
            'has_code' => $generationMetadata['requires_code_review'] ?? false,
            'word_count' => $generationMetadata['word_count'] ?? 0,

            // AI generation tracking
            'model' => $generationMetadata['model'] ?? 'unknown',
            'ai_provider' => 'openrouter',
            'tokens' => $generationMetadata['tokens'] ?? 0,
            'cost' => $generationMetadata['cost'] ?? 0,
            'generation_time' => $generationMetadata['generation_time'] ?? 0,

            // Prompt used for content generation
            'content_prompt' => $content['prompt_used'] ?? null,
        ];
    }

    /**
     * Generate from topic mode using JSON structured output
     *
     * @param BlogTopic $topic
     * @return array
     */
    protected function generateFromTopic(BlogTopic $topic): array
    {
        // Choose prompt based on content type
        $prompt = match ($topic->content_type ?? 'technical') {
            'opinion' => $this->promptBuilder->buildOpinionPrompt($topic),
            'news' => $this->promptBuilder->buildNewsPrompt($topic),
            default => $this->promptBuilder->buildTechnicalPrompt($topic),
        };

        Log::info('BlogContentGenerator: Starting JSON generation', [
            'topic_id' => $topic->id,
            'content_type' => $topic->content_type,
        ]);

        $jsonData = $this->ai->generateStructured($prompt);

        // Transform JSON response to standard format
        $result = $this->parseJsonContent($jsonData);
        $result['prompt_used'] = $prompt;

        Log::info('BlogContentGenerator: JSON generation successful', [
            'topic_id' => $topic->id,
            'word_count' => $result['generation_metadata']['word_count'],
        ]);

        return $result;
    }

    /**
     * Generate from YouTube video context
     *
     * @param BlogTopic $topic
     * @return array
     */
    protected function generateFromYouTube(BlogTopic $topic): array
    {
        $prompt = $this->promptBuilder->buildYouTubePrompt($topic);

        Log::info('BlogContentGenerator: Starting JSON generation (YouTube mode)', [
            'topic_id' => $topic->id,
        ]);

        $jsonData = $this->ai->generateStructured($prompt);

        $result = $this->parseJsonContent($jsonData);
        $result['prompt_used'] = $prompt;

        return $result;
    }

    /**
     * Generate from blog post context
     *
     * @param BlogTopic $topic
     * @return array
     */
    protected function generateFromBlog(BlogTopic $topic): array
    {
        $prompt = $this->promptBuilder->buildBlogRemixPrompt($topic);

        Log::info('BlogContentGenerator: Starting JSON generation (Blog remix mode)', [
            'topic_id' => $topic->id,
        ]);

        $jsonData = $this->ai->generateStructured($prompt);

        $result = $this->parseJsonContent($jsonData);
        $result['prompt_used'] = $prompt;

        return $result;
    }

    /**
     * Generate from Twitter thread context
     *
     * @param BlogTopic $topic
     * @return array
     */
    protected function generateFromTwitter(BlogTopic $topic): array
    {
        $prompt = $this->promptBuilder->buildTwitterPrompt($topic);

        Log::info('BlogContentGenerator: Starting JSON generation (Twitter mode)', [
            'topic_id' => $topic->id,
        ]);

        $jsonData = $this->ai->generateStructured($prompt);

        $result = $this->parseJsonContent($jsonData);
        $result['prompt_used'] = $prompt;

        return $result;
    }

    /**
     * Parse JSON structured content
     *
     * @param array $jsonData
     * @return array
     */
    protected function parseJsonContent(array $jsonData): array
    {
        $content = $jsonData['content'];
        $metadata = $jsonData['metadata'];

        // Calculate reading time
        $wordCount = str_word_count(strip_tags($content));
        $readingTime = ceil($wordCount / 200); // 200 words per minute

        // Quality checks
        $qualityScore = $this->assessQuality($content);
        $requiresCodeReview = $this->requiresCodeReview($content);

        return [
            'title' => $jsonData['title'],
            'content' => $content,
            'tags' => $jsonData['tags'],
            'reading_time' => $readingTime,
            'ai_generated_excerpt' => $jsonData['excerpt'],
            'ai_generated_meta_description' => $jsonData['meta_description'],
            'ai_generated_image_prompt' => $jsonData['image_prompt'],
            'generation_metadata' => [
                'word_count' => $wordCount,
                'quality_score' => $qualityScore,
                'requires_code_review' => $requiresCodeReview,
                'model' => $metadata['model'],
                'tokens' => $metadata['tokens'],
                'cost' => $metadata['cost'],
                'generation_time' => $metadata['generation_time'],
                'format' => 'json',
            ],
        ];
    }

    /**
     * Generate SEO metadata
     *
     * @param string $title
     * @param string|null $aiGeneratedExcerpt
     * @param string|null $aiGeneratedMetaDescription
     * @return array
     */
    protected function generateMetadata(string $title, ?string $aiGeneratedExcerpt = null, ?string $aiGeneratedMetaDescription = null): array
    {
        // Use AI-generated excerpt (always provided by JSON)
        Log::info("Summery/Excerpt:", ['aiGeneratedExcerpt' => $aiGeneratedExcerpt]);

        $excerpt = $aiGeneratedExcerpt;
        // Ensure it's not too long
        if (mb_strlen($excerpt) > 200) {
            $excerpt = mb_substr($excerpt, 0, 197) . '...';
        }

        // Generate SEO title (max 60 chars, truncate cleanly)
        $seoTitle = $title;
        if (mb_strlen($seoTitle) > 60) {
            $seoTitle = mb_substr($seoTitle, 0, 57) . '...';
        }

        // Use AI-generated meta description (always provided by JSON)
        $seoDescription = $aiGeneratedMetaDescription;
        // Ensure it's exactly 160 chars or less
        if (mb_strlen($seoDescription) > 160) {
            $seoDescription = mb_substr($seoDescription, 0, 157) . '...';
        }

        return [
            'excerpt' => $excerpt,
            'seo_title' => $seoTitle,
            'seo_description' => $seoDescription,
        ];
    }

    /**
     * Assess content quality (1-10 score)
     *
     * @param string $content
     * @return int
     */
    protected function assessQuality(string $content): int
    {
        $score = 5; // Base score

        // Check for code blocks
        $codeBlocks = substr_count($content, '```');
        if ($codeBlocks >= 2) $score += 2;
        if ($codeBlocks >= 4) $score += 1;

        // Check for headings
        $headings = substr_count($content, '##');
        if ($headings >= 3) $score += 1;

        // Check word count
        $wordCount = str_word_count($content);
        if ($wordCount >= $this->minWordCount) $score += 1;

        return min($score, 10);
    }

    /**
     * Check if content requires code review
     *
     * @param string $content
     * @return bool
     */
    protected function requiresCodeReview(string $content): bool
    {
        // If content has code blocks, it should be reviewed
        return substr_count($content, '```') > 0;
    }

    /**
     * Convert Markdown content to HTML
     *
     * @param string $markdown
     * @return string
     */
    protected function convertMarkdownToHtml(string $markdown): string
    {
        // Use Laravel's Str::markdown() for basic conversion
        // Or if you have league/commonmark installed, use that
        if (class_exists(\League\CommonMark\CommonMarkConverter::class)) {
            $converter = new \League\CommonMark\CommonMarkConverter([
                'html_input' => 'strip',
                'allow_unsafe_links' => false,
            ]);
            return $converter->convert($markdown)->getContent();
        }

        // Fallback to basic Str::markdown if available
        if (method_exists(Str::class, 'markdown')) {
            return Str::markdown($markdown);
        }

        // Simple fallback conversion
        return $this->simpleMarkdownToHtml($markdown);
    }

    /**
     * Simple markdown to HTML conversion (fallback)
     *
     * @param string $markdown
     * @return string
     */
    protected function simpleMarkdownToHtml(string $markdown): string
    {
        $html = $markdown;

        // Convert headers
        $html = preg_replace('/^#### (.+)$/m', '<h4>$1</h4>', $html);
        $html = preg_replace('/^### (.+)$/m', '<h3>$1</h3>', $html);
        $html = preg_replace('/^## (.+)$/m', '<h2>$1</h2>', $html);
        $html = preg_replace('/^# (.+)$/m', '<h1>$1</h1>', $html);

        // Convert code blocks
        $html = preg_replace('/```(\w+)?\n(.*?)\n```/s', '<pre><code>$2</code></pre>', $html);

        // Convert inline code
        $html = preg_replace('/`([^`]+)`/', '<code>$1</code>', $html);

        // Convert bold
        $html = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $html);

        // Convert italic
        $html = preg_replace('/\*(.+?)\*/', '<em>$1</em>', $html);

        // Convert lists
        $html = preg_replace('/^- (.+)$/m', '<li>$1</li>', $html);
        $html = preg_replace('/(<li>.*<\/li>)/s', '<ul>$1</ul>', $html);

        // Convert links
        $html = preg_replace('/\[([^\]]+)\]\(([^\)]+)\)/', '<a href="$2">$1</a>', $html);

        // Convert paragraphs
        $html = '<p>' . preg_replace('/\n\n/', '</p><p>', $html) . '</p>';

        return $html;
    }
}
