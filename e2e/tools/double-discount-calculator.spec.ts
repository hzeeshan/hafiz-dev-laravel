import { test, expect } from '../fixtures/tool-page';

const SLUG = 'double-discount-calculator';

test.describe('Double Discount Calculator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('calculates double discount correctly', async ({ page }) => {
    await page.fill('#input-price', '100');
    await page.fill('#input-discount1', '20');
    await page.fill('#input-discount2', '10');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();

    // $100 - 20% = $80, $80 - 10% = $72
    const finalPrice = await page.textContent('#result-final');
    expect(finalPrice).toBe('$72.00');

    const savings = await page.textContent('#result-savings');
    expect(savings).toBe('$28.00');
  });

  test('shows combined discount percentage', async ({ page }) => {
    await page.fill('#input-price', '100');
    await page.fill('#input-discount1', '20');
    await page.fill('#input-discount2', '10');
    await page.click('#btn-calculate');

    const combined = await page.textContent('#summary-combined-pct');
    expect(combined).toBe('28.00%');
  });

  test('shows stacking penalty', async ({ page }) => {
    await page.fill('#input-price', '100');
    await page.fill('#input-discount1', '20');
    await page.fill('#input-discount2', '10');
    await page.click('#btn-calculate');

    // Naive: 30% off $100 = $70. Actual: $72. Penalty = $2
    const penalty = await page.textContent('#summary-difference');
    expect(penalty).toBe('$2.00');
  });

  test('applies sales tax correctly', async ({ page }) => {
    await page.fill('#input-price', '100');
    await page.fill('#input-discount1', '20');
    await page.fill('#input-discount2', '10');
    await page.fill('#opt-tax', '8');
    await page.click('#btn-calculate');

    // $72 + 8% tax = $77.76
    const finalPrice = await page.textContent('#result-final');
    expect(finalPrice).toBe('$77.76');

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

    // Results should be visible after sample
    await expect(page.locator('#results-section')).toBeVisible();
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-clear');

    const price = await page.inputValue('#input-price');
    expect(price).toBe('');

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
    await page.click('#btn-calculate');

    const finalPrice = await page.textContent('#result-final');
    expect(finalPrice).toBe('$50.00');

    const savings = await page.textContent('#result-savings');
    expect(savings).toBe('$0.00');
  });
});
