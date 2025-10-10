# Automated Trending Topic Discovery System

**Status**: Not yet implemented (planned for Week 2)
**Estimated Time**: 6-8 hours to build
**ROI**: Find 5-10 trending topics automatically every week

---

## Table of Contents

1. [What & Why](#what--why)
2. [How It Works](#how-it-works)
3. [Data Sources](#data-sources)
4. [Scoring Algorithm](#scoring-algorithm)
5. [Implementation Guide](#implementation-guide)
6. [Database Schema](#database-schema)
7. [Command Usage](#command-usage)
8. [Automation & Scheduling](#automation--scheduling)
9. [Cost Analysis](#cost-analysis)
10. [Alternative Approaches](#alternative-approaches)

---

## What & Why

### What Is It?

An automated system that **discovers trending blog topics** by monitoring:
- Reddit discussions (r/laravel, r/PHP, r/SaaS)
- Hacker News posts (Laravel, PHP, SaaS tags)
- Google Trends (rising searches)
- Twitter/X conversations (#Laravel, #PHP, #AI)
- Competitor blogs (RSS feeds)

It then **scores each topic** based on engagement, search volume, and trend direction, and automatically adds high-scoring topics to your database.

### Why Build This?

**Problem**: Manually finding trending topics takes 2-3 hours weekly

**Solution**: Automate it → 5 minutes to review results

**Benefits**:
1. ✅ **Never miss trending topics** (automated monitoring)
2. ✅ **SEO advantage** (write about topics as they trend)
3. ✅ **Time savings** (2-3 hours/week → 5 minutes)
4. ✅ **Data-driven decisions** (objective scoring, not guesswork)
5. ✅ **Competitive intelligence** (see what competitors are writing)
6. ✅ **Potential SaaS product** (this tool itself could be sold!)

**Example**: When DeepSeek Laravel package was released, this system would have:
- Detected it trending on Reddit (100+ upvotes)
- Seen it on Hacker News (200+ points)
- Noticed Google Trends spike
- Alerted you via Telegram: "Write about this NOW!"
- You write it within 24-48 hours → Top of Google results

---

## How It Works

### High-Level Flow:

```
Weekly Cron Job (Monday 9 AM)
    ↓
Run: php artisan blog:discover-trending-topics
    ↓
Step 1: Fetch data from 5 sources
    ├─ Reddit API (top posts, last 7 days)
    ├─ Hacker News API (top stories)
    ├─ Google Trends (rising searches)
    ├─ Twitter API (trending tweets)
    └─ Competitor RSS (new posts)
    ↓
Step 2: Parse & extract topics
    ├─ Extract title, URL, keywords
    ├─ Count upvotes/likes/shares
    └─ Identify main topic/technology
    ↓
Step 3: Score each topic (1-10)
    ├─ Search volume (Google Trends)
    ├─ Social engagement (Reddit/HN/Twitter)
    ├─ Trend direction (rising/falling)
    ├─ Competitor gap (are others writing about it?)
    └─ Calculate final score
    ↓
Step 4: Filter & save
    ├─ Keep only scores > 7/10
    ├─ Remove duplicates
    ├─ Save to `trending_topics` table
    └─ Link to `blog_topics` if relevant
    ↓
Step 5: Notify you
    └─ Telegram: "5 new trending topics found!"
    ↓
You review & decide what to write
```

---

## Data Sources

### 1. Reddit API

**Why**: Developers discuss problems, share solutions, ask questions

**Subreddits to Monitor**:
- r/laravel (60K members)
- r/PHP (100K members)
- r/webdev (2M members)
- r/SaaS (200K members)
- r/indiehackers (150K members)
- r/vuejs (80K members)

**What to Extract**:
```php
- Post title
- Post URL
- Upvotes (engagement indicator)
- Comments count (interest level)
- Created date
- Keywords/tags
```

**API Endpoint**:
```
GET https://www.reddit.com/r/laravel/top.json?t=week&limit=25
```

**Scoring Logic**:
- 50+ upvotes = Topic is getting attention
- 20+ comments = People have questions/opinions
- Last 7 days = Recent and relevant

**Example Output**:
```json
{
  "title": "Just migrated to DeepSeek API and saved 90% on costs",
  "url": "https://reddit.com/r/laravel/...",
  "upvotes": 127,
  "comments": 45,
  "created": "2025-10-08",
  "keywords": ["deepseek", "laravel", "api", "cost optimization"]
}
```

**Your Action**: Write "DeepSeek API Integration in Laravel" tutorial

---

### 2. Hacker News API

**Why**: Tech-focused audience, high-quality discussions

**What to Monitor**:
- Top stories (daily)
- Stories with "Laravel", "PHP", "SaaS", "AI" keywords
- Ask HN posts (people asking for help)

**API Endpoint**:
```
GET https://hacker-news.firebaseio.com/v0/topstories.json
GET https://hacker-news.firebaseio.com/v0/item/{id}.json
```

**Scoring Logic**:
- 100+ points = Very popular
- 50+ comments = Controversial or interesting
- Tech-related = Relevant to your audience

**Example**:
```json
{
  "title": "Show HN: I built a Laravel SaaS boilerplate with Filament",
  "url": "https://news.ycombinator.com/item?id=...",
  "points": 342,
  "comments": 89,
  "keywords": ["laravel", "saas", "filament", "boilerplate"]
}
```

**Your Action**: Write comparison: "Building SaaS: Boilerplate vs From Scratch"

---

### 3. Google Trends

**Why**: Shows what people are actively searching for

**Keywords to Track**:
```php
$keywords = [
    // Framework
    'laravel',
    'laravel 11',
    'laravel 12',

    // Frontend
    'vue.js',
    'alpine.js',
    'livewire',
    'inertia.js',

    // Tools
    'filament',
    'filament 3',
    'laravel nova',

    // AI
    'openai api',
    'deepseek',
    'ai integration',
    'chatgpt api',

    // SaaS
    'laravel saas',
    'multi-tenancy',
    'stripe integration',

    // Extensions
    'chrome extension',
    'manifest v3',
];
```

**API**: Use `google-trends-api` package (unofficial but works)

**Scoring Logic**:
- Rising searches (↑) = Write about it NOW
- Search volume 500-5000/month = Sweet spot (not too competitive, not too niche)
- Regional data = Focus on English-speaking countries (US, UK, Canada, Australia)

**Example Output**:
```json
{
  "keyword": "deepseek laravel",
  "search_volume": 820,
  "trend": "rising",
  "growth": "+340% (last 30 days)",
  "related_queries": [
    "deepseek api laravel",
    "deepseek vs openai laravel",
    "deepseek integration tutorial"
  ]
}
```

**Your Action**: Write "DeepSeek Laravel Integration" (capitalize on rising trend)

---

### 4. Twitter/X API

**Why**: Real-time conversations, developer opinions, quick feedback

**What to Monitor**:
- Hashtags: #Laravel, #PHP, #VueJS, #SaaS, #AI
- Accounts: @taylorotwell, @calebporzio, @freekmurze, @themsaid
- Viral threads (1000+ likes)
- Polls about developer preferences

**API Endpoint** (requires Twitter API access):
```
GET https://api.twitter.com/2/tweets/search/recent?query=%23Laravel
```

**Scoring Logic**:
- 1000+ likes = Viral topic
- 500+ retweets = High interest
- Controversial takes = Engagement potential

**Example**:
```json
{
  "tweet": "Hot take: You don't need Docker for local Laravel development",
  "likes": 2400,
  "retweets": 340,
  "replies": 180,
  "keywords": ["docker", "laravel", "local development"]
}
```

**Your Action**: Write opinion piece: "Do You Really Need Docker for Laravel?"

---

### 5. Competitor Blog RSS

**Why**: See what's working for them, find gaps

**Blogs to Monitor**:
```php
$competitors = [
    'https://laravel-news.com/feed',
    'https://freek.dev/feed',
    'https://mattstauffer.com/feed',
    'https://laracasts.com/feed',
    'https://tighten.co/blog/feed',
    'https://wendelladriel.com/blog/rss',
    'https://ashallendesign.co.uk/blog/feed',
];
```

**What to Extract**:
- Post title
- Publication date
- Categories/tags
- Social shares (if available via API)

**Analysis**:
1. **What they're writing about** → Market validation
2. **What they're NOT writing about** → Your opportunity
3. **Post frequency** → Competitive benchmark
4. **Topics getting engagement** → High-demand subjects

**Example**:
```json
{
  "blog": "laravel-news.com",
  "posts": [
    {
      "title": "Laravel 12 New Features",
      "date": "2025-10-05",
      "tags": ["laravel", "release", "features"],
      "social_shares": 450
    },
    {
      "title": "New Filament Plugin Released",
      "date": "2025-10-07",
      "tags": ["filament", "plugin"],
      "social_shares": 120
    }
  ]
}
```

**Your Action**:
- **They wrote it** → Write deeper/different angle
- **They didn't write it** → Opportunity gap (e.g., "Chrome Extension + Laravel" - nobody covers this!)

---

## Scoring Algorithm

### Formula:

```php
Topic Score =
  (Search Volume / 100) × 0.3 +        // Weight: 30%
  (Social Engagement / 10) × 0.2 +     // Weight: 20%
  (Trend Growth %) × 0.2 +             // Weight: 20%
  (Recency Score) × 0.2 +              // Weight: 20%
  (Competitor Gap) × 0.1               // Weight: 10%
```

### Detailed Breakdown:

#### 1. Search Volume Score (30% weight)

```php
$searchVolumeScore = min(($searchVolume / 100), 10);

// Examples:
// 500/month = 5 points
// 1000/month = 10 points (capped)
// 100/month = 1 point
```

**Why 30%**: Search volume = SEO potential

**Sweet Spot**: 500-2000/month (achievable ranking, good traffic)

---

#### 2. Social Engagement Score (20% weight)

```php
// Reddit
$redditScore = ($upvotes / 10) + ($comments / 20);

// Hacker News
$hnScore = ($points / 10) + ($comments / 10);

// Twitter
$twitterScore = ($likes / 100) + ($retweets / 50);

// Combined
$socialEngagementScore = min(
    ($redditScore + $hnScore + $twitterScore) / 3,
    10
);

// Example:
// Reddit: 120 upvotes, 40 comments = 12 + 2 = 14 points
// HN: 200 points, 50 comments = 20 + 5 = 25 points
// Twitter: 1500 likes, 200 retweets = 15 + 4 = 19 points
// Average: (14 + 25 + 19) / 3 = 19.3 → capped at 10
```

**Why 20%**: Social engagement = real people care about this

---

#### 3. Trend Growth Score (20% weight)

```php
$trendGrowthScore = match(true) {
    $growthPercent >= 300 => 10,  // Exploding (e.g., DeepSeek)
    $growthPercent >= 150 => 8,   // Fast rising
    $growthPercent >= 50 => 6,    // Rising
    $growthPercent >= 0 => 4,     // Stable
    default => 2,                  // Declining
};

// Example:
// "deepseek laravel" = +340% (last 30 days) = 10 points
// "laravel 11" = +15% = 4 points
// "laravel 9" = -20% = 2 points
```

**Why 20%**: Trend direction = timing is everything (write as it rises!)

---

#### 4. Recency Score (20% weight)

```php
$daysSincePosted = now()->diffInDays($topicCreatedDate);

$recencyScore = match(true) {
    $daysSincePosted <= 2 => 10,   // Very recent
    $daysSincePosted <= 7 => 8,    // This week
    $daysSincePosted <= 14 => 6,   // Last 2 weeks
    $daysSincePosted <= 30 => 4,   // This month
    default => 2,                   // Older
};

// Example:
// Posted 1 day ago = 10 points (write about it NOW!)
// Posted 5 days ago = 8 points (still relevant)
// Posted 20 days ago = 4 points (less urgent)
```

**Why 20%**: Recency = SEO advantage (be first to write about it)

---

#### 5. Competitor Gap Score (10% weight)

```php
$competitorGapScore = 0;

// Check if competitors wrote about this topic
$competitorsWritingAboutIt = 0;
foreach ($competitorBlogs as $blog) {
    if (str_contains($blog->recentPosts, $keyword)) {
        $competitorsWritingAboutIt++;
    }
}

$competitorGapScore = match(true) {
    $competitorsWritingAboutIt === 0 => 10,  // Nobody wrote it = BIG opportunity!
    $competitorsWritingAboutIt === 1 => 7,   // 1 competitor = Still good
    $competitorsWritingAboutIt <= 3 => 4,    // Few competitors = Moderate
    default => 2,                             // Many competitors = Saturated
};

// Example:
// "Chrome Extension + Laravel" = 0 competitors = 10 points (GOLD!)
// "Laravel multi-tenancy" = 3 competitors = 4 points (competitive but doable)
// "Laravel basics" = 20+ competitors = 2 points (saturated)
```

**Why 10%**: Competitor gap = differentiation opportunity

---

### Final Score Calculation:

```php
$finalScore =
    ($searchVolumeScore * 0.3) +
    ($socialEngagementScore * 0.2) +
    ($trendGrowthScore * 0.2) +
    ($recencyScore * 0.2) +
    ($competitorGapScore * 0.1);

// Round to 1 decimal
$finalScore = round($finalScore, 1);

// Example Topic: "DeepSeek Laravel Integration"
$finalScore =
    (10 * 0.3) +    // Search: 820/month = 10 points
    (10 * 0.2) +    // Social: Very high engagement = 10 points
    (10 * 0.2) +    // Trend: +340% growth = 10 points
    (10 * 0.2) +    // Recency: Posted 1 day ago = 10 points
    (7 * 0.1);      // Competition: 1 competitor = 7 points
= 3.0 + 2.0 + 2.0 + 2.0 + 0.7
= 9.7/10 ← WRITE THIS IMMEDIATELY!
```

---

### Scoring Thresholds:

| Score | Action | Priority |
|-------|--------|----------|
| **9.0-10.0** | 🔥 Write NOW! (trending + high potential) | Urgent |
| **7.5-8.9** | ⚡ Write this week (good opportunity) | High |
| **6.0-7.4** | 💡 Consider writing (moderate potential) | Medium |
| **4.0-5.9** | 📝 Add to backlog (evergreen content) | Low |
| **0-3.9** | ❌ Skip (low value or too competitive) | Ignore |

---

## Implementation Guide

### Phase 1: Database Schema

Create migration:

```bash
php artisan make:migration create_trending_topics_table
```

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trending_topics', function (Blueprint $table) {
            $table->id();

            // Topic Info
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->json('keywords')->nullable();

            // Source Data
            $table->enum('source', ['reddit', 'hackernews', 'google_trends', 'twitter', 'competitor_blog']);
            $table->string('source_url', 500)->nullable();
            $table->timestamp('discovered_at');

            // Metrics
            $table->integer('search_volume')->default(0);
            $table->integer('social_engagement')->default(0); // upvotes/likes/points
            $table->decimal('trend_growth_percent', 5, 2)->default(0); // e.g., 340.50
            $table->integer('days_since_trending')->default(0);
            $table->integer('competitor_count')->default(0);

            // Scoring
            $table->decimal('search_volume_score', 3, 1)->default(0);
            $table->decimal('social_engagement_score', 3, 1)->default(0);
            $table->decimal('trend_growth_score', 3, 1)->default(0);
            $table->decimal('recency_score', 3, 1)->default(0);
            $table->decimal('competitor_gap_score', 3, 1)->default(0);
            $table->decimal('final_score', 3, 1)->default(0)->index();

            // Status
            $table->enum('status', ['new', 'reviewing', 'approved', 'rejected', 'published'])->default('new');
            $table->foreignId('blog_topic_id')->nullable()->constrained('blog_topics')->nullOnDelete();

            // Metadata
            $table->json('raw_data')->nullable(); // Store full API response
            $table->text('notes')->nullable();

            $table->timestamps();

            // Indexes
            $table->index(['status', 'final_score']);
            $table->index('discovered_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trending_topics');
    }
};
```

---

### Phase 2: Model

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrendingTopic extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'keywords',
        'source',
        'source_url',
        'discovered_at',
        'search_volume',
        'social_engagement',
        'trend_growth_percent',
        'days_since_trending',
        'competitor_count',
        'search_volume_score',
        'social_engagement_score',
        'trend_growth_score',
        'recency_score',
        'competitor_gap_score',
        'final_score',
        'status',
        'blog_topic_id',
        'raw_data',
        'notes',
    ];

    protected $casts = [
        'keywords' => 'array',
        'discovered_at' => 'datetime',
        'raw_data' => 'array',
        'search_volume' => 'integer',
        'social_engagement' => 'integer',
        'trend_growth_percent' => 'decimal:2',
        'final_score' => 'decimal:1',
    ];

    public function blogTopic(): BelongsTo
    {
        return $this->belongsTo(BlogTopic::class);
    }

    /**
     * Scope: High-scoring topics (7.0+)
     */
    public function scopeHighPriority($query)
    {
        return $query->where('final_score', '>=', 7.0);
    }

    /**
     * Scope: New topics not yet reviewed
     */
    public function scopeUnreviewed($query)
    {
        return $query->where('status', 'new');
    }
}
```

---

### Phase 3: Service Classes

Create services for each data source:

```bash
mkdir -p app/Services/TopicDiscovery
```

#### RedditService.php

```php
<?php

namespace App\Services\TopicDiscovery;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class RedditService
{
    private array $subreddits = [
        'laravel',
        'PHP',
        'webdev',
        'SaaS',
        'indiehackers',
        'vuejs',
    ];

    public function fetchTrendingTopics(int $limit = 25): array
    {
        $topics = [];

        foreach ($this->subreddits as $subreddit) {
            $response = Http::get("https://www.reddit.com/r/{$subreddit}/top.json", [
                't' => 'week',
                'limit' => $limit,
            ]);

            if ($response->successful()) {
                $posts = $response->json()['data']['children'] ?? [];

                foreach ($posts as $post) {
                    $data = $post['data'];

                    // Filter: Minimum engagement threshold
                    if ($data['ups'] < 50) {
                        continue;
                    }

                    $topics[] = [
                        'title' => $data['title'],
                        'slug' => Str::slug($data['title']),
                        'description' => Str::limit($data['selftext'] ?? '', 200),
                        'source' => 'reddit',
                        'source_url' => 'https://reddit.com' . $data['permalink'],
                        'social_engagement' => $data['ups'],
                        'discovered_at' => now(),
                        'raw_data' => [
                            'upvotes' => $data['ups'],
                            'comments' => $data['num_comments'],
                            'subreddit' => $subreddit,
                            'created_utc' => $data['created_utc'],
                        ],
                    ];
                }
            }
        }

        return $topics;
    }
}
```

#### HackerNewsService.php

```php
<?php

namespace App\Services\TopicDiscovery;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class HackerNewsService
{
    public function fetchTrendingTopics(int $limit = 30): array
    {
        $topics = [];

        // Fetch top story IDs
        $topStoryIds = Http::get('https://hacker-news.firebaseio.com/v0/topstories.json')
            ->json();

        // Limit to top N stories
        $topStoryIds = array_slice($topStoryIds, 0, $limit);

        foreach ($topStoryIds as $storyId) {
            $story = Http::get("https://hacker-news.firebaseio.com/v0/item/{$storyId}.json")
                ->json();

            // Filter: Minimum points threshold
            if (($story['score'] ?? 0) < 100) {
                continue;
            }

            // Filter: Only tech-related topics
            $title = strtolower($story['title'] ?? '');
            $techKeywords = ['laravel', 'php', 'saas', 'api', 'vue', 'javascript', 'ai', 'chrome extension'];

            if (!Str::contains($title, $techKeywords)) {
                continue;
            }

            $topics[] = [
                'title' => $story['title'],
                'slug' => Str::slug($story['title']),
                'source' => 'hackernews',
                'source_url' => $story['url'] ?? "https://news.ycombinator.com/item?id={$storyId}",
                'social_engagement' => $story['score'] ?? 0,
                'discovered_at' => now(),
                'raw_data' => [
                    'points' => $story['score'] ?? 0,
                    'comments' => $story['descendants'] ?? 0,
                    'by' => $story['by'] ?? null,
                    'time' => $story['time'] ?? null,
                ],
            ];
        }

        return $topics;
    }
}
```

#### GoogleTrendsService.php

```php
<?php

namespace App\Services\TopicDiscovery;

use Illuminate\Support\Str;

class GoogleTrendsService
{
    private array $keywords = [
        'laravel',
        'laravel 11',
        'laravel 12',
        'vue.js',
        'filament',
        'filament 3',
        'deepseek',
        'openai api',
        'laravel saas',
        'chrome extension',
        'manifest v3',
        'multi-tenancy',
    ];

    public function fetchTrendingTopics(): array
    {
        $topics = [];

        // Note: Google Trends doesn't have official API
        // Options:
        // 1. Use unofficial package: google-trends-api (npm)
        // 2. Use SerpAPI (paid, $50/month)
        // 3. Manual tracking (check monthly)

        // For now, return placeholder structure
        // You'll implement actual API integration based on your choice

        foreach ($this->keywords as $keyword) {
            // TODO: Implement actual Google Trends API call
            // This is a placeholder structure

            $topics[] = [
                'title' => "Tutorial: {$keyword}",
                'slug' => Str::slug("tutorial {$keyword}"),
                'description' => "Rising search trend for: {$keyword}",
                'source' => 'google_trends',
                'source_url' => "https://trends.google.com/trends/explore?q={$keyword}",
                'search_volume' => 0, // Will be populated by actual API
                'trend_growth_percent' => 0, // Will be populated by actual API
                'discovered_at' => now(),
                'raw_data' => [
                    'keyword' => $keyword,
                    // Add more data from API
                ],
            ];
        }

        return $topics;
    }
}
```

---

### Phase 4: Topic Scorer Service

```php
<?php

namespace App\Services\TopicDiscovery;

use Carbon\Carbon;

class TopicScorer
{
    public function calculateScore(array $topicData): array
    {
        // 1. Search Volume Score (30%)
        $searchVolumeScore = $this->calculateSearchVolumeScore($topicData['search_volume'] ?? 0);

        // 2. Social Engagement Score (20%)
        $socialEngagementScore = $this->calculateSocialEngagementScore($topicData['social_engagement'] ?? 0);

        // 3. Trend Growth Score (20%)
        $trendGrowthScore = $this->calculateTrendGrowthScore($topicData['trend_growth_percent'] ?? 0);

        // 4. Recency Score (20%)
        $recencyScore = $this->calculateRecencyScore($topicData['discovered_at'] ?? now());

        // 5. Competitor Gap Score (10%)
        $competitorGapScore = $this->calculateCompetitorGapScore($topicData['competitor_count'] ?? 0);

        // Final Score
        $finalScore =
            ($searchVolumeScore * 0.3) +
            ($socialEngagementScore * 0.2) +
            ($trendGrowthScore * 0.2) +
            ($recencyScore * 0.2) +
            ($competitorGapScore * 0.1);

        return [
            'search_volume_score' => round($searchVolumeScore, 1),
            'social_engagement_score' => round($socialEngagementScore, 1),
            'trend_growth_score' => round($trendGrowthScore, 1),
            'recency_score' => round($recencyScore, 1),
            'competitor_gap_score' => round($competitorGapScore, 1),
            'final_score' => round($finalScore, 1),
        ];
    }

    private function calculateSearchVolumeScore(int $searchVolume): float
    {
        return min(($searchVolume / 100), 10);
    }

    private function calculateSocialEngagementScore(int $engagement): float
    {
        return min(($engagement / 10), 10);
    }

    private function calculateTrendGrowthScore(float $growthPercent): float
    {
        return match(true) {
            $growthPercent >= 300 => 10,
            $growthPercent >= 150 => 8,
            $growthPercent >= 50 => 6,
            $growthPercent >= 0 => 4,
            default => 2,
        };
    }

    private function calculateRecencyScore($discoveredAt): float
    {
        $daysSince = Carbon::parse($discoveredAt)->diffInDays(now());

        return match(true) {
            $daysSince <= 2 => 10,
            $daysSince <= 7 => 8,
            $daysSince <= 14 => 6,
            $daysSince <= 30 => 4,
            default => 2,
        };
    }

    private function calculateCompetitorGapScore(int $competitorCount): float
    {
        return match(true) {
            $competitorCount === 0 => 10,
            $competitorCount === 1 => 7,
            $competitorCount <= 3 => 4,
            default => 2,
        };
    }
}
```

---

### Phase 5: Main Command

```php
<?php

namespace App\Console\Commands;

use App\Models\TrendingTopic;
use App\Services\NotificationService;
use App\Services\TopicDiscovery\RedditService;
use App\Services\TopicDiscovery\HackerNewsService;
use App\Services\TopicDiscovery\GoogleTrendsService;
use App\Services\TopicDiscovery\TopicScorer;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class DiscoverTrendingTopics extends Command
{
    protected $signature = 'blog:discover-trending-topics
                            {--source= : Specific source to fetch (reddit, hackernews, google_trends, all)}
                            {--min-score=7 : Minimum score to save (0-10)}';

    protected $description = 'Discover trending blog topics from multiple sources';

    public function handle(
        RedditService $reddit,
        HackerNewsService $hackerNews,
        GoogleTrendsService $googleTrends,
        TopicScorer $scorer,
        NotificationService $notification
    ): int {
        $this->info('🔍 Discovering trending topics...');

        $source = $this->option('source') ?? 'all';
        $minScore = (float) $this->option('min-score');
        $allTopics = [];

        // Fetch from sources
        if ($source === 'all' || $source === 'reddit') {
            $this->info('📱 Fetching from Reddit...');
            $allTopics = array_merge($allTopics, $reddit->fetchTrendingTopics());
        }

        if ($source === 'all' || $source === 'hackernews') {
            $this->info('🔶 Fetching from Hacker News...');
            $allTopics = array_merge($allTopics, $hackerNews->fetchTrendingTopics());
        }

        if ($source === 'all' || $source === 'google_trends') {
            $this->info('📈 Fetching from Google Trends...');
            $allTopics = array_merge($allTopics, $googleTrends->fetchTrendingTopics());
        }

        $this->info("Found {count($allTopics)} potential topics");

        // Score and filter
        $savedCount = 0;
        $this->info('⚖️  Scoring topics...');

        foreach ($allTopics as $topicData) {
            // Calculate scores
            $scores = $scorer->calculateScore($topicData);

            // Skip if below threshold
            if ($scores['final_score'] < $minScore) {
                continue;
            }

            // Check for duplicates
            $exists = TrendingTopic::where('slug', $topicData['slug'])->exists();
            if ($exists) {
                continue;
            }

            // Save topic
            TrendingTopic::create(array_merge($topicData, $scores));
            $savedCount++;

            $this->info("✅ Saved: {$topicData['title']} (Score: {$scores['final_score']})");
        }

        $this->info("💾 Saved {$savedCount} high-scoring topics");

        // Send notification
        if ($savedCount > 0) {
            $highPriorityTopics = TrendingTopic::where('final_score', '>=', 9.0)
                ->where('status', 'new')
                ->get();

            $message = "🔥 **{$savedCount} New Trending Topics Discovered!**\n\n";

            if ($highPriorityTopics->count() > 0) {
                $message .= "**🚨 HIGH PRIORITY (Score 9.0+):**\n";
                foreach ($highPriorityTopics as $topic) {
                    $message .= "• {$topic->title} ({$topic->final_score}/10)\n";
                }
            }

            $message .= "\nView all: /admin/trending-topics";

            $notification->sendTelegram($message);
        }

        $this->info('✨ Done!');

        return self::SUCCESS;
    }
}
```

---

### Phase 6: Filament Resource

Create admin interface to review discovered topics:

```bash
php artisan make:filament-resource TrendingTopic
```

```php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrendingTopicResource\Pages;
use App\Models\TrendingTopic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TrendingTopicResource extends Resource
{
    protected static ?string $model = TrendingTopic::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';
    protected static ?string $navigationLabel = 'Trending Topics';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options([
                        'new' => 'New',
                        'reviewing' => 'Reviewing',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                        'published' => 'Published',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('notes')
                    ->rows(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\BadgeColumn::make('source')
                    ->colors([
                        'primary' => 'reddit',
                        'warning' => 'hackernews',
                        'success' => 'google_trends',
                    ]),
                Tables\Columns\TextColumn::make('final_score')
                    ->label('Score')
                    ->sortable()
                    ->badge()
                    ->color(fn ($state) => $state >= 9 ? 'danger' : ($state >= 7 ? 'warning' : 'gray')),
                Tables\Columns\TextColumn::make('social_engagement')
                    ->label('Engagement'),
                Tables\Columns\TextColumn::make('discovered_at')
                    ->label('Discovered')
                    ->dateTime('M d, Y')
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'gray' => 'new',
                        'warning' => 'reviewing',
                        'success' => 'approved',
                        'danger' => 'rejected',
                        'primary' => 'published',
                    ]),
            ])
            ->defaultSort('final_score', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('source'),
                Tables\Filters\SelectFilter::make('status'),
            ])
            ->actions([
                Tables\Actions\Action::make('approve')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->action(function (TrendingTopic $record) {
                        $record->update(['status' => 'approved']);
                    })
                    ->visible(fn (TrendingTopic $record) => $record->status === 'new'),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrendingTopics::route('/'),
            'view' => Pages\ViewTrendingTopic::route('/{record}'),
            'edit' => Pages\EditTrendingTopic::route('/{record}/edit'),
        ];
    }
}
```

---

## Command Usage

### Run Manually:

```bash
# Discover from all sources
php artisan blog:discover-trending-topics

# Discover from specific source
php artisan blog:discover-trending-topics --source=reddit
php artisan blog:discover-trending-topics --source=hackernews

# Change minimum score threshold
php artisan blog:discover-trending-topics --min-score=8
```

### Example Output:

```
🔍 Discovering trending topics...
📱 Fetching from Reddit...
🔶 Fetching from Hacker News...
📈 Fetching from Google Trends...
Found 47 potential topics
⚖️  Scoring topics...
✅ Saved: DeepSeek Laravel Integration Tutorial (Score: 9.7)
✅ Saved: Building SaaS with Filament 3 (Score: 8.5)
✅ Saved: Chrome Extension Authentication with Laravel (Score: 7.8)
💾 Saved 12 high-scoring topics
✨ Done!
```

---

## Automation & Scheduling

### Add to `app/Console/Kernel.php`:

```php
protected function schedule(Schedule $schedule): void
{
    // Run every Monday at 9 AM
    $schedule->command('blog:discover-trending-topics')
        ->weeklyOn(1, '9:00')
        ->timezone('Europe/Rome');

    // Alternative: Run daily at 8 AM
    // $schedule->command('blog:discover-trending-topics')
    //     ->dailyAt('8:00');
}
```

### Make sure cron is running:

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

---

## Cost Analysis

### API Costs:

| Source | API | Cost | Limits |
|--------|-----|------|--------|
| Reddit | Free | $0 | 60 requests/minute |
| Hacker News | Free | $0 | Unlimited |
| Google Trends | Unofficial (free) | $0 | Unreliable |
| Google Trends | SerpAPI (paid) | $50/month | 5,000 searches/month |
| Twitter/X | Basic ($100/month) | $100/month | 10,000 tweets/month |
| RSS Feeds | Free | $0 | Unlimited |

### Recommended Free Setup:

```
✅ Reddit (free, reliable)
✅ Hacker News (free, reliable)
✅ RSS Feeds (free, reliable)
❌ Google Trends (skip paid version for now)
❌ Twitter API (skip $100/month for now)

Total Cost: $0/month
```

### If You Want Premium Data:

```
Reddit + HN + RSS = Free
+ SerpAPI (Google Trends) = $50/month
+ Twitter Basic = $100/month

Total: $150/month
```

**Recommendation**: Start with free sources (Reddit + HN + RSS). Upgrade later if needed.

---

## Alternative Approaches

### Option 1: Manual Weekly Review (0 hours dev, 2 hours/week)

**Pros**: No coding needed
**Cons**: Time-consuming, miss trends
**Best for**: If you're too busy to build the system

---

### Option 2: Semi-Automated (4 hours dev, 30 min/week)

Build just Reddit scraper + manual review
**Pros**: Quick to build, covers 70% of value
**Cons**: Still manual work

---

### Option 3: Fully Automated (8 hours dev, 5 min/week)

Full system as described above
**Pros**: Saves 2-3 hours weekly, never miss trends
**Cons**: 8 hours upfront investment

**ROI Calculation**:
- Time saved: 2.5 hours/week = 10 hours/month = 120 hours/year
- Build time: 8 hours
- Break-even: After 3 weeks
- Annual savings: 112 hours

---

### Option 4: Use Existing Tools

**Tools**:
- BuzzSumo ($99/month) - See trending content
- Ahrefs ($99/month) - Keyword research
- SparkToro ($38/month) - Audience research

**Pros**: No coding, works immediately
**Cons**: Expensive ($200+/month), not tailored to your niche

---

## Next Steps

### Week 1 (Now):
- ✅ Use 40 seeded topics
- ✅ Generate first 3-5 posts
- ✅ Deploy to production

### Week 2:
- Build Phase 1-2 (database + models)
- Build Reddit service
- Build basic command
- Test manually

### Week 3:
- Add Hacker News service
- Add scoring logic
- Add Telegram notifications
- Schedule weekly cron

### Week 4:
- Build Filament resource
- Refine scoring algorithm
- Add competitor RSS monitoring
- Full production deployment

---

**Status**: Ready to build! Start with database migration and Reddit service.

