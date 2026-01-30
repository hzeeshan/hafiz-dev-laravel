# IndexNow & Bing Webmaster Tools Setup

**Date:** January 30, 2026
**Status:** Implemented - Awaiting API Key Configuration
**Purpose:** Instant search engine indexing for faster content discovery

---

## Overview

This document covers the setup of:
1. **Bing Webmaster Tools** - Monitor your site in Bing/Yahoo/DuckDuckGo
2. **IndexNow** - Instant notifications to search engines when content changes

### Why Use These Tools?

| Tool | Benefit |
|------|---------|
| **Bing Webmaster Tools** | Monitor 3-4% of search traffic (Bing, Yahoo, DuckDuckGo, Ecosia) |
| **IndexNow** | Instant indexing instead of waiting days/weeks for crawlers |

---

## Part 1: Bing Webmaster Tools Setup

### Step 1: Create Account

1. Go to: https://www.bing.com/webmasters
2. Sign in with Microsoft, Google, or Facebook account

### Step 2: Import from Google Search Console (Recommended)

Since you already have Google Search Console set up:

1. Click **"Import"** on the My Sites page
2. Sign in with your Google account
3. Click **"Allow"** to give Bing access to your verified sites
4. Select **hafiz.dev** from the list
5. Click **"Import"**

**Benefits of Import Method:**
- Automatic verification (no DNS/meta tag needed)
- Imports existing sitemaps
- Takes 2 minutes

### Step 3: Wait for Data

- Site will be automatically verified
- Data appears within 48 hours
- Bing will start crawling your sitemap

---

## Part 2: IndexNow Setup

IndexNow is already implemented in the codebase. You just need to configure the API key.

### Step 1: Generate IndexNow API Key

1. Go to: https://www.bing.com/indexnow/getstarted
2. Click "Get Started"
3. Generate a new API key (32-character alphanumeric string)
4. Copy the key

### Step 2: Add API Key to Environment

Add to your `.env` file:

```bash
# IndexNow Configuration
INDEXNOW_ENABLE_SUBMISSIONS=true
INDEXNOW_API_KEY=your_32_character_api_key_here
```

### Step 3: Verify Configuration

```bash
# Check IndexNow status
php artisan indexnow:status

# Should show:
# API Key: Valid
# Submissions enabled: Yes
```

### Step 4: Deploy to Production

After deploying, verify the key file is accessible:

```
https://hafiz.dev/{your-api-key}.txt
```

The package automatically creates a route for this.

---

## How It Works

### Automatic Notifications

When you publish or update a blog post, the system automatically:

1. **Post Observer** detects the change
2. **IndexNowService** sends the URL to search engines
3. **Bing/Yandex** receive instant notification
4. **Faster indexing** - minutes instead of days

### Trigger Points

| Action | What Gets Submitted |
|--------|---------------------|
| Post published | Post URL + Blog index |
| Post updated (content changed) | Post URL + Blog index |
| Manual command | Specified URLs |

### Files Involved

```
app/
├── Services/
│   └── IndexNowService.php      # Core service for submissions
├── Observers/
│   └── PostObserver.php         # Auto-triggers on post changes
├── Console/Commands/
│   └── IndexNowSubmit.php       # Manual submission command
└── Providers/
    └── AppServiceProvider.php   # Registers the observer

config/
└── indexnow.php                 # Package configuration
```

---

## Manual Submission Commands

### Submit All Published Posts

Useful for initial setup or after major changes:

```bash
php artisan indexnow:submit --all
```

### Submit Specific URL

```bash
php artisan indexnow:submit --url=https://hafiz.dev/blog/my-post
```

### Submit Specific Post

```bash
# By ID
php artisan indexnow:submit --post=123

# By slug
php artisan indexnow:submit --post=my-post-slug
```

### Check Status & Logs

```bash
# Check configuration status
php artisan indexnow:status

# View submission logs
php artisan indexnow:logs
```

---

## Configuration Options

### config/indexnow.php

```php
return [
    // Search engine to submit to (indexnow broadcasts to all)
    'search_engine' => 'indexnow',

    // Enable/disable logging
    'enable_logging' => true,

    // Master switch for submissions
    'enable_submissions' => env('INDEXNOW_ENABLE_SUBMISSIONS', true),

    // Your API key
    'indexnow_api_key' => env('INDEXNOW_API_KEY', null),

    // Spam protection
    'enable_spam_detection' => true,
    'spam_blocking_hours' => 24,
];
```

### Environment Variables

| Variable | Description | Default |
|----------|-------------|---------|
| `INDEXNOW_ENABLE_SUBMISSIONS` | Enable/disable submissions | `true` |
| `INDEXNOW_API_KEY` | Your IndexNow API key | `null` |

---

## Search Engines Supported

IndexNow protocol is supported by:

- **Microsoft Bing** (primary)
- **Yandex** (Russia)
- **Naver** (South Korea)
- **Seznam** (Czech Republic)

When you submit to one, it's shared with all participating search engines.

**Note:** Google does NOT currently support IndexNow, but they're evaluating it. Your sitemap still handles Google indexing.

---

## Troubleshooting

### "API Key Invalid" Error

1. Verify the key is exactly 32 characters
2. Check no spaces or quotes in `.env`
3. Run `php artisan config:clear`

### Submissions Not Working

```bash
# Check status
php artisan indexnow:status

# Check logs
php artisan indexnow:logs

# Verify key file accessibility
curl https://hafiz.dev/{your-api-key}.txt
```

### Rate Limiting

If you see spam protection triggered:
- Wait 24 hours for automatic unblock
- Or check `vendor/ymigval/laravel-indexnow/storage/` for block files

---

## Monitoring

### Bing Webmaster Tools

After setup, monitor:
- **URL Inspection** - Check if specific URLs are indexed
- **Indexing Status** - See how many pages are indexed
- **Performance** - Track clicks and impressions from Bing

### Laravel Logs

IndexNow submissions are logged to `storage/logs/laravel.log`:

```
[IndexNow] URL submitted successfully {"url": "https://hafiz.dev/blog/my-post"}
[PostObserver] Notifying search engines {"post_id": 123, "slug": "my-post", "action": "published"}
```

---

## Best Practices

1. **Don't over-submit** - Only submit when content actually changes
2. **Quality content** - IndexNow speeds up indexing, not ranking
3. **Keep sitemap updated** - IndexNow complements, not replaces, sitemaps
4. **Monitor logs** - Check for errors or rate limiting

---

## Quick Start Checklist

### Bing Webmaster Tools
- [ ] Go to https://www.bing.com/webmasters
- [ ] Import site from Google Search Console
- [ ] Wait for verification (automatic)
- [ ] Verify sitemap was imported

### IndexNow
- [ ] Generate API key at https://www.bing.com/indexnow/getstarted
- [ ] Add `INDEXNOW_API_KEY=your_key` to `.env`
- [ ] Add `INDEXNOW_API_KEY=your_key` to production `.env`
- [ ] Deploy to production
- [ ] Verify with `php artisan indexnow:status`
- [ ] Test with `php artisan indexnow:submit --all`

---

## Resources

- [IndexNow Official Site](https://www.indexnow.org/)
- [Bing Webmaster Tools](https://www.bing.com/webmasters)
- [IndexNow API Documentation](https://www.indexnow.org/documentation)
- [Laravel IndexNow Package](https://github.com/ymigval/laravel-indexnow)

---

**Last Updated:** January 30, 2026
