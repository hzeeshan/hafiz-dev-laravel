import { test, expect } from '../fixtures/tool-page';

const SLUG = 'audiobook-speed-calculator';

test.describe('Audiobook Speed Calculator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('calculates listening times for valid input', async ({ page }) => {
    await page.fill('#input-hours', '10');
    await page.fill('#input-minutes', '30');
    await page.fill('#input-seconds', '0');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();
    await expect(page.locator('#stats-bar')).toBeVisible();

    // Check custom result displays something
    const customResult = await page.textContent('#custom-result-time');
    expect(customResult).not.toBe('0h 0m');
  });

  test('shows error on zero-length input', async ({ page }) => {
    await page.fill('#input-hours', '0');
    await page.fill('#input-minutes', '0');
    await page.fill('#input-seconds', '0');
    await page.click('#btn-calculate');

    await expect(page.locator('#error-notification')).toBeVisible();
    await expect(page.locator('#results-section')).toBeHidden();
  });

  test('sample button loads data and calculates', async ({ page }) => {
    await page.click('#btn-sample');

    // Check that hours got populated
    const hours = await page.inputValue('#input-hours');
    expect(parseInt(hours)).toBeGreaterThan(0);

    // Results should be visible after sample
    await expect(page.locator('#results-section')).toBeVisible();
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await expect(page.locator('#results-section')).toBeVisible();

    await page.click('#btn-clear');

    const hours = await page.inputValue('#input-hours');
    expect(hours).toBe('0');

    await expect(page.locator('#results-section')).toBeHidden();
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('copy button works when results exist', async ({ page, context }) => {
    await context.grantPermissions(['clipboard-read', 'clipboard-write']);
    await page.click('#btn-sample');
    await page.click('#btn-copy');

    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('speed table shows all preset speeds', async ({ page }) => {
    await page.fill('#input-hours', '10');
    await page.click('#btn-calculate');

    // Should have rows for 1x, 1.25x, 1.5x, 1.75x, 2x, 2.5x, 3x
    const rows = page.locator('#speed-table-body tr');
    const count = await rows.count();
    expect(count).toBeGreaterThanOrEqual(7);
  });

  test('custom speed slider syncs with input', async ({ page }) => {
    await page.fill('#custom-speed-input', '2.00');
    await page.locator('#custom-speed-input').dispatchEvent('change');

    const sliderVal = await page.inputValue('#custom-speed-slider');
    expect(parseFloat(sliderVal)).toBe(2);
  });

  test('stats bar shows correct original length', async ({ page }) => {
    await page.fill('#input-hours', '5');
    await page.fill('#input-minutes', '0');
    await page.fill('#input-seconds', '0');
    await page.click('#btn-calculate');

    const statsOriginal = await page.textContent('#stats-original');
    expect(statsOriginal).toContain('5h');
  });
});
