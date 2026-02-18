import { test, expect } from '../fixtures/tool-page';

const SLUG = 'etsy-fee-calculator';

test.describe('Etsy Fee Calculator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('calculates fees for US domestic sale', async ({ page }) => {
    await page.fill('#input-item-price', '25');
    await page.fill('#input-shipping', '5');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();

    // Total revenue = $30
    const revenue = await page.textContent('#result-revenue');
    expect(revenue).toBe('$30.00');

    // Total fees: listing $0.20 + transaction 6.5% of $30 = $1.95 + processing 3% of $30 + $0.25 = $1.15 = $3.30
    const fees = await page.textContent('#result-total-fees');
    expect(fees).toBe('-$3.30');
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-calculate');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads data and calculates', async ({ page }) => {
    await page.click('#btn-sample');
    const itemPrice = await page.inputValue('#input-item-price');
    expect(itemPrice).toBe('25.00');
    const shipping = await page.inputValue('#input-shipping');
    expect(shipping).toBe('5.00');
    const cost = await page.inputValue('#input-item-cost');
    expect(cost).toBe('8.00');
    await expect(page.locator('#results-section')).toBeVisible();
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await expect(page.locator('#results-section')).toBeVisible();
    await page.click('#btn-clear');
    const itemPrice = await page.inputValue('#input-item-price');
    expect(itemPrice).toBe('');
    await expect(page.locator('#results-section')).toBeHidden();
  });

  test('copy button works when results exist', async ({ page, context, toolPage }) => {
    await context.grantPermissions(['clipboard-read', 'clipboard-write']);
    await page.click('#btn-sample');
    await page.click('#btn-copy');
    const expectedText = toolPage.locale === 'it' ? 'Copiato!' : 'Copied!';
    await expect(page.locator('#copy-text')).toHaveText(expectedText);
  });

  test('offsite ads fee is included when selected', async ({ page }) => {
    await page.fill('#input-item-price', '100');
    await page.fill('#input-shipping', '0');
    await page.selectOption('#opt-offsite-ads', '15');
    await page.click('#btn-calculate');

    await expect(page.locator('#breakdown-offsite-row')).toBeVisible();
    // Offsite fee = 15% of $100 = $15.00
    const offsiteFee = await page.textContent('#breakdown-offsite');
    expect(offsiteFee).toBe('$15.00');
  });

  test('country change updates currency prefix', async ({ page }) => {
    await page.selectOption('#opt-country', 'uk');
    const prefix = await page.textContent('#currency-prefix-price');
    expect(prefix).toBe('£');
  });

  test('comparison table is populated after calculation', async ({ page }) => {
    await page.click('#btn-sample');
    const rows = await page.locator('#comparison-table-body tr').count();
    expect(rows).toBe(8);
  });

  test('stats bar shows after calculation', async ({ page }) => {
    await page.click('#btn-sample');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('profit accounts for item cost', async ({ page }) => {
    await page.fill('#input-item-price', '50');
    await page.fill('#input-shipping', '0');
    await page.fill('#input-item-cost', '20');
    await page.click('#btn-calculate');

    await expect(page.locator('#breakdown-cost-row')).toBeVisible();
    const cost = await page.textContent('#breakdown-cost');
    expect(cost).toBe('$20.00');

    // Profit should be less than revenue minus fees
    const profit = await page.textContent('#result-profit');
    const profitNum = parseFloat(profit!.replace('$', ''));
    expect(profitNum).toBeLessThan(30); // $50 - fees - $20 cost
    expect(profitNum).toBeGreaterThan(0);
  });
});
