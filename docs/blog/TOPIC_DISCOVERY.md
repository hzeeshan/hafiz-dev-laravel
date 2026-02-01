# Automated Topic Discovery System

**Status**: ✅ Production Ready
**Created**: October 14, 2025

---

## Overview

Automated system that discovers trending blog topics from Reddit, Hacker News, and Google Trends. Topics are scored (0-10) and can be auto-converted to `BlogTopic` entries for content generation.

**Key Features:**
- ✅ Multi-source discovery (Reddit, Hacker News, Google Trends)
- ✅ Intelligent scoring algorithm (0-10 scale)
- ✅ Auto-create BlogTopics for high-scoring topics (>= 7.0)
- ✅ Duplicate detection
- ✅ Keyword extraction
- ✅ Telegram notifications
- ✅ Extensible architecture (easy to add new sources)

---

## Architecture

### **Clean & Pragmatic Design**

```
TopicSourceInterface (contract)
    ↓
├─ RedditSource
├─ HackerNewsSource
└─ GoogleTrendsSource
    ↓
TopicSourceFactory (creates sources)
    ↓
TopicDiscoveryService (orchestrator)
    ↓
TopicScorer (calculates 0-10 score)
    ↓
TrendingTopicSource (database storage)
    ↓
BlogTopic (auto-created if score >= 7)
```

### **Key Components**

| Component | Purpose |
|-----------|---------|
| `TopicSourceInterface` | Contract for all sources |
| `RedditSource` | Fetch from r/laravel, r/PHP, r/webdev, r/SaaS |
| `HackerNewsSource` | Fetch from Hacker News Firebase API |
| `GoogleTrendsSource` | Placeholder (no official API, ready for paid API) |
| `TopicSourceFactory` | Create source instances (factory pattern) |
| `TopicScorer` | Calculate 0-10 score based on metrics |
| `TopicDiscoveryService` | Main orchestrator |
| `TrendingTopicSource` | Model for discovered topics |
| `DiscoverTrendingTopics` | CLI command |

---

## Usage

### **Basic Discovery**

```bash
# Discover from all sources
php artisan blog:discover-trending

# Discover from specific sources
php artisan blog:discover-trending --sources=reddit,hackernews

# Auto-create BlogTopics for high-scoring topics (>= 7.0)
php artisan blog:discover-trending --auto-create

# Send Telegram notification
php artisan blog:discover-trending --auto-create --notify
```

### **Command Options**

| Option | Description |
|--------|-------------|
| `--sources=*` | Specific sources (reddit, hackernews, google_trends) |
| `--auto-create` | Auto-create BlogTopics if score >= 7.0 |
| `--notify` | Send Telegram notification with summary |
| `--sync-to-production` | Sync discovered topics to production server |

---

## Configuration

### **File: `config/topic_discovery.php`**

```php
return [
    'enabled' => true,
    'auto_create_threshold' => 7.0, // Score >= 7 = auto-create

    'sources' => [
        'reddit' => [
            'enabled' => true,
            'subreddits' => ['laravel', 'PHP', 'webdev', 'SaaS'],
            'min_upvotes' => 50,
            'limit' => 25,
        ],

        'hackernews' => [
            'enabled' => true,
            'keywords' => ['laravel', 'php', 'saas', 'deepseek', 'ai'],
            'min_points' => 100,
            'limit' => 30,
        ],

        'google_trends' => [
            'enabled' => true,
            'keywords' => ['laravel', 'deepseek', 'php', 'filament'],
            'geo' => 'US',
        ],
    ],

    'duplicate_detection' => [
        'enabled' => true,
        'similarity_threshold' => 0.8,  // 80% similarity = duplicate
        'lookback_days' => 30,
    ],
];
```

---

## Scoring Algorithm

### **Score Range: 0-10**

```
Score = Engagement (max 4) + Discussion (max 3) + Keywords (max 3)

Components:
1. Engagement Score (upvotes/points) - max 4 points
   - Score / 100, capped at 4.0

2. Discussion Score (comments) - max 3 points
   - Comments / 50, capped at 3.0

3. Keyword Relevance - max 3 points
   - High-value keywords: +0.4 each (laravel, php, ai, saas)
   - Medium-value keywords: +0.2 each (vue, react, docker)
   - Bonus: +0.5 if 3+ relevant keywords
```

### **Score Categories**

| Score | Category | Action |
|-------|----------|--------|
| 9.0+ | 🔥 Excellent | Auto-create (if enabled) |
| 7.0-8.9 | ⭐ High | Auto-create (if enabled) |
| 5.0-6.9 | ✓ Good | Save for review |
| 3.0-4.9 | ~ Fair | Save for review |
| < 3.0 | × Low | Save but likely skip |

---

## Example Output

