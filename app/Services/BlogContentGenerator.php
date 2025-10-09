<?php

namespace App\Services;

use App\Models\BlogTopic;
use App\Services\AI\OpenRouterService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BlogContentGenerator
{
    protected OpenRouterService $ai;
    protected int $minWordCount;
    protected int $maxWordCount;

    public function __construct(OpenRouterService $ai)
    {
        $this->ai = $ai;
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
        // Pass AI-generated excerpt if available
        $metadata = $this->generateMetadata(
            $content['title'],
            $content['content'],
            $topic,
            $content['ai_generated_excerpt'] ?? null
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
        $prompt = $this->buildTopicPrompt($topic);

        $response = $this->ai->generateWithFallback($prompt);

        return $this->parseGeneratedContent($response['content'], $response);
    }

    /**
     * Generate from YouTube video context
     *
     * @param BlogTopic $topic
     * @return array
     */
    protected function generateFromYouTube(BlogTopic $topic): array
    {
        $prompt = $this->buildYouTubePrompt($topic);

        $response = $this->ai->generateWithFallback($prompt);

        return $this->parseGeneratedContent($response['content'], $response);
    }

    /**
     * Generate from blog post context
     *
     * @param BlogTopic $topic
     * @return array
     */
    protected function generateFromBlog(BlogTopic $topic): array
    {
        $prompt = $this->buildBlogRemixPrompt($topic);

        $response = $this->ai->generateWithFallback($prompt);

        return $this->parseGeneratedContent($response['content'], $response);
    }

    /**
     * Generate from Twitter thread context
     *
     * @param BlogTopic $topic
     * @return array
     */
    protected function generateFromTwitter(BlogTopic $topic): array
    {
        $prompt = $this->buildTwitterPrompt($topic);

        $response = $this->ai->generateWithFallback($prompt);

        return $this->parseGeneratedContent($response['content'], $response);
    }

    /**
     * Build prompt for topic-based generation
     *
     * @param BlogTopic $topic
     * @return string
     */
    protected function buildTopicPrompt(BlogTopic $topic): string
    {
        $authorBio = config('blog.templates.author_bio');
        $hireCta = config('blog.templates.hire_me_cta');

        $prompt = <<<PROMPT
        You are Hafiz Riaz, a Laravel developer and automation expert with 7+ years of experience building SaaS products, Chrome extensions, and automation tools.

        TASK: Write a comprehensive technical blog post about "{$topic->title}"

        REQUIREMENTS:
        - Length: {$this->minWordCount}-{$this->maxWordCount} words
        - Target Audience: {$topic->target_audience}
        - Voice: First-person, professional but conversational
        - Include: Working code examples (Laravel 11 syntax)
        - Explain: Trade-offs, best practices, real-world applications
        - Add: Personal experience ("In my projects...", "I've found that...")

        STRUCTURE:
        1. Hook: Start with a specific problem or scenario
        2. Introduction: Why this matters
        3. Main Content: Technical explanation with code
        4. Practical Examples: Real working code (not pseudocode)
        5. Trade-offs & Alternatives: When to use/not use
        6. Conclusion: Summary + next steps
        7. CTA: {$hireCta}

        KEYWORDS: {$topic->keywords}
        DESCRIPTION: {$topic->description}
        PROMPT;

        if ($topic->custom_prompt) {
            $prompt .= "\n\nADDITIONAL INSTRUCTIONS:\n{$topic->custom_prompt}";
        }

        $prompt .= "\n\nOUTPUT FORMAT (CRITICAL - Follow exactly):

        # [Your Title]

        EXCERPT: [Your compelling 1-2 sentence summary, max 150 chars]

        IMAGE_PROMPT: [Your detailed image generation prompt, 80-120 words]

        [Your blog post content starts here...]

        EXAMPLE OUTPUT:
        # Building Real-Time Chat with Laravel Reverb

        EXCERPT: Learn how to build a modern real-time chat system using Laravel Reverb's WebSocket server and Vue.js components in under 30 minutes.

        IMAGE_PROMPT: Abstract visualization of real-time data flow: glowing cyan data packets streaming through dark fiber-optic channels from multiple users, converging at a central Laravel Reverb server node (represented as a pulsing geometric hub with orange/red accents), then broadcasting outward to connected Vue.js clients shown as translucent green devices. Dark navy background with neon highlights, modern tech aesthetic, dynamic motion blur effects, 3D isometric perspective. NO text on image.

        Real-time features used to require complex infrastructure...

        CRITICAL RULES:
        1. Line 1: Title starting with #
        2. Line 2: Blank line
        3. Line 3: EXCERPT: [text]
        4. Line 4: Blank line
        5. Line 5: IMAGE_PROMPT: [detailed description]
        6. Line 6: Blank line
        7. Line 7+: Blog content

        DO NOT skip the EXCERPT or IMAGE_PROMPT lines. They are mandatory.";

        return $prompt;
    }

    /**
     * Build prompt for YouTube video analysis
     *
     * @param BlogTopic $topic
     * @return string
     */
    protected function buildYouTubePrompt(BlogTopic $topic): string
    {
        $metadata = $topic->source_metadata ?? [];
        $videoTitle = $metadata['title'] ?? 'video';
        $channel = $metadata['channel'] ?? 'unknown channel';
        $hireCta = config('blog.templates.hire_me_cta');

        $prompt = <<<PROMPT
        You are Hafiz Riaz, a Laravel developer. You watched a YouTube video and want to write a blog post about it.

        VIDEO DETAILS:
        - Title: {$videoTitle}
        - Channel: {$channel}
        - URL: {$topic->source_url}

        TRANSCRIPT:
        {$topic->source_content}

        TASK: Write a blog post where you:
        1. Summarize the 3-5 key takeaways from the video
        2. Add YOUR perspective and experience (first-person)
        3. Provide Laravel-specific code examples (if applicable)
        4. Agree/disagree with points (explain why)
        5. Credit the original video: "I recently watched [{$videoTitle}]({$topic->source_url}) by {$channel}..."
        6. End with CTA: {$hireCta}

        REQUIREMENTS:
        - Length: {$this->minWordCount}-{$this->maxWordCount} words
        - Voice: Professional developer sharing insights
        - Include: Working code examples
        - Format: Markdown with proper headings

        TARGET TITLE: {$topic->title}
        PROMPT;

        if ($topic->custom_prompt) {
            $prompt .= "\n\nADDITIONAL FOCUS:\n{$topic->custom_prompt}";
        }

        return $prompt;
    }

    /**
     * Build prompt for blog post remix
     *
     * @param BlogTopic $topic
     * @return string
     */
    protected function buildBlogRemixPrompt(BlogTopic $topic): string
    {
        $metadata = $topic->source_metadata ?? [];
        $originalTitle = $metadata['title'] ?? 'article';
        $author = $metadata['author'] ?? 'the author';
        $hireCta = config('blog.templates.hire_me_cta');

        $prompt = <<<PROMPT
        You are Hafiz Riaz, a Laravel developer. You read an interesting article and want to write a response/alternative approach.

        ORIGINAL ARTICLE:
        - Title: {$originalTitle}
        - Author: {$author}
        - URL: {$topic->source_url}

        CONTENT:
        {$topic->source_content}

        TASK: Write a response post where you:
        1. Acknowledge the original article (give credit)
        2. Provide YOUR alternative approach or perspective
        3. Show Laravel-specific implementation
        4. Compare trade-offs (their approach vs yours)
        5. Explain when each approach works best
        6. Link to original: "I recently read [{$originalTitle}]({$topic->source_url}) by {$author}..."
        7. End with CTA: {$hireCta}

        REQUIREMENTS:
        - Length: {$this->minWordCount}-{$this->maxWordCount} words
        - Voice: Respectful, technical, helpful
        - Include: Complete working code examples
        - Format: Markdown

        YOUR POST TITLE: {$topic->title}
        PROMPT;

        if ($topic->custom_prompt) {
            $prompt .= "\n\nADDITIONAL FOCUS:\n{$topic->custom_prompt}";
        }

        return $prompt;
    }

    /**
     * Build prompt for Twitter thread expansion
     *
     * @param BlogTopic $topic
     * @return string
     */
    protected function buildTwitterPrompt(BlogTopic $topic): string
    {
        $metadata = $topic->source_metadata ?? [];
        $author = $metadata['author'] ?? 'unknown';
        $hireCta = config('blog.templates.hire_me_cta');

        $prompt = <<<PROMPT
        You are Hafiz Riaz, a Laravel developer. You saw an interesting Twitter thread and want to expand it into a full blog post.

        TWITTER THREAD:
        {$topic->source_content}

        Original thread by: @{$author}
        URL: {$topic->source_url}

        TASK: Expand this thread into a comprehensive tutorial where you:
        1. Use each tweet as a section/point
        2. Add detailed technical explanation for each point
        3. Provide working code examples
        4. Include real-world scenarios
        5. Credit the original thread
        6. End with CTA: {$hireCta}

        REQUIREMENTS:
        - Length: {$this->minWordCount}-{$this->maxWordCount} words
        - Include: Complete code examples
        - Format: Markdown

        POST TITLE: {$topic->title}
        PROMPT;

        return $prompt;
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

        // Extract excerpt if provided by AI (format: "EXCERPT: text")
        $aiGeneratedExcerpt = null;
        if (preg_match('/^EXCERPT:\s*(.+)$/m', $content, $excerptMatch)) {
            $aiGeneratedExcerpt = trim($excerptMatch[1]);
            // Remove the EXCERPT line from content
            $content = preg_replace('/^EXCERPT:\s*.+$/m', '', $content);
        }

        // Extract image prompt if provided by AI (format: "IMAGE_PROMPT: text")
        $aiGeneratedImagePrompt = null;
        if (preg_match('/^IMAGE_PROMPT:\s*(.+)$/m', $content, $imagePromptMatch)) {
            $aiGeneratedImagePrompt = trim($imagePromptMatch[1]);
            // Remove the IMAGE_PROMPT line from content
            $content = preg_replace('/^IMAGE_PROMPT:\s*.+$/m', '', $content);
            Log::info('Extracted AI-generated image prompt from content');
        } else {
            // Fallback: AI didn't provide image prompt, generate one using AI
            Log::info('AI did not provide IMAGE_PROMPT, generating fallback');
            $aiGeneratedImagePrompt = $this->generateImagePromptFallback($title, $content);
        }

        // Remove title from content
        $content = preg_replace('/^#\s+.+$/m', '', $content, 1);
        $content = trim($content);

        // Extract tags from content
        $tags = $this->extractTags($content);

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
     * @return array
     */
    protected function generateMetadata(string $title, string $content, BlogTopic $topic, ?string $aiGeneratedExcerpt = null): array
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

        // Generate SEO description (max 160 chars, truncate cleanly)
        $seoDescription = $excerpt;
        if (mb_strlen($seoDescription) > 160) {
            $truncated = mb_substr($seoDescription, 0, 157);
            // Remove trailing "..." from excerpt if present
            $truncated = rtrim($truncated, '.');
            $seoDescription = $truncated . '...';
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

        return array_slice($foundTags, 0, 5); // Max 5 tags
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
