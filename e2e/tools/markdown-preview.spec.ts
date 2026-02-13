import { test, expect } from '../fixtures/tool-page';

const SLUG = 'markdown-preview';

test.describe('Markdown Preview — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
    // Clear localStorage to start fresh
    await toolPage.page.evaluate(() => localStorage.removeItem('markdownPreviewContent'));
    // Clear the textarea
    const textarea = toolPage.page.locator('#markdown-input');
    await textarea.fill('');
  });

  test('renders Markdown in preview panel', async ({ page }) => {
    await page.fill('#markdown-input', '# Hello World');
    // Wait for debounced render
    await page.waitForTimeout(300);

    const preview = page.locator('#markdown-preview');
    await expect(preview.locator('h1')).toContainText('Hello World');
  });

  test('renders bold and italic text', async ({ page }) => {
    await page.fill('#markdown-input', '**bold** and *italic*');
    await page.waitForTimeout(300);

    const preview = page.locator('#markdown-preview');
    await expect(preview.locator('strong')).toContainText('bold');
    await expect(preview.locator('em')).toContainText('italic');
  });

  test('updates word count on input', async ({ page }) => {
    await page.fill('#markdown-input', 'one two three four five');
    await page.waitForTimeout(100);

    const wordCount = await page.textContent('#word-count');
    expect(wordCount).toBe('5');
  });

  test('updates character count on input', async ({ page }) => {
    await page.fill('#markdown-input', 'hello');
    await page.waitForTimeout(100);

    const charCount = await page.textContent('#char-count');
    expect(charCount).toBe('5');
  });

  test('updates line count on input', async ({ page }) => {
    await page.fill('#markdown-input', 'line1\nline2\nline3');
    await page.waitForTimeout(100);

    const lineCount = await page.textContent('#line-count');
    expect(lineCount).toBe('3');
  });

  test('clear button resets editor and preview', async ({ page }) => {
    await page.fill('#markdown-input', '# Test content');
    await page.waitForTimeout(300);
    await page.click('#btn-clear');

    expect(await page.inputValue('#markdown-input')).toBe('');
    const wordCount = await page.textContent('#word-count');
    expect(wordCount).toBe('0');
  });

  test('renders code blocks', async ({ page }) => {
    await page.fill('#markdown-input', '```javascript\nconst x = 1;\n```');
    await page.waitForTimeout(300);

    const preview = page.locator('#markdown-preview');
    await expect(preview.locator('pre')).toBeVisible();
    await expect(preview.locator('code')).toContainText('const x = 1;');
  });

  test('renders tables', async ({ page }) => {
    const table = '| A | B |\n|---|---|\n| 1 | 2 |';
    await page.fill('#markdown-input', table);
    await page.waitForTimeout(300);

    const preview = page.locator('#markdown-preview');
    await expect(preview.locator('table')).toBeVisible();
  });
});
