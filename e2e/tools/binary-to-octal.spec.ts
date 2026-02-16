import { test, expect } from '../fixtures/tool-page';

const SLUG = 'binary-to-octal';

test.describe('Binary to Octal — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts binary to octal', async ({ page }) => {
    await page.fill('#input-value', '11111101');
    await page.waitForTimeout(400);

    const output = await page.inputValue('#output-value');
    expect(output).toBe('375');
  });

  test('converts multiple binary values', async ({ page }) => {
    await page.fill('#input-value', '11111101, 111111111');
    await page.waitForTimeout(400);

    const output = await page.inputValue('#output-value');
    expect(output).toContain('375');
    expect(output).toContain('777');
  });

  test('shows 3-bit grouping breakdown for single value', async ({ page }) => {
    await page.fill('#input-value', '11111101');
    await page.waitForTimeout(400);

    await expect(page.locator('#breakdown')).toBeVisible();
  });

  test('swap direction works', async ({ page }) => {
    await page.fill('#input-value', '11111101');
    await page.waitForTimeout(400);

    await page.click('#btn-swap');
    await page.waitForTimeout(400);

    const output = await page.inputValue('#output-value');
    expect(output).toBe('11111101');
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
    await page.fill('#input-value', '11111101');
    await page.waitForTimeout(400);
    await page.click('#btn-clear');

    expect(await page.inputValue('#input-value')).toBe('');
    expect(await page.inputValue('#output-value')).toBe('');
    await expect(page.locator('#breakdown')).toBeHidden();
  });

  test('shows error for invalid binary', async ({ page }) => {
    await page.fill('#input-value', '12345');
    await page.waitForTimeout(400);

    await expect(page.locator('#error-notification')).toBeVisible();
  });
});
