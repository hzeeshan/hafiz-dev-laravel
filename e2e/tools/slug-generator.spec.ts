import { test, expect } from '../fixtures/tool-page';

const SLUG = 'slug-generator';

test.describe('Slug Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('generates slug from text input', async ({ page }) => {
    await page.fill('#text-input', 'How to Build a REST API');
    await page.click('#btn-generate');

    const output = await page.inputValue('#slug-output');
    expect(output).toBe('how-to-build-a-rest-api');
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('handles accented characters with transliteration', async ({ page }) => {
    await page.fill('#text-input', 'Café résumé naïve');
    await page.click('#btn-generate');

    const output = await page.inputValue('#slug-output');
    expect(output).toBe('cafe-resume-naive');
  });

  test('generates multiple slugs from multiple lines', async ({ page }) => {
    await page.fill('#text-input', 'First Title\nSecond Title');
    await page.click('#btn-generate');

    const output = await page.inputValue('#slug-output');
    expect(output).toBe('first-title\nsecond-title');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-generate');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads sample text', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#text-input');
    expect(input.length).toBeGreaterThan(0);
  });

  test('clear button resets all fields', async ({ page }) => {
    await page.fill('#text-input', 'Test text');
    await page.click('#btn-generate');
    await page.click('#btn-clear');

    expect(await page.inputValue('#text-input')).toBe('');
    expect(await page.inputValue('#slug-output')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('URL preview shows after generation', async ({ page }) => {
    await page.fill('#text-input', 'My Blog Post');
    await page.click('#btn-generate');

    await expect(page.locator('#url-preview')).toBeVisible();
    const preview = await page.textContent('#url-preview-list');
    expect(preview).toContain('my-blog-post');
  });
});
