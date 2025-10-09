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
        You are Hafiz Riaz, a Laravel developer and automation expert with 9+ years of experience building SaaS products, Chrome extensions, and automation tools.

        TASK: Write a comprehensive, SEO-optimized technical blog post about "{$topic->title}"

        AUDIENCE: {$topic->target_audience}
        PRIMARY KEYWORDS: {$topic->keywords}
        CONTEXT: {$topic->description}
        WORD COUNT: {$this->minWordCount}-{$this->maxWordCount} words

        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
        SEO OPTIMIZATION (CRITICAL - This Drives Leads & Traffic)
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        1. TITLE: Include primary keyword near beginning, 50-60 chars, make it compelling
        2. FIRST PARAGRAPH: Use primary keyword in first 100 words naturally
        3. HEADERS: Use H2/H3 with keyword variations ("How to...", "Best practices...")
        4. KEYWORD DENSITY: 1-2% primary keyword (natural, not stuffed)
        5. LSI KEYWORDS: Use related terms throughout (semantic SEO)
        6. META DESCRIPTION: 150-160 chars, primary keyword in first 120 chars, compelling
        7. FEATURED SNIPPET: Structure one section to answer "What is..." or "How to..." clearly
        8. INTERNAL LINKS: Suggest 2-3 links using [link to: Related Topic Name]
        9. SCANNABILITY: Short paragraphs (2-4 sentences), bullet points, numbered lists

        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
        CONTENT STRUCTURE
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        1. HOOK & INTRODUCTION (150-200 words)
           - Start with specific problem (include primary keyword)
           - Why this matters to reader
           - What they'll learn/achieve
           - Personal credibility

        2. MAIN CONTENT (800-1500 words)
           - H2: Major topics (with keyword variations)
           - H3: Specific steps
           - Working code examples (Laravel 11)
           - Explain why, not just how
           - Real-world use cases

        3. STEP-BY-STEP TUTORIAL (300-500 words)
           - "How to [achieve X]" format (featured snippet target)
           - Numbered steps with code
           - Clear success criteria

        4. TRADE-OFFS & ALTERNATIVES (200-300 words)
           - Pros and cons
           - When to use/not use
           - Alternative solutions

        5. COMMON MISTAKES (150-200 words)
           - Targets "mistakes to avoid" searches
           - Solutions for each

        6. CONCLUSION (100-150 words)
           - Recap key points
           - Actionable next step

        7. CTA: {$hireCta}

        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
        WRITING STYLE
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        ✓ First-person, conversational but professional
        ✓ Active voice, short sentences (15-20 words avg)
        ✓ Transition words (However, Additionally, Therefore)
        ✓ Code comments explaining logic
        ✓ Personal examples ("In my projects...", "I've found...")
        ✓ Natural keyword integration (NO stuffing)
        ✓ Bold important terms, use bullet points

        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
        HUMANIZATION (CRITICAL - Avoid AI Detection)
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        SENTENCE VARIETY (Burstiness):
        - Mix short punchy sentences (5-8 words) with longer ones (20-25 words)
        - Vary paragraph length (some 2 sentences, some 5 sentences)
        - Break patterns - don't make every paragraph the same length
        - Example: "Laravel makes this easy. You can set up multi-tenancy in under an hour, and once you understand the core concepts, you'll wonder how you ever built SaaS without it."

        CONVERSATIONAL ELEMENTS:
        - Use contractions naturally (I'm, you're, don't, can't, won't, it's)
        - Start some sentences with "And", "But", "So" (it's natural speech)
        - Include rhetorical questions ("Why does this matter?" "What's the catch?")
        - Use conversational phrases: "Here's the thing...", "Truth is...", "Let me show you...", "You might wonder..."
        - Address reader directly with "you" and "your"

        PERSONAL AUTHENTICITY:
        - Share SPECIFIC details from your experience (not generic "I worked on a project")
        - Include actual numbers/timeframes: "Last month in a SaaS project..." or "After building 5+ Chrome extensions..."
        - Mention real obstacles you faced: "I spent 3 hours debugging this before realizing..."
        - Add opinions: "I'm not a fan of X, but I use it because..." or "This is my preferred approach..."
        - Share what you'd do differently: "If I could go back..." or "Next time I'd..."

        IMPERFECT HUMANITY (Makes it real):
        - Occasional minor tangents that add value
        - Self-deprecating humor when appropriate
        - Acknowledge alternatives: "Some developers prefer X, but..."
        - Show learning: "I used to think X, but I've learned..."
        - Admit complexity: "This can get tricky..." or "I'll be honest, this confused me at first..."

        SPECIFIC TECHNIQUES:
        - Replace "Additionally" with "Plus", "Also", "On top of that"
        - Replace "Therefore" with "So", "That's why", "This means"
        - Replace "Utilize" with "Use"
        - Replace "In order to" with "To"
        - Avoid AI phrases like: "delve into", "it's worth noting", "in conclusion", "realm", "landscape"

        RHYTHM & FLOW:
        - Don't start consecutive sentences the same way
        - Mix up paragraph structures (question → answer, statement → example, problem → solution)
        - Use em dashes for emphasis — like this — when it adds punch
        - Include occasional one-sentence paragraphs for impact

        TECHNICAL AUTHENTICITY:
        - Reference actual version numbers (Laravel 11, PHP 8.2)
        - Mention real tools/packages you use
        - Include small gotchas you discovered ("Watch out for X if you're using Y...")
        - Share performance numbers when relevant ("This reduced response time from 800ms to 200ms")

        ⚠️ AVOID THESE AI RED FLAGS:
        ❌ Perfect grammar in every sentence (occasional casual writing is human)
        ❌ Consistent sentence length (humans vary naturally)
        ❌ Overuse of words like: "delve", "realm", "landscape", "tapestry", "embark"
        ❌ Generic examples without specifics
        ❌ Formulaic structure that's too perfect
        ❌ Lack of contractions (sounds robotic)
        ❌ No personality or opinions (sounds corporate)

        GOAL: Write like you're explaining this to a fellow developer over coffee, not presenting to executives.
        PROMPT;

        if ($topic->custom_prompt) {
            $prompt .= "\n\nADDITIONAL INSTRUCTIONS:\n{$topic->custom_prompt}";
        }

        $prompt .= "\n\nOUTPUT FORMAT (CRITICAL - Follow exactly):

        # [SEO-Optimized Title with Primary Keyword]

        EXCERPT: [Compelling 1-2 sentence summary with keyword, max 150 chars]

        META_DESCRIPTION: [150-160 chars, primary keyword in first 120 chars, compelling CTA]

        IMAGE_PROMPT: [Detailed image prompt, 80-120 words, NO text on image]

        [Your blog post content with proper headers starts here...]

        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
        EXAMPLE OUTPUT
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        # Building Real-Time Chat with Laravel Reverb in 30 Minutes

        EXCERPT: Learn how to build production-ready real-time chat using Laravel Reverb's WebSocket server and Vue.js in under 30 minutes.

        META_DESCRIPTION: Complete guide to building real-time chat with Laravel Reverb. Includes working code, WebSocket setup, and Vue.js integration for developers.

        IMAGE_PROMPT: Abstract visualization of real-time data flow: glowing cyan data packets streaming through dark fiber-optic channels from multiple users, converging at a central Laravel Reverb server node (pulsing geometric hub with orange/red accents), broadcasting outward to Vue.js clients (translucent green devices). Dark navy background, neon highlights, modern tech aesthetic, 3D isometric perspective. NO text.

        Real-time features used to require complex infrastructure like Pusher or Socket.io. [link to: Comparing WebSocket Solutions] With Laravel Reverb's release in 2024, you can build production-ready applications without third-party services.

        In my experience building [client project name], real-time features became critical...

        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
        CRITICAL RULES (DO NOT DEVIATE)
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        Line 1: # Title (with primary keyword, 50-60 chars)
        Line 2: Blank
        Line 3: EXCERPT: [summary with keyword]
        Line 4: Blank
        Line 5: META_DESCRIPTION: [150-160 chars with keyword]
        Line 6: Blank
        Line 7: IMAGE_PROMPT: [detailed description]
        Line 8: Blank
        Line 9+: Blog content with H2/H3 headers

        DO NOT skip EXCERPT, META_DESCRIPTION, or IMAGE_PROMPT - all are mandatory.
        DO NOT keyword stuff - keep it natural and reader-focused.
        DO include [link to: Topic] suggestions (2-3 throughout content).
        DO use primary keyword in first 100 words of content.
        DO structure one section for featured snippet targeting.";

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

        // Extract meta description if provided by AI (format: "META_DESCRIPTION: text")
        $aiGeneratedMetaDescription = null;
        if (preg_match('/^META_DESCRIPTION:\s*(.+)$/m', $content, $metaMatch)) {
            $aiGeneratedMetaDescription = trim($metaMatch[1]);
            // Remove the META_DESCRIPTION line from content
            $content = preg_replace('/^META_DESCRIPTION:\s*.+$/m', '', $content);
            Log::info('Extracted AI-generated meta description', ['length' => mb_strlen($aiGeneratedMetaDescription)]);
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
