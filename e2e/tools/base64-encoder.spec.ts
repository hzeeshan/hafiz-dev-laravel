import { test, expect } from '../fixtures/tool-page';

const SLUG = 'base64-encoder';

test.describe('Base64 Encoder — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('encodes text to Base64', async ({ page }) => {
    await page.fill('#base64-input', 'Hello, World!');
    await page.click('#btn-encode');

    const output = await page.inputValue('#base64-output');
    expect(output).toBe('SGVsbG8sIFdvcmxkIQ==');
    await expect(page.locator('#success-display')).toBeVisible();
  });

  test('decodes Base64 to text', async ({ page }) => {
    await page.fill('#base64-input', 'SGVsbG8sIFdvcmxkIQ==');
    await page.click('#btn-decode');

    const output = await page.inputValue('#base64-output');
    expect(output).toBe('Hello, World!');
    await expect(page.locator('#success-display')).toBeVisible();
  });

  test('shows error on empty encode', async ({ page }) => {
    await page.click('#btn-encode');
    await expect(page.locator('#error-display')).toBeVisible();
  });

  test('shows error on empty decode', async ({ page }) => {
    await page.click('#btn-decode');
    await expect(page.locator('#error-display')).toBeVisible();
  });

  test('shows error on invalid Base64 decode', async ({ page }) => {
    await page.fill('#base64-input', '!!!not-valid-base64!!!');
    await page.click('#btn-decode');
    await expect(page.locator('#error-display')).toBeVisible();
  });

  test('swap button exchanges input and output', async ({ page }) => {
    await page.fill('#base64-input', 'Hello');
    await page.click('#btn-encode');
    const encoded = await page.inputValue('#base64-output');

    await page.click('#btn-swap');

    const newInput = await page.inputValue('#base64-input');
    expect(newInput).toBe(encoded);
  });

  test('clear button resets both fields', async ({ page }) => {
    await page.fill('#base64-input', 'Hello');
    await page.click('#btn-encode');
    await page.click('#btn-clear');

    expect(await page.inputValue('#base64-input')).toBe('');
    expect(await page.inputValue('#base64-output')).toBe('');
    await expect(page.locator('#error-display')).toBeHidden();
    await expect(page.locator('#success-display')).toBeHidden();
  });

  test('sample button loads sample text', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#base64-input');
    expect(input.length).toBeGreaterThan(0);
  });

  test('character count updates on input', async ({ page }) => {
    await page.fill('#base64-input', '12345');
    const count = await page.textContent('#input-count');
    expect(count).toBe('5');
  });
});
