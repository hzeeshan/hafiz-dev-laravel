<?php

namespace App\Services\AI;

use App\Models\BlogTopic;

/**
 * Blog Prompt Builder - Centralized prompt template management
 *
 * Handles all blog content generation prompts with DRY principle.
 * Single source of truth for author identity, shared sections, and prompt structure.
 */
class BlogPromptBuilder
{
    protected string $authorIdentity;
    protected int $minWordCount;
    protected int $maxWordCount;

    public function __construct()
    {
        $this->minWordCount = config('blog.min_word_count', 1500);
        $this->maxWordCount = config('blog.max_word_count', 2500);
        $this->authorIdentity = $this->buildAuthorIdentity();
    }

    /**
     * Build prompt for technical content (code-heavy tutorials)
     */
    public function buildTechnicalPrompt(BlogTopic $topic): string
    {
        $hireCta = config('blog.templates.hire_me_cta');

        $prompt = <<<PROMPT
        {$this->authorIdentity}

        TASK: Write a comprehensive, SEO-optimized technical blog post about "{$topic->title}"

        AUDIENCE: {$topic->target_audience}
        PRIMARY KEYWORDS: {$topic->keywords}
        CONTEXT: {$topic->description}

        {$this->buildOutputFormat()}

        {$this->buildWordCountRequirement()}

        {$this->buildSeoOptimization()}

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
           - Working code examples (latest Laravel version)
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

        {$this->buildHumanizationDetailed()}

        PROMPT;

        if ($topic->custom_prompt) {
            $prompt .= "\n\nADDITIONAL INSTRUCTIONS:\n{$topic->custom_prompt}";
        }

        return $prompt;
    }

