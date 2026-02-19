import { test, expect } from '../fixtures/tool-page';

const SLUG = 'triple-discount-calculator';

test.describe('Triple Discount Calculator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('calculates triple discount correctly', async ({ page }) => {
    await page.fill('#input-price', '100');
    await page.fill('#input-discount1', '20');
    await page.fill('#input-discount2', '10');
    await page.fill('#input-discount3', '5');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();

    // $100 - 20% = $80, $80 - 10% = $72, $72 - 5% = $68.40
    const finalPrice = await page.textContent('#result-final');
    expect(finalPrice).toBe('$68.40');

    const savings = await page.textContent('#result-savings');
    expect(savings).toBe('$31.60');
  });

  test('shows combined discount percentage', async ({ page }) => {
    await page.fill('#input-price', '100');
    await page.fill('#input-discount1', '20');
    await page.fill('#input-discount2', '10');
    await page.fill('#input-discount3', '5');
    await page.click('#btn-calculate');

    const combined = await page.textContent('#summary-combined-pct');
    expect(combined).toBe('31.60%');
  });

  test('shows stacking penalty', async ({ page }) => {
    await page.fill('#input-price', '100');
    await page.fill('#input-discount1', '20');
    await page.fill('#input-discount2', '10');
    await page.fill('#input-discount3', '5');
    await page.click('#btn-calculate');

    // Naive: 35% off $100 = $65. Actual: $68.40. Penalty = $3.40
    const penalty = await page.textContent('#summary-difference');
    expect(penalty).toBe('$3.40');
  });

  test('applies sales tax correctly', async ({ page }) => {
    await page.fill('#input-price', '100');
    await page.fill('#input-discount1', '20');
    await page.fill('#input-discount2', '10');
    await page.fill('#input-discount3', '5');
    await page.fill('#opt-tax', '8');
    await page.click('#btn-calculate');

    // $68.40 + 8% tax = $73.872 -> $73.87
    const finalPrice = await page.textContent('#result-final');
    expect(finalPrice).toBe('$73.87');

    await expect(page.locator('#breakdown-tax-row')).toBeVisible();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-calculate');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads data and calculates', async ({ page }) => {
    await page.click('#btn-sample');

    const price = await page.inputValue('#input-price');
    expect(parseFloat(price)).toBeGreaterThan(0);

    const d3 = await page.inputValue('#input-discount3');
    expect(parseFloat(d3)).toBeGreaterThan(0);

    // Results should be visible after sample
    await expect(page.locator('#results-section')).toBeVisible();
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-clear');

    const price = await page.inputValue('#input-price');
    expect(price).toBe('');

    const d3 = await page.inputValue('#input-discount3');
    expect(d3).toBe('');

    await expect(page.locator('#results-section')).toBeHidden();
  });

  test('copy button works when results exist', async ({ page, context }) => {
    await context.grantPermissions(['clipboard-read', 'clipboard-write']);
    await page.click('#btn-sample');
    await page.click('#btn-copy');

    // Check copy text changes to "Copied!"
    await expect(page.locator('#copy-text')).toHaveText('Copied!');
  });

  test('handles zero discounts', async ({ page }) => {
    await page.fill('#input-price', '50');
    await page.fill('#input-discount1', '0');
    await page.fill('#input-discount2', '0');
    await page.fill('#input-discount3', '0');
    await page.click('#btn-calculate');

    const finalPrice = await page.textContent('#result-final');
    expect(finalPrice).toBe('$50.00');

    const savings = await page.textContent('#result-savings');
    expect(savings).toBe('$0.00');
  });

  test('handles only third discount', async ({ page }) => {
    await page.fill('#input-price', '200');
    await page.fill('#input-discount1', '0');
    await page.fill('#input-discount2', '0');
    await page.fill('#input-discount3', '25');
    await page.click('#btn-calculate');

    const finalPrice = await page.textContent('#result-final');
    expect(finalPrice).toBe('$150.00');
  });
});
