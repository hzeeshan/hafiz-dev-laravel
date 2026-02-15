import { test, expect } from '../fixtures/tool-page';

const SLUG = 'markdown-to-html';

test.describe('Markdown to HTML — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts markdown heading to HTML', async ({ page }) => {
    await page.fill('#md-input', '# Hello World');
    // Wait for debounce
    await page.waitForTimeout(500);
    await expect(page.locator('#html-preview h1')).toHaveText('Hello World');
  });

  test('sample button loads content', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#md-input');
    expect(input.length).toBeGreaterThan(0);
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('clear button resets', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-clear');
    expect(await page.inputValue('#md-input')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('source view toggle works', async ({ page }) => {
    await page.fill('#md-input', '**bold**');
    await page.waitForTimeout(500);
    await page.click('#btn-view-source');
    await expect(page.locator('#html-source')).toBeVisible();
    const source = await page.inputValue('#html-source');
    expect(source).toContain('<strong>');
  });
});
