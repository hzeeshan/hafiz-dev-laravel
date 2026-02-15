import { test, expect } from '../fixtures/tool-page';

const SLUG = 'crontab-guru';

test.describe('Crontab Guru — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('parses default expression on load', async ({ page }) => {
    const explanation = await page.textContent('#explanation');
    expect(explanation).toBeTruthy();
    await expect(page.locator('#explanation-box')).toBeVisible();
  });

  test('updates explanation on input change', async ({ page }) => {
    await page.fill('#cron-input', '*/5 * * * *');
    await page.locator('#cron-input').dispatchEvent('input');

    const explanation = await page.textContent('#explanation');
    expect(explanation?.toLowerCase()).toContain('5');
  });

  test('shows error on invalid expression', async ({ page }) => {
    await page.fill('#cron-input', '* * *');
    await page.locator('#cron-input').dispatchEvent('input');

    await expect(page.locator('#error-box')).toBeVisible();
    await expect(page.locator('#explanation-box')).toBeHidden();
  });

  test('preset buttons set cron expression', async ({ page }) => {
    await page.click('.preset-btn[data-cron="0 0 * * *"]');

    const value = await page.inputValue('#cron-input');
    expect(value).toBe('0 0 * * *');
    await expect(page.locator('#explanation-box')).toBeVisible();
  });

  test('shows next run times', async ({ page }) => {
    await page.fill('#cron-input', '0 9 * * 1-5');
    await page.locator('#cron-input').dispatchEvent('input');

    await expect(page.locator('#next-runs-box')).toBeVisible();
    const runs = await page.locator('#next-runs > div').count();
    expect(runs).toBeGreaterThan(0);
  });

  test('reset button restores default', async ({ page }) => {
    await page.fill('#cron-input', '*/10 * * * *');
    await page.locator('#cron-input').dispatchEvent('input');

    await page.click('#btn-reset');
    const value = await page.inputValue('#cron-input');
    expect(value).toBe('* * * * *');
  });

  test('field labels update with expression', async ({ page }) => {
    await page.fill('#cron-input', '30 4 * * *');
    await page.locator('#cron-input').dispatchEvent('input');

    expect(await page.textContent('#field-minute')).toBe('30');
    expect(await page.textContent('#field-hour')).toBe('4');
  });
});
