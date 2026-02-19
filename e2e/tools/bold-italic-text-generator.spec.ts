import { test, expect } from '../fixtures/tool-page';

const SLUG = 'bold-italic-text-generator';

test.describe('Bold Italic Text Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts typed text to bold characters', async ({ page }) => {
    await page.fill('#text-input', 'hello');
    const output = await page.inputValue('#text-output');
    expect(output.length).toBeGreaterThan(0);
    expect(output).not.toBe('hello');
  });

  test('sample button populates input and output', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#text-input');
    const output = await page.inputValue('#text-output');
    expect(input.length).toBeGreaterThan(0);
    expect(output.length).toBeGreaterThan(0);
  });

  test('clear button resets both fields', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-clear');
    const input = await page.inputValue('#text-input');
    const output = await page.inputValue('#text-output');
    expect(input).toBe('');
    expect(output).toBe('');
  });

  test('style radio switches between bold and italic', async ({ page }) => {
    await page.fill('#text-input', 'test');
    const boldOutput = await page.inputValue('#text-output');

    await page.click('input[name="text-style"][value="italic"]');
    const italicOutput = await page.inputValue('#text-output');

    expect(boldOutput).not.toBe(italicOutput);
  });

  test('bold-italic style produces different output', async ({ page }) => {
    await page.fill('#text-input', 'test');
    const boldOutput = await page.inputValue('#text-output');

    await page.click('input[name="text-style"][value="bold-italic"]');
    const boldItalicOutput = await page.inputValue('#text-output');

    expect(boldOutput).not.toBe(boldItalicOutput);
  });

  test('stats bar appears when text is entered', async ({ page }) => {
    await page.fill('#text-input', 'hello world');
    const statsBar = page.locator('#stats-bar');
    await expect(statsBar).toBeVisible();
  });

  test('copy button shows error when output is empty', async ({ page }) => {
    await page.click('#btn-copy');
    await expect(page.locator('#error-notification')).toBeVisible();
  });
});
