import { test, expect } from '../fixtures/tool-page';

const SLUG = 'uuid-generator';

test.describe('UUID Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('generates UUID v4 by default', async ({ page }) => {
    await page.click('#btn-generate');

    const outputList = page.locator('#output-list');
    await expect(outputList).toBeVisible();

    const items = outputList.locator('code');
    const count = await items.count();
    expect(count).toBe(10); // default quantity is 10

    // Verify UUID v4 format (8-4-4-4-12 hex with version 4)
    const first = await items.first().textContent();
    expect(first).toMatch(/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/);
  });

  test('switches to UUID v1 and generates', async ({ page }) => {
    await page.click('#btn-uuid-v1');
    await page.click('#btn-generate');

    const items = page.locator('#output-list code');
    await expect(items.first()).toBeVisible();

    const first = (await items.first().textContent())!.trim();
    // UUID v1 format: contains version nibble 1 in the third group
    // timeLow can overflow to negative in JS, so first group may have a leading dash
    expect(first).toMatch(/-?[0-9a-f]+-[0-9a-f]{4}-1[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/);
  });

  test('switches to ULID and generates', async ({ page }) => {
    await page.click('#btn-ulid');
    await page.click('#btn-generate');

    const items = page.locator('#output-list code');
    await expect(items.first()).toBeVisible();

    const first = await items.first().textContent();
    // ULID: 26 characters, Crockford Base32
    expect(first).toMatch(/^[0-9A-ZHJKMNP-TV-Z]{26}$/i);
  });

  test('respects quantity selection', async ({ page }) => {
    await page.selectOption('#quantity-select', '5');
    await page.click('#btn-generate');

    const items = page.locator('#output-list code');
    expect(await items.count()).toBe(5);

    const countLabel = await page.textContent('#output-count');
    expect(countLabel).toBe('(5)');
  });

  test('clear button resets output', async ({ page }) => {
    await page.click('#btn-generate');
    await expect(page.locator('#output-list')).toBeVisible();

    await page.click('#btn-clear');
    await expect(page.locator('#output-placeholder')).toBeVisible();
    await expect(page.locator('#output-list')).toBeHidden();

    const countLabel = await page.textContent('#output-count');
    expect(countLabel).toBe('(0)');
  });

  test('uppercase toggle changes case', async ({ page }) => {
    await page.click('#btn-generate');
    await page.check('#uppercase-toggle');

    const first = await page.locator('#output-list code').first().textContent();
    // Should be all uppercase (hex chars + hyphens)
    expect(first).toBe(first!.toUpperCase());
  });
});
