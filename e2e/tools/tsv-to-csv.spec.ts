import { test, expect } from '../fixtures/tool-page';

const SLUG = 'tsv-to-csv';

test.describe('TSV to CSV Converter — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts TSV to CSV', async ({ page }) => {
    await page.fill('#tsv-input', 'Name\tAge\nAlice\t30\nBob\t25');
    await page.click('#btn-convert');

    const output = await page.inputValue('#csv-output');
    expect(output).toContain('Name,Age');
    expect(output).toContain('Alice,30');
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('stats bar appears after conversion', async ({ page }) => {
    await page.fill('#tsv-input', 'A\tB\tC\n1\t2\t3\n4\t5\t6');
    await page.click('#btn-convert');

    await expect(page.locator('#stats-bar')).toBeVisible();
    expect(await page.textContent('#stat-rows')).toBe('3');
    expect(await page.textContent('#stat-cols')).toBe('3');
  });

  test('sample button loads TSV data', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#tsv-input');
    expect(input.length).toBeGreaterThan(0);
  });

  test('clear button resets both fields', async ({ page }) => {
    await page.fill('#tsv-input', 'A\tB\n1\t2');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#tsv-input')).toBe('');
    expect(await page.inputValue('#csv-output')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('smart quoting wraps fields with commas', async ({ page }) => {
    await page.fill('#tsv-input', 'Name\tCity\nAlice\tNew York, NY');
    await page.click('#btn-convert');

    const output = await page.inputValue('#csv-output');
    expect(output).toContain('"New York, NY"');
  });

  test('always-quote mode wraps all fields', async ({ page }) => {
    await page.selectOption('#quote-style', 'all');
    await page.fill('#tsv-input', 'Name\tAge\nAlice\t30');
    await page.click('#btn-convert');

    const output = await page.inputValue('#csv-output');
    expect(output).toContain('"Name","Age"');
    expect(output).toContain('"Alice","30"');
  });

  test('real-time conversion on input', async ({ page }) => {
    await page.fill('#tsv-input', 'X\tY\n1\t2');
    // debounce is 300ms — wait for auto-convert
    await page.waitForTimeout(400);
    const output = await page.inputValue('#csv-output');
    expect(output).toContain('X,Y');
  });
});
