import { test, expect } from '../fixtures/tool-page';

const SLUG = 'remove-line-breaks';

test.describe('Remove Line Breaks — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('removes line breaks and joins with space by default', async ({ page }) => {
    await page.fill('#text-input', 'line one\nline two\nline three');
    await page.click('#btn-remove');

    const output = await page.inputValue('#text-output');
    expect(output).toBe('line one line two line three');
  });

  test('joins lines with comma when comma option selected', async ({ page }) => {
    await page.selectOption('#replacement-select', 'comma');
    await page.fill('#text-input', 'apple\nbanana\ncherry');
    await page.click('#btn-remove');

    const output = await page.inputValue('#text-output');
    expect(output).toBe('apple,banana,cherry');
  });

  test('shows custom separator input when custom selected', async ({ page }) => {
    await page.selectOption('#replacement-select', 'custom');
    await expect(page.locator('#custom-separator-container')).toBeVisible();
  });

  test('uses custom separator', async ({ page }) => {
    await page.selectOption('#replacement-select', 'custom');
    await page.fill('#custom-separator', ' | ');
    await page.fill('#text-input', 'a\nb\nc');
    await page.click('#btn-remove');

    const output = await page.inputValue('#text-output');
    expect(output).toBe('a | b | c');
  });

  test('removes only empty lines when option checked', async ({ page }) => {
    await page.check('#remove-empty-only');
    await page.fill('#text-input', 'line one\n\nline two\n\nline three');
    await page.click('#btn-remove');

    const output = await page.inputValue('#text-output');
    expect(output).toContain('line one');
    expect(output).toContain('line two');
    expect(output).not.toContain('\n\n');
  });

  test('preserves paragraph breaks when option checked', async ({ page }) => {
    await page.check('#preserve-paragraphs');
    await page.fill('#text-input', 'Para one\nline two\n\nPara two\nline four');
    await page.click('#btn-remove');

    const output = await page.inputValue('#text-output');
    expect(output).toContain('\n\n');
  });

  test('stats update after processing', async ({ page }) => {
    await page.fill('#text-input', 'line one\nline two\nline three');
    await page.click('#btn-remove');

    const linesBefore = await page.textContent('#stat-lines-before');
    const linesAfter = await page.textContent('#stat-lines-after');
    expect(Number(linesBefore)).toBeGreaterThan(Number(linesAfter));
  });

  test('sample button loads example text', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#text-input');
    expect(input.length).toBeGreaterThan(0);
  });

  test('clear button resets everything', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-remove');
    await page.click('#btn-clear');

    expect(await page.inputValue('#text-input')).toBe('');
    expect(await page.inputValue('#text-output')).toBe('');
  });

  test('copy shows error when output is empty', async ({ page }) => {
    await page.click('#btn-copy');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('download shows error when output is empty', async ({ page }) => {
    await page.click('#btn-download');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('processes text in real-time on input', async ({ page }) => {
    await page.fill('#text-input', 'line one\nline two');
    // Wait for debounce
    await page.waitForTimeout(400);
    const output = await page.inputValue('#text-output');
    expect(output).toContain('line one');
    expect(output).toContain('line two');
  });
});
