import { test, expect } from '../fixtures/tool-page';

const SLUG = 'decimal-to-binary';

test.describe('Decimal to Binary — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts decimal to binary', async ({ page }) => {
    await page.fill('#input-value', '42');
    await page.waitForTimeout(400);

    const output = await page.inputValue('#output-value');
    // Default is 8-bit padding with nibble grouping: "0010 1010"
    expect(output).toBe('0010 1010');
  });

  test('converts multiple decimal values', async ({ page }) => {
    await page.fill('#input-value', '42, 255');
    await page.waitForTimeout(400);

    const output = await page.inputValue('#output-value');
    expect(output).toContain('0010 1010');
    expect(output).toContain('1111 1111');
  });

  test('shows step-by-step breakdown for single value', async ({ page }) => {
    await page.fill('#input-value', '42');
    await page.waitForTimeout(400);

    await expect(page.locator('#breakdown')).toBeVisible();
    const rows = page.locator('#breakdown-body tr');
    expect(await rows.count()).toBeGreaterThan(0);
  });

  test('swap direction works', async ({ page }) => {
    await page.fill('#input-value', '42');
    await page.waitForTimeout(400);

    await page.click('#btn-swap');
    await page.waitForTimeout(400);

    const output = await page.inputValue('#output-value');
    expect(output).toBe('42');
  });

  test('sample button loads data', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#input-value');
    expect(input.length).toBeGreaterThan(0);

    await page.waitForTimeout(400);
    const output = await page.inputValue('#output-value');
    expect(output.length).toBeGreaterThan(0);
  });

  test('clear button resets', async ({ page }) => {
    await page.fill('#input-value', '42');
    await page.waitForTimeout(400);
    await page.click('#btn-clear');

    expect(await page.inputValue('#input-value')).toBe('');
    expect(await page.inputValue('#output-value')).toBe('');
    await expect(page.locator('#breakdown')).toBeHidden();
  });

  test('shows error for invalid decimal', async ({ page }) => {
    await page.fill('#input-value', 'abc');
    await page.waitForTimeout(400);

    await expect(page.locator('#error-notification')).toBeVisible();
  });
});
