import { test, expect } from '../fixtures/tool-page';

const SLUG = 'global-days-calculator';

test.describe('Global Days Calculator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('calculates days between two dates', async ({ page }) => {
    await page.fill('#start-date', '2024-01-01');
    await page.fill('#end-date', '2024-12-31');
    await page.click('#btn-calculate');
    await expect(page.locator('#results-section')).toBeVisible();
    const days = await page.textContent('#result-days');
    expect(days).toBeTruthy();
    expect(parseInt(days!.replace(/,/g, ''))).toBe(365);
  });

  test('include end date adds one day', async ({ page }) => {
    await page.fill('#start-date', '2024-01-01');
    await page.fill('#end-date', '2024-01-10');
    await page.check('#opt-include-end');
    await page.click('#btn-calculate');
    const days = await page.textContent('#result-days');
    expect(parseInt(days!.replace(/,/g, ''))).toBe(10);
  });

  test('shows business days and weekend days', async ({ page }) => {
    await page.fill('#start-date', '2024-01-01');
    await page.fill('#end-date', '2024-01-08');
    await page.click('#btn-calculate');
    const businessDays = await page.textContent('#result-business-days');
    const weekendDays = await page.textContent('#result-weekend-days');
    expect(parseInt(businessDays!.replace(/,/g, ''))).toBeGreaterThan(0);
    expect(parseInt(weekendDays!.replace(/,/g, ''))).toBeGreaterThan(0);
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-calculate');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads data and calculates', async ({ page }) => {
    await page.click('#btn-sample');
    await expect(page.locator('#results-section')).toBeVisible();
    const days = await page.textContent('#result-days');
    expect(parseInt(days!.replace(/,/g, ''))).toBeGreaterThan(0);
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await expect(page.locator('#results-section')).toBeVisible();
    await page.click('#btn-clear');
    await expect(page.locator('#results-section')).toBeHidden();
    const startVal = await page.inputValue('#start-date');
    expect(startVal).toBe('');
  });

  test('copy button works when results exist', async ({ page, context }) => {
    await context.grantPermissions(['clipboard-read', 'clipboard-write']);
    await page.click('#btn-sample');
    await expect(page.locator('#results-section')).toBeVisible();
    await page.click('#btn-copy');
    // Button text changes to "Copied!" on success
    await expect(page.locator('#btn-copy')).toContainText('Copied!');
  });

  test('auto-swaps dates when start is after end', async ({ page }) => {
    await page.fill('#start-date', '2025-06-15');
    await page.fill('#end-date', '2025-01-01');
    await page.click('#btn-calculate');
    await expect(page.locator('#results-section')).toBeVisible();
    const days = await page.textContent('#result-days');
    expect(parseInt(days!.replace(/,/g, ''))).toBeGreaterThan(0);
  });
});
