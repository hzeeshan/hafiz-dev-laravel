import { test, expect } from '../fixtures/tool-page';

const SLUG = 'ip-to-binary';

test.describe('IP to Binary — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts IP to binary', async ({ page }) => {
    await page.fill('#ip-input', '192.168.1.1');
    await page.waitForTimeout(400);

    await expect(page.locator('#output-section')).toBeVisible();
    const fullBinary = await page.textContent('#full-binary');
    expect(fullBinary).toBe('11000000101010000000000100000001');

    const dottedBinary = await page.textContent('#dotted-binary');
    expect(dottedBinary).toBe('11000000.10101000.00000001.00000001');
  });

  test('shows octet breakdown', async ({ page }) => {
    await page.fill('#ip-input', '8.8.8.8');
    await page.waitForTimeout(400);

    const rows = page.locator('#octet-body tr');
    expect(await rows.count()).toBe(4);
  });

  test('shows error for invalid IP', async ({ page }) => {
    await page.fill('#ip-input', '999.999.999.999');
    await page.waitForTimeout(400);

    await expect(page.locator('#error-notification')).toBeVisible();
    await expect(page.locator('#output-section')).toBeHidden();
  });

  test('quick IP buttons work', async ({ page }) => {
    await page.click('.quick-ip[data-ip="127.0.0.1"]');
    await page.waitForTimeout(400);

    const input = await page.inputValue('#ip-input');
    expect(input).toBe('127.0.0.1');
    await expect(page.locator('#output-section')).toBeVisible();
  });

  test('sample button loads IP', async ({ page }) => {
    await page.click('#btn-sample');

    const input = await page.inputValue('#ip-input');
    expect(input.length).toBeGreaterThan(0);
    await expect(page.locator('#output-section')).toBeVisible();
  });

  test('clear button resets', async ({ page }) => {
    await page.fill('#ip-input', '192.168.1.1');
    await page.waitForTimeout(400);
    await page.click('#btn-clear');

    expect(await page.inputValue('#ip-input')).toBe('');
    await expect(page.locator('#output-section')).toBeHidden();
  });
});
