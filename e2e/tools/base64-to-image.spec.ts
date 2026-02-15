import { test, expect } from '../fixtures/tool-page';

const SLUG = 'base64-to-image';

test.describe('Base64 to Image — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('sample button loads base64 and shows preview', async ({ page }) => {
    await page.click('#btn-sample');
    await expect(page.locator('#preview-area')).toBeVisible();
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('shows error on invalid base64', async ({ page }) => {
    await page.fill('#b64-input', '!!!not-valid!!!');
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-clear');
    expect(await page.inputValue('#b64-input')).toBe('');
    await expect(page.locator('#preview-area')).toBeHidden();
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('character count updates', async ({ page }) => {
    await page.fill('#b64-input', 'abc123');
    const count = await page.textContent('#input-length');
    expect(count).toContain('6');
  });
});
