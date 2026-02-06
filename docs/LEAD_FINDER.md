# Lead Finder System

**Status**: ✅ Production Ready
**Created**: February 5, 2026

---

## Overview

Automated system that discovers potential client leads from Reddit and Hacker News. Unlike the Topic Discovery system (which finds blog content ideas), Lead Finder focuses on finding **people who want to hire a developer or have problems you can solve**.

**Key Differences from Topic Discovery:**
- **Intent-based scoring** (not engagement-based)
- **Near real-time monitoring** (every 2 hours, not twice a week)
- **Per-lead notifications** (not digest summaries)
- **Fresh posts priority** (sort by new, not hot)
- **Body text analysis** (scans post content, not just titles)
- **HN Algolia Search API** (keyword search instead of top stories)

**Key Features:**
- ✅ Multi-source discovery (Reddit, Hacker News)
- ✅ Intent-based scoring algorithm (0-10 scale)
- ✅ Instant Telegram notifications per lead
- ✅ Suggested reply approach per lead
- ✅ Duplicate detection
- ✅ Lead status tracking (new → contacted → converted)
- ✅ Local-to-production sync

---

## Architecture

### **Clean & Parallel Design**

Mirrors the Topic Discovery architecture exactly:

```
LeadSourceInterface (contract)
    ↓
├─ RedditLeadSource (fetches from r/forhire, r/SomebodyMakeThis, etc.)
└─ HackerNewsLeadSource (Algolia search API)
    ↓
LeadSourceFactory (creates sources)
    ↓
LeadFinderService (orchestrator)
    ↓
LeadScorer (calculates 0-10 INTENT score)
    ↓
DiscoveredLead (database storage)
    ↓
Telegram Notification (instant per-lead alerts)
```

### **Key Components**

| Component | Location | Purpose |
|-----------|----------|---------|
| `LeadSourceInterface` | `app/Contracts/` | Contract for all sources |
| `RedditLeadSource` | `app/Services/LeadFinder/Sources/` | Fetch from hiring/idea subreddits |
| `HackerNewsLeadSource` | `app/Services/LeadFinder/Sources/` | Algolia keyword search |
| `LeadSourceFactory` | `app/Services/LeadFinder/` | Create source instances |
| `LeadScorer` | `app/Services/LeadFinder/` | Calculate intent-based score |
| `LeadFinderService` | `app/Services/LeadFinder/` | Main orchestrator |
| `DiscoveredLead` | `app/Models/` | Model for discovered leads |
| `DiscoverLeads` | `app/Console/Commands/` | CLI command |

---

## Usage

### **Basic Discovery**

```bash
# Discover from all sources
php artisan leads:discover

# Discover from specific sources
php artisan leads:discover --sources=reddit
php artisan leads:discover --sources=hackernews

# With Telegram notifications (score >= 5.0)
php artisan leads:discover --notify

# Sync to production
php artisan leads:discover --notify --sync-to-production
```

### **Command Options**

| Option | Description |
|--------|-------------|
| `--sources=*` | Specific sources (reddit, hackernews) |
| `--notify` | Send Telegram notification per high-scoring lead |
| `--sync-to-production` | Sync discovered leads to production server |

---

## Configuration

### **File: `config/lead_finder.php`**

```php
return [
    'enabled' => env('LEAD_FINDER_ENABLED', true),
    'notification_threshold' => 5.0,  // Score >= 5 = notify
    'min_save_threshold' => 2.0,       // Score >= 2 = save to DB

    'sources' => [
        'reddit' => [
            'enabled' => true,
            'subreddits' => [
                // HIGH INTENT - People actively looking for developers
                'forhire', 'SomebodyMakeThis', 'startups', 'Entrepreneur',

                // MEDIUM INTENT - People with problems I can solve
                'SaaS', 'SideProject', 'indiehackers', 'nocode',

                // PROBLEM SIGNALS
                'Automate', 'AutomateYourself', 'AppIdeas',
            ],
            'sort' => 'new',           // Fresh posts, not popular
            'min_upvotes' => 1,        // Low threshold for fresh posts
            'max_age_hours' => 48,     // Only last 48 hours
        ],

        'hackernews' => [
            'enabled' => true,
            'search_queries' => [
                'looking for developer', 'need a developer',
                'hire freelancer', 'build my mvp',
                'need someone to build', 'automate my business',
            ],
            'min_points' => 1,
            'max_age_hours' => 48,
        ],
    ],

    'intent_keywords' => [
        'high' => ['need a developer', 'hire developer', 'budget', ...],
        'medium' => ['need automation', 'mvp', 'prototype', ...],
        'low' => ['app idea', 'would pay for', 'i wish', ...],
    ],

    'exclude_keywords' => [
        'hiring full-time', 'equity only', 'unpaid', 'internship', ...
    ],

    'high_intent_subreddits' => [
        'forhire' => 2.0,           // +2 points
        'SomebodyMakeThis' => 1.5,  // +1.5 points
    ],
];
```

