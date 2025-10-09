# Image Provider Configuration

**Environment-based image generation for blog automation**

---

## Overview

The system supports two image providers that can be switched via environment variables:

| Provider | Cost/Image | Speed | Best For |
|----------|-----------|-------|----------|
| **Together.ai** | $0.003 | 2-6s | Local development |
| **Fal.ai** | $0.046 | 12-20s | Production |

**Savings**: 93% cheaper for local testing ($0.003 vs $0.046)

---

## Configuration

### .env Setup

```bash
# Image Provider (together or fal)
BLOG_IMAGE_PROVIDER=together

# API Keys
TOGETHER_API_KEY=your_key_here
FAL_API_KEY=your_key_here
```

### Switch Providers

**Local Development:**
```bash
BLOG_IMAGE_PROVIDER=together
```

**Production:**
```bash
BLOG_IMAGE_PROVIDER=fal
```

Then run:
```bash
php artisan config:clear
```

---

## Testing

### Check Provider Status
```bash
php artisan blog:test-image-providers --status
```

### Test Specific Provider
```bash
php artisan blog:test-image-providers --provider=together
php artisan blog:test-image-providers --provider=fal
```

### Test All Providers
```bash
php artisan blog:test-image-providers --all
```

---

## Usage

The system automatically uses the configured provider:

```php
// In GenerateBlogPostJob.php
$imageService = ImageServiceFactory::make(); // Auto-selects provider
$result = $imageService->generateFeaturedImage($title, $excerpt, $tags);
```

No code changes needed to switch providers!

---

## CLI Commands

### Reset Blog Topics for Re-testing

```bash
# Reset everything (delete posts, logs, reset status)
echo "yes" | php artisan blog:reset-topics --all

# Reset status only
php artisan blog:reset-topics --status=pending

# Delete posts only
php artisan blog:reset-topics --delete-posts --delete-logs
```

### Check Costs

```bash
php artisan tinker --execute="
\$logs = App\Models\BlogGenerationLog::all();
echo 'Total Cost: $' . \$logs->sum(fn(\$l) => \$l->getTotalCost()) . \"\n\";
"
```

---

## Cost Comparison

**Annual Cost (52 blog posts):**
- Together.ai: $0.16/year
- Fal.ai: $2.39/year

**Development Phase (100 test images):**
- Together.ai: $0.30
- Fal.ai: $4.60
- **Savings: $4.30 (93% cheaper)**

---

## Implementation

**Files Created:**
- `app/Contracts/ImageServiceInterface.php` - Common interface
- `app/Services/AI/TogetherImageService.php` - Together.ai implementation
- `app/Services/AI/FalImageService.php` - Fal.ai implementation (updated)
- `app/Services/AI/ImageServiceFactory.php` - Provider factory
- `app/Console/Commands/TestImageProviders.php` - Testing tool
- `app/Console/Commands/ResetBlogTopics.php` - Reset tool

**Architecture:**
```
ImageServiceFactory::make()
    ↓
Reads BLOG_IMAGE_PROVIDER from .env
    ↓
Returns TogetherImageService or FalImageService
```

---

## Quick Reference

| Task | Command |
|------|---------|
| Check status | `php artisan blog:test-image-providers --status` |
| Test provider | `php artisan blog:test-image-providers --provider=together` |
| Switch to Together.ai | Set `BLOG_IMAGE_PROVIDER=together` in .env |
| Switch to Fal.ai | Set `BLOG_IMAGE_PROVIDER=fal` in .env |
| Clear config | `php artisan config:clear` |
| Reset topics | `echo "yes" \| php artisan blog:reset-topics --all` |

---

**Status**: ✅ Production Ready
**Test Results**: ✅ 2.59s generation, $0.003 cost
**Implementation Date**: October 9, 2025
