import { test, expect } from '../fixtures/tool-page';

const SLUG = 'chronological-age-calculator';

test.describe('Chronological Age Calculator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('calculates age from birth date', async ({ page }) => {
    await page.fill('#birth-date', '2000-01-01');
    await page.click('#btn-calculate');
    await expect(page.locator('#results-section')).toBeVisible();
    const years = await page.textContent('#age-years');
    expect(parseInt(years!)).toBeGreaterThanOrEqual(25);
  });

  test('shows total days breakdown', async ({ page }) => {
    await page.fill('#birth-date', '2000-06-15');
    await page.click('#btn-calculate');
    const totalDays = await page.textContent('#total-days');
    expect(totalDays).toBeTruthy();
    expect(parseInt(totalDays!.replace(/,/g, ''))).toBeGreaterThan(9000);
  });

  test('shows zodiac sign', async ({ page }) => {
    await page.fill('#birth-date', '2000-03-25');
    await page.click('#btn-calculate');
    const zodiacName = await page.textContent('#zodiac-name');
    expect(zodiacName).toBeTruthy();
    expect(zodiacName).not.toBe('—');
  });

  test('shows next birthday countdown', async ({ page }) => {
    await page.fill('#birth-date', '2000-01-01');
    await page.click('#btn-calculate');
    const countdown = await page.textContent('#next-birthday-countdown');
    expect(countdown).toBeTruthy();
    expect(countdown).not.toBe('—');
  });

  test('reset button clears results', async ({ page }) => {
    await page.fill('#birth-date', '2000-01-01');
    await page.click('#btn-calculate');
    await expect(page.locator('#results-section')).toBeVisible();
    await page.click('#btn-reset');
    await expect(page.locator('#results-section')).toBeHidden();
  });

  test('alerts when no birth date entered', async ({ page }) => {
    page.on('dialog', dialog => dialog.accept());
    await page.click('#btn-calculate');
    await expect(page.locator('#results-section')).toBeHidden();
  });

  test('custom target date works', async ({ page }) => {
    await page.fill('#birth-date', '2000-01-01');
    await page.fill('#target-date', '2020-01-01');
    await page.click('#btn-calculate');
    const years = await page.textContent('#age-years');
    expect(years).toBe('20');
  });
});
