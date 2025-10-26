<?php

namespace App\Enums;

/**
 * Content Remix Styles
 *
 * Defines how source content (YouTube, blog posts, articles) should be
 * transformed into blog posts.
 */
enum RemixStyle: string
{
    /**
     * Commentary: Add your perspective and personal examples
     *
     * BEST FOR:
     * - Self-help/productivity articles you want to share your experience on
     * - Technical posts where you want to add personal anecdotes
     * - Opinion pieces where you want to share your take
     *
     * INCLUDES:
     * - Personal voice ("I", "my projects", "in my experience")
     * - Specific examples from your work (StudyLab, ReplyGenius)
     * - Your opinions and reactions
     * - Code only if it naturally supports your point
     *
     * USE WHEN: You have relevant experience or strong opinions to share
     * CONTENT TYPES: Opinion (best), Technical (good), News (ok)
     */
    case COMMENTARY = 'commentary';

    /**
     * Deep Dive: Expand with detailed explanations
     *
     * BEST FOR:
     * - Technical tutorials you want to expand with more depth
     * - Overviews that need step-by-step implementation
     * - Concepts that need concrete examples
     *
     * INCLUDES:
     * - Detailed step-by-step breakdown
     * - Practical examples and real-world use cases
     * - Code examples (only for technical content)
     * - Edge cases and best practices
     *
     * USE WHEN: Source is high-level and you want detailed tutorial
     * CONTENT TYPES: Technical (best), Opinion (if adding practical examples)
     */
    case DEEP_DIVE = 'deep_dive';

    /**
     * Summary: Condense to key insights
     *
     * BEST FOR:
     * - Long articles (3000+ words) you want to distill
     * - News/releases with too much detail
     * - Self-help posts where you want core lessons
     *
     * INCLUDES:
     * - 3-5 key takeaways extracted
     * - Your insights on each point
     * - Concise and scannable
     * - Minimal or no code (only if essential)
     *
     * USE WHEN: Source is long and you want to highlight best parts
     * CONTENT TYPES: News (best), Opinion (good), Technical (if condensing)
     */
    case SUMMARY = 'summary';

    /**
     * Response: Provide alternative perspective
     *
     * BEST FOR:
     * - Articles you disagree with (respectfully)
     * - Technical posts where you have different approach
     * - Debates where you want to add nuance
     *
     * INCLUDES:
     * - Your alternative approach or perspective
     * - Comparison of approaches (when to use each)
     * - Respectful agreement/disagreement
     * - Code only if comparing implementations
     *
     * USE WHEN: You have different approach or want to add to conversation
     * CONTENT TYPES: Opinion (best), Technical (if alternative implementation)
     */
    case RESPONSE = 'response';

    /**
     * Get human-readable label
     */
    public function label(): string
    {
        return match ($this) {
            self::COMMENTARY => '💬 Commentary (Your perspective + examples)',
            self::DEEP_DIVE => '🔍 Deep Dive (Expand technical details)',
            self::SUMMARY => '📝 Summary (Condense + insights)',
            self::RESPONSE => '💭 Response (Agree/disagree)',
        };
    }

    /**
     * Get description
     */
    public function description(): string
    {
        return match ($this) {
            self::COMMENTARY => 'Share your thoughts, experiences, and reactions to the content',
            self::DEEP_DIVE => 'Expand on the topic with detailed tutorials and code examples',
            self::SUMMARY => 'Distill the most important takeaways into concise insights',
            self::RESPONSE => 'Provide alternative approach or respectful agreement/disagreement',
        };
    }

    /**
     * Get all options for select dropdowns
     */
    public static function options(): array
    {
        return [
            self::COMMENTARY->value => self::COMMENTARY->label(),
            self::DEEP_DIVE->value => self::DEEP_DIVE->label(),
            self::SUMMARY->value => self::SUMMARY->label(),
            self::RESPONSE->value => self::RESPONSE->label(),
        ];
    }

    /**
     * Get options with descriptions for Filament
     */
    public static function optionsWithDescriptions(): array
    {
        $options = [];
        foreach (self::cases() as $case) {
            $options[$case->value] = $case->description();
        }
        return $options;
    }
}
