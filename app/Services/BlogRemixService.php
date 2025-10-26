<?php

namespace App\Services;

use App\Enums\RemixStyle;
use App\Models\BlogTopic;
use App\Services\AI\BlogPromptBuilder;
use App\Services\AI\OpenRouterService;
use Illuminate\Support\Facades\Log;

/**
 * Blog Content Remix Service
 *
 * Transforms source content (YouTube transcripts, blog posts, articles)
 * into blog posts with different remix styles (commentary, deep_dive, summary, response).
 *
 * Inspired by Twitter's ContentRemixService but adapted for long-form blog content.
 */
class BlogRemixService
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
     * Remix source content into blog post
     *
     * @param BlogTopic $topic Topic containing source content and remix configuration
     * @return array Same structure as BlogContentGenerator::generate()
     */
    public function remix(BlogTopic $topic): array
    {
        Log::info('BlogRemixService: Starting remix generation', [
            'topic_id' => $topic->id,
            'topic_title' => $topic->title,
            'has_title' => !empty($topic->title),
            'remix_style' => $topic->remix_style,
            'source_type' => $topic->source_type,
            'generation_mode' => $topic->generation_mode,
        ]);

        // Validate topic has required fields
        if (!$topic->hasValidRemixSource()) {
            throw new \Exception('Topic missing required remix fields: source_content or remix_style');
        }

        // If title is empty, we'll let AI generate it from source content
        if (empty($topic->title)) {
            Log::info('BlogRemixService: No title provided, AI will generate from source content');
        }

        // Get remix style enum
        $remixStyle = $topic->getRemixStyle();
        if (!$remixStyle) {
            throw new \Exception('Invalid remix style: ' . $topic->remix_style);
        }

        // Build prompt based on generation mode and remix style
        $prompt = $this->buildRemixPrompt($topic, $remixStyle);

        Log::info('BlogRemixService: Generated prompt', [
            'topic_id' => $topic->id,
            'prompt_length' => strlen($prompt),
        ]);

        // Generate content using AI
        $jsonData = $this->ai->generateStructured($prompt);

        // Parse and transform response
        $result = $this->parseJsonContent($jsonData);
        $result['prompt_used'] = $prompt;
        $result['remix_metadata'] = [
            'remix_style' => $remixStyle->value,
            'source_type' => $topic->source_type,
            'source_url' => $topic->source_url,
            'generation_mode' => $topic->generation_mode,
        ];

        Log::info('BlogRemixService: Remix generation successful', [
            'topic_id' => $topic->id,
            'word_count' => $result['generation_metadata']['word_count'],
            'remix_style' => $remixStyle->value,
        ]);

        return $result;
    }

    /**
     * Build appropriate prompt based on generation mode and remix style
     */
    protected function buildRemixPrompt(BlogTopic $topic, RemixStyle $remixStyle): string
    {
        // Choose base prompt method based on generation mode
        return match ($topic->generation_mode) {
            'context_youtube' => $this->promptBuilder->buildYouTubeRemixPrompt($topic, $remixStyle),
            'context_blog' => $this->promptBuilder->buildBlogRemixPrompt($topic, $remixStyle),
            'context_twitter' => $this->promptBuilder->buildTwitterRemixPrompt($topic, $remixStyle),
            default => throw new \Exception('Invalid generation mode for remix: ' . $topic->generation_mode),
        };
    }

    /**
     * Parse JSON structured content from AI
     *
     * Same structure as BlogContentGenerator::parseJsonContent()
     */
    protected function parseJsonContent(array $jsonData): array
    {
        $content = $jsonData['content'];
        $metadata = $jsonData['metadata'];

        // Calculate reading time
        $wordCount = str_word_count(strip_tags($content));
        $readingTime = ceil($wordCount / 200); // 200 words per minute

        // Quality checks
        $qualityScore = $this->assessQuality($content, $wordCount);
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
                'is_remix' => true,
            ],
        ];
    }

    /**
     * Assess content quality (1-10 score)
     */
    protected function assessQuality(string $content, int $wordCount): int
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
        if ($wordCount >= $this->minWordCount) $score += 1;

        // Check for lists (bullet points)
        $lists = substr_count($content, "\n- ") + substr_count($content, "\n* ");
        if ($lists >= 5) $score += 1;

        return min($score, 10);
    }

    /**
     * Check if content requires code review
     */
    protected function requiresCodeReview(string $content): bool
    {
        // If content has code blocks, it should be reviewed
        return substr_count($content, '```') > 0;
    }

    /**
     * Get source type options for Filament
     */
    public static function getSourceTypes(): array
    {
        return [
            'youtube' => '📹 YouTube Video',
            'blog_post' => '📄 Blog Post',
            'medium' => '📰 Medium Article',
            'article' => '🔗 Web Article',
            'other' => '📋 Other',
        ];
    }
}
