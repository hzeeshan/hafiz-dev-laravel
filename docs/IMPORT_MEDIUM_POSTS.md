# Importing Medium Posts - Production Guide

**Last Updated:** Oct 6, 2025

---

## Prerequisites

- Medium export data folder: `medium-exported-data/posts/` (contains HTML files)
- SSH access to production server
- Database backup completed

---

## Step 1: Backup Database (IMPORTANT!)

```bash
# Create a backup before importing
php artisan backup:run
# Or manually backup your database
```

---

## Step 2: Upload Medium Export Data

**Option A: Via Git (if committed)**
```bash
# Already included in repo, just pull
git pull origin main
```

**Option B: Via SCP (if not in Git)**
```bash
# From your local machine
scp -r medium-exported-data user@your-server.com:/path/to/hafiz-dev-laravel/
```

**Option C: Via Forge/Server Panel**
- Upload the `medium-exported-data` folder to project root
- Ensure it contains the `posts` folder with HTML files

---

## Step 3: Import Posts (as Draft)

```bash
# Import all Medium posts as DRAFT status
php artisan import:medium

# Expected output:
# Found 35 posts to import
# Import complete!
# Imported: 35
# Skipped: 0
```

**What this does:**
- Imports all posts from `medium-exported-data/posts/*.html`
- Sets status to **draft** (not visible on blog yet)
- Keeps original publish dates from Medium
- Auto-generates slugs, tags, and reading times
- Extracts featured images

---

## Step 4: Download Images

```bash
# Download and save images locally
php artisan download:medium-images

# Expected output:
# Processing X posts...
# Download complete!
# Images downloaded: XX
```

**What this does:**
- Downloads all Medium CDN images
- Saves to `storage/app/public/blog-images/`
- Updates post records with local image paths
- Some images may fail (Medium blocks them) - this is normal

---

## Step 5: Verify Import

```bash
# Check how many posts were imported
php artisan tinker --execute="echo 'Draft posts: ' . App\Models\Post::where('status', 'draft')->count();"

# List imported post titles
php artisan tinker --execute="App\Models\Post::where('status', 'draft')->orderBy('published_at')->get(['title'])->each(function(\$p) { echo '- ' . \$p->title . PHP_EOL; });"
```

---

## Step 6: Review Posts in Filament Admin

1. Go to `/admin/posts`
2. Filter by: **Status = Draft**
3. Review each post:
   - ✅ Check title and content
   - ✅ Verify featured image is present
   - ✅ Add missing images if needed
   - ✅ Fix any formatting issues
   - ✅ Check tags are relevant

---

## Step 7: Publish Posts

**Option A: Publish All at Once**
```bash
# Publish all draft posts
php artisan tinker --execute="App\Models\Post::where('status', 'draft')->update(['status' => 'published']); echo 'All posts published!';"
```

**Option B: Publish Individually (Recommended)**
- In Filament admin, edit each post
- Change status from **Draft** to **Published**
- Save
- This gives you full control over what goes live

---

## Troubleshooting

### Issue: "Posts directory not found"
```bash
# Check if folder exists
ls -la medium-exported-data/posts/

# If missing, upload the folder or check path
```

### Issue: "Already exists" errors
```bash
# Posts with same slug already exist
# Either delete old posts or skip duplicates
```

### Issue: Images not downloading
- This is normal - Medium blocks some images
- Add images manually in Filament admin
- Or leave posts without featured images (they still work)

### Issue: Permission errors
```bash
# Fix storage permissions
chmod -R 775 storage/app/public/blog-images/
chown -R www-data:www-data storage/app/public/blog-images/
```

---

## Post-Import Cleanup (Optional)

### Delete Draft Posts (if you want to re-import)
```bash
php artisan tinker --execute="App\Models\Post::where('status', 'draft')->delete(); echo 'Draft posts deleted';"
```

### Delete All Medium Posts (2023 dates)
```bash
php artisan tinker --execute="App\Models\Post::whereYear('published_at', 2023)->delete(); echo 'Medium posts deleted';"
```

---

## Quick Command Reference

```bash
# Import posts (as draft)
php artisan import:medium

# Import only first 3 posts (testing)
php artisan import:medium --test

# Download images
php artisan download:medium-images

# Count draft posts
php artisan tinker --execute="echo App\Models\Post::where('status', 'draft')->count();"

# Publish all drafts
php artisan tinker --execute="App\Models\Post::where('status', 'draft')->update(['status' => 'published']);"

# Delete all drafts
php artisan tinker --execute="App\Models\Post::where('status', 'draft')->delete();"
```

---

## Notes

- **Status:** Posts import as `draft` by default (not visible on blog)
- **Dates:** Original Medium publish dates are preserved
- **Images:** Some may fail to download due to Medium's protection
- **Slugs:** Auto-generated from titles (e.g., "My Post" → "my-post")
- **Tags:** Auto-extracted from content (Laravel, PHP, Docker, etc.)
- **SEO:** Meta titles and descriptions included automatically

---

## Expected Results

After successful import:
- ✅ 35 blog posts in database (status: draft)
- ✅ Posts have titles, content, excerpts, tags
- ✅ Most posts have featured images
- ✅ Original publish dates preserved
- ✅ Posts are SEO-ready
- ✅ Reading times calculated

---

## Need Help?

If you encounter issues:
1. Check Laravel logs: `storage/logs/laravel.log`
2. Verify file permissions on `storage/app/public/`
3. Ensure `php artisan storage:link` was run
4. Check database connection settings

---

**Ready to import in production!** 🚀
