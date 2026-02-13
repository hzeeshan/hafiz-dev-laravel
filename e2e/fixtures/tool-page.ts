import { test as base, expect, type Page } from '@playwright/test';
import { getToolUrl } from '../helpers/tool-registry';

/**
 * ToolPage — Reusable fixture for testing tool pages.
 *
 * Provides navigation (locale-aware) and shared assertions for
 * SEO, structure, schemas, and console errors.
 */
export class ToolPage {
  constructor(
    public readonly page: Page,
    public readonly locale: 'en' | 'it',
  ) {}

  /** Navigate to a tool page. Resolves the correct URL based on locale. */
  async goto(slug: string, italianSlug?: string) {
    const url = getToolUrl(slug, this.locale, italianSlug);
    const response = await this.page.goto(url);
    expect(response?.status()).toBe(200);
  }

  // --- SEO Assertions ---

  async expectValidTitle() {
    const title = await this.page.title();
    expect(title).toBeTruthy();
    expect(title.length).toBeGreaterThan(10);
    expect(title).toContain('hafiz.dev');
  }

  async expectMetaDescription() {
    const desc = await this.page
      .locator('meta[name="description"]')
      .getAttribute('content');
    expect(desc).toBeTruthy();
    expect(desc!.length).toBeGreaterThan(50);
  }

  async expectCanonicalUrl() {
    const canonical = await this.page
      .locator('link[rel="canonical"]')
      .getAttribute('href');
    expect(canonical).toBeTruthy();
    // In dev, canonical uses localhost; in production, hafiz.dev
    expect(canonical).toMatch(/\/tools\/|\/strumenti\//);
  }

  // --- JSON-LD Schema Assertions ---

  async expectJsonLdSchema(type: string) {
    const scripts = this.page.locator('script[type="application/ld+json"]');
    const count = await scripts.count();
    let found = false;

    for (let i = 0; i < count; i++) {
      const text = await scripts.nth(i).textContent();
      if (!text) continue;
      // Parse the JSON and check @type (handles both minified and pretty-printed)
      try {
        const json = JSON.parse(text);
        if (json['@type'] === type) {
          found = true;
          break;
        }
      } catch {
        // Skip unparseable scripts
      }
    }

    expect(found, `Expected JSON-LD schema of type "${type}"`).toBe(true);
  }

  // --- Structure Assertions ---

  async expectH1() {
    const h1 = this.page.locator('h1');
    await expect(h1).toBeVisible();
    const text = await h1.textContent();
    expect(text!.trim().length).toBeGreaterThan(0);
  }

  async expectBreadcrumbs() {
    const nav = this.page.locator('nav[aria-label="Breadcrumb"]');
    await expect(nav).toBeVisible();
  }

  async expectFaqSection() {
    const details = this.page.locator('details');
    expect(await details.count()).toBeGreaterThanOrEqual(1);
  }

  async expectFeaturesSection() {
    const featureHeadings = this.page.locator('h3');
    expect(await featureHeadings.count()).toBeGreaterThanOrEqual(2);
  }

  async expectNoConsoleErrors() {
    const errors: string[] = [];
    this.page.on('console', (msg) => {
      if (msg.type() === 'error') {
        errors.push(msg.text());
      }
    });
    // Give scripts time to execute
    await this.page.waitForTimeout(500);
    // Filter benign errors (favicon 404, etc.)
    const realErrors = errors.filter(
      (e) => !e.includes('favicon') && !e.includes('404') && !e.includes('the server responded with a status of 404'),
    );
    expect(realErrors).toEqual([]);
  }
}

/** Extended test fixture that provides a locale-aware ToolPage instance. */
export const test = base.extend<{ toolPage: ToolPage }>({
  toolPage: async ({ page }, use, testInfo) => {
    const locale = testInfo.project.name as 'en' | 'it';
    const toolPage = new ToolPage(page, locale);
    await use(toolPage);
  },
});

export { expect };
