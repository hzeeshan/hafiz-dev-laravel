import { test, expect } from '../fixtures/tool-page';

const SLUG = 'hex-to-rgb';

test.describe('Hex to RGB Converter — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('displays default color values on load', async ({ page }) => {
    const rgb = await page.textContent('#out-rgb');
    expect(rgb).toBe('rgb(255, 87, 51)');
    const hex = await page.textContent('#out-hex');
    expect(hex).toBe('#FF5733');
  });

  test('converts hex input to RGB', async ({ page }) => {
    await page.fill('#hex-input', '');
    await page.fill('#hex-input', '00FF00');
    const rgb = await page.textContent('#out-rgb');
    expect(rgb).toBe('rgb(0, 255, 0)');
  });

  test('updates color preview on preset click', async ({ page }) => {
    await page.click('.preset-btn[data-hex="3498DB"]');
    // Wait for the RGB text output to confirm the click was processed
    await expect(page.locator('#out-rgb')).toHaveText('rgb(52, 152, 219)');
    // Now check the preview background
    await expect(page.locator('#color-preview')).toHaveCSS('background-color', 'rgb(52, 152, 219)');
  });

  test('shows HSL values', async ({ page }) => {
    const hsl = await page.textContent('#out-hsl');
    expect(hsl).toContain('hsl(');
  });

  test('shows CMYK values', async ({ page }) => {
    const cmyk = await page.textContent('#out-cmyk');
    expect(cmyk).toContain('cmyk(');
  });

  test('shows CSS variable output', async ({ page }) => {
    const css = await page.textContent('#out-css');
    expect(css).toContain('--color-primary:');
  });

  test('preset button changes color', async ({ page }) => {
    // Click the black preset
    await page.click('.preset-btn[data-hex="000000"]');
    const rgb = await page.textContent('#out-rgb');
    expect(rgb).toBe('rgb(0, 0, 0)');
  });

  test('RGB sliders update hex output', async ({ page }) => {
    await page.fill('#val-r', '0');
    await page.locator('#val-r').dispatchEvent('change');
    await page.fill('#val-g', '0');
    await page.locator('#val-g').dispatchEvent('change');
    await page.fill('#val-b', '0');
    await page.locator('#val-b').dispatchEvent('change');
    const hex = await page.textContent('#out-hex');
    expect(hex).toBe('#000000');
  });
});