---

## Scoring Algorithm

### **Intent-Based Scoring (0-10 scale)**

Unlike Topic Discovery (which scores engagement), Lead Finder scores **buying intent**:

```
Score = Intent Keywords (max 4) + Freshness (max 2) + Specificity (max 2) + Subreddit Bonus (max 2)
```

### **1. Intent Keywords Score (max 4 points)**

Scans BOTH title AND body for intent keywords:

| Level | Points | Example Keywords |
|-------|--------|------------------|
| HIGH | +1.0 each (cap 3.0) | "need a developer", "hire freelancer", "budget" |
| MEDIUM | +0.5 each (cap 2.0) | "need automation", "mvp", "prototype" |
| LOW | +0.2 each (cap 1.0) | "app idea", "would pay for", "i wish" |

### **2. Freshness Score (max 2 points)**

Newer posts = higher value (respond before competitors):

| Age | Points |
|-----|--------|
| < 2 hours | 2.0 |
| < 6 hours | 1.5 |
| < 12 hours | 1.0 |
| < 24 hours | 0.5 |
| < 48 hours | 0.2 |
| Older | 0.0 |

### **3. Specificity Score (max 2 points)**

Detailed posts indicate serious buyers:

| Signal | Points |
|--------|--------|
| Budget/price mentioned | +0.8 |
| Timeline mentioned | +0.5 |
| Body > 200 chars | +0.4 |
| Specific tech mentioned | +0.3 |

### **4. Subreddit Bonus (max 2 points)**

Some subreddits indicate higher intent:

| Subreddit | Bonus |
|-----------|-------|
| r/forhire | +2.0 |
| r/SomebodyMakeThis | +1.5 |
| r/startups, r/Entrepreneur | +0.5 |

### **Score Categories**

| Score | Category | Action |
|-------|----------|--------|
| 8.0+ | 🔥 Hot Lead | Instant Telegram + respond ASAP |
| 6.0+ | ⭐ Strong Lead | Instant Telegram + respond today |
| 4.0+ | 👀 Worth Checking | Telegram notification |
| 2.0+ | 📋 Saved | Save but no notification |
| < 2.0 | Skip | Don't save |

---

## Telegram Notifications

Each lead triggers an individual notification (not a digest):

```
🎯 🔥 Hot Lead

📝 Title: Looking for developer to build my SaaS MVP - $2k budget
📊 Score: 8.5/10
🔗 https://reddit.com/r/forhire/...

👤 Author: u/founder123
📍 Source: r/forhire
⏰ Posted: 1 hour ago

🔑 Intent Signals: need a developer, budget, mvp

💡 Suggested Approach:
Budget mentioned. This is a serious inquiry - respond promptly.
```

### **Suggested Approaches**

Auto-generated based on lead characteristics:

| Trigger | Suggested Approach |
|---------|-------------------|
| r/forhire | "Direct hiring post. Reply with your relevant experience and portfolio link." |
| r/SomebodyMakeThis | "Idea request. Reply helpfully first, explain how you'd approach it technically." |
| Budget mentioned | "Budget mentioned. This is a serious inquiry - respond promptly." |
| Automation keywords | "Process pain point. Lead with time savings and automation angle." |
| No-code limits | "No-code limitations. Emphasize custom solutions and scalability." |
| Default | "Potential lead. Reply with helpful advice first, mention your services naturally." |