```bash
$ php artisan blog:discover-trending --auto-create --notify

🔍 Discovering Trending Topics...

📡 Sources: reddit, hackernews

📊 Discovery Complete (13.97s)

  Total Discovered: 7
  Auto-Created BlogTopics: 1
  Errors: 0

🎯 Top Discovered Topics:
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

1. ⭐ High 7.0/10 - SQLite Online – 11 years of solo development
   Source: 🔶 Hacker News | Upvotes: 410 | Comments: 130 ✅ Auto-created
   Keywords: ai, database, saas

2. ✓ Good 6.4/10 - America is getting an AI gold rush
   Source: 🔶 Hacker News | Upvotes: 295 | Comments: 351
   Keywords: ai

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

✅ Discovery complete! Check /admin/blog-topics for auto-created topics.
📱 Telegram notification sent!
```

---

## Database Schema

### **`trending_topic_sources` Table**

| Column | Type | Description |
|--------|------|-------------|
| `id` | bigint | Primary key |
| `source` | string | reddit, hackernews, google_trends |
| `source_id` | string | External ID from API |
| `title` | string | Topic title |
| `url` | string | Source URL |
| `excerpt` | text | Short description |
| `metadata` | json | Raw API data |
| `calculated_score` | float | 0-10 score |
| `upvotes` | int | Upvotes/points |
| `comments_count` | int | Comment count |
| `keywords` | json | Extracted keywords |
| `discovered_at` | timestamp | When discovered |
| `blog_topic_id` | foreign | Link to BlogTopic (if converted) |
| `converted_at` | timestamp | When converted to BlogTopic |

---

## Adding New Sources

### **1. Create Source Class**

```php
// app/Services/TopicDiscovery/Sources/DevToSource.php
namespace App\Services\TopicDiscovery\Sources;

use App\Contracts\TopicSourceInterface;

class DevToSource implements TopicSourceInterface
{
    public function getName(): string
    {
        return 'devto';
    }

    public function fetchTopics(array $config): array
    {
        // Implement Dev.to API logic
        // Return array of topics
    }
}
```

### **2. Register in Factory**

```php
// app/Services/TopicDiscovery/TopicSourceFactory.php
public static function make(string $source): TopicSourceInterface
{
    return match ($source) {
        'reddit' => new RedditSource(),
        'hackernews' => new HackerNewsSource(),
        'google_trends' => new GoogleTrendsSource(),
        'devto' => new DevToSource(), // NEW
        default => throw new \InvalidArgumentException(),
    };
}
```

### **3. Add to Config**

```php
// config/topic_discovery.php
'sources' => [
    'devto' => [  // NEW - no other code changes needed!
        'enabled' => true,
        'tags' => ['laravel', 'php'],
    ],
],
```

---

## Integration with Blog Generation

### **Workflow**

1. **Discovery** → Find trending topics from sources
2. **Scoring** → Calculate 0-10 score
3. **Auto-Create** → Create `BlogTopic` if score >= 7.0
4. **Manual Review** → Review in `/admin/blog-topics`
5. **Generate** → Click "Generate Now" button
6. **AI Content** → `GenerateBlogPostJob` creates post

### **Auto-Created BlogTopic Fields**

```php
BlogTopic::create([
    'title' => $trending->title,
    'keywords' => 'laravel, saas, automation',
    'description' => 'Excerpt from trending topic',
    'content_type' => 'technical', // Auto-guessed
    'generation_mode' => 'topic',
    'status' => 'pending',
    'priority' => 7, // Based on score
    'source_url' => $trending->url,
]);
```

---

## Scheduled Discovery (Future)

### **Add to `app/Console/Kernel.php`**

```php
protected function schedule(Schedule $schedule): void
{
    // Weekly discovery on Monday mornings
    $schedule->command('blog:discover-trending --auto-create --notify')
        ->weeklyOn(1, '09:00')
        ->timezone('Europe/Rome');
}
```

---

## API Sources

### **Reddit**
- **Endpoint**: `https://www.reddit.com/r/{subreddit}/hot.json`
- **Auth**: Not required for public data
- **Rate Limit**: ~60 requests/minute
- **Cost**: Free

### **Hacker News**
- **Endpoint**: `https://hacker-news.firebaseio.com/v0/`
- **Auth**: Not required
- **Rate Limit**: No official limit
- **Cost**: Free

### **Google Trends**
- **Status**: Placeholder (no official API)
- **Alternatives**: SerpApi, DataForSEO (paid)
- **Current**: Generates synthetic scores

---

## Monitoring

### **Weekly Review**

