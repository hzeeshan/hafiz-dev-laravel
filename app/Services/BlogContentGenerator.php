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
        $metadata = $this->generateMetadata($content['title'], $content['content'], $topic);

        return array_merge($content, $metadata);
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
        You are Hafiz Riaz, a Laravel developer and automation expert with 5+ years of experience building SaaS products, Chrome extensions, and automation tools.

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

        $prompt .= "\n\nIMPORTANT: Return ONLY markdown content. Start directly with title (# Title). No preamble, no explanations about what you're doing.";

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
     * @return array
     */
    protected function generateMetadata(string $title, string $content, BlogTopic $topic): array
    {
        // Generate excerpt (first 200 chars of content, no markdown)
        $plainText = strip_tags($content);
        $excerpt = Str::limit($plainText, 200);

        // Generate SEO title (max 60 chars)
        $seoTitle = Str::limit($title, 60);

        // Generate SEO description (max 160 chars)
        $seoDescription = Str::limit($excerpt, 160);

        return [
            'excerpt' => $excerpt,
            'seo_title' => $seoTitle,
            'seo_description' => $seoDescription,
        ];
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
}
