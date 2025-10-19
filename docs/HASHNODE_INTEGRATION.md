# Hashnode Integration Guide

## Overview

Hashnode integration allows you to cross-post your blog articles from hafiz.dev to Hashnode with automatic canonical URL attribution.

## Features

- ✅ One-click publishing from Filament admin
- ✅ GraphQL API integration
- ✅ Automatic canonical URLs (points to hafiz.dev)
- ✅ Featured image support
- ✅ Tag conversion (up to 5 tags)
- ✅ Update support (republish to update existing posts)
- ✅ Retry mechanism (3 attempts with exponential backoff)
- ✅ Publication tracking in database
- ✅ Status indicators in admin panel

## Setup Instructions

### 1. Get Hashnode API Token

1. Go to [Hashnode Settings → Developer](https://hashnode.com/settings/developer)
2. Click "Generate New Token"
3. Give it a name (e.g., "hafiz.dev integration")
4. Copy the token (you won't see it again!)

### 2. Get Your Publication ID

#### Option A: Via Hashnode Dashboard
1. Go to your blog dashboard: `https://hashnode.com/{your-username}/dashboard`
2. Click "Blog Settings" → "General"
3. Look for "Publication ID" or check the URL

#### Option B: Via GraphQL Playground
1. Go to [Hashnode GraphQL Playground](https://gql.hashnode.com)
2. Run this query (replace with your username):
```graphql
query {
  user(username: "your-username") {
    publications(first: 5) {
      edges {
        node {
          id
          title
          url
        }
      }
    }
  }
}
```

### 3. Update Environment Variables

Add these to your `.env` file:

```env
HASHNODE_API_TOKEN=your_token_here
HASHNODE_PUBLICATION_ID=your_publication_id_here
```

### 4. Start Queue Worker

Hashnode publishing runs in the background via queues:

```bash
# Option 1: Full dev environment (recommended)
composer dev

# Option 2: Just the queue worker
php artisan queue:work
```

## Usage

### Publishing from Admin Panel

1. Go to `/admin/posts`
2. Find a **published** post (status must be "published")
3. Click the **"Hashnode"** action button (orange rocket icon)
4. Confirm the publication
5. Check the "Hashnode" status column (green checkmark = published)
6. View publication details at `/admin/post-publications`

### Republishing (Updates)

If you click "Hashnode" on an already-published post:
- The existing Hashnode post will be **updated** (not duplicated)
- All content, title, tags, and images will sync
- The canonical URL remains unchanged

### Publishing via Code

```php
use App\Models\Post;
use App\Jobs\PublishToHashnodeJob;

$post = Post::where('slug', 'my-post-slug')->first();
PublishToHashnodeJob::dispatch($post);

// Process queue
php artisan queue:work --once
```

## Technical Details

### GraphQL Mutations

**Publish New Post:**
```graphql
mutation PublishPost($input: PublishPostInput!) {
  publishPost(input: $input) {
    post {
      id
      title
      url
      slug
    }
  }
}
```

**Update Existing Post:**
```graphql
mutation UpdatePost($input: UpdatePostInput!) {
  updatePost(input: $input) {
    post {
      id
      title
      url
      slug
    }
  }
}
```

### Post Input Fields

| Field | Type | Required | Description |
|-------|------|----------|-------------|
| `publicationId` | String | ✅ | Your blog's unique ID |
| `title` | String | ✅ | Post title |
| `contentMarkdown` | String | ✅ | Full content in Markdown |
| `tags` | Array | ❌ | Array of tag objects (max 5) |
| `originalArticleURL` | String | ❌ | Canonical URL (hafiz.dev) |
| `coverImageOptions` | Object | ❌ | Featured image URL |
| `subtitle` | String | ❌ | Post excerpt |
| `metaTags` | Object | ❌ | SEO title & description |

### Content Transformation

**Attribution Notice:**
Every post includes this at the top:
```markdown
> **Originally published at [hafiz.dev](https://hafiz.dev/blog/post-slug)**

---

[Your content here...]
```

**Tag Conversion:**
- Your tags → Hashnode tag objects: `{ name: "Laravel", slug: "laravel" }`
- Limited to 5 tags (Hashnode max)

**Image URLs:**
- Relative paths converted to absolute URLs
- Uses `https://hafiz.dev` in production
- Featured images set via `coverImageOptions.coverImageURL`

## Troubleshooting

### Error: "Hashnode API token is not configured"

**Fix:** Add `HASHNODE_API_TOKEN` to `.env`

### Error: "Hashnode Publication ID is not configured"

**Fix:** Add `HASHNODE_PUBLICATION_ID` to `.env`

### Error: "Post must be published before cross-posting"

**Fix:** Change post status to "published" in admin panel

### Publication Shows "Failed" Status

1. Check `/admin/post-publications` for error message
2. Check logs: `tail -f storage/logs/laravel.log`
3. Verify queue is running: `php artisan queue:work`
4. Common issues:
   - Invalid API token
   - Wrong publication ID
   - Network timeout (will auto-retry up to 3x)
   - Featured image URL not accessible

### Queue Not Processing

**Check if queue is running:**
```bash
ps aux | grep "queue:work"
```

**Manually process one job:**
```bash
php artisan queue:work --once
```

**Check failed jobs:**
```bash
php artisan queue:failed
```

### GraphQL Errors

Check the error message in publications table. Common GraphQL errors:

- **"Unauthorized"** → Invalid API token
- **"Publication not found"** → Wrong publication ID
- **"Title already exists"** → Post with same title exists (change title or update existing)

## Database Schema

Publications are tracked in the `post_publications` table:

```sql
post_id          → Links to posts.id
platform         → 'hashnode'
external_id      → Hashnode post ID
external_url     → Published URL on Hashnode
status           → 'pending' | 'published' | 'failed'
error_message    → Error details if failed
published_at     → Timestamp of successful publication
```

## API Rate Limits

Hashnode doesn't publicly document rate limits, but reasonable usage is recommended:
- Don't batch-publish 100+ posts at once
- Use queue system (already implemented)
- Retry mechanism handles temporary failures

## Comparison with Dev.to

| Feature | Dev.to | Hashnode |
|---------|--------|----------|
| API Type | REST | GraphQL |
| Max Tags | 4 | 5 |
| Update Support | ✅ Yes | ✅ Yes |
| Canonical URL | ✅ Yes | ✅ Yes (originalArticleURL) |
| Featured Image | ✅ Yes | ✅ Yes |
| Draft Mode | ✅ Yes | ✅ Yes (via createDraft mutation) |
| Rate Limits | 30/min | Undocumented |

## Files Created

```
app/
├── Services/Publishing/
│   └── HashnodeService.php          # GraphQL API client
├── Jobs/
│   └── PublishToHashnodeJob.php     # Queue job for async publishing

config/
└── services.php                      # Hashnode config (updated)

app/Filament/Resources/Posts/Tables/
└── PostsTable.php                    # Hashnode action + status column (updated)
```

## Next Steps

- Test publishing your first post to Hashnode
- Monitor publications at `/admin/post-publications`
- Verify canonical URLs are working
- Check featured images render correctly
- Consider publishing strategy (same day vs. stagger by 24-48h)

## Support

If you encounter issues:
1. Check [Hashnode API Docs](https://apidocs.hashnode.com/)
2. Use [GraphQL Playground](https://gql.hashnode.com) to test queries
3. Check logs: `storage/logs/laravel.log`
4. Review error messages in publications table

---

**Status:** ✅ Ready to use (Jan 2025)
