import { test, expect } from '../fixtures/tool-page';

const SLUG = 'octal-to-decimal';

test.describe('Octal to Decimal — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts octal to decimal', async ({ page }) => {
    await page.fill('#input-value', '777');
    await page.waitForTimeout(400);

    const output = await page.inputValue('#output-value');
    expect(output).toBe('511');
  });

  test('converts multiple octal values', async ({ page }) => {
    await page.fill('#input-value', '175, 777');
    await page.waitForTimeout(400);

    const output = await page.inputValue('#output-value');
    expect(output).toBe('125\n511');
  });

  test('shows breakdown for single value', async ({ page }) => {
    await page.fill('#input-value', '175');
    await page.waitForTimeout(400);

    await expect(page.locator('#breakdown')).toBeVisible();
  });

  test('hides breakdown for multiple values', async ({ page }) => {
    await page.fill('#input-value', '175, 777');
    await page.waitForTimeout(400);

    await expect(page.locator('#breakdown')).toBeHidden();
  });

  test('swap direction works', async ({ page }) => {
    await page.fill('#input-value', '777');
    await page.waitForTimeout(400);

    await page.click('#btn-swap');
    // After swap, input should have the decimal output
    const input = await page.inputValue('#input-value');
    expect(input).toBe('511');

    await page.waitForTimeout(400);
    const output = await page.inputValue('#output-value');
    expect(output).toBe('777');
  });

  test('shows error for invalid octal', async ({ page }) => {
    await page.fill('#input-value', '89');
    await page.waitForTimeout(400);

    await expect(page.locator('#error-notification')).toBeVisible();
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
    await page.fill('#input-value', '777');
    await page.waitForTimeout(400);
    await page.click('#btn-clear');

    expect(await page.inputValue('#input-value')).toBe('');
    expect(await page.inputValue('#output-value')).toBe('');
    await expect(page.locator('#breakdown')).toBeHidden();
  });
});
