import { test, expect } from '../fixtures/tool-page';

const SLUG = 'diff-checker';

test.describe('Diff Checker — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('sample button loads data and triggers comparison', async ({ page }) => {
    await page.click('#btn-sample');

    const original = await page.inputValue('#original-text');
    const modified = await page.inputValue('#modified-text');
    expect(original.length).toBeGreaterThan(0);
    expect(modified.length).toBeGreaterThan(0);

    // Diff output should be visible after sample loads (auto-compares)
    await expect(page.locator('#diff-output')).toBeVisible();
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('compare button shows diff output', async ({ page }) => {
    await page.fill('#original-text', 'hello world');
    await page.fill('#modified-text', 'hello there');
    await page.click('#btn-compare');

    await expect(page.locator('#diff-output')).toBeVisible();
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('identical texts show no-diff message', async ({ page }) => {
    await page.fill('#original-text', 'same text');
    await page.fill('#modified-text', 'same text');
    await page.click('#btn-compare');

    await expect(page.locator('#no-diff-message')).toBeVisible();
    await expect(page.locator('#diff-output')).toBeHidden();
  });

  test('swap button exchanges texts', async ({ page }) => {
    await page.fill('#original-text', 'original');
    await page.fill('#modified-text', 'modified');
    await page.click('#btn-swap');

    expect(await page.inputValue('#original-text')).toBe('modified');
    expect(await page.inputValue('#modified-text')).toBe('original');
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-clear');

    expect(await page.inputValue('#original-text')).toBe('');
    expect(await page.inputValue('#modified-text')).toBe('');
    await expect(page.locator('#diff-output')).toBeHidden();
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('view mode toggle switches between side-by-side and inline', async ({ page }) => {
    await page.click('#btn-sample');

    // Should start in side-by-side
    await expect(page.locator('#diff-side-by-side')).toBeVisible();
    await expect(page.locator('#diff-inline')).toBeHidden();

    // Switch to inline
    await page.click('#btn-inline');
    await expect(page.locator('#diff-inline')).toBeVisible();
    await expect(page.locator('#diff-side-by-side')).toBeHidden();

    // Switch back to side-by-side
    await page.click('#btn-side-by-side');
    await expect(page.locator('#diff-side-by-side')).toBeVisible();
    await expect(page.locator('#diff-inline')).toBeHidden();
  });
});
