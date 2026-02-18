import { test, expect } from '../fixtures/tool-page';

const SLUG = 'linkedin-font-generator';

test.describe('LinkedIn Font Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts typed text to bold Unicode characters', async ({ page }) => {
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

  test('font style radio switches output', async ({ page }) => {
    await page.fill('#text-input', 'test');
    const boldOutput = await page.inputValue('#text-output');

    await page.click('input[name="font-style"][value="italic"]');
    const italicOutput = await page.inputValue('#text-output');

    expect(boldOutput).not.toBe(italicOutput);
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

  test('preview grid updates with user text', async ({ page }) => {
    const defaultPreview = await page.textContent('#preview-bold');
    await page.fill('#text-input', 'unique test');
    const updatedPreview = await page.textContent('#preview-bold');
    expect(updatedPreview).not.toBe(defaultPreview);
  });
});
