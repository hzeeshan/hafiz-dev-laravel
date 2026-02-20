import { test, expect } from '../fixtures/tool-page';

const SLUG = 'wingdings-translator';

test.describe('Wingdings Translator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('translates English text to Wingdings', async ({ page }) => {
    await page.fill('#text-input', 'Hello');
    await page.click('#btn-convert');

    const output = await page.inputValue('#text-output');
    expect(output.length).toBeGreaterThan(0);
    // Output should be different from input (Wingdings symbols)
    expect(output).not.toBe('Hello');
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads data and translates', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#text-input');
    expect(input.length).toBeGreaterThan(0);

    const output = await page.inputValue('#text-output');
    expect(output.length).toBeGreaterThan(0);
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
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

  test('stats bar appears after translation', async ({ page }) => {
    await page.fill('#text-input', 'Test text');
    await page.click('#btn-convert');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('gaster mode loads a quote and translates', async ({ page }) => {
    await page.click('#btn-gaster');
    const input = await page.inputValue('#text-input');
    expect(input.length).toBeGreaterThan(0);

    const output = await page.inputValue('#text-output');
    expect(output.length).toBeGreaterThan(0);

    // Should show success notification with Gaster quote info
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('font selector changes output', async ({ page }) => {
    await page.fill('#text-input', 'ABC');
    await page.selectOption('#wingdings-font', 'wingdings1');
    await page.click('#btn-convert');
    const output1 = await page.inputValue('#text-output');

    await page.selectOption('#wingdings-font', 'wingdings2');
    await page.click('#btn-convert');
    const output2 = await page.inputValue('#text-output');

    // Different fonts should produce different outputs
    expect(output1).not.toBe(output2);
  });

  test('direction toggle changes labels', async ({ page }) => {
    // Default: English to Wingdings
    await expect(page.locator('#input-label')).toHaveText('Your Text');
    await expect(page.locator('#output-label')).toHaveText('Wingdings Output');

    // Switch to Wingdings to English
    await page.selectOption('#translate-direction', 'to-english');
    await expect(page.locator('#input-label')).toHaveText('Wingdings Input');
    await expect(page.locator('#output-label')).toHaveText('English Output');
  });
});
