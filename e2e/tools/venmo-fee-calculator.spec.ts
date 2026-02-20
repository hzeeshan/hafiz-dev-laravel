import { test, expect } from '../fixtures/tool-page';

const SLUG = 'venmo-fee-calculator';

test.describe('Venmo Fee Calculator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('calculates business fee from amount ($100)', async ({ page }) => {
    await page.selectOption('#opt-transaction-type', 'business');
    await page.fill('#input-amount', '100');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();
    // Business: 1.9% + $0.10 = $1.90 + $0.10 = $2.00
    const fee = await page.textContent('#result-fee');
    expect(fee).toBe('-$2.00');
    const receive = await page.textContent('#result-receive');
    expect(receive).toBe('$98.00');
  });

  test('calculates credit card fee (3%)', async ({ page }) => {
    await page.selectOption('#opt-transaction-type', 'personal_credit');
    await page.fill('#input-amount', '50');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();
    // Credit card: 3% of $50 = $1.50
    const fee = await page.textContent('#result-fee');
    expect(fee).toBe('-$1.50');
    const receive = await page.textContent('#result-receive');
    expect(receive).toBe('$48.50');
  });

  test('personal free transaction shows $0 fee', async ({ page }) => {
    await page.selectOption('#opt-transaction-type', 'personal_free');
    await page.fill('#input-amount', '100');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();
    const fee = await page.textContent('#result-fee');
    expect(fee).toBe('$0.00');
    const receive = await page.textContent('#result-receive');
    expect(receive).toBe('$100.00');
  });

  test('instant transfer fee with min/max constraints', async ({ page }) => {
    await page.selectOption('#opt-transaction-type', 'instant_transfer');
    await page.fill('#input-amount', '10');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();
    // 1.75% of $10 = $0.175, but min fee is $0.25
    const fee = await page.textContent('#result-fee');
    expect(fee).toBe('-$0.25');
  });

  test('reverse calculation for business type', async ({ page }) => {
    await page.selectOption('#opt-transaction-type', 'business');
    await page.selectOption('#opt-mode', 'amount_to_receive');
    await page.fill('#input-amount', '100');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();
    const receive = await page.textContent('#result-receive');
    expect(receive).toBe('$100.00');

    // Send amount should be > 100
    const send = await page.textContent('#result-send');
    const sendNum = parseFloat(send!.replace('$', ''));
    expect(sendNum).toBeGreaterThan(100);
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

  test('copy button works when results exist', async ({ page, context, toolPage }) => {
    await context.grantPermissions(['clipboard-read', 'clipboard-write']);
    await page.click('#btn-sample');
    await page.click('#btn-copy');
    const expectedText = toolPage.locale === 'it' ? 'Copiato!' : 'Copied!';
    await expect(page.locator('#copy-text')).toHaveText(expectedText);
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
});
