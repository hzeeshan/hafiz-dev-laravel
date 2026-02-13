import { test, expect } from '../fixtures/tool-page';

const SLUG = 'timestamp-converter';

test.describe('Timestamp Converter — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts timestamp to date formats', async ({ page }) => {
    await page.fill('#timestamp-input', '1609459200');
    await page.click('#btn-convert-timestamp');

    await expect(page.locator('#ts-results')).toBeVisible();
    const iso = await page.textContent('#result-iso8601');
    expect(iso).toBe('2021-01-01T00:00:00.000Z');
  });

  test('converts millisecond timestamp', async ({ page }) => {
    await page.fill('#timestamp-input', '1609459200000');
    await page.click('#btn-convert-timestamp');

    await expect(page.locator('#ts-results')).toBeVisible();
    const iso = await page.textContent('#result-iso8601');
    expect(iso).toBe('2021-01-01T00:00:00.000Z');
  });

  test('shows error on empty timestamp input', async ({ page }) => {
    await page.click('#btn-convert-timestamp');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('shows error on invalid timestamp', async ({ page }) => {
    await page.fill('#timestamp-input', 'not-a-number');
    await page.click('#btn-convert-timestamp');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('clear button resets timestamp mode', async ({ page }) => {
    await page.fill('#timestamp-input', '1609459200');
    await page.click('#btn-convert-timestamp');
    await expect(page.locator('#ts-results')).toBeVisible();

    await page.click('#btn-clear-ts');
    expect(await page.inputValue('#timestamp-input')).toBe('');
    await expect(page.locator('#ts-results')).toBeHidden();
  });

  test('tab switching works', async ({ page }) => {
    await expect(page.locator('#mode-timestamp-to-date')).toBeVisible();
    await expect(page.locator('#mode-date-to-timestamp')).toBeHidden();

    await page.click('#tab-date-to-timestamp');
    await expect(page.locator('#mode-date-to-timestamp')).toBeVisible();
    await expect(page.locator('#mode-timestamp-to-date')).toBeHidden();

    await page.click('#tab-timestamp-to-date');
    await expect(page.locator('#mode-timestamp-to-date')).toBeVisible();
  });

  test('converts date to timestamp', async ({ page }) => {
    await page.click('#tab-date-to-timestamp');

    await page.fill('#date-input', '2021-01-01');
    await page.fill('#time-input', '00:00:00');

    // Set timezone to UTC
    await page.selectOption('#timezone-select-date', 'UTC');
    await page.click('#btn-convert-date');

    await expect(page.locator('#date-results')).toBeVisible();
    const seconds = await page.textContent('#result-seconds');
    expect(seconds).toBe('1609459200');
  });

  test('shows error on empty date input', async ({ page }) => {
    await page.click('#tab-date-to-timestamp');

    // Clear the pre-filled date
    await page.fill('#date-input', '');
    await page.click('#btn-convert-date');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('use current time button populates timestamp input', async ({ page }) => {
    await page.click('#btn-use-current-ts');
    const value = await page.inputValue('#timestamp-input');
    expect(value.length).toBeGreaterThanOrEqual(10);
    await expect(page.locator('#ts-results')).toBeVisible();
  });

  test('quick reference timestamp click converts', async ({ page }) => {
    await page.click('.quick-ref-ts[data-ts="946684800"]');
    const value = await page.inputValue('#timestamp-input');
    expect(value).toBe('946684800');
    await expect(page.locator('#ts-results')).toBeVisible();
  });

  test('current timestamp displays and updates', async ({ page }) => {
    const ts = await page.textContent('#current-timestamp');
    expect(ts).not.toBe('-');
    expect(Number(ts)).toBeGreaterThan(0);
  });
});
