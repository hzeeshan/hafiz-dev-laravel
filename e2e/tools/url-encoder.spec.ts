import { test, expect } from '../fixtures/tool-page';

const SLUG = 'url-encoder';

test.describe('URL Encoder — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('encodes text using encodeURIComponent', async ({ page }) => {
    await page.fill('#url-input', 'hello world&foo=bar');

    // Auto-converts on input with debounce, wait for output
    await page.waitForTimeout(300);
    const output = await page.inputValue('#url-output');
    expect(output).toBe('hello%20world%26foo%3Dbar');
    await expect(page.locator('#success-display')).toBeVisible();
  });

  test('switches to decode mode and decodes', async ({ page }) => {
    await page.click('#tab-decode');
    await page.fill('#url-input', 'hello%20world%26foo%3Dbar');

    await page.waitForTimeout(300);
    const output = await page.inputValue('#url-output');
    expect(output).toBe('hello world&foo=bar');
    await expect(page.locator('#success-display')).toBeVisible();
  });

  test('shows error on invalid encoded string in decode mode', async ({ page }) => {
    await page.click('#tab-decode');
    await page.fill('#url-input', '%ZZ%invalid');

    await page.waitForTimeout(300);
    await expect(page.locator('#error-display')).toBeVisible();
  });

  test('swap button moves output to input and switches mode', async ({ page }) => {
    await page.fill('#url-input', 'hello world');
    await page.waitForTimeout(300);

    const encoded = await page.inputValue('#url-output');
    expect(encoded).toBe('hello%20world');

    await page.click('#btn-swap');

    const newInput = await page.inputValue('#url-input');
    expect(newInput).toBe('hello%20world');
  });

  test('clear button resets both fields', async ({ page }) => {
    await page.fill('#url-input', 'hello world');
    await page.waitForTimeout(300);
    await page.click('#btn-clear');

    expect(await page.inputValue('#url-input')).toBe('');
    expect(await page.inputValue('#url-output')).toBe('');
    await expect(page.locator('#error-display')).toBeHidden();
    await expect(page.locator('#success-display')).toBeHidden();
  });

  test('sample button loads sample data and converts', async ({ page }) => {
    await page.click('#btn-sample');

    const input = await page.inputValue('#url-input');
    expect(input.length).toBeGreaterThan(0);

    const output = await page.inputValue('#url-output');
    expect(output.length).toBeGreaterThan(0);
  });

  test('encodeURI mode preserves URL structure', async ({ page }) => {
    // Switch to encodeURI mode (radio has no ID, use name+value selector)
    await page.click('input[name="encoding-type"][value="uri"]');
    await page.fill('#url-input', 'https://example.com/search?q=hello world');

    await page.waitForTimeout(300);
    const output = await page.inputValue('#url-output');
    // encodeURI preserves : / ? = but encodes space
    expect(output).toContain('https://example.com/search?q=hello%20world');
  });

  test('character count updates on input', async ({ page }) => {
    await page.fill('#url-input', '12345');
    await page.waitForTimeout(300);
    const count = await page.textContent('#input-count');
    expect(count).toBe('5');
  });
});
