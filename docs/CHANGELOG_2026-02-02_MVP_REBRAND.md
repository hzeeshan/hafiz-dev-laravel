# Homepage MVP Rebrand - February 2, 2026

## Summary

Major redesign of the homepage and blog post page to reposition from "Laravel Developer" to "MVP in 7 Days" service offering.

## Why

- Shift focus from technical skills to business outcomes
- Target founders and non-technical clients who need working products fast
- Clear pricing tiers to reduce friction in sales conversations
- Better conversion through trust badges and social proof

## What Changed

### Homepage (welcome.blade.php)

**Hero Section**

- New headline: "Launch Your Product in 7 Days"
- Trust badge: "9+ Years Experience"
- Dual CTAs: "Book a Free Call" (Calendly) + "See My Work"
- Trust badges row: 40+ projects, Fixed pricing, Source code ownership

**Pricing Section**

- 3 clear tiers:
    - Launch Fast (€750): Landing pages, forms, basic features
    - MVP in 7 Days (€2,000): Full web apps, database, auth, deployment
    - Full Product (€5,000): Complex apps, integrations, optimization
- Flexbox layout for equal-height cards with bottom-aligned buttons

**FAQ Section**

- Converted to collapsible accordion using native HTML `<details>`/`<summary>`
- 8 new questions covering common client concerns
- Conversational tone, removed AI-sounding em dashes

**Contact Section**

- Integrated Calendly booking links
- Removed generic contact form CTA

### Blog Post Page (blog/show.blade.php)

**CTA Box**

- New headline: "Got a Product Idea?"
- Focus on MVP building service
- Direct Calendly link for booking

**Author Bio**

- Updated description to focus on helping founders build products
- Shortened, more impactful copy

## Technical Notes

- Accordion uses native `<details>`/`<summary>` elements (no JavaScript)
- Pricing cards use `flex flex-col` + `flex-grow` + `mt-auto` for alignment
- All Calendly links point to: https://calendly.com/hafizzeeshan619/15min

## Files Modified

- `resources/views/welcome.blade.php`
- `resources/views/blog/show.blade.php`

## Competitor References

For inspiration and comparison + compatirors:

- https://rapidmvp.app/
- https://kratos.digital/
- https://www.vayuapps.com/
