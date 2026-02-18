import { test, expect } from '../fixtures/tool-page';

const SLUG = 'random-emoji-generator';

test.describe('Random Emoji Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('generate button produces emojis', async ({ page }) => {
    await page.click('#btn-generate');
    const output = await page.inputValue('#emoji-output');
    expect(output.length).toBeGreaterThan(0);
  });

  test('generates different results on subsequent clicks', async ({ page }) => {
    await page.click('#btn-generate');
    const first = await page.inputValue('#emoji-output');

    let foundDifferent = false;
    for (let i = 0; i < 5; i++) {
      await page.click('#btn-generate');
      const next = await page.inputValue('#emoji-output');
      if (next !== first) {
        foundDifferent = true;
        break;
      }
    }
    expect(foundDifferent).toBe(true);
  });

  test('category filter changes emoji pool', async ({ page }) => {
    await page.selectOption('#emoji-category', 'flags');
    await page.click('#btn-generate');
    const output = await page.inputValue('#emoji-output');
    expect(output.length).toBeGreaterThan(0);

    // Stats should show Flags category
    const categoryText = await page.textContent('#stat-category');
    expect(categoryText).toContain('Flags');
  });

  test('quantity control limits output count', async ({ page }) => {
    await page.fill('#emoji-count', '5');
    await page.selectOption('#emoji-separator', 'newline');
    await page.click('#btn-generate');
    const output = await page.inputValue('#emoji-output');
    const lines = output.split('\n').filter((l: string) => l.length > 0);
    expect(lines.length).toBe(5);
  });

  test('sample button loads data and generates', async ({ page }) => {
    await page.click('#btn-sample');
    const output = await page.inputValue('#emoji-output');
    expect(output.length).toBeGreaterThan(0);
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-clear');
    const output = await page.inputValue('#emoji-output');
    expect(output).toBe('');
  });

  test('stats bar appears after generation', async ({ page }) => {
    await expect(page.locator('#stats-bar')).toBeHidden();
    await page.click('#btn-generate');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('copy button works when output exists', async ({ page }) => {
    // Grant clipboard permissions
    await page.context().grantPermissions(['clipboard-read', 'clipboard-write']);
    await page.click('#btn-generate');
    await page.click('#btn-copy');
    // Verify success feedback (button text changes to "Copied!")
    await expect(page.locator('#btn-copy')).toContainText('Copied', { timeout: 3000 });
  });
});
