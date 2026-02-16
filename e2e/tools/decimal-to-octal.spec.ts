import { test, expect } from '../fixtures/tool-page';

const SLUG = 'decimal-to-octal';

test.describe('Decimal to Octal — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts decimal to octal', async ({ page }) => {
    await page.fill('#input-value', '125');
    await page.waitForTimeout(400);

    const output = await page.inputValue('#output-value');
    expect(output).toBe('175');
  });

  test('converts multiple decimal values', async ({ page }) => {
    await page.fill('#input-value', '125, 255');
    await page.waitForTimeout(400);

    const output = await page.inputValue('#output-value');
    expect(output).toContain('175');
    expect(output).toContain('377');
  });

  test('shows step-by-step breakdown for single value', async ({ page }) => {
    await page.fill('#input-value', '125');
    await page.waitForTimeout(400);

    await expect(page.locator('#breakdown')).toBeVisible();
  });

  test('swap direction works', async ({ page }) => {
    await page.fill('#input-value', '125');
    await page.waitForTimeout(400);

    await page.click('#btn-swap');
    await page.waitForTimeout(400);

    const output = await page.inputValue('#output-value');
    expect(output).toBe('125');
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
    await page.fill('#input-value', '125');
    await page.waitForTimeout(400);
    await page.click('#btn-clear');

    expect(await page.inputValue('#input-value')).toBe('');
    expect(await page.inputValue('#output-value')).toBe('');
    await expect(page.locator('#breakdown')).toBeHidden();
  });

  test('shows error for invalid decimal', async ({ page }) => {
    await page.fill('#input-value', 'xyz');
    await page.waitForTimeout(400);

    await expect(page.locator('#error-notification')).toBeVisible();
  });
});
