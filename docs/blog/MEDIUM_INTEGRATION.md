# Medium Integration

**Status**: ⚠️ **API UNAVAILABLE** (Code Ready, Awaiting API Access)
**Date**: October 29, 2025

---

## ⚠️ Critical Notice

**Medium closed their API to new integrations on January 1, 2025.**

This integration is fully implemented but **cannot be used** unless:
- Medium reopens their API (unlikely)
- You have a pre-2025 integration token
- A third-party service provides API access

**Current Recommendation**: Use Dev.to and Hashnode (both have active APIs) for automated cross-posting.

---

## What's Implemented

The following files are ready to use if the API becomes available:

### Service Layer
- **MediumService** (`app/Services/Publishing/MediumService.php`)
  - REST API client for Medium API v1
  - Canonical URL support
  - Featured image workaround (embeds as first image in markdown)
  - Tag preparation (max 3 tags)
  - User ID caching (24 hours)

### Queue Job
- **PublishToMediumJob** (`app/Jobs/PublishToMediumJob.php`)
  - 3 retry attempts with exponential backoff (60s, 120s, 180s)
  - Handles failures gracefully
  - Publication tracking

### Configuration
- **Services config** (`config/services.php`)
- **Environment variables** (`.env.example`)

---

## Key Limitations

1. **No Update Support** - Can only publish once, cannot edit via API
2. **No Featured Image API** - Workaround: embeds image at top of content
3. **Max 3 Tags** - Automatically sliced from your tag list
4. **API Deprecated** - Could break without notice

---

## Why Keep This Code?

- Portfolio/reference documentation
- Ready to use if API reopens
- Demonstrates REST API integration patterns
- Helps users with existing tokens

---

## Setup Instructions (If You Have a Token)

1. Get integration token from: https://medium.com/me/settings/security
2. Add to `.env`:
   ```bash
   MEDIUM_INTEGRATION_TOKEN=your_token_here
   MEDIUM_USER_ID=your_user_id_here  # Optional
   ```
3. Add Medium action to Filament (follow Dev.to/Hashnode pattern)
4. Test with a published post

---

## Architecture

Follows the same pattern as Dev.to and Hashnode:

```
Filament Admin Action
    ↓
PublishToMediumJob (Queue)
    ↓
MediumService::publish()
    ↓
Medium API v1
    ↓
PostPublication tracking
```

---

## API Endpoints

**Base URL**: `https://api.medium.com/v1`

### Get User ID
```bash
GET /v1/me
Authorization: Bearer {token}
```

### Create Post
```bash
POST /v1/users/{userId}/posts
Authorization: Bearer {token}
Content-Type: application/json

{
  "title": "Post Title",
  "contentFormat": "markdown",
  "content": "Post content...",
  "canonicalUrl": "https://hafiz.dev/blog/slug",
  "tags": ["tag1", "tag2", "tag3"],
  "publishStatus": "public"
}
```

---

## Resources

- **API Documentation** (archived): https://github.com/Medium/medium-api-docs
- **Integration Tokens**: https://medium.com/me/settings/security (only for pre-2025 users)
- **Alternative Platforms**: Dev.to, Hashnode (both have active APIs)

---

**Last Updated**: October 29, 2025
