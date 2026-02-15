import { test, expect } from '../fixtures/tool-page';

const SLUG = 'hex-to-binary';

test.describe('Hex to Binary — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts hex to binary', async ({ page }) => {
    await page.fill('#hex-input', 'FF');
    // Wait for debounced conversion
    await page.waitForTimeout(400);

    const output = await page.inputValue('#binary-output');
    expect(output).toBe('11111111');
  });

  test('converts multiple hex values', async ({ page }) => {
    await page.fill('#hex-input', 'FF 2A');
    await page.waitForTimeout(400);

    const output = await page.inputValue('#binary-output');
    expect(output).toBe('11111111 00101010');
  });

  test('shows breakdown table', async ({ page }) => {
    await page.fill('#hex-input', '2F');
    await page.waitForTimeout(400);

    await expect(page.locator('#breakdown')).toBeVisible();
    const rows = page.locator('#breakdown-body tr');
    expect(await rows.count()).toBe(2);
  });

  test('swap direction works', async ({ page }) => {
    await page.fill('#hex-input', 'FF');
    await page.waitForTimeout(400);

    await page.click('#btn-swap');
    // After swap, input should have the binary output
    const input = await page.inputValue('#hex-input');
    expect(input).toBe('11111111');

    // And output should have the hex result
    await page.waitForTimeout(400);
    const output = await page.inputValue('#binary-output');
    expect(output).toBe('FF');
  });

  test('sample button loads data', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#hex-input');
    expect(input.length).toBeGreaterThan(0);

    await page.waitForTimeout(400);
    const output = await page.inputValue('#binary-output');
    expect(output.length).toBeGreaterThan(0);
  });

  test('clear button resets', async ({ page }) => {
    await page.fill('#hex-input', 'FF');
    await page.waitForTimeout(400);
    await page.click('#btn-clear');

    expect(await page.inputValue('#hex-input')).toBe('');
    expect(await page.inputValue('#binary-output')).toBe('');
    await expect(page.locator('#breakdown')).toBeHidden();
  });

  test('shows error for invalid hex', async ({ page }) => {
    await page.fill('#hex-input', 'GG');
    await page.waitForTimeout(400);

    await expect(page.locator('#error-notification')).toBeVisible();
  });
});
