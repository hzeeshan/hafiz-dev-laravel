import { test, expect } from '../fixtures/tool-page';

const SLUG = 'ascii-table';

test.describe('ASCII Table — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('renders all 128 characters in table', async ({ page }) => {
    const count = await page.textContent('#table-count');
    expect(count).toContain('128');
  });

  test('text to ASCII converter works', async ({ page }) => {
    await page.fill('#text-input', 'A');
    const output = await page.inputValue('#ascii-output');
    expect(output).toBe('65');
  });

  test('filter buttons narrow table results', async ({ page }) => {
    await page.click('.filter-btn[data-filter="digits"]');
    const count = await page.textContent('#table-count');
    expect(count).toContain('10');
  });

  test('search filters table by character', async ({ page }) => {
    await page.fill('#table-search', 'Tilde');
    await page.waitForTimeout(300);
    const rows = page.locator('#ascii-table-body tr');
    expect(await rows.count()).toBe(1);
  });

  test('swap button converts ASCII back to text', async ({ page }) => {
    await page.fill('#text-input', 'Hi');
    await page.click('#btn-swap');
    const input = await page.inputValue('#text-input');
    expect(input).toBe('Hi');
  });

  test('clear button resets converter', async ({ page }) => {
    await page.fill('#text-input', 'Test');
    await page.click('#btn-clear-converter');

    expect(await page.inputValue('#text-input')).toBe('');
    expect(await page.inputValue('#ascii-output')).toBe('');
  });

  test('hex output format works', async ({ page }) => {
    await page.selectOption('#output-format', 'hex');
    await page.fill('#text-input', 'A');
    const output = await page.inputValue('#ascii-output');
    expect(output).toBe('0x41');
  });
});