---

## Database Schema

### **`discovered_leads` Table**

| Column | Type | Description |
|--------|------|-------------|
| `id` | bigint | Primary key |
| `source` | string | reddit, hackernews |
| `source_id` | string | External ID from API |
| `title` | string | Post title |
| `url` | string | Post URL |
| `body` | text | Post body text |
| `author` | string | Post author |
| `subreddit` | string | For Reddit posts |
| `calculated_score` | float | 0-10 intent score |
| `score_category` | string | hot_lead, strong_lead, etc. |
| `upvotes` | int | Upvote count |
| `comments_count` | int | Comment count |
| `intent_keywords_found` | json | Which keywords matched |
| `metadata` | json | Raw API data |
| `posted_at` | timestamp | When original post was created |
| `discovered_at` | timestamp | When we discovered it |
| `status` | string | new, contacted, replied, converted, skipped |
| `notes` | text | Personal notes |
| `notified` | boolean | Was Telegram sent? |
| `notified_at` | timestamp | When notified |

---

## Lead Status Workflow

```
new → contacted → replied → converted
  ↓
skipped
```

| Status | Meaning |
|--------|---------|
| `new` | Just discovered, not yet acted on |
| `contacted` | You've reached out to this person |
| `replied` | They responded to your outreach |
| `converted` | They became a paying client! 🎉 |
| `skipped` | Not a good fit, moving on |

---

## API Sources

### **Reddit**

- **Endpoint**: `https://www.reddit.com/r/{subreddit}/new.json`
- **Auth**: Not required
- **Rate Limit**: ~60 requests/minute
- **Key Difference**: Uses `/new` not `/hot` for fresh posts

### **Hacker News (Algolia)**

- **Endpoint**: `https://hn.algolia.com/api/v1/search_by_date`
- **Auth**: Not required
- **Key Difference**: Keyword search by date, not top stories
- **Example**: `?query=need+developer&tags=story&numericFilters=created_at_i>{timestamp}`

---

## Production Sync

### **Why Sync?**

Reddit API may be blocked on VPS. Discovery runs locally on Mac and syncs to production via API.

### **Architecture**

```
Mac (crontab: every 2 hours)
    ↓
php artisan leads:discover --notify --sync-to-production
    ↓
POST https://hafiz.dev/api/sync/discovered-leads
    ↓
Production: Saves leads, sends Telegram notifications
```

### **Environment Variables**

| Location | Variable | Purpose |
|----------|----------|---------|
| Local `.env` | `LEAD_FINDER_SYNC_URL` | `https://hafiz.dev/api/sync/discovered-leads` |
| Local `.env` | `LEAD_FINDER_SYNC_TOKEN` | Token for authenticating with production |
| Production `.env` | `LEAD_FINDER_TOKEN` | Token for validating incoming requests |

Generate token: `openssl rand -hex 32`

---

## Cron Setup (Mac)

```bash
# Edit crontab
crontab -e

# Run every 2 hours
0 */2 * * * cd /Users/hafizzeeshanriaz/side-projects/hafiz-dev-laravel && /opt/homebrew/opt/php@8.3/bin/php artisan leads:discover --notify --sync-to-production >> storage/logs/lead-finder-cron.log 2>&1
```

**Note**: Use the correct PHP path for your system. Find it with `which php`.

---

## Lead Cleanup System

To prevent database bloat from running discovery every 2 hours, the system includes automatic cleanup.

### **Automatic Cleanup (Production)**

Scheduled task runs daily at 2 AM and deletes old "new" status leads:

```php
// routes/console.php
Schedule::command('leads:cleanup --days=30 --status=new')
    ->dailyAt('02:00');
```

**What Gets Deleted:**
- ✅ Leads with status `new` older than 30 days
- ❌ **Preserves** `contacted`, `replied`, `converted` leads forever

### **Manual Cleanup (CLI)**

