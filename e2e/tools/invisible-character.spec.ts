import { test, expect } from '../fixtures/tool-page';

const SLUG = 'invisible-character';

test.describe('Invisible Character — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('generates invisible characters with default settings', async ({ page }) => {
    await page.click('#btn-generate');
    const output = await page.inputValue('#output-text');
    expect(output.length).toBeGreaterThan(0);
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('generates multiple invisible characters', async ({ page }) => {
    await page.fill('#repeat-count', '5');
    await page.click('#btn-generate');
    const output = await page.inputValue('#output-text');
    expect(output.length).toBe(5);
  });

  test('generates characters with newline separator', async ({ page }) => {
    await page.fill('#repeat-count', '3');
    await page.check('#opt-newline');
    await page.click('#btn-generate');
    const output = await page.inputValue('#output-text');
    // 3 characters separated by 2 newlines = 5 total characters
    expect(output.length).toBe(5);
    expect(output).toContain('\n');
  });

  test('sample button loads data', async ({ page }) => {
    await page.click('#btn-sample');
    const output = await page.inputValue('#output-text');
    expect(output.length).toBeGreaterThan(0);
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-clear');
    const output = await page.inputValue('#output-text');
    expect(output).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('copy button shows error when output is empty', async ({ page }) => {
    await page.click('#btn-copy');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('inspect button shows error when output is empty', async ({ page }) => {
    await page.click('#btn-inspect');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('inspect button analyzes text', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-inspect');
    await expect(page.locator('#inspect-results')).toBeVisible();
    const inspectContent = await page.textContent('#inspect-output');
    expect(inspectContent).toContain('U+');
  });

  test('stats bar shows after generation', async ({ page }) => {
    await page.click('#btn-generate');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('character table has copy buttons', async ({ page }) => {
    const copyButtons = page.locator('[data-copy-char]');
    expect(await copyButtons.count()).toBe(8);
  });

  test('changing character type generates different characters', async ({ page }) => {
    // Generate with default (hangul)
    await page.click('#btn-generate');
    const output1 = await page.inputValue('#output-text');

    // Change to braille and generate
    await page.selectOption('#char-type', 'braille');
    await page.click('#btn-generate');
    const output2 = await page.inputValue('#output-text');

    // Both outputs are invisible characters but different Unicode code points
    expect(output1).not.toBe(output2);
  });

  test('download button shows error when output is empty', async ({ page }) => {
    await page.click('#btn-download');
    await expect(page.locator('#error-notification')).toBeVisible();
  });
});
