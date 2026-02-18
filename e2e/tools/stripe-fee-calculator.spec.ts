import { test, expect } from '../fixtures/tool-page';

const SLUG = 'stripe-fee-calculator';

test.describe('Stripe Fee Calculator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('calculates fee from charge amount (US domestic)', async ({ page }) => {
    await page.fill('#input-amount', '100');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();
    const fee = await page.textContent('#result-fee');
    // US domestic: 2.9% + $0.30 = $3.20
    expect(fee).toBe('-$3.20');
    const receive = await page.textContent('#result-receive');
    expect(receive).toBe('$96.80');
  });

  test('calculates amount needed to receive $100 (reverse mode)', async ({ page }) => {
    await page.selectOption('#opt-mode', 'amount_to_receive');
    await page.fill('#input-amount', '100');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();
    const receive = await page.textContent('#result-receive');
    expect(receive).toBe('$100.00');

    // Charge should be > 100
    const charge = await page.textContent('#result-charge');
    const chargeNum = parseFloat(charge!.replace('$', ''));
    expect(chargeNum).toBeGreaterThan(100);
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-calculate');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads data and calculates', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#input-amount');
    expect(input).toBe('100.00');
    await expect(page.locator('#results-section')).toBeVisible();
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await expect(page.locator('#results-section')).toBeVisible();
    await page.click('#btn-clear');
    const input = await page.inputValue('#input-amount');
    expect(input).toBe('');
    await expect(page.locator('#results-section')).toBeHidden();
  });

  test('copy button works when results exist', async ({ page, context }) => {
    await context.grantPermissions(['clipboard-read', 'clipboard-write']);
    await page.click('#btn-sample');
    await page.click('#btn-copy');
    // Check that the button text changed to "Copied!"
    await expect(page.locator('#copy-text')).toHaveText('Copied!');
  });

  test('international card adds surcharge', async ({ page }) => {
    await page.fill('#input-amount', '100');
    await page.selectOption('#opt-card-type', 'international');
    await page.click('#btn-calculate');

    // US domestic (2.9%) + international (1.5%) + $0.30 = 4.4% + $0.30 = $4.70
    const fee = await page.textContent('#result-fee');
    expect(fee).toBe('-$4.70');
    await expect(page.locator('#breakdown-intl-row')).toBeVisible();
  });

  test('country change updates currency', async ({ page }) => {
    await page.selectOption('#opt-country', 'eu');
    const currencyPrefix = await page.textContent('#currency-prefix');
    expect(currencyPrefix).toBe('€');
  });

  test('comparison table is populated after calculation', async ({ page }) => {
    await page.click('#btn-sample');
    const rows = await page.locator('#comparison-table-body tr').count();
    expect(rows).toBe(8); // 8 common amounts
  });

  test('stats bar shows after calculation', async ({ page }) => {
    await page.click('#btn-sample');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });
});