```bash
# Preview what would be deleted (dry run)
php artisan leads:cleanup --days=30 --status=new --dry-run

# Delete old "new" leads (with confirmation)
php artisan leads:cleanup --days=30 --status=new

# Delete old skipped leads
php artisan leads:cleanup --days=60 --status=skipped

# Delete ANY old leads (dangerous!)
php artisan leads:cleanup --days=90
```

### **Bulk Delete (Filament Admin)**

The admin panel includes:

1. **Date Range Filters**:
   - 📅 Today
   - 📅 Last 7 days
   - 📅 Last 30 days
   - 📅 Older than 30 days
   - 🗑️ Older than 60 days

2. **Bulk Actions**:
   - Select multiple leads → "Delete" button
   - Select all visible (filtered) leads → Delete in one click
   - Bulk mark as contacted/skipped

**Example Workflow:**
1. Filter by "Older than 30 days" + Status "new"
2. Select all visible leads
3. Click bulk delete action
4. Confirm deletion

---

## Example Output

```bash
$ php artisan leads:discover --notify

🎯 Discovering Leads...

📡 Sources: reddit, hackernews

📊 Discovery Complete (8.23s)

  Total Discovered: 12
  🔥 Hot Leads: 2
  ⭐ Strong Leads: 4
  👀 Worth Checking: 3
  📋 Saved: 3
  Notified: 6
  Errors: 0

🎯 Top Discovered Leads:
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

1. 🔥 Hot Lead 8.5/10 - Looking for developer to build my SaaS MVP - $2k budget
   Source: r/forhire | ⬆️ 5 | 💬 3 📱 Notified
   Intent: need a developer, budget, mvp
   https://reddit.com/r/forhire/...

2. ⭐ Strong Lead 7.2/10 - Need someone to automate our Excel processes
   Source: r/smallbusiness | ⬆️ 12 | 💬 8 📱 Notified
   Intent: need automation, automate my
   https://reddit.com/r/smallbusiness/...

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

✅ Discovery complete! Check /admin/discovered-leads to manage leads.
```

---

## Quick Reference

| Task | Command |
|------|---------|
| Discover all sources | `php artisan leads:discover` |
| Reddit only | `php artisan leads:discover --sources=reddit` |
| With notifications | `php artisan leads:discover --notify` |
| **Full sync to production** | `php artisan leads:discover --notify --sync-to-production` |
| Check lead count | `php artisan tinker --execute="echo App\Models\DiscoveredLead::count();"` |
| Check hot leads | `php artisan tinker --execute="App\Models\DiscoveredLead::hotLeads()->get();"` |
| View crontab | `crontab -l` |
| Check cron logs | `tail -f storage/logs/lead-finder-cron.log` |

---

## File Structure

```
app/
├── Contracts/
│   └── LeadSourceInterface.php
├── Console/Commands/
│   └── DiscoverLeads.php
├── Http/
│   ├── Controllers/Api/
│   │   └── DiscoveredLeadSyncController.php
│   └── Middleware/
│       └── ValidateLeadSyncToken.php
├── Models/
│   └── DiscoveredLead.php
└── Services/
    └── LeadFinder/
        ├── LeadFinderService.php
        ├── LeadScorer.php
        ├── LeadSourceFactory.php
        └── Sources/
            ├── RedditLeadSource.php
            └── HackerNewsLeadSource.php

config/
└── lead_finder.php

docs/
└── LEAD_FINDER.md
```

---

## Future Enhancements

- [x] **Filament Admin Resource** - Manage leads in admin panel ✅
- [x] **Automatic Cleanup** - Prevent database bloat ✅
- [ ] **Twitter/X Integration** - Monitor for freelance opportunities
- [ ] **Upwork/Freelancer Monitoring** - Job board scraping
- [ ] **AI Reply Drafts** - Auto-generate personalized reply drafts
- [ ] **Lead Scoring History** - Track score changes over time
- [ ] **Conversion Analytics** - Track lead → client conversion rate

---

**Status**: ✅ System is production ready!

**Your Workflow:**
1. Cron runs every 2 hours
2. Receive instant Telegram alerts for high-scoring leads
3. Review lead, check suggested approach
4. Reply promptly (fresher = higher response rate)
5. Update status in admin panel as you progress