```bash
# Check discovered topics
php artisan tinker --execute="
\$count = App\Models\TrendingTopicSource::recent(7)->count();
echo 'Discovered this week: ' . \$count . PHP_EOL;

\$highScore = App\Models\TrendingTopicSource::highScore(7)->recent(7)->count();
echo 'High-scoring (>= 7): ' . \$highScore . PHP_EOL;

\$converted = App\Models\TrendingTopicSource::whereNotNull('blog_topic_id')->recent(7)->count();
echo 'Converted to BlogTopic: ' . \$converted . PHP_EOL;
"
```

---

## Future Enhancements

- [ ] **Twitter/X Integration** (requires API key)
- [ ] **Dev.to Trending Posts**
- [ ] **Laravel News RSS Feed**
- [ ] **Competitor Blog Monitoring**
- [ ] **Email Digest** (weekly summary)
- [ ] **AI Topic Enrichment** (better keywords, descriptions)
- [ ] **Trend Forecasting** (predict topic virality)

---

## SEO & Keyword Strategy

### **Why Google Trends is Disabled**

❌ **Google Trends has no official free API**
- Paid alternatives: $50-200/month (SerpApi, DataForSEO)
- Placeholder implementation scores too low (1.3-1.5)
- No real engagement metrics (0 comments)

✅ **Reddit + Hacker News are better:**
- Free APIs with high rate limits
- Real engagement (upvotes + comments)
- Real search intent = people discussing real problems
- If it's hot on Reddit/HN, it's searchable

### **Keyword Expansion Results**

**Before:** 5 keywords → 14 topics discovered
**After:** 40+ keywords → **44 topics discovered** (3x improvement!)

**Expanded Coverage:**
- Backend: laravel, php, api, rest, graphql
- Frontend: vue, react, tailwind, inertia
- AI & Automation: deepseek, chatgpt, llm
- SaaS & Business: saas, startup, indie hacker
- DevOps: docker, kubernetes, deployment
- Chrome Extensions: chrome extension, manifest v3

### **Your Competitive Advantages (High SEO Value)**

1. **AI + Laravel** 🔥 - Almost zero competition
2. **Chrome Extensions + Laravel** 🔥 - Extremely rare combo
3. **SaaS Building** 🔥 - Real revenue, proven experience
4. **Full-Stack** - Backend + Frontend expertise

These keywords score **highest** in the algorithm because they match your unique expertise.

---

## Scheduled Automation

### **Local-to-Production Sync**

**Why?** Reddit API is blocked on VPS. Discovery runs locally on Mac and syncs to production via API.

**Architecture:**
```
Mac (crontab: Mon/Thu 9 AM)
    ↓
blog:discover-trending --auto-create --notify --sync-to-production
    ↓
POST https://hafiz.dev/api/sync/trending-topics
    ↓
Production: Saves topics, creates BlogTopics, sends Telegram
```

**Local Setup (Mac crontab):**
```bash
# Edit crontab
crontab -e

# Entry (Monday + Thursday at 9 AM):
0 9 * * 1,4 cd /Users/hafizzeeshanriaz/side-projects/hafiz-dev-laravel && /usr/bin/php artisan blog:discover-trending --auto-create --notify --sync-to-production >> storage/logs/topic-discovery-cron.log 2>&1
```

**Environment Variables:**

| Location | Variable | Purpose |
|----------|----------|---------|
| Local `.env` | `PRODUCTION_SYNC_URL` | `https://hafiz.dev/api/sync/trending-topics` |
| Local `.env` | `PRODUCTION_SYNC_TOKEN` | Token for authenticating with production |
| Production `.env` | `TOPIC_SYNC_TOKEN` | Token for validating incoming requests |

Generate token: `openssl rand -hex 32`

**What happens automatically:**
1. Mac runs discovery from Reddit + HN (APIs work locally)
2. Syncs topics to production via API endpoint
3. Production auto-creates BlogTopics (score >= 7.0)
4. Production sends Telegram notification
5. Logs to `storage/logs/topic-discovery-cron.log`

**Your workflow:**
- Monday/Thursday morning: Receive Telegram alert
- Review auto-created topics, generate 2-3 posts
- Total time: ~30 minutes/week

---

## Quick Reference

| Task | Command |
|------|---------|
| Discover all sources | `php artisan blog:discover-trending` |
| Reddit only | `php artisan blog:discover-trending --sources=reddit` |
| Auto-create high-scoring | `php artisan blog:discover-trending --auto-create` |
| With Telegram alert | `php artisan blog:discover-trending --auto-create --notify` |
| **Full sync to production** | `php artisan blog:discover-trending --auto-create --notify --sync-to-production` |
| Check discovered count | See "Monitoring" section above |
| View crontab | `crontab -l` |
| Check cron logs | `tail -f storage/logs/topic-discovery-cron.log` |
| Scheduled run | Monday + Thursday 9 AM (Mac crontab) |

---

**Status**: ✅ System is production ready with local-to-production sync!

**Next**: Discovery runs automatically Mon/Thu at 9 AM from your Mac.
