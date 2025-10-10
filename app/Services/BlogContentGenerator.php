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
        // Pass AI-generated excerpt and meta description if available
        $metadata = $this->generateMetadata(
            $content['title'],
            $content['content'],
            $topic,
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

            // AI-generated image prompt (for FalImageService)
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
     * Generate from topic mode (original StudyLab approach)
     *
     * @param BlogTopic $topic
     * @return array
     */
    protected function generateFromTopic(BlogTopic $topic): array
    {
        // Choose prompt based on content type using BlogPromptBuilder
        $prompt = match ($topic->content_type ?? 'technical') {
            'opinion' => $this->promptBuilder->buildOpinionPrompt($topic),
            'news' => $this->promptBuilder->buildNewsPrompt($topic),
            default => $this->promptBuilder->buildTechnicalPrompt($topic),
        };

        $response = $this->ai->generateWithFallback($prompt);

        $result = $this->parseGeneratedContent($response['content'], $response);
        $result['prompt_used'] = $prompt; // Store the prompt for logging

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

        $response = $this->ai->generateWithFallback($prompt);

        $result = $this->parseGeneratedContent($response['content'], $response);
        $result['prompt_used'] = $prompt; // Store the prompt for logging

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

        $response = $this->ai->generateWithFallback($prompt);

        $result = $this->parseGeneratedContent($response['content'], $response);
        $result['prompt_used'] = $prompt; // Store the prompt for logging

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

        $response = $this->ai->generateWithFallback($prompt);

        $result = $this->parseGeneratedContent($response['content'], $response);
        $result['prompt_used'] = $prompt; // Store the prompt for logging

        return $result;
    }


    /**
     * Parse generated content and extract components
     *
     * @param string $content
     * @param array $generationData
     * @return array
     */
    protected function parseGeneratedContent(string $content, array $generationData): array
    {
        // Extract title (first # heading)
        preg_match('/^#\s+(.+)$/m', $content, $titleMatch);
        $title = $titleMatch[1] ?? 'Untitled Post';

        // Extract excerpt if provided by AI (format: "EXCERPT: text" or "**EXCERPT:** text")
        $aiGeneratedExcerpt = null;
        if (preg_match('/\*\*EXCERPT:\*\*\s*(.+)|^EXCERPT:\s*(.+)/m', $content, $excerptMatch)) {
            $aiGeneratedExcerpt = trim($excerptMatch[1] ?? $excerptMatch[2]);
            // Remove the entire line including markdown formatting
            $content = preg_replace('/^\*\*EXCERPT:\*\*.*$|^EXCERPT:.*$/m', '', $content, 1);
            Log::info('Extracted and removed EXCERPT from content', ['excerpt_length' => mb_strlen($aiGeneratedExcerpt)]);
        }

        // Extract meta description if provided by AI (format: "META_DESCRIPTION: text" or "**META_DESCRIPTION:** text")
        $aiGeneratedMetaDescription = null;
        if (preg_match('/\*\*META_DESCRIPTION:\*\*\s*(.+)|^META_DESCRIPTION:\s*(.+)/m', $content, $metaMatch)) {
            $aiGeneratedMetaDescription = trim($metaMatch[1] ?? $metaMatch[2]);
            // Remove the entire line including markdown formatting
            $content = preg_replace('/^\*\*META_DESCRIPTION:\*\*.*$|^META_DESCRIPTION:.*$/m', '', $content, 1);
            Log::info('Extracted AI-generated meta description', ['length' => mb_strlen($aiGeneratedMetaDescription)]);
        }

        // Extract image prompt if provided by AI (format: "IMAGE_PROMPT: text" or "**IMAGE_PROMPT:** text" - can be multi-line)
        $aiGeneratedImagePrompt = null;
        if (preg_match('/\*\*IMAGE_PROMPT:\*\*\s*(.+?)(?=\n\n|\*\*TAGS:)|^IMAGE_PROMPT:\s*(.+?)(?=\n\n|^TAGS:)/ms', $content, $imagePromptMatch)) {
            $aiGeneratedImagePrompt = trim($imagePromptMatch[1] ?? $imagePromptMatch[2]);
            // Remove the IMAGE_PROMPT section including markdown formatting
            $content = preg_replace('/^\*\*IMAGE_PROMPT:\*\*.*?(?=\n\n|\*\*TAGS:)|^IMAGE_PROMPT:.*?(?=\n\n|^TAGS:)/ms', '', $content, 1);
            Log::info('Extracted AI-generated image prompt from content');
        } else {
            // Fallback: AI didn't provide image prompt, generate one using AI
            Log::info('AI did not provide IMAGE_PROMPT, generating fallback');
            $aiGeneratedImagePrompt = $this->generateImagePromptFallback($title, $content);
        }

        // Extract tags if provided by AI (format: "TAGS: tag1, tag2, tag3" or "**TAGS:** tag1, tag2, tag3")
        $tags = [];
        if (preg_match('/\*\*TAGS:\*\*\s*(.+)|^TAGS:\s*(.+)/m', $content, $tagsMatch)) {
            $tagsString = trim($tagsMatch[1] ?? $tagsMatch[2]);
            // Remove the entire line including markdown formatting
            $content = preg_replace('/^\*\*TAGS:\*\*.*$|^TAGS:.*$/m', '', $content, 1);

            // Only process if we have actual tag content
            if (!empty($tagsString)) {
                // Split by comma and clean up
                $tags = array_map('trim', explode(',', $tagsString));
                // Remove any empty tags
                $tags = array_filter($tags, fn($tag) => !empty($tag));
                Log::info('Extracted AI-generated tags', ['tags' => $tags, 'count' => count($tags)]);
            } else {
                // TAGS label found but no content, use fallback
                Log::info('TAGS label found but empty, using fallback extraction');
                $tags = $this->extractTags($content);
            }
        } else {
            // Fallback: AI didn't provide tags, use extraction method
            Log::info('AI did not provide TAGS, using fallback extraction');
            $tags = $this->extractTags($content);
        }

        // Remove title from content
        $content = preg_replace('/^#\s+.+$/m', '', $content, 1);

        // Clean up multiple blank lines left after extraction (replace 3+ newlines with 2)
        $content = preg_replace('/\n{3,}/', "\n\n", $content);

        $content = trim($content);

        // Calculate reading time
        $wordCount = str_word_count(strip_tags($content));
        $readingTime = ceil($wordCount / 200); // 200 words per minute

        // Quality checks
        $qualityScore = $this->assessQuality($content);
        $requiresCodeReview = $this->requiresCodeReview($content);

        return [
            'title' => $title,
            'content' => $content,
            'tags' => $tags,
            'reading_time' => $readingTime,
            'ai_generated_excerpt' => $aiGeneratedExcerpt, // Pass this to generateMetadata
            'ai_generated_meta_description' => $aiGeneratedMetaDescription, // Pass to generateMetadata
            'ai_generated_image_prompt' => $aiGeneratedImagePrompt, // Pass to image generation
            'generation_metadata' => [
                'word_count' => $wordCount,
                'quality_score' => $qualityScore,
                'requires_code_review' => $requiresCodeReview,
                'model' => $generationData['model'],
                'tokens' => $generationData['tokens'],
                'cost' => $generationData['cost'],
                'generation_time' => $generationData['generation_time'],
            ],
        ];
    }

    /**
     * Generate SEO metadata
     *
     * @param string $title
     * @param string $content
     * @param BlogTopic $topic
     * @param string|null $aiGeneratedExcerpt
     * @param string|null $aiGeneratedMetaDescription
     * @return array
     */
    protected function generateMetadata(string $title, string $content, BlogTopic $topic, ?string $aiGeneratedExcerpt = null, ?string $aiGeneratedMetaDescription = null): array
    {
        // If AI generated a good excerpt, use it (preferred)
        if ($aiGeneratedExcerpt && mb_strlen($aiGeneratedExcerpt) > 20) {
            $excerpt = $aiGeneratedExcerpt;
            // Ensure it's not too long
            if (mb_strlen($excerpt) > 200) {
                $excerpt = mb_substr($excerpt, 0, 197) . '...';
            }
        } else {
            // Fallback: Generate excerpt by stripping markdown
            $excerpt = $this->generateExcerptFromContent($content);
        }

        // Generate SEO title (max 60 chars, truncate cleanly)
        $seoTitle = $title;
        if (mb_strlen($seoTitle) > 60) {
            $seoTitle = mb_substr($seoTitle, 0, 57) . '...';
        }

        // Use AI-generated meta description if available (preferred for SEO)
        if ($aiGeneratedMetaDescription && mb_strlen($aiGeneratedMetaDescription) >= 120) {
            $seoDescription = $aiGeneratedMetaDescription;
            // Ensure it's exactly 160 chars or less
            if (mb_strlen($seoDescription) > 160) {
                $seoDescription = mb_substr($seoDescription, 0, 157) . '...';
            }
        } else {
            // Fallback: Use excerpt as meta description
            $seoDescription = $excerpt;
            if (mb_strlen($seoDescription) > 160) {
                $truncated = mb_substr($seoDescription, 0, 157);
                $truncated = rtrim($truncated, '.');
                $seoDescription = $truncated . '...';
            }
        }

        return [
            'excerpt' => $excerpt,
            'seo_title' => $seoTitle,
            'seo_description' => $seoDescription,
        ];
    }

    /**
     * Generate excerpt from content by stripping markdown (fallback method)
     *
     * @param string $content
     * @return string
     */
    protected function generateExcerptFromContent(string $content): string
    {
        // Strip ALL markdown formatting
        $plainText = $content;

        // Remove code blocks first (including content inside)
        $plainText = preg_replace('/```[\s\S]*?```/m', '', $plainText);

        // Remove inline code
        $plainText = preg_replace('/`([^`]+)`/', '$1', $plainText);

        // Remove headers (##, ###, etc.)
        $plainText = preg_replace('/^#{1,6}\s+(.*)$/m', '$1', $plainText);

        // Remove links but keep text [text](url) -> text
        $plainText = preg_replace('/\[([^\]]+)\]\([^\)]+\)/', '$1', $plainText);

        // Remove images
        $plainText = preg_replace('/!\[([^\]]*)\]\([^\)]+\)/', '', $plainText);

        // Remove bold/italic (**text** or *text* or __text__ or _text_)
        $plainText = preg_replace('/[*_]{1,2}([^*_]+)[*_]{1,2}/', '$1', $plainText);

        // Remove blockquotes (> text)
        $plainText = preg_replace('/^>\s+(.*)$/m', '$1', $plainText);

        // Remove horizontal rules
        $plainText = preg_replace('/^(-{3,}|_{3,}|\*{3,})$/m', '', $plainText);

        // Remove list markers (-, *, +, 1., 2., etc.)
        $plainText = preg_replace('/^[\s]*[-*+]\s+/m', '', $plainText);
        $plainText = preg_replace('/^[\s]*\d+\.\s+/m', '', $plainText);

        // Normalize whitespace (multiple spaces/newlines to single space)
        $plainText = preg_replace('/\s+/', ' ', $plainText);

        // Trim and clean up
        $plainText = trim($plainText);

        // Generate excerpt (200 chars without "...")
        $excerpt = mb_substr($plainText, 0, 200);
        if (mb_strlen($plainText) > 200) {
            // Find last complete word within 200 chars
            $lastSpace = mb_strrpos($excerpt, ' ');
            if ($lastSpace !== false) {
                $excerpt = mb_substr($excerpt, 0, $lastSpace);
            }
            $excerpt .= '...';
        }

        return $excerpt;
    }

    /**
     * Extract tags from content based on keywords
     *
     * @param string $content
     * @return array
     */
    protected function extractTags(string $content): array
    {
        $commonTags = ['Laravel', 'PHP', 'JavaScript', 'Vue.js', 'React', 'Docker', 'MySQL', 'Redis', 'API', 'SaaS', 'Automation'];

        $foundTags = [];
        foreach ($commonTags as $tag) {
            if (stripos($content, $tag) !== false) {
                $foundTags[] = $tag;
            }
        }

        $tags = array_slice($foundTags, 0, 5); // Max 5 tags

        // Always return proper array, never array with empty string
        return !empty($tags) ? $tags : [];
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

    /**
     * Generate image prompt using AI as fallback when main generation doesn't provide one
     *
     * @param string $title
     * @param string $content
     * @return string|null
     */
    protected function generateImagePromptFallback(string $title, string $content): ?string
    {
        try {
            // Extract first 500 words for context
            $words = str_word_count($content, 2);
            $first500Words = implode(' ', array_slice($words, 0, 500));

            $prompt = <<<PROMPT
            You are an expert at creating detailed image generation prompts for FLUX/DALL-E.

            BLOG POST TITLE: {$title}

            CONTENT PREVIEW: {$first500Words}

            TASK: Generate a single, detailed image prompt (80-120 words) for a professional blog header image that visually represents the key concepts from this technical article.

            REQUIREMENTS:
            - Be specific about visual metaphors, colors, composition, and mood
            - Focus on abstract representations of technical concepts
            - Use modern tech aesthetic with dark backgrounds and vibrant accents
            - NO text or words should appear in the image
            - Make it visually compelling and relevant to the content

            OUTPUT: Just the image prompt, nothing else.

            EXAMPLE: "Abstract visualization of database optimization: flowing data streams transforming from chaotic red tangles into organized blue pipelines, with cache layers shown as transparent accelerator rings, against dark gradient background transitioning from warm orange to cool cyan, modern 3D abstract style, energetic and dynamic composition. NO text on image."
            PROMPT;

            // Use primary model for fallback image prompt (reliable and cheap)
            $response = $this->ai->generate($prompt, config('blog.models.primary'));

            return trim($response['content']);
        } catch (\Exception $e) {
            Log::warning('Failed to generate fallback image prompt', [
                'error' => $e->getMessage(),
            ]);
            return null; // Will fall back to static template in FalImageService
        }
    }
}
