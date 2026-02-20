import { test, expect } from '../fixtures/tool-page';

const SLUG = 'underline-text-generator';

test.describe('Underline Text Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts text to single underlined text on input', async ({ page }) => {
    await page.fill('#text-input', 'Hello');
    // Wait for real-time conversion
    await page.waitForTimeout(100);

    const output = await page.inputValue('#text-output');
    // Each character should have combining underline U+0332
    expect(output).toContain('\u0332');
    expect(output.length).toBeGreaterThan(5);
  });

  test('converts text to double underlined text', async ({ page }) => {
    // Select double underline style
    await page.click('input[name="style"][value="double"]');
    await page.fill('#text-input', 'Hello');
    await page.waitForTimeout(100);

    const output = await page.inputValue('#text-output');
    // Each character should have combining double underline U+0333
    expect(output).toContain('\u0333');
    expect(output.length).toBeGreaterThan(5);
  });

  test('switching styles re-converts text', async ({ page }) => {
    await page.fill('#text-input', 'Test');
    await page.waitForTimeout(100);

    const singleOutput = await page.inputValue('#text-output');
    expect(singleOutput).toContain('\u0332');

    // Switch to double
    await page.click('input[name="style"][value="double"]');
    await page.waitForTimeout(100);

    const doubleOutput = await page.inputValue('#text-output');
    expect(doubleOutput).toContain('\u0333');
    expect(doubleOutput).not.toContain('\u0332');
  });

  test('sample button loads data', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#text-input');
    expect(input.length).toBeGreaterThan(0);

    // Output should also be populated (real-time conversion)
    const output = await page.inputValue('#text-output');
    expect(output.length).toBeGreaterThan(0);
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await page.waitForTimeout(100);
    await page.click('#btn-clear');

    const input = await page.inputValue('#text-input');
    expect(input).toBe('');

    const output = await page.inputValue('#text-output');
    expect(output).toBe('');

    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('copy button shows error when output is empty', async ({ page }) => {
    await page.click('#btn-copy');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('stats bar shows after conversion', async ({ page }) => {
    await expect(page.locator('#stats-bar')).toBeHidden();

    await page.fill('#text-input', 'Hello World');
    await page.waitForTimeout(100);

    await expect(page.locator('#stats-bar')).toBeVisible();
    const chars = await page.textContent('#stat-chars');
    expect(chars).toBe('11');
  });

  test('download button shows error when output is empty', async ({ page }) => {
    await page.click('#btn-download');
    await expect(page.locator('#error-notification')).toBeVisible();
  });
});
