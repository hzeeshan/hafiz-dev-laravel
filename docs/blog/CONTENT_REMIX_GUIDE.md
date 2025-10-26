# Content Remix - Quick Decision Guide

**Quick reference for choosing the right content type and remix style.**

---

## 🎯 Quick Rules

### For Technical Content (Laravel, PHP, Dev Tools)
```
Content Type: technical
Remix Style: deep_dive
→ Full code examples, step-by-step tutorials
```

### For Non-Technical Content (Everything Else)
```
Content Type: opinion
Remix Style: commentary
→ Personal experience, no forced code
```

---

## 📋 Quick Reference Card

| Source Content | Content Type | Remix Style | Code? |
|----------------|--------------|-------------|-------|
| **PHP/Laravel Tutorial** | `technical` | `deep_dive` | ✅ YES |
| **Productivity Tips** | `opinion` | `commentary` | ❌ NO |
| **Self-Help Article** | `opinion` | `commentary` | ❌ NO |
| **Entrepreneur Story** | `opinion` | `commentary` | ❌ NO |
| **Indie Hacking** | `opinion` | `commentary` | ❌ NO |
| **Freelancing Tips** | `opinion` | `commentary` | ❌ NO |
| **Business/Growth** | `opinion` | `summary` | ❌ NO |
| **Book Summary** | `opinion` | `summary` | ❌ NO |
| **Laravel Release** | `news` | `summary` | ⚠️ MINIMAL |
| **Technical Debate** | `opinion` | `response` | ⚠️ OPTIONAL |

---

## 🎨 Remix Styles Explained

### Commentary
**Best for:** Adding your personal perspective
**Use when:** You have relevant experience to share
**Output:** "After building StudyLab, here's what I learned..."

### Deep Dive
**Best for:** Expanding technical concepts
**Use when:** Source is high-level, you want detailed tutorial
**Output:** "Let's implement this step-by-step with Laravel code..."

### Summary
**Best for:** Long articles (3000+ words)
**Use when:** You want to extract key insights
**Output:** "I distilled this to 3 core principles..."

### Response
**Best for:** Providing alternative approach
**Use when:** You disagree or have different solution
**Output:** "I respectfully disagree. Here's my approach..."

---

## ✅ Content Type Rules

### Technical
- ✅ Full code examples
- ✅ Step-by-step implementation
- ✅ Commands, configs, architecture

### Opinion
- ✅ Personal experiences
- ✅ Storytelling
- ❌ No forced code (only if naturally relevant)

### News
- ✅ Brief and factual
- ⚠️ Minimal code (install commands only)

---

## 📝 Example Workflows

### Example 1: Medium Self-Help Article
```
Title: [Leave empty - AI generates]
Content Type: opinion
Generation Mode: Blog Post Remix
Source: [Paste article]
Remix Style: commentary
Source Type: medium
```
**Result:** Personal blog post, no code, ~2000 words

### Example 2: YouTube PHP Tutorial
```
Title: [Leave empty]
Content Type: technical
Generation Mode: YouTube Video Analysis
Source: [Paste transcript]
Remix Style: deep_dive
Source Type: youtube
```
**Result:** Detailed tutorial with Laravel code, ~2500 words

### Example 3: Long Startup Article
```
Title: [Leave empty]
Content Type: opinion
Generation Mode: Blog Post Remix
Source: [Paste article]
Remix Style: summary
Source Type: blog_post
```
**Result:** 3-5 key insights, personal take, ~1500 words

---

## ⚠️ Common Mistakes

### ❌ Wrong: Technical for Self-Help
```
Content Type: technical  // Don't use for non-technical content!
Remix Style: commentary
```
**Problem:** AI will force code into productivity tips

### ❌ Wrong: Deep Dive for Everything
```
Remix Style: deep_dive  // Only for technical expansion!
```
**Problem:** Works best with technical content, overkill for simple tips

---

## 💡 Golden Rule

**If in doubt:**
- **Has code?** → `technical` + `deep_dive`
- **No code?** → `opinion` + `commentary`

---

**Last Updated:** October 26, 2025
