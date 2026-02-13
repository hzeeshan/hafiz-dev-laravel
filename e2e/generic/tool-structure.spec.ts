import { test, expect } from '../fixtures/tool-page';
import { getTranslatedSlugs, ITALIAN_SLUGS } from '../helpers/tool-registry';

/**
 * Generic tool page tests — runs for all translated tools in both EN and IT.
 *
 * These tests validate structure, SEO, JSON-LD schemas, and console errors.
 * They don't test tool-specific functionality (that's in e2e/tools/*.spec.ts).
 *
 * Coverage grows automatically: translate a tool → add its slug to
 * ITALIAN_SLUGS in tool-registry.ts → these tests pick it up.
 */

const translatedSlugs = getTranslatedSlugs();

for (const slug of translatedSlugs) {
  test.describe(`${slug}`, () => {
    test('page loads without console errors', async ({ toolPage }, testInfo) => {
      const locale = testInfo.project.name as 'en' | 'it';
      if (locale === 'it' && !ITALIAN_SLUGS[slug]) {
        test.skip();
        return;
      }
      await toolPage.goto(slug);
      await toolPage.expectNoConsoleErrors();
    });

    test('has valid SEO meta tags', async ({ toolPage }, testInfo) => {
      const locale = testInfo.project.name as 'en' | 'it';
      if (locale === 'it' && !ITALIAN_SLUGS[slug]) {
        test.skip();
        return;
      }
      await toolPage.goto(slug);
      await toolPage.expectValidTitle();
      await toolPage.expectMetaDescription();
      await toolPage.expectCanonicalUrl();
    });

    test('has H1, breadcrumbs, FAQ, and features', async ({ toolPage }, testInfo) => {
      const locale = testInfo.project.name as 'en' | 'it';
      if (locale === 'it' && !ITALIAN_SLUGS[slug]) {
        test.skip();
        return;
      }
      await toolPage.goto(slug);
      await toolPage.expectH1();
      await toolPage.expectBreadcrumbs();
      await toolPage.expectFaqSection();
      await toolPage.expectFeaturesSection();
    });

    test('has valid JSON-LD schemas', async ({ toolPage }, testInfo) => {
      const locale = testInfo.project.name as 'en' | 'it';
      if (locale === 'it' && !ITALIAN_SLUGS[slug]) {
        test.skip();
        return;
      }
      await toolPage.goto(slug);
      await toolPage.expectJsonLdSchema('SoftwareApplication');
      await toolPage.expectJsonLdSchema('BreadcrumbList');
      await toolPage.expectJsonLdSchema('FAQPage');
    });
  });
}
