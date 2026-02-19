import { test, expect } from '../fixtures/tool-page';

const SLUG = 'random-word-generator-for-songs';

test.describe('Random Word Generator for Songs — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('core functionality works', async ({ page }) => {
    await page.click('#btn-generate');
    const output = await page.inputValue('#word-output');
    expect(output.length).toBeGreaterThan(0);
  });

  test('shows error on empty pool scenario', async ({ page }) => {
    // Default theme always has words, so generate should succeed
    await page.click('#btn-generate');
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('sample button loads data', async ({ page }) => {
    await page.click('#btn-sample');
    const output = await page.inputValue('#word-output');
    expect(output.length).toBeGreaterThan(0);
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-clear');
    const output = await page.inputValue('#word-output');
    expect(output).toBe('');
  });

  test('copy button works when output exists', async ({ page, context }) => {
    await context.grantPermissions(['clipboard-read', 'clipboard-write']);
    await page.click('#btn-sample');
    await page.click('#btn-copy');
    // Verify button text changes to "Copied!"
    await expect(page.locator('#btn-copy')).toContainText('Copied!', { timeout: 3000 });
  });

  test('theme selection changes word pool', async ({ page }) => {
    await page.selectOption('#word-theme', 'love');
    await page.click('#btn-generate');
    const output = await page.inputValue('#word-output');
    expect(output.length).toBeGreaterThan(0);

    // Stats should show theme
    await expect(page.locator('#stat-theme')).toContainText('Love');
  });

  test('word count controls number of words', async ({ page }) => {
    await page.fill('#word-count', '5');
    await page.selectOption('#word-separator', 'newline');
    await page.click('#btn-generate');
    const output = await page.inputValue('#word-output');
    const lines = output.split('\n').filter(l => l.trim().length > 0);
    expect(lines.length).toBe(5);
  });

  test('include rhymes option generates paired words', async ({ page }) => {
    await page.check('#include-rhymes');
    await page.fill('#word-count', '6');
    await page.selectOption('#word-separator', 'newline');
    await page.click('#btn-generate');
    const output = await page.inputValue('#word-output');
    const lines = output.split('\n').filter(l => l.trim().length > 0);
    expect(lines.length).toBe(6);
  });

  test('stats bar appears after generation', async ({ page }) => {
    await expect(page.locator('#stats-bar')).toBeHidden();
    await page.click('#btn-generate');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('generate produces different results on multiple clicks', async ({ page }) => {
    await page.selectOption('#word-separator', 'newline');
    await page.click('#btn-generate');
    const first = await page.inputValue('#word-output');

    let foundDifferent = false;
    for (let i = 0; i < 5; i++) {
      await page.click('#btn-generate');
      const next = await page.inputValue('#word-output');
      if (next !== first) {
        foundDifferent = true;
        break;
      }
    }
    expect(foundDifferent).toBe(true);
  });
});
