import { test, expect } from '../fixtures/tool-page';

const SLUG = 'ebay-paypal-fee-calculator';

test.describe('eBay PayPal Fee Calculator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('calculates fees for default category (Most Categories 13.25%)', async ({ page }) => {
    await page.fill('#input-item-price', '50');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();
    // Total = $50, eBay fee = round2(50 * 13.25%) + $0.30 = $6.63 + $0.30 = $6.93
    const fees = await page.textContent('#result-total-fees');
    expect(fees).toBe('-$6.93');
    const revenue = await page.textContent('#result-revenue');
    expect(revenue).toBe('$50.00');
  });

  test('includes shipping in fee calculation', async ({ page }) => {
    await page.fill('#input-item-price', '50');
    await page.fill('#input-shipping', '10');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();
    // Total = $60, eBay fee = 60 * 13.25% + $0.30 = $7.95 + $0.30 = $8.25
    const revenue = await page.textContent('#result-revenue');
    expect(revenue).toBe('$60.00');
    const fees = await page.textContent('#result-total-fees');
    expect(fees).toBe('-$8.25');
  });

  test('shows PayPal fee row when PayPal processor selected', async ({ page }) => {
    await page.fill('#input-item-price', '100');
    await page.selectOption('#opt-processor', 'paypal_standard');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();
    await expect(page.locator('#breakdown-paypal-row')).toBeVisible();
  });

  test('hides PayPal fee row for managed payments', async ({ page }) => {
    await page.fill('#input-item-price', '100');
    await page.selectOption('#opt-processor', 'managed');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();
    await expect(page.locator('#breakdown-paypal-row')).toBeHidden();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-calculate');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads data and calculates', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#input-item-price');
    expect(input).toBe('50.00');
    await expect(page.locator('#results-section')).toBeVisible();
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await expect(page.locator('#results-section')).toBeVisible();
    await page.click('#btn-clear');
    const input = await page.inputValue('#input-item-price');
    expect(input).toBe('');
    await expect(page.locator('#results-section')).toBeHidden();
  });

  test('copy button works when results exist', async ({ page, context, toolPage }) => {
    await context.grantPermissions(['clipboard-read', 'clipboard-write']);
    await page.click('#btn-sample');
    await page.click('#btn-copy');
    const expectedText = toolPage.locale === 'it' ? 'Copiato!' : 'Copied!';
    await expect(page.locator('#copy-text')).toHaveText(expectedText);
  });

  test('category change affects fee calculation', async ({ page }) => {
    await page.fill('#input-item-price', '100');
    await page.selectOption('#opt-category', 'guitars');
    await page.click('#btn-calculate');

    // Guitars: 6.35% of $100 + $0.30 = $6.35 + $0.30 = $6.65
    const fees = await page.textContent('#result-total-fees');
    expect(fees).toBe('-$6.65');
  });

  test('comparison table is populated after calculation', async ({ page }) => {
    await page.click('#btn-sample');
    const rows = await page.locator('#comparison-table-body tr').count();
    expect(rows).toBe(8); // 8 common price points
  });

  test('stats bar shows after calculation', async ({ page }) => {
    await page.click('#btn-sample');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('item cost reduces net profit', async ({ page }) => {
    await page.fill('#input-item-price', '100');
    await page.fill('#input-item-cost', '0');
    await page.click('#btn-calculate');
    const profitWithoutCost = await page.textContent('#result-profit');

    await page.fill('#input-item-cost', '30');
    await page.click('#btn-calculate');
    const profitWithCost = await page.textContent('#result-profit');

    const profitVal1 = parseFloat(profitWithoutCost!.replace('$', ''));
    const profitVal2 = parseFloat(profitWithCost!.replace('$', ''));
    expect(profitVal2).toBeLessThan(profitVal1);
  });
});