    /**
     * Build prompt for opinion/essay content (personal, conversational)
     */
    public function buildOpinionPrompt(BlogTopic $topic): string
    {
        $hireCta = config('blog.templates.hire_me_cta');

        $prompt = <<<PROMPT
        {$this->authorIdentity}

        TASK: Write an engaging, thought-provoking opinion/essay post about "{$topic->title}"

        AUDIENCE: {$topic->target_audience}
        PRIMARY KEYWORDS: {$topic->keywords}
        CONTEXT: {$topic->description}

        {$this->buildOutputFormat()}

        {$this->buildWordCountRequirement()}

        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
        CONTENT STYLE (Opinion/Essay)
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        ✓ PERSONAL & OPINIONATED: Share your take, don't be neutral
        ✓ STORY-DRIVEN: Personal experiences, specific examples
        ✓ CONVERSATIONAL: Like talking to a friend over coffee
        ✓ CODE OPTIONAL: Only if naturally relevant (not forced)
        ✓ EMOTIONAL CONNECTION: Make readers feel something
        ✓ CHALLENGE ASSUMPTIONS: Question conventional wisdom

        ⚠️ CODE EXAMPLES RULES:
        - Include code ONLY if it naturally supports your point
        - Avoid turning this into a tutorial (that's "technical" content type)
        - Small snippets to illustrate problems/solutions are fine
        - Focus more on "why" than "how"

        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
        CONTENT STRUCTURE (Opinion/Essay Format)
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        1. HOOK (100-150 words)
           - Bold opening statement or question
           - Why this matters RIGHT NOW
           - Promise of unique perspective

        2. THE STORY/CONTEXT (200-400 words)
           - Personal experience that shaped your view
           - Specific situation, not generic
           - Make readers relate

        3. YOUR TAKE (400-800 words)
           - Your main argument/perspective
           - Supporting evidence from experience
           - Challenge common beliefs if applicable
           - Use analogies and examples

        4. COUNTERPOINTS & NUANCE (200-300 words)
           - Acknowledge other perspectives
           - Where you might be wrong
           - Adds credibility

        5. PRACTICAL IMPLICATIONS (200-300 words)
           - What this means for readers
           - Actionable takeaways (if any)
           - How to apply this thinking

        6. CONCLUSION (100-150 words)
           - Reinforce main point
           - Leave readers thinking
           - CTA: {$hireCta}

        {$this->buildHumanizationConversational()}

        PROMPT;

        if ($topic->custom_prompt) {
            $prompt .= "\n\nADDITIONAL INSTRUCTIONS:\n{$topic->custom_prompt}";
        }

        return $prompt;
    }

    /**
     * Build prompt for news/update content (timely, factual)
     */
    public function buildNewsPrompt(BlogTopic $topic): string
    {
        $hireCta = config('blog.templates.hire_me_cta');

        $prompt = <<<PROMPT
        {$this->authorIdentity}

        TASK: Write a timely, informative news/update article about "{$topic->title}"

        AUDIENCE: {$topic->target_audience}
        PRIMARY KEYWORDS: {$topic->keywords}
        CONTEXT: {$topic->description}

        {$this->buildOutputFormat()}

        {$this->buildWordCountRequirement()}

        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
        CONTENT STYLE (News/Updates)
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        ✓ TIMELY & FACTUAL: Report what's new, what changed, and when
        ✓ PRACTICAL FOCUS: How does this affect developers? What should they do?
        ✓ OBJECTIVE TONE: Less personal opinion, more analysis and implications
        ✓ ACTIONABLE: Include installation/setup commands and migration examples
        ✓ CLEAR STRUCTURE: Easy to scan with headings, bullet points, code blocks
        ✓ BALANCED: Mention both benefits and potential issues/limitations

        ⚠️ CODE EXAMPLES RULES (CRITICAL):
        - ONLY include code for actual installation commands (bash/terminal)
        - ONLY show documented, real APIs - DO NOT invent fake API examples
        - If you don't know the exact API, describe it in text instead
        - Prefer showing "before/after" migration examples with real code

        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
        CONTENT STRUCTURE (News/Update Format)
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        1. LEDE (Lead Paragraph) (100-150 words)
           - What happened? When? Why does it matter?
           - Key announcement or change upfront
           - Who should care about this?

        2. WHAT'S NEW (300-500 words)
           - List the major new features/changes
           - Use bullet points or numbered lists for clarity
           - Include brief code examples for new APIs/syntax if applicable

        3. WHAT'S DIFFERENT (200-400 words)
           - Breaking changes or deprecations (if any)
           - Migration path or upgrade notes
           - Before/after code comparisons if relevant

        4. DEVELOPER IMPACT & NEXT STEPS (300-400 words)
           - How to get started / How to upgrade
           - Quick installation/setup example
           - Best use cases for the new features

        5. CONCLUSION & RESOURCES (100-150 words)
           - Summary of key takeaways
           - Your take: Is it worth adopting now?
           - CTA: {$hireCta}

        {$this->buildHumanizationConcise()}

        PROMPT;

        if ($topic->custom_prompt) {
            $prompt .= "\n\nADDITIONAL INSTRUCTIONS:\n{$topic->custom_prompt}";
        }

        return $prompt;
    }

    /**
     * Build prompt for YouTube video analysis (with remix style)
     */
    public function buildYouTubeRemixPrompt(BlogTopic $topic, \App\Enums\RemixStyle $remixStyle): string
    {
        $hireCta = config('blog.templates.hire_me_cta');
        $basePrompt = $this->buildRemixBasePrompt($topic, 'YouTube video', $remixStyle);

        // Check if user provided a title or we need to generate one
        $titleInstruction = empty($topic->title)
            ? "Generate an SEO-optimized title based on the video content (50-60 chars, include primary keyword)"
            : "Use this title as inspiration but feel free to improve it for SEO: \"{$topic->title}\"";

        $prompt = <<<PROMPT
        {$this->authorIdentity}

        SOURCE VIDEO: {$topic->source_url}
        VIDEO TRANSCRIPT/NOTES:
        {$topic->source_content}

        TITLE INSTRUCTION: {$titleInstruction}

        TASK: Write a blog post based on this YouTube video using the "{$remixStyle->label()}" style.

        {$basePrompt}

        {$this->buildOutputFormat()}

        {$this->buildWordCountRequirement()}

        {$this->getRemixStyleGuidelines($remixStyle)}

        STRUCTURE:
        1. Introduction: Why this video caught your attention, what you'll cover
        2. Video Summary: Brief overview of video's main points
        3. Main Content: Transform video content using {$remixStyle->value} approach
        4. Your Additions: Insights, examples, or perspectives not in video
        5. Practical Application: How to implement these ideas
        6. Conclusion: Your final take and recommendation
        7. CTA: {$hireCta}

        IMPORTANT:
        - Credit the original video creator
        - Add substantial value beyond the video
        - Include specific examples from your experience
        - Don't just transcribe - transform and expand

        {$this->buildHumanizationDetailed()}
        PROMPT;

        if ($topic->custom_prompt) {
            $prompt .= "\n\nADDITIONAL INSTRUCTIONS:\n{$topic->custom_prompt}";
        }

        return $prompt;
    }

    /**
     * Legacy method for backwards compatibility (delegates to new method)
     */
    public function buildYouTubePrompt(BlogTopic $topic): string
    {
        // Default to commentary style if no remix_style specified
        $remixStyle = $topic->getRemixStyle() ?? \App\Enums\RemixStyle::COMMENTARY;
        return $this->buildYouTubeRemixPrompt($topic, $remixStyle);
    }

    /**
     * Build prompt for blog post remix/response (with remix style)
     */
    public function buildBlogRemixPrompt(BlogTopic $topic, \App\Enums\RemixStyle $remixStyle): string
    {
        $hireCta = config('blog.templates.hire_me_cta');
        $basePrompt = $this->buildRemixBasePrompt($topic, 'blog post/article', $remixStyle);

        // Check if user provided a title or we need to generate one
        $titleInstruction = empty($topic->title)
            ? "Generate an SEO-optimized title based on the article content (50-60 chars, include primary keyword)"
            : "Use this title as inspiration but feel free to improve it for SEO: \"{$topic->title}\"";

        $prompt = <<<PROMPT
        {$this->authorIdentity}

        SOURCE ARTICLE: {$topic->source_url}
        ARTICLE CONTENT:
        {$topic->source_content}

        TITLE INSTRUCTION: {$titleInstruction}

        TASK: Write a blog post based on this article using the "{$remixStyle->label()}" style.

        {$basePrompt}

        {$this->buildOutputFormat()}

        {$this->buildWordCountRequirement()}

        {$this->getRemixStyleGuidelines($remixStyle)}

        STRUCTURE:
        1. Introduction: Reference the original article, your angle
        2. Article Summary: Brief overview of original's main points
        3. Main Content: Transform article content using {$remixStyle->value} approach
        4. Your Additions: Unique insights, code examples, or alternative approaches
        5. Comparison (if relevant): When to use original approach vs yours
        6. Conclusion: Synthesis and key takeaways
        7. CTA: {$hireCta}

        IMPORTANT:
        - Credit the original author and article
        - Be respectful even when disagreeing
        - Add substantial value (don't just paraphrase)
        - Include specific examples from your projects
        - Transform through your Laravel/AI expertise

        {$this->buildHumanizationDetailed()}
        PROMPT;

        if ($topic->custom_prompt) {
            $prompt .= "\n\nADDITIONAL INSTRUCTIONS:\n{$topic->custom_prompt}";
        }

        return $prompt;
    }

    /**
     * Build prompt for Twitter thread expansion (with remix style)
     */
    public function buildTwitterRemixPrompt(BlogTopic $topic, \App\Enums\RemixStyle $remixStyle): string
    {
        $hireCta = config('blog.templates.hire_me_cta');
        $basePrompt = $this->buildRemixBasePrompt($topic, 'Twitter thread', $remixStyle);

        // Check if user provided a title or we need to generate one
        $titleInstruction = empty($topic->title)
            ? "Generate an SEO-optimized title based on the thread content (50-60 chars, include primary keyword)"
            : "Use this title as inspiration but feel free to improve it for SEO: \"{$topic->title}\"";

        $prompt = <<<PROMPT
        {$this->authorIdentity}

        SOURCE THREAD: {$topic->source_url}
        THREAD CONTENT:
        {$topic->source_content}

        TITLE INSTRUCTION: {$titleInstruction}

        TASK: Expand this Twitter thread into a comprehensive blog post using the "{$remixStyle->label()}" style.

        {$basePrompt}

        {$this->buildOutputFormat()}

        {$this->buildWordCountRequirement()}

        {$this->getRemixStyleGuidelines($remixStyle)}

        STRUCTURE:
        1. Introduction: Why this thread caught your attention
        2. Thread Summary: Core points from the thread
        3. Main Content: Expand thread using {$remixStyle->value} approach
        4. Your Additions: Code examples, insights, or perspectives not in thread
        5. Practical Guide: How to implement these ideas
        6. Conclusion: Synthesis and takeaways
        7. CTA: {$hireCta}

        IMPORTANT:
        - Credit the original thread author
        - Add 5-10x more value than the thread
        - Include working code examples and detailed explanations
        - Share your implementation experience

        {$this->buildHumanizationDetailed()}
        PROMPT;

        if ($topic->custom_prompt) {
            $prompt .= "\n\nADDITIONAL INSTRUCTIONS:\n{$topic->custom_prompt}";
        }

        return $prompt;
    }

    /**
     * Legacy method for backwards compatibility (delegates to new method)
     */
    public function buildTwitterPrompt(BlogTopic $topic): string
    {
        // Default to deep_dive style if no remix_style specified
        $remixStyle = $topic->getRemixStyle() ?? \App\Enums\RemixStyle::DEEP_DIVE;
        return $this->buildTwitterRemixPrompt($topic, $remixStyle);
    }

    // ========================================================================
    // SHARED SECTIONS (DRY Principle - Single Source of Truth)
    // ========================================================================

    /**
     * Build author identity (used by all prompts)
     *
     * ✅ UPDATED: Full-stack developer, 7+ years, mentions real products
     */
    protected function buildAuthorIdentity(): string
    {
        return "You are Hafiz Riaz, a full-stack developer and automation expert specializing in Laravel, PHP, Vue.js, and AI integrations. You have 7+ years of experience building SaaS products (StudyLab, ReplyGenius, Robobook), Chrome extensions, and automation tools that save businesses 10-20 hours per week.";
    }

    /**
     * Build word count requirement section
     */
    protected function buildWordCountRequirement(): string
    {
        return <<<WORDCOUNT_SECTION
        ⚠️ WORD COUNT REQUIREMENT (NON-NEGOTIABLE): {$this->minWordCount}-{$this->maxWordCount} words
        - Minimum {$this->minWordCount} words is MANDATORY - provide comprehensive coverage
        - DO NOT submit content shorter than {$this->minWordCount} words
        - Include detailed explanations, examples, and migration guidance to meet word count
        WORDCOUNT_SECTION;
    }

    /**
     * Build SEO optimization guidelines
     */
    protected function buildSeoOptimization(): string
    {
        return <<<'SEO_SECTION'
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
SEO_SECTION;
    }

    /**
     * Build detailed humanization guidelines (for technical content)
     */
    protected function buildHumanizationDetailed(): string
    {
        return <<<'HUMANIZATION_DETAILED'
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

        PUNCTUATION (Write Like a Human):
        - NEVER use em dashes (—) - they're a telltale AI sign
        - Use commas for natural pauses: "The key is practice, not perfection"
        - Use parentheses for side thoughts: "This technique (my favorite) works great"
        - Break longer thoughts into separate sentences with periods
        - Use semicolons sparingly when connecting related ideas
        - Prefer simple, clear punctuation over formal constructions

        RHYTHM & FLOW:
        - Don't start consecutive sentences the same way
        - Mix up paragraph structures (question → answer, statement → example, problem → solution)
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
        HUMANIZATION_DETAILED;
    }

    /**
     * Build conversational humanization (for opinion content)
     */
    protected function buildHumanizationConversational(): string
    {
        return <<<'HUMANIZATION_CONVERSATIONAL'
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
        HUMANIZATION (Make it sound REAL)
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        ✓ Vary sentence length dramatically (3 words. Then 25 words explaining something.)
        ✓ Include one-sentence paragraphs for impact.
        ✓ Start sentences with "And", "But", "So"
        ✓ Use "I" and "you" liberally
        ✓ Share personal stories with specific details
        ✓ Contractions everywhere (I'm, you're, don't, can't)
        ✓ Rhetorical questions ("What if I told you...?")
        ✓ Use parentheses for asides: "This method (my favorite) works well"
        ✓ Use commas for natural pauses, not em dashes

        ❌ AVOID: Em dashes (—) - they scream AI writing
        ❌ AVOID: "delve", "landscape", "realm", "game-changer", "revolutionary"
        ❌ AVOID: Perfect grammar (be casual!)
        ❌ AVOID: Corporate speak

        EXAMPLES:
        - "I learned this the hard way. Three projects later..."
        - "Here's the thing nobody tells you..."
        - "And you know what? It worked."
        HUMANIZATION_CONVERSATIONAL;
    }

    /**
     * Build concise humanization (for news content)
     */
    protected function buildHumanizationConcise(): string
    {
        return <<<'HUMANIZATION_CONCISE'
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
        HUMANIZATION
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        ✓ Use active voice: "The team released" not "Was released"
        ✓ Short paragraphs (2-4 sentences)
        ✓ Specific dates/versions: "Released March 2024"
        ✓ Developer perspective: "This means you can..."
        ✓ Use commas and periods, avoid em dashes (AI red flag)

        ❌ AVOID: Em dashes (—), "game-changer", "revolutionary", "delve", "landscape"

        EXAMPLES:
        - "Laravel 11 was released on March 12, 2024, bringing slimmed-down application structure..."
        - "NotebookLM's latest update adds audio overviews, allowing you to..."
        - "Docker alternatives are gaining traction. Here's what changed with Podman 5.0..."
        HUMANIZATION_CONCISE;
    }

    /**
     * Build output format instructions
     */
    protected function buildOutputFormat(): string
    {
        return <<<'OUTPUT_FORMAT'
        OUTPUT FORMAT (CRITICAL - Follow exactly):

        # [SEO-Optimized Title with Primary Keyword]

        EXCERPT: [Compelling 1-2 sentence summary with keyword, max 150 chars]

        META_DESCRIPTION: [150-160 chars, primary keyword in first 120 chars, compelling CTA]

        IMAGE_PROMPT: [Detailed image prompt, NO text on image]

        TAGS: [3-5 relevant tags, comma-separated]

        [Your blog post content with proper headers starts here...]

        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
        EXAMPLE OUTPUT
        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

        # Building Real-Time Chat with Laravel Reverb in 30 Minutes

        EXCERPT: Learn how to build production-ready real-time chat using Laravel Reverb's WebSocket server and Vue.js in under 30 minutes.

        META_DESCRIPTION: Complete guide to building real-time chat with Laravel Reverb. Includes working code, WebSocket setup, and Vue.js integration for developers.

        IMAGE_PROMPT: Abstract visualization of real-time data flow: glowing cyan data packets streaming through dark fiber-optic channels from multiple users, converging at a central Laravel Reverb server node (pulsing geometric hub with orange/red accents), broadcasting outward to Vue.js clients (translucent green devices). Dark navy background, neon highlights, modern tech aesthetic, 3D isometric perspective. NO text.

        TAGS: Laravel, WebSockets, Real-time, Vue.js, Laravel Reverb

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
        Line 9: TAGS: [3-5 tags, comma-separated, specific to content]
        Line 10: Blank
        Line 11+: Blog content with H2/H3 headers

        DO NOT skip EXCERPT, META_DESCRIPTION, IMAGE_PROMPT, or TAGS - all are mandatory.
        DO NOT keyword stuff - keep it natural and reader-focused.
        DO include [link to: Topic] suggestions (2-3 throughout content).
        DO use primary keyword in first 100 words of content.
        DO structure one section for featured snippet targeting.
        DO generate 3-5 specific, relevant tags (e.g., 'Laravel', 'Multi-tenancy', 'SaaS', 'Docker', 'API Development').
        OUTPUT_FORMAT;
    }

    // ========================================================================
    // CONTENT REMIX HELPERS (New)
    // ========================================================================

    /**
     * Build base remix prompt context
     */
    protected function buildRemixBasePrompt(BlogTopic $topic, string $sourceTypeLabel, \App\Enums\RemixStyle $remixStyle): string
    {
        // Determine if code examples are needed based on content type
        $codeInstruction = $this->getCodeExampleInstruction($topic->content_type);

        return match ($remixStyle) {
            \App\Enums\RemixStyle::COMMENTARY => "Add YOUR perspective and personal examples from your projects (StudyLab, ReplyGenius, Robobook, Chrome extensions). Don't just summarize - share what you think, what you've experienced, and how this applies to your work. {$codeInstruction}",

            \App\Enums\RemixStyle::DEEP_DIVE => "Expand on the concepts with detailed explanations, step-by-step guides, and practical examples. Take high-level ideas and make them concrete and actionable. {$codeInstruction}",

            \App\Enums\RemixStyle::SUMMARY => "Condense the key takeaways (3-5 main points) and add your insights on each. Focus on what matters most and why your audience should care. {$codeInstruction}",

            \App\Enums\RemixStyle::RESPONSE => "Provide your alternative approach or respectful agreement/disagreement. Show how you would handle things differently based on your expertise. {$codeInstruction}",
        };
    }

    /**
     * Get code example instruction based on content type
     */
    protected function getCodeExampleInstruction(string $contentType): string
    {
        return match ($contentType) {
            'technical' => "Include working code examples, commands, and step-by-step implementation details.",
            'opinion' => "Only include code examples if they naturally support your argument. Focus on concepts and experiences.",
            'news' => "Include only essential code snippets like installation commands or basic usage. Keep it minimal.",
            default => "Include code examples only if relevant to the topic.",
        };
    }

    /**
     * Get detailed guidelines for each remix style
     */
    protected function getRemixStyleGuidelines(\App\Enums\RemixStyle $remixStyle): string
    {
        $guidelines = [
            'commentary' => "
COMMENTARY STYLE GUIDELINES

✓ PERSONAL VOICE: Use 'I', 'my projects', 'in my experience'
✓ SPECIFIC EXAMPLES: Reference StudyLab, ReplyGenius, Robobook with real details
✓ OPINIONS: Share what you agree/disagree with and why
✓ ANECDOTES: 'I spent 3 hours debugging...', 'After building 5+ extensions...'
✓ ADDITIONS: Include insights not in the source
✓ BALANCED: Acknowledge source's strengths while adding your perspective
✓ CODE: Only include if it naturally illustrates your point (not forced)

✗ AVOID: Generic summaries, neutral tone, missing personal examples, forcing code examples
",
            'deep_dive' => "
DEEP DIVE STYLE GUIDELINES

✓ EXPAND CONCEPTS: Take high-level ideas and make them concrete
✓ STEP-BY-STEP: Break down into clear numbered steps
✓ EXPLAIN WHY: Don't just show how - explain the reasoning
✓ PRACTICAL: Make it actionable with real examples
✓ EDGE CASES: Cover common pitfalls and solutions
✓ BEST PRACTICES: Share production-ready patterns
✓ CODE: Include ONLY if content is technical (check content type instruction)

✗ AVOID: Shallow overviews, theoretical-only, forcing code into non-technical topics
",
            'summary' => "
SUMMARY STYLE GUIDELINES

✓ KEY TAKEAWAYS: Extract 3-5 most important points
✓ YOUR INSIGHTS: Add your perspective on each takeaway
✓ CONCISE: Clear, direct, actionable
✓ FILTER: Only include what's relevant to your audience
✓ PRACTICAL: Focus on what readers can actually use
✓ CONTEXT: Add brief examples when they clarify
✓ CODE: Minimal or none (only if essential to understanding)

✗ AVOID: Verbatim copying, including every detail, missing your take, unnecessary code
",
            'response' => "
RESPONSE STYLE GUIDELINES

✓ RESPECTFUL: Professional even when disagreeing, credit original
✓ ALTERNATIVE: Show how you'd handle it differently
✓ COMPARE: Explain when to use their approach vs yours
✓ NUANCED: Acknowledge tradeoffs of each approach
✓ SPECIFIC: Use concrete examples from your projects
✓ CODE: Include ONLY if comparing technical implementations

✗ AVOID: Dismissive tone, straw-man arguments, vague criticisms, forced code examples
",
        ];

        return $guidelines[$remixStyle->value] ?? '';
    }
}
